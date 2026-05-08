<?php $__env->startSection('title', 'Kelola Biaya Pendaftaran'); ?>
<?php $__env->startSection('page-title', 'Kelola Biaya Pendaftaran'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center"
            style="background: #eef3ec; border-bottom: 1px solid #dfe8d8;">
            <h5 class="mb-0" style="color: #005F02;">
                <i class="fas fa-money-bill-wave me-2"></i> Daftar Biaya Pendaftaran
            </h5>
            <a href="<?php echo e(route('admin.biaya-pendaftaran.create')); ?>" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Tambah Biaya
            </a>
        </div>
        <div class="card-body">
            <?php if($biaya->count() > 0): ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead style="background: #f4f4f4;">
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nama Biaya</th>
                                <th>Nominal</th>
                                <th>Urutan</th>
                                <th>Status</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $biaya; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="table-row">
                                    <td><?php echo e($index + 1); ?></td>
                                    <td>
                                        <strong><?php echo e($item->nama_biaya); ?></strong>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-success"><?php echo e($item->nominal_formatted); ?></span>
                                    </td>
                                    <td><?php echo e($item->urutan); ?></td>
                                    <td>
                                        <?php if($item->status == 'aktif'): ?>
                                            <span class="badge bg-success">Aktif</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group gap-2 d-flex">
                                            <a href="<?php echo e(route('admin.biaya-pendaftaran.show', $item->id)); ?>"
                                                class="btn btn-sm btn-info" title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?php echo e(route('admin.biaya-pendaftaran.edit', $item->id)); ?>"
                                                class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button
                                                onclick="toggleStatus(<?php echo e($item->id); ?>, '<?php echo e($item->nama_biaya); ?>', '<?php echo e($item->status); ?>')"
                                                class="btn btn-sm <?php echo e($item->status == 'aktif' ? 'btn-secondary' : 'btn-success'); ?>"
                                                title="<?php echo e($item->status == 'aktif' ? 'Nonaktifkan' : 'Aktifkan'); ?>">
                                                <i class="fas <?php echo e($item->status == 'aktif' ? 'fa-ban' : 'fa-check'); ?>"></i>
                                            </button>
                                            <button onclick="openDeleteModal(<?php echo e($item->id); ?>, '<?php echo e($item->nama_biaya); ?>')"
                                                class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>

                                        <form id="deleteForm<?php echo e($item->id); ?>"
                                            action="<?php echo e(route('admin.biaya-pendaftaran.destroy', $item->id)); ?>" method="POST"
                                            style="display: none;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                        </form>

                                        <form id="toggleForm<?php echo e($item->id); ?>"
                                            action="<?php echo e(route('admin.biaya-pendaftaran.toggle-status', $item->id)); ?>" method="POST"
                                            style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-money-bill-wave fa-4x mb-3" style="color: #8cbf73;"></i>
                    <p class="text-muted">Belum ada data biaya pendaftaran.</p>
                    <a href="<?php echo e(route('admin.biaya-pendaftaran.create')); ?>" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Tambah Biaya Pertama
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/biaya-pendaftaran/index.blade.php ENDPATH**/ ?>