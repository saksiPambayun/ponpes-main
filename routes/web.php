<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfilYayasanController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\Admin\SantriController;
use App\Http\Controllers\user\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
*/

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// === LOGIN ROUTES (Fix) ===
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// register
// Route::get('/register', [AuthController::class,'register'])->name('register');
// Route::post('/register', [AuthController::class,'registerProcess'])->name('register.process');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.process');

// Admin Routes
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/test-user', function() {
    if (auth()->check()) {
        return "Anda login sebagai: " . auth()->user()->name . " - Role: " . auth()->user()->role;
    } else {
        return "Belum login. Silakan login dulu.";
    }
});

    // Santri Registrations
    Route::get('/santri', [AdminController::class, 'santriIndex'])->name('santri.index');
    Route::get('/santri/create', [AdminController::class, 'santriCreate'])->name('santri.create');
    Route::post('/santri', [AdminController::class, 'santriStore'])->name('santri.store');
    Route::get('/santri/{id}', [AdminController::class, 'santriShow'])->name('santri.show');
    Route::get('/santri/{id}/edit', [AdminController::class, 'santriEdit'])->name('santri.edit');
    Route::put('/santri/{id}', [AdminController::class, 'santriUpdate'])->name('santri.update');
    Route::delete('/santri/{id}', [AdminController::class, 'santriDestroy'])->name('santri.destroy');
    Route::post('/santri/{id}/verify', [AdminController::class, 'verifySantri'])->name('santri.verify');
    Route::post('/santri/{id}/reject', [AdminController::class, 'reject'])->name('santri.reject');

    // Employees/Pegawai
    Route::get('/pegawai', [AdminController::class, 'pegawaiIndex'])->name('pegawai.index');
    Route::get('/pegawai/create', [AdminController::class, 'pegawaiCreate'])->name('pegawai.create');
    Route::post('/pegawai/store', [AdminController::class, 'pegawaiStore'])->name('pegawai.store');
    Route::get('/pegawai/{id}', [AdminController::class, 'pegawaiShow'])->name('pegawai.show');
    Route::get('/pegawai/{id}/edit', [AdminController::class, 'pegawaiEdit'])->name('pegawai.edit');
    Route::put('/pegawai/{id}', [AdminController::class, 'pegawaiUpdate'])->name('pegawai.update');
    Route::delete('/pegawai/{id}', [AdminController::class, 'pegawaiDestroy'])->name('pegawai.destroy');

    // SK (Surat Keputusan)
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

    // === DATA MASTER ROUTES ===
    Route::prefix('data-master')->name('data-master.')->group(function () {

        // Halaman utama Data Master
        Route::get('/', [DataMasterController::class, 'index'])->name('index');

        // Profil Yayasan
        Route::get('/profil-yayasan', [DataMasterController::class, 'profilYayasan'])->name('profil-yayasan');
        Route::post('/profil-yayasan', [DataMasterController::class, 'profilYayasanStore'])->name('profil-yayasan.store');

        // Struktur Organisasi
        Route::get('/struktur-organisasi', [DataMasterController::class, 'strukturOrganisasi'])->name('struktur-organisasi');
        Route::post('/struktur-organisasi', [DataMasterController::class, 'strukturOrganisasiStore'])->name('struktur-organisasi.store');
        Route::put('/struktur-organisasi/{id}', [DataMasterController::class, 'strukturOrganisasiUpdate'])->name('struktur-organisasi.update');
        Route::delete('/struktur-organisasi/{id}', [DataMasterController::class, 'strukturOrganisasiDestroy'])->name('struktur-organisasi.destroy');

        // Fasilitas
        Route::get('/fasilitas', [DataMasterController::class, 'fasilitas'])->name('fasilitas');
        Route::post('/fasilitas', [DataMasterController::class, 'fasilitasStore'])->name('fasilitas.store');
        Route::put('/fasilitas/{id}', [DataMasterController::class, 'fasilitasUpdate'])->name('fasilitas.update');
        Route::delete('/fasilitas/{id}', [DataMasterController::class, 'fasilitasDestroy'])->name('fasilitas.destroy');

        // Gallery
        Route::get('/gallery', [DataMasterController::class, 'gallery'])->name('gallery');
        Route::post('/gallery', [DataMasterController::class, 'galleryStore'])->name('gallery.store');
        Route::delete('/gallery/{id}', [DataMasterController::class, 'galleryDestroy'])->name('gallery.destroy');

        // Program
        Route::get('/program', [DataMasterController::class, 'program'])->name('program');
        Route::post('/program', [DataMasterController::class, 'programStore'])->name('program.store');
        Route::get('/program/{id}', [UserController::class, 'programShow'])->name('program.show');
        Route::put('/program/{id}', [DataMasterController::class, 'programUpdate'])->name('program.update');
        Route::delete('/program/{id}', [DataMasterController::class, 'programDestroy'])->name('program.destroy');
    });

    // Profile & Settings
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-password', [AdminController::class, 'changePassword'])->name('profile.change-password');
    Route::post('/profile/change-email', [AdminController::class, 'changeEmail'])->name('profile.change-email');
});

