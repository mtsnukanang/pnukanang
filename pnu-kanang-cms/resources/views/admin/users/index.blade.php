@extends('layouts.admin')
@section('title', 'User Admin')
@section('page_title', 'Manajemen User Admin')

@section('content')
<div class="card card-table">
    <div class="card-header d-flex justify-content-between">
        <span><i class="bi bi-people me-1"></i> Daftar Pengguna Admin</span>
        <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary-pnu"><i class="bi bi-plus-lg"></i> Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-pnu mb-0 align-middle">
            <thead><tr><th>Nama</th><th>Email</th><th>Peran</th><th>Bergabung</th><th>Aksi</th></tr></thead>
            <tbody>
            @forelse($users as $u)
                <tr>
                    <td><strong>{{ $u->name }}</strong></td>
                    <td>{{ $u->email }}</td>
                    <td>
                        @if($u->is_admin)<span class="badge bg-success">Admin</span>
                        @else<span class="badge bg-secondary">User</span>@endif
                    </td>
                    <td><small>{{ $u->created_at->translatedFormat('d M Y') }}</small></td>
                    <td>
                        <a href="{{ route('admin.users.edit', $u) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-pencil"></i></a>
                        @if($u->id !== auth()->id())
                            <form action="{{ route('admin.users.destroy', $u) }}" method="POST" class="d-inline" data-confirm="Hapus pengguna '{{ $u->name }}'?">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada pengguna.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body">{{ $users->links() }}</div>
</div>
@endsection
