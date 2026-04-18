@extends('admin.layout')

@section('title', 'Kelola Gelombang Pendaftaran')
@section('page-title', 'Kelola Gelombang Pendaftaran')

@section('content')
        <div class="mb-6 flex justify-between items-center">
            <div>
                <p class="text-gray-600">Kelola gelombang pendaftaran dan proses penerimaan santri.</p>
            </div>
            <a href="{{ route('admin.pendaftaran.waves.create') }}" class="px-4 py-2 rounded-lg text-white"
                style="background: linear-gradient(135deg, #005F02, #0f4d1c);">
                <i class="fas fa-plus mr-2"></i>Tambah Gelombang
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="card p-6" style="background: #fff; border-radius: 16px;">
                <div class="flex items-center">
                    <div class="p-3 rounded-full mr-4" style="background: #eef3ec; color: #005F02;">
                        <i class="fas fa-waveform text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Gelombang</p>
                        <h3 class="text-2xl font-bold">{{ $waves->total() }}</h3>
                    </div>
                </div>
            </div>
            <div class="card p-6" style="background: #fff; border-radius: 16px;">
                <div class="flex items-center">
                    <div class="p-3 rounded-full mr-4" style="background: #eef3ec; color: #005F02;">
                        <i class="fas fa-check-circle text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Gelombang Aktif</p>
                        <h3 class="text-2xl font-bold">{{ $activeWaves }}</h3>
                    </div>
                </div>
            </div>
            <div class="card p-6" style="background: #fff; border-radius: 16px;">
                <div class="flex items-center">
                    <div class="p-3 rounded-full mr-4" style="background: #eef3ec; color: #005F02;">
                        <i class="fas fa-calendar-alt text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tahun Ajaran</p>
                        <h3 class="text-2xl font-bold">2026/2027</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="card overflow-hidden" style="background: #fff; border-radius: 20px;">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y">
                    <thead style="background: #f4f4f4;">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase">Nama Gelombang</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase">Periode</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase">Kuota</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase">Terdaftar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @forelse($waves as $wave)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="font-medium" style="color: #222;">{{ $wave->name }}</div>
                                    @if($wave->description)
                                        <div class="text-xs text-gray-500">{{ Str::limit($wave->description, 50) }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm">{{ \Carbon\Carbon::parse($wave->start_date)->format('d/m/Y') }}</div>
                                    <div class="text-sm">s/d {{ \Carbon\Carbon::parse($wave->end_date)->format('d/m/Y') }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm">{{ $wave->quota ?? 'Tidak terbatas' }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold">{{ $wave->registrations_count }}</div>
                                    @if($wave->quota)
                                        <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                            <div class="h-1.5 rounded-full"
                                                style="width: {{ min(100, ($wave->registrations_count / $wave->quota) * 100) }}%; background: #005F02;">
                                            </div>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($wave->is_active)
                                        <span class="px-2 py-1 text-xs rounded-full" style="background: #eef3ec; color: #005F02;">
                                            <i class="fas fa-circle text-xs mr-1"></i>Aktif
                                        </span>
                                    @else
                                        <span class="px-2 py-1 text-xs rounded-full" style="background: #fef3c7; color: #d97706;">
                                            <i class="fas fa-circle text-xs mr-1"></i>Nonaktif
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.pendaftaran.waves.edit', $wave) }}"
                                            class="text-blue-600 hover:text-blue-800" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.pendaftaran.waves.toggle-active', $wave) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            <button type="submit" class="text-yellow-600 hover:text-yellow-800"
                                                title="{{ $wave->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                <i class="fas {{ $wave->is_active ? 'fa-pause' : 'fa-play' }}"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.pendaftaran.waves.destroy', $wave) }}" method="POST"
                                            class="inline" onsubmit="return confirm('Hapus gelombang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                    <i class="fas fa-calendar-alt text-4xl mb-3 d-block"></i>
                                    <p>Belum ada gelombang pendaftaran.</p>
                                    <a href="{{ route('admin.pendaftaran.waves.create') }}"
                                        class="mt-3 inline-block px-4 py-2 rounded-lg text-sm text-white"
                                        style="background: #005F02;">
                                        Buat Gelombang Baru
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t">
                {{ $waves->links() }}
            </div>
        </div>

        <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="card" style="background: #fff; border-radius: 20px;">
                <div class="p-6 border-b" style="background: #eef3ec; border-radius: 20px 20px 0 0;">
                    <h3 class="font-bold">Proses Penerimaan Santri</h3>
                </div>
                <div class="p-6">
                <a href="{{ route('admin.santri.index') }}" class="block p-4 rounded-lg hover:bg-gray-50">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle fa-2x mr-4" style="color: #005F02;"></i>
                        <div>
                            <h4 class="font-semibold">Proses Seleksi Santri</h4>
                            <p class="text-sm text-gray-500">Kelola hasil seleksi penerimaan santri</p>
                        </div>
                    </div>
                </a>
                </div>
            </div>

            <div class="card" style="background: #fff; border-radius: 20px;">
                <div class="p-6 border-b" style="background: #eef3ec; border-radius: 20px 20px 0 0;">
                    <h3 class="font-bold">Statistik Pendaftaran</h3>
                </div>
                <div class="p-6">
                    @php
    $totalRegistered = \App\Models\SantriRegistration::count();
    $totalAccepted = \App\Models\SantriRegistration::where('acceptance_status', 'accepted')->count();
    $totalRejected = \App\Models\SantriRegistration::where('acceptance_status', 'rejected')->count();
    $totalWaiting = \App\Models\SantriRegistration::where('acceptance_status', 'waiting_list')->count();
                    @endphp
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span>Total Pendaftar</span>
                            <span class="font-semibold">{{ $totalRegistered }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span>Diterima</span>
                            <span class="font-semibold text-green-600">{{ $totalAccepted }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span>Ditolak</span>
                            <span class="font-semibold text-red-600">{{ $totalRejected }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span>Waiting List</span>
                            <span class="font-semibold text-yellow-600">{{ $totalWaiting }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
