var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

	// Parallax footer

	dpradelineParallaxFooter();

} );



$j( window ).on( 'resize', function() {

	"use strict";

	// Parallax footer

	dpradelineParallaxFooter();

} );



/* ==============================================

PARALLAX FOOTER

============================================== */

function dpradelineParallaxFooter() {

	"use strict"



	var $footer = $j( '.parallax-footer' );



	// Needed timeout for dynamic parallax content

	if ( $j( 'body' ).hasClass( 'has-parallax-footer' ) ) {



		setTimeout( function() {

			var $wrapper_height = ( $footer.css( 'position' ) == 'fixed' ) ? $j( '#dpr-inner-wrapper' ).outerHeight() : $j( '#dpr-inner-wrapper' ).outerHeight() - $footer.outerHeight();



			// On desktops enable parallax footer effect

			if ( $footer.outerHeight() < $j( window ).height() && $wrapper_height > $j( window ).height() ) {



				$footer.css( {

					'position': '',

					'margin': '',

					'padding': ''

				} );

				

				$j( '#main' ).css( 'margin-bottom', $footer.outerHeight() );



			// On mobiles the footer will be static

			} else {



				$footer.css( {

					'position': 'static',

					'margin': '0',

					'padding': '0'

				} );



				$j( '#main' ).css( 'margin-bottom', '' );



			}



		}, 1 );



	}



}