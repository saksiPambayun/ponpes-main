@extends('admin.layout')

@section('title', 'Detail Masukan')
@section('page-title', 'Detail Masukan')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 border-b bg-gray-50 flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-envelope-open-text text-2xl text-gray-600"></i>
                    <h3 class="text-lg font-bold">Detail Masukan</h3>
                </div>
                <div class="flex items-center space-x-3">
                    <button type="button" onclick="confirmDelete({{ $feedback->id }}, '{{ addslashes($feedback->name) }}')"
                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                        <i class="fas fa-trash mr-2"></i>Hapus
                    </button>
                    <a href="{{ route('admin.feedback.index') }}"
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </div>

            <div class="p-6">
                <!-- Informasi Pengirim -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <label class="text-xs text-gray-500 uppercase font-bold">Nama</label>
                        <p class="font-semibold text-lg">{{ $feedback->name }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <label class="text-xs text-gray-500 uppercase font-bold">Email</label>
                        <p class="font-semibold text-lg">{{ $feedback->email }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <label class="text-xs text-gray-500 uppercase font-bold">Telepon / WhatsApp</label>
                        <p class="font-semibold text-lg">
                            @if($feedback->phone)
                                <span class="text-green-600">
                                    <i class="fab fa-whatsapp"></i> {{ $feedback->phone }}
                                </span>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <label class="text-xs text-gray-500 uppercase font-bold">Tanggal Kirim</label>
                        <p class="font-semibold text-lg">{{ $feedback->created_at->format('d M Y H:i:s') }}</p>
                    </div>
                </div>

                <!-- Isi Pesan -->
                <div class="mb-6">
                    <label class="text-sm font-bold text-gray-700 mb-2 block">Isi Masukan</label>
                    <div class="mt-2 p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                        <p class="text-gray-800">{{ nl2br(e($feedback->message)) }}</p>
                    </div>
                </div>

                <!-- Status Balasan -->
                @if($feedback->is_replied)
                    <div class="mb-6 p-4 bg-green-50 rounded-lg border border-green-200">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-check-circle text-green-600 text-xl mr-2"></i>
                            <h4 class="font-bold text-green-800">✓ Balasan Sudah Terkirim</h4>
                        </div>
                        <p class="text-gray-700 mb-2"><strong>Pesan Balasan:</strong></p>
                        <p class="text-gray-600 bg-white p-3 rounded">{{ $feedback->reply_message }}</p>
                        @if($feedback->whatsapp_replied_at)
                            <p class="text-xs text-gray-500 mt-3">
                                <i class="fab fa-whatsapp text-green-500"></i>
                                Dikirim via WhatsApp pada {{ $feedback->whatsapp_replied_at->format('d M Y H:i:s') }}
                            </p>
                        @endif
                    </div>
                @else
                    <!-- Form Balasan WhatsApp -->
                    <div class="mb-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                        <div class="flex items-center mb-4">
                            <i class="fab fa-whatsapp text-green-600 text-2xl mr-3"></i>
                            <div>
                                <h4 class="font-bold text-gray-800">Balas via WhatsApp</h4>
                                <p class="text-sm text-gray-600">Kirim balasan langsung ke WhatsApp pengirim</p>
                            </div>
                        </div>

                        @if(!$feedback->phone)
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-3 mb-3 rounded">
                                <p class="text-sm text-yellow-700">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    ⚠️ Pengirim tidak mencantumkan nomor telepon. Tidak dapat mengirim balasan WhatsApp.
                                </p>
                            </div>
                        @else
                            <form action="{{ route('admin.feedback.reply-whatsapp', $feedback->id) }}" method="POST" id="replyForm">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fab fa-whatsapp text-green-500 mr-1"></i>
                                        Pesan Balasan untuk {{ $feedback->phone }}
                                    </label>
                                    <textarea name="reply_message" rows="5"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500"
                                        placeholder="Tulis balasan Anda di sini..." required minlength="5"></textarea>
                                    <p class="text-xs text-gray-500 mt-2">
                                        <i class="fas fa-info-circle"></i>
                                        Pesan akan dikirim ke nomor: <strong>{{ $feedback->phone }}</strong>
                                    </p>
                                </div>

                                <div class="flex justify-end">
                                    <button type="button" onclick="confirmSendReply()"
                                        class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition shadow-md">
                                        <i class="fab fa-whatsapp mr-2"></i>Kirim Balasan WhatsApp
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Form delete tersembunyi --}}
    <form id="delete-form-{{ $feedback->id }}" action="{{ route('admin.feedback.destroy', $feedback->id) }}" method="POST"
        style="display: none;">
        @csrf
        @method('DELETE')
    </form>
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
                cancelButtonText: '<i class="fas fa-times mr-1"></i> Batal'
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

        function confirmSendReply() {
            const replyMessage = document.querySelector('textarea[name="reply_message"]').value;

            if (!replyMessage || replyMessage.trim().length < 5) {
                Swal.fire({
                    icon: 'error',
                    title: 'Pesan Terlalu Pendek',
                    text: 'Pesan balasan minimal 5 karakter!'
                });
                return;
            }

            Swal.fire({
                title: '<span style="color: #25D366;">📱 Kirim Balasan WhatsApp?</span>',
                html: `
                    <div class="text-left">
                        <p class="mb-2">Apakah Anda yakin ingin mengirim balasan ke nomor:</p>
                        <p class="font-bold text-green-600 text-lg mb-3">{{ $feedback->phone ?? 'Tidak ada nomor' }}</p>
                        <div class="p-3 bg-gray-50 rounded-lg border">
                            <p class="text-sm text-gray-600"><strong>Pesan balasan:</strong></p>
                            <p class="text-sm mt-1">"${replyMessage}"</p>
                        </div>
                    </div>
                `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#25D366',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fab fa-whatsapp mr-1"></i> Ya, Kirim!',
                cancelButtonText: '<i class="fas fa-times mr-1"></i> Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Mengirim...',
                        text: 'Sedang mengirim balasan via WhatsApp',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                            document.getElementById('replyForm').submit();
                        }
                    });
                }
            });
        }
    </script>
@endpush
