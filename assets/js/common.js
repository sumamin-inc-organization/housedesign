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

// works before after
function beforeAfterSlider() {
    document.querySelector(".js-boxBefore").style.width = document.querySelector(".js-sliderRange").value + "%";

    const slider = document.querySelector('.js-sliderRange');
    const boxBefore = document.querySelector('.js-boxBefore');
    const beforeLabel = document.querySelector('.before-label');
    const afterLabel = document.querySelector('.after-label');

    // スライダーの値を取得してboxBeforeのclip範囲を変更
    const sliderValue = slider.value;
    boxBefore.style.clip = `rect(auto, ${sliderValue}%, auto, 0)`;

    // ラベルの表示を制御
    if (sliderValue > 50) {
        beforeLabel.style.opacity = 1; // BEFOREラベルを表示
        afterLabel.style.opacity = 0;  // AFTERラベルを非表示
    } else {
    beforeLabel.style.opacity = 0; // BEFOREラベルを非表示
    afterLabel.style.opacity = 1;  // AFTERラベルを表示
    }
}

// fade in page
document.addEventListener("DOMContentLoaded", function() {
document.body.classList.add('loaded');
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