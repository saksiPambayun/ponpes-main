<?php $__env->startSection('title', 'Edit Profil Yayasan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper" style="background: #f0f4f8; min-height: 100vh; padding: 2rem;">
        
        <div class="page-header"
            style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <div class="header-left" style="display: flex; align-items: center; gap: 1rem;">
                <div class="header-icon"
                    style="width: 48px; height: 48px; background: linear-gradient(135deg, #4361ee, #7209b7); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-building" style="color: #fff; font-size: 1.2rem;"></i>
                </div>
                <div>
                    <h1 class="page-title" style="font-size: 1.5rem; font-weight: 700; color: #0f172a; margin: 0;">Edit
                        Profil Yayasan</h1>
                    <nav class="breadcrumb-nav"
                        style="display: flex; align-items: center; gap: 6px; font-size: 0.8rem; color: #64748b; margin-top: 4px;">
                        <a href="<?php echo e(url('/admin/dashboard')); ?>" class="breadcrumb-link"
                            style="color: #64748b; text-decoration: none;">Dashboard</a>
                        <i class="fas fa-chevron-right breadcrumb-sep" style="font-size: 0.6rem;"></i>
                        <a href="<?php echo e(route('admin.data-master.profil-yayasan.index')); ?>" class="breadcrumb-link"
                            style="color: #64748b; text-decoration: none;">Profil Yayasan</a>
                        <i class="fas fa-chevron-right breadcrumb-sep" style="font-size: 0.6rem;"></i>
                        <span class="breadcrumb-current" style="color: #1e3a5f; font-weight: 600;">Edit</span>
                    </nav>
                </div>
            </div>
        <a href="<?php echo e(route('admin.data-master.profil-yayasan.index')); ?>" class="btn-secondary-action"
            style="display: inline-flex; align-items: center; gap: 8px; background: #fff; border: 1px solid #e2e8f0; border-radius: 10px; padding: 10px 18px; text-decoration: none; color: #475569;">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        </div>

        
        <?php if($errors->any()): ?>
            <div class="alert-error-box"
                style="display: flex; gap: 12px; background: #fff5f5; border-left: 4px solid #ef4444; border-radius: 10px; padding: 14px 16px; margin-bottom: 20px;">
                <i class="fas fa-exclamation-circle" style="color: #ef4444;"></i>
                <div>
                    <p style="font-weight: 700; color: #991b1b; margin: 0 0 6px;">Terdapat beberapa kesalahan:</p>
                    <ul style="margin: 0; padding-left: 18px; color: #b91c1c;">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.data-master.profil-yayasan.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-layout"
                style="display: grid; grid-template-columns: 1fr 320px; gap: 24px; align-items: start;">
                
                <div class="main-col" style="display: flex; flex-direction: column; gap: 20px;">
                    
                    <div class="section-card"
                        style="background: #fff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.06); overflow: hidden;">
                        <div class="section-card-header"
                            style="background: linear-gradient(135deg, #4361ee, #7209b7); padding: 1rem 1.5rem;">
                            <div class="section-card-title" style="display: flex; align-items: center; gap: 8px;">
                                <i class="fas fa-id-card" style="color: #fff;"></i>
                                <span style="color: #fff; font-weight: 600;">Identitas Yayasan</span>
                            </div>
                        </div>
                        <div class="section-card-body" style="padding: 1.5rem;">
                            <div style="display: flex; flex-direction: column; gap: 1rem;">
                                <div>
                                    <label
                                        style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Nama
                                        Yayasan <span style="color: #e53e3e;">*</span></label>
                                    <input type="text" name="nama_yayasan"
                                        value="<?php echo e(old('nama_yayasan', $profil->nama_yayasan)); ?>"
                                        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc;"
                                        placeholder="Contoh: Yayasan Peduli Bangsa">
                                </div>
                                <div>
                                    <label
                                        style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Tahun
                                        Berdiri</label>
                                    <input type="number" name="tahun_berdiri"
                                        value="<?php echo e(old('tahun_berdiri', $profil->tahun_berdiri)); ?>"
                                        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc;"
                                        placeholder="Contoh: 2010" min="1900" max="<?php echo e(date('Y')); ?>">
                                </div>
                                <div>
                                    <label
                                        style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Tentang
                                        Kami</label>
                                    <textarea name="deskripsi" rows="3"
                                        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc; resize: vertical;"
                                        placeholder="Deskripsi singkat tentang yayasan..."><?php echo e(old('deskripsi', $profil->deskripsi)); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="section-card"
                        style="background: #fff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.06); overflow: hidden;">
                        <div class="section-card-header"
                            style="background: linear-gradient(135deg, #4361ee, #7209b7); padding: 1rem 1.5rem;">
                            <div class="section-card-title" style="display: flex; align-items: center; gap: 8px;">
                                <i class="fas fa-bullseye" style="color: #fff;"></i>
                                <span style="color: #fff; font-weight: 600;">Visi & Misi</span>
                            </div>
                        </div>
                        <div class="section-card-body" style="padding: 1.5rem;">
                            <div style="display: flex; flex-direction: column; gap: 1rem;">
                                <div>
                                    <label
                                        style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Visi</label>
                                    <textarea name="visi" rows="3"
                                        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc; resize: vertical;"
                                        placeholder="Visi yayasan..."><?php echo e(old('visi', $profil->visi)); ?></textarea>
                                </div>
                                <div>
                                    <label
                                        style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Misi</label>
                                    <textarea name="misi" rows="5"
                                        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc; resize: vertical;"
                                        placeholder="Misi yayasan (bisa ditulis per baris)..."><?php echo e(old('misi', $profil->misi)); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="section-card"
                        style="background: #fff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.06); overflow: hidden;">
                        <div class="section-card-header"
                            style="background: linear-gradient(135deg, #4361ee, #7209b7); padding: 1rem 1.5rem;">
                            <div class="section-card-title" style="display: flex; align-items: center; gap: 8px;">
                                <i class="fas fa-map-marker-alt" style="color: #fff;"></i>
                                <span style="color: #fff; font-weight: 600;">Kontak & Alamat</span>
                            </div>
                        </div>
                        <div class="section-card-body" style="padding: 1.5rem;">
                            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;">
                                <div style="grid-column: span 2;">
                                    <label
                                        style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Alamat
                                        Lengkap</label>
                                    <input type="text" name="alamat" value="<?php echo e(old('alamat', $profil->alamat)); ?>"
                                        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc;"
                                        placeholder="Jl. Contoh No. 1, Kelurahan, Kecamatan">
                                </div>
                                <div>
                                    <label
                                        style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Kota</label>
                                    <input type="text" name="kota" value="<?php echo e(old('kota', $profil->kota)); ?>"
                                        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc;"
                                        placeholder="Contoh: Surabaya">
                                </div>
                                <div>
                                    <label
                                        style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Provinsi</label>
                                    <input type="text" name="provinsi" value="<?php echo e(old('provinsi', $profil->provinsi)); ?>"
                                        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc;"
                                        placeholder="Contoh: Jawa Timur">
                                </div>
                                <div>
                                    <label
                                        style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Kode
                                        Pos</label>
                                    <input type="text" name="kode_pos" value="<?php echo e(old('kode_pos', $profil->kode_pos)); ?>"
                                        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc;"
                                        placeholder="Contoh: 60111">
                                </div>
                                <div>
                                    <label
                                        style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Telepon</label>
                                    <input type="text" name="telepon" value="<?php echo e(old('telepon', $profil->telepon)); ?>"
                                        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc;"
                                        placeholder="031-12345678">
                                </div>
                                <div>
                                    <label
                                        style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Email</label>
                                    <input type="email" name="email" value="<?php echo e(old('email', $profil->email)); ?>"
                                        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc;"
                                        placeholder="email@yayasan.org">
                                </div>
                                <div style="grid-column: span 2;">
                                    <label
                                        style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;">Website</label>
                                    <input type="url" name="website" value="<?php echo e(old('website', $profil->website)); ?>"
                                        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc;"
                                        placeholder="https://www.yayasan.org">
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="section-card"
                        style="background: #fff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.06); overflow: hidden;">
                        <div class="section-card-header"
                            style="background: linear-gradient(135deg, #4361ee, #7209b7); padding: 1rem 1.5rem;">
                            <div class="section-card-title" style="display: flex; align-items: center; gap: 8px;">
                                <i class="fas fa-share-alt" style="color: #fff;"></i>
                                <span style="color: #fff; font-weight: 600;">Media Sosial</span>
                            </div>
                        </div>
                        <div class="section-card-body" style="padding: 1.5rem;">
                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem;">
                                <div>
                                    <label
                                        style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;"><i
                                            class="fab fa-instagram"></i> Instagram</label>
                                    <div style="display: flex; align-items: center;">
                                        <span
                                            style="background: #f1f5f9; padding: 0.65rem 0.75rem; border: 1.5px solid #e2e8f0; border-radius: 10px 0 0 10px; border-right: none;">@</span>
                                        <input type="text" name="instagram"
                                            value="<?php echo e(old('instagram', ltrim($profil->instagram, '@'))); ?>"
                                            style="flex: 1; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 0 10px 10px 0; background: #f8fafc;"
                                            placeholder="username">
                                    </div>
                                </div>
                                <div>
                                    <label
                                        style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;"><i
                                            class="fab fa-facebook"></i> Facebook</label>
                                    <input type="text" name="facebook" value="<?php echo e(old('facebook', $profil->facebook)); ?>"
                                        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc;"
                                        placeholder="Nama halaman atau URL">
                                </div>
                                <div>
                                    <label
                                        style="font-size: 0.82rem; font-weight: 600; color: #2d3748; display: block; margin-bottom: 0.4rem;"><i
                                            class="fab fa-youtube"></i> YouTube</label>
                                    <input type="text" name="youtube" value="<?php echo e(old('youtube', $profil->youtube)); ?>"
                                        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px; background: #f8fafc;"
                                        placeholder="Nama channel atau URL">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="sidebar-col" style="display: flex; flex-direction: column; gap: 20px;">
                    
                    <div class="section-card"
                        style="background: #fff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.06); overflow: hidden;">
                        <div class="section-card-header"
                            style="background: linear-gradient(135deg, #4361ee, #7209b7); padding: 1rem 1.5rem;">
                            <div class="section-card-title" style="display: flex; align-items: center; gap: 8px;">
                                <i class="fas fa-image" style="color: #fff;"></i>
                                <span style="color: #fff; font-weight: 600;">Logo Yayasan</span>
                            </div>
                        </div>
                        <div class="section-card-body" style="padding: 1.5rem; text-align: center;">
                            <div id="logoPreviewWrap" style="margin-bottom: 1rem;">
                                <?php if($profil->logo): ?>
                                    <img id="logoPreview" src="<?php echo e(asset('storage/' . $profil->logo)); ?>" alt="Logo"
                                        style="max-width: 100%; max-height: 120px; object-fit: contain;">
                                <?php else: ?>
                                    <div id="logoPlaceholder"
                                        style="padding: 1.5rem; background: #f8fafc; border-radius: 12px; border: 2px dashed #e2e8f0;">
                                        <i class="fas fa-cloud-upload-alt"
                                            style="font-size: 2rem; color: #94a3b8; display: block; margin-bottom: 0.5rem;"></i>
                                        <span style="color: #94a3b8;">Belum ada logo</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <input type="file" name="logo" id="logoInput" style="display: none;" accept="image/*"
                                onchange="previewLogo(this)">
                            <button type="button" onclick="document.getElementById('logoInput').click()"
                                style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.6rem 1rem; background: #f1f5f9; border: 1px solid #e2e8f0; border-radius: 8px; color: #475569; font-size: 0.8rem; font-weight: 600; cursor: pointer;">
                                <i class="fas fa-folder-open"></i> Pilih Logo
                            </button>
                            <p style="font-size: 0.7rem; color: #94a3b8; margin-top: 0.5rem;">JPG, PNG, WEBP, SVG · Maks 2MB
                            </p>
                            <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p style="color: #e53e3e; font-size: 0.75rem; margin-top: 0.5rem;"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    
                    <div class="section-card"
                        style="background: #fff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.06); overflow: hidden;">
                        <div class="section-card-body" style="padding: 1.5rem;">
                            <button type="submit"
                                style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; width: 100%; padding: 0.75rem 1rem; background: linear-gradient(135deg, #4361ee, #7209b7); color: #fff; border: none; border-radius: 10px; font-size: 0.9rem; font-weight: 600; cursor: pointer; margin-bottom: 0.75rem;">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="<?php echo e(route('admin.data-master.profil-yayasan.index')); ?>"
                                style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; width: 100%; padding: 0.75rem 1rem; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; color: #64748b; font-size: 0.9rem; font-weight: 600; text-decoration: none;">
                                <i class="fas fa-times"></i> Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script>
            function previewLogo(input) {
                const previewWrap = document.getElementById('logoPreviewWrap');
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewWrap.innerHTML = '<img id="logoPreview" src="' + e.target.result + '" alt="Logo" style="max-width: 100%; max-height: 120px; object-fit: contain;">';
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/admin/data-master/profil-yayasan/edit.blade.php ENDPATH**/ ?>