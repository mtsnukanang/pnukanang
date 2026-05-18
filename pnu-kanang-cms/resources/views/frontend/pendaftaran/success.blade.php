@extends('layouts.app')

@section('title', 'Pendaftaran Berhasil')

@section('content')
@include('frontend.partials.page-header', ['title' => 'Pendaftaran Berhasil'])

<section class="section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-7 mx-auto">
                <div class="card card-news p-5 text-center">
                    <div class="mb-3" style="font-size:4rem;color:var(--nu-green);">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <h2 style="color:var(--nu-green-dark);" class="fw-bold">Alhamdulillah, Pendaftaran Berhasil!</h2>
                    <p class="text-muted">Terima kasih atas kepercayaan Anda. Berikut adalah nomor pendaftaran Anda:</p>

                    <div class="my-4 p-4 rounded-3" style="background:var(--nu-green-soft);">
                        <small class="text-muted d-block mb-1">Nomor Pendaftaran</small>
                        <h3 style="color:var(--nu-green-dark);" class="fw-bold mb-0 letter-spacing">{{ $registration->registration_number }}</h3>
                    </div>

                    <p class="text-muted small">
                        Mohon simpan nomor pendaftaran ini sebagai bukti. Tim panitia akan menghubungi melalui nomor telepon
                        <strong>{{ $registration->parent_phone }}</strong> untuk proses selanjutnya.
                    </p>

                    <div class="d-flex flex-wrap gap-2 justify-content-center mt-3">
                        <a href="{{ route('home') }}" class="btn btn-outline-success" style="color:var(--nu-green-dark);border-color:var(--nu-green-dark);">
                            <i class="bi bi-house me-1"></i> Kembali ke Beranda
                        </a>
                        <a href="{{ route('kontak.index') }}" class="btn btn-primary-pnu">
                            <i class="bi bi-chat-dots me-1"></i> Hubungi Panitia
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
