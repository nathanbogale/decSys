var $j 		= jQuery.noConflict(),

	$window = $j( window );



$j( document ).on( 'ready', function() {

	"use strict";

	// Scroll effect

	dpradelineScrollEffect();

	dpradelineHandleSubheaderTitle();	

} );





/* ==============================================

SCROLL EFFECT

============================================== */

function dpradelineScrollEffect() {

	"use strict"



	if ( ! $j( 'body' ).hasClass( 'single-product' )

		&& ! $j( 'body' ).hasClass( 'no-local-scroll' ) ) {



	    $j( 'a.local[href*="#"]:not([href="#"]), .local a[href*="#"]:not([href="#"]), a.menu-link[href*="#"]:not([href="#"]), a.sidr-class-menu-link[href*="#"]:not([href="#"])' ).on( 'click', function() {



	    	if ( ! $j( this ).hasClass( 'omw-open-modal' )

	        	&& ! $j( this ).parent().hasClass( 'omw-open-modal' )

	        	&& ! $j( this ).parent().parent().parent().hasClass( 'omw-open-modal' ) ) {



	        	var $href     				= $j( this ).attr( 'href' ),

				    $hrefHash 				= $href.substr( $href.indexOf( '#' ) ).slice( 1 ),

				    $target   				= $j( '#' + $hrefHash ),

					$adminbarHeight        	= dpradelineGetAdminbarHeight(),

					$topbarHeight        	= dpradelineGetTopbarHeight(),

					$stickyHeaderHeight    	= dpradelineGetStickyHeaderHeight(),

				    $scrollPosition;



				if ( $target.length && '' !== $hrefHash ) {

					$scrollPosition     	= $target.offset().top - $adminbarHeight - $topbarHeight - $stickyHeaderHeight;



	                $j( 'html, body' ).stop().animate( {

						 scrollTop: Math.round( $scrollPosition )

					}, 1000 );



					return false;



	            }



	        }



	    } );



	}



}



// Admin bar height

function dpradelineGetAdminbarHeight() {

	"use strict"



	var $adminbarHeight = 0;



	if ( $j( '#wpadminbar' ).length ) {

		$adminbarHeight = parseInt( $j( '#wpadminbar' ).outerHeight() );

	}



	return $adminbarHeight;

}



// Top bar height

function dpradelineGetTopbarHeight() {

	"use strict"



	var $topbarHeight = 0;



	if ( $j( '#dpr-top-bar-wrapper' ).hasClass( 'top-bar-sticky' )

		&& $j( '#dpr-top-bar-wrapper' ).length ) {

		$topbarHeight = parseInt( $j( '#dpr-top-bar-wrapper' ).outerHeight() );

	}



	return $topbarHeight;

}



// Header height

function dpradelineGetStickyHeaderHeight() {

	"use strict"



	var $stickyHeaderHeight = 0;



	if ( $j( '#dpr-header' ).hasClass( 'fixed-scroll' )

		&& $j( '#dpr-header' ).length ) {

		$stickyHeaderHeight = $j( '#dpr-header' ).attr( 'data-height' );

	}



	if ( $window.width() <= 960

		&& ! $j( '#dpr-header' ).hasClass( 'use-sticky-mobile' )

		&& $j( '#dpr-header' ).length ) {

		$stickyHeaderHeight = 0;

	}



	return $stickyHeaderHeight;

}



// Subheader title effect

function dpradelineHandleSubheaderTitle() {

	

		$window.on( 'scroll', function() {

			if ( $j('.subheader-inner').hasClass('vanishing') ){

					var scroll = $j(document).scrollTop() / 3;

					if ( scroll > 200 ) {

						scroll = 200;

					} else {

						scroll = scroll;

					}

					$j('h1.subheader-title, .subheader-subtitle, .dpr-adeline-breadcrumbs.position-under-title').css({

						'transform': 'translate3d(0,' + (scroll) + 'px, 0)',

						'opacity': 1 - ( scroll / 200)

					});

			}



		});



	

}

