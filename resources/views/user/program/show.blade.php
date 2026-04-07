@extends('layouts.user')

@section('title', 'Detail Program')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Program</h1>
            <a href="{{ route('user.program.index') }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left mr-1"></i>Kembali
            </a>
        </div>

        @if($program->foto)
            <div class="mb-6">
                <img src="{{ asset('storage/' . $program->foto) }}" class="w-full max-h-96 object-cover rounded-lg"
                    alt="{{ $program->nama_program }}">
            </div>
        @endif

        <div class="space-y-4">
            <div class="border-b pb-2">
                <label class="text-gray-500 text-sm">Nama Program</label>
                <p class="text-gray-800 font-medium text-lg">
                    {{ $program->nama_program ?? $program->name ?? $program->title ?? 'Program' }}</p>
            </div>
            @if(isset($program->deskripsi))
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Deskripsi</label>
                    <p class="text-gray-800">{{ $program->deskripsi }}</p>
                </div>
            @endif
            @if(isset($program->tujuan))
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Tujuan</label>
                    <p class="text-gray-800">{{ $program->tujuan }}</p>
                </div>
            @endif
            @if(isset($program->target_peserta))
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Target Peserta</label>
                    <p class="text-gray-800">{{ $program->target_peserta }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection
