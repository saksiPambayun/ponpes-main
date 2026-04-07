<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'User Panel') - Yayasan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body class="bg-gray-100">

    <!-- Top Navbar -->
    <nav class="bg-indigo-700 shadow-lg">
        <div class="px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('user.dashboard') }}" class="flex items-center">
                        <img src="{{ asset('gallery/logoo.jpeg') }}" class="h-10 w-10 rounded-lg object-cover" alt="Logo">
                        <span class="ml-3 text-white font-bold text-lg">Yayasan Panel</span>
                    </a>
                </div>
<a href="{{ route('user.notifications') }}" class="text-white hover:text-indigo-200 relative">
    <i class="fas fa-bell text-xl"></i>
    <span id="notification-badge"
        class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-1.5 py-0.5 min-w-[18px] text-center hidden">0</span>
</a>

                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                            @if(Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="h-8 w-8 rounded-full object-cover">
                            @else
                                <div class="h-8 w-8 rounded-full bg-indigo-500 flex items-center justify-center text-white">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif
                            <span class="text-white">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-white text-sm"></i>
                        </button>

                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                            <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i> Profil Saya
                            </a>
                            <hr class="my-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-indigo-800 min-h-screen">
            <div class="py-4">
                <div class="px-4 mb-6">
                    <div class="bg-indigo-700 rounded-lg p-3 text-center">
                        <p class="text-indigo-200 text-sm">Welcome,</p>
                        <p class="text-white font-semibold">{{ Auth::user()->name }}</p>
                        <span class="text-xs text-indigo-300">User</span>
                    </div>
                </div>

               <nav class="space-y-1">
    <a href="{{ route('user.dashboard') }}" class="flex items-center px-4 py-2 text-indigo-100 hover:bg-indigo-700 transition">
        <i class="fas fa-tachometer-alt w-5"></i>
        <span class="ml-3">Dashboard</span>
    </a>

    <div class="border-t border-indigo-700 my-2"></div>

    <p class="px-4 text-xs text-indigo-300 uppercase tracking-wider mt-4">Data Master</p>

    <a href="{{ route('user.profil-yayasan.index') }}" class="flex items-center px-4 py-2 text-indigo-100 hover:bg-indigo-700 transition">
        <i class="fas fa-building w-5"></i>
        <span class="ml-3">Profil Yayasan</span>
    </a>

    <a href="{{ route('user.struktur.index') }}" class="flex items-center px-4 py-2 text-indigo-100 hover:bg-indigo-700 transition">
        <i class="fas fa-sitemap w-5"></i>
        <span class="ml-3">Struktur Organisasi</span>
    </a>

    <a href="{{ route('user.fasilitas.index') }}" class="flex items-center px-4 py-2 text-indigo-100 hover:bg-indigo-700 transition">
        <i class="fas fa-building w-5"></i>
        <span class="ml-3">Fasilitas</span>
    </a>

    <a href="{{ route('user.gallery.index') }}" class="flex items-center px-4 py-2 text-indigo-100 hover:bg-indigo-700 transition">
        <i class="fas fa-images w-5"></i>
        <span class="ml-3">Gallery</span>
    </a>

    <a href="{{ route('user.program.index') }}" class="flex items-center px-4 py-2 text-indigo-100 hover:bg-indigo-700 transition">
        <i class="fas fa-chalkboard-user w-5"></i>
        <span class="ml-3">Program</span>
    </a>

    <div class="border-t border-indigo-700 my-2"></div>

    <p class="px-4 text-xs text-indigo-300 uppercase tracking-wider mt-4">Dokumen</p>

    <a href="{{ route('user.akta-yayasan.index') }}" class="flex items-center px-4 py-2 text-indigo-100 hover:bg-indigo-700 transition">
        <i class="fas fa-file-alt w-5"></i>
        <span class="ml-3">Akta Yayasan</span>
    </a>

    <a href="{{ route('user.akta-wakaf.index') }}" class="flex items-center px-4 py-2 text-indigo-100 hover:bg-indigo-700 transition">
        <i class="fas fa-file-contract w-5"></i>
        <span class="ml-3">Akta Wakaf</span>
    </a>

    <div class="border-t border-indigo-700 my-2"></div>

    <p class="px-4 text-xs text-indigo-300 uppercase tracking-wider mt-4">Pendaftaran</p>

    <a href="{{ route('user.santri.index') }}" class="flex items-center px-4 py-2 text-indigo-100 hover:bg-indigo-700 transition">
        <i class="fas fa-user-graduate w-5"></i>
        <span class="ml-3">Data Santri</span>
    </a>

    <a href="{{ route('user.profile') }}" class="flex items-center px-4 py-2 text-indigo-100 hover:bg-indigo-700 transition">
        <i class="fas fa-user-circle w-5"></i>
        <span class="ml-3">Profil Saya</span>
    </a>

    <a href="{{ route('user.notifications') }}" class="flex items-center px-4 py-2 text-indigo-100 hover:bg-indigo-700 transition">
        <i class="fas fa-bell w-5"></i>
        <span class="ml-3">Notifikasi</span>
    </a>
</nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded shadow">
                    <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded shadow">
                    <i class="fas fa-exclamation-circle mr-2"></i> {{ $errors->first() }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
  <script>
// Fungsi untuk update notifikasi
function updateNotifications() {
    fetch('{{ route("user.notifications.unread") }}')
        .then(response => response.json())
        .then(data => {
            const badge = document.getElementById('notification-badge');
            if (badge) {
                if (data.count > 0) {
                    badge.textContent = data.count;
                    badge.classList.remove('hidden');
                } else {
                    badge.classList.add('hidden');
                }
            }
        })
        .catch(error => console.error('Error:', error));
}

// Cek notifikasi setiap 30 detik
setInterval(updateNotifications, 30000);
updateNotifications();
</script>
</body>
</html>
