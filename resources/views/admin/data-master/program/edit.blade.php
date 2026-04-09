@extends('admin.layout')

@section('title', $title)
@section('page-title', 'Edit Program')

@section('content')
<div class="container-fluid px-4 py-4">
    
    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div>
            <h4 class="text-2xl font-bold text-gray-800 mb-1">Edit Program</h4>
            <p class="text-sm text-gray-600">Ubah data program: {{ $program->nama_program }}</p>
        </div>
        <a href="{{ route('admin.program.index') }}" class="mt-3 md:mt-0 bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 font-medium py-2 px-4 rounded-lg transition duration-200 inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    {{-- Alert jika ada error --}}
    @if($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded-lg flex items-start gap-3">
        <i class="fas fa-exclamation-circle mt-1"></i>
        <div>
            <strong class="font-bold">Terjadi kesalahan:</strong>
            <ul class="mt-1 list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    {{-- Form Card --}}
    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
        <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
            <h5 class="font-semibold text-gray-700 flex items-center">
                <i class="fas fa-edit text-indigo-500 mr-2"></i>
                Form Edit Program
            </h5>
        </div>
        
        <div class="p-6">
            <form action="{{ route('admin.program.update', $program->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Informasi Dasar --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    {{-- Nama Program --}}
                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Program <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_program" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('nama_program') border-red-500 @enderror" 
                               value="{{ old('nama_program', $program->nama_program) }}" 
                               placeholder="Masukkan nama program">
                        @error('nama_program')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="kategori" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('kategori') border-red-500 @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="pendidikan" {{ old('kategori', $program->kategori) == 'pendidikan' ? 'selected' : '' }}>📚 Pendidikan</option>
                            <option value="sosial" {{ old('kategori', $program->kategori) == 'sosial' ? 'selected' : '' }}>❤️ Sosial</option>
                            <option value="keagamaan" {{ old('kategori', $program->kategori) == 'keagamaan' ? 'selected' : '' }}>🕌 Keagamaan</option>
                            <option value="kesehatan" {{ old('kategori', $program->kategori) == 'kesehatan' ? 'selected' : '' }}>🏥 Kesehatan</option>
                        </select>
                        @error('kategori')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea name="deskripsi" rows="5" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('deskripsi') border-red-500 @enderror" 
                              placeholder="Jelaskan deskripsi program secara detail...">{{ old('deskripsi', $program->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Waktu Pelaksanaan --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Mulai
                        </label>
                        <input type="date" name="tanggal_mulai" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                               value="{{ old('tanggal_mulai', $program->tanggal_mulai ? $program->tanggal_mulai->format('Y-m-d') : '') }}">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Selesai
                        </label>
                        <input type="date" name="tanggal_selesai" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                               value="{{ old('tanggal_selesai', $program->tanggal_selesai ? $program->tanggal_selesai->format('Y-m-d') : '') }}">
                    </div>
                </div>

                {{-- Status --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <div class="flex flex-wrap gap-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="status" value="aktif" class="form-radio text-indigo-600" {{ old('status', $program->status) == 'aktif' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Aktif</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="status" value="selesai" class="form-radio text-indigo-600" {{ old('status', $program->status) == 'selesai' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Selesai</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="status" value="dinunda" class="form-radio text-indigo-600" {{ old('status', $program->status) == 'dinunda' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Ditunda</span>
                        </label>
                    </div>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Upload Gambar --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Gambar Program
                    </label>
                    
                    {{-- Tampilkan gambar lama jika ada --}}
                    @if($program->gambar)
                    <div class="mb-3 p-3 border border-gray-200 rounded-lg bg-gray-50 flex items-center">
                        <img src="{{ asset('storage/' . $program->gambar) }}" alt="Current Image" class="w-16 h-16 object-cover rounded-lg">
                        <div class="ml-3">
                            <p class="text-sm text-gray-600">Gambar saat ini</p>
                            <p class="text-xs text-gray-500">{{ basename($program->gambar) }}</p>
                        </div>
                    </div>
                    @endif
                    
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center bg-gray-50 cursor-pointer hover:border-indigo-500 hover:bg-indigo-50 transition" 
                         id="uploadArea"
                         onclick="document.getElementById('gambar').click()">
                        
                        <i class="fas fa-cloud-upload-alt fa-3x mb-3 text-gray-400"></i>
                        <p class="text-gray-600 font-medium mb-1">Pilih Gambar Baru atau Tarik ke Sini</p>
                        <p class="text-gray-500 text-sm mb-3">Format: JPG, JPEG, PNG, WEBP (Maks. 2MB)</p>
                        <span class="inline-block bg-white border border-indigo-500 text-indigo-500 hover:bg-indigo-500 hover:text-white text-sm font-medium py-2 px-4 rounded-full transition">
                            <i class="fas fa-folder-open mr-2"></i>Browse File
                        </span>
                    </div>
                    
                    <input type="file" name="gambar" id="gambar" 
                           class="hidden @error('gambar') border-red-500 @enderror" 
                           accept="image/*" onchange="previewImage(this)">
                    
                    @error('gambar')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    
                    {{-- Preview Image --}}
                    <div id="previewContainer" class="mt-3 hidden">
                        <div class="flex items-center p-3 border border-gray-200 rounded-lg bg-gray-50">
                            <img id="preview" src="#" alt="Preview" class="rounded-lg" style="max-height: 80px; max-width: 80px; object-fit: cover;">
                            <div class="ml-3 flex-grow">
                                <p class="font-medium text-gray-700" id="previewName"></p>
                                <p class="text-gray-500 text-sm" id="previewSize"></p>
                            </div>
                            <button type="button" class="bg-white border border-red-500 text-red-500 hover:bg-red-500 hover:text-white w-8 h-8 rounded-full flex items-center justify-center transition" onclick="removePreview()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengubah gambar</p>
                </div>

                {{-- Tombol Submit --}}
                <div class="flex gap-3 justify-end border-t border-gray-200 pt-6">
                    <a href="{{ route('admin.program.index') }}" class="bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 font-medium py-2 px-6 rounded-lg transition">
                        <i class="fas fa-times mr-2"></i>Batal
                    </a>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded-lg transition shadow-md">
                        <i class="fas fa-save mr-2"></i>Update Program
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
// Preview Image
function previewImage(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        
        // Validasi ukuran (2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('File terlalu besar! Maksimal 2MB.');
            input.value = '';
            return;
        }
        
        // Validasi tipe file
        const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
        if (!validTypes.includes(file.type)) {
            alert('Format file tidak valid! Gunakan JPG, JPEG, PNG, atau WEBP.');
            input.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('previewName').textContent = file.name;
            document.getElementById('previewSize').textContent = formatBytes(file.size);
            document.getElementById('previewContainer').classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
}

// Hapus preview
function removePreview() {
    document.getElementById('gambar').value = '';
    document.getElementById('preview').src = '#';
    document.getElementById('previewContainer').classList.add('hidden');
}

// Format bytes
function formatBytes(bytes, decimals = 2) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}

// Drag and drop
const uploadArea = document.getElementById('uploadArea');
if (uploadArea) {
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    uploadArea.addEventListener('drop', function(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        document.getElementById('gambar').files = files;
        previewImage(document.getElementById('gambar'));
    });
}
</script>
@endpush