// Route untuk admin dengan role check

//----------------------------------------------
    // CUSTOM ROUTES untuk verifikasi
    Route::post('/santri/{id}/verify', [SantriController::class, 'verify'])->name('santri.verify');
    Route::post('/santri/{id}/reject', [SantriController::class, 'reject'])->name('santri.reject');

    // Bulk action
    Route::post('/santri/bulk-action', [SantriController::class, 'bulkAction'])->name('santri.bulk-action');

    // Restore
    Route::post('/santri/{id}/restore', [SantriController::class, 'restore'])->name('santri.restore');
//----------------------------------------------

// Route untuk Data Master Fasilitas
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('data-master/fasilitas', FasilitasController::class)
         ->names([
             'index' => 'data-master.fasilitas.index',
             'create' => 'data-master.fasilitas.create',
             'store' => 'data-master.fasilitas.store',
             'show' => 'data-master.fasilitas.show',
             'edit' => 'data-master.fasilitas.edit',
             'update' => 'data-master.fasilitas.update',
             'destroy' => 'data-master.fasilitas.destroy',
         ]);
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('admin.data-master.fasilitas');
});

Route::prefix('admin/data-master')->middleware('auth')->group(function () {

    Route::get('/gallery', [DataMasterController::class, 'gallery'])
        ->name('data-master.gallery');

    Route::get('/gallery/create', [DataMasterController::class, 'galleryCreate'])
        ->name('data-master.gallery.create');

    Route::post('/gallery/store', [DataMasterController::class, 'galleryStore'])
        ->name('data-master.gallery.store');

    Route::get('/gallery/{id}/edit', [DataMasterController::class, 'galleryEdit'])
        ->name('data-master.gallery.edit');

    Route::put('/gallery/{id}', [DataMasterController::class, 'galleryUpdate'])
        ->name('data-master.gallery.update');

    Route::delete('/gallery/{id}', [DataMasterController::class, 'galleryDelete'])
        ->name('data-master.gallery.delete');
});

// program
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('data-master/program', ProgramController::class)
        ->names('program');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    // PROGRAM
    Route::resource('program', ProgramController::class);
});

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/data-master/profil-yayasan',
        [ProfilYayasanController::class,'index']
    )->name('admin.profil-yayasan.index');

    Route::get('/data-master/profil-yayasan/create',
        [ProfilYayasanController::class,'create']
    )->name('admin.profil-yayasan.create');

    Route::get('/data-master/profil-yayasan/edit',
        [ProfilYayasanController::class,'edit']
    )->name('admin.profil-yayasan.edit');

    Route::post('/data-master/profil-yayasan/store',
        [ProfilYayasanController::class,'store']
    )->name('admin.profil-yayasan.store');

    Route::post('/data-master/profil-yayasan/update',
        [ProfilYayasanController::class,'update']
    )->name('admin.profil-yayasan.update');

    Route::put('/data-master/profil-yayasan/update',
    [ProfilYayasanController::class,'update']
)->name('profil-yayasan.update');

});

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/data-master/profil-yayasan',
        [ProfilYayasanController::class,'index']
    )->name('admin.profil-yayasan.index');

});

Route::prefix('admin/data-master')->middleware('auth')->name('data-master.')->group(function () {

    // Struktur Organisasi
    Route::get('/struktur-organisasi', [DataMasterController::class, 'strukturOrganisasi'])
        ->name('data-master.struktur-organisasi.index');

    Route::get('/struktur-organisasi/create', [DataMasterController::class, 'strukturOrganisasiCreate'])
        ->name('data-master.struktur-organisasi.create');

    Route::post('/struktur-organisasi', [DataMasterController::class, 'strukturOrganisasiStore'])
        ->name('struktur-organisasi.store');

    Route::get('/struktur-organisasi/{id}/edit', [DataMasterController::class, 'strukturOrganisasiEdit'])
        ->name('struktur-organisasi.edit');

    Route::put('/struktur-organisasi/{id}', [DataMasterController::class, 'strukturOrganisasiUpdate'])
        ->name('struktur-organisasi.update');

    Route::delete('/struktur-organisasi/{id}', [DataMasterController::class, 'strukturOrganisasiDestroy'])
        ->name('struktur-organisasi.destroy');

});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource(
        'data-master/struktur-organisasi',
        StrukturOrganisasiController::class
    )->names('admin.data-master.struktur-organisasi');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('data-master')->name('data-master.')->group(function () {
        Route::resource('fasilitas', FasilitasController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('program', ProgramController::class);
    });
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('data-master')->name('data-master.')->group(function () {
        Route::resource('gallery', GalleryController::class);
    });
});

