<?php $__env->startSection('title', 'Kritik & Saran'); ?>
<?php $__env->startSection('page-title', 'Kritik dan Saran'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Kritik & Saran</h3>
            <p class="text-gray-500 text-sm mt-1">Kelola masukan dari pengunjung</p>
        </div>
        <?php if($unreadCount > 0): ?>
            <form action="<?php echo e(route('admin.feedback.mark-all-read')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    <i class="fas fa-check-double mr-2"></i>Tandai Semua Dibaca (<?php echo e($unreadCount); ?>)
                </button>
            </form>
        <?php endif; ?>
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

    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 mr-4">
                    <i class="fas fa-envelope text-blue-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Pesan</p>
                    <h3 class="text-2xl font-bold"><?php echo e($feedbacks->total()); ?></h3>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 mr-4">
                    <i class="fas fa-clock text-yellow-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Belum Dibaca</p>
                    <h3 class="text-2xl font-bold text-yellow-600"><?php echo e($unreadCount); ?></h3>
                </div>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pengirim</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pesan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="<?php echo e(!$feedback->is_read ? 'bg-yellow-50' : ''); ?> hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <?php if(!$feedback->is_read): ?>
                                <span class="px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    🔴 Belum Dibaca
                                </span>
                            <?php else: ?>
                                <span class="px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                    📖 Sudah Dibaca
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium"><?php echo e($feedback->name); ?></div>
                            <div class="text-xs text-gray-500"><?php echo e($feedback->email); ?></div>
                        </td>
                        <td class="px-6 py-4 text-sm truncate max-w-md"><?php echo e($feedback->message); ?></td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap"><?php echo e($feedback->created_at->format('d M Y H:i')); ?></td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center space-x-3">
                                <a href="<?php echo e(route('admin.feedback.show', $feedback->id)); ?>"
                                    class="text-blue-600 hover:text-blue-800" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                
                                <button type="button"
                                    onclick="confirmDelete(<?php echo e($feedback->id); ?>, '<?php echo e(addslashes($feedback->name)); ?>')"
                                    class="text-red-600 hover:text-red-800"
                                    title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                                
                                <form id="delete-form-<?php echo e($feedback->id); ?>"
                                    action="<?php echo e(route('admin.feedback.destroy', $feedback->id)); ?>"
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
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-inbox text-4xl mb-2 text-gray-300"></i>
                            <p>Belum ada kritik dan saran</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="px-6 py-4 border-t">
            <?php echo e($feedbacks->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(feedbackId, feedbackName) {
    Swal.fire({
        title: '<span style="color: #dc2626;">⚠️ Hapus Feedback?</span>',
        html: `
            <div class="text-left">
                <p class="mb-2">Apakah Anda yakin ingin menghapus feedback dari <strong>"${feedbackName}"</strong>?</p>
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
                text: 'Sedang menghapus feedback',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            document.getElementById(`delete-form-${feedbackId}`).submit();
        }
    });
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

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\feedback\index.blade.php ENDPATH**/ ?>