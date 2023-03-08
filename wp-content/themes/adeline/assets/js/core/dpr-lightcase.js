var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

	// Initialise Lightcase

	dpradelineLightcase();

} );



/* ==============================================

LIGHTCASE

============================================== */

function dpradelineLightcase() {

	"use strict"



	$j('a[data-rel^=lightcase]').lightcase({

        maxWidth: 1200,

        maxHeight: 1200,

		overlayOpacity: 1,

        transition: 'elastic',

        showSequenceInfo: true,

        showCaption: false,

		showTitle: false

    });

	$j('a[data-rel^=portfoliogrid]').lightcase({

        maxWidth: 1200,

        maxHeight: 1200,

		overlayOpacity: 1,

        transition: 'elastic',

        showSequenceInfo: true,

        showCaption: false,

		showTitle: true

    });

}