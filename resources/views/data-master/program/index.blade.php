@extends('admin.layout')

@section('title', 'Data Program')
@section('page-title', 'Data Program')

@section('content')

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Data Program</h3>
            <p class="text-gray-500 text-sm mt-1">Kelola semua program kegiatan pesantren</p>
        </div>
        <a href="{{ route('admin.program.create') }}"
            class="btn-primary px-6 py-2 rounded-lg text-white font-medium inline-flex items-center">
            <i class="fas fa-plus mr-2"></i>Tambah Program
        </a>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg flex items-center gap-2">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="card overflow-hidden">

        {{-- Search Bar --}}
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Cari nama program..."
                            class="input-field w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>
                <div class="flex gap-2">
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Program</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal Mulai</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal Selesai</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="programTable">
                    @forelse($programs as $item)
                        <tr class="hover:bg-gray-50 transition-colors">

                            {{-- Nama Program --}}
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-sm shrink-0">
                                        {{ strtoupper(substr($item->nama_program, 0, 2)) }}
                                    </div>
                                    <p class="text-sm font-semibold text-gray-900">{{ $item->nama_program }}</p>
                                </div>
                            </td>

                            {{-- Kategori --}}
                            <td class="px-4 py-4 text-sm text-gray-600">
                                {{ $item->kategori ?? '-' }}
                            </td>

                            {{-- Tanggal Mulai --}}
                            <td class="px-4 py-4 text-sm text-gray-600 whitespace-nowrap">
                                {{ $item->tanggal_mulai ? \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') : '-' }}
                            </td>

                            {{-- Tanggal Selesai --}}
                            <td class="px-4 py-4 text-sm text-gray-600 whitespace-nowrap">
                                {{ $item->tanggal_selesai ? \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') : '-' }}
                            </td>

                            {{-- Aksi --}}
                            <td class="px-4 py-4">
                                <div class="flex items-center justify-center gap-1">
                                    <a href="{{ route('admin.program.edit', $item->id) }}"
                                        class="p-1.5 rounded-lg text-blue-600 hover:bg-blue-50 transition" title="Edit">
                                        <i class="fas fa-edit text-sm"></i>
                                    </a>
                                    <form action="{{ route('admin.program.destroy', $item->id) }}"
                                        method="POST" class="inline"
                                        onsubmit="return confirm('Yakin ingin menghapus program ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-1.5 rounded-lg text-red-600 hover:bg-red-50 transition" title="Hapus">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <i class="fas fa-inbox text-4xl text-gray-300 mb-3 block"></i>
                                <p class="text-gray-500 font-medium">Belum ada data program</p>
                                <p class="text-gray-400 text-sm mt-1">Tambahkan program baru untuk memulai</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-gray-200">
            {{ $programs->links() }}
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // Search
    document.getElementById('searchInput').addEventListener('keyup', function () {
        const term = this.value.toLowerCase();
        document.querySelectorAll('#programTable tr').forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(term) ? '' : 'none';
        });
    });

    // Status filter
    document.getElementById('statusFilter').addEventListener('change', function () {
        const status = this.value.toLowerCase();
        document.querySelectorAll('#programTable tr').forEach(row => {
            if (!status) { row.style.display = ''; return; }
            const badge = row.querySelector('span[class*="rounded-full"]');
            if (badge) {
                row.style.display = badge.textContent.trim().toLowerCase() === status ? '' : 'none';
            }
        });
    });
</script>
@endpush