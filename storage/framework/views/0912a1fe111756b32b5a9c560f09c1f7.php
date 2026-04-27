<?php $__env->startSection('title', 'Detail Kritik & Saran'); ?>
<?php $__env->startSection('page-title', 'Detail Kritik dan Saran'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 border-b bg-gray-50 flex justify-between items-center">
                <h3 class="text-lg font-bold">Detail Pesan</h3>
                <a href="<?php echo e(route('admin.feedback.index')); ?>" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
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

                
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/feedback/show.blade.php ENDPATH**/ ?>