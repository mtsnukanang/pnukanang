@extends('layouts.app')

@section('title', $news->title)
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($news->excerpt ?: $news->content), 155))

@section('content')
@include('frontend.partials.page-header', [
    'title' => $news->title,
    'parents' => ['Berita' => route('berita.index')],
])

<section class="section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <article>
                    <img src="{{ $news->featured_image ? asset('storage/'.$news->featured_image) : asset('img/placeholder.svg') }}"
                         class="img-fluid rounded-4 mb-4 shadow" alt="{{ $news->title }}">

                    <div class="d-flex flex-wrap gap-3 align-items-center mb-3 small text-muted">
                        @if($news->category)
                            <span class="badge badge-cat">{{ $news->category->name }}</span>
                        @endif
                        <span><i class="bi bi-calendar3 me-1"></i> {{ $news->published_at?->translatedFormat('d F Y') }}</span>
                        <span><i class="bi bi-person me-1"></i> {{ $news->author->name ?? 'Admin' }}</span>
                        <span><i class="bi bi-eye me-1"></i> {{ number_format($news->views) }} kali dibaca</span>
                    </div>

                    <h1 style="color:var(--nu-green-dark);" class="fw-bold mb-3">{{ $news->title }}</h1>

                    @if($news->excerpt)
                        <p class="lead text-muted">{{ $news->excerpt }}</p>
                    @endif

                    <div class="prose mt-4">
                        {!! nl2br(e($news->content)) !!}
                    </div>
                </article>

                <div class="mt-4">
                    <a href="{{ route('berita.index') }}" class="btn btn-outline-success" style="color:var(--nu-green-dark);border-color:var(--nu-green-dark);">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Berita
                    </a>
                </div>
            </div>

            <aside class="col-lg-4">
                <div class="card card-news p-4 mb-4">
                    <h6 class="fw-bold mb-3" style="color:var(--nu-green-dark);">Berita Terkait</h6>
                    @forelse($related as $r)
                        <div class="d-flex gap-3 mb-3">
                            <img src="{{ $r->featured_image ? asset('storage/'.$r->featured_image) : asset('img/placeholder.svg') }}"
                                 alt="" style="width:80px;height:60px;object-fit:cover;border-radius:8px;">
                            <div>
                                <a href="{{ route('berita.show', $r->slug) }}" class="text-decoration-none fw-semibold small" style="color:var(--nu-text);">
                                    {{ \Illuminate\Support\Str::limit($r->title, 60) }}
                                </a>
                                <div class="small text-muted">{{ $r->published_at?->translatedFormat('d M Y') }}</div>
                            </div>
                        </div>
                    @empty
                        <div class="text-muted small">Belum ada berita terkait.</div>
                    @endforelse
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
