<?php
/**
 * about Tab For Theme Option.
 *
 * @package avo
 */



$this->sections[] = array(
	'id' => 'general',
	'icon' => 'el el-book',
	'title' => esc_html__('General', 'avo'),
	'desc' => esc_html__('Welcome to the theme options', 'avo'),
);

$this->sections[] = array(
	'id' => 'avo_mode',
	'icon' => 'el el-thumbs-up', 
	"subsection" => true,
	'title' => esc_html__('Avo Mode', 'avo'),
	'fields' => array(
		array(
			'id'       => 'avo_theme_mode',
			'type'     => 'button_set',
			'customizer' => true,
			'title'    => esc_html__('Website Dark/Light Mode', 'avo'),
			'subtitle' => esc_html__('Enable dark color scheme for your website', 'avo'),
			'desc' => esc_html__('Auto: Mode at the Operating System of each user', 'avo'),
			'options' => array(
				'light_mode' => esc_html__( 'Light', 'avo' ),
				'auto_mode' => esc_html__( 'Auto','avo'),
				'dark_mode' => esc_html__( 'Dark','avo'),
				),
			'default' => 'light_mode',
		),
		array(
			'id'       => 'avo_mode_switcher',
			'type'     => 'button_set',
			'customizer' => true,
			'title'    => esc_html__('Color mode switcher', 'avo'),
			'desc' => esc_html__('Enable color mode switcher for your website', 'avo'),
			'options' => array(
				'on' => esc_html__( 'On', 'avo' ),
				'off' => esc_html__( 'Off','avo'),
				),
			'default' => 'off',
		),  
	),
);


$this->sections[] = array(
	'id' => 'style',
	'icon' => 'el el-adjust-alt',
	"subsection" => true,
	'title' => esc_html__('Styling', 'avo'),
	'desc' => esc_html__('Configuration the style settings', 'avo'),
	'fields' => array(
		array(
			'id'       => 'avo_color_general',
			'type'     => 'color',
			'title'    => esc_html__('Color Scheme', 'avo'), 
			'subtitle' => esc_html__('Pick your color scheme (default: #75dab4).', 'avo'),
			'default'  => '#75dab4',
			'validate' => 'color',
		), 
		array(
			'id'       => 'avo_color_scheme',
			'type'     => 'color',
			'title'    => esc_html__('Hyperlink Color', 'avo'), 
			'subtitle' => esc_html__('Pick your color for hyperlink. Default color is black #999999', 'avo'),
			'default'  => '#999999',
			'validate' => 'color',
		), 
		array(
			'id'       => 'avo_custom_hovers',
			'type'     => 'color',
			'title'    => esc_html__('Hyperlink color on hover state', 'avo'), 
			'subtitle' => esc_html__('Pick your color for hover state in hyperlink. Default color is #75dab4', 'avo'),
			'default'  => '#75dab4',
			'validate' => 'color',
		),  
		array(
			'id'       => 'avo_heading_color',
			'type'     => 'color',
			'title'    => esc_html__('Color on Heading', 'avo'), 
			'subtitle' => esc_html__('Pick your color for heading text. Default color is black #000000', 'avo'),
			'default'  => '#000000',
			'validate' => 'color',
		), 
		array(
			'id'       => 'avo_general_color',
			'type'     => 'color',
			'title'    => esc_html__('Color on General Paragraph', 'avo'), 
			'subtitle' => esc_html__('Pick your color for general paragraph text. Default color is black #666', 'avo'),
			'default'  => '#666',
			'validate' => 'color', 
		), 
		array(
			'id'       => 'avo_stick_menu',
			'type'     => 'color',
			'title'    => esc_html__('Sticky Menu Background color (for menu with black background & All Sticky Custom Menu)', 'avo'), 
			'subtitle' => esc_html__('Pick your background color for sticky menu in white text header. Default color is #fff', 'avo'),
			'default'  => 'rgba(255,255,255,.9)',
			'validate' => 'color',
		), 
		array(
			'id'       => 'avo_stick_menu2',
			'type'     => 'color',
			'title'    => esc_html__('Sticky Menu Background color (for menu with white background)', 'avo'), 
			'subtitle' => esc_html__('Pick your background color for sticky menu in white text header. Default color is #ffffff', 'avo'),
			'default'  => '#ffffff',
			'validate' => 'color',
		), 
		 array(
			'id'       => 'avo_menu_border',
			'type'     => 'color',
			'title'    => esc_html__('Sticky Menu BBorder color (for menu with transparent background)', 'avo'), 
			'subtitle' => esc_html__('Pick your border color for sticky menu in transparent text header. Default color is #ffffff', 'avo'),
			'default'  => '#ffffff',
			'validate' => 'color',
		),
		array(
			'id'       => 'avo_footer_color',
			'type'     => 'color',
			'title'    => esc_html__('Standard Footer Background color', 'avo'), 
			'subtitle' => esc_html__('Pick your background color for standard footer. Default color is black #202020', 'avo'),
			'default'  => '#13161D',
			'validate' => 'color',
		),
		array(
			'id'       => 'avo_footer_color',
			'type'     => 'color',
			'title'    => esc_html__('Standard Footer Background color', 'avo'), 
			'subtitle' => esc_html__('Pick your background color for standard footer. Default color is black #202020', 'avo'),
			'default'  => '#13161D',
			'validate' => 'color',
		),
	),
);

