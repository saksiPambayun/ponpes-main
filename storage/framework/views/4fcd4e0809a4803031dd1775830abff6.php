<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fasilitas</title>

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
    .fasilitas {
        background-color: #fafafa;
    }

    .fasilitas-sectionn {
        padding: 80px 120px;
    }

    .fasilitas-title {
        text-align: center;
        font-size: 42px;
        font-weight: 700;
        color: #0c6b1c;
        margin-bottom: 60px;
    }

    .fasilitas-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 40px;
    }

    .fasilitas-card {
        background: #9ac28d;
        padding: 20px;
        border-radius: 16px;
        text-align: center;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }

    .fasilitas-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15);
    }

    .fasilitas-img {
        background: white;
        height: 250px;
        border-radius: 14px;
        margin-bottom: 50px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
    }

    .fasilitas-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .fasilitas-card p {
        color: white;
        font-size: 25px;
        font-weight: 700;
    }
</style>

<body>
    <?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <section class="fasilitas">
        <section class="fasilitas-sectionn">

            <h1 class="fasilitas-title">Fasilitas</h1>

            <div class="fasilitas-grid">

                <?php $__currentLoopData = $fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="fasilitas-card">
                        <div class="fasilitas-img">
                            <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" alt="<?php echo e($item->nama_fasilitas); ?>">
                        </div>
                        <p><?php echo e($item->nama_fasilitas); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                

            </div>

        </section>
    </section>
    <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH D:\ponpes-main\resources\views/public/fasilitas.blade.php ENDPATH**/ ?>