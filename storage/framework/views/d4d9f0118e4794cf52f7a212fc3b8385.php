<?php $__env->startSection('title', 'Edit Gallery'); ?>
<?php $__env->startSection('page-title', 'Edit Gallery'); ?>

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
            font-size: 0.9rem;
            font-weight: 600;
        }

        .form-card-body {
            padding: 1.8rem;
        }

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

        .form-control,
        .custom-file-label {
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

        .current-photo {
            margin-bottom: 0.75rem;
        }

        .current-photo img {
            max-height: 120px;
            border-radius: 10px;
            border: 1px solid var(--bg-section);
        }

        .text-muted {
            font-size: 0.72rem;
            color: var(--green-soft);
            margin-top: 0.25rem;
            display: block;
        }

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

        .preview-box {
            border-radius: 12px;
            overflow: hidden;
            background: var(--bg-light);
            border: 1.5px solid var(--bg-section);
            display: none;
            position: relative;
            margin-top: 0.75rem;
        }

        .preview-box img {
            width: 100%;
            max-height: 220px;
            object-fit: cover;
            display: block;
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
            text-decoration: none;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding-top: 1rem;
            flex-wrap: wrap;
        }

        /* Custom File Input */
        .custom-file {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .custom-file-input {
            position: relative;
            z-index: 2;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            margin: 0;
            opacity: 0;
        }

        .custom-file-label {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.65rem 0.9rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--text-muted);
            background-color: var(--bg-light);
            border: 1.5px solid var(--bg-section);
            border-radius: 10px;
            cursor: pointer;
        }

        .custom-file-label::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 3;
            display: block;
            padding: 0.65rem 0.9rem;
            line-height: 1.5;
            color: var(--white);
            content: "Browse";
            background: linear-gradient(135deg, var(--green-main), var(--green-dark));
            border-radius: 0 10px 10px 0;
        }

        .custom-file-input:focus~.custom-file-label {
            border-color: var(--green-main);
            box-shadow: 0 0 0 3px rgba(0, 95, 2, 0.12);
        }

        /* Page Header */
        .page-wrapper {
            background: var(--bg-light);
            min-height: 100vh;
            padding: 2rem;
        }

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
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .col-md-6 {
            flex: 1;
            min-width: 250px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">
        
        <div class="page-header">
            <div class="page-header-left">
                <div class="page-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="page-title">
                    <h1>Edit Gallery</h1>
                    <p><i class="fas fa-calendar-alt mr-1"></i><?php echo e(now()->format('d F Y')); ?></p>
                </div>
            </div>

            <a href="<?php echo e(route('admin.data-master.gallery.index')); ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-clipboard-list"></i>
                <span>Form Edit Gallery</span>
            </div>

            <div class="form-card-body">
                <form action="<?php echo e(route('admin.data-master.gallery.update', $gallery->id)); ?>" method="POST"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="section-label">Informasi Gallery</div>

                    <div class="row">
                        <div class="col-md-6">
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
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('judul', $gallery->judul)); ?>" required>
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
                                    required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="kegiatan"
                                        <?php echo e(old('kategori', $gallery->kategori) == 'kegiatan' ? 'selected' : ''); ?>>Kegiatan
                                    </option>
                                    <option value="prestasi"
                                        <?php echo e(old('kategori', $gallery->kategori) == 'prestasi' ? 'selected' : ''); ?>>Prestasi
                                    </option>
                                    <option value="umum"
                                        <?php echo e(old('kategori', $gallery->kategori) == 'umum' ? 'selected' : ''); ?>>Umum</option>
                                </select>
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
                                    value="<?php echo e(old('tanggal_kegiatan', $gallery->tanggal_kegiatan ? $gallery->tanggal_kegiatan->format('Y-m-d') : '')); ?>">
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

                    <div class="section-label">Deskripsi</div>

                    <div class="form-group">
                        <label>Deskripsi <span class="req">*</span></label>
                        <textarea name="deskripsi" class="form-control" placeholder="Tuliskan deskripsi gallery..." rows="4" required><?php echo e(old('deskripsi', $gallery->deskripsi)); ?></textarea>
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

                    <div class="section-label">Media</div>

                    <div class="form-group">
                        <label>Gambar</label>
                        <?php if($gallery->gambar): ?>
                            <div class="current-photo">
                                <img src="<?php echo e(asset('storage/' . $gallery->gambar)); ?>" alt="<?php echo e($gallery->judul); ?>">
                                <small class="text-muted">Gambar saat ini</small>
                            </div>
                        <?php endif; ?>
                        <div class="custom-file">
                            <input type="file" name="gambar"
                                class="custom-file-input <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="gambarInput"
                                accept="image/*">
                            <label class="custom-file-label" for="gambarInput">Pilih file baru...</label>
                        </div>
                        <small class="text-muted">Format: jpeg, png, jpg, gif | Maks: 5MB (Kosongkan jika tidak ingin
                            mengubah)</small>
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

                    
                    <div class="preview-box" id="previewBox">
                        <img id="previewImg" src="#" alt="Preview">
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-save">
                            <i class="fas fa-save"></i> Update
                        </button>

                        <a href="<?php echo e(route('admin.data-master.gallery.index')); ?>" class="btn-cancel">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script>
            // Preview gambar sebelum upload
            const gambarInput = document.getElementById('gambarInput');
            const previewBox = document.getElementById('previewBox');
            const previewImg = document.getElementById('previewImg');

            gambarInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                const label = this.nextElementSibling;

                if (file) {
                    // Update label dengan nama file
                    label.textContent = file.name;

                    // Preview gambar
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        previewBox.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    label.textContent = 'Pilih file baru...';
                    previewBox.style.display = 'none';
                    previewImg.src = '#';
                }
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\data-master\gallery\edit.blade.php ENDPATH**/ ?>