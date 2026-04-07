@extends('layouts.user')

@section('title', 'Notifikasi')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Notifikasi</h1>

        @if($notifications->count() > 0)
            <div class="space-y-3">
                @foreach($notifications as $notif)
                    <div class="border p-4 rounded {{ $notif->read_at ? 'bg-gray-50' : 'bg-blue-50' }}">
                        <h3 class="font-semibold">{{ $notif->title }}</h3>
                        <p class="text-gray-600 text-sm">{{ $notif->message }}</p>
                        <small class="text-gray-400">{{ $notif->created_at->diffForHumans() }}</small>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">{{ $notifications->links() }}</div>
        @else
            <p class="text-gray-500 text-center py-8">Belum ada notifikasi</p>
        @endif
    </div>
@endsection
