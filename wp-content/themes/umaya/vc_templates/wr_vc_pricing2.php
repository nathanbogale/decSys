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
$html .= '<div class="pos-rel">';
$html .= '<div class="pos-abs pos-top-center text-center width-100perc border-box-l-r">
		<h3 class="subhead-s padding-top-bottom-20 text-color-red">'.esc_html($title).'</h3>
		</div>';
$html .= '<div class="border-box padding-top-bottom-90 content-bg-dark-1">';
$html .= '<h4 class="text-center padding-top-30">';
$html .= '<span class="headline-m">'.esc_html($price).'</span> ';
$html .= '<span class="subhead-xs"> '.esc_html($period).'</span>';
$html .= '</h4>';
$html .= '<div class="accordion js-accordion '.$active.' margin-left-right-20 margin-top-bottom-50">';
$html .= do_shortcode($content);
$html .= '</div>';
$html .= '</div>';
if($button_link != ""){
$html .= '<div class="pos-abs pos-bottom-center text-center width-100perc border-box-l-r">
		  <a href="'.esc_url($button_link).'" target="'.esc_attr($link_target_opt).'"  class="border-btn js-pointer-large"><span class="border-btn__inner">'.esc_html($button_text).'</span><span class="border-btn__lines-1"></span><span class="border-btn__lines-2"></span></a>
		  </div>';
}
$html .= '</div>';
$html .= '</div>';



echo $html;