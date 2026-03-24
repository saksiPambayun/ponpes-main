@extends('admin.layout')

@section('title', 'Tambah Santri')
@section('page-title', 'Tambah Data Santri')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="card p-8">
            <form action="{{ route('admin.santri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- INFORMASI PRIBADI --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <h4 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Informasi Pribadi</h4>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none @error('nama_lengkap') border-red-500 @enderror" required>
                        @error('nama_lengkap') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">NISN</label>
                        <input type="text" name="nisn" value="{{ old('nisn') }}"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Asal Sekolah <span class="text-red-500">*</span></label>
                        <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none @error('asal_sekolah') border-red-500 @enderror" required>
                        @error('asal_sekolah') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                        <textarea name="alamat" rows="3"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">{{ old('alamat') }}</textarea>
                    </div>
                </div>

                {{-- INFORMASI WALI --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                    <div class="col-span-2">
                        <h4 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Informasi Wali</h4>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Wali <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_wali" value="{{ old('nama_wali') }}"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none @error('nama_wali') border-red-500 @enderror" required>
                        @error('nama_wali') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan Wali</label>
                        <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}"
                            placeholder="Contoh: Petani, Wiraswasta, PNS..."
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">No. Wali <span class="text-red-500">*</span></label>
                        <input type="text" name="no_wali" value="{{ old('no_wali') }}"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none @error('no_wali') border-red-500 @enderror" required>
                        @error('no_wali') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div> {{-- Tutup grid informasi wali --}}

                {{-- UPLOAD DOKUMEN --}}
                <div class="mt-8">
                    <h4 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Upload Dokumen</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kartu Keluarga (KK)</label>
                            <label for="dok_kk" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                                    <p class="text-xs text-gray-500">PDF, JPG, PNG (maks. 20MB)</p>
                                </div>
                                <input id="dok_kk" type="file" name="dok_kk" class="hidden"
                                    accept=".pdf,.jpg,.jpeg,.png" onchange="showFileName(this, 'label-kk', 'preview-kk')">
                            </label>
                            <p id="label-kk" class="text-xs text-indigo-600 mt-1 hidden font-medium"></p>
                            <div id="preview-kk" class="mt-2 hidden">
                                <img class="h-24 rounded border object-cover" alt="preview KK">
                            </div>
                            @error('dok_kk') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Akta Kelahiran</label>
                            <label for="dok_akta" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-2"></i>
                                    <p class="text-xs text-gray-500">PDF, JPG, PNG (maks. 20MB)</p>
                                </div>
                                <input id="dok_akta" type="file" name="dok_akta" class="hidden"
                                    accept=".pdf,.jpg,.jpeg,.png" onchange="showFileName(this, 'label-akta', 'preview-akta')">
                            </label>
                            <p id="label-akta" class="text-xs text-indigo-600 mt-1 hidden font-medium"></p>
                            <div id="preview-akta" class="mt-2 hidden">
                                <img class="h-24 rounded border object-cover" alt="preview Akta">
                            </div>
                            @error('dok_akta') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('admin.santri.index') }}"
                        class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Batal</a>
                    <button type="submit" class="btn-primary px-6 py-3 rounded-lg text-white font-medium">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showFileName(input, labelId, previewId) {
            const label   = document.getElementById(labelId);
            const preview = document.getElementById(previewId);
            if (!input.files || !input.files[0]) return;

            const file = input.files[0];
            if (file.size > 20 * 1024 * 1024) {
                alert('File terlalu besar! Maksimal 20MB.');
                input.value = '';
                label.classList.add('hidden');
                preview.classList.add('hidden');
                return;
            }

            label.textContent = '✓ ' + file.name;
            label.classList.remove('hidden');

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.querySelector('img').src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
            }
        }
    </script>
@endsection