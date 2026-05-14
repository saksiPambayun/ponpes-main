<?php $__env->startSection('title', 'Kelola Biaya Pendaftaran'); ?>
<?php $__env->startSection('page-title', 'Kelola Biaya Pendaftaran'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center"
            style="background: #eef3ec; border-bottom: 1px solid #dfe8d8;">
            <h5 class="mb-0" style="color: #005F02;">
                <i class="fas fa-money-bill-wave me-2"></i> Daftar Biaya Pendaftaran
            </h5>
            <a href="<?php echo e(route('admin.biaya-pendaftaran.create')); ?>" class="btn btn-primary"
                style="background: linear-gradient(135deg, #005F02, #0f4d1c); border: none;">
                <i class="fas fa-plus me-1"></i> Tambah Biaya
            </a>
        </div>
        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i> <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i> <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

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
                                <th style="width: 220px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $biaya; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="table-row" id="row-<?php echo e($item->id); ?>">
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <strong><?php echo e($item->nama_biaya); ?></strong>
                                        <?php if($item->keterangan): ?>
                                            <br><small class="text-muted"><?php echo e($item->keterangan); ?></small>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-success"><?php echo e($item->nominal_formatted); ?></span>
                                    </td>
                                    <td><?php echo e($item->urutan); ?></td>
                                    <td>
                                        <span id="status-badge-<?php echo e($item->id); ?>">
                                            <?php if($item->status == 'aktif'): ?>
                                                <span class="badge bg-success px-3 py-2">✓ Aktif</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary px-3 py-2">✗ Nonaktif</span>
                                            <?php endif; ?>
                                        </span>
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
                                            <button type="button"
                                                onclick="toggleStatus(<?php echo e($item->id); ?>, '<?php echo e(addslashes($item->nama_biaya)); ?>', '<?php echo e($item->status); ?>')"
                                                class="btn btn-sm <?php echo e($item->status == 'aktif' ? 'btn-secondary' : 'btn-success'); ?>"
                                                title="<?php echo e($item->status == 'aktif' ? 'Nonaktifkan' : 'Aktifkan'); ?>"
                                                id="toggle-btn-<?php echo e($item->id); ?>">
                                                <i class="fas <?php echo e($item->status == 'aktif' ? 'fa-ban' : 'fa-check'); ?>"></i>
                                                <span class="ms-1"><?php echo e($item->status == 'aktif' ? 'Nonaktif' : 'Aktif'); ?></span>
                                            </button>
                                            <button type="button"
                                                onclick="openDeleteModal(<?php echo e($item->id); ?>, '<?php echo e(addslashes($item->nama_biaya)); ?>')"
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
                <div class="mt-3">
                    <?php echo e($biaya->links()); ?>

                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-money-bill-wave fa-4x mb-3" style="color: #8cbf73;"></i>
                    <p class="text-muted">Belum ada data biaya pendaftaran.</p>
                    <a href="<?php echo e(route('admin.biaya-pendaftaran.create')); ?>" class="btn btn-primary"
                        style="background: linear-gradient(135deg, #005F02, #0f4d1c); border: none;">
                        <i class="fas fa-plus me-1"></i> Tambah Biaya Pertama
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50"
        style="display: none;">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Hapus Biaya</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Apakah Anda yakin ingin menghapus biaya <span id="deleteName"
                            class="font-semibold text-gray-700"></span>?
                    </p>
                    <p class="text-xs text-red-500 mt-2">Tindakan ini tidak dapat dibatalkan!</p>
                </div>
                <div class="flex justify-center gap-3 mt-4">
                    <button onclick="closeDeleteModal()"
                        class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-gray-600">
                        Batal
                    </button>
                    <button id="confirmDeleteBtn"
                        class="px-4 py-2 bg-red-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-red-700">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let deleteId = null;

        // Fungsi Toggle Status dengan AJAX
        function toggleStatus(id, namaBiaya, currentStatus) {
            const newStatus = currentStatus === 'aktif' ? 'nonaktif' : 'aktif';
            const actionText = newStatus === 'aktif' ? 'Mengaktifkan' : 'Menonaktifkan';

            Swal.fire({
                title: `${actionText} Biaya?`,
                html: `<div class="text-left">
                                <p class="mb-2">Apakah Anda yakin ingin <strong>${actionText.toLowerCase()}</strong> biaya <strong>"${namaBiaya}"</strong>?</p>
                                <div class="mt-3 p-3 ${newStatus === 'aktif' ? 'bg-green-50' : 'bg-yellow-50'} rounded-lg border ${newStatus === 'aktif' ? 'border-green-200' : 'border-yellow-200'}">
                                    <i class="fas ${newStatus === 'aktif' ? 'fa-check-circle text-green-500' : 'fa-ban text-yellow-500'} mr-2"></i>
                                    <span class="text-sm">Status akan berubah menjadi <strong>${newStatus.toUpperCase()}</strong></span>
                                </div>
                            </div>`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: newStatus === 'aktif' ? '#005F02' : '#d97706',
                cancelButtonColor: '#6c757d',
                confirmButtonText: `<i class="fas ${newStatus === 'aktif' ? 'fa-check' : 'fa-ban'} mr-1"></i> Ya, ${actionText}!`,
                cancelButtonText: '<i class="fas fa-times mr-1"></i> Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilkan loading
                    Swal.fire({
                        title: `${actionText}...`,
                        text: `Sedang ${actionText.toLowerCase()} biaya ${namaBiaya}`,
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Kirim request AJAX
                    fetch(`/admin/biaya-pendaftaran/${id}/toggle-status`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({})
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Update tampilan status badge
                                const statusBadge = document.getElementById(`status-badge-${id}`);
                                const toggleBtn = document.getElementById(`toggle-btn-${id}`);

                                if (data.new_status === 'aktif') {
                                    statusBadge.innerHTML = '<span class="badge bg-success px-3 py-2">✓ Aktif</span>';
                                    toggleBtn.className = 'btn btn-sm btn-secondary';
                                    toggleBtn.innerHTML = '<i class="fas fa-ban"></i><span class="ms-1">Nonaktif</span>';
                                    toggleBtn.title = 'Nonaktifkan';
                                } else {
                                    statusBadge.innerHTML = '<span class="badge bg-secondary px-3 py-2">✗ Nonaktif</span>';
                                    toggleBtn.className = 'btn btn-sm btn-success';
                                    toggleBtn.innerHTML = '<i class="fas fa-check"></i><span class="ms-1">Aktif</span>';
                                    toggleBtn.title = 'Aktifkan';
                                }

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: `Biaya ${namaBiaya} telah ${data.new_status === 'aktif' ? 'diaktifkan' : 'dinonaktifkan'}`,
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: data.message || 'Terjadi kesalahan saat mengubah status'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Terjadi kesalahan pada server'
                            });
                        });
                }
            });
        }

        // Modal Delete
        function openDeleteModal(id, name) {
            deleteId = id;
            document.getElementById('deleteName').textContent = name;
            document.getElementById('deleteModal').style.display = 'block';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
            deleteId = null;
        }

        document.getElementById('confirmDeleteBtn')?.addEventListener('click', function () {
            if (deleteId) {
                Swal.fire({
                    title: 'Menghapus...',
                    text: 'Sedang menghapus data biaya',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                document.getElementById('deleteForm' + deleteId).submit();
            }
        });

        // Close modal when clicking outside
        window.onclick = function (event) {
            const modal = document.getElementById('deleteModal');
            if (event.target == modal) {
                closeDeleteModal();
            }
        }

        // Auto close alert after 3 seconds
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    setTimeout(() => {
                        alert.style.transition = 'opacity 0.5s';
                        alert.style.opacity = '0';
                        setTimeout(() => alert.remove(), 500);
                    }, 3000);
                });
            }, 1000);
        });
    </script>

    <style>
        .btn-group .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }

        .badge {
            font-size: 0.75rem;
            font-weight: 500;
        }

        .table-row:hover {
            background-color: #f8f9fa;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/biaya-pendaftaran/index.blade.php ENDPATH**/ ?>