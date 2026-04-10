<?php $__env->startSection('title', 'Fasilitas'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Fasilitas Yayasan</h1>

        <?php if($fasilitas->count() > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php $__currentLoopData = $fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="border rounded-lg p-4 hover:shadow-md">
                        <h3 class="font-bold text-lg"><?php echo e($item->nama_fasilitas ?? $item->name ?? 'Fasilitas'); ?></h3>
                        <p class="text-gray-600 text-sm mt-2"><?php echo e(Str::limit($item->deskripsi ?? '-', 100)); ?></p>
                        <a href="<?php echo e(route('user.fasilitas.show', $item->id)); ?>"
                            class="text-indigo-600 text-sm mt-2 inline-block">Detail →</a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="mt-4"><?php echo e($fasilitas->links()); ?></div>
        <?php else: ?>
            <div class="text-center py-12">
                <p class="text-gray-500">Belum ada data fasilitas.</p>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/user/fasilitas/index.blade.php ENDPATH**/ ?>