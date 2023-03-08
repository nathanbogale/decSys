<?php
/*** Removing shortcodes ***/
vc_remove_element("vc_widget_sidebar");
vc_remove_element("vc_gallery");
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_button");
vc_remove_element("vc_button2");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");
vc_remove_element("vc_message");
vc_remove_element("vc_tour");
vc_remove_element("vc_progress_bar");
vc_remove_element("vc_pie");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_toggle");
vc_remove_element("vc_images_carousel");
vc_remove_element("vc_posts_grid");
vc_remove_element("vc_carousel");

/*** Remove unused parameters ***/
if (function_exists('vc_remove_param')) {
	vc_remove_param('vc_single_image', 'css_animation');
	vc_remove_param('vc_column_text', 'css_animation');
	vc_remove_param('vc_row', 'video_bg');
	vc_remove_param('vc_row', 'video_bg_url');
	vc_remove_param('vc_row', 'video_bg_parallax');
	vc_remove_param('vc_row', 'full_height');
	vc_remove_param('vc_row', 'content_placement');
	vc_remove_param('vc_row', 'full_width');
	vc_remove_param('vc_row', 'bg_image');
	vc_remove_param('vc_row', 'bg_color');
	vc_remove_param('vc_row', 'font_color');
	vc_remove_param('vc_row', 'margin_bottom');
	vc_remove_param('vc_row', 'bg_image_repeat');
	vc_remove_param('vc_tabs', 'interval');
	vc_remove_param('vc_separator', 'style');
	vc_remove_param('vc_separator', 'color');
	vc_remove_param('vc_separator', 'accent_color');
	vc_remove_param('vc_separator', 'el_width');
	vc_remove_param('vc_text_separator', 'style');
	vc_remove_param('vc_text_separator', 'color');
	vc_remove_param('vc_text_separator', 'accent_color');
	vc_remove_param('vc_text_separator', 'el_width');
	vc_remove_param('vc_row', 'gap');
    vc_remove_param('vc_row', 'columns_placement');
    vc_remove_param('vc_row', 'equal_height');
    vc_remove_param('vc_row_inner', 'gap');
    vc_remove_param('vc_row_inner', 'content_placement');
    vc_remove_param('vc_row_inner', 'equal_height');
    vc_remove_param('vc_hoverbox', 'use_custom_fonts_primary_title');
    vc_remove_param('vc_hoverbox', 'use_custom_fonts_hover_title');
    vc_remove_param('vc_hoverbox', 'hover_add_button');
	vc_remove_param('vc_row', 'parallax');
    vc_remove_param('vc_row', 'parallax_image');
	vc_remove_param('vc_row', 'parallax_speed_bg');
	vc_remove_param('vc_row', 'parallax_speed_video');
	vc_remove_param('vc_row', 'disable_element');
	vc_remove_param('vc_row', 'el_id');
	vc_remove_param('vc_row', 'el_class');
	//vc_remove_param('vc_row', 'css_animation');
}

/*** Remove frontend editor ***/
if(function_exists('vc_disable_frontend')){
	vc_disable_frontend();
}

/*** Row ***/
//main  row opt
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Row Type",
	"param_name" => "row_type",
	"value" => array(
		
		"Section" => "sec1",
		"Line Effect Section" => "sec3",
		"Background Image" => "sec2",
		"Full Width Section" => "sec4",
	
	)
));
// line sec container
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Container",
	"param_name" => "enable_container_line",
	"value" => array(
		"Default" => "st1",
		"Container" => "st3",
		"Small Container" => "st2",		
	),
	"description" => "Optional. <br>Select Full Width container if you are using Default page Template. Or You can disable total page's container by using page settings.",
	"dependency" => Array('element' => "row_type", 'value' => array('sec3'))
	
));

// main sec container
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Container",
	"param_name" => "enable_container",
	"value" => array(
		"Default" => "st1",
		"Small Container" => "st2",		
		"Full Width" => "st3",		
		"Disable Container" => "st5",		
				
		
	),
	"description" => "Optional. <br>Select Full Width container if you are using Default page Template. Or You can disable total page's container by using page settings.",
	"dependency" => Array('element' => "row_type", 'value' => array('sec1'))
	
));
// parallax container
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Container",
	"param_name" => "enable_container_img",
	"value" => array(
		"Default" => "st1",
		"Small Container" => "st2",		
		"Full Width" => "st3",		
		"Disable Container" => "st4",		
				
		
	),
	"description" => "Optional. <br>Select Full Width container if you are using Default page Template. Or You can disable total page's container by using page settings.",
	"dependency" => Array('element' => "row_type", 'value' => array('sec2'))
	
));
//paralax effect container
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Line Effect",
	"param_name" => "section_line_opt_sec2",
	"value" => array(
		"Disable" => "no-line",
		"Enable" => "lines-section",
	),
	"description" => "Optional.",
	"dependency" => Array('element' => "row_type", 'value' => array('sec2'))
	
));
//line effect container
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Line Color",
	"param_name" => "section_line_opt",
	"value" => array(
		"Black" => "black-lines",
		"Gray" => "gray-lines",
	),
	"description" => "Optional.",
	"dependency" => Array('element' => "row_type", 'value' => array('sec3'))
	
));
//line effect container
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Middle Line",
	"param_name" => "section_line_hide_opt",
	"value" => array(
		"Enable" => "show-lines",
		"Disable" => "no-lines",
	),
	"description" => "Optional.",
	"dependency" => Array('element' => "row_type", 'value' => array('sec3'))
	
));

//line effect container
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Border Bottom",
	"param_name" => "section_line_bt_border_opt",
	"value" => array(
		"Disable" => "no-border-bottom",
		"Enable" => "border-box-bottom",
	),
	"description" => "Enable/ Disable section bottom border.",
	"dependency" => Array('element' => "row_type", 'value' => array('sec3', 'sec2'))
	
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Full Height Section",
	"param_name" => "enable_full_height_sec",
	"value" => array(
		"Disable" => "st1",
		"Enable" => "st2",		
	),
	"description" => "Optional.",
	"dependency" => Array('element' => "row_type", 'value' => array('sec1', 'sec2','sec3'))
	
	
));

vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Section Background image",
	"value" => "",
	"param_name" => "umaya_background_image",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('sec2'))
));


vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Background Image Position",
	"param_name" => "enable_back_img_position",
	"value" => array(
		"Default" => "st1",
		"Inside Container" => "st2",		
	),
	"description" => "Optional.",
	"dependency" => Array('element' => "row_type", 'value' => array('sec2'))
	
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Section Background",
	"param_name" => "section_back_opt_if_img",
	"value" => array(
		"White" => "section-bg-white",
		"Light 1" => "section-bg-light-1",
		"Light 2" => "section-bg-light-2",
		"Black" => "section-bg-black",
		"Dark 1" => "section-bg-dark-1",
		"Dark 2" => "section-bg-dark-2",
		"Red" => "content-bg-red",
		"Custom Color" => "section_color_custom",
	),
	"description" => "Optional.",
	"dependency" => Array('element' => "enable_back_img_position", 'value' => array('st2'))
	
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Overlay Color",
	"param_name" => "enable_sec_overlay",
	"value" => array(
		"Black" => "bg-overlay-black",
		"White" => "bg-overlay-white",		
		"None" => "bg-overlay-none",		
	),
	"description" => "Optional.",
	"dependency" => Array('element' => "row_type", 'value' => array('sec2'))
	
));


vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Content Position",
	"param_name" => "enable_content_position",
	"value" => array(
		"Top" => "st1",
		"Bottom" => "st2",		
		"Center" => "st3",		
		"Justify Center" => "st4",		
	),
	"description" => "Optional.",
	"dependency" => Array('element' => "row_type", 'value' => array('sec1', 'sec2','sec3'))
	
	
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Section Background",
	"param_name" => "section_back_opt",
	"value" => array(
		"White" => "section-bg-white",
		"Light 1" => "section-bg-light-1",
		"Light 2" => "section-bg-light-2",
		"Black" => "section-bg-black",
		"Dark 1" => "section-bg-dark-1",
		"Dark 2" => "section-bg-dark-2",
		"Red" => "content-bg-red",
		"Custom Color" => "section_color_custom",
	),
	"description" => "Optional.",
	"dependency" => Array('element' => "row_type", 'value' => array('sec1', 'sec3'))
	
));

vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Background color",
	"param_name" => "opt_background_color",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "section_back_opt", 'value' => array('section_color_custom'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Text Color",
	"param_name" => "sec_text_color_opt",
	"value" => array(
		
		"Black" => "text-color-black ",
		"White" => "text-color-white",
		"Alto" => "text-color-dadada",
		"Silver Chalice" => "text-color-b0b0b0",
		"Silver" => "text-color-bbbbbb",
		"Gray" => "text-color-8a8a8a",
		"Dusty Gray" => "text-color-979797",
		"Dove Gray" => "text-color-6d6d6d",
		"Mercury" => "text-color-e4e4e4",
		"Gray 2" => "text-color-888888",
		"Red" => "text-color-red",
		"Custom Color" => "custom_color_umaya",
	),
	"description" => "Optional.",
	"dependency" => Array('element' => "row_type", 'value' => array('sec1', 'sec2','sec3'))
	
	
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Text Align",
	"param_name" => "sec_text_align_opt",
	"value" => array(
		
		"Left" => "text-left",
		"Center" => "text-center",
		"Right" => "text-right",
	),
	"description" => "Optional.",
	"dependency" => Array('element' => "row_type", 'value' => array('sec1', 'sec2','sec3'))
	
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Logo & Menu Button Style",
	"param_name" => "menu_logo_opt",
	"value" => array(
		
		"Default" => "st1",
		"Dark" => "st2",
	
	),
	"description" => "Useful if you use light background background.",
	"dependency" => Array('element' => "row_type", 'value' => array('sec1', 'sec2','sec3'))
));



vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Section Padding Top",
	"param_name" => "row_padding_top",
	"value" => array(
		
		"Default(120)" => "padding-top-120",
		"Padding 150" => "padding-top-150",
		"Padding 140" => "padding-top-140",
		"Padding 130" => "padding-top-130",
		"Padding 100" => "padding-top-100",
		"Padding 90" => "padding-top-90",
		"Padding 80" => "padding-top-80",
		"Padding 70" => "padding-top-70",
		"Padding 60" => "padding-top-60",
		"Padding 50" => "padding-top-50",
		"Padding 40" => "padding-top-40",
		"Padding 30" => "padding-top-30",
		"Padding 20" => "padding-top-20",
		"Padding 10" => "padding-top-10",
		"No Padding" => "no-padding-top",
	),
	"dependency" => Array('element' => "row_type", 'value' => array('sec1', 'sec2','sec3'))
	
	
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Section Padding Bottom",
	"param_name" => "row_padding_bottom",
	"value" => array(
		
		"Default(120)" => "padding-bottom-120",
		"Padding 150" => "padding-bottom-150",
		"Padding 140" => "padding-bottom-140",
		"Padding 130" => "padding-bottom-130",
		"Padding 100" => "padding-bottom-100",
		"Padding 90" => "padding-bottom-90",
		"Padding 80" => "padding-bottom-80",
		"Padding 70" => "padding-bottom-70",
		"Padding 60" => "padding-bottom-60",
		"Padding 50" => "padding-bottom-50",
		"Padding 40" => "padding-bottom-40",
		"Padding 30" => "padding-bottom-30",
		"Padding 20" => "padding-bottom-20",
		"Padding 10" => "padding-bottom-10",
		"No Padding" => "no-padding-bottom",
	),
	"dependency" => Array('element' => "row_type", 'value' => array('sec1', 'sec2','sec3'))
	
	
));








/***************** umaya  Shortcodes *********************/
// umaya text block
vc_map( array(
		"name" => "Umaya Text Block",
		"base" => "umaya_text",
		"category" => 'UMAYA',
		"icon" => "icon-wpb-layer-shape-text",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Text Align', 'umaya'),
				"param_name" => "text_align",
				"value" => array(
					"Left" => "text-left",
					"Center" => "text-center",
					"Right" => "text-right",
					
				),
				"description" => "",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Text Color', 'umaya'),
				"param_name" => "text_color",
				"value" => array(
					"Black" => "text-color-black ",
					"White" => "text-color-white",
					"Alto" => "text-color-dadada",
					"Silver Chalice" => "text-color-b0b0b0",
					"Silver" => "text-color-bbbbbb",
					"Gray" => "text-color-8a8a8a",
					"Dusty Gray" => "text-color-979797",
					"Dove Gray" => "text-color-6d6d6d",
					"Mercury" => "text-color-e4e4e4",
					"Gray 2" => "text-color-888888",
					"Red" => "text-color-red",
					
				),
				"description" => "",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Text Style', 'umaya'),
				"param_name" => "text_style",
				"value" => array(
					"S" => "body-text-s",
					"XS" => "body-text-xs",
					"M" => "body-text-m",
					"L" => "body-text-l",
					"XL" => ".body-text-xl",
					
				),
				"description" => "Select Text Size.",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Animation Delay', 'umaya'),
				"param_name" => "data_delay",
				"value" => "",
				"description" => esc_html__('E.X: 04', 'umaya'),
			),
			
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Content', 'umaya'),
				"param_name" => "content",
				"value" => "",
				"description" => esc_html__('', 'umaya'),
			),
			
			
				
		)
) );


// Animated title
class WPBakeryShortCode_WR_VC_Titles  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Animated Title", "umaya",
        "base" => "wr_vc_titles",
        "as_parent" => array('only' => 'wr_vc_title'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'UMAYA',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
		
		array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Text Align', 'umaya'),
				"param_name" => "text_align",
				"value" => array(
					"Center" => "text-center",
					"Left" => "text-left",
					"Right" => "text-right",
					
				),
				"description" => "",
			),
			
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Title Style', 'umaya'),
				"param_name" => "title_style",
				"value" => array(
				'Default' => esc_html__( 'headline-l', 'umaya' ),
				'XL' => esc_html__( 'headline-xl', 'umaya' ),
				'XXL' => esc_html__( 'headline-xxl', 'umaya' ),
				'XXXL' => esc_html__( 'headline-xxxl', 'umaya' ),
				'XXXXL' => esc_html__( 'headline-xxxxl', 'umaya' ),
				'M' => esc_html__( 'headline-m', 'umaya' ),
				'S' => esc_html__( 'headline-s', 'umaya' ),
				'XS' => esc_html__( 'headline-xs', 'umaya' ),
				'XXS' => esc_html__( 'headline-xxs', 'umaya' ),
				'XXXS' => esc_html__( 'headline-xxxs', 'umaya' ),
				'XXXXS' => esc_html__( 'headline-xxxxs', 'umaya' ),
				'Sub Head S' => esc_html__( 'subhead-s', 'umaya' ),
				'Sub Head XS' => esc_html__( 'subhead-xs', 'umaya' ),
				'Sub Head XXS' => esc_html__( 'subhead-xxs', 'umaya' ),
				'Sub Head XXXS' => esc_html__( 'subhead-xxxs', 'umaya' ),
				'Sub Head L' => esc_html__( 'subhead-l', 'umaya' ),
				'Sub Head XL' => esc_html__( 'subhead-xl', 'umaya' ),
				'Sub Head XXL' => esc_html__( 'subhead-xxl', 'umaya' ),
				'Sub Head XXXL' => esc_html__( 'subhead-xxxl', 'umaya' ),
				),
				"description" => "Select Title Size",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Text Color', 'umaya'),
				"param_name" => "title_color",
				"value" => array(
					"Black" => "text-color-black ",
					"White" => "text-color-white",
					"Alto" => "text-color-dadada",
					"Silver Chalice" => "text-color-b0b0b0",
					"Silver" => "text-color-bbbbbb",
					"Gray" => "text-color-8a8a8a",
					"Dusty Gray" => "text-color-979797",
					"Dove Gray" => "text-color-6d6d6d",
					"Mercury" => "text-color-e4e4e4",
					"Gray 2" => "text-color-888888",
					"Red" => "text-color-red",
				),
				"description" => "Select Title Size",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Padding Top', 'umaya'),
				"param_name" => "padding_top",
				"value" => array(
					"No Padding" => "no-top-padding",
					"Padding 120" => "padding-top-120",
					"Padding 90" => "padding-top-90",
					"Padding 60" => "padding-top-60",
					"Padding 50" => "padding-top-50",
					"Padding 40" => "padding-top-40",
					"Padding 30" => "padding-top-30",
					"Padding 20" => "padding-top-20",
					"Padding 10" => "padding-top-10",
					
					
				),
				"description" => "Select Title Size",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Padding Bottom', 'umaya'),
				"param_name" => "padding_bottom",
				"value" => array(
					"No Padding" => "no-bottom-padding",
					"Padding 120" => "padding-bottom-120",
					"Padding 90" => "padding-bottom-90",
					"Padding 60" => "padding-bottom-60",
					"Padding 50" => "padding-bottom-50",
					"Padding 40" => "padding-bottom-40",
					"Padding 30" => "padding-bottom-30",
					"Padding 20" => "padding-bottom-20",
					"Padding 10" => "padding-bottom-10",
					
					
				),
				"description" => "Select Title Size",
			),
			
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Title extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Animated Title Item", "umaya",
        "base" => "wr_vc_title",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_titles'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => "",
				"description" => "e.x: For marking text:  About [span] Us[/span] <br> For line break: [br]",
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Animation Delay",
				"param_name" => "animation_delay",
				"value" => "",
				"description" => "e.x: 01",
			),
			
			
		  
        )
) );


// Animated title 2
class WPBakeryShortCode_WR_VC_Titles2  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Animated Title2 ", "umaya",
        "base" => "wr_vc_titles2",
        "as_parent" => array('only' => 'wr_vc_title2'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'UMAYA',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
		
		array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Text Align', 'umaya'),
				"param_name" => "text_align",
				"value" => array(
					"Center" => "text-center",
					"Left" => "text-left",
					"Right" => "text-right",
					
				),
				"description" => "",
			),
			
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Title Style', 'umaya'),
				"param_name" => "title_style",
				"value" => array(
				'Default' => esc_html__( 'headline-l', 'umaya' ),
				'XL' => esc_html__( 'headline-xl', 'umaya' ),
				'XXL' => esc_html__( 'headline-xxl', 'umaya' ),
				'XXXL' => esc_html__( 'headline-xxxl', 'umaya' ),
				'XXXXL' => esc_html__( 'headline-xxxxl', 'umaya' ),
				'M' => esc_html__( 'headline-m', 'umaya' ),
				'S' => esc_html__( 'headline-s', 'umaya' ),
				'XS' => esc_html__( 'headline-xs', 'umaya' ),
				'XXS' => esc_html__( 'headline-xxs', 'umaya' ),
				'XXXS' => esc_html__( 'headline-xxxs', 'umaya' ),
				'XXXXS' => esc_html__( 'headline-xxxxs', 'umaya' ),
				'Sub Head S' => esc_html__( 'subhead-s', 'umaya' ),
				'Sub Head XS' => esc_html__( 'subhead-xs', 'umaya' ),
				'Sub Head XXS' => esc_html__( 'subhead-xxs', 'umaya' ),
				'Sub Head XXXS' => esc_html__( 'subhead-xxxs', 'umaya' ),
				'Sub Head L' => esc_html__( 'subhead-l', 'umaya' ),
				'Sub Head XL' => esc_html__( 'subhead-xl', 'umaya' ),
				'Sub Head XXL' => esc_html__( 'subhead-xxl', 'umaya' ),
				'Sub Head XXXL' => esc_html__( 'subhead-xxxl', 'umaya' ),
				),
				"description" => "Select Title Size",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Padding Top', 'umaya'),
				"param_name" => "padding_top",
				"value" => array(
					"No Padding" => "no-top-padding",
					"Padding 90" => "padding-top-90",
					"Padding 60" => "padding-top-60",
					"Padding 50" => "padding-top-50",
					"Padding 40" => "padding-top-40",
					"Padding 30" => "padding-top-30",
					"Padding 20" => "padding-top-20",
					"Padding 10" => "padding-top-10",
					
					
				),
				"description" => "Select Title Size",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Padding Bottom', 'umaya'),
				"param_name" => "padding_bottom",
				"value" => array(
					"No Padding" => "no-bottom-padding",
					"Padding 90" => "padding-bottom-90",
					"Padding 60" => "padding-bottom-60",
					"Padding 50" => "padding-bottom-50",
					"Padding 40" => "padding-bottom-40",
					"Padding 30" => "padding-bottom-30",
					"Padding 20" => "padding-bottom-20",
					"Padding 10" => "padding-bottom-10",
					
					
				),
				"description" => "Select Title Size",
			),
			
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Title2 extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Animated Title Item", "umaya",
        "base" => "wr_vc_title2",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_titles2'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
		
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Animation Type', 'umaya'),
				"param_name" => "ani_type_opt",
				"value" => array(
					"Fill" => "st1",
					"Double Fill" => "st2",
				),
				"description" => "Animation type double fill working perfectly only in dark background.",
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => "",
				"description" => "",
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Animation Delay",
				"param_name" => "animation_delay",
				"value" => "",
				"description" => "e.x: 01",
				
			),
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Text Color', 'umaya'),
				"param_name" => "title_color",
				"value" => array(
					"Black" => "text-color-black ",
					"White" => "text-color-white",
					"Alto" => "text-color-dadada",
					"Silver Chalice" => "text-color-b0b0b0",
					"Silver" => "text-color-bbbbbb",
					"Gray" => "text-color-8a8a8a",
					"Dusty Gray" => "text-color-979797",
					"Dove Gray" => "text-color-6d6d6d",
					"Mercury" => "text-color-e4e4e4",
					"Gray 2" => "text-color-888888",
					"Red" => "text-color-red",
				),
				"description" => "Select Title Size",
				"dependency" => Array('element' => "ani_type_opt", 'value' => array('st1'))
			),
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Text Marking', 'umaya'),
				"param_name" => "text_marking",
				"value" => array(
					"Disable" => "invert",
					"Enable" => "invert-color",
					
				),
				"description" => "Select Title Size",
				"dependency" => Array('element' => "ani_type_opt", 'value' => array('st2'))
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Line Break', 'umaya'),
				"param_name" => "line_break",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
				),
				"description" => "",
			),
		  
        )
) );


