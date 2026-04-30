@extends('layouts.app')

@section('title', 'Fasilitas')

@section('content')

<section class="fasilitas-page">
    <div class="fasilitas-container">
        <div class="section-header">
            <h1 class="section-title">Fasilitas Pondok</h1>
            <p class="section-subtitle">Sarana dan prasarana pendukung kegiatan santri</p>
        </div>

        <div class="cards-grid">
            @foreach ($fasilitas as $item)
                <div class="card">
                    <div class="card-image">
                        <img src="{{ asset('storage/' . $item->foto) }}" 
                             alt="{{ $item->nama_fasilitas }}">
                        <div class="card-overlay"></div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">{{ $item->nama_fasilitas }}</h3>
                        <button class="learn-more">Lihat Detail</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .fasilitas-page {
        background-color: #f8fafc;
        padding: 80px 0 90px;
    }

    .fasilitas-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-title {
        font-size: 40px;
        font-weight: 700;
        color: #166534;
        margin-bottom: 12px;
    }

    .section-subtitle {
        font-size: 17px;
        color: #64748b;
    }

    .cards-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);     /* 4 kolom */
        gap: 22px;
    }

    .card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.07);
        transition: all 0.3s ease;
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
        background: linear-gradient(transparent, rgba(0,0,0,0.82));
    }

    .card-content {
        padding: 14px 16px 18px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .card-title {
        font-size: 16.5px;
        font-weight: 600;
        color: white;
        line-height: 1.4;
        margin-bottom: 14px;
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
    }

    .card:hover .learn-more {
        background: #166534;
        color: white;
    }

    /* Responsive */
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