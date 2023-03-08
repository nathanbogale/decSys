var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

	// Fullscreen search

	dpradelineFullscreenSearch();

} );



/* ==============================================

FULLSCREEN SEARCH

============================================== */

function dpradelineFullscreenSearch() {

	"use strict"



	// Return if is the not this search style

	if ( 'full_screen' != dpradelineLocalize.menuSearchStyle ) {

		return;

	}



	var $searchFullscreenToggle 	= $j( 'a.search-fullscreen-toggle' ),

		$searchFullscreenClose 	= $j( 'a.search-fullscreen-close' ),

		$searchFullscreen 			= $j( '#searchform-fullscreen' );



	if ( $searchFullscreenToggle.length ) {



		$searchFullscreenToggle.on( 'click', function( e ) {

			e.preventDefault();

			$searchFullscreen.addClass( 'active' );

			$searchFullscreenClose.addClass ( 'magictime spaceInLeft' );

			$j( '#searchform-fullscreen .container' ).addClass ( 'magictime swashIn' );



		} );



	}



	$searchFullscreenClose.on( 'click', function( e ) {

		e.preventDefault();

		$searchFullscreen.removeClass( 'active' );

		$searchFullscreenClose.removeClass ( 'magictime spaceInLeft' );

		$j( '#searchform-fullscreen .container' ).removeClass ( 'magictime swashIn' );



	} );



	$searchFullscreenToggle.on( 'click', function() {

		$j( '#searchform-fullscreen input' ).focus();

	} );



}