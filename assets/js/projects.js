document.addEventListener('DOMContentLoaded', () => {
    const filters = [...document.querySelectorAll('[data-project-filter]')];
    const cards = [...document.querySelectorAll('[data-project-card]')];
    const search = document.getElementById('projectSearch');
    const empty = document.getElementById('projectsNoResults');
    let activeFilter = 'all';
    const applyFilters = () => {
        const query = (search?.value || '').trim().toLowerCase();
        let visible = 0;
        cards.forEach(card => {
            const matchesCategory = activeFilter === 'all' || card.dataset.category === activeFilter;
            const matchesSearch = !query || (card.dataset.search || '').includes(query);
            card.hidden = !(matchesCategory && matchesSearch);
            if (!card.hidden) visible++;
        });
        if (empty) empty.hidden = visible !== 0;
    };
    filters.forEach(button => button.addEventListener('click', () => {
        activeFilter = button.dataset.projectFilter || 'all';
        filters.forEach(item => item.classList.toggle('is-active', item === button));
        applyFilters();
    }));
    search?.addEventListener('input', applyFilters);
});
