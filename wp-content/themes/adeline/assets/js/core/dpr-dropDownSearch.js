var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

	// Drop down search

	dpradelineDropDownSearch();

	

} );





/* ==============================================

DROP DOWN SEARCH

============================================== */

function dpradelineDropDownSearch() {

	"use strict"



	// Return if is the not this search style

	if ( 'drop_down' != dpradelineLocalize.menuSearchStyle ) {

		return;

	}



	var $searchDropdownToggle = $j( 'a.search-dropdown-toggle' ),

		$searchDropdownForm   = $j( '#searchform-dropdown' );



	$searchDropdownToggle.on( "click", function( event ) {

		//Calculate offset

		var $dropdownOffset = $j( this ).offset().left ;

		$dropdownOffset = $dropdownOffset - $searchDropdownForm.width()+ 20;

		$searchDropdownForm.offset({ left: $dropdownOffset});

		// Display search form

		$searchDropdownForm.toggleClass( 'show' );

		// Active menu item

		$j( this ).parent( 'li' ).toggleClass( 'active' );

		// Focus

		var $transitionDuration = $searchDropdownForm.css( 'transition-duration' );

		$transitionDuration = $transitionDuration.replace( 's', '' ) * 1000;

		if ( $transitionDuration ) {

			setTimeout( function() {

				$searchDropdownForm.find( 'input.field' ).focus();

			}, $transitionDuration );

		}

		// Hide other things

		$j( 'div#current-shop-items-dropdown' ).removeClass( 'show' );

		$j( 'li.wcmenucart-toggle-drop_down' ).removeClass( 'active' );

		// Return false

		return false;

	} );



	// Close on doc click

	$j( document ).on( 'click', function( event ) {

		if ( ! $j( event.target ).closest( '#searchform-dropdown.show' ).length ) {

			$searchDropdownToggle.parent( 'li' ).removeClass( 'active' );

			$searchDropdownForm.removeClass( 'show' );

		}

	} );



}