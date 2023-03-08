<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "umaya";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'umaya/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
		'class'                => 'admin-color-pimax',
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Umaya Options', 'umaya' ),
        'page_title'           => esc_html__( 'Umaya Options', 'umaya' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => 'AIzaSyCN8bSGZHdbSOXu0HbhXf8j0SnswTmbCNw',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => true,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the umaya. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'umaya'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'umaya'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( '', 'umaya' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '', 'umaya' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( '', 'umaya' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Support', 'umaya' ),
            'content' => esc_html__( 'Send us a mail by using our item support form.', 'umaya' )
        ),
        
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'Send us a mail by using our item support form.', 'umaya' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // ACTUAL DECLARATION OF SECTIONS
                Redux::setSection( $opt_name, array(
                    'title'  => esc_html__( 'General Settings', 'umaya' ),
                    'desc'   => esc_html__( '', 'umaya' ),
                    'icon'   => 'el-icon-home-alt',
                    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                    'fields' => array(
					
					array(
			                'id' => 'notice_header_logo',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Logo Options', 'umaya'),
			                'desc' => esc_html__('Logo options of your site header.', 'umaya')
			            ),
					
					array(
							'id' => 'textlogo',
							'type' => 'button_set',
							'title' => esc_html__('Select Logo Format', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Text Logo', 'umaya'),
									'st2' => esc_html__('Image Logo', 'umaya'),
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'textlogo_st',
							'type' => 'button_set',
							'title' => esc_html__('Select Logo Style', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Horizontal', 'umaya'),
									'st2' => esc_html__('Vertical', 'umaya'),
							),
							'default'  => 'st1',
							'required' => array('textlogo', '=' , 'st2')
					),
					array(
			                'id' => 'notice_site_logo_h',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Horizontal Logo Options.', 'umaya'),
			                'desc' => esc_html__('', 'umaya'),
							'required' => array('textlogo', '=' , 'st2')
							
					),
					array(
							'id' => 'logopic',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Upload Horizontal Dark Logo', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'required' => array('textlogo', '=' , 'st2')
					),
					
					array(
							'id' => 'logopiclight',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Upload Horizontal Light Logo', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'required' => array('textlogo', '=' , 'st2')
					),
					array(
			                'id' => 'notice_site_logo_v',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Vertical Logo Options.', 'umaya'),
			                'desc' => esc_html__('', 'umaya'),
							'required' => array('textlogo', '=' , 'st2')
							
					),
					array(
							'id' => 'logopicv',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Upload Vertical Dark Logo', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'required' => array('textlogo', '=' , 'st2')
					),
					
					array(
							'id' => 'logopiclightv',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Upload Vertical Light Logo', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'required' => array('textlogo', '=' , 'st2')
					),
					
					$fields = array(
					'id'       => 'opt_logo_dimensions',
					'type'     => 'dimensions',
					'units'    => array('em','px','%'),
					'output' => array('.logo-img-box img'),
					'title'    => __('Logo Size', 'umaya'),
					'subtitle' => __('.', 'umaya'),
					'desc'     => __('Optional', 'umaya'),
					'default'  => array(
						'Width'   => '100', 
						'Height'  => '26'
					),
					'required' => array('textlogo', '=' , 'st2')
				),
				
				array(
							'id' => 'logotext',
							'type' => 'text',
							'title' => esc_html__('Logo Text ', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'required' => array('textlogo', '=' , 'st1')
					
					),
				
				array(
			                'id' => 'notice_site_preloader',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Preloader Options.', 'umaya'),
			                'desc' => esc_html__('Enable/ Disable site preloader.', 'umaya'),
							
					),
				
				array(
							'id' => 'umaya_preloader',
							'type' => 'button_set',
							'title' => esc_html__('Preloader', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'umaya'),
									'st2' => esc_html__('Enable', 'umaya'),
									
							),
							'default'  => 'st1'
					),
					
				array(
							'id' => 'pagelogopic',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Upload  Preloader Image', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'required' => array('umaya_preloader', '=' , 'st2')
							
					),
				array(
			                'id' => 'notice_site_cursor',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Custom Cursor Option', 'umaya'),
			                'desc' => esc_html__('Enable/ Disable custom cursor.', 'umaya'),
							
					),
						
				array(
							'id' => 'enablecursor',
							'type' => 'button_set',
							'title' => esc_attr__('Custom Cursor', 'umaya'),
							'subtitle' => esc_attr__('', 'umaya'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'umaya'),
									'st2' => esc_html__('Enable', 'umaya'),
									
							),
							'default'  => 'st1'
				),
				
				
				array(
			                'id' => 'notice_header_contact_info',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Menu & Footer Contacts', 'umaya'),
			                'desc' => esc_html__('Menu & Footer contact section of your site.', 'umaya'),
							
			    ),
				
				
				
				array(
			                'id' => 'notice_header_contact_info_email',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Email Address', 'umaya'),
			                'desc' => esc_html__('', 'umaya'),
							
					),
					
					array(
							'id' => 'header_con_title2',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Title', 'umaya'),
							'subtitle' => esc_html__('Translation Options. E.X:  Email ', 'umaya'),
					),
					
					array(
							'id' => 'hd_email_address1',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Email Address 1', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
					),
					
					array(
							'id' => 'hd_email_address2',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Email Address 2', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
					),
					
					array(
			                'id' => 'notice_header_contact_info_address',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Address Info', 'umaya'),
			                'desc' => esc_html__('', 'umaya'),
							
					),
					
					array(
							'id' => 'header_address_title1',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Title', 'umaya'),
							'subtitle' => esc_html__('Translation Options. E.X:  Address ', 'umaya'),
					),
					
					array(
							'id' => 'hd_address1',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Address Line 1', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							
					),
					
					array(
							'id' => 'hd_address2',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Address Line 2', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							
					),
					
					
					array(
			                'id' => 'notice_header_contact_info_mob',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Phone Number', 'umaya'),
			                'desc' => esc_html__('', 'umaya'),
							
					),
					
					array(
							'id' => 'header_con_title1',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Title', 'umaya'),
							'subtitle' => esc_html__('Translation Options. E.X:  Phone ', 'umaya'),
					),
					
					array(
							'id' => 'hd_phn_number1',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Phone Number 1', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							
					),
					
					array(
							'id' => 'hd_phn_number2',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Phone Number 2', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							
					),
					
					
					array(
			                'id' => 'notice_header_contact',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Header Button Options', 'umaya'),
			                'desc' => esc_html__('Header Button options of your site header.', 'umaya')
			            ),
					
					array(
							'id' => 'headercontact_opt',
							'type' => 'button_set',
							'title' => esc_html__('Button Section', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'umaya'),
									'st2' => esc_html__('Enable', 'umaya'),
									
									
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'contact_bt_title',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Button Title', 'umaya'),
							'subtitle' => esc_html__('E.X: Get in touch', 'umaya'),
							'required' => array('headercontact_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'headercontact_url_type',
							'type' => 'button_set',
							'title' => esc_html__('Link Target', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Self', 'umaya'),
									'st2' => esc_html__('Blank', 'umaya'),
									
									
							),
							'default'  => 'st1',
							'required' => array('headercontact_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'con_p_url',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('URL', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'required' => array('headercontact_opt', '=' , 'st2')
					),
					
					
					
				  )
               ) );
			   
			  
			   
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-bullhorn',
                    'title'  => esc_html__( '404 Page Options', 'umaya' ),
                    'fields' => array(
					
					
					array(
			                'id' => 'notice_404page_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('404 Page Translate Options', 'umaya'),
			                'desc' => esc_html__('404 Page Text Translate Options', 'umaya'),
							
			            ),
						
					array(
							'id' => '404_page_title_1',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 1', 'umaya'),
							'subtitle' => esc_html__('Translate Options. E.X:  404 ', 'umaya'),
							
					),
					
					array(
							'id' => '404_page_title_2',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 2', 'umaya'),
							'subtitle' => esc_html__('Translate Options. E.X:  Page not found. ', 'umaya'),
							
					),
					
					array(
							'id' => '404_page_title_3',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 3', 'umaya'),
							'subtitle' => esc_html__('Translate Options. E.X:  Back To Home', 'umaya'),
							
					),
					
					
					
                    )
                ) );
				
			
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-bullhorn',
                    'title'  => esc_html__( 'Blog Options', 'umaya' ),
                    'fields' => array(
					array(
			                'id' => 'notice_index_main_page_opt',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Blog Style', 'umaya'),
			                'desc' => esc_html__('Select blog page style of your site. Page Template also available.', 'umaya')
			        ),
					array(
							'id' => 'blogtyle',
							'type' => 'button_set',
							'title' => esc_html__('Select Blog Layout', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Right Sidebar', 'umaya'),
									'st2' => esc_html__('Left Sidebar', 'umaya'),
									'st3' => esc_html__('Full Width', 'umaya'),
									
									
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'notice_index_details_main_page_opt',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Blog Details Page Style', 'umaya'),
			                'desc' => esc_html__('Select blog details page style of your site. You can select details style from post also.', 'umaya')
			        ),
					
					array(
							'id' => 'blogdetailstyle',
							'type' => 'button_set',
							'title' => esc_html__('Select Blog Details Layout', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Right Sidebar', 'umaya'),
									'st2' => esc_html__('Left Sidebar', 'umaya'),
									'st3' => esc_html__('Full Width', 'umaya'),
									
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'blog_sidebar_back_opt',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Upload Index Header Image', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							
					),
					
					array(
			                'id' => 'notice_header_page_title_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Index Page Title Options', 'umaya'),
			                'desc' => esc_html__('Working only sidebar style.', 'umaya'),
							'required' => array('headersearch_opt', '=' , 'st2')
			        ),
					
					array(
							'id' => 'blogtitle',
							'type' => 'text',
							'title' => esc_html__('Index Title ', 'umaya'),
							'subtitle' => esc_html__('Write header title for index page here. Ex: My Blog', 'umaya'),
						
					),
					
					array(
							'id' => 'blog_sub_title',
							'type' => 'text',
							'title' => esc_html__('Index Sub Title. ', 'umaya'),
							'subtitle' => esc_html__('Write header sub title for index page here. Ex: Articles & News', 'umaya'),
						
					),
					
					array(
							'id' => 'arch-page-title',
							'type' => 'text',
							'title' => esc_html__('Archive Page Title', 'umaya'),
							'subtitle' => esc_html__('Write header title for blog archive page here. Ex: Archive', 'umaya'),
							'default' => '',
					),	
					array(
							'id' => 'cat-page-title',
							'type' => 'text',
							'title' => esc_html__('Category Page Title', 'umaya'),
							'subtitle' => esc_html__('Write header title for blog category page here. Ex: Category', 'umaya'),
							'default' => '',
					),	
	
					array(
							'id' => 'tag-page-title',
							'type' => 'text',
							'title' => esc_html__('Tag Page Title', 'umaya'),
							'subtitle' => esc_html__('Write header title for blog tag page here. Ex: Tag', 'umaya'),
							'default' => '',
					),	
					
					array(
							'id' => 'search-page-title',
							'type' => 'text',
							'title' => esc_html__('Search Page Title', 'umaya'),
							'subtitle' => esc_html__('Write header title for blog tag page here. Ex: Search results for', 'umaya'),
							'default' => '',
					),	
					
					array(
			                'id' => 'notice_share_index',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Post Details Share Option', 'umaya'),
			                'desc' => esc_html__('Enable/ Disable post details page share option.', 'umaya')
			        ),
					
					array(
							'id' => 'index_details_share',
							'type' => 'button_set',
							'title' => esc_html__('Share Option', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'umaya'),
									'st2' => esc_html__('Enable', 'umaya'),
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'notice_details_share_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Translate Options', 'umaya'),
			                'desc' => esc_html__('Share section text translate option.', 'umaya'),
							'required' => array('index_details_share', '=' , 'st2')
			        ),
					
					array(
							'id' => 'share_sec_title',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 1', 'umaya'),
							'subtitle' => esc_html__('E.X: Share this article', 'umaya'),
							'required' => array('index_details_share', '=' , 'st2')
					),
					
					array(
			                'id' => 'notice_related_index',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Post Details Related Post', 'umaya'),
			                'desc' => esc_html__('Enable/ Disable post details page related post option.', 'umaya')
			        ),
					
					array(
							'id' => 'index_details_related',
							'type' => 'button_set',
							'title' => esc_html__('Related Post Section', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'umaya'),
									'st2' => esc_html__('Enable', 'umaya'),
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'notice_details_related_translation',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Translate Options', 'umaya'),
			                'desc' => esc_html__('Related post section text translate option.', 'umaya'),
							'required' => array('index_details_related', '=' , 'st2')
			        ),
					
					array(
							'id' => 'related_sec_title',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 1', 'umaya'),
							'subtitle' => esc_html__('E.X: You might also like', 'umaya'),
							'required' => array('index_details_related', '=' , 'st2')
					),
					
					
					array(
			                'id' => 'notice_post_pagi_index',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Post Details Pagination.', 'umaya'),
			                'desc' => esc_html__('Enable/ Disable post details pagination.', 'umaya')
			        ),
					
					array(
							'id' => 'index_details_pagi_opt',
							'type' => 'button_set',
							'title' => esc_html__('Post Pagination', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'umaya'),
									'st2' => esc_html__('Enable', 'umaya'),
							),
							'default'  => 'st1'
					),
					
                    )
                ) );
				
				if (class_exists('WooCommerce')) {
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el el-shopping-cart-sign',
                    'title'  => esc_attr__( 'Shop Options', 'umaya' ),
                    'fields' => array(
					
					array(
							'id' => 'wr-shop-opt',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_attr__('Shop Page Header Options', 'umaya'),
							'desc' => esc_attr__(' ', 'umaya')
							
					  ),

					array(
							'id' => 'shopheaderimg',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_attr__('Upload Shop Page Header Image', 'umaya'),
							'subtitle' => esc_attr__('', 'umaya'),
							
					),
					array(
							'id' => 'shop_animated_title_opt',
							'type' => 'button_set',
							'title' => esc_html__('Animated Title', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'umaya'),
									'st2' => esc_html__('Enable', 'umaya'),
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'shop_animated_title_1',
							'type' => 'text',
							'title' => esc_html__('Animated Title 1 ', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'required' => array('shop_animated_title_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'shop_animated_title_2',
							'type' => 'text',
							'title' => esc_html__('Animated Title 2 ', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'required' => array('shop_animated_title_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'shop_animated_title_3',
							'type' => 'text',
							'title' => esc_html__('Animated Title 3 ', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'required' => array('shop_animated_title_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'shopsubtitle',
							'type' => 'text',
							'title' => esc_attr__('Sub Title ', 'umaya'),
							'subtitle' => esc_attr__('Shop page sub title', 'umaya'),
							
					),
					
					
					array(
			                'id' => 'notice_share_shop',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Product Details Share Option', 'umaya'),
			                'desc' => esc_html__('Enable/ Disable product details page share option.', 'umaya')
			        ),
					
					array(
							'id' => 'shop_details_share',
							'type' => 'button_set',
							'title' => esc_html__('Share Option', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'umaya'),
									'st2' => esc_html__('Enable', 'umaya'),
							),
							'default'  => 'st1'
					),
					
					array(
			                'id' => 'notice_details_share_translation_shop',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Translate Option', 'umaya'),
			                'desc' => esc_html__('Share section text translate option.', 'umaya'),
							'required' => array('shop_details_share', '=' , 'st2')
			        ),
					
					array(
							'id' => 'share_sec_title_shop',
							'type' => 'text',
							'compiler' => 'true',
							'title' => esc_html__('Text 1', 'umaya'),
							'subtitle' => esc_html__('E.X: Share', 'umaya'),
							'required' => array('index_details_share', '=' , 'st2')
					),
					
					
                    )
                ) );
				}
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-cog',
                    'title'  => __( 'Translate Options', 'umaya' ),
                    'fields' => array(
					
					array(
							'id' => 'wr-blog-opt2',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_html__('Translate Text', 'umaya'),
							'desc' => esc_html__(' ', 'umaya')
							
					  ),

					array(
							'id' => 'translet_opt_1',
							'type' => 'text',
							'title' => esc_html__('By', 'umaya'),
							'subtitle' => esc_html__('Post Meta', 'umaya'),
					),
					
					array(
							'id' => 'translet_opt_2',
							'type' => 'text',
							'title' => esc_html__('In', 'umaya'),
							'subtitle' => esc_html__('Post Meta', 'umaya'),
					),
					
					array(
							'id' => 'translet_opt_3',
							'type' => 'text',
							'title' => esc_html__('Type & Hit Enter...', 'umaya'),
							'subtitle' => esc_html__('Search Widget', 'umaya'),
					),
					
					
					
					
                    )
                ) );
				
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-leaf',
                    'title'  => esc_html__( 'Social Options', 'umaya' ),
                    'fields' => array(
					
					
					array(
							'id' => 'facebook',
							'type' => 'text',
							'title' => esc_html__('Facebook URL ', 'umaya'),
							'subtitle' => esc_html__('Write Social URL', 'umaya'),
							
					),
					
					array(
							'id' => 'twitter',
							'type' => 'text',
							'title' => esc_html__('Twitter URL ', 'umaya'),
							'subtitle' => esc_html__('Write Social URL', 'umaya'),
							
					),
					
					array(
							'id' => 'pinterest',
							'type' => 'text',
							'title' => esc_html__('Pinterest URL ', 'umaya'),
							'subtitle' => esc_html__('Write Social URL', 'umaya'),
							
					),
					
					
					
					array(
							'id' => 'behance',
							'type' => 'text',
							'title' => esc_html__('Behance URL ', 'umaya'),
							'subtitle' => esc_html__('Write Social URL', 'umaya'),
							
					),
					
					array(
							'id' => 'dribbble',
							'type' => 'text',
							'title' => esc_html__('Dribbble URL ', 'umaya'),
							'subtitle' => esc_html__('Write Social URL', 'umaya'),
							
					),
					
					array(
							'id' => 'gplus',
							'type' => 'text',
							'title' => esc_html__('Google URL ', 'umaya'),
							'subtitle' => esc_html__('Write Social URL', 'umaya'),
							
					),
					
					array(
							'id' => 'linkedin',
							'type' => 'text',
							'title' => esc_html__('Linkedin URL ', 'umaya'),
							'subtitle' => esc_html__('Write Social URL', 'umaya'),
							
					),
					
					array(
							'id' => 'youtube',
							'type' => 'text',
							'title' => esc_html__('Youtube URL ', 'umaya'),
							'subtitle' => esc_html__('Write Social URL', 'umaya'),
							
						
					),
					
					array(
							'id' => 'vimeo',
							'type' => 'text',
							'title' => esc_html__('Vimeo URL ', 'umaya'),
							'subtitle' => esc_html__('Write Social URL', 'umaya'),
							
							
					),
					
					array(
							'id' => 'slack',
							'type' => 'text',
							'title' => esc_html__('Slack ', 'umaya'),
							'subtitle' => esc_html__('Write Social URL', 'umaya'),
							
							
					),
					
					array(
							'id' => 'instagram',
							'type' => 'text',
							'title' => esc_html__('Instagram URL ', 'umaya'),
							'subtitle' => esc_html__('Write Social URL', 'umaya'),
							
							
					),
					
					array(
							'id' => 'tumblr',
							'type' => 'text',
							'title' => esc_html__('Tumblr URL ', 'umaya'),
							'subtitle' => esc_html__('Write Social URL', 'umaya'),
							
							
					),
					
					
					
                    )
                ) );
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-brush',
                    'title'  => esc_html__( 'Styling', 'umaya' ),
                    'fields' => array(
					
					array(
                            'id'       => 'opt-theme-style',
                            'type'     => 'color',
                            'title'    => esc_html__( 'Theme Color Option', 'umaya' ),
                            'subtitle' => esc_html__( 'Only color validation can be done on this field type', 'umaya' ),
                            'desc'     => esc_html__( 'Change all global color.', 'umaya' ),
                            //'regular'   => false, // Disable Regular Color
                            //'hover'     => false, // Disable Hover Color
                            //'active'    => false, // Disable Active Color
                            //'visited'   => true,  // Enable Visited Color
                            
                        ),
						
					

                    )
                ) );
				
				
				
				
				 Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-th-large',
                    'title'  => esc_html__( 'Footer Options', 'umaya' ),
                    'fields' => array(
					
					array(
							'id' => 'backfooter',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Upload  Footer Background', 'umaya'),
							'subtitle' => esc_html__('Upload  Footer Background Image.', 'umaya'),
							
					),
					
					array(
							'id' => 'en_footer_content_opt',
							'type' => 'button_set',
							'title' => esc_html__('Footer Content', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'umaya'),
									'st2' => esc_html__('Enable', 'umaya'),
							),
							'default'  => 'st1'
					),
					
					array(
							'id' => 'en_footer_contact_opt',
							'type' => 'button_set',
							'title' => esc_html__('Footer Contact Secion', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'desc' => 'Enable/ Disable Footer Contact Section.',
							'options' => array(
									'st1'=> esc_html__('Disable', 'umaya'),
									'st2' => esc_html__('Enable', 'umaya'),
							),
							'default'  => 'st1',
							'required' => array('en_footer_content_opt', '=' , 'st2')
					),
					
					array(
			                'id' => 'notice_footer_logo',
			                'type' => 'info',
			                'notice' => true,
			                'style' => 'success',
			                'title' => esc_html__('Footer Logo Options', 'umaya'),
			                'desc' => esc_html__('Working only in mobile device.', 'umaya'),
							'required' => array('en_footer_content_opt', '=' , 'st2')
			        ),
					
					array(
							'id' => 'en_footer_logo_opt',
							'type' => 'button_set',
							'title' => esc_html__('Footer Logo', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'desc' => '',
							'options' => array(
									'st1'=> esc_html__('Disable', 'umaya'),
									'st2' => esc_html__('Enable', 'umaya'),
							),
							'default'  => 'st1',
							'required' => array('en_footer_content_opt', '=' , 'st2')
					),
					
					array(
							'id' => 'logopicfooter',
							'type' => 'media',
							'compiler' => 'true',
							'title' => esc_html__('Upload  Footer Logo', 'umaya'),
							'subtitle' => esc_html__('', 'umaya'),
							'required' => array('en_footer_logo_opt', '=' , 'st2')
					),
					
					$fields = array(
					'id'       => 'opt_footer_logo_dimensions',
					'type'     => 'dimensions',
					'units'    => array('em','px','%'),
					'output' => array('.footer-logo'),
					'title'    => __('Logo Size', 'umaya'),
					'subtitle' => __('.', 'umaya'),
					'desc'     => __('Optional', 'umaya'),
					'default'  => array(
						'Width'   => '113', 
						'Height'  => '65'
					),
					'required' => array('en_footer_logo_opt', '=' , 'st2')
				),
				
				array(
			                'id' => 'notice_footer_tag',
			                'type' => 'text',
			                'title' => esc_html__('Footer Tag Line', 'umaya'),
			                'desc' => esc_html__('E.X: The [span]Best Agency[/span] for[br]Your Businnes', 'umaya'),
							'required' => array('en_footer_content_opt', '=' , 'st2')
			        ),
				
				array(
							'id' => 'theme-cus-copy',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_html__('Website Copyright Text', 'umaya'),
							'desc' => esc_html__('Write a Copyright text of your WebSite.', 'umaya')
							
					  ),
					
					array(
							'id' => 'copyright',
							'type' => 'editor',
							'wpautop'=>true,
							'compiler' => 'true',
							'title' => esc_html__('Copyright text of the WebSite', 'umaya'),
							'subtitle' => esc_html__('Insert your custom Copyright text.', 'umaya'),
							'default'          => '&copy; Copyright 2021 UMAYA. Theme by <a href="https://themeforest.net/user/webredox/portfolio" class="text-weight-700 js-pointer-small">webRedox</a>',
							'args'   => array(
								'teeny'            => true,
								'textarea_rows'    => 10
							)
					),
					
					
					)
                ) );
				
				Redux::setSection( $opt_name, array(
                    'icon'   => 'el-icon-key',
                    'title'  => esc_html__( 'Documentation', 'umaya' ),
                    'fields' => array(					
					
					array(
							'id' => 'docs',
							'type' => 'info',
		                    'notice' => true,
		                    'style' => 'info',
							'title' => esc_html__('UMAYA Theme Documentation', 'umaya'),
							'desc' => __('<a href="http://webredox.net/demo/wp/umaya/doc/documentation.html" target="_blank">Click Here</a> To get the theme documentation.', 'umaya')
							
					),	

			
			
					)
                ));
				
				
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'umaya' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'umaya' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-umaya plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

