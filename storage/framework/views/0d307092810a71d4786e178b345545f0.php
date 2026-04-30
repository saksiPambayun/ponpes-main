<?php $__env->startSection('title', $gallery->judul ?? 'Detail Galeri'); ?>
<?php $__env->startSection('page-title', $gallery->judul ?? 'Detail Galeri'); ?>

<?php $__env->startSection('content'); ?>
    <style>
        :root {
            --green-main: #005F02;
            --green-light: #4ca94d;
        }

        .gallery-detail {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .gallery-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .gallery-image {
            width: 100%;
            max-height: 500px;
            object-fit: contain;
            background: #f5f5f5;
        }

        .gallery-info {
            padding: 1.5rem;
        }

        .gallery-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--green-main);
            margin-bottom: 0.5rem;
        }

        .gallery-date {
            color: #666;
            font-size: 0.85rem;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .gallery-description {
            color: #444;
            line-height: 1.6;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #eee;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
            padding: 0.75rem 1.5rem;
            background: var(--green-main);
            color: white;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .back-button:hover {
            background: var(--green-light);
            transform: translateX(-5px);
        }
    </style>

    <div class="gallery-detail">
        <div class="gallery-card">
            <?php if($gallery->gambar || $gallery->foto): ?>
                <img src="<?php echo e(asset('storage/' . ($gallery->gambar ?? $gallery->foto))); ?>" alt="<?php echo e($gallery->judul); ?>"
                    class="gallery-image">
            <?php endif; ?>

            <div class="gallery-info">
                <h1 class="gallery-title"><?php echo e($gallery->judul ?? 'Galeri'); ?></h1>
                <span class="gallery-date">
                    <i class="fas fa-calendar-alt"></i>
                    <?php echo e(\Carbon\Carbon::parse($gallery->tanggal ?? $gallery->created_at)->format('d F Y')); ?>

                </span>

                <?php if($gallery->deskripsi): ?>
                    <div class="gallery-description">
                        <p><?php echo e($gallery->deskripsi); ?></p>
                    </div>
                <?php endif; ?>

                <a href="<?php echo e(route('user.gallery.index')); ?>" class="back-button">
                    <i class="fas fa-arrow-left"></i> Kembali ke Galeri
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\pondok_gue\ponpes-main\resources\views/user/gallery/show.blade.php ENDPATH**/ ?>