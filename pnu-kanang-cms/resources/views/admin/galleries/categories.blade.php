@extends('layouts.admin')
@section('title', 'Kategori Galeri')
@section('page_title', 'Kategori Galeri')

@section('content')
<div class="row g-3">
    <div class="col-md-5">
        <div class="card card-table p-4">
            <h6 class="mb-3"><i class="bi bi-plus-circle me-1"></i> Tambah Kategori</h6>
            <form action="{{ route('admin.gallery-categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                </div>
                <button class="btn btn-primary-pnu"><i class="bi bi-save me-1"></i> Simpan</button>
            </form>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card card-table">
            <div class="card-header">Daftar Kategori Galeri</div>
            <div class="table-responsive">
                <table class="table table-pnu align-middle mb-0">
                    <thead><tr><th>Nama</th><th>Slug</th><th>Foto</th><th>Aksi</th></tr></thead>
                    <tbody>
                    @forelse($categories as $c)
                        <tr>
                            <td>{{ $c->name }}</td>
                            <td><code>{{ $c->slug }}</code></td>
                            <td>{{ $c->galleries_count }}</td>
                            <td>
                                <form action="{{ route('admin.gallery-categories.destroy', $c) }}" method="POST" class="d-inline" data-confirm="Hapus kategori '{{ $c->name }}'?">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-muted py-3">Belum ada kategori.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-body">{{ $categories->links() }}</div>
        </div>
    </div>
</div>
@endsection
