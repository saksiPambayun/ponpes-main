<?php $__env->startSection('title', 'Beranda'); ?>

<?php $__env->startSection('content'); ?>
    
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Pondok Pesantren <br>Al-Ifadah</h1>
            <p>Menyediakan pendidikan berbasis Al-Qur'an dan Sunnah dengan fasilitas yang nyaman serta tenaga pengajar
                profesional.</p>
            <div class="hero-buttons">
                <a href="<?php echo e(route('user.pendaftaran.index')); ?>" class="btn-daftar">Daftar Sekarang</a>
                <a href="<?php echo e(route('tentang')); ?>" class="btn-secondary">Tentang Kami</a>
            </div>
        </div>
    </section>

    
    <section class="about-section">
        <div class="about-container">
            <div class="about-image reveal-left">
                <img src="<?php echo e(asset('images/g2.png')); ?>" alt="Tentang Kami">
            </div>
            <div class="about-text reveal-right">
                <h2>Tentang Kami</h2>
                <div class="line"></div>
                <p>
                    <?php echo e($profil->deskripsi ?? 'Pondok Pesantren Al-Ifadah berdiri pada 02 Mei 2014 di Desa Cangkreng, Kecamatan Lenteng, Kabupaten Sumenep. Bernaung di bawah Yayasan Al-Ifadah, pesantren ini berkomitmen mencetak generasi muslim penghafal Al-Qur\'an yang berakhlak, berilmu, dan siap menghadapi perkembangan zaman.'); ?>

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

    
    <?php if($fasilitas->count() > 0): ?>
        <section class="fasilitas-section">
            <div class="fasilitas-container">
                <h2 class="fasilitas-title">Fasilitas</h2>
                <div class="fasilitas-grid">
                    <?php $__currentLoopData = $fasilitas->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="fasilitas-card">
                            <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" alt="<?php echo e($item->nama_fasilitas); ?>">
                            <h3><?php echo e($item->nama_fasilitas); ?></h3>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php if($fasilitas->count() > 6): ?>
                    <div class="fasilitas-link">
                        <a href="<?php echo e(route('fasilitas')); ?>">Lihat selengkapnya →</a>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    
    <?php if($galeri->count() > 0): ?>
        <section class="galeri-section">
            <div class="container-galeri">
                <h2 class="galeri-title">Galeri</h2>
                <div class="galeri-wrapper">
                    <button class="galeri-btn btn-prev">&#10094;</button>
                    <div class="galeri-carousel">
                        <?php $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="galeri-card">
                                <img src="<?php echo e(asset('storage/' . $g->gambar)); ?>" alt="<?php echo e($g->judul); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <button class="galeri-btn btn-next">&#10095;</button>
                </div>
                <?php if($galeri->count() > 3): ?>
                    <div class="galeri-link">
                        <a href="<?php echo e(route('galeri')); ?>">Lihat selengkapnya →</a>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    
    <section class="cta-pendaftaran">
        <div class="cta-container">
            <div class="cta-left">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo PPAI">
            </div>
            <div class="cta-right">
                <h2>Pendaftaran Santri Baru Telah Dibuka</h2>
                <p>Daftarkan putra-putri Anda sekarang dan bergabung bersama Pondok Pesantren Al-Ifadah</p>
                <a href="<?php echo e(route('user.pendaftaran.index')); ?>" class="cta-primary">Daftar Sekarang</a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .hero {
        position: relative;
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?php echo e(asset("images/hero-bg.jpg")); ?>');
        background-size: cover;
        background-position: center;
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    .hero-content { position: relative; z-index: 2; color: white; max-width: 800px; padding: 20px; }
    .hero-content h1 { font-size: 2.5rem; margin-bottom: 20px; }
    .hero-content p { font-size: 1rem; margin-bottom: 30px; }
    .hero-buttons { display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; }
    .btn-daftar { background: #005F02; color: white; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: 600; border: 2px solid white; transition: 0.3s; }
    .btn-daftar:hover { background: #004d02; transform: translateY(-3px); }
    .btn-secondary { background: white; color: #005F02; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: 600; border: 2px solid #005F02; transition: 0.3s; }
    .btn-secondary:hover { transform: translateY(-3px); }

    .about-section { padding: 60px 20px; background: #f9f9f9; }
    .about-container { max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; gap: 40px; }
    .about-image { flex: 1; min-width: 250px; }
    .about-image img { width: 100%; border-radius: 20px; }
    .about-text { flex: 1; }
    .about-text h2 { font-size: 2rem; color: #005F02; margin-bottom: 15px; }
    .line { width: 60px; height: 3px; background: #005F02; margin-bottom: 20px; }
    .about-text p { line-height: 1.8; color: #555; }
    .about-link { width: 100%; text-align: right; margin-top: 20px; }
    .about-link a { color: #005F02; text-decoration: none; font-weight: 600; }

    .program-section { padding: 60px 20px; background: white; }
    .program-container { max-width: 1200px; margin: 0 auto; }
    .program-title { text-align: center; font-size: 2rem; color: #005F02; margin-bottom: 50px; }
    .program-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; }
    .program-card { background: #eef3ec; padding: 30px; border-radius: 15px; text-align: center; transition: 0.3s; }
    .program-card:hover { transform: translateY(-5px); }
    .program-card h3 { color: #005F02; margin-bottom: 15px; }
    .card-line { width: 50px; height: 2px; background: #005F02; margin: 20px auto 0; }

    .fasilitas-section { padding: 60px 20px; background: #f4f4f4; }
    .fasilitas-container { max-width: 1200px; margin: 0 auto; }
    .fasilitas-title { text-align: center; font-size: 2rem; color: #005F02; margin-bottom: 50px; }
    .fasilitas-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; }
    .fasilitas-card { background: white; border-radius: 12px; overflow: hidden; transition: 0.3s; }
    .fasilitas-card:hover { transform: translateY(-5px); }
    .fasilitas-card img { width: 100%; height: 200px; object-fit: cover; }
    .fasilitas-card h3 { padding: 15px; text-align: center; font-size: 1rem; color: #333; }
    .fasilitas-link { text-align: center; margin-top: 40px; }
    .fasilitas-link a { color: #005F02; text-decoration: none; font-weight: 600; }

    .galeri-section { padding: 60px 20px; background: white; }
    .container-galeri { max-width: 1200px; margin: 0 auto; }
    .galeri-title { text-align: center; font-size: 2rem; color: #005F02; margin-bottom: 50px; }
    .galeri-wrapper { display: flex; align-items: center; justify-content: center; gap: 15px; }
    .galeri-carousel { display: flex; gap: 20px; overflow-x: auto; scroll-behavior: smooth; padding: 20px 0; flex: 1; }
    .galeri-carousel::-webkit-scrollbar { display: none; }
    .galeri-card { flex: 0 0 280px; }
    .galeri-card img { width: 100%; height: 220px; object-fit: cover; border-radius: 12px; }
    .galeri-btn { background: #005F02; color: white; border: none; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; font-size: 18px; flex-shrink: 0; }
    .galeri-btn:hover { background: #0d4f14; }
    .galeri-link { text-align: center; margin-top: 30px; }
    .galeri-link a { color: #005F02; text-decoration: none; font-weight: 600; }

    .cta-pendaftaran { padding: 60px 20px; background: linear-gradient(135deg, #005F02, #0a3d10); color: white; }
    .cta-container { max-width: 1000px; margin: 0 auto; display: flex; align-items: center; gap: 40px; flex-wrap: wrap; justify-content: center; text-align: center; }
    .cta-left img { width: 80px; filter: brightness(0) invert(1); }
    .cta-right h2 { font-size: 1.5rem; margin-bottom: 15px; }
    .cta-primary { display: inline-block; background: white; color: #005F02; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: 600; margin-top: 15px; transition: 0.3s; }
    .cta-primary:hover { transform: translateY(-3px); }

    .reveal-left { opacity: 0; transform: translateX(-50px); transition: all 0.6s ease; }
    .reveal-right { opacity: 0; transform: translateX(50px); transition: all 0.6s ease; }
    .reveal-top { opacity: 0; transform: translateY(-30px); transition: all 0.6s ease; }
    .reveal-left.revealed, .reveal-right.revealed, .reveal-top.revealed { opacity: 1; transform: translate(0); }

    @media (max-width: 768px) {
        .hero-content h1 { font-size: 1.8rem; }
        .hero-buttons { flex-direction: column; }
        .about-container { flex-direction: column; text-align: center; }
        .about-link { text-align: center; }
        .line { margin: 0 auto 20px; }
    }
</style>

<script>
    const revealElements = document.querySelectorAll('.reveal-left, .reveal-right, .reveal-top');
    function checkReveal() {
        revealElements.forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight - 100) el.classList.add('revealed');
        });
    }
    window.addEventListener('load', checkReveal);
    window.addEventListener('scroll', checkReveal);

    const carousel = document.querySelector('.galeri-carousel');
    const prevBtn = document.querySelector('.btn-prev');
    const nextBtn = document.querySelector('.btn-next');
    if (prevBtn && nextBtn && carousel) {
        prevBtn.addEventListener('click', () => carousel.scrollBy({ left: -300, behavior: 'smooth' }));
        nextBtn.addEventListener('click', () => carousel.scrollBy({ left: 300, behavior: 'smooth' }));
    }
</script>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/home_user.blade.php ENDPATH**/ ?>