@extends('layouts.app')

@section('title', 'Legalitas')

@section('content')
    <section class="legalitas">

        <h1 class="legalitas-title">Legalitas</h1>

        <div class="legalitas-wrapper">
            <div class="legalitas-row">
                <div class="legalitas-box">
                    @if ($aktaYayasan)
                        <img src="{{ asset('storage/' . $aktaYayasan->file_akta) }}">
                    @endif
                </div>

                <div class="legalitas-text">
                    <h2>{{ $aktaYayasan->judul ?? 'Akta Yayasan' }}</h2>

                    <p>
                        {{ $aktaYayasan->deskripsi ?? 'Deskripsi belum tersedia' }}
                    </p>
                </div>
            </div>

            <div class="legalitas-row reverse">
                <div class="legalitas-box">
                    @if ($aktaWakaf)
                        <img src="{{ asset('storage/' . $aktaWakaf->file_sertifikat) }}">
                    @endif
                </div>
                <div class="legalitas-text">
                    <h2>{{ $aktaWakaf->judul ?? 'Akta Wakaf' }}</h2>
                    <p>
                        {{ $aktaWakaf->deskripsi ?? 'Deskripsi belum tersedia' }}
                    </p>
                </div>
            </div>

            <div class="legalitas-row">
                <div class="legalitas-box">
                    @if ($sk)
                        <img src="{{ asset('storage/' . $sk->file_sk) }}">
                    @endif
                </div>

                <div class="legalitas-text">
                    <h2>{{ $sk->judul ?? 'Surat Keputusan' }}</h2>

                    <p>
                        {{ $sk->deskripsi ?? 'Deskripsi belum tersedia' }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    @endsection
