@extends('layouts.app')

@section('title', 'Profil Pesantren')

@section('content')
@include('frontend.partials.page-header', ['title' => 'Profil Pesantren'])

<section class="section">
    <div class="container">
        <div class="row g-4">
            @php
                $cards = [
                    ['key' => 'sejarah', 'icon' => 'bi-book-half', 'route' => route('profil.sejarah'), 'title' => 'Sejarah Pesantren'],
                    ['key' => 'visi_misi', 'icon' => 'bi-bullseye', 'route' => route('profil.visi_misi'), 'title' => 'Visi & Misi'],
                    ['key' => 'struktur_organisasi', 'icon' => 'bi-diagram-3', 'route' => route('profil.struktur'), 'title' => 'Struktur Organisasi'],
                    ['key' => 'pengasuh', 'icon' => 'bi-person-badge', 'route' => route('profil.pengasuh'), 'title' => 'Pengasuh & Asatidz'],
                    ['key' => 'fasilitas', 'icon' => 'bi-building', 'route' => route('profil.fasilitas'), 'title' => 'Fasilitas'],
                ];
            @endphp
            @foreach($cards as $c)
                <div class="col-md-6 col-lg-4">
                    <a href="{{ $c['route'] }}" class="text-decoration-none">
                        <div class="card card-program p-4 h-100">
                            <div class="icon-wrap mb-3"><i class="bi {{ $c['icon'] }}"></i></div>
                            <h5>{{ $c['title'] }}</h5>
                            <p class="text-muted small">
                                {{ \Illuminate\Support\Str::limit(strip_tags($sections[$c['key']]->content ?? 'Klik untuk membaca selengkapnya.'), 130) }}
                            </p>
                            <span class="text-decoration-none fw-semibold" style="color:var(--nu-green);">
                                Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                            </span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
