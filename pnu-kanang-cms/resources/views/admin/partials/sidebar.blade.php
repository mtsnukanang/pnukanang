<aside class="admin-sidebar" id="adminSidebar">
    <div class="brand">
        <img src="{{ asset('img/logo-pnu.svg') }}" alt="">
        <div>
            <div class="title">PNU Kanang</div>
            <div class="subtitle">Panel Admin CMS</div>
        </div>
    </div>

    <nav class="nav flex-column">
        <div class="nav-section">Utama</div>
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <div class="nav-section">Konten</div>
        <a class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}" href="{{ route('admin.news.index') }}">
            <i class="bi bi-newspaper"></i> Berita
        </a>
        <a class="nav-link {{ request()->routeIs('admin.news-categories.*') ? 'active' : '' }}" href="{{ route('admin.news-categories.index') }}">
            <i class="bi bi-tags"></i> Kategori Berita
        </a>
        <a class="nav-link {{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}" href="{{ route('admin.announcements.index') }}">
            <i class="bi bi-megaphone"></i> Pengumuman
        </a>
        <a class="nav-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}" href="{{ route('admin.galleries.index') }}">
            <i class="bi bi-images"></i> Galeri
        </a>
        <a class="nav-link {{ request()->routeIs('admin.gallery-categories.*') ? 'active' : '' }}" href="{{ route('admin.gallery-categories.index') }}">
            <i class="bi bi-collection"></i> Kategori Galeri
        </a>
        <a class="nav-link {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}" href="{{ route('admin.programs.index') }}">
            <i class="bi bi-mortarboard"></i> Program
        </a>
        <a class="nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}" href="{{ route('admin.profile.index') }}">
            <i class="bi bi-building"></i> Profil Pesantren
        </a>

        <div class="nav-section">Layanan</div>
        <a class="nav-link {{ request()->routeIs('admin.registrations.*') ? 'active' : '' }}" href="{{ route('admin.registrations.index') }}">
            <i class="bi bi-pencil-square"></i> Pendaftaran Santri
        </a>
        <a class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
            <i class="bi bi-envelope"></i> Pesan Kontak
        </a>

        <div class="nav-section">Sistem</div>
        <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
            <i class="bi bi-people"></i> User Admin
        </a>
        <a class="nav-link" href="{{ route('home') }}" target="_blank" rel="noopener">
            <i class="bi bi-box-arrow-up-right"></i> Lihat Website
        </a>
        <form action="{{ route('admin.logout') }}" method="POST" class="m-0 mt-2">
            @csrf
            <button type="submit" class="nav-link w-100 text-start" style="background:transparent;border:0;color:#d8eddf;">
                <i class="bi bi-box-arrow-left"></i> Logout
            </button>
        </form>
    </nav>
</aside>
