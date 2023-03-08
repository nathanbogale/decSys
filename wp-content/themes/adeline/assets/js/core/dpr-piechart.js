var $j = jQuery.noConflict();



$j( document ).on( 'ready', function() {

	"use strict";

	// Custom select

	dpradelinePieChart();

} );



/* ==============================================

CUSTOM SELECT

============================================== */

function dpradelinePieChart() {

	"use strict"

	

		$j('.dpr-piechart').each(function () {

			var $chart = $j(this);

			$chart.on('on-in-viewport', function () {

				if (!$chart.hasClass('finished')) {

					var $animation = {duration: 1700};

					var number_html = $chart.find('.piechart-number');

					if ($chart.hasClass('no-animation')){

						$animation = {duration: 0};

					}

					if ( false == $animation ){

						number_html.html(number_html.data('max') +  '<span>'+number_html.data('units')+'</span>');

						$chart.addClass('finished');

					}

					$chart.circleProgress({

							startAngle: -Math.PI / 4 * 2,

							emptyFill: $chart.data('emptyfill'),

							animation: $animation

						}

					).on('circle-animation-progress', function (event, progress) {

						number_html.html(parseInt((number_html.data('max')) * progress) + '<span>'+number_html.data('units')+'</span>'

						);

					}).on('circle-animation-end', function (event) {

						$chart.addClass('finished');

					});

				}

			});

		});



}