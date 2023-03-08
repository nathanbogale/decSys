var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

    // Woo mobile cart sidebar

    dpradelineWooMobileCart();

} );



/* ==============================================

WOOCOMMERCE MOBILE CART SIDEBAR

============================================== */

function dpradelineWooMobileCart() {

	"use strict"



	if ( $j( 'body' ).hasClass( 'woocommerce-cart' )

		|| $j( 'body' ).hasClass( 'woocommerce-checkout' ) ) {

		return;

	}

	

	var dpradeline_cart_filter_close = function() {

		$j( 'html' ).css( {

			'overflow': '',

			'margin-right': '' 

		} );



		$j( 'body' ).removeClass( 'show-cart-sidebar' );

	};



	$j( document ).on( 'click', '.dpradeline-mobile-menu-icon a.wcmenucart', function( e ) {

		e.preventDefault();



		var innerWidth = $j( 'html' ).innerWidth();

		$j( 'html' ).css( 'overflow', 'hidden' );

		var hiddenInnerWidth = $j( 'html' ).innerWidth();

		$j( 'html' ).css( 'margin-right', hiddenInnerWidth - innerWidth );



		$j( 'body' ).addClass( 'show-cart-sidebar' );

	} );



	$j( '.dpradeline-cart-sidebar-overlay, .dpradeline-cart-close').on( 'click', function( e ) {

		e.preventDefault();

		

		dpradeline_cart_filter_close();



		// Remove show-cart here to let the header mini cart working

		$j( 'body' ).removeClass( 'show-cart' );

	} );



	// Close on resize to avoid conflict

	$j( window ).resize( function() {

		dpradeline_cart_filter_close();

	} );



}