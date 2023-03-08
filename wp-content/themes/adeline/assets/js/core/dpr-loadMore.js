var $j 		= jQuery.noConflict(),

	$window = $j( window );



$window.on( 'load', function() {

	"use strict";

	if ( $j.fn.infiniteScroll !== undefined && $j( 'div.load-more-scroll-nav' ).length ) {

		// Infinite scroll

		dpradelineLoadMoreInit();

	}



} );



/* ==============================================

INFINITE SCROLL WITH LOAD MORE BUTTON

============================================== */

function dpradelineLoadMoreInit() {

	"use strict"



	// Get infinite scroll container

	var $container = $j( '.infinite-scroll-wrapper' );



	// Start infinite sccroll

	$container.infiniteScroll( {

		path 	: '.older-posts a',

		append 	: '.item-entry',

		status 	: '.scroller-status',

		hideNav : '.load-more-scroll-nav',

		button: '.dp-adeline-loadmore-button',

  		scrollThreshold: false,

		history : false,

	} );



	$container.on( 'load.infiniteScroll', function( event, response, path, items ) {



		var $items = $j( response ).find( '.item-entry' );



		$items.imagesLoaded( function() {



			// Isotope

			if ( $container.hasClass( 'blog-masonry-grid' ) ) {

				$container.isotope( 'appended', $items );

				$items.css( 'opacity', 0 );

			}



			// Animate new Items

			$items.animate( {

				opacity : 1

			} );



			// Re-run functions

			if ( ! $j( 'body' ).hasClass( 'no-carousel' ) ) {

				dpradelineInitCarousel( $items );

			}





			// Match heights

			if ( ! $j( 'body' ).hasClass( 'no-matchheight' ) ) {

				$j( '.blog-equal-heights .blog-item-inner' ).matchHeight({ property: 'min-height' });

			}



		    // Gallery posts

		    if ( $j( '.gallery-format' ).parent( '.thumbnail' ) && $j( '.blog-masonry-grid' ).length ) {

				setTimeout( function() {

					$j( '.blog-masonry-grid' ).isotope( 'layout' );

				}, 600 + 1 );

			}



		} );



	} );



}