window.addEventListener("load", function () {
  const loading = document.getElementById("loading");

  // アニメーション終了後に非表示にする
  loading.addEventListener("animationend", function () {
    loading.style.opacity = "0";
    setTimeout(() => {
      loading.style.display = "none";
    }, 1500);
  });
});

document.addEventListener('DOMContentLoaded', () => {

    // hamburger
    const toggleButton = document.querySelector('.l-nav-btn'); 
    const navigation = document.querySelector('#nav'); 
    if (toggleButton && navigation) {
        toggleButton.addEventListener('click', () => {
            const isExpanded = toggleButton.getAttribute('aria-expanded') === 'true';
            toggleButton.setAttribute('aria-expanded', !isExpanded);
            navigation.classList.toggle('is-active');
        });
    }

    //スクロールイン
    const elements = document.querySelectorAll('.js-scroll-in');
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-scroll');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });
    elements.forEach(element => observer.observe(element));




});

// ページ内リンクのスムーズスクロール
document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault();

        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);

        if (targetElement) {
            const position = targetElement.offsetTop;
            window.scrollTo({
                top: position,
                behavior: 'smooth'
            });
        }
    });
});