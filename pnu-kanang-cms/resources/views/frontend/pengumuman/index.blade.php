@extends('layouts.app')

@section('title', 'Pengumuman')

@section('content')
@include('frontend.partials.page-header', ['title' => 'Pengumuman Resmi'])

<section class="section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-9 mx-auto">
                @forelse($announcements as $a)
                    <div class="card card-news mb-3 p-4">
                        <div class="d-flex align-items-start gap-3">
                            <div class="icon-wrap" style="width:56px;height:56px;border-radius:14px;background:var(--nu-green-soft);color:var(--nu-green-dark);display:inline-flex;align-items:center;justify-content:center;font-size:1.6rem;flex-shrink:0;">
                                <i class="bi bi-megaphone"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="mb-1"><a href="{{ route('pengumuman.show', $a->slug) }}" class="text-decoration-none" style="color:var(--nu-text);">{{ $a->title }}</a></h5>
                                <div class="small text-muted mb-2"><i class="bi bi-calendar3 me-1"></i> {{ $a->published_at?->translatedFormat('d F Y') }}</div>
                                <p class="mb-0 text-muted small">{{ \Illuminate\Support\Str::limit(strip_tags($a->content), 180) }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-muted py-5">Belum ada pengumuman.</div>
                @endforelse

                <div class="mt-4">{{ $announcements->links() }}</div>
            </div>
        </div>
    </div>
</section>
@endsection
