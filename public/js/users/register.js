$(document).ready(function() {
    var baseTime = $('.countdown').html();
    var interval = setInterval(function () {
        var timer = baseTime.split(':');
        //by parsing integer, I avoid all extra string processing
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes < 0) clearInterval(interval);
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        if (minutes + seconds >= 0 && minutes >= 0) {
            $('.countdown').html(minutes + ':' + seconds);
        } else {
            $('.authorize').css("display", "none");
            $('.re-authorize').css("display", "block");
        }
        baseTime = minutes + ':' + seconds;
    }, 1000);

    $('.loading').hide();
});
