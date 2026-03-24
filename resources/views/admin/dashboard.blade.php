@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Ringkasan Sistem')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card Santri Pending -->
        <div class="card p-6 border-l-4 border-yellow-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                    <i class="fas fa-user-clock text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Santri Pending</p>
                    <h3 class="text-2xl font-bold">{{ $stats['santri_pending'] }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Santri Diterima -->
        <div class="card p-6 border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                    <i class="fas fa-user-check text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Santri Diterima</p>
                    <h3 class="text-2xl font-bold">{{ $stats['santri_diterima'] }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Pegawai Aktif -->
        <div class="card p-6 border-l-4 border-indigo-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                    <i class="fas fa-users text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Pegawai Aktif</p>
                    <h3 class="text-2xl font-bold">{{ $stats['pegawai_total'] }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Total SK -->
        <div class="card p-6 border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                    <i class="fas fa-file-signature text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Total SK</p>
                    <h3 class="text-2xl font-bold">{{ $stats['sk_total'] }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Akta Yayasan -->
        <div class="card p-6 border-l-4 border-purple-500">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                    <i class="fas fa-gavel text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Akta Yayasan</p>
                    <h3 class="text-2xl font-bold">{{ $stats['akta_yayasan_total'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Pendaftaran Santri Terbaru -->
    <div class="card overflow-hidden">
        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
            <h3 class="font-bold text-gray-800">Pendaftaran Santri Terbaru</h3>
            <a href="{{ route('admin.santri.index') }}" class="text-indigo-600 hover:underline text-sm">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Asal Sekolah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Daftar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($santri as $index => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $item->nama_lengkap }}</div>
                                <div class="text-xs text-gray-500">{{ $item->nisn ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $item->asal_sekolah }}</div>
                                <div class="text-xs text-gray-500">{{ $item->jurusan ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $item->created_at ? $item->created_at->format('d/m/Y') : '-' }}
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ $item->created_at ? $item->created_at->format('H:i') : '' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $item->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                       ($item->status == 'ditolak' ? 'bg-red-100 text-red-800' : 
                                       ($item->status == 'diterima' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800')) }}">
                                    {{ $item->status == 'pending' ? 'Menunggu' : 
                                       ($item->status == 'ditolak' ? 'Ditolak' : 
                                       ($item->status == 'diterima' ? 'Diterima' : ucfirst($item->status))) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.santri.show', $item->id) }}" 
                                   class="text-indigo-600 hover:text-indigo-900 mr-3" 
                                   title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-inbox text-4xl text-gray-300 mb-3"></i>
                                    <p class="text-gray-500">Belum ada data pendaftaran santri.</p>
                                    <a href="{{ route('admin.santri.create') }}" 
                                       class="mt-3 px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700">
                                        Tambah Santri Baru
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination jika diperlukan -->
        @if(method_exists($santri, 'links'))
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $santri->links() }}
        </div>
        @endif
    </div>
@endsection

@push('scripts')
<script>
function verifySantri(id) {
    if(confirm('Apakah Anda yakin ingin menerima santri ini?')) {
        // Gunakan form submit atau fetch API
        document.getElementById('verify-form-' + id).submit();
    }
}

function rejectSantri(id) {
    if(confirm('Apakah Anda yakin ingin menolak santri ini?')) {
        document.getElementById('reject-form-' + id).submit();
    }
}
</script>
@endpush

@push('forms')
<!-- Form tersembunyi untuk verifikasi dan penolakan -->
@foreach($santri as $item)
    @if($item->status == 'pending')
    <form id="verify-form-{{ $item->id }}" 
          action="{{ route('admin.santri.verify', $item->id) }}" 
          method="POST" 
          style="display: none;">
        @csrf
    </form>
    
    <form id="reject-form-{{ $item->id }}" 
          action="{{ route('admin.santri.reject', $item->id) }}" 
          method="POST" 
          style="display: none;">
        @csrf
    </form>
    @endif
@endforeach
@endpush