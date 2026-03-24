@extends('admin.layout')

@section('title', 'Detail Santri')
@section('page-title', 'Detail Data Santri')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="card p-8">

            {{-- Header --}}
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center space-x-4">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-2xl font-bold">
                        {{ strtoupper(substr($santri->nama_lengkap, 0, 2)) }}
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $santri->nama_lengkap }}</h3>
                        <p class="text-gray-500">NISN: {{ $santri->nisn ?? '-' }}</p>
                    </div>
                </div>
                <div>
                    @if($santri->status == 'pending')
                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                            <span class="w-2 h-2 rounded-full bg-yellow-500 mr-2"></span>Pending
                        </span>
                    @elseif($santri->status == 'diterima')
                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            <span class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>Diterima
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-red-100 text-red-800">
                            <span class="w-2 h-2 rounded-full bg-red-500 mr-2"></span>Ditolak
                        </span>
                    @endif
                </div>
            </div>

            {{-- INFORMASI PRIBADI --}}
            <h4 class="text-base font-semibold text-gray-700 mb-3">Informasi Pribadi</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-500 mb-1">Asal Sekolah</p>
                    <p class="font-medium text-gray-900">{{ $santri->asal_sekolah }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-500 mb-1">Tanggal Lahir</p>
                    <p class="font-medium text-gray-900">
                        {{ $santri->tanggal_lahir ? $santri->tanggal_lahir->format('d M Y') : '-' }}
                    </p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-500 mb-1">Email</p>
                    <p class="font-medium text-gray-900">{{ $santri->email ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-500 mb-1">No. Wali</p>
                    <p class="font-medium text-gray-900">{{ $santri->no_wali }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg md:col-span-2">
                    <p class="text-sm text-gray-500 mb-1">Alamat Lengkap</p>
                    <p class="font-medium text-gray-900">{{ $santri->alamat ?? '-' }}</p>
                </div>
            </div>

            {{-- INFORMASI WALI --}}
            <h4 class="text-base font-semibold text-gray-700 mb-3">Informasi Wali</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-500 mb-1">Nama Wali</p>
                    <p class="font-medium text-gray-900">{{ $santri->nama_wali ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-500 mb-1">Pekerjaan Wali</p>
                    <p class="font-medium text-gray-900">{{ $santri->pekerjaan ?? '-' }}</p>
                </div>
            </div>

            {{-- DOKUMEN --}}
            <h4 class="text-base font-semibold text-gray-700 mb-3">Dokumen</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">

                {{-- KK --}}
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <p class="text-sm text-gray-500 mb-3 font-medium">Kartu Keluarga (KK)</p>
                    @if($santri->dok_kk)
                        @php $extKk = strtolower(pathinfo($santri->dok_kk, PATHINFO_EXTENSION)); @endphp
                        @if(in_array($extKk, ['jpg', 'jpeg', 'png']))
                            <a href="{{ asset('storage/' . $santri->dok_kk) }}" target="_blank">
                                <img src="{{ asset('storage/' . $santri->dok_kk) }}"
                                    alt="Kartu Keluarga"
                                    class="w-full h-40 object-cover rounded-lg mb-3 border border-gray-200 hover:opacity-90 transition">
                            </a>
                        @else
                            <div class="flex items-center gap-3 p-3 bg-white border border-gray-200 rounded-lg mb-3">
                                <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                                <span class="text-sm text-gray-600 truncate">{{ basename($santri->dok_kk) }}</span>
                            </div>
                        @endif
                        <a href="{{ asset('storage/' . $santri->dok_kk) }}" target="_blank"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-eye text-xs"></i> Lihat
                        </a>
                    @else
                        <div class="flex flex-col items-center justify-center h-28 border-2 border-dashed border-gray-300 rounded-lg">
                            <i class="fas fa-file-upload text-gray-300 text-3xl mb-2"></i>
                            <p class="text-sm text-gray-400">Belum diupload</p>
                        </div>
                    @endif
                </div>

                {{-- Akta --}}
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <p class="text-sm text-gray-500 mb-3 font-medium">Akta Kelahiran</p>
                    @if($santri->dok_akta)
                        @php $extAkta = strtolower(pathinfo($santri->dok_akta, PATHINFO_EXTENSION)); @endphp
                        @if(in_array($extAkta, ['jpg', 'jpeg', 'png']))
                            <a href="{{ asset('storage/' . $santri->dok_akta) }}" target="_blank">
                                <img src="{{ asset('storage/' . $santri->dok_akta) }}"
                                    alt="Akta Kelahiran"
                                    class="w-full h-40 object-cover rounded-lg mb-3 border border-gray-200 hover:opacity-90 transition">
                            </a>
                        @else
                            <div class="flex items-center gap-3 p-3 bg-white border border-gray-200 rounded-lg mb-3">
                                <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                                <span class="text-sm text-gray-600 truncate">{{ basename($santri->dok_akta) }}</span>
                            </div>
                        @endif
                        <a href="{{ asset('storage/' . $santri->dok_akta) }}" target="_blank"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-eye text-xs"></i> Lihat
                        </a>
                    @else
                        <div class="flex flex-col items-center justify-center h-28 border-2 border-dashed border-gray-300 rounded-lg">
                            <i class="fas fa-file-upload text-gray-300 text-3xl mb-2"></i>
                            <p class="text-sm text-gray-400">Belum diupload</p>
                        </div>
                    @endif
                </div>

            </div>

            {{-- Alasan penolakan (tampil jika ditolak) --}}
            @if($santri->status == 'ditolak' && $santri->alasan_penolakan)
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-sm font-medium text-red-700 mb-1"><i class="fas fa-times-circle mr-1"></i>Alasan Penolakan</p>
                    <p class="text-sm text-red-600">{{ $santri->alasan_penolakan }}</p>
                </div>
            @endif

            {{-- Footer Aksi --}}
            <div class="flex justify-between items-center pt-6 border-t border-gray-200">
                <a href="{{ route('admin.santri.index') }}" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <div class="space-x-3">
                    <a href="{{ route('admin.santri.edit', $santri->id) }}"
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    @if($santri->status == 'pending')
                        <form action="{{ route('admin.santri.verify', $santri->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="btn-primary px-6 py-3 rounded-lg text-white">
                                <i class="fas fa-check mr-2"></i>Verifikasi
                            </button>
                        </form>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection