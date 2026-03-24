@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-4">
        <h4 class="fw-bold">Selamat datang, {{ auth()->user()->name }}! 👋</h4>
        <p class="text-muted">Berikut ringkasan data terkini.</p>
    </div>

    {{-- Stats Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                        <i class="fas fa-clock fa-lg text-warning"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Santri Pending</div>
                        <div class="fs-4 fw-bold">{{ $stats['santri_pending'] }}</div>
                        <span class="badge bg-warning text-dark">Menunggu verifikasi</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-success bg-opacity-10 p-3">
                        <i class="fas fa-user-check fa-lg text-success"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Santri Diterima</div>
                        <div class="fs-4 fw-bold">{{ $stats['santri_diterima'] }}</div>
                        <span class="badge bg-success">Terverifikasi</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-danger bg-opacity-10 p-3">
                        <i class="fas fa-user-times fa-lg text-danger"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Santri Ditolak</div>
                        <div class="fs-4 fw-bold">{{ $stats['santri_ditolak'] }}</div>
                        <span class="badge bg-danger">Tidak diterima</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-info bg-opacity-10 p-3">
                        <i class="fas fa-images fa-lg text-info"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Gallery Aktif</div>
                        <div class="fs-4 fw-bold">{{ $stats['gallery_total'] }}</div>
                        <a href="{{ route('user.gallery.index') }}" class="small text-info">Lihat gallery →</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                        <i class="fas fa-building fa-lg text-primary"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Total Fasilitas</div>
                        <div class="fs-4 fw-bold">{{ $stats['fasilitas_total'] }}</div>
                        <a href="{{ route('user.fasilitas.index') }}" class="small text-primary">Lihat fasilitas →</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-secondary bg-opacity-10 p-3">
                        <i class="fas fa-file-alt fa-lg text-secondary"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Akta Wakaf</div>
                        <div class="fs-4 fw-bold">{{ $stats['akta_wakaf_total'] }}</div>
                        <a href="{{ route('user.akta-wakaf.index') }}" class="small text-secondary">Lihat akta →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Pendaftaran Santri Terbaru --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h6 class="mb-0 fw-bold">Pendaftaran Santri Terbaru</h6>
            <a href="{{ route('user.santri.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus me-1"></i> Daftar Santri Baru
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Asal Sekolah</th>
                            <th>Status</th>
                            <th>Tanggal Daftar</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($santriTerbaru as $santri)
                            <tr>
                                <td>{{ $santri->nama_lengkap }}</td>
                                <td>{{ $santri->asal_sekolah ?? '-' }}</td>
                                <td>
                                    @if($santri->status === 'pending')
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-clock me-1"></i>Pending
                                        </span>
                                    @elseif($santri->status === 'diterima')
                                        <span class="badge bg-success">
                                            <i class="fas fa-check me-1"></i>Diterima
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            <i class="fas fa-times me-1"></i>Ditolak
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $santri->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('user.santri.show', $santri->id) }}" class="btn btn-sm btn-outline-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    Belum ada data santri.
                                    <a href="{{ route('user.santri.create') }}">Daftar sekarang</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($santriTerbaru->count() > 0)
            <div class="card-footer bg-white text-end">
                <a href="{{ route('user.santri.index') }}" class="btn btn-sm btn-outline-primary">
                    Lihat semua data santri →
                </a>
            </div>
        @endif
    </div>
@endsection