@csrf
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Judul Berita <span class="text-danger">*</span></label>
        <input type="text" name="title" value="{{ old('title', $news->title ?? '') }}" class="form-control @error('title') is-invalid @enderror" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Status <span class="text-danger">*</span></label>
        <select name="status" class="form-select" required>
            <option value="draft" @selected(old('status', $news->status ?? 'draft')==='draft')>Draft</option>
            <option value="published" @selected(old('status', $news->status ?? '')==='published')>Dipublikasi</option>
        </select>
    </div>
    <div class="col-md-8">
        <label class="form-label">Kategori</label>
        <select name="news_category_id" class="form-select">
            <option value="">-- Tanpa Kategori --</option>
            @foreach($categories as $c)
                <option value="{{ $c->id }}" @selected(old('news_category_id', $news->news_category_id ?? null)==$c->id)>{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Gambar Utama</label>
        <input type="file" name="featured_image" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp">
        @if(! empty($news) && $news->featured_image)
            <small class="text-muted">Gambar saat ini:</small>
            <img src="{{ asset('storage/'.$news->featured_image) }}" class="img-thumbnail mt-1" style="max-height:100px;">
        @endif
    </div>
    <div class="col-12">
        <label class="form-label">Ringkasan</label>
        <textarea name="excerpt" rows="2" class="form-control">{{ old('excerpt', $news->excerpt ?? '') }}</textarea>
        <small class="text-muted">Opsional. Ditampilkan di daftar berita.</small>
    </div>
    <div class="col-12">
        <label class="form-label">Konten <span class="text-danger">*</span></label>
        <textarea name="content" rows="12" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $news->content ?? '') }}</textarea>
        @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<div class="mt-4">
    <button type="submit" class="btn btn-primary-pnu"><i class="bi bi-save me-1"></i> Simpan</button>
    <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">Batal</a>
</div>
