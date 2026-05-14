@extends('admin.layout')

@section('title', 'Data Santri')
@section('page-title', 'Data Santri')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Data Santri</h3>
            <p class="text-gray-500 text-sm mt-1">Kelola data santri dan pendaftaran</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.santri.create') }}"
                class="btn-primary px-6 py-2 rounded-lg text-white font-medium inline-flex items-center">
                <i class="fas fa-plus mr-2"></i>Tambah Data
            </a>
        </div>
    </div>

    {{-- STATISTIK CARD --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Santri</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $stats['total'] ?? 0 }}</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Laki-laki</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $stats['laki_laki'] ?? 0 }}</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-mars text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-pink-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Perempuan</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $stats['perempuan'] ?? 0 }}</p>
                </div>
                <div class="bg-pink-100 p-3 rounded-full">
                    <i class="fas fa-venus text-pink-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- TABS --}}
    <div class="mb-6 border-b border-gray-200">
        <ul class="flex flex-wrap -mb-px">
            <li class="mr-2">
                <button onclick="showTab('pendaftar')" id="tab-pendaftar-btn"
                    class="tab-btn inline-block py-2 px-4 text-sm font-medium text-center border-b-2 rounded-t-lg active">
                    <i class="fas fa-user-plus mr-1"></i> Pendaftar
                    <span
                        class="bg-yellow-100 text-yellow-800 text-xs px-2 py-0.5 rounded-full ml-1">{{ $stats['pending'] ?? 0 }}</span>
                </button>
            </li>
            <li class="mr-2">
                <button onclick="showTab('diterima')" id="tab-diterima-btn"
                    class="tab-btn inline-block py-2 px-4 text-sm font-medium text-center border-b-2 rounded-t-lg">
                    <i class="fas fa-user-check mr-1"></i> Santri Diterima
                    <span
                        class="bg-green-100 text-green-800 text-xs px-2 py-0.5 rounded-full ml-1">{{ $stats['diterima'] ?? 0 }}</span>
                </button>
            </li>
            <li class="mr-2">
                <button onclick="showTab('ditolak')" id="tab-ditolak-btn"
                    class="tab-btn inline-block py-2 px-4 text-sm font-medium text-center border-b-2 rounded-t-lg">
                    <i class="fas fa-user-times mr-1"></i> Santri Ditolak
                    <span
                        class="bg-red-100 text-red-800 text-xs px-2 py-0.5 rounded-full ml-1">{{ $stats['ditolak'] ?? 0 }}</span>
                </button>
            </li>
        </ul>
    </div>

    {{-- Tab Pendaftar (Pending) --}}
    <div id="tab-pendaftar" class="tab-content">
        @include('admin.santri.partials.table-pendaftar', ['santri' => $santriPending])
    </div>

    {{-- Tab Diterima --}}
    <div id="tab-diterima" class="tab-content hidden">
        @include('admin.santri.partials.table-diterima', ['santri' => $santriDiterima])
    </div>

    {{-- Tab Ditolak --}}
    <div id="tab-ditolak" class="tab-content hidden">
        @include('admin.santri.partials.table-ditolak', ['santri' => $santriDitolak])
    </div>

    <script>
        function showTab(tab) {
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            document.getElementById(`tab-${tab}`).classList.remove('hidden');

            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('border-green-500', 'text-green-600');
                btn.classList.add('border-transparent', 'text-gray-500');
            });

            document.getElementById(`tab-${tab}-btn`).classList.remove('border-transparent', 'text-gray-500');
            document.getElementById(`tab-${tab}-btn`).classList.add('border-green-500', 'text-green-600');
        }
    </script>

    <style>
        .tab-btn {
            transition: all 0.3s ease;
        }

        .tab-btn.active {
            border-color: #005F02;
            color: #005F02;
        }

        .hidden {
            display: none;
        }
    </style>
@endsection