// Animated title fill
class WPBakeryShortCode_WR_VC_Fill_Titles  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Animated Title Fill", "umaya",
        "base" => "wr_vc_fill_titles",
        "as_parent" => array('only' => 'wr_vc_fill_title'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'UMAYA',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
		
		array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Text Align', 'umaya'),
				"param_name" => "text_align",
				"value" => array(
					"Center" => "text-center",
					"Left" => "text-left",
					"Right" => "text-right",
					
				),
				"description" => "",
			),
			
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Title Style', 'umaya'),
				"param_name" => "title_style",
				"value" => array(
				'Default' => esc_html__( 'headline-l', 'umaya' ),
				'XL' => esc_html__( 'headline-xl', 'umaya' ),
				'XXL' => esc_html__( 'headline-xxl', 'umaya' ),
				'XXXL' => esc_html__( 'headline-xxxl', 'umaya' ),
				'XXXXL' => esc_html__( 'headline-xxxxl', 'umaya' ),
				'M' => esc_html__( 'headline-m', 'umaya' ),
				'S' => esc_html__( 'headline-s', 'umaya' ),
				'XS' => esc_html__( 'headline-xs', 'umaya' ),
				'XXS' => esc_html__( 'headline-xxs', 'umaya' ),
				'XXXS' => esc_html__( 'headline-xxxs', 'umaya' ),
				'XXXXS' => esc_html__( 'headline-xxxxs', 'umaya' ),
				'Sub Head S' => esc_html__( 'subhead-s', 'umaya' ),
				'Sub Head XS' => esc_html__( 'subhead-xs', 'umaya' ),
				'Sub Head XXS' => esc_html__( 'subhead-xxs', 'umaya' ),
				'Sub Head XXXS' => esc_html__( 'subhead-xxxs', 'umaya' ),
				'Sub Head L' => esc_html__( 'subhead-l', 'umaya' ),
				'Sub Head XL' => esc_html__( 'subhead-xl', 'umaya' ),
				'Sub Head XXL' => esc_html__( 'subhead-xxl', 'umaya' ),
				'Sub Head XXXL' => esc_html__( 'subhead-xxxl', 'umaya' ),
				),
				"description" => "Select Title Size",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Text Color', 'umaya'),
				"param_name" => "title_color",
				"value" => array(
					"Black" => "text-color-black ",
					"White" => "text-color-white",
					"Alto" => "text-color-dadada",
					"Silver Chalice" => "text-color-b0b0b0",
					"Silver" => "text-color-bbbbbb",
					"Gray" => "text-color-8a8a8a",
					"Dusty Gray" => "text-color-979797",
					"Dove Gray" => "text-color-6d6d6d",
					"Mercury" => "text-color-e4e4e4",
					"Gray 2" => "text-color-888888",
					"Red" => "text-color-red",
				),
				"description" => "Select Title Size",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Padding Top', 'umaya'),
				"param_name" => "padding_top",
				"value" => array(
					"No Padding" => "no-top-padding",
					"Padding 90" => "padding-top-90",
					"Padding 60" => "padding-top-60",
					"Padding 50" => "padding-top-50",
					"Padding 40" => "padding-top-40",
					"Padding 30" => "padding-top-30",
					"Padding 20" => "padding-top-20",
					"Padding 10" => "padding-top-10",
					"Padding 1" => "padding-top-1",
					
					
				),
				"description" => "",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Padding Bottom', 'umaya'),
				"param_name" => "padding_bottom",
				"value" => array(
					"No Padding" => "no-bottom-padding",
					"Padding 90" => "padding-bottom-90",
					"Padding 60" => "padding-bottom-60",
					"Padding 50" => "padding-bottom-50",
					"Padding 40" => "padding-bottom-40",
					"Padding 30" => "padding-bottom-30",
					"Padding 20" => "padding-bottom-20",
					"Padding 10" => "padding-bottom-10",
					"Padding 1" => "padding-bottom-1",
					
					
				),
				"description" => "",
			),
			
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Fill_Title extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Animated Title Item", "umaya",
        "base" => "wr_vc_fill_title",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_fill_titles'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => "",
				"description" => "",
				
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Animation Background', 'umaya'),
				"param_name" => "ani_back",
				"value" => array(
					"White" => "white",
					"Black" => "black",
					"Red" => "red",
					
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Animation Delay",
				"param_name" => "animation_delay",
				"value" => "",
				"description" => "e.x: 01",
			),
			
			
		  
        )
) );

// umaya button
class WPBakeryShortCode_WR_VC_Button  extends WPBakeryShortCode {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Button", "umaya",
        "base" => "wr_vc_button",
        "content_element" => true,
		"category" => 'UMAYA',
		"icon" => "icon-wpb-ui-button",
        
        "params" => array(
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Style",
				"param_name" => "button_style",
				"value" => array(
					"Button With Icon" => "st1",
					"Fancy Button" => "st2",
					"Simple Button" => "st3",
				),
				"description" => "",
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Text",
				"param_name" => "button_text",
				"value" => "",
				"description" => "",
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Icon",
				"param_name" => "button_icon",
				"value" => "",
				"description" => "Use <a href='https://fontawesome.com/icons?d=gallery' target='_blank'>Fontawesome</a> Icon Class. <br> E.X: fab fa-apple",
				"dependency" => Array('element' => "button_style", 'value' => array('st1'))
				
			),
			
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button URL",
				"param_name" => "button_url",
				"value" => "",
				"description" => "",
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Animation Delay",
				"param_name" => "animation_delay",
				"value" => "",
				"description" => "E.X: 02",
				"dependency" => Array('element' => "button_style", 'value' => array('st3', 'st2'))
				
			),
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "button_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "",
				
			),
            
        ),
        
) );


// umaya event
vc_map( array(
		"name" => "Umaya Event",
		"base" => "umaya_event",
		"category" => 'UMAYA',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Title', 'umaya'),
				"param_name" => "title",
				"value" => "",
				"description" => esc_html__('', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Date', 'umaya'),
				"param_name" => "data_date",
				"value" => "",
				"description" => esc_html__('E.X: 21 April', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button 1 Text",
				"param_name" => "button_text1",
				"value" => "",
				"description" => "",
				
			),
			
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button 1 URL",
				"param_name" => "button_url1",
				"value" => "",
				"description" => "",
				
			),
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Button 1 Link Target",
				"param_name" => "button_target1",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "",
				
			),
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button 2 Text",
				"param_name" => "button_text2",
				"value" => "",
				"description" => "",
				
			),
			
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button 2 URL",
				"param_name" => "button_url2",
				"value" => "",
				"description" => "",
				
			),
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Button 2 Link Target ",
				"param_name" => "button_target2",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "",
				
			),
			
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Content', 'umaya'),
				"param_name" => "content",
				"value" => "",
				"description" => esc_html__('', 'umaya'),
			),
			
			
				
		)
) );

// wr inf slider
class WPBakeryShortCode_WR_VC_Inf_Gallerys  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Infinite Image Gallery", "umaya",
        "base" => "wr_vc_inf_gallerys",
        "as_parent" => array('only' => 'wr_vc_inf_gallery'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'UMAYA',
		"icon" => "icon-wpb-single-image",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),

			
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Inf_Gallery extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Gallery Item", "umaya",
        "base" => "wr_vc_inf_gallery",
        "content_element" => true,
		"icon" => "icon-wpb-single-image",
        "as_child" => array('only' => 'wr_vc_inf_gallerys'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Top Image",
				"param_name" => "image",
				"description" => ""
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Top Pading",
				"param_name" => "top_padding",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
					
				),
				"description" => "Optional.",
			),	
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Bottom Image",
				"param_name" => "image2",
				"description" => ""
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Top Pading",
				"param_name" => "top_padding_2",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
					
				),
				"description" => "Optional.",
			),	
			
			
			
        )
) );


