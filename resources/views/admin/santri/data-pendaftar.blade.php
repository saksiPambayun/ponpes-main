@extends('admin.layout')

@section('title', 'Data Pendaftar')
@section('page-title', 'Data Pendaftar (Calon Santri)')

@section('content')
    <div class="card">
        <div class="card-header bg-white p-4 border-b border-gray-200">
            <div class="flex justify-between items-center flex-wrap gap-4">
                <div>
                    <h5 class="text-lg font-semibold text-gray-800">Manajemen Pendaftaran Santri Baru</h5>
                    <p class="text-sm text-gray-500 mt-1">Kelola calon santri yang mendaftar</p>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.santri.create') }}" class="btn-primary px-4 py-2 rounded-lg text-white">
                        <i class="fas fa-plus mr-2"></i>Tambah Manual
                    </a>
                </div>
            </div>
        </div>

        <!-- Tab Navigation -->
        <div class="border-b border-gray-200">
            <nav class="flex -mb-px">
                <a href="{{ route('admin.pendaftar.index', array_merge(request()->all(), ['status' => 'pending'])) }}"
                    class="py-3 px-6 text-center border-b-2 {{ $currentStatus == 'pending' ? 'border-green-500 text-green-600' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                    <i class="fas fa-clock mr-1"></i> Menunggu
                    @if($stats['pending'] > 0)
                        <span
                            class="ml-1 bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded-full text-xs">{{ $stats['pending'] }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.pendaftar.index', array_merge(request()->all(), ['status' => 'diterima'])) }}"
                    class="py-3 px-6 text-center border-b-2 {{ $currentStatus == 'diterima' ? 'border-green-500 text-green-600' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                    <i class="fas fa-check-circle mr-1"></i> Diterima
                    @if($stats['diterima'] > 0)
                        <span
                            class="ml-1 bg-green-100 text-green-800 px-2 py-0.5 rounded-full text-xs">{{ $stats['diterima'] }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.pendaftar.index', array_merge(request()->all(), ['status' => 'ditolak'])) }}"
                    class="py-3 px-6 text-center border-b-2 {{ $currentStatus == 'ditolak' ? 'border-green-500 text-green-600' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                    <i class="fas fa-times-circle mr-1"></i> Ditolak
                    @if($stats['ditolak'] > 0)
                        <span
                            class="ml-1 bg-red-100 text-red-800 px-2 py-0.5 rounded-full text-xs">{{ $stats['ditolak'] }}</span>
                    @endif
                </a>
            </nav>
        </div>

        <!-- Filter -->
        <div class="p-4 border-b border-gray-200 bg-gray-50">
            <form method="GET" class="flex flex-wrap gap-3 items-end">
                <input type="hidden" name="status" value="{{ $currentStatus }}">
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-xs text-gray-600 mb-1">Cari</label>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Nama / NISN / Asal sekolah / No. Wali..."
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-green-500">
                </div>
                <div class="w-48">
                    <label class="block text-xs text-gray-600 mb-1">Gelombang</label>
                    <select name="wave_id" class="w-full px-3 py-2 border rounded-lg">
                        <option value="">Semua Gelombang</option>
                        @foreach($waves as $wave)
                            <option value="{{ $wave->id }}" {{ request('wave_id') == $wave->id ? 'selected' : '' }}>
                                {{ $wave->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                        <i class="fas fa-search mr-1"></i> Filter
                    </button>
                    <a href="{{ route('admin.pendaftar.index', ['status' => $currentStatus]) }}"
                        class="text-gray-500 px-3 py-2">
                        <i class="fas fa-undo"></i>
                    </a>
                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Asal Sekolah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No. Wali</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gelombang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tgl Daftar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pendaftar as $index => $santri)
                        <tr class="table-row">
                            <td class="px-6 py-4">{{ $index + $pendaftar->firstItem() }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if($santri->foto)
                                        <img src="{{ Storage::url($santri->foto) }}" class="w-8 h-8 rounded-full object-cover mr-2">
                                    @else
                                        <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center mr-2">
                                            <i class="fas fa-user text-gray-500 text-xs"></i>
                                        </div>
                                    @endif
                                    <span class="font-medium">{{ $santri->nama_lengkap }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ $santri->asal_sekolah }}</td>
                            <td class="px-6 py-4">{{ $santri->no_wali }}</td>
                            <td class="px-6 py-4">{{ $santri->wave->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $santri->created_at->format('d/m/Y') }}</td>
                            <td class="px-6 py-4">
                                @if($santri->status == 'pending')
                                    <span class="badge-pending px-2 py-1 rounded-full text-xs font-semibold">
                                        <i class="fas fa-clock mr-1"></i> Menunggu
                                    </span>
                                @elseif($santri->status == 'diterima')
                                    <span class="badge-success px-2 py-1 rounded-full text-xs font-semibold">
                                        <i class="fas fa-check mr-1"></i> Diterima
                                    </span>
                                @else
                                    <span class="badge-danger px-2 py-1 rounded-full text-xs font-semibold">
                                        <i class="fas fa-times mr-1"></i> Ditolak
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.pendaftar.show', $santri->id) }}"
                                        class="text-blue-600 hover:text-blue-800" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    @if($santri->status == 'pending')
                                        <button type="button"
                                            onclick="openAcceptModal({{ $santri->id }}, '{{ addslashes($santri->nama_lengkap) }}')"
                                            class="text-green-600 hover:text-green-800" title="Terima">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                        <button type="button"
                                            onclick="openRejectModal({{ $santri->id }}, '{{ addslashes($santri->nama_lengkap) }}')"
                                            class="text-red-600 hover:text-red-800" title="Tolak">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                    @endif

                                    <a href="{{ route('admin.pendaftar.edit', $santri->id) }}"
                                        class="text-yellow-600 hover:text-yellow-800" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <button type="button"
                                        onclick="openDeleteModal({{ $santri->id }}, '{{ addslashes($santri->nama_lengkap) }}')"
                                        class="text-red-600 hover:text-red-800" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <form id="deleteForm{{ $santri->id }}"
                                        action="{{ route('admin.pendaftar.destroy', $santri->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center text-gray-500">
                                <i class="fas fa-user-plus text-4xl mb-2 block"></i>
                                Tidak ada data pendaftar
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t">
            {{ $pendaftar->withQueryString()->links() }}
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function openAcceptModal(id, name) {
            Swal.fire({
                title: 'Terima Pendaftaran?',
                html: `Apakah Anda yakin ingin menerima santri <strong>${name}</strong>?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-check mr-1"></i> Ya, Terima!',
                cancelButtonText: '<i class="fas fa-times mr-1"></i> Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Memproses...',
                        text: 'Sedang menerima pendaftaran',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Gunakan fetch AJAX
                    fetch(`/admin/pendaftar/${id}/verify`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: data.message,
                                    confirmButtonColor: '#10b981'
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: data.message || 'Terjadi kesalahan',
                                    confirmButtonColor: '#dc2626'
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Terjadi kesalahan pada server',
                                confirmButtonColor: '#dc2626'
                            });
                        });
                }
            });
        }

        function openRejectModal(id, name) {
            Swal.fire({
                title: 'Tolak Pendaftaran',
                html: `
                        <div class="text-left">
                            <p class="mb-3">Tolak pendaftaran santri <strong>${name}</strong>?</p>
                            <label class="block text-sm font-medium text-gray-700 text-left mb-1">Alasan Penolakan</label>
                            <textarea id="alasanPenolakan" class="swal2-textarea" rows="3" placeholder="Masukkan alasan penolakan..."></textarea>
                        </div>
                    `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-times mr-1"></i> Tolak',
                cancelButtonText: '<i class="fas fa-undo mr-1"></i> Batal',
                preConfirm: () => {
                    const alasan = document.getElementById('alasanPenolakan').value;
                    if (!alasan.trim()) {
                        Swal.showValidationMessage('Alasan penolakan tidak boleh kosong!');
                        return false;
                    }
                    return alasan;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Memproses...',
                        text: 'Sedang menolak pendaftaran',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Gunakan fetch AJAX
                    fetch(`/admin/pendaftar/${id}/reject`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            alasan_penolakan: result.value
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: data.message,
                                    confirmButtonColor: '#10b981'
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: data.message || 'Terjadi kesalahan',
                                    confirmButtonColor: '#dc2626'
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Terjadi kesalahan pada server',
                                confirmButtonColor: '#dc2626'
                            });
                        });
                }
            });
        }

        function openDeleteModal(id, name) {
            Swal.fire({
                title: '<span style="color: #dc2626;">⚠️ Hapus Data?</span>',
                html: `
                        <div class="text-left">
                            <p class="mb-2">Apakah Anda yakin ingin menghapus data pendaftar <strong>"${name}"</strong>?</p>
                            <div class="mt-3 p-3 bg-red-50 rounded-lg border border-red-200">
                                <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                                <span class="text-sm text-red-700">⚠️ Tindakan ini tidak dapat dibatalkan!</span>
                            </div>
                        </div>
                    `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-trash mr-1"></i> Ya, Hapus!',
                cancelButtonText: '<i class="fas fa-times mr-1"></i> Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-xl',
                    confirmButton: 'px-4 py-2 text-sm',
                    cancelButton: 'px-4 py-2 text-sm'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Menghapus...',
                        text: 'Sedang menghapus data',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    document.getElementById(`deleteForm${id}`).submit();
                }
            });
        }

        // Auto close alert setelah 3 detik
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                const alerts = document.querySelectorAll('.bg-green-100, .bg-red-100, .bg-yellow-100');
                alerts.forEach(alert => {
                    setTimeout(() => {
                        alert.style.transition = 'opacity 0.5s';
                        alert.style.opacity = '0';
                        setTimeout(() => alert.remove(), 500);
                    }, 3000);
                });
            }, 1000);
        });
    </script>
@endpush