$this->sections[] = array(
	'id' => 'preloader',
	'icon' => 'el el-repeat',
	"subsection" => true,
	'title' => esc_html__('Preloader', 'avo'),
	'desc' => esc_html__('Configuration the style settings', 'avo'),
	'fields' => array(
		array(
			'id'       => 'avo_preloader_set',
			'type'     => 'button_set',
			'title'    => esc_html__('Preloader Setting', 'avo'),
			'options' => array(
					'show_all' => esc_html__('Show in All pages', 'avo'),
					'show_home' => esc_html__('Show in Home page only', 'avo'),
					'not_show' => esc_html__('Hide in all pages', 'avo'),
				),
		),
		array(
			'id'       => 'avo_preloader_type',
			'type'     => 'button_set',
			'title'    => esc_html__('Preloader Type', 'avo'),
			'options' => array(
					'circle' => esc_html__('Circle', 'avo'),
					'progress' => esc_html__('Progress', 'avo'),
				),
			'default'  => 'progress',
		),

		array(
			'id'       => 'avo_loader_color',
			'type'     => 'color',
			'title'    => esc_html__('Color Scheme', 'avo'), 
			'subtitle' => esc_html__('Pick your color scheme (default: #75dab4).', 'avo'),
			'default'  => '#75dab4',
			'validate' => 'color',
		),       
	),
); 

$this->sections[] = array(
	'id' => 'cursor',
	'icon' => 'el el-thumbs-up', 
	"subsection" => true,
	'title' => esc_html__('Cursor', 'avo'),
	'desc' => esc_html__('Select your cursor type', 'avo'),
	'fields' => array(
		array(
			'id'       => 'avo_cursor_set',
			'type'     => 'button_set',
			'customizer' => true,
			'title'    => esc_html__('Theme Cursor Type', 'avo'),
			'options' => array(
					'none' => esc_html__('None', 'avo'),
					'1' => esc_html__('Style 1', 'avo'),
				),
			'default' => '1',
		),      
	),
);

$this->sections[] = array( 
	'id' => 'page_404',
	"subsection" => true,
	'title' => esc_html__('404 Page', 'avo'),
	'icon' => 'el el-error',
	'fields' => array(
		array(
			'id'       => 'avo_enable_custom_404',
			'type'     => 'switch',
			'customizer' => true,
			'title'    => esc_html__('Enable custom 404 page', 'avo'),
			'default' => false,
		),  
		array(
			'id'       => 'avo_custom_404_page',
			'type'     => 'select',
			'customizer' => true,
			'title'    => esc_html__('Custom 404 page', 'avo'),
			'data'  => 'pages',

			'required' => array('avo_enable_custom_404','=',true),
		),
	),
);

