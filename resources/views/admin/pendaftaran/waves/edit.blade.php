@extends('admin.layout')

@section('title', 'Edit Gelombang Pendaftaran')
@section('page-title', 'Edit Gelombang Pendaftaran')

@section('content')
    <div class="card" style="background: #fff; border-radius: 20px; max-width: 800px; margin: 0 auto;">
        <div class="p-6 border-b" style="background: #eef3ec; border-radius: 20px 20px 0 0;">
            <h3 class="font-bold">Form Edit Gelombang</h3>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.pendaftaran.waves.update', $wave) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Nama Gelombang <span class="text-red-500">*</span></label>
                    <input type="text" name="name"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('name') border-red-500 @enderror"
                        value="{{ old('name', $wave->name) }}" required>
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Tanggal Mulai <span
                                class="text-red-500">*</span></label>
                        <input type="date" name="start_date"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('start_date') border-red-500 @enderror"
                            value="{{ old('start_date', $wave->start_date->format('Y-m-d')) }}" required>
                        @error('start_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Tanggal Selesai <span
                                class="text-red-500">*</span></label>
                        <input type="date" name="end_date"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('end_date') border-red-500 @enderror"
                            value="{{ old('end_date', $wave->end_date->format('Y-m-d')) }}" required>
                        @error('end_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Kuota Pendaftar</label>
                        <input type="number" name="quota"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                            value="{{ old('quota', $wave->quota) }}" placeholder="Kosongkan jika tidak terbatas" min="1">
                        <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ada batasan kuota</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Status</label>
                        <select name="is_active"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="1" {{ $wave->is_active ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ !$wave->is_active ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Deskripsi</label>
                    <textarea name="description" rows="3"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Informasi tambahan tentang gelombang ini...">{{ old('description', $wave->description) }}</textarea>
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <a href="{{ route('admin.pendaftaran.waves.index') }}"
                        class="px-4 py-2 border rounded-lg hover:bg-gray-50">Batal</a>
                    <button type="submit" class="px-4 py-2 rounded-lg text-white"
                        style="background: linear-gradient(135deg, #005F02, #0f4d1c);">
                        Update Gelombang
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection