@extends('admin.layout')

@section('title', 'Tambah Biaya Pendaftaran')
@section('page-title', 'Tambah Biaya Pendaftaran')

@section('content')
    <div class="card">
        <div class="card-header" style="background: #eef3ec; border-bottom: 1px solid #dfe8d8;">
            <h5 class="mb-0" style="color: #005F02;">
                <i class="fas fa-plus-circle me-2"></i> Form Tambah Biaya Pendaftaran
            </h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.biaya-pendaftaran.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_biaya" class="form-label">Nama Biaya <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_biaya') is-invalid @enderror" id="nama_biaya"
                        name="nama_biaya" value="{{ old('nama_biaya') }}"
                        placeholder="Contoh: Biaya Pendaftaran, Uang Masuk, SPP, dll." required>
                    @error('nama_biaya')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control @error('nominal') is-invalid @enderror" id="nominal"
                            name="nominal" value="{{ old('nominal') }}" placeholder="0" min="0" step="1000" required>
                    </div>
                    @error('nominal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Masukkan nominal dalam angka (tanpa titik atau koma)</small>
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                        name="keterangan" rows="3"
                        placeholder="Deskripsi atau keterangan tambahan">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="urutan" class="form-label">Urutan Tampil</label>
                    <input type="number" class="form-control @error('urutan') is-invalid @enderror" id="urutan"
                        name="urutan" value="{{ old('urutan', 0) }}" min="0" placeholder="0">
                    @error('urutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Semakin kecil angka, semakin atas tampilannya</small>
                </div>

                <div class="mb-4">
                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Hanya biaya dengan status "Aktif" yang akan ditampilkan di frontend</small>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.biaya-pendaftaran.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
