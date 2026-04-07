@extends('layouts.user')

@section('title', 'Notifikasi')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Notifikasi</h1>
                <p class="text-gray-500 text-sm">Pemberitahuan terbaru untuk Anda</p>
            </div>
        </div>

        @if($notifications->count() > 0)
            <div class="space-y-3">
                @foreach($notifications as $notif)
                    <div class="border rounded-lg p-4 {{ $notif->read_at ? 'bg-white' : 'bg-blue-50 border-blue-200' }}">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0">
                                @if($notif->type == 'success')
                                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                                        <i class="fas fa-check-circle text-green-600"></i>
                                    </div>
                                @elseif($notif->type == 'danger')
                                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                                        <i class="fas fa-times-circle text-red-600"></i>
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
                                        @if($notif->related_type == 'santri' && $notif->related_id)
                                            <a href="{{ route('user.santri.show', $notif->related_id) }}"
                                                class="text-indigo-600 text-xs mt-2 inline-block">
                                                Lihat Detail Santri →
                                            </a>
                                        @endif
                                    </div>
                                    <span class="text-xs text-gray-400">{{ $notif->created_at->diffForHumans() }}</span>
                                </div>
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
                <p class="text-gray-400 text-sm mt-2">Notifikasi akan muncul di sini ketika ada perubahan status pendaftaran
                    santri</p>
            </div>
        @endif
    </div>
@endsection
