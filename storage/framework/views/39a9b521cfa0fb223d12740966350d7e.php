<?php $__env->startSection('title', 'Galeri'); ?>
<?php $__env->startSection('page-title', 'Galeri Dokumentasi'); ?>

<?php $__env->startSection('content'); ?>

<section class="galeri-page">
    <div class="galeri-container">
        <div class="section-header">
            <h1 class="section-title">Galeri Kegiatan</h1>
            <p class="section-subtitle">Dokumentasi berbagai kegiatan di Pondok Pesantren Al-Ifadah</p>
        </div>

        <?php if($galeri->count() > 0): ?>
            <div class="cards-grid">
                <?php $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card" onclick="window.location='<?php echo e(route('user.gallery.show', $item->id)); ?>'">
                        <div class="card-image">
                            <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" 
                                 alt="<?php echo e($item->deskripsi); ?>">
                            <div class="card-overlay"></div>
                        </div>
                        <div class="card-content">
                            <span class="card-date">
                                <?php echo e(\Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d F Y')); ?>

                            </span>
                            <h3 class="card-title"><?php echo e($item->deskripsi); ?></h3>
                            <button class="learn-more">Lihat Detail</button>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <p>Belum ada dokumentasi kegiatan saat ini.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    .galeri-page {
        background-color: #f8fafc;
        padding: 80px 0 90px;
    }

    .galeri-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-title {
        font-size: 40px;
        font-weight: 700;
        color: #166534;
        margin-bottom: 12px;
    }

    .section-subtitle {
        font-size: 17px;
        color: #64748b;
    }

    .cards-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);     /* Default 4 kolom */
        gap: 22px;
    }

    .card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.07);
        transition: all 0.3s ease;
        cursor: pointer;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .card-image {
        position: relative;
        height: 185px;           /* Gambar lebih kecil */
        overflow: hidden;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .card:hover .card-image img {
        transform: scale(1.05);
    }

    .card-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 55%;
        background: linear-gradient(transparent, rgba(0,0,0,0.82));
    }

    .card-content {
        padding: 14px 16px 18px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .card-date {
        color: #86efac;
        font-size: 12.5px;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .card-title {
        font-size: 15.5px;
        font-weight: 600;
        color: white;
        line-height: 1.4;
        margin-bottom: 12px;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .learn-more {
        background: white;
        color: #166534;
        border: none;
        padding: 7px 18px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 13.5px;
        cursor: pointer;
        align-self: flex-start;
        transition: all 0.3s ease;
    }

    .card:hover .learn-more {
        background: #166534;
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 80px 20px;
        color: #64748b;
        font-size: 17px;
        background: white;
        border-radius: 16px;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .cards-grid {
            grid-template-columns: repeat(2, 1fr);   /* 2 kolom di tablet */
        }
    }

    @media (max-width: 576px) {
        .cards-grid {
            grid-template-columns: 1fr;             /* 1 kolom di HP */
        }
        .card-image {
            height: 175px;
        }
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\pondok_gue\ponpes-main\resources\views/user/gallery/index.blade.php ENDPATH**/ ?>