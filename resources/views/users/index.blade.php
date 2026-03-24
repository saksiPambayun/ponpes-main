{{-- resources/views/admin/users/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>User Management</h2>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New User
    </a>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.users.index') }}" class="row g-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" 
                       placeholder="Search by name, email, username..." 
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <select name="role" class="form-select">
                    <option value="">All Roles</option>
                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-filter"></i> Filter
                </button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary w-100">
                    <i class="fas fa-redo"></i> Reset
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Bulk Actions -->
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.bulk-action') }}" id="bulkActionForm">
            @csrf
            <div class="row mb-3">
                <div class="col-md-2">
                    <select name="action" class="form-select" required>
                        <option value="">Bulk Actions</option>
                        <option value="activate">Activate</option>
                        <option value="deactivate">Deactivate</option>
                        <option value="delete">Delete</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')">
                        Apply to Selected
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="30">
                                <input type="checkbox" id="selectAll">
                            </th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Joined</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>
                                @if($user->id !== auth()->id())
                                    <input type="checkbox" name="users[]" value="{{ $user->id }}" class="userCheckbox">
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $user->avatar_url }}" alt="Avatar" 
                                         class="rounded-circle me-2" width="40" height="40">
                                    <div>
                                        <strong>{{ $user->name }}</strong><br>
                                        <small>{{ $user->email }}</small><br>
                                        <small class="text-muted">@ {{ $user->username }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($user->role === 'admin')
                                    <span class="badge bg-primary">Admin</span>
                                @else
                                    <span class="badge bg-secondary">User</span>
                                @endif
                            </td>
                            <td>
                                @if($user->status === 'active')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at_formatted }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user) }}" 
                                   class="btn btn-sm btn-info" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if($user->id !== auth()->id())
                                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" 
                                          class="d-inline" onsubmit="return confirm('Delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                No users found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </form>

        <div class="d-flex justify-content-center mt-4">
            {{ $users->withQueryString()->links() }}
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('selectAll').addEventListener('change', function() {
    document.querySelectorAll('.userCheckbox').forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});
</script>
@endpush
@endsection