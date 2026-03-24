{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">Total Users</h6>
                        <h2 class="mt-2 mb-0">{{ \App\Models\User::count() }}</h2>
                    </div>
                    <i class="fas fa-users fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">Active Users</h6>
                        <h2 class="mt-2 mb-0">{{ \App\Models\User::where('status', 'active')->count() }}</h2>
                    </div>
                    <i class="fas fa-user-check fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">Admins</h6>
                        <h2 class="mt-2 mb-0">{{ \App\Models\User::where('role', 'admin')->count() }}</h2>
                    </div>
                    <i class="fas fa-user-tie fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">Regular Users</h6>
                        <h2 class="mt-2 mb-0">{{ \App\Models\User::where('role', 'user')->count() }}</h2>
                    </div>
                    <i class="fas fa-user fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Recent Users</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Joined</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\User::latest()->take(5)->get() as $user)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $user->avatar_url }}" alt="Avatar" 
                                             class="rounded-circle me-2" width="30" height="30">
                                        <div>
                                            <strong>{{ $user->name }}</strong><br>
                                            <small>{{ $user->email }}</small>
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
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Statistics</h5>
            </div>
            <div class="card-body">
                <canvas id="userChart"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('userChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Active Users', 'Inactive Users', 'Admins', 'Regular Users'],
            datasets: [{
                data: [
                    {{ \App\Models\User::where('status', 'active')->count() }},
                    {{ \App\Models\User::where('status', 'inactive')->count() }},
                    {{ \App\Models\User::where('role', 'admin')->count() }},
                    {{ \App\Models\User::where('role', 'user')->count() }}
                ],
                backgroundColor: ['#28a745', '#dc3545', '#007bff', '#17a2b8']
            }]
        }
    });
</script>
@endpush
@endsection