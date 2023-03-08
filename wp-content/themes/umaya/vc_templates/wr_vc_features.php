<?php

$args = array(
    	'title'=>'',
    	'top_padding'=>'margin-top-60',
		'text_color'=>'text-color-black',
		'font_style'=>'subhead-xxs',
);

$html = "";

extract(shortcode_atts($args, $atts));
		
		$html .= '<div class="column-100-100 js-isotope-grid-box">';
		$html .= '<div class="js-isotope-grid-item empty-grid-1px-50-50-none"></div>
				  <div class="js-isotope-grid-item empty-grid-100px-50-50-none"></div>';
		$html .= do_shortcode($content);
		$html .= '</div>';
		

	


echo $html;