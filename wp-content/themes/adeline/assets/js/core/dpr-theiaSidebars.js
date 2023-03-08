var $j = jQuery.noConflict();

$j( document ).on( 'ready', function() {

	"use strict";

	//Theia Sidebars

	dpr_TheiaSidebars();

} );

/* ==============================================

THEIA SIDEBARS

============================================== */



function dpr_TheiaSidebars() {

    "use strict"

	

	//Var

	var $marginTop = 50;

	

	if ($j("body").hasClass("admin-bar")) {

      $marginTop += 32;

	}

	if ($j("body").hasClass("sticky-header-enabled")) {

      $marginTop += $j("#dpr-header").outerHeight();

	}



	

	$j('.theia-sidebar')

		.theiaStickySidebar({

			additionalMarginTop: $marginTop

	  });

}

