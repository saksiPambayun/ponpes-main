<!-- DATA MASTER -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="dataMasterDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-database"></i> DATA MASTER
    </a>

    <ul class="dropdown-menu" aria-labelledby="dataMasterDropdown">

        <li>
            <a class="dropdown-item" href="{{ route('admin.data-master.profil-yayasan.index') }}">
                <i class="fas fa-building me-2"></i> Profil Yayasan
            </a>
        </li>

        <li>
            <a class="dropdown-item" href="{{ route('admin.data-master.struktur-organisasi.index') }}">
                <i class="fas fa-sitemap me-2"></i> Struktur Organisasi
            </a>
        </li>

        <li>
            <a class="dropdown-item" href="{{ route('admin.data-master.fasilitas.index') }}">
                <i class="fas fa-school me-2"></i> Fasilitas
            </a>
        </li>

        <li>
            <a class="dropdown-item" href="{{ route('admin.data-master.gallery.index') }}">
                <i class="fas fa-images me-2"></i> Gallery
            </a>
        </li>

        <li>
            <a class="dropdown-item" href="{{ route('admin.data-master.program.index') }}">
                <i class="fas fa-calendar-alt me-2"></i> Program
            </a>
        </li>

    </ul>
</li>