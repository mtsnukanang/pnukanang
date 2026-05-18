@extends('layouts.app')

@section('title', 'Galeri Kegiatan')

@section('content')
@include('frontend.partials.page-header', ['title' => 'Galeri Kegiatan'])

<section class="section">
    <div class="container">
        <div class="d-flex flex-wrap gap-2 justify-content-center mb-4">
            <a href="{{ route('galeri.index') }}" class="badge badge-cat text-decoration-none">Semua</a>
            @foreach($categories as $cat)
                <a href="{{ route('galeri.category', $cat->slug) }}"
                   class="badge badge-cat text-decoration-none {{ ($category ?? null)?->id === $cat->id ? 'fw-bold' : '' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>

        <div class="row g-3">
            @forelse($galleries as $g)
                @php
                    $imgUrl = $g->image && !str_starts_with($g->image, 'img/')
                        ? asset('storage/'.$g->image)
                        : asset($g->image);
                @endphp
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="gallery-item d-block"
                       data-lightbox-image="{{ $imgUrl }}"
                       data-lightbox-title="{{ $g->title }}">
                        <img src="{{ $imgUrl }}" alt="{{ $g->title }}">
                        <div class="overlay">
                            <div>
                                <div class="title">{{ $g->title }}</div>
                                @if($g->category)
                                    <small>{{ $g->category->name }}</small>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">Belum ada foto galeri.</div>
            @endforelse
        </div>

        <div class="mt-4">{{ $galleries->links() }}</div>
    </div>
</section>
@endsection
