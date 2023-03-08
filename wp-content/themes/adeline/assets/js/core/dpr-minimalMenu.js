var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

	// Full Screen header menu

	dpradelineMinimalMenu();

} );



/* ==============================================

FULL SCREEN MENU

============================================== */

function dpradelineMinimalMenu() {

	"use strict"



	var $siteHeader 	= $j( '.minimal-header' ),

		$menuWrap 		= $j( '.minimal-header #dpr-navigation-wrapper' ),

		$socialWrap 	= $j( '.minimal-header .dpr-adeline-social-menu' ),

		$menuBar 		= $j( '.minimal-header .menu-bar' );



	if ( $menuBar.length ) {

		// Open menu function

		function dpradelineMinimalMenuOpen() {

			$siteHeader.addClass( 'nav-open' );

			$menuBar.addClass( 'close-menu' );

			$menuWrap.addClass( 'active' );

			$socialWrap.addClass( 'active' );

        }



		// Close menu function

		function dpradelineMinimalMenuClose() {

			$siteHeader.removeClass( 'nav-open' );

			$menuBar.removeClass( 'close-menu' );

			$menuWrap.removeClass( 'active' );

			$socialWrap.removeClass( 'active' );

        }



		$menuBar.on( 'click', function( e ) {

			e.preventDefault();



			if ( ! $j( this ).hasClass( 'close-menu' ) ) {

				dpradelineMinimalMenuOpen();

	        } else {

	        	dpradelineMinimalMenuClose();

	        }



		} );





	}



}