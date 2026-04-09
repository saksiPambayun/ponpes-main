<?php $__env->startSection('title', 'Akta Wakaf'); ?>
<?php $__env->startSection('page-title', 'Dokumen Akta Wakaf'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Akta Wakaf</h3>
            <p class="text-gray-500 text-sm">Manajemen dokumen wakaf tanah/bangunan</p>
        </div>
        <a href="<?php echo e(route('admin.akta-wakaf.create')); ?>" class="btn-primary px-6 py-2 rounded-lg text-white font-medium">
            <i class="fas fa-plus mr-2"></i>Tambah Data
        </a>
    </div>

    <div class="card overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Lokasi/Nama</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Luas</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Pemberi (Wakif)</th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                <?php $__empty_1 = true; $__currentLoopData = $aktaWakaf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm font-bold text-gray-900"><?php echo e($item->nama_aset); ?></div>
                            <div class="text-xs text-gray-500"><?php echo e($item->nomor_aiw); ?></div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($item->luas); ?> m²</td>
                        <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($item->nama_wakif); ?></td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <a href="<?php echo e(route('admin.akta-wakaf.show', $item->id)); ?>"
                                class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-eye"></i></a>
                            <form action="<?php echo e(route('admin.akta-wakaf.destroy', $item->id)); ?>" method="POST" class="inline">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">Data wakaf kosong.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/admin/akta-wakaf/index.blade.php ENDPATH**/ ?>