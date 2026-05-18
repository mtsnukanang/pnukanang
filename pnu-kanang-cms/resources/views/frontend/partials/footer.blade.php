<footer class="footer-pnu">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('img/logo-pnu.svg') }}" alt="" style="height:54px;" class="me-2">
                    <h6 class="mb-0">{{ $siteSettings['site_name'] ?? 'Pondok Pesantren Nahdlatul Ummah Kanang' }}</h6>
                </div>
                <p class="small">{{ $siteSettings['footer_tagline'] ?? 'Membentuk generasi Qurani, berakhlakul karimah, dan berwawasan Ahlussunnah wal Jamaah an-Nahdliyah.' }}</p>
                <div class="d-flex gap-2">
                    <a href="#" aria-label="Facebook" class="text-decoration-none"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#" aria-label="Instagram" class="text-decoration-none"><i class="bi bi-instagram fs-5"></i></a>
                    <a href="#" aria-label="YouTube" class="text-decoration-none"><i class="bi bi-youtube fs-5"></i></a>
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $siteSettings['whatsapp'] ?? '6281234567890') }}" aria-label="WhatsApp" class="text-decoration-none"><i class="bi bi-whatsapp fs-5"></i></a>
                </div>
            </div>

            <div class="col-6 col-lg-2">
                <h6>Navigasi</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="mb-2"><a href="{{ route('profil.index') }}">Profil</a></li>
                    <li class="mb-2"><a href="{{ route('program.index') }}">Program</a></li>
                    <li class="mb-2"><a href="{{ route('berita.index') }}">Berita</a></li>
                    <li class="mb-2"><a href="{{ route('galeri.index') }}">Galeri</a></li>
                </ul>
            </div>

            <div class="col-6 col-lg-3">
                <h6>Layanan</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ route('pendaftaran.index') }}">Pendaftaran Santri</a></li>
                    <li class="mb-2"><a href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
                    <li class="mb-2"><a href="{{ route('kontak.index') }}">Kontak Kami</a></li>
                    <li class="mb-2"><a href="{{ route('admin.login') }}">Login Admin</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h6>Kontak</h6>
                <p class="small mb-2"><i class="bi bi-geo-alt-fill me-2"></i>{{ $siteSettings['address'] ?? 'Kanang, Polewali Mandar, Sulawesi Barat' }}</p>
                <p class="small mb-2"><i class="bi bi-telephone-fill me-2"></i>{{ $siteSettings['phone'] ?? '0812-3456-7890' }}</p>
                <p class="small mb-2"><i class="bi bi-envelope-fill me-2"></i>{{ $siteSettings['email'] ?? 'info@pnukanang.local' }}</p>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; {{ date('Y') }} {{ $siteSettings['site_name'] ?? 'Pondok Pesantren Nahdlatul Ummah Kanang' }}. Seluruh hak cipta dilindungi.
        </div>
    </div>
</footer>
