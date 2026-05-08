<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfilYayasanController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\User\PendaftaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
*/

// ==================== PUBLIC ROUTES ====================
Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('/tentang', [UserController::class, 'profilYayasanIndex'])->name('tentang');
Route::get('/struktur', [UserController::class, 'strukturIndex'])->name('struktur');
Route::get('/fasilitas', [UserController::class, 'fasilitas'])->name('fasilitas');
Route::get('/fasilitas/{id}', [UserController::class, 'fasilitasShow'])->name('fasilitas.detail');
Route::get('/galeri', [UserController::class, 'galeri'])->name('galeri');
Route::get('/hubungi', [UserController::class, 'hubungi'])->name('hubungi');
Route::post('/daftar', [AdminController::class, 'santriStore'])->name('daftar');
Route::post('/send-feedback', [FeedbackController::class, 'sendFeedback'])->name('send.feedback');

// ==================== LOGIN & REGISTER ====================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');

// ==================== NOTIFICATIONS ====================
Route::get('/notifications', [UserController::class, 'notifications'])->name('notifications');
Route::post('/notifications/{id}/mark-read', [UserController::class, 'markAsRead'])->name('notifications.mark-read');
Route::post('/notifications/mark-all-read', [UserController::class, 'markAllRead'])->name('notifications.mark-all-read');
Route::get('/notifications/unread-count', [UserController::class, 'unreadCount'])->name('notifications.unread-count');

// ==================== PENDAFTARAN PUBLIC ====================
Route::get('/pendaftaran', function () {
    return redirect()->route('user.pendaftaran.index');
})->name('pendaftaran');

Route::prefix('pendaftaran')->name('user.pendaftaran.')->group(function () {
    Route::get('/cek-status', [App\Http\Controllers\User\PendaftaranController::class, 'cekStatusForm'])->name('cek-status');
    Route::post('/cek-status', [App\Http\Controllers\User\PendaftaranController::class, 'cekStatus'])->name('cek-status.post');
});

// ==================== ADMIN ROUTES ====================
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Feedback & WhatsApp
        Route::get('/feedback', [AdminController::class, 'feedbackIndex'])->name('feedback.index');
        Route::get('/feedback/{id}', [AdminController::class, 'feedbackShow'])->name('feedback.show');
        Route::delete('/feedback/{id}', [AdminController::class, 'feedbackDestroy'])->name('feedback.destroy');
        Route::post('/feedback/mark-all-read', [AdminController::class, 'feedbackMarkAllRead'])->name('feedback.mark-all-read');
        Route::post('/feedback/{id}/mark-read', [AdminController::class, 'feedbackMarkAsRead'])->name('feedback.mark-read');
        Route::get('/feedback/unread-count', [AdminController::class, 'feedbackUnreadCount'])->name('feedback.unread-count');
        Route::post('/feedback/{id}/reply-whatsapp', [AdminController::class, 'feedbackReplyWhatsApp'])->name('feedback.reply-whatsapp');
        Route::get('/whatsapp/status', [AdminController::class, 'checkWhatsAppStatus'])->name('whatsapp.status');

        // Data Santri
        Route::get('/data-santri', [AdminController::class, 'dataSantri'])->name('data-santri.index');
        Route::get('/data-santri/{id}', [AdminController::class, 'santriShow'])->name('data-santri.show');
        Route::get('/data-santri/{id}/edit', [AdminController::class, 'santriEdit'])->name('data-santri.edit');
        Route::put('/data-santri/{id}', [AdminController::class, 'santriUpdate'])->name('data-santri.update');
        Route::delete('/data-santri/{id}', [AdminController::class, 'santriDestroy'])->name('data-santri.destroy');

        // Data Pendaftar
        Route::get('/pendaftar', [AdminController::class, 'dataPendaftar'])->name('pendaftar.index');
        Route::get('/pendaftar/{id}', [AdminController::class, 'santriShow'])->name('pendaftar.show');
        Route::get('/pendaftar/{id}/edit', [AdminController::class, 'santriEdit'])->name('pendaftar.edit');
        Route::put('/pendaftar/{id}', [AdminController::class, 'santriUpdate'])->name('pendaftar.update');
        Route::delete('/pendaftar/{id}', [AdminController::class, 'santriDestroy'])->name('pendaftar.destroy');
        Route::post('/pendaftar/{id}/verify', [AdminController::class, 'verifySantri'])->name('pendaftar.verify');
        Route::post('/pendaftar/{id}/reject', [AdminController::class, 'rejectSantri'])->name('pendaftar.reject');
         Route::post('/pendaftar', [AdminController::class, 'santriStore'])->name('pendaftar.store');

         // Biaya Pendaftaran (CRUD)
