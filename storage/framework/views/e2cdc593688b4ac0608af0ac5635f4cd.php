<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> - Portal User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f5f6fa;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(160deg, #1a237e 0%, #283593 100%);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            padding-top: 1rem;
        }

        .sidebar .brand {
            color: white;
            padding: 1rem 1.5rem 1.5rem;
            font-weight: 700;
            font-size: 1.1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.75);
            padding: 0.65rem 1.5rem;
            border-radius: 0;
            transition: all 0.2s;
            font-size: 0.9rem;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.15);
            padding-left: 2rem;
        }

        .sidebar .nav-link i {
            width: 20px;
        }

        .sidebar .nav-section {
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 1rem 1.5rem 0.3rem;
        }

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            background: white;
            padding: 0.75rem 1.5rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .content-area {
            padding: 1.5rem;
        }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>

    
    <div class="sidebar">

        <div class="brand">
            <i class="fas fa-mosque me-2"></i>Portal Yayasan
        </div>

        <nav class="mt-2">

            <div class="nav-section">Menu</div>

            <a href="<?php echo e(route('user.dashboard')); ?>"
                class="nav-link <?php echo e(request()->routeIs('user.dashboard') ? 'active' : ''); ?>">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>

            
            <div class="nav-section">Data</div>

            <?php
                $santriUser = \App\Models\SantriRegistration::where('user_id', auth()->id());

                $pendingSantri = (clone $santriUser)->where('status', 'pending')->count();
                $diterimaSantri = (clone $santriUser)->where('status', 'diterima')->count();
                $ditolakSantri = (clone $santriUser)->where('status', 'ditolak')->count();
            ?>

            <a href="<?php echo e(route('user.santri.index')); ?>"
                class="nav-link <?php echo e(request()->routeIs('user.santri.*') ? 'active' : ''); ?>">

                <i class="fas fa-user-graduate me-2"></i>
                Pendaftaran Santri

                <?php if($pendingSantri > 0): ?>
                    <span class="badge bg-warning text-dark ms-1"><?php echo e($pendingSantri); ?></span>
                <?php endif; ?>

                <?php if($diterimaSantri > 0): ?>
                    <span class="badge bg-success ms-1"><?php echo e($diterimaSantri); ?></span>
                <?php endif; ?>

                <?php if($ditolakSantri > 0): ?>
                    <span class="badge bg-danger ms-1"><?php echo e($ditolakSantri); ?></span>
                <?php endif; ?>

            </a>

            
            <div class="nav-section">Informasi</div>

            <a href="<?php echo e(route('user.gallery.index')); ?>"
                class="nav-link <?php echo e(request()->routeIs('user.gallery.*') ? 'active' : ''); ?>">
                <i class="fas fa-images me-2"></i> Gallery
            </a>

            <a href="<?php echo e(route('user.fasilitas.index')); ?>"
                class="nav-link <?php echo e(request()->routeIs('user.fasilitas.*') ? 'active' : ''); ?>">
                <i class="fas fa-building me-2"></i> Fasilitas
            </a>

            <a href="<?php echo e(route('user.program.index')); ?>"
                class="nav-link <?php echo e(request()->routeIs('user.program.*') ? 'active' : ''); ?>">
                <i class="fas fa-book me-2"></i> Program
            </a>

            <a href="<?php echo e(route('user.struktur.index')); ?>"
                class="nav-link <?php echo e(request()->routeIs('user.struktur.*') ? 'active' : ''); ?>">
                <i class="fas fa-sitemap me-2"></i> Struktur Organisasi
            </a>

            <a href="<?php echo e(route('user.akta-wakaf.index')); ?>"
                class="nav-link <?php echo e(request()->routeIs('user.akta-wakaf.*') ? 'active' : ''); ?>">
                <i class="fas fa-file-alt me-2"></i> Akta Wakaf
            </a>

            <a href="<?php echo e(route('user.akta-yayasan.index')); ?>"
                class="nav-link <?php echo e(request()->routeIs('user.akta-yayasan.*') ? 'active' : ''); ?>">
                <i class="fas fa-file-signature me-2"></i> Akta Yayasan
            </a>

            
            <div class="nav-section">Akun</div>

            <a href="<?php echo e(route('user.profile')); ?>"
                class="nav-link <?php echo e(request()->routeIs('user.profile*') ? 'active' : ''); ?>">
                <i class="fas fa-user-cog me-2"></i> Profil Saya
            </a>

            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="nav-link btn btn-link w-100 text-start border-0 text-white">

                    <i class="fas fa-sign-out-alt me-2"></i> Logout

                </button>
            </form>

        </nav>
    </div>

    
    <div class="main-content">

        <div class="topbar">

            <div class="text-muted small">
                <i class="fas fa-home me-1"></i>
                <?php echo $__env->yieldContent('title', 'Dashboard'); ?>
            </div>

            <div class="d-flex align-items-center gap-3">

                <?php
                    $notif = \App\Models\SantriRegistration::where('user_id', auth()->id())
                        ->where('status', 'diterima')
                        ->count();
                ?>

                <?php if($notif > 0): ?>
                    <span class="badge bg-success">
                        <i class="fas fa-bell"></i> <?php echo e($notif); ?>

                    </span>
                <?php endif; ?>

                <span class="badge bg-secondary">User</span>

                <strong class="small">
                    <?php echo e(auth()->user()->name); ?>

                </strong>

            </div>

        </div>


        <div class="content-area">

            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle me-2"></i>
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>


            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>


            <?php echo $__env->yieldContent('content'); ?>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>

</body>

</html><?php /**PATH C:\laragon\www\ponpes-main\resources\views/layouts/user.blade.php ENDPATH**/ ?>