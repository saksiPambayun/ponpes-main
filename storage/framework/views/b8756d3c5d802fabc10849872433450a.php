<?php $__env->startSection('title', 'Tambah Pegawai'); ?>
<?php $__env->startSection('page-title', 'Tambah Data Pegawai'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto">

    
    <a href="<?php echo e(route('admin.pegawai.index')); ?>" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-indigo-600 mb-5 transition">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pegawai
    </a>

    
    <?php if($errors->any()): ?>
    <div class="mb-4 flex items-start gap-3 bg-red-50 border border-red-200 text-red-800 px-5 py-4 rounded-xl shadow-sm">
        <i class="fas fa-exclamation-circle text-red-500 text-lg mt-0.5"></i>
        <div>
            <p class="text-sm font-semibold mb-1">Terdapat kesalahan pada form:</p>
            <ul class="text-sm list-disc list-inside space-y-0.5">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">

        
        <div class="px-8 py-5 bg-gradient-to-r from-indigo-50 to-purple-50 border-b border-gray-200 flex items-center gap-4">
            <div class="p-3 bg-white rounded-xl shadow-sm">
                <i class="fas fa-user-plus text-indigo-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-900">Form Tambah Pegawai</h3>
                <p class="text-sm text-gray-500">Lengkapi semua data yang diperlukan</p>
            </div>
        </div>

        <div class="p-8">
            
            <form action="<?php echo e(route('admin.pegawai.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-5 pb-3 border-b border-gray-100">
                        <div class="p-2 bg-indigo-100 rounded-lg"><i class="fas fa-user text-indigo-600 text-sm"></i></div>
                        <h4 class="font-semibold text-gray-800">Informasi Pribadi</h4>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                NIP <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nip" value="<?php echo e(old('nip')); ?>"
                                   class="w-full px-4 py-2.5 border <?php $__errorArgs = ['nip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 bg-red-50 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition"
                                   placeholder="Nomor Induk Pegawai" required>
                            <?php $__errorArgs = ['nip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama" value="<?php echo e(old('nama')); ?>"
                                   class="w-full px-4 py-2.5 border <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 bg-red-50 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition"
                                   placeholder="Nama lengkap pegawai" required>
                            <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                            <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                                   class="w-full px-4 py-2.5 border <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 bg-red-50 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition"
                                   placeholder="contoh@email.com">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">No. Telepon</label>
                            <input type="text" name="no_telepon" value="<?php echo e(old('no_telepon')); ?>"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition"
                                   placeholder="08xxxxxxxxxx">
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Jabatan</label>
                            <select name="jabatan"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition bg-white">
                                <option value="">-- Pilih Jabatan --</option>
                                <?php $__currentLoopData = ['Kepala Sekolah','Wakil Kepala','Guru','Staff TU','Bendahara']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($jab); ?>" <?php echo e(old('jabatan') == $jab ? 'selected' : ''); ?>><?php echo e($jab); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Divisi</label>
                            <select name="divisi"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition bg-white">
                                <option value="">-- Pilih Divisi --</option>
                                <?php $__currentLoopData = ['Akademik','Kesiswaan','Humas','Keuangan','Sarana Prasarana']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $div): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($div); ?>" <?php echo e(old('divisi') == $div ? 'selected' : ''); ?>><?php echo e($div); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Status Pegawai <span class="text-red-500">*</span>
                            </label>
                            <select name="status"
                                    class="w-full px-4 py-2.5 border <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 bg-red-50 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition bg-white"
                                    required>
                                <option value="">-- Pilih Status --</option>
                                <option value="aktif"    <?php echo e(old('status') == 'aktif'    ? 'selected' : ''); ?>>Aktif</option>
                                <option value="cuti"     <?php echo e(old('status') == 'cuti'     ? 'selected' : ''); ?>>Cuti</option>
                                <option value="nonaktif" <?php echo e(old('status') == 'nonaktif' ? 'selected' : ''); ?>>Non-Aktif</option>
                            </select>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Tipe Pegawai <span class="text-red-500">*</span>
                            </label>
                            <select name="tipe_pegawai"
                                    class="w-full px-4 py-2.5 border <?php $__errorArgs = ['tipe_pegawai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 bg-red-50 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition bg-white"
                                    required>
                                <option value="">-- Pilih Tipe --</option>
                                <?php $__currentLoopData = ['tetap' => 'Tetap', 'kontrak' => 'Kontrak', 'magang' => 'Magang', 'honorer' => 'Honorer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($val); ?>" <?php echo e(old('tipe_pegawai') == $val ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['tipe_pegawai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Bergabung</label>
                            <input type="date" name="tanggal_bergabung" value="<?php echo e(old('tanggal_bergabung')); ?>"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">
                        </div>

                    </div>
                </div>

                
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-5 pb-3 border-b border-gray-100">
                        <div class="p-2 bg-purple-100 rounded-lg"><i class="fas fa-address-card text-purple-600 text-sm"></i></div>
                        <h4 class="font-semibold text-gray-800">Informasi Tambahan</h4>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="<?php echo e(old('tempat_lahir')); ?>"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition"
                                   placeholder="Kota lahir">
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="<?php echo e(old('tanggal_lahir')); ?>"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Jenis Kelamin</label>
                            <div class="flex gap-4 mt-1">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="L" <?php echo e(old('jenis_kelamin') == 'L' ? 'checked' : ''); ?> class="text-indigo-600">
                                    <span class="text-sm text-gray-700">Laki-laki</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="P" <?php echo e(old('jenis_kelamin') == 'P' ? 'checked' : ''); ?> class="text-indigo-600">
                                    <span class="text-sm text-gray-700">Perempuan</span>
                                </label>
                            </div>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Agama</label>
                            <select name="agama"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition bg-white">
                                <option value="">-- Pilih Agama --</option>
                                <?php $__currentLoopData = ['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($agama); ?>" <?php echo e(old('agama') == $agama ? 'selected' : ''); ?>><?php echo e($agama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Alamat Lengkap</label>
                            <textarea name="alamat" rows="3"
                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition resize-none"
                                      placeholder="Jl. ..."><?php echo e(old('alamat')); ?></textarea>
                        </div>

                    </div>
                </div>

                
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-5 pb-3 border-b border-gray-100">
                        <div class="p-2 bg-green-100 rounded-lg"><i class="fas fa-file-alt text-green-600 text-sm"></i></div>
                        <h4 class="font-semibold text-gray-800">Upload Dokumen</h4>
                        <span class="text-xs text-gray-400">(Opsional)</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                        <?php $__currentLoopData = [
                            ['name' => 'foto_ktp',    'label' => 'Foto KTP',   'accept' => 'image/jpg,image/jpeg,image/png',               'icon' => 'fa-id-card',       'preview' => 'prevKTP'],
                            ['name' => 'foto_npwp',   'label' => 'Foto NPWP',  'accept' => 'image/jpg,image/jpeg,image/png',               'icon' => 'fa-file-invoice',  'preview' => 'prevNPWP'],
                            ['name' => 'foto_ijazah', 'label' => 'Ijazah',     'accept' => 'image/jpg,image/jpeg,image/png,application/pdf','icon' => 'fa-graduation-cap','preview' => 'prevIjazah'],
                        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                <i class="fas <?php echo e($doc['icon']); ?> mr-1 text-indigo-400"></i> <?php echo e($doc['label']); ?>

                            </label>
                            <label for="<?php echo e($doc['name']); ?>"
                                   class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-indigo-50 hover:border-indigo-400 transition group">
                                <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 group-hover:text-indigo-500 mb-2"></i>
                                <p class="text-xs text-gray-500 group-hover:text-indigo-600">Klik untuk upload</p>
                                <p class="text-xs text-gray-400 mt-0.5">JPG, PNG<?php echo e(strpos($doc['accept'], 'pdf') !== false ? ', PDF' : ''); ?> · Maks. 40MB</p>
                                <input id="<?php echo e($doc['name']); ?>" type="file" name="<?php echo e($doc['name']); ?>"
                                       accept="<?php echo e($doc['accept']); ?>" class="hidden"
                                       onchange="previewDoc(this, '<?php echo e($doc['preview']); ?>')">
                            </label>
                            
                            <div id="<?php echo e($doc['preview']); ?>" class="mt-2 hidden">
                                <div class="flex items-center gap-2 p-2 bg-green-50 border border-green-200 rounded-lg">
                                    <i class="fas fa-check-circle text-green-500 text-sm"></i>
                                    <span class="text-xs text-green-700 truncate preview-name"></span>
                                </div>
                            </div>
                            <?php $__errorArgs = [$doc['name']];
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>

                
                <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                    <a href="<?php echo e(route('admin.pegawai.index')); ?>"
                       class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition font-medium">
                        <i class="fas fa-times mr-1.5"></i> Batal
                    </a>
                    <div class="flex gap-3">
                        <button type="reset" onclick="resetPreviews()"
                                class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition font-medium">
                            <i class="fas fa-undo mr-1.5"></i> Reset
                        </button>
                        <button type="submit"
                                class="px-7 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-medium hover:from-indigo-700 hover:to-purple-700 transition shadow-md hover:shadow-lg">
                            <i class="fas fa-save mr-1.5"></i> Simpan Data
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function previewDoc(input, previewId) {
    const wrapper = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        wrapper.querySelector('.preview-name').textContent = input.files[0].name;
        wrapper.classList.remove('hidden');
    } else {
        wrapper.classList.add('hidden');
    }
}

function resetPreviews() {
    ['prevKTP', 'prevNPWP', 'prevIjazah'].forEach(function(id) {
        const el = document.getElementById(id);
        if (el) el.classList.add('hidden');
    });
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/admin/pegawai/create.blade.php ENDPATH**/ ?>