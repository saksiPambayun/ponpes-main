@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>
                Pondok Pesantren <br>
                Al-Ifadah
            </h1>

            <p>
                Menyediakan pendidikan berbasis Al-Qur’an dan Sunnah
                dengan fasilitas yang nyaman serta tenaga pengajar profesional.
            </p>

            <div class="hero-buttons">
                <a href="{{ route('user.pendaftaran.index') }}" class="btn-daftar">
                    Daftar Sekarang
                </a>
                <a href="{{ route('tentang') }}" class="btn-secondary">
                    Tentang Kami
                </a>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="about-container">
            <div class="about-image reveal-left">
                <img src="{{ asset('images/pict 2.png') }}" alt="Tentang Kami">
            </div>
            <div class="about-text reveal-right">
                <h2>Tentang Kami</h2>
                <div class="line"></div>
                <p>
                    Pondok Pesantren Al-Ifadah berdiri pada 02 Mei 2014 di Desa Cangkreng,
                    Kecamatan Lenteng, Kabupaten Sumenep. Bernaung di bawah Yayasan
                    Al-Ifadah, pesantren ini berkomitmen mencetak generasi muslim
                    penghafal Al-Qur’an yang berakhlak, berilmu, dan siap
                    menghadapi perkembangan zaman.
                </p>
            </div>
            <div class="about-link">
                <a href="{{ route('tentang') }}">Lihat selengkapnya →</a>
            </div>
        </div>
    </section>

    <section class="program-section">
        <div class="program-container">
            <h2 class="program-title reveal-top">Program Pendidikan</h2>
            <div class="program-cards">
                @foreach ($program as $p)
                    <div class="program-card">
                        <h3>{{ $p->nama_program }}</h3>
                        <p>{{ $p->deskripsi }}</p>
                        <div class="card-line"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FASILITAS - Hanya tampil jika data lebih dari 6 --}}
    @if($fasilitas->count() > 6)
    <section class="fasilitas-section">
        <div class="fasilitas-container">
            <h2 class="fasilitas-title">Fasilitas</h2>
            <div class="fasilitas-grid">
                @foreach ($fasilitas->take(6) as $item)
                    <div class="fasilitas-card">
                        <img src="{{ asset('storage/' . $item->foto) }}">
                        <h3>{{ $item->nama_fasilitas }}</h3>
                    </div>
                @endforeach
            </div>

            <div class="fasilitas-link">
                <a href="{{ route('fasilitas') }}">Lihat selengkapnya →</a>
            </div>
        </div>
    </section>
    @endif

    {{-- GALERI - Hanya tampil jika data lebih dari 3 --}}
    @if($galeri->count() > 3)
    <section class="galeri">
        <div class="container-galeri">
            <h2 class="galeri-title">Galeri</h2>
            <div class="galeri-wrapper">
                <button class="galeri-btn btn-prev">&#10094;</button>
                <div class="galeri-carousel">
                    @foreach ($galeri as $index => $g)
                        <div class="galeri-card {{ $index == 0 ? 'active' : '' }} {{ $index == 1 ? 'next' : '' }} {{ $index == count($galeri) - 1 ? 'prev' : '' }}">
                            <img src="{{ asset('storage/' . $g->gambar) }}">
                        </div>
                    @endforeach
                </div>
                <button class="galeri-btn btn-next">&#10095;</button>
            </div>

            <div class="galeri-link">
                <a href="{{ route('galeri') }}">Lihat selengkapnya →</a>
            </div>
        </div>
    </section>
    @endif

    <section class="cta-pendaftaran">
        <div class="cta-container">
            <div class="cta-left">
                <img src="{{ asset('images/logo.png') }}" alt="Logo PPAI">
            </div>

            <div class="cta-right">
                <h2>Pendaftaran Santri Baru Telah Dibuka</h2>
                <p>
                    Daftarkan putra-putri Anda sekarang dan bergabung
                    bersama Pondok Pesantren Al-Ifadah
                </p>

                <div class="cta-buttons">
                    <a href="{{ route('user.pendaftaran.index') }}" class="cta-primary">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    /* ==================== HERO SECTION ==================== */
    .hero {
        position: relative;
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset("images/hero-bg.jpg") }}');
        background-size: cover;
        background-position: center;
        min-height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
        position: relative;
        z-index: 2;
        color: white;
        max-width: 800px;
        padding: 20px;
    }

    .hero-content h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .hero-content p {
        font-size: 1rem;
        margin-bottom: 30px;
        line-height: 1.6;
    }

    /* ==================== TOMBOL KOTAK ==================== */
    .hero-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        align-items: center;
    }

    .btn-daftar {
        background: #005F02 !important;
        color: #ffffff !important;
        padding: 12px 30px !important;
        border-radius: 8px !important;
        text-decoration: none !important;
        font-weight: 600 !important;
        border: 2px solid #ffffff !important;
        display: inline-block !important;
        transition: 0.3s;
    }

    .btn-daftar:hover {
        background: #004d02;
        transform: translateY(-3px);
    }

    .btn-secondary {
        background: #ffffff !important;
        color: #005F02 !important;
        padding: 12px 30px !important;
        border-radius: 8px !important;
        text-decoration: none !important;
        font-weight: 600 !important;
        border: 2px solid #005F02 !important;
        display: inline-block !important;
        transition: 0.3s;
    }

    .btn-secondary:hover {
        background: #f8f8f8;
        transform: translateY(-3px);
    }

    /* ==================== ABOUT SECTION ==================== */
    .about-section {
        padding: 80px 20px;
        background: #f9f9f9;
    }

    .about-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 40px;
    }

    .about-image {
        flex: 1;
        min-width: 250px;
    }

    .about-image img {
        width: 100%;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .about-text {
        flex: 1;
    }

    .about-text h2 {
        font-size: 2rem;
        color: #005F02;
        margin-bottom: 15px;
    }

    .line {
        width: 60px;
        height: 3px;
        background: #005F02;
        margin-bottom: 20px;
    }

    .about-text p {
        line-height: 1.8;
        color: #555;
    }

    .about-link {
        width: 100%;
        text-align: right;
        margin-top: 20px;
    }

    .about-link a {
        color: #005F02;
        text-decoration: none;
        font-weight: 600;
    }

    /* ==================== PROGRAM SECTION ==================== */
    .program-section {
        padding: 80px 20px;
        background: white;
    }

    .program-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .program-title {
        text-align: center;
        font-size: 2rem;
        color: #005F02;
        margin-bottom: 50px;
    }

    .program-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    .program-card {
        background: #eef3ec;
        padding: 30px;
        border-radius: 15px;
        text-align: center;
        transition: 0.3s;
    }

    .program-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .program-card h3 {
        color: #005F02;
        margin-bottom: 15px;
    }

    .card-line {
        width: 50px;
        height: 2px;
        background: #005F02;
        margin: 20px auto 0;
    }

    /* ==================== FASILITAS SECTION ==================== */
    .fasilitas-section {
        padding: 80px 20px;
        background: #f4f4f4;
    }

    .fasilitas-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .fasilitas-title {
        text-align: center;
        font-size: 2rem;
        color: #005F02;
        margin-bottom: 50px;
    }

    .fasilitas-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }

    .fasilitas-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: 0.3s;
    }

    .fasilitas-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .fasilitas-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .fasilitas-card h3 {
        padding: 15px;
        text-align: center;
        font-size: 1.1rem;
        color: #333;
    }

    .fasilitas-link {
        text-align: center;
        margin-top: 40px;
    }

    .fasilitas-link a {
        color: #005F02;
        text-decoration: none;
        font-weight: 600;
    }

    /* ==================== GALERI SECTION ==================== */
    .galeri {
        padding: 80px 20px;
        background: white;
    }

    .container-galeri {
        max-width: 1200px;
        margin: 0 auto;
    }

    .galeri-title {
        text-align: center;
        font-size: 2rem;
        color: #005F02;
        margin-bottom: 50px;
    }

    .galeri-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .galeri-carousel {
        display: flex;
        gap: 20px;
        overflow-x: auto;
        scroll-behavior: smooth;
        padding: 20px 0;
        scrollbar-width: none;
    }

    .galeri-carousel::-webkit-scrollbar {
        display: none;
    }

    .galeri-card {
        flex: 0 0 300px;
        transition: 0.3s;
    }

    .galeri-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .galeri-btn {
        background: #005F02;
        color: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 18px;
        transition: 0.3s;
    }

    .galeri-btn:hover {
        background: #0d4f14;
        transform: scale(1.1);
    }

    .btn-prev {
        margin-right: 15px;
    }

    .btn-next {
        margin-left: 15px;
    }

    .galeri-link {
        text-align: center;
        margin-top: 40px;
    }

    .galeri-link a {
        color: #005F02;
        text-decoration: none;
        font-weight: 600;
    }

    /* ==================== CTA SECTION ==================== */
    .cta-pendaftaran {
        padding: 60px 20px;
        background: linear-gradient(135deg, #005F02, #0f4d1c);
        color: white;
    }

    .cta-container {
        max-width: 1000px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        gap: 40px;
        flex-wrap: wrap;
        justify-content: center;
        text-align: center;
    }

    .cta-left img {
        width: 100px;
        filter: brightness(0) invert(1);
    }

    .cta-right h2 {
        font-size: 1.8rem;
        margin-bottom: 15px;
    }

    .cta-primary {
        display: inline-block;
        background: white;
        color: #005F02;
        padding: 12px 30px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        margin-top: 20px;
        transition: 0.3s;
    }

    .cta-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    /* ==================== ANIMASI REVEAL ==================== */
    .reveal-left {
        opacity: 0;
        transform: translateX(-50px);
        transition: all 0.6s ease;
    }

    .reveal-right {
        opacity: 0;
        transform: translateX(50px);
        transition: all 0.6s ease;
    }

    .reveal-top {
        opacity: 0;
        transform: translateY(-30px);
        transition: all 0.6s ease;
    }

    .reveal-left.revealed,
    .reveal-right.revealed,
    .reveal-top.revealed {
        opacity: 1;
        transform: translate(0);
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 1.8rem;
        }

        .hero-buttons {
            flex-direction: column;
            gap: 15px;
        }

        .about-container {
            flex-direction: column;
            text-align: center;
        }

        .about-link {
            text-align: center;
        }

        .line {
            margin: 0 auto 20px;
        }

        .cta-container {
            flex-direction: column;
        }

        .galeri-wrapper {
            flex-direction: column;
        }

        .galeri-card {
            flex: 0 0 250px;
        }
    }
</style>

<script>
    // Animasi reveal saat scroll
    const revealElements = document.querySelectorAll('.reveal-left, .reveal-right, .reveal-top');

    function checkReveal() {
        revealElements.forEach(el => {
            const rect = el.getBoundingClientRect();
            const windowHeight = window.innerHeight;
            if (rect.top < windowHeight - 100) {
                el.classList.add('revealed');
            }
        });
    }

    window.addEventListener('load', checkReveal);
    window.addEventListener('scroll', checkReveal);

    // Galeri Carousel
    const carousel = document.querySelector('.galeri-carousel');
    const prevBtn = document.querySelector('.btn-prev');
    const nextBtn = document.querySelector('.btn-next');

    if (prevBtn && nextBtn && carousel) {
        prevBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: -320, behavior: 'smooth' });
        });

        nextBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: 320, behavior: 'smooth' });
        });
    }
</script>
