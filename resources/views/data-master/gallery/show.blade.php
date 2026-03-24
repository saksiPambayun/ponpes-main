@extends('admin.layouts')

@section('title', 'Detail Gallery')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-info-circle mr-2"></i>Detail Gallery
        </h1>

        <div>
            <span class="text-muted small mr-2">
                <i class="fas fa-calendar-alt mr-1"></i>{{ now()->format('d F Y') }}
            </span>

            <a href="{{ route('data-master.gallery.index') }}" class="btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50 mr-1"></i> Kembali
            </a>

            <a href="{{ route('data-master.gallery.edit', $gallery->id) }}" class="btn btn-sm btn-warning shadow-sm">
                <i class="fas fa-edit fa-sm text-white-50 mr-1"></i> Edit
            </a>

            <a href="#" class="btn btn-sm btn-primary shadow-sm" onclick="window.print()">
                <i class="fas fa-print fa-sm text-white-50 mr-1"></i> Print
            </a>
        </div>
    </div>

    <!-- Detail Gallery -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Informasi Gallery
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Judul</th>
                            <td>{{ $gallery->judul }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>{!! $gallery->kategori_badge !!}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Kegiatan</th>
                            <td>{{ $gallery->tanggal_kegiatan ? $gallery->tanggal_kegiatan->format('d F Y') : '-' }}</td>
                        </tr>
                       
                        <tr>
                            <th>Urutan</th>
                            <td>{{ $gallery->urut }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $gallery->deskripsi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>{{ $gallery->created_at ? $gallery->created_at->format('d/m/Y H:i') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diupdate</th>
                            <td>{{ $gallery->updated_at ? $gallery->updated_at->format('d/m/Y H:i') : '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Gambar
                    </h6>
                </div>
                <div class="card-body text-center">
                    @if($gallery->gambar)
                        <img src="{{ asset('storage/'.$gallery->gambar) }}" 
                             alt="{{ $gallery->judul }}" 
                             class="img-fluid rounded mb-3">
                        <p class="text-muted small">Ukuran: {{ $gallery->gambar ? round(Storage::disk('public')->size($gallery->gambar) / 1024, 2) : 0 }} KB</p>
                    @else
                        <div class="py-5">
                            <i class="fas fa-image fa-5x text-gray-300"></i>
                            <p class="mt-3 text-muted">Tidak ada gambar</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection