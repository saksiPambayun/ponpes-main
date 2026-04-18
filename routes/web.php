<?php


//tessssssssssss
//tes lagi 
//lah
//oke

//tess

//bisa ga

//bayun aneh

//bayun gaje


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StrukturOrganisasiController;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfilYayasanController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\User\SantriController;
use App\Http\Controllers\Admin\SantriController as AdminSantriController;
use App\Http\Controllers\User\SantriController as UserSantriController;
use App\Http\Controllers\Auth\RegisterController;
//use App\Http\Controllers\Frontend\User\UserController;
use App\Http\Controllers\FeedbackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
*/

// Redirect root to login
Route::get('/', [UserController::class, 'home'])->name('home');

// === LOGIN ROUTES (Fix) ===
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// register
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.process');

// ==================== ADMIN ROUTES ====================
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Santri Registrations
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

        // === DATA MASTER ROUTES ===
        Route::prefix('data-master')->name('data-master.')->group(function () {
            Route::get('/', [DataMasterController::class, 'index'])->name('index');

            // Profil Yayasan
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

// ==================== ROUTES MANAJEMEN PENDAFTARAN (GELOMBANG) ====================
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Pendaftaran & Gelombang
    Route::prefix('pendaftaran')->name('pendaftaran.')->group(function () {
        Route::resource('waves', \App\Http\Controllers\Admin\RegistrationWaveController::class);
        Route::post('waves/{wave}/toggle-active', [\App\Http\Controllers\Admin\RegistrationWaveController::class, 'toggleActive'])->name('waves.toggle-active');

        // Proses penerimaan
        Route::post('santri/{id}/process-acceptance', [\App\Http\Controllers\Admin\RegistrationWaveController::class, 'processAcceptance'])->name('santri.process-acceptance');
        Route::post('santri/bulk-acceptance', [\App\Http\Controllers\Admin\RegistrationWaveController::class, 'bulkAcceptance'])->name('santri.bulk-acceptance');

        // Pengumuman
     //   Route::get('announcement', [\App\Http\Controllers\Admin\RegistrationWaveController::class, 'announcementIndex'])->name('announcement.index');
     ///   Route::get('announcement/preview/{wave}', [\App\Http\Controllers\Admin\RegistrationWaveController::class, 'previewAnnouncement'])->name('announcement.preview');
     //   Route::post('announcement/{wave}/publish', [\App\Http\Controllers\Admin\RegistrationWaveController::class, 'publishAnnouncement'])->name('announcement.publish');
    });
});

// program
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('data-master/program', ProgramController::class)->names('program');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('program', ProgramController::class);
});

// notification
Route::get('/notifications', [UserController::class, 'notifications'])->name('notifications');
Route::post('/notifications/{id}/mark-read', [UserController::class, 'markAsRead'])->name('notifications.mark-read');
Route::post('/notifications/mark-all-read', [UserController::class, 'markAllRead'])->name('notifications.mark-all-read');
Route::get('/notifications/unread-count', [UserController::class, 'unreadCount'])->name('notifications.unread-count');

