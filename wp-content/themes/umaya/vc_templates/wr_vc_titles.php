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
		

$html .= '<h2 class="column-l-r-margin-10s '.$title_color.' js-scrollanim '.$title_style.' '.$padding_bottom.' '.$padding_top.' '.$text_align.'">';
$html .= do_shortcode($content);
$html .= '</h2>';

		


echo $html;