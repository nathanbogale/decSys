<?php

$args = array(
		'column_class'=>'grid-item-50-50-100',
		'text_align'=>'text-left',
		'text_color'=>'text-color-0',
		'text_color_title'=>'text-color-0',
		'data_title'=>'',
		'data_serial'=>'',
		
		
);

extract(shortcode_atts($args, $atts));
		
$html = '';
$html .= '<div class="padding-top-90 '.esc_attr($column_class).' js-isotope-grid-item">';
$html .= '<div class="grid-margin-box '.esc_attr($text_align).' js-scrollanim">';
$html .= '<div class="anim-fade">';
if($data_serial != ""){
$html .= '<span class="subhead-xs text-color-red">'.esc_html($data_serial).'</span><br>';
}
if($data_title != ""){
$html .= '<h3 class="headline-xxs '.esc_attr($text_color_title).' margin-top-30">'.esc_html($data_title).'</h3>';
}
$html .= '<div class="body-text-xs '.esc_attr($text_color).' margin-top-20">'.$content.'</div>';
$html .= '</div>';
$html .= '</div>';
$html .= '</div>';

echo $html;