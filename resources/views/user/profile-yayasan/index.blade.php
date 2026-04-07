@extends('layouts.user')

@section('title', 'Profil Yayasan')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Profil Yayasan</h1>

    @if($profil)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                @if($profil->logo)
                    <img src="{{ asset('storage/' . $profil->logo) }}" class="h-32 mb-4" alt="Logo">
                @endif
                <div class="mb-3">
                    <label class="text-gray-500 text-sm">Nama Yayasan</label>
                    <p class="font-semibold">{{ $profil->nama_yayasan ?? '-' }}</p>
                </div>
                <div class="mb-3">
                    <label class="text-gray-500 text-sm">No. Akta</label>
                    <p>{{ $profil->no_akta ?? '-' }}</p>
                </div>
                <div class="mb-3">
                    <label class="text-gray-500 text-sm">NPWP</label>
                    <p>{{ $profil->npwp ?? '-' }}</p>
                </div>
            </div>
            <div>
                <div class="mb-3">
                    <label class="text-gray-500 text-sm">Email</label>
                    <p>{{ $profil->email ?? '-' }}</p>
                </div>
                <div class="mb-3">
                    <label class="text-gray-500 text-sm">Telepon</label>
                    <p>{{ $profil->telepon ?? '-' }}</p>
                </div>
                <div class="mb-3">
                    <label class="text-gray-500 text-sm">Alamat</label>
                    <p>{{ $profil->alamat ?? '-' }}</p>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500">Belum ada data profil yayasan.</p>
        </div>
    @endif
</div>
@endsection
