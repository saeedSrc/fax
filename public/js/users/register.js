$(document).ready(function() {
    var timer2 = "00:05";
    var interval = setInterval(function() {
        var timer = timer2.split(':');
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
        timer2 = minutes + ':' + seconds;
    }, 1000);
});