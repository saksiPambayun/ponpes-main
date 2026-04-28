<?php $__env->startSection('title', 'Detail Kritik & Saran'); ?>
<?php $__env->startSection('page-title', 'Detail Kritik dan Saran'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 border-b bg-gray-50 flex justify-between items-center">
                <h3 class="text-lg font-bold">Detail Pesan</h3>
                <div class="flex items-center space-x-3">
                    
                    <button type="button"
                        onclick="confirmDelete(<?php echo e($feedback->id); ?>, '<?php echo e(addslashes($feedback->name)); ?>')"
                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                        <i class="fas fa-trash mr-2"></i>Hapus
                    </button>
                    <a href="<?php echo e(route('admin.feedback.index')); ?>" class="text-gray-600 hover:text-gray-900">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="text-sm text-gray-500">Nama</label>
                        <p class="font-semibold"><?php echo e($feedback->name); ?></p>
                    </div>
                    <div>
                        <label class="text-sm text-gray-500">Email</label>
                        <p class="font-semibold"><?php echo e($feedback->email); ?></p>
                    </div>
                    <div>
                        <label class="text-sm text-gray-500">Telepon</label>
                        <p class="font-semibold"><?php echo e($feedback->phone ?? '-'); ?></p>
                    </div>
                    <div>
                        <label class="text-sm text-gray-500">Tanggal Kirim</label>
                        <p class="font-semibold"><?php echo e($feedback->created_at->format('d M Y H:i:s')); ?></p>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="text-sm text-gray-500">Pesan</label>
                    <div class="mt-2 p-4 bg-gray-50 rounded-lg border">
                        <p class="text-gray-800"><?php echo e(nl2br(e($feedback->message))); ?></p>
                    </div>
                </div>

                <div class="border-t pt-6">
                    <div class="bg-gray-50 rounded-lg p-4 text-center text-gray-500">
                        <i class="fas fa-info-circle mr-2"></i>
                        Kritik dan saran ini telah diterima. Terima kasih atas masukannya.
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <form id="delete-form-<?php echo e($feedback->id); ?>"
        action="<?php echo e(route('admin.feedback.destroy', $feedback->id)); ?>"
        method="POST"
        style="display: none;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
    </form>
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
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\feedback\show.blade.php ENDPATH**/ ?>