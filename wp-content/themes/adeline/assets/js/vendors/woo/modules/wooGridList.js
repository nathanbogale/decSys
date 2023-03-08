var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

    // Woo catalog view

    dpradelineWooGridList();

} );



/* ==============================================

WOOCOMMERCE GRID LIST VIEW

============================================== */

function dpradelineWooGridList() {

	"use strict"

	if ( $j( 'body' ).hasClass( 'has-grid-list' ) ) {



		$j( '#dpr-adeline-grid' ).on( 'click', function() {

			$j( this ).addClass( 'active' );

			$j( '#dpr-adeline-list' ).removeClass( 'active' );

			Cookies.set( 'gridcookie', 'grid', { path: '' } );

			if ($j('body').hasClass('woo-thumb-slider-active')) {

      			window.location.reload();

				$j( this ).addClass( 'grid' ).removeClass( 'list' );

			} else {

			$j( '.archive.woocommerce ul.products' ).fadeOut( 300, function() {

				$j( this ).addClass( 'grid' ).removeClass( 'list' ).fadeIn( 300 );

			} );

			}

			return false;

		} );



		$j( '#dpr-adeline-list' ).on( 'click', function() {

			$j( this ).addClass( 'active' );

			$j( '#dpr-adeline-grid' ).removeClass( 'active' );

			Cookies.set( 'gridcookie', 'list', { path: '' } );

			if ($j('body').hasClass('woo-thumb-slider-active')) {

				window.location.reload();

				$j( this ).addClass( 'list' ).removeClass( 'grid' );

			} else {

			$j( '.archive.woocommerce ul.products' ).fadeOut( 300, function() {

				$j( this ).addClass( 'list' ).removeClass( 'grid' ).fadeIn( 300 );

			} )

			};

			return false;

		} );



		if ( Cookies.get( 'gridcookie' ) == 'grid' ) {

	        $j( '.dpr-adeline-grid-list #dpr-adeline-grid' ).addClass( 'active' );

	        $j( '.dpr-adeline-grid-list #dpr-adeline-list' ).removeClass( 'active' );

	        $j( '.archive.woocommerce ul.products' ).addClass( 'grid' ).removeClass( 'list' );

	    }



	    if ( Cookies.get( 'gridcookie' ) == 'list' ) {

	        $j( '.dpr-adeline-grid-list #dpr-adeline-list' ).addClass( 'active' );

	        $j( '.dpr-adeline-grid-list #dpr-adeline-grid' ).removeClass( 'active' );

	        $j( '.archive.woocommerce ul.products' ).addClass( 'list' ).removeClass( 'grid' );

	    }



	} else {



		Cookies.remove( 'gridcookie', { path: '' } );



	}



}