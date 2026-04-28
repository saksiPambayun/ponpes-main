@extends('admin.layout')

@section('content')
    <div class="card p-6">
        <h2>Konfirmasi Verifikasi Santri</h2>
        <p>Nama: {{ $santri->nama_lengkap }}</p>
        <p>Asal Sekolah: {{ $santri->asal_sekolah }}</p>

        <form action="{{ route('admin.pendaftar.verify', $santri->id) }}" method="POST">
            @csrf
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Ya, Terima Santri</button>
            <a href="{{ route('admin.pendaftar.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
        </form>
    </div>
@endsection