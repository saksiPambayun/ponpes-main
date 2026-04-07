@extends('layouts.user')

@section('title', 'Detail Struktur Organisasi')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Struktur Organisasi</h1>
            <a href="{{ route('user.struktur.index') }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left mr-1"></i>Kembali
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Nama</label>
                    <p class="text-gray-800 font-medium">{{ $struktur->nama ?? $struktur->name ?? '-' }}</p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Jabatan</label>
                    <p class="text-gray-800">{{ $struktur->jabatan ?? $struktur->position ?? '-' }}</p>
                </div>
            </div>
            <div class="space-y-4">
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Periode</label>
                    <p class="text-gray-800">{{ $struktur->periode ?? '-' }}</p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Status</label>
                    <p class="text-gray-800">{{ $struktur->status ?? 'Aktif' }}</p>
                </div>
            </div>
            @if(isset($struktur->deskripsi) && $struktur->deskripsi)
                <div class="md:col-span-2">
                    <div class="border-b pb-2">
                        <label class="text-gray-500 text-sm">Deskripsi</label>
                        <p class="text-gray-800">{{ $struktur->deskripsi }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
