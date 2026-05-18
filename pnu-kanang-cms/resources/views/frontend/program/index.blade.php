@extends('layouts.app')

@section('title', 'Program Pendidikan')

@section('content')
@include('frontend.partials.page-header', ['title' => 'Program Pendidikan'])

<section class="section">
    <div class="container">
        <div class="text-center mb-5">
            <p class="text-muted mb-0 mx-auto" style="max-width:720px;">
                Program pendidikan di Pondok Pesantren Nahdlatul Ummah Kanang dirancang untuk membentuk santri yang berilmu, beriman, beramal, dan mampu menghadapi tantangan zaman dengan tetap berpegang teguh pada ajaran Ahlussunnah wal Jamaah an-Nahdliyah.
            </p>
        </div>
        <div class="row g-4">
            @forelse($programs as $program)
                <div class="col-md-6 col-lg-4">
                    <div class="card card-program p-4 h-100">
                        <div class="icon-wrap mb-3"><i class="bi {{ $program->icon ?? 'bi-book' }}"></i></div>
                        <h5>{{ $program->name }}</h5>
                        <p class="text-muted small mb-3">{{ \Illuminate\Support\Str::limit(strip_tags($program->description), 160) }}</p>
                        <a href="{{ route('program.show', $program->slug) }}" class="text-decoration-none fw-semibold mt-auto" style="color:var(--nu-green);">
                            Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">Belum ada program tersedia.</div>
            @endforelse
        </div>
    </div>
</section>
@endsection
