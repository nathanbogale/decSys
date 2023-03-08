var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

	dprBadgeColorPicker();

} );



/* ==============================================

Menu badge color picker 

============================================== */

function dprBadgeColorPicker() {

	"use strict";   


		$j('.badge-color-picker').wpColorPicker();
}