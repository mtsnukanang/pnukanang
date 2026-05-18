@csrf
<div class="row g-3">
    <div class="col-md-9">
        <label class="form-label">Judul <span class="text-danger">*</span></label>
        <input type="text" name="title" value="{{ old('title', $announcement->title ?? '') }}" class="form-control" required>
    </div>
    <div class="col-md-3 d-flex align-items-end">
        <div class="form-check form-switch">
            <input type="checkbox" name="is_active" value="1" id="is_active" class="form-check-input"
                   @checked(old('is_active', $announcement->is_active ?? true))>
            <label for="is_active" class="form-check-label">Aktifkan</label>
        </div>
    </div>
    <div class="col-12">
        <label class="form-label">Isi Pengumuman <span class="text-danger">*</span></label>
        <textarea name="content" rows="10" class="form-control" required>{{ old('content', $announcement->content ?? '') }}</textarea>
    </div>
</div>
<div class="mt-3">
    <button class="btn btn-primary-pnu"><i class="bi bi-save me-1"></i> Simpan</button>
    <a href="{{ route('admin.announcements.index') }}" class="btn btn-outline-secondary">Batal</a>
</div>
