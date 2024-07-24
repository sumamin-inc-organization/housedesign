// smooch scroll
const headerHeight = document.querySelector('header').offsetHeight;
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const href = anchor.getAttribute('href');
        const target = document.getElementById(href.replace('#', ''));
        const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
        window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
        });
    });
});

// hamburger
$(function () {
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
            $(this).removeClass('is-open');
        });
        $('.hamburger-menu').removeClass('hamburger-menu--open');
    }
});