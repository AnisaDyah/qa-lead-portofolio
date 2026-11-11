(() => {
  const toggle = document.querySelector('.nav-toggle');
  const nav = document.querySelector('.primary-nav');
  if (toggle && nav) toggle.addEventListener('click', () => {
    const open = toggle.getAttribute('aria-expanded') !== 'true';
    toggle.setAttribute('aria-expanded', String(open));
    nav.classList.toggle('is-open', open);
  });
  document.querySelectorAll('.nav-dropdown-trigger').forEach(button => {
    button.addEventListener('click', () => {
      const open = button.getAttribute('aria-expanded') !== 'true';
      button.setAttribute('aria-expanded', String(open));
      button.nextElementSibling.classList.toggle('is-open', open);
    });
  });
  document.querySelectorAll('[data-filter]').forEach(button => {
    button.addEventListener('click', () => {
      const filter = button.dataset.filter;
      document.querySelectorAll('[data-filter]').forEach(b => b.classList.toggle('selected', b === button));
      document.querySelectorAll('[data-project-category]').forEach(card => {
        card.hidden = filter !== 'all' && card.dataset.projectCategory !== filter;
      });
    });
  });
})();
