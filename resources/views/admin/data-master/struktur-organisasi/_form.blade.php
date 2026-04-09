<div class="mb-3">
    <label class="form-label">Nama Anggota</label>
    <input type="text"
           name="nama"
           class="form-control"
           value="{{ old('nama', $strukturOrganisasi->nama ?? '') }}"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Jabatan</label>
    <input type="text"
           name="jabatan"
           class="form-control"
           value="{{ old('jabatan', $strukturOrganisasi->jabatan ?? '') }}"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Foto</label>
    <input type="file"
           name="foto"
           class="form-control"
           onchange="previewFoto(this)">

    <div id="foto-preview-wrap" class="d-none mt-2">
        <img id="foto-preview" width="150">
    </div>
</div>

<button type="submit" class="btn btn-primary">
    Simpan
</button>