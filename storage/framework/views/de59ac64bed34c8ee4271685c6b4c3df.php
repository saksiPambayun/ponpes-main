<?php $__env->startSection('title', 'Legalitas'); ?>

<?php $__env->startSection('content'); ?>
    <section class="legalitas">

        <h1 class="legalitas-title">Legalitas</h1>

        <div class="legalitas-wrapper">
            <div class="legalitas-row">
                <div class="legalitas-box">
                    <?php if($aktaYayasan): ?>
                        <img src="<?php echo e(asset('storage/' . $aktaYayasan->file_akta)); ?>">
                    <?php endif; ?>
                </div>

                <div class="legalitas-text">
                    <h2><?php echo e($aktaYayasan->judul ?? 'Akta Yayasan'); ?></h2>

                    <p>
                        <?php echo e($aktaYayasan->deskripsi ?? 'Deskripsi belum tersedia'); ?>

                    </p>
                </div>
            </div>

            <div class="legalitas-row reverse">
                <div class="legalitas-box">
                    <?php if($aktaWakaf): ?>
                        <img src="<?php echo e(asset('storage/' . $aktaWakaf->file_sertifikat)); ?>">
                    <?php endif; ?>
                </div>
                <div class="legalitas-text">
                    <h2><?php echo e($aktaWakaf->judul ?? 'Akta Wakaf'); ?></h2>
                    <p>
                        <?php echo e($aktaWakaf->deskripsi ?? 'Deskripsi belum tersedia'); ?>

                    </p>
                </div>
            </div>

            <div class="legalitas-row">
                <div class="legalitas-box">
                    <?php if($sk): ?>
                        <img src="<?php echo e(asset('storage/' . $sk->file_sk)); ?>">
                    <?php endif; ?>
                </div>

                <div class="legalitas-text">
                    <h2><?php echo e($sk->judul ?? 'Surat Keputusan'); ?></h2>

                    <p>
                        <?php echo e($sk->deskripsi ?? 'Deskripsi belum tersedia'); ?>

                    </p>
                </div>
            </div>
        </div>
    </section>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/public/legalitas.blade.php ENDPATH**/ ?>