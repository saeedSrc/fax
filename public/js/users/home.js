$(document).ready(function() {
    $('.order').click(function(e){
        event.preventDefault();
        var container = $(".chosen-package-content");
        if (container.has(e.target).length === 0)
        {
            $('.chosen-package-content').empty();
            $($(this).parent().parent().parent()).clone().appendTo(".chosen-package-content");
            $('.chosen-package-content').find('.order').html('خرید اینترنتی');
            $('.chosen-package-content').find('.fax-packages-content').css('width', '22%');
            $('.chosen-package-content').css('display', 'block');
        }
    });
    $('.chosen-package-content').click(function(e){

        var container = $(".chosen-package-content");

        if (container.has(e.target).length === 0)
        {
            container.slideToggle();
        }
    });
});