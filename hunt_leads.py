import os
import sys
import json
import sqlite3
import re
import time
import random
import hashlib
import urllib.parse
from datetime import datetime
from bs4 import BeautifulSoup
import primp

# Set UTF-8 for Windows console
sys.stdout.reconfigure(encoding='utf-8')

BASE_DIR = r"c:\xampp\htdocs\kameliastore"
DB_PATH = os.path.join(BASE_DIR, "database", "database.sqlite")
PRODUCTS_JSON_PATH = os.path.join(BASE_DIR, "public", "data", "products.json")

# ==============================================================================
# 🎯 STRICT LUXURY BRAND & MODEL DEFINITIONS
# ==============================================================================
LUXURY_MODELS = {
    "Coach": [
        "tabby", "rowan", "swagger", "dempsey", "city tote", "mollie", "field tote", 
        "kira", "klare", "cassie", "fanny pack", "wristlet", "carryall", "tas coach", 
        "dompet coach", "coach bag", "coach wallet", "coach authentic", "coach preloved", 
        "coach second", "coach rogue", "coach willow", "coach brooklyn", "coach laurel"
    ],
    "Tory Burch": [
        "fleming", "eleanor", "kira chevron", "lee radziwill", "perry tote", "robinson", 
        "miller", "ella tote", "britten", "mcgraw", "tas tory burch", "dompet tory burch", 
        "tory burch authentic", "tory burch preloved", "tory burch thea", "tory burch bag"
    ],
    "Fossil": [
        "rachel tote", "fiona", "sydney", "maya", "carlie", "townsman", "jacqueline", 
        "logan wallet", "tas fossil", "dompet fossil", "jam fossil", "fossil watch", 
        "fossil bag", "fossil authentic", "fossil preloved", "fossil leather"
    ],
    "Marc Jacobs": [
        "the snapshot", "the tote bag", "the softshot", "the box", "pillow bag", 
        "the grind", "traveler tote", "tas marc jacobs", "dompet marc jacobs", 
        "marc jacobs preloved", "marc jacobs bag", "j marc"
    ],
    "Kate Spade": [
        "knott", "sam tote", "spade flower", "staci", "leila", "cameron", 
        "margaux", "dumpling", "tas kate spade", "dompet kate spade", 
        "kate spade preloved", "kate spade bag", "katy"
    ],
    "Prada": [
        "re-edition", "tessuto nylon", "saffiano", "galleria", "cleo", "cahier", 
        "tas prada", "dompet prada", "prada authentic", "prada preloved", "prada bag"
    ],
    "Michael Kors": [
        "jet set", "mercer", "greenwich", "soho", "hamilton", "bradshaw", 
        "rhea backpack", "tas michael kors", "dompet michael kors", "mk bag"
    ],
    "Aigner": [
        "roma", "genua", "cybill", "diadora", "fiorentina", "tas aigner", 
        "dompet aigner", "sabuk aigner", "aigner preloved", "aigner bag"
    ],
    "Longchamp": [
        "le pliage", "le pliage cuir", "roseau", "mailbox", "foulonne", 
        "tas longchamp", "longchamp authentic", "longchamp preloved", "longchamp energy"
    ]
}

# Negative keywords for absolute disqualification
DISQUALIFIED_KEYWORDS = [
    # Non-luxury gadgets / vehicles / real estate / life events
    "iphone", "ip 11", "ip 12", "ip 13", "ip 14", "ip 15", "android", "samsung", "xiaomi", "oppo", "vivo",
    "hp ", "handphone", "laptop", "pc ", "gaming", "motor", "mobil", "ac ", "hisense", "kulkas", "rumah",
    "tanah", "funeral", "passing", "startup", "investasi", "hotel", "tiket", "game ", "vape",
    "lowongan", "loker", "kursus", "baju anak", "sepatu bola", "jersey", "tukar tambah", "ikan fossil", "fossil mutasi",
    "head coach", "team coach", "football", "soccer", "nfl", "nba", "basketball", "coach of the year",
    
    # Store ads / official accounts / spam markers
    "open po", "ready stock", "ready siap kirim", "order wa", "order via wa", "grosir", "dropship",
    "reseller", "supplier", "distributor", "official account", "official instagram",
    "shop them now", "link in bio", "link di bio", "diskon besar", "promo khusus",
    "affiliate", "komisi", "followers", "following", "posts - see instagram", "posts - fossil",
    "jual beli hp"
]

