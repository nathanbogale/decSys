var $j = jQuery.noConflict();

$j( document ).on( 'ready', function() {

	"use strict";

	// Masonry

	dpr_portfolioMasonry();

    // Isotope

    dpr_portfolioIsotope();

	// Gallery

    dpr_portfolioGallery();

	//Hide Category Filter

	dpr_portfolioHidefilter();


} );



// Run on orientation change

$j( window ).on( 'orientationchange', function() {

	"use strict";

	// Masonry

	dpr_portfolioMasonry();

	// Isotope

	dpr_portfolioIsotope();

	// Gallery

    dpr_portfolioGallery();

} );



$window.on( 'load', function() {

	"use strict";

	if ( $j.fn.infiniteScroll !== undefined && $j( 'div.portfolio-infinite-scroll-nav' ).length ) {

		// Infinite scroll

		dpradelinePortfolioInfiniteScrollInit();

		

	}



} );

$window.on( 'load', function() {

	"use strict";

	if ( $j.fn.infiniteScroll !== undefined && $j( 'div.portfolio-load-more-scroll-nav' ).length ) {

		// Infinite scroll

		dpradelinePortfolioLoadMoreInit();

	}



} );





/* ==============================================

MASONRY

============================================== */

function dpr_portfolioMasonry() {

	"use strict"



	// Make sure scripts are loaded

    if ( undefined == $j.fn.imagesLoaded || undefined == $j.fn.isotope ) {

        return;

    }



    // Loop through items

    $j( '.portfolio-items.masonry-grid .portfolio-wrap' ).each( function() {



        // Var

        var $wrap = $j( this );



        // Run only once images have been loaded

        $wrap.imagesLoaded( function() {



            // Create the isotope layout

            var $grid = $wrap.isotope( {

                itemSelector       : '.portfolio-item',

                transformsEnabled  : true,

                isOriginLeft       : dpradelineLocalize.isRTL ? false : true,

                transitionDuration : '0.4s',

                layoutMode         : 'masonry'

            } );



        } );



    } );



}



/* ==============================================

SiNGLE PORTFOLIO GALLERY

============================================== */

function dpr_portfolioGallery() {

	"use strict"



	// Make sure scripts are loaded

    if ( undefined == $j.fn.imagesLoaded || undefined == $j.fn.isotope ) {

        return;

    }



    // Loop through items

    $j( '.single-portfolio-gallery' ).each( function() {



        // Var

        var $wrap = $j( this );



        // Run only once images have been loaded

        $wrap.imagesLoaded( function() {



            // Create the isotope layout

            var $grid = $wrap.isotope( {

                itemSelector       : '.grid-item',

                transformsEnabled  : true,

                isOriginLeft       : dpradelineLocalize.isRTL ? false : true,

                transitionDuration : '0.4s',

                layoutMode         : $wrap.data( 'layout' ) ? $wrap.data( 'layout' ) : 'masonry'

            } );



        } );



    } );



}





/* ==============================================

ISOTOPE

============================================== */

function dpr_portfolioIsotope() {

	"use strict"



	// Make sure scripts are loaded

    if ( undefined == $j.fn.imagesLoaded || undefined == $j.fn.isotope ) {

        return;

    }



    // Loop through items

    $j( '.portfolio-items.isotope-grid .portfolio-wrap' ).each( function() {



        // Var

        var $wrap = $j( this );



        // Run only once images have been loaded

        $wrap.imagesLoaded( function() {



            // Create the isotope layout

            var $grid = $wrap.isotope( {

                itemSelector       : '.portfolio-item',

                transformsEnabled  : true,

                isOriginLeft       : dpradelineLocalize.isRTL ? false : true,

                transitionDuration : '0.4s',

                layoutMode         : $wrap.data( 'layout' ) ? $wrap.data( 'layout' ) : 'masonry'

            } );



            // Filter links

            var $filter = $wrap.prev( 'ul.portfolio-filters' );

            if ( $filter.length ) {



                var $filterLinks = $filter.find( 'a' );



                $filterLinks.on( "click", function() {



                    $grid.isotope( {

                        filter : $j( this ).attr( 'data-filter' )

                    } );



                    $j( this ).parents( 'ul' ).find( 'li' ).removeClass( 'active' );

                    $j( this ).parent( 'li' ).addClass( 'active' );



                    return false;



                } );



            }



        } );



    } );



}





/* ==============================================

HIDE FILTER BUTTONS

============================================== */

function dpr_portfolioHidefilter() {

    "use strict"

	// Loop through filters tabs

 $j( '.portfolio-filters li a' ).each( function() {



        // Var

        var $filterTab = $j( this );

		var $filter = $filterTab.attr('data-filter');

		var $present = false;

		var $container = $j( this ).closest( '.portfolio-items' );

		if ($j($container).find($filter).length > 0){ 

		 	$present = true;

		}			

		if ($present == false ) $j( this ).parent().hide()

		if ($present == true ) $j( this ).parent().show()

 	});

}



/* ==============================================

INFINITE SCROLL

============================================== */

function dpradelinePortfolioInfiniteScrollInit() {

	"use strict"



	// Get infinite scroll container

	var $container = $j( '.infinite-scroll-wrapper' );



	// Start infinite sccroll

	$container.infiniteScroll( {

		path 	: '.older-posts a',

		append 	: '.portfolio-item',

		status 	: '.scroller-status',

		hideNav : '.infinite-scroll-nav',

		history : false,

	} );

	$container.on( 'append.infiniteScroll', function( event, response, path, items ) {

  		dpr_portfolioHidefilter();

	});

	$container.on( 'load.infiniteScroll', function( event, response, path, items ) {

		var $items = $j( response ).find( '.portfolio-item' );

		$items.imagesLoaded( function() {



			// Isotope

				$container.isotope( 'appended', $items );

				$items.css( 'opacity', 0 );

				dpradelineLightcase( $items );

			// Animate new Items

			$items.animate( {

				opacity : 1

			} );

		} );



	} );



}



/* ==============================================

INFINITE SCROLL WITH LOAD MORE BUTTON

============================================== */

function dpradelinePortfolioLoadMoreInit() {

	"use strict"



	// Get infinite scroll container

	var $container = $j( '.infinite-scroll-wrapper' );



	// Start infinite sccroll

	$container.infiniteScroll( {

		path 	: '.older-posts a',

		append 	: '.portfolio-item',

		status 	: '.scroller-status',

		hideNav : '.load-more-scroll-nav',

		button: '.dp-adeline-loadmore-button',

  		scrollThreshold: false,

		history : false,

	} );

	$container.on( 'append.infiniteScroll', function( event, response, path, items ) {

  		dpr_portfolioHidefilter();

	});

	$container.on( 'load.infiniteScroll', function( event, response, path, items ) {



		var $items = $j( response ).find( '.portfolio-item' );



		$items.imagesLoaded( function() {



			// Isotope

			$container.isotope( 'appended', $items );

			$items.css( 'opacity', 0 );

			dpradelineLightcase( $items );

			// Animate new Items

			$items.animate( {

				opacity : 1

			} );





		} );



	} );

}