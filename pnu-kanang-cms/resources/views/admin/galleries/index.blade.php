@extends('layouts.admin')
@section('title', 'Galeri')
@section('page_title', 'Manajemen Galeri Foto')

@section('content')
<div class="card card-table">
    <div class="card-header d-flex justify-content-between">
        <span><i class="bi bi-images me-1"></i> Galeri Foto</span>
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-sm btn-primary-pnu"><i class="bi bi-plus-lg"></i> Upload Foto</a>
    </div>
    <div class="card-body">
        <div class="row g-3">
            @forelse($galleries as $g)
                @php
                    $imgUrl = $g->image && !str_starts_with($g->image, 'img/')
                        ? asset('storage/'.$g->image)
                        : asset($g->image);
                @endphp
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ $imgUrl }}" style="aspect-ratio:1/1;object-fit:cover;" alt="">
                        <div class="card-body p-2">
                            <strong class="d-block small">{{ \Illuminate\Support\Str::limit($g->title, 28) }}</strong>
                            @if($g->category)<small class="text-muted">{{ $g->category->name }}</small>@endif
                            <div class="mt-2 d-flex gap-1">
                                <a href="{{ route('admin.galleries.edit', $g) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.galleries.destroy', $g) }}" method="POST" class="d-inline" data-confirm="Hapus foto ini?">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-4">Belum ada foto galeri.</div>
            @endforelse
        </div>
        <div class="mt-3">{{ $galleries->links() }}</div>
    </div>
</div>
@endsection
