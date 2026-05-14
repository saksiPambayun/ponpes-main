@extends('layouts.app')

@section('title', 'Hasil Cek Status Pendaftaran')

@section('content')
    <section class="hasil-cek-section">
        <div class="container">
            <div class="hasil-card">
                <div class="card-header">
                    <h2><i class="bi bi-clipboard-check"></i> Hasil Pencarian</h2>
                    <p>Ditemukan <strong>{{ $registrations->count() }}</strong> data pendaftaran</p>
                </div>

                <div class="table-responsive">
                    <table class="hasil-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Gelombang</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registrations as $index => $reg)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <strong>{{ $reg->nama_lengkap }}</strong>
                                        @if($reg->nisn)
                                            <br><small class="text-muted">NISN: {{ $reg->nisn }}</small>
                                        @endif
                                    </td>
                                    <td>{{ $reg->wave->name ?? '-' }}</td>
                                    <td>{{ $reg->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        @if($reg->acceptance_status == 'accepted')
                                            <span class="status-badge accepted">
                                                <i class="bi bi-check-circle-fill"></i> DITERIMA
                                            </span>
                                        @elseif($reg->acceptance_status == 'rejected')
                                            <span class="status-badge rejected">
                                                <i class="bi bi-x-circle-fill"></i> DITOLAK
                                            </span>
                                        @elseif($reg->acceptance_status == 'waiting_list')
                                            <span class="status-badge waiting">
                                                <i class="bi bi-clock-fill"></i> WAITING LIST
                                            </span>
                                        @else
                                            <span class="status-badge pending">
                                                <i class="bi bi-hourglass-split"></i> SEDANG DIPROSES
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('user.pendaftaran.status', $reg->id) }}" class="btn-detail">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <a href="{{ route('user.pendaftaran.cek-status') }}" class="btn-back">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ route('user.pendaftaran.index') }}" class="btn-home">
                        <i class="bi bi-house"></i> Ke Halaman Pendaftaran
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .hasil-cek-section {
            padding: 60px 0;
            background: #f5f5f5;
            min-height: calc(100vh - 200px);
        }

        .hasil-card {
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #005F02, #0f4d1c);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .card-header h2 {
            margin: 0 0 10px 0;
        }

        .table-responsive {
            overflow-x: auto;
            padding: 20px;
        }

        .hasil-table {
            width: 100%;
            border-collapse: collapse;
        }

        .hasil-table th,
        .hasil-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .hasil-table th {
            background: #f8f9fa;
            font-weight: 600;
            color: #333;
        }

        .hasil-table tr:hover {
            background: #f9f9f9;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-badge.accepted {
            background: #d4edda;
            color: #155724;
        }

        .status-badge.rejected {
            background: #f8d7da;
            color: #721c24;
        }

        .status-badge.waiting {
            background: #fff3cd;
            color: #856404;
        }

        .status-badge.pending {
            background: #d1ecf1;
            color: #0c5460;
        }

        .text-muted {
            color: #6c757d;
            font-size: 0.75rem;
        }

        .btn-detail {
            background: #005F02;
            color: white;
            padding: 6px 15px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.8rem;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-detail:hover {
            background: #0f4d1c;
            color: white;
        }

        .card-footer {
            padding: 20px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .btn-back,
        .btn-home {
            padding: 10px 25px;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-back {
            background: #6c757d;
            color: white;
        }

        .btn-back:hover {
            background: #5a6268;
            color: white;
        }

        .btn-home {
            background: #005F02;
            color: white;
        }

        .btn-home:hover {
            background: #0f4d1c;
            color: white;
        }

        @media (max-width: 768px) {

            .hasil-table th,
            .hasil-table td {
                padding: 10px;
                font-size: 0.8rem;
            }

            .card-footer {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
@endsection
