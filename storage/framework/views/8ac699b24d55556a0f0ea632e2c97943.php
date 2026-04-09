<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="page-wrapper">

    
    <div class="page-header">
        <div class="header-left">
            <div class="header-icon">
                <i class="fas fa-building"></i>
            </div>
            <div>
                <h1 class="page-title">Edit Profil Yayasan</h1>
                <nav class="breadcrumb-nav">
                    <a href="<?php echo e(url('/admin/dashboard')); ?>" class="breadcrumb-link">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <i class="fas fa-chevron-right breadcrumb-sep"></i>
                    <a href="<?php echo e(route('admin.profil-yayasan.index')); ?>" class="breadcrumb-link">Profil Yayasan</a>
                    <i class="fas fa-chevron-right breadcrumb-sep"></i>
                    <span class="breadcrumb-current">Edit</span>
                </nav>
            </div>
        </div>
        <a href="<?php echo e(route('admin.profil-yayasan.index')); ?>" class="btn-secondary-action">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    
    <?php if($errors->any()): ?>
    <div class="alert-error-box">
        <div class="alert-error-icon"><i class="fas fa-exclamation-circle"></i></div>
        <div>
            <p class="alert-error-title">Terdapat beberapa kesalahan:</p>
            <ul class="alert-error-list">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.profil-yayasan.update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-layout">

            
            <div class="main-col">

                
                <div class="section-card">
                    <div class="section-card-header">
                        <div class="section-card-title">
                            <span class="title-icon" style="background:#eff6ff; color:#3b82f6;">
                                <i class="fas fa-id-card"></i>
                            </span>
                            Identitas Yayasan
                        </div>
                    </div>
                    <div class="section-card-body">
                        <div class="field-grid">
                            <div class="field-item col-8">
                                <label class="field-label">
                                    Nama Yayasan <span class="required">*</span>
                                </label>
                                <input type="text" name="nama_yayasan"
                                       class="form-input <?php $__errorArgs = ['nama_yayasan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(old('nama_yayasan', $profil->nama_yayasan)); ?>"
                                       placeholder="Contoh: Yayasan Peduli Bangsa">
                                <?php $__errorArgs = ['nama_yayasan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="field-item col-4">
                                <label class="field-label">Singkatan</label>
                                <input type="text" name="singkatan"
                                       class="form-input <?php $__errorArgs = ['singkatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(old('singkatan', $profil->singkatan)); ?>"
                                       placeholder="Contoh: YPB">
                                <?php $__errorArgs = ['singkatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="field-item col-4">
                                <label class="field-label">Tahun Berdiri</label>
                                <input type="number" name="tahun_berdiri"
                                       class="form-input <?php $__errorArgs = ['tahun_berdiri'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(old('tahun_berdiri', $profil->tahun_berdiri)); ?>"
                                       placeholder="Contoh: 2010"
                                       min="1900" max="<?php echo e(date('Y')); ?>">
                                <?php $__errorArgs = ['tahun_berdiri'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="field-item col-12">
                                <label class="field-label">Deskripsi Singkat</label>
                                <textarea name="deskripsi" rows="3"
                                          class="form-input form-textarea <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                          placeholder="Deskripsi singkat tentang yayasan..."><?php echo e(old('deskripsi', $profil->deskripsi)); ?></textarea>
                                <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="section-card">
                    <div class="section-card-header">
                        <div class="section-card-title">
                            <span class="title-icon" style="background:#f0fdf4; color:#10b981;">
                                <i class="fas fa-bullseye"></i>
                            </span>
                            Visi & Misi
                        </div>
                    </div>
                    <div class="section-card-body">
                        <div class="field-grid">
                            <div class="field-item col-12">
                                <label class="field-label">Visi</label>
                                <textarea name="visi" rows="3"
                                          class="form-input form-textarea <?php $__errorArgs = ['visi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                          placeholder="Visi yayasan..."><?php echo e(old('visi', $profil->visi)); ?></textarea>
                                <?php $__errorArgs = ['visi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="field-item col-12">
                                <label class="field-label">
                                    Misi
                                    <span class="field-hint">Bisa ditulis per baris untuk setiap poin misi</span>
                                </label>
                                <textarea name="misi" rows="5"
                                          class="form-input form-textarea <?php $__errorArgs = ['misi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                          placeholder="Misi yayasan (bisa ditulis per baris)..."><?php echo e(old('misi', $profil->misi)); ?></textarea>
                                <?php $__errorArgs = ['misi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="section-card">
                    <div class="section-card-header">
                        <div class="section-card-title">
                            <span class="title-icon" style="background:#fff7ed; color:#f97316;">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            Kontak & Alamat
                        </div>
                    </div>
                    <div class="section-card-body">
                        <div class="field-grid">
                            <div class="field-item col-12">
                                <label class="field-label">Alamat Lengkap</label>
                                <input type="text" name="alamat"
                                       class="form-input <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(old('alamat', $profil->alamat)); ?>"
                                       placeholder="Jl. Contoh No. 1, Kelurahan, Kecamatan">
                                <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="field-item col-4">
                                <label class="field-label">Kota</label>
                                <input type="text" name="kota"
                                       class="form-input <?php $__errorArgs = ['kota'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(old('kota', $profil->kota)); ?>"
                                       placeholder="Contoh: Surabaya">
                                <?php $__errorArgs = ['kota'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="field-item col-4">
                                <label class="field-label">Provinsi</label>
                                <input type="text" name="provinsi"
                                       class="form-input <?php $__errorArgs = ['provinsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(old('provinsi', $profil->provinsi)); ?>"
                                       placeholder="Contoh: Jawa Timur">
                                <?php $__errorArgs = ['provinsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="field-item col-4">
                                <label class="field-label">Kode Pos</label>
                                <input type="text" name="kode_pos"
                                       class="form-input <?php $__errorArgs = ['kode_pos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(old('kode_pos', $profil->kode_pos)); ?>"
                                       placeholder="Contoh: 60111">
                                <?php $__errorArgs = ['kode_pos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="field-item col-4">
                                <label class="field-label">Telepon</label>
                                <div class="input-with-prefix">
                                    <span class="input-prefix"><i class="fas fa-phone"></i></span>
                                    <input type="text" name="telepon"
                                           class="form-input has-prefix <?php $__errorArgs = ['telepon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           value="<?php echo e(old('telepon', $profil->telepon)); ?>"
                                           placeholder="031-12345678">
                                </div>
                                <?php $__errorArgs = ['telepon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="field-item col-4">
                                <label class="field-label">Email</label>
                                <div class="input-with-prefix">
                                    <span class="input-prefix"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email"
                                           class="form-input has-prefix <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           value="<?php echo e(old('email', $profil->email)); ?>"
                                           placeholder="email@yayasan.org">
                                </div>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="field-item col-4">
                                <label class="field-label">Website</label>
                                <div class="input-with-prefix">
                                    <span class="input-prefix"><i class="fas fa-globe"></i></span>
                                    <input type="url" name="website"
                                           class="form-input has-prefix <?php $__errorArgs = ['website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           value="<?php echo e(old('website', $profil->website)); ?>"
                                           placeholder="https://www.yayasan.org">
                                </div>
                                <?php $__errorArgs = ['website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="section-card">
                    <div class="section-card-header">
                        <div class="section-card-title">
                            <span class="title-icon" style="background:#fdf4ff; color:#a855f7;">
                                <i class="fas fa-share-alt"></i>
                            </span>
                            Media Sosial
                        </div>
                    </div>
                    <div class="section-card-body">
                        <div class="field-grid">
                            <div class="field-item col-4">
                                <label class="field-label">
                                    <i class="fab fa-instagram" style="color:#e1306c;"></i> Instagram
                                </label>
                                <div class="input-with-prefix">
                                    <span class="input-prefix">@</span>
                                    <input type="text" name="instagram"
                                           class="form-input has-prefix <?php $__errorArgs = ['instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           value="<?php echo e(old('instagram', $profil->instagram)); ?>"
                                           placeholder="username">
                                </div>
                                <?php $__errorArgs = ['instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="field-item col-4">
                                <label class="field-label">
                                    <i class="fab fa-facebook" style="color:#1877f2;"></i> Facebook
                                </label>
                                <input type="text" name="facebook"
                                       class="form-input <?php $__errorArgs = ['facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(old('facebook', $profil->facebook)); ?>"
                                       placeholder="Nama halaman atau URL">
                                <?php $__errorArgs = ['facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="field-item col-4">
                                <label class="field-label">
                                    <i class="fab fa-youtube" style="color:#ff0000;"></i> YouTube
                                </label>
                                <input type="text" name="youtube"
                                       class="form-input <?php $__errorArgs = ['youtube'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(old('youtube', $profil->youtube)); ?>"
                                       placeholder="Nama channel atau URL">
                                <?php $__errorArgs = ['youtube'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="field-error"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                </div>

                        </div>
                    </div>
                </div>

            </div>

            
            <div class="sidebar-col">

                
                <div class="section-card">
                    <div class="section-card-header">
                        <div class="section-card-title">
                            <span class="title-icon" style="background:#eff6ff; color:#3b82f6;">
                                <i class="fas fa-image"></i>
                            </span>
                            Logo Yayasan
                        </div>
                    </div>
                    <div class="section-card-body">
                        <div id="logo-preview-wrap" class="preview-wrap <?php echo e($profil->logo ? '' : 'hidden'); ?>">
                            <img id="logo-preview"
                                 src="<?php echo e($profil->logo ? asset('storage/' . $profil->logo) : '#'); ?>"
                                 alt="Logo" class="preview-img logo-preview-img">
                        </div>
                        <div id="logo-placeholder" class="upload-placeholder <?php echo e($profil->logo ? 'hidden' : ''); ?>">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Pilih file untuk pratinjau</span>
                        </div>
                        <input type="file" name="logo" id="logo-input"
                               class="file-input <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               accept="image/*"
                               onchange="previewImg(this,'logo-preview','logo-preview-wrap','logo-placeholder')">
                        <label for="logo-input" class="file-input-label">
                            <i class="fas fa-folder-open"></i> Pilih File Logo
                        </label>
                        <p class="upload-hint">JPG, PNG, WEBP, SVG · Maks 2MB</p>
                        <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="field-error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php if($profil->logo): ?>
                        <div class="delete-check">
                            <input type="checkbox" name="hapus_logo" value="1" id="hapusLogo" class="check-input">
                            <label for="hapusLogo" class="check-label">
                                <i class="fas fa-trash-alt"></i> Hapus logo saat ini
                            </label>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="section-card">
                    <div class="section-card-header">
                        <div class="section-card-title">
                            <span class="title-icon" style="background:#fff7ed; color:#f97316;">
                                <i class="fas fa-photo-video"></i>
                            </span>
                            Foto Gedung
                        </div>
                    </div>
                    <div class="section-card-body">
                        <div id="gedung-preview-wrap" class="preview-wrap <?php echo e($profil->foto_gedung ? '' : 'hidden'); ?>">
                            <img id="gedung-preview"
                                 src="<?php echo e($profil->foto_gedung ? asset('storage/' . $profil->foto_gedung) : '#'); ?>"
                                 alt="Foto Gedung" class="preview-img gedung-preview-img">
                        </div>
                        <div id="gedung-placeholder" class="upload-placeholder <?php echo e($profil->foto_gedung ? 'hidden' : ''); ?>">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Pilih file untuk pratinjau</span>
                        </div>
                        <input type="file" name="foto_gedung" id="gedung-input"
                               class="file-input <?php $__errorArgs = ['foto_gedung'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               accept="image/*"
                               onchange="previewImg(this,'gedung-preview','gedung-preview-wrap','gedung-placeholder')">
                        <label for="gedung-input" class="file-input-label">
                            <i class="fas fa-folder-open"></i> Pilih Foto Gedung
                        </label>
                        <p class="upload-hint">JPG, PNG, WEBP · Maks 3MB</p>
                        <?php $__errorArgs = ['foto_gedung'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="field-error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php if($profil->foto_gedung): ?>
                        <div class="delete-check">
                            <input type="checkbox" name="hapus_foto_gedung" value="1" id="hapusGedung" class="check-input">
                            <label for="hapusGedung" class="check-label">
                                <i class="fas fa-trash-alt"></i> Hapus foto gedung saat ini
                            </label>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="section-card">
                    <div class="section-card-body action-card-body">
                        <button type="submit" class="btn-save">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                        <a href="<?php echo e(route('admin.profil-yayasan.index')); ?>" class="btn-cancel">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </form>

</div>

<style>
/* ===== BASE ===== */
*, *::before, *::after { box-sizing: border-box; }

.page-wrapper {
    padding: 28px 32px;
    background: #f8fafc;
    min-height: 100vh;
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
}

/* ===== HEADER ===== */
.page-header {
    display: flex; align-items: center;
    justify-content: space-between;
    margin-bottom: 24px; flex-wrap: wrap; gap: 16px;
}
.header-left { display: flex; align-items: center; gap: 16px; }
.header-icon {
    width: 48px; height: 48px; background: #1e3a5f;
    border-radius: 12px; display: flex; align-items: center;
    justify-content: center; color: #fff; font-size: 1.2rem; flex-shrink: 0;
}
.page-title { font-size: 1.5rem; font-weight: 700; color: #0f172a; margin: 0 0 4px; line-height: 1.2; }
.breadcrumb-nav { display: flex; align-items: center; gap: 6px; font-size: 0.8rem; color: #64748b; }
.breadcrumb-link { color: #64748b; text-decoration: none; }
.breadcrumb-link:hover { color: #3b82f6; }
.breadcrumb-sep { font-size: 0.6rem; color: #cbd5e1; }
.breadcrumb-current { color: #1e3a5f; font-weight: 600; }

.btn-secondary-action {
    display: inline-flex; align-items: center; gap: 8px;
    background: #fff; color: #475569; border: 1px solid #e2e8f0;
    border-radius: 10px; padding: 10px 18px; font-size: 0.875rem;
    font-weight: 600; text-decoration: none; cursor: pointer; transition: background 0.2s;
}
.btn-secondary-action:hover { background: #f1f5f9; color: #334155; }

/* ===== ALERT ERROR ===== */
.alert-error-box {
    display: flex; gap: 12px; align-items: flex-start;
    background: #fff5f5; border: 1px solid #fecaca;
    border-left: 4px solid #ef4444; border-radius: 10px;
    padding: 14px 16px; margin-bottom: 20px;
}
.alert-error-icon { color: #ef4444; font-size: 1rem; padding-top: 2px; flex-shrink: 0; }
.alert-error-title { font-size: 0.875rem; font-weight: 700; color: #991b1b; margin: 0 0 6px; }
.alert-error-list {
    margin: 0; padding-left: 18px;
    font-size: 0.82rem; color: #b91c1c; line-height: 1.7;
}

/* ===== LAYOUT ===== */
.form-layout {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 24px;
    align-items: start;
}
@media (max-width: 960px) { .form-layout { grid-template-columns: 1fr; } }
.main-col    { display: flex; flex-direction: column; gap: 20px; }
.sidebar-col { display: flex; flex-direction: column; gap: 20px; }

/* ===== SECTION CARD ===== */
.section-card {
    background: #fff; border-radius: 14px;
    border: 1px solid #f1f5f9;
    box-shadow: 0 1px 3px rgba(0,0,0,0.06); overflow: hidden;
}
.section-card-header {
    display: flex; align-items: center;
    padding: 16px 20px; border-bottom: 1px solid #f1f5f9;
}
.section-card-title {
    display: flex; align-items: center; gap: 10px;
    font-size: 0.9rem; font-weight: 700; color: #0f172a;
}
.title-icon {
    width: 32px; height: 32px; border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.85rem; flex-shrink: 0;
}
.section-card-body { padding: 20px; }

/* ===== FIELD GRID ===== */
.field-grid {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 16px;
}
.field-item { display: flex; flex-direction: column; gap: 5px; }
.col-4  { grid-column: span 4; }
.col-8  { grid-column: span 8; }
.col-12 { grid-column: span 12; }
@media (max-width: 640px) {
    .col-4, .col-8 { grid-column: span 12; }
}

/* ===== FIELD LABEL ===== */
.field-label {
    font-size: 0.8rem; font-weight: 700; color: #374151;
    display: flex; align-items: center; gap: 6px;
}
.required { color: #ef4444; }
.field-hint {
    font-size: 0.72rem; font-weight: 400; color: #94a3b8;
    margin-left: 4px;
}

/* ===== FORM INPUT ===== */
.form-input {
    width: 100%; padding: 9px 12px;
    border: 1px solid #e2e8f0; border-radius: 8px;
    font-size: 0.875rem; color: #0f172a; background: #fff;
    outline: none; transition: border-color 0.2s, box-shadow 0.2s;
    font-family: inherit;
}
.form-input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
}
.form-input.is-invalid { border-color: #ef4444; }
.form-input.is-invalid:focus { box-shadow: 0 0 0 3px rgba(239,68,68,0.1); }
.form-textarea { resize: vertical; min-height: 80px; }

/* ===== INPUT WITH PREFIX ===== */
.input-with-prefix { position: relative; }
.input-prefix {
    position: absolute; left: 12px; top: 50%;
    transform: translateY(-50%);
    color: #94a3b8; font-size: 0.82rem; pointer-events: none;
}
.form-input.has-prefix { padding-left: 34px; }

/* ===== FIELD ERROR ===== */
.field-error { font-size: 0.78rem; color: #ef4444; font-weight: 500; }

/* ===== FILE UPLOAD ===== */
.file-input { display: none; }

.upload-placeholder {
    border: 2px dashed #e2e8f0; border-radius: 10px;
    padding: 24px 16px; text-align: center;
    color: #94a3b8; margin-bottom: 12px;
    display: flex; flex-direction: column;
    align-items: center; gap: 6px;
    font-size: 0.8rem;
}
.upload-placeholder i { font-size: 1.5rem; }
.upload-placeholder.hidden { display: none; }

.preview-wrap { margin-bottom: 12px; }
.preview-wrap.hidden { display: none; }
.preview-img {
    width: 100%; border-radius: 10px;
    border: 1px solid #e2e8f0; display: block; object-fit: contain;
}
.logo-preview-img  { max-height: 120px; object-fit: contain; background: #f8fafc; padding: 8px; }
.gedung-preview-img{ max-height: 150px; object-fit: cover; }

.file-input-label {
    display: flex; align-items: center; justify-content: center; gap: 7px;
    background: #f1f5f9; color: #475569;
    border: 1px solid #e2e8f0; border-radius: 8px;
    padding: 9px 14px; font-size: 0.82rem; font-weight: 600;
    cursor: pointer; transition: background 0.2s; width: 100%;
    text-align: center;
}
.file-input-label:hover { background: #e2e8f0; color: #1e293b; }

.upload-hint { font-size: 0.72rem; color: #94a3b8; text-align: center; margin: 8px 0 0; }

.delete-check {
    display: flex; align-items: center; gap: 8px;
    margin-top: 12px; padding-top: 12px;
    border-top: 1px solid #f1f5f9;
}
.check-input {
    width: 15px; height: 15px;
    accent-color: #ef4444; cursor: pointer;
}
.check-label {
    font-size: 0.78rem; font-weight: 600; color: #ef4444;
    cursor: pointer; display: flex; align-items: center; gap: 5px;
}

/* ===== ACTION BUTTONS ===== */
.action-card-body {
    display: flex; flex-direction: column; gap: 10px;
}
.btn-save {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    width: 100%; background: #1e3a5f; color: #fff;
    border: none; border-radius: 10px; padding: 12px 20px;
    font-size: 0.9rem; font-weight: 700; cursor: pointer;
    transition: background 0.2s, transform 0.1s; font-family: inherit;
}
.btn-save:hover { background: #1a3252; transform: translateY(-1px); }
.btn-cancel {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    width: 100%; background: #f8fafc; color: #64748b;
    border: 1px solid #e2e8f0; border-radius: 10px; padding: 11px 20px;
    font-size: 0.875rem; font-weight: 600; text-decoration: none;
    transition: background 0.2s; text-align: center;
}
.btn-cancel:hover { background: #f1f5f9; color: #334155; }

@media (max-width: 640px) { .page-wrapper { padding: 20px 16px; } }
</style>

<?php $__env->startPush('scripts'); ?>
<script>
function previewImg(input, previewId, wrapId, placeholderId) {
    const preview     = document.getElementById(previewId);
    const wrap        = document.getElementById(wrapId);
    const placeholder = document.getElementById(placeholderId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            wrap.classList.remove('hidden');
            if (placeholder) placeholder.classList.add('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/admin/data-master/profil-yayasan/edit.blade.php ENDPATH**/ ?>