(function($) {
    var $window = $(window),
        $header = $('.header > nav'),
        $up_button = $('#up-button');
        
        $window.scroll(function() {
            if ($(this).scrollTop() > 220) {
                $up_button.fadeIn('fast');
            } else {
                $up_button.fadeOut('fast');
            }
        })
        
        $('[data-toggle="tooltip"]').tooltip();
        
        $up_button.click(scrollUp);
        
        $('.header ul.nav li.dropdown').hover(
            function(){ $(this).addClass('open') },
            function(){ $(this).removeClass('open') }
        );
})(jQuery);

function scrollUp() {
	$("html, body").animate({scrollTop: 0}, 200); 
	return false;
}