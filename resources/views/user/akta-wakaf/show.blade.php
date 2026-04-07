@extends('layouts.user')

@section('title', 'Detail Akta Wakaf')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Akta Wakaf</h1>
            <a href="{{ route('user.akta-wakaf.index') }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left mr-1"></i>Kembali
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Nomor Sertifikat</label>
                    <p class="text-gray-800 font-medium">{{ $akta->nomor_sertifikat ?? '-' }}</p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Nazhir</label>
                    <p class="text-gray-800">{{ $akta->nazhir ?? '-' }}</p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Luas Tanah</label>
                    <p class="text-gray-800">{{ $akta->luas_tanah ?? '-' }}</p>
                </div>
            </div>
            <div class="space-y-4">
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Lokasi Tanah</label>
                    <p class="text-gray-800">{{ $akta->lokasi_tanah ?? '-' }}</p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">File Sertifikat</label>
                    <p class="text-gray-800">
                        @if($akta->file_sertifikat)
                            <a href="{{ asset('storage/' . $akta->file_sertifikat) }}" target="_blank"
                                class="text-indigo-600 hover:underline">
                                <i class="fas fa-download mr-1"></i>Download File
                            </a>
                        @else
                            -
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
