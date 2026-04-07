@extends('layouts.user')

@section('title', 'Struktur Organisasi')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Struktur Organisasi</h1>

        @if($struktur->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($struktur as $key => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border text-center">{{ $key + 1 }}</td>
                                <td class="px-4 py-2 border">{{ $item->nama ?? $item->name ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $item->jabatan ?? $item->position ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500">Belum ada data struktur organisasi.</p>
            </div>
        @endif
    </div>
@endsection
