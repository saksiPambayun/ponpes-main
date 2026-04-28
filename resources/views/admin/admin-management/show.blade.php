{{-- resources/views/admin/admin-management/show.blade.php --}}
@extends('admin.layout')
@section('title', 'Detail Admin')
@section('page-title', 'Detail Administrator')

@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header"
                    style="background: linear-gradient(135deg, var(--green-main), var(--green-dark)); color: white;">
                    <h4 class="mb-0"><i class="fas fa-user-circle"></i> Profil Admin</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="mx-auto w-24 h-24 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center text-white text-4xl font-bold mb-3"
                            style="width: 100px; height: 100px; font-size: 40px;">
                            {{ strtoupper(substr($admin->name, 0, 2)) }}
                        </div>
                        <h3>{{ $admin->name }}</h3>
                        <p class="text-muted">@ {{ $admin->username }}</p>
                        <div>
                            @if($admin->status == 'active')
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Nonaktif</span>
                            @endif
                            <span class="badge bg-warning text-dark">Admin</span>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Email</label>
                            <p class="mb-0"><i class="fas fa-envelope me-2 text-green-600"></i> {{ $admin->email }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">No Telepon</label>
                            <p class="mb-0"><i class="fas fa-phone me-2 text-green-600"></i> {{ $admin->phone ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="text-muted small">Alamat</label>
                        <p class="mb-0"><i class="fas fa-map-marker-alt me-2 text-green-600"></i>
                            {{ $admin->address ?? '-' }}</p>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Bergabung Sejak</label>
                            <p class="mb-0"><i class="far fa-calendar-alt me-2 text-green-600"></i>
                                {{ $admin->created_at->format('d F Y H:i') }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-muted small">Terakhir Diperbarui</label>
                            <p class="mb-0"><i class="fas fa-edit me-2 text-green-600"></i>
                                {{ $admin->updated_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.admin-management.index') }}" class="btn btn-secondary"><i
                                class="fas fa-arrow-left"></i> Kembali</a>
                        <div>
                            <a href="{{ route('admin.admin-management.edit', $admin->id) }}" class="btn btn-warning"><i
                                    class="fas fa-edit"></i> Edit</a>
                            <button type="button" class="btn btn-danger" onclick="confirmDelete()"><i
                                    class="fas fa-trash"></i> Hapus</button>
                        </div>
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