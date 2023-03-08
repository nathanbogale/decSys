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

		
		$html .= '<div class="column-100-100 padding-top-30 js-isotope-grid-box '.esc_attr($class).'">';
		$html .= '<div class="js-isotope-grid-item empty-grid-1px-50-50-none"></div>
				<div class="js-isotope-grid-item empty-grid-100px-50-50-none"></div>';
		$html .= do_shortcode($content);
		$html .= '</div>';
		
	


echo $html;