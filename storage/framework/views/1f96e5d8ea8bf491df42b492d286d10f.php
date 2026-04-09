<nav class="navbar">
    <div class="nav-container">

        <div class="nav-left">
            <img src="<?php echo e(asset('images/logo.png')); ?>" class="logo" alt="Logo">
            <div class="brand">
                <span class="brand-top">Pondok Pesantren</span>
                <span class="brand-bottom">Al-Ifadah</span>
            </div>
        </div>

        <ul class="nav-menu">
            <li>
                <a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">
                    Beranda
                </a>
            </li>
            <li class="dropdown">
                <a href="<?php echo e(route('tentang')); ?>" class="<?php echo e(request()->routeIs('tentang') ? 'active' : ''); ?>">
                    Tentang
                </a>

                <ul class="dropdown-menu">
                    <li><a href="<?php echo e(route('struktur')); ?>">Struktur Organisasi</a></li>
                    <li><a href="<?php echo e(route('legalitas')); ?>">Legalitas</a></li>
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
                <a href="<?php echo e(route('pendaftaran')); ?>" class="<?php echo e(request()->routeIs('pendaftaran') ? 'active' : ''); ?>">
                    Pendaftaran
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('hubungi')); ?>" class="<?php echo e(request()->routeIs('hubungi') ? 'active' : ''); ?>">
                    Hubungi Kami
                </a>
            </li>
        </ul>

        <a href="<?php echo e(route('login')); ?>" class="btn-contact">Login / Register</a>

    </div>
</nav>
<?php /**PATH C:\laragon\www\ponpes-main\resources\views/components/navbar.blade.php ENDPATH**/ ?>