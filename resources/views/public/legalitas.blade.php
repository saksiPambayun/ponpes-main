@extends('layouts.app')

@section('title', 'Legalitas')

@section('content')

<section class="legalitas">

    <h1 class="legalitas-title">Legalitas</h1>

    <div class="legalitas-wrapper">
        <div class="legalitas-row">
            <div class="legalitas-box">
                <img src="{{ asset('images/1.png') }}" alt="Akta Yayasan">
            </div>

            <div class="legalitas-text">
                <h2>Akta Yayasan</h2>

                <p>
                Yayasan Pondok Pesantren Al-Ifadah didirikan secara resmi berdasarkan
                Akta Pendirian Yayasan yang diterbitkan pada tahun 20XX oleh notaris
                yang berwenang. Pendirian yayasan ini dilakukan sebagai bentuk
                legalitas kelembagaan guna memastikan seluruh kegiatan pendidikan,
                pengelolaan administrasi, serta operasional pesantren berjalan
                sesuai dengan ketentuan hukum yang berlaku.
                </p>

                <p>
                Pembentukan yayasan juga bertujuan untuk memberikan landasan hukum
                yang jelas dalam pengembangan lembaga, meningkatkan profesionalitas
                tata kelola, serta memperkuat kepercayaan masyarakat terhadap
                Pondok Pesantren Al-Ifadah sebagai lembaga pendidikan Islam
                yang sah dan terpercaya.
                </p>
            </div>
        </div>

        <div class="legalitas-row reverse">
            <div class="legalitas-box">
                <img src="{{ asset('images/2.png') }}" alt="Tanah Waqaf">
            </div>
            <div class="legalitas-text">
                <h2>Tanah Waqaf</h2>

                <p>
                Yayasan Pondok Pesantren Al-Ifadah didirikan secara resmi berdasarkan
                Akta Pendirian Yayasan yang diterbitkan pada tahun 20XX oleh notaris
                yang berwenang. Pendirian yayasan ini dilakukan sebagai bentuk
                legalitas kelembagaan guna memastikan seluruh kegiatan pendidikan,
                pengelolaan administrasi, serta operasional pesantren berjalan
                sesuai dengan ketentuan hukum yang berlaku.
                </p>

                <p>
                Pembentukan yayasan juga bertujuan untuk memberikan landasan hukum
                yang jelas dalam pengembangan lembaga, meningkatkan profesionalitas
                tata kelola, serta memperkuat kepercayaan masyarakat terhadap
                Pondok Pesantren Al-Ifadah sebagai lembaga pendidikan Islam
                yang sah dan terpercaya.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection