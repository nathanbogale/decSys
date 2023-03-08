<?php

$args = array(
			'class'=>'',
			'id'=>'',
			'image'=>'',
			'big_title'=>'',
			'small_title'=>'',
			'button_text'=>'Add Text',
			'button_icon'=>'',
			'button_url'=>'',
			'button_target'=>'',
			'button_style'=>'',
			'animation_delay'=>'',
			
);

$html = "";

extract(shortcode_atts($args, $atts));

		
		
		$html='';
		$dot="'";
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
		};
		
		
		if($button_url != ""){
			if($button_style == "st2"){
			$html .= '<div class="js-scrollanim">'; 
			$html .= '<div class="margin-top-30 anim-fade tr-delay-'.$animation_delay.'">'; 
			$html .= '<a href="'.esc_url($button_url).'" class="overlay-btn js-pointer-large" target="'.$link_target_opt.'">'; 
			$html .= ''.esc_html($button_text).'';
			$html .= '</a>';
			$html .= '</div>';
			$html .= '</div>';
			}
			else if($button_style == "st3"){
			$html .= '<div class="js-scrollanim">'; 
			$html .= '<div class="margin-top-30 anim-fade tr-delay-'.$animation_delay.'">'; 
			$html .= '<a href="'.esc_url($button_url).'" class="skew-btn js-pointer-large" target="'.$link_target_opt.'">'; 
			$html .= '<span class="skew-btn__box">
											<span class="skew-btn__content text-color-black">'.esc_html($button_text).'</span>
											<span class="skew-btn__arrow black"></span>
										</span>'; 
			
			$html .= '</a>';
			$html .= '</div>';
			$html .= '</div>';
			}
			else {
			$html .= '<a href="'.esc_url($button_url).'" class="border-btn js-pointer-large umaya-button-m" target="'.$link_target_opt.'">'; 
			$html .= '<span class="border-btn__inner">';
			if($button_icon != ""){
			$html .= '<i class="'.esc_attr($button_icon).'"></i> ';
			}
			$html .= ''.esc_html($button_text).'</span>
					<span class="border-btn__lines-1"></span>
					<span class="border-btn__lines-2"></span>'; 
			
			$html .= '</a>';
			}
		}
		
		


echo $html;