// client logo
class WPBakeryShortCode_WR_VC_Clients  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Client Logos Grid", "umaya",
        "base" => "wr_vc_clients",
        "as_parent" => array('only' => 'wr_vc_client, wr_vc_client_blank'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'Client Logo',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
		
		
		array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => "",
				"description" => "Optional.",
				
			),
			
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Client extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Client Logo Item", "umaya",
        "base" => "wr_vc_client",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_clients'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Color",
				"param_name" => "border_color",
				"value" => array(
					"Gray" => "b_gray",
					"Black" => "black",
				),
				"description" => "Optional.",
			),
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Uplod Client Logo",
				"param_name" => "image",
				"description" => ""
			),
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Uplod Hover Client Logo",
				"param_name" => "image_hover",
				"description" => ""
			),
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom URL",
				"param_name" => "button_url",
				"value" => "",
				"description" => "Optional.",
				
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "button_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "Optional.",
			),
							
            
        )
) );


class WPBakeryShortCode_WR_VC_Client_Blank extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Blank Column", "umaya",
        "base" => "wr_vc_client_blank",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_clients'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Color",
				"param_name" => "border_color",
				"value" => array(
					"Gray" => "b_gray",
					"Black" => "black",
				),
				"description" => "Optional.",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 1",
				"param_name" => "data_title_1",
				"value" => ""
			),

			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 2",
				"param_name" => "data_title_2",
				"value" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 3",
				"param_name" => "data_title_3",
				"value" => ""
			),
				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom URL",
				"param_name" => "button_url",
				"value" => "",
				"description" => "Optional.",
				
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "button_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "Optional.",
			),
            
        )
) );


// client logo 2
class WPBakeryShortCode_WR_VC_Clients2  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Client Logos Grid 2", "umaya",
        "base" => "wr_vc_clients2",
        "as_parent" => array('only' => 'wr_vc_client2, wr_vc_client_blank2'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'Client Logo',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
		
		
		array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => "",
				"description" => "Optional.",
				
			),
			
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Client2 extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Client Logo Item", "umaya",
        "base" => "wr_vc_client2",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_clients2'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Color",
				"param_name" => "border_color",
				"value" => array(
					"Black" => "black",
					"Gray" => "b_gray",
				),
				"description" => "Optional.",
			),
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Uplod Client Logo",
				"param_name" => "image",
				"description" => ""
			),
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Uplod Hover Client Logo",
				"param_name" => "image_hover",
				"description" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom URL",
				"param_name" => "button_url",
				"value" => "",
				"description" => "Optional.",
				
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "button_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "Optional.",
			),
							
            
        )
) );


class WPBakeryShortCode_WR_VC_Client_Blank2 extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Blank Column", "umaya",
        "base" => "wr_vc_client_blank2",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_clients2'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Border Color",
				"param_name" => "border_color",
				"value" => array(
					"Black" => "black",
					"Gray" => "b_gray",
				),
				"description" => "Optional.",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 1",
				"param_name" => "data_title_1",
				"value" => ""
			),

			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 2",
				"param_name" => "data_title_2",
				"value" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 3",
				"param_name" => "data_title_3",
				"value" => ""
			),
				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom URL",
				"param_name" => "button_url",
				"value" => "",
				"description" => "Optional.",
				
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "button_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "Optional.",
			),
            
        )
) );


// client logo carr
class WPBakeryShortCode_WR_VC_Clientcars  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Client Logos Carousel", "umaya",
        "base" => "wr_vc_clientcars",
        "as_parent" => array('only' => 'wr_vc_clientcar'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'Client Logo',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
		
		
		array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => "",
				"description" => "Optional.",
				
			),
			
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Clientcar extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Client Logo Item", "umaya",
        "base" => "wr_vc_clientcar",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_clientcars'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Uplod Client Logo",
				"param_name" => "image",
				"description" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom URL",
				"param_name" => "button_url",
				"value" => "",
				"description" => "Optional.",
				
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "button_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "Optional.",
			),
							
            
        )
) );


// single client
class WPBakeryShortCode_WR_VC_Single_Client  extends WPBakeryShortCode {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Single Client Logo", "umaya",
        "base" => "wr_vc_single_client",
        "content_element" => true,
		"category" => 'Client Logo',
		"icon" => "icon-umaya",
        
        "params" => array(
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Uplod Client Logo",
				"param_name" => "image",
				"description" => ""
			),
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Uplod Hover Client Logo",
				"param_name" => "image_hover",
				"description" => ""
			),
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Custom URL",
				"param_name" => "button_url",
				"value" => "",
				"description" => "Optional.",
				
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "button_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "Optional.",
			),
            
        ),
        
) );




// wr testimonials
class WPBakeryShortCode_WR_VC_Testimonials  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Testimonial", "umaya",
        "base" => "wr_vc_testimonials",
        "as_parent" => array('only' => 'wr_vc_testimonial'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'Testimonial',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),

			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Slider Autoplay",
				"param_name" => "autoplay",
				"value" => array(
					"Enable" => "st1",
					"Disable" => "st2",
					
				),
				"description" => "Optional.",
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Slider Speed",
				"param_name" => "slider_speed",
				"value" => "",
				"description" => "Default: 1200",
			),
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Testimonial extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Testimonial Item", "umaya",
        "base" => "wr_vc_testimonial",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_testimonials'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Client's Image",
				"param_name" => "image",
				"description" => ""
			),
			
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Client Name",
				"param_name" => "clientname",
				"value" => "",
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Designation",
				"param_name" => "designation",
				"value" => "",
				"description" => "e.x: Investor",
				
			),
			
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "content",
				"value" => ""
			),
			
					
            
        )
) );


// wr testimonials
class WPBakeryShortCode_WR_VC_Testimonials_2  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Testimonial 2", "umaya",
        "base" => "wr_vc_testimonials_2",
        "as_parent" => array('only' => 'wr_vc_testimonial_2'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'Testimonial',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Slider Style",
				"param_name" => "slider_style",
				"value" => array(
					"Style 1" => "js-2-view-slider",
					"Style 2" => "js-1-view-slider",
				),
				"description" => "Select Slider Style",
			),	
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),

			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Slider Autoplay",
				"param_name" => "autoplay",
				"value" => array(
					"Enable" => "st1",
					"Disable" => "st2",
					
				),
				"description" => "Optional.",
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Slider Speed",
				"param_name" => "slider_speed",
				"value" => "",
				"description" => "Default: 1200",
			),
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Testimonial_2 extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Testimonial Item", "umaya",
        "base" => "wr_vc_testimonial_2",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_testimonials_2'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Client's Image",
				"param_name" => "image",
				"description" => ""
			),
			
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Client Name",
				"param_name" => "clientname",
				"value" => "",
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Designation",
				"param_name" => "designation",
				"value" => "",
				"description" => "e.x: Investor",
				
			),
			
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "content",
				"value" => ""
			),
			
					
            
        )
) );

// wr testimonials 3
class WPBakeryShortCode_WR_VC_Testimonials_3  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Testimonial 3", "umaya",
        "base" => "wr_vc_testimonials_3",
        "as_parent" => array('only' => 'wr_vc_testimonial_3'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'Testimonial',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Slider Column",
				"param_name" => "slider_column",
				"value" => array(
					"2 Column" => "st1",
					"3 Column" => "st2",
					
				),
				"description" => "Optional.",
			),	

			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Slider Autoplay",
				"param_name" => "autoplay",
				"value" => array(
					"Enable" => "st1",
					"Disable" => "st2",
					
				),
				"description" => "Optional.",
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Slider Speed",
				"param_name" => "slider_speed",
				"value" => "",
				"description" => "Default: 1200",
			),
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Testimonial_3 extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Testimonial Item", "umaya",
        "base" => "wr_vc_testimonial_3",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_testimonials_3'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Client's Image",
				"param_name" => "image",
				"description" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Client Name",
				"param_name" => "clientname",
				"value" => "",
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Designation",
				"param_name" => "designation",
				"value" => "",
				"description" => "e.x: Investor",
				
			),
			
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "content",
				"value" => ""
			),
			
		)
) );

// wr testimonials 4
class WPBakeryShortCode_WR_VC_Testimonials_4  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Testimonial 4", "umaya",
        "base" => "wr_vc_testimonials_4",
        "as_parent" => array('only' => 'wr_vc_testimonial_4'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'Testimonial',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),

			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Slider Autoplay",
				"param_name" => "autoplay",
				"value" => array(
					"Enable" => "st1",
					"Disable" => "st2",
					
				),
				"description" => "Optional.",
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Slider Speed",
				"param_name" => "slider_speed",
				"value" => "",
				"description" => "Default: 1200",
			),
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Testimonial_4 extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Testimonial Item", "umaya",
        "base" => "wr_vc_testimonial_4",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_testimonials_4'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Client's Image",
				"param_name" => "image",
				"description" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Client Name",
				"param_name" => "clientname",
				"value" => "",
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Designation",
				"param_name" => "designation",
				"value" => "",
				"description" => "e.x: Investor",
				
			),
			
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "content",
				"value" => ""
			),
			
		)
) );

// wr team carousel
class WPBakeryShortCode_WR_VC_Team_Carousels  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Team Carousel", "umaya",
        "base" => "wr_vc_team_carousels",
        "as_parent" => array('only' => 'wr_vc_team_carousel'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'Team',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),

        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Team_Carousel extends WPBakeryShortCodesContainer {}
vc_map( array(
        "name" => "Team Item", "umaya",
        "base" => "wr_vc_team_carousel",
		"as_parent" => array('only' => 'wr_vc_team_carousel_social'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		"as_child" => array('only' => 'wr_vc_team_carousels'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "content_element" => true,
		"icon" => "icon-umaya",
		"show_settings_on_create" => true,
        "params" => array(
				
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Member's Image",
				"param_name" => "image",
				"description" => ""
			),
			
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Member's Name",
				"param_name" => "membername",
				"value" => "",
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Designation",
				"param_name" => "designation",
				"value" => "",
				"description" => "e.x: Investor",
				
			),
			
				
            
        ),
		 "js_view" => 'VcColumnView'
) );


