<?php $__env->startSection('title', 'Program'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Program Yayasan</h1>

        <?php if($programs->count() > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="border rounded-lg p-4 hover:shadow-md">
                        <h3 class="font-bold text-lg"><?php echo e($program->nama_program ?? $program->name ?? 'Program'); ?></h3>
                        <p class="text-gray-600 text-sm mt-2"><?php echo e(Str::limit($program->deskripsi ?? '-', 100)); ?></p>
                        <a href="<?php echo e(route('user.program.show', $program->id)); ?>"
                            class="text-indigo-600 text-sm mt-2 inline-block">Detail →</a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="mt-4"><?php echo e($programs->links()); ?></div>
        <?php else: ?>
            <div class="text-center py-12">
                <p class="text-gray-500">Belum ada data program.</p>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/user/program/index.blade.php ENDPATH**/ ?>