(() => {
    const dialog = document.querySelector('.evidence-lightbox');
    if (!dialog) return;

    const image = dialog.querySelector('.evidence-lightbox-image');
    const caption = dialog.querySelector('.evidence-lightbox-caption');
    const close = dialog.querySelector('.evidence-lightbox-close');

    document.querySelectorAll('[data-preview-src]').forEach(button => {
        button.addEventListener('click', () => {
            image.src = button.dataset.previewSrc;
            image.alt = button.dataset.previewCaption;
            caption.textContent = button.dataset.previewCaption;
            dialog.showModal();
        });
    });

    close.addEventListener('click', () => dialog.close());

    dialog.addEventListener('click', event => {
        if (event.target === dialog) dialog.close();
    });

    dialog.addEventListener('close', () => {
        image.removeAttribute('src');
    });
})();