class WPBakeryShortCode_WR_VC_Team_Carousel_Social extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Team Social Item", "umaya",
        "base" => "wr_vc_team_carousel_social",
        "content_element" => true,
		"icon" => "icon-umaya",
		"as_child" => array('only' => 'wr_vc_team_carousel'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Media Name",
				"param_name" => "sc_name",
				"value" => "",
				"description" => "E.X: facebook",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Media URL",
				"param_name" => "sc_url",
				"value" => "",
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Animation Delay",
				"param_name" => "animation_delay",
				"value" => "",
				"description" => "E.X: 01",
			),
			
			
        )
) );


// wr team carousel
class WPBakeryShortCode_WR_VC_Team_Ms_Grids  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Team Masonry Grid", "umaya",
        "base" => "wr_vc_team_ms_grids",
        "as_parent" => array('only' => 'wr_vc_team_ms_grid'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'Team',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),

        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Team_Ms_Grid extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Team Item", "umaya",
        "base" => "wr_vc_team_ms_grid",
		"as_child" => array('only' => 'wr_vc_team_ms_grids'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "content_element" => true,
		"icon" => "icon-umaya",
		"show_settings_on_create" => true,
        "params" => array(
				
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Member's Image",
				"param_name" => "image",
				"description" => ""
			),
			
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Member's Name",
				"param_name" => "membername",
				"value" => "",
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Designation",
				"param_name" => "designation",
				"value" => "",
				"description" => "e.x: Investor",
				
			),
			
				
            
        ),
		
) );




// wr text car
class WPBakeryShortCode_WR_VC_Text_slides  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Text Carousel", "umaya",
        "base" => "wr_vc_text_slides",
        "as_parent" => array('only' => 'wr_vc_text_slide'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'UMAYA',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),

			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Slider Autoplay",
				"param_name" => "autoplay",
				"value" => array(
					"Enable" => "st1",
					"Disable" => "st2",
					
				),
				"description" => "Optional.",
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Slider Speed",
				"param_name" => "slider_speed",
				"value" => "",
				"description" => "Default: 1200",
			),
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Text_slide extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Carousel Item", "umaya",
        "base" => "wr_vc_text_slide",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_slides'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => "",
				"description" => "",
			),
			
			
			
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "content",
				"value" => ""
			),
			
					
            
        )
) );

// portfolio
vc_map( array(
		"name" => "Umaya Portfolio Standard",
		"base" => "umaya_portfolio_standard",
		"category" => 'Portfolio',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Portfolio Filter', 'umaya'),
				"param_name" => "umaya_enable_filter",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
				),
				"description" => "Enable/ Disable Portfolio Filter.",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Portfolio Column', 'umaya'),
				"param_name" => "umaya_portfolio_column",
				"value" => array(
					"3 Column" => "st1",
					"2 Column" => "st2",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Everything",
				"param_name" => "text1",
				"value" => "",
				"description" => "Translet Option.",
				"dependency" => Array('element' => "umaya_enable_filter", 'value' => array('st2'))
				
			),
					
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				"dependency" => Array('element' => "umaya_enable_filter", 'value' => array('st1'))
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			
				
		)
) );

// portfolio full
vc_map( array(
		"name" => "Umaya Portfolio Wide",
		"base" => "umaya_portfolio_wide",
		"category" => 'Portfolio',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Portfolio Filter', 'umaya'),
				"param_name" => "umaya_enable_filter",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
				),
				"description" => "Enable/ Disable Portfolio Filter.",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Everything",
				"param_name" => "text1",
				"value" => "",
				"description" => "Translet Option.",
				"dependency" => Array('element' => "umaya_enable_filter", 'value' => array('st2'))
				
			),
					
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				"dependency" => Array('element' => "umaya_enable_filter", 'value' => array('st1'))
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			
				
		)
) );


// portfolio 2 col
vc_map( array(
		"name" => "Umaya Portfolio 2 Col",
		"base" => "umaya_portfolio_2col",
		"category" => 'Portfolio',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Portfolio Filter', 'umaya'),
				"param_name" => "umaya_enable_filter",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
				),
				"description" => "Enable/ Disable Portfolio Filter.",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Everything",
				"param_name" => "text1",
				"value" => "",
				"description" => "Translet Option.",
				"dependency" => Array('element' => "umaya_enable_filter", 'value' => array('st2'))
				
			),
					
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				"dependency" => Array('element' => "umaya_enable_filter", 'value' => array('st1'))
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			
				
		)
) );


// portfolio car
vc_map( array(
		"name" => "Portfolio Carousel",
		"base" => "umaya_portfolio_carousel",
		"category" => 'Portfolio',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			
					
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			
				
		)
) );


// portfolio umaya_portfolio_parallax
vc_map( array(
		"name" => "Umaya Portfolio Parallax",
		"base" => "umaya_portfolio_parallax",
		"category" => 'Portfolio',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Explore",
				"param_name" => "text1",
				"value" => "",
				"description" => "Text Translet Option.",
				
				
			),
				
		)
) );

// portfolio umaya_portfolio_parallax
vc_map( array(
		"name" => "Umaya Portfolio Parallax 2",
		"base" => "umaya_portfolio_parallax2",
		"category" => 'Portfolio',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			
				
		)
) );

// portfolio umaya_portfolio_freemode
vc_map( array(
		"name" => "Umaya Portfolio Freemode",
		"base" => "umaya_portfolio_freemode",
		"category" => 'Portfolio',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			
				
		)
) );


// portfolio umaya_portfolio_column
vc_map( array(
		"name" => "Umaya Portfolio Column",
		"base" => "umaya_portfolio_column",
		"category" => 'Portfolio',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Parallax Effect', 'umaya'),
				"param_name" => "umaya_enable_parallax",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
				),
				"description" => "Enable/ Disable Parallax Effect.",
			),
				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			
				
		)
) );

// portfolio fade 
vc_map( array(
		"name" => "Umaya Portfolio Fade",
		"base" => "umaya_portfolio_fade",
		"category" => 'Portfolio',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			
				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			
				
		)
) );


// portfolio fade horizontal
vc_map( array(
		"name" => "Portfolio Fade Horizontal",
		"base" => "umaya_portfolio_fade_horizontal",
		"category" => 'Portfolio',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			
				
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			
				
		)
) );

// popup video
vc_map( array(
		"name" => "Umaya Popup Video",
		"base" => "umaya_popup_video",
		"category" => 'UMAYA',
		"icon" => "icon-wpb-film-youtube",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Video URL', 'umaya'),
				"param_name" => "video_url",
				"value" => "",
				"description" => esc_html__('Use Vimeo/ Youtube video URL. E.x: https://www.youtube.com/watch?v=xO0lpnksFgM', 'umaya'),
				
			),
			
			
		)
) );


// wr video con
class WPBakeryShortCode_WR_VC_Vid_Cons  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Popup Video With Content", "umaya",
        "base" => "wr_vc_vid_cons",
        "as_parent" => array('only' => 'wr_vc_vid_con'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'UMAYA',
		"icon" => "icon-wpb-film-youtube",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),

			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Slider Autoplay",
				"param_name" => "autoplay",
				"value" => array(
					"Enable" => "st1",
					"Disable" => "st2",
					
				),
				"description" => "Optional.",
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Slider Speed",
				"param_name" => "slider_speed",
				"value" => "",
				"description" => "Default: 1200",
			),
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Vid_con extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Video Item", "umaya",
        "base" => "wr_vc_vid_con",
        "content_element" => true,
		"icon" => "icon-wpb-film-youtube",
        "as_child" => array('only' => 'wr_vc_vid_cons'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Video Position', 'umaya'),
				"param_name" => "video_position",
				"value" => array(
					"Left" => "st1",
					"Right" => "st2",
				),
				"description" => "",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Video URL",
				"param_name" => "video_url",
				"value" => "",
				"description" => "Use YouTube/ Vimeo video URL. <br> E.X: https://www.youtube.com/watch?v=hitNXU4PoRU",
			),
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Video Thumbnail Image",
				"param_name" => "image",
				"description" => ""
			),
			
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => "",
				"description" => "",
			),
			
						
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "content",
				"value" => ""
			),
			
					
            
        )
) );

// blog standard
vc_map( array(
		"name" => "Umaya Blog Standard",
		"base" => "umaya_blog",
		"category" => 'Blog',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('By', 'umaya'),
				"param_name" => "translate_opt1",
				"value" => "",
				"description" => esc_attr__('Text translate option.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('In', 'umaya'),
				"param_name" => "translate_opt2",
				"value" => "",
				"description" => esc_attr__('Text translate option.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Continue reading', 'umaya'),
				"param_name" => "translate_opt3",
				"value" => "",
				"description" => esc_attr__('Text translate option.', 'umaya'),
			),
				
		)
) );


// blog List
vc_map( array(
		"name" => "Umaya Blog List",
		"base" => "umaya_blog_list",
		"category" => 'Blog',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('By', 'umaya'),
				"param_name" => "translate_opt1",
				"value" => "",
				"description" => esc_attr__('Text translate option.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('In', 'umaya'),
				"param_name" => "translate_opt2",
				"value" => "",
				"description" => esc_attr__('Text translate option.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Continue reading', 'umaya'),
				"param_name" => "translate_opt3",
				"value" => "",
				"description" => esc_attr__('Text translate option.', 'umaya'),
			),
				
		)
) );

// blog car
vc_map( array(
		"name" => "Umaya Blog Carousel",
		"base" => "umaya_blog_carousel",
		"category" => 'Blog',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('By', 'umaya'),
				"param_name" => "translate_opt1",
				"value" => "",
				"description" => esc_attr__('Text translate option.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('In', 'umaya'),
				"param_name" => "translate_opt2",
				"value" => "",
				"description" => esc_attr__('Text translate option.', 'umaya'),
			),
			
			
				
		)
) );


// blog grid
vc_map( array(
		"name" => "Umaya Blog Grid",
		"base" => "umaya_blog_grid",
		"category" => 'Blog',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('By', 'umaya'),
				"param_name" => "translate_opt1",
				"value" => "",
				"description" => esc_attr__('Text translate option.', 'umaya'),
			),
			
			
		)
) );

