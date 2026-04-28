<?php $__env->startSection('title', 'Manajemen Admin'); ?>
<?php $__env->startSection('page-title', 'Manajemen Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, var(--green-main), var(--green-dark)); color: white;">
                <h4 class="mb-0">
                    <i class="fas fa-users-cog"></i> Data Administrator
                </h4>
                <a href="<?php echo e(route('admin.admin-management.create')); ?>" class="btn btn-light" style="color: var(--green-main);">
                    <i class="fas fa-plus"></i> Tambah Admin Baru
                </a>
            </div>
            <div class="card-body">
                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title mb-0">Total Admin</h6>
                                        <h2 class="mb-0 mt-2"><?php echo e($stats['total']); ?></h2>
                                    </div>
                                    <i class="fas fa-users fa-3x opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title mb-0">Admin Aktif</h6>
                                        <h2 class="mb-0 mt-2"><?php echo e($stats['active']); ?></h2>
                                    </div>
                                    <i class="fas fa-user-check fa-3x opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title mb-0">Admin Nonaktif</h6>
                                        <h2 class="mb-0 mt-2"><?php echo e($stats['inactive']); ?></h2>
                                    </div>
                                    <i class="fas fa-user-slash fa-3x opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter -->
                <div class="card mb-4" style="background: var(--bg-soft);">
                    <div class="card-body">
                        <form method="GET" action="<?php echo e(route('admin.admin-management.index')); ?>" class="row g-3">
                            <div class="col-md-5">
                                <label class="form-label fw-semibold">Cari Admin</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    <input type="text" name="search" class="form-control" placeholder="Nama, username, atau email..." value="<?php echo e(request('search')); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold">Status</label>
                                <select name="status" class="form-select">
                                    <option value="">Semua Status</option>
                                    <option value="active" <?php echo e(request('status') == 'active' ? 'selected' : ''); ?>>Aktif</option>
                                    <option value="inactive" <?php echo e(request('status') == 'inactive' ? 'selected' : ''); ?>>Nonaktif</option>
                                </select>
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <div>
                                    <button type="submit" class="btn btn-primary me-2">
                                        <i class="fas fa-filter"></i> Filter
                                    </button>
                                    <a href="<?php echo e(route('admin.admin-management.index')); ?>" class="btn btn-secondary">
                                        <i class="fas fa-sync-alt"></i> Reset
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Bulk Actions -->
                <form id="bulkActionForm" method="POST" action="<?php echo e(route('admin.admin-management.bulk-action')); ?>">
                    <?php echo csrf_field(); ?>
                    <div id="bulkActions" style="display: none;" class="mb-3">
                        <div class="alert alert-info d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-check-square"></i> <span id="selectedCount">0</span> admin dipilih
                            </div>
                            <div>
                                <select name="action" class="form-select d-inline-block w-auto me-2" required>
                                    <option value="">Pilih Aksi Massal</option>
                                    <option value="activate">Aktifkan</option>
                                    <option value="deactivate">Nonaktifkan</option>
                                    <option value="delete">Hapus</option>
                                </select>
                                <button type="submit" class="btn btn-warning" onclick="return confirm('Yakin melakukan aksi massal ini?')">
                                    <i class="fas fa-check"></i> Terapkan
                                </button>
                                <button type="button" class="btn btn-secondary" onclick="clearBulkSelection()">
                                    <i class="fas fa-times"></i> Batal
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Data Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead style="background: var(--green-main); color: white;">
                                <tr>
                                    <th width="50"><input type="checkbox" id="selectAllCheckbox" onclick="toggleSelectAll(this)"></th>
                                    <th width="50">#</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Kontak</th>
                                    <th>Status</th>
                                    <th>Dibuat</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="table-row">
                                    <td class="text-center">
                                        <input type="checkbox" name="ids[]" value="<?php echo e($admin->id); ?>" class="admin-checkbox" onclick="updateBulkActions()">
                                    </td>
                                    <td class="text-center"><?php echo e($admins->firstItem() + $index); ?></td>
                                    <td>
                                        <div class="fw-bold"><?php echo e($admin->name); ?></div>
                                    </td>
                                    <td><?php echo e($admin->username); ?></td>
                                    <td><?php echo e($admin->email); ?></td>
                                    <td><?php echo e($admin->phone ?? '-'); ?></td>
                                    <td>
                                        <?php if($admin->status == 'active'): ?>
                                            <span class="badge bg-success">Aktif</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Nonaktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($admin->created_at->format('d/m/Y')); ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="<?php echo e(route('admin.admin-management.show', $admin->id)); ?>" class="btn btn-info" title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?php echo e(route('admin.admin-management.edit', $admin->id)); ?>" class="btn btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?php echo e(route('admin.admin-management.toggle-status', $admin->id)); ?>" class="btn <?php echo e($admin->status == 'active' ? 'btn-secondary' : 'btn-success'); ?>" title="<?php echo e($admin->status == 'active' ? 'Nonaktifkan' : 'Aktifkan'); ?>" onclick="return confirm('Ubah status admin ini?')">
                                                <i class="fas <?php echo e($admin->status == 'active' ? 'fa-ban' : 'fa-check-circle'); ?>"></i>
                                            </a>
                                            <button type="button" onclick="openDeleteModal('<?php echo e($admin->id); ?>', '<?php echo e($admin->name); ?>')" class="btn btn-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                        <form id="deleteForm<?php echo e($admin->id); ?>" method="POST" action="<?php echo e(route('admin.admin-management.destroy', $admin->id)); ?>" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="9" class="text-center py-5">
                                        <i class="fas fa-users-slash fa-3x text-muted mb-3 d-block"></i>
                                        <h5 class="text-muted">Belum ada data admin</h5>
                                        <p class="text-muted">Klik tombol "Tambah Admin Baru" untuk menambahkan admin.</p>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </form>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>Menampilkan <?php echo e($admins->firstItem() ?? 0); ?> - <?php echo e($admins->lastItem() ?? 0); ?> dari <?php echo e($admins->total()); ?> data</div>
                    <div><?php echo e($admins->links()); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleSelectAll(source) {
        document.querySelectorAll('.admin-checkbox').forEach(cb => cb.checked = source.checked);
        updateBulkActions();
    }

    function updateBulkActions() {
        const selected = document.querySelectorAll('.admin-checkbox:checked').length;
        const bulkDiv = document.getElementById('bulkActions');
        if (selected > 0) {
            bulkDiv.style.display = 'block';
            document.getElementById('selectedCount').innerText = selected;
        } else {
            bulkDiv.style.display = 'none';
        }
    }

    function clearBulkSelection() {
        document.querySelectorAll('.admin-checkbox').forEach(cb => cb.checked = false);
        document.getElementById('selectAllCheckbox').checked = false;
        updateBulkActions();
    }

    function openDeleteModal(id, name) {
        if (confirm(`Yakin ingin menghapus admin "${name}"? Tindakan ini tidak dapat dibatalkan!`)) {
            document.getElementById(`deleteForm${id}`).submit();
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\admin-management\index.blade.php ENDPATH**/ ?>