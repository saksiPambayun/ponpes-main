@extends('layouts.user')

@section('title', 'Edit Akta Yayasan')

@section('content')
    @if($akta->user_id != auth()->id())
        <div class="alert alert-danger">Tidak boleh edit!</div>
    @else

        <form method="POST" action="{{ route('user.akta-yayasan.update', $akta->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nomor Akta</label>
                <input type="text" name="nomor_akta" value="{{ $akta->nomor_akta }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Notaris</label>
                <input type="text" name="notaris" value="{{ $akta->notaris }}" class="form-control">
            </div>

            <button class="btn btn-primary">Update</button>
        </form>

    @endif
@endsection