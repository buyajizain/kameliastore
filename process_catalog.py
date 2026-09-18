#!/usr/bin/env python3
"""
Process Mercari latest data to Kamelia Store JSON:
- STRICT LUXURY FILTER: ONLY Bags, Wallets, Watches, and Belts (NO clothes, jackets, pants, shoes, jewelry, etc.)
- Indonesian Titles & Descriptions (Professional Luxury Pre-Order)
- Clean White-Label Rebranding (No Tokyo / Japan mentions)
- Rate: 148 IDR / Yen, Fee: 100/200, Shipping: 350k / 150k, Profit Margin: 50%, Retail Ref: 1.75x
"""
import json
import os
import re
import sys

INPUT_JSON = r"C:\Users\Administrator\workspace\mercari\mercari_latest.json"
OUTPUT_JSON = r"C:\xampp\htdocs\kameliastore\public\data\products.json"
IMAGES_DIR = r"C:\xampp\htdocs\kameliastore\public\catalog_images"

RATE_YEN = 148
FEE_LOW = 100
FEE_HIGH = 200
SHIPPING_BAG = 350000
SHIPPING_ACCESSORIES = 150000
PROFIT_MARGIN = 0.50

# Strict Blacklist: Pakaian (baju/jaket/celana/rok/kaos/dress), Sepatu, Perhiasan (anting/kalung/cincin/gelang), Kosmetik, dll.
BLACKLIST_PATTERN = re.compile(
    r'服|洋服|トップス|Tシャツ|ティーシャツ|シャツ|ブラウス|カットソー|ニット|セーター|カーディガン|'
    r'パーカー|トレーナー|スウェット|ジャケット|コート|ブルゾン|アウター|ダウン|'
    r'パンツ|ズボン|デニム|ジーンズ|スラックス|スカート|ワンピース|ドレス|'
    r'靴|スニーカー|パンプス|サンダル|ブーツ|ヒール|水着|下着|インナー|ソックス|靴下|'
    r'ピアス|イヤリング|ネックレス|リング|指輪|ブレスレット|アンクレット|'
    r'ハンカチ|タオル|キーホルダー|コスメ|香水|リップ|アイシャドウ|'
    r'\bshirt\b|\bt-shirt\b|\bjacket\b|\bcoat\b|\bpants\b|\bjeans\b|\bdress\b|\bskirt\b|'
    r'\bshoes\b|\bsneakers\b|\bheels\b|\bboots\b|\bsandals\b|\bearrings\b|\bnecklace\b|'
    r'\bring\b|\bbracelet\b|\bperfume\b|\bcosmetics\b|\bhoodie\b|\bsweater\b',
    re.IGNORECASE
)

# Strict Whitelist: Hanya Tas, Dompet, Jam Tangan, dan Sabuk/Ikat Pinggang
WHITELIST_PATTERN = re.compile(
    r'バッグ|かばん|鞄|トート|ショルダー|ハンドバッグ|ボストン|リュック|バックパック|クロスボディ|クラッチ|ウエストバッグ|ボディバッグ|'
    r'財布|ウォレット|長財布|二つ折り|2つ折り|三つ折り|コインケース|小銭入れ|カードケース|名刺入れ|キーケース|'
    r'時計|腕時計|ウォッチ|'
    r'ベルト|'
    r'\bbag\b|\btote\b|\bshoulder\b|\bhandbag\b|\bboston\b|\bbackpack\b|\bcrossbody\b|\bclutch\b|'
    r'\bwallet\b|\bpurse\b|\bcardholder\b|\bkeycase\b|\bwatch\b|\bbelt\b',
    re.IGNORECASE
)

def is_valid_luxury_item(title, description=""):
    combined = f"{title} {description}"
    if BLACKLIST_PATTERN.search(title):
        return False
    if not WHITELIST_PATTERN.search(combined):
        return False
    return True

PRODUCT_TYPES = [
    (r"ショルダーバッグ|ショルダー", "Shoulder Bag"),
    (r"トートバッグ|トート", "Tote Bag"),
    (r"ハンドバッグ", "Handbag"),
    (r"ボストンバッグ|ボストン", "Boston Bag"),
    (r"リュック|バックパック", "Backpack"),
    (r"クロスボディ", "Crossbody Bag"),
    (r"クラッチバッグ|クラッチ", "Clutch Bag"),
    (r"ウエストバッグ|ボディバッグ", "Waist Bag"),
    (r"長財布", "Long Wallet (Dompet Panjang)"),
    (r"二つ折り財布|二つ折り|2つ折り", "Bifold Wallet (Dompet Lipat)"),
    (r"三つ折り財布|三つ折り", "Trifold Wallet (Dompet Lipat 3)"),
    (r"コインケース|小銭入れ", "Coin Purse & Cardholder"),
    (r"カードケース|名刺入れ", "Card Holder"),
    (r"キーケース", "Key Case Pouch"),
    (r"財布|ウォレット", "Leather Wallet"),
    (r"腕時計|時計", "Luxury Watch (Jam Tangan)"),
    (r"ベルト", "Leather Belt (Ikat Pinggang)"),
    (r"バッグ|かばん|鞄", "Leather Bag"),
]

