@extends('admin.layout')

@section('title', 'Tambah Pegawai')
@section('page-title', 'Tambah Data Pegawai')

@section('content')
<div class="max-w-4xl mx-auto">

    {{-- Back Button --}}
    <a href="{{ route('admin.pegawai.index') }}"
       class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-[#005F02] mb-5 transition">
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
        <div class="px-8 py-5 bg-gradient-to-r from-[#eef3ec] to-[#dfe8d8] border-b border-gray-200 flex items-center gap-4">
            <div class="p-3 bg-white rounded-xl shadow-sm">
                <i class="fas fa-user-plus text-[#005F02] text-xl"></i>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-900">Form Tambah Pegawai</h3>
                <p class="text-sm text-gray-500">Lengkapi semua data yang diperlukan</p>
            </div>
        </div>

        <div class="p-8">
            <form action="{{ route('admin.pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- ==============================
                     SECTION 1: INFORMASI PRIBADI
                ============================== --}}
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-5 pb-3 border-b border-gray-100">
                        <div class="p-2 bg-[#eef3ec] rounded-lg"><i class="fas fa-user text-[#005F02] text-sm"></i></div>
                        <h4 class="font-semibold text-gray-800">Informasi Pribadi</h4>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- NIP --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                NIP <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nip" value="{{ old('nip') }}"
                                   class="w-full px-4 py-2.5 border @error('nip') border-red-400 bg-red-50 @else border-gray-300 @enderror rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition"
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
                                   class="w-full px-4 py-2.5 border @error('nama') border-red-400 bg-red-50 @else border-gray-300 @enderror rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition"
                                   placeholder="Nama lengkap pegawai" required>
                            @error('nama')
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="w-full px-4 py-2.5 border @error('email') border-red-400 bg-red-50 @else border-gray-300 @enderror rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition"
                                   placeholder="contoh@email.com">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- No Telepon --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">No. Telepon</label>
                            <input type="text" name="no_telepon" value="{{ old('no_telepon') }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition"
                                   placeholder="08xxxxxxxxxx">
                        </div>

                        {{-- Jabatan --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Jabatan</label>
                            <select name="jabatan"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition bg-white">
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
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition bg-white">
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
                                    class="w-full px-4 py-2.5 border @error('status') border-red-400 bg-red-50 @else border-gray-300 @enderror rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition bg-white"
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
                                    class="w-full px-4 py-2.5 border @error('tipe_pegawai') border-red-400 bg-red-50 @else border-gray-300 @enderror rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition bg-white"
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
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition">
                        </div>

                    </div>
                </div>

                {{-- ==============================
                     SECTION 2: INFORMASI TAMBAHAN
                ============================== --}}
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-5 pb-3 border-b border-gray-100">
                        <div class="p-2 bg-[#eef3ec] rounded-lg"><i class="fas fa-address-card text-[#005F02] text-sm"></i></div>
                        <h4 class="font-semibold text-gray-800">Informasi Tambahan</h4>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- Tempat Lahir --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition"
                                   placeholder="Kota lahir">
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition">
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Jenis Kelamin</label>
                            <div class="flex gap-4 mt-1">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }} class="text-[#005F02]">
                                    <span class="text-sm text-gray-700">Laki-laki</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }} class="text-[#005F02]">
                                    <span class="text-sm text-gray-700">Perempuan</span>
                                </label>
                            </div>
                        </div>

                        {{-- Agama --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Agama</label>
                            <select name="agama"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition bg-white">
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
                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] outline-none transition resize-none"
                                      placeholder="Jl. ...">{{ old('alamat') }}</textarea>
                        </div>

                    </div>
                </div>

                {{-- ==============================
                     SECTION 3: DOKUMEN
                ============================== --}}
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-5 pb-3 border-b border-gray-100">
                        <div class="p-2 bg-[#eef3ec] rounded-lg"><i class="fas fa-file-alt text-[#005F02] text-sm"></i></div>
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
                                <i class="fas {{ $doc['icon'] }} mr-1 text-[#8cbf73]"></i> {{ $doc['label'] }}
                            </label>
                            <label for="{{ $doc['name'] }}"
                                   class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-[#eef3ec] hover:border-[#4ca94d] transition group">
                                <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 group-hover:text-[#005F02] mb-2"></i>
                                <p class="text-xs text-gray-500 group-hover:text-[#005F02]">Klik untuk upload</p>
                                <p class="text-xs text-gray-400 mt-0.5">JPG, PNG{{ strpos($doc['accept'], 'pdf') !== false ? ', PDF' : '' }} · Maks. 40MB</p>
                                <input id="{{ $doc['name'] }}" type="file" name="{{ $doc['name'] }}"
                                       accept="{{ $doc['accept'] }}" class="hidden"
                                       onchange="previewDoc(this, '{{ $doc['preview'] }}')">
                            </label>
                            {{-- Preview --}}
                            <div id="{{ $doc['preview'] }}" class="mt-2 hidden">
                                <div class="flex items-center gap-2 p-2 bg-[#eef3ec] border border-[#8cbf73] rounded-lg">
                                    <i class="fas fa-check-circle text-[#005F02] text-sm"></i>
                                    <span class="text-xs text-[#0d4f14] truncate preview-name"></span>
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
                       class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm text-gray-700 hover:bg-[#eef3ec] transition font-medium">
                        <i class="fas fa-times mr-1.5"></i> Batal
                    </a>
                    <div class="flex gap-3">
                        <button type="reset" onclick="resetPreviews()"
                                class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm text-gray-700 hover:bg-[#eef3ec] transition font-medium">
                            <i class="fas fa-undo mr-1.5"></i> Reset
                        </button>
                        <button type="submit"
                                class="px-7 py-2.5 bg-gradient-to-r from-[#005F02] to-[#4ca94d] text-white rounded-lg text-sm font-medium hover:from-[#0d4f14] hover:to-[#8cbf73] transition shadow-md hover:shadow-lg">
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
// hover sound feel (visual feedback ringan)
document.querySelectorAll('button, a').forEach(el => {
    el.addEventListener('mouseenter', () => {
        el.style.transition = 'all 0.2s ease';
    });
});

// auto scroll ke error biar UX lebih enak
@if($errors->any())
window.scrollTo({
    top: 0,
    behavior: 'smooth'
});
@endif

// efek klik tombol submit (biar terasa responsif)
document.querySelector('form').addEventListener('submit', function() {
    const btn = document.querySelector('button[type="submit"]');
    btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1.5"></i> Menyimpan...';
});

</script>
@endpush

<style>

/* =====================
   CARD ANIMATION
===================== */
.bg-white {
    animation: fadeUp 0.6s ease;
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* =====================
   INPUT FOCUS EFFECT
===================== */
input:focus, select:focus, textarea:focus {
    transform: scale(1.02);
    box-shadow: 0 6px 18px rgba(0, 95, 2, 0.12);
}

/* =====================
   LABEL HOVER
===================== */
label:hover {
    color: #005F02;
}

/* =====================
   FILE UPLOAD HOVER
===================== */
label[for] {
    transition: all 0.3s ease;
}

label[for]:hover {
    transform: scale(1.03);
}

/* =====================
   BUTTON EFFECT
===================== */
button, a {
    transition: all 0.25s ease;
}

button:hover, a:hover {
    transform: translateY(-2px);
}

/* =====================
   SAVE BUTTON SPECIAL
===================== */
button[type="submit"] {
    position: relative;
    overflow: hidden;
}

button[type="submit"]::after {
    content: '';
    position: absolute;
    width: 0%;
    height: 100%;
    top: 0;
    left: 0;
    background: rgba(255,255,255,0.2);
    transition: 0.3s;
}

button[type="submit"]:hover::after {
    width: 100%;
}

/* =====================
   PREVIEW ANIMATION
===================== */
#prevKTP, #prevNPWP, #prevIjazah {
    animation: fadeIn 0.4s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* =====================
   SECTION TITLE EFFECT
===================== */
h4 {
    position: relative;
}

h4::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 0;
    height: 2px;
    background: #4ca94d;
    transition: 0.3s;
}

h4:hover::after {
    width: 40px;
}

/* =====================
   ICON HOVER
===================== */
i {
    transition: transform 0.2s ease;
}

i:hover {
    transform: scale(1.2);
}
</style>
