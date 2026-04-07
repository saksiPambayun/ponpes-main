@extends('layouts.user')

@section('title', 'Gallery')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Galeri Yayasan</h1>

        @if($galleries->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($galleries as $gallery)
                    <div class="border rounded-lg overflow-hidden hover:shadow-md">
                        @if($gallery->image)
                            <img src="{{ asset('storage/' . $gallery->image) }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center"><i
                                    class="fas fa-image text-4xl text-gray-400"></i></div>
                        @endif
                        <div class="p-3">
                            <h3 class="font-semibold">{{ $gallery->title ?? 'Tanpa Judul' }}</h3>
                            <a href="{{ route('user.gallery.show', $gallery->id) }}" class="text-indigo-600 text-sm">Lihat →</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">{{ $galleries->links() }}</div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500">Belum ada gallery.</p>
            </div>
        @endif
    </div>
@endsection
