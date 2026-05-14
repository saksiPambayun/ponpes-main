@extends('layouts.app')

@section('title', $gallery->judul ?? 'Detail Galeri')
@section('page-title', $gallery->judul ?? 'Detail Galeri')

@section('content')
    <style>
        :root {
            --green-main: #005F02;
            --green-light: #4ca94d;
        }

        .gallery-detail {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .gallery-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .gallery-image {
            width: 100%;
            max-height: 500px;
            object-fit: contain;
            background: #f5f5f5;
        }

        .gallery-info {
            padding: 1.5rem;
        }

        .gallery-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--green-main);
            margin-bottom: 0.5rem;
        }

        .gallery-date {
            color: #666;
            font-size: 0.85rem;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .gallery-description {
            color: #444;
            line-height: 1.6;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #eee;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
            padding: 0.75rem 1.5rem;
            background: var(--green-main);
            color: white;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .back-button:hover {
            background: var(--green-light);
            transform: translateX(-5px);
        }
    </style>

    <div class="gallery-detail">
        <div class="gallery-card">
            @if($gallery->gambar || $gallery->foto)
                <img src="{{ asset('storage/' . ($gallery->gambar ?? $gallery->foto)) }}" alt="{{ $gallery->judul }}"
                    class="gallery-image">
            @endif

            <div class="gallery-info">
                <h1 class="gallery-title">{{ $gallery->judul ?? 'Galeri' }}</h1>
                <span class="gallery-date">
                    <i class="fas fa-calendar-alt"></i>
                    {{ \Carbon\Carbon::parse($gallery->tanggal ?? $gallery->created_at)->format('d F Y') }}
                </span>

                @if($gallery->deskripsi)
                    <div class="gallery-description">
                        <p>{{ $gallery->deskripsi }}</p>
                    </div>
                @endif

                <a href="{{ route('user.gallery.index') }}" class="back-button">
                    <i class="fas fa-arrow-left"></i> Kembali ke Galeri
                </a>
            </div>
        </div>
    </div>
@endsection