<div class="row" style="display: flex; flex-wrap: wrap; gap: 1.5rem;">
    <div class="col-md-6" style="flex: 1; min-width: 250px;">
        <div class="form-group" style="margin-bottom: 1rem;">
            <label class="form-label" style="font-weight: 600; color: #2d2d2d;">Nama Anggota <span class="text-danger"
                    style="color: #dc2626;">*</span></label>
            <input type="text" name="nama" class="form-control"
                style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                value="<?php echo e(old('nama', $anggota->nama ?? '')); ?>" required>
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
            <label class="form-label" style="font-weight: 600; color: #2d2d2d;">Jabatan <span class="text-danger"
                    style="color: #dc2626;">*</span></label>
            <input type="text" name="jabatan" class="form-control"
                style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                value="<?php echo e(old('jabatan', $anggota->jabatan ?? '')); ?>" required>
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
            <label class="form-label" style="font-weight: 600; color: #2d2d2d;">Divisi <span class="text-danger"
                    style="color: #dc2626;">*</span></label>
            <select name="divisi" class="form-select"
                style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                required>
                <option value="">-- Pilih Divisi --</option>
                <option value="pengurus" <?php echo e(old('divisi', $anggota->divisi ?? '') == 'pengurus' ? 'selected' : ''); ?>>
                    Pengurus</option>
                <option value="pengawas" <?php echo e(old('divisi', $anggota->divisi ?? '') == 'pengawas' ? 'selected' : ''); ?>>
                    Pengawas</option>
                <option value="pelaksana" <?php echo e(old('divisi', $anggota->divisi ?? '') == 'pelaksana' ? 'selected' : ''); ?>>
                    Pelaksana</option>
            </select>
        </div>
    </div>

    <div class="col-md-6" style="flex: 1; min-width: 250px;">
        <div class="form-group" style="margin-bottom: 1rem;">
            <label class="form-label" style="font-weight: 600; color: #2d2d2d;">Telepon</label>
            <input type="text" name="telepon" class="form-control"
                style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                value="<?php echo e(old('telepon', $anggota->telepon ?? '')); ?>">
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
            <label class="form-label" style="font-weight: 600; color: #2d2d2d;">Email</label>
            <input type="email" name="email" class="form-control"
                style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                value="<?php echo e(old('email', $anggota->email ?? '')); ?>">
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
            <label class="form-label" style="font-weight: 600; color: #2d2d2d;">Urutan</label>
            <input type="number" name="urutan" class="form-control"
                style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
                value="<?php echo e(old('urutan', $anggota->urutan ?? 0)); ?>">
        </div>
    </div>
</div>

<div class="form-group" style="margin-bottom: 1rem;">
    <label class="form-label" style="font-weight: 600; color: #2d2d2d;">Deskripsi</label>
    <textarea name="deskripsi" rows="3" class="form-control"
        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"><?php echo e(old('deskripsi', $anggota->deskripsi ?? '')); ?></textarea>
</div>

<div class="form-group" style="margin-bottom: 1rem;">
    <label class="form-label" style="font-weight: 600; color: #2d2d2d;">Status</label>
    <select name="status" class="form-select"
        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;">
        <option value="aktif" <?php echo e(old('status', $anggota->status ?? '') == 'aktif' ? 'selected' : ''); ?>>Aktif</option>
        <option value="nonaktif" <?php echo e(old('status', $anggota->status ?? '') == 'nonaktif' ? 'selected' : ''); ?>>Nonaktif
        </option>
    </select>
</div>

<div class="form-group" style="margin-bottom: 1rem;">
    <label class="form-label" style="font-weight: 600; color: #2d2d2d;">Foto</label>
    <?php if(isset($anggota) && $anggota->foto): ?>
        <div class="mb-2">
            <img src="<?php echo e(asset('storage/' . $anggota->foto)); ?>" alt="Foto"
                style="max-height: 80px; border-radius: 8px; border: 1px solid #dfe8d8;">
            <small class="text-muted d-block" style="color: #8cbf73 !important;">Foto saat ini</small>
        </div>
    <?php endif; ?>
    <input type="file" name="foto" class="form-control"
        style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #dfe8d8; border-radius: 10px; background: #f4f4f4; transition: all 0.2s ease;"
        accept="image/*" onchange="previewFoto(this)">
    <div id="foto-preview-wrap" class="mt-2" style="display: none;">
        <img id="foto-preview" src="#" alt="Preview"
            style="max-height: 80px; border-radius: 8px; border: 1px solid #dfe8d8;">
    </div>
</div>

<style>
    .form-control:focus,
    .form-select:focus {
        border-color: #005F02 !important;
        outline: none !important;
        box-shadow: 0 0 0 3px rgba(0, 95, 2, 0.12) !important;
        background: #ffffff !important;
    }
</style>

<?php $__env->startPush('scripts'); ?>
    <script>
        function previewFoto(input) {
            const wrap = document.getElementById('foto-preview-wrap');
            const img = document.getElementById('foto-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    img.src = e.target.result;
                    wrap.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                wrap.style.display = 'none';
                img.src = '#';
            }
        }
    </script>
<?php $__env->stopPush(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\data-master\struktur-organisasi\_form.blade.php ENDPATH**/ ?>