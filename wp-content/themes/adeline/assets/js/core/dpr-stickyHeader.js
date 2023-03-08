// Sticky header

var $j 					= jQuery.noConflict(),

	$window 			= $j( window ),

	$windowTop 			= $window.scrollTop(),

	$previousScroll 	= 0;



// On page load

$window.on( 'load', function() {

	// Wrap top bar height

	dpradelineWrapTopBarHeight();

	// Wrap header

	dpradelineWrapHeight();

	// Logo height for sticky shrink style

	dpradelineLogoHeight();

	// Vertical header transparent

	dpradelineAddVerticalHeaderSticky();

} );



// On scroll

$window.scroll( function() {



    if ( $window.scrollTop() != $windowTop ) {

        $windowTop = $window.scrollTop();



    	// Sticky top bar

    	dpradelineStickyTopBar();



    	// Sticky header

    	dpradelineAddSticky();





    	// Vertical header transparent

    	dpradelineAddVerticalHeaderSticky();

    }



} );



// On resize

$window.resize( function() {



	/**

	 * Destroy sticky top bar

	 * to update the wrap top bar height

	 */

	dpradelineDestroyStickyTopBar();



	/**

	 * Destroy sticky header

	 * to update the wrap header height

	 */

	dpradelineDestroySticky();



} );



// On orientation change

$window.on( 'orientationchange' , function() {



	/**

	 * Destroy sticky top bar

	 * to update the wrap top bar height

	 */

	dpradelineDestroyStickyTopBar();



	/**

	 * Destroy sticky header

	 * to update the wrap header height

	 */

	dpradelineDestroySticky();



} );



/* ==============================================

DPR HEADER

============================================== */

function dpradelineSiteHeader() {

	"use strict"



	// Return if no sticky header

	if ( false == dpradelineLocalize.useStickyHeader ) {

		return;

	}





	// Var

	var $stickyHeader = $j( '#dpr-header' );







    // Return

    return $stickyHeader;



}



/* ==============================================

OFFSET

============================================== */

function dpradelineStickyOffset() {

	"use strict"



	// Return if no sticky header

	if ( false == dpradelineLocalize.useStickyHeader ) {

		return;

	}



    // Vars

    var $offset 		= 0,

	    $adminBar 		= $j( '#wpadminbar' ),

	    $stickyTopBar 	= $j( '#dpr-top-bar-wrapper' );

		//$stickyTopHeaderWrapper = $j( '.top-header-wrapper' );



    // Offset adminbar

    if ( $adminBar.length

    	&& $window.width() > 600 ) {

		$offset = $offset + $adminBar.outerHeight();

	}



    // Offset sticky topbar

    if ( true == dpradelineLocalize.useStickyTopBar ) {

		$offset = $offset + $stickyTopBar.outerHeight();

	}



	// Offset top bar wrapper if only menu should be sticked 

	if ( $j( '#dpr-header' ).hasClass( 'only-bottom-sticky' )  ) {

		$offset = $offset -  $j( '.top-header-wrapper' ).outerHeight();

	}



	// If vertical header style

	if ( $j( '#dpr-header' ).hasClass( 'vertical-header' ) ) {

		$offset = $offset;

	}



    // Return

    return $offset;



}



/* ==============================================

WRAP TOP BAR STICKY HEIGHT

============================================== */

function dpradelineWrapTopBarHeight() {

	"use strict"

	// Return if no sticky header

	if ( false == dpradelineLocalize.useStickyHeader ) {

		return;

	}

	// Return if no topbar sticky

	if ( false == dpradelineLocalize.useStickyTopBar ) {

		return;

	}



	// Vars

	var $topBarWrap,

		$topBar 		= $j( '#dpr-top-bar-wrapper' ),

		$topBarHeight 	= $topBar.outerHeight();



	// Add wrap

    $topBarWrap 	= $j( '<div id="dpr-top-bar-sticky-wrapper" class="dpr-adeline-sticky-top-bar-holder"></div>' );

    $topBar.wrapAll( $topBarWrap );

    $topBarWrap     = $j( '#dpr-top-bar-sticky-wrapper' );



    // Add wrap height

    $topBarWrap.css( 'height', $topBarHeight );



}



/* ==============================================

STICKY TOP BAR

============================================== */