$this->sections[] = array(
	'icon' => 'el el-photo',
	"subsection" => false,
	'title' => esc_html__('Header', 'avo'),
	'desc' => esc_html__('Assign menu for header section.', 'avo'),
	'fields' => [
		[
			'id'       => 'avo_header_set', 
			'type'     => 'select',
			'title'    => esc_html__('Header type', 'avo'),
			'options' => array(
				'default' => esc_html__('Standard Header', 'avo'),
				'custom' => esc_html__('Custom Header', 'avo'),
				'no_header' => esc_html__( 'No Header', 'avo' )
			),
			'default'     => 'default',
		],

		[
			'id'    => 'avo_header_set_list',
			'type'  => 'select',
			'desc' => esc_html__('(Only if custom header selected as header type))', 'avo'),
			'title'    => esc_html__('Custom Header format', 'avo'),
			'data'  => 'posts',
			'args'  => array(
				'post_type' => 'header',
				'orderby'   => 'title',
				'order'     => 'ASC',
			),
			'required' => ['avo_header_set', '=', 'custom'],
		],  

		[
			'id'       => 'avo_header_position',
			'type'     => 'select',
			'title'    => esc_html__('Header Position', 'avo'), 
			'options' => array(
				'head_white' => esc_html__( 'Relative Position with Background, ', 'avo' ),
				'head_trans' => esc_html__( 'Absolute Position, Transperant','avo'),
			), 
			'default'  => 'head_white',
			
		],

		[
			'id'       => 'avo_menu_position',
			'type'     => 'select',
			'title'    => esc_html__('Menu Position', 'avo'), 
			'options' => array(
				'right' => esc_html__('Right', 'avo'),
				'center' => esc_html__('Center', 'avo'),
			), 
			'default'  => 'right',
		],

	]
);

$this->sections[] = array(
	'id' => 'header_logo',
	'icon' => 'el el-universal-access',
	"subsection" => true,
	'title' => esc_html__('Header logo', 'avo'),
	'desc' => esc_html__('Configuration the style settings', 'avo'),
	'fields' => array(
		array(
			'id'       => 'avo_header_logo_white',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__('Logo White Text', 'avo'), 
			'subtitle' => esc_html__('Upload your logo for white text (standard) header (Recommended size 240x80px)', 'avo'),
			'default'  => array('url'=>get_template_directory_uri().'/images/logo-white.png'),
		), 
		array(
			'id'       => 'avo_header_logo_dark',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__('Logo Dark Text', 'avo'), 
			'subtitle' => esc_html__('Upload your logo for dark text (standard) header (Recommended size 240x80px)', 'avo'),
			'default'  => array('url'=>get_template_directory_uri().'/images/logo-dark.png'),
		),
		array(
			'id'       => 'avo_logo_dim',
			'type'     => 'dimensions',
			'height' => true,
             'width' => false,
			'units'    => array('em','px','%'),
			'title'    => esc_html__('Logo dimensions Height', 'avo'), 
			'subtitle' => esc_html__('Enable or disable any piece of this field. Width, Height, or Units.)', 'avo'),
			'default' => ['height' => 25], 
		), 
     
	)
);

