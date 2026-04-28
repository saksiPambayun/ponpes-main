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



<?php $__env->startSection('title', 'Fasilitas'); ?>

<?php $__env->startSection('content'); ?>
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
  <?php $__env->stopSection(); ?>
</body>

</html>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\public\fasilitas.blade.php ENDPATH**/ ?>