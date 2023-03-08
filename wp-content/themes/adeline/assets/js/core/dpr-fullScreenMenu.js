var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

	// Full Screen header menu

	dpradelineFullScreenMenu();

} );



/* ==============================================

FULL SCREEN MENU

============================================== */

function dpradelineFullScreenMenu() {

	"use strict"



	var $siteHeader 	= $j( '.full_screen-header' ),

		$menuWrap 		= $j( '.full_screen-header #full-screen-menu' ),

		$menuBar 		= $j( '.full_screen-header .menu-bar' );



	if ( $menuBar.length ) {



		// Open menu function

		function dpradelineFullScreenMenuOpen() {

			$siteHeader.addClass( 'nav-open' );

			$menuBar.addClass( 'close-menu' );

			$menuWrap.addClass( 'active' );

        }



		// Close menu function

		function dpradelineFullScreenMenuClose() {

			$siteHeader.removeClass( 'nav-open' );

			$menuBar.removeClass( 'close-menu' );

			$menuWrap.removeClass( 'active' );

            setTimeout( function() {

				$j( '#full-screen-menu #dpr-navigation ul > li.dropdown' ).removeClass( 'open-sub' );

                $j( '#full-screen-menu #dpr-navigation ul.sub-menu' ).slideUp( 200 );

            }, 400);

        }

		



		$menuBar.on( 'click', function( e ) {

			e.preventDefault();



			if ( ! $j( this ).hasClass( 'close-menu' ) ) {

				dpradelineFullScreenMenuOpen();

	        } else {

	        	dpradelineFullScreenMenuClose();

	        }



		} );



		// Logic for open sub menus

        $j( '#full-screen-menu #dpr-navigation ul > li.menu-item-has-children > a > .text-wrapper > span.nav-arrow, #full-screen-menu #site-navigation ul > li.menu-item-has-children > a[href="#"]' ).on( 'tap click', function() {



            if ( $j( this ).closest( 'li.menu-item-has-children' ).find( '> ul.sub-menu' ).is( ':visible' ) ) {

                $j( this ).closest( 'li.menu-item-has-children' ).removeClass( 'open-sub' );

                $j( this ).closest( 'li.menu-item-has-children' ).find( '> ul.sub-menu' ).slideUp( 200 );

            } else {

                $j( this ).closest( 'li.menu-item-has-children' ).addClass( 'open-sub' );

                $j( this ).closest( 'li.menu-item-has-children' ).find( '> ul.sub-menu' ).slideDown( 200 );

            }



            return false;



        } );



        // Close menu if anchor link

        $j( '#full-screen-menu #dpr-navigation a.menu-link[href*="#"]:not([href="#"])' ).on( 'click', function() {

        	dpradelineFullScreenMenuClose();

	    } );



	}



}