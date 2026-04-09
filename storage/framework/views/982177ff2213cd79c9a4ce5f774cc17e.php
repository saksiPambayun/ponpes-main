<?php $__env->startSection('title', 'Data SK'); ?>
<?php $__env->startSection('page-title', 'Data Surat Keputusan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Data Surat Keputusan (SK)</h3>
            <p class="text-gray-500 text-sm mt-1">Kelola dokumen SK yayasan</p>
        </div>
        <a href="<?php echo e(route('admin.sk.create')); ?>"
            class="btn-primary px-6 py-2 rounded-lg text-white font-medium inline-flex items-center">
            <i class="fas fa-plus mr-2"></i>Tambah SK
        </a>
    </div>

    <div class="card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Nomor SK</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Tentang</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">File</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__empty_1 = true; $__currentLoopData = $sk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="table-row">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900"><?php echo e($item->nomor_sk); ?></td>
                            <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($item->tentang); ?></td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <?php echo e($item->tanggal_sk ? $item->tanggal_sk->format('d M Y') : '-'); ?>

                            </td>
                            <td class="px-6 py-4">
                                <?php if($item->file_sk): ?>
                                    <a href="<?php echo e(asset('storage/' . $item->file_sk)); ?>" target="_blank"
                                        class="text-indigo-600 hover:text-indigo-900 text-sm">
                                        <i class="fas fa-file-pdf mr-1"></i><?php echo e(basename($item->file_sk)); ?>

                                    </a>
                                <?php else: ?>
                                    <span class="text-gray-400 text-sm">-</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="<?php echo e(route('admin.sk.show', $item->id)); ?>"
                                    class="text-indigo-600 hover:text-indigo-900 mr-3" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo e(route('admin.sk.edit', $item->id)); ?>" class="text-blue-600 hover:text-blue-900 mr-3"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('admin.sk.destroy', $item->id)); ?>" method="POST" class="inline"
                                    onsubmit="return confirmDelete()">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-red-600 hover:text-red-900" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                <i class="fas fa-file-signature text-4xl mb-2 text-gray-300"></i>
                                <p>Belum ada data SK</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="p-6 border-t border-gray-200">
            <?php echo e($sk->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/sk/index.blade.php ENDPATH**/ ?>