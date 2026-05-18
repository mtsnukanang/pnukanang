@extends('layouts.admin')

@section('title', 'Tambah Kategori Berita')
@section('page_title', 'Tambah Kategori Berita')

@section('content')
<div class="card card-table p-4">
    <form action="{{ route('admin.news-categories.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
            </div>
            <div class="col-12">
                <label class="form-label">Deskripsi</label>
                <input type="text" name="description" value="{{ old('description') }}" class="form-control">
            </div>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary-pnu"><i class="bi bi-save me-1"></i> Simpan</button>
            <a href="{{ route('admin.news-categories.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
