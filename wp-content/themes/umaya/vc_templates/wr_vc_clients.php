<?php

$args = array(
    	'class'=>'',
    	
		
);

$html = "";

extract(shortcode_atts($args, $atts));
$html .= '<div class="clients-lines padding-top-90 '.$class.'">';
$html .= do_shortcode($content);
$html .= '</div>';
echo $html;