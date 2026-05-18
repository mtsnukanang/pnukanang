@extends('layouts.admin')

@section('title', 'Kategori Berita')
@section('page_title', 'Kategori Berita')

@section('content')
<div class="card card-table">
    <div class="card-header d-flex justify-content-between">
        <span><i class="bi bi-tags me-1"></i> Daftar Kategori</span>
        <a href="{{ route('admin.news-categories.create') }}" class="btn btn-sm btn-primary-pnu"><i class="bi bi-plus-lg"></i> Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-pnu mb-0 align-middle">
            <thead><tr><th>Nama</th><th>Slug</th><th>Jumlah Berita</th><th>Aksi</th></tr></thead>
            <tbody>
            @forelse($categories as $c)
                <tr>
                    <td>{{ $c->name }}</td>
                    <td><code>{{ $c->slug }}</code></td>
                    <td>{{ $c->news_count }}</td>
                    <td>
                        <a href="{{ route('admin.news-categories.edit', $c) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.news-categories.destroy', $c) }}" method="POST" class="d-inline" data-confirm="Hapus kategori '{{ $c->name }}'?">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-muted py-4">Belum ada kategori.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body">{{ $categories->links() }}</div>
</div>
@endsection
