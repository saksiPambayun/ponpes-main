@extends('layouts.admin')

@section('title', $title)

@section('content')
<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1 fw-bold">Manajemen Program</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Program</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('program.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Program
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Stats Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm text-center py-3">
                <h3 class="fw-bold text-primary mb-0">{{ $stats['total'] }}</h3>
                <small class="text-muted">Total Program</small>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm text-center py-3">
                <h3 class="fw-bold text-success mb-0">{{ $stats['aktif'] }}</h3>
                <small class="text-muted">Aktif</small>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm text-center py-3">
                <h3 class="fw-bold text-info mb-0">{{ $stats['selesai'] }}</h3>
                <small class="text-muted">Selesai</small>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm text-center py-3">
                <h3 class="fw-bold text-warning mb-0">{{ $stats['dinunda'] }}</h3>
                <small class="text-muted">Ditunda</small>
            </div>
        </div>
    </div>

    {{-- Filter & Search --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('program.index') }}" method="GET" class="row g-2">
                <div class="col-md-5">
                    <input type="text" name="search" class="form-control"
                        placeholder="Cari nama program..."
                        value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        <option value="pendidikan" {{ request('kategori') == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                        <option value="sosial"     {{ request('kategori') == 'sosial'     ? 'selected' : '' }}>Sosial</option>
                        <option value="keagamaan"  {{ request('kategori') == 'keagamaan'  ? 'selected' : '' }}>Keagamaan</option>
                        <option value="kesehatan"  {{ request('kategori') == 'kesehatan'  ? 'selected' : '' }}>Kesehatan</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="aktif"   {{ request('status') == 'aktif'   ? 'selected' : '' }}>Aktif</option>
                        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="dinunda" {{ request('status') == 'dinunda' ? 'selected' : '' }}>Ditunda</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search"></i>
                    </button>
                    <a href="{{ route('program.index') }}" class="btn btn-secondary w-100">
                        <i class="fas fa-undo"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    {{-- Table --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="50">#</th>
                            <th>Nama Program</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th width="130" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($programs as $i => $program)
                        <tr>
                            <td>{{ $programs->firstItem() + $i }}</td>
                            <td>
                                <div class="fw-semibold">{{ $program->nama_program }}</div>
                                <small class="text-muted">{{ Str::limit($program->deskripsi, 60) }}</small>
                            </td>
                            <td>
                                @php
                                    $kategoriColor = [
                                        'pendidikan' => 'primary',
                                        'sosial'     => 'info',
                                        'keagamaan'  => 'warning',
                                        'kesehatan'  => 'success',
                                    ];
                                @endphp
                                <span class="badge bg-{{ $kategoriColor[$program->kategori] ?? 'secondary' }}">
                                    {{ ucfirst($program->kategori) }}
                                </span>
                            </td>
                            <td>
                                @php
                                    $statusColor = [
                                        'aktif'   => 'success',
                                        'selesai' => 'secondary',
                                        'dinunda' => 'warning',
                                    ];
                                @endphp
                                <span class="badge bg-{{ $statusColor[$program->status] ?? 'secondary' }}">
                                    {{ ucfirst($program->status) }}
                                </span>
                            </td>
                            <td>{{ $program->tanggal_mulai ? $program->tanggal_mulai->format('d M Y') : '-' }}</td>
                            <td>{{ $program->tanggal_selesai ? $program->tanggal_selesai->format('d M Y') : '-' }}</td>
                            <td class="text-center">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('program.show', $program) }}"
                                       class="btn btn-sm btn-info text-white" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('program.edit', $program) }}"
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('program.destroy', $program) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus program ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                Belum ada data program.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($programs->hasPages())
        <div class="card-footer bg-white d-flex justify-content-between align-items-center">
            <small class="text-muted">
                Menampilkan {{ $programs->firstItem() }} - {{ $programs->lastItem() }}
                dari {{ $programs->total() }} data
            </small>
            {{ $programs->links() }}
        </div>
        @endif
    </div>

</div>
@endsection