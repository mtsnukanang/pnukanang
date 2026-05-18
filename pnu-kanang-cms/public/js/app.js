// PNU Kanang CMS - frontend JS

document.addEventListener('DOMContentLoaded', () => {
    // Lightbox-lite for galleries
    document.querySelectorAll('[data-lightbox-image]').forEach((el) => {
        el.addEventListener('click', (e) => {
            e.preventDefault();
            const src = el.getAttribute('data-lightbox-image');
            const title = el.getAttribute('data-lightbox-title') || '';
            openLightbox(src, title);
        });
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach((a) => {
        a.addEventListener('click', (e) => {
            const id = a.getAttribute('href');
            if (id.length > 1) {
                const target = document.querySelector(id);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });

    // Auto-dismiss alerts after 6s
    document.querySelectorAll('.alert.auto-dismiss').forEach((alert) => {
        setTimeout(() => {
            alert.style.transition = 'opacity .4s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 400);
        }, 6000);
    });
});

function openLightbox(src, title) {
    const wrap = document.createElement('div');
    wrap.className = 'pnu-lightbox';
    wrap.innerHTML = `
        <div class="pnu-lightbox-inner">
            <button type="button" class="pnu-lightbox-close" aria-label="Tutup">&times;</button>
            <img src="${src}" alt="${title}">
            ${title ? `<div class="pnu-lightbox-title">${title}</div>` : ''}
        </div>
    `;
    Object.assign(wrap.style, {
        position: 'fixed', inset: '0', background: 'rgba(0,0,0,.85)',
        display: 'flex', alignItems: 'center', justifyContent: 'center',
        zIndex: '1080', padding: '1rem',
    });
    const inner = wrap.querySelector('.pnu-lightbox-inner');
    Object.assign(inner.style, {
        position: 'relative', maxWidth: '90vw', maxHeight: '90vh', textAlign: 'center', color: '#fff',
    });
    const img = wrap.querySelector('img');
    Object.assign(img.style, {
        maxWidth: '100%', maxHeight: '80vh', borderRadius: '10px', boxShadow: '0 12px 30px rgba(0,0,0,.4)',
    });
    const closeBtn = wrap.querySelector('.pnu-lightbox-close');
    Object.assign(closeBtn.style, {
        position: 'absolute', top: '-44px', right: '-4px', background: 'transparent', border: 'none',
        color: '#fff', fontSize: '2rem', cursor: 'pointer',
    });
    const titleEl = wrap.querySelector('.pnu-lightbox-title');
    if (titleEl) Object.assign(titleEl.style, { marginTop: '.6rem', fontSize: '1rem' });

    const close = () => wrap.remove();
    closeBtn.addEventListener('click', close);
    wrap.addEventListener('click', (e) => { if (e.target === wrap) close(); });
    document.addEventListener('keydown', function escHandler(e) {
        if (e.key === 'Escape') { close(); document.removeEventListener('keydown', escHandler); }
    });

    document.body.appendChild(wrap);
}
