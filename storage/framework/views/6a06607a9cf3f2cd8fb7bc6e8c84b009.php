<?php $__env->startSection('title', 'Edit Santri'); ?>
<?php $__env->startSection('page-title', 'Edit Data Santri'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto">
        <div class="card p-8">

            
            <?php if($errors->any()): ?>
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <ul class="list-disc list-inside">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            
            <?php if(session('success')): ?>
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

        <form action="<?php echo e(route('admin.pendaftar.update', $santri->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <h4 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Informasi Pribadi</h4>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama_lengkap" value="<?php echo e(old('nama_lengkap', $santri->nama_lengkap)); ?>"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none <?php $__errorArgs = ['nama_lengkap'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            required>
                        <?php $__errorArgs = ['nama_lengkap'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">NISN</label>
                        <input type="text" name="nisn" value="<?php echo e(old('nisn', $santri->nisn)); ?>"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Asal Sekolah <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="asal_sekolah" value="<?php echo e(old('asal_sekolah', $santri->asal_sekolah)); ?>"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none <?php $__errorArgs = ['asal_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            required>
                        <?php $__errorArgs = ['asal_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir"
                            value="<?php echo e(old('tanggal_lahir', $santri->tanggal_lahir ? \Carbon\Carbon::parse($santri->tanggal_lahir)->format('Y-m-d') : '')); ?>"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" value="<?php echo e(old('email', $santri->email)); ?>"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon Wali <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="no_wali" value="<?php echo e(old('no_wali', $santri->no_wali)); ?>"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none <?php $__errorArgs = ['no_wali'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            required>
                        <?php $__errorArgs = ['no_wali'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                        <textarea name="alamat" rows="3"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none"><?php echo e(old('alamat', $santri->alamat)); ?></textarea>
                    </div>
                </div>

                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                    <div class="col-span-2">
                        <h4 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Informasi Wali</h4>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Wali <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama_wali" value="<?php echo e(old('nama_wali', $santri->nama_wali)); ?>"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none <?php $__errorArgs = ['nama_wali'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            required>
                        <?php $__errorArgs = ['nama_wali'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan Wali</label>
                        <input type="text" name="pekerjaan_wali"
                            value="<?php echo e(old('pekerjaan_wali', $santri->pekerjaan_wali)); ?>"
                            placeholder="Contoh: Petani, Wiraswasta, PNS..."
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>
                </div>

                
                <div class="mt-8">
                    <h4 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Dokumen</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kartu Keluarga (KK)</label>

                            
                            <?php if($santri->kk): ?>
                                <div class="mb-3 p-3 bg-green-50 border border-green-200 rounded-lg">
                                    <p class="text-xs text-green-700 font-medium mb-2">✓ File saat ini:</p>
                                    <?php
    $kkExtension = strtolower(pathinfo($santri->kk, PATHINFO_EXTENSION));
                                    ?>
                                    <?php if(in_array($kkExtension, ['jpg', 'jpeg', 'png'])): ?>
                                        <img src="<?php echo e(asset('storage/' . $santri->kk)); ?>"
                                            class="h-24 rounded border object-cover mb-2" alt="KK">
                                    <?php else: ?>
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                                            <span class="text-xs text-gray-600 truncate"><?php echo e(basename($santri->kk)); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <a href="<?php echo e(asset('storage/' . $santri->kk)); ?>" target="_blank"
                                        class="text-xs text-indigo-600 hover:underline">📄 Lihat file →</a>
                                </div>
                            <?php endif; ?>

                            <label for="kk"
                                class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-cloud-upload-alt text-xl text-gray-400 mb-1"></i>
                                    <p class="text-xs text-gray-500"><?php echo e($santri->kk ? 'Ganti file' : 'Upload file'); ?> · PDF,
                                        JPG, PNG (maks. 20MB)</p>
                                </div>
                                <input id="kk" type="file" name="kk" class="hidden" accept=".pdf,.jpg,.jpeg,.png"
                                    onchange="showFileName(this, 'label-kk', 'preview-kk')">
                            </label>
                            <p id="label-kk" class="text-xs text-indigo-600 mt-1 hidden font-medium"></p>
                            <div id="preview-kk" class="mt-2 hidden">
                                <img class="h-20 rounded border object-cover" alt="preview KK baru">
                            </div>
                            <?php $__errorArgs = ['kk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pas Foto (3x4)</label>

                            
                            <?php if($santri->foto): ?>
                                <div class="mb-3 p-3 bg-green-50 border border-green-200 rounded-lg">
                                    <p class="text-xs text-green-700 font-medium mb-2">✓ File saat ini:</p>
                                    <?php
    $fotoExtension = strtolower(pathinfo($santri->foto, PATHINFO_EXTENSION));
                                    ?>
                                    <?php if(in_array($fotoExtension, ['jpg', 'jpeg', 'png'])): ?>
                                        <img src="<?php echo e(asset('storage/' . $santri->foto)); ?>"
                                            class="h-24 rounded border object-cover mb-2" alt="Foto">
                                    <?php else: ?>
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                                            <span class="text-xs text-gray-600 truncate"><?php echo e(basename($santri->foto)); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <a href="<?php echo e(asset('storage/' . $santri->foto)); ?>" target="_blank"
                                        class="text-xs text-indigo-600 hover:underline">📄 Lihat file →</a>
                                </div>
                            <?php endif; ?>

                            <label for="foto"
                                class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-cloud-upload-alt text-xl text-gray-400 mb-1"></i>
                                    <p class="text-xs text-gray-500"><?php echo e($santri->foto ? 'Ganti file' : 'Upload file'); ?> ·
                                        JPG, PNG (maks. 2MB)</p>
                                </div>
                                <input id="foto" type="file" name="foto" class="hidden" accept=".jpg,.jpeg,.png"
                                    onchange="showFileName(this, 'label-foto', 'preview-foto')">
                            </label>
                            <p id="label-foto" class="text-xs text-indigo-600 mt-1 hidden font-medium"></p>
                            <div id="preview-foto" class="mt-2 hidden">
                                <img class="h-20 rounded border object-cover" alt="preview Foto baru">
                            </div>
                            <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                    </div>
                </div>

                
                <div class="mt-8 flex justify-end space-x-4">
                    <a href="<?php echo e(route('admin.santri.index')); ?>"
                        class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Batal</a>
                    <button type="submit" class="btn-primary px-6 py-3 rounded-lg text-white font-medium">Update
                        Data</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showFileName(input, labelId, previewId) {
            const label = document.getElementById(labelId);
            const preview = document.getElementById(previewId);

            if (!input.files || !input.files[0]) return;

            const file = input.files[0];
            const maxSize = input.id === 'foto' ? 2 * 1024 * 1024 : 20 * 1024 * 1024; // 2MB untuk foto, 20MB untuk KK
            const maxSizeMB = input.id === 'foto' ? '2MB' : '20MB';

            if (file.size > maxSize) {
                alert('File terlalu besar! Maksimal ' + maxSizeMB);
                input.value = '';
                label.classList.add('hidden');
                if (preview) preview.classList.add('hidden');
                return;
            }

            label.textContent = '✓ ' + file.name;
            label.classList.remove('hidden');

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    if (preview) {
                        const img = preview.querySelector('img');
                        if (img) {
                            img.src = e.target.result;
                            preview.classList.remove('hidden');
                        }
                    }
                };
                reader.readAsDataURL(file);
            } else if (preview) {
                preview.classList.add('hidden');
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/santri/edit.blade.php ENDPATH**/ ?>