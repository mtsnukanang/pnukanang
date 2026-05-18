<div class="topbar">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
        <div class="d-none d-md-flex gap-3 align-items-center">
            <span><i class="bi bi-geo-alt-fill"></i> {{ $siteSettings['address'] ?? 'Kanang, Polewali Mandar, Sulawesi Barat' }}</span>
            <span><i class="bi bi-telephone-fill"></i> {{ $siteSettings['phone'] ?? '0812-3456-7890' }}</span>
        </div>
        <div class="d-flex gap-3 align-items-center">
            <a href="mailto:{{ $siteSettings['email'] ?? 'info@pnukanang.local' }}"><i class="bi bi-envelope-fill"></i> {{ $siteSettings['email'] ?? 'info@pnukanang.local' }}</a>
            <a href="https://wa.me/{{ preg_replace('/\D/', '', $siteSettings['whatsapp'] ?? '6281234567890') }}" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i> WhatsApp</a>
        </div>
    </div>
</div>
