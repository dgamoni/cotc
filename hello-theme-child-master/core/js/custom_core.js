

jQuery(document).ready(function($) {

 // touchend


 	$('.namepage-about .min-350, .namepage-sobre .min-350').each(function(index, el) {
 		var bg_hover = $(this).find('.elementor-element-populated').css('background-image');
 		var bg = $(this).find('.elementor-background-overlay').css('background-image');
 		$(this).attr('data-bg', bg);
 		$(this).attr('data-bg_hover', bg_hover);
 		
 	});


    $('.namepage-about .min-350, .namepage-sobre .min-350').on('touchstart', function(e) {
        
        //e.preventDefault();
        $(this).toggleClass('hover_touchstart');
	 	var this_bg = $(this).attr('data-bg');
	 	var this_bg_hover = $(this).attr('data-bg_hover');
	 	// console.log(this_bg);
	 	// console.log(this_bg_hover);

	 	if ( $(this).hasClass('hover_touchstart') ) {
            $(this).find('.elementor-background-overlay').css('background-image', this_bg_hover);
        	$(this).find('.elementor-element-populated').css('background-image', this_bg_hover);
        	$(this).find('.elementor-heading-title').show();	 		
	 	} else {
            $(this).find('.elementor-background-overlay').css('background-image', this_bg);
        	$(this).find('.elementor-element-populated').css('background-image', this_bg);
        	$(this).find('.elementor-heading-title').hide();	 		
	 	}


    });



}); 