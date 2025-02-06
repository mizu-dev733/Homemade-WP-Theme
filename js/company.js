document.addEventListener('DOMContentLoaded', function () {

    const target = '#company-slide';
    const options = {
        type: 'loop',
        perPage: 3.5,
        focus: "center",
        drag: false,
        pauseOnHover: false,
        arrows: false,
        pagination: false,
        autoScroll: {
            speed: 0.6,
            pauseOnHover: false,
            pauseOnFocus: false,
          },
        gap: 20,
        breakpoints: {
            768: {
                perPage: 1.5,
                gap: 20,
            },
        }
    }
    
    const companySplide = new Splide(target, options);
    companySplide.mount(window.splide.Extensions);
});