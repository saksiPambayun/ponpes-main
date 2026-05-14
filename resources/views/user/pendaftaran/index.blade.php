@extends('layouts.app')

@section('title', 'Pendaftaran Santri Baru')

@section('content')
    <section class="hero-pendaftaran">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1>Penerimaan Santri Baru</h1>
            </div>
        </div>
    </section>

    <section class="pendaftaran-section">
        <div class="container">
            <!-- INFORMASI USER YANG LOGIN -->
            @auth
                <div class="user-info-card"
                    style="background: linear-gradient(135deg, #005F02 0%, #0a8f0a 100%); border-radius: 16px; padding: 20px; margin-bottom: 30px; color: white;">
                    <div class="user-info-wrapper"
                        style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                        <div class="user-details">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                @if(Auth::user()->avatar)
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar"
                                        style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; border: 3px solid white;">
                                @else
                                    <div
                                        style="width: 60px; height: 60px; border-radius: 50%; background: rgba(255,255,255,0.2); display: flex; align-items: center; justify-content: center;">
                                        <i class="bi bi-person-fill" style="font-size: 30px;"></i>
                                    </div>
                                @endif
                                <div>
                                    <h3 style="margin: 0 0 5px 0; font-size: 1.2rem;">{{ Auth::user()->name }}</h3>
                                    <p style="margin: 0; opacity: 0.9; font-size: 0.85rem;">
                                        <i class="bi bi-envelope"></i> {{ Auth::user()->email }} &nbsp;|&nbsp;
                                        <i class="bi bi-telephone"></i> {{ Auth::user()->phone ?? 'Belum diisi' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="user-actions" style="margin-top: 10px;">
                            <a href="{{ route('user.profile') }}"
                                style="background: rgba(255,255,255,0.2); padding: 8px 16px; border-radius: 8px; color: white; text-decoration: none; font-size: 0.85rem;">
                                <i class="bi bi-pencil"></i> Edit Profil
                            </a>
                        </div>
                    </div>
                </div>
            @endauth

            <!-- RIWAYAT PENDAFTARAN USER -->
            @auth
                @if(isset($myRegistrations) && $myRegistrations->count() > 0)
                    <div class="riwayat-pendaftaran"
                        style="background: white; border-radius: 16px; padding: 20px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                        <h3 style="margin: 0 0 20px 0; color: #005F02; font-size: 1.3rem;">
                            <i class="bi bi-clock-history"></i> Riwayat Pendaftaran Anda
                        </h3>
                        <div class="table-responsive" style="overflow-x: auto;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr style="background: #f5f5f5; border-bottom: 2px solid #e0e0e0;">
                                        <th style="padding: 12px; text-align: left;">Gelombang</th>
                                        <th style="padding: 12px; text-align: left;">Nama Lengkap</th>
                                        <th style="padding: 12px; text-align: left;">Tanggal Daftar</th>
                                        <th style="padding: 12px; text-align: left;">Status</th>
                                        <th style="padding: 12px; text-align: left;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($myRegistrations as $reg)
                                        <tr style="border-bottom: 1px solid #e0e0e0;">
                                            <td style="padding: 12px;">
                                                <strong>{{ $reg->wave->name ?? 'Gelombang ' . ($reg->wave_id ?? '?') }}</strong>
                                                <br>
                                                <small style="color: #666;">
                                                    {{ $reg->wave && $reg->wave->start_date ? \Carbon\Carbon::parse($reg->wave->start_date)->translatedFormat('d M Y') : '-' }}
                                                    -
                                                    {{ $reg->wave && $reg->wave->end_date ? \Carbon\Carbon::parse($reg->wave->end_date)->translatedFormat('d M Y') : '-' }}
                                                </small>
                                            </td>
                                            <td style="padding: 12px;">
                                                <strong>{{ $reg->nama_lengkap }}</strong>
                                                <br>
                                                <small style="color: #666;">NISN: {{ $reg->nisn ?? '-' }}</small>
                                            </td>
                                            <td style="padding: 12px;">
                                                {{ \Carbon\Carbon::parse($reg->created_at)->translatedFormat('d F Y H:i') }}
                                            </td>
                                            <td style="padding: 12px;">
                                                @php
            $statusColor = [
                'pending' => '#ff9800',
                'verified' => '#4caf50',
                'rejected' => '#f44336',
                'diterima' => '#4caf50',
                'ditolak' => '#f44336',
            ][$reg->status] ?? '#9e9e9e';

            $statusText = [
                'pending' => 'Menunggu Verifikasi',
                'verified' => 'Terverifikasi',
                'rejected' => 'Ditolak',
                'diterima' => 'Diterima',
                'ditolak' => 'Ditolak',
            ][$reg->status] ?? ucfirst($reg->status);
                                                @endphp
                                                <span
                                                    style="background: {{ $statusColor }}; color: white; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600;">
                                                    {{ $statusText }}
                                                </span>
                                            </td>
                                            <td style="padding: 12px;">
                                                <a href="{{ route('user.pendaftaran.status', $reg->id) }}"
                                                    style="background: #005F02; color: white; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.8rem;">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>
                                                <a href="{{ route('user.pendaftaran.download-pdf', $reg->id) }}"
                                                    style="background: #2196f3; color: white; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.8rem; display: inline-block; margin-top: 5px;">
                                                    <i class="bi bi-download"></i> PDF
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if($myRegistrations->where('status', 'pending')->count() > 0)
                            <div class="alert alert-warning"
                                style="background: #fff3e0; border-left: 4px solid #ff9800; padding: 12px; margin-top: 15px; border-radius: 8px;">
                                <i class="bi bi-info-circle"></i>
                                Anda memiliki {{ $myRegistrations->where('status', 'pending')->count() }} pendaftaran yang sedang
                                diproses.
                                Silakan cek secara berkala untuk mengetahui status terbaru.
                            </div>
                        @endif

                        @if($myRegistrations->where('status', 'verified')->count() > 0)
                            <div class="alert alert-success"
                                style="background: #e8f5e9; border-left: 4px solid #4caf50; padding: 12px; margin-top: 15px; border-radius: 8px;">
                                <i class="bi bi-check-circle"></i>
                                Selamat! Pendaftaran Anda telah terverifikasi. Silakan tunggu pengumuman lebih lanjut.
                            </div>
                        @endif
                    </div>
                @else
                    <div class="belum-daftar-card"
                        style="background: #e3f2fd; border-radius: 16px; padding: 20px; margin-bottom: 30px; text-align: center; border-left: 4px solid #2196f3;">
                        <i class="bi bi-inbox" style="font-size: 40px; color: #2196f3;"></i>
                        <h3 style="margin: 10px 0; color: #1976d2;">Belum Ada Pendaftaran</h3>
                        <p style="color: #555;">Anda belum melakukan pendaftaran santri. Silakan isi formulir pendaftaran di bawah.
                        </p>
                    </div>
                @endif
            @endauth

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
                        @forelse($allWaves as $wave)
                            <div
                                class="gelombang-box {{ $wave->is_active && $wave->start_date <= now() && $wave->end_date >= now() ? 'active-wave' : '' }}">
                                <h4>{{ $wave->name }}</h4>
                                <p>{{ \Carbon\Carbon::parse($wave->start_date)->translatedFormat('d F Y') }} -
                                    {{ \Carbon\Carbon::parse($wave->end_date)->translatedFormat('d F Y') }}
                                </p>
                                @if($wave->description)
                                    <small class="text-muted">{{ $wave->description }}</small>
                                @endif
                                @if($wave->quota)
                                    <div class="quota-info mt-2">
                                        <small>Kuota: {{ $wave->registered_count }}/{{ $wave->quota }}</small>
                                        <div class="progress-bar">
                                            <div class="progress-fill"
                                                style="width: {{ min(100, ($wave->registered_count / $wave->quota) * 100) }}%">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($wave->is_active && $wave->start_date <= now() && $wave->end_date >= now())
                                    <span class="badge-open">Pendaftaran Dibuka</span>
                                @elseif($wave->start_date > now())
                                    <span class="badge-coming">Akan Datang</span>
                                @elseif($wave->end_date < now())
                                    <span class="badge-closed">Ditutup</span>
                                @endif
                            </div>
                        @empty
                            <div class="gelombang-box">
                                <h4>Gelombang 1</h4>
                                <p>10 Maret - 2 Mei 2026</p>
                            </div>
                            <div class="gelombang-box">
                                <h4>Gelombang 2</h4>
                                <p>10 Juni - 2 Juli 2026</p>
                            </div>
                        @endforelse
                    </div>

            <div class="biaya-card">
                <h4>Biaya Pendidikan</h4>

                @foreach(getBiayaPendaftaran() as $biaya)
                    <div class="row-biaya">
                        <span class="biaya-name">{{ $biaya->nama_biaya }}</span>
                        <span class="biaya-nominal">{{ $biaya->nominal_formatted }}</span>
                    </div>
                @endforeach

                <div class="total-biaya" style="margin-top: 15px; padding-top: 10px; border-top: 2px solid #005F02;">
                    <div class="row-biaya">
                        <strong>Total</strong>
                        <strong>{{ formatRupiah(getTotalBiayaPendaftaran()) }}</strong>
                    </div>
                </div>
            </div>
                </div>
            </div>

            <div class="cta-daftar">
                @auth
                    @if($activeWave)
                        @php
        $hasPending = isset($myRegistrations) && $myRegistrations->whereIn('status', ['pending', 'verified'])->count() > 0;
                        @endphp
                        @if($hasPending)
                            <button class="btn-daftar disabled" disabled
                                style="opacity: 0.6; cursor: not-allowed; background: #9e9e9e;">
                                Anda Sudah Mendaftar di Gelombang Ini
                            </button>
                            <p style="text-align: center; margin-top: 10px; font-size: 0.85rem; color: #ff9800;">
                                <i class="bi bi-info-circle"></i> Anda sudah memiliki pendaftaran aktif. Silakan cek status pendaftaran
                                Anda.
                            </p>
                        @else
                            <a href="{{ route('user.pendaftaran.form') }}" class="btn-daftar">
                                Isi Formulir Pendaftaran ({{ $activeWave->name }})
                            </a>
                        @endif
                    @else
                        <button class="btn-daftar disabled" disabled style="opacity: 0.6; cursor: not-allowed;">
                            Belum Ada Gelombang Pendaftaran Aktif
                        </button>
                    @endif
                @else
                    <div class="login-warning"
                        style="text-align: center; padding: 20px; background: #fff3e0; border-radius: 12px;">
                        <i class="bi bi-box-arrow-in-right" style="font-size: 30px; color: #ff9800;"></i>
                        <p style="margin: 10px 0;">Silakan login terlebih dahulu untuk melakukan pendaftaran</p>
                        <a href="{{ route('login') }}" class="btn-daftar"
                            style="display: inline-block; width: auto; padding: 10px 30px;">
                            Login Sekarang
                        </a>
                    </div>
                @endauth
            </div>

            <div class="cek-status-link">
                <a href="{{ route('user.pendaftaran.cek-status') }}" class="btn-cek-status">
                    <i class="bi bi-search"></i> Cek Status Pendaftaran (Publik)
                </a>
            </div>
        </div>
    </section>

    <style>
        .user-info-card {
            transition: transform 0.3s ease;
        }

        .user-info-card:hover {
            transform: translateY(-2px);
        }

        .riwayat-pendaftaran {
            transition: box-shadow 0.3s ease;
        }

        .riwayat-pendaftaran:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .belum-daftar-card {
            transition: all 0.3s ease;
        }

        .belum-daftar-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(33, 150, 243, 0.2);
        }

        .gelombang-wrapper {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 25px;
        }

        .gelombang-box {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
            border-left: 4px solid #005F02;
            position: relative;
            transition: transform 0.2s ease;
        }

        .gelombang-box:hover {
            transform: translateX(5px);
        }

        .gelombang-box.active-wave {
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            border-left: 4px solid #2e7d32;
        }

        .gelombang-box h4 {
            margin: 0 0 5px 0;
            color: #2d2d2d;
            font-weight: 600;
        }

        .gelombang-box p {
            margin: 0;
            font-size: 0.9rem;
            color: #666;
        }

        .badge-open,
        .badge-coming,
        .badge-closed {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            margin-top: 8px;
        }

        .badge-open {
            background: #4caf50;
            color: white;
        }

        .badge-coming {
            background: #ff9800;
            color: white;
        }

        .badge-closed {
            background: #9e9e9e;
            color: white;
        }

        .quota-info {
            margin-top: 8px;
        }

        .progress-bar {
            height: 4px;
            background: #e0e0e0;
            border-radius: 2px;
            margin-top: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: #005F02;
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .btn-daftar.disabled {
            background: #9e9e9e;
            cursor: not-allowed;
        }

        .cek-status-link {
            text-align: center;
            margin-top: 30px;
        }

        .btn-cek-status {
            display: inline-block;
            background: transparent;
            border: 2px solid #005F02;
            color: #005F02;
            padding: 12px 30px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-cek-status:hover {
            background: #005F02;
            color: white;
            text-decoration: none;
        }

        .table-responsive::-webkit-scrollbar {
            height: 6px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: #005F02;
            border-radius: 3px;
        }

        .biaya-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-top: 20px;
        }

        .biaya-card h4 {
            margin: 0 0 15px 0;
            color: #005F02;
            font-size: 1.1rem;
            border-bottom: 2px solid #e8f5e9;
            padding-bottom: 8px;
        }

        .row-biaya {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .row-biaya span:first-child {
            color: #555;
            font-weight: 500;
        }

        .row-biaya span:last-child {
            color: #005F02;
            font-weight: 600;
        }

        .biaya-keterangan {
            font-size: 0.7rem;
            color: #999;
            margin-top: 5px;
            line-height: 1.3;
        }

        @media (max-width: 768px) {
            .user-info-wrapper {
                flex-direction: column;
                text-align: center;
            }

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                margin-bottom: 15px;
                border: 1px solid #e0e0e0;
                border-radius: 8px;
                padding: 10px;
            }

            td {
                border: none;
                position: relative;
                padding-left: 50%;
                text-align: right;
            }

            td:before {
                position: absolute;
                left: 12px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
                font-weight: bold;
                content: attr(data-label);
            }
        }
    </style>
@endsection