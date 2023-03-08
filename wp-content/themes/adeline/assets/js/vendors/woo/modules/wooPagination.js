var $j = jQuery.noConflict();



$j(window).on( 'load', function() {

	"use strict";

	if ( $j.fn.infiniteScroll !== undefined && $j( 'div.woo-infinite-scroll-nav' ).length ) {

		// Infinite scroll

		dpradelineWooInfiniteScrollInit();

		

	}



} );

$j(window).on( 'load', function() {

	"use strict";

	if ( $j.fn.infiniteScroll !== undefined && $j( 'div.woo-load-more-scroll-nav' ).length ) {

		// Infinite scroll

		dpradelineWooLoadMoreInit();

	}



} );



/* ==============================================

WOOCOMMERCE PAGINATION 

============================================== */



/* ==============================================

INFINITE SCROLL

============================================== */

function dpradelineWooInfiniteScrollInit() {

	"use strict"



	// Get infinite scroll container

	var $container = $j( '.infinite-scroll-wrapper' );



	// Start infinite sccroll

	$container.infiniteScroll( {

		path 	: '.older-posts a',

		append 	: '.product',

		status 	: '.scroller-status',

		hideNav : '.woo-infinite-scroll-nav',

		history : false,

	} );

	$container.on( 'load.infiniteScroll', function( event, response, path, items ) {

		var $items = $j( response ).find( '.product' );

		$items.imagesLoaded( function() {



			// Isotope

				$container.isotope( 'appended', $items );

				$items.css( 'opacity', 0 );

				dpradelineLightcase( $items );

			// Animate new Items

			$items.animate( {

				opacity : 1

			} );

			// Re-run functions

			if ( ! $j( 'body' ).hasClass( 'no-carousel' ) ) {

				dpradelineInitCarousel( $items );

			}



		} );



	} );



}



/* ==============================================

INFINITE SCROLL WITH LOAD MORE BUTTON

============================================== */

function dpradelineWooLoadMoreInit() {

	"use strict"



	// Get infinite scroll container

	var $container = $j( '.infinite-scroll-wrapper' );



	// Start infinite sccroll

	$container.infiniteScroll( {

		path 	: '.older-posts a',

		append 	: '.product',

		status 	: '.scroller-status',

		hideNav : '.woo-load-more-scroll-nav',

		button: '.dp-adeline-loadmore-button',

  		scrollThreshold: false,

		history : false,

	} );

	$container.on( 'load.infiniteScroll', function( event, response, path, items ) {



		var $items = $j( response ).find( '.product' );



		$items.imagesLoaded( function() {



			// Isotope

			$container.isotope( 'appended', $items );

			$items.css( 'opacity', 0 );

			dpradelineLightcase( $items );

			// Animate new Items

			$items.animate( {

				opacity : 1

			} );

			// Re-run functions

			if ( ! $j( 'body' ).hasClass( 'no-carousel' ) ) {

				dpradelineInitCarousel( $items );

			}



		} );



	} );

}