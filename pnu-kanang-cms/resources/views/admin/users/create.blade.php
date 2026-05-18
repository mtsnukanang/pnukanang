@extends('layouts.admin')
@section('title', 'Tambah User')
@section('page_title', 'Tambah User Admin')

@section('content')
<div class="card card-table p-4" style="max-width:680px;">
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nama <span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Kata Sandi <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Konfirmasi Kata Sandi <span class="text-danger">*</span></label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <div class="col-12">
                <div class="form-check form-switch">
                    <input type="checkbox" name="is_admin" id="is_admin" value="1" class="form-check-input" checked>
                    <label class="form-check-label" for="is_admin">Berikan akses admin panel</label>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary-pnu"><i class="bi bi-save me-1"></i> Simpan</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
