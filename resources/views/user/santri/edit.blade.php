@extends('layouts.user')

@section('title', 'Edit Data Santri')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Data Santri</h1>
        <a href="{{ route('user.santri.index') }}" class="text-gray-600 hover:text-gray-800">
            <i class="fas fa-arrow-left mr-1"></i>Kembali
        </a>
    </div>

    <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 mb-4">
        <p class="text-yellow-700"><i class="fas fa-info-circle mr-2"></i>Data hanya bisa diedit jika status masih
            <strong>Menunggu</strong>.</p>
    </div>

    <form action="{{ route('user.santri.update', $santri->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Nama Lengkap <span
                        class="text-red-500">*</span></label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $santri->nama_lengkap) }}"
                    class="w-full border rounded-lg px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">NISN</label>
                <input type="text" name="nisn" value="{{ old('nisn', $santri->nisn) }}"
                    class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', $santri->asal_sekolah) }}"
                    class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $santri->tanggal_lahir) }}"
                    class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $santri->email) }}"
                    class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">No WhatsApp/Wali</label>
                <input type="text" name="no_wali" value="{{ old('no_wali', $santri->no_wali) }}"
                    class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="mb-4 md:col-span-2">
                <label class="block text-gray-700 font-medium mb-2">Alamat</label>
                <textarea name="alamat" rows="3"
                    class="w-full border rounded-lg px-3 py-2">{{ old('alamat', $santri->alamat) }}</textarea>
            </div>
        </div