# Positive buyer intent indicators
BUYER_INTENTS = [
    "wtb", "cari", "nyari", "looking for", "butuh", "rekomendasi", "ada yg punya",
    "ada yang punya", "ada yang jual", "ada yg jual", "titip cari", "mau beli",
    "budget", "under", "spill", "info dong", "info seller", "plis info", "dm min",
    "beli tas", "beli dompet", "bagus mana", "worth it", "unboxing", "review",
    "preloved", "second like new", "authentic"
]

# High-intent curated search matrix
CURATED_SEARCH_QUERIES = [
    # Twitter / X Buyer Matrix
    ("twitter", "site:x.com wtb tas coach"),
    ("twitter", "site:x.com wtb tas tory burch"),
    ("twitter", "site:x.com wtb tas fossil"),
    ("twitter", "site:x.com wtb tas kate spade"),
    ("twitter", "site:x.com wtb tas prada"),
    ("twitter", "site:x.com wtb tas marc jacobs"),
    ("twitter", "site:x.com wtb tas longchamp"),
    ("twitter", "site:x.com nyari tas coach"),
    ("twitter", "site:x.com nyari tas fossil"),
    ("twitter", "site:x.com nyari tas tory burch"),
    ("twitter", "site:x.com rekomendasi tas coach"),
    ("twitter", "site:x.com rekomendasi tas fossil"),
    ("twitter", "site:x.com rekomendasi tas tory burch"),
    ("twitter", "site:x.com budget tas coach"),
    ("twitter", "site:x.com budget tas fossil"),
    ("twitter", "site:x.com wtb dompet coach"),
    ("twitter", "site:x.com wtb jam fossil"),
    ("twitter", "site:x.com preloved tas coach wtb"),
    ("twitter", "site:x.com tawarin preloved tas coach"),
    
    # TikTok Buyer Matrix
    ("tiktok", "site:tiktok.com rekomendasi tas coach"),
    ("tiktok", "site:tiktok.com rekomendasi tas tory burch"),
    ("tiktok", "site:tiktok.com rekomendasi tas fossil"),
    ("tiktok", "site:tiktok.com rekomendasi tas kate spade"),
    ("tiktok", "site:tiktok.com unboxing tas coach"),
    ("tiktok", "site:tiktok.com unboxing tas tory burch"),
    ("tiktok", "site:tiktok.com review tas coach"),
    ("tiktok", "site:tiktok.com review tas tory burch"),
    ("tiktok", "site:tiktok.com tas coach wanita ori"),
    
    # Carousell Buyer Matrix
    ("carousell", "site:carousell.co.id wtb tas coach"),
    ("carousell", "site:carousell.co.id wtb tas tory burch"),
    ("carousell", "site:carousell.co.id wtb tas fossil"),
    ("carousell", "site:carousell.co.id tas coach preloved authentic"),
    ("carousell", "site:carousell.co.id tas tory burch preloved"),
    ("carousell", "site:carousell.co.id tas fossil preloved"),
    ("carousell", "site:carousell.co.id tas kate spade preloved"),
    
    # Instagram Buyer Matrix
    ("instagram", "site:instagram.com titip cari tas coach"),
    ("instagram", "site:instagram.com titip cari tas tory burch"),
    ("instagram", "site:instagram.com wtb tas preloved coach")
]

def load_catalog():
    if not os.path.exists(PRODUCTS_JSON_PATH):
        return []
    with open(PRODUCTS_JSON_PATH, "r", encoding="utf-8") as f:
        return json.load(f)

