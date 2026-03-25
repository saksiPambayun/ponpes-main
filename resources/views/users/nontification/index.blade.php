@extends('layouts.user')

@section('content')

    <div class="container">

        <h3>Notifikasi</h3>

        @if($notifications->count() == 0)

            <p>Tidak ada notifikasi</p>

        @endif

        @foreach($notifications as $notif)

            <div class="card mb-3">

                <div class="card-body">

                    <h5>{{ $notif->title }}</h5>

                    <p>{{ $notif->message }}</p>

                    <small>{{ $notif->created_at->diffForHumans() }}</small>

                </div>

            </div>

        @endforeach

    </div>

@endsection