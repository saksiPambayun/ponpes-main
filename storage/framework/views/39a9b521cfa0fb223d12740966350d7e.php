<?php $__env->startSection('title', 'Galeri'); ?>
<?php $__env->startSection('page-title', 'Galeri Dokumentasi'); ?>

<?php $__env->startSection('content'); ?>

<style>
    .galeri {
        background-color: #fafafa;
    }

    .galeri-section {
        padding: 80px 120px;
    }

    .galeri-title {
        text-align: center;
        font-size: 42px;
        font-weight: 700;
        color: #0c6b1c;
        margin-bottom: 60px;
    }

    .galeri-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 40px;
    }

    .galeri-item {
        background: #9ac28d;
        padding: 20px;
        border-radius: 16px;
        text-align: center;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .galeri-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15);
    }

    .galeri-img {
        background: white;
        height: 250px;
        border-radius: 14px;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .galeri-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .galeri-desc {
        color: white;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .galeri-tanggal {
        color: #eaf5e4;
        font-size: 13px;
    }

    .empty-gallery {
        text-align: center;
        padding: 60px;
        color: #666;
    }

    /* responsive */
    @media (max-width: 992px) {
        .galeri-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .galeri-section {
            padding: 40px 20px;
        }

        .galeri-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="galeri">
    <section class="galeri-section">

        <h1 class="galeri-title">Galeri</h1>

        <?php if($galeri->count() > 0): ?>
            <div class="galeri-grid">
                <?php $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="galeri-item" onclick="window.location='<?php echo e(route('user.gallery.show', $item->id)); ?>'">

                        <div class="galeri-img">
                            <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" alt="">
                        </div>

                        <div class="galeri-desc">
                            <?php echo e($item->deskripsi); ?>

                        </div>

                        <div class="galeri-tanggal">
                            <?php echo e(\Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y')); ?>

                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="empty-gallery">
                <p>Belum ada dokumentasi kegiatan.</p>
            </div>
        <?php endif; ?>

    </section>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\pondok_gue\ponpes-main\resources\views/user/gallery/index.blade.php ENDPATH**/ ?>