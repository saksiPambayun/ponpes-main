<?php $__env->startSection('title', 'Edit Pegawai'); ?>
<?php $__env->startSection('page-title', 'Edit Data Pegawai'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto">

    
    <a href="<?php echo e(route('admin.pegawai.show', $pegawai->id)); ?>"
       class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-[#005F02] mb-5 transition">
        <i class="fas fa-arrow-left"></i> Kembali ke Detail Pegawai
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

        
        <div class="px-8 py-5 bg-gradient-to-r from-[#eef3ec] to-[#dfe8d8] border-b border-gray-200 flex items-center gap-4">
            <div class="p-3 bg-white rounded-xl shadow-sm">
                <i class="fas fa-user-edit text-[#005F02] text-xl"></i>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-900">Edit Data: <?php echo e($pegawai->nama); ?></h3>
                <p class="text-sm text-gray-500">NIP: <?php echo e($pegawai->nip); ?></p>
            </div>
        </div>

        <div class="p-8">
            <form action="<?php echo e(route('admin.pegawai.update', $pegawai->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-5 pb-3 border-b border-gray-100">
                        <div class="p-2 bg-[#eef3ec] rounded-lg"><i class="fas fa-user text-[#005F02] text-sm"></i></div>
                        <h4 class="font-semibold text-gray-800">Informasi Pribadi</h4>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                NIP <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nip" value="<?php echo e(old('nip', $pegawai->nip)); ?>"
                                   class="w-full px-4 py-2.5 border <?php $__errorArgs = ['nip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 bg-red-50 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition"
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
                            <input type="text" name="nama" value="<?php echo e(old('nama', $pegawai->nama)); ?>"
                                   class="w-full px-4 py-2.5 border <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 bg-red-50 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition"
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
                            <input type="email" name="email" value="<?php echo e(old('email', $pegawai->email)); ?>"
                                   class="w-full px-4 py-2.5 border <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 bg-red-50 <?php else: ?> border-gray-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition"
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
                            <input type="text" name="no_telepon" value="<?php echo e(old('no_telepon', $pegawai->no_telepon)); ?>"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition"
                                   placeholder="08xxxxxxxxxx">
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Jabatan</label>
                            <select name="jabatan"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition bg-white">
                                <option value="">-- Pilih Jabatan --</option>
                                <?php $__currentLoopData = ['Kepala Sekolah','Wakil Kepala','Guru','Staff TU','Bendahara']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($jab); ?>" <?php echo e(old('jabatan', $pegawai->jabatan) == $jab ? 'selected' : ''); ?>><?php echo e($jab); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Divisi</label>
                            <select name="divisi"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition bg-white">
                                <option value="">-- Pilih Divisi --</option>
                                <?php $__currentLoopData = ['Akademik','Kesiswaan','Humas','Keuangan','Sarana Prasarana']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $div): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($div); ?>" <?php echo e(old('divisi', $pegawai->divisi) == $div ? 'selected' : ''); ?>><?php echo e($div); ?></option>
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
unset($__errorArgs, $__bag); ?> rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition bg-white"
                                    required>
                                <option value="">-- Pilih Status --</option>
                                <option value="aktif"    <?php echo e(old('status', $pegawai->status) == 'aktif'    ? 'selected' : ''); ?>>Aktif</option>
                                <option value="cuti"     <?php echo e(old('status', $pegawai->status) == 'cuti'     ? 'selected' : ''); ?>>Cuti</option>
                                <option value="nonaktif" <?php echo e(old('status', $pegawai->status) == 'nonaktif' ? 'selected' : ''); ?>>Non-Aktif</option>
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
unset($__errorArgs, $__bag); ?> rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition bg-white"
                                    required>
                                <option value="">-- Pilih Tipe --</option>
                                <?php $__currentLoopData = ['tetap' => 'Tetap', 'kontrak' => 'Kontrak', 'magang' => 'Magang', 'honorer' => 'Honorer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($val); ?>" <?php echo e(old('tipe_pegawai', $pegawai->tipe_pegawai) == $val ? 'selected' : ''); ?>><?php echo e($label); ?></option>
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
                            <input type="date" name="tanggal_bergabung"
                                   value="<?php echo e(old('tanggal_bergabung', $pegawai->tanggal_bergabung?->format('Y-m-d'))); ?>"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition">
                        </div>

                    </div>
                </div>

                
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-5 pb-3 border-b border-gray-100">
                        <div class="p-2 bg-[#eef3ec] rounded-lg"><i class="fas fa-address-card text-[#005F02] text-sm"></i></div>
                        <h4 class="font-semibold text-gray-800">Informasi Tambahan</h4>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="<?php echo e(old('tempat_lahir', $pegawai->tempat_lahir)); ?>"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition"
                                   placeholder="Kota lahir">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"
                                   value="<?php echo e(old('tanggal_lahir', $pegawai->tanggal_lahir?->format('Y-m-d'))); ?>"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Jenis Kelamin</label>
                            <div class="flex gap-4 mt-1">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="L"
                                           <?php echo e(old('jenis_kelamin', $pegawai->jenis_kelamin) == 'L' ? 'checked' : ''); ?>

                                           class="text-[#005F02]">
                                    <span class="text-sm text-gray-700">Laki-laki</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="P"
                                           <?php echo e(old('jenis_kelamin', $pegawai->jenis_kelamin) == 'P' ? 'checked' : ''); ?>

                                           class="text-[#005F02]">
                                    <span class="text-sm text-gray-700">Perempuan</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Agama</label>
                            <select name="agama"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition bg-white">
                                <option value="">-- Pilih Agama --</option>
                                <?php $__currentLoopData = ['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($agama); ?>" <?php echo e(old('agama', $pegawai->agama) == $agama ? 'selected' : ''); ?>><?php echo e($agama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Alamat Lengkap</label>
                            <textarea name="alamat" rows="3"
                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition resize-none"
                                      placeholder="Jl. ..."><?php echo e(old('alamat', $pegawai->alamat)); ?></textarea>
                        </div>

                    </div>
                </div>

                
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-5 pb-3 border-b border-gray-100">
                        <div class="p-2 bg-[#eef3ec] rounded-lg"><i class="fas fa-file-alt text-[#005F02] text-sm"></i></div>
                        <h4 class="font-semibold text-gray-800">Dokumen</h4>
                        <span class="text-xs text-gray-400">(Kosongkan jika tidak ingin mengubah)</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">

                        <?php $__currentLoopData = [
                            ['field' => 'foto_ktp',    'label' => 'Foto KTP',  'icon' => 'fa-id-card',       'accept' => 'image/jpg,image/jpeg,image/png',                'current' => $pegawai->foto_ktp],
                            ['field' => 'foto_npwp',   'label' => 'Foto NPWP', 'icon' => 'fa-file-invoice',  'accept' => 'image/jpg,image/jpeg,image/png',                'current' => $pegawai->foto_npwp],
                            ['field' => 'foto_ijazah', 'label' => 'Ijazah',    'icon' => 'fa-graduation-cap','accept' => 'image/jpg,image/jpeg,image/png,application/pdf', 'current' => $pegawai->foto_ijazah],
                        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex flex-col">
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                <i class="fas <?php echo e($doc['icon']); ?> mr-1 text-[#8cbf73]"></i> <?php echo e($doc['label']); ?>

                            </label>

                            
                            <div class="mb-2 p-3 rounded-lg flex items-center justify-between h-10
                                <?php echo e($doc['current'] ? 'bg-[#eef3ec] border border-[#8cbf73]' : 'bg-gray-50 border border-dashed border-gray-200'); ?>">
                                <?php if($doc['current']): ?>
                                    <div class="flex items-center gap-2 min-w-0">
                                        <i class="fas fa-check-circle text-[#005F02] text-sm shrink-0"></i>
                                        <span class="text-xs text-[#0d4f14] truncate">File tersimpan</span>
                                    </div>
                                    <a href="<?php echo e(asset('storage/' . $doc['current'])); ?>"
                                       target="_blank"
                                       class="text-xs text-[#005F02] hover:underline font-medium shrink-0 ml-2">
                                        Lihat <i class="fas fa-external-link-alt ml-0.5 text-[10px]"></i>
                                    </a>
                                <?php else: ?>
                                    <span class="text-xs text-gray-400 italic">Belum ada file</span>
                                <?php endif; ?>
                            </div>

                            
                            <label for="edit_<?php echo e($doc['field']); ?>"
                                   class="flex flex-col items-center justify-center w-full h-28 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-[#eef3ec] hover:border-[#4ca94d] transition group">
                                <i class="fas fa-cloud-upload-alt text-xl text-gray-400 group-hover:text-[#005F02] mb-1.5"></i>
                                <p class="text-xs text-gray-500 group-hover:text-[#005F02]">
                                    <?php echo e($doc['current'] ? 'Ganti file' : 'Upload file'); ?>

                                </p>
                                <p class="text-xs text-gray-400 mt-0.5">Maks. 40MB</p>
                                <input id="edit_<?php echo e($doc['field']); ?>" type="file" name="<?php echo e($doc['field']); ?>"
                                       accept="<?php echo e($doc['accept']); ?>" class="hidden"
                                       onchange="showEditPreview(this, 'editPrev_<?php echo e($doc['field']); ?>')">
                            </label>
                            <div id="editPrev_<?php echo e($doc['field']); ?>" class="mt-1.5 hidden">
                                <p class="text-xs text-[#005F02]"><i class="fas fa-check mr-1"></i><span class="file-name"></span></p>
                            </div>
                            <?php $__errorArgs = [$doc['field']];
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
                    <a href="<?php echo e(route('admin.pegawai.show', $pegawai->id)); ?>"
                       class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm text-gray-700 hover:bg-[#eef3ec] transition font-medium">
                        <i class="fas fa-times mr-1.5"></i> Batal
                    </a>
                    <button type="submit"
                            class="px-7 py-2.5 bg-gradient-to-r from-[#005F02] to-[#4ca94d] text-white rounded-lg text-sm font-medium hover:from-[#0d4f14] hover:to-[#8cbf73] transition shadow-md hover:shadow-lg">
                        <i class="fas fa-save mr-1.5"></i> Perbarui Data
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function showEditPreview(input, previewId) {
    const wrapper = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        wrapper.querySelector('.file-name').textContent = input.files[0].name;
        wrapper.classList.remove('hidden');
    } else {
        wrapper.classList.add('hidden');
    }
}
// auto scroll ke atas kalau error
<?php if($errors->any()): ?>
window.scrollTo({
    top: 0,
    behavior: 'smooth'
});
<?php endif; ?>

// efek loading tombol submit
document.querySelector('form').addEventListener('submit', function() {
    const btn = document.querySelector('button[type="submit"]');
    btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1.5"></i> Memproses...';
});

// efek hover halus semua tombol
document.querySelectorAll('button, a').forEach(el => {
    el.addEventListener('mouseenter', () => {
        el.style.transition = 'all 0.2s ease';
    });
});

</script>
<?php $__env->stopPush(); ?>

<style>
/* =====================
   CARD MASUK
===================== */
.bg-white {
    animation: fadeSlide 0.6s ease;
}

@keyframes fadeSlide {
    from {
        opacity: 0;
        transform: translateY(25px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* =====================
   INPUT INTERAKSI
===================== */
input:focus, select:focus, textarea:focus {
    transform: scale(1.02);
    box-shadow: 0 8px 20px rgba(0, 95, 2, 0.12);
}

/* =====================
   LABEL EFFECT
===================== */
label:hover {
    color: #005F02;
}

/* =====================
   SECTION TITLE LINE
===================== */
h4 {
    position: relative;
}

h4::after {
    content: '';
    position: absolute;
    bottom: -6px;
    left: 0;
    width: 0;
    height: 2px;
    background: #4ca94d;
    transition: 0.3s;
}

h4:hover::after {
    width: 50px;
}

/* =====================
   FILE BOX HOVER
===================== */
label[for^="edit_"] {
    transition: all 0.3s ease;
}

label[for^="edit_"]:hover {
    transform: scale(1.04);
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

/* =====================
   STATUS FILE BOX
===================== */
.bg-\[\#eef3ec\] {
    transition: all 0.3s ease;
}

.bg-\[\#eef3ec\]:hover {
    transform: translateY(-2px);
}

/* =====================
   BUTTON EFFECT
===================== */
button, a {
    transition: all 0.25s ease;
}

button:hover, a:hover {
    transform: translateY(-2px);
}

/* =====================
   BUTTON SUBMIT GLOW
===================== */
button[type="submit"] {
    position: relative;
    overflow: hidden;
}

button[type="submit"]::after {
    content: '';
    position: absolute;
    width: 0%;
    height: 100%;
    left: 0;
    top: 0;
    background: rgba(255,255,255,0.2);
    transition: 0.3s;
}

button[type="submit"]:hover::after {
    width: 100%;
}

/* =====================
   PREVIEW FILE
===================== */
[id^="editPrev_"] {
    animation: fadeZoom 0.4s ease;
}

@keyframes fadeZoom {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* =====================
   ICON INTERAKSI
===================== */
i {
    transition: transform 0.2s ease;
}

i:hover {
    transform: scale(1.2);
}
</style>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\pegawai\edit.blade.php ENDPATH**/ ?>