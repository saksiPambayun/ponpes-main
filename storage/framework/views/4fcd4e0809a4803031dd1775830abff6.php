<?php $__env->startSection('title', 'Fasilitas'); ?>

<?php $__env->startSection('content'); ?>

    <section class="fasilitas-page">
        <div class="fasilitas-container">
            <div class="fasilitas-header-wrapper">
                <div class="section-header">
                    <h1 class="section-title">Fasilitas Pondok</h1>
                    <p class="section-subtitle">Sarana dan prasarana pendukung kegiatan santri</p>
                </div>
            </div>

            <div class="cards-grid">
                <?php $__currentLoopData = $fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
                        <div class="card-image">
                            <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" alt="<?php echo e($item->nama_fasilitas); ?>">
                            <div class="card-overlay"></div>
                        </div>
                        <div class="card-content">
                            <!-- Hanya SATU tanggal, tidak perlu dobel -->
                            <div class="card-date">
                                <?php echo e(isset($item->created_at) ? \Carbon\Carbon::parse($item->created_at)->format('d F Y') : '2024'); ?>

                            </div>
                            <h3 class="card-title"><?php echo e($item->nama_fasilitas); ?></h3>
                            <a href="<?php echo e(route('fasilitas.show', $item->id)); ?>" class="learn-more">Lihat Detail</a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <style>
        .fasilitas-page {
            background-color: #f8fafc;
            padding: 80px 0 90px;
            width: 100%;
        }

        .fasilitas-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        .fasilitas-header-wrapper {
            width: 100%;
            text-align: center !important;
            display: block !important;
        }

        .section-header {
            text-align: center !important;
            margin-bottom: 60px;
            width: 100%;
            display: block;
        }

        .section-title {
            font-size: 40px !important;
            font-weight: 700 !important;
            color: #166534 !important;
            margin-bottom: 12px !important;
            text-align: center !important;
            display: block !important;
            width: 100% !important;
        }

        .section-subtitle {
            font-size: 17px !important;
            color: #64748b !important;
            text-align: center !important;
            display: block !important;
            width: 100% !important;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
        }

        .card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.07);
            transition: all 0.3s ease;
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
            height: 185px;
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
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.82));
        }

        .card-content {
            padding: 14px 16px 18px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        .card-date {
            font-size: 12.5px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333333 !important;
            background: rgba(255, 255, 255, 0.9);
            display: inline-block;
            padding: 2px 8px;
            border-radius: 4px;
            width: fit-content;
        }

        .card-title {
            font-size: 16.5px;
            font-weight: 600;
            color: white;
            line-height: 1.4;
            margin-bottom: 14px;
            margin-top: 4px;
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
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .learn-more:hover {
            background: #166534;
            color: white;
            text-decoration: none;
        }

        @media (max-width: 992px) {
            .cards-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .cards-grid {
                grid-template-columns: 1fr;
            }

            .card-image {
                height: 175px;
            }
        }
    </style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/public/fasilitas.blade.php ENDPATH**/ ?>