// blog grid no padding
vc_map( array(
		"name" => "Blog Grid No Padding",
		"base" => "umaya_blog_grid_no_padding",
		"category" => 'Blog',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('By', 'umaya'),
				"param_name" => "translate_opt1",
				"value" => "",
				"description" => esc_attr__('Text translate option.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('In', 'umaya'),
				"param_name" => "translate_opt2",
				"value" => "",
				"description" => esc_attr__('Text translate option.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Continue reading', 'umaya'),
				"param_name" => "translate_opt3",
				"value" => "",
				"description" => esc_attr__('Text translate option.', 'umaya'),
			),
				
		)
) );

// Masonry grid
vc_map( array(
		"name" => "Blog Masonry Grid",
		"base" => "umaya_blog_masonry_grid",
		"category" => 'Blog',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Blog Filter', 'umaya'),
				"param_name" => "umaya_enable_filter",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
				),
				"description" => "Enable/ Disable Blog Filter.",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Blog Column', 'umaya'),
				"param_name" => "umaya_blog_colmuns",
				"value" => array(
					"4 Column" => "st1",
					"3 Columns" => "st2",
					"2 Columns" => "st3",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Everything",
				"param_name" => "text1",
				"value" => "",
				"description" => "Translet Option.",
				"dependency" => Array('element' => "umaya_enable_filter", 'value' => array('st2'))
				
			),
					
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				"dependency" => Array('element' => "umaya_enable_filter", 'value' => array('st1'))
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('By', 'umaya'),
				"param_name" => "translate_opt1",
				"value" => "",
				"description" => esc_attr__('Text translate option.', 'umaya'),
				"dependency" => Array('element' => "umaya_blog_colmuns", 'value' => array('st3'))
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('In', 'umaya'),
				"param_name" => "translate_opt2",
				"value" => "",
				"description" => esc_attr__('Text translate option.', 'umaya'),
				"dependency" => Array('element' => "umaya_blog_colmuns", 'value' => array('st3'))
			),
			
			
				
		)
) );

// wr list item
class WPBakeryShortCode_WR_VC_Lists  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya List Item", "umaya",
        "base" => "wr_vc_lists",
        "as_parent" => array('only' => 'wr_vc_list'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'UMAYA',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Text Color', 'umaya'),
				"param_name" => "text_color",
				"value" => array(
					"Black" => "text-color-black",
					"White" => "text-color-white",
					"Alto" => "text-color-dadada",
					"Silver Chalice" => "text-color-b0b0b0",
					"Silver" => "text-color-bbbbbb",
					"Gray" => "text-color-8a8a8a",
					"Dusty Gray" => "text-color-979797",
					"Dove Gray" => "text-color-6d6d6d",
					"Mercury" => "text-color-e4e4e4",
					"Gray 2" => "text-color-888888",
					"Red" => "text-color-red",
					
				),
				"description" => "",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Font Style', 'umaya'),
				"param_name" => "font_style",
				"value" => array(
					
					"XXS" => "subhead-xxs",
					"XS" => "subhead-xs",
					"S" => "subhead-s",
					"M" => "subhead-m",
					"L" => "subhead-l",
					"XL" => "subhead-xl",
					
				),
				"description" => "",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Marin Top', 'umaya'),
				"param_name" => "top_padding",
				"value" => array(
					"Default(Marin 60)" => "margin-top-60",
					"Margin 50" => "margin-top-50",
					"Margin 40" => "margin-top-40",
					"Margin 30" => "margin-top-30",
					"Margin 20" => "margin-top-20",
					"Margin 10" => "margin-top-10",
					"No Margin" => "no-margin",
					
				),
				"description" => "Optional.",
			),
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_List extends WPBakeryShortCode {}
vc_map( array(
        "name" => "List Item", "umaya",
        "base" => "wr_vc_list",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_lists'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
				
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('List Style Color', 'umaya'),
				"param_name" => "list_style",
				"value" => array(
					
					"Red" => "red",
					"Black" => "black",
					"White" => "white",
					"None" => "list-none",
				),
				"description" => "",
			),
			
			
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "content",
				"value" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Animation Delay",
				"param_name" => "animation_delay",
				"value" => "",
				"description" => "e.x:04",
			),
		  
        )
) );

// team
vc_map( array(
		"name" => "Umaya Team Grid",
		"base" => "umaya_team_member",
		"category" => 'Team',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Member's Image",
				"param_name" => "image",
				"description" => ""
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Hover Effect', 'umaya'),
				"param_name" => "hover_effect",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
				),
				"description" => "",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Content Position', 'umaya'),
				"param_name" => "content_position",
				"value" => array(
					"Bottom" => "st1",
					"Middle" => "st2",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 1",
				"param_name" => "data_title_1",
				"value" => "",
				"description" => "e.x: Balanchaev Balancha",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 2",
				"param_name" => "data_title_2",
				"value" => "",
				"description" => "e.x: Web Designer",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Text Color', 'umaya'),
				"param_name" => "text_color",
				"value" => array(
					"Black" => "text-color-black ",
					"White" => "text-color-white",
					"Alto" => "text-color-dadada",
					"Silver Chalice" => "text-color-b0b0b0",
					"Silver" => "text-color-bbbbbb",
					"Gray" => "text-color-8a8a8a",
					"Dusty Gray" => "text-color-979797",
					"Dove Gray" => "text-color-6d6d6d",
					"Mercury" => "text-color-e4e4e4",
					"Gray 2" => "text-color-888888",
					"Red" => "text-color-red",
					
				),
				"description" => "",
			),
			
				
		)
) );


// wr team grid 2
class WPBakeryShortCode_WR_VC_Team_Grids  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Team Grid 2", "umaya",
        "base" => "wr_vc_team_grids",
        "as_parent" => array('only' => 'wr_vc_team_grid'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'Team',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Member's Image",
				"param_name" => "image",
				"description" => ""
			),
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Member's Hover Image",
				"param_name" => "image_hover",
				"description" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Member's Name",
				"param_name" => "membername",
				"value" => "",
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Designation",
				"param_name" => "designation",
				"value" => "",
				"description" => "e.x: Investor",
				
			),
			
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Team_Grid extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Team Social Item", "umaya",
        "base" => "wr_vc_team_grid",
		"as_child" => array('only' => 'wr_vc_team_grids'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "content_element" => true,
		"icon" => "icon-umaya",
		"show_settings_on_create" => true,
        "params" => array(
				
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Media Name",
				"param_name" => "sc_name",
				"value" => "",
				"description" => "E.X: facebook",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Social Media URL",
				"param_name" => "sc_url",
				"value" => "",
				"description" => "",
			),
					
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Animation Delay",
				"param_name" => "animation_delay",
				"value" => "",
				"description" => "e.x:01",
			),
        ),
		
) );

// team
vc_map( array(
		"name" => "Umaya Team Blok",
		"base" => "umaya_team_block",
		"category" => 'Team',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Offset', 'umaya'),
				"param_name" => "team_offset",
				"value" => array(
					"Disable" => "no-offset",
					"One" => "one-offset",
					"Two" => "two-offset",
					"Three" => "three-offset",
				),
				"description" => "",
			),
			
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Member's Image",
				"param_name" => "image",
				"description" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 1",
				"param_name" => "data_title_1",
				"value" => "",
				"description" => "e.x: Curtis",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 2",
				"param_name" => "data_title_2",
				"value" => "",
				"description" => "e.x: Schubert",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 3",
				"param_name" => "data_title_3",
				"value" => "",
				"description" => "e.x: Creative director",
			),
			
			
				
		)
) );


// team
vc_map( array(
		"name" => "Umaya Team Blok 2",
		"base" => "umaya_team_block2",
		"category" => 'Team',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Text Align', 'umaya'),
				"param_name" => "text_align",
				"value" => array(
					"Left" => "text-left",
					"Center" => "text-center",
					"Right" => "text-right",
					
				),
				"description" => "",
			),	
			
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Member's Image",
				"param_name" => "image",
				"description" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 1",
				"param_name" => "data_title_1",
				"value" => "",
				"description" => "e.x: James Patterson",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 2",
				"param_name" => "data_title_2",
				"value" => "",
				"description" => "e.x: Creative director",
			),
			
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "",
				"description" => "",
			),
			
				
		)
) );

// image slider
vc_map( array(
		"name" => "Umaya Image Carousel",
		"base" => "umaya_image_slider",
		"category" => 'UMAYA',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			array(
				"type" => "attach_images",
				"holder" => "div",
				"class" => "",
				"heading" => "Upload Images",
				"param_name" => "image",
				"description" => ""
			),
			
			
				
		)
) );


// image gallery
vc_map( array(
		"name" => "Umaya Image Gallery",
		"base" => "umaya_image_gallery",
		"category" => 'UMAYA',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			array(
				"type" => "attach_images",
				"holder" => "div",
				"class" => "",
				"heading" => "Upload Images",
				"param_name" => "image",
				"description" => ""
			),
			
			
				
		)
) );


// Pricing Block
class WPBakeryShortCode_WR_VC_Pricing  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Price Table", "umaya",
        "base" => "wr_vc_pricing",
        "as_parent" => array('only' => 'wr_vc_pricing_list'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		
        "content_element" => true,
		"category" => 'Price Table',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
						
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => ""
			),

						
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Amount",
				"param_name" => "price",
				"value" => "",
			),		
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Time Period",
				"param_name" => "period",
				"value" => "",
				"description" => "e.x: Per month",
			),		
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Text",
				"param_name" => "button_text",
				"value" => "",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Link URL",
				"param_name" => "button_link",
				"value" => "",
			),			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "link_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "",
			),				
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Recommended",
				"param_name" => "active",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
				),
				"description" => "",
			),
  
        ),
        "js_view" => 'VcColumnView'
) );



