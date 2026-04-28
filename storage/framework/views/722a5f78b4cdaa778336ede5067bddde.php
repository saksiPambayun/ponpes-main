<?php $__env->startSection('title', 'Tambah Gallery'); ?>

<?php $__env->startSection('page-title', 'Tambah Gallery'); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        :root {
            --green-main: #005F02;
            --green-dark: #0d4f14;
            --green-darker: #0f4d1c;
            --green-medium: #2e6b37;
            --green-light: #4ca94d;
            --green-soft: #8cbf73;
            --bg-light: #f4f4f4;
            --bg-soft: #eef3ec;
            --bg-section: #dfe8d8;
            --text-main: #333;
            --text-dark: #222;
            --text-muted: #2d2d2d;
            --white: #ffffff;
            --shadow-soft: rgba(0,0,0,0.1);
            --shadow-medium: rgba(0,0,0,0.15);
        }

        .page-wrapper {
            background: var(--bg-light);
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
            background: linear-gradient(135deg, var(--green-main), var(--green-dark));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 14px rgba(0, 95, 2, 0.35);
        }

        .page-icon i {
            color: var(--white);
            font-size: 1.1rem;
        }

        .page-title h1 {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .page-title p {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin: 0;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.55rem 1.1rem;
            background: var(--white);
            border: 1.5px solid var(--bg-section);
            border-radius: 10px;
            color: var(--text-muted);
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            background: var(--bg-soft);
            border-color: var(--green-soft);
            color: var(--green-main);
            transform: translateY(-1px);
        }

        /* Form Layout */
        .form-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            align-items: start;
        }

        @media (max-width: 768px) {
            .form-layout {
                grid-template-columns: 1fr;
            }
        }

        /* Cards */
        .form-card {
            background: var(--white);
            border-radius: 20px;
            border: none;
            box-shadow: 0 2px 20px var(--shadow-soft);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .form-card-header {
            background: linear-gradient(135deg, var(--green-main), var(--green-dark));
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
            color: var(--white);
            font-size: 0.93rem;
            font-weight: 600;
        }

        .form-card-body {
            padding: 1.75rem;
        }

        .sub-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 2px 20px var(--shadow-soft);
            padding: 1.75rem;
        }

        /* Section Label */
        .section-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 1.2rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--bg-section);
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 1.3rem;
        }

        .form-group label {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 0.4rem;
            display: block;
        }

        .form-group label .req {
            color: #dc2626;
            margin-left: 2px;
        }

        .form-group label .opt {
            color: var(--green-soft);
            font-weight: 400;
            font-size: 0.73rem;
            margin-left: 4px;
        }

        .form-control {
            font-family: 'Inter', sans-serif;
            font-size: 0.87rem;
            color: var(--text-main);
            border: 1.5px solid var(--bg-section);
            border-radius: 10px;
            padding: 0.65rem 0.9rem;
            background: var(--bg-light);
            transition: all 0.2s ease;
            width: 100%;
        }

        .form-control:focus {
            border-color: var(--green-main);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(0, 95, 2, 0.12);
            outline: none;
        }

        .form-control.is-invalid {
            border-color: #dc2626;
            background: #fef2f2;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%238cbf73' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.9rem center;
            padding-right: 2.5rem;
            cursor: pointer;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .invalid-feedback {
            font-size: 0.78rem;
            color: #dc2626;
            margin-top: 0.35rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        /* Kategori Badges */
        .kategori-hints {
            display: flex;
            gap: 0.45rem;
            margin-top: 0.55rem;
            flex-wrap: wrap;
        }

        .kat-badge {
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.18rem 0.6rem;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .kat-badge:hover {
            opacity: 0.75;
            transform: translateY(-1px);
        }

        .kat-badge.kegiatan {
            background: var(--bg-soft);
            color: var(--green-main);
        }

        .kat-badge.prestasi {
            background: var(--bg-section);
            color: var(--green-dark);
        }

        .kat-badge.umum {
            background: var(--green-soft);
            color: var(--white);
        }

        /* File Upload */
        .file-upload-wrapper {
            position: relative;
        }

        .file-upload-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            border: 2px dashed var(--green-soft);
            border-radius: 12px;
            padding: 2rem 1rem;
            background: var(--bg-light);
            cursor: pointer;
            transition: all 0.2s ease;
            text-align: center;
            position: relative;
        }

        .file-upload-area:hover,
        .file-upload-area.dragover {
            border-color: var(--green-main);
            background: var(--bg-soft);
        }

        .file-upload-area input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .upload-icon-wrap {
            width: 48px;
            height: 48px;
            background: var(--bg-soft);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .upload-icon-wrap i {
            color: var(--green-main);
            font-size: 1.2rem;
        }

        .upload-main-text {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-muted);
        }

        .upload-sub-text {
            font-size: 0.75rem;
            color: var(--green-soft);
        }

        /* Image Preview */
        .preview-box {
            border-radius: 12px;
            overflow: hidden;
            background: var(--bg-light);
            border: 1.5px solid var(--bg-section);
            display: none;
            position: relative;
            margin-bottom: 1rem;
        }

        .preview-box img {
            width: 100%;
            max-height: 220px;
            object-fit: cover;
            display: block;
        }

        .preview-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 0.6rem 0.9rem;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.55));
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .preview-filename {
            font-size: 0.75rem;
            color: var(--white);
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 80%;
        }

        .preview-remove {
            background: rgba(255, 255, 255, 0.25);
            border: none;
            border-radius: 6px;
            color: var(--white);
            font-size: 0.72rem;
            padding: 0.2rem 0.5rem;
            cursor: pointer;
            transition: background 0.2s;
        }

        .preview-remove:hover {
            background: rgba(220, 38, 38, 0.7);
        }

        /* Action Buttons */
        .form-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
            padding-top: 0.25rem;
        }

        .btn-save {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.7rem 1.5rem;
            background: linear-gradient(135deg, var(--green-main), var(--green-dark));
            color: var(--white);
            border: none;
            border-radius: 10px;
            font-size: 0.87rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(0, 95, 2, 0.3);
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 95, 2, 0.4);
        }

        .btn-reset {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.7rem 1.2rem;
            background: var(--bg-light);
            border: 1.5px solid var(--bg-section);
            border-radius: 10px;
            color: var(--text-muted);
            font-size: 0.87rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-reset:hover {
            background: var(--bg-soft);
            border-color: var(--green-soft);
            color: var(--green-main);
        }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.7rem 1.2rem;
            background: #fef2f2;
            border: 1.5px solid #fecaca;
            border-radius: 10px;
            color: #dc2626;
            font-size: 0.87rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-cancel:hover {
            background: #fee2e2;
            border-color: #f87171;
            color: #b91c1c;
        }

        .required-note {
            font-size: 0.75rem;
            color: var(--green-soft);
            margin-left: auto;
        }

        .required-note span {
            color: #dc2626;
            font-weight: 700;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">
        
        <div class="page-header">
            <div class="page-header-left">
                <div class="page-icon">
                    <i class="fas fa-images"></i>
                </div>
                <div class="page-title">
                    <h1>Tambah Gallery</h1>
                    <p><i class="fas fa-calendar-alt mr-1"></i><?php echo e(now()->format('d F Y')); ?></p>
                </div>
            </div>

            <a href="<?php echo e(route('admin.data-master.gallery.index')); ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <form action="<?php echo e(route('admin.data-master.gallery.store')); ?>" method="POST" enctype="multipart/form-data"
            id="galleryForm">
            <?php echo csrf_field(); ?>

            <div class="form-layout">
                
                <div>
                    <div class="form-card">
                        <div class="form-card-header">
                            <i class="fas fa-info-circle"></i>
                            <span>Informasi Gallery</span>
                        </div>
                        <div class="form-card-body">
                            <div class="form-group">
                                <label>Judul <span class="req">*</span></label>
                                <input type="text" name="judul"
                                    class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('judul')); ?>"
                                    placeholder="Masukkan judul gallery" required>
                                <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label>Kategori <span class="req">*</span></label>
                                <select name="kategori" class="form-control <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="kategoriSelect" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="kegiatan" <?php echo e(old('kategori') == 'kegiatan' ? 'selected' : ''); ?>>Kegiatan
                                    </option>
                                    <option value="prestasi" <?php echo e(old('kategori') == 'prestasi' ? 'selected' : ''); ?>>Prestasi
                                    </option>
                                    <option value="umum" <?php echo e(old('kategori') == 'umum' ? 'selected' : ''); ?>>Umum</option>
                                </select>
                                <div class="kategori-hints">
                                    <span class="kat-badge kegiatan" onclick="setKat('kegiatan')">Kegiatan</span>
                                    <span class="kat-badge prestasi" onclick="setKat('prestasi')">Prestasi</span>
                                    <span class="kat-badge umum" onclick="setKat('umum')">Umum</span>
                                </div>
                                <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Kegiatan <span class="opt">(opsional)</span></label>
                                <input type="date" name="tanggal_kegiatan"
                                    class="form-control <?php $__errorArgs = ['tanggal_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('tanggal_kegiatan')); ?>">
                                <?php $__errorArgs = ['tanggal_kegiatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div>
                    <div class="form-card">
                        <div class="form-card-header">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Upload Gambar</span>
                        </div>
                        <div class="form-card-body">
                            <div class="preview-box" id="previewBox">
                                <img id="previewImg" src="#" alt="Preview">
                                <div class="preview-overlay">
                                    <span class="preview-filename" id="previewName"></span>
                                    <button type="button" class="preview-remove" onclick="clearImage()">
                                        <i class="fas fa-times"></i> Hapus
                                    </button>
                                </div>
                            </div>

                            <div class="file-upload-wrapper" id="uploadWrapper">
                                <div class="file-upload-area <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="dropZone">
                                    <input type="file" name="gambar" id="gambarInput" accept="image/*"
                                        onchange="handleFile(this)" required>
                                    <div class="upload-icon-wrap">
                                        <i class="fas fa-image"></i>
                                    </div>
                                    <p class="upload-main-text">Klik atau drag & drop gambar</p>
                                    <p class="upload-sub-text">JPEG, PNG, JPG, GIF &bull; Maks 5MB</p>
                                </div>
                            </div>

                            <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="sub-card">
                        <div class="section-label">Deskripsi</div>
                        <div class="form-group">
                            <label>Deskripsi <span class="req">*</span></label>
                            <textarea name="deskripsi" class="form-control <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4"
                                placeholder="Tuliskan deskripsi singkat tentang foto ini..." required><?php echo e(old('deskripsi')); ?></textarea>
                            <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="sub-card" style="margin-top: 1.5rem;">
                <div class="form-actions">
                    <button type="submit" class="btn-save">
                        <i class="fas fa-save"></i> Simpan Gallery
                    </button>

                    <button type="reset" class="btn-reset" onclick="resetForm()">
                        <i class="fas fa-undo"></i> Reset
                    </button>

                    <a href="<?php echo e(route('admin.data-master.gallery.index')); ?>" class="btn-cancel">
                        <i class="fas fa-times"></i> Batal
                    </a>

                    <div class="required-note"><span>*</span> Wajib diisi</div>
                </div>
            </div>
        </form>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script>
            // Preview gambar
            function handleFile(input) {
                const file = input.files[0];
                const previewBox = document.getElementById('previewBox');
                const previewImg = document.getElementById('previewImg');
                const previewName = document.getElementById('previewName');
                const uploadWrapper = document.getElementById('uploadWrapper');

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        previewName.textContent = file.name;
                        previewBox.style.display = 'block';
                        uploadWrapper.style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                }
            }

            function clearImage() {
                const previewBox = document.getElementById('previewBox');
                const uploadWrapper = document.getElementById('uploadWrapper');
                const gambarInput = document.getElementById('gambarInput');

                previewBox.style.display = 'none';
                uploadWrapper.style.display = 'block';
                gambarInput.value = '';
            }

            function setKat(val) {
                document.getElementById('kategoriSelect').value = val;
            }

            function resetForm() {
                clearImage();
                document.getElementById('galleryForm').reset();
            }

            // Drag & drop highlight
            const dropZone = document.getElementById('dropZone');
            if (dropZone) {
                ['dragenter', 'dragover'].forEach(e => {
                    dropZone.addEventListener(e, (e) => {
                        e.preventDefault();
                        dropZone.classList.add('dragover');
                    });
                });
                ['dragleave', 'drop'].forEach(e => {
                    dropZone.addEventListener(e, (e) => {
                        e.preventDefault();
                        dropZone.classList.remove('dragover');
                    });
                });
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\data-master\gallery\create.blade.php ENDPATH**/ ?>