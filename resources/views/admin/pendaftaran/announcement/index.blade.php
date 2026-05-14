@extends('layouts.app')@section('title', 'Pengumuman')@section('content')<div class="container">
        <div class="alert alert-warning">
            <h4><i class="fas fa-exclamation-triangle"></i> Fitur Pengumuman Dinonaktifkan</h4>
            <p>Fitur pengumuman telah dihapus dari sistem. Silakan gunakan menu lain untuk mengelola pendaftaran.</p>
            <a href="{{ route('admin.pendaftaran.waves.index') }}" class="btn btn-primary">
                Kembali ke Kelola Gelombang
            </a>
        </div>
    </div>
@endsection
