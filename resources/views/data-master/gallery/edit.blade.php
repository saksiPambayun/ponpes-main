@extends('admin.layout')

@section('title', 'Edit Gallery')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-edit mr-2"></i>Edit Gallery
        </h1>

        <div>
            <span class="text-muted small mr-2">
                <i class="fas fa-calendar-alt mr-1"></i>{{ now()->format('d F Y') }}
            </span>

            <a href="{{ route('data-master.gallery.index') }}" class="btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50 mr-1"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Form Edit Gallery -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Form Edit Gallery
            </h6>
        </div>

        <div class="card-body">
            <form action="{{ route('data-master.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Judul <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="judul" 
                                   class="form-control @error('judul') is-invalid @enderror" 
                                   value="{{ old('judul', $gallery->judul) }}" 
                                   required>
                            @error('judul')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kategori <span class="text-danger">*</span></label>
                            <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                                <option value="">Pilih Kategori</option>
                                <option value="kegiatan" {{ old('kategori', $gallery->kategori) == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                <option value="prestasi" {{ old('kategori', $gallery->kategori) == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                                <option value="umum" {{ old('kategori', $gallery->kategori) == 'umum' ? 'selected' : '' }}>Umum</option>
                            </select>
                            @error('kategori')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tanggal Kegiatan</label>
                            <input type="date" 
                                   name="tanggal_kegiatan" 
                                   class="form-control @error('tanggal_kegiatan') is-invalid @enderror" 
                                   value="{{ old('tanggal_kegiatan', $gallery->tanggal_kegiatan ? $gallery->tanggal_kegiatan->format('Y-m-d') : '') }}">
                            @error('tanggal_kegiatan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gambar</label>
                            @if($gallery->gambar)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/'.$gallery->gambar) }}" 
                                         alt="{{ $gallery->judul }}" 
                                         class="img-thumbnail" 
                                         style="max-height: 150px;">
                                    <small class="text-muted d-block">Gambar saat ini</small>
                                </div>
                            @endif
                            <div class="custom-file">
                                <input type="file" 
                                       name="gambar" 
                                       class="custom-file-input @error('gambar') is-invalid @enderror" 
                                       id="gambar"
                                       accept="image/*">
                                <label class="custom-file-label" for="gambar">Pilih file baru...</label>
                            </div>
                            <small class="text-muted">Format: jpeg, png, jpg, gif | Maks: 5MB (Kosongkan jika tidak ingin mengubah)</small>
                            @error('gambar')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Urutan</label>
                            <input type="number" 
                                   name="urut" 
                                   class="form-control @error('urut') is-invalid @enderror" 
                                   value="{{ old('urut', $gallery->urut) }}"
                                   min="0">
                            @error('urut')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" 
                                       name="is_active" 
                                       class="custom-control-input" 
                                       id="is_active"
                                       {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_active">
                                    Aktif (Tampilkan di halaman publik)
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" 
                              class="form-control @error('deskripsi') is-invalid @enderror" 
                              rows="4">{{ old('deskripsi', $gallery->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Preview Gambar Baru -->
                <div class="form-group">
                    <label>Preview Gambar Baru:</label>
                    <div id="preview-container">
                        <img id="preview" src="#" alt="Preview" class="img-fluid rounded" style="max-height: 300px; display: none;">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Update
                    </button>

                    <a href="{{ route('data-master.gallery.index') }}" class="btn btn-danger">
                        <i class="fas fa-times mr-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Preview gambar sebelum upload
    document.getElementById('gambar').addEventListener('change', function(e) {
        const preview = document.getElementById('preview');
        const file = e.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });

    // Update label file input
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || 'Pilih file...';
        const label = e.target.nextElementSibling;
        label.textContent = fileName;
    });
</script>
@endpush
@endsection