var $j 		= jQuery.noConflict(),

	$window = $j( window );



$j( document ).on( 'ready', function() {

	"use strict";

	// Full Screen mobile menu

	dpradelineFullScreenMobile();

} );



/* ==============================================

FULL SCREEN MOBILE

============================================== */

function dpradelineFullScreenMobile() {

	"use strict"



	if ( $j( 'body' ).hasClass( 'fullscreen-mobile' ) ) {



		var $mobileMenu 	= $j( '#mobile-fullscreen' ),

			$mobileLink 	= $j( '.mobile-menu' );



		// Close menu function

		function dpradelineFullScreenMobileClose() {

			$mobileLink.removeClass( 'exit' );

			$mobileMenu.removeClass( 'active' ).fadeOut( 200 );



            setTimeout( function() {

            	$j( '#mobile-fullscreen nav ul > li.dropdown' ).removeClass( 'open-sub' );

                $j( '#mobile-fullscreen nav ul.sub-menu' ).slideUp( 200 );

                $j( '.mobile-menu > .hamburger' ).removeClass( 'is-active' );

            }, 400 );

        }



		// Open full screen menu

		$mobileLink.on( 'click', function() {

			$j( this ).addClass( 'exit' );

			$mobileMenu.addClass( 'active' ).fadeIn( 200 );

			$j( '.mobile-menu > .hamburger' ).addClass( 'is-active' );



			return false;

		} );



		// Add dropdown toggle (plus)

		$j( '#mobile-fullscreen .menu-item-has-children' ).children( 'a' ).append( '<span class="dropdown-toggle"></span>' );



		// Add toggle click event

		$j( '#mobile-fullscreen nav ul > li.menu-item-has-children > a > span.dropdown-toggle, #mobile-fullscreen nav ul > li.menu-item-has-children > a[href="#"]' ).on( 'tap click', function() {



            if ( $j( this ).closest( 'li.menu-item-has-children' ).find( '> ul.sub-menu' ).is( ':visible' ) ) {

                $j( this ).closest( 'li.menu-item-has-children' ).removeClass( 'open-sub' );

                $j( this ).closest( 'li.menu-item-has-children' ).find( '> ul.sub-menu' ).slideUp( 200 );

            } else {

                $j( this ).closest( 'li.menu-item-has-children' ).addClass( 'open-sub' );

                $j( this ).closest( 'li.menu-item-has-children' ).find( '> ul.sub-menu' ).slideDown( 200 );

            }



            return false;

        } );



		// Close menu

		$j( '#mobile-fullscreen a.close' ).on( 'click', function( e ) {

			e.preventDefault();

			dpradelineFullScreenMobileClose();

		} );



		// Close menu if anchor link

        $j( '#mobile-fullscreen .fs-dropdown-menu li a[href*="#"]:not([href="#"])' ).on( 'click', function() {

        	dpradelineFullScreenMobileClose();

	    } );



		// Close on resize

		$window.resize( function() {

			if ( $window.width() >= 960 ) {

				dpradelineFullScreenMobileClose();

			}

		} );



	}



}