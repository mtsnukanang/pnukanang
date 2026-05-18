@echo off
REM ============================================================
REM PNU Kanang CMS - One-click setup for XAMPP (Windows)
REM ============================================================
REM Prerequisites:
REM   - XAMPP with Apache & MySQL running
REM   - PHP 8.1+ in PATH (or use C:\xampp\php\php.exe)
REM   - Composer installed
REM ============================================================

echo.
echo ============================================================
echo   PNU Kanang CMS - Setup Otomatis
echo ============================================================
echo.

REM 1. Copy .env if not exists
if not exist .env (
    echo [1/7] Membuat file .env dari .env.example ...
    copy .env.example .env
) else (
    echo [1/7] File .env sudah ada, dilewati.
)

REM 2. Install Composer dependencies
echo.
echo [2/7] Menginstall dependencies Composer ...
call composer install --no-interaction --prefer-dist --optimize-autoloader
if errorlevel 1 (
    echo Gagal menjalankan composer install. Pastikan Composer terpasang.
    pause
    exit /b 1
)

REM 3. Generate APP_KEY
echo.
echo [3/7] Generate APP_KEY ...
php artisan key:generate --force

REM 4. Create database (MySQL must be running)
echo.
echo [4/7] Membuat database 'pnu_kanang_cms' jika belum ada ...
"%~dp0\..\..\xampp\mysql\bin\mysql.exe" -u root -e "CREATE DATABASE IF NOT EXISTS pnu_kanang_cms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;" 2>nul
if errorlevel 1 (
    REM fallback: try plain mysql command from PATH
    mysql -u root -e "CREATE DATABASE IF NOT EXISTS pnu_kanang_cms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;" 2>nul
)
echo Jika perintah di atas gagal, buat database 'pnu_kanang_cms' manual via phpMyAdmin.

REM 5. Run migration + seed
echo.
echo [5/7] Menjalankan migrasi dan seeder ...
php artisan migrate:fresh --seed --force
if errorlevel 1 (
    echo Migrasi gagal. Pastikan MySQL berjalan dan database sudah dibuat.
    pause
    exit /b 1
)

REM 6. Symlink storage
echo.
echo [6/7] Membuat symlink storage ...
php artisan storage:link

REM 7. Done
echo.
echo ============================================================
echo   SETUP SELESAI!
echo ============================================================
echo.
echo Jalankan server dengan perintah:
echo     php artisan serve
echo.
echo Buka browser:
echo     Website : http://127.0.0.1:8000
echo     Admin   : http://127.0.0.1:8000/admin/login
echo.
echo Login Admin:
echo     Email    : admin@pnukanang.local
echo     Password : password123
echo.
pause
