# DOKUMEN STANDAR OPERASIONAL PROSEDUR (SOP)
## SISTEM DIGITAL & BISNIS PRE-ORDER KAMELIA STORE
**Dokumen No:** SOP-KS-2026-01  
**Tanggal Berlaku:** 21 September 2026  
**Klasifikasi:** Internal Operational Guide  
**Entitas:** Kamelia Store (Authentic Luxury Pre-Order Boutique & AI Hunter Platform)

---

## DAFTAR ISI
1. [Tujuan & Ruang Lingkup](#1-tujuan--ruang-lingkup)
2. [Hak Akses & Tanggung Jawab Peran (RBAC)](#2-hak-akses--tanggung-jawab-peran-rbac)
3. [SOP-01: Operasional Front-Office & Katalog Digital](#3-sop-01-operasional-front-office--katalog-digital)
4. [SOP-02: Layanan Pelanggan WhatsApp Concierge](#4-sop-02-layanan-pelanggan-whatsapp-concierge)
5. [SOP-03: Siklus Transaksi Pre-Order (Order to Delivery)](#5-sop-03-siklus-transaksi-pre-order-order-to-delivery)
6. [SOP-04: Operasional CRM & AI Lead Hunter Engine](#6-sop-04-operasional-crm--ai-lead-hunter-engine)
7. [SOP-05: Verifikasi Keaslian & Quality Control (QC)](#7-sop-05-verifikasi-keaslian--quality-control-qc)
8. [SOP-06: Manajemen Pengguna & Keamanan Data](#8-sop-06-manajemen-pengguna--keamanan-data)
9. [SOP-07: Pemeliharaan Sistem & Troubleshooting Teknis](#9-sop-07-pemeliharaan-sistem--troubleshooting-teknis)

---

## 1. TUJUAN & RUANG LINGKUP

### 1.1 Tujuan
Dokumen SOP ini disusun sebagai pedoman baku operasional seluruh tim Kamelia Store dalam menjalankan aplikasi web, melayani transaksi pre-order barang mewah (luxury goods), mengoperasikan sistem CRM prospek, menjalankan otomasi AI Lead Hunter, serta menjaga standar mutu layanan dan keaslian produk 100% original.

### 1.2 Ruang Lingkup
SOP ini berlaku untuk:
- Pemilik Bisnis (Owner / Super Admin)
- Tim Sales Concierge & Customer Service (Staff)
- Tim Kurasi & Logistik (Fulfillment)
- Administrator Sistem & IT Maintenance

---

## 2. HAK AKSES & TANGGUNG JAWAB PERAN (RBAC)

Aplikasi Kamelia Store menerapkan sistem *Role-Based Access Control* (RBAC) berbasis 3 tingkatan akun:

| Peran (Role) | Akses Menu & Fitur | Tanggung Jawab Utama |
|---|---|---|
| **Admin** | Seluruh sistem: Dashboard, Katalog, CRM Leads, Auto-Hunter, Manajemen User (`/users`), Profil, Konfigurasi | Pengawasan bisnis menyeluruh, approval pengadaan, evaluasi sales, manajemen akun staf, dan audit keamanan. |
| **Staff** | Dashboard, Katalog, CRM Leads (`/leads`), AI Quick Matcher, Jalankan Auto-Hunter, Profil | Follow-up prospek, chat WhatsApp concierge, input prospek manual, pengawalan status DP & pelunasan pelanggan. |
| **Customer** | Landing page publik, Katalog Toko (`/katalog`), Registrasi/Login Member, Dashboard Profil | Menjelajah katalog, reservasi pesanan via WhatsApp, melihat riwayat akun. |

---

## 3. SOP-01: OPERASIONAL FRONT-OFFICE & KATALOG DIGITAL

### 3.1 Monitoring Landing Page Publik (`/`)
1. Setiap pagi (pukul 08:30 WIB), staf wajib membuka [kamelia-store.com](https://kamelia-store.com) melalui browser desktop dan perangkat mobile/HP.
2. Pastikan elemen berikut tampil presisi:
   - Banner promo atas (*Announcement Bar*).
   - Tombol langsung WhatsApp (navbar & floating button pojok kanan bawah).
   - Grid 6 koleksi *Best Sellers* tampil dengan gambar tajam dan harga rupiah yang benar.
   - Tidak ada layout yang bergeser atau mengalami *horizontal scroll/overflow*.

### 3.2 Pemanfaatan Katalog Digital (`/katalog` atau `/shop`)
1. Katalog memuat **1.500+ koleksi pre-order** aktif dengan filter:
   - **Kategori:** Tas (*Shoulder Bag, Tote, Crossbody, Satchel*), Dompet, Jam Tangan, Aksesori.
   - **Brand:** Coach, Tory Burch, Kate Spade, Michael Kors, Prada, Marc Jacobs, Longchamp, Fossil, Aigner.
   - **Kondisi:** Brand New in Box (BNIB), Like New (Grade A), Excellent.
2. Ketika calon pembeli meminta rekomendasi di WhatsApp, staf **wajib membagikan tautan langsung katalog** dengan parameter filter yang relevan (contoh: `kamelia-store.com/katalog?search=Tory+Burch`).
3. Pelanggan yang mengklik tombol **"Order WA"** pada kartu produk di web akan otomatis mengirimkan pesan berisi nama tas, estimasi harga PO, dan link foto produk ke nomor resmi admin `0899-7919-274`.

---

## 4. SOP-02: LAYANAN PELANGGAN WHATSAPP CONCIERGE

### 4.1 Service Level Agreement (SLA) Respon
- **Jam Operasional:** 09:00 – 21:00 WIB (Senin – Minggu).
- **Target Waktu Respon:** Maksimal **3 menit** pada jam operasional, maksimal **15 menit** di luar jam operasional.

### 4.2 Standar Percakapan & Bahasa (*Tone of Voice*)
- Gunakan bahasa Indonesia yang sopan, elegan, ramah, dan solutif (*Luxury Boutique Tone*).
- Panggilan baku: **"Kak [Nama]"** atau **"Ibu [Nama]"**.
- Dilarang menggunakan singkatan tidak baku (misal: *yg, bsa, jg, gmn*).

### 4.3 Skrip Standar Salam Masuk (Inbound Lead)
```text
"Halo Kak [Nama], salam kenal dari Kamelia Store Concierge ✨ 
Terima kasih sudah menghubungi kami. Terkait tas [Nama Brand/Model] yang Kakak tanyakan, 
unit ini sedang open Pre-Order kloter butik resmi dengan kondisi 100% Original Guaranteed. 
Boleh kami bantu infokan estimasi waktu tiba dan rincian fotonya Kak? 🙏👑"
```

### 4.4 Penanganan Layanan "Request Tas Impian" (Personal Shopper)
Jika pelanggan mengirimkan foto tas yang tidak ada di katalog:
1. Simpan foto referensi dan tanyakan target budget serta warna yang diinginkan.
2. Buka modul CRM menu **AI Quick Matcher** (`/leads`) untuk mengecek apakah ada item serupa di database 1.500+ produk.
3. Jika unit butuh perburuan khusus ke butik luar negeri (USA/Jepang/Eropa), infokan waktu estimasi kurasi 1x24 jam kepada pelanggan.

---

## 5. SOP-03: SIKLUS TRANSAKSI PRE-ORDER (ORDER TO DELIVERY)

Siklus transaksi pre-order berjalan dalam 5 tahapan terstruktur:

```
[1. KONSULTASI & LOCK ITEM] ➡️ [2. PEMBAYARAN DP 30-50%] ➡️ [3. SOURCING & PENGIRIMAN INTL] 
                                                                     ⬇️
[5. PENGIRIMAN EKSPEDISI ASURANSI] ⬅️ [4. QC FISIK & PELUNASAN SISA]
```

### Tahap 1: Penguncian Pesanan & Pembayaran DP
1. Setelah model disetujui, admin membuat **Surat Konfirmasi Reservasi PO (Nota Digital)** memuat:
   - Nama Pelanggan & No. WhatsApp.
   - Nama Produk, Brand, Warna, Seri.
   - Total Harga PO (sudah termasuk estimasi ongkir internasional & pajak butik).
   - Nilai Down Payment (DP) minimal **30% s.d. 50%**.
   - Estimasi kedatangan (umumnya 2 – 4 minggu).
2. Pembayaran hanya sah jika ditransfer ke rekening resmi atas nama Kamelia Store / Rekening Resmi Owner yang terverifikasi.
3. Begitu DP diterima, ubah status prospek di CRM menjadi **"interested"** atau **"closed (DP)"**.

### Tahap 2: Pengadaan Butik (*Sourcing*)
1. Tim kurasi luar negeri mengamankan unit fisik di butik mitra resmi.
2. Simpan tanda terima pembelian resmi butik (*gift receipt / purchase invoice*).
3. Paket diterbangkan ke Indonesia menggunakan kargo terproteksi dengan nomor pelacakan (*airway bill*).

### Tahap 3: Penerimaan & QC Fisik di Kantor Kamelia Store
1. Paket tiba di kantor inspeksi Kamelia Store.
2. Tim logistik melakukan tahapan Quality Control (sesuai **SOP-05**).
3. Rekam video penampakan fisik produk secara menyeluruh (*360 degree video*) dan kirimkan ke WhatsApp pelanggan sebagai bukti kesiapan barang.

### Tahap 4: Pelunasan Sisa Tagihan
1. Infokan kepada pelanggan bahwa tas impiannya sudah lolos QC dan siap dikirim:
```text
"Kabar gembira Kak [Nama]! ✨ Paket tas [Nama Produk] pesanan Kakak telah tiba dengan selamat 
di kantor Kamelia Store dan telah lolos uji fisik 100% Authentic QC Pass. 
Berikut kami lampirkan video detail unitnya ya Kak. 
Setelah pelunasan sisa tagihan terkonfirmasi, paket akan segera kami kirimkan 
dengan proteksi asuransi penuh ke alamat Kakak. 🙏📦"
```
2. Pastikan dana pelunasan telah masuk ke rekening sebelum paket diserahkan ke kurir.

### Tahap 5: Pengemasan & Pengiriman Berasuransi
1. Kemas produk dengan standar proteksi mewah:
   - Dustbag pelindung asli.
   - *Bubble wrap* tebal minimal 4 lapis.
   - Kotak karton tebal (*double wall box*).
   - Segel stiker garansi Kamelia Store & kartu garansi keaslian seumur hidup.
2. Wajib menggunakan ekspedisi express (JNE YES / SiCepat Best / Paxel) dengan **wajib menyertakan asuransi barang mewah**.
3. Bagikan nomor resi ke WhatsApp pelanggan di hari yang sama sebelum pukul 19:00 WIB.

---

## 6. SOP-04: OPERASIONAL CRM & AI LEAD HUNTER ENGINE

Menu CRM (`/leads`) adalah pusat pertumbuhan bisnis untuk menemukan dan mengelola calon pembeli secara proaktif.

### 6.1 Siklus Status Prospek (Lead Pipeline)
Staf wajib memperbarui status prospek sesuai perkembangan riil:
1. `new` (**Prospek Baru**): Data hasil tangkapan scraper atau input manual yang belum pernah dihubungi.
2. `contacted` (**Sudah Dihubungi**): Sudah dikirim pesan penawaran perdana (DM/WA), menunggu respons.
3. `interested` (**Tertarik / Konsultasi**): Calon pembeli merespons positif, sedang memilih model/tanya budget.
4. `closed` (**Deal / Selesai Transaksi**): Pelanggan telah membayar DP atau melunasi tas.
5. `lost` (**Batal / Tidak Sesuai**): Prospek tidak membalas setelah 3x follow-up atau budget tidak tercapai.

### 6.2 Menjalankan Robot Auto-Hunter (`hunt_leads.py`)
1. Buka menu **CRM Prospek** (`/leads`).
2. Klik tombol oranye **"🚀 Jalankan Auto-Hunter"**.
3. Sistem akan mengeksekusi modul Python (`hunt_leads.py`) untuk memindai unggahan publik di media sosial (Instagram, TikTok, Carousell, Twitter/X, FB) yang memuat kata kunci ber-intent tinggi (contoh: *"lagi cari tas Coach Cassie under 3jt"*, *"info olshop pre-order Tory Burch original"*).
4. Hasil pemindaian akan otomatis masuk ke tabel CRM dengan kalkulasi skor kecocokan produk (*match score*).
5. **Jadwal Eksekusi Rutin:**
   - Sesi Pagi: 09:00 WIB
   - Sesi Siang: 14:00 WIB
   - Sesi Malam: 19:30 WIB

### 6.3 Penggunaan Modul "AI Quick Matcher"
Fitur ini digunakan saat menemukan komentar medsos atau pesan chat panjang:
1. Klik tombol hijau **"⚡ AI Quick Matcher"**.
2. Salin-tempel kalimat calon pembeli (contoh: *"kak ada rekomendasi tas tory burch buat kantor budget maks 4,5 juta?"*).
3. Klik **"Analisis & Cocokkan"**.
4. Mesin cerdas akan otomatis:
   - Mendeteksi Brand (`Tory Burch`).
   - Mendeteksi Kategori (`Tas`).
   - Mendeteksi Plafon Budget (`Rp 4.500.000`).
   - Memilih 3 koleksi terbaik dari database 1.500+ produk.
   - Menghasilkan draf pesan penawaran elegan (*Outreach Draft*).
5. Klik **"Simpan ke CRM & Kirim Penawaran"**.

### 6.4 Etika & Aturan Outreach (Anti-Spam)
- Dilarang mengirim pesan massal (*blast*) yang kaku seperti bot.
- Selalu personalisasi sapaan nama/handle medsos target.
- Batas kontak: Jika prospek tidak membalas dalam 48 jam, kirimkan 1x *gentle reminder*. Jika tetap tidak ada respons, ubah status menjadi `lost` dan jangan lakukan *spamming*.

---

## 7. SOP-05: VERIFIKASI KEASLIAN & QUALITY CONTROL (QC)

Kamelia Store memegang komitmen **100% Money-Back Guarantee Policy**. Setiap unit wajib lolos 4 titik inspeksi:

| Titik Inspeksi | Prosedur Pemeriksaan | Tolok Ukur Kelulusan (QC Pass) |
|---|---|---|
| **1. Material & Kulit** | Cek aroma kulit, kelenturan, tekstur (*pebbled, saffiano, smooth glove-tanned*). | Aroma khas kulit asli alami, tidak berbau kimia plastik menyengat, pola butiran kulit rapi dan konsisten. |
| **2. Jahitan (Stitching)** | Periksa jahitan tepi, tali pegangan, dan sudut sambungan tas. | Jahitan lurus presisi, spasi antar jahitan simetris, benang tebal terikat kuat tanpa ada serat terurai. |
| **3. Hardware & Zipper** | Uji geser ritsleting (*zipper* YKK/riri/lampo), bobot logam, ukiran grafir logo. | Logam terasa berat dan padat (bukan plastik berlapis), warna emas/perak rata anti-gores, geseran ritsleting halus. |
| **4. Tag & Serial Code** | Periksa *leather creed patch*, *date code*, label butik resmi, dan kelengkapan *care card*. | Font cetakan nomor seri tajam, nomor seri valid sesuai tahun produksi dan basis data pabrikan resmi. |

*Jika ada keraguan fisik sekecil apapun pada unit barang, barang **DITOLAK** dan unit diganti baru sebelum dikirim ke pelanggan.*

---

## 8. SOP-06: MANAJEMEN PENGGUNA & KEAMANAN DATA

### 8.1 Pembuatan Akun Staf Baru
1. Hanya **Admin** yang berwenang membuka menu **Manajemen Pengguna** (`/users`).
2. Masukkan nama lengkap, alamat email resmi kantor, pilih Role `staff`, dan masukkan kata sandi kuat.
3. Berikan akun kepada staf bersangkutan dengan kewajiban mengganti kata sandi pada saat login pertama kali.
4. Jika staf berhenti bekerja, akun wajib dinonaktifkan/dihapus pada hari yang sama pukul 17:00 WIB.

### 8.2 Standar Keamanan Akun
- Setiap staf dilarang membagikan kredensial login kepada pihak luar.
- Sistem dilengkapi proteksi **Rate Limiting** (maksimal 5x percobaan salah berturut-turut akan diblokir sementara).
- Formulir pendaftaran publik dilindungi oleh algoritma **Honeypot Anti-Bot** untuk mencegah pendaftaran spam otomatis.

---

## 9. SOP-07: PEMELIHARAAN SISTEM & TROUBLESHOOTING TEKNIS

### 9.1 Perintah Pembersihan Cache Rutin (Maintenance Server)
Setiap kali ada pembaruan kode atau penambahan rute baru, jalankan perintah ini via Terminal cPanel/SSH:
```bash
# 1. Bersihkan seluruh cache aplikasi, rute, dan view
php artisan optimize:clear

# 2. Re-compile cache rute & konfigurasi untuk kecepatan optimal (Opsional di production)
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 9.2 Kompilasi Aset Frontend (Vite)
Jika ada pengubahan desain Tailwind CSS atau layout Blade:
```bash
npm run build
```
Pastikan file bundle di folder `public/build/` terunggah ke hosting.

### 9.3 Penanganan Error Umum

#### Masalah: Halaman 500 / "Undefined Variable"
- **Penyebab:** Cache rute di server hosting masih mengeksekusi rute versi lama sebelum kode diperbarui.
- **Solusi:** Jalankan `php artisan optimize:clear` di terminal hosting.

#### Masalah: Auto-Hunter Python Tidak Merespons
- **Penyebab:** Python di server hosting belum terpasang modul `bs4`, `primp`, atau versi Python berbeda.
- **Solusi:** Pastikan lingkungan Python hosting memiliki dependensi yang tertera pada `hunt_leads.py`, atau jalankan skrip melalui Task Scheduler / Cron Job terjadwal di VPS.

#### Masalah: Foto Katalog Tidak Muncul
- **Penyebab:** Folder `public/catalog_images/` belum memiliki permission baca yang cukup (minimal `755`).
- **Solusi:** Pastikan izin direktori file gambar pada cPanel disetel ke `0755` untuk folder dan `0644` untuk file foto.

---

**Ditetapkan di:** Jakarta  
**Disahkan Oleh:** Manajemen Kamelia Store  
**Status Dokumen:** Aktif & Mengikat Seluruh Tim Operasional
