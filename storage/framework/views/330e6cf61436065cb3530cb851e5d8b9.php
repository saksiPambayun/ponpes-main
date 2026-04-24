<?php $__env->startSection('title', 'Formulir Pendaftaran'); ?>

<?php $__env->startSection('content'); ?>
    <section class="form-section">
        <div class="container-form">
            <h2 class="form-title">
                <i class="bi bi-journal-text"></i>
                Formulir Pendaftaran Santri Baru
            </h2>

            <p class="form-sub">Lengkapilah data berikut dengan benar!</p>

            <?php if(session('error')): ?>
                <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
            <?php endif; ?>

            <form action="<?php echo e(route('user.pendaftaran.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="wave_id" value="<?php echo e($activeWave->id); ?>">

                
                <div class="form-group-section">
                    <h3 class="section-title">
                        <i class="bi bi-person-lines-fill"></i>
                        Data Santri
                    </h3>

                    <div class="grid-form">
                        <div class="form-control">
                            <label>Nama Lengkap <span class="required">*</span></label>
                            <input type="text" name="nama_lengkap" value="<?php echo e(old('nama_lengkap')); ?>" required>
                            <?php $__errorArgs = ['nama_lengkap'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="error"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-control">
                            <label>Asal Sekolah <span class="required">*</span></label>
                            <input type="text" name="asal_sekolah" value="<?php echo e(old('asal_sekolah')); ?>" required>
                            <?php $__errorArgs = ['asal_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="error"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-control">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="<?php echo e(old('tempat_lahir')); ?>">
                        </div>

                        <div class="form-control">
                            <label>NISN</label>
                            <input type="text" name="nisn" value="<?php echo e(old('nisn')); ?>">
                        </div>

                        <div class="form-control">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="<?php echo e(old('tanggal_lahir')); ?>">
                        </div>

                        <div class="form-control">
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo e(old('email')); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="error"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-control full-width">
                            <label>Alamat</label>
                            <textarea name="alamat" rows="3"><?php echo e(old('alamat')); ?></textarea>
                        </div>
                    </div>

                    <div class="radio-group">
                        <label>Jenis Kelamin</label>
                        <div class="radio-option">
                            <label><input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo e(old('jenis_kelamin') == 'Laki-laki' ? 'checked' : ''); ?>> Laki-Laki</label>
                            <label><input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo e(old('jenis_kelamin') == 'Perempuan' ? 'checked' : ''); ?>> Perempuan</label>
                        </div>
                    </div>
                </div>

                
                <div class="form-group-section">
                    <h3 class="section-title">
                        <i class="bi bi-people-fill"></i>
                        Data Orang Tua
                    </h3>

                    <div class="grid-form">
                        <div class="form-control">
                            <label>Nama Wali <span class="required">*</span></label>
                            <input type="text" name="nama_wali" value="<?php echo e(old('nama_wali')); ?>" required>
                            <?php $__errorArgs = ['nama_wali'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="error"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-control">
                            <label>Pekerjaan Wali</label>
                            <input type="text" name="pekerjaan_wali" value="<?php echo e(old('pekerjaan_wali')); ?>">
                        </div>

                        <div class="form-control">
                            <label>No. Telepon <span class="required">*</span></label>
                            <input type="text" name="no_wali" value="<?php echo e(old('no_wali')); ?>" required>
                            <?php $__errorArgs = ['no_wali'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="error"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                
                <div class="form-group-section">
                    <h3 class="section-title">
                        <i class="bi bi-upload"></i>
                        Upload Dokumen
                    </h3>

                    <div class="upload-grid">
                        
                        <label class="upload-box">
                            <i class="bi bi-upload"></i>
                            <span>Upload Kartu Keluarga</span>
                            <small>JPG, PNG, PDF (Max 2MB)</small>
                            <input type="file" name="kk" hidden onchange="showPreview(this)">
                            <p class="file-name"></p>
                            <img class="preview-img" style="display:none; max-height:100px;">
                            <?php $__errorArgs = ['kk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="error"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </label>

                        
                        <label class="upload-box">
                            <i class="bi bi-upload"></i>
                            <span>Upload Pas Foto</span>
                            <small>JPG, PNG (Max 2MB)</small>
                            <input type="file" name="foto" hidden onchange="showPreview(this)">
                            <p class="file-name"></p>
                            <img class="preview-img" style="display:none; max-height:100px;">
                            <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="error"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </label>
                    </div>
                </div>

                
                <div class="info-wave">
                    <i class="bi bi-info-circle"></i>
                    Anda mendaftar pada <strong><?php echo e($activeWave->name); ?></strong>
                    (<?php echo e(\Carbon\Carbon::parse($activeWave->start_date)->format('d/m/Y')); ?> -
                    <?php echo e(\Carbon\Carbon::parse($activeWave->end_date)->format('d/m/Y')); ?>)
                </div>

                
                <div class="checkbox-form">
                    <input type="checkbox" required>
                    <span>Saya menyatakan data yang diisi sudah benar.</span>
                </div>

                
                <div class="submit-form">
                    <button type="submit" class="btn-kirim">
                        Kirim Formulir
                    </button>
                    <a href="<?php echo e(route('user.pendaftaran.index')); ?>" class="btn-batal">Batal</a>
                </div>

            </form>
        </div>
    </section>

    <style>
        .form-section {
            padding: 50px 0;
            background: #f0f4f0;
            min-height: 100vh;
        }

        .container-form {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            color: #005F02;
            margin-bottom: 10px;
        }

        .form-sub {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }

        .form-group-section {
            background: #f9f9f9;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .section-title {
            color: #005F02;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #005F02;
        }

        .grid-form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-control {
            display: flex;
            flex-direction: column;
        }

        .form-control.full-width {
            grid-column: span 2;
        }

        .form-control label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        .required {
            color: #dc3545;
        }

        .form-control input,
        .form-control textarea {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
        }

        .form-control input:focus,
        .form-control textarea:focus {
            outline: none;
            border-color: #005F02;
        }

        .error {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
        }

        .radio-group {
            margin-top: 15px;
        }

        .radio-group>label {
            font-weight: 600;
            margin-right: 20px;
        }

        .radio-option {
            display: inline-flex;
            gap: 20px;
        }

        .upload-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .upload-box {
            border: 2px dashed #005F02;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .upload-box:hover {
            background: #e8f5e9;
        }

        .upload-box i {
            font-size: 30px;
            color: #005F02;
        }

        .upload-box span {
            display: block;
            font-weight: 600;
            margin: 10px 0;
        }

        .upload-box small {
            color: #666;
        }

        .file-name {
            font-size: 12px;
            color: #005F02;
            margin-top: 10px;
        }

        .info-wave {
            background: #e8f5e9;
            padding: 12px 20px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: center;
        }

        .checkbox-form {
            margin: 20px 0;
            text-align: center;
        }

        .submit-form {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .btn-kirim {
            background: linear-gradient(135deg, #005F02, #0f4d1c);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 40px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-kirim:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 95, 2, 0.3);
        }

        .btn-batal {
            background: #6c757d;
            color: white;
            padding: 12px 30px;
            border-radius: 40px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-batal:hover {
            background: #5a6268;
            color: white;
        }

        .alert {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @media (max-width: 768px) {

            .grid-form,
            .upload-grid {
                grid-template-columns: 1fr;
            }

            .form-control.full-width {
                grid-column: span 1;
            }

            .container-form {
                padding: 20px;
            }
        }
    </style>

    <script>
        function showPreview(input) {
            const file = input.files[0];
            const fileName = input.parentElement.querySelector('.file-name');
            const preview = input.parentElement.querySelector('.preview-img');

            if (!file) return;

            fileName.textContent = file.name;

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/user/pendaftaran/form.blade.php ENDPATH**/ ?>