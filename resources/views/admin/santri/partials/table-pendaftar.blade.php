<div class="card overflow-hidden">
    <div class="p-6 border-b border-gray-200">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <div class="relative">
                    <input type="text" id="searchPending" placeholder="Cari nama santri..."
                        class="input-field w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
            <div>
                <select id="waveFilter" class="border border-gray-300 rounded-lg px-4 py-2">
                    <option value="">Semua Gelombang</option>
                    @foreach($waves ?? [] as $wave)
                        <option value="{{ $wave->id }}">{{ $wave->name }}</option>
                    @endforeach
                </select>
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
                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase">Dokumen</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody id="tablePending">
                @forelse($santri as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-9 h-9 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-700 font-bold text-sm">
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
                            <div class="flex items-center justify-center gap-1.5">
                                @if($item->kk)
                                    <a href="{{ asset('storage/' . $item->kk) }}" target="_blank"
                                        class="px-2 py-1 rounded-md bg-green-50 text-green-700 text-xs hover:bg-green-100">
                                        <i class="fas fa-file-alt mr-1"></i>KK
                                    </a>
                                @else
                                    <span class="px-2 py-1 rounded-md bg-gray-100 text-gray-400 text-xs"><i
                                            class="fas fa-file-alt mr-1"></i>KK</span>
                                @endif
                                @if($item->foto)
                                    <a href="{{ asset('storage/' . $item->foto) }}" target="_blank"
                                        class="px-2 py-1 rounded-md bg-green-50 text-green-700 text-xs hover:bg-green-100">
                                        <i class="fas fa-camera mr-1"></i>Foto
                                    </a>
                                @else
                                    <span class="px-2 py-1 rounded-md bg-gray-100 text-gray-400 text-xs"><i
                                            class="fas fa-camera mr-1"></i>Foto</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-4 py-4 text-center">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <i class="fas fa-clock mr-1"></i>Pending
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex items-center justify-center gap-1">
                                <a href="{{ route('admin.santri.show', $item->id) }}"
                                    class="p-1.5 rounded-lg text-blue-600 hover:bg-blue-50" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.santri.edit', $item->id) }}"
                                    class="p-1.5 rounded-lg text-green-600 hover:bg-green-50" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" onclick="openAcceptModal({{ $item->id }})"
                                    class="p-1.5 rounded-lg text-green-600 hover:bg-green-50" title="Terima">
                                    <i class="fas fa-check-circle"></i>
                                </button>
                                <button type="button" onclick="openRejectModal({{ $item->id }})"
                                    class="p-1.5 rounded-lg text-red-600 hover:bg-red-50" title="Tolak">
                                    <i class="fas fa-times-circle"></i>
                                </button>
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
                        <td colspan="8" class="px-6 py-12 text-center">
                            <i class="fas fa-inbox text-4xl text-gray-300 mb-3 block"></i>
                            <p class="text-gray-500 font-medium">Belum ada pendaftar</p>
                            <p class="text-gray-400 text-sm mt-1">Menunggu pendaftaran baru</p>
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
    document.getElementById('searchPending')?.addEventListener('keyup', function () {
        const term = this.value.toLowerCase();
        document.querySelectorAll('#tablePending tr').forEach(row => {
            if (row.cells && row.cells.length > 0) {
                row.style.display = row.textContent.toLowerCase().includes(term) ? '' : 'none';
            }
        });
    });
</script>
