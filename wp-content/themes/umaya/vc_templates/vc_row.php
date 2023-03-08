<?php
$output = $el_class = '';
extract(shortcode_atts(array(
	'el_class' => '',
	'row_type' => 'sec1',
	'enable_container' => '',
	'section_line_opt' => 'black-lines',
	'row_padding_top' => 'padding-top-120',
	'row_padding_bottom' => 'padding-bottom-120',
	'section_back_opt' => 'section-bg-white',
	'opt_background_color' => '',
	'sec_text_color_opt' => 'text-color-black ',
	'umaya_background_image' => '',
	'section_back_overlay_opt' => '',
	'section_back_position_opt' => '',
	'youtube_video_id' => 'fF8OHGVCysc',
	'sec_text_align_opt' => '',
	'enable_full_height_sec' => '',
	'enable_full_height_sec_img' => '',
	'enable_container_back_img' => '',
	'menu_logo_opt' => '',
	'enable_content_position' => '',
	'enable_container_img' => '',
	'enable_sec_overlay' => 'bg-overlay-black',
	'enable_container_line' => '',
	'section_line_hide_opt' => '',
	'section_line_opt_sec2' => 'no-lines',
	'section_line_bt_border_opt' => 'no-border-bottom',
	'enable_back_img_position' => '',
	'section_back_opt_if_img' => 'section-bg-white',
	

), $atts));

wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
wp_enqueue_style('js_composer_custom_css');
// back image style
$_image ="";
if($umaya_background_image != '' || $umaya_background_image != ' ') { 
	$umaya_back_image = wp_get_attachment_image_src( $umaya_background_image, 'full');
}
$umaya_content_position_opt="";
if ($enable_content_position == "st2"){
$umaya_content_position_opt='flex-align-end';
}
else if ($enable_content_position == "st3"){
$umaya_content_position_opt='flex-align-center';
}
else if ($enable_content_position == "st4"){
$umaya_content_position_opt='flex-justify-center';
}
//line- container
$umaya_enable_line_con_opt="";
if ($enable_container_line == "st2"){
$umaya_enable_line_con_opt='flex-container container small '.$umaya_content_position_opt.'';
}
else if ($enable_container_line == "st3"){
$umaya_enable_line_con_opt='flex-container container '.$umaya_content_position_opt.'';
}
else {
$umaya_enable_line_con_opt='flex-container '.$umaya_content_position_opt.'';
}
;

//enable midnight
$umaya_enable_midnight="";
if ($menu_logo_opt == "st2"){
$umaya_enable_midnight='data-midnight="black"';
};

//enable full height
$umaya_enable_container_full_height="";
$umaya_enable_img_container_full_height="";
if ($enable_full_height_sec == "st2"){
$umaya_enable_container_full_height='flex-min-height-100vh';
$umaya_enable_img_container_full_height='height-100vh flex-min-height-100vh';
}

// bg color option
$umaya_section_color_opt_main="";
$umaya_section_color_opt_main_custom="";
if ($section_back_opt != "section_color_custom"){
$umaya_section_color_opt_main=''.$section_back_opt.'';
};
if ($section_back_opt == "section_color_custom"){
$umaya_section_color_opt_main_custom='style="background-color:'.$opt_background_color.';"';
};
// start container
$umaya_enable_container_all_start="";
$umaya_enable_img_container_all_start="";
$umaya_enable_container_all_end="";
$umaya_enable_img_container_all_end="";
if ($enable_container == "st2"){
$umaya_enable_container_start='<section  class="pos-rel '.$sec_text_align_opt.' '.$section_back_opt.' '.$sec_text_color_opt.' '.$row_padding_top.' '.$row_padding_bottom.' '.$umaya_enable_container_full_height.'" '.$umaya_enable_midnight.'><div class="container flex-container small '.$umaya_content_position_opt.'">';
$umaya_enable_container_all_end="</div></section>";
}
else if ($enable_container == "st3"){
$umaya_enable_container_start='<section  class="pos-rel '.$sec_text_align_opt.' '.$section_back_opt.' '.$sec_text_color_opt.' '.$row_padding_top.' '.$row_padding_bottom.' '.$umaya_enable_container_full_height.'" '.$umaya_enable_midnight.'><div class="containers flex-container full '.$umaya_content_position_opt.'">';
$umaya_enable_container_all_end="</div></section>";
}

