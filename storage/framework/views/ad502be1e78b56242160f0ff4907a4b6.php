<?php $__env->startSection('title', 'Galeri'); ?>

<?php $__env->startSection('content'); ?>

    <section class="galerii">
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

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/public/galeri.blade.php ENDPATH**/ ?>