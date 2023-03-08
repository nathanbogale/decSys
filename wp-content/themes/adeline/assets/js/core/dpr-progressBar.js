var $j = jQuery.noConflict();



// On ready

$j( document ).on( 'ready', function() {

	"use strict";

	// Vertical header style

	dpradelineProgressBar();



} );

$j('body').on('post-load', dpradelineProgressBar);



/* ==============================================

PROGRESS BAR FUBCTION

============================================== */

function dpradelineProgressBar() {

	"use strict"



			$j('.dpr-progress-bar').each(function () {

				var $current = $j(this);

				if(!$current.hasClass('progress-inited')) {

					$current.addClass('progress-inited')

					$current.waypoint(function () {

						var bar = $current.find('.indicator'),

							val = bar.data('percentage-value'),

							$text = $current.find('.title-wrap');



						setTimeout(function () {

							bar.css({"width": val + '%'});

						}, 100);



						setTimeout(function() {

							$text.addClass('active');

						},1100);

					}, {offset: '85%'});

				}

			});



}