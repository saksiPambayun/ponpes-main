@extends('admin.layout')

@section('title', $title)
@section('page-title', 'Detail Program')

@section('content')
<div class="container-fluid px-4 py-4">
    
    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div>
            <h4 class="text-2xl font-bold text-gray-800 mb-1">Detail Program</h4>
            <p class="text-sm text-gray-600">Informasi lengkap program: {{ $program->nama_program }}</p>
        </div>
        <div class="flex gap-2 mt-3 md:mt-0">
            <a href="{{ route('admin.program.edit', $program->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition inline-flex items-center">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <a href="{{ route('admin.program.index') }}" class="bg-white border border-gray-300 hover:bg-gray-100 text-gray-700 font-medium py-2 px-4 rounded-lg transition inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </div>

    {{-- Content --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Main Info --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h5 class="font-semibold text-gray-700 flex items-center">
                        <i class="fas fa-info-circle text-indigo-500 mr-2"></i>
                        Informasi Program
                    </h5>
                </div>
                
                <div class="p-6">
                    <table class="w-full">
                        <tr class="border-b border-gray-100">
                            <td class="py-3 text-gray-600 font-medium w-1/3">Nama Program</td>
                            <td class="py-3 text-gray-800">: {{ $program->nama_program }}</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="py-3 text-gray-600 font-medium">Kategori</td>
                            <td class="py-3">
                                : 
                                @if($program->kategori == 'pendidikan')
                                    <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">📚 Pendidikan</span>
                                @elseif($program->kategori == 'sosial')
                                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">❤️ Sosial</span>
                                @elseif($program->kategori == 'keagamaan')
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs">🕌 Keagamaan</span>
                                @elseif($program->kategori == 'kesehatan')
                                    <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs">🏥 Kesehatan</span>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="py-3 text-gray-600 font-medium">Status</td>
                            <td class="py-3">
                                : 
                                @if($program->status == 'aktif')
                                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Aktif</span>
                                @elseif($program->status == 'selesai')
                                    <span class="px-2 py-1 bg-gray-100 text-gray-700 rounded-full text-xs">Selesai</span>
                                @else
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs">Ditunda</span>
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="py-3 text-gray-600 font-medium">Tanggal Mulai</td>
                            <td class="py-3 text-gray-800">: {{ $program->tanggal_mulai ? $program->tanggal_mulai->format('d F Y') : '-' }}</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="py-3 text-gray-600 font-medium">Tanggal Selesai</td>
                            <td class="py-3 text-gray-800">: {{ $program->tanggal_selesai ? $program->tanggal_selesai->format('d F Y') : '-' }}</td>
                        </tr>
                        <tr class="border-b border-gray-100">
                            <td class="py-3 text-gray-600 font-medium">Dibuat Pada</td>
                            <td class="py-3 text-gray-800">: {{ $program->created_at->format('d F Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td class="py-3 text-gray-600 font-medium">Terakhir Update</td>
                            <td class="py-3 text-gray-800">: {{ $program->updated_at->format('d F Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mt-6">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h5 class="font-semibold text-gray-700 flex items-center">
                        <i class="fas fa-align-left text-indigo-500 mr-2"></i>
                        Deskripsi Program
                    </h5>
                </div>
                
                <div class="p-6">
                    <p class="text-gray-700 leading-relaxed">{{ $program->deskripsi }}</p>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="lg:col-span-1">
            {{-- Gambar --}}
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h5 class="font-semibold text-gray-700 flex items-center">
                        <i class="fas fa-image text-indigo-500 mr-2"></i>
                        Gambar Program
                    </h5>
                </div>
                
                <div class="p-6">
                    @if($program->gambar)
                        <img src="{{ asset('storage/' . $program->gambar) }}" 
                             alt="{{ $program->nama_program }}"
                             class="w-full rounded-lg shadow-md">
                    @else
                        <div class="bg-gray-100 rounded-lg p-8 text-center">
                            <i class="fas fa-image text-5xl text-gray-400 mb-3"></i>
                            <p class="text-gray-500">Tidak ada gambar</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Aksi Cepat --}}
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mt-6">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h5 class="font-semibold text-gray-700 flex items-center">
                        <i class="fas fa-bolt text-indigo-500 mr-2"></i>
                        Aksi Cepat
                    </h5>
                </div>
                
                <div class="p-6">
                    <div class="space-y-2">
                        <a href="{{ route('admin.program.edit', $program->id) }}" 
                           class="block w-full bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-medium py-2 px-4 rounded-lg transition text-center">
                            <i class="fas fa-edit mr-2"></i> Edit Program
                        </a>
                        <form action="{{ route('admin.program.destroy', $program->id) }}" method="POST" 
                              onsubmit="return confirm('Yakin ingin menghapus program ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="block w-full bg-red-50 hover:bg-red-100 text-red-700 font-medium py-2 px-4 rounded-lg transition text-center">
                                <i class="fas fa-trash mr-2"></i> Hapus Program
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection