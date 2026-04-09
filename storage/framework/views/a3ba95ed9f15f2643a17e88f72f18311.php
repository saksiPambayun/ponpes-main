<?php $__env->startSection('title', 'Akta Yayasan'); ?>
<?php $__env->startSection('page-title', 'Dokumen Akta Yayasan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Akta Yayasan</h3>
            <p class="text-gray-500 text-sm">Daftar dokumen legalitas yayasan</p>
        </div>
        <a href="<?php echo e(route('admin.akta-yayasan.create')); ?>" class="btn-primary px-6 py-2 rounded-lg text-white font-medium">
            <i class="fas fa-plus mr-2"></i>Tambah Akta
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $aktaYayasan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card p-6 border-t-4 border-purple-600">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-3 bg-purple-100 text-purple-600 rounded-lg">
                        <i class="fas fa-gavel text-xl"></i>
                    </div>
                    <span class="text-xs font-mono text-gray-400">#<?php echo e($item->id); ?></span>
                </div>
                <h4 class="text-lg font-bold text-gray-900 leading-tight mb-2"><?php echo e($item->nama_akta); ?></h4>
                <p class="text-sm text-gray-500 mb-1"><span class="font-semibold">No:</span> <?php echo e($item->nomor_akta); ?></p>
                <p class="text-sm text-gray-500 mb-4"><span class="font-semibold">Notaris:</span> <?php echo e($item->notaris ?? '-'); ?>

                </p>

                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <?php if($item->file_akta): ?>
                        <a href="<?php echo e(asset('storage/' . $item->file_akta)); ?>" target="_blank"
                            class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">
                            <i class="fas fa-download mr-1"></i> Lihat File
                        </a>
                    <?php else: ?>
                        <span class="text-gray-400 text-sm italic">No File</span>
                    <?php endif; ?>

                    <div class="flex space-x-2">
                        <a href="<?php echo e(route('admin.akta-yayasan.edit', $item->id)); ?>" class="text-gray-400 hover:text-blue-600"><i
                                class="fas fa-edit"></i></a>
                        <form action="<?php echo e(route('admin.akta-yayasan.destroy', $item->id)); ?>" method="POST" class="inline"
                            onsubmit="return confirm('Hapus data ini?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-gray-400 hover:text-red-600"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-3 card p-12 text-center text-gray-500">
                <p>Belum ada data Akta Yayasan.</p>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/admin/akta-yayasan/index.blade.php ENDPATH**/ ?>