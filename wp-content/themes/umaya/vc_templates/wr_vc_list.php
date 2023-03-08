<?php

$args = array(
		'animation_delay'=>'04',
		'list_style'=>'red',
		
		
);

extract(shortcode_atts($args, $atts));
		
$html = '';
$html .= '<li class="list__item '.$list_style.' dot hidden-box ">
			<div class="list-line-height anim-slide tr-delay-'.$animation_delay.'">'.$content.'</div>
		</li>';

echo $html;