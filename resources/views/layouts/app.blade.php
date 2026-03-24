<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') — Al Ifadah</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --green-900: #1a3a2a;
            --green-800: #1f4a34;
            --green-700: #245c3e;
            --green-600: #2d7a50;
            --green-500: #38976a;
            --green-400: #4db882;
            --green-100: #e8f5ee;
            --green-50:  #f2faf5;

            --sidebar-w: 240px;
            --topbar-h: 64px;
            --radius: 12px;
            --shadow-sm: 0 1px 3px rgba(0,0,0,.08), 0 1px 2px rgba(0,0,0,.05);
            --shadow-md: 0 4px 12px rgba(0,0,0,.1);
            --shadow-lg: 0 8px 24px rgba(0,0,0,.12);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f0f4f1;
            color: #1a2e22;
            overflow-x: hidden;
        }

        /* ══════════════════════════════════
           SIDEBAR
        ══════════════════════════════════ */
        #sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-w);
            height: 100vh;
            background: var(--green-900);
            display: flex;
            flex-direction: column;
            z-index: 1050;
            transition: transform .3s ease;
            overflow: hidden;
        }

        /* subtle pattern overlay */
        #sidebar::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 20% 80%, rgba(56,151,106,.15) 0%, transparent 60%),
                              radial-gradient(circle at 80% 10%, rgba(77,184,130,.08) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Brand */
        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 20px 18px 16px;
            border-bottom: 1px solid rgba(255,255,255,.07);
            text-decoration: none;
            flex-shrink: 0;
        }
        .sidebar-brand-icon {
            width: 38px; height: 38px;
            background: var(--green-600);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem;
            color: white;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(0,0,0,.2);
        }
        .sidebar-brand-text { line-height: 1.2; }
        .sidebar-brand-name {
            font-size: .82rem;
            font-weight: 800;
            color: white;
            letter-spacing: .2px;
        }
        .sidebar-brand-sub {
            font-size: .68rem;
            color: rgba(255,255,255,.45);
            font-weight: 500;
        }

        /* Nav scroll area */
        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding: 10px 0 20px;
        }
        .sidebar-nav::-webkit-scrollbar { width: 3px; }
        .sidebar-nav::-webkit-scrollbar-thumb { background: rgba(255,255,255,.1); border-radius: 3px; }

        /* Section label */
        .nav-section {
            padding: 14px 18px 4px;
            font-size: .6rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .12em;
            color: rgba(255,255,255,.3);
        }

        /* Nav link */
        .nav-link-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 18px;
            margin: 1px 8px;
            border-radius: 9px;
            color: rgba(255,255,255,.6);
            font-size: .83rem;
            font-weight: 600;
            text-decoration: none;
            transition: all .2s;
            position: relative;
        }
        .nav-link-item i {
            width: 16px;
            text-align: center;
            font-size: .8rem;
            flex-shrink: 0;
            opacity: .8;
        }
        .nav-link-item:hover {
            color: white;
            background: rgba(255,255,255,.07);
            text-decoration: none;
        }
        .nav-link-item.active {
            color: white;
            background: var(--green-600);
            box-shadow: 0 2px 10px rgba(45,122,80,.4);
        }
        .nav-link-item.active i { opacity: 1; }

        /* Badge count */
        .nav-badge {
            margin-left: auto;
            background: var(--green-500);
            color: white;
            font-size: .6rem;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 20px;
            min-width: 18px;
            text-align: center;
        }
        .nav-link-item.active .nav-badge { background: rgba(255,255,255,.25); }

        /* Divider */
        .nav-divider {
            height: 1px;
            background: rgba(255,255,255,.06);
            margin: 6px 18px;
        }

        /* Sidebar footer */
        .sidebar-footer {
            padding: 14px 16px;
            border-top: 1px solid rgba(255,255,255,.07);
            flex-shrink: 0;
        }
        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 10px;
            border-radius: 10px;
            cursor: pointer;
            transition: background .2s;
            text-decoration: none;
        }
        .sidebar-user:hover { background: rgba(255,255,255,.07); }
        .sidebar-user-avatar {
            width: 34px; height: 34px;
            background: var(--green-600);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: .8rem;
            font-weight: 800;
            color: white;
            flex-shrink: 0;
        }
        .sidebar-user-name {
            font-size: .8rem;
            font-weight: 700;
            color: white;
            line-height: 1.2;
        }
        .sidebar-user-role {
            font-size: .68rem;
            color: rgba(255,255,255,.4);
        }

        /* ══════════════════════════════════
           MAIN WRAPPER
        ══════════════════════════════════ */
        #main-wrapper {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ══════════════════════════════════
           TOPBAR
        ══════════════════════════════════ */
        .topbar {
            height: var(--topbar-h);
            background: white;
            border-bottom: 1px solid rgba(0,0,0,.06);
            display: flex;
            align-items: center;
            padding: 0 24px;
            gap: 16px;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: var(--shadow-sm);
        }

        .topbar-toggle {
            background: none;
            border: none;
            color: #6b7280;
            font-size: 1.1rem;
            cursor: pointer;
            padding: 6px;
            border-radius: 8px;
            display: none;
            transition: all .2s;
        }
        .topbar-toggle:hover { background: var(--green-50); color: var(--green-600); }

        /* Page title in topbar */
        .topbar-title {
            font-size: .95rem;
            font-weight: 700;
            color: var(--green-900);
        }

        /* Search */
        .topbar-search {
            margin-left: auto;
            position: relative;
        }
        .topbar-search input {
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            padding: 7px 14px 7px 36px;
            font-size: .82rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f9fafb;
            color: #374151;
            width: 220px;
            outline: none;
            transition: all .2s;
        }
        .topbar-search input:focus {
            border-color: var(--green-500);
            background: white;
            width: 260px;
        }
        .topbar-search-icon {
            position: absolute;
            left: 11px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: .8rem;
        }

        /* Topbar actions */
        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .topbar-btn {
            width: 36px; height: 36px;
            border-radius: 10px;
            border: 1.5px solid #e5e7eb;
            background: white;
            display: flex; align-items: center; justify-content: center;
            color: #6b7280;
            font-size: .85rem;
            cursor: pointer;
            transition: all .2s;
            position: relative;
            text-decoration: none;
        }
        .topbar-btn:hover {
            border-color: var(--green-500);
            color: var(--green-600);
            text-decoration: none;
        }
        .topbar-btn .notif-dot {
            position: absolute;
            top: 6px; right: 6px;
            width: 7px; height: 7px;
            background: #ef4444;
            border-radius: 50%;
            border: 1.5px solid white;
        }

        /* User pill */
        .topbar-user {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 5px 10px 5px 5px;
            border-radius: 12px;
            border: 1.5px solid #e5e7eb;
            background: white;
            cursor: pointer;
            transition: all .2s;
            text-decoration: none;
            color: inherit;
        }
        .topbar-user:hover { border-color: var(--green-500); text-decoration: none; }
        .topbar-user-avatar {
            width: 28px; height: 28px;
            background: var(--green-600);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: .72rem;
            font-weight: 800;
            color: white;
        }
        .topbar-user-info { line-height: 1.2; }
        .topbar-user-name {
            font-size: .78rem;
            font-weight: 700;
            color: var(--green-900);
            display: block;
        }
        .topbar-user-role {
            font-size: .65rem;
            color: #9ca3af;
        }

        /* ══════════════════════════════════
           CONTENT
        ══════════════════════════════════ */
        #page-content {
            flex: 1;
            padding: 24px;
        }

        /* Page header inside content */
        .page-header {
            margin-bottom: 24px;
        }
        .page-header h4 {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--green-900);
            margin-bottom: 4px;
        }
        .breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
            font-size: .78rem;
        }
        .breadcrumb-item a { color: var(--green-600); text-decoration: none; }
        .breadcrumb-item.active { color: #9ca3af; }
        .breadcrumb-item + .breadcrumb-item::before { color: #d1d5db; }

        /* Cards */
        .card {
            border: none;
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
        }
        .card-header {
            background: white;
            border-bottom: 1px solid #f3f4f6;
            border-radius: var(--radius) var(--radius) 0 0 !important;
            padding: 14px 20px;
            font-weight: 700;
            font-size: .88rem;
            color: var(--green-900);
        }
        .card-body { padding: 20px; }
        .card-footer {
            background: white;
            border-top: 1px solid #f3f4f6;
            padding: 12px 20px;
        }

        /* Stat cards */
        .stat-card {
            background: white;
            border-radius: var(--radius);
            padding: 20px;
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(0,0,0,.04);
            transition: transform .2s, box-shadow .2s;
        }
        .stat-card:hover { transform: translateY(-2px); box-shadow: var(--shadow-md); }
        .stat-card h3 { font-size: 1.6rem; font-weight: 800; margin: 0; }
        .stat-card small { font-size: .75rem; font-weight: 600; color: #9ca3af; }

        /* Table */
        .table thead th {
            font-size: .72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: #6b7280;
            border-top: none;
            border-bottom: 1px solid #f3f4f6;
            background: #fafafa;
            padding: 10px 16px;
        }
        .table td {
            padding: 12px 16px;
            vertical-align: middle;
            border-top: 1px solid #f9fafb;
            font-size: .85rem;
        }
        .table-hover tbody tr:hover td { background: var(--green-50); }

        /* Badges */
        .badge { font-size: .7rem; font-weight: 700; padding: 4px 8px; border-radius: 6px; }

        /* Buttons */
        .btn-primary {
            background: var(--green-600);
            border-color: var(--green-600);
            font-weight: 700;
            border-radius: 10px;
            font-size: .85rem;
        }
        .btn-primary:hover { background: var(--green-700); border-color: var(--green-700); }

        .btn-secondary { font-weight: 600; border-radius: 10px; font-size: .85rem; }
        .btn-warning  { font-weight: 600; border-radius: 10px; font-size: .85rem; }
        .btn-danger   { font-weight: 600; border-radius: 10px; font-size: .85rem; }
        .btn-info     { font-weight: 600; border-radius: 10px; font-size: .85rem; }

        .btn-sm { font-size: .76rem; padding: 4px 10px; border-radius: 8px; }

        .btn-outline-secondary { border-radius: 10px; font-weight: 600; font-size: .85rem; }

        /* Form controls */
        .form-control, .form-select {
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: .85rem;
            color: #374151;
            transition: border-color .2s;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--green-500);
            box-shadow: 0 0 0 3px rgba(56,151,106,.12);
        }
        .form-control.is-invalid { border-color: #ef4444; }

        .input-group-text {
            border: 1.5px solid #e5e7eb;
            border-radius: 10px 0 0 10px;
            background: #f9fafb;
            color: #6b7280;
            font-size: .85rem;
        }
        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        label.font-weight-bold, label.fw-semibold {
            font-size: .82rem;
            font-weight: 700;
            color: #374151;
            margin-bottom: 5px;
        }

        /* Alerts */
        .alert {
            border: none;
            border-radius: var(--radius);
            font-size: .85rem;
            font-weight: 600;
        }
        .alert-success { background: #ecfdf5; color: #065f46; }
        .alert-danger  { background: #fef2f2; color: #991b1b; }

        /* ══════════════════════════════════
           FOOTER
        ══════════════════════════════════ */
        .main-footer {
            padding: 14px 24px;
            background: white;
            border-top: 1px solid #f3f4f6;
            font-size: .76rem;
            color: #9ca3af;
            font-weight: 500;
        }

        /* ══════════════════════════════════
           DROPDOWN (Bootstrap 4 compat)
        ══════════════════════════════════ */
        .dropdown-menu {
            border: none;
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
            font-size: .85rem;
            padding: 8px;
        }
        .dropdown-item {
            border-radius: 8px;
            padding: 8px 12px;
            font-weight: 600;
            color: #374151;
            transition: all .15s;
        }
        .dropdown-item:hover { background: var(--green-50); color: var(--green-700); }
        .dropdown-divider { border-color: #f3f4f6; }

        /* ══════════════════════════════════
           RESPONSIVE
        ══════════════════════════════════ */
        @media (max-width: 768px) {
            #sidebar { transform: translateX(-100%); }
            #sidebar.open { transform: translateX(0); }
            #main-wrapper { margin-left: 0; }
            .topbar-toggle { display: flex; }
            .topbar-search input { width: 160px; }
            .topbar-search input:focus { width: 180px; }
            .topbar-user-info { display: none; }
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.4);
            z-index: 1040;
        }
        .sidebar-overlay.show { display: block; }
    </style>

    @stack('styles')
</head>
<body>

<!-- Mobile overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div style="display:flex; min-height:100vh;">

    <!-- ══════════════ SIDEBAR ══════════════ -->
    <nav id="sidebar">

        <!-- Brand -->
        <a href="{{ url('/admin/dashboard') }}" class="sidebar-brand">
            <div class="sidebar-brand-icon">
                <i class="fas fa-mosque"></i>
            </div>
            <div class="sidebar-brand-text">
                <div class="sidebar-brand-name">Pondok Pesantren</div>
                <div class="sidebar-brand-sub">Al Ifadah Management</div>
            </div>
        </a>

        <!-- Navigation -->
        <div class="sidebar-nav">

            <div class="nav-section">Main Menu</div>
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>

            <div class="nav-divider"></div>
            <div class="nav-section">Data Master</div>

            <a href="{{ route('admin.profil-yayasan.index') }}"
               class="nav-link-item {{ request()->routeIs('admin.profil-yayasan*') ? 'active' : '' }}">
                <i class="fas fa-building"></i>
                <span>Profil Yayasan</span>
            </a>

            <a href="{{ route('admin.data-master.struktur-organisasi.index') }}"
               class="nav-link-item {{ request()->routeIs('admin.data-master.struktur-organisasi*') ? 'active' : '' }}">
                <i class="fas fa-sitemap"></i>
                <span>Struktur Organisasi</span>
            </a>

            <a href="{{ route('admin.data-master.fasilitas.index') }}"
               class="nav-link-item {{ request()->routeIs('admin.data-master.fasilitas*') ? 'active' : '' }}">
                <i class="fas fa-school"></i>
                <span>Fasilitas</span>
            </a>

            <a href="{{ route('admin.data-master.gallery.index') }}"
               class="nav-link-item {{ request()->routeIs('admin.data-master.gallery*') ? 'active' : '' }}">
                <i class="fas fa-images"></i>
                <span>Gallery</span>
            </a>

            <a href="{{ route('admin.data-master.program.index') }}"
               class="nav-link-item {{ request()->routeIs('admin.data-master.program*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt"></i>
                <span>Program</span>
            </a>

            <div class="nav-divider"></div>
            <div class="nav-section">Pendaftaran</div>

            <a href="{{ route('admin.santri.index') }}"
               class="nav-link-item {{ request()->routeIs('admin.santri*') ? 'active' : '' }}">
                <i class="fas fa-user-graduate"></i>
                <span>Data Santri</span>
            </a>

            <div class="nav-divider"></div>
            <div class="nav-section">Kepegawaian</div>

            <a href="{{ route('admin.pegawai.index') }}"
               class="nav-link-item {{ request()->routeIs('admin.pegawai*') ? 'active' : '' }}">
                <i class="fas fa-user-tie"></i>
                <span>Data Pegawai</span>
            </a>

            <div class="nav-divider"></div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            <a href="#"
               class="nav-link-item"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>

        </div>

        <!-- User at bottom -->
        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-user-avatar">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <div>
                    <div class="sidebar-user-name">{{ Auth::user()->name ?? 'Admin' }}</div>
                    <div class="sidebar-user-role">{{ Auth::user()->role ?? 'Superadmin' }}</div>
                </div>
            </div>
        </div>

    </nav>
    <!-- ══════════════ END SIDEBAR ══════════════ -->

    <!-- ══════════════ MAIN ══════════════ -->
    <div id="main-wrapper">

        <!-- Topbar -->
        <header class="topbar">
            <button class="topbar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>

            <span class="topbar-title d-none d-md-block">@yield('title', 'Dashboard')</span>

            <!-- Search -->
            <div class="topbar-search d-none d-md-block">
                <i class="fas fa-search topbar-search-icon"></i>
                <input type="text" placeholder="Pencarian...">
            </div>

            <!-- Actions -->
            <div class="topbar-actions">
                <!-- Notif -->
                <div class="dropdown">
                    <a href="#" class="topbar-btn" data-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span class="notif-dot"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width:260px;">
                        <div class="px-3 py-2 font-weight-bold" style="font-size:.82rem; color:#374151;">
                            Notifikasi
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="px-3 py-2 text-muted" style="font-size:.8rem;">
                            Tidak ada notifikasi baru.
                        </div>
                    </div>
                </div>

                <!-- User dropdown -->
                <div class="dropdown">
                    <a href="#" class="topbar-user" data-toggle="dropdown">
                        <div class="topbar-user-avatar">
                            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <div class="topbar-user-info">
                            <span class="topbar-user-name">{{ Auth::user()->name ?? 'Admin' }}</span>
                            <span class="topbar-user-role">{{ Auth::user()->role ?? 'Superadmin' }}</span>
                        </div>
                        <i class="fas fa-chevron-down ml-1" style="font-size:.65rem; color:#9ca3af;"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="px-3 py-2" style="border-bottom:1px solid #f3f4f6;">
                            <div style="font-size:.82rem; font-weight:700; color:#1f2937;">
                                {{ Auth::user()->name ?? 'Admin' }}
                            </div>
                            <div style="font-size:.72rem; color:#9ca3af;">
                                {{ Auth::user()->email ?? '' }}
                            </div>
                        </div>
                        <a class="dropdown-item mt-1" href="#"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2 text-danger"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Topbar -->

        <!-- Main Content -->
        <main id="page-content">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="main-footer">
            &copy; {{ date('Y') }} Pondok Pesantren Al Ifadah &mdash; Sistem Manajemen Admin
        </footer>

    </div>
    <!-- ══════════════ END MAIN ══════════════ -->

</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(function () {
    var $sidebar  = $('#sidebar');
    var $overlay  = $('#sidebarOverlay');
    var $toggle   = $('#sidebarToggle');

    $toggle.on('click', function () {
        $sidebar.toggleClass('open');
        $overlay.toggleClass('show');
    });

    $overlay.on('click', function () {
        $sidebar.removeClass('open');
        $overlay.removeClass('show');
    });
});

window.showAlert = function (icon, title, message) {
    Swal.fire({ icon: icon, title: title, text: message, confirmButtonColor: '#2d7a50' });
};
</script>

@stack('scripts')
</body>
</html>