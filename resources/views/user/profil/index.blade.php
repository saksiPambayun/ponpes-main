@extends('layouts.user')

@section('title', 'Profil Saya')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Profil Saya</h1>
                <p class="text-gray-500 text-sm">Kelola informasi akun Anda</p>
            </div>
            <a href="{{ route('user.profile.edit') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                <i class="fas fa-edit mr-2"></i>Edit Profil
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded">
                <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Avatar dan Info Ringkas --}}
            <div class="bg-gray-50 rounded-lg p-6 text-center">
                <div class="relative inline-block">
                    @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}"
                            class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-indigo-200">
                    @else
                        <div
                            class="w-32 h-32 rounded-full mx-auto bg-indigo-100 flex items-center justify-center border-4 border-indigo-200">
                            <i class="fas fa-user text-5xl text-indigo-400"></i>
                        </div>
                    @endif

                    <!-- Upload Avatar Button -->
                    <form action="{{ route('user.profile.upload-avatar') }}" method="POST" enctype="multipart/form-data"
                        class="mt-3">
                        @csrf
                        <label class="cursor-pointer">
                            <input type="file" name="avatar" accept="image/*" class="hidden" onchange="this.form.submit()">
                            <span class="text-indigo-600 text-sm hover:underline">
                                <i class="fas fa-camera mr-1"></i>Ganti Foto
                            </span>
                        </label>
                    </form>
                </div>

                <h3 class="font-bold text-lg text-gray-800 mt-4">{{ $user->name }}</h3>
                <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-xs mt-2">
                    <i class="fas fa-user mr-1"></i>{{ ucfirst($user->role) }}
                </span>

                <hr class="my-4">

                <p class="text-gray-500 text-sm">
                    <i class="fas fa-calendar mr-1"></i>
                    Bergabung: {{ $user->created_at->format('d M Y') }}
                </p>
            </div>

            {{-- Form Edit Profil --}}
            <div class="md:col-span-2">
                <form action="{{ route('user.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label class="block text-gray-700 font-medium mb-2">Nama Lengkap <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:border-indigo-500 @error('name') border-red-500 @enderror"
                                required>
                            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 font-medium mb-2">Username</label>
                            <input type="text" value="{{ $user->username }}"
                                class="w-full border rounded-lg px-3 py-2 bg-gray-100" readonly disabled>
                            <p class="text-gray-400 text-xs mt-1">Username tidak dapat diubah</p>
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 font-medium mb-2">Email <span
                                    class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:border-indigo-500 @error('email') border-red-500 @enderror"
                                required>
                            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="block text-gray-700 font-medium mb-2">No Telepon</label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:border-indigo-500">
                            @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-3 md:col-span-2">
                            <label class="block text-gray-700 font-medium mb-2">Alamat</label>
                            <textarea name="address" rows="3"
                                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:border-indigo-500">{{ old('address', $user->address) }}</textarea>
                            @error('address') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>

        {{-- Ganti Password --}}
        <div class="mt-6 bg-white rounded-lg shadow p-6">
            <h3 class="font-bold text-lg text-gray-800 mb-4">
                <i class="fas fa-lock text-warning mr-2"></i>Ganti Password
            </h3>
            <form action="{{ route('user.profile.change-password') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Password Saat Ini <span
                                class="text-red-500">*</span></label>
                        <input type="password" name="current_password" class="w-full border rounded-lg px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Password Baru <span
                                class="text-red-500">*</span></label>
                        <input type="password" name="new_password" class="w-full border rounded-lg px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Konfirmasi Password Baru <span
                                class="text-red-500">*</span></label>
                        <input type="password" name="new_password_confirmation" class="w-full border rounded-lg px-3 py-2"
                            required>
                    </div>
                </div>
                <button type="submit" class="mt-4 bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600">
                    <i class="fas fa-key mr-2"></i>Ganti Password
                </button>
            </form>
        </div>
    </div>
@endsection
