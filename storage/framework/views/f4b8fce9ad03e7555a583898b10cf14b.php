<?php $__env->startSection('title', 'Struktur Organisasi'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Struktur Organisasi</h1>

        <?php if($struktur->count() > 0): ?>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $struktur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border text-center"><?php echo e($key + 1); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->nama ?? $item->name ?? '-'); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->jabatan ?? $item->position ?? '-'); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center py-12">
                <p class="text-gray-500">Belum ada data struktur organisasi.</p>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/user/struktur/index.blade.php ENDPATH**/ ?>