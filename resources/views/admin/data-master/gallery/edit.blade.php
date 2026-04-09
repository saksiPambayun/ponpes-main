@extends('admin.layout')

@section('title', 'Edit Gallery')
@section('page-title', 'Edit Gallery')

@push('styles')
<style>
    .form-card {
        background: #fff;
        border-radius: 20px;
        border: none;
        box-shadow: 0 2px 20px rgba(0,0,0,0.06);
        overflow: hidden;
        margin-bottom: 1.5rem;
    }

    .form-card-header {
        background: linear-gradient(135deg, #0ea5e9, #6366f1);
        padding: 1.2rem 1.8rem;
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
        font-size: 0.9rem;
        font-weight: 600;
    }

    .form-card-body {
        padding: 1.8rem;
    }

    .form-group {
        margin-bottom: 1.3rem;
    }

    .form-group label {
        font-size: 0.82rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.4rem;
        display: block;
    }

    .form-group label .req {
        color: #e53e3e;
        margin-left: 2px;
    }

    .form-control, .custom-file-label {
        font-family: 'Inter', sans-serif;
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

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%23a0aec0' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 0.9rem center;
        padding-right: 2.5rem;
        cursor: pointer;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    .invalid-feedback {
        font-size: 0.78rem;
        color: #e53e3e;
        margin-top: 0.35rem;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .current-photo {
        margin-bottom: 0.75rem;
    }

    .current-photo img {
        max-height: 120px;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
    }

    .text-muted {
        font-size: 0.72rem;
        color: #a0aec0;
        margin-top: 0.25rem;
        display: block;
    }

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

    .preview-box {
        border-radius: 12px;
        overflow: hidden;
        background: #f0f4f8;
        border: 1.5px solid #e2e8f0;
        display: none;
        position: relative;
        margin-top: 0.75rem;
    }

    .preview-box img {
        width: 100%;
        max-height: 220px;
        object-fit: cover;
        display: block;
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
        box-shadow: 0 4px 14px rgba(99, 102, 241, 0.3);
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
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
    }

    .btn-cancel:hover {
        background: #fed7d7;
        border-color: #fc8181;
        color: #c53030;
        text-decoration: none;
    }

    .form-actions {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding-top: 1rem;
        flex-wrap: wrap;
    }

    /* Custom File Input */
    .custom-file {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .custom-file-input {
        position: relative;
        z-index: 2;
        width: 100%;
        height: calc(1.5em + 0.75rem + 2px);
        margin: 0;
        opacity: 0;
    }

    .custom-file-label {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1;
        height: calc(1.5em + 0.75rem + 2px);
        padding: 0.65rem 0.9rem;
        font-weight: 400;
        line-height: 1.5;
        color: #2d3748;
        background-color: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        cursor: pointer;
    }

    .custom-file-label::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 3;
        display: block;
        padding: 0.65rem 0.9rem;
        line-height: 1.5;
        color: #fff;
        content: "Browse";
        background: linear-gradient(135deg, #0ea5e9, #6366f1);
        border-radius: 0 10px 10px 0;
    }

    .custom-file-input:focus ~ .custom-file-label {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
    }

    /* Checkbox */
    .custom-checkbox {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
    }

    .custom-checkbox input {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: #6366f1;
    }

    .custom-checkbox label {
        margin: 0;
        cursor: pointer;
        font-weight: 500;
        color: #2d3748;
    }
</style>
@endpush

@section('content')
<div class="page-wrapper" style="background: #f0f4f8; min-height: 100vh; padding: 2rem;">
    {{-- Page Header --}}
    <div class="page-header" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
        <div class="page-header-left" style="display: flex; align-items: center; gap: 1rem;">
            <div class="page-icon" style="width: 48px; height: 48px; background: linear-gradient(135deg, #0ea5e9, #6366f1); border-radius: 14px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 14px rgba(99, 102, 241, 0.35);">
                <i class="fas fa-edit" style="color: #fff; font-size: 1.1rem;"></i>
            </div>
            <div class="page-title">
                <h1 style="font-size: 1.35rem; font-weight: 700; color: #1a1f36; margin: 0;">Edit Gallery</h1>
                <p style="font-size: 0.8rem; color: #8898aa; margin: 0;"><i class="fas fa-calendar-alt mr-1"></i>{{ now()->format('d F Y') }}</p>
            </div>
        </div>

        <a href="{{ route('admin.data-master.gallery.index') }}" class="btn-back" style="display: inline-flex; align-items: center; gap: 0.45rem; padding: 0.55rem 1.1rem; background: #fff; border: 1.5px solid #e2e8f0; border-radius: 10px; color: #4a5568; font-size: 0.82rem; font-weight: 600; text-decoration: none;">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    {{-- Form Card --}}
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-clipboard-list"></i>
            <span>Form Edit Gallery</span>
        </div>

        <div class="form-card-body">
            <form action="{{ route('admin.data-master.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="section-label">Informasi Gallery</div>

                <div class="row" style="display: flex; flex-wrap: wrap; gap: 1.5rem;">
                    <div class="col-md-6" style="flex: 1; min-width: 250px;">
                        <div class="form-group">
                            <label>Judul <span class="req">*</span></label>
                            <input type="text"
                                   name="judul"
                                   class="form-control @error('judul') is-invalid @enderror"
                                   value="{{ old('judul', $gallery->judul) }}"
                                   required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kategori <span class="req">*</span></label>
                            <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                                <option value="">Pilih Kategori</option>
                                <option value="kegiatan" {{ old('kategori', $gallery->kategori) == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                <option value="prestasi" {{ old('kategori', $gallery->kategori) == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                                <option value="umum" {{ old('kategori', $gallery->kategori) == 'umum' ? 'selected' : '' }}>Umum</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tanggal Kegiatan <span class="opt">(opsional)</span></label>
                            <input type="date"
                                   name="tanggal_kegiatan"
                                   class="form-control @error('tanggal_kegiatan') is-invalid @enderror"
                                   value="{{ old('tanggal_kegiatan', $gallery->tanggal_kegiatan ? $gallery->tanggal_kegiatan->format('Y-m-d') : '') }}">
                            @error('tanggal_kegiatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6" style="flex: 1; min-width: 250px;">
                        <div class="form-group">
                            <label>Urutan</label>
                            <input type="number"
                                   name="urut"
                                   class="form-control @error('urut') is-invalid @enderror"
                                   value="{{ old('urut', $gallery->urut) }}"
                                   min="0"
                                   placeholder="Urutan tampilan (1, 2, 3...)">
                            @error('urut')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="custom-checkbox">
                                <input type="checkbox"
                                       name="is_active"
                                       id="is_active"
                                       {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                                <label for="is_active">
                                    Aktif (Tampilkan di halaman publik)
                                </label>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="section-label">Deskripsi</div>

                <div class="form-group">
                    <label>Deskripsi <span class="opt">(opsional)</span></label>
                    <textarea name="deskripsi"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              rows="4"
                              placeholder="Tuliskan deskripsi gallery...">{{ old('deskripsi', $gallery->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="section-label">Media</div>

                <div class="form-group">
                    <label>Gambar</label>
                    @if($gallery->gambar)
                        <div class="current-photo">
                            <img src="{{ asset('storage/'.$gallery->gambar) }}"
                                 alt="{{ $gallery->judul }}">
                            <small class="text-muted">Gambar saat ini</small>
                        </div>
                    @endif
                    <div class="custom-file">
                        <input type="file"
                               name="gambar"
                               class="custom-file-input @error('gambar') is-invalid @enderror"
                               id="gambarInput"
                               accept="image/*">
                        <label class="custom-file-label" for="gambarInput">Pilih file baru...</label>
                    </div>
                    <small class="text-muted">Format: jpeg, png, jpg, gif | Maks: 5MB (Kosongkan jika tidak ingin mengubah)</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Preview Gambar Baru --}}
                <div class="preview-box" id="previewBox">
                    <img id="previewImg" src="#" alt="Preview">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-save">
                        <i class="fas fa-save"></i> Update
                    </button>

                    <a href="{{ route('admin.data-master.gallery.index') }}" class="btn-cancel">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Preview gambar sebelum upload
    const gambarInput = document.getElementById('gambarInput');
    const previewBox = document.getElementById('previewBox');
    const previewImg = document.getElementById('previewImg');

    gambarInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        const label = this.nextElementSibling;

        if (file) {
            // Update label dengan nama file
            label.textContent = file.name;

            // Preview gambar
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewBox.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            label.textContent = 'Pilih file baru...';
            previewBox.style.display = 'none';
            previewImg.src = '#';
        }
    });
</script>
@endpush
@endsection
