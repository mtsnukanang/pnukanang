@extends('layouts.admin')

@section('title', 'Berita')
@section('page_title', 'Manajemen Berita')

@section('content')
<div class="card card-table">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <span><i class="bi bi-newspaper me-1"></i> Daftar Berita</span>
        <div class="d-flex gap-2">
            <form method="GET" action="{{ route('admin.news.index') }}" class="d-flex">
                <input type="text" name="q" value="{{ request('q') }}" class="form-control form-control-sm" placeholder="Cari judul berita...">
                <button class="btn btn-sm btn-primary-pnu ms-1"><i class="bi bi-search"></i></button>
            </form>
            <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-primary-pnu"><i class="bi bi-plus-lg"></i> Tambah</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-pnu mb-0 align-middle">
            <thead><tr>
                <th style="width:90px;"></th>
                <th>Judul</th><th>Kategori</th><th>Status</th><th>Tanggal</th><th>Aksi</th>
            </tr></thead>
            <tbody>
            @forelse($news as $n)
                <tr>
                    <td>
                        <img src="{{ $n->featured_image ? asset('storage/'.$n->featured_image) : asset('img/placeholder.svg') }}"
                             style="width:80px;height:50px;object-fit:cover;border-radius:6px;" alt="">
                    </td>
                    <td>
                        <strong>{{ $n->title }}</strong>
                        <br><small class="text-muted">/{{ $n->slug }}</small>
                    </td>
                    <td>{{ $n->category->name ?? '-' }}</td>
                    <td>
                        @if($n->status==='published')
                            <span class="badge bg-success">Dipublikasi</span>
                        @else
                            <span class="badge bg-secondary">Draft</span>
                        @endif
                    </td>
                    <td><small>{{ $n->published_at?->translatedFormat('d M Y') ?? $n->created_at->translatedFormat('d M Y') }}</small></td>
                    <td>
                        <a href="{{ route('admin.news.edit', $n) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.news.destroy', $n) }}" method="POST" class="d-inline" data-confirm="Hapus berita '{{ $n->title }}'?">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center text-muted py-4">Belum ada berita.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body">{{ $news->links() }}</div>
</div>
@endsection
