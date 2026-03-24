@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="page-wrapper">

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <div class="header-left">
            <div class="header-icon">
                <i class="fas fa-building"></i>
            </div>
            <div>
                <h1 class="page-title">Profil Yayasan</h1>
                <nav class="breadcrumb-nav">
                    <a href="{{ url('/admin/dashboard') }}" class="breadcrumb-link">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <i class="fas fa-chevron-right breadcrumb-sep"></i>
                    <span class="breadcrumb-current">Profil Yayasan</span>
                </nav>
            </div>
        </div>
        <a href="{{ route('admin.profil-yayasan.edit') }}" class="btn-primary-action">
            <i class="fas fa-pencil-alt"></i>
            Edit Profil
        </a>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
    <div class="alert-success-box" role="alert">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
        <button type="button" class="alert-close" data-bs-dismiss="alert">&times;</button>
    </div>
    @endif

    <div class="content-grid">

        {{-- ===== KOLOM KIRI ===== --}}
        <div class="sidebar-col">
            <div class="section-card identity-card">
                <div class="identity-body">
                    {{-- Logo --}}
                    <div class="logo-wrap">
                        @if($profil->logo)
                            <img src="{{ asset('storage/' . $profil->logo) }}"
                                 alt="Logo Yayasan"
                                 class="org-logo">
                        @else
                            <div class="logo-placeholder">
                                <i class="fas fa-building"></i>
                            </div>
                        @endif
                    </div>

                    <h2 class="org-name">{{ $profil->nama_yayasan }}</h2>

                    @if($profil->singkatan)
                        <span class="org-badge">{{ $profil->singkatan }}</span>
                    @endif

                    @if($profil->tahun_berdiri)
                        <p class="org-since">
                            <i class="fas fa-calendar-alt"></i>
                            Berdiri sejak {{ $profil->tahun_berdiri }}
                        </p>
                    @endif
                </div>

                @if($profil->foto_gedung)
                <div class="building-photo-wrap">
                    <img src="{{ asset('storage/' . $profil->foto_gedung) }}"
                         alt="Foto Gedung"
                         class="building-photo">
                    <span class="building-label">Foto Gedung</span>
                </div>
                @endif
            </div>
        </div>

        {{-- ===== KOLOM KANAN ===== --}}
        <div class="main-col">

            {{-- Tentang Yayasan --}}
            <div class="section-card">
                <div class="section-card-header">
                    <div class="section-card-title">
                        <span class="title-icon" style="background:#eff6ff; color:#3b82f6;">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        Tentang Yayasan
                    </div>
                </div>
                <div class="section-card-body">
                    <p class="body-text">{{ $profil->deskripsi ?? '-' }}</p>
                </div>
            </div>

            {{-- Visi & Misi --}}
            <div class="section-card">
                <div class="section-card-header">
                    <div class="section-card-title">
                        <span class="title-icon" style="background:#f0fdf4; color:#10b981;">
                            <i class="fas fa-bullseye"></i>
                        </span>
                        Visi & Misi
                    </div>
                </div>
                <div class="section-card-body">
                    <div class="vm-block">
                        <div class="vm-label visi-label">
                            <i class="fas fa-eye"></i> Visi
                        </div>
                        <p class="body-text">{{ $profil->visi ?? '-' }}</p>
                    </div>
                    <div class="vm-divider"></div>
                    <div class="vm-block">
                        <div class="vm-label misi-label">
                            <i class="fas fa-list-ul"></i> Misi
                        </div>
                        <p class="body-text" style="white-space: pre-line;">{{ $profil->misi ?? '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- Kontak & Alamat --}}
            <div class="section-card">
                <div class="section-card-header">
                    <div class="section-card-title">
                        <span class="title-icon" style="background:#fff7ed; color:#f97316;">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        Kontak & Alamat
                    </div>
                </div>
                <div class="section-card-body">
                    <div class="info-grid">
                        <div class="info-item full-width">
                            <span class="info-label">Alamat</span>
                            <span class="info-value">
                                {{ $profil->alamat ?? '-' }}
                                @if($profil->kota || $profil->provinsi)
                                    <br>
                                    <span class="info-sub">
                                        {{ implode(', ', array_filter([$profil->kota, $profil->provinsi, $profil->kode_pos])) }}
                                    </span>
                                @endif
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Telepon</span>
                            <span class="info-value">
                                @if($profil->telepon)
                                    <a href="tel:{{ $profil->telepon }}" class="info-link">
                                        <i class="fas fa-phone"></i> {{ $profil->telepon }}
                                    </a>
                                @else
                                    <span class="text-empty">-</span>
                                @endif
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Email</span>
                            <span class="info-value">
                                @if($profil->email)
                                    <a href="mailto:{{ $profil->email }}" class="info-link">
                                        <i class="fas fa-envelope"></i> {{ $profil->email }}
                                    </a>
                                @else
                                    <span class="text-empty">-</span>
                                @endif
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Website</span>
                            <span class="info-value">
                                @if($profil->website)
                                    <a href="{{ $profil->website }}" target="_blank" class="info-link info-link-primary">
                                        <i class="fas fa-globe"></i> {{ $profil->website }}
                                    </a>
                                @else
                                    <span class="text-empty">-</span>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Media Sosial --}}
            <div class="section-card">
                <div class="section-card-header">
                    <div class="section-card-title">
                        <span class="title-icon" style="background:#fdf4ff; color:#a855f7;">
                            <i class="fas fa-share-alt"></i>
                        </span>
                        Media Sosial
                    </div>
                </div>
                <div class="section-card-body">
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">
                                <i class="fab fa-instagram" style="color:#e1306c;"></i> Instagram
                            </span>
                            <span class="info-value">
                                @if($profil->instagram)
                                    <a href="https://instagram.com/{{ ltrim($profil->instagram,'@') }}"
                                       target="_blank" class="info-link">
                                        @{{ ltrim($profil->instagram,'@') }}
                                    </a>
                                @else
                                    <span class="text-empty">-</span>
                                @endif
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">
                                <i class="fab fa-facebook" style="color:#1877f2;"></i> Facebook
                            </span>
                            <span class="info-value">
                                @if($profil->facebook)
                                    <a href="{{ $profil->facebook }}" target="_blank" class="info-link">
                                        {{ $profil->facebook }}
                                    </a>
                                @else
                                    <span class="text-empty">-</span>
                                @endif
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">
                                <i class="fab fa-youtube" style="color:#ff0000;"></i> YouTube
                            </span>
                            <span class="info-value">
                                @if($profil->youtube)
                                    <a href="{{ $profil->youtube }}" target="_blank" class="info-link">
                                        {{ $profil->youtube }}
                                    </a>
                                @else
                                    <span class="text-empty">-</span>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Legalitas --}}
            <div class="section-card">
                <div class="section-card-header">
                    <div class="section-card-title">
                        <span class="title-icon" style="background:#f8fafc; color:#64748b;">
                            <i class="fas fa-file-alt"></i>
                        </span>
                        Legalitas
                    </div>
                </div>
                <div class="section-card-body">
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">No. Akta Notaris</span>
                            <span class="info-value mono">{{ $profil->no_akta ?? '-' }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">No. SK Kemenkumham</span>
                            <span class="info-value mono">{{ $profil->no_sk_kemenkumham ?? '-' }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">NPWP</span>
                            <span class="info-value mono">{{ $profil->npwp ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>{{-- end main-col --}}
    </div>{{-- end content-grid --}}

</div>

<style>
/* ===== BASE ===== */
*, *::before, *::after { box-sizing: border-box; }

.page-wrapper {
    padding: 28px 32px;
    background: #f8fafc;
    min-height: 100vh;
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
}

/* ===== PAGE HEADER ===== */
.page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
    flex-wrap: wrap;
    gap: 16px;
}
.header-left {
    display: flex;
    align-items: center;
    gap: 16px;
}
.header-icon {
    width: 48px; height: 48px;
    background: #1e3a5f;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 1.2rem;
    flex-shrink: 0;
}
.page-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #0f172a;
    margin: 0 0 4px;
    line-height: 1.2;
}
.breadcrumb-nav {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.8rem;
    color: #64748b;
}
.breadcrumb-link { color: #64748b; text-decoration: none; }
.breadcrumb-link:hover { color: #3b82f6; }
.breadcrumb-sep { font-size: 0.6rem; color: #cbd5e1; }
.breadcrumb-current { color: #1e3a5f; font-weight: 600; }

.btn-primary-action {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #1e3a5f;
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    font-size: 0.875rem;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    transition: background 0.2s, transform 0.1s;
}
.btn-primary-action:hover {
    background: #1a3252;
    color: #fff;
    transform: translateY(-1px);
}

/* ===== ALERT ===== */
.alert-success-box {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    border-left: 4px solid #10b981;
    border-radius: 10px;
    padding: 12px 16px;
    margin-bottom: 20px;
    font-size: 0.875rem;
    color: #15803d;
    font-weight: 500;
}
.alert-success-box i { font-size: 1rem; }
.alert-close {
    margin-left: auto;
    background: none;
    border: none;
    color: #15803d;
    font-size: 1.1rem;
    cursor: pointer;
    padding: 0 4px;
    line-height: 1;
}

/* ===== LAYOUT ===== */
.content-grid {
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 24px;
    align-items: start;
}
@media (max-width: 900px) {
    .content-grid { grid-template-columns: 1fr; }
}
.sidebar-col { display: flex; flex-direction: column; gap: 0; }
.main-col    { display: flex; flex-direction: column; gap: 20px; }

/* ===== SECTION CARD ===== */
.section-card {
    background: #fff;
    border-radius: 14px;
    border: 1px solid #f1f5f9;
    box-shadow: 0 1px 3px rgba(0,0,0,0.06);
    overflow: hidden;
    transition: box-shadow 0.2s;
}
.section-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
.section-card-header {
    padding: 16px 20px;
    border-bottom: 1px solid #f1f5f9;
}
.section-card-title {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.9rem;
    font-weight: 700;
    color: #0f172a;
}
.title-icon {
    width: 32px; height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    flex-shrink: 0;
}
.section-card-body {
    padding: 20px;
}

/* ===== IDENTITY CARD ===== */
.identity-card { height: 100%; }
.identity-body {
    padding: 32px 20px 24px;
    text-align: center;
}
.logo-wrap { margin-bottom: 16px; }
.org-logo {
    max-height: 100px;
    max-width: 180px;
    object-fit: contain;
}
.logo-placeholder {
    width: 80px; height: 80px;
    background: #eff6ff;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #3b82f6;
    font-size: 1.8rem;
}
.org-name {
    font-size: 1.05rem;
    font-weight: 700;
    color: #0f172a;
    margin: 0 0 10px;
    line-height: 1.4;
}
.org-badge {
    display: inline-block;
    background: #1e3a5f;
    color: #fff;
    border-radius: 20px;
    padding: 4px 14px;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.05em;
    margin-bottom: 12px;
}
.org-since {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.8rem;
    color: #64748b;
    margin: 0;
}
.building-photo-wrap {
    position: relative;
    overflow: hidden;
}
.building-photo {
    width: 100%;
    height: 180px;
    object-fit: cover;
    display: block;
}
.building-label {
    position: absolute;
    bottom: 10px; left: 10px;
    background: rgba(0,0,0,0.55);
    color: #fff;
    font-size: 0.72rem;
    font-weight: 600;
    padding: 3px 10px;
    border-radius: 20px;
    backdrop-filter: blur(4px);
}

/* ===== VISI MISI ===== */
.vm-block { margin-bottom: 4px; }
.vm-divider {
    height: 1px;
    background: #f1f5f9;
    margin: 16px 0;
}
.vm-label {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.78rem;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 20px;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}
.visi-label { background: #eff6ff; color: #1d4ed8; }
.misi-label { background: #f0fdf4; color: #15803d; }

/* ===== BODY TEXT ===== */
.body-text {
    font-size: 0.875rem;
    color: #475569;
    line-height: 1.75;
    margin: 0;
}

/* ===== INFO GRID ===== */
.info-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}
.info-item { display: flex; flex-direction: column; gap: 4px; }
.info-item.full-width { grid-column: 1 / -1; }
.info-label {
    font-size: 0.72rem;
    font-weight: 700;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}
.info-value {
    font-size: 0.875rem;
    font-weight: 600;
    color: #1e293b;
    line-height: 1.5;
}
.info-sub {
    font-size: 0.82rem;
    font-weight: 400;
    color: #64748b;
}
.info-link {
    color: #334155;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 0.875rem;
}
.info-link:hover { color: #1e3a5f; }
.info-link-primary { color: #1e3a5f; }
.info-link i { font-size: 0.82rem; }
.text-empty { color: #cbd5e1; font-weight: 400; }
.mono { font-family: 'Courier New', monospace; font-size: 0.82rem; }

@media (max-width: 640px) {
    .info-grid { grid-template-columns: 1fr; }
    .info-item.full-width { grid-column: auto; }
    .page-wrapper { padding: 20px 16px; }
}
</style>
@endsection