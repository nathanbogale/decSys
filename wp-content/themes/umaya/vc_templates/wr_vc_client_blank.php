<?php

$args = array(
		'data_title_1'=>'',
		'data_title_2'=>'',
		'data_title_3'=>'',
		'button_url'=>'#',
		'button_target'=>'',
		'border_color'=>'b_gray',
		
);

extract(shortcode_atts($args, $atts));

$html = '';
$solonick_image = '';
$solonick_alt = '';
	$link_target_opt ='';
		if($button_target == "_blank"){
		$link_target_opt .='_blank';
		}
		else if($button_target == "_parent"){
		$link_target_opt .='_parent';
		}
		else if($button_target == "_top"){
		$link_target_opt .='_top';
		}
		else {
		$link_target_opt .='_self';
		}

		




$html .= '<a href="'.$button_url.'" target="'.$link_target_opt.'" class="clients-lines__column js-pointer-large">';
$html .= '<div class="clients-lines__inner hover-box pos-rel js-scrollanim '.esc_attr($border_color).'">';
$html .= '<div class="padding-left-right-20 subhead-xxs text-center pos-abs pos-center-center">';
if($data_title_1 != ""){
$html .= '<span class="anim-text-double-fill"  data-text="'.$data_title_1.'">'.$data_title_1.'</span><br>';
}
if($data_title_2 != ""){
$html .= '<span class="anim-text-double-fill tr-delay-02"  data-text="'.$data_title_2.'">'.$data_title_2.'</span><br>';
}
if($data_title_3 != ""){
$html .= '<span class="anim-text-double-fill tr-delay-04" data-text="'.$data_title_3.'">'.$data_title_3.'</span>';
}
$html .= '</div>';
$html .= '<div class="border-left-anim in-10px red"></div>
		<div class="border-top-anim in-10px red"></div>
		<div class="border-right-anim in-10px red"></div>
		<div class="border-bottom-anim in-10px red"></div>';
$html .= '</div>';
$html .= '</a>';


 
echo $html;