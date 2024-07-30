// hamburger
jQuery(document).ready(function($) {
    $('#js-hamburger-menu, .navigation__link').on('click', function () {
        if ($('.navigation').hasClass('is-open')) {
            closeNavigation();
        } else {
            openNavigation();
        }
    });
    $(document).on('click', function (event) {
        var target = $(event.target);
        if (!target.closest('.navigation').length && $('.navigation').hasClass('is-open')) {
            closeNavigation();
        }
    });
    function openNavigation() {
        $('.navigation').css('right', '-100%').css('display', 'block').animate({ right: '0' }, 500, function () {
            $(this).addClass('is-open');
        });
        $('.hamburger-menu').addClass('hamburger-menu--open');
    }
    function closeNavigation() {
        $('.navigation').animate({ right: '-100%' }, 500, function () {
            $(this).removeClass('is-open').css('display', 'none');
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
