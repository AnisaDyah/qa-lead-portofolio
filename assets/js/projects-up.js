document.addEventListener('DOMContentLoaded', () => {
    const workspace = document.querySelector('.projects-workspace');
    if (!workspace) return;

    const tabs = workspace.querySelectorAll('[data-role-tab]');
    const panels = workspace.querySelectorAll('[data-role-panel]');

    tabs.forEach((tab) => tab.addEventListener('click', () => {
        const role = tab.dataset.roleTab;
        tabs.forEach((item) => {
            const active = item === tab;
            item.classList.toggle('is-active', active);
            item.setAttribute('aria-selected', String(active));
        });
        panels.forEach((panel) => {
            const active = panel.dataset.rolePanel === role;
            panel.hidden = !active;
            panel.classList.toggle('is-active', active);
        });
    }));

    panels.forEach((panel) => {
        const filters = panel.querySelectorAll('[data-project-filter]');
        const cards = panel.querySelectorAll('[data-project-card]');
        const empty = panel.querySelector('.projects-empty-state');

        filters.forEach((button) => button.addEventListener('click', () => {
            const filter = button.dataset.projectFilter;
            let visible = 0;
            filters.forEach((item) => item.classList.toggle('is-active', item === button));
            cards.forEach((card) => {
                const show = filter === 'all' || card.dataset.projectCategory === filter;
                card.hidden = !show;
                if (show) visible++;
            });
            if (empty) empty.hidden = visible !== 0;
        }));

        panel.querySelectorAll('.project-expand-button').forEach((button) => {
            button.addEventListener('click', () => {
                const details = button.closest('.project-showcase-card')?.querySelector('.project-expanded-details');
                if (!details) return;
                const expanded = button.getAttribute('aria-expanded') === 'true';
                button.setAttribute('aria-expanded', String(!expanded));
                details.hidden = expanded;
            });
        });
    });
});
