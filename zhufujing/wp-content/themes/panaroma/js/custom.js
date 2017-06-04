jQuery(document).ready(function($) {
			"use strict";
			jQuery('.strip-item').css({'width': $('.strip-menu').attr('data-width') + '%'});
			if (jQuery(window).width() > 1024) {
				var base_width = $('.strip-menu').attr('data-width');
				var count = $('.strip-menu').attr('data-count');
				$('section.strip-item').hover(function(){
					$('.strip-item').css('width', (100-base_width*2)/(count-1)+'%');
					$(this).css('width', base_width*2+'%');
				},function(){
					$('.strip-item').css('width', base_width+'%');				
				});
			}
			if (jQuery(window).width() > 760 && jQuery(window).width() < 1025) {
				jQuery('.wrapped_link').click(function(e) {
					if (!jQuery(this).parents('.strip-item').hasClass('hovered')) {
						var base_width = $('.strip-menu').attr('data-width');
						var count = $('.strip-menu').attr('data-count');						
						e.preventDefault();
						jQuery('.strip-item').removeClass('hovered');
						jQuery(this).parents('.strip-item').addClass('hovered');
						jQuery('.strip-item').css('width', (100-base_width*2)/(count-1)+'%');
						jQuery(this).parents('.strip-item').css('width', base_width*2+'%');
					}
				});
			}
		});	
		

// navigation script for responsive
var ww = jQuery(window).width();
jQuery(document).ready(function() { 
	jQuery(".navi li a").each(function() {
		if (jQuery(this).next().length > 0) {
			jQuery(this).addClass("parent");
		};
	})
	jQuery(".mobile_nav").click(function(e) { 
		e.preventDefault();
		jQuery(this).toggleClass("active");
		jQuery(".navi").slideToggle('fast');
	});
	adjustMenu();
})
// navigation orientation resize callbak
jQuery(window).bind('resize orientationchange', function() {
	ww = jQuery(window).width();
	adjustMenu();
});
// navigation function for responsive
var adjustMenu = function() {
	if (ww < 768) {
		jQuery(".mobile_nav").css("display", "block");
		if (!jQuery(".mobile_nav").hasClass("active")) {
			jQuery(".navi").hide();
		} else {
			jQuery(".navi").show();
		}
		jQuery(".navi li").unbind('mouseenter mouseleave');
	} else {
		jQuery(".mobile_nav").css("display", "none");
		jQuery(".navi").show();
		jQuery(".navi li").removeClass("hover");
		jQuery(".navi li a").unbind('click');
		jQuery(".navi li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
			jQuery(this).toggleClass('hover');
		});
	}
}
