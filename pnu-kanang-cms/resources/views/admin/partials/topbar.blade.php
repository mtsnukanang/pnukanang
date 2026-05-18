<header class="admin-topbar">
    <div class="d-flex align-items-center gap-2">
        <button type="button" class="toggle-btn"><i class="bi bi-list"></i></button>
        <div>
            <div class="fw-bold" style="color:var(--nu-green-dark);">@yield('page_title', 'Dashboard')</div>
            <small class="text-muted">@yield('page_subtitle', 'Panel Admin Pondok Pesantren Nahdlatul Ummah Kanang')</small>
        </div>
    </div>
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('home') }}" target="_blank" rel="noopener" class="text-decoration-none small d-none d-md-inline" style="color:var(--nu-green-dark);">
            <i class="bi bi-globe me-1"></i> Lihat Website
        </a>
        <div class="user-block">
            <div class="avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
            <div class="d-none d-sm-block lh-sm">
                <div>{{ auth()->user()->name }}</div>
                <small class="text-muted">{{ auth()->user()->email }}</small>
            </div>
        </div>
    </div>
</header>
