/**
 * File creative.js.
 *
 * Creative Blazer enhancements.
 *
 * Contains functions for cute animations.
 */

jQuery(document).ready(function($) {
	// toggling header nav opaque/transparent when user scrolls
	var t;
	$(window).scroll(function squishHeader(){
		clearTimeout(t);

		t = setTimeout(function() {

		squisHeader();

		}, 400);
	});
	function squisHeader() {
		var top         	= $(window).scrollTop();
			masthead    	= $("#masthead");
			noScroll 	= "no-scroll";

			if( top > 0 ) {
				masthead.removeClass(noScroll);
				masthead.addClass("scrolled");
			}
			else {
				masthead.removeClass("scrolled")
				masthead.addClass(noScroll);
			}
	};
});