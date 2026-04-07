@extends('layouts.user')

@section('title', 'Akta Yayasan')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Akta Yayasan</h1>

        @if($akta->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-3 text-left">No</th>
                            <th class="border p-3 text-left">Nomor Akta</th>
                            <th class="border p-3 text-left">Tanggal</th>
                            <th class="border p-3 text-left">Notaris</th>
                            <th class="border p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($akta as $key => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="border p-3">{{ $akta->firstItem() + $key }}</td>
                                <td class="border p-3 font-medium">{{ $item->nomor_akta ?? '-' }}</td>
                                <td class="border p-3">
                                    {{ $item->tanggal_akta ? \Carbon\Carbon::parse($item->tanggal_akta)->format('d M Y') : '-' }}
                                </td>
                                <td class="border p-3">{{ $item->notaris ?? '-' }}</td>
                                <td class="border p-3 text-center">
                                    <a href="{{ route('user.akta-yayasan.show', $item->id) }}"
                                        class="text-indigo-600 hover:text-indigo-800">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $akta->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-file-alt text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500">Belum ada data akta yayasan.</p>
            </div>
        @endif
    </div>
@endsection
