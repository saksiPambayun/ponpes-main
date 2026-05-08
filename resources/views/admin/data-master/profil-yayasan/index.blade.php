@extends('admin.layout')

@section('title', 'Kelola Gallery')
@section('page-title', 'Gallery')

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h2 class="mb-1" style="color: #005F02;">Kelola Gallery</h2>
                    <p class="text-muted mb-0">Kelola foto gallery kegiatan pondok pesantren</p>
                </div>
                <a href="{{ route('admin.data-master.gallery.create') }}" class="btn btn-primary" style="background: #005F02; border: none;">
                    <i class="fas fa-plus me-2"></i> Tambah Gallery
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="background: #eef3ec; border-left: 4px solid #005F02; color: #0d4f14;">
            <i class="fas fa-check-circle me-2" style="color: #005F02;"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Statistik Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card text-center" style="background: #ffffff; border-radius: 16px; border: 1px solid #dfe8d8;">
                <div class="card-body">
                    <div class="p-3 rounded-full mx-auto mb-3" style="background: #eef3ec; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                        <i class="fas fa-images fa-2x" style="color: #005F02;"></i>
                    </div>
                    <h3 class="mb-0" style="color: #222;">{{ $galleries->total() ?? 0 }}</h3>
                    <p class="text-muted mb-0">Total Gallery</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center" style="background: #ffffff; border-radius: 16px; border: 1px solid #dfe8d8;">
                <div class="card-body">
                    <div class="p-3 rounded-full mx-auto mb-3" style="background: #eef3ec; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                        <i class="fas fa-calendar-check fa-2x" style="color: #005F02;"></i>
                    </div>
                    <h3 class="mb-0" style="color: #222;">0</h3>
                    <p class="text-muted mb-0">Kegiatan</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center" style="background: #ffffff; border-radius: 16px; border: 1px solid #dfe8d8;">
                <div class="card-body">
                    <div class="p-3 rounded-full mx-auto mb-3" style="background: #eef3ec; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                        <i class="fas fa-trophy fa-2x" style="color: #005F02;"></i>
                    </div>
                    <h3 class="mb-0" style="color: #222;">1</h3>
                    <p class="text-muted mb-0">Prestasi</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-center" style="background: #ffffff; border-radius: 16px; border: 1px solid #dfe8d8;">
                <div class="card-body">
                    <div class="p-3 rounded-full mx-auto mb-3" style="background: #eef3ec; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                        <i class="fas fa-newspaper fa-2x" style="color: #005F02;"></i>
                    </div>
                    <h3 class="mb-0" style="color: #222;">1</h3>
                    <p class="text-muted mb-0">Umum</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Form -->
    <div class="card mb-4" style="background: #ffffff; border-radius: 16px; border: 1px solid #dfe8d8;">
        <div class="card-header" style="background: #005F02; border-bottom: 1px solid #0d4f14; border-radius: 16px 16px 0 0;">
            <h5 class="mb-0" style="color: #ffffff;">
                <i class="fas fa-filter me-2"></i> Filter Data
            </h5>
        </div>
        <div class="card-body" style="background: #ffffff;">
            <form method="GET" action="{{ route('admin.data-master.gallery.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label for="search" class="form-label" style="color: #333; font-weight: 500;">CARI</label>
                    <input type="text" name="search" id="search" class="form-control" 
                           placeholder="Judul atau deskripsi..." value="{{ request('search') }}"
                           style="border-color: #dfe8d8; border-radius: 8px;">
                </div>
                <div class="col-md-3">
                    <label for="kategori" class="form-label" style="color: #333; font-weight: 500;">KATEGORI</label>
                    <select name="kategori" id="kategori" class="form-select" style="border-color: #dfe8d8; border-radius: 8px;">
                        <option value="">Semua Kategori</option>
                        <option value="kegiatan" {{ request('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="prestasi" {{ request('kategori') == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                        <option value="umum" {{ request('kategori') == 'umum' ? 'selected' : '' }}>Umum</option>
                    </select>
                </div>
                <div class="col-md-5 d-flex align-items-end gap-2">
                    <button type="submit" class="btn" style="background: #005F02; color: #ffffff; border: none; border-radius: 8px; padding: 8px 20px;">
                        <i class="fas fa-search me-1"></i> Cari
                    </button>
                    <a href="{{ route('admin.data-master.gallery.index') }}" class="btn" style="background: #dfe8d8; color: #333; border: none; border-radius: 8px; padding: 8px 20px; text-decoration: none;">
                        <i class="fas fa-undo me-1"></i> Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Gallery -->
    <div class="card" style="background: #ffffff; border-radius: 16px; border: 1px solid #dfe8d8; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead style="background: #005F02;">
                    <tr>
                        <th style="width: 50px; color: #ffffff; font-weight: 600; padding: 12px 16px;">NO</th>
                        <th style="color: #ffffff; font-weight: 600; padding: 12px 16px;">GAMBAR</th>
                        <th style="color: #ffffff; font-weight: 600; padding: 12px 16px;">JUDUL</th>
                        <th style="color: #ffffff; font-weight: 600; padding: 12px 16px;">KATEGORI</th>
                        <th style="color: #ffffff; font-weight: 600; padding: 12px 16px;">TANGGAL</th>
                        <th style="width: 120px; color: #ffffff; font-weight: 600; padding: 12px 16px;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galleries as $index => $gallery)
                        <tr class="table-row" style="border-bottom: 1px solid #dfe8d8;">
                            <td>{{ $galleries->firstItem() + $index }}</td>
                            <td>
                                @if($gallery->gambar)
                                    <img src="{{ asset('storage/' . $gallery->gambar) }}" alt="{{ $gallery->judul }}" 
                                         style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                                @else
                                    <div style="width: 50px; height: 50px; background: #eef3ec; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-image" style="color: #8cbf73;"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong style="color: #222;">{{ $gallery->judul ?? '-' }}</strong>
                                @if($gallery->deskripsi)
                                    <br><small class="text-muted" style="color: #666;">{{ Str::limit($gallery->deskripsi, 50) }}</small>
                                @endif
                            </td>
                            <td>
                                @php
                                    $kategoriColors = [
                                        'kegiatan' => ['bg' => '#eef3ec', 'color' => '#005F02'],
                                        'prestasi' => ['bg' => '#e8f5e9', 'color' => '#2e7d32'],
                                        'umum' => ['bg' => '#e3f2fd', 'color' => '#1565c0'],
                                    ];
                                    $color = $kategoriColors[$gallery->kategori] ?? ['bg' => '#f5f5f5', 'color' => '#666'];
                                @endphp
                                <span class="badge" style="background: {{ $color['bg'] }}; color: {{ $color['color'] }}; padding: 5px 12px; border-radius: 20px; font-size: 0.75rem;">
                                    {{ ucfirst($gallery->kategori ?? 'Umum') }}
                                </span>
                            </td>
                            <td style="color: #333;">
                                {{ $gallery->created_at ? \Carbon\Carbon::parse($gallery->created_at)->format('d/m/Y') : '-' }}
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.data-master.gallery.show', $gallery->id) }}" 
                                       class="btn btn-sm" style="background: #0dcaf0; color: #000; border: none; width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 6px;" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.data-master.gallery.edit', $gallery->id) }}" 
                                       class="btn btn-sm" style="background: #ffc107; color: #000; border: none; width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 6px;" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button onclick="openDeleteModal({{ $gallery->id }}, '{{ addslashes($gallery->judul) }}')" 
                                            class="btn btn-sm" style="background: #dc3545; color: #fff; border: none; width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 6px;" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <form id="deleteForm{{ $gallery->id }}" 
                                      action="{{ route('admin.data-master.gallery.destroy', $gallery->id) }}" 
                                      method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5" style="background: #ffffff;">
                                <i class="fas fa-images fa-4x mb-3" style="color: #8cbf73;"></i>
                                <p class="text-muted mb-0">Belum ada data gallery.</p>
                                <a href="{{ route('admin.data-master.gallery.create') }}" class="btn btn-sm mt-3" style="background: #005F02; color: #ffffff; border: none; border-radius: 8px;">
                                    <i class="fas fa-plus me-1"></i> Tambah Gallery Pertama
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($galleries->hasPages())
            <div class="card-footer" style="background: #ffffff; border-top: 1px solid #dfe8d8;">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>

    <style>
        /* Table row hover effect */
        .table-row:hover {
            background: #eef3ec !important;
            transition: all 0.2s ease;
        }

        /* Table header styling */
        .table thead th {
            font-weight: 600;
            font-size: 0.85rem;
            border-bottom: none;
        }

        /* Table cell styling */
        .table tbody td {
            vertical-align: middle;
        }

        /* Button hover effects */
        .btn-sm:hover {
            transform: translateY(-1px);
            transition: all 0.2s ease;
        }

        /* Pagination styling */
        .pagination {
            margin: 0;
            justify-content: flex-end;
        }

        .pagination .page-item .page-link {
            color: #005F02;
            border-color: #dfe8d8;
            background: #ffffff;
        }

        .pagination .page-item.active .page-link {
            background: #005F02;
            border-color: #005F02;
            color: #ffffff;
        }

        .pagination .page-item .page-link:hover {
            background: #eef3ec;
            color: #0d4f14;
        }

        /* Form control focus */
        .form-control:focus, 
        .form-select:focus {
            border-color: #005F02;
            box-shadow: 0 0 0 0.2rem rgba(0, 95, 2, 0.15);
            outline: none;
        }
    </style>
@endsection