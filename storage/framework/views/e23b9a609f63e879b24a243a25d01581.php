<?php $__env->startSection('title', 'Edit Akta Yayasan'); ?>
<?php $__env->startSection('page-title', 'Edit Akta Yayasan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto">
        <div class="card p-8">
            <form action="<?php echo e(route('admin.akta-yayasan.update', $aktaYayasan->id)); ?>" method="POST"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Akta</label>
                        <input type="text" name="nomor_akta" value="<?php echo e(old('nomor_akta', $aktaYayasan->nomor_akta)); ?>"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Akta</label>
                        <input type="date" name="tanggal_akta"
                            value="<?php echo e(old('tanggal_akta', $aktaYayasan->tanggal_akta)); ?>"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Notaris</label>
                        <input type="text" name="notaris" value="<?php echo e(old('notaris', $aktaYayasan->notaris)); ?>"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Judul</label>
                        <input type="text" name="judul" value="<?php echo e(old('judul', $aktaYayasan->judul)); ?>"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none"
                            placeholder="Contoh: Akta Yayasan">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" rows="4"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none resize-none"
                            placeholder="Masukkan deskripsi..."><?php echo e(old('deskripsi', $aktaYayasan->deskripsi)); ?></textarea>
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Upload File Akta (Kosongkan jika tidak
                            diubah)</label>
                        <input type="file" name="file_akta" accept=".jpg,.png,.jpeg,.pdf,.doc,.docx"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                        <?php if($aktaYayasan->file_akta): ?>
                            <p class="text-xs text-gray-500 mt-1">File saat ini: <?php echo e(basename($aktaYayasan->file_akta)); ?></p>
                            <a href="<?php echo e(asset('storage/' . $aktaYayasan->file_akta)); ?>" target="_blank"
                                class="text-indigo-600 text-xs hover:underline">
                                <i class="fas fa-download mr-1"></i>Download File
                            </a>
                        <?php endif; ?>
                        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, JPEG, PDF, DOC, DOCX (Max: 5MB)</p>
                        <?php $__errorArgs = ['file_akta'];
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
                    <a href="<?php echo e(route('admin.akta-yayasan.index')); ?>"
                        class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Batal</a>
                    <button type="submit" class="btn-primary px-6 py-3 rounded-lg text-white font-medium">Update
                        Data</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/admin/akta-yayasan/edit.blade.php ENDPATH**/ ?>