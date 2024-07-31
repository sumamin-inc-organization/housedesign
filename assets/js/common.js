// hamburger
jQuery(document).ready(function($) {
    $('.header_top #js-hamburger-menu, .header_fixed #js-hamburger-menu, .navigation__link').on('click', function () {
        var header = $(this).closest('header');
        if (header.find('.navigation').hasClass('is-open')) {
            closeNavigation(header);
        } else {
            openNavigation(header);
        }
    });
    $(document).on('click', function (event) {
        var target = $(event.target);
        if (!target.closest('.navigation').length && $('.navigation').hasClass('is-open')) {
            closeNavigation();
        }
    });
    function openNavigation(header) {
        header.find('.navigation').css('right', '-100%').css('display', 'block').animate({ right: '0' }, 500, function () {
            $(this).addClass('is-open');
            if (header.hasClass('header_top')) {
                $('body').addClass('no-scroll'); // header_topの場合、スクロールを無効にする
            }
        });
        header.find('.hamburger-menu').addClass('hamburger-menu--open');
    }
    function closeNavigation() {
        $('.navigation').animate({ right: '-100%' }, 500, function () {
            $(this).removeClass('is-open').css('display', 'none');
            $('body').removeClass('no-scroll'); // スクロールを有効に戻す
        });
        $('.hamburger-menu').removeClass('hamburger-menu--open');
    }
});

// fade in up
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

function beforeAfterSlider() {
    document.getElementById("js-boxBefore").style.width = document.getElementById("js-sliderRange").value + "%";
}

$('.scroller_inner').slick({
    autoplay: true,
    autoplaySpeed: 0,
    speed: 1500,
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