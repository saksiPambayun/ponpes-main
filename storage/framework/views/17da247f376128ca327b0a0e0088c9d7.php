<?php $__env->startSection('title', 'Tambah Program'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper" style="background: #f4f4f4; min-height: 100vh; padding: 2rem;">
        
        <div class="page-header"
            style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <div class="page-header-left" style="display: flex; align-items: center; gap: 1rem;">
                <div class="page-icon"
                    style="width: 48px; height: 48px; background: linear-gradient(135deg, #005F02, #0f4d1c); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-plus-circle" style="color: #fff; font-size: 1.1rem;"></i>
                </div>
                <div>
                    <h1 style="font-size: 1.35rem; font-weight: 700; color: #222; margin: 0;">Tambah Program</h1>
                    <p style="font-size: 0.8rem; color: #2d2d2d; margin: 0;">Lengkapi form berikut untuk menambah program
                        baru</p>
                </div>
            </div>
            <a href="<?php echo e(route('admin.program.index')); ?>" class="btn-back"
                style="display: inline-flex; align-items: center; gap: 0.45rem; padding: 0.55rem 1.1rem; background: #fff; border: 1.5px solid #dfe8d8; border-radius: 10px; color: #2d2d2d; font-size: 0.82rem; font-weight: 600; text-decoration: none; transition: all 0.2s ease;">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        
        <div class="form-card"
            style="background: #fff; border-radius: 20px; border: 1px solid #dfe8d8; box-shadow: 0 2px 20px rgba(0,0,0,0.06); overflow: hidden;">
            <div class="form-card-header"
                style="background: linear-gradient(135deg, #005F02, #0f4d1c); padding: 1.2rem 1.8rem; display: flex; align-items: center; gap: 0.75rem;">
                <i class="fas fa-clipboard-list" style="color: rgba(255,255,255,0.85);"></i>
                <span style="color: #fff; font-size: 0.95rem; font-weight: 600;">Form Tambah Program</span>
            </div>

            <div class="form-card-body" style="padding: 1.8rem;">
                <form action="<?php echo e(route('admin.program.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="row" style="display: flex; flex-wrap: wrap; gap: 1.5rem;">
                        <div class="col-md-6" style="flex: 1; min-width: 250px;">
                            <div class="form-group" style="margin-bottom: 1.3rem;">
                                <label
                                    style="font-size: 0.82rem; font-weight: 600; color: #2d2d2d; display: block; margin-bottom: 0.4rem;">Nama
                                    Program <span style="color: #dc2626;">*</span></label>
                                <input type="text" name="nama_program" class="form-control"
                                    style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                                    value="<?php echo e(old('nama_program')); ?>" placeholder="Masukkan nama program" required>
                                <?php $__errorArgs = ['nama_program'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"
                                    style="color: #dc2626; font-size: 0.78rem; margin-top: 0.35rem;"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group" style="margin-bottom: 1.3rem;">
                                <label
                                    style="font-size: 0.82rem; font-weight: 600; color: #2d2d2d; display: block; margin-bottom: 0.4rem;">Kategori
                                    <span style="color: #dc2626;">*</span></label>
                                <select name="kategori" class="form-control"
                                    style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                                    required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="pendidikan" <?php echo e(old('kategori') == 'pendidikan' ? 'selected' : ''); ?>>📚
                                        Pendidikan</option>
                                    <option value="sosial" <?php echo e(old('kategori') == 'sosial' ? 'selected' : ''); ?>>❤️ Sosial
                                    </option>
                                    <option value="keagamaan" <?php echo e(old('kategori') == 'keagamaan' ? 'selected' : ''); ?>>🕌
                                        Keagamaan</option>
                                    <option value="kesehatan" <?php echo e(old('kategori') == 'kesehatan' ? 'selected' : ''); ?>>🏥
                                        Kesehatan</option>
                                </select>
                                <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"
                                    style="color: #dc2626; font-size: 0.78rem; margin-top: 0.35rem;"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="col-md-6" style="flex: 1; min-width: 250px;">
                            <div class="form-group" style="margin-bottom: 1.3rem;">
                                <label
                                    style="font-size: 0.82rem; font-weight: 600; color: #2d2d2d; display: block; margin-bottom: 0.4rem;">Tanggal
                                    Mulai</label>
                                <input type="date" name="tanggal_mulai" class="form-control"
                                    style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                                    value="<?php echo e(old('tanggal_mulai')); ?>">
                            </div>

                            <div class="form-group" style="margin-bottom: 1.3rem;">
                                <label
                                    style="font-size: 0.82rem; font-weight: 600; color: #2d2d2d; display: block; margin-bottom: 0.4rem;">Tanggal
                                    Selesai</label>
                                <input type="date" name="tanggal_selesai" class="form-control"
                                    style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                                    value="<?php echo e(old('tanggal_selesai')); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 1.3rem;">
                        <label
                            style="font-size: 0.82rem; font-weight: 600; color: #2d2d2d; display: block; margin-bottom: 0.4rem;">Deskripsi
                            <span style="color: #dc2626;">*</span></label>
                        <textarea name="deskripsi" rows="5" class="form-control"
                            style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; resize: vertical; transition: all 0.2s ease;"
                            placeholder="Jelaskan deskripsi program secara detail..."><?php echo e(old('deskripsi')); ?></textarea>
                        <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"
                        style="color: #dc2626; font-size: 0.78rem; margin-top: 0.35rem;"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-actions"
                        style="display: flex; align-items: center; gap: 0.75rem; padding-top: 1rem; border-top: 1px solid #dfe8d8; margin-top: 1rem;">
                        <button type="submit" class="btn-save"
                            style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.7rem 1.5rem; background: linear-gradient(135deg, #005F02, #0f4d1c); color: #fff; border: none; border-radius: 10px; font-size: 0.87rem; font-weight: 600; cursor: pointer; transition: all 0.2s ease; box-shadow: 0 4px 14px rgba(0, 95, 2, 0.3);">
                            <i class="fas fa-save"></i> Simpan Program
                        </button>
                        <a href="<?php echo e(route('admin.program.index')); ?>" class="btn-cancel"
                            style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.7rem 1.2rem; background: #fef2f2; border: 1.5px solid #fecaca; border-radius: 10px; color: #dc2626; font-size: 0.87rem; font-weight: 600; text-decoration: none; transition: all 0.2s ease;">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .form-control:focus {
            border-color: #005F02 !important;
            outline: none !important;
            box-shadow: 0 0 0 3px rgba(0, 95, 2, 0.12) !important;
            background: #ffffff !important;
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 95, 2, 0.4);
        }

        .btn-cancel:hover {
            background: #fee2e2;
            border-color: #f87171;
            color: #b91c1c;
        }

        .btn-back:hover {
            background: #eef3ec;
            border-color: #8cbf73;
            color: #005F02;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\data-master\program\create.blade.php ENDPATH**/ ?>