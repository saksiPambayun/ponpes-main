<div class="row" style="display: flex; flex-wrap: wrap; gap: 1.5rem;">
    <div class="col-md-6" style="flex: 1; min-width: 250px;">
        <div class="form-group" style="margin-bottom: 1rem;">
            <label class="form-label" style="font-weight: 600;">Nama Anggota <span class="text-danger">*</span></label>
            <input type="text" name="nama" class="form-control" style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px;" value="{{ old('nama', $anggota->nama ?? '') }}" required>
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
            <label class="form-label" style="font-weight: 600;">Jabatan <span class="text-danger">*</span></label>
            <input type="text" name="jabatan" class="form-control" style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px;" value="{{ old('jabatan', $anggota->jabatan ?? '') }}" required>
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
            <label class="form-label" style="font-weight: 600;">Divisi <span class="text-danger">*</span></label>
            <select name="divisi" class="form-select" style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px;" required>
                <option value="">-- Pilih Divisi --</option>
                <option value="pengurus" {{ old('divisi', $anggota->divisi ?? '') == 'pengurus' ? 'selected' : '' }}>Pengurus</option>
                <option value="pengawas" {{ old('divisi', $anggota->divisi ?? '') == 'pengawas' ? 'selected' : '' }}>Pengawas</option>
                <option value="pelaksana" {{ old('divisi', $anggota->divisi ?? '') == 'pelaksana' ? 'selected' : '' }}>Pelaksana</option>
            </select>
        </div>
    </div>

    <div class="col-md-6" style="flex: 1; min-width: 250px;">
        <div class="form-group" style="margin-bottom: 1rem;">
            <label class="form-label" style="font-weight: 600;">Telepon</label>
            <input type="text" name="telepon" class="form-control" style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px;" value="{{ old('telepon', $anggota->telepon ?? '') }}">
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
            <label class="form-label" style="font-weight: 600;">Email</label>
            <input type="email" name="email" class="form-control" style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px;" value="{{ old('email', $anggota->email ?? '') }}">
        </div>

        <div class="form-group" style="margin-bottom: 1rem;">
            <label class="form-label" style="font-weight: 600;">Urutan</label>
            <input type="number" name="urutan" class="form-control" style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px;" value="{{ old('urutan', $anggota->urutan ?? 0) }}">
        </div>
    </div>
</div>

<div class="form-group" style="margin-bottom: 1rem;">
    <label class="form-label" style="font-weight: 600;">Deskripsi</label>
    <textarea name="deskripsi" rows="3" class="form-control" style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px;">{{ old('deskripsi', $anggota->deskripsi ?? '') }}</textarea>
</div>

<div class="form-group" style="margin-bottom: 1rem;">
    <label class="form-label" style="font-weight: 600;">Status</label>
    <select name="status" class="form-select" style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px;">
        <option value="aktif" {{ old('status', $anggota->status ?? '') == 'aktif' ? 'selected' : '' }}>Aktif</option>
        <option value="nonaktif" {{ old('status', $anggota->status ?? '') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
    </select>
</div>

<div class="form-group" style="margin-bottom: 1rem;">
    <label class="form-label" style="font-weight: 600;">Foto</label>
    @if(isset($anggota) && $anggota->foto)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto" style="max-height: 80px; border-radius: 8px;">
            <small class="text-muted d-block">Foto saat ini</small>
        </div>
    @endif
    <input type="file" name="foto" class="form-control" style="width: 100%; padding: 0.65rem 0.9rem; border: 1.5px solid #e2e8f0; border-radius: 10px;" accept="image/*" onchange="previewFoto(this)">
    <div id="foto-preview-wrap" class="mt-2" style="display: none;">
        <img id="foto-preview" src="#" alt="Preview" style="max-height: 80px; border-radius: 8px;">
    </div>
</div>

@push('scripts')
<script>
function previewFoto(input) {
    const wrap = document.getElementById('foto-preview-wrap');
    const img = document.getElementById('foto-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            wrap.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
