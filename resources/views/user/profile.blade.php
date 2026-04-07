@extends('layouts.user')

@section('title', 'Profil Saya')

@section('content')
    <div class="mb-4">
        <h4 class="fw-bold mb-0">Profil Saya</h4>
        <small class="text-muted">Kelola informasi akun Anda</small>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        {{-- Info Profil --}}
        <div class="col-md-8 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">
                    <i class="fas fa-user-edit me-2 text-primary"></i>Informasi Profil
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.profile.update') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', auth()->user()->name) }}" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', auth()->user()->email) }}" required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">No. HP</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', auth()->user()->phone) }}">
                                @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror"
                                    rows="2">{{ old('address', auth()->user()->address) }}</textarea>
                                @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Info Akun --}}
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body text-center py-4">
                    <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3"
                        style="width:80px;height:80px;">
                        <i class="fas fa-user fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-0">{{ auth()->user()->name }}</h5>
                    <p class="text-muted small mb-2">{{ auth()->user()->email }}</p>
                    <span class="badge bg-secondary px-3 py-2">
                        <i class="fas fa-user me-1"></i>User
                    </span>
                    <hr>
                    <small class="text-muted">
                        <i class="fas fa-calendar me-1"></i>
                        Bergabung {{ auth()->user()->created_at->format('d M Y') }}
                    </small>
                </div>
            </div>
        </div>
    </div>

    {{-- Ganti Password --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-bold">
            <i class="fas fa-lock me-2 text-warning"></i>Ganti Password
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.profile.change-password') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Password Saat Ini <span class="text-danger">*</span></label>
                        <input type="password" name="current_password"
                            class="form-control @error('current_password') is-invalid @enderror" required>
                        @error('current_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Password Baru <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            required>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-key me-1"></i> Ganti Password
                </button>
            </form>
        </div>
    </div>
@endsection