function dpradelineStickyTopBar() {

	"use strict"

	// Return if no sticky header

	if ( false == dpradelineLocalize.useStickyHeader ) {

		return;

	}

	// Top bar wrap

	var $topBar = $j( '#dpr-top-bar-wrapper' )



	// Return if no topbar sticky

	if ( ! $topBar.length

		|| false == dpradelineLocalize.useStickyTopBar

		|| ( $window.width() <= 960

			&& true != dpradelineLocalize.useStickyMobile ) ) {

		return;

	}



	// Vars

	var $topBarWrap     = $j( '#dpr-top-bar-sticky-wrapper' ),

    	$adminBar 		= $j( '#wpadminbar' ),

    	$offset 		= 0,

    	$position;



    // Admin bar offset

    if ( $adminBar.length

    	&& $window.width() > 600 ) {

		$offset = $offset + $adminBar.outerHeight();

	}



	// Position

	$position = $topBarWrap.offset().top - $offset;



    // When scrolling

    if ( $windowTop >= $position+300 && 0 !== $windowTop ) {



		// Add sticky wrap class

		$topBarWrap.addClass( 'is-sticky' );



		// Add CSS

		$topBar.css( {

			top 	: $offset,

			width 	: $topBarWrap.width()

		} );



    } else {



		// Remove sticky wrap class

		$topBarWrap.removeClass( 'is-sticky' );



		// Remove CSS

		$topBar.css( {

			top 	: '',

			width 	: ''

		} );



    }



}



/* ==============================================

DESTROY STICKY TOP BAR

============================================== */

function dpradelineDestroyStickyTopBar() {

	"use strict"

	// Return if no sticky header

	if ( false == dpradelineLocalize.useStickyHeader ) {

		return;

	}

	// Return if no topbar sticky

	if ( false == dpradelineLocalize.useStickyTopBar ) {

		return;

	}



	// Vars

	var $topBar 		= $j( '#dpr-top-bar-wrapper' ),

		$topBarWrap 	= $j( '#dpr-top-bar-sticky-wrapper' ),

		$topBarHeight 	= $topBar.outerHeight();



	// Remove sticky wrap class

	$topBarWrap.removeClass( 'is-sticky' );



	// Remove CSS

	$topBar.css( {

		top 	: '',

		width 	: ''

	} );



	// Update header height

	$topBarWrap.css( 'height', $topBarHeight );



}



/* ==============================================

WRAP STICKY HEIGHT

============================================== */

function dpradelineWrapHeight() {

	"use strict"

	// Return if no sticky header

	if ( false == dpradelineLocalize.useStickyHeader ) {

		return;

	}

	// Vars

	var $stickyHeader = dpradelineSiteHeader(),

		$stickyHeaderHeight,

		$headerWrap;



	// Header height

	$stickyHeaderHeight = $stickyHeader.outerHeight();



	// Add wrap

    $headerWrap = $j( '<div id="dpr-header-sticky-wrapper" class="dpr-adeline-sticky-header-holder"></div>' );

    $stickyHeader.wrapAll( $headerWrap );

    $headerWrap = $j( '#dpr-header-sticky-wrapper' );



	// Add wrap height

	if ( ! $j( '#dpr-header' ).hasClass( 'vertical-header' ) ) {

		$headerWrap.css( 'height', $stickyHeaderHeight );

	}



}



/* ==============================================

LOGO HEIGHT

============================================== */

function dpradelineLogoHeight() {

	"use strict"

	// Return if no sticky header

	if ( false == dpradelineLocalize.useStickyHeader ) {

		return;

	}

	// Site logo

	var $siteLogo   = $j( '#dpr-logo img' ),

		$headerWrap = $j( '#dpr-header-sticky-wrapper' ),

		$stickyHeader = $j( '#dpr-header' );



	// If center header style

	if ( $j( '#dpr-header' ).hasClass( 'center-header' ) ) {

		$siteLogo   = $j( '.middle-dpr-logo img' )

	}



	// Return if not shrink style and on some header styles

	if ( 'shrink' != dpradelineLocalize.stickyStyle

		|| ! $siteLogo.length

		|| ! $headerWrap.length

		|| ( $window.width() <= 960

			&& true != dpradelineLocalize.useStickyMobile )

		|| $j( '#dpr-header' ).hasClass( 'vertical-header' )

		|| $j( '#dpr-header' ).hasClass( 'only-bottom-sticky' ) ) {

		return;

	}



	// Vars

	var $logoHeight 		= $siteLogo.actual('height'),

		$shrinkLogoHeight 	= parseInt( dpradelineLocalize.shrinkLogoHeight ),

		$shrinkLogoHeight 	= $shrinkLogoHeight ? $shrinkLogoHeight : 30,

		$position;

		

	// Position

	$position = $headerWrap.offset().top - dpradelineStickyOffset();



	// On scroll

	$window.scroll( function() {



	    // When scrolling

	    if ( $windowTop >= $position && 0 !== $windowTop ) {



	    	$siteLogo.css( {

				'max-height' : $shrinkLogoHeight

			} );



	    } else {

	    	$siteLogo.css( {

				'max-height' : $logoHeight

			} );



	    }



	} );



}



