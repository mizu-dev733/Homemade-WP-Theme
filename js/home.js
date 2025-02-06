document.addEventListener('DOMContentLoaded', () => {
    // Splide.js の初期化
    const splideElement1 = document.querySelector('#mv');
    if (splideElement1) {
        new Splide('#mv', {
            type: 'fade',
            perPage: 1,
            autoplay: true,
            interval: 5000,
            speed: 3000,
            pauseOnHover: false,
            arrows: false,
            pagination: true,
            rewind: true,
            drag: false,
        }).mount();
    }

    const splideElement2 = document.querySelector('#works-slide');
    if (splideElement2) {
        new Splide('#works-slide', {
            type: 'loop',
            perPage: 1.5,
            perMove: 1,
            clones: 5,
            autoplay: true,
            interval: 5000,
            speed: 4000,
            focus: "center",
            pauseOnHover: false,
            arrows: false,
            pagination: false,
            gap: 44,
            rewind: true,
            breakpoints: {
                768: {
                    perPage: 1.3,
                    gap: 30,
                },
            }
        }).mount();
    }
});

//お知らせタブ切り替え
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.p-home-news__tab');
    const categoryLists = document.querySelectorAll('.p-home-news__category-list');

    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            const category = tab.getAttribute('data-category');

            tabs.forEach(function(t) {
                t.classList.remove('is-active');
            });
            tab.classList.add('is-active');

            // カテゴリリストの表示切り替え
            categoryLists.forEach(function(list) {
                list.classList.remove('is-active'); 
                if (category === 'all') {
                    if (list.classList.contains('js-all-posts')) {
                        list.classList.add('is-active');
                    }
                } else {
                    if (list.classList.contains('js-' + category + '-posts')) {
                        list.classList.add('is-active');
                    }
                }
            });
        });
    });

    // 初期表示: 「ALL」をクリック状態にして表示する
    document.querySelector('.p-home-news__tab[data-category="all"]').click();
});

// 事業紹介切り替え
document.addEventListener('DOMContentLoaded', () => {
    const listItems = document.querySelectorAll('.p-home-service__item');
    const infoBlocks = document.querySelectorAll('.p-home-service__info');

    listItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            const targetId = item.getAttribute('data-target');
            
            listItems.forEach(listItem => {
                listItem.classList.remove('is-active');
            });

            infoBlocks.forEach(info => {
                info.classList.remove('is-active');
            });

            const targetInfo = document.getElementById(`${targetId}`);
            if (targetInfo) {
                targetInfo.classList.add('is-active');
            }
            item.classList.add('is-active');
        });
    });
});