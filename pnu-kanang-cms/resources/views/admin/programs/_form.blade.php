@csrf
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Nama Program <span class="text-danger">*</span></label>
        <input type="text" name="name" value="{{ old('name', $program->name ?? '') }}" class="form-control" required>
    </div>
    <div class="col-md-2">
        <label class="form-label">Urutan</label>
        <input type="number" name="order" value="{{ old('order', $program->order ?? 0) }}" class="form-control" min="0">
    </div>
    <div class="col-md-2 d-flex align-items-end">
        <div class="form-check form-switch">
            <input type="checkbox" name="is_active" value="1" id="is_active" class="form-check-input"
                @checked(old('is_active', $program->is_active ?? true))>
            <label for="is_active" class="form-check-label">Aktif</label>
        </div>
    </div>
    <div class="col-md-6">
        <label class="form-label">Icon (Bootstrap Icons class)</label>
        <input type="text" name="icon" value="{{ old('icon', $program->icon ?? 'bi-book') }}" class="form-control" placeholder="bi-book">
        <small class="text-muted">Contoh: bi-book, bi-mortarboard, bi-people. Lihat <a href="https://icons.getbootstrap.com" target="_blank">Bootstrap Icons</a>.</small>
    </div>
    <div class="col-md-6">
        <label class="form-label">Gambar Program</label>
        <input type="file" name="image" class="form-control" accept="image/jpg,image/jpeg,image/png,image/webp">
        @if(! empty($program) && $program->image)
            <img src="{{ asset('storage/'.$program->image) }}" class="img-thumbnail mt-1" style="max-height:80px;">
        @endif
    </div>
    <div class="col-12">
        <label class="form-label">Deskripsi Program <span class="text-danger">*</span></label>
        <textarea name="description" rows="8" class="form-control" required>{{ old('description', $program->description ?? '') }}</textarea>
    </div>
</div>
<div class="mt-3">
    <button class="btn btn-primary-pnu"><i class="bi bi-save me-1"></i> Simpan</button>
    <a href="{{ route('admin.programs.index') }}" class="btn btn-outline-secondary">Batal</a>
</div>
