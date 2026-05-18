@extends('layouts.admin')
@section('title', 'Detail Pesan')
@section('page_title', 'Detail Pesan')

@section('content')
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card card-table p-4">
            <h5 class="mb-1" style="color:var(--nu-green-dark);">{{ $message->subject }}</h5>
            <small class="text-muted">{{ $message->created_at->translatedFormat('d F Y, H:i') }}</small>
            <hr>
            <p><strong>Dari:</strong> {{ $message->name }} &lt;{{ $message->email }}&gt;</p>
            @if($message->phone)<p><strong>Telepon:</strong> {{ $message->phone }}</p>@endif
            <hr>
            <div class="prose">{!! nl2br(e($message->message)) !!}</div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card card-table p-4">
            <h6 class="mb-3"><i class="bi bi-tools me-1"></i> Aksi</h6>
            <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="btn btn-primary-pnu w-100 mb-2">
                <i class="bi bi-reply me-1"></i> Balas Email
            </a>
            @if($message->phone)
                <a href="https://wa.me/{{ preg_replace('/\D/', '', $message->phone) }}" target="_blank" class="btn btn-outline-success w-100 mb-2">
                    <i class="bi bi-whatsapp me-1"></i> Balas WhatsApp
                </a>
            @endif
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="mb-2" data-confirm="Hapus pesan ini?">
                @csrf @method('DELETE')
                <button class="btn btn-outline-danger w-100"><i class="bi bi-trash me-1"></i> Hapus</button>
            </form>
            <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary w-100">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
