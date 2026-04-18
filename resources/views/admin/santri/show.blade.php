{{-- resources/views/admin/santri/show.blade.php --}}
@extends('admin.layout')

@section('title', 'Detail Santri')
@section('page-title', 'Detail Pendaftaran Santri')

@section('content')
<div class="card" style="background: #fff; border-radius: 20px;">
    <div class="p-6 border-b" style="background: #eef3ec; border-radius: 20px 20px 0 0;">
        <h3 class="font-bold">Informasi Pendaftaran</h3>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <div class="mb-4">
                    <label class="text-sm text-gray-500">Nama Lengkap</label>
                    <p class="font-semibold">{{ $santri->nama_lengkap }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-sm text-gray-500">NISN</label>
                    <p class="font-semibold">{{ $santri->nisn ?? '-' }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-sm text-gray-500">Asal Sekolah</label>
                    <p class="font-semibold">{{ $santri->asal_sekolah }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-sm text-gray-500">Gelombang Pendaftaran</label>
                    <p class="font-semibold">{{ $santri->wave ? $santri->wave->name : '-' }}</p>
                </div>
            </div>
            <div>
                <div class="mb-4">
                    <label class="text-sm text-gray-500">Nama Wali</label>
                    <p class="font-semibold">{{ $santri->nama_wali }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-sm text-gray-500">No. Telepon Wali</label>
                    <p class="font-semibold">{{ $santri->no_wali }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-sm text-gray-500">Status Verifikasi</label>
                    <span class="px-2 py-1 text-xs rounded-full {{ $santri->status == 'diterima' ? 'bg-green-100 text-green-700' : ($santri->status == 'ditolak' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                        {{ ucfirst($santri->status) }}
                    </span>
                </div>
                <div class="mb-4">
                    <label class="text-sm text-gray-500">Status Penerimaan</label>
                    <span class="px-2 py-1 text-xs rounded-full {{ $santri->acceptance_status == 'accepted' ? 'bg-green-100 text-green-700' : ($santri->acceptance_status == 'rejected' ? 'bg-red-100 text-red-700' : ($santri->acceptance_status == 'waiting_list' ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 text-gray-700')) }}">
                        {{ $santri->acceptance_status == 'accepted' ? 'Diterima' : ($santri->acceptance_status == 'rejected' ? 'Ditolak' : ($santri->acceptance_status == 'waiting_list' ? 'Waiting List' : 'Menunggu')) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Form Proses Penerimaan -->
        <div class="mt-6 pt-6 border-t">
            <h4 class="font-semibold mb-4">Proses Penerimaan</h4>
            <form action="{{ route('admin.pendaftaran.santri.process-acceptance', $santri->id) }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Status Penerimaan</label>
                        <select name="acceptance_status" class="w-full px-3 py-2 border rounded-lg" required>
                            <option value="pending" {{ $santri->acceptance_status == 'pending' ? 'selected' : '' }}>-- Pilih Status --</option>
                            <option value="accepted" {{ $santri->acceptance_status == 'accepted' ? 'selected' : '' }}>✅ Diterima</option>
                            <option value="rejected" {{ $santri->acceptance_status == 'rejected' ? 'selected' : '' }}>❌ Ditolak</option>
                            <option value="waiting_list" {{ $santri->acceptance_status == 'waiting_list' ? 'selected' : '' }}>⏳ Waiting List</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Tanggal Pengumuman</label>
                        <input type="date" name="announcement_date" class="w-full px-3 py-2 border rounded-lg" value="{{ $santri->announcement_date ? date('Y-m-d', strtotime($santri->announcement_date)) : date('Y-m-d') }}">
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium mb-2">Catatan (Opsional)</label>
                    <textarea name="acceptance_note" rows="3" class="w-full px-3 py-2 border rounded-lg" placeholder="Alasan penerimaan/penolakan...">{{ $santri->acceptance_note }}</textarea>
                </div>
                <div class="mt-4 flex justify-end">
                    <button type="submit" class="px-4 py-2 rounded-lg text-white" style="background: linear-gradient(135deg, #005F02, #0f4d1c);">
                        Simpan Keputusan
                    </button>
                </div>
            </form>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-6 pt-6 border-t flex justify-end space-x-3">
            <a href="{{ route('admin.santri.index') }}" class="px-4 py-2 border rounded-lg">Kembali</a>
            @if($santri->status == 'pending')
                <form action="{{ route('admin.santri.verify', $santri->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 rounded-lg text-white" style="background: #005F02;">
                        Terima Pendaftaran
                    </button>
                </form>
                <button type="button" onclick="showRejectModal()" class="px-4 py-2 rounded-lg text-white" style="background: #dc2626;">
                    Tolak Pendaftaran
                </button>
            @endif
        </div>
    </div>
</div>

<!-- Modal Penolakan -->
<div id="rejectModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 max-w-md w-full">
        <h3 class="text-lg font-bold mb-4">Tolak Pendaftaran</h3>
        <form id="rejectForm" action="{{ route('admin.santri.reject', $santri->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Alasan Penolakan</label>
                <textarea name="alasan_penolakan" rows="4" class="w-full px-3 py-2 border rounded-lg" required></textarea>
            </div>
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="hideRejectModal()" class="px-4 py-2 border rounded-lg">Batal</button>
                <button type="submit" class="px-4 py-2 rounded-lg text-white" style="background: #dc2626;">Tolak</button>
            </div>
        </form>
    </div>
</div>

<script>
    function showRejectModal() {
        document.getElementById('rejectModal').classList.remove('hidden');
        document.getElementById('rejectModal').classList.add('flex');
    }
    function hideRejectModal() {
        document.getElementById('rejectModal').classList.add('hidden');
        document.getElementById('rejectModal').classList.remove('flex');
    }
</script>
@endsection
