@extends('layouts.user')

@section('title', 'Detail Profil Yayasan')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5>{{ $profil->nama }}</h5>
            <p>{{ $profil->deskripsi }}</p>
        </div>
    </div>
@endsection