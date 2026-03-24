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
                <a href="pendaftaran.html" class="btn-primary">Daftar Sekarang</a>
                <a href="tentang.html" class="btn-secondary">Tentang Kami</a>
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
                <a href="/tentang">Lihat selengkapnya →</a>
            </div>
        </div>
    </section>

    <section class="program-section">
    <div class="program-container">
        <h2 class="program-title reveal-top">Program Pendidikan</h2>
        <div class="program-cards">
            <div class="program-card reveal-left">
                <h3>Tahfidz Murni</h3>
                <p>
                    Program khusus bagi santri yang fokus menghafal Al-Qur’an
                    tanpa sekolah formal. Santri wajib mengikuti madrasah diniyah
                    dan kajian kitab salaf sebagai penguatan ilmu syar’i.
                </p>
                <div class="card-line"></div>
            </div>

            <div class="program-card reveal-bottom">
                <h3>Tahfidz & Sekolah Formal</h3>
                <p>
                    Program terpadu antara hafalan Al-Qur’an dan pendidikan formal (MTs/SMA).
                    Cocok bagi santri yang ingin menghafal sekaligus menempuh pendidikan umum.
                </p>
                <div class="card-line"></div>
            </div>

            <div class="program-card reveal-right">
                <h3>Tahfidz 30 Juz & Surat Pilihan</h3>
                <p>
                    Program target hafalan 30 juz atau surat tertentu.
                    Wajib mengikuti sekolah dan menyelesaikan hafalan
                    dengan sistem bin-nadzhar.
                </p>
                <div class="card-line"></div>
            </div>
        </div>
    </div>
</section>

<section class="fasilitas-section">
    <div class="fasilitas-container">
        <h2 class="fasilitas-title">Fasilitas</h2>
        <div class="fasilitas-grid">
            <div class="fasilitas-card">
                <img src="{{ asset('images/hero.png') }}" alt="Masjid">
                <h3>Masjid</h3>
            </div>

            <div class="fasilitas-card">
                <img src="{{ asset('images/hero.png') }}" alt="Asrama">
                <h3>Asrama</h3>
            </div>

            <div class="fasilitas-card">
                <img src="{{ asset('images/hero.png') }}" alt="Kamar Mandi">
                <h3>Kamar Mandi</h3>
            </div>

            <div class="fasilitas-card">
                <img src="{{ asset('images/hero.png') }}" alt="Ruang Belajar">
                <h3>Ruang Belajar</h3>
            </div>

            <div class="fasilitas-card">
                <img src="{{ asset('images/hero.png') }}" alt="Lapangan Olahraga">
                <h3>Lapangan Olahraga</h3>
            </div>

            <div class="fasilitas-card">
                <img src="{{ asset('images/hero.png') }}" alt="Kantin">
                <h3>Kantin</h3>
            </div>
        </div>

        <div class="fasilitas-link">
            <a href="/fasilitas">Lihat selengkapnya →</a>
        </div>
    </div>
</section>

<section class="galeri">
    <div class="container-galeri">
        <h2 class="galeri-title">Galeri</h2>
        <div class="galeri-wrapper">
            <button class="galeri-btn btn-prev">&#10094;</button>
            <div class="galeri-carousel">
                <div class="galeri-card active">
                    <img src="{{ asset('images/g2.png') }}" alt="">
                </div>

                <div class="galeri-card">
                    <img src="{{ asset('images/g4.png') }}" alt="">
                </div>

                <div class="galeri-card">
                    <img src="{{ asset('images/g6.png') }}" alt="">
                </div>
            </div>

            <button class="galeri-btn btn-next">&#10095;</button>
        </div>

        <div class="galeri-link">
            <a href="/galeri">Lihat selengkapnya →</a>
        </div>
    </div>
</section>

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
                <a href="/pendaftaran" class="cta-primary">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</section>
@endsection