Route::resource('biaya-pendaftaran', \App\Http\Controllers\Admin\BiayaPendaftaranController::class);
Route::post('biaya-pendaftaran/{id}/toggle-status', [\App\Http\Controllers\Admin\BiayaPendaftaranController::class, 'toggleStatus'])->name('biaya-pendaftaran.toggle-status');

        // Santri
        Route::get('/santri', [AdminController::class, 'santriIndex'])->name('santri.index');
        Route::get('/santri/create', [AdminController::class, 'santriCreate'])->name('santri.create');
        Route::post('/santri', [AdminController::class, 'santriStore'])->name('santri.store');
        Route::get('/santri/{id}', [AdminController::class, 'santriShow'])->name('santri.show');
        Route::get('/santri/{id}/edit', [AdminController::class, 'santriEdit'])->name('santri.edit');
        Route::put('/santri/{id}', [AdminController::class, 'santriUpdate'])->name('santri.update');
        Route::delete('/santri/{id}', [AdminController::class, 'santriDestroy'])->name('santri.destroy');
        Route::post('/santri/{id}/verify', [AdminController::class, 'verifySantri'])->name('santri.verify');
        Route::post('/santri/{id}/reject', [AdminController::class, 'rejectSantri'])->name('santri.reject');

        // Pegawai
        Route::get('/pegawai', [AdminController::class, 'pegawaiIndex'])->name('pegawai.index');
        Route::get('/pegawai/create', [AdminController::class, 'pegawaiCreate'])->name('pegawai.create');
        Route::post('/pegawai/store', [AdminController::class, 'pegawaiStore'])->name('pegawai.store');
        Route::get('/pegawai/{id}', [AdminController::class, 'pegawaiShow'])->name('pegawai.show');
        Route::get('/pegawai/{id}/edit', [AdminController::class, 'pegawaiEdit'])->name('pegawai.edit');
        Route::put('/pegawai/{id}', [AdminController::class, 'pegawaiUpdate'])->name('pegawai.update');
        Route::delete('/pegawai/{id}', [AdminController::class, 'pegawaiDestroy'])->name('pegawai.destroy');

        // SK
        Route::get('/sk', [AdminController::class, 'skIndex'])->name('sk.index');
        Route::get('/sk/create', [AdminController::class, 'skCreate'])->name('sk.create');
        Route::post('/sk', [AdminController::class, 'skStore'])->name('sk.store');
        Route::get('/sk/{id}', [AdminController::class, 'skShow'])->name('sk.show');
        Route::get('/sk/{id}/edit', [AdminController::class, 'skEdit'])->name('sk.edit');
        Route::put('/sk/{id}', [AdminController::class, 'skUpdate'])->name('sk.update');
        Route::delete('/sk/{id}', [AdminController::class, 'skDestroy'])->name('sk.destroy');

        // Akta Yayasan
        Route::get('/akta-yayasan', [AdminController::class, 'aktaYayasanIndex'])->name('akta-yayasan.index');
        Route::get('/akta-yayasan/create', [AdminController::class, 'aktaYayasanCreate'])->name('akta-yayasan.create');
        Route::post('/akta-yayasan', [AdminController::class, 'aktaYayasanStore'])->name('akta-yayasan.store');
        Route::get('/akta-yayasan/{id}', [AdminController::class, 'aktaYayasanShow'])->name('akta-yayasan.show');
        Route::get('/akta-yayasan/{id}/edit', [AdminController::class, 'aktaYayasanEdit'])->name('akta-yayasan.edit');
        Route::put('/akta-yayasan/{id}', [AdminController::class, 'aktaYayasanUpdate'])->name('akta-yayasan.update');
        Route::delete('/akta-yayasan/{id}', [AdminController::class, 'aktaYayasanDestroy'])->name('akta-yayasan.destroy');

        // Akta Wakaf
        Route::get('/akta-wakaf', [AdminController::class, 'aktaWakafIndex'])->name('akta-wakaf.index');
        Route::get('/akta-wakaf/create', [AdminController::class, 'aktaWakafCreate'])->name('akta-wakaf.create');
        Route::post('/akta-wakaf', [AdminController::class, 'aktaWakafStore'])->name('akta-wakaf.store');
        Route::get('/akta-wakaf/{id}', [AdminController::class, 'aktaWakafShow'])->name('akta-wakaf.show');
        Route::get('/akta-wakaf/{id}/edit', [AdminController::class, 'aktaWakafEdit'])->name('akta-wakaf.edit');
        Route::put('/akta-wakaf/{id}', [AdminController::class, 'aktaWakafUpdate'])->name('akta-wakaf.update');
        Route::delete('/akta-wakaf/{id}', [AdminController::class, 'aktaWakafDestroy'])->name('akta-wakaf.destroy');

        // Data Master
        Route::prefix('data-master')->name('data-master.')->group(function () {
            Route::get('/', [DataMasterController::class, 'index'])->name('index');
            Route::get('/profil-yayasan', [ProfilYayasanController::class, 'index'])->name('profil-yayasan');
            Route::get('/profil-yayasan/edit', [ProfilYayasanController::class, 'edit'])->name('profil-yayasan.edit');
            Route::post('/profil-yayasan/update', [ProfilYayasanController::class, 'update'])->name('profil-yayasan.update');
            Route::put('/profil-yayasan/update', [ProfilYayasanController::class, 'update'])->name('profil-yayasan.update.put');
        });

        // Profile & Settings
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('profile.update');
        Route::post('/profile/change-password', [AdminController::class, 'changePassword'])->name('profile.change-password');
        Route::post('/profile/change-email', [AdminController::class, 'changeEmail'])->name('profile.change-email');
    });

