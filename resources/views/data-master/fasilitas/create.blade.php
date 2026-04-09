@extends('admin.layout')

@section('title', 'Tambah Fasilitas')

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

    /* Page Header */
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
        background: linear-gradient(135deg, #4361ee, #7209b7);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 14px rgba(67, 97, 238, 0.35);
    }

    .page-icon i {
        color: #fff;
        font-size: 1.1rem;
    }

    .page-title h1 {
        font-size: 1.35rem;
        font-weight: 700;
        color: #1a1f36;
        margin: 0;
        letter-spacing: -0.3px;
    }

    .page-title p {
        font-size: 0.8rem;
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

    /* Card */
    .form-card {
        background: #fff;
        border-radius: 20px;
        border: none;
        box-shadow: 0 2px 20px rgba(0,0,0,0.06);
        overflow: hidden;
    }

    .form-card-header {
        background: linear-gradient(135deg, #4361ee 0%, #7209b7 100%);
        padding: 1.4rem 2rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .form-card-header i {
        color: rgba(255,255,255,0.85);
        font-size: 1rem;
    }

    .form-card-header span {
        color: #fff;
        font-size: 0.95rem;
        font-weight: 600;
        letter-spacing: -0.1px;
    }

    .form-card-body {
        padding: 2rem;
    }

    /* Section Divider */
    .section-label {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #a0aec0;
        margin-bottom: 1.25rem;
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

    /* Form Fields */
    .form-group {
        margin-bottom: 1.4rem;
    }

    .form-group label {
        font-size: 0.82rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.45rem;
        display: block;
        letter-spacing: -0.1px;
    }

    .form-group label .req {
        color: #e53e3e;
        margin-left: 2px;
    }

    .form-group label .opt {
        color: #a0aec0;
        font-weight: 400;
        font-size: 0.75rem;
        margin-left: 4px;
    }

    .form-control,
    .form-control-file {
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
        border-color: #4361ee;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.12);
        outline: none;
        color: #1a1f36;
    }

    .form-control.is-invalid {
        border-color: #e53e3e;
        background: #fff5f5;
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.12);
    }

    .invalid-feedback {
        font-size: 0.78rem;
        color: #e53e3e;
        margin-top: 0.35rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .invalid-feedback::before {
        content: '\f06a';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
    }

    /* Select styling */
    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%23a0aec0' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 0.9rem center;
        padding-right: 2.5rem;
        cursor: pointer;
    }

    /* Kondisi badges inside select hint */
    .kondisi-hints {
        display: flex;
        gap: 0.5rem;
        margin-top: 0.5rem;
        flex-wrap: wrap;
    }

    .kondisi-badge {
        font-size: 0.7rem;
        font-weight: 600;
        padding: 0.2rem 0.6rem;
        border-radius: 20px;
    }

    .kondisi-badge.baik { background: #c6f6d5; color: #276749; }
    .kondisi-badge.ringan { background: #fef3c7; color: #92400e; }
    .kondisi-badge.berat { background: #fed7d7; color: #9b2c2c; }

    /* File Upload */
    .file-upload-wrapper {
        position: relative;
    }

    .file-upload-label {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        border: 1.5px dashed #cbd5e0;
        border-radius: 10px;
        padding: 1.2rem 1rem;
        background: #f8fafc;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .file-upload-label:hover {
        border-color: #4361ee;
        background: #eef2ff;
    }

    .file-upload-icon {
        width: 38px;
        height: 38px;
        background: #eef2ff;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .file-upload-icon i {
        color: #4361ee;
        font-size: 0.9rem;
    }

    .file-upload-text strong {
        display: block;
        font-size: 0.83rem;
        font-weight: 600;
        color: #2d3748;
    }

    .file-upload-text span {
        font-size: 0.75rem;
        color: #a0aec0;
    }

    input[type="file"] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }

    /* Textarea */
    textarea.form-control {
        resize: vertical;
        min-height: 90px;
    }

    /* Divider */
    .form-divider {
        border: none;
        border-top: 1.5px solid #f0f4f8;
        margin: 1.75rem 0;
    }

    /* Action Buttons */
    .form-actions {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding-top: 0.5rem;
        flex-wrap: wrap;
    }

    .btn-save {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.7rem 1.5rem;
        background: linear-gradient(135deg, #4361ee, #7209b7);
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 0.87rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        font-family: 'Plus Jakarta Sans', sans-serif;
        box-shadow: 0 4px 14px rgba(67, 97, 238, 0.3);
        letter-spacing: -0.1px;
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
    }

    .btn-save:active {
        transform: translateY(0);
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

    /* Required note */
    .required-note {
        font-size: 0.75rem;
        color: #a0aec0;
        margin-left: auto;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .required-note span {
        color: #e53e3e;
        font-weight: 700;
    }
</style>
@endpush

@section('content')
    <div class="page-wrapper">

        {{-- Page Header --}}
        <div class="page-header">
            <div class="page-header-left">
                <div class="page-icon">
                    <i class="fas fa-cubes"></i>
                </div>
                <div class="page-title">
                    <h1>Tambah Fasilitas</h1>
                    <p><i class="fas fa-calendar-alt mr-1"></i>{{ now()->format('d F Y') }}</p>
                </div>
            </div>

            <a href="{{ route('admin.data-master.fasilitas.index') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        {{-- Form Card --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-clipboard-list"></i>
                <span>Formulir Tambah Fasilitas</span>
            </div>

            <div class="form-card-body">
                <form action="{{ route('admin.data-master.fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Section: Informasi Utama --}}
                    <div class="section-label">Informasi Utama</div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Fasilitas <span class="req">*</span></label>
                                <input type="text"
                                       name="nama_fasilitas"
                                       class="form-control @error('nama_fasilitas') is-invalid @enderror"
                                       value="{{ old('nama_fasilitas') }}"
                                       placeholder="Masukkan nama fasilitas"
                                       required>
                                @error('nama_fasilitas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori <span class="opt">(opsional)</span></label>
                                <input type="text"
                                       name="kategori"
                                       class="form-control @error('kategori') is-invalid @enderror"
                                       value="{{ old('kategori') }}"
                                       placeholder="Contoh: Laboratorium, Kelas, Olahraga">
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jumlah <span class="req">*</span></label>
                                <input type="number"
                                       name="jumlah"
                                       class="form-control @error('jumlah') is-invalid @enderror"
                                       value="{{ old('jumlah', 0) }}"
                                       min="0"
                                       required>
                                @error('jumlah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kondisi <span class="req">*</span></label>
                                <select name="kondisi" class="form-control @error('kondisi') is-invalid @enderror" required>
                                    <option value="">Pilih Kondisi</option>
                                    <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                    <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                </select>
                                <div class="kondisi-hints">
                                    <span class="kondisi-badge baik">Baik</span>
                                    <span class="kondisi-badge ringan">Rusak Ringan</span>
                                    <span class="kondisi-badge berat">Rusak Berat</span>
                                </div>
                                @error('kondisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tanggal Pengadaan <span class="opt">(opsional)</span></label>
                                <input type="date"
                                       name="tanggal_pengadaan"
                                       class="form-control @error('tanggal_pengadaan') is-invalid @enderror"
                                       value="{{ old('tanggal_pengadaan') }}">
                                @error('tanggal_pengadaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="form-divider">

                    {{-- Section: Lokasi & Media --}}
                    <div class="section-label">Lokasi & Media</div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lokasi <span class="opt">(opsional)</span></label>
                                <input type="text"
                                       name="lokasi"
                                       class="form-control @error('lokasi') is-invalid @enderror"
                                       value="{{ old('lokasi') }}"
                                       placeholder="Contoh: Gedung A Lantai 2">
                                @error('lokasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto Fasilitas <span class="opt">(opsional)</span></label>
                                <div class="file-upload-wrapper">
                                    <label class="file-upload-label @error('foto') border-danger @enderror" id="fileLabel">
                                        <div class="file-upload-icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <div class="file-upload-text">
                                            <strong id="fileName">Klik untuk upload foto</strong>
                                            <span>JPEG, PNG, JPG, GIF &bull; Maks 2MB</span>
                                        </div>
                                        <input type="file"
                                               name="foto"
                                               accept="image/*"
                                               onchange="updateFileName(this)">
                                    </label>
                                </div>
                                @error('foto')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="form-divider">

                    {{-- Section: Keterangan --}}
                    <div class="section-label">Keterangan</div>

                    <div class="form-group">
                        <label>Deskripsi <span class="opt">(opsional)</span></label>
                        <textarea name="deskripsi"
                                  class="form-control @error('deskripsi') is-invalid @enderror"
                                  rows="3"
                                  placeholder="Tuliskan deskripsi singkat tentang fasilitas ini...">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Keterangan Tambahan <span class="opt">(opsional)</span></label>
                        <textarea name="keterangan"
                                  class="form-control @error('keterangan') is-invalid @enderror"
                                  rows="2"
                                  placeholder="Informasi tambahan lainnya...">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="form-divider">

                    {{-- Action Buttons --}}
                    <div class="form-actions">
                        <button type="submit" class="btn-save">
                            <i class="fas fa-save"></i> Simpan Fasilitas
                        </button>

                        <button type="reset" class="btn-reset" onclick="resetFileName()">
                            <i class="fas fa-undo"></i> Reset
                        </button>

                        <a href="{{ route('admin.data-master.fasilitas.index') }}" class="btn-cancel">
                            <i class="fas fa-times"></i> Batal
                        </a>

                        <div class="required-note">
                            <span>*</span> Wajib diisi
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script>
        function updateFileName(input) {
            const label = document.getElementById('fileName');
            if (input.files && input.files[0]) {
                label.textContent = input.files[0].name;
            }
        }

        function resetFileName() {
            const label = document.getElementById('fileName');
            label.textContent = 'Klik untuk upload foto';
        }
    </script>
@endsection
