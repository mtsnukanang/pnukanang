@extends('layouts.app')

@section('title', 'Berita')

@section('content')
@include('frontend.partials.page-header', ['title' => 'Berita Pesantren'])

<section class="section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <form action="{{ route('berita.index') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="q" value="{{ $search ?? request('q') }}" class="form-control" placeholder="Cari berita...">
                        <button class="btn btn-primary-pnu" type="submit"><i class="bi bi-search"></i> Cari</button>
                    </div>
                </form>

                @if(! empty($activeCategory))
                    <h5 class="mb-3" style="color:var(--nu-green-dark);">
                        Kategori: <span class="badge badge-cat">{{ $activeCategory->name }}</span>
                    </h5>
                @elseif(! empty($search) || request('q'))
                    <p class="text-muted">Hasil pencarian untuk: <strong>{{ $search ?? request('q') }}</strong></p>
                @endif

                <div class="row g-4">
                    @forelse($news as $item)
                        <div class="col-md-6">
                            <div class="card card-news h-100">
                                <a href="{{ route('berita.show', $item->slug) }}">
                                    <img src="{{ $item->featured_image ? asset('storage/'.$item->featured_image) : asset('img/placeholder.svg') }}"
                                         class="card-img-top" alt="{{ $item->title }}">
                                </a>
                                <div class="card-body">
                                    @if($item->category)
                                        <span class="badge badge-cat mb-2">{{ $item->category->name }}</span>
                                    @endif
                                    <h5 class="card-title h6"><a href="{{ route('berita.show', $item->slug) }}">{{ $item->title }}</a></h5>
                                    <p class="small text-muted mb-2">{{ \Illuminate\Support\Str::limit($item->excerpt ?: strip_tags($item->content), 110) }}</p>
                                    <div class="small text-muted">
                                        <i class="bi bi-calendar3 me-1"></i> {{ $item->published_at?->translatedFormat('d F Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center text-muted py-5">Belum ada berita yang dipublikasikan.</div>
                    @endforelse
                </div>

                <div class="mt-4">
                    {{ $news->links() }}
                </div>
            </div>

            <aside class="col-lg-4">
                <div class="card card-news p-4 mb-4">
                    <h6 class="fw-bold mb-3" style="color:var(--nu-green-dark);">Kategori Berita</h6>
                    <div class="d-flex flex-wrap gap-2">
                        @forelse($categories as $cat)
                            <a href="{{ route('berita.category', $cat->slug) }}" class="badge badge-cat text-decoration-none">{{ $cat->name }}</a>
                        @empty
                            <span class="small text-muted">Belum ada kategori.</span>
                        @endforelse
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