// ==================== ADMIN DATA MASTER ====================
Route::prefix('admin/data-master')
    ->name('admin.data-master.')
    ->middleware(['auth', 'admin'])  // ← HAPUS 'superadmin'
    ->group(function () {
        Route::resource('struktur-organisasi', StrukturOrganisasiController::class);
        Route::resource('fasilitas', FasilitasController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('profil', ProfilYayasanController::class);
        Route::resource('program', ProgramController::class);
    });

// ==================== ADMIN PENDAFTARAN ====================
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])  // ← HAPUS 'superadmin'
    ->group(function () {
        Route::prefix('pendaftaran')->name('pendaftaran.')->group(function () {
            Route::resource('waves', \App\Http\Controllers\Admin\RegistrationWaveController::class);
            Route::post('waves/{wave}/toggle-active', [\App\Http\Controllers\Admin\RegistrationWaveController::class, 'toggleActive'])->name('waves.toggle-active');
            Route::post('santri/{id}/process-acceptance', [\App\Http\Controllers\Admin\RegistrationWaveController::class, 'processAcceptance'])->name('santri.process-acceptance');
            Route::post('santri/bulk-acceptance', [\App\Http\Controllers\Admin\RegistrationWaveController::class, 'bulkAcceptance'])->name('santri.bulk-acceptance');
        });
    });

// ==================== ADMIN PROGRAM ====================
Route::middleware(['auth', 'admin'])  // ← HAPUS 'superadmin'
    ->prefix('admin')->name('admin.')->group(function () {
        Route::resource('program', ProgramController::class);
    });

