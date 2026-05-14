@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

    <section class="galerii">
        <section class="galeri-section">
            <div class="galeri-header">
                <h1 class="galeri-title">Galeri</h1>
                <p class="galeri-subtitle">Dokumentasi kegiatan Pondok Pesantren Al-Ifadah</p>
            </div>

            <div class="galeri-grid">

                @foreach ($galeri as $item)
                    <div class="galeri-item">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="">

                        <div class="galeri-overlay">
                            <span class="galeri-tanggal">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                            </span>
                            <p class="galeri-desc">
                                {{ $item->deskripsi }}
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>
    </section>

    @endsection
