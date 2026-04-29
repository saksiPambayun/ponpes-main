@extends('layouts.app')

@section('title', 'Galeri')
@section('page-title', 'Galeri Dokumentasi')

@section('content')
    <style>
        :root {
            --green-main: #005F02;
            --green-light: #4ca94d;
            --green-soft: #8cbf73;
            --bg-soft: #eef3ec;
        }

        .galeri-section {
            padding: 2rem 1rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .galeri-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .galeri-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--green-main);
            margin-bottom: 0.5rem;
            position: relative;
            display: inline-block;
        }

        .galeri-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, var(--green-main) 0%, var(--green-light) 100%);
            border-radius: 2px;
        }

        .galeri-subtitle {
            color: #666;
            font-size: 1rem;
            margin-top: 1.5rem;
        }

        .galeri-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .galeri-item {
            position: relative;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .galeri-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .galeri-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .galeri-item:hover img {
            transform: scale(1.05);
        }

        .galeri-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.85), transparent);
            padding: 1.5rem 1rem 1rem;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .galeri-item:hover .galeri-overlay {
            transform: translateY(0);
        }

        .galeri-tanggal {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(4px);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.7rem;
            color: white;
            margin-bottom: 0.5rem;
        }

        .galeri-desc {
            color: white;
            font-size: 0.85rem;
            margin: 0;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Empty state */
        .empty-gallery {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .empty-gallery i {
            font-size: 4rem;
            color: var(--green-soft);
            margin-bottom: 1rem;
        }

        .empty-gallery p {
            color: #666;
            font-size: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .galeri-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1rem;
            }

            .galeri-title {
                font-size: 1.5rem;
            }

            .galeri-item img {
                height: 200px;
            }
        }

        @media (max-width: 480px) {
            .galeri-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .pagination .page-link {
            padding: 0.5rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            color: var(--green-main);
            text-decoration: none;
            transition: all 0.2s;
        }

        .pagination .page-link:hover {
            background: var(--green-main);
            color: white;
            border-color: var(--green-main);
        }

        .pagination .active .page-link {
            background: var(--green-main);
            color: white;
            border-color: var(--green-main);
        }
    </style>

    <section class="galeri-section">
        <div class="galeri-header">
            <h1 class="galeri-title">Galeri</h1>
        </div>

        @if($galeri && $galeri->count() > 0)
            <div class="galeri-grid">
                @foreach ($galeri as $item)
                    <div class="galeri-item" onclick="window.location='{{ route('user.gallery.show', $item->id) }}'">
                        <img src="{{ asset('storage/' . ($item->gambar ?? $item->foto)) }}" alt="{{ $item->judul ?? 'Galeri' }}">
                        <div class="galeri-overlay">
                            <span class="galeri-tanggal">
                                <i class="fas fa-calendar-alt"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal ?? $item->created_at)->format('d F Y') }}
                            </span>
                            <p class="galeri-desc">{{ $item->deskripsi ?? $item->judul ?? 'Dokumentasi kegiatan' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            @if(method_exists($galeri, 'links'))
                <div class="pagination">
                    {{ $galeri->links() }}
                </div>
            @endif
        @else
            <div class="empty-gallery">
                <i class="fas fa-images"></i>
                <p>Belum ada foto galeri</p>
                <p style="font-size: 0.85rem; margin-top: 0.5rem;">Dokumentasi kegiatan akan segera ditambahkan</p>
            </div>
        @endif
    </section>
@endsection