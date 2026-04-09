<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('page-title', 'Tambah Program'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4 py-4">

    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div>
            <h4 class="text-2xl font-bold text-gray-800 mb-1">Tambah Program</h4>
            <p class="text-sm text-gray-600">Lengkapi form berikut untuk menambah program baru</p>
        </div>
        <a href="<?php echo e(route('admin.program.index')); ?>" class="mt-3 md:mt-0 bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 font-medium py-2 px-4 rounded-lg transition duration-200 inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    
    <?php if($errors->any()): ?>
    <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded-lg flex items-start gap-3">
        <i class="fas fa-exclamation-circle mt-1"></i>
        <div>
            <strong class="font-bold">Terjadi kesalahan:</strong>
            <ul class="mt-1 list-disc list-inside text-sm">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    
    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
            <h5 class="font-semibold text-gray-700 flex items-center">
                <i class="fas fa-plus-circle text-indigo-500 mr-2"></i>
                Form Tambah Program
            </h5>
        </div>

        <div class="p-6">
            <form action="<?php echo e(route('admin.program.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    
                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Program <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_program"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 <?php $__errorArgs = ['nama_program'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('nama_program')); ?>"
                            placeholder="Masukkan nama program">
                        <?php $__errorArgs = ['nama_program'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="kategori"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="pendidikan" <?php echo e(old('kategori') == 'pendidikan' ? 'selected' : ''); ?>>📚 Pendidikan</option>
                            <option value="sosial" <?php echo e(old('kategori') == 'sosial' ? 'selected' : ''); ?>>❤️ Sosial</option>
                            <option value="keagamaan" <?php echo e(old('kategori') == 'keagamaan' ? 'selected' : ''); ?>>🕌 Keagamaan</option>
                            <option value="kesehatan" <?php echo e(old('kategori') == 'kesehatan' ? 'selected' : ''); ?>>🏥 Kesehatan</option>
                        </select>
                        <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi" rows="5"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        placeholder="Jelaskan deskripsi program secara detail..."><?php echo e(old('deskripsi')); ?></textarea>
                    <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Mulai
                        </label>
                        <input type="date" name="tanggal_mulai"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            value="<?php echo e(old('tanggal_mulai')); ?>">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Selesai
                        </label>
                        <input type="date" name="tanggal_selesai"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            value="<?php echo e(old('tanggal_selesai')); ?>">
                    </div>
                </div>

                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Gambar Program
                    </label>

                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center bg-gray-50 cursor-pointer hover:border-indigo-500 hover:bg-indigo-50 transition"
                        id="uploadArea"
                        onclick="document.getElementById('gambar').click()">

                        <i class="fas fa-cloud-upload-alt fa-3x mb-3 text-gray-400"></i>
                        <p class="text-gray-600 font-medium mb-1">Pilih Gambar atau Tarik ke Sini</p>
                        <p class="text-gray-500 text-sm mb-3">Format: JPG, JPEG, PNG, WEBP (Maks. 2MB)</p>
                        <span class="inline-block bg-white border border-indigo-500 text-indigo-500 hover:bg-indigo-500 hover:text-white text-sm font-medium py-2 px-4 rounded-full transition">
                            <i class="fas fa-folder-open mr-2"></i>Browse File
                        </span>
                    </div>

                    <input type="file" name="gambar" id="gambar"
                        class="hidden <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        accept="image/*" onchange="previewImage(this)">

                    <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    
                    <div id="previewContainer" class="mt-3 hidden">
                        <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                            <img id="preview" src="#" alt="Preview" class="rounded-lg" style="max-height: 80px; max-width: 80px; object-fit: cover;">
                            <div class="ml-3 flex-grow">
                                <p class="font-medium text-gray-700" id="previewName"></p>
                                <p class="text-gray-500 text-sm" id="previewSize"></p>
                            </div>
                            <button type="button" class="bg-white border border-red-500 text-red-500 hover:bg-red-500 hover:text-white w-8 h-8 rounded-full flex items-center justify-center transition" onclick="removePreview()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>

                
                <div class="flex gap-3 justify-end border-t border-gray-200 pt-6">
                    <a href="<?php echo e(route('admin.program.index')); ?>" class="bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 font-medium py-2 px-6 rounded-lg transition">
                        <i class="fas fa-times mr-2"></i>Batal
                    </a>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded-lg transition shadow-md">
                        <i class="fas fa-save mr-2"></i>Simpan Program
                    </button>
                </div>
            </form>
        </div>
    </div>

    
    <div class="text-center mt-4 text-sm text-gray-500">
        <i class="fas fa-info-circle mr-1"></i>
        Field dengan tanda <span class="text-red-500">*</span> wajib diisi
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Preview Image
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];

            // Validasi ukuran (2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('File terlalu besar! Maksimal 2MB.');
                input.value = '';
                return;
            }

            // Validasi tipe file
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
            if (!validTypes.includes(file.type)) {
                alert('Format file tidak valid! Gunakan JPG, JPEG, PNG, atau WEBP.');
                input.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('previewName').textContent = file.name;
                document.getElementById('previewSize').textContent = formatBytes(file.size);
                document.getElementById('previewContainer').classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }

    // Hapus preview
    function removePreview() {
        document.getElementById('gambar').value = '';
        document.getElementById('preview').src = '#';
        document.getElementById('previewContainer').classList.add('hidden');
    }

    // Format bytes
    function formatBytes(bytes, decimals = 2) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }

    // Drag and drop
    const uploadArea = document.getElementById('uploadArea');
    if (uploadArea) {
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        uploadArea.addEventListener('drop', function(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            document.getElementById('gambar').files = files;
            previewImage(document.getElementById('gambar'));
        });
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/data-master/program/create.blade.php ENDPATH**/ ?>