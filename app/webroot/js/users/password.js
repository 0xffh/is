(function($) {
    $(document).ready(function() {
        var input = $('#UserPassword');
        var button = input.next('span');
        var icon = button.children('span');
        button.click(function() {
            var hasClass = icon.hasClass('glyphicon-eye-open');
    
            if (hasClass) {
                input.attr("type", "text");
                icon.removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
            } else {
                input.attr("type", "password");
                icon.removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
            }
        });
    });
})(jQuery);