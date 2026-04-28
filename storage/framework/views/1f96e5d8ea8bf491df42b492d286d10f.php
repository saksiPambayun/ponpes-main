<nav class="navbar">
    <div class="nav-container flex justify-between items-center">

        <div class="nav-left flex items-center">
            <img src="<?php echo e(asset('images/logo.png')); ?>" class="logo" alt="Logo">
            <div class="brand">
                <span class="brand-top">Pondok Pesantren</span>
                <span class="brand-bottom">Al-Ifadah</span>
            </div>
        </div>

        <ul class="nav-menu flex space-x-6">
            <li>
                <a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">
                    Beranda
                </a>
            </li>
            <li class="dropdown relative">
                <a href="<?php echo e(route('tentang')); ?>" class="<?php echo e(request()->routeIs('tentang') ? 'active' : ''); ?>">
                    Tentang
                </a>

                <ul class="dropdown-menu absolute hidden">
                    <li><a href="<?php echo e(route('struktur')); ?>">Struktur Organisasi</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo e(route('fasilitas')); ?>" class="<?php echo e(request()->routeIs('fasilitas') ? 'active' : ''); ?>">
                    Fasilitas
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('galeri')); ?>" class="<?php echo e(request()->routeIs('galeri') ? 'active' : ''); ?>">
                    Galeri
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('user.pendaftaran.index')); ?>"
                    class="<?php echo e(request()->routeIs('user.pendaftaran.*') ? 'active' : ''); ?>">
                    Pendaftaran
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('hubungi')); ?>" class="<?php echo e(request()->routeIs('hubungi') ? 'active' : ''); ?>">
                    Hubungi Kami
                </a>
            </li>
        </ul>

        <div class="w-37.5 flex justify-end ml-auto">

            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('login')); ?>" class="btn-contact">
                    Login / Register
                </a>
            <?php endif; ?>

            <?php if(auth()->guard()->check()): ?>
                <button type="button" onclick="openLogoutModal()" class="btn-contact">
                    Logout
                </button>
            <?php endif; ?>

        </div>

    </div>
</nav><?php /**PATH C:\laragon\www\ponpes-main\resources\views/components/navbar.blade.php ENDPATH**/ ?>