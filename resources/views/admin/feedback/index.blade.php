@extends('admin.layout')

@section('title', 'Kritik & Saran')
@section('page-title', 'Kritik dan Saran')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h3 class="text-xl font-bold text-gray-900">Kritik & Saran</h3>
        <p class="text-gray-500 text-sm mt-1">Kelola masukan dari pengunjung</p>
    </div>
    @if($unreadCount > 0)
    <form action="{{ route('admin.feedback.mark-all-read') }}" method="POST">
        @csrf
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            <i class="fas fa-check-double mr-2"></i>Tandai Semua Dibaca ({{ $unreadCount }})
        </button>
    </form>
    @endif
</div>

{{-- Statistik --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 mr-4">
                <i class="fas fa-envelope text-blue-600 text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Total Pesan</p>
                <h3 class="text-2xl font-bold">{{ $feedbacks->total() }}</h3>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-yellow-100 mr-4">
                <i class="fas fa-clock text-yellow-600 text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Belum Dibaca</p>
                <h3 class="text-2xl font-bold text-yellow-600">{{ $unreadCount }}</h3>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 mr-4">
                <i class="fas fa-reply-all text-green-600 text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500">Sudah Dibalas</p>
                <h3 class="text-2xl font-bold text-green-600">{{ $feedbacks->where('is_replied', true)->count() }}</h3>
            </div>
        </div>
    </div>
</div>

{{-- Daftar Pesan --}}
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pengirim</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pesan</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($feedbacks as $feedback)
            <tr class="{{ !$feedback->is_read ? 'bg-yellow-50' : '' }} hover:bg-gray-50">
                <td class="px-6 py-4">
                    @if(!$feedback->is_read)
                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            🔴 Belum Dibaca
                        </span>
                    @elseif($feedback->is_replied)
                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            ✅ Sudah Dibalas
                        </span>
                    @else
                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                            📖 Sudah Dibaca
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="font-medium">{{ $feedback->name }}</div>
                    <div class="text-xs text-gray-500">{{ $feedback->email }}</div>
                </td>
                <td class="px-6 py-4 text-sm truncate max-w-md">{{ $feedback->message }}</td>
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $feedback->created_at->format('d M Y H:i') }}</td>
                <td class="px-6 py-4 text-center">
                    <a href="{{ route('admin.feedback.show', $feedback->id) }}" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-eye"></i> Detail
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                    <i class="fas fa-inbox text-4xl mb-2 text-gray-300"></i>
                    <p>Belum ada kritik dan saran</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4 border-t">
        {{ $feedbacks->links() }}
    </div>
</div>
@endsection
