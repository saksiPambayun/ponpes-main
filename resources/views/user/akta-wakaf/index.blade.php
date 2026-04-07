@extends('layouts.user')

@section('title', 'Akta Wakaf')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Akta Wakaf</h1>

        @if($akta->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-3 text-left">No</th>
                            <th class="border p-3 text-left">Nomor Sertifikat</th>
                            <th class="border p-3 text-left">Nazhir</th>
                            <th class="border p-3 text-left">Lokasi</th>
                            <th class="border p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($akta as $key => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="border p-3">{{ $akta->firstItem() + $key }}</td>
                                <td class="border p-3 font-medium">{{ $item->nomor_sertifikat ?? '-' }}</td>
                                <td class="border p-3">{{ $item->nazhir ?? '-' }}</td>
                                <td class="border p-3">{{ $item->lokasi_tanah ?? '-' }}</td>
                                <td class="border p-3 text-center">
                                    <a href="{{ route('user.akta-wakaf.show', $item->id) }}"
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
                <i class="fas fa-file-contract text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500">Belum ada data akta wakaf.</p>
            </div>
        @endif
    </div>
@endsection
