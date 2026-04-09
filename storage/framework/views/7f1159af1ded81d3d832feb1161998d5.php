<?php $__env->startSection('title', 'Gallery'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Galeri Yayasan</h1>

        <?php if($galleries->count() > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="border rounded-lg overflow-hidden hover:shadow-md">
                        <?php if($gallery->image): ?>
                            <img src="<?php echo e(asset('storage/' . $gallery->image)); ?>" class="w-full h-48 object-cover">
                        <?php else: ?>
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center"><i
                                    class="fas fa-image text-4xl text-gray-400"></i></div>
                        <?php endif; ?>
                        <div class="p-3">
                            <h3 class="font-semibold"><?php echo e($gallery->title ?? 'Tanpa Judul'); ?></h3>
                            <a href="<?php echo e(route('user.gallery.show', $gallery->id)); ?>" class="text-indigo-600 text-sm">Lihat →</a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="mt-4"><?php echo e($galleries->links()); ?></div>
        <?php else: ?>
            <div class="text-center py-12">
                <p class="text-gray-500">Belum ada gallery.</p>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/user/gallery/index.blade.php ENDPATH**/ ?>