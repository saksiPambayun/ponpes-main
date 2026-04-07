@extends('layouts.user')

@section('title', 'Profil Yayasan')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Profil Yayasan</h1>

        @if($profil)
            <div class="prose max-w-none">
                @if($profil->logo)
                    <div class="text-center mb-6">
                        <img src="{{ asset('storage/' . $profil->logo) }}" class="h-32 mx-auto" alt="Logo Yayasan">
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div class="border-b pb-2">
                            <label class="text-gray-500 text-sm">Nama Yayasan</label>
                            <p class="text-gray-800 font-medium">{{ $profil->nama_yayasan ?? '-' }}</p>
                        </div>
                        <div class="border-b pb-2">
                            <label class="text-gray-500 text-sm">No. Akta Pendirian</label>
                            <p class="text-gray-800">{{ $profil->no_akta ?? '-' }}</p>
                        </div>
                        <div class="border-b pb-2">
                            <label class="text-gray-500 text-sm">NPWP</label>
                            <p class="text-gray-800">{{ $profil->npwp ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="border-b pb-2">
                            <label class="text-gray-500 text-sm">Email</label>
                            <p class="text-gray-800">{{ $profil->email ?? '-' }}</p>
                        </div>
                        <div class="border-b pb-2">
                            <label class="text-gray-500 text-sm">Telepon</label>
                            <p class="text-gray-800">{{ $profil->telepon ?? '-' }}</p>
                        </div>
                        <div class="border-b pb-2">
                            <label class="text-gray-500 text-sm">Website</label>
                            <p class="text-gray-800">{{ $profil->website ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <div class="border-b pb-2">
                            <label class="text-gray-500 text-sm">Alamat</label>
                            <p class="text-gray-800">{{ $profil->alamat ?? '-' }}</p>
                        </div>
                    </div>
                    @if($profil->visi)
                        <div class="md:col-span-2">
                            <div class="border-b pb-2">
                                <label class="text-gray-500 text-sm">Visi</label>
                                <p class="text-gray-800">{{ $profil->visi }}</p>
                            </div>
                        </div>
                    @endif
                    @if($profil->misi)
                        <div class="md:col-span-2">
                            <div class="border-b pb-2">
                                <label class="text-gray-500 text-sm">Misi</label>
                                <p class="text-gray-800">{{ $profil->misi }}</p>
                            </div>
                        </div>
                    @endif
                    @if($profil->sejarah)
                        <div class="md:col-span-2">
                            <div class="border-b pb-2">
                                <label class="text-gray-500 text-sm">Sejarah</label>
                                <p class="text-gray-800">{{ $profil->sejarah }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('user.profil-yayasan.show', $profil->id) }}" class="text-indigo-600 hover:text-indigo-800">
                    <i class="fas fa-eye mr-1"></i>Lihat Detail Lengkap
                </a>
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-building text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500">Belum ada data profil yayasan.</p>
            </div>
        @endif
    </div>
@endsection
