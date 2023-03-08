<?php

$args = array(
			
			'text_align'=>'text-center',
			'title_style'=>'headline-l',
			'padding_top'=>'no-top-padding',
			'padding_bottom'=>'no-bottom-padding',
			
			
		
);

$html = "";

extract(shortcode_atts($args, $atts));
		
$html .= '<h2 class=" js-scrollanim '.$title_style.' '.$padding_bottom.' '.$padding_top.' '.$text_align.'">';
$html .= do_shortcode($content);
$html .= '</h2>';

		


echo $html;