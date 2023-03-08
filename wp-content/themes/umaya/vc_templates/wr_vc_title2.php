<?php

$args = array(
		'animation_delay'=>'01',
		'title'=>'',
		'line_break'=>'',
		'ani_type_opt'=>'',
		'text_marking'=>'invert',
		'title_color'=>'text-color-black',
		
		
);

extract(shortcode_atts($args, $atts));

$html = '';
if($ani_type_opt == "st2"){
$html .= '<span class="anim-text-double-fill '.$text_marking.' tr-delay-'.$animation_delay.'" data-text="'.do_shortcode($title).'">'.do_shortcode($title).' </span> ';
}
else {
$html .= '<span class="anim-text-fill '.$title_color.' tr-delay-'.$animation_delay.'" data-text="'.do_shortcode($title).'">'.do_shortcode($title).' </span> ';
}
if($line_break == "st2"){
$html .= '<br>';
}



 
echo $html;