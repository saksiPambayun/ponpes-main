@extends('layouts.user')

@section('title', 'Galeri Yayasan')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Galeri Yayasan</h1>

        @if($galleries->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($galleries as $gallery)
                    <a href="{{ route('user.gallery.show', $gallery->id) }}"
                        class="border rounded-lg overflow-hidden hover:shadow-lg transition group">
                        @if($gallery->image)
                            <img src="{{ asset('storage/' . $gallery->image) }}"
                                class="w-full h-48 object-cover group-hover:scale-105 transition duration-300"
                                alt="{{ $gallery->title }}">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-image text-4xl text-gray-400"></i>
                            </div>
                        @endif
                        <div class="p-3">
                            <h3 class="font-semibold text-gray-800">{{ $gallery->title ?? 'Tanpa Judul' }}</h3>
                            @if($gallery->description)
                                <p class="text-gray-500 text-sm mt-1">{{ Str::limit($gallery->description, 50) }}</p>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="mt-6">
                {{ $galleries->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500">Belum ada gallery.</p>
            </div>
        @endif
    </div>
@endsection
