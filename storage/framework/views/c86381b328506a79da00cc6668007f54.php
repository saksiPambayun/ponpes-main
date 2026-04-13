<?php $__env->startSection('title', 'Detail Fasilitas'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Fasilitas</h1>
            <a href="<?php echo e(route('user.fasilitas.index')); ?>" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left mr-1"></i>Kembali
            </a>
        </div>

        <?php if($fasilitas->foto): ?>
            <div class="mb-6">
                <img src="<?php echo e(asset('storage/' . $fasilitas->foto)); ?>" class="w-full max-h-96 object-cover rounded-lg"
                    alt="<?php echo e($fasilitas->nama_fasilitas); ?>">
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 gap-4">
            <div class="border-b pb-2">
                <label class="text-gray-500 text-sm">Nama Fasilitas</label>
                <p class="text-gray-800 font-medium text-lg">
                    <?php echo e($fasilitas->nama_fasilitas ?? $fasilitas->name ?? $fasilitas->title ?? 'Fasilitas'); ?>

                </p>
            </div>
            <?php if(isset($fasilitas->deskripsi)): ?>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Deskripsi</label>
                    <p class="text-gray-800"><?php echo e($fasilitas->deskripsi); ?></p>
                </div>
            <?php endif; ?>
            <?php if(isset($fasilitas->lokasi)): ?>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Lokasi</label>
                    <p class="text-gray-800"><?php echo e($fasilitas->lokasi); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/user/fasilitas/show.blade.php ENDPATH**/ ?>