var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

	// Custom select

	dpradelineCustomSelects();

} );



/* ==============================================

CUSTOM SELECT

============================================== */

function dpradelineCustomSelects() {

	"use strict"


	$j( dpradelineLocalize.customSelects ).customSelect( {

		customClass: 'theme-select'

	} );



}