<?php

$args = array(
    	'class'=>'',
    	'title'=>'Basic plan',
    	'price'=>'',
    	'period'=>'',
    	'button_text'=>'Sign up',
    	'button_link'=>'',
    	'link_target'=>'',
    	'active'=>'',
    	'sign'=>'$',
    	'footertext'=>'',
    	'iconclass'=>'icon-wallet',
);

		$html = "";
		

extract(shortcode_atts($args, $atts));
		$link_target_opt ='';
		if($link_target == "_blank"){
		$link_target_opt .='_blank';
		}
		else if($link_target == "_parent"){
		$link_target_opt .='_parent';
		}
		else if($link_target == "_top"){
		$link_target_opt .='_top';
		}
		else {
		$link_target_opt .='_self';
		}
		$pricing_active_title ='';
		$pricing_active_margin ='';
		$pricing_active_button ='';
		if($active == "st2"){
		$pricing_active_title .='padding-top-bottom-40';
		$pricing_active_margin .='';
		$pricing_active_button .='ellipse-btn_red';
		}
		else {
		$pricing_active_title .='padding-top-bottom-20';
		$pricing_active_margin .='price-top-offset';
		}

$html .= '<div class="padding-top-60">';
$html .= '<div class="'.$pricing_active_margin.' content-bg-dark-2 border-radius-10px hidden-box border-box-2">';
$html .= '<div class="text-center content-bg-red">
		<h3 class="subhead-m '.esc_attr($pricing_active_title).'">'.esc_html($title).'</h3>
		</div>';
$html .= '<h4 class="text-center padding-top-bottom-50">';
$html .= '<span class="headline-l">'.esc_html($price).'</span><br>';
$html .= '<span class="subhead-xs">'.esc_html($period).'</span>';
$html .= '</h4>';
$html .= '<div class="accordion js-accordion margin-left-right-20">';
$html .= do_shortcode($content);
$html .= '</div>';
if($button_link != ""){
$html .= '<div class="padding-top-bottom-50 text-center">
		  <a href="'.esc_url($button_link).'" target="'.esc_attr($link_target_opt).'"  class="ellipse-btn js-pointer-large '.esc_attr($pricing_active_button).'">'.esc_html($button_text).'</a>
		  </div>';
}
$html .= '</div>';
$html .= '</div>';



echo $html;