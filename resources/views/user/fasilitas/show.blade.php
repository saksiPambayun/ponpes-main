@extends('layouts.user')

@section('title', 'Detail Fasilitas')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Fasilitas</h1>
            <a href="{{ route('user.fasilitas.index') }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left mr-1"></i>Kembali
            </a>
        </div>

        @if($fasilitas->foto)
            <div class="mb-6">
                <img src="{{ asset('storage/' . $fasilitas->foto) }}" class="w-full max-h-96 object-cover rounded-lg"
                    alt="{{ $fasilitas->nama_fasilitas }}">
            </div>
        @endif

        <div class="grid grid-cols-1 gap-4">
            <div class="border-b pb-2">
                <label class="text-gray-500 text-sm">Nama Fasilitas</label>
                <p class="text-gray-800 font-medium text-lg">
                    {{ $fasilitas->nama_fasilitas ?? $fasilitas->name ?? $fasilitas->title ?? 'Fasilitas' }}
                </p>
            </div>
            @if(isset($fasilitas->deskripsi))
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Deskripsi</label>
                    <p class="text-gray-800">{{ $fasilitas->deskripsi }}</p>
                </div>
            @endif
            @if(isset($fasilitas->lokasi))
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Lokasi</label>
                    <p class="text-gray-800">{{ $fasilitas->lokasi }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection
