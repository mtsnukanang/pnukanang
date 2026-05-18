@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
@include('frontend.partials.page-header', [
    'title' => $pageTitle,
    'parents' => ['Profil' => route('profil.index')],
])

<section class="section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8 mx-auto">
                @if($section && $section->image)
                    <img src="{{ asset('storage/'.$section->image) }}" alt="{{ $section->title }}" class="img-fluid rounded-4 mb-4 shadow">
                @endif
                <article class="prose">
                    @if($section && $section->content)
                        {!! nl2br(e($section->content)) !!}
                    @else
                        <p class="text-muted">Konten belum tersedia. Silakan hubungi pengelola untuk mengisi bagian ini.</p>
                    @endif
                </article>
            </div>
        </div>
    </div>
</section>
@endsection
