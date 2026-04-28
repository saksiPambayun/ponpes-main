<?php $__env->startSection('title', 'Profil Yayasan'); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-wrapper" style="background: #f4f4f4; min-height: 100vh; padding: 2rem;">
        
        <div class="page-header"
            style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <div class="header-left" style="display: flex; align-items: center; gap: 1rem;">
                <div class="header-icon"
                    style="width: 48px; height: 48px; background: linear-gradient(135deg, #005F02, #0f4d1c); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-building" style="color: #fff; font-size: 1.2rem;"></i>
                </div>
                <div>
                    <h1 class="page-title" style="font-size: 1.5rem; font-weight: 700; color: #222; margin: 0;">Profil
                        Yayasan</h1>
                    <nav class="breadcrumb-nav"
                        style="display: flex; align-items: center; gap: 6px; font-size: 0.8rem; color: #64748b; margin-top: 4px;">
                        <a href="<?php echo e(url('/admin/dashboard')); ?>" class="breadcrumb-link"
                            style="color: #64748b; text-decoration: none;">Dashboard</a>
                        <i class="fas fa-chevron-right breadcrumb-sep" style="font-size: 0.6rem;"></i>
                        <span class="breadcrumb-current" style="color: #005F02; font-weight: 600;">Profil Yayasan</span>
                    </nav>
                </div>
            </div>
    <a href="<?php echo e(route('admin.data-master.profil-yayasan.edit')); ?>" class="btn-smooth">
            <i class="fas fa-pencil-alt"></i> Edit Profil
        </a>
        </div>

        
        <?php if(session('success')): ?>
            <div class="alert-success-box"
                style="display: flex; align-items: center; gap: 10px; background: #eef3ec; border-left: 4px solid #005F02; border-radius: 10px; padding: 12px 16px; margin-bottom: 20px;">
                <i class="fas fa-check-circle" style="color: #005F02;"></i>
                <span style="color: #0d4f14;"><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?>

        <div class="content-grid" style="display: grid; grid-template-columns: 300px 1fr; gap: 24px; align-items: start;">
            
            <div class="sidebar-col">
            <div class="section-card smooth-card"
                    style="background: #ffffff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.1); overflow: hidden;">
                    <div class="section-card-header"
                        style="background: linear-gradient(135deg, #005F02, #0f4d1c); padding: 1rem 1.5rem;">
                        <div class="section-card-title" style="display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-image" style="color: #fff;"></i>
                            <span style="color: #fff; font-weight: 600;">Logo Yayasan</span>
                        </div>
                    </div>
                    <div class="section-card-body" style="padding: 1.5rem; text-align: center;">
                        <?php if($profil->logo): ?>
                            <img src="<?php echo e(asset('storage/' . $profil->logo)); ?>" alt="Logo Yayasan"
                                style="max-width: 100%; max-height: 150px; object-fit: contain;">
                        <?php else: ?>
                            <div style="padding: 2rem; background: #eef3ec; border-radius: 12px; text-align: center;">
                                <i class="fas fa-building" style="font-size: 3rem; color: #8cbf73;"></i>
                                <p style="color: #2d2d2d; margin-top: 0.5rem;">Belum ada logo</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            
            <div class="main-col" style="display: flex; flex-direction: column; gap: 20px;">
                
            <div class="section-card smooth-card"
                    style="background: #ffffff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.1); overflow: hidden;">
                    <div class="section-card-header"
                        style="background: linear-gradient(135deg, #005F02, #0f4d1c); padding: 1rem 1.5rem;">
                        <div class="section-card-title" style="display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-id-card" style="color: #fff;"></i>
                            <span style="color: #fff; font-weight: 600;">Identitas Yayasan</span>
                        </div>
                    </div>
                    <div class="section-card-body" style="padding: 1.5rem;">
                        <div style="display: grid; gap: 0.75rem;">
                            <div style="display: flex; padding: 0.5rem 0; border-bottom: 1px solid #dfe8d8;">
                                <div style="width: 140px; font-size: 0.82rem; font-weight: 600; color: #2d2d2d;">Nama
                                    Yayasan</div>
                                <div style="flex: 1; font-size: 0.87rem; color: #333;"><?php echo e($profil->nama_yayasan ?? '-'); ?>

                                </div>
                            </div>
                            <div style="display: flex; padding: 0.5rem 0; border-bottom: 1px solid #dfe8d8;">
                                <div style="width: 140px; font-size: 0.82rem; font-weight: 600; color: #2d2d2d;">Tahun
                                    Berdiri</div>
                                <div style="flex: 1; font-size: 0.87rem; color: #333;">
                                    <?php echo e($profil->tahun_berdiri ?? '-'); ?></div>
                            </div>
                            <div style="display: flex; padding: 0.5rem 0;">
                                <div style="width: 140px; font-size: 0.82rem; font-weight: 600; color: #2d2d2d;">Tentang
                                    Kami</div>
                                <div style="flex: 1; font-size: 0.87rem; color: #333; line-height: 1.6;">
                                    <?php echo e($profil->deskripsi ?? '-'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                
            <div class="section-card smooth-card"
                    style="background: #ffffff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.1); overflow: hidden;">
                    <div class="section-card-header"
                        style="background: linear-gradient(135deg, #005F02, #0f4d1c); padding: 1rem 1.5rem;">
                        <div class="section-card-title" style="display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-bullseye" style="color: #fff;"></i>
                            <span style="color: #fff; font-weight: 600;">Visi & Misi</span>
                        </div>
                    </div>
                    <div class="section-card-body" style="padding: 1.5rem;">
                        <div style="margin-bottom: 1.5rem;">
                            <div
                                style="display: inline-block; background: #eef3ec; color: #005F02; font-size: 0.75rem; font-weight: 700; padding: 4px 12px; border-radius: 20px; margin-bottom: 10px;">
                                VISI</div>
                            <p style="font-size: 0.87rem; color: #333; line-height: 1.6; margin: 0;">
                                <?php echo e($profil->visi ?? '-'); ?></p>
                        </div>
                        <div>
                            <div
                                style="display: inline-block; background: #eef3ec; color: #005F02; font-size: 0.75rem; font-weight: 700; padding: 4px 12px; border-radius: 20px; margin-bottom: 10px;">
                                MISI</div>
                            <p
                                style="font-size: 0.87rem; color: #333; line-height: 1.6; margin: 0; white-space: pre-line;">
                                <?php echo e($profil->misi ?? '-'); ?></p>
                        </div>
                    </div>
                </div>

                
            <div class="section-card smooth-card"
                    style="background: #ffffff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.1); overflow: hidden;">
                    <div class="section-card-header"
                        style="background: linear-gradient(135deg, #005F02, #0f4d1c); padding: 1rem 1.5rem;">
                        <div class="section-card-title" style="display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-map-marker-alt" style="color: #fff;"></i>
                            <span style="color: #fff; font-weight: 600;">Kontak & Alamat</span>
                        </div>
                    </div>
                    <div class="section-card-body" style="padding: 1.5rem;">
                        <div style="display: grid; gap: 0.75rem;">
                            <div style="display: flex; padding: 0.5rem 0; border-bottom: 1px solid #dfe8d8;">
                                <div style="width: 100px; font-size: 0.82rem; font-weight: 600; color: #2d2d2d;">Alamat
                                </div>
                                <div style="flex: 1; font-size: 0.87rem; color: #333;">
                                    <?php echo e($profil->alamat ?? '-'); ?>

                                    <?php if($profil->kota || $profil->provinsi): ?>
                                        <br><span
                                            style="color: #2d2d2d;"><?php echo e(implode(', ', array_filter([$profil->kota, $profil->provinsi, $profil->kode_pos]))); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div style="display: flex; padding: 0.5rem 0; border-bottom: 1px solid #dfe8d8;">
                                <div style="width: 100px; font-size: 0.82rem; font-weight: 600; color: #2d2d2d;">Telepon
                                </div>
                                <div style="flex: 1; font-size: 0.87rem; color: #333;"><?php echo e($profil->telepon ?? '-'); ?>

                                </div>
                            </div>
                            <div style="display: flex; padding: 0.5rem 0; border-bottom: 1px solid #dfe8d8;">
                                <div style="width: 100px; font-size: 0.82rem; font-weight: 600; color: #2d2d2d;">Email</div>
                                <div style="flex: 1; font-size: 0.87rem; color: #333;"><?php echo e($profil->email ?? '-'); ?></div>
                            </div>
                            <div style="display: flex; padding: 0.5rem 0;">
                                <div style="width: 100px; font-size: 0.82rem; font-weight: 600; color: #2d2d2d;">Website
                                </div>
                                <div style="flex: 1; font-size: 0.87rem; color: #333;"><?php echo e($profil->website ?? '-'); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            <div class="section-card smooth-card"
                    style="background: #ffffff; border-radius: 20px; box-shadow: 0 2px 20px rgba(0,0,0,0.1); overflow: hidden;">
                    <div class="section-card-header"
                        style="background: linear-gradient(135deg, #005F02, #0f4d1c); padding: 1rem 1.5rem;">
                        <div class="section-card-title" style="display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-share-alt" style="color: #fff;"></i>
                            <span style="color: #fff; font-weight: 600;">Media Sosial</span>
                        </div>
                    </div>
                    <div class="section-card-body" style="padding: 1.5rem;">
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem;">
                            <div>
                                <div style="font-size: 0.75rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.25rem;">
                                    <i class="fab fa-instagram" style="color: #e1306c;"></i> Instagram</div>
                                <div style="font-size: 0.85rem; color: #333;">
                                    <?php if($profil->instagram): ?>
                                        <a href="https://instagram.com/<?php echo e(ltrim($profil->instagram, '@')); ?>" target="_blank"
                                            style="color: #005F02; text-decoration: none;">@
                                            <?php echo e(ltrim($profil->instagram, '@')); ?></a>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div>
                                <div style="font-size: 0.75rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.25rem;">
                                    <i class="fab fa-facebook" style="color: #1877f2;"></i> Facebook</div>
                                <div style="font-size: 0.85rem; color: #333;"><?php echo e($profil->facebook ?? '-'); ?></div>
                            </div>
                            <div>
                                <div style="font-size: 0.75rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.25rem;">
                                    <i class="fab fa-youtube" style="color: #ff0000;"></i> YouTube</div>
                                <div style="font-size: 0.85rem; color: #333;"><?php echo e($profil->youtube ?? '-'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<style>
    /* ================= CARD SMOOTH ================= */
    .smooth-card {
        transition: all 0.3s ease;
    }

    .smooth-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
    }

    /* ================= HEADER ICON ================= */
    .header-icon {
        transition: all 0.3s ease;
    }

    .header-icon:hover {
        transform: scale(1.05) rotate(2deg);
    }

    /* ================= BUTTON SMOOTH ================= */
    .btn-smooth {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #005F02, #0f4d1c);
        color: #fff;
        border-radius: 10px;
        padding: 10px 20px;
        text-decoration: none;
        transition: all 0.25s ease;
    }

    .btn-smooth:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
    }

    /* ================= IMAGE LOGO ================= */
    .section-card-body img {
        transition: all 0.3s ease;
    }

    .section-card-body img:hover {
        transform: scale(1.05);
    }

    /* ================= LIST ITEM (IDENTITAS, DLL) ================= */
    .section-card-body div[style*="display: flex"] {
        transition: all 0.2s ease;
    }

    .section-card-body div[style*="display: flex"]:hover {
        background: #f8faf8;
        border-radius: 6px;
        padding-left: 5px;
    }

    /* ================= SOCIAL LINK ================= */
    .section-card-body a {
        transition: all 0.2s ease;
    }

    .section-card-body a:hover {
        color: #0f4d1c;
        text-decoration: underline;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .content-grid {
            grid-template-columns: 1fr !important;
        }
    }
</style>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/admin/data-master/profil-yayasan/index.blade.php ENDPATH**/ ?>