$this->sections[] = array(
	'id' => 'avo_header_social',
	'icon' => 'el el-group',
	"subsection" => true,
	'title' => esc_html__('Header social', 'avo'),
	'desc' => esc_html__('Configuration the header social icons', 'avo'),
	'fields' => array( 
		array(
			'id'       => 'avo_header_enable_topmenu',
			'type'     => 'select',
			'title'    => esc_html__('Enable Top Menu', 'avo'),
			'options' => array(
				'on' => esc_html__('On', 'avo'),
				'off' => esc_html__('Off', 'avo'),
			), 
			'default'  => 'off',
		), 
		array(
			'id'       => 'avo_header_phone',
			'type'     => 'text',
			'title'    => esc_html__('Phone', 'avo'), 
			'subtitle' => esc_html__('Input phone number', 'avo'),
			'required'  => array('avo_header_enable_topmenu', 'equals','on'),
		),
		array(
			'id'       => 'avo_header_mail',
			'type'     => 'text',
			'title'    => esc_html__('Mail', 'avo'), 
			'subtitle' => esc_html__('Input mail address', 'avo'),
			'required'  => array('avo_header_enable_topmenu', 'equals','on'),
		),
		array(
			'id'       => 'avo_header_address',
			'type'     => 'text',
			'title'    => esc_html__('Address', 'avo'), 
			'subtitle' => esc_html__('Input address', 'avo'),
			'required'  => array('avo_header_enable_topmenu', 'equals','on'),
		),
		array(
			'id'       => 'avo_header_join',
			'type'     => 'text',
			'title'    => esc_html__('Join', 'avo'), 
			'subtitle' => esc_html__('Input Join text', 'avo'),
			'required'  => array('avo_header_enable_topmenu', 'equals','on'),
		),
		array(
			'id'       => 'avo_header_joinlink',
			'type'     => 'text',
			'title'    => esc_html__('Join', 'avo'), 
			'subtitle' => esc_html__('Input Join link', 'avo'),
			'required'  => array('avo_header_enable_topmenu', 'equals','on'),
		),
		array(
			'id'       => 'avo_header_enable_social',
			'type'     => 'select',
			'title'    => esc_html__('Enable Header Social', 'avo'),
			'options' => array(
				'on' => esc_html__('On', 'avo'),
				'off' => esc_html__('Off', 'avo'),
			), 
			'default'  => 'off',
		), 
		array(
			'id'       => 'avo_header_facebook',
			'type'     => 'text',
			'title'    => esc_html__('Facebook Link', 'avo'), 
			'subtitle' => esc_html__('Input facebook link here', 'avo'),
			'required'  => array('avo_header_enable_social', 'equals','on'),
		), 
		array(
			'id'       => 'avo_header_googleplus',
			'type'     => 'text',
			'title'    => esc_html__('Google Plus Link', 'avo'), 
			'subtitle' => esc_html__('Input google plus link here', 'avo'),
			'required'  => array('avo_header_enable_social', 'equals','on'),
		), 
		array(
			'id'       => 'avo_header_twitter',
			'type'     => 'text',
			'title'    => esc_html__('Twitter Link', 'avo'), 
			'subtitle' => esc_html__('Input Twitter link here', 'avo'),
			'required'  => array('avo_header_enable_social', 'equals','on'),
		), 
		array(
			'id'       => 'avo_header_instagram',
			'type'     => 'text',
			'title'    => esc_html__('Instagram Link', 'avo'), 
			'subtitle' => esc_html__('Input Instagram link here', 'avo'),
			'required'  => array('avo_header_enable_social', 'equals','on'),
		),  
		array(
			'id'       => 'avo_header_pinterest',
			'type'     => 'text',
			'title'    => esc_html__('Pinterest Link', 'avo'), 
			'subtitle' => esc_html__('Input Pinterest link here', 'avo'),
			'required'  => array('avo_header_enable_social', 'equals','on'),
		), 
		array(
			'id'       => 'avo_header_xing',
			'type'     => 'text',
			'title'    => esc_html__('Xing Link', 'avo'), 
			'subtitle' => esc_html__('Input Xing link here', 'avo'),
			'required'  => array('avo_header_enable_social', 'equals','on'),
		),  
		array(
			'id'       => 'avo_header_linkedin',
			'type'     => 'text',
			'title'    => esc_html__('LinkedIn Link', 'avo'), 
			'subtitle' => esc_html__('Input LinkedIn link here', 'avo'),
			'required'  => array('avo_header_enable_social', 'equals','on'),
		),   
		array(
			'id'       => 'avo_header_search',
			'type'     => 'select',
			'title'    => esc_html__('Search Icon', 'avo'), 
			'subtitle' => esc_html__('To show search icon in header', 'avo'),
			'options' => array(
				'on' => esc_html__('On', 'avo'),
				'off' => esc_html__('Off', 'avo'),
			), 
			'default'  => 'off',
		), 
		array(
			'id'       => 'avo_header_cart',
			'type'     => 'select',
			'title'    => esc_html__('Cart Icon', 'avo'), 
			'subtitle' => esc_html__('To show Cart icon in header', 'avo'),
			'options' => array(
				'on' => esc_html__('On', 'avo'),
				'off' => esc_html__('Off', 'avo'),
			), 
			'default'  => 'off',
		), 
		array(
			'id'       => 'avo_header_btn',
			'type'     => 'select',
			'title'    => esc_html__('Button', 'avo'), 
			'subtitle' => esc_html__('To show Button in header', 'avo'),
			'options' => array(
				'on' => esc_html__('On', 'avo'),
				'off' => esc_html__('Off', 'avo'),
			), 
			'default'  => 'off',
		), 
		array(
			'id'       => 'avo_menu_btn',
			'type'     => 'text',
			'title'    => esc_html__('Button Text', 'avo'), 
			'required'  => array('avo_header_btn', 'equals','on'),
		),
		array(
			'id'       => 'avo_menu_btn_url',
			'type'     => 'text',
			'title'    => esc_html__('Button URL', 'avo'),
			'required'  => array('avo_header_btn', 'equals','on'), 
		),
	)
);


// -> START Blog Options
$this->sections[] = array(
        'title' => esc_html__('Blog', 'avo'),
        'id' => 'blog-option',
        'icon' => 'el-icon-th',
);

$this->sections[] = array(
        'title' => esc_html__('Single', 'avo'),
        'id' => 'blog-single-option',
        'subsection' => true,
        'fields' => [
            [
                'id' => 'avo_single_type_layout',
                'type' => 'button_set',
                'title' => esc_html__('Default Post Layout', 'avo'),
                'desc' => esc_html__('Note: each Post can be additionally customized within its Meta boxes section.', 'avo'),
                'options' => [
                    '1' => esc_html__('Title First', 'avo'),
                    '2' => esc_html__('Image First', 'avo'),
                    '3' => esc_html__('Overlay Image', 'avo')
                ],
                'default' => '2'
            ],
            [
                'id' => 'blog_single_sidebar-start',
                'type' => 'section',
                'title' => esc_html__('Sidebar', 'avo'),
                'indent' => true,
            ],
            [
                'id' => 'avo_sidebar_format',
                'type' => 'image_select',
                'title' => esc_html__('Blog Single Sidebar Layout', 'avo'),
                'options' => [
                    'no_sidebar' => [
                        'alt' => 'None',
                        'img' => get_template_directory_uri() . '/images/1co.png'
                    ],
                    'left_sidebar' => [
                        'alt' => 'Left',
                        'img' => get_template_directory_uri() . '/images/2cl.png'
                    ],
                    'right_sidebar' => [
                        'alt' => 'Right',
                        'img' => get_template_directory_uri() . '/images/2cr.png'
                    ]
                ],
                'default' => 'right_sidebar'
            ],
			[
				'id'       => 'avo_related_image',
				'type'     => 'select',
				'title'    => esc_html__('Featured Image in Related Posts', 'avo'),
				'options' => array(
						'show' => esc_html__('Show', 'avo'),
						'hide' => esc_html__('Hide', 'avo'),
				),
				'default'  => 'show',
			],

            [
                'id' => 'single_sidebar_def_width', 
                'type' => 'button_set',
                'title' => esc_html__('Blog Single Sidebar Width', 'avo'),
                'options' => [
                    '9' => '25%',
                    '8' => '33%',
                ],
                'default' => '8',
                'required' => ['avo_sidebar_format', '!=', 'no_sidebar'],
            ],
            [
                'id' => 'single_sidebar_sticky', 
                'type' => 'switch',
                'title' => esc_html__('Blog Single Sticky Sidebar On?', 'avo'),
                'default' => true,
                'required' => ['avo_sidebar_format', '!=', 'no_sidebar'],
            ],
            [
                'id' => 'single_sidebar_gap', 
                'type' => 'select',
                'title' => esc_html__('Sidebar Side Gap', 'avo'),
                'options' => [
                    'def' => esc_html__('Default', 'avo'),
                    '0' => '0',
                    '10' => '10',
                    '15' => '15',
                    '20' => '20',
                    '25' => '25',
                    '30' => '30',
                    '35' => '35',
                    '40' => '40',
                    '45' => '45',
                    '50' => '50',
                ],
                'default' => 'def',
                'required' => ['avo_sidebar_format', '!=', 'no_sidebar'],
            ],
            [
                'id' => 'blog_single_sidebar-end',
                'type' => 'section',
                'indent' => false,
            ],
        ]
);

