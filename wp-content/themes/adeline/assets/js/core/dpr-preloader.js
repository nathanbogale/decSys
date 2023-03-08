var $j 					= jQuery.noConflict(),

	$window 			= $j( window ),

	$lastWindowWidth 	= $window.width(),

	$lastWindowHeight 	= $window.height();



$window.on( 'load', function() {

	"use strict";

	// Preloader

	dpradelinePreloader();

} );





/* ==============================================

PRELOADER

============================================== */

function dpradelinePreloader() {

	"use strict"

	$j("#dpr-loading").fadeOut(500);

}