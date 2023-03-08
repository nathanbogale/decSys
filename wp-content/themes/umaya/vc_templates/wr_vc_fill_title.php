<?php

$args = array(
		'animation_delay'=>'01',
		'title'=>'',
		'line_break'=>'',
		'ani_back'=>'white',
		
		
);

extract(shortcode_atts($args, $atts));

$html = '';

$html .= '<span class="list__item">';
$html .= '<span  class="anim-overlay '.$ani_back.' tr-delay-'.$animation_delay.'" >'.do_shortcode($title).'</span>';
$html .= '</span>';



 
echo $html;