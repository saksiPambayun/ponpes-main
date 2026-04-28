<?php $__env->startSection('title', 'Manajemen Admin'); ?>
<?php $__env->startSection('page-title', 'Manajemen Admin'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid px-4">
        <!-- Stats Cards Row -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted text-uppercase small fw-semibold">TOTAL ADMIN</span>
                                <h2 class="mt-2 mb-0 fw-bold"><?php echo e($stats['total']); ?></h2>
                            </div>
                            <div class="bg-primary bg-opacity-10 rounded-3 p-3">
                                <i class="fas fa-users text-primary fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted text-uppercase small fw-semibold">ADMIN AKTIF</span>
                                <h2 class="mt-2 mb-0 fw-bold text-success"><?php echo e($stats['active']); ?></h2>
                            </div>
                            <div class="bg-success bg-opacity-10 rounded-3 p-3">
                                <i class="fas fa-user-check text-success fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted text-uppercase small fw-semibold">ADMIN NONAKTIF</span>
                                <h2 class="mt-2 mb-0 fw-bold text-danger"><?php echo e($stats['inactive']); ?></h2>
                            </div>
                            <div class="bg-danger bg-opacity-10 rounded-3 p-3">
                                <i class="fas fa-user-slash text-danger fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Card -->
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <h5 class="mb-0 fw-semibold">
                        <i class="fas fa-table me-2 text-primary"></i> Data Administrator
                    </h5>
                    <a href="<?php echo e(route('admin.admin-management.create')); ?>" class="btn btn-primary btn-sm rounded-3 px-3">
                        <i class="fas fa-plus me-1"></i> Tambah Admin
                    </a>
                </div>
            </div>

            <div class="card-body p-4">
                <!-- Filter Bar -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" id="searchInput" class="form-control border-start-0"
                                placeholder="Cari nama, username, atau email..." value="<?php echo e(request('search')); ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select id="statusFilter" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="active" <?php echo e(request('status') == 'active' ? 'selected' : ''); ?>>Aktif</option>
                            <option value="inactive" <?php echo e(request('status') == 'inactive' ? 'selected' : ''); ?>>Nonaktif</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button id="filterBtn" class="btn btn-primary px-4">
                            <i class="fas fa-filter me-1"></i> Cari
                        </button>
                        <a href="<?php echo e(route('admin.admin-management.index')); ?>" class="btn btn-secondary px-4">
                            <i class="fas fa-sync-alt me-1"></i> Reset
                        </a>
                    </div>
                </div>

                <!-- Bulk Actions Bar -->
                <div id="bulkActions" class="alert alert-info py-2 px-3 mb-3" style="display: none;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-check-square me-2"></i>
                            <span id="selectedCount">0</span> admin dipilih
                        </div>
                        <div>
                            <select id="bulkAction" class="form-select form-select-sm d-inline-block w-auto me-2">
                                <option value="">Pilih Aksi</option>
                                <option value="activate">Aktifkan</option>
                                <option value="deactivate">Nonaktifkan</option>
                                <option value="delete">Hapus</option>
                            </select>
                            <button type="button" id="applyBulkAction" class="btn btn-warning btn-sm">
                                <i class="fas fa-check me-1"></i> Terapkan
                            </button>
                            <button type="button" id="cancelBulkAction" class="btn btn-secondary btn-sm">
                                <i class="fas fa-times me-1"></i> Batal
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Data Table -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="40">
                                    <input type="checkbox" id="selectAllCheckbox" class="form-check-input">
                                </th>
                                <th width="50">NO</th>
                                <th>NAMA</th>
                                <th>USERNAME</th>
                                <th>EMAIL</th>
                                <th>KONTAK</th>
                                <th>STATUS</th>
                                <th>TANGGAL</th>
                                <th width="120">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id="adminTableBody">
                            <?php $__empty_1 = true; $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input admin-checkbox" value="<?php echo e($admin->id); ?>">
                                    </td>
                                    <td class="text-muted"><?php echo e($admins->firstItem() + $index); ?></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-placeholder bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 35px; height: 35px;">
                                                <span class="text-primary fw-bold small">
                                                    <?php echo e(strtoupper(substr($admin->name, 0, 2))); ?>

                                                </span>
                                            </div>
                                            <span class="fw-medium"><?php echo e($admin->name); ?></span>
                                        </div>
                                    </td>
                                    <td><span class="text-muted">@</span><?php echo e($admin->username); ?></td>
                                    <td><?php echo e($admin->email); ?></td>
                                    <td><?php echo e($admin->phone ?? '-'); ?></td>
                                    <td>
                                        <?php if($admin->status == 'active'): ?>
                                            <span class="badge bg-success rounded-pill px-3 py-1">Aktif</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger rounded-pill px-3 py-1">Nonaktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <small class="text-muted"><?php echo e($admin->created_at->format('d/m/Y')); ?></small>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?php echo e(route('admin.admin-management.show', $admin->id)); ?>"
                                                class="btn btn-outline-info rounded-3 me-1" title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?php echo e(route('admin.admin-management.edit', $admin->id)); ?>"
                                                class="btn btn-outline-warning rounded-3 me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?php echo e(route('admin.admin-management.toggle-status', $admin->id)); ?>"
                                                class="btn btn-outline-<?php echo e($admin->status == 'active' ? 'secondary' : 'success'); ?> rounded-3 me-1"
                                                title="<?php echo e($admin->status == 'active' ? 'Nonaktifkan' : 'Aktifkan'); ?>"
                                                onclick="return confirm('Ubah status admin ini?')">
                                                <i
                                                    class="fas <?php echo e($admin->status == 'active' ? 'fa-ban' : 'fa-check-circle'); ?>"></i>
                                            </a>
                                            <button type="button"
                                                onclick="openDeleteModal('<?php echo e($admin->id); ?>', '<?php echo e($admin->name); ?>')"
                                                class="btn btn-outline-danger rounded-3" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                        <form id="deleteForm<?php echo e($admin->id); ?>" method="POST"
                                            action="<?php echo e(route('admin.admin-management.destroy', $admin->id)); ?>"
                                            style="display: none;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="9" class="text-center py-5">
                                        <i class="fas fa-folder-open text-muted fa-3x mb-3 d-block"></i>
                                        <h6 class="text-muted">Belum ada data admin</h6>
                                        <p class="text-muted small">Klik tombol "Tambah Admin" untuk menambahkan admin baru.</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4 pt-2">
                    <div class="text-muted small">
                        Menampilkan <?php echo e($admins->firstItem() ?? 0); ?> - <?php echo e($admins->lastItem() ?? 0); ?>

                        dari <?php echo e($admins->total()); ?> data
                    </div>
                    <div class="pagination-wrapper">
                        <?php echo e($admins->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-3">
                <div class="modal-header border-0 pb-0">
                    <div class="mx-auto text-center">
                        <div class="bg-danger bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                            <i class="fas fa-exclamation-triangle text-danger fa-2x"></i>
                        </div>
                        <h5 class="modal-title fw-bold">Konfirmasi Hapus</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center pt-0">
                    <p id="deleteModalText" class="mb-0">Yakin ingin menghapus data ini?</p>
                    <p class="text-muted small mt-2">Tindakan ini tidak dapat dibatalkan!</p>
                </div>
                <div class="modal-footer border-0 justify-content-center gap-2 pt-0">
                    <button type="button" class="btn btn-light rounded-3 px-4" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Batal
                    </button>
                    <button type="button" id="confirmDeleteBtn" class="btn btn-danger rounded-3 px-4">
                        <i class="fas fa-trash me-1"></i> Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden Form for Filter -->
    <form id="filterForm" method="GET" action="<?php echo e(route('admin.admin-management.index')); ?>" style="display: none;">
        <input type="hidden" name="search" id="filterSearch">
        <input type="hidden" name="status" id="filterStatus">
    </form>

    <!-- Bulk Action Form -->
    <form id="bulkActionForm" method="POST" action="<?php echo e(route('admin.admin-management.bulk-action')); ?>"
        style="display: none;">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="ids" id="bulkIds">
        <input type="hidden" name="action" id="bulkActionType">
    </form>

    <script>
        // Filter functionality
        function applyFilter() {
            document.getElementById('filterSearch').value = document.getElementById('searchInput').value;
            document.getElementById('filterStatus').value = document.getElementById('statusFilter').value;
            document.getElementById('filterForm').submit();
        }

        document.getElementById('filterBtn').addEventListener('click', applyFilter);
        document.getElementById('searchInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter') applyFilter();
        });
        document.getElementById('statusFilter').addEventListener('change', applyFilter);

        // Bulk selection
        let selectedIds = [];

        function updateBulkActions() {
            const checkboxes = document.querySelectorAll('.admin-checkbox:checked');
            selectedIds = Array.from(checkboxes).map(cb => cb.value);
            const count = selectedIds.length;
            const bulkDiv = document.getElementById('bulkActions');

            if (count > 0) {
                bulkDiv.style.display = 'block';
                document.getElementById('selectedCount').innerText = count;
            } else {
                bulkDiv.style.display = 'none';
            }
        }

        function toggleSelectAll(source) {
            document.querySelectorAll('.admin-checkbox').forEach(cb => cb.checked = source.checked);
            updateBulkActions();
        }

        document.getElementById('selectAllCheckbox').addEventListener('change', function () {
            toggleSelectAll(this);
        });

        document.querySelectorAll('.admin-checkbox').forEach(cb => {
            cb.addEventListener('change', updateBulkActions);
        });

        document.getElementById('cancelBulkAction').addEventListener('click', function () {
            document.querySelectorAll('.admin-checkbox').forEach(cb => cb.checked = false);
            document.getElementById('selectAllCheckbox').checked = false;
            updateBulkActions();
        });

        document.getElementById('applyBulkAction').addEventListener('click', function () {
            const action = document.getElementById('bulkAction').value;
            if (!action) {
                alert('Pilih aksi terlebih dahulu!');
                return;
            }

            if (selectedIds.length === 0) {
                alert('Tidak ada admin yang dipilih!');
                return;
            }

            let confirmMsg = '';
            if (action === 'activate') confirmMsg = 'Aktifkan admin yang dipilih?';
            else if (action === 'deactivate') confirmMsg = 'Nonaktifkan admin yang dipilih?';
            else confirmMsg = 'Hapus admin yang dipilih? Tindakan ini tidak dapat dibatalkan!';

            if (confirm(confirmMsg)) {
                document.getElementById('bulkIds').value = selectedIds.join(',');
                document.getElementById('bulkActionType').value = action;
                document.getElementById('bulkActionForm').submit();
            }
        });

        // Delete modal
        let currentDeleteId = null;

        function openDeleteModal(id, name) {
            currentDeleteId = id;
            document.getElementById('deleteModalText').innerHTML = `Yakin ingin menghapus <strong class="text-danger">"${name}"</strong>?`;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
            if (currentDeleteId) {
                document.getElementById(`deleteForm${currentDeleteId}`).submit();
            }
        });
    </script>

    <style>
        /* Custom styles untuk tampilan minimalis */
        .table th {
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6c757d;
            border-bottom-width: 1px;
        }

        .table td {
            font-size: 0.875rem;
            vertical-align: middle;
        }

        .avatar-placeholder {
            transition: all 0.2s ease;
        }

        .btn-outline-info,
        .btn-outline-warning,
        .btn-outline-secondary,
        .btn-outline-success,
        .btn-outline-danger {
            border-width: 1px;
            transition: all 0.2s ease;
        }

        .btn-outline-info:hover,
        .btn-outline-warning:hover,
        .btn-outline-secondary:hover,
        .btn-outline-success:hover,
        .btn-outline-danger:hover {
            transform: translateY(-2px);
        }

        .badge {
            font-weight: 500;
            font-size: 0.7rem;
        }

        .pagination {
            margin-bottom: 0;
        }

        .pagination .page-link {
            border-radius: 8px;
            margin: 0 3px;
            color: #495057;
            border: 1px solid #dee2e6;
        }

        .pagination .page-item.active .page-link {
            background-color: #005F02;
            border-color: #005F02;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #005F02;
            box-shadow: 0 0 0 0.2rem rgba(0, 95, 2, 0.25);
        }
</style><?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/admin/admin-management/index.blade.php ENDPATH**/ ?>