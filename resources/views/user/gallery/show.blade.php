@extends('layouts.user')

@section('title', 'Detail Gallery')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Gallery</h1>
            <a href="{{ route('user.gallery.index') }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left mr-1"></i>Kembali
            </a>
        </div>

        @if($gallery->image)
            <div class="mb-6">
                <img src="{{ asset('storage/' . $gallery->image) }}" class="w-full rounded-lg" alt="{{ $gallery->title }}">
            </div>
        @endif

        <div class="space-y-4">
            <div class="border-b pb-2">
                <label class="text-gray-500 text-sm">Judul</label>
                <p class="text-gray-800 font-medium text-lg">{{ $gallery->title ?? 'Tanpa Judul' }}</p>
            </div>
            @if($gallery->description)
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Deskripsi</label>
                    <p class="text-gray-800">{{ $gallery->description }}</p>
                </div>
            @endif
            <div class="border-b pb-2">
                <label class="text-gray-500 text-sm">Tanggal Upload</label>
                <p class="text-gray-800">{{ $gallery->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>
    </div>
@endsection
