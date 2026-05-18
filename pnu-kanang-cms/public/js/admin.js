// PNU Kanang CMS - admin panel JS

document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.querySelector('.admin-sidebar');
    const toggleBtn = document.querySelector('.toggle-btn');
    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', () => sidebar.classList.toggle('show'));
    }

    // Confirm delete forms
    document.querySelectorAll('form[data-confirm]').forEach((form) => {
        form.addEventListener('submit', (e) => {
            const message = form.getAttribute('data-confirm') || 'Anda yakin?';
            if (!confirm(message)) e.preventDefault();
        });
    });

    // Auto dismiss alerts
    document.querySelectorAll('.alert.auto-dismiss').forEach((alert) => {
        setTimeout(() => {
            alert.style.transition = 'opacity .4s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 400);
        }, 5000);
    });
});
