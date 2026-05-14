<?php $__env->startSection('title', 'Detail Biaya Pendaftaran'); ?>
<?php $__env->startSection('page-title', 'Detail Biaya Pendaftaran'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header" style="background: #eef3ec; border-bottom: 1px solid #dfe8d8;">
            <h5 class="mb-0" style="color: #005F02;">
                <i class="fas fa-info-circle me-2"></i> Detail Biaya: <?php echo e($biaya->nama_biaya); ?>

            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <th style="width: 150px;">Nama Biaya</th>
                            <td>: <strong><?php echo e($biaya->nama_biaya); ?></strong></td>
                        </tr>
                        <tr>
                            <th>Nominal</th>
                            <td>: <span class="text-success fw-bold fs-4"><?php echo e($biaya->nominal_formatted); ?></span></td>
                        </tr>
                        <tr>
                            <th>Urutan</th>
                            <td>: <?php echo e($biaya->urutan); ?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:
                                <?php if($biaya->status == 'aktif'): ?>
                                    <span class="badge bg-success">Aktif</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Nonaktif</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>: <?php echo e($biaya->created_at ? $biaya->created_at->format('d/m/Y H:i:s') : '-'); ?></td>
                        </tr>
                        <tr>
                            <th>Terakhir Diupdate</th>
                            <td>: <?php echo e($biaya->updated_at ? $biaya->updated_at->format('d/m/Y H:i:s') : '-'); ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6 class="card-title"><i class="fas fa-file-alt me-2"></i>Keterangan</h6>
                            <p class="card-text"><?php echo e($biaya->keterangan ?? 'Tidak ada keterangan'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-end gap-2">
                <a href="<?php echo e(route('admin.biaya-pendaftaran.edit', $biaya->id)); ?>" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
                <a href="<?php echo e(route('admin.biaya-pendaftaran.index')); ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/biaya-pendaftaran/show.blade.php ENDPATH**/ ?>