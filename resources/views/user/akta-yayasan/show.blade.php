@extends('layouts.user')

@section('title', 'Detail Akta Yayasan')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Akta Yayasan</h1>
            <a href="{{ route('user.akta-yayasan.index') }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left mr-1"></i>Kembali
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Nomor Akta</label>
                    <p class="text-gray-800 font-medium">{{ $akta->nomor_akta ?? '-' }}</p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Tanggal Akta</label>
                    <p class="text-gray-800">
                        {{ $akta->tanggal_akta ? \Carbon\Carbon::parse($akta->tanggal_akta)->format('d M Y') : '-' }}
                    </p>
                </div>
            </div>
            <div class="space-y-4">
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Notaris</label>
                    <p class="text-gray-800">{{ $akta->notaris ?? '-' }}</p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">File Akta</label>
                    <p class="text-gray-800">
                        @if($akta->file_akta)
                            <a href="{{ asset('storage/' . $akta->file_akta) }}" target="_blank"
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
