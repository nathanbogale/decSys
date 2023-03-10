var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

	// Header search form label

	dpradelineHeaderSearchForm();

} );



/* ==============================================

HEADER SEARCH FORM LABEL

============================================== */

function dpradelineHeaderSearchForm() {

	"use strict"



	// Add class when the search input is not empty

	$j( 'form.header-searchform' ).each( function() {



		var form 		= $j( this ),

			listener	= form.find( 'input' ),

			$label 		= form.find( 'label' );



		if ( listener.val().length ) {

			form.addClass( 'search-filled' );

		}



		listener.on( 'keyup blur', function() {

			if ( listener.val().length > 0 ) {

			  form.addClass( 'search-filled' );

			} else {

			  form.removeClass( 'search-filled' );

			}

		} );



    } );



}