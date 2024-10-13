(function($) {
    'use strict';

    // Add your custom JavaScript here
    $(document).ready(function() {
        // Example: Add a scroll-to-top button
        var $scrollToTop = $('<a href="#" id="scroll-to-top" class="scroll-to-top"><i class="fas fa-chevron-up"></i></a>');
        $('body').append($scrollToTop);

        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $scrollToTop.fadeIn();
            } else {
                $scrollToTop.fadeOut();
            }
        });

        $scrollToTop.click(function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop: 0}, 800);
        });
    });

})(jQuery);