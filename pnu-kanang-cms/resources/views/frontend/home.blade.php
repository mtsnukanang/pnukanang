@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_description', 'Selamat datang di website resmi Pondok Pesantren Nahdlatul Ummah Kanang. Lembaga pendidikan Islam berhaluan Ahlussunnah wal Jamaah an-Nahdliyah.')

@section('content')

{{-- HERO --}}
<section class="hero">
    <img src="{{ asset('img/logo-pnu.svg') }}" class="arabesque" alt="">
    <div class="container position-relative">
        <span class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill" style="background:var(--nu-gold)!important;color:#fff!important;">
            <i class="bi bi-star-fill me-1"></i> Pesantren Nahdlatul Ulama
        </span>
        <h1>Selamat Datang di<br>Pondok Pesantren <span style="color:var(--nu-gold);">Nahdlatul Ummah Kanang</span></h1>
        <p class="lead mt-3">{{ $siteSettings['hero_tagline'] ?? 'Membentuk generasi Qurani, berakhlakul karimah, mandiri, dan berwawasan Ahlussunnah wal Jamaah an-Nahdliyah.' }}</p>
        <div class="mt-4 d-flex flex-wrap gap-3">
            <a href="{{ route('profil.index') }}" class="btn btn-hero"><i class="bi bi-info-circle me-1"></i> Tentang Kami</a>
            <a href="{{ route('kontak.index') }}" class="btn btn-outline-hero"><i class="bi bi-chat-dots me-1"></i> Hubungi Kami</a>
        </div>
    </div>
</section>

{{-- SAMBUTAN --}}
<section class="section">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <img src="{{ $sambutan && $sambutan->image ? asset('storage/'.$sambutan->image) : asset('img/sambutan.svg') }}"
                     alt="Sambutan Pengasuh" class="img-fluid rounded-4 shadow">
            </div>
            <div class="col-lg-7">
                <h6 class="text-uppercase fw-bold" style="color:var(--nu-gold);letter-spacing:.1em;">Sambutan Pengasuh</h6>
                <h2 class="section-title">{{ $sambutan->title ?? 'Bismillahirrahmanirrahim, Selamat Datang' }}</h2>
                <div class="sambutan">
                    <blockquote class="mb-0">
                        {!! $sambutan ? nl2br(e(\Illuminate\Support\Str::limit(strip_tags($sambutan->content), 600))) : 'Assalamu\'alaikum warahmatullahi wabarakatuh. Atas nama keluarga besar Pondok Pesantren Nahdlatul Ummah Kanang, kami menyambut hangat kunjungan Anda. Semoga website ini menjadi sarana silaturahmi dan informasi yang bermanfaat.' !!}
                    </blockquote>
                    <div class="mt-3 fw-bold" style="color:var(--nu-green-dark);">— Pengasuh Pondok Pesantren</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- PROGRAM UNGGULAN --}}
<section class="section" style="background:#fff;">
    <div class="container">
        <div class="text-center mb-4">
            <h6 class="text-uppercase fw-bold" style="color:var(--nu-gold);letter-spacing:.1em;">Program Pendidikan</h6>
            <h2 class="section-title text-center">Program Unggulan</h2>
            <p class="section-subtitle">Membekali santri dengan ilmu syar'i, akhlak mulia, dan keterampilan hidup.</p>
        </div>
        <div class="row g-4">
            @forelse($programs as $program)
                <div class="col-md-6 col-lg-4">
                    <div class="card card-program p-4">
                        <div class="icon-wrap mb-3">
                            <i class="bi {{ $program->icon ?? 'bi-book' }}"></i>
                        </div>
                        <h5>{{ $program->name }}</h5>
                        <p class="text-muted small mb-3">{{ \Illuminate\Support\Str::limit(strip_tags($program->description), 130) }}</p>
                        <a href="{{ route('program.show', $program->slug) }}" class="text-decoration-none fw-semibold" style="color:var(--nu-green);">
                            Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">Belum ada program tersedia.</div>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('program.index') }}" class="btn btn-primary-pnu"><i class="bi bi-grid me-1"></i> Lihat Semua Program</a>
        </div>
    </div>
</section>

{{-- STATISTIK --}}
<section class="section pt-0">
    <div class="container">
        <div class="stats-block">
            <div class="row g-4 text-center">
                <div class="col-6 col-md-3 stat-item">
                    <div class="num">{{ $stats['santri'] }}+</div>
                    <div class="label">Santri Aktif</div>
                </div>
                <div class="col-6 col-md-3 stat-item">
                    <div class="num">{{ $stats['asatidz'] }}+</div>
                    <div class="label">Asatidz</div>
                </div>
                <div class="col-6 col-md-3 stat-item">
                    <div class="num">{{ $stats['program'] }}</div>
                    <div class="label">Program Pendidikan</div>
                </div>
                <div class="col-6 col-md-3 stat-item">
                    <div class="num">{{ $stats['tahun'] }}+</div>
                    <div class="label">Tahun Berkhidmat</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- BERITA TERBARU --}}
<section class="section pt-0" style="background:#fff;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-2">
            <div>
                <h6 class="text-uppercase fw-bold" style="color:var(--nu-gold);letter-spacing:.1em;">Berita Pesantren</h6>
                <h2 class="section-title mb-0">Berita Terbaru</h2>
            </div>
            <a href="{{ route('berita.index') }}" class="btn btn-outline-success" style="color:var(--nu-green-dark);border-color:var(--nu-green-dark);">Lihat Semua <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
        <div class="row g-4">
            @forelse($latestNews as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card card-news">
                        <a href="{{ route('berita.show', $item->slug) }}">
                            <img src="{{ $item->featured_image ? asset('storage/'.$item->featured_image) : asset('img/placeholder.svg') }}"
                                 class="card-img-top" alt="{{ $item->title }}">
                        </a>
                        <div class="card-body">
                            @if($item->category)
                                <span class="badge badge-cat mb-2">{{ $item->category->name }}</span>
                            @endif
                            <h5 class="card-title h6"><a href="{{ route('berita.show', $item->slug) }}">{{ $item->title }}</a></h5>
                            <div class="small text-muted">
                                <i class="bi bi-calendar3 me-1"></i> {{ $item->published_at?->translatedFormat('d F Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">Belum ada berita.</div>
            @endforelse
        </div>
    </div>
</section>

{{-- GALERI --}}
@if($latestGallery->isNotEmpty())
<section class="section">
    <div class="container">
        <div class="text-center mb-4">
            <h6 class="text-uppercase fw-bold" style="color:var(--nu-gold);letter-spacing:.1em;">Dokumentasi</h6>
            <h2 class="section-title text-center">Galeri Kegiatan</h2>
        </div>
        <div class="row g-3">
            @foreach($latestGallery as $g)
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="gallery-item d-block"
                       data-lightbox-image="{{ $g->image && !str_starts_with($g->image, 'img/') ? asset('storage/'.$g->image) : asset($g->image) }}"
                       data-lightbox-title="{{ $g->title }}">
                        <img src="{{ $g->image && !str_starts_with($g->image, 'img/') ? asset('storage/'.$g->image) : asset($g->image) }}" alt="{{ $g->title }}">
                        <div class="overlay"><div class="title">{{ $g->title }}</div></div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('galeri.index') }}" class="btn btn-primary-pnu"><i class="bi bi-images me-1"></i> Lihat Semua Galeri</a>
        </div>
    </div>
</section>
@endif

{{-- PENGUMUMAN --}}
@if($latestAnnouncements->isNotEmpty())
<section class="section pt-0">
    <div class="container">
        <div class="text-center mb-4">
            <h6 class="text-uppercase fw-bold" style="color:var(--nu-gold);letter-spacing:.1em;">Informasi Resmi</h6>
            <h2 class="section-title text-center">Pengumuman Terbaru</h2>
        </div>
        <div class="row g-4">
            @foreach($latestAnnouncements as $a)
                <div class="col-md-4">
                    <div class="card card-program p-4">
                        <div class="icon-wrap mb-3"><i class="bi bi-megaphone"></i></div>
                        <h5>{{ $a->title }}</h5>
                        <div class="small text-muted mb-2"><i class="bi bi-calendar3 me-1"></i> {{ $a->published_at?->translatedFormat('d F Y') }}</div>
                        <p class="text-muted small">{{ \Illuminate\Support\Str::limit(strip_tags($a->content), 100) }}</p>
                        <a href="{{ route('pengumuman.show', $a->slug) }}" class="text-decoration-none fw-semibold" style="color:var(--nu-green);">
                            Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA Pendaftaran --}}
<section class="section pt-0">
    <div class="container">
        <div class="cta-daftar text-center">
            <h6 class="text-uppercase mb-2" style="color:var(--nu-gold);letter-spacing:.1em;font-weight:700;">Penerimaan Santri Baru</h6>
            <h2 class="fw-bold">Bergabung Bersama Pondok Pesantren Nahdlatul Ummah Kanang</h2>
            <p class="mb-4">Daftarkan putra-putri Anda untuk menimba ilmu agama dan akhlak mulia bersama kami.</p>
            <a href="{{ route('pendaftaran.index') }}" class="btn"><i class="bi bi-pencil-square me-1"></i> Daftar Sekarang</a>
        </div>
    </div>
</section>

@endsection
