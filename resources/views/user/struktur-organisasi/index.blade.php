@extends('layouts.user')

@section('title', 'Struktur Organisasi')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Struktur Organisasi</h1>

        @if($struktur->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-3 text-left">No</th>
                            <th class="border p-3 text-left">Nama</th>
                            <th class="border p-3 text-left">Jabatan</th>
                            <th class="border p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($struktur as $key => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="border p-3">{{ $key + 1 }}</td>
                                <td class="border p-3 font-medium">{{ $item->nama ?? $item->name ?? '-' }}</td>
                                <td class="border p-3">{{ $item->jabatan ?? $item->position ?? '-' }}</td>
                                <td class="border p-3 text-center">
                                    <a href="{{ route('user.struktur.show', $item->id) }}"
                                        class="text-indigo-600 hover:text-indigo-800">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-sitemap text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500">Belum ada data struktur organisasi.</p>
            </div>
        @endif
    </div>
@endsection
