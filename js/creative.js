/**
 * File creative.js.
 *
 * Creative Blazer enhancements.
 *
 * Contains functions for cute animations.
 */

jQuery(document).ready(function($) {
	$(window).scroll(function(){
		//change border radius of hero section when user scrolls
		var top				= $(window).scrollTop(); //cache each window scroll amount
			$heroCurveDiv	= $( "#cb-curved-corners" ); //cache element handle with lower curved corners
			borderRadiusY	= 260 - top; //260px for initial border y radius minus scroll amount
			heroCurveRule	= "100% " + borderRadiusY.toString() + "px"; //prepare the css rule to append to hero section
			$aboutSection	= $( "#front-page-about" ); //cache second section id string
			offSetTop		= (top - 260); //about section position-top will range from 0 to 40px
			offSetTopFactor	= offSetTop*.28; //scaling from 260px to 75px
			aboutSectionTop	= 0 - offSetTopFactor; //the negative of the offsetfactor as it is from the top and rising
			aboutCurveFactor= offSetTop*.57; //about section border radius will range from 0 to 150px
			aboutCurveRule	= "100% " + (aboutCurveFactor).toString() + "px"; //prepare the css border-radius rule to append to about section
			paddingTop		= offSetTop*.36 + 32; //top padding ranges from 32px to 126px
		if (top <= 260) { //first 260 pixels the curve flattens to 0 radius
			//dynamically change border radius as user scrolls
			$heroCurveDiv.css({ 
				"border-bottom-left-radius" : heroCurveRule, 
				"border-bottom-right-radius" : heroCurveRule }); 
			//keep about section in its resting state
			$aboutSection.css({ 
				"top" : "0",
				"padding-top" : "32px",
				"border-top-left-radius" : "100% 0", 
				"border-top-right-radius" : "100% 0" });
		}
		else if (top > 260 && top <= 520) { //next 260 pixels raise and curve the adjacent section
			//dynamically change border radius and top position as user scrolls
			$aboutSection.css({ 
				"top" : aboutSectionTop.toString() + "px",
				"padding-top" : paddingTop.toString() + "px",
				"border-top-left-radius" : aboutCurveRule, 
				"border-top-right-radius" : aboutCurveRule }); 
			//no hero bend
			$heroCurveDiv.css({ 
				"border-bottom-left-radius" : "0", 
				"border-bottom-right-radius" : "0" });
		}
		else {
			//no hero bend
			$heroCurveDiv.css({ 
				"border-bottom-left-radius" : "0", 
				"border-bottom-right-radius" : "0" }); 
			//about section remains in curved state
			$aboutSection.css({ 
				"top" : "-75px",
				"padding-top" : "126px",
				"border-top-left-radius" : "100% 150px", 
				"border-top-right-radius" : "100% 150px" });
		}

		//toggling header class when page is at top or scrolled any amount
			$masthead		= $("#masthead"); //cache the handler for site header
			noScroll		= "no-scroll"; //make a variable for the string to be class name (preference)
		if( top > 0 ) { //check for any user scrolling
			$masthead.removeClass(noScroll); //remove a css class from header
			$masthead.addClass("scrolled"); //add a css class to header
		}
		else { //for when the scroll amount is zero
			$masthead.removeClass("scrolled"); //remove css class from header
			$masthead.addClass(noScroll); //add css class to header
		}

		//fix testimonial page sidebar at select scroll heights
		var testimonialMenu		= $( ".testimonial-menu-tile" ); 
			footer				= $( "#sub-footer" );
			footerPosition		= footer.position().top;
			viewHeight			= $( window ).height();
			bottomPagePosition	= top + viewHeight + 50;//extra 50 pixels for smooth transition for content padding
		if( top > 164 && bottomPagePosition < footerPosition ) {
			testimonialMenu.removeClass( "bottom" );
			testimonialMenu.addClass( "position-fixed" );
		}
		else if( bottomPagePosition > footerPosition ) {
			testimonialMenu.removeClass( "position-fixed" )
			testimonialMenu.addClass( "bottom" );
		}
		else {
			testimonialMenu.removeClass("position-fixed");
		}
	});
});