class WPBakeryShortCode_WR_VC_Pricing_List extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Pricing List Item", "umaya",
        "base" => "wr_vc_pricing_list",
        "content_element" => true,
		"icon" => "umaya-icon",
        "as_child" => array('only' => 'wr_vc_pricing'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Section Title",
				"param_name" => "title",
				"value" => ""
			),

			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 1",
				"param_name" => "data_title_1",
				"value" => "",
				"description" => "e.x: Copper mug",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 1 Icon",
				"param_name" => "data_title_1_icon",
				"value" => array(
					"Check" => "check",
					"Remove" => "x",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 2",
				"param_name" => "data_title_2",
				"value" => "",
				"description" => "e.x: Copper mug",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 2 Icon",
				"param_name" => "data_title_2_icon",
				"value" => array(
					"Check" => "check",
					"Remove" => "x",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 3",
				"param_name" => "data_title_3",
				"value" => "",
				"description" => "e.x: Copper mug",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 3 Icon",
				"param_name" => "data_title_3_icon",
				"value" => array(
					"Check" => "check",
					"Remove" => "x",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 4",
				"param_name" => "data_title_4",
				"value" => "",
				"description" => "e.x: Copper mug",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 4 Icon",
				"param_name" => "data_title_4_icon",
				"value" => array(
					"Check" => "check",
					"Remove" => "x",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 5",
				"param_name" => "data_title_5",
				"value" => "",
				"description" => "e.x: Copper mug",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 5 Icon",
				"param_name" => "data_title_5_icon",
				"value" => array(
					"Check" => "check",
					"Remove" => "x",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 6",
				"param_name" => "data_title_6",
				"value" => "",
				"description" => "e.x: Copper mug",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 6 Icon",
				"param_name" => "data_title_6_icon",
				"value" => array(
					"Check" => "check",
					"Remove" => "x",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 7",
				"param_name" => "data_title_7",
				"value" => "",
				"description" => "e.x: Copper mug",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 7 Icon",
				"param_name" => "data_title_7_icon",
				"value" => array(
					"Check" => "check",
					"Remove" => "x",
				),
				"description" => "",
			),

			
            
        )
) );


// Pricing Block 2
class WPBakeryShortCode_WR_VC_Pricing2  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Price Table 2", "umaya",
        "base" => "wr_vc_pricing2",
        "as_parent" => array('only' => 'wr_vc_pricing_list2'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		
        "content_element" => true,
		"category" => 'Price Table',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
						
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => ""
			),

						
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Amount",
				"param_name" => "price",
				"value" => "",
			),		
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Time Period",
				"param_name" => "period",
				"value" => "",
				"description" => "e.x: Per month",
			),		
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Text",
				"param_name" => "button_text",
				"value" => "",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Link URL",
				"param_name" => "button_link",
				"value" => "",
			),			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "link_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "",
			),				
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Active 1st Item",
				"param_name" => "active",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "js-accordion-first-active",
				),
				"description" => "",
			),
  
        ),
        "js_view" => 'VcColumnView'
) );



class WPBakeryShortCode_WR_VC_Pricing_List2 extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Pricing List Item", "umaya",
        "base" => "wr_vc_pricing_list2",
        "content_element" => true,
		"icon" => "umaya-icon",
        "as_child" => array('only' => 'wr_vc_pricing2'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
		
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Section Title",
				"param_name" => "title",
				"value" => ""
			),

			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 1",
				"param_name" => "data_title_1",
				"value" => "",
				"description" => "e.x: Copper mug",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 1 Icon",
				"param_name" => "data_title_1_icon",
				"value" => array(
					"Check" => "check",
					"Remove" => "x",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 2",
				"param_name" => "data_title_2",
				"value" => "",
				"description" => "e.x: Copper mug",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 2 Icon",
				"param_name" => "data_title_2_icon",
				"value" => array(
					"Check" => "check",
					"Remove" => "x",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 3",
				"param_name" => "data_title_3",
				"value" => "",
				"description" => "e.x: Copper mug",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 3 Icon",
				"param_name" => "data_title_3_icon",
				"value" => array(
					"Check" => "check",
					"Remove" => "x",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 4",
				"param_name" => "data_title_4",
				"value" => "",
				"description" => "e.x: Copper mug",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 4 Icon",
				"param_name" => "data_title_4_icon",
				"value" => array(
					"Check" => "check",
					"Remove" => "x",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 5",
				"param_name" => "data_title_5",
				"value" => "",
				"description" => "e.x: Copper mug",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 5 Icon",
				"param_name" => "data_title_5_icon",
				"value" => array(
					"Check" => "check",
					"Remove" => "x",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 6",
				"param_name" => "data_title_6",
				"value" => "",
				"description" => "e.x: Copper mug",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 6 Icon",
				"param_name" => "data_title_6_icon",
				"value" => array(
					"Check" => "check",
					"Remove" => "x",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 7",
				"param_name" => "data_title_7",
				"value" => "",
				"description" => "e.x: Copper mug",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 7 Icon",
				"param_name" => "data_title_7_icon",
				"value" => array(
					"Check" => "check",
					"Remove" => "x",
				),
				"description" => "",
			),

			
            
        )
) );


// Pricing Block 2
class WPBakeryShortCode_WR_VC_Pricing3  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Horizontal Price Table", "umaya",
        "base" => "wr_vc_pricing3",
        "as_parent" => array('only' => 'wr_vc_pricing_list3'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		
        "content_element" => true,
		"category" => 'Price Table',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
						
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => ""
			),

						
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Amount",
				"param_name" => "price",
				"value" => "",
			),		
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Time Period",
				"param_name" => "period",
				"value" => "",
				"description" => "e.x: Per month",
			),		
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Text",
				"param_name" => "button_text",
				"value" => "",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Link URL",
				"param_name" => "button_link",
				"value" => "",
			),			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "link_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "",
			),				
			
  
        ),
        "js_view" => 'VcColumnView'
) );



class WPBakeryShortCode_WR_VC_Pricing_List3 extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Pricing List Item", "umaya",
        "base" => "wr_vc_pricing_list3",
        "content_element" => true,
		"icon" => "umaya-icon",
        "as_child" => array('only' => 'wr_vc_pricing3'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
		
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title",
				"param_name" => "data_title",
				"value" => "",
				"description" => "e.x: Copper mug",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title 1 Icon",
				"param_name" => "data_title_icon",
				"value" => array(
					"Check" => "check",
					"Remove" => "x",
				),
				"description" => "",
			),
			
			
        )
) );

// portfolio
vc_map( array(
		"name" => "umaya Filterable Portfolio",
		"base" => "umaya_portfolio_filter",
		"category" => 'UMAYA',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Filter', 'umaya'),
				"param_name" => "umaya_filter",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
				),
				"description" => "Enable/ Disable Filter Option.",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Everything', 'umaya'),
				"param_name" => "text1",
				"value" => "",
				"description" => esc_html__('Translet Option', 'umaya'),
				"dependency" => Array('element' => "umaya_filter", 'value' => array('st2'))
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Load More Button', 'umaya'),
				"param_name" => "umaya_load_more_button",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
				),
				"description" => "Enable/ Disable Load More Button.",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Post Load', 'umaya'),
				"param_name" => "postload",
				"value" => "",
				"description" => esc_html__('Number Of Post Show On Page Before Load More Button.<br> Required.', 'umaya'),
				"dependency" => Array('element' => "umaya_load_more_button", 'value' => array('st2'))
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Load More Button Text', 'umaya'),
				"param_name" => "text4",
				"value" => "",
				"description" => esc_html__('e.x: Show More', 'umaya'),
				"dependency" => Array('element' => "umaya_load_more_button", 'value' => array('st2'))
			),
			
			
						
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => "Use this field if you need.",
				"dependency" => Array('element' => "umaya_filter", 'value' => array('st1'))
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Count', 'umaya'),
				"param_name" => "postcount",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'umaya'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'umaya'),
			),
			
			
				
		)
) );



// image pop
vc_map( array(
		"name" => "Umaya Image",
		"base" => "umaya_popup_img_shortcode",
		"category" => 'UMAYA',
		"icon" => "icon-wpb-single-image",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Hover Style', 'umaya'),
				"param_name" => "image_hover_ani",
				"value" => array(
					"Disable" => "st1",
					"Animation" => "st2",
					"Image Popup" => "st3",
				),
				"description" => "",
			),
			
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Upload Image",
				"param_name" => "image",
				"description" => ""
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Display Animation', 'umaya'),
				"param_name" => "image_animation_st3",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
					
				),
				"description" => "",
				"dependency" => Array('element' => "image_hover_ani", 'value' => array('st3'))
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Padding Top', 'umaya'),
				"param_name" => "image_padding_top",
				"value" => array(
					"No Padding" => "no-padding-top",
					"Padding 120" => "padding-top-120",
					"Padding 100" => "padding-top-100",
					"Padding 90" => "padding-top-90",
					"Padding 60" => "padding-top-60",
					"Padding 50" => "padding-top-50",
					"Padding 40" => "padding-top-40",
					"Padding 30" => "padding-top-30",
					"Padding 20" => "padding-top-20",
					"Padding 10" => "padding-top-10",
					
				),
				"description" => "",
				"dependency" => Array('element' => "image_hover_ani", 'value' => array('st3'))
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Padding Bottom', 'umaya'),
				"param_name" => "image_padding_bottom",
				"value" => array(
					"No Padding" => "no-padding-bottom",
					"Padding 2" => "padding-bottom-120",
					"Padding 100" => "padding-bottom-100",
					"Padding 90" => "padding-bottom-90",
					"Padding 60" => "padding-bottom-60",
					"Padding 50" => "padding-bottom-50",
					"Padding 40" => "padding-bottom-40",
					"Padding 30" => "padding-bottom-30",
					"Padding 20" => "padding-bottom-20",
					"Padding 10" => "padding-bottom-10",
					"No Padding" => "no-padding-bottom",
					
				),
				"description" => "",
				"dependency" => Array('element' => "image_hover_ani", 'value' => array('st3'))
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Overlay', 'umaya'),
				"param_name" => "image_overlay",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
				),
				"description" => "",
				"dependency" => Array('element' => "image_hover_ani", 'value' => array('st1'))
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Custom URL', 'umaya'),
				"param_name" => "custom_url",
				"value" => "",
				"description" => esc_attr__('', 'umaya'),
				"dependency" => Array('element' => "image_hover_ani", 'value' => array('st2'))
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "button_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "Optional.",
				"dependency" => Array('element' => "image_hover_ani", 'value' => array('st2'))
			),
			
				
		)
) );



