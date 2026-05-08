@extends('admin.layout')

@section('title', 'Detail Biaya Pendaftaran')
@section('page-title', 'Detail Biaya Pendaftaran')

@section('content')
    <div class="card">
        <div class="card-header" style="background: #eef3ec; border-bottom: 1px solid #dfe8d8;">
            <h5 class="mb-0" style="color: #005F02;">
                <i class="fas fa-info-circle me-2"></i> Detail Biaya: {{ $biaya->nama_biaya }}
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <th style="width: 150px;">Nama Biaya</th>
                            <td>: <strong>{{ $biaya->nama_biaya }}</strong></td>
                        </tr>
                        <tr>
                            <th>Nominal</th>
                            <td>: <span class="text-success fw-bold fs-4">{{ $biaya->nominal_formatted }}</span></td>
                        </tr>
                        <tr>
                            <th>Urutan</th>
                            <td>: {{ $biaya->urutan }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:
                                @if($biaya->status == 'aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>: {{ $biaya->created_at ? $biaya->created_at->format('d/m/Y H:i:s') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diupdate</th>
                            <td>: {{ $biaya->updated_at ? $biaya->updated_at->format('d/m/Y H:i:s') : '-' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6 class="card-title"><i class="fas fa-file-alt me-2"></i>Keterangan</h6>
                            <p class="card-text">{{ $biaya->keterangan ?? 'Tidak ada keterangan' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-end gap-2">
                <a href="{{ route('admin.biaya-pendaftaran.edit', $biaya->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
                <a href="{{ route('admin.biaya-pendaftaran.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
