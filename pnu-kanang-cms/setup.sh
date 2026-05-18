#!/usr/bin/env bash
# ============================================================
# PNU Kanang CMS - One-click setup for Linux / macOS
# ============================================================
# Prerequisites:
#   - PHP 8.1+
#   - Composer
#   - MySQL (XAMPP/MAMP/local)
# ============================================================
set -e

echo ""
echo "============================================================"
echo "  PNU Kanang CMS - Setup Otomatis"
echo "============================================================"
echo ""

# 1. .env
if [ ! -f .env ]; then
    echo "[1/7] Menyalin .env.example -> .env"
    cp .env.example .env
else
    echo "[1/7] .env sudah ada, dilewati."
fi

# 2. Composer
echo ""
echo "[2/7] composer install ..."
composer install --no-interaction --prefer-dist --optimize-autoloader

# 3. App Key
echo ""
echo "[3/7] Generate APP_KEY ..."
php artisan key:generate --force

# 4. Create DB
echo ""
echo "[4/7] Membuat database 'pnu_kanang_cms' (jika belum ada) ..."
mysql -u root -e "CREATE DATABASE IF NOT EXISTS pnu_kanang_cms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;" 2>/dev/null \
    || echo "  (Lewati: silakan buat manual via phpMyAdmin jika gagal)"

# 5. Migrate + seed
echo ""
echo "[5/7] Migrasi & seeder ..."
php artisan migrate:fresh --seed --force

# 6. Symlink storage
echo ""
echo "[6/7] Symlink storage ..."
php artisan storage:link

# 7. Done
echo ""
echo "============================================================"
echo "  SETUP SELESAI!"
echo "============================================================"
echo ""
echo "Jalankan server:    php artisan serve"
echo "Website:            http://127.0.0.1:8000"
echo "Admin Panel:        http://127.0.0.1:8000/admin/login"
echo "Login: admin@pnukanang.local / password123"
echo ""
