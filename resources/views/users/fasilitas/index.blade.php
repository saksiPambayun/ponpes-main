@extends('layouts.user')
@section('title', 'Fasilitas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0"><i class="fas fa-building me-2 text-primary"></i>Fasilitas Yayasan</h4>
            <p class="text-muted small mb-0">Daftar fasilitas yang tersedia</p>
        </div>
    </div>

    <div class="row g-4">
        @forelse($fasilitas as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    @if($item->foto)
                        <img src="{{ Storage::url($item->foto) }}" class="card-img-top" alt="{{ $item->nama }}"
                            style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-primary bg-opacity-10 d-flex align-items-center justify-content-center"
                            style="height: 200px;">
                            <i class="fas fa-building fa-3x text-primary"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $item->nama }}</h6>
                        <p class="card-text small text-muted">{{ Str::limit($item->deskripsi, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="badge bg-primary">{{ $item->kategori ?? 'Umum' }}</span>
                            <a href="{{ route('user.fasilitas.show', $item->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye me-1"></i>Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-building fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Belum ada data fasilitas.</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    @if($fasilitas->hasPages())
        <div class="mt-4">
            {{ $fasilitas->links() }}
        </div>
    @endif
@endsection