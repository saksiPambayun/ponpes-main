@extends('layouts.app')

@section('title', 'Detail Fasilitas')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-info-circle mr-2"></i>Detail Fasilitas
        </h1>

        <div>
            <span class="text-muted small mr-2">
                <i class="fas fa-calendar-alt mr-1"></i>{{ now()->format('d F Y') }}
            </span>

            <a href="{{ route('data-master.fasilitas.index') }}" class="btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50 mr-1"></i> Kembali
            </a>

            <a href="{{ route('data-master.fasilitas.edit', $fasilitas->id) }}" class="btn btn-sm btn-warning shadow-sm">
                <i class="fas fa-edit fa-sm text-white-50 mr-1"></i> Edit
            </a>

            <a href="#" class="btn btn-sm btn-primary shadow-sm" onclick="window.print()">
                <i class="fas fa-print fa-sm text-white-50 mr-1"></i> Print
            </a>
        </div>
    </div>

    <!-- Detail Fasilitas -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Informasi Fasilitas
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Nama Fasilitas</th>
                            <td>{{ $fasilitas->nama_fasilitas }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>{{ $fasilitas->kategori ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td>{{ $fasilitas->jumlah }} unit</td>
                        </tr>
                        <tr>
                            <th>Kondisi</th>
                            <td>{!! $fasilitas->kondisi_badge !!}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $fasilitas->lokasi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengadaan</th>
                            <td>{{ $fasilitas->tanggal_pengadaan ? $fasilitas->tanggal_pengadaan->format('d/m/Y') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $fasilitas->deskripsi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $fasilitas->keterangan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>{{ $fasilitas->created_at ? $fasilitas->created_at->format('d/m/Y H:i') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diupdate</th>
                            <td>{{ $fasilitas->updated_at ? $fasilitas->updated_at->format('d/m/Y H:i') : '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Foto Fasilitas
                    </h6>
                </div>
                <div class="card-body text-center">
                    @if($fasilitas->foto)
                        <img src="{{ asset('storage/'.$fasilitas->foto) }}" 
                             alt="Foto {{ $fasilitas->nama_fasilitas }}" 
                             class="img-fluid rounded">
                    @else
                        <div class="py-5">
                            <i class="fas fa-image fa-5x text-gray-300"></i>
                            <p class="mt-3 text-muted">Tidak ada foto</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection