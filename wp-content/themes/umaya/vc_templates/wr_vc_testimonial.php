<?php

$args = array(
		'iconname'=>'',
		'title'=>'',
		'image'=>'',
		'companyname'=>'',
		'clientname'=>'',
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


    
    $html .= '<div class="swiper-slide slide-scale-anim">';
    $html .= '<div class="margin-left-right-20 padding-left-right-40 padding-top-bottom-40 content-bg-light-2 border-radius-10px">';
	$html .= '<p class="margin-bottom-30 quote quote_bottom body-text-m text-color-black text-center">'.do_shortcode($content).'</p>';
	if(is_numeric($image)) {
    $html .= '<div class="anim-img-scale testimonials-author border-radius-50perc">';
    $html .= '<img src="'.$umaya_image.'" alt="'.$umaya_title.'">';
	$html .= '</div>';
	}
    $html .= '<div class="margin-top-20 text-center">';
	if($clientname != ""){
    $html .= '<span class="headline-xxxs text-color-black">'.$clientname.'</span><br>';
	}
	if($designation != ""){
    $html .= '<span class="subhead-xxs text-color-888888">'.$designation.'</span>';
	}
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
  
    


echo $html;