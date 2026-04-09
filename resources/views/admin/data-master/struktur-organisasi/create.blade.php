@extends('admin.layout')

@section('title', 'Tambah Anggota Organisasi')

@section('content')
<div class="page-wrapper">

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <div class="header-left">
            <div class="header-icon">
                <i class="fas fa-sitemap"></i>
            </div>
            <div>
                <h1 class="page-title">Tambah Anggota Organisasi</h1>
                <nav class="breadcrumb-nav">
                    <a href="{{ url('/admin/dashboard') }}" class="breadcrumb-link">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <i class="fas fa-chevron-right breadcrumb-sep"></i>
                    <a href="{{ route('admin.data-master.struktur-organisasi.index') }}" class="breadcrumb-link">
                        Struktur Organisasi
                    </a>
                    <i class="fas fa-chevron-right breadcrumb-sep"></i>
                    <span class="breadcrumb-current">Tambah</span>
                </nav>
            </div>
        </div>
        <a href="{{ route('admin.data-master.struktur-organisasi.index') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    {{-- ERROR SUMMARY --}}
    @if($errors->any())
    <div class="alert-error-box">
        <div class="alert-error-icon"><i class="fas fa-exclamation-circle"></i></div>
        <div>
            <p class="alert-error-title">Terdapat beberapa kesalahan:</p>
            <ul class="alert-error-list">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <form action="{{ route('admin.data-master.struktur-organisasi.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-layout">

            {{-- ===== MAIN COL ===== --}}
            <div class="main-col">

                {{-- Identitas --}}
                <div class="section-card">
                    <div class="section-card-header">
                        <div class="section-card-title">
                            <span class="title-icon" style="background:#eff6ff; color:#3b82f6;">
                                <i class="fas fa-user"></i>
                            </span>
                            Identitas Anggota
                        </div>
                    </div>
                    <div class="section-card-body">
                        <div class="field-grid">

                            <div class="field-item span-12">
                                <label class="field-label">
                                    Nama Anggota <span class="required">*</span>
                                </label>
                                <input type="text" name="nama"
                                       class="form-input @error('nama') is-invalid @enderror"
                                       value="{{ old('nama') }}"
                                       placeholder="Masukkan nama lengkap">
                                @error('nama')
                                    <span class="field-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="field-item span-12">
                                <label class="field-label">Telepon</label>
                                <div class="input-icon-wrap">
                                    <i class="fas fa-phone input-icon"></i>
                                    <input type="text" name="telepon"
                                           class="form-input with-icon @error('telepon') is-invalid @enderror"
                                           value="{{ old('telepon') }}"
                                           placeholder="08xxxxxxxxxx">
                                </div>
                                @error('telepon')
                                    <span class="field-error">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Posisi & Jabatan --}}
                <div class="section-card">
                    <div class="section-card-header">
                        <div class="section-card-title">
                            <span class="title-icon" style="background:#f0fdf4; color:#10b981;">
                                <i class="fas fa-briefcase"></i>
                            </span>
                            Jabatan
                        </div>
                    </div>
                    <div class="section-card-body">
                        <div class="field-grid">

                            <div class="field-item span-12">
                                <label class="field-label">
                                    Jabatan <span class="required">*</span>
                                </label>
                                <input type="text" name="jabatan"
                                       class="form-input @error('jabatan') is-invalid @enderror"
                                       value="{{ old('jabatan') }}"
                                       placeholder="Contoh: Ketua Umum, Sekretaris">
                                @error('jabatan')
                                    <span class="field-error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="field-item span-12">
                                <label class="field-label">
                                    Divisi <span class="required">*</span>
                                </label>
                                <select name="divisi"
                                        class="form-select @error('divisi') is-invalid @enderror">
                                    <option value="">-- Pilih Divisi --</option>
                                    <option value="pengurus"  {{ old('divisi') == 'pengurus'  ? 'selected' : '' }}>Pengurus</option>
                                    <option value="pengawas"  {{ old('divisi') == 'pengawas'  ? 'selected' : '' }}>Pengawas</option>
                                    <option value="pelaksana" {{ old('divisi') == 'pelaksana' ? 'selected' : '' }}>Pelaksana</option>
                                </select>
                                @error('divisi')
                                    <span class="field-error">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

            </div>{{-- end main-col --}}

            {{-- ===== SIDEBAR ===== --}}
            <div class="sidebar-col">

                {{-- Upload Foto --}}
                <div class="section-card">
                    <div class="section-card-header">
                        <div class="section-card-title">
                            <span class="title-icon" style="background:#fdf4ff; color:#a855f7;">
                                <i class="fas fa-camera"></i>
                            </span>
                            Foto Anggota
                        </div>
                    </div>
                    <div class="section-card-body">

                        <div id="foto-placeholder" class="upload-placeholder">
                            <i class="fas fa-user-circle"></i>
                            <span>Belum ada foto dipilih</span>
                        </div>

                        <div id="foto-preview-wrap" class="preview-wrap hidden">
                            <img id="foto-preview" src="#" alt="Preview"
                                 class="foto-preview-img">
                        </div>

                        <input type="file" name="foto" id="foto-input"
                               class="file-input @error('foto') is-invalid @enderror"
                               accept="image/*"
                               onchange="previewFoto(this)">
                        <label for="foto-input" class="file-input-label">
                            <i class="fas fa-folder-open"></i> Pilih Foto
                        </label>
                        <p class="upload-hint">JPG, PNG, WEBP · Maks 2MB</p>

                        @error('foto')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="section-card">
                    <div class="section-card-body">
                        <div class="action-group">
                            <button type="submit" class="btn-save">
                                <i class="fas fa-save"></i> Simpan Anggota
                            </button>
                            <a href="{{ route('admin.data-master.struktur-organisasi.index') }}"
                               class="btn-cancel">
                                <i class="fas fa-times"></i> Batal
                            </a>
                        </div>
                    </div>
                </div>

            </div>{{-- end sidebar --}}

        </div>{{-- end form-layout --}}

    </form>
