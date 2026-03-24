{{-- resources/views/users/gallery/index.blade.php --}}
@extends('layouts.user')

@section('title', 'Gallery')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Gallery</h4>
            <small class="text-muted">Kumpulan foto kegiatan & prestasi</small>
        </div>
    </div>

    {{-- Filter --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" class="row g-2">
                <div class="col-md-5">
                    <input type="text" name="search" class="form-control" placeholder="Cari judul foto..."
                        value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        <option value="kegiatan" {{ request('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="prestasi" {{ request('kategori') == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                        <option value="umum" {{ request('kategori') == 'umum' ? 'selected' : '' }}>Umum</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('user.gallery.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
                </div>
            </form>
        </div>
    </div>

    {{-- Grid Gallery --}}
    @if($galleries->count() > 0)
        <div class="row g-3">
            @foreach($galleries as $gallery)
                <div class="col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="{{ Storage::url($gallery->gambar) }}" class="card-img-top" alt="{{ $gallery->judul }}"
                                style="height: 200px; object-fit: cover;">
                            <span
                                class="position-absolute top-0 end-0 m-2 badge
                                {{ $gallery->kategori == 'kegiatan' ? 'bg-primary' : ($gallery->kategori == 'prestasi' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                {{ ucfirst($gallery->kategori) }}
                            </span>
                        </div>
                        <div class="card-body pb-2">
                            <h6 class="card-title fw-semibold mb-1 text-truncate">{{ $gallery->judul }}</h6>
                            @if($gallery->tanggal_kegiatan)
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ \Carbon\Carbon::parse($gallery->tanggal_kegiatan)->format('d M Y') }}
                                </small>
                            @endif
                        </div>
                        <div class="card-footer bg-white border-0 d-flex gap-2">
                            <a href="{{ route('user.gallery.show', $gallery) }}" class="btn btn-sm btn-outline-info flex-fill">
                                <i class="fas fa-eye me-1"></i> Lihat
                            </a>
                            <form method="POST" action="{{ route('user.gallery.destroy', $gallery) }}"
                                onsubmit="return confirm('Hapus foto ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $galleries->withQueryString()->links() }}
        </div>
    @else
        <div class="text-center py-5 text-muted">
            <i class="fas fa-images fa-3x mb-3 opacity-25"></i>
            <p>Belum ada foto di gallery.</p>
        </div>
    @endif
@endsection
