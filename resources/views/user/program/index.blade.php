@extends('layouts.user')

@section('title', 'Program')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Program Yayasan</h1>

        @if($programs->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($programs as $program)
                    <div class="border rounded-lg p-4 hover:shadow-md">
                        <h3 class="font-bold text-lg">{{ $program->nama_program ?? $program->name ?? 'Program' }}</h3>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($program->deskripsi ?? '-', 100) }}</p>
                        <a href="{{ route('user.program.show', $program->id) }}"
                            class="text-indigo-600 text-sm mt-2 inline-block">Detail →</a>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">{{ $programs->links() }}</div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500">Belum ada data program.</p>
            </div>
        @endif
    </div>
@endsection
