<?php

$args = array(
		'iconname'=>'',
		'title'=>'',
		'image'=>'',
		'companyname'=>'',
		'membername'=>'',
		'designation'=>'',
		
		
);

extract(shortcode_atts($args, $atts));
		if(is_numeric($image)) {
            $umaya_image = wp_get_attachment_url( $image );
            $umaya_title = get_the_title( $image );
        }else {
            $umaya_image = $image;
            $umaya_title = $image;
        }
$html = '';


    if(is_numeric($image)) {
    $html .= '<div class="swiper-slide">';
		$html .= '<div class="anim-img-scale hover-box">';
		$html .= '<img class="anim-img-scale__inner" src="'.$umaya_image.'" alt="'.$umaya_title.'">';
		$html .= '<ul class="list pos-abs pos-left-top">';
		$html .= do_shortcode($content);
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '<div class="margin-top-20 margin-left-20">';
		if($membername != ""){
		$html .= '<h4 class="subhead-m anim-text-double-fill tr-delay-01" data-text="'.esc_attr($membername).'">'.esc_html($membername).'</h4><br>';
		}
		if($designation != ""){
		$html .= '<p class="headline-xxxxs margin-top-5 anim-text-double-fill invert tr-delay-03" data-text="'.esc_attr($designation).'">'.esc_html($designation).'</p>';
		}
		$html .= '</div>';
    $html .= '</div>';
	}
  
    


echo $html;