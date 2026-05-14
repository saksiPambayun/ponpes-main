@extends('layouts.app')

@section('title', 'Edit Profil')
@section('page-title', 'Edit Profil')

@section('content')
    <style>
        :root {
            --green-main: #005F02;
            --green-light: #4ca94d;
            --green-soft: #8cbf73;
            --bg-soft: #eef3ec;
        }

        .btn-gradient {
            background: linear-gradient(135deg, var(--green-main) 0%, var(--green-light) 100%);
            transition: all 0.3s ease;
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 95, 2, 0.3);
        }

        .form-input:focus {
            border-color: var(--green-main);
            box-shadow: 0 0 0 3px rgba(0, 95, 2, 0.1);
        }
    </style>

    <div class="container mx-auto px-4 py-8">
        @php
            $user = auth()->user();
        @endphp

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="p-6 border-b" style="background: linear-gradient(135deg, var(--bg-soft) 0%, #ffffff 100%);">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-bold" style="color: var(--green-main);">
                            <i class="fas fa-user-edit mr-2"></i>Edit Profil
                        </h3>
                        <a href="{{ route('user.profile') }}" class="text-gray-500 hover:text-green-600 transition">
                            <i class="fas fa-arrow-left mr-1"></i>Kembali
                        </a>
                    </div>
                </div>

                <div class="p-6">
                    <form action="{{ route('user.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-user mr-1" style="color: var(--green-main);"></i>
                                Nama Lengkap
                            </label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 @error('name') border-red-500 @enderror"
                                required>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-envelope mr-1" style="color: var(--green-main);"></i>
                                Email
                            </label>
                            <input type="email" value="{{ $user->email }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-gray-100" disabled>
                            <p class="text-xs text-gray-500 mt-1">
                                <i class="fas fa-info-circle"></i> Email tidak dapat diubah. Hubungi admin jika perlu
                                perubahan.
                            </p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fab fa-whatsapp mr-1" style="color: #25D366;"></i>
                                Nomor Telepon / WhatsApp
                            </label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 @error('phone') border-red-500 @enderror"
                                placeholder="Contoh: 081234567890">
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-map-marker-alt mr-1" style="color: var(--green-main);"></i>
                                Alamat
                            </label>
                            <textarea name="address" rows="4"
                                class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 @error('address') border-red-500 @enderror"
                                placeholder="Alamat lengkap Anda">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('user.profile') }}"
                                class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-xl font-medium transition">
                                Batal
                            </a>
                            <button type="submit"
                                class="btn-gradient px-6 py-3 text-white rounded-xl font-medium transition shadow-md">
                                <i class="fas fa-save mr-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
