<?php $__env->startSection('title', 'Kelola Gelombang Pendaftaran'); ?>
<?php $__env->startSection('page-title', 'Kelola Gelombang Pendaftaran'); ?>

<?php $__env->startSection('content'); ?>
    <div class="mb-6 flex justify-between items-center">
        <div>
            <p class="text-gray-600">Kelola gelombang pendaftaran dan proses penerimaan santri.</p>
        </div>
        <a href="<?php echo e(route('admin.pendaftaran.waves.create')); ?>" class="px-4 py-2 rounded-lg text-white"
            style="background: linear-gradient(135deg, #005F02, #0f4d1c);">
            <i class="fas fa-plus mr-2"></i>Tambah Gelombang
        </a>
    </div>

    
    <?php if(session('success')): ?>
        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded flex items-center justify-between">
            <div>
                <i class="fas fa-check-circle mr-2"></i> <?php echo e(session('success')); ?>

            </div>
            <button onclick="this.parentElement.remove()" class="text-green-700">&times;</button>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded flex items-center justify-between">
            <div>
                <i class="fas fa-exclamation-circle mr-2"></i> <?php echo e(session('error')); ?>

            </div>
            <button onclick="this.parentElement.remove()" class="text-red-700">&times;</button>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="card p-6" style="background: #fff; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <div class="flex items-center">
                <div class="p-3 rounded-full mr-4" style="background: #eef3ec; color: #005F02;">
                    <i class="fas fa-wave-square text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Gelombang</p>
                    <h3 class="text-2xl font-bold"><?php echo e($waves->total()); ?></h3>
                </div>
            </div>
        </div>
        <div class="card p-6" style="background: #fff; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <div class="flex items-center">
                <div class="p-3 rounded-full mr-4" style="background: #eef3ec; color: #005F02;">
                    <i class="fas fa-check-circle text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Gelombang Aktif</p>
                    <h3 class="text-2xl font-bold"><?php echo e($activeWaves); ?></h3>
                </div>
            </div>
        </div>
        <div class="card p-6" style="background: #fff; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <div class="flex items-center">
                <div class="p-3 rounded-full mr-4" style="background: #eef3ec; color: #005F02;">
                    <i class="fas fa-calendar-alt text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tahun Ajaran</p>
                    <h3 class="text-2xl font-bold">2026/2027</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card overflow-hidden" style="background: #fff; border-radius: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y">
                <thead style="background: #f4f4f4;">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Nama Gelombang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Periode</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Kuota</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Terdaftar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    <?php $__empty_1 = true; $__currentLoopData = $waves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $hasRegistrations = $wave->registrations_count > 0;
                        ?>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-800"><?php echo e($wave->name); ?></div>
                                <?php if($wave->description): ?>
                                    <div class="text-xs text-gray-500 mt-1"><?php echo e(Str::limit($wave->description, 50)); ?></div>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600"><?php echo e(\Carbon\Carbon::parse($wave->start_date)->format('d/m/Y')); ?></div>
                                <div class="text-xs text-gray-400">s/d <?php echo e(\Carbon\Carbon::parse($wave->end_date)->format('d/m/Y')); ?></div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600"><?php echo e($wave->quota ?? 'Tidak terbatas'); ?></div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-700"><?php echo e($wave->registrations_count); ?></div>
                                <?php if($wave->quota): ?>
                                    <div class="w-32 bg-gray-200 rounded-full h-1.5 mt-1">
                                        <div class="h-1.5 rounded-full"
                                            style="width: <?php echo e(min(100, ($wave->registrations_count / $wave->quota) * 100)); ?>%; background: #005F02;">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php if($wave->is_active): ?>
                                    <span class="px-2 py-1 text-xs rounded-full" style="background: #eef3ec; color: #005F02;">
                                        <i class="fas fa-circle text-xs mr-1"></i>Aktif
                                    </span>
                                <?php else: ?>
                                    <span class="px-2 py-1 text-xs rounded-full" style="background: #fef3c7; color: #d97706;">
                                        <i class="fas fa-circle text-xs mr-1"></i>Nonaktif
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-3">
                                    <a href="<?php echo e(route('admin.pendaftaran.waves.edit', $wave)); ?>"
                                        class="text-blue-600 hover:text-blue-800 transition" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('admin.pendaftaran.waves.toggle-active', $wave)); ?>" method="POST" class="inline">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="text-yellow-600 hover:text-yellow-800 transition"
                                            title="<?php echo e($wave->is_active ? 'Nonaktifkan' : 'Aktifkan'); ?>">
                                            <i class="fas <?php echo e($wave->is_active ? 'fa-pause' : 'fa-play'); ?>"></i>
                                        </button>
                                    </form>

                                    
                                    <button type="button"
                                        onclick="confirmDelete('<?php echo e($wave->id); ?>', '<?php echo e(addslashes($wave->name)); ?>', <?php echo e($hasRegistrations ? 'true' : 'false'); ?>)"
                                        class="text-red-600 hover:text-red-800 transition delete-btn"
                                        title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    
                                    <form id="delete-form-<?php echo e($wave->id); ?>"
                                        action="<?php echo e(route('admin.pendaftaran.waves.destroy', $wave)); ?>"
                                        method="POST"
                                        style="display: none;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                <i class="fas fa-calendar-alt text-4xl mb-3 block"></i>
                                <p>Belum ada gelombang pendaftaran.</p>
                                <a href="<?php echo e(route('admin.pendaftaran.waves.create')); ?>"
                                    class="mt-3 inline-block px-4 py-2 rounded-lg text-sm text-white"
                                    style="background: #005F02;">
                                    Buat Gelombang Baru
                                </a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t">
            <?php echo e($waves->links()); ?>

        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="card" style="background: #fff; border-radius: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <div class="p-6 border-b" style="background: #eef3ec; border-radius: 20px 20px 0 0;">
                <h3 class="font-bold text-gray-800">Proses Penerimaan Santri</h3>
            </div>
            <div class="p-6">
                <a href="<?php echo e(route('admin.santri.index')); ?>" class="block p-4 rounded-lg hover:bg-gray-50 transition">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle fa-2x mr-4" style="color: #005F02;"></i>
                        <div>
                            <h4 class="font-semibold text-gray-800">Proses Seleksi Santri</h4>
                            <p class="text-sm text-gray-500">Kelola hasil seleksi penerimaan santri</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="card" style="background: #fff; border-radius: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <div class="p-6 border-b" style="background: #eef3ec; border-radius: 20px 20px 0 0;">
                <h3 class="font-bold text-gray-800">Statistik Pendaftaran</h3>
            </div>
            <div class="p-6">
                <?php
                    $totalRegistered = \App\Models\SantriRegistration::count();
                    $totalAccepted = \App\Models\SantriRegistration::where('acceptance_status', 'accepted')->count();
                    $totalRejected = \App\Models\SantriRegistration::where('acceptance_status', 'rejected')->count();
                    $totalWaiting = \App\Models\SantriRegistration::where('acceptance_status', 'waiting_list')->count();
                ?>
                <div class="space-y-3">
                    <div class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-600">Total Pendaftar</span>
                        <span class="font-semibold text-gray-800"><?php echo e($totalRegistered); ?></span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-600">Diterima</span>
                        <span class="font-semibold text-green-600"><?php echo e($totalAccepted); ?></span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-600">Ditolak</span>
                        <span class="font-semibold text-red-600"><?php echo e($totalRejected); ?></span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b">
                        <span class="text-gray-600">Waiting List</span>
                        <span class="font-semibold text-yellow-600"><?php echo e($totalWaiting); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(waveId, waveName, hasRegistrations) {
    if (hasRegistrations) {
        // Jika gelombang memiliki pendaftar, tampilkan pesan error (seperti data santri)
        Swal.fire({
            icon: 'error',
            title: 'Tidak Dapat Menghapus Gelombang!',
            html: `
                <div class="text-left">
                    <p class="mb-3">Gelombang <strong>"${waveName}"</strong> tidak dapat dihapus karena:</p>
                    <ul class="list-disc pl-5 mb-3" style="color: #dc2626;">
                        <li>Gelombang ini sudah memiliki pendaftar</li>
                        <li>Data pendaftar terkait dengan gelombang ini</li>
                    </ul>
                    <div class="mt-4 p-3 bg-yellow-50 rounded-lg border border-yellow-200">
                        <i class="fas fa-info-circle text-yellow-600 mr-2"></i>
                        <span class="text-sm text-yellow-800">💡 Saran: Nonaktifkan gelombang saja jika tidak digunakan lagi.</span>
                    </div>
                </div>
            `,
            confirmButtonColor: '#005F02',
            confirmButtonText: '<i class="fas fa-check mr-1"></i> Mengerti',
            showCancelButton: false
        });
    } else {
        // Jika tidak ada pendaftar, tampilkan konfirmasi hapus
        Swal.fire({
            title: '<span style="color: #dc2626;">⚠️ Hapus Gelombang?</span>',
            html: `
                <div class="text-left">
                    <p class="mb-2">Apakah Anda yakin ingin menghapus gelombang <strong>"${waveName}"</strong>?</p>
                    <div class="mt-3 p-3 bg-red-50 rounded-lg border border-red-200">
                        <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                        <span class="text-sm text-red-700">⚠️ Tindakan ini tidak dapat dibatalkan!</span>
                    </div>
                </div>
            `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6c757d',
            confirmButtonText: '<i class="fas fa-trash mr-1"></i> Ya, Hapus!',
            cancelButtonText: '<i class="fas fa-times mr-1"></i> Batal',
            reverseButtons: true,
            customClass: {
                popup: 'rounded-xl',
                confirmButton: 'px-4 py-2 text-sm',
                cancelButton: 'px-4 py-2 text-sm'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Tampilkan loading
                Swal.fire({
                    title: 'Menghapus...',
                    text: 'Sedang menghapus gelombang',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                document.getElementById(`delete-form-${waveId}`).submit();
            }
        });
    }
}

// Auto close alert setelah 3 detik
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        const alerts = document.querySelectorAll('.bg-green-100, .bg-red-100');
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/pendaftaran/waves/index.blade.php ENDPATH**/ ?>