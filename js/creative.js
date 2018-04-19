/**
 * File creative.js.
 *
 * Creative Blazer enhancements.
 *
 * Contains functions for cute animations.
 */

jQuery(document).ready(function($) {
	// toggling header nav opaque/transparent when user scrolls
	$(window).scroll(function(){
		var top         	= $(window).scrollTop();
			masthead    	= $("#masthead");
			noScroll 	= "no-scroll";

		if( top > 0 ) {
			masthead.removeClass(noScroll);
			masthead.addClass("scrolled");
		}
		else {
			masthead.removeClass("scrolled");
			masthead.addClass(noScroll);
		}
		var fixedContent = $(".fixed-content");
		if( top > 151 ) {
			fixedContent.addClass("position-fixed");
		}
		else {
			fixedContent.removeClass("position-fixed");
		}
	});
});