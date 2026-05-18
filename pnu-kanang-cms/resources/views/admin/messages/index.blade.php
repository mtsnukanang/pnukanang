@extends('layouts.admin')
@section('title', 'Pesan Kontak')
@section('page_title', 'Pesan Kontak')

@section('content')
<div class="card card-table">
    <div class="card-header"><i class="bi bi-envelope me-1"></i> Daftar Pesan Masuk</div>
    <div class="table-responsive">
        <table class="table table-pnu mb-0 align-middle">
            <thead><tr><th>Pengirim</th><th>Subjek</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody>
            @forelse($messages as $m)
                <tr class="{{ $m->is_read ? '' : 'fw-semibold' }}">
                    <td>{{ $m->name }}<br><small class="text-muted">{{ $m->email }}</small></td>
                    <td>{{ \Illuminate\Support\Str::limit($m->subject, 50) }}</td>
                    <td><small>{{ $m->created_at->translatedFormat('d M Y H:i') }}</small></td>
                    <td>
                        @if($m->is_read)<span class="badge bg-success">Dibaca</span>
                        @else<span class="badge bg-warning text-dark">Baru</span>@endif
                    </td>
                    <td>
                        <a href="{{ route('admin.messages.show', $m) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-eye"></i></a>
                        <form action="{{ route('admin.messages.destroy', $m) }}" method="POST" class="d-inline" data-confirm="Hapus pesan ini?">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada pesan.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body">{{ $messages->links() }}</div>
</div>
@endsection
