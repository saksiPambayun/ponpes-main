@extends('layouts.user')

@section('title', 'Detail Santri')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Data Santri</h1>
            <a href="{{ route('user.santri.index') }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left mr-1"></i>Kembali
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Nama Lengkap</label>
                    <p class="text-gray-800 font-medium">{{ $santri->nama_lengkap }}</p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">NISN</label>
                    <p class="text-gray-800">{{ $santri->nisn ?? '-' }}</p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Asal Sekolah</label>
                    <p class="text-gray-800">{{ $santri->asal_sekolah ?? '-' }}</p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Tanggal Lahir</label>
                    <p class="text-gray-800">
                        {{ $santri->tanggal_lahir ? \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d M Y') : '-' }}
                    </p>
                </div>
            </div>
            <div class="space-y-4">
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Email</label>
                    <p class="text-gray-800">{{ $santri->email ?? '-' }}</p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">No WhatsApp/Wali</label>
                    <p class="text-gray-800">{{ $santri->no_wali ?? '-' }}</p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Status</label>
                    <p>
                        @if($santri->status == 'pending')
                            <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Menunggu</span>
                        @elseif($santri->status == 'diterima')
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Diterima</span>
                        @else
                            <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Ditolak</span>
                        @endif
                    </p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Tanggal Daftar</label>
                    <p class="text-gray-800">{{ $santri->created_at->format('d M Y H:i') }}</p>
                </div>
            </div>
            <div class="md:col-span-2">
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Alamat</label>
                    <p class="text-gray-800">{{ $santri->alamat ?? '-' }}</p>
                </div>
            </div>
        </div>

        @if($santri->status == 'pending')
            <div class="flex justify-end gap-2 mt-6 pt-4 border-t">
                <a href="{{ route('user.santri.edit', $santri->id) }}"
                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    <i class="fas fa-edit mr-1"></i>Edit
                </a>
                <form action="{{ route('user.santri.destroy', $santri->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700"
                        onclick="return confirm('Hapus data ini?')">
                        <i class="fas fa-trash mr-1"></i>Hapus
                    </button>
                </form>
            </div>
        @endif
    </div>
@endsection
