<?php

$args = array(
		'sc_name'=>'Add Title',
		'sc_url'=>'',
		'animation_delay'=>'',
		
		
);

extract(shortcode_atts($args, $atts));
		
$html = '';


    if($sc_url != ""){
		$html .= '<li class="list__item hidden-box">
				<div class="hover-slide tr-delay-'.esc_attr($animation_delay).'">
				<a href="'.esc_url($sc_url).'" class="flip-btn js-pointer-small" data-text="'.esc_attr($sc_name).'">'.esc_html($sc_name).'</a>
				</div>
				</li>';
	}
  
    


echo $html;