// ==================== SUPERADMIN ROUTES ====================
Route::prefix('admin')->name('admin.')->middleware(['auth', 'superadmin'])->group(function () {
    Route::resource('admin-management', \App\Http\Controllers\Admin\AdminManagementController::class);
    Route::get('admin-management/toggle-status/{id}', [\App\Http\Controllers\Admin\AdminManagementController::class, 'toggleStatus'])->name('admin-management.toggle-status');
    Route::post('admin-management/bulk-action', [\App\Http\Controllers\Admin\AdminManagementController::class, 'bulkAction'])->name('admin-management.bulk-action');
});

// ==================== USER ROUTES ====================
Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-password', [UserController::class, 'changePassword'])->name('profile.change-password');
    Route::post('/profile/upload-avatar', [UserController::class, 'uploadAvatar'])->name('profile.upload-avatar');

    Route::get('/santri', [UserController::class, 'santriIndex'])->name('santri.index');
    Route::get('/santri/create', [UserController::class, 'santriCreate'])->name('santri.create');
    Route::post('/santri', [UserController::class, 'santriStore'])->name('santri.store');
    Route::get('/santri/{id}', [UserController::class, 'santriShow'])->name('santri.show');
    Route::get('/santri/{id}/edit', [UserController::class, 'santriEdit'])->name('santri.edit');
    Route::put('/santri/{id}', [UserController::class, 'santriUpdate'])->name('santri.update');
    Route::delete('/santri/{id}', [UserController::class, 'santriDestroy'])->name('santri.destroy');

    Route::get('/gallery', [UserController::class, 'galleryIndex'])->name('gallery.index');
    Route::get('/gallery/{id}', [UserController::class, 'galleryShow'])->name('gallery.show');
    Route::get('/program', [UserController::class, 'programIndex'])->name('program.index');
    Route::get('/program/{id}', [UserController::class, 'programShow'])->name('program.show');
    Route::get('/struktur-organisasi', [UserController::class, 'strukturIndex'])->name('struktur.index');
    Route::get('/struktur-organisasi/{id}', [UserController::class, 'strukturShow'])->name('struktur.show');
    Route::get('/profil-yayasan', [UserController::class, 'profilYayasanIndex'])->name('profil-yayasan.index');
    Route::get('/profil-yayasan/{id}', [UserController::class, 'profilYayasanShow'])->name('profil-yayasan.show');
    Route::get('/akta-yayasan', [UserController::class, 'aktaYayasanIndex'])->name('akta-yayasan.index');
    Route::get('/akta-yayasan/{id}', [UserController::class, 'aktaYayasanShow'])->name('akta-yayasan.show');
    Route::get('/akta-wakaf', [UserController::class, 'aktaWakafIndex'])->name('akta-wakaf.index');
    Route::get('/akta-wakaf/{id}', [UserController::class, 'aktaWakafShow'])->name('akta-wakaf.show');
});

Route::middleware(['auth', 'user'])->prefix('pendaftaran')->name('user.pendaftaran.')->group(function () {
    Route::get('/', [PendaftaranController::class, 'index'])->name('index');
    Route::get('/form', [PendaftaranController::class, 'form'])->name('form');
    Route::post('/store', [PendaftaranController::class, 'store'])->name('store');
    Route::get('/status/{id}', [PendaftaranController::class, 'status'])->name('status');
    Route::get('/cetak/{id}', [PendaftaranController::class, 'cetak'])->name('cetak');
    Route::get('/download-pdf/{id}', [PendaftaranController::class, 'downloadPDF'])->name('download-pdf');
});

// Method cekStatusForm dan cekStatus untuk publik (tanpa middleware auth)
Route::get('/pendaftaran/cek-status', [PendaftaranController::class, 'cekStatusForm'])->name('user.pendaftaran.cek-status');
Route::post('/pendaftaran/cek-status', [PendaftaranController::class, 'cekStatus'])->name('user.pendaftaran.cek-status.post');
