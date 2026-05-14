@extends('layouts.app')

@section('title', 'Struktur')

@section('content')
    <section class="struktur-section">
        <div class="container">
            <h1 class="struktur-title">
                Struktur Organisasi
            </h1>

            <div class="card-wrapper">
                @foreach ($struktur as $item)
                    <div class="struktur-cards">
                        <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default.png') }}"
                            alt="foto">
                        <h3>{{ $item->nama }}</h3>
                        <p>{{ $item->jabatan }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
