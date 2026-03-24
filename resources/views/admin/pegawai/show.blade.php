@extends('admin.layout')

@section('title', 'Detail Pegawai')
@section('page-title', 'Detail Data Pegawai')

@section('content')
    <div class="max-w-4xl mx-auto">

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="mb-4 flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-5 py-4 rounded-xl shadow-sm">
                <i class="fas fa-check-circle text-green-500"></i>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Back --}}
        <a href="{{ route('admin.pegawai.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-indigo-600 mb-5 transition">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pegawai
        </a>

        {{-- Profile Card --}}
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">

            {{-- Header Profil --}}
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-8">
                <div class="flex items-center gap-5">
                    <div class="w-20 h-20 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center text-white text-3xl font-bold border-2 border-white/40 shrink-0">
                        {{ strtoupper(substr($pegawai->nama, 0, 2)) }}
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">{{ $pegawai->nama }}</h2>
                        <p class="text-indigo-200 text-sm mt-0.5">NIP: {{ $pegawai->nip ?? '-' }}</p>
                        <div class="flex flex-wrap gap-2 mt-2">
                            {{-- Status Badge --}}
                            @if($pegawai->status == 'aktif')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-green-400/20 text-green-200 border border-green-400/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span> Aktif
                                </span>
                            @elseif($pegawai->status == 'cuti')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-yellow-400/20 text-yellow-200 border border-yellow-400/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-400"></span> Cuti
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-red-400/20 text-red-200 border border-red-400/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span> Non-Aktif
                                </span>
                            @endif
                            {{-- Tipe Badge --}}
                            @if($pegawai->tipe_pegawai)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/20 text-white border border-white/30">
                                    {{ ucfirst($pegawai->tipe_pegawai) }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8">

                {{-- Info Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">

                    @php
                        $infoItems = [
                            ['icon' => 'fa-briefcase',    'label' => 'Jabatan',          'value' => $pegawai->jabatan],
                            ['icon' => 'fa-sitemap',      'label' => 'Divisi',           'value' => $pegawai->divisi],
                            ['icon' => 'fa-envelope',     'label' => 'Email',            'value' => $pegawai->email],
                            ['icon' => 'fa-phone',        'label' => 'No. Telepon',      'value' => $pegawai->no_telepon],
                            ['icon' => 'fa-map-marker-alt','label' => 'Tempat Lahir',    'value' => $pegawai->tempat_lahir],
                            // Gunakan optional chaining karena sudah di-cast sebagai date
                            ['icon' => 'fa-birthday-cake','label' => 'Tanggal Lahir',   'value' => $pegawai->tanggal_lahir?->format('d M Y')],
                            ['icon' => 'fa-venus-mars',   'label' => 'Jenis Kelamin',   'value' => $pegawai->jenis_kelamin == 'L' ? 'Laki-laki' : ($pegawai->jenis_kelamin == 'P' ? 'Perempuan' : null)],
                            ['icon' => 'fa-pray',         'label' => 'Agama',           'value' => $pegawai->agama],
                            ['icon' => 'fa-calendar-check','label' => 'Tanggal Bergabung','value' => $pegawai->tanggal_bergabung?->format('d M Y')],
                        ];
                    @endphp

                    @foreach($infoItems as $item)
                        <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl">
                            <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                                <i class="fas {{ $item['icon'] }} text-indigo-500 text-xs"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs text-gray-400 mb-0.5">{{ $item['label'] }}</p>
                                <p class="text-sm font-medium text-gray-800">{{ $item['value'] ?? '-' }}</p>
                            </div>
                        </div>
                    @endforeach

                    {{-- Alamat (full width) --}}
                    <div class="md:col-span-2 flex items-start gap-3 p-4 bg-gray-50 rounded-xl">
                        <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                            <i class="fas fa-home text-indigo-500 text-xs"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 mb-0.5">Alamat</p>
                            <p class="text-sm font-medium text-gray-800 leading-relaxed">{{ $pegawai->alamat ?? '-' }}</p>
                        </div>
                    </div>

                </div>

                {{-- =====================
                     DOKUMEN
                ===================== --}}
                <div class="border-t border-gray-100 pt-6">
                    <h3 class="text-base font-semibold text-gray-800 mb-4 flex items-center gap-2">
                        <i class="fas fa-file-alt text-indigo-500"></i> Dokumen Pegawai
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                        {{-- KTP --}}
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <div class="px-4 py-2.5 bg-gray-50 border-b border-gray-200 flex items-center gap-2">
                                <i class="fas fa-id-card text-indigo-500 text-sm"></i>
                                <p class="text-sm font-medium text-gray-700">KTP</p>
                            </div>
                            <div class="p-3">
                                @if($pegawai->foto_ktp)
                                    <a href="{{ asset('storage/' . $pegawai->foto_ktp) }}" target="_blank" class="block group">
                                        <img src="{{ asset('storage/' . $pegawai->foto_ktp) }}"
                                             alt="Foto KTP"
                                             class="w-full h-44 object-cover rounded-lg group-hover:opacity-90 transition"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="hidden h-44 bg-gray-100 rounded-lg flex-col items-center justify-center gap-2">
                                            <i class="fas fa-image text-gray-300 text-3xl"></i>
                                            <p class="text-xs text-gray-400">Gambar tidak dapat dimuat</p>
                                        </div>
                                        <p class="text-xs text-center text-indigo-600 mt-2 group-hover:underline">
                                            <i class="fas fa-external-link-alt mr-1"></i> Buka full size
                                        </p>
                                    </a>
                                @else
                                    <div class="h-44 bg-gray-100 rounded-lg flex flex-col items-center justify-center gap-2">
                                        <i class="fas fa-id-card text-gray-300 text-3xl"></i>
                                        <p class="text-xs text-gray-400">Belum diupload</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- NPWP --}}
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <div class="px-4 py-2.5 bg-gray-50 border-b border-gray-200 flex items-center gap-2">
                                <i class="fas fa-file-invoice text-indigo-500 text-sm"></i>
                                <p class="text-sm font-medium text-gray-700">NPWP</p>
                            </div>
                            <div class="p-3">
                                @if($pegawai->foto_npwp)
                                    <a href="{{ asset('storage/' . $pegawai->foto_npwp) }}" target="_blank" class="block group">
                                        <img src="{{ asset('storage/' . $pegawai->foto_npwp) }}"
                                             alt="Foto NPWP"
                                             class="w-full h-44 object-cover rounded-lg group-hover:opacity-90 transition"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="hidden h-44 bg-gray-100 rounded-lg flex-col items-center justify-center gap-2">
                                            <i class="fas fa-image text-gray-300 text-3xl"></i>
                                            <p class="text-xs text-gray-400">Gambar tidak dapat dimuat</p>
                                        </div>
                                        <p class="text-xs text-center text-indigo-600 mt-2 group-hover:underline">
                                            <i class="fas fa-external-link-alt mr-1"></i> Buka full size
                                        </p>
                                    </a>
                                @else
                                    <div class="h-44 bg-gray-100 rounded-lg flex flex-col items-center justify-center gap-2">
                                        <i class="fas fa-file-invoice text-gray-300 text-3xl"></i>
                                        <p class="text-xs text-gray-400">Belum diupload</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Ijazah --}}
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <div class="px-4 py-2.5 bg-gray-50 border-b border-gray-200 flex items-center gap-2">
                                <i class="fas fa-graduation-cap text-indigo-500 text-sm"></i>
                                <p class="text-sm font-medium text-gray-700">Ijazah</p>
                            </div>
                            <div class="p-3">
                                @if($pegawai->foto_ijazah)
                                    @php
                                        $ext = strtolower(pathinfo($pegawai->foto_ijazah, PATHINFO_EXTENSION));
                                    @endphp
                                    @if($ext === 'pdf')
                                        <div class="h-44 bg-red-50 rounded-lg flex flex-col items-center justify-center gap-2">
                                            <i class="fas fa-file-pdf text-red-400 text-3xl"></i>
                                            <a href="{{ asset('storage/' . $pegawai->foto_ijazah) }}"
                                               target="_blank"
                                               class="text-xs text-red-600 hover:underline font-medium">
                                                <i class="fas fa-external-link-alt mr-1"></i> Buka PDF
                                            </a>
                                        </div>
                                    @else
                                        <a href="{{ asset('storage/' . $pegawai->foto_ijazah) }}" target="_blank" class="block group">
                                            <img src="{{ asset('storage/' . $pegawai->foto_ijazah) }}"
                                                 alt="Foto Ijazah"
                                                 class="w-full h-44 object-cover rounded-lg group-hover:opacity-90 transition"
                                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                            <div class="hidden h-44 bg-gray-100 rounded-lg flex-col items-center justify-center gap-2">
                                                <i class="fas fa-image text-gray-300 text-3xl"></i>
                                                <p class="text-xs text-gray-400">Gambar tidak dapat dimuat</p>
                                            </div>
                                            <p class="text-xs text-center text-indigo-600 mt-2 group-hover:underline">
                                                <i class="fas fa-external-link-alt mr-1"></i> Buka full size
                                            </p>
                                        </a>
                                    @endif
                                @else
                                    <div class="h-44 bg-gray-100 rounded-lg flex flex-col items-center justify-center gap-2">
                                        <i class="fas fa-graduation-cap text-gray-300 text-3xl"></i>
                                        <p class="text-xs text-gray-400">Belum diupload</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>

                    <p class="text-xs text-gray-400 mt-3 flex items-center gap-1">
                        <i class="fas fa-info-circle"></i>
                        Jika gambar tidak tampil, jalankan <code class="bg-gray-100 px-1.5 py-0.5 rounded text-gray-600">php artisan storage:link</code> di terminal.
                    </p>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-between items-center pt-6 mt-6 border-t border-gray-100">
                    <div class="text-xs text-gray-400">
                        <i class="fas fa-clock mr-1"></i>
                        Dibuat: {{ $pegawai->created_at->format('d M Y H:i') }}
                        @if($pegawai->updated_at != $pegawai->created_at)
                            &bull; Diperbarui: {{ $pegawai->updated_at->format('d M Y H:i') }}
                        @endif
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.pegawai.edit', $pegawai->id) }}"
                           class="inline-flex items-center gap-2 px-5 py-2.5 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition text-sm font-medium">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        {{-- Delete form: wajib POST + @method('DELETE') + @csrf --}}
                        <form action="{{ route('admin.pegawai.destroy', $pegawai->id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus data pegawai {{ addslashes($pegawai->nama) }}? Tindakan ini tidak dapat dibatalkan.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition text-sm font-medium">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
