var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

	// Superfish menus

	dpradelinePopOver();

} );



/* ==============================================

SUPERFISH MENUS

============================================== */

function dpradelinePopOver() {

	"use strict"



	$j('[data-toggle="popover"]').ggpopover();







}