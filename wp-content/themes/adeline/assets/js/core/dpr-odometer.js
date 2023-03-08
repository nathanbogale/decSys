var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

	// Custom select

	dpradelineOdometer();

} );



/* ==============================================

CUSTOM SELECT

============================================== */

function dpradelineOdometer() {

	"use strict"



			$j('.counter-numbers').each(function () {

				var $self =  $j(this);

					var $anim = $self.data('animation');

					if('none' != $anim) {

						if ('counter' == $anim){

							var odometer = new Odometer({el: $self[0], animation: 'count' });

						} else {

							var odometer = new Odometer({el: $self[0]});

						}



						$j(this).on('on-in-viewport', function () {

							odometer.update($j(this).data('count'));

						});

					}

				}

			);



}