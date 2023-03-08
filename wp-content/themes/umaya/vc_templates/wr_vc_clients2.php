<?php

$args = array(
    	'class'=>'',
    	
		
);

$html = "";

extract(shortcode_atts($args, $atts));
$html .= '<div class="column-100-100 flex-container '.$class.'">';
$html .= do_shortcode($content);
$html .= '</div>';
echo $html;