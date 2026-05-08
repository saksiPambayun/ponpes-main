@extends('admin.layout')

@section('title', 'Kelola Biaya Pendaftaran')
@section('page-title', 'Kelola Biaya Pendaftaran')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center"
            style="background: #eef3ec; border-bottom: 1px solid #dfe8d8;">
            <h5 class="mb-0" style="color: #005F02;">
                <i class="fas fa-money-bill-wave me-2"></i> Daftar Biaya Pendaftaran
            </h5>
            <a href="{{ route('admin.biaya-pendaftaran.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Tambah Biaya
            </a>
        </div>
        <div class="card-body">
            @if($biaya->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead style="background: #f4f4f4;">
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nama Biaya</th>
                                <th>Nominal</th>
                                <th>Urutan</th>
                                <th>Status</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($biaya as $index => $item)
                                <tr class="table-row">
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <strong>{{ $item->nama_biaya }}</strong>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-success">{{ $item->nominal_formatted }}</span>
                                    </td>
                                    <td>{{ $item->urutan }}</td>
                                    <td>
                                        @if($item->status == 'aktif')
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group gap-2 d-flex">
                                            <a href="{{ route('admin.biaya-pendaftaran.show', $item->id) }}"
                                                class="btn btn-sm btn-info" title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.biaya-pendaftaran.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button
                                                onclick="toggleStatus({{ $item->id }}, '{{ $item->nama_biaya }}', '{{ $item->status }}')"
                                                class="btn btn-sm {{ $item->status == 'aktif' ? 'btn-secondary' : 'btn-success' }}"
                                                title="{{ $item->status == 'aktif' ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                <i class="fas {{ $item->status == 'aktif' ? 'fa-ban' : 'fa-check' }}"></i>
                                            </button>
                                            <button onclick="openDeleteModal({{ $item->id }}, '{{ $item->nama_biaya }}')"
                                                class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>

                                        <form id="deleteForm{{ $item->id }}"
                                            action="{{ route('admin.biaya-pendaftaran.destroy', $item->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <form id="toggleForm{{ $item->id }}"
                                            action="{{ route('admin.biaya-pendaftaran.toggle-status', $item->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-money-bill-wave fa-4x mb-3" style="color: #8cbf73;"></i>
                    <p class="text-muted">Belum ada data biaya pendaftaran.</p>
                    <a href="{{ route('admin.biaya-pendaftaran.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Tambah Biaya Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection