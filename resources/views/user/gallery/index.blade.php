@extends('layouts.app')

@section('title', 'Galeri')
@section('page-title', 'Galeri Dokumentasi')

@section('content')

    <section class="galeri-page">
        <div class="galeri-container">
            <div class="galeri-header-wrapper">
                <div class="section-header">
                    <h1 class="section-title">Galeri Kegiatan</h1>
                    <p class="section-subtitle">Dokumentasi berbagai kegiatan di Pondok Pesantren Al-Ifadah</p>
                </div>
            </div>

            @if($galeri->count() > 0)
                <div class="cards-grid">
                    @foreach ($galeri as $item)
                        <div class="card" onclick="window.location='{{ route('user.gallery.show', $item->id) }}'">
                            <div class="card-image">
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->deskripsi }}">
                                <div class="card-overlay"></div>
                            </div>
                            <div class="card-content">
                                <!-- Hanya SATU tanggal -->
                                <div class="card-date">
                                    {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d F Y') }}
                                </div>
                                <h3 class="card-title">{{ $item->deskripsi }}</h3>
                                <button class="learn-more">Lihat Detail</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <p>Belum ada dokumentasi kegiatan saat ini.</p>
                </div>
            @endif
        </div>
    </section>

    <style>
        .galeri-page {
            background-color: #f8fafc;
            padding: 80px 0 90px;
            width: 100%;
        }

        .galeri-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        .galeri-header-wrapper {
            width: 100%;
            text-align: center !important;
            display: block !important;
        }

        .section-header {
            text-align: center !important;
            margin-bottom: 60px;
            width: 100%;
            display: block;
        }

        .section-title {
            font-size: 40px !important;
            font-weight: 700 !important;
            color: #166534 !important;
            margin-bottom: 12px !important;
            text-align: center !important;
            display: block !important;
            width: 100% !important;
        }

        .section-subtitle {
            font-size: 17px !important;
            color: #64748b !important;
            text-align: center !important;
            display: block !important;
            width: 100% !important;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
        }

        .card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.07);
            transition: all 0.3s ease;
            cursor: pointer;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .card-image {
            position: relative;
            height: 185px;
            overflow: hidden;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .card:hover .card-image img {
            transform: scale(1.05);
        }

        .card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 55%;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.82));
        }

        .card-content {
            padding: 14px 16px 18px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .card-date {
            font-size: 12.5px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333333 !important;
            background: rgba(255, 255, 255, 0.9);
            display: inline-block;
            padding: 2px 8px;
            border-radius: 4px;
            width: fit-content;
        }

        .card-title {
            font-size: 15.5px;
            font-weight: 600;
            color: white;
            line-height: 1.4;
            margin-bottom: 12px;
            margin-top: 4px;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .learn-more {
            background: white;
            color: #166534;
            border: none;
            padding: 7px 18px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 13.5px;
            cursor: pointer;
            align-self: flex-start;
            transition: all 0.3s ease;
        }

        .card:hover .learn-more {
            background: #166534;
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: #64748b;
            font-size: 17px;
            background: white;
            border-radius: 16px;
        }

        @media (max-width: 992px) {
            .cards-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .cards-grid {
                grid-template-columns: 1fr;
            }

            .card-image {
                height: 175px;
            }
        }
    </style>

@endsection