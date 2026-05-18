@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Ringkasan data CMS Pondok Pesantren Nahdlatul Ummah Kanang')

@section('content')

<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center">
                <div class="icon bg-soft-green me-3"><i class="bi bi-newspaper"></i></div>
                <div>
                    <div class="text-muted small">Total Berita</div>
                    <div class="h4 mb-0">{{ number_format($stats['news']) }}</div>
                    <small class="text-success">{{ $stats['news_published'] }} dipublikasi</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center">
                <div class="icon bg-soft-gold me-3"><i class="bi bi-megaphone"></i></div>
                <div>
                    <div class="text-muted small">Pengumuman</div>
                    <div class="h4 mb-0">{{ number_format($stats['announcements']) }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center">
                <div class="icon bg-soft-blue me-3"><i class="bi bi-images"></i></div>
                <div>
                    <div class="text-muted small">Galeri Foto</div>
                    <div class="h4 mb-0">{{ number_format($stats['galleries']) }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center">
                <div class="icon bg-soft-red me-3"><i class="bi bi-pencil-square"></i></div>
                <div>
                    <div class="text-muted small">Pendaftar</div>
                    <div class="h4 mb-0">{{ number_format($stats['registrations']) }}</div>
                    <small class="text-warning">{{ $stats['registrations_new'] }} baru</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center">
                <div class="icon bg-soft-green me-3"><i class="bi bi-envelope"></i></div>
                <div>
                    <div class="text-muted small">Pesan Kontak</div>
                    <div class="h4 mb-0">{{ number_format($stats['messages']) }}</div>
                    <small class="text-warning">{{ $stats['messages_unread'] }} belum dibaca</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center">
                <div class="icon bg-soft-gold me-3"><i class="bi bi-graph-up"></i></div>
                <div class="flex-grow-1">
                    <div class="text-muted small">Aksi Cepat</div>
                    <div class="d-flex flex-wrap gap-2 mt-1">
                        <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-primary-pnu"><i class="bi bi-plus-lg"></i> Berita Baru</a>
                        <a href="{{ route('admin.announcements.create') }}" class="btn btn-sm btn-outline-success"><i class="bi bi-plus-lg"></i> Pengumuman</a>
                        <a href="{{ route('admin.galleries.create') }}" class="btn btn-sm btn-outline-success"><i class="bi bi-plus-lg"></i> Foto Galeri</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-lg-7">
        <div class="card card-table">
            <div class="card-header">Pendaftar Terbaru</div>
            <div class="table-responsive">
                <table class="table table-pnu mb-0 align-middle">
                    <thead><tr>
                        <th>No. Pendaftaran</th><th>Nama</th><th>Status</th><th>Tanggal</th><th></th>
                    </tr></thead>
                    <tbody>
                    @forelse($latestRegistrations as $r)
                        <tr>
                            <td><code>{{ $r->registration_number }}</code></td>
                            <td>{{ $r->full_name }}</td>
                            <td><span class="badge badge-status-{{ $r->status }}" style="background:var(--nu-green-dark);color:#fff;">{{ \App\Models\StudentRegistration::STATUSES[$r->status] }}</span></td>
                            <td><small>{{ $r->created_at->translatedFormat('d M Y') }}</small></td>
                            <td><a href="{{ route('admin.registrations.show', $r) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-eye"></i></a></td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-3">Belum ada pendaftar.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card card-table">
            <div class="card-header">Pesan Terbaru</div>
            <div class="table-responsive">
                <table class="table table-pnu mb-0 align-middle">
                    <thead><tr><th>Pengirim</th><th>Subjek</th><th></th></tr></thead>
                    <tbody>
                    @forelse($latestMessages as $m)
                        <tr class="{{ $m->is_read ? '' : 'fw-semibold' }}">
                            <td>{{ $m->name }}<br><small class="text-muted">{{ $m->email }}</small></td>
                            <td>{{ \Illuminate\Support\Str::limit($m->subject, 40) }}</td>
                            <td><a href="{{ route('admin.messages.show', $m) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-eye"></i></a></td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center text-muted py-3">Belum ada pesan.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
