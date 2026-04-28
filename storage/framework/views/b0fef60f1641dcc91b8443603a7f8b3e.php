<?php $__env->startSection('title', 'Akta Wakaf'); ?>
<?php $__env->startSection('page-title', 'Dokumen Akta Wakaf'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper" style="background: #f4f4f4; min-height: 100vh; padding: 2rem;">
        <div class="page-header"
            style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <div class="page-header-left" style="display: flex; align-items: center; gap: 1rem;">
                <div class="page-icon"
                    style="width: 48px; height: 48px; background: linear-gradient(135deg, #005F02, #0f4d1c); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-landmark" style="color: #fff;"></i>
                </div>
                <div>
                    <h1 style="font-size: 1.35rem; font-weight: 700; color: #222; margin: 0;">Akta Wakaf</h1>
                    <p style="font-size: 0.8rem; color: #2d2d2d; margin: 0;">Manajemen dokumen wakaf tanah/bangunan</p>
                </div>
            </div>
            <a href="<?php echo e(route('admin.akta-wakaf.create')); ?>" class="btn-primary-action"
                style="display: inline-flex; align-items: center; gap: 0.5rem; background: linear-gradient(135deg, #005F02, #0f4d1c); color: #fff; padding: 0.6rem 1.2rem; border-radius: 10px; text-decoration: none; transition: all 0.2s ease;">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>

        <div class="card"
            style="background: #fff; border-radius: 20px; overflow: hidden; border: 1px solid #dfe8d8; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">
            <div class="table-responsive" style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead style="background: #f4f4f4;">
                        <tr style="border-bottom: 1px solid #dfe8d8;">
                            <th
                                style="padding: 1rem; text-align: left; font-size: 0.75rem; font-weight: 700; color: #2d2d2d;">
                                Nomor Sertifikat</th>
                            <th
                                style="padding: 1rem; text-align: left; font-size: 0.75rem; font-weight: 700; color: #2d2d2d;">
                                Lokasi</th>
                            <th
                                style="padding: 1rem; text-align: left; font-size: 0.75rem; font-weight: 700; color: #2d2d2d;">
                                Luas</th>
                            <th
                                style="padding: 1rem; text-align: left; font-size: 0.75rem; font-weight: 700; color: #2d2d2d;">
                                Nazhir</th>
                            <th
                                style="padding: 1rem; text-align: center; font-size: 0.75rem; font-weight: 700; color: #2d2d2d;">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $aktaWakaf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr style="border-bottom: 1px solid #dfe8d8;">
                                <td style="padding: 1rem; font-size: 0.85rem; color: #333;"><?php echo e($item->nomor_sertifikat ?? '-'); ?>

                                </td>
                                <td style="padding: 1rem; font-size: 0.85rem; color: #333;"><?php echo e($item->lokasi_tanah ?? '-'); ?>

                                </td>
                                <td style="padding: 1rem; font-size: 0.85rem; color: #333;"><?php echo e($item->luas_tanah ?? '-'); ?> m²
                                </td>
                                <td style="padding: 1rem; font-size: 0.85rem; color: #333;"><?php echo e($item->nazhir ?? '-'); ?></td>
                                <td style="padding: 1rem; text-align: center;">
                                    <div style="display: flex; gap: 0.5rem; justify-content: center;">
                                        <a href="<?php echo e(route('admin.akta-wakaf.show', $item->id)); ?>" class="btn-view"
                                            style="background: #eef3ec; color: #005F02; padding: 0.4rem 0.7rem; border-radius: 8px; transition: all 0.2s ease;">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('admin.akta-wakaf.edit', $item->id)); ?>" class="btn-edit"
                                            style="background: #dfe8d8; color: #0d4f14; padding: 0.4rem 0.7rem; border-radius: 8px; transition: all 0.2s ease;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.akta-wakaf.destroy', $item->id)); ?>" method="POST"
                                            style="display: inline;" onsubmit="return confirm('Hapus data ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn-delete"
                                                style="background: #fef2f2; color: #dc2626; padding: 0.4rem 0.7rem; border-radius: 8px; border: none; cursor: pointer; transition: all 0.2s ease;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" style="padding: 3rem; text-align: center; color: #8cbf73;">
                                    <i class="fas fa-landmark"
                                        style="font-size: 2rem; margin-bottom: 1rem; display: block;"></i>
                                    <p style="color: #2d2d2d;">Belum ada data wakaf</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php if($aktaWakaf->hasPages()): ?>
                <div style="padding: 1rem; border-top: 1px solid #dfe8d8; background: #eef3ec;">
                    <?php echo e($aktaWakaf->links()); ?>

                </div>
            <?php endif; ?>
        </div>

        <style>
            .btn-primary-action:hover {
                transform: translateY(-1px);
                box-shadow: 0 4px 12px rgba(0, 95, 2, 0.3);
            }

            .btn-view:hover {
                background: #dfe8d8 !important;
                transform: translateY(-1px);
            }

            .btn-edit:hover {
                background: #8cbf73 !important;
                color: #fff !important;
                transform: translateY(-1px);
            }

            .btn-delete:hover {
                background: #fecaca !important;
                transform: translateY(-1px);
            }

            /* Pagination Styling */
            .pagination {
                margin: 0;
                display: flex;
                gap: 4px;
                flex-wrap: wrap;
            }

            .pagination .page-link {
                border: 1px solid #dfe8d8;
                color: #2d2d2d;
                padding: 6px 12px;
                border-radius: 8px;
                font-size: 0.82rem;
                font-weight: 600;
                text-decoration: none;
                transition: all 0.15s;
            }

            .pagination .page-link:hover {
                background: #eef3ec;
                border-color: #8cbf73;
                color: #005F02;
            }

            .pagination .page-item.active .page-link {
                background: linear-gradient(135deg, #005F02, #0f4d1c);
                border-color: #005F02;
                color: #fff;
            }

            .pagination .page-item.disabled .page-link {
                opacity: 0.45;
                pointer-events: none;
            }
        </style>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/admin/akta-wakaf/index.blade.php ENDPATH**/ ?>