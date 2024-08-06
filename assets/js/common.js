// hamburger
jQuery(document).ready(function($) {
    var isAnimating = false;

    $('.header_top #js-hamburger-menu, .header_fixed #js-hamburger-menu, .header_under #js-hamburger-menu, .navigation__link').on('click', function () {
        var header = $(this).closest('header');
        if (isAnimating) return;
        if (header.find('.navigation').hasClass('is-open')) {
            closeNavigation(header);
        } else {
            openNavigation(header);
        }
    });

    $(document).on('click', function (event) {
        var target = $(event.target);
        if (!target.closest('.navigation').length && $('.navigation').hasClass('is-open') && !isAnimating) {
            closeNavigation($('.navigation').closest('header'));
        }
    });

    function openNavigation(header) {
        isAnimating = true;
        header.find('.navigation').css('right', '-100%').css('display', 'block').animate({ right: '0' }, 500, function () {
            $(this).addClass('is-open');
            if (header.hasClass('header_top')) {
                $('body').addClass('no-scroll'); // header_topの場合、スクロールを無効にする
            }
            isAnimating = false;
        });
        header.find('.hamburger-menu').addClass('hamburger-menu--open');
    }

    function closeNavigation(header) {
        isAnimating = true;
        header.find('.navigation').animate({ right: '-100%' }, 500, function () {
            $(this).removeClass('is-open').css('display', 'none');
            if (header.hasClass('header_top')) {
                $('body').removeClass('no-scroll'); // スクロールを有効に戻す
            }
            isAnimating = false;
        });
        header.find('.hamburger-menu').removeClass('hamburger-menu--open');
    }
});

// fade in up title
document.addEventListener('DOMContentLoaded', function() {
    const fadeinElements = document.querySelectorAll('.fadein_up');
    
    function checkFadeIn() {
        fadeinElements.forEach(element => {
            const rect = element.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                element.classList.add('show');
            }
        });
    }
    
    window.addEventListener('scroll', checkFadeIn);
    checkFadeIn();
});

// fade in header
window.addEventListener('scroll', function() {
    const headerFixed = document.querySelector('.header_fixed');
    if (window.scrollY >= 800) {
        headerFixed.classList.add('show');
    } else {
        headerFixed.classList.remove('show');
    }
});

// fade in page
document.addEventListener("DOMContentLoaded", function() {
    document.body.classList.add('loaded');
});

// works before after
function beforeAfterSlider() {
    const sliders = document.querySelectorAll('.js-sliderRange');
    const boxBefores = document.querySelectorAll('.js-boxBefore');
    const boxAfters = document.querySelectorAll('.box_after');

    sliders.forEach((slider, index) => {
        const sliderValue = slider.value;
        const boxBefore = boxBefores[index];
        const boxAfter = boxAfters[index];
        const beforeLabel = boxBefore.querySelector('.before-label');
        const afterLabel = boxAfter.querySelector('.after-label');

        // スライダーの値に基づいてclip-pathを変更
        boxBefore.style.clipPath = `polygon(0 0, ${sliderValue}% 0, ${sliderValue}% 100%, 0 100%)`;
        boxAfter.style.clipPath = `polygon(${sliderValue}% 0, 100% 0, 100% 100%, ${sliderValue}% 100%)`;

        // ラベルの表示を制御
        if (sliderValue < 50) {
            beforeLabel.style.opacity = 0; // BEFOREラベルを表示
            afterLabel.style.opacity = 1;  // AFTERラベルを非表示
        } else if (sliderValue > 50) {
            beforeLabel.style.opacity = 1; // BEFOREラベルを非表示
            afterLabel.style.opacity = 0;  // AFTERラベルを表示
        } else {
            beforeLabel.style.opacity = 1; // ちょうど50の時、両方のラベルを表示
            afterLabel.style.opacity = 1;
        }
    });
}

// スライダーの初期化
document.addEventListener('DOMContentLoaded', function() {
    const sliders = document.querySelectorAll('.js-sliderRange');
    sliders.forEach(slider => {
        slider.addEventListener('input', beforeAfterSlider);
        slider.addEventListener('change', beforeAfterSlider);
    });

    // 初期状態の設定
    beforeAfterSlider();
});

// top page slider
$('.scroller_inner').slick({
    autoplay: true,
    autoplaySpeed: 0,
    speed: 3000,
    slidesToShow: 5.2,
    slidesToScroll: 1,
    cssEase: "linear",
    pauseOnHover: false,
    draggable: false,
    swipe: false,
    touchMove: false,
    responsive: [
        {
            breakpoint: 1050,
            settings: {
                speed: 2000,
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 768,
            settings: {
                speed: 2000,
                slidesToShow: 2.2,
            }
        },
    ],
});