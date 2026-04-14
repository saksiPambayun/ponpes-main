

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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f2f4ef;
        }

        .sidebar {
            background: linear-gradient(180deg, #188c1a 0%, #0d4f14 100%);
            transition: all 0.3s ease;
        }

        .sidebar-item {
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-left: 3px solid transparent;
        }

        .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.15);
            border-left-color: #ffffff;
            transform: translateX(8px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .sidebar-item.active {
            background: rgba(255, 255, 255, 0.2);
            border-left-color: #ffffff;
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
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            transform: translateY(-4px);
        }

        .stat-card::before {
            background: #4ca94d;
        }

        .btn-primary {
            background: linear-gradient(135deg, #005F02 0%, #4ca94d 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 95, 2, 0.4);
        }

        .table-row:hover {
            background: #eef3ec;
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
        }

        .input-field:focus {
            border-color: #4ca94d;
            box-shadow: 0 0 0 3px rgba(76, 169, 77, 0.2);
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
                    <div class="w-10 h-10 bg-white/100 rounded-lg flex items-center justify-center overflow-hidden">
                        <img src="<?php echo e(asset('images/logoo.png')); ?>" class="w-9 h-9 object-contain">
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">Pondok Pesantren</h1>
                        <h1 class="text-xl font-bold text-white">Al ifadah</h1>
                    </div>
                </div>
            </div>

            <nav class="flex-1 overflow-y-auto py-6 px-4">

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

                <div class="mb-6">
                    <p class="text-xs font-semibold text-green-200 uppercase tracking-wider mb-3 px-3">Pendaftaran</p>
                    <a href="<?php echo e(route('admin.santri.index')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1 <?php echo e(request()->routeIs('admin.santri.*') ? 'active' : ''); ?>">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <span class="font-medium">Data Santri</span>
                        <?php
                            try {
                                $pendingCount = \App\Models\SantriRegistration::where('status', 'pending')->count();
                            } catch (\Exception $e) {
                                $pendingCount = 0;
                            }
                        ?>
                        <?php if($pendingCount > 0): ?>
                            <span
                                class="ml-auto bg-[#4ca94d] text-white text-xs px-2 py-0.5 rounded-full"><?php echo e($pendingCount); ?></span>
                        <?php endif; ?>
                    </a>
                </div>

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

                <div class="mb-6">
                    <p class="text-xs font-semibold text-green-200 uppercase tracking-wider mb-3 px-3">
                        Data Master
                    </p>

                    <!-- Profil Yayasan -->
                    <a href="<?php echo e(route('admin.data-master.profil-yayasan')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-building"></i>
                        </div>
                        <span class="font-medium">Profil Yayasan</span>
                    </a>

                    <!-- Struktur Organisasi -->
                    <a href="<?php echo e(route('admin.data-master.struktur-organisasi.index')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-sitemap"></i>
                        </div>
                        <span class="font-medium">Struktur Organisasi</span>
                    </a>

                    <!-- Fasilitas -->
                    <a href="<?php echo e(route('admin.data-master.fasilitas.index')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-school"></i>
                        </div>
                        <span class="font-medium">Fasilitas</span>
                    </a>

                    <!-- Gallery -->
                    <a href="<?php echo e(route('admin.data-master.gallery.index')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-images"></i>
                        </div>
                        <span class="font-medium">Gallery</span>
                    </a>

                    <!-- Program -->
                    <a href="<?php echo e(route('admin.program.index')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <span class="font-medium">Program</span>
                    </a>
                </div>

                <div class="mb-6">
                    <p class="text-xs font-semibold text-green-200 uppercase tracking-wider mb-3 px-3">
                        Dokumen Legal
                    </p>

                    <!-- SK -->
                    <a href="<?php echo e(route('admin.sk.index')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1 <?php echo e(request()->routeIs('admin.sk.*') ? 'active' : ''); ?>">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <span class="font-medium">Data SK</span>
                    </a>

                    <!-- Akta Yayasan -->
                    <a href="<?php echo e(route('admin.akta-yayasan.index')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1 <?php echo e(request()->routeIs('admin.akta-yayasan.*') ? 'active' : ''); ?>">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-scroll"></i>
                        </div>
                        <span class="font-medium">Akta Yayasan</span>
                    </a>

                    <!-- Akta Wakaf -->
                    <a href="<?php echo e(route('admin.akta-wakaf.index')); ?>"
                        class="sidebar-item flex items-center px-4 py-3 text-green-100 rounded-lg mb-1 <?php echo e(request()->routeIs('admin.akta-wakaf.*') ? 'active' : ''); ?>">
                        <div
                            class="icon-wrapper w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mr-3">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <span class="font-medium">Akta Wakaf</span>
                    </a>
                </div>

            </nav>

            <div class="p-4 border-t border-green-300/30">
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        class="flex items-center w-full px-4 py-3 text-green-200 hover:text-white transition rounded-lg hover:bg-white/10">
                        <div class="w-10 h-10 rounded-lg bg-[#4ca94d]/20 flex items-center justify-center mr-3">
                            <i class="fas fa-sign-out-alt"></i>
                        </div>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="main-content flex-1 overflow-x-hidden overflow-y-auto bg-[#eef3ec]">
            <header class="bg-white shadow-sm h-20 flex items-center justify-between px-8 sticky top-0 z-50">
                <h2 class="text-2xl font-bold text-[#2d2d2d]"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h2>
            </header>

            <div class="container mx-auto px-8 py-8">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>
    </div>


    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('overlay').classList.toggle('active');
        }

        function confirmDelete(message = 'Apakah Anda yakin ingin menghapus data ini?') {
            return confirm(message);
        }

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('[role="alert"]');
            alerts.forEach(alert => {
                alert.style.opacity = '0';
                alert.style.transition = 'opacity 0.5s';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH C:\laragon\www\ponpes-main\resources\views/admin/layout.blade.php ENDPATH**/ ?>