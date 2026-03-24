@extends('admin.layout')

@section('title', 'Detail Anggota Organisasi')

@section('content')
<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1 font-weight-bold">Detail Anggota Organisasi</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.data-master.struktur-organisasi.index') }}">Struktur Organisasi</a>
                    </li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.data-master.struktur-organisasi.edit', $anggota) }}"
               class="btn btn-warning mr-2">
                <i class="fas fa-edit mr-1"></i> Edit
            </a>
            <a href="{{ route('admin.data-master.struktur-organisasi.index') }}"
               class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">

        {{-- Card Profil --}}
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm text-center py-4">
                @if($anggota->foto)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $anggota->foto) }}"
                             alt="{{ $anggota->nama }}"
                             class="rounded-circle shadow"
                             style="width:120px;height:120px;object-fit:cover;">
                    </div>
                @else
                    <div class="d-flex justify-content-center mb-3">
                        <div class="rounded-circle bg-light d-flex align-items-center
                                    justify-content-center shadow"
                             style="width:120px;height:120px;">
                            <i class="fas fa-user fa-3x text-muted"></i>
                        </div>
                    </div>
                @endif

                <h5 class="font-weight-bold mb-1">{{ $anggota->nama }}</h5>
                <p class="text-muted mb-2">{{ $anggota->jabatan }}</p>

                @php
                    $divisiColor = [
                        'pengurus'  => 'warning',
                        'pengawas'  => 'info',
                        'pelaksana' => 'secondary',
                        'lainnya'   => 'dark',
                    ];
                @endphp

                <div class="d-flex justify-content-center mb-3">
                    <span class="badge badge-{{ $divisiColor[$anggota->divisi] ?? 'secondary' }} px-3 py-2 mr-2">
                        {{ ucfirst($anggota->divisi) }}
                    </span>
                    <span class="badge badge-{{ $anggota->status === 'aktif' ? 'success' : 'danger' }} px-3 py-2">
                        {{ $anggota->status === 'aktif' ? 'Aktif' : 'Non Aktif' }}
                    </span>
                </div>

                @if($anggota->telepon || $anggota->email)
                <hr class="mx-3">
                <div class="px-3 text-left">
                    @if($anggota->telepon)
                    <p class="mb-2 small">
                        <i class="fas fa-phone mr-2 text-primary"></i>{{ $anggota->telepon }}
                    </p>
                    @endif
                    @if($anggota->email)
                    <p class="mb-0 small">
                        <i class="fas fa-envelope mr-2 text-primary"></i>{{ $anggota->email }}
                    </p>
                    @endif
                </div>
                @endif
            </div>
        </div>

        {{-- Detail Info --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white font-weight-bold border-bottom py-3">
                    <i class="fas fa-info-circle mr-2 text-primary"></i>Informasi Detail
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <small class="text-muted d-block">Nama Lengkap</small>
                            <strong>{{ $anggota->nama }}</strong>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <small class="text-muted d-block">Jabatan</small>
                            <strong>{{ $anggota->jabatan }}</strong>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <small class="text-muted d-block">Divisi</small>
                            <span class="badge badge-{{ $divisiColor[$anggota->divisi] ?? 'secondary' }}">
                                {{ ucfirst($anggota->divisi) }}
                            </span>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <small class="text-muted d-block">Status</small>
                            <span class="badge badge-{{ $anggota->status === 'aktif' ? 'success' : 'danger' }}">
                                {{ $anggota->status === 'aktif' ? 'Aktif' : 'Non Aktif' }}
                            </span>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <small class="text-muted d-block">Urutan Tampil</small>
                            <strong>{{ $anggota->urutan }}</strong>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <small class="text-muted d-block">Telepon</small>
                            <strong>{{ $anggota->telepon ?? '-' }}</strong>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <small class="text-muted d-block">Email</small>
                            <strong>{{ $anggota->email ?? '-' }}</strong>
                        </div>
                        @if($anggota->deskripsi)
                        <div class="col-12 mb-3">
                            <small class="text-muted d-block">Deskripsi</small>
                            <p class="mb-0">{{ $anggota->deskripsi }}</p>
                        </div>
                        @endif
                        <div class="col-sm-6 mb-3">
                            <small class="text-muted d-block">Ditambahkan</small>
                            <span>{{ $anggota->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block">Diperbarui</small>
                            <span>{{ $anggota->updated_at->format('d M Y, H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Aksi Hapus --}}
            <div class="card border-0 shadow-sm">
                <div class="card-body d-flex justify-content-end">
                    <form action="{{ route('admin.data-master.struktur-organisasi.destroy', $anggota) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mr-2">
                            <i class="fas fa-trash mr-1"></i> Hapus
                        </button>
                    </form>
                    <a href="{{ route('admin.data-master.struktur-organisasi.edit', $anggota) }}"
                       class="btn btn-warning">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection