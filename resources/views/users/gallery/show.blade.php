```blade
{{-- resources/views/users/gallery/show.blade.php --}}
@extends('layouts.user')

@section('title', 'Detail Gallery')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">{{ $gallery->judul }}</h4>
            <small class="text-muted">Detail foto gallery</small>
        </div>

        <a href="{{ route('user.gallery.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="row g-4">

        {{-- Foto --}}
        <div class="col-md-7">
            <div class="card border-0 shadow-sm">
                <img src="{{ Storage::url($gallery->gambar) }}" class="card-img-top" alt="{{ $gallery->judul }}"
                    style="max-height:500px; object-fit:cover;">
            </div>
        </div>

        {{-- Informasi --}}
        <div class="col-md-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">

                    <h5 class="fw-bold mb-3">Informasi Foto</h5>

                    <div class="mb-3">
                        <label class="text-muted small">Judul</label>
                        <div class="fw-semibold">{{ $gallery->judul }}</div>
                    </div>

                    <div class="mb-3">
                        <label class="text-muted small">Kategori</label>
                        <div>
                            <span class="badge
                                {{ $gallery->kategori == 'kegiatan' ? 'bg-primary' :
        ($gallery->kategori == 'prestasi' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                {{ ucfirst($gallery->kategori) }}
                            </span>
                        </div>
                    </div>

                    @if($gallery->tanggal_kegiatan)
                        <div class="mb-3">
                            <label class="text-muted small">Tanggal Kegiatan</label>
                            <div>
                                <i class="fas fa-calendar me-1"></i>
                                {{ \Carbon\Carbon::parse($gallery->tanggal_kegiatan)->format('d M Y') }}
                            </div>
                        </div>
                    @endif

                    @if($gallery->deskripsi)
                        <div class="mb-3">
                            <label class="text-muted small">Deskripsi</label>
                            <p class="mb-0">{{ $gallery->deskripsi }}</p>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="text-muted small">Upload</label>
                        <div>
                            {{ $gallery->created_at->format('d M Y H:i') }}
                        </div>
                    </div>

                </div>

                <div class="card-footer bg-white border-0 d-flex gap-2">

                    <a href="{{ route('user.gallery.index') }}" class="btn btn-outline-secondary flex-fill">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>

                    <form method="POST" action="{{ route('user.gallery.destroy', $gallery) }}"
                        onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
```