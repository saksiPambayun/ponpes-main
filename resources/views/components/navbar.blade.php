<nav class="navbar">
    <div class="nav-container flex justify-between items-center">

        <!-- LEFT -->
        <div class="nav-left flex items-center">
            <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo">
            <div class="brand">
                <span class="brand-top">Pondok Pesantren</span>
                <span class="brand-bottom">Al-Ifadah</span>
            </div>
        </div>

        <!-- HAMBURGER -->
        <div class="menu-toggle" onclick="toggleMenu()">
            ☰
        </div>

        <!-- MENU -->
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
                <ul class="dropdown-menu">
                    <li><a href="{{ route('struktur') }}">Struktur Organisasi</a></li>
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
                <a href="{{ route('user.pendaftaran.index') }}"
                    class="{{ request()->routeIs('user.pendaftaran.*') ? 'active' : '' }}">
                    Pendaftaran
                </a>
            </li>

            <li>
                <a href="{{ route('hubungi') }}" class="{{ request()->routeIs('hubungi') ? 'active' : '' }}">
                    Hubungi Kami
                </a>
            </li>

            <!-- AUTH MOBILE -->
            <li class="mobile-auth">
                @guest
                    <a href="{{ route('login') }}" class="btn-contact">
                        Login / Register
                    </a>
                @endguest

                @auth
                    <button type="button" onclick="openLogoutModal()" class="btn-contact">
                        Logout
                    </button>
                @endauth
            </li>
        </ul>

        <!-- AUTH DESKTOP -->
        <div class="nav-auth">
            @guest
                <a href="{{ route('login') }}" class="btn-contact">
                    Login / Register
                </a>
            @endguest

            @auth
                <button type="button" onclick="openLogoutModal()" class="btn-contact">
                    Logout
                </button>
            @endauth
        </div>

    </div>
</nav>
