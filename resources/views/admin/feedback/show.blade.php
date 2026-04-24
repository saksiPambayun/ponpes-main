@extends('admin.layout')

@section('title', 'Detail Kritik & Saran')
@section('page-title', 'Detail Kritik dan Saran')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6 border-b bg-gray-50 flex justify-between items-center">
                <h3 class="text-lg font-bold">Detail Pesan</h3>
                <a href="{{ route('admin.feedback.index') }}" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="text-sm text-gray-500">Nama</label>
                        <p class="font-semibold">{{ $feedback->name }}</p>
                    </div>
                    <div>
                        <label class="text-sm text-gray-500">Email</label>
                        <p class="font-semibold">{{ $feedback->email }}</p>
                    </div>
                    <div>
                        <label class="text-sm text-gray-500">Telepon</label>
                        <p class="font-semibold">{{ $feedback->phone ?? '-' }}</p>
                    </div>
                    <div>
                        <label class="text-sm text-gray-500">Tanggal Kirim</label>
                        <p class="font-semibold">{{ $feedback->created_at->format('d M Y H:i:s') }}</p>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="text-sm text-gray-500">Pesan</label>
                    <div class="mt-2 p-4 bg-gray-50 rounded-lg border">
                        <p class="text-gray-800">{{ nl2br(e($feedback->message)) }}</p>
                    </div>
                </div>

                <div class="border-t pt-6">
                    <h4 class="font-semibold mb-4">Balasan</h4>

                    @if($feedback->is_replied)
                        <div class="mb-4 p-4 bg-green-50 rounded-lg border border-green-200">
                            <div class="flex justify-between mb-2">
                                <span class="text-sm font-semibold text-green-800">Balasan Anda:</span>
                                <span class="text-xs text-green-600">{{ $feedback->replied_at->format('d M Y H:i') }}</span>
                            </div>
                            <p class="text-gray-700">{{ nl2br(e($feedback->reply_message)) }}</p>
                        </div>
                    @endif

                    <form action="{{ route('admin.feedback.reply', $feedback->id) }}" method="POST">
                        @csrf
                        <textarea name="reply_message" rows="5"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-green-500"
                            placeholder="Tulis balasan untuk pengirim..."></textarea>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                                <i class="fas fa-paper-plane mr-2"></i>Kirim Balasan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection