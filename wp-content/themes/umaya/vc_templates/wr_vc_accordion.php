<?php

$args = array(
		
		'title'=>'Add Ttitle',
		'title_style'=>'headline-l',
		'text_style'=>'body-text-xs',
		
		
);

extract(shortcode_atts($args, $atts));

$html = '';

$html .= '<div class="accordion__tab js-accordion-tab">';
$html .= '<div class="accordion__btn js-accordion-btn js-pointer-large">
		<h6 class="accordion__btn-title '.$title_style.' margin-top-bottom-20">'.esc_html($title).'</h6>
		</div>';
$html .= '<div class="accordion__content js-accordion-content">';
$html .= '<div class="'.$text_style.'">';
$html .= ''.do_shortcode($content).'';
$html .= '</div>';
$html .= '</div>';
$html .= '</div>';


 
echo $html;