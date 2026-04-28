<?php $__env->startSection('title', 'Struktur'); ?>

<?php $__env->startSection('content'); ?>
    <section class="struktur-section">
        <div class="container">
            <h1 class="struktur-title">
                Struktur Organisasi
            </h1>

            <div class="card-wrapper">
                <?php $__currentLoopData = $struktur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="struktur-cards">
                        <img src="<?php echo e($item->foto ? asset('storage/' . $item->foto) : asset('images/default.png')); ?>"
                            alt="foto">
                        <h3><?php echo e($item->nama); ?></h3>
                        <p><?php echo e($item->jabatan); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\public\struktur.blade.php ENDPATH**/ ?>