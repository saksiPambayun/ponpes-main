@extends('layouts.user')

@section('title', 'Daftar Santri Baru')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Form Pendaftaran Santri</h1>
            <a href="{{ route('user.santri.index') }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left mr-1"></i>Kembali
            </a>
        </div>

        <form action="{{ route('user.santri.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Nama Lengkap <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                        class="w-full border rounded-lg px-3 py-2" required>
                    @error('nama_lengkap') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">NISN</label>
                    <input type="text" name="nisn" value="{{ old('nisn') }}" class="w-full border rounded-lg px-3 py-2">
                    @error('nisn') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                        class="w-full border rounded-lg px-3 py-2">
                    @error('asal_sekolah') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                        class="w-full border rounded-lg px-3 py-2">
                    @error('tanggal_lahir') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded-lg px-3 py-2">
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">No WhatsApp/Wali</label>
                    <input type="text" name="no_wali" value="{{ old('no_wali') }}"
                        class="w-full border rounded-lg px-3 py-2">
                    @error('no_wali') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4 md:col-span-2">
                    <label class="block text-gray-700 font-medium mb-2">Alamat</label>
                    <textarea name="alamat" rows="3"
                        class="w-full border rounded-lg px-3 py-2">{{ old('alamat') }}</textarea>
                    @error('alamat') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <a href="{{ route('user.santri.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg">Batal</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
@endsection
