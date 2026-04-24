<?php $__env->startSection('title', 'Detail Status Pendaftaran'); ?>

<?php $__env->startSection('content'); ?>
    <section class="status-detail-section">
        <div class="container">
            <div class="status-card">
                <div class="card-header">
                    <h2><i class="bi bi-card-text"></i> Detail Status Pendaftaran</h2>
                    <p>Informasi lengkap status pendaftaran Anda</p>
                </div>

                <div class="status-content">
                    <div class="status-badge-large">
                        <?php if($registration->acceptance_status == 'accepted'): ?>
                            <div class="badge-accepted">
                                <i class="bi bi-check-circle-fill"></i> SELAMAT! ANDA DITERIMA
                            </div>
                        <?php elseif($registration->acceptance_status == 'rejected'): ?>
                            <div class="badge-rejected">
                                <i class="bi bi-x-circle-fill"></i> MAAF, PENDAFTARAN ANDA DITOLAK
                            </div>
                        <?php elseif($registration->acceptance_status == 'waiting_list'): ?>
                            <div class="badge-waiting">
                                <i class="bi bi-clock-fill"></i> WAITING LIST
                            </div>
                        <?php else: ?>
                            <div class="badge-pending">
                                <i class="bi bi-hourglass-split"></i> PENDAFTARAN SEDANG DIPROSES
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="info-grid">
                        <div class="info-item">
                            <label><i class="bi bi-person"></i> Nama Lengkap</label>
                            <p><?php echo e($registration->nama_lengkap); ?></p>
                        </div>
                        <div class="info-item">
                            <label><i class="bi bi-card-text"></i> NISN</label>
                            <p><?php echo e($registration->nisn ?? '-'); ?></p>
                        </div>
                        <div class="info-item">
                            <label><i class="bi bi-building"></i> Asal Sekolah</label>
                            <p><?php echo e($registration->asal_sekolah); ?></p>
                        </div>
                        <div class="info-item">
                            <label><i class="bi bi-calendar"></i> Gelombang</label>
                            <p><?php echo e($registration->wave->name ?? '-'); ?></p>
                        </div>
                        <div class="info-item">
                            <label><i class="bi bi-calendar-date"></i> Tanggal Daftar</label>
                            <p><?php echo e($registration->created_at->format('d/m/Y H:i')); ?></p>
                        </div>
                        <div class="info-item">
                            <label><i class="bi bi-person-badge"></i> Nama Wali</label>
                            <p><?php echo e($registration->nama_wali); ?></p>
                        </div>
                        <div class="info-item">
                            <label><i class="bi bi-telephone"></i> No. Telepon Wali</label>
                            <p><?php echo e($registration->no_wali); ?></p>
                        </div>
                        <?php if($registration->email): ?>
                            <div class="info-item">
                                <label><i class="bi bi-envelope"></i> Email</label>
                                <p><?php echo e($registration->email); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if($registration->acceptance_note): ?>
                        <div class="note-box">
                            <h4><i class="bi bi-info-circle"></i> Catatan:</h4>
                            <p><?php echo e($registration->acceptance_note); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if($registration->announcement_date): ?>
                        <div class="announcement-box">
                            <h4><i class="bi bi-megaphone"></i> Tanggal Pengumuman:</h4>
                            <p><?php echo e(\Carbon\Carbon::parse($registration->announcement_date)->format('d/m/Y H:i')); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if($registration->acceptance_status == 'accepted'): ?>
                        <div class="next-step-box">
                            <h4><i class="bi bi-star"></i> Langkah Selanjutnya:</h4>
                            <ul>
                                <li>Silakan melakukan daftar ulang pada tanggal yang telah ditentukan</li>
                                <li>Membawa berkas asli untuk verifikasi</li>
                                <li>Membayar biaya pendaftaran ulang</li>
                                <li>Mengikuti orientasi santri baru</li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="card-footer">
                    <a href="<?php echo e(route('user.pendaftaran.cek-status')); ?>" class="btn-back">
                        <i class="bi bi-arrow-left"></i> Cek Status Lain
                    </a>
                    <a href="<?php echo e(route('user.pendaftaran.index')); ?>" class="btn-home">
                        <i class="bi bi-house"></i> Ke Halaman Pendaftaran
                    </a>
                    <a href="<?php echo e(route('user.pendaftaran.download-pdf', $registration->id)); ?>" class="btn-download">
                        <i class="bi bi-file-pdf"></i> Download PDF
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .status-detail-section {
            padding: 60px 0;
            background: linear-gradient(135deg, #f5f5f5 0%, #e8f5e9 100%);
            min-height: calc(100vh - 200px);
        }

        .status-card {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #005F02, #0f4d1c);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .card-header h2 {
            margin: 0 0 10px 0;
        }

        .status-content {
            padding: 30px;
        }

        .status-badge-large {
            text-align: center;
            margin-bottom: 30px;
        }

        .badge-accepted,
        .badge-rejected,
        .badge-waiting,
        .badge-pending {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 30px;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .badge-accepted {
            background: #d4edda;
            color: #155724;
            border: 2px solid #155724;
        }

        .badge-rejected {
            background: #f8d7da;
            color: #721c24;
            border: 2px solid #721c24;
        }

        .badge-waiting {
            background: #fff3cd;
            color: #856404;
            border: 2px solid #856404;
        }

        .badge-pending {
            background: #d1ecf1;
            color: #0c5460;
            border: 2px solid #0c5460;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-item label {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.8rem;
            color: #666;
            margin-bottom: 5px;
        }

        .info-item p {
            font-size: 1rem;
            font-weight: 500;
            color: #333;
            margin: 0;
            padding: 8px 12px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .note-box,
        .announcement-box,
        .next-step-box {
            background: #f8f9fa;
            padding: 18px;
            border-radius: 12px;
            margin-top: 20px;
        }

        .note-box h4,
        .announcement-box h4,
        .next-step-box h4 {
            margin: 0 0 10px 0;
            color: #005F02;
        }

        .next-step-box ul {
            margin: 0;
            padding-left: 20px;
        }

        .next-step-box li {
            margin: 8px 0;
        }

        .card-footer {
            padding: 20px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-back,
        .btn-home,
        .btn-download {
            padding: 10px 25px;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .btn-back {
            background: #6c757d;
            color: white;
        }

        .btn-back:hover {
            background: #5a6268;
            color: white;
        }

        .btn-home {
            background: #005F02;
            color: white;
        }

        .btn-home:hover {
            background: #0f4d1c;
            color: white;
        }

        .btn-download {
            background: #dc3545;
            color: white;
        }

        .btn-download:hover {
            background: #c82333;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }

        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
            }

            .card-footer {
                flex-direction: column;
                align-items: center;
            }

            .btn-back,
            .btn-home,
            .btn-download {
                width: 100%;
                justify-content: center;
            }
        }

        @media print {

            .card-header,
            .card-footer {
                display: none;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/user/pendaftaran/status.blade.php ENDPATH**/ ?>