@extends('layouts.admin')
@section('title', 'Detail Pendaftaran')
@section('page_title', 'Detail Pendaftaran')

@section('content')
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card card-table p-4">
            <h5 class="mb-1" style="color:var(--nu-green-dark);">{{ $registration->full_name }}</h5>
            <code>{{ $registration->registration_number }}</code>
            <hr>
            <table class="table table-borderless mb-0">
                <tr><th width="200">Nama Panggilan</th><td>{{ $registration->nickname ?: '-' }}</td></tr>
                <tr><th>Jenis Kelamin</th><td>{{ $registration->gender==='L'?'Laki-laki':'Perempuan' }}</td></tr>
                <tr><th>Tempat / Tgl Lahir</th><td>{{ $registration->birth_place }}, {{ $registration->birth_date->translatedFormat('d F Y') }}</td></tr>
                <tr><th>Alamat</th><td>{{ $registration->address }}</td></tr>
                <tr><th>No. HP Calon Santri</th><td>{{ $registration->phone ?: '-' }}</td></tr>
                <tr><th>Asal Sekolah</th><td>{{ $registration->previous_school ?: '-' }}</td></tr>
                <tr><th>Program</th><td>{{ $registration->program ?: '-' }}</td></tr>
                <tr><th>Nama Orang Tua/Wali</th><td>{{ $registration->parent_name }}</td></tr>
                <tr><th>No. HP Orang Tua/Wali</th><td>{{ $registration->parent_phone }}</td></tr>
                <tr><th>Catatan</th><td>{{ $registration->notes ?: '-' }}</td></tr>
                <tr><th>Tanggal Daftar</th><td>{{ $registration->created_at->translatedFormat('d F Y H:i') }}</td></tr>
            </table>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card card-table p-4">
            <h6 class="mb-3"><i class="bi bi-arrow-repeat me-1"></i> Ubah Status</h6>
            <form action="{{ route('admin.registrations.status', $registration) }}" method="POST">
                @csrf @method('PATCH')
                <select name="status" class="form-select mb-3">
                    @foreach(\App\Models\StudentRegistration::STATUSES as $key => $label)
                        <option value="{{ $key }}" @selected($registration->status===$key)>{{ $label }}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary-pnu w-100"><i class="bi bi-save me-1"></i> Simpan Status</button>
            </form>
            <hr>
            <a href="https://wa.me/{{ preg_replace('/\D/', '', $registration->parent_phone) }}" target="_blank" class="btn btn-outline-success w-100">
                <i class="bi bi-whatsapp me-1"></i> Hubungi Orang Tua
            </a>
            <a href="{{ route('admin.registrations.index') }}" class="btn btn-outline-secondary w-100 mt-2">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
