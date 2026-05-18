@extends('layouts.app')

@section('title', $announcement->title)

@section('content')
@include('frontend.partials.page-header', [
    'title' => $announcement->title,
    'parents' => ['Pengumuman' => route('pengumuman.index')],
])

<section class="section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8 mx-auto">
                <div class="small text-muted mb-3"><i class="bi bi-calendar3 me-1"></i> {{ $announcement->published_at?->translatedFormat('d F Y') }}</div>
                <h1 style="color:var(--nu-green-dark);" class="fw-bold mb-4">{{ $announcement->title }}</h1>
                <article class="prose">{!! nl2br(e($announcement->content)) !!}</article>
                <div class="mt-4">
                    <a href="{{ route('pengumuman.index') }}" class="btn btn-outline-success" style="color:var(--nu-green-dark);border-color:var(--nu-green-dark);">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Pengumuman
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
