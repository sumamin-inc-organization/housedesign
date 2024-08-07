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
    if(headerFixed) {
        if (window.scrollY >= 800) {
            headerFixed.classList.add('show');
        } else {
            headerFixed.classList.remove('show');
        }
    }

});

// fade in page
document.addEventListener("DOMContentLoaded", function() {
    document.body.classList.add('loaded');
});

// works before after
$('.js-sliderRange').on('change input', function() {
    $(this).siblings(".js-boxBefore").width($(this).val() + "%");

    const $slider = $(this);
    const $boxBefore = $(this).siblings(".js-boxBefore");
    const $beforeLabel = $boxBefore.children('.before-label');
    const $afterLabel = $(this).siblings(".box_after").children('.after-label');

    // スライダーの値を取得してboxBeforeのclip範囲を変更
    const sliderValue = $slider.val();
    $boxBefore.css('clip', `rect(auto, ${sliderValue}%, auto, 0)`);

    // ラベルの表示を制御
    if (sliderValue > 50) {
        $beforeLabel.css('opacity', 1); // BEFOREラベルを表示
        $afterLabel.css('opacity', 0);  // AFTERラベルを非表示
    } else {
        $beforeLabel.css('opacity', 0); // BEFOREラベルを非表示
        $afterLabel.css('opacity', 1);  // AFTERラベルを表示
    }
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