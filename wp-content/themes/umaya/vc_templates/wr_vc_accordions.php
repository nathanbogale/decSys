<?php

$args = array(
    	'class'=>'',
    	'active'=>'js-accordion-first-active',
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		
		$html .= '<div class="accordion accordion_underline js-accordion '.$active.' margin-top-60 '.$class.'">';
		$html .= do_shortcode($content);
		$html .= '</div>';
		
		


echo $html;