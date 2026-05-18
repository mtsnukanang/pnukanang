@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
@include('frontend.partials.page-header', ['title' => 'Kontak Kami'])

<section class="section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card card-news p-4 h-100">
                    <h5 style="color:var(--nu-green-dark);" class="fw-bold"><i class="bi bi-geo-alt-fill me-2"></i>Lokasi & Kontak</h5>
                    <hr>
                    <p class="mb-2"><strong>Alamat:</strong><br>{{ $siteSettings['address'] ?? 'Kanang, Kec. Binuang, Kab. Polewali Mandar, Sulawesi Barat' }}</p>
                    <p class="mb-2"><strong>Telepon:</strong><br>{{ $siteSettings['phone'] ?? '0812-3456-7890' }}</p>
                    <p class="mb-2"><strong>Email:</strong><br>{{ $siteSettings['email'] ?? 'info@pnukanang.local' }}</p>
                    <p class="mb-2"><strong>WhatsApp:</strong><br>
                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $siteSettings['whatsapp'] ?? '6281234567890') }}" target="_blank" rel="noopener">
                            <i class="bi bi-whatsapp me-1"></i> {{ $siteSettings['whatsapp'] ?? '0812-3456-7890' }}
                        </a>
                    </p>
                    <p class="mb-0"><strong>Jam Pelayanan:</strong><br>Senin - Sabtu, 08:00 - 16:00 WITA</p>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card card-news p-4 mb-4">
                    <h5 style="color:var(--nu-green-dark);" class="fw-bold mb-3"><i class="bi bi-envelope me-2"></i>Kirim Pesan</h5>

                    @include('frontend.partials.flash')

                    <form action="{{ route('kontak.store') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No. HP / WhatsApp</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Subjek <span class="text-danger">*</span></label>
                            <input type="text" name="subject" value="{{ old('subject') }}" class="form-control @error('subject') is-invalid @enderror" required>
                            @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Pesan <span class="text-danger">*</span></label>
                            <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary-pnu"><i class="bi bi-send me-1"></i> Kirim Pesan</button>
                        </div>
                    </form>
                </div>

                <div class="card card-news p-2">
                    <iframe
                        src="https://www.google.com/maps?q={{ urlencode($siteSettings['address'] ?? 'Kanang, Polewali Mandar, Sulawesi Barat') }}&output=embed"
                        width="100%" height="300" style="border:0;border-radius:14px;"
                        allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
