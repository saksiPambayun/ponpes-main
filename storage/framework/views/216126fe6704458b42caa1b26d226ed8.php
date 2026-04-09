<?php $__env->startSection('title', 'Tambah SK'); ?>
<?php $__env->startSection('page-title', 'Tambah Data SK'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto">
        <div class="card p-8">
            <form action="<?php echo e(route('admin.sk.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor SK <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nomor_sk" value="<?php echo e(old('nomor_sk')); ?>"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none <?php $__errorArgs = ['nomor_sk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            required>
                        <?php $__errorArgs = ['nomor_sk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal SK</label>
                        <input type="date" name="tanggal_sk" value="<?php echo e(old('tanggal_sk')); ?>"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tentang</label>
                        <input type="text" name="tentang" value="<?php echo e(old('tentang')); ?>"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Upload File SK</label>
                        <input type="file" name="file_sk" accept=".jpg,.png,.jpeg,.pdf,.doc,.docx"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, JPEG, PDF, DOC, DOCX (Max: 5MB)</p>
                        <?php $__errorArgs = ['file_sk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="<?php echo e(route('admin.sk.index')); ?>"
                        class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Batal</a>
                    <button type="submit" class="btn-primary px-6 py-3 rounded-lg text-white font-medium">Simpan
                        Data</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/sk/create.blade.php ENDPATH**/ ?>