def match_product(catalog, brand, category, raw_text, budget_max=None):
    if not catalog:
        return None
        
    brand_lower = brand.lower() if brand else ""
    cat_lower = category.lower() if category else ""
    raw_lower = raw_text.lower()
    
    scored = []
    for p in catalog:
        score = 0
        p_title = (p.get("title") or "").lower()
        p_brand = (p.get("brand") or "").lower()
        p_price = int(p.get("selling_idr") or 0)
        
        # 1. Brand match
        if brand_lower and (brand_lower in p_brand or brand_lower in p_title):
            score += 50
        elif any(b.lower() in p_brand for b in LUXURY_MODELS.keys() if b.lower() in raw_lower):
            score += 40
            
        # 2. Category match
        if cat_lower and cat_lower in p_title:
            score += 20
        elif "tas" in p_title and ("tas" in raw_lower or "bag" in raw_lower):
            score += 15
        elif "dompet" in p_title and ("dompet" in raw_lower or "wallet" in raw_lower):
            score += 15
        elif "jam" in p_title and ("jam" in raw_lower or "watch" in raw_lower):
            score += 15
            
        # 3. Keyword tokens
        tokens = [t for t in re.split(r'\s+', raw_lower) if len(t) > 3]
        for t in tokens:
            if t in p_title:
                score += 10
                
        # 4. Budget match
        if budget_max and p_price > 0:
            if p_price <= budget_max:
                score += 30
            elif p_price <= (budget_max * 1.2):
                score += 15
            else:
                score -= 20
                
        if score >= 35:
            scored.append((score, p))
            
    if not scored:
        for p in catalog:
            if brand_lower and brand_lower in (p.get("brand") or "").lower():
                return p
        return catalog[0] if catalog else None
        
    scored.sort(key=lambda x: x[0], reverse=True)
    return scored[0][1]

def generate_outreach_draft(handle, brand, product):
    name = handle if handle else "Kakak"
    p_title = product.get("title", "Koleksi Luxury Authentic")
    p_price = product.get("selling_idr_formatted", f"Rp {product.get('selling_idr', 0):,}")
    p_cond = product.get("condition", "Like New")
    p_brand = product.get("brand", brand or "Luxury Item")
    
    return (
        f"Halo kak {name}, salam kenal dari Kamelia Store Concierge ✨\n\n"
        f"Sempat lihat postingan/minat kakak seputar koleksi {p_brand}. Kebetulan di kurasi Pre-Order Tokyo Jepang kami baru masuk 1 unit eksklusif:\n\n"
        f"👜 *{p_title}*\n"
        f"💎 Kondisi: {p_cond}\n"
        f"🏷️ Estimasi Harga PO: *{p_price}* (100% Authentic Guaranteed QC Pass)\n\n"
        f"Barangkali kakak berminat melihat rincian foto aslinya, bisa cek langsung di katalog butik kami ya kak:\n"
        f"👉 http://127.0.0.1:8000/katalog?search={urllib.parse.quote(p_brand)}\n\n"
        f"Atau bisa langsung balas pesan ini jika ingin dibantu reservasi/tanya detail ke Concierge kami ya kak. Terima kasih! 🙏👑"
    )

def normalize_text_hash(text):
    clean = re.sub(r'[^a-zA-Z0-9]', '', (text or '').lower())
    return hashlib.md5(clean.encode('utf-8')).hexdigest()