FEATURES = [
    (r"2way|2WAY", "2-Way"),
    (r"3way|3WAY", "3-Way"),
    (r"シグネチャー", "Signature"),
    (r"ソーホー|soho|SOHO", "Soho Edition"),
    (r"ヴィンテージ|ビンテージ|オールド|vintage|OLD", "Vintage Collection"),
    (r"総柄", "Monogram Pattern"),
    (r"チェーン", "Chain Strap"),
    (r"レザー|本革|革|皮", "Genuine Leather"),
    (r"キャンバス", "Canvas"),
    (r"ナイロン", "Premium Nylon"),
    (r"スエード", "Suede"),
    (r"エナメル|パテント", "Patent Glossy"),
]

COLORS = [
    (r"ブラック|黒", "Black"),
    (r"ブラウン|茶", "Brown"),
    (r"ベージュ", "Beige"),
    (r"ホワイト|白", "White"),
    (r"レッド|赤", "Red"),
    (r"ピンク", "Pink"),
    (r"ネイビー|紺", "Navy"),
    (r"ブルー|青", "Blue"),
    (r"グリーン|緑", "Green"),
    (r"ゴールド|金", "Gold"),
    (r"シルバー|銀", "Silver"),
    (r"グレー|灰色", "Grey"),
    (r"イエロー|黄色", "Yellow"),
    (r"ボルドー|ワイン", "Burgundy"),
    (r"キャメル", "Camel"),
]

def format_rupiah(amount):
    return f"Rp {int(amount):,}".replace(",", ".")

def calculate_pricing(price_yen, title):
    fee = FEE_LOW if price_yen < 5000 else FEE_HIGH
    total_yen = price_yen + fee
    harga_dasar_idr = total_yen * RATE_YEN
    
    text_check = (title or "").lower()
    is_bag = any(w in text_check for w in [
        "bag", "tote", "handbag", "shoulder", "backpack", "crossbody", "satchel", 
        "バッグ", "トート", "ハンドバッグ", "ショルダー", "リュック", "ボストン"
    ])
    
    shipping_idr = SHIPPING_BAG if is_bag else SHIPPING_ACCESSORIES
    category_name = "Tas" if is_bag else "Jam / Dompet / Sabuk"
    subtotal_idr = harga_dasar_idr + shipping_idr
    selling_idr = int(subtotal_idr * (1 + PROFIT_MARGIN))
    retail_ref_idr = int(selling_idr * 1.75)
    
    return {
        "fee_yen": fee,
        "total_yen": total_yen,
        "harga_dasar_idr": harga_dasar_idr,
        "shipping_idr": shipping_idr,
        "category_name": category_name,
        "subtotal_idr": subtotal_idr,
        "selling_idr": selling_idr,
        "retail_ref_idr": retail_ref_idr
    }

def clean_latin_model(raw_text, brand):
    latin_only = re.sub(r'[\u3000-\u303f\u3040-\u309f\u30a0-\u30ff\uff00-\uffef\u4e00-\u9faf]+', ' ', raw_text)
    latin_only = re.sub(re.escape(brand), '', latin_only, flags=re.IGNORECASE)
    latin_only = re.sub(r'[\(\)\[\]【】★☆◆◇■▲▼/\\\-_~～:;!?.,*#]+', ' ', latin_only)
    words = [w.strip() for w in latin_only.split() if len(w.strip()) > 1 and not w.lower() in ['new', 'york', 'bag', 'the', 'item', 'for', 'sale', 'spade', 'kors', 'jacobs', 'burch']]
    return " ".join(words[:4])

def generate_indonesian_title(raw_title, brand, category_name="Tas"):
    raw_title_str = str(raw_title or "")
    
    detected_type = None
    for pattern, name in PRODUCT_TYPES:
        if re.search(pattern, raw_title_str, re.IGNORECASE):
            detected_type = name
            break
            
    if not detected_type:
        detected_type = "Exclusive Leather Bag" if category_name == "Tas" else "Luxury Leather Goods"

    detected_features = []
    for pattern, feat in FEATURES:
        if re.search(pattern, raw_title_str, re.IGNORECASE):
            if feat not in detected_features:
                detected_features.append(feat)
                
    detected_color = None
    for pattern, col in COLORS:
        if re.search(pattern, raw_title_str, re.IGNORECASE):
            detected_color = col
            break

    latin_kw = clean_latin_model(raw_title_str, brand)

    parts = [brand]
    if latin_kw:
        parts.append(latin_kw)
    if detected_features:
        parts.append(" ".join(detected_features[:2]))
    parts.append(detected_type)
    if detected_color:
        parts.append(f"({detected_color})")
        
    title = " ".join(parts)
    title = re.sub(r'\s+', ' ', title).strip()
    return title

