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


    if(is_numeric($image)) {
    $html .= '<div class="swiper-slide slide-opacity-anim">';
   
    $html .= '<div class="anim-img-scale testimonials-author border-radius-50perc">';
    $html .= '<img class="anim-img-scale__inner" src="'.$umaya_image.'" alt="'.$umaya_title.'">';
	$html .= '</div>';
	
    $html .= '<div class="margin-left-right-10 text-center">';
	$html .= '<p class="body-text-m margin-top-60">'.do_shortcode($content).'</p>';
	if($clientname != ""){
    $html .= '<span class="headline-xxxs margin-top-20 anim-text-fill tr-delay-01" data-text="'.$clientname.'">'.$clientname.'</span><br>';
	}
	if($designation != ""){
    $html .= '<span class="subhead-xxs margin-top-5 anim-text-fill tr-delay-03" data-text="'.$designation.'">'.$designation.'</span>';
	}
    $html .= '</div>';
    
    $html .= '</div>';
	}
    


echo $html;