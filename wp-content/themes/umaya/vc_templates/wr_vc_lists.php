<?php

$args = array(
    	'title'=>'',
    	'class'=>'',
    	'top_padding'=>'margin-top-60',
		'text_color'=>'text-color-black',
		'font_style'=>'subhead-xxs',
);

$html = "";

extract(shortcode_atts($args, $atts));
		
		$html .= '<ul class="'.esc_attr($class).' list  js-scrollanim '.$font_style.' '.$text_color.' '.$top_padding.'">';
		$html .= do_shortcode($content);
		$html .= '</ul>';
		

	


echo $html;