//notification
Route::get('/notifications', [UserController::class, 'notifications'])->name('notifications');
Route::post('/notifications/{id}/mark-read', [UserController::class, 'markAsRead'])->name('notifications.mark-read');
Route::post('/notifications/mark-all-read', [UserController::class, 'markAllRead'])->name('notifications.mark-all-read');
Route::get('/notifications/unread-count', [UserController::class, 'unreadCount'])->name('notifications.unread-count');

// ROUTE KHUSUS USER
Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {

Route::get('/check-user', function() {
    if (!auth()->check()) {
        return "Belum login. Silakan login terlebih dahulu.";
    }

    $user = auth()->user();
    return "Login sebagai: " . $user->name . "<br>Email: " . $user->email . "<br>Role: " . $user->role;
});

    // DASHBOARD
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // ===================== PROFILE =====================
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-password', [UserController::class, 'changePassword'])->name('profile.change-password');
    Route::post('/profile/upload-avatar', [UserController::class, 'uploadAvatar'])->name('profile.upload-avatar');

    // ===================== SANTRI =====================
    Route::get('/santri', [UserController::class, 'santriIndex'])->name('santri.index');
    Route::get('/santri/create', [UserController::class, 'santriCreate'])->name('santri.create');
    Route::post('/santri', [UserController::class, 'santriStore'])->name('santri.store');
    Route::get('/santri/{id}', [UserController::class, 'santriShow'])->name('santri.show');
    Route::get('/santri/{id}/edit', [UserController::class, 'santriEdit'])->name('santri.edit');
    Route::put('/santri/{id}', [UserController::class, 'santriUpdate'])->name('santri.update');
    Route::delete('/santri/{id}', [UserController::class, 'santriDestroy'])->name('santri.destroy');

    // ===================== GALLERY =====================
    Route::get('/gallery', [UserController::class, 'galleryIndex'])->name('gallery.index');
    Route::get('/gallery/{id}', [UserController::class, 'galleryShow'])->name('gallery.show');

    // ===================== FASILITAS =====================
    Route::get('/fasilitas', [UserController::class, 'fasilitasIndex'])->name('fasilitas.index');
    Route::get('/fasilitas/{id}', [UserController::class, 'fasilitasShow'])->name('fasilitas.show');

    // ===================== PROGRAM =====================
    Route::get('/program', [UserController::class, 'programIndex'])->name('program.index');
    Route::get('/program/{id}', [UserController::class, 'programShow'])->name('program.show');

    // ===================== STRUKTUR ORGANISASI =====================
    Route::get('/struktur-organisasi', [UserController::class, 'strukturIndex'])->name('struktur.index');
    Route::get('/struktur-organisasi/{id}', [UserController::class, 'strukturShow'])->name('struktur.show');

    // ===================== PROFIL YAYASAN =====================
    Route::get('/profil-yayasan', [UserController::class, 'profilYayasanIndex'])->name('profil-yayasan.index');
    Route::get('/profil-yayasan/{id}', [UserController::class, 'profilYayasanShow'])->name('profil-yayasan.show');

    // ===================== AKTA YAYASAN =====================
    Route::get('/akta-yayasan', [UserController::class, 'aktaYayasanIndex'])->name('akta-yayasan.index');
    Route::get('/akta-yayasan/{id}', [UserController::class, 'aktaYayasanShow'])->name('akta-yayasan.show');

    // ===================== AKTA WAKAF =====================
    Route::get('/akta-wakaf', [UserController::class, 'aktaWakafIndex'])->name('akta-wakaf.index');
    Route::get('/akta-wakaf/{id}', [UserController::class, 'aktaWakafShow'])->name('akta-wakaf.show');

    // ===================== NOTIFICATIONS =====================
Route::get('/notifications', [UserController::class, 'notifications'])->name('notifications');
Route::get('/notifications/unread', [UserController::class, 'getUnreadNotifications'])->name('notifications.unread');
Route::post('/notifications/{id}/mark-read', [UserController::class, 'markAsRead'])->name('notifications.mark-read');
Route::post('/notifications/mark-all-read', [UserController::class, 'markAllRead'])->name('notifications.mark-all-read');

    Route::get('/user-test', [App\Http\Controllers\User\UserController::class, 'dashboard'])->middleware('auth');
});
