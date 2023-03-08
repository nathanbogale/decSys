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
    $html .= '<div class="swiper-slide">';
    $html .= '<div class="margin-left-right-20">';
   
    $html .= '<div class="anim-img-scale testimonials-author border-radius-50perc">';
    $html .= '<img class="anim-img-scale__inner" src="'.$umaya_image.'" alt="'.$umaya_title.'">';
	$html .= '</div>';
	$html .= '<p class="quote quote_top margin-top-60 body-text-s">'.do_shortcode($content).'</p>';
    $html .= '<div class="text-right margin-top-20">';
	
	if($clientname != ""){
    $html .= '<span class="subhead-m anim-text-double-fill tr-delay-01" data-text="'.$clientname.'">'.$clientname.'</span><br>';
	}
	if($designation != ""){
    $html .= '<span class="headline-xxxxs margin-top-5 anim-text-double-fill invert tr-delay-03" data-text="'.$designation.'">'.$designation.'</span>';
    }
    $html .= '</div>';
    
    $html .= '</div>';
    $html .= '</div>';
	}
    


echo $html;