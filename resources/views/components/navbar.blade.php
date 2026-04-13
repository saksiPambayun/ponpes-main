<nav class="navbar">
    <div class="nav-container flex justify-between items-center">

        <div class="nav-left flex items-center">
            <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo">
            <div class="brand">
                <span class="brand-top">Pondok Pesantren</span>
                <span class="brand-bottom">Al-Ifadah</span>
            </div>
        </div>

        <ul class="nav-menu flex space-x-6">
            <li>
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    Beranda
                </a>
            </li>
            <li class="dropdown relative">
                <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'active' : '' }}">
                    Tentang
                </a>

                <ul class="dropdown-menu absolute hidden">
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
            <li>
                <a href="{{ route('hubungi') }}" class="{{ request()->routeIs('hubungi') ? 'active' : '' }}">
                    Hubungi Kami
                </a>
            </li>
        </ul>

        <div class="w-[150px] flex justify-end">
            @guest
                <a href="{{ route('login') }}" class="btn-contact">Login / Register</a>
            @endguest
        </div>

    </div>
</nav>