$this->sections[] = array(
	'icon' => 'el-icon-lines',
	"subsection" => false,
	'title' => esc_html__('Side Panel', 'avo'),
	'desc' => esc_html__('Assign menu for side panel section.', 'avo'),
	'fields' => array(
		array(
			'id'       => 'avo_sidepanel_set',
			'type'     => 'select',
			'title'    => esc_html__('Side Panel', 'avo'),
			'options' => array(
				'default' => esc_html__('Standard Side panel', 'avo'),
				'custom' => esc_html__('Custom Side panel', 'avo'),
			),
		),
		array(
			'id'    => 'avo_sidepanel_set_list',
			'type'  => 'select',
			'title'    => esc_html__('Side panel', 'avo'),
			'data'  => 'posts',
			'args'  => array(
				'post_type' => 'sidepanel',
				'orderby'   => 'title',
				'order'     => 'ASC',
			)
		),     
	),
);
$this->sections[] = array(
	'icon' => 'el-icon-lines',
	"subsection" => false,
	'title' => esc_html__('Footer', 'avo'),
	'desc' => esc_html__('Assign menu for footer section.', 'avo'),
	'fields' => array(
		array(
			'id'       => 'avo_footer_set',
			'type'     => 'select',
			'title'    => esc_html__('Footer Text Color', 'avo'),
			'options' => array(
				'default' => esc_html__('Standard Footer', 'avo'),
				'custom' => esc_html__('Custom Footer', 'avo'),
			),
		),
		array(
			'id'    => 'avo_footer_set_list',
			'type'  => 'select',
			'title'    => esc_html__('Footer Text Color', 'avo'),
			'data'  => 'posts',
			'args'  => array(
				'post_type' => 'footer',
				'orderby'   => 'title',
				'order'     => 'ASC',
			)
		),     
	),
);

$this->sections[] = array(
	'id' => 'logo',
	"subsection" => true,
	'title' => esc_html__('Footer logo', 'avo'),
	'desc' => esc_html__('Configuration the style settings', 'avo'),
	'fields' => array(
		array(
			'id'       => 'avo_footer_logo_white',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__('Logo White Text', 'avo'), 
			'subtitle' => esc_html__('Upload your logo for white text (standard) footer (Recommended size 240x80px)', 'avo'),
			'default'  => array('url'=>get_template_directory_uri().'/images/logo-dark.png'),
		),

		array(
			'id'       => 'avo_footer_logo_dark',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__('Logo Dark Text', 'avo'), 
			'subtitle' => esc_html__('Upload your logo for dark text (standard) footer (Recommended size 240x80px)', 'avo'),
			'default'  => array('url'=>get_template_directory_uri().'/images/logo-white.png'),
		), 
		array(
			'id'       => 'avo_footer_text',
			'type'     => 'editor',
			'title'    => esc_html__('Footer Text', 'avo'), 
			'subtitle' => esc_html__('Upload your logo for dark text (standard) footer (Recommended size 240x80px)', 'avo'),
			'default' => '',
			'args'   => array('teeny'  => true,'textarea_rows'=> 10)
		), 
	)
);

