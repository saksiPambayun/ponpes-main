@extends('layouts.user')

@section('title', 'Fasilitas Yayasan')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Fasilitas Yayasan</h1>

        @if($fasilitas->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($fasilitas as $item)
                    <div class="border rounded-lg overflow-hidden hover:shadow-lg transition">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-48 object-cover"
                                alt="{{ $item->nama_fasilitas }}">
                        @else
                            <div class="w-full h-48 bg-gradient-to-r from-teal-500 to-blue-500 flex items-center justify-center">
                                <i class="fas fa-building text-5xl text-white"></i>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-gray-800">
                                {{ $item->nama_fasilitas ?? $item->name ?? $item->title ?? 'Fasilitas' }}
                            </h3>
                            @if(isset($item->deskripsi))
                                <p class="text-gray-600 text-sm mt-2">{{ Str::limit($item->deskripsi, 100) }}</p>
                            @endif
                            <a href="{{ route('user.fasilitas.show', $item->id) }}"
                                class="text-indigo-600 text-sm mt-3 inline-block">
                                Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">
                {{ $fasilitas->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-building text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500">Belum ada data fasilitas.</p>
            </div>
        @endif
    </div>
@endsection
