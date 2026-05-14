@extends('layouts.app')

@section('title', $fasilitas->nama_fasilitas ?? 'Detail Fasilitas')

@section('content')

    <section class="fasilitas-detail-page">
        <div class="fasilitas-detail-container">
            <div class="detail-card">
                <div class="detail-image">
                    <img src="{{ asset('storage/' . $fasilitas->foto) }}" alt="{{ $fasilitas->nama_fasilitas }}">
                </div>
                <div class="detail-info">
                    <h1 class="detail-title">{{ $fasilitas->nama_fasilitas }}</h1>
                    <div class="detail-description">
                        <p>{{ $fasilitas->deskripsi ?? 'Belum ada deskripsi untuk fasilitas ini.' }}</p>
                    </div>
                    <a href="{{ route('fasilitas') }}" class="back-button">
                        <i class="fas fa-arrow-left"></i> Kembali ke Fasilitas
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .fasilitas-detail-page {
            background-color: #f8fafc;
            padding: 80px 0 90px;
            min-height: 100vh;
        }

        .fasilitas-detail-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .detail-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .detail-image {
            width: 100%;
            max-height: 500px;
            overflow: hidden;
            background: #f5f5f5;
        }

        .detail-image img {
            width: 100%;
            height: 100%;
            max-height: 500px;
            object-fit: contain;
        }

        .detail-info {
            padding: 30px;
        }

        .detail-title {
            font-size: 32px;
            font-weight: 700;
            color: #166534;
            margin-bottom: 20px;
            text-align: left;
        }

        .detail-description {
            color: #475569;
            line-height: 1.8;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .detail-description p {
            margin-bottom: 15px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #166534;
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background: #14532d;
            transform: translateX(-5px);
            color: white;
        }

        @media (max-width: 768px) {
            .detail-title {
                font-size: 24px;
            }

            .detail-info {
                padding: 20px;
            }
        }
    </style>

@endsection