def generate_indonesian_description(title, brand, condition, selling_price_fmt, category_name="Tas"):
    return f"""Koleksi Pre-Order Eksklusif {brand} Authentic — Kamelia Store.

📌 Rincian Produk:
• Brand: {brand}
• Kategori: {category_name}
• Seri / Model: {title}
• Status: Pre-Order Terkurasi (100% Original Authentic Guarantee)
• Kondisi: {condition}
• Estimasi Harga PO: {selling_price_fmt} (Termasuk Biaya Verifikasi Fisik & Asuransi Pengiriman)

✨ Jaminan Kamelia Store:
Setiap item pre-order telah melalui tahapan verifikasi keaslian dan inspeksi fisik ketat oleh tim kurasi kami untuk memastikan barang 100% original dan dalam kondisi prima sebelum diserahkan kepada Anda."""

def clean_condition(cond_str):
    if not cond_str:
        return "✨ Like New (Kondisi Sangat Mulus & Terawat)"
    c = str(cond_str).strip()
    if "Sangat Bagus" in c or "Mulus" in c or "Like New" in c or "A" in c:
        return "✨ Like New (Kondisi Sangat Mulus & Terawat)"
    elif "Baik" in c or "Wajar" in c or "B" in c:
        return "👍 Kondisi Baik & Bersih (Grade A Pre-Owned)"
    elif "Baru" in c or "New" in c or "Tag" in c or "S" in c:
        return "🏷️ Brand New With Tag (Baru)"
    elif "Jejak" in c or "Cacat" in c or "Minus" in c:
        return "🔍 Pre-Owned Terawat (Minor Wear Wajar)"
    return "✨ Kondisi Prima Terkurasi"

def main():
    if not os.path.exists(INPUT_JSON):
        print(f"Error: {INPUT_JSON} not found!")
        return

    with open(INPUT_JSON, "r", encoding="utf-8") as f:
        items = json.load(f)

    print(f"Total raw items: {len(items)}")

    processed_products = []
    available_images = set(os.listdir(IMAGES_DIR)) if os.path.exists(IMAGES_DIR) else set()
    skipped_count = 0

    for it in items:
        raw_title = it.get("title", "")
        raw_desc = it.get("description", "") or ""
        
        # Strict Luxury Filter: reject clothes, shoes, jewelry, etc.
        if not is_valid_luxury_item(raw_title, raw_desc):
            skipped_count += 1
            continue

        item_id = it.get("id", "")
        price_yen = int(it.get("price_yen", 0) or 0)
        brand = it.get("brand", "Luxury Brand")
        
        pricing = it.get("pricing") or calculate_pricing(price_yen, raw_title)
        selling_idr = pricing.get("selling_idr", 0)
        retail_ref_idr = pricing.get("retail_ref_idr", int(selling_idr * 1.75))
        category_name = pricing.get("category_name", "Tas")

        # Generate clean Indonesian Title and Description
        indo_title = generate_indonesian_title(raw_title, brand, category_name)
        condition_clean = clean_condition(it.get("condition_id", ""))
        indo_description = generate_indonesian_description(indo_title, brand, condition_clean, format_rupiah(selling_idr), category_name)

        img_url = it.get("image", "")
        photos = it.get("photos", [])
        if not photos and img_url:
            photos = [img_url]

        local_img_filename = f"{item_id}.jpg"
        if local_img_filename in available_images:
            local_img_path = f"catalog_images/{local_img_filename}"
        else:
            local_img_path = img_url

        prod = {
            "id": item_id,
            "brand": brand,
            "title": indo_title,
            "description": indo_description,
            "condition": condition_clean,
            "price_yen_raw": price_yen,
            "pricing": pricing,
            "selling_idr": selling_idr,
            "retail_ref_idr": retail_ref_idr,
            "selling_idr_formatted": format_rupiah(selling_idr),
            "retail_ref_formatted": format_rupiah(retail_ref_idr),
            "image_url_remote": img_url,
            "image_local": local_img_path,
            "photos": photos,
            "seller": {
                "name": "Kamelia Verified Partner",
                "ratings_count": 150,
                "star_rating": "5.0",
                "positive_rate": "100%",
                "quick_shipper": True
            },
            "status": "Pre-Order Available"
        }
        processed_products.append(prod)

    os.makedirs(os.path.dirname(OUTPUT_JSON), exist_ok=True)
    with open(OUTPUT_JSON, "w", encoding="utf-8") as f:
        json.dump(processed_products, f, ensure_ascii=False, indent=2)

    print(f"Skipped {skipped_count} non-luxury items (baju, celana, anting, dll.)")
    print(f"Successfully processed {len(processed_products)} STRICT luxury products (Tas, Dompet, Jam Tangan, Sabuk) to {OUTPUT_JSON}")

if __name__ == "__main__":
    main()
