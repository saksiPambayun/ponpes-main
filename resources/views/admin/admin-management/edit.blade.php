{{-- resources/views/admin/admin-management/edit.blade.php --}}
@extends('admin.layout')
@section('title', 'Edit Admin')
@section('page-title', 'Edit Data Administrator')

@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header"
                    style="background: linear-gradient(135deg, var(--green-main), var(--green-dark)); color: white;">
                    <h4 class="mb-0"><i class="fas fa-user-edit"></i> Edit Admin: {{ $admin->name }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.admin-management.update', $admin->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $admin->name) }}" required>
                                @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Username <span class="text-danger">*</span></label>
                                <input type="text" name="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username', $admin->username) }}" required>
                                @error('username')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $admin->email) }}" required>
                                @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No Telepon</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $admin->phone) }}">
                                @error('phone')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password <span class="text-muted">(Kosongkan jika tidak
                                        diubah)</span></label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror"
                                rows="3">{{ old('address', $admin->address) }}</textarea>
                            @error('address')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status Akun</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="active" {{ $admin->status == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ $admin->status == 'inactive' ? 'selected' : '' }}>Nonaktif
                                </option>
                            </select>
                            @error('status')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <hr>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.admin-management.index') }}" class="btn btn-secondary"><i
                                    class="fas fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Admin</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4 border-danger">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0"><i class="fas fa-exclamation-triangle"></i> Danger Zone</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">Hapus Admin Ini</h6>
                            <p class="small text-muted mb-0">Tindakan ini tidak dapat dibatalkan. Admin akan dihapus
                                permanen.</p>
                        </div>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                            <i class="fas fa-trash"></i> Hapus Admin
                        </button>
                    </div>
                </div>
            </div>

            <form id="deleteForm" method="POST" action="{{ route('admin.admin-management.destroy', $admin->id) }}"
                style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>

    <script>
        function confirmDelete() {
            if (confirm('Yakin ingin menghapus admin ini? Tindakan tidak dapat dibatalkan!')) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
@endsection