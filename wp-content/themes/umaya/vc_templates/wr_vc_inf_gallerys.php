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

		
		$html .= '<div class="js-infinite-slider about-slider hidden-box '.esc_attr($class).'">';
		
			$html .= '<div class="swiper-wrapper">';
			$html .= do_shortcode($content);
			
		$html .= '</div>';
		$html .= '</div>';
		
	


echo $html;