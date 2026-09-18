# 👜 Kamelia Store - Luxury Pre-Order & AI Lead Hunter Platform

Aplikasi web e-commerce butik barang mewah (Coach, Tory Burch, Fossil, Marc Jacobs, Kate Spade, Longchamp, Prada, dll.) hasil kurasi pre-order Jepang terintegrasi dengan **AI Matchmaker CRM** dan robot otomatis **Social Media Lead Hunter**.

---

## ✨ Fitur Utama

1. **E-Commerce Luxury Boutique Catalog**:
   - Filter brand, kategori (Tas, Dompet, Jam Tangan, Sabuk), kondisi, rentang harga, dan sorting dinamis.
   - Perhitungan harga otomatis: kurs Yen $\rightarrow$ Rupiah, estimasi ongkir internasional, proteksi margin laba (50%), dan perbandingan harga ritel.
   - Integrasi WhatsApp Concierge Direct Order untuk transaksi pre-order eksklusif.
2. **AI CRM Lead Hunter & Matchmaker**:
   - Robot Python otomatis (`hunt_leads.py`) memindai calon pembeli ber-intent tinggi (WTB, rekomendasi, cari tas under budget) di media sosial.
   - Algoritma pencocokan produk (*AI scoring*) otomatis memilih item paling relevan di katalog.
   - Pembuatan draf pesan penawaran personal (*concierge outreach*) otomatis.
3. **Multi-Role User Management**:
   - Role-based Access Control (Admin, Staff, Customer VIP).
   - CRUD manajemen prospek dan pipeline penjualan (New, Contacted, Interested, Closed, Lost).

---

## 🛠️ Persyaratan Server / Hosting

- **PHP**: ^8.2 atau lebih baru
- **Ekstensi PHP**: `bcmath`, `ctype`, `curl`, `dom`, `fileinfo`, `json`, `mbstring`, `openssl`, `pcre`, `pdo`, `pdo_mysql` (atau `pdo_sqlite`), `tokenizer`, `xml`
- **Web Server**: Apache / Nginx / LiteSpeed
- **Database**: MySQL 8.0+ / MariaDB 10.4+ atau SQLite 3
- **Composer**: ^2.0
- **Python**: 3.9+ (Opsional untuk menjalankan Lead Hunter & Scraper di background/cron job)

---

## 🚀 Panduan Instalasi & Deploy ke Hosting

### Opsi 1: Deploy ke cPanel / Shared Hosting

1. **Clone / Upload Source Code**:
   - Buat Git Repository di cPanel (*Git™ Version Control*) atau clone repository ini ke folder di luar `public_html` (misal `/home/username/kameliastore`).
2. **Setup Document Root**:
   - Arahkan Document Root domain/subdomain Anda ke folder `kameliastore/public`.
3. **Setup Konfigurasi (.env)**:
   - Salin `.env.example` menjadi `.env`.
   - Sesuaikan konfigurasi berikut:
     ```env
     APP_NAME="Kamelia Store"
     APP_ENV=production
     APP_DEBUG=false
     APP_URL=https://domainanda.com

     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=nama_db_cpanel
     DB_USERNAME=user_db_cpanel
     DB_PASSWORD=password_db_cpanel
     ```
4. **Jalankan Perintah Artisan**:
   Melalui menu **Terminal** di cPanel atau SSH:
   ```bash
   composer install --no-dev --optimize-autoloader
   php artisan key:generate
   php artisan migrate --seed
   php artisan storage:link
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

### Opsi 2: Deploy ke VPS (Ubuntu / Debian + Nginx / Apache)

```bash
# 1. Clone repository
git clone <URL_REPO_GITHUB_ANDA> /var/www/kameliastore
cd /var/www/kameliastore

# 2. Install dependencies & setup env
composer install --no-dev --optimize-autoloader
cp .env.example .env
nano .env # Sesuaikan DB dan APP_URL

# 3. Setup Laravel
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan optimize

# 4. Beri izin hak akses (permission)
sudo chown -R www-data:www-data /var/www/kameliastore/storage /var/www/kameliastore/bootstrap/cache
sudo chmod -R 775 /var/www/kameliastore/storage /var/www/kameliastore/bootstrap/cache
```

---

## 🔑 Akun Default (Seeder)

Setelah menjalankan `php artisan migrate --seed`:

| Role | Email | Password |
| :--- | :--- | :--- |
| **Super Admin** | `admin@kameliastore.com` | `password` |
| **Staff Concierge** | `staff@kameliastore.com` | `password` |
| **Customer VIP** | `customer@kameliastore.com` | `password` |

> ⚠️ *Segera ganti password akun setelah deployment ke server produksi!*

---

## 🤖 Menjalankan Lead Hunter (Otomatisasi)

Untuk menjalankan pemindaian calon pembeli:
- **Via Web Dashboard**: Masuk ke menu **CRM Prospek** $\rightarrow$ Klik tombol **"Jalankan Hunter Otomatis"**.
- **Via Terminal / Cron Job Server**:
  ```bash
  python hunt_leads.py
  ```
