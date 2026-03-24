@extends('admin.layout')

@section('title', 'Struktur Organisasi')

@section('content')
<div class="page-wrapper">

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <div class="header-left">
            <div class="header-icon">
                <i class="fas fa-sitemap"></i>
            </div>
            <div>
                <h1 class="page-title">Struktur Organisasi</h1>
                <nav class="breadcrumb-nav">
                    <a href="{{ route('admin.dashboard') }}" class="breadcrumb-link">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <i class="fas fa-chevron-right breadcrumb-sep"></i>
                    <span class="breadcrumb-current">Struktur Organisasi</span>
                </nav>
            </div>
        </div>
        <a href="{{ route('admin.data-master.struktur-organisasi.create') }}" class="btn-primary-action">
            <i class="fas fa-plus"></i>
            Tambah Anggota
        </a>
    </div>

    {{-- STATISTIK (HAPUS STATUS) --}}
    <div class="stats-grid">
        @php
            $statItems = [
                ['label' => 'Total Anggota',  'val' => $stats['total'],    'icon' => 'fa-users',      'accent' => '#3b82f6'],
                ['label' => 'Pengurus',       'val' => $stats['pengurus'], 'icon' => 'fa-crown',      'accent' => '#f59e0b'],
                ['label' => 'Pengawas',       'val' => $stats['pengawas'], 'icon' => 'fa-shield-alt', 'accent' => '#8b5cf6'],
                ['label' => 'Pelaksana',      'val' => $stats['pelaksana'] ?? 0, 'icon' => 'fa-tools', 'accent' => '#6b7280'],
            ];
        @endphp
        @foreach($statItems as $s)
        <div class="stat-card">
            <div class="stat-icon" style="background: {{ $s['accent'] }}18; color: {{ $s['accent'] }};">
                <i class="fas {{ $s['icon'] }}"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">{{ $s['label'] }}</span>
                <span class="stat-value">{{ $s['val'] }}</span>
            </div>
            <div class="stat-bar" style="background: {{ $s['accent'] }};"></div>
        </div>
        @endforeach
    </div>

    {{-- FILTER (HAPUS STATUS) --}}
    <div class="section-card">
        <div class="section-card-header">
            <div class="section-card-title">
                <i class="fas fa-filter"></i>
                Filter Data
            </div>
        </div>
        <div class="section-card-body">
            <form action="{{ route('admin.data-master.struktur-organisasi.index') }}" method="GET" class="filter-form">
                <div class="filter-group">
                    <label class="filter-label">Cari Nama</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-search input-icon"></i>
                        <input type="text" name="search"
                               class="form-input with-icon"
                               placeholder="Cari nama..."
                               value="{{ request('search') }}">
                    </div>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Divisi</label>
                    <select name="divisi" class="form-select">
                        <option value="">Semua Divisi</option>
                        @foreach($divisiOptions as $val => $label)
                            <option value="{{ $val }}" {{ request('divisi') == $val ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-group filter-actions">
                    <label class="filter-label">&nbsp;</label>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn-filter">
                            <i class="fas fa-search"></i> Cari
                        </button>
                        <a href="{{ route('admin.data-master.struktur-organisasi.index') }}" class="btn-reset">
                            <i class="fas fa-undo"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- TABEL DATA (HAPUS EMAIL, URUTAN, STATUS, KETERANGAN) --}}
    <div class="section-card">
        <div class="section-card-header">
            <div class="section-card-title">
                <i class="fas fa-list"></i>
                Data Anggota
            </div>
           <span class="total-badge">{{ $anggota->count() }} anggota</span>
        </div>
        <div class="section-card-body p-0">
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th class="th-no">No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Divisi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($anggota as $i => $item)
                        <tr>
                            <td class="td-no">
                                <span class="row-number">{{ $anggota->firstItem() + $i }}</span>
                            </td>
                            <td>
                                <div class="avatar-wrap">
                                    @if($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}"
                                             class="member-avatar" alt="{{ $item->nama }}">
                                    @else
                                        <div class="avatar-placeholder">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <span class="member-name">{{ $item->nama }}</span>
                            </td>
                            <td>
                                <span class="jabatan-text">{{ $item->jabatan }}</span>
                            </td>
                            <td>
                                @php
                                    $divisiMap = [
                                        'pengurus'  => ['color' => '#f59e0b', 'bg' => '#fef3c7', 'icon' => 'fa-crown'],
                                        'pengawas'  => ['color' => '#3b82f6', 'bg' => '#dbeafe', 'icon' => 'fa-shield-alt'],
                                        'pelaksana' => ['color' => '#6b7280', 'bg' => '#f3f4f6', 'icon' => 'fa-tools'],
                                    ];
                                    $ds = $divisiMap[$item->divisi] ?? ['color' => '#6b7280', 'bg' => '#f3f4f6', 'icon' => 'fa-question'];
                                @endphp
                                <span class="divisi-badge"
                                      style="color: {{ $ds['color'] }}; background: {{ $ds['bg'] }};">
                                    <i class="fas {{ $ds['icon'] }}"></i>
                                    {{ ucfirst($item->divisi) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-group">
                                    <a href="{{ route('admin.data-master.struktur-organisasi.show', $item) }}"
                                       class="action-btn view" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.data-master.struktur-organisasi.edit', $item) }}"
                                       class="action-btn edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('admin.data-master.struktur-organisasi.destroy', $item) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Hapus anggota ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="action-btn delete" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <div class="empty-icon">
                                        <i class="fas fa-inbox"></i>
                                    </div>
                                    <h3 class="empty-title">Belum ada data</h3>
                                    <p class="empty-desc">Belum ada anggota yang ditambahkan.</p>
                                    <a href="{{ route('admin.data-master.struktur-organisasi.create') }}" class="btn-primary-action">
                                        <i class="fas fa-plus"></i> Tambah Anggota
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($anggota->hasPages())
        <div class="pagination-footer">
            <p class="pagination-info">
                Menampilkan
                <strong>{{ $anggota->firstItem() }}</strong>–<strong>{{ $anggota->lastItem() }}</strong>
                dari <strong>{{ $anggota->total() }}</strong> anggota
            </p>
            <div class="pagination-links">
                {{ $anggota->links() }}
            </div>
        </div>
        @endif
    </div>

</div>

<style>
/* ===== RESET & BASE ===== */
*, *::before, *::after { box-sizing: border-box; }

/* ===== PAGE WRAPPER ===== */
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
    margin-bottom: 28px;
    flex-wrap: wrap;
    gap: 16px;
}
.header-left {
    display: flex;
    align-items: center;
    gap: 16px;
}
.header-icon {
    width: 48px;
    height: 48px;
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
.breadcrumb-link {
    color: #64748b;
    text-decoration: none;
}
.breadcrumb-link:hover { color: #3b82f6; }
.breadcrumb-sep { font-size: 0.6rem; color: #cbd5e1; }
.breadcrumb-current { color: #1e3a5f; font-weight: 600; }

/* ===== PRIMARY BUTTON ===== */
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

/* ===== STATS GRID ===== */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 24px;
}
@media (max-width: 1024px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 600px)  { .stats-grid { grid-template-columns: 1fr; } }

.stat-card {
    background: #fff;
    border-radius: 14px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 16px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
    border: 1px solid #f1f5f9;
    position: relative;
    overflow: hidden;
    transition: box-shadow 0.2s;
}
.stat-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
.stat-bar {
    position: absolute;
    left: 0; top: 0; bottom: 0;
    width: 4px;
    border-radius: 14px 0 0 14px;
}
.stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    flex-shrink: 0;
}
.stat-content {
    display: flex;
    flex-direction: column;
    gap: 2px;
}
.stat-label {
    font-size: 0.75rem;
    font-weight: 600;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}
.stat-value {
    font-size: 1.75rem;
    font-weight: 800;
    color: #0f172a;
    line-height: 1;
}

/* ===== SECTION CARD ===== */
.section-card {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
    border: 1px solid #f1f5f9;
    margin-bottom: 24px;
    overflow: hidden;
}
.section-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 24px;
    border-bottom: 1px solid #f1f5f9;
}
.section-card-title {
    font-size: 0.9rem;
    font-weight: 700;
    color: #0f172a;
    display: flex;
    align-items: center;
    gap: 8px;
}
.section-card-title i { color: #64748b; }
.section-card-body { padding: 20px 24px; }
.section-card-body.p-0 { padding: 0; }

.total-badge {
    font-size: 0.78rem;
    font-weight: 600;
    background: #f1f5f9;
    color: #475569;
    border-radius: 20px;
    padding: 4px 12px;
}

/* ===== FILTER FORM ===== */
.filter-form {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
    align-items: flex-end;
}
.filter-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
    flex: 1;
    min-width: 180px;
}
.filter-label {
    font-size: 0.78rem;
    font-weight: 600;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.04em;
}
.input-icon-wrap { position: relative; }
.input-icon {
    position: absolute;
    left: 12px; top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 0.8rem;
    pointer-events: none;
}
.form-input, .form-select {
    width: 100%;
    padding: 9px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    font-size: 0.875rem;
    color: #0f172a;
    background: #fff;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
}
.form-input.with-icon { padding-left: 34px; }
.form-input:focus, .form-select:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
}
.btn-filter {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #1e3a5f;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 9px 18px;
    font-size: 0.875rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
    white-space: nowrap;
}
.btn-filter:hover { background: #1a3252; }
.btn-reset {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #f1f5f9;
    color: #475569;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 9px 14px;
    font-size: 0.875rem;
    font-weight: 600;
    text-decoration: none;
    transition: background 0.2s;
    white-space: nowrap;
}
.btn-reset:hover { background: #e2e8f0; color: #334155; }

/* ===== TABLE ===== */
.data-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.875rem;
}
.data-table thead tr {
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
}
.data-table th {
    padding: 12px 16px;
    font-size: 0.75rem;
    font-weight: 700;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    white-space: nowrap;
    text-align: left;
}
.data-table td {
    padding: 14px 16px;
    border-bottom: 1px solid #f1f5f9;
    color: #334155;
    vertical-align: middle;
}
.data-table tbody tr:last-child td { border-bottom: none; }
.data-table tbody tr:hover td { background: #f8fafc; }
.th-no, .td-no { width: 56px; }
.text-center { text-align: center; }

/* ===== ROW NUMBER ===== */
.row-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    background: #f1f5f9;
    color: #475569;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 700;
}

/* ===== AVATAR ===== */
.avatar-wrap { flex-shrink: 0; }
.member-avatar {
    width: 44px;
    height: 44px;
    border-radius: 10px;
    object-fit: cover;
    border: 2px solid #e2e8f0;
}
.avatar-placeholder {
    width: 44px;
    height: 44px;
    border-radius: 10px;
    background: linear-gradient(135deg, #e0e7ff, #c7d2fe);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6366f1;
    font-size: 1rem;
}
.member-name { font-weight: 600; color: #0f172a; }

/* ===== JABATAN ===== */
.jabatan-text { font-weight: 500; color: #334155; }

/* ===== DIVISI BADGE ===== */
.divisi-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.78rem;
    font-weight: 600;
}

/* ===== ACTION BUTTONS ===== */
.action-group {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}
.action-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    font-size: 0.8rem;
    text-decoration: none;
    transition: background 0.15s, transform 0.1s;
    background: transparent;
}
.action-btn:hover { transform: translateY(-1px); }
.action-btn.view   { background: #dbeafe; color: #1d4ed8; }
.action-btn.edit   { background: #fef9c3; color: #92400e; }
.action-btn.delete { background: #fee2e2; color: #b91c1c; }
.action-btn.view:hover   { background: #bfdbfe; }
.action-btn.edit:hover   { background: #fef08a; }
.action-btn.delete:hover { background: #fecaca; }

/* ===== EMPTY STATE ===== */
.empty-state {
    text-align: center;
    padding: 64px 24px;
}
.empty-icon {
    width: 72px; height: 72px;
    background: #f1f5f9;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    font-size: 1.8rem;
    color: #94a3b8;
}
.empty-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #334155;
    margin: 0 0 8px;
}
.empty-desc {
    font-size: 0.875rem;
    color: #94a3b8;
    margin: 0 0 20px;
}

/* ===== PAGINATION ===== */
.pagination-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    padding: 16px 24px;
    border-top: 1px solid #f1f5f9;
}
.pagination-info {
    font-size: 0.82rem;
    color: #64748b;
    margin: 0;
}
.pagination-info strong { color: #0f172a; }

/* Pagination component override */
.pagination { margin: 0; }
.pagination .page-link {
    border: 1px solid #e2e8f0;
    color: #334155;
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 0.82rem;
    font-weight: 600;
    margin: 0 2px;
    text-decoration: none;
    transition: all 0.15s;
}
.pagination .page-link:hover { background: #f1f5f9; border-color: #cbd5e1; }
.pagination .page-item.active .page-link {
    background: #1e3a5f;
    border-color: #1e3a5f;
    color: #fff;
}
.pagination .page-item.disabled .page-link { opacity: 0.45; pointer-events: none; }

/* ===== UTILITY ===== */
.d-flex      { display: flex; }
.d-inline    { display: inline; }
.gap-2       { gap: 8px; }
</style>
@endsection