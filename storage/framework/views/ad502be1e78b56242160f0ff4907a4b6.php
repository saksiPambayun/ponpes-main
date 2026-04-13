<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeri</title>

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
    .galeri {
        background-color: #fafafa;
    }

    .galeri-section {
        min-height: 100vh;
        padding: 60px 40px 80px;
    }

    .galeri-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .galeri-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #0c6b1f;
        margin-bottom: 8px;
        letter-spacing: 1px;
    }

    .galeri-subtitle {
        font-size: 1rem;
        color: #aaa;
        margin: 0;
    }

    .galeri-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 50px;
        max-width: 1100px;
        margin: 0 auto;
    }

    .galeri-item {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        border: 3px solid #4caf50;
        aspect-ratio: 1 / 1;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .galeri-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(76, 175, 80, 0.35);
    }

    .galeri-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
    }

    .galeri-item:hover img {
        transform: scale(1.05);
    }

    .galeri-overlay {
        position: absolute;
        inset: 0;
        background: rgba(30, 70, 32, 0.88);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 16px;
        text-align: center;
        opacity: 0;
        transition: opacity 0.35s ease;
        border-radius: 13px;
    }

    .galeri-item:hover .galeri-overlay {
        opacity: 1;
    }

    .galeri-tanggal {
        display: inline-block;
        font-size: 0.75rem;
        font-weight: 700;
        color: #fff;
        background-color: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 20px;
        padding: 3px 12px;
        margin-bottom: 12px;
        letter-spacing: 0.5px;
    }

    .galeri-desc {
        font-size: 0.82rem;
        color: #e8f5e9;
        line-height: 1.55;
        margin: 0;
        font-weight: 400;
    }

    @media (max-width: 900px) {
        .galeri-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 600px) {
        .galeri-section {
            padding: 40px 20px 60px;
        }

        .galeri-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .galeri-title {
            font-size: 1.8rem;
        }
    }

    @media (max-width: 380px) {
        .galeri-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<body>
    <?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <section class="galeri">
        <section class="galeri-section">
            <div class="galeri-header">
                <h1 class="galeri-title">Galeri</h1>
                <p class="galeri-subtitle">Dokumentasi kegiatan Pondok Pesantren Al-Ifadah</p>
            </div>

            <div class="galeri-grid">

                
                

                <?php $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="galeri-item">
                        <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" alt="">

                        <div class="galeri-overlay">
                            <span class="galeri-tanggal">
                                <?php echo e(\Carbon\Carbon::parse($item->tanggal)->format('d F Y')); ?>

                            </span>
                            <p class="galeri-desc">
                                <?php echo e($item->deskripsi); ?>

                            </p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </section>
    </section>
    <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\ponpes-main\resources\views/public/galeri.blade.php ENDPATH**/ ?>