/* ==============================================

ADD STICKY HEADER

============================================== */

function dpradelineAddSticky() {

	"use strict"

	// Return if no sticky header

	if ( false == dpradelineLocalize.useStickyHeader ) {

		return;

	}

	// Header wrapper

	var $headerWrap = $j( '#dpr-header-sticky-wrapper' );



	// Return if no header wrapper or if disabled on mobile

	if ( ! $headerWrap.length

		|| ( $window.width() <= 960

			&& true != dpradelineLocalize.useStickyMobile )

		|| $j( '#dpr-header' ).hasClass( 'vertical-header' ) ) {

		return;

	}



	// Vars

	var $stickyHeader 		= dpradelineSiteHeader(),

		$header 			= $j( '#dpr-header' ),

		$position,

		$positionTwo,

		$slidePosition;



	// Position

	$position 		= $headerWrap.offset().top - dpradelineStickyOffset();

	$slidePosition 	= $position;

	$positionTwo 	= $position + $headerWrap.outerHeight();





    // When scrolling

    if ( $windowTop >= $position+300 && 0 !== $windowTop ) {



		// Add sticky wrap class

		$headerWrap.addClass( 'is-sticky' );



		// Add CSS

		$stickyHeader.css( {

			top 	: dpradelineStickyOffset(),

			width 	: $headerWrap.width()

		} );





    } else {



	// Remove sticky wrap class

	$headerWrap.removeClass( 'is-sticky' );



	// Remove CSS

	$stickyHeader.css( {

		top 	: '',

		width 	: ''

	} );



    }

}



/* ==============================================

ADD STICKY HEADER FOR VERTCIAL HEADER STYLE

============================================== */

function dpradelineAddVerticalHeaderSticky() {

	"use strict"

	// Return if no sticky header

	if ( false == dpradelineLocalize.useStickyHeader ) {

		return;

	}

	// Return if is not vertical header style and transparent

	if ( ! $j( '#dpr-header.vertical-header' ).hasClass( 'is-transparent' ) ) {

		return;

	}



	// Header wrapper

	var $headerWrap = $j( '#dpr-header-sticky-wrapper' );



	// Return if no header wrapper

	if ( ! $headerWrap.length ) {

		return;

	}



	// Position

	var $position = $headerWrap.offset().top;



    // When scrolling

    if ( $windowTop >= $position && 0 !== $windowTop ) {



		// Add sticky wrap class

		$headerWrap.addClass( 'is-sticky' );



    } else {



    	// Remove sticky wrap class

		$headerWrap.removeClass( 'is-sticky' );



    }



}



/* ==============================================

DESTROY STICKY HEADER

============================================== */

function dpradelineDestroySticky() {

	"use strict"

	// Return if no sticky header

	if ( false == dpradelineLocalize.useStickyHeader ) {

		return;

	}

	// Return if is vertical header style

	if ( $j( '#dpr-header' ).hasClass( 'vertical-header' ) ) {

		return;

	}



	// Vars

	var $stickyHeader 	= dpradelineSiteHeader(),

		$headerWrap 	= $j( '#dpr-header-sticky-wrapper' ),

		$header 		= $j( '#dpr-header' ),

		$headerHeight 	= dpradelineSiteHeader().outerHeight();



	// Remove sticky wrap class

	$headerWrap.removeClass( 'is-sticky' );



	// Remove CSS

	$stickyHeader.css( {

		top 	: '',

		width 	: ''

	} );



	// Update header height

	$headerWrap.css( 'height', $headerHeight );



}