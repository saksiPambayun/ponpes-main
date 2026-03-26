@extends('layouts.user')

@section('title', 'Detail Fasilitas')

@section('content')
    <a href="{{ route('user.fasilitas.index') }}" class="btn btn-sm btn-secondary mb-3">← Kembali</a>

    <div class="card shadow-sm">
        <img src="{{ asset('storage/' . $fasilitas->gambar) }}" style="height:300px; object-fit:cover;">
        <div class="card-body">
            <h5 class="fw-bold">{{ $fasilitas->nama }}</h5>
            <p>{{ $fasilitas->deskripsi }}</p>
        </div>
    </div>
@endsection