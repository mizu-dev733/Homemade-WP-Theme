document.addEventListener('DOMContentLoaded', function () {
    var main = new Splide('#splide-slider', {
        type   : 'fade',
        heightRatio: 0.667,
        pagination: false,
        arrows: true,
    }).mount();

    var thumbnails = new Splide('#splide-thumbnails', {
        fixedWidth: '160px',
        fixedHeight: '100px',
        isNavigation: true,
        gap         : 20,
        focus       : 'center',
        pagination  : false,
        cover: true,
        arrows: false,
        breakpoints: {
            768: {
                fixedWidth: '100px',
                fixedHeight: '67px',
                gap: 10,
            },
        }
        
    }).mount();

    main.sync(thumbnails);
});