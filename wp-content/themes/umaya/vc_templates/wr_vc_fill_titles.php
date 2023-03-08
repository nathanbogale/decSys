<?php

$args = array(
			
			'text_align'=>'text-center',
			'title_style'=>'headline-l',
			'padding_top'=>'no-top-padding',
			'padding_bottom'=>'no-bottom-padding',
			'title_color'=>'text-color-black',
			
			
		
);

$html = "";

extract(shortcode_atts($args, $atts));
$html .= '<div class="js-scrollanim">';		
$html .= '<h3 class="headline-xxxs list list_margin-1px '.$title_color.' '.$title_style.' '.$padding_bottom.' '.$padding_top.' '.$text_align.'">';
$html .= do_shortcode($content);
$html .= '</h3>';
$html .= '</div>';


		


echo $html;