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


// column category
document.addEventListener('DOMContentLoaded', function() {
    var buttons = document.querySelectorAll('.category_btn');
    var items = document.querySelectorAll('.column_item');

    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            var category = this.getAttribute('data-category');

            items.forEach(function(item) {
                var itemCategories = item.getAttribute('data-category').split(' ');
                if (category === 'all') {
                    item.style.display = 'block';
                } else {
                    var match = itemCategories.includes(category);
                    item.style.display = match ? 'block' : 'none';
                }
            });
        });
    });
});
