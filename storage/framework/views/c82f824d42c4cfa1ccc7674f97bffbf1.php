<?php $__env->startSection('title', 'Pendaftaran Santri Baru'); ?>

<?php $__env->startSection('content'); ?>
    <section class="hero-pendaftaran">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1>Penerimaan Santri Baru</h1>
                <h2>Tahun Ajaran 2026/2027</h2>
            </div>
        </div>
    </section>

    <section class="pendaftaran-section">
        <div class="container">
            <div class="grid-pendaftaran">
                <div>
                    <h2 class="title-section">Alur Pendaftaran</h2>
                    <div class="alur">
                        <div class="step-item">
                            <div class="step-circle">1</div>
                            <p>Isi Formulir</p>
                        </div>
                        <div class="step-line"></div>
                        <div class="step-item">
                            <div class="step-circle">2</div>
                            <p>Upload Berkas</p>
                        </div>
                        <div class="step-line"></div>
                        <div class="step-item">
                            <div class="step-circle">3</div>
                            <p>Verifikasi</p>
                        </div>
                        <div class="step-line"></div>
                        <div class="step-item">
                            <div class="step-circle">4</div>
                            <p>Pengumuman</p>
                        </div>
                    </div>

                    <h2 class="title-section mt">Persyaratan Pendaftaran</h2>
                    <div class="syarat-card">
                        <div class="syarat-list">
                            <p><i class="bi bi-file-earmark"></i> Fotokopi Kartu Keluarga</p>
                            <p><i class="bi bi-image"></i> Pas Foto Berwarna 3x4</p>
                            <p><i class="bi bi-file-text"></i> Fotokopi Ijazah / SKL</p>
                        </div>
                        <div class="syarat-list">
                            <p><i class="bi bi-heart-pulse"></i> Surat Keterangan Sehat</p>
                            <p><i class="bi bi-journal"></i> Fotokopi Rapor Terakhir</p>
                        </div>
                    </div>
                </div>

                <div class="info-pendaftaran">
                    <div class="header-info">
                        Gelombang Pendaftaran
                    </div>

                    <div class="gelombang-wrapper">
                        <?php $__empty_1 = true; $__currentLoopData = $allWaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div
                                class="gelombang-box <?php echo e($wave->is_active && $wave->start_date <= now() && $wave->end_date >= now() ? 'active-wave' : ''); ?>">
                                <h4><?php echo e($wave->name); ?></h4>
                                <p><?php echo e(\Carbon\Carbon::parse($wave->start_date)->translatedFormat('d F Y')); ?> -
                                    <?php echo e(\Carbon\Carbon::parse($wave->end_date)->translatedFormat('d F Y')); ?></p>
                                <?php if($wave->description): ?>
                                    <small class="text-muted"><?php echo e($wave->description); ?></small>
                                <?php endif; ?>
                                <?php if($wave->quota): ?>
                                    <div class="quota-info mt-2">
                                        <small>Kuota: <?php echo e($wave->registered_count); ?>/<?php echo e($wave->quota); ?></small>
                                        <div class="progress-bar">
                                            <div class="progress-fill"
                                                style="width: <?php echo e(min(100, ($wave->registered_count / $wave->quota) * 100)); ?>%">
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($wave->is_active && $wave->start_date <= now() && $wave->end_date >= now()): ?>
                                    <span class="badge-open">Pendaftaran Dibuka</span>
                                <?php elseif($wave->start_date > now()): ?>
                                    <span class="badge-coming">Akan Datang</span>
                                <?php elseif($wave->end_date < now()): ?>
                                    <span class="badge-closed">Ditutup</span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="gelombang-box">
                                <h4>Gelombang 1</h4>
                                <p>10 Maret - 2 Mei 2026</p>
                            </div>
                            <div class="gelombang-box">
                                <h4>Gelombang 2</h4>
                                <p>10 Juni - 2 Juli 2026</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="biaya-card">
                        <h4>Biaya Pendidikan</h4>
                        <div class="row-biaya">
                            <span>Biaya Pendaftaran</span>
                            <span>Rp. 3.000.000</span>
                        </div>
                        <div class="row-biaya">
                            <span>Uang Masuk</span>
                            <span>Rp. 450.000</span>
                        </div>
                        <div class="row-biaya">
                            <span>SPP</span>
                            <span>Rp. 600.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cta-daftar">
                <?php if($activeWave): ?>
                    <a href="<?php echo e(route('user.pendaftaran.form')); ?>" class="btn-daftar">
                        Isi Formulir Pendaftaran (<?php echo e($activeWave->name); ?>)
                    </a>
                <?php else: ?>
                    <button class="btn-daftar disabled" disabled style="opacity: 0.6; cursor: not-allowed;">
                        Belum Ada Gelombang Pendaftaran Aktif
                    </button>
                <?php endif; ?>
            </div>

            <div class="cek-status-link">
                <a href="<?php echo e(route('user.pendaftaran.cek-status')); ?>" class="btn-cek-status">
                    <i class="bi bi-search"></i> Cek Status Pendaftaran
                </a>
            </div>
        </div>
    </section>

    <style>
        .gelombang-wrapper {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 25px;
        }

        .gelombang-box {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
            border-left: 4px solid #005F02;
            position: relative;
        }

        .gelombang-box.active-wave {
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            border-left: 4px solid #2e7d32;
        }

        .gelombang-box h4 {
            margin: 0 0 5px 0;
            color: #2d2d2d;
            font-weight: 600;
        }

        .gelombang-box p {
            margin: 0;
            font-size: 0.9rem;
            color: #666;
        }

        .badge-open,
        .badge-coming,
        .badge-closed {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            margin-top: 8px;
        }

        .badge-open {
            background: #4caf50;
            color: white;
        }

        .badge-coming {
            background: #ff9800;
            color: white;
        }

        .badge-closed {
            background: #9e9e9e;
            color: white;
        }

        .quota-info {
            margin-top: 8px;
        }

        .progress-bar {
            height: 4px;
            background: #e0e0e0;
            border-radius: 2px;
            margin-top: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: #005F02;
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .btn-daftar.disabled {
            background: #9e9e9e;
            cursor: not-allowed;
        }

        .cek-status-link {
            text-align: center;
            margin-top: 30px;
        }

        .btn-cek-status {
            display: inline-block;
            background: transparent;
            border: 2px solid #005F02;
            color: #005F02;
            padding: 12px 30px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-cek-status:hover {
            background: #005F02;
            color: white;
            text-decoration: none;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/user/pendaftaran/index.blade.php ENDPATH**/ ?>