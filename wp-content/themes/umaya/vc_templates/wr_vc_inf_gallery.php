<?php

$args = array(
		'iconname'=>'',
		'title'=>'',
		'image'=>'',
		'image2'=>'',
		'top_padding_2'=>'',
		'top_padding'=>'',
		
		
		
);

extract(shortcode_atts($args, $atts));
		if(is_numeric($image)) {
            $umaya_image = wp_get_attachment_url( $image );
            $umaya_title = get_the_title( $image );
        }else {
            $umaya_image = $image;
            $umaya_title = $image;
        }
		
		if(is_numeric($image2)) {
            $umaya_image2 = wp_get_attachment_url( $image2 );
            $umaya_title2 = get_the_title( $image2 );
        }else {
            $umaya_image2 = $image2;
            $umaya_title2 = $image2;
        }
	$html = '';
	$class1 = '';
	$class2 = '';
	if($top_padding == "st2"){
	$class1 = 'class=padding-top-20';
	}
	if($top_padding_2 == "st2"){
	$class2 = 'class=padding-top-20';
	}
	$html .= '<div class="swiper-slide">';
	if(is_numeric($image)) {
    $html .= '<img '.esc_attr($class1).' src="'.esc_url($umaya_image).'" alt="'.esc_attr($umaya_title).'">';
	}
	if(is_numeric($image2)) {
    $html .= '<img '.esc_attr($class2).' src="'.esc_url($umaya_image2).'" alt="'.esc_attr($umaya_title2).'">';
	}
    $html .= '</div>';
  
    


echo $html;