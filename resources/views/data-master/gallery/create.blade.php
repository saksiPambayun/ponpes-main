@extends('admin.layout')

@section('title', 'Tambah Gallery')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    body, .sidebar, .topbar {
        font-family: 'Plus Jakarta Sans', sans-serif !important;
    }

    .page-wrapper {
        background: #f0f4f8;
        min-height: 100vh;
        padding: 2rem;
    }

    /* ── Page Header ── */
    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 2rem;
    }

    .page-header-left {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .page-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #0ea5e9, #6366f1);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 14px rgba(99, 102, 241, 0.35);
        flex-shrink: 0;
    }

    .page-icon i { color: #fff; font-size: 1.1rem; }

    .page-title h1 {
        font-size: 1.35rem;
        font-weight: 700;
        color: #1a1f36;
        margin: 0;
        letter-spacing: -0.3px;
    }

    .page-title p {
        font-size: 0.78rem;
        color: #8898aa;
        margin: 0;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.55rem 1.1rem;
        background: #fff;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        color: #4a5568;
        font-size: 0.82rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .btn-back:hover {
        background: #f7fafc;
        border-color: #cbd5e0;
        color: #2d3748;
        text-decoration: none;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    /* ── Layout: two columns ── */
    .form-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        align-items: start;
    }

    @media (max-width: 768px) {
        .form-layout { grid-template-columns: 1fr; }
    }

    /* ── Cards ── */
    .form-card {
        background: #fff;
        border-radius: 20px;
        border: none;
        box-shadow: 0 2px 20px rgba(0,0,0,0.06);
        overflow: hidden;
    }

    .form-card-header {
        background: linear-gradient(135deg, #0ea5e9 0%, #6366f1 100%);
        padding: 1.3rem 1.8rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .form-card-header i { color: rgba(255,255,255,0.85); font-size: 0.95rem; }

    .form-card-header span {
        color: #fff;
        font-size: 0.93rem;
        font-weight: 600;
    }

    .form-card-body { padding: 1.75rem; }

    /* inner sub-cards (no header) */
    .sub-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 2px 20px rgba(0,0,0,0.06);
        padding: 1.75rem;
    }

    /* ── Section labels ── */
    .section-label {
        font-size: 0.68rem;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #a0aec0;
        margin-bottom: 1.2rem;
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }

    .section-label::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #edf2f7;
    }

    /* ── Form controls ── */
    .form-group { margin-bottom: 1.3rem; }

    .form-group label {
        font-size: 0.82rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.4rem;
        display: block;
    }

    .form-group label .req { color: #e53e3e; margin-left: 2px; }
    .form-group label .opt { color: #a0aec0; font-weight: 400; font-size: 0.73rem; margin-left: 4px; }

    .form-control {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 0.87rem;
        color: #2d3748;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        padding: 0.65rem 0.9rem;
        background: #f8fafc;
        transition: all 0.2s ease;
        width: 100%;
    }

    .form-control:focus {
        border-color: #6366f1;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
        outline: none;
    }

    .form-control.is-invalid {
        border-color: #e53e3e;
        background: #fff5f5;
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%23a0aec0' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 0.9rem center;
        padding-right: 2.5rem;
        cursor: pointer;
    }

    textarea.form-control { resize: vertical; min-height: 100px; }

    .invalid-feedback {
        font-size: 0.78rem;
        color: #e53e3e;
        margin-top: 0.35rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    /* ── Kategori badges ── */
    .kategori-hints {
        display: flex;
        gap: 0.45rem;
        margin-top: 0.55rem;
        flex-wrap: wrap;
    }

    .kat-badge {
        font-size: 0.7rem;
        font-weight: 600;
        padding: 0.18rem 0.6rem;
        border-radius: 20px;
        cursor: pointer;
        transition: opacity 0.15s;
    }

    .kat-badge:hover { opacity: 0.75; }
    .kat-badge.kegiatan { background: #dbeafe; color: #1e40af; }
    .kat-badge.prestasi  { background: #fef3c7; color: #92400e; }
    .kat-badge.umum      { background: #dcfce7; color: #166534; }

    /* ── File upload ── */
    .file-upload-wrapper { position: relative; }

    .file-upload-area {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
        border: 2px dashed #cbd5e0;
        border-radius: 12px;
        padding: 2rem 1rem;
        background: #f8fafc;
        cursor: pointer;
        transition: all 0.2s ease;
        text-align: center;
        position: relative;
    }

    .file-upload-area:hover,
    .file-upload-area.dragover {
        border-color: #6366f1;
        background: #eef2ff;
    }

    .file-upload-area input[type="file"] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }

    .upload-icon-wrap {
        width: 48px;
        height: 48px;
        background: #e0e7ff;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .upload-icon-wrap i { color: #6366f1; font-size: 1.2rem; }

    .upload-main-text {
        font-size: 0.85rem;
        font-weight: 600;
        color: #2d3748;
    }

    .upload-sub-text {
        font-size: 0.75rem;
        color: #a0aec0;
    }

    /* ── Image Preview ── */
    .preview-box {
        border-radius: 12px;
        overflow: hidden;
        background: #f0f4f8;
        border: 1.5px solid #e2e8f0;
        display: none;
        position: relative;
    }

    .preview-box img {
        width: 100%;
        max-height: 220px;
        object-fit: cover;
        display: block;
    }

    .preview-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 0.6rem 0.9rem;
        background: linear-gradient(transparent, rgba(0,0,0,0.55));
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .preview-filename {
        font-size: 0.75rem;
        color: #fff;
        font-weight: 600;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 80%;
    }

    .preview-remove {
        background: rgba(255,255,255,0.25);
        border: none;
        border-radius: 6px;
        color: #fff;
        font-size: 0.72rem;
        padding: 0.2rem 0.5rem;
        cursor: pointer;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 600;
        transition: background 0.2s;
    }

    .preview-remove:hover { background: rgba(229,62,62,0.7); }

    /* ── Toggle switch (is_active) ── */
    .toggle-wrap {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        margin-top: 0.4rem;
    }

    .toggle-switch {
        position: relative;
        width: 44px;
        height: 24px;
        flex-shrink: 0;
    }

    .toggle-switch input { opacity: 0; width: 0; height: 0; }

    .toggle-slider {
        position: absolute;
        inset: 0;
        background: #cbd5e0;
        border-radius: 24px;
        cursor: pointer;
        transition: 0.25s;
    }

    .toggle-slider:before {
        content: '';
        position: absolute;
        width: 18px;
        height: 18px;
        left: 3px;
        top: 3px;
        background: #fff;
        border-radius: 50%;
        transition: 0.25s;
        box-shadow: 0 1px 4px rgba(0,0,0,0.2);
    }

    .toggle-switch input:checked + .toggle-slider { background: #6366f1; }
    .toggle-switch input:checked + .toggle-slider:before { transform: translateX(20px); }

    .toggle-info strong {
        display: block;
        font-size: 0.83rem;
        font-weight: 600;
        color: #2d3748;
    }

    .toggle-info span {
        font-size: 0.75rem;
        color: #a0aec0;
    }

    /* ── Form divider ── */
    .form-divider {
        border: none;
        border-top: 1.5px solid #f0f4f8;
        margin: 1.5rem 0;
    }

    /* ── Action buttons ── */
    .form-actions {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        flex-wrap: wrap;
        padding-top: 0.25rem;
    }

    .btn-save {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.7rem 1.5rem;
        background: linear-gradient(135deg, #0ea5e9, #6366f1);
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 0.87rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        font-family: 'Plus Jakarta Sans', sans-serif;
        box-shadow: 0 4px 14px rgba(99, 102, 241, 0.3);
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
    }

    .btn-reset {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.7rem 1.2rem;
        background: #f7fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        color: #718096;
        font-size: 0.87rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .btn-reset:hover {
        background: #edf2f7;
        border-color: #cbd5e0;
        color: #4a5568;
    }

    .btn-cancel {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.7rem 1.2rem;
        background: #fff5f5;
        border: 1.5px solid #fed7d7;
        border-radius: 10px;
        color: #e53e3e;
        font-size: 0.87rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .btn-cancel:hover {
        background: #fed7d7;
        border-color: #fc8181;
        color: #c53030;
        text-decoration: none;
    }

    .required-note {
        font-size: 0.75rem;
        color: #a0aec0;
        margin-left: auto;
    }

    .required-note span { color: #e53e3e; font-weight: 700; }
</style>
@endpush

@section('content')
<div class="page-wrapper">

    {{-- Page Header --}}
    <div class="page-header">
        <div class="page-header-left">
            <div class="page-icon">
                <i class="fas fa-images"></i>
            </div>
            <div class="page-title">
                <h1>Tambah Gallery</h1>
                <p><i class="fas fa-calendar-alt mr-1"></i>{{ now()->format('d F Y') }}</p>
            </div>
        </div>

        <a href="{{ route('data-master.gallery.index') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <form action="{{ route('data-master.gallery.store') }}" method="POST" enctype="multipart/form-data" id="galleryForm">
        @csrf

        <div class="form-layout">

            {{-- ── LEFT COLUMN ── --}}
            <div>

                {{-- Info Utama --}}
                <div class="form-card" style="margin-bottom: 1.5rem;">
                    <div class="form-card-header">
                        <i class="fas fa-info-circle"></i>
                        <span>Informasi Gallery</span>
                    </div>
                    <div class="form-card-body">

                        <div class="form-group">
                            <label>Judul <span class="req">*</span></label>
                            <input type="text"
                                   name="judul"
                                   class="form-control @error('judul') is-invalid @enderror"
                                   value="{{ old('judul') }}"
                                   placeholder="Masukkan judul gallery"
                                   required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kategori <span class="req">*</span></label>
                            <select name="kategori"
                                    class="form-control @error('kategori') is-invalid @enderror"
                                    id="kategoriSelect"
                                    required>
                                <option value="">Pilih Kategori</option>
                                <option value="kegiatan" {{ old('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                <option value="prestasi" {{ old('kategori') == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                                <option value="umum"     {{ old('kategori') == 'umum'     ? 'selected' : '' }}>Umum</option>
                            </select>
                            <div class="kategori-hints">
                                <span class="kat-badge kegiatan" onclick="setKat('kegiatan')">Kegiatan</span>
                                <span class="kat-badge prestasi" onclick="setKat('prestasi')">Prestasi</span>
                                <span class="kat-badge umum"     onclick="setKat('umum')">Umum</span>
                            </div>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <label>Tanggal Kegiatan <span class="opt">(opsional)</span></label>
                            <input type="date"
                                   name="tanggal_kegiatan"
                                   class="form-control @error('tanggal_kegiatan') is-invalid @enderror"
                                   value="{{ old('tanggal_kegiatan') }}">
                            @error('tanggal_kegiatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    </div>
                </div>
            </div>

            {{-- ── RIGHT COLUMN ── --}}
            <div>

                {{-- Upload Gambar --}}
                <div class="form-card" style="margin-bottom: 1.5rem;">
                    <div class="form-card-header">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <span>Upload Gambar</span>
                    </div>
                    <div class="form-card-body">

                        {{-- Preview --}}
                        <div class="preview-box" id="previewBox">
                            <img id="previewImg" src="#" alt="Preview">
                            <div class="preview-overlay">
                                <span class="preview-filename" id="previewName"></span>
                                <button type="button" class="preview-remove" onclick="clearImage()">
                                    <i class="fas fa-times mr-1"></i>Hapus
                                </button>
                            </div>
                        </div>

                        {{-- Upload Area --}}
                        <div class="file-upload-wrapper" id="uploadWrapper">
                            <div class="file-upload-area @error('gambar') border-danger @enderror" id="dropZone">
                                <input type="file"
                                       name="gambar"
                                       id="gambar"
                                       accept="image/*"
                                       onchange="handleFile(this)"
                                       {{ !old('gambar') ? 'required' : '' }}>
                                <div class="upload-icon-wrap">
                                    <i class="fas fa-image"></i>
                                </div>
                                <p class="upload-main-text mb-0">Klik atau drag & drop gambar</p>
                                <p class="upload-sub-text mb-0">JPEG, PNG, JPG, GIF &bull; Maks 5MB</p>
                            </div>
                        </div>

                        @error('gambar')
                            <div class="invalid-feedback d-flex mt-2">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="sub-card">
                    <div class="section-label">Deskripsi</div>

                    <div class="form-group mb-0">
                        <label>Deskripsi <span class="opt">(opsional)</span></label>
                        <textarea name="deskripsi"
                                  class="form-control @error('deskripsi') is-invalid @enderror"
                                  rows="4"
                                  placeholder="Tuliskan deskripsi singkat tentang foto ini...">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
        </div>

        {{-- ── Action Buttons ── --}}
        <div class="sub-card" style="margin-top: 1.5rem;">
            <div class="form-actions">
                <button type="submit" class="btn-save">
                    <i class="fas fa-save"></i> Simpan Gallery
                </button>

                <button type="reset" class="btn-reset" onclick="resetForm()">
                    <i class="fas fa-undo"></i> Reset
                </button>

                <a href="{{ route('data-master.gallery.index') }}" class="btn-cancel">
                    <i class="fas fa-times"></i> Batal
                </a>

                <div class="required-note"><span>*</span> Wajib diisi</div>
            </div>
        </div>

    </form>
</div>

@push('scripts')
<script>
    // ── Preview gambar
    function handleFile(input) {
        const file = input.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('previewName').textContent = file.name;
            document.getElementById('previewBox').style.display = 'block';
            document.getElementById('uploadWrapper').style.display = 'none';
        };
        reader.readAsDataURL(file);
    }

    function clearImage() {
        document.getElementById('previewBox').style.display = 'none';
        document.getElementById('uploadWrapper').style.display = 'block';
        document.getElementById('gambar').value = '';
    }

    // ── Kategori quick-select
    function setKat(val) {
        document.getElementById('kategoriSelect').value = val;
    }

    // ── Toggle label
    // Init label color
    toggleLabel.style.color = toggleInput.checked ? '#6366f1' : '#a0aec0';

    // ── Reset
    function resetForm() {
        clearImage();
        document.getElementById('toggleLabel').textContent = 'Aktif';
        document.getElementById('toggleLabel').style.color = '#6366f1';
    }

    // ── Drag & drop highlight
    const dropZone = document.getElementById('dropZone');
    ['dragenter', 'dragover'].forEach(e => dropZone.addEventListener(e, () => dropZone.classList.add('dragover')));
    ['dragleave', 'drop'].forEach(e => dropZone.addEventListener(e, () => dropZone.classList.remove('dragover')));
</script>
@endpush
@endsection