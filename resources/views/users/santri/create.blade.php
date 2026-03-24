@extends('layouts.user')

@section('title', 'Daftar Santri Baru')

@section('content')
    <div class="mb-4">
        <a href="{{ route('user.santri.index') }}" class="btn btn-sm btn-outline-secondary mb-2">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
        <h4 class="fw-bold mb-0">Form Pendaftaran Santri</h4>
        <small class="text-muted">Data akan menunggu verifikasi admin setelah dikirim</small>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('user.santri.store') }}" enctype="multipart/form-data">
                @csrf

                <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">
                    <i class="fas fa-user me-2"></i>Data Santri
                </h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama_lengkap"
                            class="form-control @error('nama_lengkap') is-invalid @enderror"
                            value="{{ old('nama_lengkap') }}" required>
                        @error('nama_lengkap')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">NISN</label>
                        <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror"
                            value="{{ old('nisn') }}">
                        @error('nisn')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Asal Sekolah <span class="text-danger">*</span></label>
                        <input type="text" name="asal_sekolah"
                            class="form-control @error('asal_sekolah') is-invalid @enderror"
                            value="{{ old('asal_sekolah') }}" required>
                        @error('asal_sekolah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                            rows="2">{{ old('alamat') }}</textarea>
                        @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <h6 class="fw-bold text-primary mb-3 border-bottom pb-2 mt-2">
                    <i class="fas fa-users me-2"></i>Data Wali
                </h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Wali <span class="text-danger">*</span></label>
                        <input type="text" name="nama_wali" class="form-control @error('nama_wali') is-invalid @enderror"
                            value="{{ old('nama_wali') }}" required>
                        @error('nama_wali')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">No. HP Wali <span class="text-danger">*</span></label>
                        <input type="text" name="no_wali" class="form-control @error('no_wali') is-invalid @enderror"
                            value="{{ old('no_wali') }}" required>
                        @error('no_wali')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pekerjaan Wali</label>
                        <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror"
                            value="{{ old('pekerjaan') }}">
                        @error('pekerjaan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <h6 class="fw-bold text-primary mb-3 border-bottom pb-2 mt-2">
                    <i class="fas fa-paperclip me-2"></i>Dokumen (Opsional)
                </h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kartu Keluarga (KK)</label>
                        <input type="file" name="dok_kk" class="form-control @error('dok_kk') is-invalid @enderror"
                            accept=".pdf,.jpg,.jpeg,.png">
                        <div class="form-text">Format: PDF/JPG/PNG, maks 20MB</div>
                        @error('dok_kk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Akta Lahir</label>
                        <input type="file" name="dok_akta" class="form-control @error('dok_akta') is-invalid @enderror"
                            accept=".pdf,.jpg,.jpeg,.png">
                        <div class="form-text">Format: PDF/JPG/PNG, maks 20MB</div>
                        @error('dok_akta')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="alert alert-info mt-2">
                    <i class="fas fa-info-circle me-2"></i>
                    Setelah dikirim, pendaftaran akan berstatus <strong>Pending</strong> dan menunggu verifikasi dari admin.
                </div>

                <div class="d-flex justify-content-end gap-2 mt-3">
                    <a href="{{ route('user.santri.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-1"></i> Kirim Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
