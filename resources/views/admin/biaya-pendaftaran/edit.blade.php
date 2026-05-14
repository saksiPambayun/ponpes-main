@extends('admin.layout')

@section('title', 'Edit Biaya Pendaftaran')
@section('page-title', 'Edit Biaya Pendaftaran')

@section('content')
    <div class="card">
        <div class="card-header" style="background: #eef3ec; border-bottom: 1px solid #dfe8d8;">
            <h5 class="mb-0" style="color: #005F02;">
                <i class="fas fa-edit me-2"></i> Edit Biaya: {{ $biaya->nama_biaya }}
            </h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.biaya-pendaftaran.update', $biaya->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_biaya" class="form-label">Nama Biaya <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_biaya') is-invalid @enderror" id="nama_biaya"
                        name="nama_biaya" value="{{ old('nama_biaya', $biaya->nama_biaya) }}" required>
                    @error('nama_biaya')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control @error('nominal') is-invalid @enderror" id="nominal"
                            name="nominal" value="{{ old('nominal', $biaya->nominal) }}" min="0" step="1000" required>
                    </div>
                    @error('nominal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                        name="keterangan" rows="3">{{ old('keterangan', $biaya->keterangan) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="urutan" class="form-label">Urutan Tampil</label>
                    <input type="number" class="form-control @error('urutan') is-invalid @enderror" id="urutan"
                        name="urutan" value="{{ old('urutan', $biaya->urutan) }}" min="0">
                    @error('urutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="aktif" {{ old('status', $biaya->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status', $biaya->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif
                        </option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.biaya-pendaftaran.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
