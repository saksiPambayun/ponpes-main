@extends('layouts.user')

@section('title', 'Detail Profil Yayasan')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Detail Profil Yayasan</h1>
        <a href="{{ route('user.profil-yayasan.index') }}" class="text-gray-600 hover:text-gray-800">
            <i class="fas fa-arrow-left mr-1"></i>Kembali
        </a>
    </div>

    @if($profil)
        @if($profil->logo)
        <div class="text-center mb-6">
            <img src="{{ asset('storage/' . $profil->logo) }}" class="h-32 mx-auto" alt="Logo Yayasan">
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Nama Yayasan</label>
                    <p class="text-gray-800 font-medium text-lg">{{ $profil->nama_yayasan ?? '-' }}</p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">No. Akta Pendirian</label>
                    <p class="text-gray-800">{{ $profil->no_akta ?? '-' }}</p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">NPWP</label>
                    <p class="text-gray-800">{{ $profil->npwp ?? '-' }}</p>
                </div>
                <div class="border-b pb-2">
                    <label class="text-gray-500 text-sm">Email</label>
                    <p class="text-gray-800">{{ $profil->email ?? '-' }}</p>