else if ($enable_container == "st5"){
$umaya_enable_container_start='<section  class="pos-rel flex-container '.$sec_text_align_opt.' '.$section_back_opt.' '.$sec_text_color_opt.' '.$row_padding_top.' '.$row_padding_bottom.' '.$umaya_enable_container_full_height.' '.$umaya_content_position_opt.'" '.$umaya_enable_midnight.'>';
$umaya_enable_container_all_end="</section>";
}

else {
$umaya_enable_container_start='<section  class="pos-rel '.$sec_text_align_opt.' '.$section_back_opt.' '.$sec_text_color_opt.' '.$row_padding_top.' '.$row_padding_bottom.' '.$umaya_enable_container_full_height.'" '.$umaya_enable_midnight.'><div class="container flex-container '.$umaya_content_position_opt.'">';
$umaya_enable_container_all_end="</div></section>";
}
//end container
// start img container
$umaya_enable_img_container_all_start="";
$umaya_enable_img_container_all_end="";
if ($enable_container_img == "st2"){
if ($enable_back_img_position == "st2"){
$umaya_enable_img_container_start='<section  class="'.$section_back_opt_if_img.' '.$sec_text_align_opt.' '.esc_attr($section_line_opt_sec2).' '.$sec_text_color_opt.' " '.$umaya_enable_midnight.' ><div class="container flex-container small pos-rel  bg-img-cover '.$row_padding_top.' '.$row_padding_bottom.' '.$umaya_content_position_opt.'" style="background-image:url('. $umaya_back_image[0] .')"><div class="'.esc_attr($enable_sec_overlay).'"></div><div class="'.$section_line_bt_border_opt.' lines-container pos-rel no-lines height-100perc '.$umaya_enable_img_container_full_height.'">';
}
else {
$umaya_enable_img_container_start='<section  class="pos-rel bg-img-cover '.$sec_text_align_opt.' '.esc_attr($section_line_opt_sec2).' '.$sec_text_color_opt.' '.$row_padding_top.' '.$row_padding_bottom.' " '.$umaya_enable_midnight.' style="background-image:url('. $umaya_back_image[0] .')"><div class="'.esc_attr($enable_sec_overlay).'"></div><div class="container flex-container small '.$umaya_content_position_opt.'"><div class="'.$section_line_bt_border_opt.' lines-container pos-rel no-lines height-100perc '.$umaya_enable_img_container_full_height.'">';
}
$umaya_enable_img_container_all_end="</div></div></section>";
}
else if ($enable_container_img == "st3"){
if ($enable_back_img_position == "st2"){
$umaya_enable_img_container_start='<section  class="'.$section_back_opt_if_img.' '.$sec_text_align_opt.' '.esc_attr($section_line_opt_sec2).' '.$section_back_opt.' '.$sec_text_color_opt.'  " '.$umaya_enable_midnight.' ><div class="containers flex-container bg-img-cover pos-rel  full '.$row_padding_top.' '.$row_padding_bottom.' '.$umaya_content_position_opt.'" style="background-image:url('. $umaya_back_image[0] .')"><div class="'.esc_attr($enable_sec_overlay).'"></div><div class="'.$section_line_bt_border_opt.' lines-container pos-rel no-lines height-100perc '.$umaya_enable_img_container_full_height.'">';
}
else {
$umaya_enable_img_container_start='<section  class="pos-rel bg-img-cover '.$sec_text_align_opt.' '.esc_attr($section_line_opt_sec2).' '.$section_back_opt.' '.$sec_text_color_opt.' '.$row_padding_top.' '.$row_padding_bottom.' " '.$umaya_enable_midnight.' style="background-image:url('. $umaya_back_image[0] .')"><div class="'.esc_attr($enable_sec_overlay).'"></div><div class="containers flex-container full '.$umaya_content_position_opt.'"><div class="'.$section_line_bt_border_opt.' lines-container pos-rel no-lines height-100perc '.$umaya_enable_img_container_full_height.'">';
}
$umaya_enable_img_container_all_end="</div></div></section>";
}
//no con
else if ($enable_container_img == "st4"){
$umaya_enable_img_container_start='<section  class="pos-rel bg-img-cover '.$sec_text_align_opt.' '.esc_attr($section_line_opt_sec2).' '.$section_back_opt.' '.$sec_text_color_opt.' '.$row_padding_top.' '.$row_padding_bottom.' '.$umaya_enable_img_container_full_height.'" '.$umaya_enable_midnight.' style="background-image:url('. $umaya_back_image[0] .')"><div class="'.esc_attr($enable_sec_overlay).'"></div><div class="'.$section_line_bt_border_opt.' lines-container pos-rel no-lines height-100perc '.$umaya_content_position_opt.'">';
$umaya_enable_img_container_all_end="</div></section>";
}


