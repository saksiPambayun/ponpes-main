<?php $__env->startSection('title', 'Tentang Kami'); ?>

<?php $__env->startSection('content'); ?>
    <section class="hero-tentang">
        <div class="hero-overlay">
            <h1 class="hero-title">Tentang Kami</h1>
        </div>
    </section>

    <section class="tentang-section">
        <div class="container">
            <h2 class="judul-tentang">
                Pondok Pesantren Al-Ifadah
            </h2>

            <div class="row align-items-start mb-4">
                <div class="col-lg-7">
                    <img src="<?php echo e(asset('images/g2.png')); ?>" class="foto-besar" alt="Pondok Pesantren Al-Ifadah">
                </div>

                <div class="col-lg-5">
                    <p class="text-tentang">
                        <?php echo nl2br(e($profil->deskripsi ?? 'Pondok Pesantren Al-Ifadah didirikan sebagai wujud komitmen dalam menghadirkan pendidikan Islam yang berkualitas serta berorientasi pada pembentukan karakter dan akhlak mulia. Sejak awal berdirinya, pesantren ini memiliki tujuan untuk mencetak generasi yang tidak hanya unggul dalam ilmu pengetahuan, tetapi juga kokoh dalam nilai-nilai keislaman.')); ?>

                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7">
                    <div class="card-visi mb-4">
                        <h3>Visi</h3>
                        <p>
                            <?php echo e($profil->visi ?? 'Menjadi lembaga pendidikan Islam yang unggul dalam membentuk generasi berilmu, berakhlak mulia, dan berwawasan luas berdasarkan Al-Qur\'an dan Sunnah.'); ?>

                        </p>
                    </div>

                    <div class="card-misi">
                        <h3>Misi</h3>
                        <?php
                            $misiText = $profil->misi ?? "Menyelenggarakan pendidikan Islam terpadu.\nMembina santri agar berakhlak mulia dan disiplin.\nMenciptakan lingkungan belajar yang kondusif.\nMenanamkan nilai kepemimpinan dan kemandirian.\nMengembangkan potensi akademik dan keagamaan.";
                            $misiList = explode("\n", $misiText);
                        ?>
                        <ul>
                            <?php $__currentLoopData = $misiList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $misi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(trim($misi)): ?>
                                    <li><?php echo e(trim($misi)); ?></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-5">
                    <img src="<?php echo e(asset('images/g6.png')); ?>" class="foto-kanan" alt="Kegiatan Pondok Pesantren">
                </div>
            </div>
        </div>
    </section>

    <section class="adart-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="<?php echo e(asset('images/pict 2.png')); ?>" class="gambar-adart">
                </div>

                <div class="col-lg-6">
                    <h2 class="judul-adart">
                        Anggaran Dasar & <br>
                        Anggaran Rumah Tangga <br>
                        (AD/ART)
                    </h2>
                    <p class="text-adart">
                        Anggaran Dasar dan Anggaran Rumah Tangga (AD/ART) Pondok Pesantren
                        Al-Ifadah merupakan pedoman resmi dalam penyelenggaraan tata kelola
                        kelembagaan.
                    </p>
                    <p class="text-adart">
                        Dokumen ini disusun berdasarkan prinsip-prinsip syariat Islam
                        dan peraturan yang berlaku guna menjaga profesionalitas,
                        transparansi, dan keberlangsungan lembaga.
                    </p>
                    <a href="<?php echo e(asset('file/AD dan ART Ponpes Al - Ifadah.docx')); ?>" download class="btn-adart">
                        Unduh Dokumen AD / ART
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <style>
    .hero-tentang {
        height: 650px;
        background-image: url("/images/hero.png");
        background-size: cover;
        background-position: center;
        position: relative;
        font-family: "Cabin", sans-serif;
    }

    .hero-overlay {
        height: 100%;
        width: 100%;
        background: rgba(22, 101, 52, 0.45);
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 20px;
    }

    .hero-title {
        font-size: 64px;
        color: white;
        font-weight: 700;
        margin-bottom: 15px;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
    }

    .tentang-section {
        padding: 80px 0;
    }

    .judul-tentang {
        text-align: center;
        font-size: 38px;
        font-weight: 700;
        color: #0c6b1f;
        margin-bottom: 50px;
    }

    .foto-besar {
        width: 100%;
        border-radius: 18px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .foto-kanan {
        width: 100%;
        border-radius: 18px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        margin-top: 80px;
    }

    .text-tentang {
        font-size: 16px;
        line-height: 1.8;
        color: #333;
    }

    .card-visi,
    .card-misi {
        background: #dfe7dc;
        padding: 30px;
        border-radius: 16px;
        transition: 0.3s;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .card-visi h3,
    .card-misi h3 {
        color: #0c6b1f;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .card-misi ul {
        padding-left: 18px;
    }

    .card-misi li {
        margin-bottom: 8px;
    }

    .card-visi:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .card-misi:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .adart-section {
        padding: 100px 0;
    }

    .gambar-adart {
        width: 100%;
        max-width: 567px;
        display: block;
        margin: auto;
    }

    .judul-adart {
        color: #0f6b1e;
        font-size: 34px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .text-adart {
        font-size: 15px;
        line-height: 1.7;
        margin-bottom: 15px;
        color: #333;
    }

    .btn-adart {
        display: inline-block;
        margin-top: 10px;
        padding: 12px 32px;
        border-radius: 10px;
        background: linear-gradient(90deg, #4f8f4d, #cddfa9);
        color: white;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
    }

    .btn-adart:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .struktur-section {
        padding: 100px 0;
    }

    .judul-struktur {
        font-size: 32px;
        font-weight: 700;
        color: #0f6b1e;
        margin-bottom: 20px;
    }

    .text-struktur {
        font-size: 16px;
        line-height: 1.7;
        margin-bottom: 15px;
        color: #333;
    }

    .struktur-card {
        position: relative;
        display: block;
        background: #e6efd8;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        text-decoration: none;
        overflow: hidden;
    }

    .struktur-card img {
        width: 100%;
        border-radius: 10px;
        transition: 0.4s;
        filter: blur(2px);
    }

    .struktur-card img:hover {
        filter: blur(0px);
    }

    .struktur-overlay {
        position: absolute;
        bottom: 20px;
        left: 20px;
        right: 20px;
        background: linear-gradient(90deg, #4f8f4d, #cddfa9);
        color: white;
        text-align: center;
        padding: 10px;
        border-radius: 8px;
        font-weight: 500;
        opacity: 0;
        transition: 0.3s;
    }

    .struktur-card:hover img {
        transform: scale(1.05);
    }

    .struktur-card:hover .struktur-overlay {
        opacity: 1;
    }

    .legalitas-section {
        padding: 100px 0;
        background: #e9f0e4;
    }

    .judul-legalitas {
        font-size: 34px;
        font-weight: 700;
        color: #0f6b1e;
        margin-bottom: 10px;
    }

    .deskripsi-legalitas {
        max-width: 700px;
        margin: auto;
        font-size: 15px;
        color: #333;
    }

    .legalitas-card {
        background: #f5f5f5;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        transition: 0.3s;
    }

    .legalitas-card:hover {
        transform: translateY(-6px);
    }

    .legalitas-img {
        height: 180px;
        background: #9bbf84;
        border-radius: 14px;
        margin-bottom: 15px;
    }

    .legalitas-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .legalitas-card h5 {
        color: #0f6b1e;
        font-weight: 600;
    }

    .btn-legalitas {
        display: inline-block;
        margin-top: 30px;
        padding: 12px 40px;
        border-radius: 10px;
        background: linear-gradient(90deg, #4f8f4d, #cddfa9);
        color: white;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
    }

    .btn-legalitas:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/public/tentang.blade.php ENDPATH**/ ?>