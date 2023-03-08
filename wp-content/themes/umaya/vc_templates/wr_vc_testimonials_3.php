<?php

$args = array(
    	'class'=>'',
		'boxsize'=>'',
		'boxheight'=>'',
		'title'=>'',
		'iconclass'=>'',
		'autoplay'=>'',
		'slider_speed'=>'1200',
		'slider_column'=>'',
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		$html .= '<div class="column-100-100 hidden-box">';
		if($slider_column == "st2"){
		$html .= '<div class="js-3-view-slider padding-bottom-90 hidden-box pos-rel slider-gradient-l-r '.esc_attr($class).'">';
		} 
		else {
		$html .= '<div class="slider-gradient-right hidden-box pos-rel js-1-view-slider padding-bottom-90 '.esc_attr($class).'">';
		}
		$html .= '<div class="swiper-wrapper js-slider-scroll-anim">';
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