document.addEventListener('scroll', () => {
    const items = document.querySelectorAll('.p-service-info__item');
    const pictures = document.querySelectorAll('.p-service-intro__picture');

    let activeIndex = -1;

    items.forEach((item, index) => {
        const rect = item.getBoundingClientRect();

        if (rect.top < window.innerHeight / 2 && rect.bottom > window.innerHeight / 2) {
            activeIndex = index; 
        }
    });

    pictures.forEach((picture, index) => {
        if (index === activeIndex) {
            picture.classList.add('is-active');
        } else {
            picture.classList.remove('is-active');
        }
    });
});