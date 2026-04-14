@extends('layouts.app')

@section('title', 'Pendaftaran')

@section('content')
    <section class="hero-pendaftaran">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1>Penerimaan Santri Baru</h1>
                <h2>Tahun Ajaran 2026/2027</h2>
            </div>
        </div>
    </section>

    <section class="pendaftaran-section">
        <div class="container">
            <div class="grid-pendaftaran">
                <div>
                    <h2 class="title-section">Alur Pendaftaran</h2>
                    <div class="alur">
                        <div class="step-item">
                            <div class="step-circle">1</div>
                            <p>Isi Formulir</p>
                        </div>

                        <div class="step-line"></div>
                        <div class="step-item">
                            <div class="step-circle">2</div>
                            <p>Upload Berkas</p>
                        </div>

                        <div class="step-line"></div>
                        <div class="step-item">
                            <div class="step-circle">3</div>
                            <p>Verifikasi</p>
                        </div>

                        <div class="step-line"></div>
                        <div class="step-item">
                            <div class="step-circle">4</div>
                            <p>Pengumuman</p>
                        </div>
                    </div>

                    <h2 class="title-section mt">Persyaratan Pendaftaran</h2>
                    <div class="syarat-card">
                        <div class="syarat-list">
                            <p><i class="bi bi-file-earmark"></i> Fotokopi Kartu Keluarga</p>
                            <p><i class="bi bi-image"></i> Pas Foto Berwarna 3x4</p>
                            <p><i class="bi bi-file-text"></i> Fotokopi Ijazah / SKL</p>
                        </div>

                        <div class="syarat-list">
                            <p><i class="bi bi-heart-pulse"></i> Surat Keterangan Sehat</p>
                            <p><i class="bi bi-journal"></i> Fotokopi Rapor Terakhir</p>
                        </div>
                    </div>
                </div>

                <div class="info-pendaftaran">
                    <div class="header-info">
                        Gelombang Pendaftaran
                    </div>

                    <div class="gelombang-wrapper">
                        <div class="gelombang-box">
                            <h4>Gelombang 1</h4>
                            <p>10 Maret - 2 Mei 2026</p>
                        </div>

                        <div class="gelombang-box">
                            <h4>Gelombang 2</h4>
                            <p>10 Juni - 2 Juli 2026</p>
                        </div>
                    </div>

                    <div class="biaya-card">
                        <h4>Biaya Pendidikan</h4>

                        <div class="row-biaya">
                            <span>Biaya Pendaftaran</span>
                            <span>Rp. 3.000.000</span>
                        </div>

                        <div class="row-biaya">
                            <span>Uang Masuk</span>
                            <span>Rp. 450.000</span>
                        </div>

                        <div class="row-biaya">
                            <span>SPP</span>
                            <span>Rp. 600.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cta-daftar">
                <a href="{{ route('form') }}" class="btn-daftar">
                    Isi Formulir Pendaftaran
                </a>
            </div>
        </div>
    </section>
    @endsection
