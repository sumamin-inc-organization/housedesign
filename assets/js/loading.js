jQuery(document).ready(function($) {
    if (window.matchMedia('(min-width: 768px)').matches) {
        setTimeout(function() {
            $('.loading__img').fadeIn(1000);
        }, 300);
        setTimeout(function() {
            $('.loading__img').fadeOut(800);
        }, 1900);
        setTimeout(function() {
            $('#loading').fadeOut(1200);
        }, 2400);
        setTimeout(function() {
            var videos = $('video');
            $(videos).each(function() {
                console.log("start");
                var video = $(this).get(0);
                video.currentTime = 0;
                video.play();
            });
        }, 2600);
    }
});

jQuery(window).on('load', function() {
    if (window.matchMedia('(max-width: 767px)').matches) {
        setTimeout(function() {
            $('.loading__img').fadeIn(1000);
        }, 300);
        setTimeout(function() {
            $('.loading__img').fadeOut(800);
        }, 1900);
        setTimeout(function() {
            $('#loading').fadeOut(1200);
        }, 2400);
        setTimeout(function() {
            var videos = $('video');
            $(videos).each(function() {
                console.log("start");
                var video = $(this).get(0);
                video.currentTime = 0;
                video.play();
            });
        }, 2600);
    }
});