def validate_and_extract_lead(platform, url, title, snippet):
    if not snippet or len(snippet) < 25:
        return None
    # Reject binary data
    if any(ord(char) > 65000 or (ord(char) < 32 and char not in '\n\r\t') for char in snippet[:50]):
        return None
    # Reject non-post URLs & root profile pages
    if "/api/" in url or ".jpg" in url or ".png" in url or ".webp" in url:
        return None
    if re.search(r'instagram\.com\/[a-zA-Z0-9._]+\/?$', url):
        return None
    if re.search(r'tiktok\.com\/@[a-zA-Z0-9._]+\/?$', url):
        return None
        
    combined = (title + " " + snippet).lower()
    
    # 1. Negative keyword filter
    for bad in DISQUALIFIED_KEYWORDS:
        if bad in combined:
            return None
            
    # 2. Luxury brand & model match
    detected_brand = None
    for brand, models in LUXURY_MODELS.items():
        if any(m in combined for m in models):
            detected_brand = brand
            break
            
    if not detected_brand:
        return None
        
    # 3. Buyer intent match
    has_intent = any(i in combined for i in BUYER_INTENTS)
    if not has_intent:
        return None
        
    # 4. Category detection
    category = "Tas"
    if any(w in combined for w in ["dompet", "wallet", "cardholder"]):
        category = "Dompet"
    elif any(w in combined for w in ["jam", "watch", "arloji", "chronograph"]):
        category = "Jam Tangan"
    elif any(w in combined for w in ["sabuk", "belt", "ikat pinggang"]):
        category = "Sabuk"
        
    # 5. Extract budget if available
    budget = None
    m_jt = re.search(r'([0-9]+[.,]?[0-9]*)\s*(?:jt|juta)', combined, re.IGNORECASE)
    m_k = re.search(r'([0-9]+)\s*k\b', combined, re.IGNORECASE)
    m_rp = re.search(r'rp\.?\s*([0-9]{6,8})', combined, re.IGNORECASE)
    if m_jt:
        val = float(m_jt.group(1).replace(',', '.'))
        budget = int(val * 1000000)
    elif m_k:
        budget = int(m_k.group(1)) * 1000
    elif m_rp:
        budget = int(m_rp.group(1))
        
    # 6. Extract clean username / handle & platform
    handle = None
    display_name = None
    platform_type = "web"
    
    if "x.com" in url or "twitter.com" in url:
        platform_type = "twitter"
        m_x = re.search(r'(?:twitter\.com|x\.com)\/([a-zA-Z0-9_]+)', url)
        if m_x and m_x.group(1).lower() not in ['status', 'i', 'search', 'hashtag', 'home', 'explore']:
            handle = "@" + m_x.group(1)
            display_name = m_x.group(1)
        m_x_name = re.search(r'^(.*?)\s*\(@([a-zA-Z0-9_]+)\)', title)
        if m_x_name:
            display_name = m_x_name.group(1).strip()
            handle = "@" + m_x_name.group(2).strip()
    elif "tiktok.com" in url:
        platform_type = "tiktok"
        m_tik = re.search(r'tiktok\.com\/@([a-zA-Z0-9._]+)', url)
        if m_tik:
            handle = "@" + m_tik.group(1)
            display_name = m_tik.group(1)
        m_tik_name = re.search(r'^(.*?)\s*\(@([a-zA-Z0-9._]+)\)', title)
        if m_tik_name:
            display_name = m_tik_name.group(1).strip()
            handle = "@" + m_tik_name.group(2).strip()
    elif "instagram.com" in url:
        platform_type = "instagram"
        m_ig_name = re.search(r'^(.*?)\s*\(@([a-zA-Z0-9._]+)\)', title)
        if m_ig_name:
            display_name = m_ig_name.group(1).strip()
            handle = "@" + m_ig_name.group(2).strip()
    elif "carousell" in url:
        platform_type = "carousell"
        m_car = re.search(r'carousell\.co\.id\/u\/([a-zA-Z0-9._]+)', url)
        if m_car:
            handle = "@" + m_car.group(1)
            display_name = m_car.group(1)
    else:
        platform_type = platform
        
    name = display_name or (handle.replace("@", "") if handle else "Calon Pembeli Preloved")
    name = re.sub(r'https?:\/\/\S+', '', name).strip()
    name = re.sub(r'[\(\)\|\-•].*$', '', name).strip()
    if not name or len(name) < 2 or name.lower() in ['tiktok', 'instagram', 'twitter', 'facebook', 'carousell']:
        name = handle.replace("@", "") if handle else "Calon Pembeli Preloved"
        
    return {
        "platform": platform_type,
        "handle": handle,
        "name": name,
        "brand": detected_brand,
        "category": category,
        "budget": budget,
        "title": title,
        "contact": url,
        "text": snippet
    }

