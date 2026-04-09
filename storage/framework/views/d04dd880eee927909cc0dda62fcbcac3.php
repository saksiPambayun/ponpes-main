<?php $__env->startSection('title', 'Akta Wakaf'); ?>
<?php $__env->startSection('page-title', 'Dokumen Akta Wakaf'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-wrapper" style="background: #f0f4f8; min-height: 100vh; padding: 2rem;">
    <div class="page-header" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem;">
        <div class="page-header-left" style="display: flex; align-items: center; gap: 1rem;">
            <div class="page-icon" style="width: 48px; height: 48px; background: linear-gradient(135deg, #4361ee, #7209b7); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-landmark" style="color: #fff;"></i>
            </div>
            <div>
                <h1 style="font-size: 1.35rem; font-weight: 700; color: #1a1f36; margin: 0;">Akta Wakaf</h1>
                <p style="font-size: 0.8rem; color: #8898aa; margin: 0;">Manajemen dokumen wakaf tanah/bangunan</p>
            </div>
        </div>
        <a href="<?php echo e(route('admin.akta-wakaf.create')); ?>" class="btn-primary-action" style="display: inline-flex; align-items: center; gap: 0.5rem; background: linear-gradient(135deg, #4361ee, #7209b7); color: #fff; padding: 0.6rem 1.2rem; border-radius: 10px; text-decoration: none;">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>

    <div class="card" style="background: #fff; border-radius: 16px; overflow: hidden;">
        <div class="table-responsive" style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background: #f8fafc;">
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <th style="padding: 1rem; text-align: left; font-size: 0.75rem; font-weight: 700; color: #64748b;">Nomor Sertifikat</th>
                        <th style="padding: 1rem; text-align: left; font-size: 0.75rem; font-weight: 700; color: #64748b;">Lokasi</th>
                        <th style="padding: 1rem; text-align: left; font-size: 0.75rem; font-weight: 700; color: #64748b;">Luas</th>
                        <th style="padding: 1rem; text-align: left; font-size: 0.75rem; font-weight: 700; color: #64748b;">Nazhir</th>
                        <th style="padding: 1rem; text-align: center; font-size: 0.75rem; font-weight: 700; color: #64748b;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $aktaWakaf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 1rem; font-size: 0.85rem;"><?php echo e($item->nomor_sertifikat ?? '-'); ?></td>
                        <td style="padding: 1rem; font-size: 0.85rem;"><?php echo e($item->lokasi_tanah ?? '-'); ?></td>
                        <td style="padding: 1rem; font-size: 0.85rem;"><?php echo e($item->luas_tanah ?? '-'); ?> m²</td>
                        <td style="padding: 1rem; font-size: 0.85rem;"><?php echo e($item->nazhir ?? '-'); ?></td>
                        <td style="padding: 1rem; text-align: center;">
                            <div style="display: flex; gap: 0.5rem; justify-content: center;">
                                <a href="<?php echo e(route('admin.akta-wakaf.show', $item->id)); ?>" class="btn-view" style="background: #dbeafe; color: #1d4ed8; padding: 0.4rem 0.7rem; border-radius: 8px;">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo e(route('admin.akta-wakaf.edit', $item->id)); ?>" class="btn-edit" style="background: #fef9c3; color: #92400e; padding: 0.4rem 0.7rem; border-radius: 8px;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('admin.akta-wakaf.destroy', $item->id)); ?>" method="POST" style="display: inline;" onsubmit="return confirm('Hapus data ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn-delete" style="background: #fee2e2; color: #b91c1c; padding: 0.4rem 0.7rem; border-radius: 8px; border: none; cursor: pointer;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" style="padding: 3rem; text-align: center; color: #94a3b8;">
                            <i class="fas fa-landmark text-4xl mb-3 block"></i>
                            <p>Belum ada data wakaf</p>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if($aktaWakaf->hasPages()): ?>
        <div style="padding: 1rem; border-top: 1px solid #f1f5f9;">
            <?php echo e($aktaWakaf->links()); ?>

        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/akta-wakaf/index.blade.php ENDPATH**/ ?>