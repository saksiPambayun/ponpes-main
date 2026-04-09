<?php $__env->startSection('title', 'Tambah Anggota Organisasi'); ?>
<?php $__env->startSection('page-title', 'Tambah Anggota Organisasi'); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .page-wrapper {
            background: #f0f4f8;
            min-height: 100vh;
            padding: 2rem;
        }

        /* Page Header */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .page-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #4361ee, #7209b7);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 14px rgba(67, 97, 238, 0.35);
        }

        .page-icon i {
            color: #fff;
            font-size: 1.1rem;
        }

        .page-title h1 {
            font-size: 1.35rem;
            font-weight: 700;
            color: #1a1f36;
            margin: 0;
        }

        .page-title p {
            font-size: 0.8rem;
            color: #8898aa;
            margin: 0;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.55rem 1.1rem;
            background: #fff;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            color: #4a5568;
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            background: #f7fafc;
            border-color: #cbd5e0;
            color: #2d3748;
            transform: translateY(-1px);
        }

        /* Form Card */
        .form-card {
            background: #fff;
            border-radius: 20px;
            border: none;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .form-card-header {
            background: linear-gradient(135deg, #4361ee, #7209b7);
            padding: 1.2rem 1.8rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .form-card-header i {
            color: rgba(255, 255, 255, 0.85);
            font-size: 1rem;
        }

        .form-card-header span {
            color: #fff;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .form-card-body {
            padding: 1.8rem;
        }

        /* Section Label */
        .section-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #a0aec0;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #edf2f7;
        }

        /* Form Fields */
        .form-group {
            margin-bottom: 1.4rem;
        }

        .form-group label {
            font-size: 0.82rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.45rem;
            display: block;
        }

        .form-group label .req {
            color: #e53e3e;
            margin-left: 2px;
        }

        .form-group label .opt {
            color: #a0aec0;
            font-weight: 400;
            font-size: 0.75rem;
            margin-left: 4px;
        }

        .form-control {
            font-family: 'Inter', sans-serif;
            font-size: 0.87rem;
            color: #2d3748;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.65rem 0.9rem;
            background: #f8fafc;
            transition: all 0.2s ease;
            width: 100%;
        }

        .form-control:focus {
            border-color: #4361ee;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.12);
            outline: none;
        }

        .form-control.is-invalid {
            border-color: #e53e3e;
            background: #fff5f5;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%23a0aec0' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.9rem center;
            padding-right: 2.5rem;
            cursor: pointer;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 90px;
        }

        .invalid-feedback {
            font-size: 0.78rem;
            color: #e53e3e;
            margin-top: 0.35rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        /* File Upload */
        .file-upload-wrapper {
            position: relative;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border: 1.5px dashed #cbd5e0;
            border-radius: 10px;
            padding: 1rem;
            background: #f8fafc;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .file-upload-label:hover {
            border-color: #4361ee;
            background: #eef2ff;
        }

        .file-upload-icon {
            width: 38px;
            height: 38px;
            background: #eef2ff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .file-upload-icon i {
            color: #4361ee;
            font-size: 0.9rem;
        }

        .file-upload-text strong {
            display: block;
            font-size: 0.83rem;
            font-weight: 600;
            color: #2d3748;
        }

        .file-upload-text span {
            font-size: 0.75rem;
            color: #a0aec0;
        }

        input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        /* Action Buttons */
        .form-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding-top: 1rem;
            flex-wrap: wrap;
        }

        .btn-save {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.7rem 1.5rem;
            background: linear-gradient(135deg, #4361ee, #7209b7);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 0.87rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(67, 97, 238, 0.3);
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
        }

        .btn-reset {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.7rem 1.2rem;
            background: #f7fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            color: #718096;
            font-size: 0.87rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-reset:hover {
            background: #edf2f7;
            border-color: #cbd5e0;
            color: #4a5568;
        }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.7rem 1.2rem;
            background: #fff5f5;
            border: 1.5px solid #fed7d7;
            border-radius: 10px;
            color: #e53e3e;
            font-size: 0.87rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-cancel:hover {
            background: #fed7d7;
            border-color: #fc8181;
            color: #c53030;
        }

        .required-note {
            font-size: 0.75rem;
            color: #a0aec0;
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .required-note span {
            color: #e53e3e;
            font-weight: 700;
        }

        /* Preview Image */
        .preview-img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 8px;
            margin-bottom: 0.5rem;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">
        
        <div class="page-header">
            <div class="page-header-left">
                <div class="page-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="page-title">
                    <h1>Tambah Anggota Organisasi</h1>
                    <p><i class="fas fa-calendar-alt mr-1"></i><?php echo e(now()->format('d F Y')); ?></p>
                </div>
            </div>

            <a href="<?php echo e(route('admin.data-master.struktur-organisasi.index')); ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        
        <?php if($errors->any()): ?>
            <div class="alert-error-box"
                style="display: flex; gap: 12px; background: #fff5f5; border-left: 4px solid #ef4444; border-radius: 10px; padding: 12px 16px; margin-bottom: 20px;">
                <i class="fas fa-exclamation-circle" style="color: #ef4444;"></i>
                <div>
                    <p style="font-weight: 700; color: #991b1b; margin: 0 0 4px;">Terdapat beberapa kesalahan:</p>
                    <ul style="margin: 0; padding-left: 18px; color: #b91c1c; font-size: 0.8rem;">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-clipboard-list"></i>
                <span>Formulir Tambah Anggota</span>
            </div>

            <div class="form-card-body">
                <form action="<?php echo e(route('admin.data-master.struktur-organisasi.store')); ?>" method="POST"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    
                    <div class="section-label">Identitas Anggota</div>

                    <div class="row" style="display: flex; flex-wrap: wrap; gap: 1.5rem;">
                        <div class="col-md-6" style="flex: 1; min-width: 250px;">
                            <div class="form-group">
                                <label>Nama Lengkap <span class="req">*</span></label>
                                <input type="text" name="nama" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('nama')); ?>" placeholder="Masukkan nama lengkap" required>
                                <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label>Jabatan <span class="req">*</span></label>
                                <input type="text" name="jabatan"
                                    class="form-control <?php $__errorArgs = ['jabatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('jabatan')); ?>"
                                    placeholder="Contoh: Ketua Umum, Sekretaris" required>
                                <?php $__errorArgs = ['jabatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label>Divisi <span class="req">*</span></label>
                                <select name="divisi" class="form-control <?php $__errorArgs = ['divisi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                    <option value="">Pilih Divisi</option>
                                    <option value="pengurus" <?php echo e(old('divisi') == 'pengurus' ? 'selected' : ''); ?>>Pengurus
                                    </option>
                                    <option value="pengawas" <?php echo e(old('divisi') == 'pengawas' ? 'selected' : ''); ?>>Pengawas
                                    </option>
                                    <option value="pelaksana" <?php echo e(old('divisi') == 'pelaksana' ? 'selected' : ''); ?>>Pelaksana
                                    </option>
                                </select>
                                <?php $__errorArgs = ['divisi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="col-md-6" style="flex: 1; min-width: 250px;">
                            <div class="form-group">
                                <label>Telepon <span class="opt">(opsional)</span></label>
                                <input type="text" name="telepon"
                                    class="form-control <?php $__errorArgs = ['telepon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('telepon')); ?>"
                                    placeholder="08xxxxxxxxxx">
                                <?php $__errorArgs = ['telepon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label>Email <span class="opt">(opsional)</span></label>
                                <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('email')); ?>" placeholder="email@example.com">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    
                    <div class="section-label">Informasi Tambahan</div>

                    <div class="row" style="display: flex; flex-wrap: wrap; gap: 1.5rem;">
                        <div class="col-md-4" style="flex: 1; min-width: 150px;">
                            <div class="form-group">
                                <label>Urutan <span class="opt">(opsional)</span></label>
                                <input type="number" name="urutan" class="form-control" value="<?php echo e(old('urutan', 0)); ?>"
                                    min="0" placeholder="0">
                            </div>
                        </div>

                        <div class="col-md-4" style="flex: 1; min-width: 150px;">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="aktif" <?php echo e(old('status') == 'aktif' ? 'selected' : ''); ?>>Aktif</option>
                                    <option value="nonaktif" <?php echo e(old('status') == 'nonaktif' ? 'selected' : ''); ?>>Nonaktif
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4" style="flex: 1; min-width: 200px;">
                            <div class="form-group">
                                <label>Foto <span class="opt">(opsional)</span></label>
                                <div class="file-upload-wrapper">
                                    <label class="file-upload-label" id="fileLabel">
                                        <div class="file-upload-icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <div class="file-upload-text">
                                            <strong id="fileName">Klik untuk upload foto</strong>
                                            <span>JPG, PNG, WEBP &bull; Maks 2MB</span>
                                        </div>
                                        <input type="file" name="foto" accept="image/*" onchange="updateFileName(this)">
                                    </label>
                                </div>
                                <div id="previewContainer" style="margin-top: 0.5rem; display: none;">
                                    <img id="previewImg" src="#" alt="Preview" class="preview-img">
                                </div>
                                <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback d-block"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi <span class="opt">(opsional)</span></label>
                        <textarea name="deskripsi" class="form-control <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3"
                            placeholder="Tuliskan deskripsi singkat tentang anggota..."><?php echo e(old('deskripsi')); ?></textarea>
                        <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div class="form-actions">
                        <button type="submit" class="btn-save">
                            <i class="fas fa-save"></i> Simpan Anggota
                        </button>

                        <button type="reset" class="btn-reset" onclick="resetForm()">
                            <i class="fas fa-undo"></i> Reset
                        </button>

                        <a href="<?php echo e(route('admin.data-master.struktur-organisasi.index')); ?>" class="btn-cancel">
                            <i class="fas fa-times"></i> Batal
                        </a>

                        <div class="required-note">
                            <span>*</span> Wajib diisi
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        function updateFileName(input) {
            const label = document.getElementById('fileName');
            const previewContainer = document.getElementById('previewContainer');
            const previewImg = document.getElementById('previewImg');

            if (input.files && input.files[0]) {
                const file = input.files[0];
                label.textContent = file.name;

                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    previewContainer.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                label.textContent = 'Klik untuk upload foto';
                previewContainer.style.display = 'none';
                previewImg.src = '#';
            }
        }

        function resetForm() {
            const label = document.getElementById('fileName');
            const previewContainer = document.getElementById('previewContainer');
            const previewImg = document.getElementById('previewImg');

            label.textContent = 'Klik untuk upload foto';
            previewContainer.style.display = 'none';
            previewImg.src = '#';
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/data-master/struktur-organisasi/create.blade.php ENDPATH**/ ?>