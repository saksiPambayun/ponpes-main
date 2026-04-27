@extends('admin.layout')

@section('title', 'Data Santri')
@section('page-title', 'Data Santri')

@section('content')
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Dashboard &gt; Data Santri</p>
                </div>
                <a href="{{ route('admin.santri.create') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center gap-2">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Santri</span>
                </a>
            </div>
        </div>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">TOTAL SANTRI</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['total'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-users text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">LAKI-LAKI</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['laki_laki'] ?? 0 }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-mars text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-pink-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">PEREMPUAN</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $stats['perempuan'] ?? 0 }}</p>
                    </div>
                    <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-venus text-pink-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section (Tanpa Gelombang) -->
        <div class="bg-white rounded-xl shadow-sm mb-6">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Filter Data</h3>
            </div>
            <div class="p-6">
                <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">CARI</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Nama / NISN / Asal sekolah..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">ANGKATAN</label>
                        <select name="angkatan"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="">Semua Angkatan</option>
                            @foreach($angkatanList as $tahun)
                                <option value="{{ $tahun }}" {{ request('angkatan') == $tahun ? 'selected' : '' }}>
                                    {{ $tahun }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-end gap-2">
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-300 text-sm">
                            <i class="fas fa-search mr-1"></i>Cari
                        </button>
                        <a href="{{ route('admin.data-santri.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-300 text-sm">
                            <i class="fas fa-undo mr-1"></i>Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table Section (Tanpa Kolom Gelombang) -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NO
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">FOTO
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NAMA
                                LENGKAP</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NISN
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ASAL
                                SEKOLAH</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ANGKATAN</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">AKSI
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($santriTetap as $index => $santri)
                            <tr class="hover:bg-gray-50 transition duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $index + $santriTetap->firstItem() }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($santri->foto)
                                        <img src="{{ Storage::url($santri->foto) }}" class="w-10 h-10 rounded-full object-cover">
                                    @else
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                                            <i class="fas fa-user text-white text-sm"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $santri->nama_lengkap }}</div>
                                    @if($santri->email)
                                        <div class="text-xs text-gray-500">{{ $santri->email }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $santri->nisn ?? '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $santri->asal_sekolah }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                        {{ date('Y', strtotime($santri->created_at)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex gap-3">
                                        <a href="{{ route('admin.data-santri.show', $santri->id) }}"
                                            class="text-blue-600 hover:text-blue-900 transition" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.data-santri.edit', $santri->id) }}"
                                            class="text-yellow-600 hover:text-yellow-900 transition" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button"
                                            onclick="openDeleteModal({{ $santri->id }}, '{{ $santri->nama_lengkap }}')"
                                            class="text-red-600 hover:text-red-900 transition" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="deleteForm{{ $santri->id }}"
                                            action="{{ route('admin.data-santri.destroy', $santri->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                    <i class="fas fa-user-graduate text-5xl mb-3 block text-gray-300"></i>
                                    <p class="text-lg">Belum ada data santri</p>
                                    <p class="text-sm mt-1">Silakan tambah santri baru melalui tombol "Tambah Santri"</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $santriTetap->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection