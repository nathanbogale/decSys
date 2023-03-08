var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

	// Superfish menus

	dpradelineSuperFish();

} );



/* ==============================================

SUPERFISH MENUS

============================================== */

function dpradelineSuperFish() {

	"use strict"

	// Return if vertical header style

	if ( $j( '#dpr-header' ).hasClass( 'vertical-header' ) ) {

		return;

	}



	$j( 'ul.sf-menu' ).superfish( {

		delay: 600,

		onShow: function() {

			// keep off screen momentarily

			$j(this).css('top','-1000px');

	

			// calculate position of submenu

			var winWidth = $j(window).width();

			var outerWidth = $j(this).outerWidth();

			var rightEdge = $j(this).offset().left + outerWidth;

			// if difference is greater than zero, then add class to menu item

			if( rightEdge > winWidth ) {

				$j(this).addClass('submenu--left');

			}

	

			// remove top value so menu appears

			$j(this).css('top','');

		},

		onHide: function() {

			$j(this).removeClass('submenu--left');

		},

		animation: {

			opacity: 'show'

		},

		animationOut: {

			opacity: 'hide'

		},

		speed: 'fast',

		speedOut: 'fast',

		cssArrows: false,

		disableHI: false,

	} );



}