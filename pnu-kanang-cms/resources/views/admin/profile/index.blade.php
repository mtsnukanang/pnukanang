@extends('layouts.admin')
@section('title', 'Profil Pesantren')
@section('page_title', 'Profil Pesantren')

@section('content')
<div class="row g-3">
    @foreach($sections as $key => $label)
        @php $p = $profiles[$key] ?? null; @endphp
        <div class="col-md-6 col-lg-4">
            <div class="card stat-card p-3 h-100">
                <div class="d-flex align-items-start gap-3">
                    <div class="icon bg-soft-green"><i class="bi bi-file-earmark-text"></i></div>
                    <div class="flex-grow-1">
                        <strong>{{ $label }}</strong>
                        <p class="small text-muted mb-2">
                            {{ $p ? \Illuminate\Support\Str::limit(strip_tags($p->content), 90) : 'Belum diisi' }}
                        </p>
                        <a href="{{ route('admin.profile.edit', $key) }}" class="btn btn-sm btn-primary-pnu">
                            <i class="bi bi-pencil me-1"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
