<?php

$args = array(
		'class'=>'',
		'title'=>'Add Section Title',
		'animation_delay'=>'01',
		'data_title_1'=>'',
		'data_title_1_icon'=>'check',
		'data_title_2'=>'',
		'data_title_2_icon'=>'check',
		'data_title_3'=>'',
		'data_title_3_icon'=>'check',
		'data_title_4'=>'',
		'data_title_4_icon'=>'check',
		'data_title_5'=>'',
		'data_title_5_icon'=>'check',
		'data_title_6'=>'',
		'data_title_6_icon'=>'check',
		'data_title_7'=>'',
		'data_title_7_icon'=>'check',
);

extract(shortcode_atts($args, $atts));
		$data_icon_1 ='';
		if($data_title_1_icon == "x"){
		$data_icon_1 .='x opacity-05';
		}
		else {
		$data_icon_1 .='check red';
		}
		$data_icon_2 ='';
		if($data_title_2_icon == "x"){
		$data_icon_2 .='x opacity-05';
		}
		else {
		$data_icon_2 .='check red';
		}
		$data_icon_3 ='';
		if($data_title_3_icon == "x"){
		$data_icon_3 .='x opacity-05';
		}
		else {
		$data_icon_3 .='check red';
		}
		$data_icon_4 ='';
		if($data_title_4_icon == "x"){
		$data_icon_4 .='x opacity-05';
		}
		else {
		$data_icon_4 .='check red';
		}
		$data_icon_5 ='';
		if($data_title_5_icon == "x"){
		$data_icon_5 .='x opacity-05';
		}
		else {
		$data_icon_5 .='check red';
		}
		$data_icon_6 ='';
		if($data_title_6_icon == "x"){
		$data_icon_6 .='x opacity-05';
		}
		else {
		$data_icon_6 .='check red';
		}
		$data_icon_7 ='';
		if($data_title_7_icon == "x"){
		$data_icon_7 .='x opacity-05';
		}
		else {
		$data_icon_7 .='check red';
		}
$html = '';

	$html .= '<div class="accordion__tab js-accordion-tab">';		
	$html .= '<div class="accordion__btn js-accordion-btn js-pointer-large">
			  <h6 class="accordion__btn-title headline-xxxxs">'.esc_html($title).'</h6>
			 </div>';		
	$html .= '<div class="accordion__content js-accordion-content">';		
	$html .= '<ul class="list list_center text-color-b0b0b0 subhead-xxs">';	
	if($data_title_1 != ""){	
	$html .= '<li class="list__item '.$data_icon_1.'">'.esc_html($data_title_1).'</li>';
	}	
	if($data_title_2 != ""){	
	$html .= '<li class="list__item '.$data_icon_2.'">'.esc_html($data_title_2).'</li>';
	}
	if($data_title_3 != ""){	
	$html .= '<li class="list__item '.$data_icon_3.'">'.esc_html($data_title_3).'</li>';
	}
	if($data_title_4 != ""){	
	$html .= '<li class="list__item '.$data_icon_4.'">'.esc_html($data_title_4).'</li>';
	}
	if($data_title_5 != ""){	
	$html .= '<li class="list__item '.$data_icon_5.'">'.esc_html($data_title_5).'</li>';
	}
	if($data_title_6 != ""){	
	$html .= '<li class="list__item '.$data_icon_6.'">'.esc_html($data_title_6).'</li>';
	}
	if($data_title_7 != ""){	
	$html .= '<li class="list__item '.$data_icon_7.'">'.esc_html($data_title_7).'</li>';
	}
	$html .= '</ul>';		
	$html .= '</div>';		
	$html .= '</div>';		

echo $html;