@extends('admin.layout')

@section('title', 'Edit Pegawai')
@section('page-title', 'Edit Data Pegawai')

@section('content')
<div class="max-w-4xl mx-auto">

    {{-- Back Button --}}
    <a href="{{ route('admin.pegawai.show', $pegawai->id) }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-indigo-600 mb-5 transition">
        <i class="fas fa-arrow-left"></i> Kembali ke Detail Pegawai
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
        <div class="px-8 py-5 bg-gradient-to-r from-amber-50 to-orange-50 border-b border-gray-200 flex items-center gap-4">
            <div class="p-3 bg-white rounded-xl shadow-sm">
                <i class="fas fa-user-edit text-amber-600 text-xl"></i>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-900">Edit Data: {{ $pegawai->nama }}</h3>
                <p class="text-sm text-gray-500">NIP: {{ $pegawai->nip }}</p>
            </div>
        </div>

        <div class="p-8">
            {{-- PENTING: @method('PUT') wajib ada, action dan enctype harus benar --}}
            <form action="{{ route('admin.pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

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
                            <input type="text" name="nip" value="{{ old('nip', $pegawai->nip) }}"
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
                            <input type="text" name="nama" value="{{ old('nama', $pegawai->nama) }}"
                                   class="w-full px-4 py-2.5 border @error('nama') border-red-400 bg-red-50 @else border-gray-300 @enderror rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition"
                                   placeholder="Nama lengkap pegawai" required>
                            @error('nama')
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                            <input type="email" name="email" value="{{ old('email', $pegawai->email) }}"
                                   class="w-full px-4 py-2.5 border @error('email') border-red-400 bg-red-50 @else border-gray-300 @enderror rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition"
                                   placeholder="contoh@email.com">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- No Telepon --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">No. Telepon</label>
                            <input type="text" name="no_telepon" value="{{ old('no_telepon', $pegawai->no_telepon) }}"
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
                                    <option value="{{ $jab }}" {{ old('jabatan', $pegawai->jabatan) == $jab ? 'selected' : '' }}>{{ $jab }}</option>
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
                                    <option value="{{ $div }}" {{ old('divisi', $pegawai->divisi) == $div ? 'selected' : '' }}>{{ $div }}</option>
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
                                <option value="aktif"    {{ old('status', $pegawai->status) == 'aktif'    ? 'selected' : '' }}>Aktif</option>
                                <option value="cuti"     {{ old('status', $pegawai->status) == 'cuti'     ? 'selected' : '' }}>Cuti</option>
                                <option value="nonaktif" {{ old('status', $pegawai->status) == 'nonaktif' ? 'selected' : '' }}>Non-Aktif</option>
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
                                    <option value="{{ $val }}" {{ old('tipe_pegawai', $pegawai->tipe_pegawai) == $val ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('tipe_pegawai')
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tanggal Bergabung --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Bergabung</label>
                            {{-- Gunakan ->format() karena sudah di-cast sebagai date di model --}}
                            <input type="date" name="tanggal_bergabung"
                                   value="{{ old('tanggal_bergabung', $pegawai->tanggal_bergabung?->format('Y-m-d')) }}"
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

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $pegawai->tempat_lahir) }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition"
                                   placeholder="Kota lahir">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"
                                   value="{{ old('tanggal_lahir', $pegawai->tanggal_lahir?->format('Y-m-d')) }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Jenis Kelamin</label>
                            <div class="flex gap-4 mt-1">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="L"
                                           {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'L' ? 'checked' : '' }}
                                           class="text-indigo-600">
                                    <span class="text-sm text-gray-700">Laki-laki</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="P"
                                           {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'P' ? 'checked' : '' }}
                                           class="text-indigo-600">
                                    <span class="text-sm text-gray-700">Perempuan</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Agama</label>
                            <select name="agama"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition bg-white">
                                <option value="">-- Pilih Agama --</option>
                                @foreach(['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $agama)
                                    <option value="{{ $agama }}" {{ old('agama', $pegawai->agama) == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Alamat Lengkap</label>
                            <textarea name="alamat" rows="3"
                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition resize-none"
                                      placeholder="Jl. ...">{{ old('alamat', $pegawai->alamat) }}</textarea>
                        </div>

                    </div>
                </div>

                {{-- ==============================
                     SECTION 3: DOKUMEN
                ============================== --}}
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-5 pb-3 border-b border-gray-100">
                        <div class="p-2 bg-green-100 rounded-lg"><i class="fas fa-file-alt text-green-600 text-sm"></i></div>
                        <h4 class="font-semibold text-gray-800">Dokumen</h4>
                        <span class="text-xs text-gray-400">(Kosongkan jika tidak ingin mengubah)</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 items-start">

                        @foreach([
                            ['field' => 'foto_ktp',    'label' => 'Foto KTP',  'icon' => 'fa-id-card',       'accept' => 'image/jpg,image/jpeg,image/png',                'current' => $pegawai->foto_ktp],
                            ['field' => 'foto_npwp',   'label' => 'Foto NPWP', 'icon' => 'fa-file-invoice',  'accept' => 'image/jpg,image/jpeg,image/png',                'current' => $pegawai->foto_npwp],
                            ['field' => 'foto_ijazah', 'label' => 'Ijazah',    'icon' => 'fa-graduation-cap','accept' => 'image/jpg,image/jpeg,image/png,application/pdf', 'current' => $pegawai->foto_ijazah],
                        ] as $doc)
                        <div class="flex flex-col">
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                <i class="fas {{ $doc['icon'] }} mr-1 text-indigo-400"></i> {{ $doc['label'] }}
                            </label>

                            {{-- Status file saat ini --}}
                            <div class="mb-2 p-3 rounded-lg flex items-center justify-between h-10
                                {{ $doc['current'] ? 'bg-blue-50 border border-blue-200' : 'bg-gray-50 border border-dashed border-gray-200' }}">
                                @if($doc['current'])
                                    <div class="flex items-center gap-2 min-w-0">
                                        <i class="fas fa-check-circle text-blue-500 text-sm shrink-0"></i>
                                        <span class="text-xs text-blue-700 truncate">File tersimpan</span>
                                    </div>
                                    <a href="{{ asset('storage/' . $doc['current']) }}"
                                       target="_blank"
                                       class="text-xs text-indigo-600 hover:underline font-medium shrink-0 ml-2">
                                        Lihat <i class="fas fa-external-link-alt ml-0.5 text-[10px]"></i>
                                    </a>
                                @else
                                    <span class="text-xs text-gray-400 italic">Belum ada file</span>
                                @endif
                            </div>

                            {{-- Upload area --}}
                            <label for="edit_{{ $doc['field'] }}"
                                   class="flex flex-col items-center justify-center w-full h-28 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-indigo-50 hover:border-indigo-400 transition group">
                                <i class="fas fa-cloud-upload-alt text-xl text-gray-400 group-hover:text-indigo-500 mb-1.5"></i>
                                <p class="text-xs text-gray-500 group-hover:text-indigo-600">
                                    {{ $doc['current'] ? 'Ganti file' : 'Upload file' }}
                                </p>
                                <p class="text-xs text-gray-400 mt-0.5">Maks. 40MB</p>
                                <input id="edit_{{ $doc['field'] }}" type="file" name="{{ $doc['field'] }}"
                                       accept="{{ $doc['accept'] }}" class="hidden"
                                       onchange="showEditPreview(this, 'editPrev_{{ $doc['field'] }}')">
                            </label>
                            <div id="editPrev_{{ $doc['field'] }}" class="mt-1.5 hidden">
                                <p class="text-xs text-green-600"><i class="fas fa-check mr-1"></i><span class="file-name"></span></p>
                            </div>
                            @error($doc['field'])
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        @endforeach

                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                    <a href="{{ route('admin.pegawai.show', $pegawai->id) }}"
                       class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition font-medium">
                        <i class="fas fa-times mr-1.5"></i> Batal
                    </a>
                    <button type="submit"
                            class="px-7 py-2.5 bg-gradient-to-r from-amber-500 to-orange-500 text-white rounded-lg text-sm font-medium hover:from-amber-600 hover:to-orange-600 transition shadow-md hover:shadow-lg">
                        <i class="fas fa-save mr-1.5"></i> Perbarui Data
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function showEditPreview(input, previewId) {
    const wrapper = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        wrapper.querySelector('.file-name').textContent = input.files[0].name;
        wrapper.classList.remove('hidden');
    } else {
        wrapper.classList.add('hidden');
    }
}
</script>
@endpush
