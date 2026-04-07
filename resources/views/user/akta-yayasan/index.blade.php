@extends('layouts.user')

@section('title', 'Akta Yayasan')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Akta Yayasan</h1>

        @if($akta->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Nomor Akta</th>
                            <th class="px-4 py-2 border">Tanggal</th>
                            <th class="px-4 py-2 border">Notaris</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($akta as $key => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border text-center">{{ $akta->firstItem() + $key }}</td>
                                <td class="px-4 py-2 border">{{ $item->nomor_akta ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $item->tanggal_akta ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $item->notaris ?? '-' }}</td>
                                <td class="px-4 py-2 border text-center">
                                    <a href="{{ route('user.akta-yayasan.show', $item->id) }}"
                                        class="text-blue-600 hover:underline">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">{{ $akta->links() }}</div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500">Belum ada data.</p>
            </div>
        @endif
    </div>
@endsection
