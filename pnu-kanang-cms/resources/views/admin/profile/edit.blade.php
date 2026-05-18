@extends('layouts.admin')
@section('title', 'Edit '.$sectionLabel)
@section('page_title', 'Edit Profil: '.$sectionLabel)

@section('content')
<div class="card card-table p-4">
    <form action="{{ route('admin.profile.update', $profile->section) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" name="title" value="{{ old('title', $profile->title) }}" class="form-control" required>
            </div>
            <div class="col-12">
                <label class="form-label">Konten <span class="text-danger">*</span></label>
                <textarea name="content" rows="14" class="form-control" required>{{ old('content', $profile->content) }}</textarea>
                <small class="text-muted">Gunakan baris baru untuk paragraf.</small>
            </div>
            <div class="col-12">
                <label class="form-label">Gambar Pendukung (opsional)</label>
                <input type="file" name="image" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp">
                @if($profile->image)
                    <img src="{{ asset('storage/'.$profile->image) }}" class="img-thumbnail mt-2" style="max-height:160px;">
                @endif
            </div>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary-pnu"><i class="bi bi-save me-1"></i> Simpan Perubahan</button>
            <a href="{{ route('admin.profile.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
