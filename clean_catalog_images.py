import os
import sys
import json
import urllib.request
import cv2
import numpy as np
from concurrent.futures import ThreadPoolExecutor, as_completed
from datetime import datetime

sys.stdout.reconfigure(encoding='utf-8')

KAMELIA_PUBLIC_DIR = r"C:\xampp\htdocs\kameliastore\public"
KAMELIA_IMAGES_DIR = os.path.join(KAMELIA_PUBLIC_DIR, "catalog_images")
PRODUCTS_JSON_PATH = os.path.join(KAMELIA_PUBLIC_DIR, "data", "products.json")

def detect_text_regions(img):
    """
    Fast & robust text banner and watermark detector using Morphological Gradient.
    """
    h, w, _ = img.shape
    total_area = h * w
    
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    
    # 1. Morphological Gradient
    kernel_grad = cv2.getStructuringElement(cv2.MORPH_RECT, (3, 3))
    gradient = cv2.morphologyEx(gray, cv2.MORPH_GRADIENT, kernel_grad)
    
    # 2. Adaptive thresholding
    _, thresh = cv2.threshold(gradient, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)
    
    # 3. Morphological close to group kanji/letters into words/boxes
    kernel_close = cv2.getStructuringElement(cv2.MORPH_RECT, (15, 3))
    morph = cv2.morphologyEx(thresh, cv2.MORPH_CLOSE, kernel_close)
    
    # 4. Find contours
    contours, _ = cv2.findContours(morph, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)
    
    text_mask = np.zeros((h, w), dtype=np.uint8)
    text_boxes = []
    total_text_area = 0
    
    for cnt in contours:
        x, y, bw, bh = cv2.boundingRect(cnt)
        box_area = bw * bh
        aspect_ratio = bw / float(bh) if bh > 0 else 0
        
        if 200 < box_area < (total_area * 0.4) and (0.3 < aspect_ratio < 15):
            roi = gradient[y:y+bh, x:x+bw]
            edge_density = np.mean(roi > 30)
            
            if edge_density > 0.18:
                pad = 4
                x1 = max(0, x - pad)
                y1 = max(0, y - pad)
                x2 = min(w, x + bw + pad)
                y2 = min(h, y + bh + pad)
                
                cv2.rectangle(text_mask, (x1, y1), (x2, y2), 255, -1)
                text_boxes.append((x1, y1, x2 - x1, y2 - y1))
                total_text_area += (x2 - x1) * (y2 - y1)
                
    coverage_ratio = total_text_area / float(total_area)
    return text_mask, text_boxes, coverage_ratio

def download_image_bytes(url):
    try:
        req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0"})
        with urllib.request.urlopen(req, timeout=8) as resp:
            data = resp.read()
            arr = np.asarray(bytearray(data), dtype=np.uint8)
            img = cv2.imdecode(arr, cv2.IMREAD_COLOR)
            return img
    except Exception:
        return None

