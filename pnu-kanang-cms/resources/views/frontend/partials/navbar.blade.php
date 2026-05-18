<nav class="navbar navbar-expand-lg navbar-pnu sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('img/logo-pnu.svg') }}" alt="Logo PNU Kanang">
            <div class="lh-sm">
                <div>{{ $siteSettings['site_short_name'] ?? 'PNU Kanang' }}</div>
                <small class="text-muted fw-normal" style="font-size:.78rem;">Pondok Pesantren Nahdlatul Ummah</small>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('profil.*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profil.sejarah') }}">Sejarah</a></li>
                        <li><a class="dropdown-item" href="{{ route('profil.visi_misi') }}">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="{{ route('profil.struktur') }}">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="{{ route('profil.pengasuh') }}">Pengasuh & Asatidz</a></li>
                        <li><a class="dropdown-item" href="{{ route('profil.fasilitas') }}">Fasilitas</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('program.*') ? 'active' : '' }}" href="{{ route('program.index') }}">Program</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('berita.*') ? 'active' : '' }}" href="{{ route('berita.index') }}">Berita</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('pengumuman.*') ? 'active' : '' }}" href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('galeri.*') ? 'active' : '' }}" href="{{ route('galeri.index') }}">Galeri</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('kontak.*') ? 'active' : '' }}" href="{{ route('kontak.index') }}">Kontak</a></li>
                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <a class="btn btn-daftar" href="{{ route('pendaftaran.index') }}">
                        <i class="bi bi-pencil-square me-1"></i> Daftar Santri
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