</div>

<style>
*, *::before, *::after { box-sizing: border-box; }

/* ===== WRAPPER ===== */
.page-wrapper {
    padding: 28px 32px;
    background: #f8fafc;
    min-height: 100vh;
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
}

/* ===== HEADER ===== */
.page-header {
    display: flex; align-items: center;
    justify-content: space-between;
    margin-bottom: 24px; flex-wrap: wrap; gap: 16px;
}
.header-left { display: flex; align-items: center; gap: 16px; }
.header-icon {
    width: 48px; height: 48px; background: #1e3a5f;
    border-radius: 12px; display: flex; align-items: center;
    justify-content: center; color: #fff;
    font-size: 1.2rem; flex-shrink: 0;
}
.page-title {
    font-size: 1.5rem; font-weight: 700;
    color: #0f172a; margin: 0 0 4px; line-height: 1.2;
}
.breadcrumb-nav {
    display: flex; align-items: center;
    gap: 6px; font-size: 0.8rem; color: #64748b;
}
.breadcrumb-link { color: #64748b; text-decoration: none; }
.breadcrumb-link:hover { color: #3b82f6; }
.breadcrumb-sep { font-size: 0.6rem; color: #cbd5e1; }
.breadcrumb-current { color: #1e3a5f; font-weight: 600; }

.btn-back {
    display: inline-flex; align-items: center; gap: 8px;
    background: #fff; color: #475569;
    border: 1px solid #e2e8f0; border-radius: 10px;
    padding: 10px 18px; font-size: 0.875rem; font-weight: 600;
    text-decoration: none; transition: background 0.2s;
}
.btn-back:hover { background: #f1f5f9; color: #334155; }

/* ===== ALERT ERROR ===== */
.alert-error-box {
    display: flex; gap: 12px; align-items: flex-start;
    background: #fff5f5; border: 1px solid #fecaca;
    border-left: 4px solid #ef4444; border-radius: 10px;
    padding: 14px 16px; margin-bottom: 20px;
}
.alert-error-icon { color: #ef4444; font-size: 1rem; padding-top: 2px; flex-shrink: 0; }
.alert-error-title { font-size: 0.875rem; font-weight: 700; color: #991b1b; margin: 0 0 6px; }
.alert-error-list {
    margin: 0; padding-left: 18px;
    font-size: 0.82rem; color: #b91c1c; line-height: 1.7;
}

/* ===== LAYOUT ===== */
.form-layout {
    display: grid;
    grid-template-columns: 1fr 280px;
    gap: 24px; align-items: start;
}
@media (max-width: 960px) { .form-layout { grid-template-columns: 1fr; } }
.main-col    { display: flex; flex-direction: column; gap: 20px; }
.sidebar-col { display: flex; flex-direction: column; gap: 20px; }

/* ===== SECTION CARD ===== */
.section-card {
    background: #fff; border-radius: 14px;
    border: 1px solid #f1f5f9;
    box-shadow: 0 1px 3px rgba(0,0,0,0.06); overflow: hidden;
}
.section-card-header {
    display: flex; align-items: center;
    padding: 16px 20px; border-bottom: 1px solid #f1f5f9;
}
.section-card-title {
    display: flex; align-items: center; gap: 10px;
    font-size: 0.9rem; font-weight: 700; color: #0f172a;
}
.title-icon {
    width: 32px; height: 32px; border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.85rem; flex-shrink: 0;
}
.section-card-body { padding: 20px; }

/* ===== FIELD GRID ===== */
.field-grid {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    gap: 16px;
}
.field-item { display: flex; flex-direction: column; gap: 5px; }
.span-12 { grid-column: span 12; }
@media (max-width: 640px) {
    .span-12 { grid-column: span 12; }
}

/* ===== FIELD LABEL ===== */
.field-label {
    font-size: 0.8rem; font-weight: 700; color: #374151;
    display: flex; align-items: center; gap: 6px;
}
.required { color: #ef4444; }

/* ===== INPUTS ===== */
.form-input,
.form-select {
    width: 100%; padding: 9px 12px;
    border: 1px solid #e2e8f0; border-radius: 8px;
    font-size: 0.875rem; color: #0f172a; background: #fff;
    outline: none; transition: border-color 0.2s, box-shadow 0.2s;
    font-family: inherit;
}
.form-input:focus,
.form-select:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
}
.form-input.is-invalid,
.form-select.is-invalid { border-color: #ef4444; }

.input-icon-wrap { position: relative; }
.input-icon {
    position: absolute; left: 12px; top: 50%;
    transform: translateY(-50%);
    color: #94a3b8; font-size: 0.8rem; pointer-events: none;
}
.form-input.with-icon { padding-left: 34px; }

.field-error { font-size: 0.78rem; color: #ef4444; font-weight: 500; }

/* ===== UPLOAD ===== */
.file-input { display: none; }

.upload-placeholder {
    border: 2px dashed #e2e8f0; border-radius: 10px;
    padding: 28px 16px; text-align: center; color: #94a3b8;
    margin-bottom: 12px; display: flex; flex-direction: column;
    align-items: center; gap: 8px; font-size: 0.8rem;
}
.upload-placeholder i { font-size: 2.2rem; }
.upload-placeholder.hidden { display: none; }

.preview-wrap { margin-bottom: 12px; }
.preview-wrap.hidden { display: none; }
.foto-preview-img {
    width: 100%; border-radius: 10px;
    border: 1px solid #e2e8f0; display: block;
    max-height: 200px; object-fit: cover;
}

.file-input-label {
    display: flex; align-items: center; justify-content: center; gap: 7px;
    background: #f1f5f9; color: #475569;
    border: 1px solid #e2e8f0; border-radius: 8px;
    padding: 9px 14px; font-size: 0.82rem; font-weight: 600;
    cursor: pointer; transition: background 0.2s; width: 100%;
}
.file-input-label:hover { background: #e2e8f0; color: #1e293b; }
.upload-hint { font-size: 0.72rem; color: #94a3b8; text-align: center; margin: 8px 0 0; }

/* ===== ACTION BUTTONS ===== */
.action-group { display: flex; flex-direction: column; gap: 10px; }
.btn-save {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    width: 100%; background: #1e3a5f; color: #fff;
    border: none; border-radius: 10px; padding: 12px 20px;
    font-size: 0.9rem; font-weight: 700; cursor: pointer;
    transition: background 0.2s, transform 0.1s; font-family: inherit;
}
.btn-save:hover { background: #1a3252; transform: translateY(-1px); }
.btn-cancel {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    width: 100%; background: #f8fafc; color: #64748b;
    border: 1px solid #e2e8f0; border-radius: 10px; padding: 11px 20px;
    font-size: 0.875rem; font-weight: 600;
    text-decoration: none; transition: background 0.2s;
}
.btn-cancel:hover { background: #f1f5f9; color: #334155; }

@media (max-width: 640px) { .page-wrapper { padding: 20px 16px; } }
</style>

@endsection

@push('scripts')
<script>
function previewFoto(input) {
    const wrap        = document.getElementById('foto-preview-wrap');
    const img         = document.getElementById('foto-preview');
    const placeholder = document.getElementById('foto-placeholder');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            img.src = e.target.result;
            wrap.classList.remove('hidden');
            placeholder.classList.add('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush