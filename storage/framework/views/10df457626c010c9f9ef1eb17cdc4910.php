<?php $__env->startSection('title', 'Tambah Fasilitas'); ?>

<?php $__env->startPush('styles'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
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
            --shadow-soft: rgba(0, 0, 0, 0.1);
            --shadow-medium: rgba(0, 0, 0, 0.15);
        }

        body,
        .sidebar,
        .topbar {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
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
            letter-spacing: -0.3px;
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
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .btn-back:hover {
            background: var(--bg-soft);
            border-color: var(--green-soft);
            color: var(--green-main);
            text-decoration: none;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px var(--shadow-soft);
        }

        /* Card */
        .form-card {
            background: var(--white);
            border-radius: 20px;
            border: none;
            box-shadow: 0 2px 20px var(--shadow-soft);
            overflow: hidden;
        }

        .form-card-header {
            background: linear-gradient(135deg, var(--green-main), var(--green-dark));
            padding: 1.4rem 2rem;
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
            font-size: 0.95rem;
            font-weight: 600;
            letter-spacing: -0.1px;
        }

        .form-card-body {
            padding: 2rem;
        }

        /* Section Divider */
        .section-label {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 1.25rem;
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

        /* Form Fields */
        .form-group {
            margin-bottom: 1.4rem;
        }

        .form-group label {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 0.45rem;
            display: block;
            letter-spacing: -0.1px;
        }

        .form-group label .req {
            color: #dc2626;
            margin-left: 2px;
        }

        .form-group label .opt {
            color: var(--green-soft);
            font-weight: 400;
            font-size: 0.75rem;
            margin-left: 4px;
        }

        .form-control,
        .form-control-file {
            font-family: 'Plus Jakarta Sans', sans-serif;
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
            color: var(--text-dark);
        }

        .form-control.is-invalid {
            border-color: #dc2626;
            background: #fef2f2;
        }

        .form-control.is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.12);
        }

        .invalid-feedback {
            font-size: 0.78rem;
            color: #dc2626;
            margin-top: 0.35rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .invalid-feedback::before {
            content: '\f06a';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
        }

        /* Select styling */
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%238cbf73' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.9rem center;
            padding-right: 2.5rem;
            cursor: pointer;
        }

        /* Kondisi badges inside select hint */
        .kondisi-hints {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.5rem;
            flex-wrap: wrap;
        }

        .kondisi-badge {
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.2rem 0.6rem;
            border-radius: 20px;
        }

        .kondisi-badge.baik {
            background: var(--bg-soft);
            color: var(--green-main);
        }

        .kondisi-badge.ringan {
            background: var(--bg-section);
            color: var(--green-dark);
        }

        .kondisi-badge.berat {
            background: #fef2f2;
            color: #dc2626;
        }

        /* File Upload */
        .file-upload-wrapper {
            position: relative;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border: 1.5px dashed var(--green-soft);
            border-radius: 10px;
            padding: 1.2rem 1rem;
            background: var(--bg-light);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .file-upload-label:hover {
            border-color: var(--green-main);
            background: var(--bg-soft);
        }

        .file-upload-icon {
            width: 38px;
            height: 38px;
            background: var(--bg-soft);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .file-upload-icon i {
            color: var(--green-main);
            font-size: 0.9rem;
        }

        .file-upload-text strong {
            display: block;
            font-size: 0.83rem;
            font-weight: 600;
            color: var(--text-muted);
        }

        .file-upload-text span {
            font-size: 0.75rem;
            color: var(--green-soft);
        }

        input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        /* Textarea */
        textarea.form-control {
            resize: vertical;
            min-height: 90px;
        }

        /* Divider */
        .form-divider {
            border: none;
            border-top: 1.5px solid var(--bg-section);
            margin: 1.75rem 0;
        }

        /* Action Buttons */
        .form-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding-top: 0.5rem;
            flex-wrap: wrap;
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
            font-family: 'Plus Jakarta Sans', sans-serif;
            box-shadow: 0 4px 14px rgba(0, 95, 2, 0.3);
            letter-spacing: -0.1px;
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 95, 2, 0.4);
        }

        .btn-save:active {
            transform: translateY(0);
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
            font-family: 'Plus Jakarta Sans', sans-serif;
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
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .btn-cancel:hover {
            background: #fee2e2;
            border-color: #f87171;
            color: #b91c1c;
            text-decoration: none;
        }

        /* Required note */
        .required-note {
            font-size: 0.75rem;
            color: var(--green-soft);
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .required-note span {
            color: #dc2626;
            font-weight: 700;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .col-md-4,
        .col-md-6 {
            flex: 1;
            min-width: 200px;
        }

        @media (max-width: 768px) {
            .page-wrapper {
                padding: 1rem;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .col-md-4,
            .col-md-6 {
                min-width: 100%;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">

        
        <div class="page-header">
            <div class="page-header-left">
                <div class="page-icon">
                    <i class="fas fa-cubes"></i>
                </div>
                <div class="page-title">
                    <h1>Tambah Fasilitas</h1>
                    <p><i class="fas fa-calendar-alt mr-1"></i><?php echo e(now()->format('d F Y')); ?></p>
                </div>
            </div>

            <a href="<?php echo e(route('admin.data-master.fasilitas.index')); ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-clipboard-list"></i>
                <span>Formulir Tambah Fasilitas</span>
            </div>

            <div class="form-card-body">
                <form action="<?php echo e(route('admin.data-master.fasilitas.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    
                    <div class="section-label">Informasi Utama</div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Fasilitas <span class="req">*</span></label>
                                <input type="text" name="nama_fasilitas"
                                    class="form-control <?php $__errorArgs = ['nama_fasilitas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('nama_fasilitas')); ?>" placeholder="Masukkan nama fasilitas" required>
                                <?php $__errorArgs = ['nama_fasilitas'];
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori <span class="opt">(opsional)</span></label>
                                <input type="text" name="kategori"
                                    class="form-control <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('kategori')); ?>" placeholder="Contoh: Laboratorium, Kelas, Olahraga">
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
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jumlah <span class="req">*</span></label>
                                <input type="number" name="jumlah"
                                    class="form-control <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('jumlah', 0)); ?>" min="0" required>
                                <?php $__errorArgs = ['jumlah'];
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

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kondisi <span class="req">*</span></label>
                                <select name="kondisi" class="form-control <?php $__errorArgs = ['kondisi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                    <option value="">Pilih Kondisi</option>
                                    <option value="Baik" <?php echo e(old('kondisi') == 'Baik' ? 'selected' : ''); ?>>Baik</option>
                                    <option value="Rusak Ringan" <?php echo e(old('kondisi') == 'Rusak Ringan' ? 'selected' : ''); ?>>
                                        Rusak Ringan</option>
                                    <option value="Rusak Berat" <?php echo e(old('kondisi') == 'Rusak Berat' ? 'selected' : ''); ?>>Rusak
                                        Berat</option>
                                </select>
                                <div class="kondisi-hints">
                                    <span class="kondisi-badge baik">Baik</span>
                                    <span class="kondisi-badge ringan">Rusak Ringan</span>
                                    <span class="kondisi-badge berat">Rusak Berat</span>
                                </div>
                                <?php $__errorArgs = ['kondisi'];
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

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tanggal Pengadaan <span class="opt">(opsional)</span></label>
                                <input type="date" name="tanggal_pengadaan"
                                    class="form-control <?php $__errorArgs = ['tanggal_pengadaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('tanggal_pengadaan')); ?>">
                                <?php $__errorArgs = ['tanggal_pengadaan'];
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

                    <hr class="form-divider">

                    
                    <div class="section-label">Lokasi & Media</div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lokasi <span class="opt">(opsional)</span></label>
                                <input type="text" name="lokasi" class="form-control <?php $__errorArgs = ['lokasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('lokasi')); ?>" placeholder="Contoh: Gedung A Lantai 2">
                                <?php $__errorArgs = ['lokasi'];
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto Fasilitas <span class="req">*</span></label>
                                <div class="file-upload-wrapper">
                                    <label class="file-upload-label <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="fileLabel">
                                        <div class="file-upload-icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <div class="file-upload-text">
                                            <strong id="fileName">Klik untuk upload foto</strong>
                                            <span>JPEG, PNG, JPG, GIF &bull; Maks 2MB</span>
                                        </div>
                                        <input type="file" name="foto" accept="image/*" onchange="updateFileName(this)"
                                            required>
                                    </label>
                                </div>
                                <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <hr class="form-divider">

                    
                    <div class="section-label">Keterangan</div>

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
                            placeholder="Tuliskan deskripsi singkat tentang fasilitas ini..."><?php echo e(old('deskripsi')); ?></textarea>
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

                    <hr class="form-divider">

                    
                    <div class="form-actions">
                        <button type="submit" class="btn-save">
                            <i class="fas fa-save"></i> Simpan Fasilitas
                        </button>

                        <button type="reset" class="btn-reset" onclick="resetFileName()">
                            <i class="fas fa-undo"></i> Reset
                        </button>

                        <a href="<?php echo e(route('admin.data-master.fasilitas.index')); ?>" class="btn-cancel">
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
            if (input.files && input.files[0]) {
                label.textContent = input.files[0].name;
            }
        }

        function resetFileName() {
            const label = document.getElementById('fileName');
            label.textContent = 'Klik untuk upload foto';
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\data-master\fasilitas\create.blade.php ENDPATH**/ ?>