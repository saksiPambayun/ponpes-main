<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tentang Kami - Pondok Pesantren Al-Ifadah</title>

    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Cabin:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/navbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/footer.css')); ?>">
</head>

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

    /* HAPUS SECTION AD/ART karena itu termasuk legalitas */
    /* HAPUS SECTION STRUKTUR karena itu terpisah di halaman struktur sendiri */

    @media (max-width: 768px) {
        .hero-title {
            font-size: 40px;
        }

        .judul-tentang {
            font-size: 28px;
        }

        .foto-kanan {
            margin-top: 30px;
        }
    }
</style>

<body>
    <?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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

    
    

    <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH D:\ponpes-main\resources\views/public/tentang.blade.php ENDPATH**/ ?>