
document.addEventListener('DOMContentLoaded', () => {
    const gallery = [...document.querySelectorAll('.documentation-image')];
    const lightbox = document.getElementById('galleryLightbox');

    if (!gallery.length || !lightbox) return;

    const image = document.getElementById('lightboxImage');
    const caption = document.getElementById('lightboxCaption');

    let currentIndex = 0;

    function showImage(index) {
        currentIndex = (index + gallery.length) % gallery.length;

        const thumbnail = gallery[currentIndex].querySelector('img');
        const captionText =
            gallery[currentIndex].querySelector('.image-caption')?.textContent.trim() || '';

        image.src = thumbnail.src;
        image.alt = thumbnail.alt;
        caption.textContent = captionText;
    }

    function openLightbox(index) {
        showImage(index);
        lightbox.classList.add('is-open');
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('is-open');
        lightbox.setAttribute('aria-hidden', 'true');
        image.src = '';
        document.body.style.overflow = '';
    }

    gallery.forEach((item, index) => {
        item.addEventListener('click', () => openLightbox(index));
    });

    lightbox.querySelector('.gallery-close')
        .addEventListener('click', closeLightbox);

    lightbox.querySelector('.gallery-prev')
        .addEventListener('click', () => showImage(currentIndex - 1));

    lightbox.querySelector('.gallery-next')
        .addEventListener('click', () => showImage(currentIndex + 1));

    lightbox.addEventListener('click', (event) => {
        if (event.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', (event) => {
        if (!lightbox.classList.contains('is-open')) return;

        if (event.key === 'Escape') closeLightbox();
        if (event.key === 'ArrowLeft') showImage(currentIndex - 1);
        if (event.key === 'ArrowRight') showImage(currentIndex + 1);
    });
});
