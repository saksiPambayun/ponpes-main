@extends('admin.layout')

@section('title', 'Tambah Pegawai')
@section('page-title', 'Tambah Data Pegawai')

@section('content')
<div class="max-w-4xl mx-auto">

    {{-- Back Button --}}
    <a href="{{ route('admin.pegawai.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-indigo-600 mb-5 transition">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pegawai
    </a>

    {{-- Flash Error --}}
    @if($errors->any())
    <div class="mb-4 flex items-start gap-3 bg-red-50 border border-red-200 text-red-800 px-5 py-4 rounded-xl shadow-sm">
        <i class="fas fa-exclamation-circle text-red-500 text-lg mt-0.5"></i>
        <div>
            <p class="text-sm font-semibold mb-1">Terdapat kesalahan pada form:</p>
            <ul class="text-sm list-disc list-inside space-y-0.5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">

        {{-- Card Header --}}
        <div class="px-8 py-5 bg-gradient-to-r from-indigo-50 to-purple-50 border-b border-gray-200 flex items-center gap-4">
            <div class="p-3 bg-white rounded-xl shadow-sm">
                <i class="fas fa-user-plus text-indigo-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-900">Form Tambah Pegawai</h3>
                <p class="text-sm text-gray-500">Lengkapi semua data yang diperlukan</p>
            </div>
        </div>

        <div class="p-8">
            {{-- PENTING: action harus benar, method POST, enctype untuk upload file --}}
            <form action="{{ route('admin.pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- ==============================
                     SECTION 1: INFORMASI PRIBADI
                ============================== --}}
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-5 pb-3 border-b border-gray-100">
                        <div class="p-2 bg-indigo-100 rounded-lg"><i class="fas fa-user text-indigo-600 text-sm"></i></div>
                        <h4 class="font-semibold text-gray-800">Informasi Pribadi</h4>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- NIP --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                NIP <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nip" value="{{ old('nip') }}"
                                   class="w-full px-4 py-2.5 border @error('nip') border-red-400 bg-red-50 @else border-gray-300 @enderror rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition"
                                   placeholder="Nomor Induk Pegawai" required>
                            @error('nip')
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Nama --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama" value="{{ old('nama') }}"
                                   class="w-full px-4 py-2.5 border @error('nama') border-red-400 bg-red-50 @else border-gray-300 @enderror rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition"
                                   placeholder="Nama lengkap pegawai" required>
                            @error('nama')
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="w-full px-4 py-2.5 border @error('email') border-red-400 bg-red-50 @else border-gray-300 @enderror rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition"
                                   placeholder="contoh@email.com">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- No Telepon --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">No. Telepon</label>
                            <input type="text" name="no_telepon" value="{{ old('no_telepon') }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition"
                                   placeholder="08xxxxxxxxxx">
                        </div>

                        {{-- Jabatan --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Jabatan</label>
                            <select name="jabatan"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition bg-white">
                                <option value="">-- Pilih Jabatan --</option>
                                @foreach(['Kepala Sekolah','Wakil Kepala','Guru','Staff TU','Bendahara'] as $jab)
                                    <option value="{{ $jab }}" {{ old('jabatan') == $jab ? 'selected' : '' }}>{{ $jab }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Divisi --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Divisi</label>
                            <select name="divisi"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition bg-white">
                                <option value="">-- Pilih Divisi --</option>
                                @foreach(['Akademik','Kesiswaan','Humas','Keuangan','Sarana Prasarana'] as $div)
                                    <option value="{{ $div }}" {{ old('divisi') == $div ? 'selected' : '' }}>{{ $div }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Status --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Status Pegawai <span class="text-red-500">*</span>
                            </label>
                            <select name="status"
                                    class="w-full px-4 py-2.5 border @error('status') border-red-400 bg-red-50 @else border-gray-300 @enderror rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition bg-white"
                                    required>
                                <option value="">-- Pilih Status --</option>
                                <option value="aktif"    {{ old('status') == 'aktif'    ? 'selected' : '' }}>Aktif</option>
                                <option value="cuti"     {{ old('status') == 'cuti'     ? 'selected' : '' }}>Cuti</option>
                                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Non-Aktif</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tipe Pegawai --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Tipe Pegawai <span class="text-red-500">*</span>
                            </label>
                            <select name="tipe_pegawai"
                                    class="w-full px-4 py-2.5 border @error('tipe_pegawai') border-red-400 bg-red-50 @else border-gray-300 @enderror rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition bg-white"
                                    required>
                                <option value="">-- Pilih Tipe --</option>
                                @foreach(['tetap' => 'Tetap', 'kontrak' => 'Kontrak', 'magang' => 'Magang', 'honorer' => 'Honorer'] as $val => $label)
                                    <option value="{{ $val }}" {{ old('tipe_pegawai') == $val ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('tipe_pegawai')
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tanggal Bergabung --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Bergabung</label>
                            <input type="date" name="tanggal_bergabung" value="{{ old('tanggal_bergabung') }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">
                        </div>

                    </div>
                </div>

                {{-- ==============================
                     SECTION 2: INFORMASI TAMBAHAN
                ============================== --}}
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-5 pb-3 border-b border-gray-100">
                        <div class="p-2 bg-purple-100 rounded-lg"><i class="fas fa-address-card text-purple-600 text-sm"></i></div>
                        <h4 class="font-semibold text-gray-800">Informasi Tambahan</h4>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- Tempat Lahir --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition"
                                   placeholder="Kota lahir">
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Jenis Kelamin</label>
                            <div class="flex gap-4 mt-1">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }} class="text-indigo-600">
                                    <span class="text-sm text-gray-700">Laki-laki</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }} class="text-indigo-600">
                                    <span class="text-sm text-gray-700">Perempuan</span>
                                </label>
                            </div>
                        </div>

                        {{-- Agama --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Agama</label>
                            <select name="agama"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition bg-white">
                                <option value="">-- Pilih Agama --</option>
                                @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agama)
                                    <option value="{{ $agama }}" {{ old('agama') == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Alamat --}}
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Alamat Lengkap</label>
                            <textarea name="alamat" rows="3"
                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition resize-none"
                                      placeholder="Jl. ...">{{ old('alamat') }}</textarea>
                        </div>

                    </div>
                </div>

                {{-- ==============================
                     SECTION 3: DOKUMEN
                ============================== --}}
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-5 pb-3 border-b border-gray-100">
                        <div class="p-2 bg-green-100 rounded-lg"><i class="fas fa-file-alt text-green-600 text-sm"></i></div>
                        <h4 class="font-semibold text-gray-800">Upload Dokumen</h4>
                        <span class="text-xs text-gray-400">(Opsional)</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                        @foreach([
                            ['name' => 'foto_ktp',    'label' => 'Foto KTP',   'accept' => 'image/jpg,image/jpeg,image/png',               'icon' => 'fa-id-card',       'preview' => 'prevKTP'],
                            ['name' => 'foto_npwp',   'label' => 'Foto NPWP',  'accept' => 'image/jpg,image/jpeg,image/png',               'icon' => 'fa-file-invoice',  'preview' => 'prevNPWP'],
                            ['name' => 'foto_ijazah', 'label' => 'Ijazah',     'accept' => 'image/jpg,image/jpeg,image/png,application/pdf','icon' => 'fa-graduation-cap','preview' => 'prevIjazah'],
                        ] as $doc)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                <i class="fas {{ $doc['icon'] }} mr-1 text-indigo-400"></i> {{ $doc['label'] }}
                            </label>
                            <label for="{{ $doc['name'] }}"
                                   class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-indigo-50 hover:border-indigo-400 transition group">
                                <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 group-hover:text-indigo-500 mb-2"></i>
                                <p class="text-xs text-gray-500 group-hover:text-indigo-600">Klik untuk upload</p>
                                <p class="text-xs text-gray-400 mt-0.5">JPG, PNG{{ strpos($doc['accept'], 'pdf') !== false ? ', PDF' : '' }} · Maks. 40MB</p>
                                <input id="{{ $doc['name'] }}" type="file" name="{{ $doc['name'] }}"
                                       accept="{{ $doc['accept'] }}" class="hidden"
                                       onchange="previewDoc(this, '{{ $doc['preview'] }}')">
                            </label>
                            {{-- Preview --}}
                            <div id="{{ $doc['preview'] }}" class="mt-2 hidden">
                                <div class="flex items-center gap-2 p-2 bg-green-50 border border-green-200 rounded-lg">
                                    <i class="fas fa-check-circle text-green-500 text-sm"></i>
                                    <span class="text-xs text-green-700 truncate preview-name"></span>
                                </div>
                            </div>
                            @error($doc['name'])
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        @endforeach

                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                    <a href="{{ route('admin.pegawai.index') }}"
                       class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition font-medium">
                        <i class="fas fa-times mr-1.5"></i> Batal
                    </a>
                    <div class="flex gap-3">
                        <button type="reset" onclick="resetPreviews()"
                                class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition font-medium">
                            <i class="fas fa-undo mr-1.5"></i> Reset
                        </button>
                        <button type="submit"
                                class="px-7 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg text-sm font-medium hover:from-indigo-700 hover:to-purple-700 transition shadow-md hover:shadow-lg">
                            <i class="fas fa-save mr-1.5"></i> Simpan Data
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewDoc(input, previewId) {
    const wrapper = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        wrapper.querySelector('.preview-name').textContent = input.files[0].name;
        wrapper.classList.remove('hidden');
    } else {
        wrapper.classList.add('hidden');
    }
}

function resetPreviews() {
    ['prevKTP', 'prevNPWP', 'prevIjazah'].forEach(function(id) {
        const el = document.getElementById(id);
        if (el) el.classList.add('hidden');
    });
}
</script>
@endpush
