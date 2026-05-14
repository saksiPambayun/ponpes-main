<?php $__env->startSection('title', 'Edit Gelombang Pendaftaran'); ?>
<?php $__env->startSection('page-title', 'Edit Gelombang Pendaftaran'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card" style="background: #fff; border-radius: 20px; max-width: 800px; margin: 0 auto;">
        <div class="p-6 border-b" style="background: #eef3ec; border-radius: 20px 20px 0 0;">
            <h3 class="font-bold">Form Edit Gelombang</h3>
        </div>
        <div class="p-6">
            <form action="<?php echo e(route('admin.pendaftaran.waves.update', $wave)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Nama Gelombang <span class="text-red-500">*</span></label>
                    <input type="text" name="name"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('name', $wave->name)); ?>" required>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Tanggal Mulai <span
                                class="text-red-500">*</span></label>
                        <input type="date" name="start_date"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('start_date', $wave->start_date->format('Y-m-d'))); ?>" required>
                        <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Tanggal Selesai <span
                                class="text-red-500">*</span></label>
                        <input type="date" name="end_date"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('end_date', $wave->end_date->format('Y-m-d'))); ?>" required>
                        <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Kuota Pendaftar</label>
                        <input type="number" name="quota"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                            value="<?php echo e(old('quota', $wave->quota)); ?>" placeholder="Kosongkan jika tidak terbatas" min="1">
                        <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ada batasan kuota</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Status</label>
                        <select name="is_active"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="1" <?php echo e($wave->is_active ? 'selected' : ''); ?>>Aktif</option>
                            <option value="0" <?php echo e(!$wave->is_active ? 'selected' : ''); ?>>Nonaktif</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Deskripsi</label>
                    <textarea name="description" rows="3"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Informasi tambahan tentang gelombang ini..."><?php echo e(old('description', $wave->description)); ?></textarea>
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <a href="<?php echo e(route('admin.pendaftaran.waves.index')); ?>"
                        class="px-4 py-2 border rounded-lg hover:bg-gray-50">Batal</a>
                    <button type="submit" class="px-4 py-2 rounded-lg text-white"
                        style="background: linear-gradient(135deg, #005F02, #0f4d1c);">
                        Update Gelombang
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/pendaftaran/waves/edit.blade.php ENDPATH**/ ?>