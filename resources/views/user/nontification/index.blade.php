@extends('layouts.user')

@section('title', 'Notifikasi')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Notifikasi</h1>
            <p class="text-gray-500 text-sm">Pemberitahuan terbaru untuk Anda</p>
        </div>
        @if($notifications->count() > 0)
        <form action="{{ route('user.notifications.mark-all-read') }}" method="POST">
            @csrf
            <button type="submit" class="text-indigo-600 hover:text-indigo-800 text-sm">
                <i class="fas fa-check-double mr-1"></i>Tandai semua sudah dibaca
            </button>
        </form>
        @endif
    </div>

    @if($notifications->count() > 0)
        <div class="space-y-3">
            @foreach($notifications as $notif)
            <div class="border rounded-lg p-4 hover:bg-gray-50 transition {{ $notif->read_at ? 'bg-white' : 'bg-blue-50 border-blue-200' }}">
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0">
                        @if($notif->type == 'info')
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-info-circle text-blue-600"></i>
                            </div>
                        @elseif($notif->type == 'success')
                            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-600"></i>
                            </div>
                        @elseif($notif->type == 'warning')
                            <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                <i class="fas fa-exclamation-triangle text-yellow-600"></i>
                            </div>
                        @else
                            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                <i class="fas fa-bell text-indigo-600"></i>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-semibold text-gray-800">{{ $notif->title }}</h3>
                                <p class="text-gray-600 text-sm mt-1">{{ $notif->message }}</p>
                            </div>
                            <span class="text-xs text-gray-400">{{ $notif->created_at->diffForHumans() }}</span>
                        </div>
                        @if(!$notif->read_at)
                        <form action="{{ route('user.notifications.mark-read', $notif->id) }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="text-xs text-indigo-600 hover:text-indigo-800">
                                Tandai sudah dibaca
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $notifications->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <i class="fas fa-bell-slash text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500">Belum ada notifikasi</p>
            <p class="text-gray-400 text-sm mt-2">Notifikasi akan muncul di sini ketika ada pemberitahuan baru</p>
        </div>
    @endif
</div>

<!-- Notifikasi Real-time dengan JavaScript -->
<script>
    // Cek notifikasi baru setiap 30 detik
    setInterval(function() {
        fetch('{{ route("user.notifications.unread-count") }}')
            .then(response => response.json())
            .then(data => {
                if (data.count > 0) {
                    // Update badge notifikasi
                    const badge = document.getElementById('notification-badge');
                    if (badge) {
                        badge.textContent = data.count;
                        badge.classList.remove('hidden');
                    } else if (data.count > 0) {
                        // Buat badge baru
                        const bell = document.querySelector('.fa-bell');
                        if (bell) {
                            const badge = document.createElement('span');
                            badge.id = 'notification-badge';
                            badge.className = 'absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-1.5 py-0.5 min-w-[18px] text-center';
                            badge.textContent = data.count;
                            bell.parentElement.style.position = 'relative';
                            bell.parentElement.appendChild(badge);
                        }
                    }
                }
            });
    }, 30000);
</script>
@endsection
