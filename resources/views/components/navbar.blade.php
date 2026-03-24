<nav class="navbar">
    <div class="nav-container">

        <div class="nav-left">
            <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo">
            <div class="brand">
                <span class="brand-top">Pondok Pesantren</span>
                <span class="brand-bottom">Al-Ifadah</span>
            </div>
        </div>

        <ul class="nav-menu">
            <li>
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    Beranda
                </a>
            </li>
            <li class="dropdown">
                <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'active' : '' }}">
                    Tentang
                </a>

                <ul class="dropdown-menu">
                    <li><a href="{{ route('struktur') }}">Struktur Organisasi</a></li>
                    <li><a href="{{ route('legalitas') }}">Legalitas</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('fasilitas') }}" class="{{ request()->routeIs('fasilitas') ? 'active' : '' }}">
                    Fasilitas
                </a>
            </li>

            <li>
                <a href="{{ route('galeri') }}" class="{{ request()->routeIs('galeri') ? 'active' : '' }}">
                    Galeri
                </a>
            </li>
            <li>
                <a href="{{ route('pendaftaran') }}" class="{{ request()->routeIs('pendaftaran') ? 'active' : '' }}">
                    Pendaftaran
                </a>
            </li>
        </ul>

        <a href="{{ route('hubungi') }}" class="btn-contact">Hubungi Kami</a>

    </div>
</nav>
