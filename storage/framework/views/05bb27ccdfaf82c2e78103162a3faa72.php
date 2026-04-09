<?php $__env->startSection('title', 'Notifikasi'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Notifikasi</h1>

        <?php if($notifications->count() > 0): ?>
            <div class="space-y-3">
                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="border p-4 rounded <?php echo e($notif->read_at ? 'bg-gray-50' : 'bg-blue-50'); ?>">
                        <h3 class="font-semibold"><?php echo e($notif->title); ?></h3>
                        <p class="text-gray-600 text-sm"><?php echo e($notif->message); ?></p>
                        <small class="text-gray-400"><?php echo e($notif->created_at->diffForHumans()); ?></small>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="mt-4"><?php echo e($notifications->links()); ?></div>
        <?php else: ?>
            <p class="text-gray-500 text-center py-8">Belum ada notifikasi</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/user/notification/index.blade.php ENDPATH**/ ?>