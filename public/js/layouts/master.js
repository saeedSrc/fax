$(document).ready(function(){
    var path = window.location.pathname;
    $(".right-nav nav ul li a[href='"+path+"']").addClass("active");
});