@extends('layouts.admin')

@section('title', 'Pengumuman')
@section('page_title', 'Manajemen Pengumuman')

@section('content')
<div class="card card-table">
    <div class="card-header d-flex justify-content-between">
        <span><i class="bi bi-megaphone me-1"></i> Daftar Pengumuman</span>
        <a href="{{ route('admin.announcements.create') }}" class="btn btn-sm btn-primary-pnu"><i class="bi bi-plus-lg"></i> Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-pnu mb-0 align-middle">
            <thead><tr><th>Judul</th><th>Status</th><th>Tanggal</th><th>Aksi</th></tr></thead>
            <tbody>
            @forelse($announcements as $a)
                <tr>
                    <td>{{ $a->title }}</td>
                    <td>
                        @if($a->is_active)<span class="badge bg-success">Aktif</span>
                        @else<span class="badge bg-secondary">Nonaktif</span>@endif
                    </td>
                    <td><small>{{ $a->published_at?->translatedFormat('d M Y') ?? $a->created_at->translatedFormat('d M Y') }}</small></td>
                    <td>
                        <a href="{{ route('admin.announcements.edit', $a) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.announcements.destroy', $a) }}" method="POST" class="d-inline" data-confirm="Hapus pengumuman ini?">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-muted py-4">Belum ada pengumuman.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body">{{ $announcements->links() }}</div>
</div>
@endsection
