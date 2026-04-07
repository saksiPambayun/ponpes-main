@extends('layouts.user')

@section('title', 'Edit Akta Wakaf')

@section('content')
    @if($akta->user_id != auth()->id())
        <div class="alert alert-danger">Tidak boleh edit!</div>
    @else

        <form method="POST" action="{{ route('user.akta-wakaf.update', $akta->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nomor</label>
                <input type="text" name="nomor_sertifikat" value="{{ $akta->nomor_sertifikat }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Nazhir</label>
                <input type="text" name="nazhir" value="{{ $akta->nazhir }}" class="form-control">
            </div>

            <button class="btn btn-primary">Update</button>
        </form>

    @endif
@endsection