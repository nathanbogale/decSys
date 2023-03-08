var $j = jQuery.noConflict();



$j( window ).on( 'load', function() {

	"use strict";

	// Superfish menus

	dpradelineInitCallonWaypoints();

} );



/* ==============================================

SUPERFISH MENUS

============================================== */

function dpradelineInitCallonWaypoints() {

	"use strict"

			var offset = 'bottom-in-view';

			$j('.call-on-in-viewport').each(function () {

				var $this = $j(this);



				$this.waypoint(function () {

					$this.trigger('on-in-viewport');

				}, {triggerOnce: true, offset: offset});

			});





}