document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');

    if (toggle && sidebar) {
        toggle.addEventListener('click', () => {
            sidebar.classList.toggle('is-open');
        });
    }

    document.addEventListener('click', (event) => {
        if (sidebar && toggle && window.innerWidth <= 680 &&
            !sidebar.contains(event.target) && !toggle.contains(event.target)) {
            sidebar.classList.remove('is-open');
        }
    });
});
