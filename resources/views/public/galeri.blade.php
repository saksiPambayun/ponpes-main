@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
    <section class="galeri-section">
    <div class="galeri-header">
        <h1 class="galeri-title">Galeri</h1>
        <p class="galeri-subtitle">Dokumentasi kegiatan Pondok Pesantren Al-Ifadah</p>
    </div>

    <div class="galeri-grid">

        {{-- Item 1 --}}
        <div class="galeri-item">
            <img src="{{ asset('images/g2.png') }}" alt="Kegiatan Pesantren">
            <div class="galeri-overlay">
                <span class="galeri-tanggal">17 Agustus 2025</span>
                <p class="galeri-desc">Acara Hadroh dalam Rangka Memperingati HUT RI yang ke-80 Bersama Pengurus Pondok Pesantren Al-Ifadah</p>
            </div>
        </div>

        {{-- Item 2 --}}
        <div class="galeri-item">
            <img src="{{ asset('images/g2.png') }}" alt="Kegiatan Pesantren">
            <div class="galeri-overlay">
                <span class="galeri-tanggal">17 Agustus 2025</span>
                <p class="galeri-desc">Acara Hadroh dalam Rangka Memperingati HUT RI yang ke-80 Bersama Pengurus Pondok Pesantren Al-Ifadah</p>
            </div>
        </div>

        {{-- Item 3 --}}
        <div class="galeri-item">
            <img src="{{ asset('images/g2.png') }}" alt="Kegiatan Pesantren">
            <div class="galeri-overlay">
                <span class="galeri-tanggal">17 Agustus 2025</span>
                <p class="galeri-desc">Acara Hadroh dalam Rangka Memperingati HUT RI yang ke-80 Bersama Pengurus Pondok Pesantren Al-Ifadah</p>
            </div>
        </div>

        {{-- Item 4 --}}
        <div class="galeri-item">
            <img src="{{ asset('images/g2.png') }}" alt="Kegiatan Pesantren">
            <div class="galeri-overlay">
                <span class="galeri-tanggal">17 Agustus 2025</span>
                <p class="galeri-desc">Acara Hadroh dalam Rangka Memperingati HUT RI yang ke-80 Bersama Pengurus Pondok Pesantren Al-Ifadah</p>
            </div>
        </div>

        {{-- Item 5 --}}
        <div class="galeri-item">
            <img src="{{ asset('images/g2.png') }}" alt="Kegiatan Pesantren">
            <div class="galeri-overlay">
                <span class="galeri-tanggal">17 Agustus 2025</span>
                <p class="galeri-desc">Acara Hadroh dalam Rangka Memperingati HUT RI yang ke-80 Bersama Pengurus Pondok Pesantren Al-Ifadah</p>
            </div>
        </div>

        {{-- Item 6 --}}
        <div class="galeri-item">
            <img src="{{ asset('images/g2.png') }}" alt="Kegiatan Pesantren">
            <div class="galeri-overlay">
                <span class="galeri-tanggal">17 Agustus 2025</span>
                <p class="galeri-desc">Acara Hadroh dalam Rangka Memperingati HUT RI yang ke-80 Bersama Pengurus Pondok Pesantren Al-Ifadah</p>
            </div>
        </div>

        {{-- Item 7 --}}
        <div class="galeri-item">
            <img src="{{ asset('images/g2.png') }}" alt="Kegiatan Pesantren">
            <div class="galeri-overlay">
                <span class="galeri-tanggal">17 Agustus 2025</span>
                <p class="galeri-desc">Acara Hadroh dalam Rangka Memperingati HUT RI yang ke-80 Bersama Pengurus Pondok Pesantren Al-Ifadah</p>
            </div>
        </div>

        {{-- Item 8 --}}
        <div class="galeri-item">
            <img src="{{ asset('images/g2.png') }}" alt="Kegiatan Pesantren">
            <div class="galeri-overlay">
                <span class="galeri-tanggal">17 Agustus 2025</span>
                <p class="galeri-desc">Acara Hadroh dalam Rangka Memperingati HUT RI yang ke-80 Bersama Pengurus Pondok Pesantren Al-Ifadah</p>
            </div>
        </div>

    </div>
</section>

@endsection
