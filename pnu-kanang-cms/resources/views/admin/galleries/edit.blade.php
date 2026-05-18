@extends('layouts.admin')
@section('title', 'Edit Foto Galeri')
@section('page_title', 'Edit Foto Galeri')

@section('content')
<div class="card card-table p-4">
    <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Judul Foto <span class="text-danger">*</span></label>
                <input type="text" name="title" value="{{ old('title', $gallery->title) }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Kategori</label>
                <select name="gallery_category_id" class="form-select">
                    <option value="">-- Tanpa Kategori --</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" @selected(old('gallery_category_id', $gallery->gallery_category_id)==$c->id)>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" rows="2" class="form-control">{{ old('description', $gallery->description) }}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label">Ganti Foto</label>
                <input type="file" name="image" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp">
                <img src="{{ asset('storage/'.$gallery->image) }}" class="img-thumbnail mt-2" style="max-height:160px;">
            </div>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary-pnu"><i class="bi bi-save me-1"></i> Simpan</button>
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
