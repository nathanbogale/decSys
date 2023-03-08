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
    $html .= '<div class="padding-top-60 grid-item-50-50-100 js-isotope-grid-item">';
    $html .= '<div class="grid-margin-box">';
	$html .= '<img class="anim-fade js-scrollanim" src="'.$umaya_image.'" alt="'.$umaya_title.'">';
		
		$html .= '<div class="margin-top-10 list list_margin-1px js-scrollanim">';
		if($membername != ""){
		$html .= '<h4 class="list__item">
					<span class="hidden-box d-inline-block">
					<span class="subhead-s text-color-red anim-reveal red">'.esc_html($membername).'</span>
					</span>
				</h4>';
		}
		if($designation != ""){
		$html .= '<p class="list__item">
					<span class="hidden-box d-inline-block">
						<span class="headline-xxxxs text-color-black anim-reveal black tr-delay-02">'.esc_html($designation).'</span>
					</span>
				</p>';
		}
		$html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
	}
  
    


echo $html;