// progress bar
vc_map( array(
		"name" => "Umaya Progress Bar",
		"base" => "umaya_progress_bar",
		"category" => 'UMAYA',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Progress Bar Color', 'umaya'),
				"param_name" => "progress_bar_color",
				"value" => array(
					"Red" => "red",
					"Black" => "black",
				),
				"description" => "",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Title', 'umaya'),
				"param_name" => "data_title_1",
				"value" => "",
				"description" => esc_attr__('e.x: Product Branding', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Number Count', 'umaya'),
				"param_name" => "data_title_2",
				"value" => "",
				"description" => esc_attr__('e.x: 63', 'umaya'),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Section Animation Delay', 'umaya'),
				"param_name" => "sec_ani_delay",
				"value" => "",
				"description" => esc_attr__('e.x: 02.', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Text Animation Delay', 'umaya'),
				"param_name" => "text_delay",
				"value" => "",
				"description" => esc_attr__('e.x: 02. Default: 02', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Progress Bar Animation Delay', 'umaya'),
				"param_name" => "ani_delay",
				"value" => "",
				"description" => esc_attr__('e.x: 03', 'umaya'),
			),
			
			
				
		)
) );

// flip button
vc_map( array(
		"name" => "Umaya Text Button",
		"base" => "umaya_text_button",
		"category" => 'UMAYA',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
		
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Title', 'umaya'),
				"param_name" => "data_title_1",
				"value" => "",
				"description" => esc_attr__('', 'umaya'),
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Button Type",
				"param_name" => "button_type",
				"value" => array(
					"Custom URL" => "st1",
					"Email Address" => "st2",
					"Phone Number" => "st3",	
					
				),
				"description" => "Optional.",
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('URL', 'umaya'),
				"param_name" => "link_url",
				"value" => "",
				"description" => esc_attr__('', 'umaya'),
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Link Target",
				"param_name" => "button_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "Optional.",
				"dependency" => Array('element' => "button_type", 'value' => array('st1'))
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Animation Delay', 'umaya'),
				"param_name" => "ani_delay",
				"value" => "",
				"description" => esc_attr__('e.x: 04. Default: 04', 'umaya'),
			),
			
			
				
		)
) );


// wr list item
class WPBakeryShortCode_WR_VC_Features  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Features", "umaya",
        "base" => "wr_vc_features",
        "as_parent" => array('only' => 'wr_vc_feature'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'UMAYA',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
			
			
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Marin Top', 'umaya'),
				"param_name" => "top_padding",
				"value" => array(
					"Default(Marin 60)" => "margin-top-60",
					"Margin 50" => "margin-top-50",
					"Margin 40" => "margin-top-40",
					"Margin 30" => "margin-top-30",
					"Margin 20" => "margin-top-20",
					"Margin 10" => "margin-top-10",
					"No Margin" => "no-margin",
					
				),
				"description" => "Optional.",
			),
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Feature extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Feature Item", "umaya",
        "base" => "wr_vc_feature",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_features'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Column', 'umaya'),
				"param_name" => "column_class",
				"value" => array(
					"2 Columns" => "grid-item-50-50-100",
					"3 Columns" => "grid-item-33-50-100",
					"4 Columns" => "grid-item-25-50-100",
					
				),
				"description" => "",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Text Align', 'umaya'),
				"param_name" => "text_align",
				"value" => array(
					"Left" => "text-left",
					"Center" => "text-center",
					"Right" => "text-right",
					
				),
				"description" => "",
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Title Color', 'umaya'),
				"param_name" => "text_color_title",
				"value" => array(
					"Black" => "text-color-black",
					"White" => "text-color-white",
					"Alto" => "text-color-dadada",
					"Silver Chalice" => "text-color-b0b0b0",
					"Silver" => "text-color-bbbbbb",
					"Gray" => "text-color-8a8a8a",
					"Dusty Gray" => "text-color-979797",
					"Dove Gray" => "text-color-6d6d6d",
					"Mercury" => "text-color-e4e4e4",
					"Gray 2" => "text-color-888888",
					"Red" => "text-color-red",
					
				),
				"description" => "",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Ttile",
				"param_name" => "data_title",
				"value" => "",
				"description" => "E.X: Interior design",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Serial Number",
				"param_name" => "data_serial",
				"value" => "",
				"description" => "E.X: 01",
				
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Content Color', 'umaya'),
				"param_name" => "text_color",
				"value" => array(
					"Black" => "text-color-black",
					"White" => "text-color-white",
					"Alto" => "text-color-dadada",
					"Silver Chalice" => "text-color-b0b0b0",
					"Silver" => "text-color-bbbbbb",
					"Gray" => "text-color-8a8a8a",
					"Dusty Gray" => "text-color-979797",
					"Dove Gray" => "text-color-6d6d6d",
					"Mercury" => "text-color-e4e4e4",
					"Gray 2" => "text-color-888888",
					"Red" => "text-color-red",
					
				),
				"description" => "",
			),
			
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "content",
				"value" => ""
			),
			
			
		  
        )
) );


// single feature
class WPBakeryShortCode_WR_VC_Single_Feature  extends WPBakeryShortCode {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Feature Block", "umaya",
        "base" => "wr_vc_single_feature",
        "content_element" => true,
		"category" => 'UMAYA',
		"icon" => "icon-umaya",
        
        "params" => array(
			
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => "Uplod Image",
				"param_name" => "image",
				"description" => ""
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Title",
				"param_name" => "title",
				"value" => ""
			),
			
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Text",
				"param_name" => "content",
				"value" => ""
			),
			
            
        ),
        
) );



// wr accordion
class WPBakeryShortCode_WR_VC_Accordions  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Umaya Accordion", "umaya",
        "base" => "wr_vc_accordions",
        "as_parent" => array('only' => 'wr_vc_accordion'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'UMAYA',
		"icon" => "icon-umaya",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => "Active 1st Item",
				"param_name" => "active",
				"value" => array(
					"Enable" => "js-accordion-first-active",
					"Disable" => "st1",
				),
				"description" => "",
			),
			
			
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Accordion extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Accordion Item", "umaya",
        "base" => "wr_vc_accordion",
        "content_element" => true,
		"icon" => "icon-umaya",
        "as_child" => array('only' => 'wr_vc_accordions'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
		
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Title Style', 'umaya'),
				"param_name" => "title_style",
				"value" => array(
					'Default' => esc_html__( 'headline-l', 'umaya' ),
					'XL' => esc_html__( 'headline-xl', 'umaya' ),
					'XXL' => esc_html__( 'headline-xxl', 'umaya' ),
					'XXXL' => esc_html__( 'headline-xxxl', 'umaya' ),
					'XXXXL' => esc_html__( 'headline-xxxxl', 'umaya' ),
					'M' => esc_html__( 'headline-m', 'umaya' ),
					'S' => esc_html__( 'headline-s', 'umaya' ),
					'Sub Head' => esc_html__( 'subhead-s', 'umaya' ),
					'XS' => esc_html__( 'headline-xs', 'umaya' ),
					'XXS' => esc_html__( 'headline-xxs', 'umaya' ),
					'XXXS' => esc_html__( 'headline-xxxs', 'umaya' ),
					'XXXXS' => esc_html__( 'headline-xxxxs', 'umaya' ),
					'XXXXXS' => esc_html__( 'subhead-xs', 'umaya' ),
				),
				"description" => "Select Title Size",
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Title",
				"param_name" => "title",
				"value" => "",
				"description" => "e.x: Concept for Project",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Text Style', 'umaya'),
				"param_name" => "text_style",
				"value" => array(
					"XS" => "body-text-xs",
					"S" => "body-text-s",
					"M" => "body-text-m",
					"L" => "body-text-l",
					"XL" => ".body-text-xl",
					
				),
				"description" => "Select Text Size.",
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Data Content",
				"param_name" => "content",
				"value" => "",
				"description" => "",
			),
			
			
			
        )
) );

// umaya text block
vc_map( array(
		"name" => "Umaya Blockquote",
		"base" => "umaya_blockquote",
		"category" => 'UMAYA',
		"icon" => "icon-umaya",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Blockquote Style', 'umaya'),
				"param_name" => "blockquote_style",
				"value" => array(
					"Style 1" => "st1",
					"Style 2" => "st2",
				),
				"description" => "",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Text Color', 'umaya'),
				"param_name" => "text_color",
				"value" => array(
					"Black" => "text-color-black ",
					"White" => "text-color-white",
					"Alto" => "text-color-dadada",
					"Silver Chalice" => "text-color-b0b0b0",
					"Silver" => "text-color-bbbbbb",
					"Gray" => "text-color-8a8a8a",
					"Dusty Gray" => "text-color-979797",
					"Dove Gray" => "text-color-6d6d6d",
					"Mercury" => "text-color-e4e4e4",
					"Gray 2" => "text-color-888888",
					"Red" => "text-color-red",
					
				),
				"description" => "",
			),
			
			
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Client Name', 'umaya'),
				"param_name" => "client_name",
				"value" => "",
				"description" => esc_html__('E.X: Jason Hardeman', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Designation', 'umaya'),
				"param_name" => "designation",
				"value" => "",
				"description" => esc_html__('E.X: Creative director', 'umaya'),
			),
			
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Company Name', 'umaya'),
				"param_name" => "co_name",
				"value" => "",
				"description" => esc_html__('E.X: XOXO production LTD', 'umaya'),
			),
			
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__('Text Style', 'umaya'),
				"param_name" => "text_style",
				"value" => array(
					"S" => "body-text-s",
					"XS" => "body-text-xs",
					"M" => "body-text-m",
					"L" => "body-text-l",
					"XL" => ".body-text-xl",
					
				),
				"description" => "Select Text Size.",
			),
			
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__('Content', 'umaya'),
				"param_name" => "content",
				"value" => "",
				"description" => esc_html__('', 'umaya'),
			),
			
			
				
		)
) );


?>