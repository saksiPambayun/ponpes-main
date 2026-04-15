@extends('admin.layout')

@section('title', 'Data SK')
@section('page-title', 'Data Surat Keputusan')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Data Surat Keputusan (SK)</h3>
            <p class="text-gray-500 text-sm mt-1">Kelola dokumen SK yayasan</p>
        </div>
        <a href="{{ route('admin.sk.create') }}"
            class="btn-primary px-6 py-2 rounded-lg text-white font-medium inline-flex items-center">
            <i class="fas fa-plus mr-2"></i>Tambah SK
        </a>
    </div>

    <div class="card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Nomor SK</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Tentang</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">File</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($sk as $item)
                        <tr class="table-row">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->nomor_sk }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $item->tentang }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $item->tanggal_sk ? $item->tanggal_sk->format('d M Y') : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->file_sk)
                                    <a href="{{ asset('storage/' . $item->file_sk) }}" target="_blank"
                                        class="text-indigo-600 hover:text-indigo-900 text-sm">
                                        <i class="fas fa-file-pdf mr-1"></i>{{ basename($item->file_sk) }}
                                    </a>
                                @else
                                    <span class="text-gray-400 text-sm">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.sk.show', $item->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900 mr-3" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.sk.edit', $item->id) }}"
                                    class="text-blue-600 hover:text-blue-900 mr-3" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form id="deleteForm{{ $item->id }}" action="{{ route('admin.sk.destroy', $item->id) }}"
                                    method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="text-red-600 hover:text-red-900"
                                        onclick="openDeleteModal('{{ $item->id }}', '{{ addslashes($item->nomor_sk) }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                <i class="fas fa-file-signature text-4xl mb-2 text-gray-300"></i>
                                <p>Belum ada data SK</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-6 border-t border-gray-200">
            {{ $sk->links() }}
        </div>
        <!-- DELETE MODAL -->
        <div id="deleteModal" class="modal-overlay">
            <div class="modal-box">
                <div class="modal-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h3>Hapus Data</h3>
                <p id="deleteText"></p>

                <div class="modal-actions">
                    <button class="btn-cancel" onclick="closeDeleteModal()">Batal</button>
                    <button class="btn-delete" onclick="confirmDelete()">Hapus</button>
                </div>
            </div>
        </div>
    </div>
<script>
let selectedForm = null;

function openDeleteModal(id, nama) {
    selectedForm = document.getElementById('deleteForm' + id);
    document.getElementById('deleteText').innerText =
        `Yakin ingin menghapus SK "${nama}"?`;

    document.getElementById('deleteModal').classList.add('show');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.remove('show');
    selectedForm = null;
}

function confirmDelete() {
    if (selectedForm) {
        selectedForm.submit();
    }
}

// klik luar modal
window.addEventListener('click', function(e) {
    const modal = document.getElementById('deleteModal');
    if (e.target === modal) {
        closeDeleteModal();
    }
});
</script>

<style>
    .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.45);
    display: flex;
    align-items: center;
    justify-content: center;

    opacity: 0;
    visibility: hidden;

    /* 🔥 FIX BUG TRANSISI ANEH */
    transition: opacity 0.3s ease, visibility 0.3s ease;

    z-index: 999;
}

.modal-overlay.show {
    opacity: 1;
    visibility: visible;
}

.modal-box {
    background: #fff;
    padding: 24px;
    border-radius: 16px;
    width: 320px;
    text-align: center;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);

    transform: translateY(20px);
    transition: transform 0.3s ease;
}

.modal-overlay.show .modal-box {
    transform: translateY(0);
}

.modal-icon {
    font-size: 2rem;
    color: #dc2626;
    margin-bottom: 10px;
}

.modal-actions {
    display: flex;
    gap: 10px;
    justify-content: center;
}

.btn-cancel {
    padding: 8px 16px;
    border-radius: 8px;
    border: 1px solid #ccc;
    background: #f4f4f4;
    cursor: pointer;
}

.btn-delete {
    padding: 8px 16px;
    border-radius: 8px;
    border: none;
    background: #dc2626;
    color: white;
    cursor: pointer;
}
</style>
@endsection