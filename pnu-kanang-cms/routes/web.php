<?php

use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\NewsCategoryController as AdminNewsCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\PesantrenProfileController as AdminPesantrenProfileController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\StudentRegistrationController as AdminStudentRegistrationController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Frontend\AnnouncementController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\ProfilController;
use App\Http\Controllers\Frontend\ProgramController;
use App\Http\Controllers\Frontend\RegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Profil
Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/', [ProfilController::class, 'index'])->name('index');
    Route::get('/sejarah', [ProfilController::class, 'sejarah'])->name('sejarah');
    Route::get('/visi-misi', [ProfilController::class, 'visiMisi'])->name('visi_misi');
    Route::get('/struktur-organisasi', [ProfilController::class, 'struktur'])->name('struktur');
    Route::get('/pengasuh', [ProfilController::class, 'pengasuh'])->name('pengasuh');
    Route::get('/fasilitas', [ProfilController::class, 'fasilitas'])->name('fasilitas');
});

// Program
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::get('/program/{slug}', [ProgramController::class, 'show'])->name('program.show');

// Berita
Route::get('/berita', [NewsController::class, 'index'])->name('berita.index');
Route::get('/berita/kategori/{slug}', [NewsController::class, 'category'])->name('berita.category');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('berita.show');

// Pengumuman
Route::get('/pengumuman', [AnnouncementController::class, 'index'])->name('pengumuman.index');
Route::get('/pengumuman/{slug}', [AnnouncementController::class, 'show'])->name('pengumuman.show');

// Galeri
Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri.index');
Route::get('/galeri/kategori/{slug}', [GalleryController::class, 'category'])->name('galeri.category');

// Pendaftaran Santri Baru
Route::get('/pendaftaran', [RegistrationController::class, 'index'])->name('pendaftaran.index');
Route::post('/pendaftaran', [RegistrationController::class, 'store'])->name('pendaftaran.store');
Route::get('/pendaftaran/sukses/{registration_number}', [RegistrationController::class, 'success'])
    ->name('pendaftaran.success');

// Kontak
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');

/*
|--------------------------------------------------------------------------
| Admin Authentication
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminAuthController::class, 'login'])->name('login.attempt');
    });

    Route::post('logout', [AdminAuthController::class, 'logout'])
        ->middleware('auth')->name('logout');

    /*
    |----------------------------------------------------------------------
    | Admin Panel (auth + admin)
    |----------------------------------------------------------------------
    */
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', fn () => redirect()->route('admin.dashboard'));
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // News
        Route::resource('news', AdminNewsController::class);
        Route::resource('news-categories', AdminNewsCategoryController::class)
            ->except(['show']);

        // Announcements
        Route::resource('announcements', AdminAnnouncementController::class)
            ->except(['show']);

        // Galleries
        Route::resource('galleries', AdminGalleryController::class)->except(['show']);
        Route::get('gallery-categories', [AdminGalleryController::class, 'categories'])
            ->name('gallery-categories.index');
        Route::post('gallery-categories', [AdminGalleryController::class, 'storeCategory'])
            ->name('gallery-categories.store');
        Route::delete('gallery-categories/{galleryCategory}', [AdminGalleryController::class, 'destroyCategory'])
            ->name('gallery-categories.destroy');

        // Programs
        Route::resource('programs', AdminProgramController::class)->except(['show']);

        // Profile
        Route::get('profile', [AdminPesantrenProfileController::class, 'index'])->name('profile.index');
        Route::get('profile/{section}/edit', [AdminPesantrenProfileController::class, 'edit'])
            ->name('profile.edit');
        Route::put('profile/{section}', [AdminPesantrenProfileController::class, 'update'])
            ->name('profile.update');

        // Student Registrations
        Route::get('registrations', [AdminStudentRegistrationController::class, 'index'])
            ->name('registrations.index');
        Route::get('registrations/export', [AdminStudentRegistrationController::class, 'export'])
            ->name('registrations.export');
        Route::get('registrations/{registration}', [AdminStudentRegistrationController::class, 'show'])
            ->name('registrations.show');
        Route::patch('registrations/{registration}/status', [AdminStudentRegistrationController::class, 'updateStatus'])
            ->name('registrations.status');
        Route::delete('registrations/{registration}', [AdminStudentRegistrationController::class, 'destroy'])
            ->name('registrations.destroy');

        // Contact Messages
        Route::get('messages', [AdminContactMessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}', [AdminContactMessageController::class, 'show'])->name('messages.show');
        Route::patch('messages/{message}/read', [AdminContactMessageController::class, 'markAsRead'])
            ->name('messages.read');
        Route::delete('messages/{message}', [AdminContactMessageController::class, 'destroy'])
            ->name('messages.destroy');

        // Admin Users
        Route::resource('users', AdminUserController::class)->except(['show']);
    });
});
