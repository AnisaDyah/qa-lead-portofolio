document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('[data-filter]');
    const cards = document.querySelectorAll('[data-category]');

    buttons.forEach((button) => {
        button.addEventListener('click', () => {
            const filter = button.dataset.filter;
            buttons.forEach((item) => item.classList.toggle('is-selected', item === button));
            cards.forEach((card) => {
                card.hidden = filter !== 'all' && card.dataset.category !== filter;
            });
        });
    });
});
