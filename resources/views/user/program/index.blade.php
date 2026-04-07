@extends('layouts.user')

@section('title', 'Program Yayasan')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Program Yayasan</h1>

        @if($programs->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($programs as $program)
                    <div class="border rounded-lg overflow-hidden hover:shadow-lg transition">
                        @if($program->foto)
                            <img src="{{ asset('storage/' . $program->foto) }}" class="w-full h-48 object-cover"
                                alt="{{ $program->nama_program }}">
                        @else
                            <div class="w-full h-48 bg-gradient-to-r from-indigo-500 to-purple-500 flex items-center justify-center">
                                <i class="fas fa-chalkboard-user text-5xl text-white"></i>
                            </div>
                        @endif
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-gray-800">
                                {{ $program->nama_program ?? $program->name ?? $program->title ?? 'Program' }}
                            </h3>
                            @if(isset($program->deskripsi))
                                <p class="text-gray-600 text-sm mt-2">{{ Str::limit($program->deskripsi, 100) }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">
                {{ $programs->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-chalkboard-user text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500">Belum ada data program.</p>
            </div>
        @endif
    </div>
@endsection