$this->sections[] = array(
	'id' => 'avo_footer_social',
	'icon' => 'el el-group-alt',
	"subsection" => true,
	'title' => esc_html__('Footer social', 'avo'),
	'desc' => esc_html__('Configuration the footer social icons', 'avo'),
	'fields' => array(
		array(
			'id'       => 'avo_footer_enable_social',
			'type'     => 'switch',
			'title'    => esc_html__('Enable Footer Social', 'avo'), 
			'default'  => true,
		), 
		array(
			'id'       => 'avo_footer_facebook',
			'type'     => 'text',
			'title'    => esc_html__('Facebook Link', 'avo'), 
			'subtitle' => esc_html__('Input facebook link here', 'avo'),
			'required'  => array('avo_footer_enable_social', 'equals',true),
		), 
		array(
			'id'       => 'avo_footer_googleplus',
			'type'     => 'text',
			'title'    => esc_html__('Google Plus Link', 'avo'), 
			'subtitle' => esc_html__('Input google plus link here', 'avo'),
			'required'  => array('avo_footer_enable_social', 'equals',true),
		), 
		array(
			'id'       => 'avo_footer_twitter',
			'type'     => 'text',
			'title'    => esc_html__('Twitter Link', 'avo'), 
			'subtitle' => esc_html__('Input Twitter link here', 'avo'),
			'required'  => array('avo_footer_enable_social', 'equals',true),
		), 
		array(
			'id'       => 'avo_footer_instagram',
			'type'     => 'text',
			'title'    => esc_html__('Instagram Link', 'avo'), 
			'subtitle' => esc_html__('Input Instagram link here', 'avo'),
			'required'  => array('avo_footer_enable_social', 'equals',true),
		),  
		array(
			'id'       => 'avo_footer_pinterest',
			'type'     => 'text',
			'title'    => esc_html__('Pinterest Link', 'avo'), 
			'subtitle' => esc_html__('Input Pinterest link here', 'avo'),
			'required'  => array('avo_footer_enable_social', 'equals',true),
		), 
		array(
			'id'       => 'avo_footer_xing',
			'type'     => 'text',
			'title'    => esc_html__('Xing Link', 'avo'), 
			'subtitle' => esc_html__('Input Xing link here', 'avo'),
			'required'  => array('avo_footer_enable_social', 'equals',true),
		),  
		array(
			'id'       => 'avo_footer_linkedin',
			'type'     => 'text',
			'title'    => esc_html__('LinkedIn Link', 'avo'), 
			'subtitle' => esc_html__('Input LinkedIn link here', 'avo'),
			'required'  => array('avo_footer_enable_social', 'equals',true),
		),  
	)
);

$this->sections[] = array(
	'id' => 'portfolio',
	'icon'=>'el el-briefcase',
	"subsection" => false,
	'title' => esc_html__('Portfolio setting', 'avo'),
	'desc' => esc_html__('Configuration portfolio settings', 'avo'),
	'fields' => array(
		array(
			'id'       => 'avo_portfolio_all',
			'type'     => 'text',
			'title'    => esc_html__('All categories filter', 'avo'), 
			'subtitle' => esc_html__('Portfolio Text Filter for all categories', 'avo'),
			'desc' => esc_html__('Insert your text for portfolio filter for all categories. The default text is "All"', 'avo'),
			'default'  => 'All',
		),  
		array(
			'id'       => 'avo_other_port_sub',
			'type'     => 'text',
			'title'    => esc_html__('Other Portfolio Section Subtitle', 'avo'), 
			'desc' => esc_html__('Insert your text for subt title of other portfolio section on single portfolio page.<br/>Leave it blank if you want to use the default text.', 'avo'),
			'default'  => 'See our other portfolio',
		),
		array(
			'id'       => 'avo_other_port_title',
			'type'     => 'text',
			'title'    => esc_html__('Other Portfolio Section Title', 'avo'), 
			'desc' => esc_html__('Insert your text for title of other portfolio section on single portfolio page.<br/>Leave it blank if you want to use the default text.', 'avo'),
			'default'  => 'Other portfolio',
		),
	),
);


?>