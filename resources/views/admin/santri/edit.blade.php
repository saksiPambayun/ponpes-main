@extends('admin.layout')

@section('title', 'Edit Santri')
@section('page-title', 'Edit Data Santri')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="card p-8">

            {{-- TAMPILKAN SEMUA ERROR --}}
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- SESSION SUCCESS --}}
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

        <form action="{{ route('admin.pendaftar.update', $santri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- INFORMASI PRIBADI --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <h4 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Informasi Pribadi</h4>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $santri->nama_lengkap) }}"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none @error('nama_lengkap') border-red-500 @enderror"
                            required>
                        @error('nama_lengkap') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">NISN</label>
                        <input type="text" name="nisn" value="{{ old('nisn', $santri->nisn) }}"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Asal Sekolah <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', $santri->asal_sekolah) }}"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none @error('asal_sekolah') border-red-500 @enderror"
                            required>
                        @error('asal_sekolah') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $santri->tanggal_lahir ? \Carbon\Carbon::parse($santri->tanggal_lahir)->format('Y-m-d') : '') }}"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $santri->email) }}"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon Wali <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="no_wali" value="{{ old('no_wali', $santri->no_wali) }}"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none @error('no_wali') border-red-500 @enderror"
                            required>
                        @error('no_wali') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                        <textarea name="alamat" rows="3"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">{{ old('alamat', $santri->alamat) }}</textarea>
                    </div>
                </div>

                {{-- INFORMASI WALI --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                    <div class="col-span-2">
                        <h4 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Informasi Wali</h4>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Wali <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama_wali" value="{{ old('nama_wali', $santri->nama_wali) }}"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none @error('nama_wali') border-red-500 @enderror"
                            required>
                        @error('nama_wali') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan Wali</label>
                        <input type="text" name="pekerjaan_wali"
                            value="{{ old('pekerjaan_wali', $santri->pekerjaan_wali) }}"
                            placeholder="Contoh: Petani, Wiraswasta, PNS..."
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none">
                    </div>
                </div>

                {{-- UPLOAD DOKUMEN --}}
                <div class="mt-8">
                    <h4 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Dokumen</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- KARTU KELUARGA (KK) --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kartu Keluarga (KK)</label>

                            {{-- Tampilkan file yang sudah ada --}}
                            @if($santri->kk)
                                <div class="mb-3 p-3 bg-green-50 border border-green-200 rounded-lg">
                                    <p class="text-xs text-green-700 font-medium mb-2">✓ File saat ini:</p>
                                    @php
    $kkExtension = strtolower(pathinfo($santri->kk, PATHINFO_EXTENSION));
                                    @endphp
                                    @if(in_array($kkExtension, ['jpg', 'jpeg', 'png']))
                                        <img src="{{ asset('storage/' . $santri->kk) }}"
                                            class="h-24 rounded border object-cover mb-2" alt="KK">
                                    @else
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                                            <span class="text-xs text-gray-600 truncate">{{ basename($santri->kk) }}</span>
                                        </div>
                                    @endif
                                    <a href="{{ asset('storage/' . $santri->kk) }}" target="_blank"
                                        class="text-xs text-indigo-600 hover:underline">📄 Lihat file →</a>
                                </div>
                            @endif

                            <label for="kk"
                                class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-cloud-upload-alt text-xl text-gray-400 mb-1"></i>
                                    <p class="text-xs text-gray-500">{{ $santri->kk ? 'Ganti file' : 'Upload file' }} · PDF,
                                        JPG, PNG (maks. 20MB)</p>
                                </div>
                                <input id="kk" type="file" name="kk" class="hidden" accept=".pdf,.jpg,.jpeg,.png"
                                    onchange="showFileName(this, 'label-kk', 'preview-kk')">
                            </label>
                            <p id="label-kk" class="text-xs text-indigo-600 mt-1 hidden font-medium"></p>
                            <div id="preview-kk" class="mt-2 hidden">
                                <img class="h-20 rounded border object-cover" alt="preview KK baru">
                            </div>
                            @error('kk') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- PAS FOTO --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pas Foto (3x4)</label>

                            {{-- Tampilkan file yang sudah ada --}}
                            @if($santri->foto)
                                <div class="mb-3 p-3 bg-green-50 border border-green-200 rounded-lg">
                                    <p class="text-xs text-green-700 font-medium mb-2">✓ File saat ini:</p>
                                    @php
    $fotoExtension = strtolower(pathinfo($santri->foto, PATHINFO_EXTENSION));
                                    @endphp
                                    @if(in_array($fotoExtension, ['jpg', 'jpeg', 'png']))
                                        <img src="{{ asset('storage/' . $santri->foto) }}"
                                            class="h-24 rounded border object-cover mb-2" alt="Foto">
                                    @else
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                                            <span class="text-xs text-gray-600 truncate">{{ basename($santri->foto) }}</span>
                                        </div>
                                    @endif
                                    <a href="{{ asset('storage/' . $santri->foto) }}" target="_blank"
                                        class="text-xs text-indigo-600 hover:underline">📄 Lihat file →</a>
                                </div>
                            @endif

                            <label for="foto"
                                class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-cloud-upload-alt text-xl text-gray-400 mb-1"></i>
                                    <p class="text-xs text-gray-500">{{ $santri->foto ? 'Ganti file' : 'Upload file' }} ·
                                        JPG, PNG (maks. 2MB)</p>
                                </div>
                                <input id="foto" type="file" name="foto" class="hidden" accept=".jpg,.jpeg,.png"
                                    onchange="showFileName(this, 'label-foto', 'preview-foto')">
                            </label>
                            <p id="label-foto" class="text-xs text-indigo-600 mt-1 hidden font-medium"></p>
                            <div id="preview-foto" class="mt-2 hidden">
                                <img class="h-20 rounded border object-cover" alt="preview Foto baru">
                            </div>
                            @error('foto') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                    </div>
                </div>

                {{-- TOMBOL --}}
                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('admin.santri.index') }}"
                        class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Batal</a>
                    <button type="submit" class="btn-primary px-6 py-3 rounded-lg text-white font-medium">Update
                        Data</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showFileName(input, labelId, previewId) {
            const label = document.getElementById(labelId);
            const preview = document.getElementById(previewId);

            if (!input.files || !input.files[0]) return;

            const file = input.files[0];
            const maxSize = input.id === 'foto' ? 2 * 1024 * 1024 : 20 * 1024 * 1024; // 2MB untuk foto, 20MB untuk KK
            const maxSizeMB = input.id === 'foto' ? '2MB' : '20MB';

            if (file.size > maxSize) {
                alert('File terlalu besar! Maksimal ' + maxSizeMB);
                input.value = '';
                label.classList.add('hidden');
                if (preview) preview.classList.add('hidden');
                return;
            }

            label.textContent = '✓ ' + file.name;
            label.classList.remove('hidden');

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    if (preview) {
                        const img = preview.querySelector('img');
                        if (img) {
                            img.src = e.target.result;
                            preview.classList.remove('hidden');
                        }
                    }
                };
                reader.readAsDataURL(file);
            } else if (preview) {
                preview.classList.add('hidden');
            }
        }
    </script>
@endsection
