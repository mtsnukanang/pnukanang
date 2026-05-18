@extends('layouts.app')

@section('title', $program->name)

@section('content')
@include('frontend.partials.page-header', [
    'title' => $program->name,
    'parents' => ['Program' => route('program.index')],
])

<section class="section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8 mx-auto">
                <img src="{{ $program->image ? asset('storage/'.$program->image) : asset('img/program-1.svg') }}"
                     alt="{{ $program->name }}" class="img-fluid rounded-4 mb-4 shadow">

                <div class="d-flex align-items-center mb-3">
                    <div class="icon-wrap me-3" style="width:56px;height:56px;border-radius:14px;background:var(--nu-green-soft);color:var(--nu-green-dark);display:inline-flex;align-items:center;justify-content:center;font-size:1.6rem;">
                        <i class="bi {{ $program->icon ?? 'bi-book' }}"></i>
                    </div>
                    <h2 class="mb-0" style="color:var(--nu-green-dark);">{{ $program->name }}</h2>
                </div>

                <article class="prose">
                    {!! nl2br(e($program->description)) !!}
                </article>

                <div class="mt-4">
                    <a href="{{ route('program.index') }}" class="btn btn-outline-success" style="color:var(--nu-green-dark);border-color:var(--nu-green-dark);">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Program
                    </a>
                    <a href="{{ route('pendaftaran.index') }}" class="btn btn-primary-pnu">
                        <i class="bi bi-pencil-square me-1"></i> Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
