@extends('layouts.user')

@section('title', 'Detail Profil Yayasan')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Profil Yayasan</h1>
            <a href="{{ route('user.profil-yayasan.index') }}" class="text-gray-600 hover:text-gray-800">← Kembali</a>
        </div>

        @if($profil->logo)
            <img src="{{ asset('storage/' . $profil->logo) }}" class="h-32 mb-4">
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div><label class="text-gray-500">Nama Yayasan</label>
                <p class="font-semibold">{{ $profil->nama_yayasan ?? '-' }}</p>
            </div>
            <div><label class="text-gray-500">No. Akta</label>
                <p>{{ $profil->no_akta ?? '-' }}</p>
            </div>
            <div><label class="text-gray-500">NPWP</label>
                <p>{{ $profil->npwp ?? '-' }}</p>
            </div>
            <div><label class="text-gray-500">Email</label>
                <p>{{ $profil->email ?? '-' }}</p>
            </div>
            <div><label class="text-gray-500">Telepon</label>
                <p>{{ $profil->telepon ?? '-' }}</p>
            </div>
            <div><label class="text-gray-500">Alamat</label>
                <p>{{ $profil->alamat ?? '-' }}</p>
            </div>
        </div>
        @if($profil->visi)
            <div class="mt-4"><label class="text-gray-500">Visi</label>
                <p>{{ $profil->visi }}</p>
            </div>
        @endif
        @if($profil->misi)
            <div class="mt-4"><label class="text-gray-500">Misi</label>
                <p>{{ $profil->misi }}</p>
            </div>
        @endif
    </div>
@endsection
