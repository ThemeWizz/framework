/**
 * Portfolio
 */
(function($) {
	"use strict";

    $(document).ready(function(){
        $('#wizz-profile-menu a').click(function(e) {
            e.preventDefault();
            
            $('#wizz-profile-menu a').removeClass('active');
            $(this).addClass('active');

            var category = $(this).data('category');
            var $li = $('#wizz-portfolio li');

            if (category === 'all') {
                $li.show().addClass('animated zoomIn');

                return;      
            }

            $li.removeClass('animated zoomIn').hide();
            $('#wizz-portfolio li[data-category~="'+ category +'"]').show().addClass('animated zoomIn');
        });
    });
}(jQuery));