@extends('admin.layout')

@section('title', 'Detail Gallery')
@section('page-title', 'Detail Gallery')

@push('styles')
    <style>
        :root {
            --green-main: #005F02;
            --green-dark: #0d4f14;
            --green-darker: #0f4d1c;
            --green-medium: #2e6b37;
            --green-light: #4ca94d;
            --green-soft: #8cbf73;
            --bg-light: #f4f4f4;
            --bg-soft: #eef3ec;
            --bg-section: #dfe8d8;
            --text-main: #333;
            --text-dark: #222;
            --text-muted: #2d2d2d;
            --white: #ffffff;
            --shadow-soft: rgba(0, 0, 0, 0.1);
            --shadow-medium: rgba(0, 0, 0, 0.15);
        }

        .detail-card {
            background: var(--white);
            border-radius: 20px;
            border: none;
            box-shadow: 0 2px 20px var(--shadow-soft);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .detail-card-header {
            background: linear-gradient(135deg, var(--green-main), var(--green-dark));
            padding: 1.2rem 1.8rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .detail-card-header i {
            color: rgba(255, 255, 255, 0.85);
            font-size: 1rem;
        }

        .detail-card-header span {
            color: var(--white);
            font-size: 0.9rem;
            font-weight: 600;
        }

        .detail-card-body {
            padding: 1.8rem;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table tr {
            border-bottom: 1px solid var(--bg-section);
        }

        .info-table tr:last-child {
            border-bottom: none;
        }

        .info-table th {
            width: 35%;
            padding: 1rem 0;
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--text-muted);
            text-align: left;
            letter-spacing: -0.1px;
        }

        .info-table td {
            padding: 1rem 0;
            font-size: 0.87rem;
            color: var(--text-main);
            font-weight: 500;
        }

        .foto-card {
            background: var(--white);
            border-radius: 20px;
            border: none;
            box-shadow: 0 2px 20px var(--shadow-soft);
            overflow: hidden;
        }

        .foto-card-header {
            background: linear-gradient(135deg, var(--green-main), var(--green-dark));
            padding: 1.2rem 1.8rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .foto-card-header i {
            color: rgba(255, 255, 255, 0.85);
            font-size: 1rem;
        }

        .foto-card-header span {
            color: var(--white);
            font-size: 0.9rem;
            font-weight: 600;
        }

        .foto-card-body {
            padding: 1.8rem;
            text-align: center;
        }

        .foto-preview {
            max-width: 100%;
            max-height: 300px;
            border-radius: 12px;
            box-shadow: 0 4px 15px var(--shadow-soft);
            border: 1px solid var(--bg-section);
        }

        .no-foto {
            padding: 3rem;
            text-align: center;
        }

        .no-foto i {
            font-size: 3rem;
            color: var(--green-soft);
            margin-bottom: 0.75rem;
        }

        .no-foto p {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-action i {
            font-size: 0.8rem;
        }

        .btn-action:hover {
            transform: translateY(-1px);
            text-decoration: none;
        }

        .btn-back {
            background: var(--bg-light);
            border: 1.5px solid var(--bg-section);
            color: var(--text-muted);
        }

        .btn-back:hover {
            background: var(--bg-soft);
            border-color: var(--green-soft);
            color: var(--green-main);
        }

        .btn-edit {
            background: linear-gradient(135deg, var(--green-main), var(--green-dark));
            color: var(--white);
            box-shadow: 0 2px 8px rgba(0, 95, 2, 0.3);
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, var(--green-dark), var(--green-darker));
            color: var(--white);
            box-shadow: 0 4px 12px rgba(0, 95, 2, 0.4);
        }

        .btn-print {
            background: linear-gradient(135deg, var(--green-light), var(--green-medium));
            color: var(--white);
            box-shadow: 0 2px 8px rgba(76, 169, 77, 0.3);
        }

        .btn-print:hover {
            background: linear-gradient(135deg, var(--green-medium), var(--green-dark));
            color: var(--white);
            box-shadow: 0 4px 12px rgba(76, 169, 77, 0.4);
        }

        .kategori-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .kategori-badge.kegiatan {
            background: var(--bg-soft);
            color: var(--green-main);
        }

        .kategori-badge.prestasi {
            background: var(--bg-section);
            color: var(--green-dark);
        }

        .kategori-badge.umum {
            background: var(--green-soft);
            color: var(--white);
        }

        /* Page Header */
        .page-wrapper {
            background: var(--bg-light);
            min-height: 100vh;
            padding: 2rem;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .page-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--green-main), var(--green-dark));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 14px rgba(0, 95, 2, 0.35);
        }

        .page-icon i {
            color: var(--white);
            font-size: 1.1rem;
        }

        .page-title h1 {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .page-title p {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin: 0;
        }

        .text-muted {
            font-size: 0.75rem;
            color: var(--green-soft) !important;
            margin-top: 0.75rem;
        }

        @media (max-width: 768px) {
            .info-table th {
                width: 40%;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-action {
                justify-content: center;
            }

            .page-wrapper {
                padding: 1rem;
            }
        }

        @media print {

            .sidebar,
            .btn-back,
            .btn-edit,
            .btn-print,
            .action-buttons,
            header {
                display: none !important;
            }

            .detail-card,
            .foto-card {
                box-shadow: none;
                border: 1px solid var(--bg-section);
            }
        }
    </style>
@endpush

@section('content')
    <div class="page-wrapper">
        {{-- Page Header --}}
        <div class="page-header">
            <div class="page-header-left">
                <div class="page-icon">
                    <i class="fas fa-image"></i>
                </div>
                <div class="page-title">
                    <h1>Detail Gallery</h1>
                    <p><i class="fas fa-calendar-alt mr-1"></i>{{ now()->format('d F Y') }}</p>
                </div>
            </div>

            <div class="action-buttons">
                <a href="{{ route('admin.data-master.gallery.index') }}" class="btn-action btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('admin.data-master.gallery.edit', $gallery->id) }}" class="btn-action btn-edit">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="#" class="btn-action btn-print" onclick="window.print()">
                    <i class="fas fa-print"></i> Print
                </a>
            </div>
        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 1.5rem;">
            {{-- Informasi Gallery --}}
            <div style="flex: 2; min-width: 300px;">
                <div class="detail-card">
                    <div class="detail-card-header">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Informasi Gallery</span>
                    </div>
                    <div class="detail-card-body">
                        <table class="info-table">
                            <tr>
                                <th>Judul</th>
                                <td>{{ $gallery->judul }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>
                                    @php
                                        $kategoriClass = '';
                                        $kategoriLabel = '';
                                        if ($gallery->kategori == 'kegiatan') {
                                            $kategoriClass = 'kegiatan';
                                            $kategoriLabel = 'Kegiatan';
                                        } elseif ($gallery->kategori == 'prestasi') {
                                            $kategoriClass = 'prestasi';
                                            $kategoriLabel = 'Prestasi';
                                        } else {
                                            $kategoriClass = 'umum';
                                            $kategoriLabel = 'Umum';
                                        }
                                    @endphp
                                    <span class="kategori-badge {{ $kategoriClass }}">{{ $kategoriLabel }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Kegiatan</th>
                                <td>{{ $gallery->tanggal_kegiatan ? $gallery->tanggal_kegiatan->format('d F Y') : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $gallery->deskripsi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat Pada</th>
                                <td>{{ $gallery->created_at ? $gallery->created_at->format('d/m/Y H:i') : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Terakhir Diupdate</th>
                                <td>{{ $gallery->updated_at ? $gallery->updated_at->format('d/m/Y H:i') : '-' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Foto Gallery --}}
            <div style="flex: 1; min-width: 280px;">
                <div class="foto-card">
                    <div class="foto-card-header">
                        <i class="fas fa-camera"></i>
                        <span>Foto Gallery</span>
                    </div>
                    <div class="foto-card-body">
                        @if($gallery->gambar)
                            <img src="{{ asset('storage/' . $gallery->gambar) }}" alt="{{ $gallery->judul }}"
                                class="foto-preview">
                            <p class="text-muted">
                                Ukuran: {{ round(Storage::disk('public')->size($gallery->gambar) / 1024, 2) }} KB
                            </p>
                        @else
                            <div class="no-foto">
                                <i class="fas fa-image"></i>
                                <p>Tidak ada foto</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection