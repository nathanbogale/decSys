<?php

$args = array(
    	'class'=>'',
    	
		
);

$html = "";

extract(shortcode_atts($args, $atts));
$html .= '<div class="js-infinite-slider hidden-box '.$class.'">';
$html .= '<div class="swiper-wrapper">';
$html .= do_shortcode($content);
$html .= '</div>';
$html .= '</div>';
echo $html;