<?php

$args = array(
    	'class'=>'',
		'boxsize'=>'',
		'boxheight'=>'',
		'title'=>'',
		'iconclass'=>'',
		'autoplay'=>'',
		'slider_speed'=>'1200',
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		$html .= '<div class="hidden-box pos-rel padding-bottom-90 '.$class.'">';
		$html .= '<div class="js-3-view-slider margin-left-right-10">';
		$html .= '<div class="swiper-wrapper">';
		$html .= do_shortcode($content);
		$html .= '</div>';
		$html .= '<div class="swiper-button-prev-box">
								<div class="swiper-button-prev"></div>
							</div><!-- swiper-button-prev end -->
							<!-- swiper-button-next start -->
							<div class="swiper-button-next-box">
								<div class="swiper-button-next"></div>
							</div><!-- swiper-button-next end -->

							<!-- swiper-pagination start -->
							<div class="pagination-box">
								<div class="swiper-pagination counter-pagination"></div>
							</div>';
		$html .= '</div>';
		$html .= '</div>';
		


echo $html;