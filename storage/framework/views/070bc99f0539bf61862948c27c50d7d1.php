<?php $__env->startSection('title', 'Edit Anggota Organisasi'); ?>
<?php $__env->startSection('page-title', 'Edit Anggota Organisasi'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid px-4 py-4">

        
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">

            <div class="flex items-center gap-3">
                <div class="bg-green-100 p-3 rounded-xl">
                    <i class="fas fa-user-edit text-green-700 text-lg"></i>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-gray-800">
                        Edit Anggota Organisasi
                    </h2>

                    
                    <nav class="text-sm text-gray-500 mt-1">
                        <a href="<?php echo e(url('/admin/dashboard')); ?>" class="hover:text-green-700">Dashboard</a>
                        <span class="mx-2">/</span>

                        <a href="<?php echo e(route('admin.data-master.struktur-organisasi.index')); ?>" class="hover:text-green-700">
                            Struktur Organisasi
                        </a>

                        <span class="mx-2">/</span>

                        <span class="text-green-700 font-medium">
                            Edit Anggota
                        </span>
                    </nav>
                </div>
            </div>

            
            <a href="<?php echo e(route('admin.data-master.struktur-organisasi.index')); ?>"
                class="mt-3 md:mt-0 flex items-center gap-2 px-4 py-2 bg-white border rounded-lg shadow-sm hover:bg-gray-50 transition"
                style="border-color: #dfe8d8; border-radius: 10px;">
                <i class="fas fa-arrow-left text-sm"></i>
                Kembali
            </a>

        </div>

        
        <?php if($errors->any()): ?>
            <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 mb-6"
                style="background: #eef3ec; border-color: #dfe8d8;">

                <div class="flex items-start gap-3">

                    <i class="fas fa-exclamation-circle mt-1" style="color: #005F02;"></i>

                    <div>
                        <p class="font-semibold mb-1" style="color: #0d4f14;">
                            Terjadi kesalahan pada form
                        </p>

                        <ul class="list-disc ml-5 text-sm" style="color: #2d2d2d;">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                </div>

            </div>
        <?php endif; ?>

        
        <div class="bg-white rounded-xl shadow-md border"
            style="border-color: #dfe8d8; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">

            
            <div class="border-b px-6 py-4 flex items-center gap-3"
                style="background: #eef3ec; border-color: #dfe8d8; border-radius: 20px 20px 0 0;">

                <i class="fas fa-edit" style="color: #005F02;"></i>

                <div>
                    <h3 class="font-semibold" style="color: #222;">
                        Form Edit Data Anggota
                    </h3>

                    <p class="text-sm" style="color: #2d2d2d;">
                        Silakan ubah data anggota organisasi pada form di bawah
                    </p>
                </div>

            </div>

            
            <div class="p-6">

                <form action="<?php echo e(route('admin.data-master.struktur-organisasi.update', $anggota)); ?>" method="POST"
                    enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    
                    <?php echo $__env->make('admin.data-master.struktur-organisasi._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    
                    <div class="mt-8 flex justify-end gap-3 border-t pt-6" style="border-color: #dfe8d8;">

                        <a href="<?php echo e(route('admin.data-master.struktur-organisasi.index')); ?>"
                            class="px-5 py-2 rounded-lg border transition"
                            style="border-color: #dfe8d8; color: #2d2d2d; border-radius: 10px; background: white;"
                            onmouseover="this.style.background='#eef3ec'" onmouseout="this.style.background='white'">
                            Batal
                        </a>

                        <button type="submit" class="px-6 py-2 rounded-lg transition shadow"
                            style="background: linear-gradient(135deg, #005F02, #0f4d1c); color: white; border-radius: 10px;"
                            onmouseover="this.style.background='linear-gradient(135deg, #0d4f14, #0f4d1c)'"
                            onmouseout="this.style.background='linear-gradient(135deg, #005F02, #0f4d1c)'">

                            <i class="fas fa-save mr-2"></i>
                            Simpan Perubahan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script>

        function previewFoto(input) {

            const wrap = document.getElementById('foto-preview-wrap')
            const img = document.getElementById('foto-preview')

            if (input.files && input.files[0]) {

                const reader = new FileReader()

                reader.onload = function (e) {

                    img.src = e.target.result
                    wrap.classList.remove('hidden')

                }

                reader.readAsDataURL(input.files[0])

            }

        }

    </script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/data-master/struktur-organisasi/edit.blade.php ENDPATH**/ ?>