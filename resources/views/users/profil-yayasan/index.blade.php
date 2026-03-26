@extends('layouts.user')

@section('title', 'Profil Yayasan')

@section('content')
    <h5 class="fw-bold">Profil Yayasan</h5>

    <a href="{{ route('user.profil-yayasan.show') }}" class="btn btn-primary mt-2">
        Lihat Detail
    </a>
@endsection