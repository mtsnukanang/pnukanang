@extends('layouts.admin')
@section('title', 'Program')
@section('page_title', 'Manajemen Program')

@section('content')
<div class="card card-table">
    <div class="card-header d-flex justify-content-between">
        <span><i class="bi bi-mortarboard me-1"></i> Daftar Program</span>
        <a href="{{ route('admin.programs.create') }}" class="btn btn-sm btn-primary-pnu"><i class="bi bi-plus-lg"></i> Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-pnu mb-0 align-middle">
            <thead><tr>
                <th style="width:60px;">Icon</th><th>Nama</th><th>Urutan</th><th>Status</th><th>Aksi</th>
            </tr></thead>
            <tbody>
            @forelse($programs as $p)
                <tr>
                    <td><div class="icon bg-soft-green" style="width:40px;height:40px;border-radius:10px;display:inline-flex;align-items:center;justify-content:center;"><i class="bi {{ $p->icon }}"></i></div></td>
                    <td><strong>{{ $p->name }}</strong></td>
                    <td>{{ $p->order }}</td>
                    <td>@if($p->is_active)<span class="badge bg-success">Aktif</span>@else<span class="badge bg-secondary">Nonaktif</span>@endif</td>
                    <td>
                        <a href="{{ route('admin.programs.edit', $p) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.programs.destroy', $p) }}" method="POST" class="d-inline" data-confirm="Hapus program '{{ $p->name }}'?">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada program.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body">{{ $programs->links() }}</div>
</div>
@endsection
