var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

    // Match height elements

	dpradelineInitMatchHeight();

} );



/* ==============================================

MATCH HEIGHTS

============================================== */

function dpradelineInitMatchHeight() {

	"use strict"



	// Add match heights grid

	$j( '.match-height-grid .match-height-content' ).matchHeight({ property: 'min-height' });



	// Blog entries

	$j( '.blog-equal-heights .blog-item-inner' ).matchHeight({ property: 'min-height' });

}