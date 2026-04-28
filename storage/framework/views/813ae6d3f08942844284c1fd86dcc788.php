<?php $__env->startSection('title', 'Detail Anggota Organisasi'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper" style="background: #f4f4f4; min-height: 100vh; padding: 1.5rem;">

        <!-- Header -->
        <div style="margin-bottom: 1.5rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                <div>
                    <h1 style="font-size: 1.5rem; font-weight: 600; color: #222; margin: 0 0 0.25rem 0;">Detail Anggota
                        Organisasi</h1>
                    <p style="font-size: 0.85rem; color: #2d2d2d; margin: 0;">Informasi lengkap anggota struktur organisasi
                    </p>
                </div>
                <div style="display: flex; gap: 0.5rem;">
                    <a href="<?php echo e(route('admin.data-master.struktur-organisasi.edit', $anggota)); ?>"
                        style="display: inline-flex; align-items: center; gap: 0.5rem; background: linear-gradient(135deg, #005F02, #0f4d1c); color: white; padding: 0.5rem 1rem; border-radius: 10px; text-decoration: none; font-size: 0.85rem; font-weight: 500; transition: all 0.2s;">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="<?php echo e(route('admin.data-master.struktur-organisasi.index')); ?>"
                        style="display: inline-flex; align-items: center; gap: 0.5rem; background: #2d2d2d; color: white; padding: 0.5rem 1rem; border-radius: 10px; text-decoration: none; font-size: 0.85rem; font-weight: 500; transition: all 0.2s;">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="row" style="display: flex; flex-wrap: wrap; gap: 1.5rem;">

            <!-- Card Profil (Sidebar Kiri) -->
            <div class="col-lg-4" style="flex: 1; min-width: 280px;">
                <div
                    style="background: white; border-radius: 20px; border: 1px solid #dfe8d8; overflow: hidden; text-align: center; padding: 1.5rem; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">

                    <!-- Foto Profil - HANYA TAMBAHKAN text-align: center -->
                    <div style="margin-bottom: 1rem; text-align: center;">
                        <?php if($anggota->foto): ?>
                            <img src="<?php echo e(asset('storage/' . $anggota->foto)); ?>" alt="<?php echo e($anggota->nama); ?>"
                                style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%; border: 3px solid #dfe8d8; box-shadow: 0 4px 12px rgba(0,0,0,0.08); display: inline-block;">
                        <?php else: ?>
                            <div
                                style="width: 120px; height: 120px; background: linear-gradient(135deg, #dfe8d8, #8cbf73); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; border: 3px solid #dfe8d8;">
                                <i class="fas fa-user" style="color: #005F02; font-size: 2.5rem;"></i>
                            </div>
                        <?php endif; ?>
                    </div>

                    <h3 style="font-size: 1.25rem; font-weight: 600; color: #222; margin: 0 0 0.25rem 0;">
                        <?php echo e($anggota->nama); ?></h3>
                    <p style="color: #2d2d2d; font-size: 0.85rem; margin-bottom: 1rem;"><?php echo e($anggota->jabatan); ?></p>

                    <!-- Badge Divisi & Status -->
                    <div style="display: flex; justify-content: center; gap: 0.5rem; margin-bottom: 1.5rem;">
                        <span style="display: inline-block; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.7rem; font-weight: 600;
                            <?php if($anggota->divisi == 'pengurus'): ?> background: #eef3ec; color: #005F02;
                            <?php elseif($anggota->divisi == 'pengawas'): ?> background: #dfe8d8; color: #0d4f14;
                            <?php else: ?> background: #8cbf73; color: #ffffff; <?php endif; ?>">
                            <?php echo e(ucfirst($anggota->divisi)); ?>

                        </span>
                        <span style="display: inline-block; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.7rem; font-weight: 600;
                            <?php if($anggota->status == 'aktif'): ?> background: #eef3ec; color: #005F02;
                            <?php else: ?> background: #dfe8d8; color: #2d2d2d; <?php endif; ?>">
                            <?php echo e($anggota->status == 'aktif' ? 'Aktif' : 'Nonaktif'); ?>

                        </span>
                    </div>

                    <!-- Kontak -->
                    <?php if($anggota->telepon || $anggota->email): ?>
                        <hr style="border-color: #dfe8d8; margin: 1rem 0;">
                        <div style="text-align: left;">
                            <?php if($anggota->telepon): ?>
                                <p
                                    style="margin-bottom: 0.5rem; font-size: 0.85rem; display: flex; align-items: center; gap: 0.5rem;">
                                    <i class="fas fa-phone" style="color: #005F02; width: 20px;"></i>
                                    <span style="color: #333;"><?php echo e($anggota->telepon); ?></span>
                                </p>
                            <?php endif; ?>
                            <?php if($anggota->email): ?>
                                <p style="margin-bottom: 0; font-size: 0.85rem; display: flex; align-items: center; gap: 0.5rem;">
                                    <i class="fas fa-envelope" style="color: #005F02; width: 20px;"></i>
                                    <span style="color: #333;"><?php echo e($anggota->email); ?></span>
                                </p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Detail Info (Sidebar Kanan) -->
            <div class="col-lg-7" style="flex: 2; min-width: 300px;">

                <!-- Informasi Detail Card -->
                <div
                    style="background: white; border-radius: 20px; border: 1px solid #dfe8d8; overflow: hidden; margin-bottom: 1.5rem; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">
                    <div style="padding: 1rem 1.5rem; border-bottom: 1px solid #dfe8d8; background: #eef3ec;">
                        <h4 style="font-size: 0.9rem; font-weight: 600; color: #222; margin: 0;">
                            <i class="fas fa-info-circle" style="color: #005F02; margin-right: 0.5rem;"></i>
                            Informasi Detail
                        </h4>
                    </div>
                    <div style="padding: 1.5rem;">
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #2d2d2d; margin: 0 0 0.25rem 0;">Nama
                                    Lengkap</p>
                                <p style="font-size: 0.9rem; font-weight: 500; color: #222; margin: 0;">
                                    <?php echo e($anggota->nama); ?></p>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #2d2d2d; margin: 0 0 0.25rem 0;">
                                    Jabatan</p>
                                <p style="font-size: 0.9rem; font-weight: 500; color: #222; margin: 0;">
                                    <?php echo e($anggota->jabatan); ?></p>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #2d2d2d; margin: 0 0 0.25rem 0;">
                                    Divisi</p>
                                <span style="display: inline-block; padding: 0.2rem 0.6rem; border-radius: 20px; font-size: 0.7rem; font-weight: 500;
                                    <?php if($anggota->divisi == 'pengurus'): ?> background: #eef3ec; color: #005F02;
                                    <?php elseif($anggota->divisi == 'pengawas'): ?> background: #dfe8d8; color: #0d4f14;
                                    <?php else: ?> background: #8cbf73; color: #ffffff; <?php endif; ?>">
                                    <?php echo e(ucfirst($anggota->divisi)); ?>

                                </span>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #2d2d2d; margin: 0 0 0.25rem 0;">
                                    Status</p>
                                <span style="display: inline-block; padding: 0.2rem 0.6rem; border-radius: 20px; font-size: 0.7rem; font-weight: 500;
                                    <?php if($anggota->status == 'aktif'): ?> background: #eef3ec; color: #005F02;
                                    <?php else: ?> background: #dfe8d8; color: #2d2d2d; <?php endif; ?>">
                                    <?php echo e($anggota->status == 'aktif' ? 'Aktif' : 'Nonaktif'); ?>

                                </span>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #2d2d2d; margin: 0 0 0.25rem 0;">
                                    Urutan Tampil</p>
                                <p style="font-size: 0.9rem; font-weight: 500; color: #222; margin: 0;">
                                    <?php echo e($anggota->urutan ?? 0); ?></p>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #2d2d2d; margin: 0 0 0.25rem 0;">
                                    Telepon</p>
                                <p style="font-size: 0.9rem; font-weight: 500; color: #222; margin: 0;">
                                    <?php echo e($anggota->telepon ?? '-'); ?></p>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #2d2d2d; margin: 0 0 0.25rem 0;">Email
                                </p>
                                <p style="font-size: 0.9rem; font-weight: 500; color: #222; margin: 0;">
                                    <?php echo e($anggota->email ?? '-'); ?></p>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #2d2d2d; margin: 0 0 0.25rem 0;">
                                    Ditambahkan</p>
                                <p style="font-size: 0.85rem; color: #333; margin: 0;">
                                    <?php echo e($anggota->created_at->format('d M Y, H:i')); ?></p>
                            </div>
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #2d2d2d; margin: 0 0 0.25rem 0;">
                                    Diperbarui</p>
                                <p style="font-size: 0.85rem; color: #333; margin: 0;">
                                    <?php echo e($anggota->updated_at->format('d M Y, H:i')); ?></p>
                            </div>
                        </div>

                        <?php if($anggota->deskripsi): ?>
                            <hr style="border-color: #dfe8d8; margin: 1rem 0;">
                            <div>
                                <p style="font-size: 0.7rem; font-weight: 500; color: #2d2d2d; margin: 0 0 0.25rem 0;">Deskripsi
                                </p>
                                <p style="font-size: 0.85rem; color: #333; margin: 0; line-height: 1.5;">
                                    <?php echo e($anggota->deskripsi); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Aksi Hapus -->
                <div style="background: white; border-radius: 20px; border: 1px solid #dfe8d8; overflow: hidden; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">
                    <div
                        style="padding: 1rem 1.5rem; display: flex; justify-content: flex-end; gap: 0.75rem; flex-wrap: wrap;">
                        <form action="<?php echo e(route('admin.data-master.struktur-organisasi.destroy', $anggota)); ?>" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus anggota <?php echo e($anggota->nama); ?>?')"
                            style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit"
                                style="display: inline-flex; align-items: center; gap: 0.5rem; background: #dc2626; color: white; padding: 0.5rem 1rem; border-radius: 10px; border: none; cursor: pointer; font-size: 0.85rem; font-weight: 500; transition: all 0.2s;"
                                onmouseover="this.style.background='#b91c1c'" onmouseout="this.style.background='#dc2626'">
                                <i class="fas fa-trash"></i> Hapus Anggota
                            </button>
                        </form>
                        <a href="<?php echo e(route('admin.data-master.struktur-organisasi.edit', $anggota)); ?>"
                            style="display: inline-flex; align-items: center; gap: 0.5rem; background: linear-gradient(135deg, #005F02, #0f4d1c); color: white; padding: 0.5rem 1rem; border-radius: 10px; text-decoration: none; font-size: 0.85rem; font-weight: 500; transition: all 0.2s;">
                            <i class="fas fa-edit"></i> Edit Anggota
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        @media (max-width: 768px) {
            .page-wrapper {
                padding: 1rem !important;
            }

            .row {
                flex-direction: column;
            }

            .col-lg-4,
            .col-lg-7 {
                width: 100%;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\data-master\struktur-organisasi\show.blade.php ENDPATH**/ ?>