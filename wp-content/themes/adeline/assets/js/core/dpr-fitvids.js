var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

    // Responsive Video

	dpradelineInitFitVids();

} );



/* ==============================================

RESPONSIVE VIDEOS

============================================== */

function dpradelineInitFitVids() {

	"use strict"



	$j( '.responsive-video-wrapper, .responsive-audio-wrapper' ).fitVids();



}