@extends('layouts.admin')

@section('title', $title)

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1 fw-bold">Edit Program</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('program.index') }}">Program</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('program.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('program.update', $program) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    {{-- Nama Program --}}
                    <div class="col-12">
                        <label class="form-label fw-semibold">Nama Program <span class="text-danger">*</span></label>
                        <input type="text" name="nama_program"
                               class="form-control @error('nama_program') is-invalid @enderror"
                               value="{{ old('nama_program', $program->nama_program) }}"
                               placeholder="Masukkan nama program">
                        @error('nama_program')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="col-12">
                        <label class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="deskripsi" rows="4"
                                  class="form-control @error('deskripsi') is-invalid @enderror"
                                  placeholder="Masukkan deskripsi program">{{ old('deskripsi', $program->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                        <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="pendidikan" {{ old('kategori', $program->kategori) == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                            <option value="sosial"     {{ old('kategori', $program->kategori) == 'sosial'     ? 'selected' : '' }}>Sosial</option>
                            <option value="keagamaan"  {{ old('kategori', $program->kategori) == 'keagamaan'  ? 'selected' : '' }}>Keagamaan</option>
                            <option value="kesehatan"  {{ old('kategori', $program->kategori) == 'kesehatan'  ? 'selected' : '' }}>Kesehatan</option>
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="">-- Pilih Status --</option>
                            <option value="aktif"   {{ old('status', $program->status) == 'aktif'   ? 'selected' : '' }}>Aktif</option>
                            <option value="selesai" {{ old('status', $program->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="dinunda" {{ old('status', $program->status) == 'dinunda' ? 'selected' : '' }}>Ditunda</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tanggal Mulai --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai"
                               class="form-control @error('tanggal_mulai') is-invalid @enderror"
                               value="{{ old('tanggal_mulai', $program->tanggal_mulai?->format('Y-m-d')) }}">
                        @error('tanggal_mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tanggal Selesai --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai"
                               class="form-control @error('tanggal_selesai') is-invalid @enderror"
                               value="{{ old('tanggal_selesai', $program->tanggal_selesai?->format('Y-m-d')) }}">
                        @error('tanggal_selesai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div class="col-12">
                        <label class="form-label fw-semibold">Gambar</label>
                        @if($program->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $program->gambar) }}" alt="Gambar saat ini"
                                 class="img-thumbnail" style="max-height: 150px;">
                            <small class="d-block text-muted mt-1">Gambar saat ini. Upload baru untuk mengganti.</small>
                        </div>
                        @endif
                        <input type="file" name="gambar"
                               class="form-control @error('gambar') is-invalid @enderror"
                               accept="image/*" onchange="previewImage(this)">
                        <small class="text-muted">Format: JPG, JPEG, PNG, WEBP. Maks: 2MB</small>
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div id="preview-container" class="mt-2 d-none">
                            <img id="preview-image" src="#" alt="Preview" class="img-thumbnail" style="max-height: 200px;">
                        </div>
                    </div>
                </div>

                <hr class="my-4">
                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('program.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
function previewImage(input) {
    const container = document.getElementById('preview-container');
    const img = document.getElementById('preview-image');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            img.src = e.target.result;
            container.classList.remove('d-none');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush