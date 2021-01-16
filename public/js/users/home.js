$(document).ready(function() {


    $('.order').click(function(e){

        var container = $(".chosen-package-content");

        if (container.has(e.target).length === 0)
        {
            console.log("inja");
            container.slideToggle();
        }
    });

    $('.chosen-package-content').click(function(e){

        var container = $(".chosen-package-content");

        if (container.has(e.target).length === 0)
        {
            console.log("inja");
            container.slideToggle();
        }
    });
});