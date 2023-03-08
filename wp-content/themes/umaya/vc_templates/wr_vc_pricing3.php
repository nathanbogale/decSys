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

$html .= '<div class="padding-top-60">
							<div class="flex-container border-box border-radius-10px hidden-box">
								<div class="three-columns content-bg-red d-flex flex-center-center">
									<div class="text-center padding-top-bottom-50">
										<h3 class="subhead-s">'.esc_html($title).'</h3>
										<h4 class="margin-top-10">
											<span class="headline-l d-block">'.esc_html($price).'</span>
											<span class="subhead-xs d-block">'.esc_html($period).'</span>
										</h4>
									</div>
								</div>
								<div class="six-columns d-flex flex-align-center">
									<div class="width-100perc padding-top-bottom-50">
										<!-- list start -->
										<ul class="list list_center subhead-xxs text-color-b0b0b0 margin-left-right-20">
											
											'.do_shortcode($content).'
										</ul><!-- list end -->
									</div>
								</div>
								<div class="three-columns d-flex flex-center-center">';
								if($button_link != ""){
									$html .= '<div class="price-btn-offset text-center">
										<a href="'.esc_url($button_link).'" target="'.esc_attr($link_target_opt).'" class="skew-btn js-pointer-large">
											<span class="skew-btn__box">
												<span class="skew-btn__content">'.esc_html($button_text).'</span>
												<span class="skew-btn__arrow"></span>
											</span>
										</a>
									</div>';
									}
								$html .= '</div>
							</div>
						</div>';



echo $html;