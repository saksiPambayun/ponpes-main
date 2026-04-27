<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard'); ?> - Yayasan Management</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        :root {
            --green-main: #005F02;
            --green-dark: #0d4f14;
            --green-darker: #0f4d1c;
            --green-medium: #2e6b37;
            --green-light: #4ca94d;
            --green-soft: #8cbf73;
            --bg-light: #f4f4f4;
            --bg-soft: #eef3ec;
            --bg-section: #dfe8d8;
            --text-main: #333;
            --text-dark: #222;
            --text-muted: #2d2d2d;
            --white: #ffffff;
            --shadow-soft: rgba(0, 0, 0, 0.1);
            --shadow-medium: rgba(0, 0, 0, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-soft);
        }

        .sidebar {
            background: linear-gradient(180deg, var(--green-main) 0%, var(--green-dark) 100%);
            transition: all 0.3s ease;
        }

        .sidebar-item {
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-left: 3px solid transparent;
        }

        .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.15);
            border-left-color: var(--white);
            transform: translateX(8px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .sidebar-item.active {
            background: rgba(255, 255, 255, 0.2);
            border-left-color: var(--white);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .sidebar-item .icon-wrapper {
            transition: all 0.3s ease;
        }

        .sidebar-item:hover .icon-wrapper {
            transform: scale(1.1);
        }

        .main-content {
            transition: all 0.3s ease;
        }

        .card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 2px 8px var(--shadow-soft);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 8px 25px var(--shadow-medium);
            transform: translateY(-4px);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--green-main) 0%, var(--green-light) 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 95, 2, 0.4);
        }

        .table-row {
            transition: all 0.2s ease;
        }

        .table-row:hover {
            background: var(--bg-soft);
            transform: scale(1.01);
        }

        .badge-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-success {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .overlay {
            background: rgba(0, 0, 0, 0.5);
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 999;
        }

        .overlay.active {
            display: block;
        }

        .input-field:focus {
            border-color: var(--green-light);
            box-shadow: 0 0 0 3px rgba(76, 169, 77, 0.2);
        }

        .mobile-menu-btn {
            display: none;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.05);
                opacity: 0.8;
            }
        }

        .animate-pulse {
            animation: pulse 1.5s ease-in-out infinite;
        }

        @media (max-width: 1024px) {
            .mobile-menu-btn {
                display: block;
            }

            .sidebar {
                position: fixed;
                left: -280px;
                top: 0;
                height: 100vh;
                z-index: 1000;
            }

            .sidebar.open {
                left: 0;
            }

            .main-content {
                margin-left: 0 !important;
            }
        }

        [role="alert"] {
            transition: opacity 0.5s ease;
        }

        /* Global Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .modal-container {
            background: white;
            border-radius: 16px;
            width: 90%;
            max-width: 500px;
            transform: translateY(30px);
            transition: all 0.3s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .modal-overlay.show .modal-container {
            transform: translateY(0);
        }

        .modal-header {
            padding: 20px 24px;
            border-bottom: 1px solid #e5e7eb;
        }

        .modal-body {
            padding: 24px;
        }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .btn-cancel {
            padding: 8px 20px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            background: white;
            color: #374151;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-cancel:hover {
            background: #f3f4f6;
        }

        .btn-danger {
            padding: 8px 20px;
            border-radius: 8px;
            border: none;
            background: #dc2626;
            color: white;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-danger:hover {
            background: #b91c1c;
            transform: translateY(-1px);
        }

        .btn-success {
            padding: 8px 20px;
            border-radius: 8px;
            border: none;
            background: #059669;
            color: white;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-success:hover {
            background: #047857;
        }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <div class="flex h-screen overflow-hidden">
        <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

        <aside class="sidebar w-72 flex flex-col shadow-2xl" id="sidebar">
            <div class="h-20 flex items-center justify-center border-b border-green-300/30 px-6">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center overflow-hidden">
                        <img src="<?php echo e(asset('images/logoo.png')); ?>" class="w-9 h-9 object-contain" alt="Logo"
                            onerror="this.src='https://via.placeholder.com/36'">
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">Pondok Pesantren</h1>
                        <h1 class="text-xl font-bold text-white">Al Ifadah</h1>
                    </div>
                </div>
            </div>

            <nav class="flex-1 overflow-y-auto py-6 px-4">

                <!-- MAIN MENU -->
                <div class="mb-6">
                    <p class="text-xs font-semibold text-green-200 uppercase tracking-wider mb-3 px-3">Main Menu</p>
                    <a href="<?php echo e(route('admin.dashboard')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-white rounded-lg mb-1 <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-home"></i>
                        </div>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </div>

                <!-- PENDAFTARAN -->
                <div class="mb-6">
                    <p class="text-xs font-semibold text-green-200 uppercase tracking-wider mb-3 px-3">Pendaftaran</p>

                    <!-- Data Pendaftar (Calon Santri yang belum fix) -->
                    <a href="<?php echo e(route('admin.pendaftar.index')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1 <?php echo e(request()->routeIs('admin.pendaftar.*') ? 'active' : ''); ?>">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <span class="font-medium">Data Pendaftar</span>
                        <?php
                            try {
                                $pendingCount = \App\Models\SantriRegistration::where('status', 'pending')->count();
                            } catch (\Exception $e) {
                                $pendingCount = 0;
                            }
                        ?>
                        <?php if($pendingCount > 0): ?>
                            <span
                                class="ml-auto bg-yellow-500 text-white text-xs px-2 py-0.5 rounded-full animate-pulse"><?php echo e($pendingCount); ?></span>
                        <?php endif; ?>
                    </a>

                    <!-- Data Santri (Santri yang sudah fix/diterima) -->
                    <a href="<?php echo e(route('admin.santri.data-santri')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1 <?php echo e(request()->routeIs('admin.santri.data-santri') ? 'active' : ''); ?>">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <span class="font-medium">Data Santri</span>
                        <?php
                            try {
                                $diterimaCount = \App\Models\SantriRegistration::where('status', 'diterima')->count();
                            } catch (\Exception $e) {
                                $diterimaCount = 0;
                            }
                        ?>
                        <?php if($diterimaCount > 0): ?>
                            <span
                                class="ml-auto bg-green-500 text-white text-xs px-2 py-0.5 rounded-full"><?php echo e($diterimaCount); ?></span>
                        <?php endif; ?>
                    </a>

                    <!-- Kelola Gelombang -->
                    <a href="<?php echo e(route('admin.pendaftaran.waves.index')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1 <?php echo e(request()->routeIs('admin.pendaftaran.waves.*') ? 'active' : ''); ?>">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-wave-square"></i>
                        </div>
                        <span class="font-medium">Kelola Gelombang</span>
                    </a>
                </div>
                <!-- KEPEGAWAIAN -->
                <div class="mb-6">
                    <p class="text-xs font-semibold text-green-200 uppercase tracking-wider mb-3 px-3">Kepegawaian</p>
                    <a href="<?php echo e(route('admin.pegawai.index')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1 <?php echo e(request()->routeIs('admin.pegawai.*') ? 'active' : ''); ?>">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <span class="font-medium">Data Pegawai</span>
                    </a>
                </div>

                <!-- DATA MASTER -->
                <div class="mb-6">
                    <p class="text-xs font-semibold text-green-200 uppercase tracking-wider mb-3 px-3">Data Master</p>

                    <a href="<?php echo e(route('admin.data-master.profil-yayasan')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-building"></i>
                        </div>
                        <span class="font-medium">Profil Yayasan</span>
                    </a>

                    <a href="<?php echo e(route('admin.data-master.struktur-organisasi.index')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-sitemap"></i>
                        </div>
                        <span class="font-medium">Struktur Organisasi</span>
                    </a>

                    <a href="<?php echo e(route('admin.data-master.fasilitas.index')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-school"></i>
                        </div>
                        <span class="font-medium">Fasilitas</span>
                    </a>

                    <a href="<?php echo e(route('admin.data-master.gallery.index')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-images"></i>
                        </div>
                        <span class="font-medium">Gallery</span>
                    </a>

                    <a href="<?php echo e(route('admin.program.index')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <span class="font-medium">Program</span>
                    </a>

                    <!-- FEEDBACK / KRITIK & SARAN -->
                    <div class="mb-6">
                        <p class="text-xs font-semibold text-green-200 uppercase tracking-wider mb-3 px-3">Feedback</p>
                        <a href="<?php echo e(route('admin.feedback.index')); ?>"
                            class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1 <?php echo e(request()->routeIs('admin.feedback.*') ? 'active' : ''); ?>">
                            <div
                                class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                                <i class="fas fa-comment-dots"></i>
                            </div>
                            <span class="font-medium">Kritik & Saran</span>
                            <?php
                                try {
                                    $unreadFeedbackCount = \App\Models\Feedback::where('is_read', false)->count();
                                } catch (\Exception $e) {
                                    $unreadFeedbackCount = 0;
                                }
                            ?>
                            <?php if($unreadFeedbackCount > 0): ?>
                                <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full animate-pulse">
                                    <?php echo e($unreadFeedbackCount); ?>

                                </span>
                            <?php endif; ?>
                        </a>
                    </div>


                    <!-- DOKUMEN LEGAL -->
                    <div class="mb-6">
                        <p class="text-xs font-semibold text-green-200 uppercase tracking-wider mb-3 px-3">Dokumen Legal
                        </p>

                        <a href="<?php echo e(route('admin.sk.index')); ?>"
                            class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1 <?php echo e(request()->routeIs('admin.sk.*') ? 'active' : ''); ?>">
                            <div
                                class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                                <i class="fas fa-file-signature"></i>
                            </div>
                            <span class="font-medium">Data SK</span>
                        </a>

                        <a href="<?php echo e(route('admin.akta-yayasan.index')); ?>"
                            class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1 <?php echo e(request()->routeIs('admin.akta-yayasan.*') ? 'active' : ''); ?>">
                            <div
                                class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                                <i class="fas fa-scroll"></i>
                            </div>
                            <span class="font-medium">Akta Yayasan</span>
                        </a>

                        <a href="<?php echo e(route('admin.akta-wakaf.index')); ?>"
                            class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1 <?php echo e(request()->routeIs('admin.akta-wakaf.*') ? 'active' : ''); ?>">
                            <div
                                class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                                <i class="fas fa-landmark"></i>
                            </div>
                            <span class="font-medium">Akta Wakaf</span>
                        </a>
                    </div>

                    <!-- PROFILE MENU -->
                    <div class="mb-6">
                        <p class="text-xs font-semibold text-green-200 uppercase tracking-wider mb-3 px-3">Akun</p>
                        <a href="<?php echo e(route('admin.profile')); ?>"
                            class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1 <?php echo e(request()->routeIs('admin.profile') ? 'active' : ''); ?>">
                            <div
                                class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <span class="font-medium">Profil Saya</span>
                        </a>
                    </div>

            </nav>

            <!-- LOGOUT BUTTON -->
            <div class="p-4 border-t border-green-300/30">
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        class="flex items-center w-full px-4 py-3 text-green-200 hover:text-white transition rounded-lg hover:bg-white/10">
                        <div class="w-10 h-10 rounded-lg bg-green-500/20 flex items-center justify-center mr-3">
                            <i class="fas fa-sign-out-alt"></i>
                        </div>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="main-content flex-1 overflow-x-hidden overflow-y-auto" style="background: var(--bg-soft);">
            <header class="bg-white shadow-sm h-20 flex items-center justify-between px-8 sticky top-0 z-50">
                <div class="flex items-center space-x-4">
                    <button class="mobile-menu-btn p-2 rounded-lg hover:bg-gray-100" onclick="toggleSidebar()">
                        <i class="fas fa-bars text-gray-600 text-xl"></i>
                    </button>
                    <h2 class="text-2xl font-bold" style="color: var(--text-dark);"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?>
                    </h2>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="text-right">
                        <p class="text-sm font-semibold" style="color: var(--text-dark);">
                            <?php echo e(auth()->user()?->name ?? 'Administrator'); ?>

                        </p>
                        <p class="text-xs" style="color: var(--text-muted);">
                            <?php echo e(ucfirst(auth()->user()?->role ?? 'Admin')); ?>

                        </p>
                    </div>
                    <div class="h-12 w-12 rounded-full bg-gradient-to-br flex items-center justify-center text-white font-bold shadow-lg"
                        style="background: linear-gradient(135deg, var(--green-main), var(--green-dark));">
                        <?php echo e(substr(auth()->user()?->name ?? 'AD', 0, 2)); ?>

                    </div>
                </div>
            </header>

            <div class="container mx-auto px-8 py-8">
                <?php if(session('success')): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg relative mb-6"
                        role="alert">
                        <span class="block sm:inline"><?php echo e(session('success')); ?></span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
                            onclick="this.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg relative mb-6"
                        role="alert">
                        <span class="block sm:inline"><?php echo e(session('error')); ?></span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
                            onclick="this.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </span>
                    </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>
    </div>

    <!-- Global Delete Modal -->
    <div id="globalDeleteModal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Hapus Data</h3>
                </div>
            </div>
            <div class="modal-body">
                <p id="deleteModalText" class="text-gray-600">Yakin ingin menghapus data ini?</p>
                <p class="text-xs text-red-500 mt-2">⚠️ Tindakan ini tidak dapat dibatalkan!</p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="closeGlobalDeleteModal()" class="btn-cancel">
                    <i class="fas fa-times mr-1"></i> Batal
                </button>
                <button type="button" onclick="confirmGlobalDelete()" class="btn-danger">
                    <i class="fas fa-trash mr-1"></i> Hapus
                </button>
            </div>
        </div>
    </div>

    <!-- Global Accept Modal -->
    <div id="globalAcceptModal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Konfirmasi Penerimaan</h3>
                </div>
            </div>
            <div class="modal-body">
                <p id="acceptModalText" class="text-gray-600">Apakah Anda yakin ingin menerima pendaftaran santri ini?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="closeGlobalAcceptModal()" class="btn-cancel">Batal</button>
                <button type="button" onclick="confirmGlobalAccept()" class="btn-success">
                    <i class="fas fa-check mr-1"></i> Ya, Terima
                </button>
            </div>
        </div>
    </div>

    <!-- Global Reject Modal -->
    <div id="globalRejectModal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-times-circle text-orange-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Tolak Pendaftaran</h3>
                </div>
            </div>
            <div class="modal-body">
                <p class="text-gray-600 mb-3">Masukkan alasan penolakan:</p>
                <textarea id="rejectReason" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500"
                    placeholder="Tuliskan alasan penolakan (minimal 10 karakter)..."></textarea>
                <p class="text-xs text-gray-400 mt-1">Alasan ini akan diberitahukan kepada calon santri.</p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="closeGlobalRejectModal()" class="btn-cancel">Batal</button>
                <button type="button" onclick="confirmGlobalReject()" class="btn-danger">
                    <i class="fas fa-times mr-1"></i> Tolak
                </button>
            </div>
        </div>
    </div>

    <script>
        // ==================== SIDEBAR ====================
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('overlay').classList.toggle('active');
        }

        // Auto close alert after 5 seconds
        setTimeout(function () {
            const alerts = document.querySelectorAll('[role="alert"]');
            alerts.forEach(alert => {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);

        // ==================== DELETE MODAL ====================
        let currentDeleteForm = null;

        function openDeleteModal(id, nama) {
            currentDeleteForm = document.getElementById('deleteForm' + id);
            const deleteText = document.getElementById('deleteModalText');
            if (deleteText) {
                deleteText.innerHTML = `Yakin ingin menghapus data <strong class="text-gray-900">"${nama}"</strong>?`;
            }
            document.getElementById('globalDeleteModal').classList.add('show');
        }

        function closeGlobalDeleteModal() {
            document.getElementById('globalDeleteModal').classList.remove('show');
            currentDeleteForm = null;
        }

        function confirmGlobalDelete() {
            if (currentDeleteForm) {
                currentDeleteForm.submit();
            }
            closeGlobalDeleteModal();
        }

        // ==================== ACCEPT MODAL ====================
        let currentAcceptId = null;

        function openAcceptModal(id) {
            currentAcceptId = id;
            document.getElementById('globalAcceptModal').classList.add('show');
        }

        function closeGlobalAcceptModal() {
            document.getElementById('globalAcceptModal').classList.remove('show');
            currentAcceptId = null;
        }

        function confirmGlobalAccept() {
            if (currentAcceptId) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/santri/${currentAcceptId}/verify`;
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = csrfToken;
                form.appendChild(csrfInput);
                document.body.appendChild(form);
                form.submit();
            }
            closeGlobalAcceptModal();
        }

        // ==================== REJECT MODAL ====================
        let currentRejectId = null;

        function openRejectModal(id) {
            currentRejectId = id;
            document.getElementById('rejectReason').value = '';
            document.getElementById('globalRejectModal').classList.add('show');
        }

        function closeGlobalRejectModal() {
            document.getElementById('globalRejectModal').classList.remove('show');
            currentRejectId = null;
        }

        function confirmGlobalReject() {
            const reason = document.getElementById('rejectReason').value.trim();
            if (!reason) {
                alert('Alasan penolakan harus diisi!');
                return;
            }
            if (reason.length < 10) {
                alert('Alasan penolakan minimal 10 karakter!');
                return;
            }
            if (currentRejectId) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/santri/${currentRejectId}/reject`;
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = csrfToken;
                form.appendChild(csrfInput);

                const reasonInput = document.createElement('input');
                reasonInput.type = 'hidden';
                reasonInput.name = 'alasan_penolakan';
                reasonInput.value = reason;
                form.appendChild(reasonInput);

                document.body.appendChild(form);
                form.submit();
            }
            closeGlobalRejectModal();
        }

        // Close modal when clicking outside
        document.getElementById('globalDeleteModal')?.addEventListener('click', function (e) {
            if (e.target === this) closeGlobalDeleteModal();
        });
        document.getElementById('globalAcceptModal')?.addEventListener('click', function (e) {
            if (e.target === this) closeGlobalAcceptModal();
        });
        document.getElementById('globalRejectModal')?.addEventListener('click', function (e) {
            if (e.target === this) closeGlobalRejectModal();
        });
    </script>
    
    <?php echo $__env->make('admin.partials.toast', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <?php
        try {
            $unreadFeedbackCount = \App\Models\Feedback::where('is_read', false)->count();
        } catch (\Exception $e) {
            $unreadFeedbackCount = 0;
        }
    ?>
    <?php echo $__env->make('admin.partials.notification-badge', ['unreadFeedbackCount' => $unreadFeedbackCount], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH D:\ponpes-main\resources\views/admin/layout.blade.php ENDPATH**/ ?>