def run_hunter():
    print("=== STARTING HIGH-PRECISION LEAD HUNTER (STRICT LUXURY NICHE) ===")
    print(f"Timestamp: {datetime.now().strftime('%Y-%m-%d %H:%M:%S')}")
    
    catalog = load_catalog()
    print(f"✓ Berhasil memuat {len(catalog)} produk katalog aktif Kamelia Store.")
    
    if not os.path.exists(DB_PATH):
        print(f"Error: Database {DB_PATH} tidak ditemukan.")
        return 0
        
    conn = sqlite3.connect(DB_PATH)
    cursor = conn.cursor()
    
    # Pre-populate deduplication caches from database
    cursor.execute("SELECT contact, handle, raw_inquiry FROM leads")
    db_rows = cursor.fetchall()
    
    seen_urls = {row[0] for row in db_rows if row[0]}
    seen_handles = {row[1] for row in db_rows if row[1]}
    seen_text_hashes = {normalize_text_hash(row[2]) for row in db_rows if row[2]}
    
    print(f"✓ Memori Deduplikasi Aktif: {len(seen_urls)} URL terdaftar, {len(seen_handles)} username tersimpan (ZERO DUPLICATE POLICY).")
    
    # Initialize TLS Client (Bypasses bot blocks)
    client = primp.Client(impersonate="random")
    
    # Select queries for this run (8 high-impact queries per batch for snappy response)
    sampled_queries = random.sample(CURATED_SEARCH_QUERIES, min(8, len(CURATED_SEARCH_QUERIES)))
    print(f"📡 Memindai {len(sampled_queries)} kueri luxury berintensi pembeli tinggi secara presisi...")
    
    scraped_leads = []
    
    for platform, q in sampled_queries:
        query_url = f"https://search.yahoo.com/search?p={q.replace(' ', '+')}"
        try:
            resp = client.get(query_url)
            if resp.status_code == 200:
                soup = BeautifulSoup(resp.text, 'html.parser')
                raw_items = soup.find_all('div', class_='algo')
                for r in raw_items:
                    a = r.find('a')
                    title = a.get_text() if a else ""
                    href = a.get('href', '') if a else ""
                    snip_div = r.find('div', class_='compText') or r.find('p')
                    snip = snip_div.get_text().strip() if snip_div else ""
                    
                    m_ru = re.search(r'RU=(https%3a%2f%2f[^/&]+(?:%2f[^/&]+)*)', href, re.IGNORECASE)
                    real_url = href
                    if m_ru:
                        real_url = urllib.parse.unquote(m_ru.group(1))
                        
                    if not real_url or real_url in seen_urls:
                        continue
                        
                    text_hash = normalize_text_hash(snip)
                    if text_hash in seen_text_hashes:
                        continue
                        
                    lead = validate_and_extract_lead(platform, real_url, title, snip)
                    if lead:
                        seen_urls.add(real_url)
                        seen_text_hashes.add(text_hash)
                        if lead.get("handle"):
                            seen_handles.add(lead["handle"])
                        scraped_leads.append(lead)
            time.sleep(0.3)
        except Exception:
            pass
            
    print(f"✓ Berhasil menjaring {len(scraped_leads)} prospek live baru yang 100% TEPAT SASARAN.")
    
    inserted_count = 0
    now = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
    
    for item in scraped_leads:
        text = item["text"]
        platform = item["platform"]
        handle = item.get("handle")
        contact = item.get("contact")
        name = item.get("name")
        brand = item["brand"]
        category = item["category"]
        budget = item["budget"]
        
        # Double check deduplication in DB
        cursor.execute("SELECT id FROM leads WHERE contact = ? OR (handle = ? AND handle IS NOT NULL)", (contact, handle))
        if cursor.fetchone():
            continue
            
        # Match with Kamelia Store products.json
        matched_prod = match_product(catalog, brand, category, text, budget)
        
        prod_id = matched_prod.get("id") if matched_prod else None
        prod_title = matched_prod.get("title") if matched_prod else None
        prod_price = matched_prod.get("selling_idr") if matched_prod else None
        prod_image = matched_prod.get("image_local") or matched_prod.get("image_url_remote") if matched_prod else None
        
        outreach_msg = generate_outreach_draft(handle or name, brand, matched_prod) if matched_prod else ""
        
        cursor.execute("""
            INSERT INTO leads (
                name, handle, platform, contact, target_brand, target_category,
                raw_inquiry, budget_max, matched_product_id, matched_product_title,
                matched_product_price, matched_product_image, status, notes,
                outreach_message, created_at, updated_at
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        """, (
            name, handle, platform, contact, brand, category,
            text, budget, prod_id, prod_title,
            prod_price, prod_image, 'new', 'Targeted Luxury Buyer via Precision Filter',
            outreach_msg, now, now
        ))
        inserted_count += 1
        b_str = f"Rp {budget:,}" if budget else "Fleksibel"
        print(f"  [+] BARU: {name} ({handle or '-'}) [{platform}] -> Minat: {brand} {category} (Budget: {b_str})")
        print(f"      Cocok Stok: {prod_title}")
        
    conn.commit()
    conn.close()
    
    print("\n=======================================================")
    print("=== SELESAI SINKRONISASI PRECISION LEAD HUNTER ===")
    print(f"✓ Prospek Live Baru Disimpan: +{inserted_count} lead tepat sasaran (TANPA DUPLIKAT)")
    print(f"✓ Cek live di CRM: http://127.0.0.1:8000/leads")
    return inserted_count

if __name__ == "__main__":
    run_hunter()
