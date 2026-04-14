@extends('admin.layout')

@section('title', 'Data Pegawai')
@section('page-title', 'Manajemen Data Pegawai')

@section('content')
    <div class="max-w-7xl mx-auto">

        {{-- Flash Message --}}
        @if (session('success'))
            <div
                class="mb-4 flex items-center gap-3 bg-[#eef3ec] border border-[#b7d3a8] text-[#0d4f14] px-5 py-4 rounded-xl shadow-sm">
                <i class="fas fa-check-circle text-[#4ca94d] text-lg"></i>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Statistik Card --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <!-- Total Pegawai -->
            <div
                class="bg-white rounded-xl shadow-sm p-4 flex items-center justify-between border border-[#dfe8d8] hover:shadow-md transition">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold tracking-wide">TOTAL PEGAWAI</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $totalPegawai }}</h3>
                </div>
                <div class="w-10 h-10 bg-[#eef3ec] rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-[#005F02] text-lg"></i>
                </div>
            </div>

            <!-- Aktif -->
            <div
                class="bg-white rounded-xl shadow-sm p-4 flex items-center justify-between border border-[#dfe8d8] hover:shadow-md transition">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold tracking-wide">AKTIF</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $pegawaiAktif }}</h3>
                </div>
                <div class="w-10 h-10 bg-[#eef3ec] rounded-lg flex items-center justify-center">
                    <i class="fas fa-user-check text-[#4ca94d] text-lg"></i>
                </div>
            </div>

            <!-- Cuti -->
            <div
                class="bg-white rounded-xl shadow-sm p-4 flex items-center justify-between border border-[#dfe8d8] hover:shadow-md transition">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold tracking-wide">CUTI</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $pegawaiCuti }}</h3>
                </div>
                <div class="w-10 h-10 bg-[#eef3ec] rounded-lg flex items-center justify-center">
                    <i class="fas fa-clock text-[#8cbf73] text-lg"></i>
                </div>
            </div>

            <!-- Non-Aktif -->
            <div
                class="bg-white rounded-xl shadow-sm p-4 flex items-center justify-between border border-[#dfe8d8] hover:shadow-md transition">
                <div>
                    <p class="text-xs text-gray-500 uppercase font-semibold tracking-wide">NON-AKTIF</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $pegawaiNonaktif }}</h3>
                </div>
                <div class="w-10 h-10 bg-[#eef3ec] rounded-lg flex items-center justify-center">
                    <i class="fas fa-user-minus text-[#0d4f14] text-lg"></i>
                </div>
            </div>
        </div>

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Data Pegawai</h2>
                <p class="text-xs text-gray-500 mt-0.5">Kelola data pegawai yayasan</p>
            </div>
            <a href="{{ route('admin.pegawai.create') }}"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-[#005F02] to-[#4ca94d] text-white px-5 py-2.5 rounded-lg hover:from-[#0d4f14] hover:to-[#8cbf73] transition shadow-md text-sm font-medium">
                <i class="fas fa-plus-circle"></i>
                Tambah Pegawai
            </a>
        </div>

        {{-- Card Utama --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">

            {{-- Filter & Search --}}
            <form method="GET" action="{{ route('admin.pegawai.index') }}"
                class="p-4 border-b border-gray-200 bg-[#f2f4ef]">
                <div class="flex flex-col md:flex-row gap-3">
                    <div class="flex-1 relative">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari nama, NIP, atau jabatan..."
                            class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] transition">
                    </div>
                    <select name="status"
                        class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] bg-white"
                        onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="cuti" {{ request('status') == 'cuti' ? 'selected' : '' }}>Cuti</option>
                        <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>
                    <button type="submit"
                        class="px-5 py-2 bg-[#005F02] text-white rounded-lg text-sm hover:bg-[#0d4f14] transition font-medium">
                        <i class="fas fa-filter mr-1"></i> Filter
                    </button>
                    @if (request('search') || request('status'))
                        <a href="{{ route('admin.pegawai.index') }}"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-600 hover:bg-[#eef3ec] transition">
                            <i class="fas fa-times mr-1"></i> Reset
                        </a>
                    @endif
                </div>
            </form>

            {{-- Tabel --}}
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-[#eef3ec] to-[#dbe6d4] border-b-2 border-[#b7d3a8]">
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">No</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">NIP</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Nama Pegawai</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Jabatan</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Tipe</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($pegawai as $index => $p)
                            <tr class="hover:bg-[#eef3ec] transition group">
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $pegawai->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-mono text-gray-700 bg-[#f2f4ef] px-2 py-0.5 rounded">
                                        {{ $p->nip ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-9 h-9 rounded-full bg-gradient-to-br from-[#005F02] to-[#4ca94d] flex items-center justify-center text-white text-xs font-bold">
                                            {{ strtoupper(substr($p->nama, 0, 2)) }}
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900 text-sm">{{ $p->nama }}</p>
                                            <p class="text-xs text-gray-400">{{ $p->email ?? '-' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $p->jabatan ?? '-' }}</td>

                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#eef3ec] text-[#0d4f14]">
                                        {{ ucfirst($p->tipe_pegawai ?? '-') }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    @if ($p->status == 'aktif')
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-[#dbe6d4] text-[#0d4f14]">
                                            <span class="w-1.5 h-1.5 rounded-full bg-[#4ca94d]"></span> Aktif
                                        </span>
                                    @elseif($p->status == 'cuti')
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-[#f2f4ef] text-[#2e6b37]">
                                            <span class="w-1.5 h-1.5 rounded-full bg-[#8cbf73]"></span> Cuti
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-[#eef3ec] text-[#0d4f14]">
                                            <span class="w-1.5 h-1.5 rounded-full bg-[#0d4f14]"></span> Non-Aktif
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-1">
                                        <a href="{{ route('admin.pegawai.show', $p->id) }}"
                                            class="p-2 text-[#005F02] hover:bg-[#eef3ec] rounded-lg transition hover:scale-110"
                                            title="Detail">
                                            <i class="fas fa-eye text-sm"></i>
                                        </a>
                                        <a href="{{ route('admin.pegawai.edit', $p->id) }}"
                                            class="p-2 text-[#005F02] hover:bg-[#eef3ec] rounded-lg transition hover:scale-110"
                                            title="Edit">
                                            <i class="fas fa-edit text-sm"></i>
                                        </a>
                                        <form action="{{ route('admin.pegawai.destroy', $p->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-[#005F02] hover:bg-[#fee2e2] rounded-lg transition hover:scale-110"
                                                title="Hapus"
                                                onclick="return confirm('Yakin ingin menghapus pegawai {{ addslashes($p->nama) }}?')">
                                                <i class="fas fa-trash text-sm"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <i class="fas fa-users text-4xl text-gray-300 mb-3"></i>
                                        <h3 class="text-base font-medium text-gray-600 mb-1">Tidak ada data pegawai</h3>
                                        <p class="text-sm text-gray-400">Silakan tambah pegawai baru</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($pegawai->hasPages())
                <div
                    class="px-6 py-4 border-t border-gray-100 bg-gray-50 flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                    <p class="text-xs text-gray-500">
                        Menampilkan <span class="font-medium text-gray-700">{{ $pegawai->firstItem() }}</span>–<span
                            class="font-medium text-gray-700">{{ $pegawai->lastItem() }}</span>
                        dari <span class="font-medium text-gray-700">{{ $pegawai->total() }}</span> data
                    </p>
                    {{ $pegawai->links('pagination::tailwind') }}
                </div>
            @endif

        </div>
    </div>
@endsection

<style>
    /* === GLOBAL SMOOTH === */
    * {
        transition: all 0.25s ease;
    }

    /* === CARD STATISTIK === */
    .grid>div:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    }

    /* ICON DI CARD */
    .grid>div:hover i {
        transform: rotate(10deg) scale(1.1);
    }

    /* === BUTTON TAMBAH === */
    a[href*="create"]:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 95, 2, 0.3);
    }

    /* === SEARCH INPUT === */
    input:focus {
        transform: scale(1.02);
    }

    /* === SELECT & BUTTON FILTER === */
    select:hover,
    button:hover {
        transform: translateY(-1px);
    }

    /* === TABLE ROW === */
    tbody tr {
        transition: all 0.2s ease;
    }

    tbody tr:hover {
        transform: scale(1.01);
        background: #eef3ec !important;
    }

    /* === FOTO BULAT (INISIAL) === */
    tbody tr:hover .rounded-full {
        transform: scale(1.1);
    }

    /* === AKSI BUTTON === */
    tbody a,
    tbody button {
        transition: all 0.2s ease;
    }

    tbody a:hover,
    tbody button:hover {
        transform: scale(1.25);
    }

    /* === BADGE STATUS === */
    span[class*="inline-flex"]:hover {
        transform: scale(1.05);
    }

    /* === TABLE HEADER === */
    thead tr {
        transition: all 0.2s ease;
    }

    thead tr:hover {
        letter-spacing: 0.5px;
    }
</style>