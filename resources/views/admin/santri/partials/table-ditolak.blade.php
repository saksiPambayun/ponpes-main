<div class="card overflow-hidden">
    <div class="p-6 border-b border-gray-200">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <div class="relative">
                    <input type="text" id="searchDitolak" placeholder="Cari nama santri..."
                        class="input-field w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">NISN</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Asal Sekolah</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Gelombang</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">No. Wali</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Alasan Penolakan</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody id="tableDitolak">
                @forelse($santri as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-9 h-9 rounded-full bg-red-100 flex items-center justify-center text-red-700 font-bold text-sm">
                                    {{ strtoupper(substr($item->nama_lengkap, 0, 2)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ $item->nama_lengkap }}</p>
                                    <p class="text-xs text-gray-400">{{ $item->email ?? '-' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-600">{{ $item->nisn ?? '-' }}</td>
                        <td class="px-4 py-4 text-sm text-gray-600">{{ $item->asal_sekolah }}</td>
                        <td class="px-4 py-4">
                            <span
                                class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">{{ $item->wave->name ?? '-' }}</span>
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-600">{{ $item->no_wali }}</td>
                        <td class="px-4 py-4">
                            <span
                                class="text-xs text-red-600 line-clamp-2">{{ Str::limit($item->alasan_penolakan, 50) }}</span>
                        </td>
                        <td class="px-4 py-4 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <a href="{{ route('admin.santri.show', $item->id) }}"
                                    class="p-1.5 rounded-lg text-blue-600 hover:bg-blue-50" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form id="deleteForm{{ $item->id }}" action="{{ route('admin.santri.destroy', $item->id) }}"
                                    method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        onclick="openDeleteModal({{ $item->id }}, '{{ addslashes($item->nama_lengkap) }}')"
                                        class="p-1.5 rounded-lg text-red-600 hover:bg-red-50" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <i class="fas fa-user-times text-4xl text-gray-300 mb-3 block"></i>
                            <p class="text-gray-500 font-medium">Belum ada santri yang ditolak</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-6 border-t border-gray-200">
        {{ $santri->links() }}
    </div>
</div>

<script>
    document.getElementById('searchDitolak')?.addEventListener('keyup', function () {
        const term = this.value.toLowerCase();
        document.querySelectorAll('#tableDitolak tr').forEach(row => {
            if (row.cells && row.cells.length > 0) {
                row.style.display = row.textContent.toLowerCase().includes(term) ? '' : 'none';
            }
        });
    });
</script>