def process_single_product(p):
    item_id = p.get('id', '')
    photos = p.get('photos', [])
    primary_remote = p.get('image_url_remote', '')
    
    if not photos and primary_remote:
        photos = [primary_remote]
        
    local_filename = f"{item_id}.jpg"
    local_path = os.path.join(KAMELIA_IMAGES_DIR, local_filename)
    
    img = None
    if os.path.exists(local_path):
        img = cv2.imread(local_path)
        
    if img is None and photos:
        img = download_image_bytes(photos[0])
        
    if img is None:
        return None, "fail_load"
        
    text_mask, _, coverage = detect_text_regions(img)
    
    chosen_img = img
    chosen_url = photos[0] if photos else primary_remote
    action = "clean"
    
    if coverage == 0:
        action = "clean"
    elif coverage <= 0.18:
        # Small text overlay -> inpaint
        kernel = cv2.getStructuringElement(cv2.MORPH_RECT, (5, 5))
        mask_dilated = cv2.dilate(text_mask, kernel, iterations=2)
        chosen_img = cv2.inpaint(img, mask_dilated, inpaintRadius=4, flags=cv2.INPAINT_TELEA)
        action = "inpaint"
    else:
        # Heavy text overlay (> 18%). Check alternative photos in photos[1:]
        found_alt = False
        for alt_idx in range(1, min(len(photos), 4)):
            alt_url = photos[alt_idx]
            alt_img = download_image_bytes(alt_url)
            if alt_img is not None:
                alt_mask, _, alt_cov = detect_text_regions(alt_img)
                if alt_cov == 0:
                    chosen_img = alt_img
                    chosen_url = alt_url
                    action = "swap_clean"
                    found_alt = True
                    break
                elif alt_cov <= 0.15:
                    kernel = cv2.getStructuringElement(cv2.MORPH_RECT, (5, 5))
                    alt_mask_dil = cv2.dilate(alt_mask, kernel, iterations=2)
                    chosen_img = cv2.inpaint(alt_img, alt_mask_dil, inpaintRadius=4, flags=cv2.INPAINT_TELEA)
                    chosen_url = alt_url
                    action = "swap_inpaint"
                    found_alt = True
                    break
                    
        if not found_alt:
            # Cannot be cleaned -> REJECT / DO NOT UPLOAD!
            return None, "rejected"
            
    # Save the cleaned image to disk
    cv2.imwrite(local_path, chosen_img, [cv2.IMWRITE_JPEG_QUALITY, 92])
    
    p_clean = dict(p)
    p_clean['image_local'] = f"catalog_images/{local_filename}"
    p_clean['image_url_remote'] = chosen_url
    return p_clean, action

def main():
    print("=== HIGH-SPEED PARALLEL AUTO-IMAGE CLEANING & INPAINTING ===")
    if not os.path.exists(PRODUCTS_JSON_PATH):
        print(f"Error: {PRODUCTS_JSON_PATH} tidak ditemukan.")
        return
        
    with open(PRODUCTS_JSON_PATH, 'r', encoding='utf-8') as f:
        products = json.load(f)
        
    print(f"Total produk sebelum filter & inpainting: {len(products)} item")
    
    cleaned_products = []
    stats = {"clean": 0, "inpaint": 0, "swap_clean": 0, "swap_inpaint": 0, "rejected": 0, "fail_load": 0}
    
    with ThreadPoolExecutor(max_workers=32) as executor:
        futures = {executor.submit(process_single_product, p): p for p in products}
        for fut in as_completed(futures):
            res_p, action = fut.result()
            if action in stats:
                stats[action] += 1
            if res_p is not None:
                cleaned_products.append(res_p)
                
    # Sort cleaned products to match original order
    cleaned_products.sort(key=lambda x: x.get('id', ''))
    
    with open(PRODUCTS_JSON_PATH, 'w', encoding='utf-8') as f:
        json.dump(cleaned_products, f, ensure_ascii=False, indent=2)
        
    print("\n=======================================================")
    print("=== SELESAI AUTO-IMAGE CLEANING & VISUAL REDESIGN ===")
    print(f"✓ Total Produk Lolos & Bersih 100%: {len(cleaned_products)} item")
    print(f"  - Bersih Alami (Tanpa Kanji): {stats['clean']} item")
    print(f"  - Berhasil Dibersihkan Inpainting: {stats['inpaint']} item")
    print(f"  - Beralih ke Foto Studio Alternatif Bersih: {stats['swap_clean']} item")
    print(f"  - Beralih & Di-inpaint Alternatif: {stats['swap_inpaint']} item")
    print(f"  - Ditolak / Dibuang karena Penuh Tulisan Kanji: {stats['rejected']} item")
    print(f"✓ Berkas tersimpan di: {PRODUCTS_JSON_PATH}")

if __name__ == "__main__":
    main()
