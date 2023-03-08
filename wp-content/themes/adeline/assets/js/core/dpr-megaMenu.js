var $j 		= jQuery.noConflict(),

	$window = $j( window );



$j( document ).on( 'ready', function() {

	"use strict";

	// Mega menu

	dpradelineMegaMenu();

} );



/* ==============================================

MEGA MENU

============================================== */

function dpradelineMegaMenu() {

	"use strict"



    // Mega menu in top bar menu

    $j( '#dpr-top-bar-nav .megamenu-li.full-mega' ).on ( 'hover', function() {

        var $topBar              = $j( '#dpr-top-bar' ),

            $menuWidth           = $topBar.width(),     

            $menuPosition        = $topBar.offset(),     

            $menuItemPosition    = $j( this ).offset(),

            $PositionLeft        = $menuItemPosition.left-$menuPosition.left+1;



        $j( this ).find( '.megamenu' ).css( { 'left': '-'+$PositionLeft+'px', 'width': $menuWidth } );

    } );



    // Mega menu in principal menu

    $j( '#dpr-navigation .megamenu-li.full-mega' ).on ('hover', function() {

        var $siteHeader          = $j( '#dpr-header-inner' ),

            $menuWidth           = $siteHeader.width(),     

            $menuPosition        = $siteHeader.offset(),     

            $menuItemPosition    = $j( this ).offset(),

            $PositionLeft        = $menuItemPosition.left-$menuPosition.left+1-($siteHeader.outerWidth()-$siteHeader.width())/2;



        if ( $j( '#dpr-header' ).hasClass( 'magazine-header' ) ) {

            $siteHeader          = $j( '#dpr-navigation-wrapper > .container' ),

            $menuWidth           = $siteHeader.width(),

            $menuPosition        = $siteHeader.offset(),

            $PositionLeft        = $menuItemPosition.left-$menuPosition.left+1-($siteHeader.outerWidth()-$siteHeader.width())/2;

        }



        $j( this ).find( '.megamenu' ).css( { 'left': '-'+$PositionLeft+'px', 'width': $menuWidth } );

    } );



    // Megamenu auto width

    $j( '.navigation .megamenu-li.auto-mega .megamenu' ).each( function() {

        var $li                  = $j( this ).parent(),

            $liOffset            = $li.offset().left,

            $liOffsetTop         = $li.offset().top,

            $liWidth             = $j( this ).parent().width(),

            $dropdowntMarginLeft = $liWidth/2,

            $dropdownWidth       = $j( this ).outerWidth(),

            $dropdowntLeft       = $liOffset - $dropdownWidth/2;

        

        if ( $dropdowntLeft < 0 ) {

            var $left            = $liOffset - 10;

            $dropdowntMarginLeft = 0;

        } else {

            var $left            = $dropdownWidth/2;

            

        }

        

        if ( dpradelineLocalize.isRTL ) {

            $j( this ).css( {

                'right': - $left,

                'marginRight': $dropdowntMarginLeft

            } );

        } else {

            $j( this ).css( {

                'left': - $left,

                'marginLeft': $dropdowntMarginLeft

            } );

        }

        

        var $dropdownRight = ( $window.width() ) - ( $liOffset - $left + $dropdownWidth + $dropdowntMarginLeft );

        

        if ( $dropdownRight < 0 ) {

            $j( this ).css( {

                'left': 'auto',

                'right': - ( $window.width() - $liOffset - $liWidth - 10 )

            } );

        }

        

    } );



}