// ==================== ROUTE KHUSUS USER ====================
Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {

    Route::get('/check-user', function () {
        if (!auth()->check()) {
            return "Belum login. Silakan login terlebih dahulu.";
        }

        $user = auth()->user();
        return "Login sebagai: " . $user->name . "<br>Email: " . $user->email . "<br>Role: " . $user->role;
    });

    // DASHBOARD
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // PROFILE
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-password', [UserController::class, 'changePassword'])->name('profile.change-password');
    Route::post('/profile/upload-avatar', [UserController::class, 'uploadAvatar'])->name('profile.upload-avatar');

    // SANTRI
    Route::get('/santri', [UserController::class, 'santriIndex'])->name('santri.index');
    Route::get('/santri/create', [UserController::class, 'santriCreate'])->name('santri.create');
    Route::post('/santri', [UserController::class, 'santriStore'])->name('santri.store');
    Route::get('/santri/{id}', [UserController::class, 'santriShow'])->name('santri.show');
    Route::get('/santri/{id}/edit', [UserController::class, 'santriEdit'])->name('santri.edit');
    Route::put('/santri/{id}', [UserController::class, 'santriUpdate'])->name('santri.update');
    Route::delete('/santri/{id}', [UserController::class, 'santriDestroy'])->name('santri.destroy');

    // GALLERY
    Route::get('/gallery', [UserController::class, 'galleryIndex'])->name('gallery.index');
    Route::get('/gallery/{id}', [UserController::class, 'galleryShow'])->name('gallery.show');

    // PROGRAM
    Route::get('/program', [UserController::class, 'programIndex'])->name('program.index');
    Route::get('/program/{id}', [UserController::class, 'programShow'])->name('program.show');

    // STRUKTUR ORGANISASI
    Route::get('/struktur-organisasi', [UserController::class, 'strukturIndex'])->name('struktur.index');
    Route::get('/struktur-organisasi/{id}', [UserController::class, 'strukturShow'])->name('struktur.show');

    // PROFIL YAYASAN
    Route::get('/profil-yayasan', [UserController::class, 'profilYayasanIndex'])->name('profil-yayasan.index');
    Route::get('/profil-yayasan/{id}', [UserController::class, 'profilYayasanShow'])->name('profil-yayasan.show');

    // AKTA YAYASAN
    Route::get('/akta-yayasan', [UserController::class, 'aktaYayasanIndex'])->name('akta-yayasan.index');
    Route::get('/akta-yayasan/{id}', [UserController::class, 'aktaYayasanShow'])->name('akta-yayasan.show');

    // AKTA WAKAF
    Route::get('/akta-wakaf', [UserController::class, 'aktaWakafIndex'])->name('akta-wakaf.index');
    Route::get('/akta-wakaf/{id}', [UserController::class, 'aktaWakafShow'])->name('akta-wakaf.show');

    // NOTIFICATIONS
    Route::get('/notifications', [UserController::class, 'notifications'])->name('notifications');
    Route::get('/notifications/unread', [UserController::class, 'getUnreadNotifications'])->name('notifications.unread');
    Route::post('/notifications/{id}/mark-read', [UserController::class, 'markAsRead'])->name('notifications.mark-read');
    Route::post('/notifications/mark-all-read', [UserController::class, 'markAllRead'])->name('notifications.mark-all-read');

    Route::get('/user-test', [App\Http\Controllers\User\UserController::class, 'dashboard'])->middleware('auth');
});
// Tambahkan di bagian PUBLIC ROUTES, sebelum route lainnya
Route::get('/pendaftaran', function () {
    return redirect()->route('user.pendaftaran.index');
})->name('pendaftaran');

// ==================== PUBLIC ROUTES ====================
// HOME
Route::get('/home', [UserController::class, 'home'])->name('home');

// TENTANG
Route::get('/tentang', [UserController::class, 'profilYayasanIndex'])->name('tentang');

// STRUKTUR
Route::get('/struktur', [UserController::class, 'strukturIndex'])->name('struktur');

// LEGALITAS (akta yayasan + wakaf)
Route::get('/legalitas', [UserController::class, 'legalitas'])->name('legalitas');

// FASILITAS
Route::get('/fasilitas', [UserController::class, 'fasilitas'])->name('fasilitas');

// GALERI
Route::get('/galeri', [UserController::class, 'galeri'])->name('galeri');

// PENDAFTARAN
//Route::get('/pendaftaran', function () {
  //  return view('public.pendaftaran');
//})->name('pendaftaran');

// FORM
//Route::get('/form', function () {
  //  return view('public.form');
//})->name('form');

Route::prefix('pendaftaran')->name('user.pendaftaran.')->group(function () {
    Route::get('/', [App\Http\Controllers\User\PendaftaranController::class, 'index'])->name('index');
    Route::get('/form', [App\Http\Controllers\User\PendaftaranController::class, 'form'])->name('form');
    Route::post('/store', [App\Http\Controllers\User\PendaftaranController::class, 'store'])->name('store');
    Route::get('/status/{id}', [App\Http\Controllers\User\PendaftaranController::class, 'status'])->name('status');
    Route::get('/cetak/{id}', [App\Http\Controllers\User\PendaftaranController::class, 'cetak'])->name('cetak');
    Route::get('/download-pdf/{id}', [App\Http\Controllers\User\PendaftaranController::class, 'downloadPDF'])->name('download-pdf'); // TAMBAHKAN INI
    Route::get('/cek-status', [App\Http\Controllers\User\PendaftaranController::class, 'cekStatusForm'])->name('cek-status');
    Route::post('/cek-status', [App\Http\Controllers\User\PendaftaranController::class, 'cekStatus'])->name('cek-status.post');
});

// HUBUNGI
Route::get('/hubungi', [UserController::class, 'hubungi'])->name('hubungi');

Route::post('/daftar', [AdminController::class, 'santriStore'])->name('daftar');

// EMAIL
Route::post('/send-feedback', [FeedbackController::class, 'sendFeedback'])->name('send.feedback');

// ==================== DATA MASTER ROUTES ====================
Route::prefix('admin/data-master')
    ->name('admin.data-master.')
    ->middleware('auth')
    ->group(function () {
        Route::resource('struktur-organisasi', StrukturOrganisasiController::class);
        Route::resource('fasilitas', FasilitasController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('profil', ProfilYayasanController::class);
        Route::resource('program', ProgramController::class);
    });

Route::resource('data-master/fasilitas', FasilitasController::class);

