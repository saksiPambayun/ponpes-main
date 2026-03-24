@extends('layouts.app')

@section('title', 'Struktur Organisasi')
-
@section('content')
    <section class="struktur-section">
        <div class="container">
            <h1 class="struktur-title">
                Struktur Organisasi
            </h1>
            <div class="struktur-frame">
                <div class="struktur-inner">
                    <img src="{{ asset('images/struktur1.png') }}" alt="Struktur Organisasi" class="struktur-img">
                </div>
            </div>
        </div>
    </section>
@endsection
