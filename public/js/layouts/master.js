$(document).ready(function(){
    var path = window.location.pathname;
    $(".right-nav nav ul li a[href='"+path+"']").addClass("active");

    $('.persian-time').each(function() {
        var htmlTime = $( this ).text();
        var arrayTime = htmlTime.split(" ");
        var date = arrayTime[1];
        var time= arrayTime[0];
        var dateToSend = new Date(date.split('-')[2] + "/" + date.split('-')[1] + "/" + date.split('-')[0] );
        var persianDate = dateToSend.toLocaleDateString('fa-IR');
        $( this ).html(time + " " + persianDate );
    });
});