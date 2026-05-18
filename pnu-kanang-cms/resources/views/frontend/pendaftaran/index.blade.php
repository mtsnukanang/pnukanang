@extends('layouts.app')

@section('title', 'Pendaftaran Santri Baru')

@section('content')
@include('frontend.partials.page-header', ['title' => 'Pendaftaran Santri Baru'])

<section class="section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card card-news p-4 h-100">
                    <h5 style="color:var(--nu-green-dark);" class="fw-bold"><i class="bi bi-info-circle me-2"></i>Informasi Pendaftaran</h5>
                    <hr>
                    @if($info && $info->content)
                        <div class="prose small">{!! nl2br(e($info->content)) !!}</div>
                    @else
                        <ul class="small text-muted">
                            <li>Pendaftaran dibuka sepanjang tahun ajaran.</li>
                            <li>Calon santri minimal lulus SD/MI atau sederajat.</li>
                            <li>Membawa fotokopi ijazah, akta lahir, dan KK.</li>
                            <li>Mengisi formulir pendaftaran online ini.</li>
                        </ul>
                    @endif
                    <div class="mt-3">
                        <strong style="color:var(--nu-green-dark);">Kontak Panitia:</strong>
                        <div class="small text-muted">
                            <i class="bi bi-whatsapp me-1"></i> {{ $siteSettings['whatsapp'] ?? '0812-3456-7890' }}<br>
                            <i class="bi bi-envelope me-1"></i> {{ $siteSettings['email'] ?? 'info@pnukanang.local' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card card-news p-4">
                    <h5 style="color:var(--nu-green-dark);" class="fw-bold mb-3">
                        <i class="bi bi-pencil-square me-2"></i>Formulir Pendaftaran Online
                    </h5>

                    @include('frontend.partials.flash')

                    <form action="{{ route('pendaftaran.store') }}" method="POST" class="row g-3">
                        @csrf

                        <div class="col-md-8">
                            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control @error('full_name') is-invalid @enderror" required>
                            @error('full_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Nama Panggilan</label>
                            <input type="text" name="nickname" value="{{ old('nickname') }}" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                                <option value="">-- Pilih --</option>
                                <option value="L" @selected(old('gender')==='L')>Laki-laki</option>
                                <option value="P" @selected(old('gender')==='P')>Perempuan</option>
                            </select>
                            @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                            <input type="text" name="birth_place" value="{{ old('birth_place') }}" class="form-control @error('birth_place') is-invalid @enderror" required>
                            @error('birth_place')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="form-control @error('birth_date') is-invalid @enderror" required>
                            @error('birth_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea name="address" rows="2" class="form-control @error('address') is-invalid @enderror" required>{{ old('address') }}</textarea>
                            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">No. HP Calon Santri</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Asal Sekolah</label>
                            <input type="text" name="previous_school" value="{{ old('previous_school') }}" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nama Orang Tua / Wali <span class="text-danger">*</span></label>
                            <input type="text" name="parent_name" value="{{ old('parent_name') }}" class="form-control @error('parent_name') is-invalid @enderror" required>
                            @error('parent_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No. HP Orang Tua / Wali <span class="text-danger">*</span></label>
                            <input type="text" name="parent_phone" value="{{ old('parent_phone') }}" class="form-control @error('parent_phone') is-invalid @enderror" required>
                            @error('parent_phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Program Pendidikan yang Diminati</label>
                            <select name="program" class="form-select">
                                <option value="">-- Pilih program --</option>
                                @foreach($programs as $p)
                                    <option value="{{ $p->name }}" @selected(old('program')===$p->name)>{{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Catatan Tambahan</label>
                            <textarea name="notes" rows="2" class="form-control">{{ old('notes') }}</textarea>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary-pnu">
                                <i class="bi bi-send me-1"></i> Kirim Pendaftaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