else {
if ($enable_back_img_position == "st2"){
$umaya_enable_img_container_start='<section  class="'.$section_back_opt_if_img.' '.$sec_text_align_opt.' '.esc_attr($section_line_opt_sec2).' '.$sec_text_color_opt.'  '.$umaya_enable_img_container_full_height.'" '.$umaya_enable_midnight.' ><div class="container flex-container pos-rel  bg-img-cover '.$row_padding_top.' '.$row_padding_bottom.' '.$umaya_content_position_opt.'" style="background-image:url('. $umaya_back_image[0] .')"><div class="'.esc_attr($enable_sec_overlay).'"></div><div class="'.$section_line_bt_border_opt.' lines-container pos-rel no-lines height-100perc">';
}
else {
$umaya_enable_img_container_start='<section  class="pos-rel '.$sec_text_align_opt.' bg-img-cover '.esc_attr($section_line_opt_sec2).' '.$sec_text_color_opt.' '.$row_padding_top.' '.$row_padding_bottom.' '.$umaya_enable_img_container_full_height.'" '.$umaya_enable_midnight.' style="background-image:url('. $umaya_back_image[0] .')"><div class="'.esc_attr($enable_sec_overlay).'"></div><div class="container flex-container '.$umaya_content_position_opt.'"><div class="'.$section_line_bt_border_opt.' lines-container pos-rel no-lines height-100perc">';
}
$umaya_enable_img_container_all_end="</div></div></section>";
}
//section default
if($row_type == 'sec1'){
$output .=''.$umaya_enable_container_start.'';
}
else if($row_type == 'sec2'){
$output .=''.$umaya_enable_img_container_start.'';
}
else if($row_type == 'sec3'){
$output .='<section  class="lines-section '.$sec_text_align_opt.'  '.$section_line_opt.' '.$umaya_section_color_opt_main.' '.$sec_text_color_opt.'  " '.$umaya_enable_midnight.' '.$umaya_section_color_opt_main_custom.'><div class="'.$section_line_bt_border_opt.' lines-container  '.$section_line_opt.' '.$section_line_hide_opt.'  pos-rel '.$row_padding_top.' '.$row_padding_bottom.' '.$umaya_enable_container_full_height.'"><div class="'.$umaya_enable_line_con_opt.'">';

}
else if($row_type == 'sec4'){
$output .='';

}
//section default
else {
$output .=''.$umaya_enable_container_start.'';

}

if($row_type != 'content_menu'){
	$output .= wpb_js_remove_wpautop($content);
}

if($row_type == 'sec1'){
	$output .= ''.$umaya_enable_container_all_end.'<div class="clear"></div>'.$this->endBlockComment('row');
}
else if($row_type == 'sec2'){
	$output .= ''.$umaya_enable_img_container_all_end.'<div class="clear"></div>'.$this->endBlockComment('row');
}
else if($row_type == 'sec3'){
	$output .= '</div></div></section>'.$this->endBlockComment('row');
}
else if($row_type == 'sec4'){
	$output .= ''.$this->endBlockComment('row');
}
else {
	$output .= ''.$umaya_enable_container_all_end.'<div class="clear"></div>'.$this->endBlockComment('row');
}
echo $output;