@extends('layouts.admin')
@section('title', 'Pendaftaran Santri')
@section('page_title', 'Pendaftaran Santri Baru')

@section('content')
<div class="card card-table">
    <div class="card-header d-flex justify-content-between flex-wrap gap-2">
        <span><i class="bi bi-pencil-square me-1"></i> Daftar Pendaftar</span>
        <div class="d-flex gap-2">
            <form method="GET" class="d-flex gap-2">
                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                    <option value="">Semua status</option>
                    @foreach(\App\Models\StudentRegistration::STATUSES as $key => $label)
                        <option value="{{ $key }}" @selected(request('status')===$key)>{{ $label }}</option>
                    @endforeach
                </select>
                <input type="text" name="q" value="{{ request('q') }}" class="form-control form-control-sm" placeholder="Cari nama / nomor...">
                <button class="btn btn-sm btn-primary-pnu"><i class="bi bi-search"></i></button>
            </form>
            <a href="{{ route('admin.registrations.export') }}" class="btn btn-sm btn-outline-success"><i class="bi bi-download me-1"></i> Export CSV</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-pnu mb-0 align-middle">
            <thead><tr>
                <th>No. Pendaftaran</th><th>Nama</th><th>L/P</th><th>Program</th><th>Status</th><th>Tanggal</th><th>Aksi</th>
            </tr></thead>
            <tbody>
            @forelse($registrations as $r)
                <tr>
                    <td><code>{{ $r->registration_number }}</code></td>
                    <td>{{ $r->full_name }}<br><small class="text-muted">{{ $r->parent_phone }}</small></td>
                    <td>{{ $r->gender }}</td>
                    <td>{{ $r->program ?: '-' }}</td>
                    <td>
                        @php $colors = ['baru'=>'warning','diproses'=>'info','diterima'=>'success','ditolak'=>'danger']; @endphp
                        <span class="badge bg-{{ $colors[$r->status] ?? 'secondary' }}">{{ \App\Models\StudentRegistration::STATUSES[$r->status] }}</span>
                    </td>
                    <td><small>{{ $r->created_at->translatedFormat('d M Y H:i') }}</small></td>
                    <td>
                        <a href="{{ route('admin.registrations.show', $r) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-eye"></i></a>
                        <form action="{{ route('admin.registrations.destroy', $r) }}" method="POST" class="d-inline" data-confirm="Hapus data pendaftaran ini?">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada pendaftar.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body">{{ $registrations->links() }}</div>
</div>
@endsection
