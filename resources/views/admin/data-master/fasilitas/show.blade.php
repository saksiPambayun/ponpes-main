@extends('admin.layout')

@section('title', 'Detail Fasilitas')
@section('page-title', 'Detail Fasilitas')

@push('styles')
    <style>
        .detail-card {
            background: #fff;
            border-radius: 20px;
            border: none;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .detail-card-header {
            background: linear-gradient(135deg, #4361ee, #7209b7);
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
            color: #fff;
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
            border-bottom: 1px solid #f0f4f8;
        }

        .info-table tr:last-child {
            border-bottom: none;
        }

        .info-table th {
            width: 35%;
            padding: 1rem 0;
            font-size: 0.82rem;
            font-weight: 600;
            color: #64748b;
            text-align: left;
            letter-spacing: -0.1px;
        }

        .info-table td {
            padding: 1rem 0;
            font-size: 0.87rem;
            color: #1a1f36;
            font-weight: 500;
        }

        .kondisi-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .kondisi-badge.baik {
            background: #c6f6d5;
            color: #276749;
        }

        .kondisi-badge.ringan {
            background: #fef3c7;
            color: #92400e;
        }

        .kondisi-badge.berat {
            background: #fed7d7;
            color: #9b2c2c;
        }

        .foto-card {
            background: #fff;
            border-radius: 20px;
            border: none;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .foto-card-header {
            background: linear-gradient(135deg, #4361ee, #7209b7);
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
            color: #fff;
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
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .no-foto {
            padding: 3rem;
            text-align: center;
        }

        .no-foto i {
            font-size: 3rem;
            color: #cbd5e0;
            margin-bottom: 0.75rem;
        }

        .no-foto p {
            color: #a0aec0;
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
            background: #f7fafc;
            border: 1.5px solid #e2e8f0;
            color: #4a5568;
        }

        .btn-back:hover {
            background: #edf2f7;
            border-color: #cbd5e0;
            color: #2d3748;
        }

        .btn-edit {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: #fff;
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, #d97706, #b45309);
            color: #fff;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.4);
        }

        .btn-print {
            background: linear-gradient(135deg, #10b981, #059669);
            color: #fff;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
        }

        .btn-print:hover {
            background: linear-gradient(135deg, #059669, #047857);
            color: #fff;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
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
                border: 1px solid #e2e8f0;
            }
        }
    </style>
@endpush

@section('content')
    <div class="page-wrapper" style="background: #f0f4f8; min-height: 100vh; padding: 2rem;">
        {{-- Page Header --}}
        <div class="page-header"
            style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <div class="page-header-left" style="display: flex; align-items: center; gap: 1rem;">
                <div class="page-icon"
                    style="width: 48px; height: 48px; background: linear-gradient(135deg, #4361ee, #7209b7); border-radius: 14px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 14px rgba(67, 97, 238, 0.35);">
                    <i class="fas fa-info-circle" style="color: #fff; font-size: 1.1rem;"></i>
                </div>
                <div class="page-title">
                    <h1 style="font-size: 1.35rem; font-weight: 700; color: #1a1f36; margin: 0;">Detail Fasilitas</h1>
                    <p style="font-size: 0.8rem; color: #8898aa; margin: 0;"><i
                            class="fas fa-calendar-alt mr-1"></i>{{ now()->format('d F Y') }}</p>
                </div>
            </div>

            <div class="action-buttons">
                <a href="{{ route('admin.data-master.fasilitas.index') }}" class="btn-action btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('admin.data-master.fasilitas.edit', $fasilitas->id) }}" class="btn-action btn-edit">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="#" class="btn-action btn-print" onclick="window.print()">
                    <i class="fas fa-print"></i> Print
                </a>
            </div>
        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 1.5rem;">
            {{-- Informasi Fasilitas --}}
            <div style="flex: 2; min-width: 300px;">
                <div class="detail-card">
                    <div class="detail-card-header">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Informasi Fasilitas</span>
                    </div>
                    <div class="detail-card-body">
                        <table class="info-table">
                            <tr>
                                <th>Nama Fasilitas</th>
                                <td>{{ $fasilitas->nama_fasilitas }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $fasilitas->kategori ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>{{ $fasilitas->jumlah }} unit</td>
                            </tr>
                            <tr>
                                <th>Kondisi</th>
                                <td>
                                    @php
                                        $kondisiClass = '';
                                        if ($fasilitas->kondisi == 'Baik')
                                            $kondisiClass = 'baik';
                                        elseif ($fasilitas->kondisi == 'Rusak Ringan')
                                            $kondisiClass = 'ringan';
                                        elseif ($fasilitas->kondisi == 'Rusak Berat')
                                            $kondisiClass = 'berat';
                                    @endphp
                                    <span class="kondisi-badge {{ $kondisiClass }}">{{ $fasilitas->kondisi }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td>{{ $fasilitas->lokasi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengadaan</th>
                                <td>{{ $fasilitas->tanggal_pengadaan ? $fasilitas->tanggal_pengadaan->format('d/m/Y') : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $fasilitas->deskripsi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td>{{ $fasilitas->keterangan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat Pada</th>
                                <td>{{ $fasilitas->created_at ? $fasilitas->created_at->format('d/m/Y H:i') : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Terakhir Diupdate</th>
                                <td>{{ $fasilitas->updated_at ? $fasilitas->updated_at->format('d/m/Y H:i') : '-' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Foto Fasilitas --}}
            <div style="flex: 1; min-width: 280px;">
                <div class="foto-card">
                    <div class="foto-card-header">
                        <i class="fas fa-camera"></i>
                        <span>Foto Fasilitas</span>
                    </div>
                    <div class="foto-card-body">
                        @if($fasilitas->foto)
                            <img src="{{ asset('storage/' . $fasilitas->foto) }}" alt="Foto {{ $fasilitas->nama_fasilitas }}"
                                class="foto-preview">
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
