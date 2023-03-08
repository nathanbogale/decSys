var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

	// Header expandable search

	dpradelineExpandableSearch();

} );



/* ==============================================

HEADER EXPANDABLE SEARCH

============================================== */

function dpradelineExpandableSearch() {

	"use strict"



	// Return if is the not this search style

	if ( 'expandable_search' != dpradelineLocalize.menuSearchStyle ) {

		return;

	}



	// Header

	var $header = $j( '#dpr-header' );



	// If is top menu header style

	if ( $header.hasClass( 'top-header' ) ) {



		// Show

		var $expandableSearch 	= $j( '#searchform-expandable-search' ),

			$siteLeft 		= $j( '#dpr-header.top-header .header-top .left' ),

			$siteRight 		= $j( '#dpr-header.top-header .header-top .right' );

		

		$j( 'a.search-expandable-search-toggle' ).on( "click", function( event ) {

			// Display search form

			$expandableSearch.toggleClass( 'show' );

			$siteLeft.toggleClass( 'hide' );

			$siteRight.toggleClass( 'hide' );

			// Focus

			var $transitionDuration =  $expandableSearch.css( 'transition-duration' );

			$transitionDuration = $transitionDuration.replace( 's', '' ) * 1000;

			if ( $transitionDuration ) {

				setTimeout( function() {

					$expandableSearch.find( 'input[type="search"]' ).focus();

				}, $transitionDuration );

			}

			// Return false

			return false;

		} );



		// Close on click

		$j( '#searchform-expandable-search-close' ).on( "click", function() {

			$expandableSearch.removeClass( 'show' );

			$siteLeft.removeClass( 'hide' );

			$siteRight.removeClass( 'hide' );

			return false;

		} );



		// Close on doc click

		$j( document ).on( 'click', function( event ) {

			if ( ! $j( event.target ).closest( $j( '#searchform-expandable-search.show' ) ).length ) {

				$expandableSearch.removeClass( 'show' );

				$siteLeft.removeClass( 'hide' );

				$siteRight.removeClass( 'hide' );

			}

		} );



	} else {



		// Show

		var $expandableSearch 	= $j( '#searchform-expandable-search' ),

			$siteNavigation = $j( '#dpr-header.expandable-search #dpr-navigation' );

		

		$j( 'a.search-expandable-search-toggle' ).on( "click", function( event ) {

			// Display search form

			$expandableSearch.toggleClass( 'show' );

			$siteNavigation.toggleClass( 'hide' );

			var menu_width = $j( '#dpr-navigation > ul.dropdown-menu' ).width();

			$expandableSearch.css( 'max-width', menu_width + 60 );

			// Focus

			var $transitionDuration =  $expandableSearch.css( 'transition-duration' );

			$transitionDuration = $transitionDuration.replace( 's', '' ) * 1000;

			if ( $transitionDuration ) {

				setTimeout( function() {

					$expandableSearch.find( 'input[type="search"]' ).focus();

				}, $transitionDuration );

			}

			// Return false

			return false;

		} );



		// Close on click

		$j( '#searchform-expandable-search-close' ).on( "click", function() {

			$expandableSearch.removeClass( 'show' );

			$siteNavigation.removeClass( 'hide' );

			return false;

		} );



		// Close on doc click

		$j( document ).on( 'click', function( event ) {

			if ( ! $j( event.target ).closest( $j( '#searchform-expandable-search.show' ) ).length ) {

				$expandableSearch.removeClass( 'show' );

				$siteNavigation.removeClass( 'hide' );

			}

		} );



	}



}