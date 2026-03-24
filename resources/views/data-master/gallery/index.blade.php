@extends('admin.layout')

@section('title', 'Gallery')

@section('content')
<div class="page-wrapper">

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <div class="header-left">
            <div class="header-icon">
                <i class="fas fa-images"></i>
            </div>
            <div>
                <h1 class="page-title">Gallery</h1>
                <nav class="breadcrumb-nav">
                    <a href="{{ url('/admin/dashboard') }}" class="breadcrumb-link">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <i class="fas fa-chevron-right breadcrumb-sep"></i>
                    <span class="breadcrumb-current">Gallery</span>
                </nav>
            </div>
        </div>
        <div class="header-actions">
            <button onclick="window.print()" class="btn-secondary-action">
                <i class="fas fa-print"></i> Print
            </button>
            <a href="{{ route('admin.data-master.gallery.create') }}" class="btn-primary-action">
                <i class="fas fa-plus"></i> Tambah Gallery
            </a>
        </div>
    </div>

    {{-- STATS --}}
    <div class="stats-grid">
        @php
            $stats = [
                ['label' => 'Total Gallery', 'val' => App\Models\Gallery::count(),                           'icon' => 'fa-images',         'accent' => '#3b82f6', 'bg' => '#eff6ff'],
                ['label' => 'Kegiatan',      'val' => App\Models\Gallery::where('kategori','kegiatan')->count(), 'icon' => 'fa-calendar-check', 'accent' => '#10b981', 'bg' => '#f0fdf4'],
                ['label' => 'Prestasi',      'val' => App\Models\Gallery::where('kategori','prestasi')->count(), 'icon' => 'fa-trophy',         'accent' => '#f59e0b', 'bg' => '#fffbeb'],
                ['label' => 'Umum',          'val' => App\Models\Gallery::where('kategori','umum')->count(),     'icon' => 'fa-folder',         'accent' => '#8b5cf6', 'bg' => '#faf5ff'],
            ];
        @endphp
        @foreach($stats as $s)
        <div class="stat-card">
            <div class="stat-bar" style="background: {{ $s['accent'] }};"></div>
            <div class="stat-icon" style="background: {{ $s['bg'] }}; color: {{ $s['accent'] }};">
                <i class="fas {{ $s['icon'] }}"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">{{ $s['label'] }}</span>
                <span class="stat-value">{{ $s['val'] }}</span>
            </div>
        </div>
        @endforeach
    </div>

    {{-- ALERT --}}
    @if(session('success'))
    <div class="alert-success-box">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
    @endif

    {{-- FILTER --}}
    <div class="section-card">
        <div class="section-card-header">
            <div class="section-card-title">
                <i class="fas fa-filter"></i>
                Filter Data
            </div>
        </div>
        <div class="section-card-body">
       <form action="{{ route('admin.data-master.gallery.index') }}" method="GET" class="filter-form">
                <div class="filter-group">
                    <label class="filter-label">Cari</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-search input-icon"></i>
                        <input type="text" name="search"
                               class="form-input with-icon"
                               placeholder="Judul atau deskripsi..."
                               value="{{ request('search') }}">
                    </div>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        <option value="kegiatan" {{ request('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="prestasi" {{ request('kategori') == 'prestasi' ? 'selected' : '' }}>Prestasi</option>
                        <option value="umum"     {{ request('kategori') == 'umum'     ? 'selected' : '' }}>Umum</option>
                    </select>
                </div>
                
                <div class="filter-group filter-actions">
                    <label class="filter-label">&nbsp;</label>
                    <div style="display:flex; gap:8px;">
                        <button type="submit" class="btn-filter">
                            <i class="fas fa-search"></i> Cari
                        </button>
                       <a href="{{ route('admin.data-master.gallery.index') }}" class="btn-reset">
                            <i class="fas fa-undo"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="section-card">
        <div class="section-card-header">
            <div class="section-card-title">
                <i class="fas fa-list"></i>
                Daftar Gallery
            </div>
            <span class="total-badge">{{ $galleries->total() }} item</span>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th class="th-no">No</th>
                        <th class="th-foto">Gambar</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th class="text-center">Urutan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galleries as $index => $item)
                    <tr>
                        <td class="td-no">
                            <span class="row-number">{{ $galleries->firstItem() + $index }}</span>
                        </td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                     alt="{{ $item->judul }}"
                                     class="foto-thumb">
                            @else
                                <div class="foto-empty">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <span class="item-title">{{ $item->judul }}</span>
                        </td>
                        <td>{!! $item->kategori_badge !!}</td>
                        <td>
                            <span class="date-text">
                                {{ $item->tanggal_kegiatan ? $item->tanggal_kegiatan->format('d/m/Y') : '-' }}
                            </span>
                        </td>
                       
                        <td>
                            <div class="action-group">
                                <a href="{{ route('data-master.gallery.show', $item->id) }}"
                                   class="action-btn view" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('data-master.gallery.edit', $item->id) }}"
                                   class="action-btn edit" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('data-master.gallery.destroy', $item->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus gallery ini?')">
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
                        <td colspan="8">
                            <div class="empty-state">
                                <div class="empty-icon">
                                    <i class="fas fa-images"></i>
                                </div>
                                <h3 class="empty-title">Belum ada data gallery</h3>
                                <p class="empty-desc">Mulai dengan menambahkan foto pertama ke gallery.</p>
                                <a href="{{ route('admin.data-master.gallery.create') }}" class="btn-primary-action">
                                    <i class="fas fa-plus"></i> Tambah Gallery
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($galleries->hasPages())
        <div class="pagination-footer">
            <p class="pagination-info">
                Menampilkan
                <strong>{{ $galleries->firstItem() }}</strong>–<strong>{{ $galleries->lastItem() }}</strong>
                dari <strong>{{ $galleries->total() }}</strong> item
            </p>
            <div class="pagination-links">
                {{ $galleries->links() }}
            </div>
        </div>
        @endif
    </div>

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

.header-actions { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

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
.btn-primary-action:hover { background: #1a3252; color: #fff; transform: translateY(-1px); }

.btn-secondary-action {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    color: #475569;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 10px 18px;
    font-size: 0.875rem;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    transition: background 0.2s;
}
.btn-secondary-action:hover { background: #f1f5f9; }

/* ===== STATS ===== */
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
    box-shadow: 0 1px 3px rgba(0,0,0,0.06);
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
    width: 48px; height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    flex-shrink: 0;
}
.stat-content { display: flex; flex-direction: column; gap: 2px; }
.stat-label {
    font-size: 0.72rem;
    font-weight: 700;
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

/* ===== SECTION CARD ===== */
.section-card {
    background: #fff;
    border-radius: 14px;
    border: 1px solid #f1f5f9;
    box-shadow: 0 1px 3px rgba(0,0,0,0.06);
    overflow: hidden;
    margin-bottom: 24px;
}
.section-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 24px;
    border-bottom: 1px solid #f1f5f9;
}
.section-card-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.9rem;
    font-weight: 700;
    color: #0f172a;
}
.section-card-title i { color: #64748b; }
.section-card-body { padding: 20px 24px; }
.total-badge {
    font-size: 0.78rem;
    font-weight: 600;
    background: #f1f5f9;
    color: #475569;
    border-radius: 20px;
    padding: 4px 12px;
}

/* ===== FILTER ===== */
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
    font-size: 0.72rem;
    font-weight: 700;
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
    appearance: auto;
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
.table-responsive { overflow-x: auto; }
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
    font-size: 0.72rem;
    font-weight: 700;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    white-space: nowrap;
}
.data-table td {
    padding: 14px 16px;
    border-bottom: 1px solid #f1f5f9;
    color: #334155;
    vertical-align: middle;
}
.data-table tbody tr:last-child td { border-bottom: none; }
.data-table tbody tr:hover td { background: #f8fafc; }

.th-no   { width: 52px; }
.th-foto { width: 80px; }
.td-no   { width: 52px; }
.text-center { text-align: center; }

/* ===== ROW NUMBER ===== */
.row-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px; height: 32px;
    background: #f1f5f9;
    color: #475569;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 700;
}

/* ===== FOTO ===== */
.foto-thumb {
    width: 52px; height: 52px;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid #e2e8f0;
    display: block;
}
.foto-empty {
    width: 52px; height: 52px;
    background: #f1f5f9;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #cbd5e1;
    font-size: 1.1rem;
}

/* ===== CELLS ===== */
.item-title { font-weight: 600; color: #0f172a; }
.date-text  { font-size: 0.82rem; color: #64748b; }
.urutan-badge {
    display: inline-block;
    background: #f1f5f9;
    color: #475569;
    border-radius: 8px;
    padding: 4px 12px;
    font-size: 0.82rem;
    font-weight: 700;
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
    width: 32px; height: 32px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    font-size: 0.8rem;
    text-decoration: none;
    transition: background 0.15s, transform 0.1s;
    background: transparent;
}
.action-btn:hover { transform: translateY(-1px); }
.action-btn.view      { background: #dbeafe; color: #1d4ed8; }
.action-btn.edit      { background: #fef9c3; color: #92400e; }
.action-btn.delete    { background: #fee2e2; color: #b91c1c; }
.action-btn.toggle-on { background: #dcfce7; color: #15803d; }
.action-btn.toggle-off{ background: #f1f5f9; color: #64748b; }
.action-btn.view:hover      { background: #bfdbfe; }
.action-btn.edit:hover      { background: #fef08a; }
.action-btn.delete:hover    { background: #fecaca; }
.action-btn.toggle-on:hover { background: #bbf7d0; }
.action-btn.toggle-off:hover{ background: #e2e8f0; }

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
.empty-title { font-size: 1.05rem; font-weight: 700; color: #334155; margin: 0 0 8px; }
.empty-desc  { font-size: 0.875rem; color: #94a3b8; margin: 0 0 20px; }

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
.pagination-info { font-size: 0.82rem; color: #64748b; margin: 0; }
.pagination-info strong { color: #0f172a; }
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
.pagination .page-item.active .page-link { background: #1e3a5f; border-color: #1e3a5f; color: #fff; }
.pagination .page-item.disabled .page-link { opacity: 0.45; pointer-events: none; }

/* ===== UTILITY ===== */
.d-inline { display: inline; }

@media (max-width: 640px) { .page-wrapper { padding: 20px 16px; } }
</style>
@endsection