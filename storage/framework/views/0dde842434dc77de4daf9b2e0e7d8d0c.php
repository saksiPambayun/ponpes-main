<?php $__env->startSection('title', 'Beranda'); ?>

<?php $__env->startSection('content'); ?>
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>
                Pondok Pesantren <br>
                Al-Ifadah
            </h1>

            <p>
                Menyediakan pendidikan berbasis Al-Qur’an dan Sunnah
                dengan fasilitas yang nyaman serta tenaga pengajar profesional.
            </p>

            <div class="hero-buttons">
                <a href="<?php echo e(route('pendaftaran')); ?>" class="btn-primary">
                    Daftar Sekarang
                </a>
                <a href="<?php echo e(route('tentang')); ?>" class="btn-secondary">
                    Tentang Kami
                </a>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="about-container">
            <div class="about-image reveal-left">
                <img src="<?php echo e(asset('images/pict 2.png')); ?>" alt="Tentang Kami">
            </div>
            <div class="about-text reveal-right">
                <h2>Tentang Kami</h2>
                <div class="line"></div>
                <p>
                    Pondok Pesantren Al-Ifadah berdiri pada 02 Mei 2014 di Desa Cangkreng,
                    Kecamatan Lenteng, Kabupaten Sumenep. Bernaung di bawah Yayasan
                    Al-Ifadah, pesantren ini berkomitmen mencetak generasi muslim
                    penghafal Al-Qur’an yang berakhlak, berilmu, dan siap
                    menghadapi perkembangan zaman.
                </p>
            </div>
            <div class="about-link">
                <a href="<?php echo e(route('tentang')); ?>">Lihat selengkapnya →</a>
            </div>
        </div>
    </section>

    <section class="program-section">
        <div class="program-container">
            <h2 class="program-title reveal-top">Program Pendidikan</h2>
            <div class="program-cards">
                <?php $__currentLoopData = $program; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="program-card">
                        <h3><?php echo e($p->nama_program); ?></h3>
                        <p><?php echo e($p->deskripsi); ?></p>
                        <div class="card-line"></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <section class="fasilitas-section">
        <div class="fasilitas-container">
            <h2 class="fasilitas-title">Fasilitas</h2>
            <div class="fasilitas-grid">
                <?php $__currentLoopData = $fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="fasilitas-card">
                        <img src="<?php echo e(asset('storage/' . $item->foto)); ?>">
                        <h3><?php echo e($item->nama_fasilitas); ?></h3>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="fasilitas-link">
                <a href="<?php echo e(route('fasilitas')); ?>">Lihat selengkapnya →</a>
            </div>
        </div>
    </section>

    <section class="galeri">
        <div class="container-galeri">
            <h2 class="galeri-title">Galeri</h2>
            <div class="galeri-wrapper">
                <button class="galeri-btn btn-prev">&#10094;</button>
                <div class="galeri-carousel">
                    <?php $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div
                            class="galeri-card 
            <?php echo e($index == 0 ? 'active' : ''); ?>

            <?php echo e($index == 1 ? 'next' : ''); ?>

            <?php echo e($index == count($galeri) - 1 ? 'prev' : ''); ?>">

                            <img src="<?php echo e(asset('storage/' . $g->gambar)); ?>">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <button class="galeri-btn btn-next">&#10095;</button>
            </div>

            <div class="galeri-link">
                <a href="<?php echo e(route('galeri')); ?>">Lihat selengkapnya →</a>
            </div>
        </div>
    </section>

    <section class="cta-pendaftaran">
        <div class="cta-container">
            <div class="cta-left">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo PPAI">
            </div>

            <div class="cta-right">
                <h2>Pendaftaran Santri Baru Telah Dibuka</h2>
                <p>
                    Daftarkan putra-putri Anda sekarang dan bergabung
                    bersama Pondok Pesantren Al-Ifadah
                </p>

                <div class="cta-buttons">
                    <a href="<?php echo e(route('pendaftaran')); ?>" class="cta-primary">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/public/home_user.blade.php ENDPATH**/ ?>