<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Cabin:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pendaftaran.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tentang.css') }}">
    <link rel="stylesheet" href="{{ asset('css/galeri.css') }}">
    <link rel="stylesheet" href="{{ asset('css/struktur.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hubungi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fasilitas.css') }}">

</head>

<body>

    @include('components.navbar')

    @yield('content')

    @include('components.footer')

    <!-- MODAL LOGOUT -->
    <div id="logoutModal" class="modal-overlay">
        <div class="modal-box">
            <h3>Konfirmasi Logout</h3>
            <p>Apakah Anda yakin ingin keluar dari akun Anda?</p>

            <div class="modal-btn">
                <button onclick="closeLogoutModal()" class="btn-cancel">Batal</button>
                <button onclick="submitLogout()" class="btn-confirm">Ya, Logout</button>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        if (document.querySelectorAll('.galeri-card').length > 0) {
            const cards = document.querySelectorAll('.galeri-card');
            const nextBtn = document.querySelector('.btn-next');
            const prevBtn = document.querySelector('.btn-prev');

            let current = 0;

            function updateCarousel() {
                if (cards.length === 0) return;

                cards.forEach(card => {
                    card.classList.remove('active', 'prev', 'next');
                });

                let prev = (current - 1 + cards.length) % cards.length;
                let next = (current + 1) % cards.length;

                cards[current].classList.add('active');
                cards[prev].classList.add('prev');
                cards[next].classList.add('next');
            }

            if (nextBtn && prevBtn) {
                nextBtn.addEventListener('click', () => {
                    current = (current + 1) % cards.length;
                    updateCarousel();
                });

                prevBtn.addEventListener('click', () => {
                    current = (current - 1 + cards.length) % cards.length;
                    updateCarousel();
                });

                updateCarousel();
            }
        }

        // =========================
        // LOGOUT MODAL
        // =========================
        function openLogoutModal() {
            const modal = document.getElementById('logoutModal');
            if (modal) modal.classList.add('active');
        }

        function closeLogoutModal() {
            const modal = document.getElementById('logoutModal');
            if (modal) modal.classList.remove('active');
        }

        function submitLogout() {
            document.getElementById('logout-form').submit();
        }
    </script>
</body>

</html>