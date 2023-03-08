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

		
		$html .= '<div class="js-3-view-slider padding-top-bottom-90 hidden-box pos-rel '.esc_attr($class).'">';
		
			$html .= '<div class="swiper-wrapper js-slider-scroll-anim">';
			$html .= do_shortcode($content);
			$html .= '</div>';
		
		$html .= '<!-- swiper-button-prev start -->
						<div class="swiper-button-prev-box">
							<div class="swiper-button-prev"></div>
						</div><!-- swiper-button-prev end -->
						<!-- swiper-button-next start -->
						<div class="swiper-button-next-box">
							<div class="swiper-button-next"></div>
						</div><!-- swiper-button-next end -->

						<!-- swiper-pagination start -->
						<div class="pagination-box">
							<div class="swiper-pagination counter-pagination"></div>
						</div><!-- swiper-pagination end -->';
		$html .= '</div>';
		
	


echo $html;