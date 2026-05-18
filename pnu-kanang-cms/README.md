# PNU Kanang CMS

CMS Pondok Pesantren Nahdlatul Ummah Kanang — Laravel 10 + Bootstrap 5.

## Fitur

### Frontend Publik
- Beranda dengan hero, sambutan pengasuh, program unggulan, statistik, berita, galeri, pengumuman, CTA pendaftaran
- Profil Pesantren (Sejarah, Visi & Misi, Struktur Organisasi, Pengasuh, Fasilitas)
- Program Pendidikan (Madrasah Diniyah, Tahfidz, Kitab Kuning, dll)
- Berita dengan kategori, search, dan halaman detail
- Pengumuman resmi
- Galeri foto dengan kategori dan lightbox
- Pendaftaran Santri Baru online (data tersimpan di database)
- Kontak dengan form kontak + Google Maps embed

### Admin CMS
- Login admin dengan auth + middleware
- Dashboard dengan ringkasan statistik
- Manajemen Berita (CRUD + kategori + featured image + draft/publish)
- Manajemen Pengumuman (CRUD + aktif/nonaktif)
- Manajemen Galeri (upload + kategori + grid view)
- Manajemen Program Pendidikan (CRUD + icon + gambar)
- Manajemen Profil Pesantren (edit per section)
- Manajemen Pendaftar (lihat detail, ubah status, export CSV, hapus)
- Manajemen Pesan Kontak (lihat, balas via email/WA, hapus)
- Manajemen User Admin (CRUD + ganti password)

## Persyaratan

- **PHP 8.1+** (XAMPP terbaru sudah support)
- **MySQL 5.7+** atau **MariaDB 10.3+** (XAMPP)
- **Composer** ([download](https://getcomposer.org))
- **Apache & MySQL** dari XAMPP berjalan

## Instalasi Cepat (XAMPP - Windows)

1. **Salin folder** `pnu-kanang-cms` ke direktori manapun (misal `C:\xampp\htdocs\pnu-kanang-cms` atau `C:\projects\pnu-kanang-cms`).
2. **Buka Command Prompt** di dalam folder `pnu-kanang-cms`.
3. Pastikan **Apache & MySQL XAMPP sudah running**.
4. Jalankan:
   ```
   setup.bat
   ```
5. Setelah selesai, jalankan server:
   ```
   php artisan serve
   ```
6. Buka:
   - Website: http://127.0.0.1:8000
   - Admin: http://127.0.0.1:8000/admin/login

### Linux / macOS

```bash
chmod +x setup.sh
./setup.sh
php artisan serve
```

## Instalasi Manual (langkah per langkah)

```bash
# 1. Salin .env
cp .env.example .env

# 2. Install dependencies
composer install

# 3. Generate APP_KEY
php artisan key:generate

# 4. Buat database via phpMyAdmin atau CLI
mysql -u root -e "CREATE DATABASE pnu_kanang_cms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# 5. Migrate + seed
php artisan migrate:fresh --seed

# 6. Symlink storage
php artisan storage:link

# 7. Run server
php artisan serve
```

## Konfigurasi `.env`

Default sudah disesuaikan untuk XAMPP MySQL tanpa password:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pnu_kanang_cms
DB_USERNAME=root
DB_PASSWORD=
```

Jika MySQL Anda memakai password, isi `DB_PASSWORD` sesuai konfigurasi.

## Akun Default

| Role  | Email                   | Password    |
|-------|-------------------------|-------------|
| Admin | admin@pnukanang.local   | password123 |

> Wajib diganti setelah login pertama via menu **User Admin**.

## URL Penting

- Website Publik: http://127.0.0.1:8000
- Admin Login: http://127.0.0.1:8000/admin/login
- Admin Dashboard: http://127.0.0.1:8000/admin/dashboard

## Stack Teknologi

- **Backend:** Laravel 10 (PHP 8.1+)
- **Database:** MySQL/MariaDB
- **Frontend:** Bootstrap 5.3 + Bootstrap Icons + Poppins font (CDN)
- **Storage:** Laravel local disk dengan public symlink

## Struktur Direktori

```
pnu-kanang-cms/
├── app/
│   ├── Http/
│   │   ├── Controllers/Admin/      <- 11 admin controllers
│   │   ├── Controllers/Frontend/   <- 8 frontend controllers
│   │   ├── Middleware/             <- AdminMiddleware, ShareGlobalSettings
│   │   └── Requests/
│   └── Models/                     <- 11 Eloquent models
├── database/
│   ├── migrations/                 <- 12 migrations
│   └── seeders/                    <- 8 seeders + DatabaseSeeder
├── public/
│   ├── css/{app,admin}.css         <- NU theme stylesheets
│   ├── js/{app,admin}.js
│   └── img/                        <- SVG assets
├── resources/views/
│   ├── layouts/{app,admin}.blade.php
│   ├── frontend/                   <- Public pages
│   └── admin/                      <- CMS panel
└── routes/web.php
```

## Lisensi

MIT
