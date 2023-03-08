var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

	// Nav no click

	dpradelineNavNoClick();

} );



/* ==============================================

NAV NO CLICK

============================================== */

function dpradelineNavNoClick() {

	"use strict"



	$j( 'li.nav-no-click > a' ).on( 'click', function() {

		return false;

	} );



}