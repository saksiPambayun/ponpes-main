<?php $__env->startSection('title', 'Detail Fasilitas'); ?>
<?php $__env->startSection('page-title', 'Detail Fasilitas'); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .detail-card {
            background: #fff;
            border-radius: 20px;
            border: none;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .detail-card-header {
            background: linear-gradient(135deg, #005F02, #0f4d1c);
            padding: 1.2rem 1.8rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .detail-card-header i {
            color: rgba(255, 255, 255, 0.85);
            font-size: 1rem;
        }

        .detail-card-header span {
            color: #fff;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .detail-card-body {
            padding: 1.8rem;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table tr {
            border-bottom: 1px solid #dfe8d8;
        }

        .info-table tr:last-child {
            border-bottom: none;
        }

        .info-table th {
            width: 35%;
            padding: 1rem 0;
            font-size: 0.82rem;
            font-weight: 600;
            color: #2d2d2d;
            text-align: left;
            letter-spacing: -0.1px;
        }

        .info-table td {
            padding: 1rem 0;
            font-size: 0.87rem;
            color: #333;
            font-weight: 500;
        }

        .kondisi-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .kondisi-badge.baik {
            background: #eef3ec;
            color: #005F02;
        }

        .kondisi-badge.ringan {
            background: #dfe8d8;
            color: #0d4f14;
        }

        .kondisi-badge.berat {
            background: #fef2f2;
            color: #dc2626;
        }

        .foto-card {
            background: #fff;
            border-radius: 20px;
            border: none;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .foto-card-header {
            background: linear-gradient(135deg, #005F02, #0f4d1c);
            padding: 1.2rem 1.8rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .foto-card-header i {
            color: rgba(255, 255, 255, 0.85);
            font-size: 1rem;
        }

        .foto-card-header span {
            color: #fff;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .foto-card-body {
            padding: 1.8rem;
            text-align: center;
        }

        .foto-preview {
            max-width: 100%;
            max-height: 300px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid #dfe8d8;
        }

        .no-foto {
            padding: 3rem;
            text-align: center;
        }

        .no-foto i {
            font-size: 3rem;
            color: #8cbf73;
            margin-bottom: 0.75rem;
        }

        .no-foto p {
            color: #2d2d2d;
            font-size: 0.85rem;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-action i {
            font-size: 0.8rem;
        }

        .btn-action:hover {
            transform: translateY(-1px);
            text-decoration: none;
        }

        .btn-back {
            background: #f4f4f4;
            border: 1.5px solid #dfe8d8;
            color: #2d2d2d;
        }

        .btn-back:hover {
            background: #eef3ec;
            border-color: #8cbf73;
            color: #005F02;
        }

        .btn-edit {
            background: linear-gradient(135deg, #005F02, #0f4d1c);
            color: #fff;
            box-shadow: 0 2px 8px rgba(0, 95, 2, 0.3);
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, #0d4f14, #0f4d1c);
            color: #fff;
            box-shadow: 0 4px 12px rgba(0, 95, 2, 0.4);
        }

        .btn-print {
            background: linear-gradient(135deg, #4ca94d, #2e6b37);
            color: #fff;
            box-shadow: 0 2px 8px rgba(76, 169, 77, 0.3);
        }

        .btn-print:hover {
            background: linear-gradient(135deg, #2e6b37, #0d4f14);
            color: #fff;
            box-shadow: 0 4px 12px rgba(76, 169, 77, 0.4);
        }

        @media (max-width: 768px) {
            .info-table th {
                width: 40%;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-action {
                justify-content: center;
            }
        }

        @media print {

            .sidebar,
            .btn-back,
            .btn-edit,
            .btn-print,
            .action-buttons,
            header {
                display: none !important;
            }

            .detail-card,
            .foto-card {
                box-shadow: none;
                border: 1px solid #dfe8d8;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper" style="background: #f4f4f4; min-height: 100vh; padding: 2rem;">
        
        <div class="page-header"
            style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <div class="page-header-left" style="display: flex; align-items: center; gap: 1rem;">
                <div class="page-icon"
                    style="width: 48px; height: 48px; background: linear-gradient(135deg, #005F02, #0f4d1c); border-radius: 14px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 14px rgba(0, 95, 2, 0.35);">
                    <i class="fas fa-info-circle" style="color: #fff; font-size: 1.1rem;"></i>
                </div>
                <div class="page-title">
                    <h1 style="font-size: 1.35rem; font-weight: 700; color: #222; margin: 0;">Detail Fasilitas</h1>
                    <p style="font-size: 0.8rem; color: #2d2d2d; margin: 0;"><i
                            class="fas fa-calendar-alt mr-1"></i><?php echo e(now()->format('d F Y')); ?></p>
                </div>
            </div>

            <div class="action-buttons">
                <a href="<?php echo e(route('admin.data-master.fasilitas.index')); ?>" class="btn-action btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <a href="<?php echo e(route('admin.data-master.fasilitas.edit', $fasilitas->id)); ?>" class="btn-action btn-edit">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="#" class="btn-action btn-print" onclick="window.print()">
                    <i class="fas fa-print"></i> Print
                </a>
            </div>
        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 1.5rem;">
            
            <div style="flex: 2; min-width: 300px;">
                <div class="detail-card">
                    <div class="detail-card-header">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Informasi Fasilitas</span>
                    </div>
                    <div class="detail-card-body">
                        <table class="info-table">
                            <tr>
                                <th>Nama Fasilitas</th>
                                <td><?php echo e($fasilitas->nama_fasilitas); ?></td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td><?php echo e($fasilitas->kategori ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td><?php echo e($fasilitas->jumlah); ?> unit</td>
                            </tr>
                            <tr>
                                <th>Kondisi</th>
                                <td>
                                    <?php
                                        $kondisiClass = '';
                                        if ($fasilitas->kondisi == 'Baik')
                                            $kondisiClass = 'baik';
                                        elseif ($fasilitas->kondisi == 'Rusak Ringan')
                                            $kondisiClass = 'ringan';
                                        elseif ($fasilitas->kondisi == 'Rusak Berat')
                                            $kondisiClass = 'berat';
                                    ?>
                                    <span class="kondisi-badge <?php echo e($kondisiClass); ?>"><?php echo e($fasilitas->kondisi); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td><?php echo e($fasilitas->lokasi ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengadaan</th>
                                <td><?php echo e($fasilitas->tanggal_pengadaan ? $fasilitas->tanggal_pengadaan->format('d/m/Y') : '-'); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td><?php echo e($fasilitas->deskripsi ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td><?php echo e($fasilitas->keterangan ?? '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Dibuat Pada</th>
                                <td><?php echo e($fasilitas->created_at ? $fasilitas->created_at->format('d/m/Y H:i') : '-'); ?></td>
                            </tr>
                            <tr>
                                <th>Terakhir Diupdate</th>
                                <td><?php echo e($fasilitas->updated_at ? $fasilitas->updated_at->format('d/m/Y H:i') : '-'); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            
            <div style="flex: 1; min-width: 280px;">
                <div class="foto-card">
                    <div class="foto-card-header">
                        <i class="fas fa-camera"></i>
                        <span>Foto Fasilitas</span>
                    </div>
                    <div class="foto-card-body">
                        <?php if($fasilitas->foto): ?>
                            <img src="<?php echo e(asset('storage/' . $fasilitas->foto)); ?>" alt="Foto <?php echo e($fasilitas->nama_fasilitas); ?>"
                                class="foto-preview">
                        <?php else: ?>
                            <div class="no-foto">
                                <i class="fas fa-image"></i>
                                <p>Tidak ada foto</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/data-master/fasilitas/show.blade.php ENDPATH**/ ?>