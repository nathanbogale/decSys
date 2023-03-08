<?php

$args = array(
		'animation_delay'=>'01',
		'title'=>'',
		'line_break'=>'',
		'text_marking'=>'invert',
		
		
);

extract(shortcode_atts($args, $atts));

$html = '';

$html .= '<span class="anim-text-double-fill black '.$text_marking.'  tr-delay-'.$animation_delay.'" data-text="'.do_shortcode($title).'">'.do_shortcode($title).'</span>';
if($line_break == "st2"){
$html .= '<br>';
}


 
echo $html;