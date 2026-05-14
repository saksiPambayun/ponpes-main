@extends('admin.layout')

@section('title', 'Masukan & Tanggapan')@section('page-title', 'Masukan & Tanggapan')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h3 class="text-xl font-bold" style="color: #222;">Masukan & Tanggapan</h3>
            <p class="text-sm mt-1" style="color: #8cbf73;">Kelola masukan dan tanggapan dari pengunjung</p>
        </div>
        @if($unreadCount > 0)
            <form action="{{ route('admin.feedback.mark-all-read') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 rounded-lg text-white" style="background: #005F02; hover:background: #0d4f14;">
                    <i class="fas fa-check-double mr-2"></i>Tandai Semua Dibaca ({{ $unreadCount }})
                </button>
            </form>
        @endif
    </div>

    {{-- Alert Session --}}
    @if(session('success'))
        <div class="mb-4 p-4 rounded flex items-center justify-between" style="background: #eef3ec; border-left: 4px solid #4ca94d; color: #0d4f14;">
            <div>
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
            <button onclick="this.parentElement.remove()" style="color: #0d4f14;">&times;</button>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 p-4 rounded flex items-center justify-between" style="background: #fee; border-left: 4px solid #dc3545; color: #c82333;">
            <div>
                <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
            </div>
            <button onclick="this.parentElement.remove()" style="color: #c82333;">&times;</button>
        </div>
    @endif

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="rounded-lg shadow p-6" style="background: #fff; box-shadow: 0 2px 20px rgba(0,0,0,0.06); border: 1px solid #dfe8d8;">
            <div class="flex items-center">
                <div class="p-3 rounded-full mr-4" style="background: #eef3ec;">
                    <i class="fas fa-envelope text-xl" style="color: #4ca94d;"></i>
                </div>
                <div>
                    <p class="text-sm" style="color: #2d2d2d;">Total Masukan</p>
                    <h3 class="text-2xl font-bold" style="color: #222;">{{ $feedbacks->total() }}</h3>
                </div>
            </div>
        </div>

        <div class="rounded-lg shadow p-6" style="background: #fff; box-shadow: 0 2px 20px rgba(0,0,0,0.06); border: 1px solid #dfe8d8;">
            <div class="flex items-center">
                <div class="p-3 rounded-full mr-4" style="background: #fff3e0;">
                    <i class="fas fa-clock text-xl" style="color: #f59e0b;"></i>
                </div>
                <div>
                    <p class="text-sm" style="color: #2d2d2d;">Belum Dibaca</p>
                    <h3 class="text-2xl font-bold" style="color: #f59e0b;">{{ $unreadCount }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Daftar Masukan --}}
    <div class="rounded-lg shadow overflow-hidden" style="background: #fff; border: 1px solid #dfe8d8;">
        <table class="min-w-full divide-y" style="border-color: #dfe8d8;">
            <thead style="background: #eef3ec;">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color: #2d2d2d;">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color: #2d2d2d;">Pengirim</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color: #2d2d2d;">Pesan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider" style="color: #2d2d2d;">Tanggal</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider" style="color: #2d2d2d;">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y" style="border-color: #dfe8d8;">
                @forelse($feedbacks as $feedback)
                    <tr class="{{ !$feedback->is_read ? 'bg-yellow-50' : '' }} hover:bg-gray-50">
                        <td class="px-6 py-4">
                            @if(!$feedback->is_read)
                                <span class="px-2 py-1 rounded-full text-xs font-medium" style="background: #fef3c7; color: #d97706;">
                                    🔴 Belum Dibaca
                                </span>
                            @else
                                <span class="px-2 py-1 rounded-full text-xs font-medium" style="background: #eef3ec; color: #4ca94d;">
                                    ✅ Sudah Dibaca
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium" style="color: #222;">{{ $feedback->name }}</div>
                            <div class="text-xs" style="color: #8cbf73;">{{ $feedback->email }}</div>
                            @if($feedback->phone)
                                <div class="text-xs mt-1" style="color: #4ca94d;">
                                    <i class="fab fa-whatsapp"></i> {{ $feedback->phone }}
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm truncate max-w-md" style="color: #333;">{{ $feedback->message }}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap" style="color: #333;">{{ $feedback->created_at->format('d M Y H:i') }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center space-x-3">
                                <a href="{{ route('admin.feedback.show', $feedback->id) }}"
                                    style="color: #005F02; hover:color: #0d4f14;" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                {{-- Tombol Hapus dengan SweetAlert --}}
                                <button type="button"
                                    onclick="confirmDelete({{ $feedback->id }}, '{{ addslashes($feedback->name) }}')"
                                    style="color: #dc2626; hover:color: #b91c1c;" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                                {{-- Form delete tersembunyi --}}
                                <form id="delete-form-{{ $feedback->id }}"
                                    action="{{ route('admin.feedback.destroy', $feedback->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center" style="color: #8cbf73;">
                            <i class="fas fa-inbox text-4xl mb-2" style="color: #dfe8d8;"></i>
                            <p>Belum ada masukan</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-4 border-t" style="border-color: #dfe8d8; background: #eef3ec;">
            {{ $feedbacks->links() }}
        </div>
    </div>

    <style>
        /* Pagination Styling */
        .pagination {
            margin: 0;
            display: flex;
            gap: 4px;
            flex-wrap: wrap;
        }
        .pagination .page-item {
            list-style: none;
        }
        .pagination .page-link {
            border: 1px solid #dfe8d8;
            color: #2d2d2d;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.15s;
            background: white;
            display: inline-block;
        }
        .pagination .page-link:hover {
            background: #eef3ec;
            border-color: #8cbf73;
            color: #005F02;
        }
        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #005F02, #0f4d1c);
            border-color: #005F02;
            color: #fff;
        }
        .pagination .page-item.disabled .page-link {
            opacity: 0.5;
            background: #f3f4f6;
            cursor: not-allowed;
            pointer-events: none;
        }
        .hover\:bg-gray-50:hover {
            background: #eef3ec !important;
        }
    </style>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(feedbackId, feedbackName) {
            Swal.fire({
                title: '<span style="color: #dc2626;">⚠️ Hapus Masukan?</span>',
                html: `
                <div class="text-left">
                    <p class="mb-2">Apakah Anda yakin ingin menghapus masukan dari <strong>"${feedbackName}"</strong>?</p>
                    <div class="mt-3 p-3 rounded-lg border" style="background: #fee; border-color: #fecaca;">
                        <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                        <span class="text-sm" style="color: #dc2626;">⚠️ Tindakan ini tidak dapat dibatalkan!</span>
                    </div>
                </div>
            `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#005F02',
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
                        text: 'Sedang menghapus masukan',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    document.getElementById(`delete-form-${feedbackId}`).submit();
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                const alerts = document.querySelectorAll('.bg-green-100, .bg-red-100');
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
