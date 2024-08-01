jQuery(document).ready(function($) {
    setTimeout(function() {
        $('.loading__img').fadeIn(1000);
    }, 300);
    setTimeout(function() {
        $('.loading__img').fadeOut(500);
    }, 2000);
    setTimeout(function() {
        $('#loading').fadeOut(1000);
    }, 2200);
    setTimeout(function() {
        var videos = $('video');
        $(videos).each(function() {
            console.log("start");
            var video = $(this).get(0);
            video.currentTime = 0;
            video.play();
        });
    }, 2400);
});