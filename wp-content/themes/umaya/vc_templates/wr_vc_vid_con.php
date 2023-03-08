<?php

$args = array(
		'iconname'=>'',
		'title'=>'',
		'image'=>'',
		'companyname'=>'',
		'clientname'=>'',
		'designation'=>'',
		'video_position'=>'',
		'video_url'=>'',
		
		
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
	if($video_url != ""){
	$html .= '<div class="swiper-slide">';
	if($video_position == "st2"){
    $html .= '<div class="flex-container reverse flex-align-center margin-left-right-10">';
    $html .= '<div class="six-columns column-100-100 padding-top-30">';
    $html .= '<div class="column-r-margin-40-999">';
    $html .= '<h3 class="subhead-m">'.$title.'</h3>';
    $html .= '<div class="body-text-s text-color-dadada margin-top-20"> '.do_shortcode($content).'</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '<div class="six-columns column-100-100 padding-top-30 pos-rel">';
    $html .= '<div class="anim-img-scale">
			<img class="anim-img-scale__inner" src="'.esc_url($umaya_image).'" alt="'.esc_attr($umaya_title).'">
			<div class="bg-overlay-black"></div>
			</div>
			<a href="'.esc_url($video_url).'" class="play-button js-popup-youtube js-pointer-large">
													<span class="play-button__inner"></span>
			</a>';
    $html .= '</div>';
    $html .= '</div>';
	}
	else {
	$html .= '<div class="flex-container flex-align-center margin-left-right-10">';
	$html .= '<div class="six-columns column-100-100 padding-top-30 pos-rel">';
	$html .= '<div class="anim-img-scale">
			<img class="anim-img-scale__inner" src="'.esc_url($umaya_image).'" alt="'.esc_attr($umaya_title).'">
			<div class="bg-overlay-black"></div>
			</div>
			<a href="'.esc_url($video_url).'" class="play-button js-popup-youtube js-pointer-large">
			<span class="play-button__inner"></span>
			</a>';
	$html .= '</div>';
	$html .= '<div class="six-columns column-100-100 padding-top-30">';
	$html .= '<div class="column-l-margin-40-999">';
	$html .= '<h3 class="subhead-m">'.$title.'</h3>';
    $html .= '<div class="body-text-s text-color-dadada margin-top-20"> '.do_shortcode($content).'</div>';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';
	}
	$html .= '</div>';
	}
	}
    


echo $html;