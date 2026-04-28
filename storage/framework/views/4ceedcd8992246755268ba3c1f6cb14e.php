<?php $__env->startSection('title', 'Tambah Akta Wakaf'); ?>
<?php $__env->startSection('page-title', 'Tambah Akta Wakaf'); ?>

<?php $__env->startSection('content'); ?>
    <div style="max-width: 80rem; margin: 0 auto;">
        <div
            style="background: #fff; border-radius: 20px; padding: 2rem; box-shadow: 0 2px 20px rgba(0,0,0,0.06); border: 1px solid #dfe8d8;">
            <form action="<?php echo e(route('admin.akta-wakaf.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
                    <div>
                        <label
                            style="display: block; font-size: 0.8rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.5rem;">Nomor
                            Sertifikat</label>
                        <input type="text" name="nomor_sertifikat" value="<?php echo e(old('nomor_sertifikat')); ?>"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                            onfocus="this.style.borderColor='#005F02'; this.style.background='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(0,95,2,0.12)'"
                            onblur="this.style.borderColor='#dfe8d8'; this.style.background='#f4f4f4'; this.style.boxShadow='none'">
                    </div>

                    <div>
                        <label
                            style="display: block; font-size: 0.8rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.5rem;">Nazhir</label>
                        <input type="text" name="nazhir" value="<?php echo e(old('nazhir')); ?>"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                            onfocus="this.style.borderColor='#005F02'; this.style.background='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(0,95,2,0.12)'"
                            onblur="this.style.borderColor='#dfe8d8'; this.style.background='#f4f4f4'; this.style.boxShadow='none'">
                    </div>

                    <div>
                        <label
                            style="display: block; font-size: 0.8rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.5rem;">Lokasi
                            Tanah</label>
                        <input type="text" name="lokasi_tanah" value="<?php echo e(old('lokasi_tanah')); ?>"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                            onfocus="this.style.borderColor='#005F02'; this.style.background='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(0,95,2,0.12)'"
                            onblur="this.style.borderColor='#dfe8d8'; this.style.background='#f4f4f4'; this.style.boxShadow='none'">
                    </div>

                    <div>
                        <label
                            style="display: block; font-size: 0.8rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.5rem;">Luas
                            Tanah</label>
                        <input type="text" name="luas_tanah" value="<?php echo e(old('luas_tanah')); ?>"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                            placeholder="Contoh: 500"
                            onfocus="this.style.borderColor='#005F02'; this.style.background='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(0,95,2,0.12)'"
                            onblur="this.style.borderColor='#dfe8d8'; this.style.background='#f4f4f4'; this.style.boxShadow='none'">
                        <p style="font-size: 0.7rem; color: #8cbf73; margin-top: 0.25rem;">Contoh: 500 m²</p>
                    </div>

                    <div style="grid-column: 1 / -1;">
                        <label
                            style="display: block; font-size: 0.8rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.5rem;">Judul</label>
                        <input type="text" name="judul" value="<?php echo e(old('judul', $aktaWakaf->judul ?? '')); ?>"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                            placeholder="Contoh: Akta Wakaf"
                            onfocus="this.style.borderColor='#005F02'; this.style.background='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(0,95,2,0.12)'"
                            onblur="this.style.borderColor='#dfe8d8'; this.style.background='#f4f4f4'; this.style.boxShadow='none'">
                    </div>

                    <div style="grid-column: 1 / -1;">
                        <label
                            style="display: block; font-size: 0.8rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.5rem;">Deskripsi</label>
                        <textarea name="deskripsi" rows="4" placeholder="Maksimal 2 paragraf"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; resize: vertical; transition: all 0.2s ease;"
                            onfocus="this.style.borderColor='#005F02'; this.style.background='#ffffff'; this.style.boxShadow='0 0 0 3px rgba(0,95,2,0.12)'"
                            onblur="this.style.borderColor='#dfe8d8'; this.style.background='#f4f4f4'; this.style.boxShadow='none'"><?php echo e(old('deskripsi')); ?></textarea>
                    </div>

                    <div style="grid-column: 1 / -1;">
                        <label
                            style="display: block; font-size: 0.8rem; font-weight: 600; color: #2d2d2d; margin-bottom: 0.5rem;">Upload
                            Sertifikat</label>
                        <input type="file" name="file_sertifikat" accept=".jpg,.png,.jpeg,.pdf,.doc,.docx"
                            style="width: 100%; padding: 0.75rem 1rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;">
                        <p style="font-size: 0.7rem; color: #8cbf73; margin-top: 0.5rem;">Format: JPG, PNG, JPEG, PDF, DOC,
                            DOCX (Max: 5MB)</p>
                        <?php $__errorArgs = ['file_sertifikat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p style="color: #dc2626; font-size: 0.7rem; margin-top: 0.5rem;"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div style="margin-top: 2rem; display: flex; justify-content: flex-end; gap: 1rem;">
                    <a href="<?php echo e(route('admin.akta-wakaf.index')); ?>"
                        style="padding: 0.7rem 1.5rem; border: 1.5px solid #dfe8d8; border-radius: 10px; color: #2d2d2d; text-decoration: none; font-weight: 600; transition: all 0.2s ease;">Batal</a>
                    <button type="submit"
                        style="padding: 0.7rem 1.5rem; background: linear-gradient(135deg, #005F02, #0f4d1c); border: none; border-radius: 10px; color: #fff; font-weight: 600; cursor: pointer; transition: all 0.2s ease; box-shadow: 0 4px 14px rgba(0, 95, 2, 0.3);">Simpan
                        Data</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 95, 2, 0.4);
        }

        a[href*="index"]:hover {
            background: #eef3ec;
            border-color: #8cbf73;
            color: #005F02;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\akta-wakaf\create.blade.php ENDPATH**/ ?>