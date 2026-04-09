<?php $__env->startSection('title', 'Akta Wakaf'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Akta Wakaf</h1>

        <?php if($akta->count() > 0): ?>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Nomor Sertifikat</th>
                            <th class="px-4 py-2 border">Nazhir</th>
                            <th class="px-4 py-2 border">Lokasi</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $akta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border text-center"><?php echo e($akta->firstItem() + $key); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->nomor_sertifikat ?? '-'); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->nazhir ?? '-'); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($item->lokasi_tanah ?? '-'); ?></td>
                                <td class="px-4 py-2 border text-center">
                                    <a href="<?php echo e(route('user.akta-wakaf.show', $item->id)); ?>"
                                        class="text-blue-600 hover:underline">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-4"><?php echo e($akta->links()); ?></div>
        <?php else: ?>
            <div class="text-center py-12">
                <p class="text-gray-500">Belum ada data.</p>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/user/akta-wakaf/index.blade.php ENDPATH**/ ?>