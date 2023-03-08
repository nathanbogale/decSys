<?php

$args = array(
			
			'text_align'=>'text-center',
			'title_style'=>'headline-l',
			'm_con'=>'',
			
		
);

$html = "";

extract(shortcode_atts($args, $atts));
		

$html .= '<div class="column-50-100  flex-align-center">';
$html .= '<div class="js-scrollanim '.esc_attr($text_align).'">';
$html .= '<a href="#0" class="headline-xxxs js-pointer-large">';
$html .= do_shortcode($content);
$html .= '</a>';
$html .= '<div class="body-text-xs text-color-black margin-top-20 anim-text-reveal tr-delay-08">'.do_shortcode($m_con).'</div>';
$html .= '</div>';
$html .= '</div>';

		


echo $html;