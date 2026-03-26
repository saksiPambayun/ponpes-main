@extends('layouts.user')

@section('title', 'Akta Wakaf')

@section('content')
    <h5 class="fw-bold mb-3">Akta Wakaf</h5>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor</th>
                <th>Nazhir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($akta as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->nomor_sertifikat }}</td>
                    <td>{{ $a->nazhir }}</td>
                    <td>
                        <a href="{{ route('user.akta-wakaf.show', $a->id) }}" class="btn btn-info btn-sm">Detail</a>

                        @if($a->user_id == auth()->id())
                            <a href="{{ route('user.akta-wakaf.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection