@extends('layouts.user')

@section('title', 'Detail Akta Wakaf')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5>{{ $akta->nomor_sertifikat }}</h5>
            <p>Nazhir: {{ $akta->nazhir }}</p>
            <p>Lokasi: {{ $akta->lokasi_tanah }}</p>
            <p>Luas: {{ $akta->luas_tanah }}</p>
        </div>
    </div>
@endsection