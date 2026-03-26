@extends('layouts.user')

@section('title', 'Akta Yayasan')

@section('content')
    <h5 class="fw-bold mb-3">Akta Yayasan</h5>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor</th>
                <th>Notaris</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($akta as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->nomor_akta }}</td>
                    <td>{{ $a->notaris }}</td>
                    <td>
                        @if($a->user_id == auth()->id())
                            <a href="{{ route('user.akta-yayasan.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection