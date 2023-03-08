<?php

$args = array(
		'animation_delay'=>'01',
		'title'=>'',
		'line_break'=>'',
		
		
);

extract(shortcode_atts($args, $atts));

$html = '';

$html .= '<span class="hidden-box d-block">';
$html .= '<span  class="anim-slide tr-delay-'.$animation_delay.'" >'.do_shortcode($title).'</span>';
$html .= '</span>';



 
echo $html;