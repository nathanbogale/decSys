<?php
/**
 * Theme functions and definitions.
 *
 * @package Adeline WordPress theme
 */
// Core Constants
define('ADELINE_THEME_DIR', get_template_directory());
define('ADELINE_THEME_URI', get_template_directory_uri());
class Adeline_Theme_Class
{
    /**
     * Main Theme Class Constructor
     *
     * @since  1.0
     */
    public function __construct()
    {
        // Define framework constants
        add_action('after_setup_theme', array('Adeline_Theme_Class', 'adeline_constants'), 0);
        // Load core theme function files
        add_action('after_setup_theme', array('Adeline_Theme_Class', 'adeline_initialize_framewrok'), 1);
        // Load plugins configuration classes
        add_action('after_setup_theme', array('Adeline_Theme_Class', 'adeline_plugins_config'), 3);
        // Additional theme setup => add_theme_support, register_nav_menus, load_theme_textdomain, etc
        add_action('after_setup_theme', array('Adeline_Theme_Class', 'adeline_theme_setup'), 10);
        // register sidebar widget areas
        add_action('widgets_init', array('Adeline_Theme_Class', 'adeline_register_sidebars'));
        // Add Souncloud to supported oembed providers
        add_action('init', array('Adeline_Theme_Class', 'adeline_add_oembed_soundcloud'));
        // Add custom featured image size
        add_action('init', array('Adeline_Theme_Class', 'adeline_add_featured_image_size'));
        // Add HTML5 support
        add_action( 'after_setup_theme', array('Adeline_Theme_Class', 'adeline_register_html_support'));
        // Registers theme options strings into Polylang
        if (class_exists('Polylang')) {
            add_action('after_setup_theme', array('Adeline_Theme_Class', 'adeline_polylang_register_string'));
        }
        /** Admin only actions **/
        if (is_admin()) {
            // Load scripts in the WP admin
            add_action('admin_enqueue_scripts', array('Adeline_Theme_Class', 'adeline_admin_scripts'));
            // Outputs custom CSS for the admin
            add_action('admin_head', array('Adeline_Theme_Class', 'adeline_admin_inline_css'));
            /** Non Admin actions **/
        } else {
            // Load theme CSS
            add_action('wp_enqueue_scripts', array('Adeline_Theme_Class', 'adeline_theme_css'));
            // Load theme js
            add_action('wp_enqueue_scripts', array('Adeline_Theme_Class', 'adeline_theme_js'));
            // Add a pingback url auto-discovery header for singularly identifiable articles
            add_action('wp_head', array('Adeline_Theme_Class', 'adeline_pingback_header'), 1);
            // Add meta viewport tag to header
            add_action('wp_head', array('Adeline_Theme_Class', 'adeline_meta_viewport'), 1);
            // Add an X-UA-Compatible header
            add_filter('wp_headers', array('Adeline_Theme_Class', 'adeline_x_ua_compatible_headers'));
            // Loads html5 shiv script
            add_action('wp_head', array('Adeline_Theme_Class', 'adeline_html5_shiv'));
            // Alter some WP core widgets arguments and code
            add_filter('widget_tag_cloud_args', array('Adeline_Theme_Class', 'adeline_widget_tag_cloud_args'));
            add_filter('wp_list_categories', array('Adeline_Theme_Class', 'adeline_wp_list_categories_args'));
            add_filter('embed_oembed_html', array('Adeline_Theme_Class', 'adeline_add_responsive_wrap_to_oembeds'), 99, 4);
            // Adds classes the post class
            add_filter('post_class', array('Adeline_Theme_Class', 'adeline_post_class'));
            // Add schema markup to the authors post link
            add_filter('the_author_posts_link', array('Adeline_Theme_Class', 'adeline_the_author_posts_link'));
            // Some fixes action for third part plugins
            add_filter('fl_builder_override_lightbox', array('Adeline_Theme_Class', 'adeline_remove_bb_lightbox'));
            // Add custom allowed html tags to wp_kses() function
            add_filter('wp_kses_allowed_html', array('Adeline_Theme_Class', 'adeline_kses_allowed_html'), 10, 2);
        }
    }
    /**
     * Define Framework Constants
     *
     * @since  1.0
     */
    public static function adeline_constants()
    {
        $version = self::theme_version();
        // Theme version
        define('ADELINE_THEME_VERSION', $version);
        // Javascript and CSS Paths
        define('ADELINE_JS_DIR_URI', ADELINE_THEME_URI . '/assets/js/');
        define('ADELINE_CSS_DIR_URI', ADELINE_THEME_URI . '/assets/css/');
        // Include Paths
        define('ADELINE_FRAMEWORK_DIR', ADELINE_THEME_DIR . '/framework/');
        define('ADELINE_FRAMEWORK_DIR_URI', ADELINE_THEME_URI . '/framework/');
        // Check if plugins are active
        define('ADELINE_EXT_ACTIVE', class_exists('DPR_Theme_Extensions'));
        define('ADELINE_VISUAL_COMPOSER_ACTIVE', class_exists('Vc_Manager'));
        define('ADELINE_ELEMENTOR_ACTIVE', class_exists('Elementor\Plugin'));
        define('ADELINE_BEAVER_ACTIVE', class_exists('FLBuilder'));
        define('ADELINE_WOOCOMMERCE_ACTIVE', class_exists('WooCommerce'));
        define('ADELINE_TRIBE_ACTIVE', class_exists('Tribe__Events__Main'));
    }
    /**
     * Configs for 3rd party plugins.
     *
     * @since 1.0
     */
    public static function adeline_plugins_config()
    {
        $dir = ADELINE_FRAMEWORK_DIR;
        // WooCommerce
        if (ADELINE_WOOCOMMERCE_ACTIVE) {
            require_once $dir . 'woocommerce/woocommerce-config.php';
        }
        // Events Calendar
        if (ADELINE_TRIBE_ACTIVE) {
            require_once $dir . 'tribe/tribe-config.php';
        }
    }
    /**
     * Returns current theme version
     *
     * @since  1.0
     */
    public static function theme_version()
    {
        // Get theme data
        $theme = wp_get_theme();
        // Return theme version
        return $theme->get('Version');
    }
    /**
     * Load theme classes
     *
     * @since  1.0
     */
    public static function adeline_initialize_framewrok()
    {
        $dir = ADELINE_FRAMEWORK_DIR;
        require_once $dir . 'dpr_functions.php';
        require_once $dir . 'dpr_excerpt.php';
        require_once $dir . 'walker/init.php';
        require_once $dir . 'walker/menu-walker.php';
        require_once $dir . 'compatibility/class-dpr-beaver.php';
        // Admin only classes
        if (is_admin()) {
            // Recommend plugins
            require_once $dir . 'tgm/class-tgm-plugin-activation.php';
            require_once $dir . 'tgm/tgm-plugin-activation.php';
        }
        // Front-end only classes
        else {
            // BreadcrumbTrail class
            require_once $dir . 'breadcrumb_trail.php';
        }
    }
    /**
     * Theme Setup
     *
     * @since  1.0
     */
    public static function adeline_theme_setup()
    {
        // Load text domain
        load_theme_textdomain('adeline', ADELINE_THEME_DIR . '/languages');
        // Get globals
        global $content_width;
        // Set content width based on theme's default design
        if (!isset($content_width)) {
            $content_width = 1200;
        }
        // Register navigation menus , create the right menu location
        register_nav_menus(array('topbar_menu' => esc_html__('Top Bar', 'adeline'), 'main_menu' => esc_html__('Main', 'adeline'), 'centered_menu_left' => esc_html__('Main menu left (used in centered header)', 'adeline'), 'centered_menu_right' => esc_html__('Main menu right (used in centered header)', 'adeline'), 'fullscreen_menu' => esc_html__('Fullscreen Menu (optional)', 'adeline'), 'footer_menu' => esc_html__('Footer', 'adeline'), 'mobile_menu' => esc_html__('Mobile (optional)', 'adeline')));

        // Enable support for Post Formats
        add_theme_support('post-formats', array('video', 'gallery', 'audio', 'quote', 'link'));
        // Enable support for <title> tag
        add_theme_support('title-tag');
        // Add default posts and comments RSS feed links to head
        add_theme_support('automatic-feed-links');
        // Enable support for Post Thumbnails on posts and pages
        add_theme_support('post-thumbnails');
        /*

         * Switch default core markup for search form, comment form, comments, galleries, captions and widgets

         * to output valid HTML5.

         */
        add_theme_support('html5', array('comment-form', 'comment-list', 'gallery', 'caption', 'widgets'));
        // Add support for Block Styles.
        add_theme_support('wp-block-styles');
        // Add support for full and wide align images.
        add_theme_support('align-wide');
        // Add support for editor styles.
        add_theme_support('editor-styles');
        // Enqueue editor styles.
        add_editor_style('style-editor.css');
        // Add custom editor font sizes.
        add_theme_support('editor-font-sizes', array(array('name' => esc_html__('Small', 'adeline'), 'shortName' => esc_html__('S', 'adeline'), 'size' => 19.5, 'slug' => 'small'), array('name' => esc_html__('Normal', 'adeline'), 'shortName' => esc_html__('M', 'adeline'), 'size' => 22, 'slug' => 'normal'), array('name' => esc_html__('Large', 'adeline'), 'shortName' => esc_html__('L', 'adeline'), 'size' => 36.5, 'slug' => 'large'), array('name' => esc_html__('Huge', 'adeline'), 'shortName' => esc_html__('XL', 'adeline'), 'size' => 49.5, 'slug' => 'huge')));
        // Editor color palette.
        add_theme_support('editor-color-palette', array(array('name' => esc_html__('Primary', 'adeline'), 'slug' => 'primary', 'color' => '#f82528'), array('name' => esc_html__('Secondary', 'adeline'), 'slug' => 'secondary', 'color' => '#f08f23'), array('name' => esc_html__('Dark Gray', 'adeline'), 'slug' => 'dark-gray', 'color' => '#111'), array('name' => esc_html__('Light Gray', 'adeline'), 'slug' => 'light-gray', 'color' => '#767676'), array('name' => esc_html__('White', 'adeline'), 'slug' => 'white', 'color' => '#FFF')));
        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');
        // Declare WooCommerce support.
        add_theme_support('woocommerce', array(
            'thumbnail_image_width'         => 600,
            'gallery_thumbnail_image_width' => 100,
            'single_image_width'            => 600,
        ));
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        // Add editor style
        add_editor_style('assets/css/editor-style.min.css');
        // Declare support for selective refreshing of widgets.
        add_theme_support('customize-selective-refresh-widgets');
    }
    /**
     * Adds the meta tag to the site header
     *
     * @since 1.0
     */
    public static function adeline_pingback_header()
    {
        if (is_singular() && pings_open()) {
            printf('<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo('pingback_url')));
        }
    }
    /**
     * Adds the meta tag to the site header
     *
     * @since 1.0
     */
    public static function adeline_meta_viewport()
    {
        // Meta viewport
        $viewport = '<meta name="viewport" content="width=device-width, initial-scale=1">';
        echo apply_filters('adeline_meta_viewport', $viewport);
    }
    /**
     * Load scripts in the WP admin
     *
     * @since 1.0
     */
    public static function adeline_admin_scripts()
    {
        global $pagenow;
        if ('nav-menus.php' == $pagenow) {
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script( 'wp-color-picker');
            wp_enqueue_style('dpr-adeline-menus', ADELINE_FRAMEWORK_DIR_URI . 'walker/assets/menus.css');
            wp_enqueue_script('dpr-adeline-menus-js', ADELINE_FRAMEWORK_DIR_URI . 'walker/assets/menu.js');
        }
    }
    /**
     * Load front-end scripts
     *
     * @since  1.0
     */
    public static function adeline_theme_css()
    {
        // Define dir
        $dir           = ADELINE_CSS_DIR_URI;
        $theme_version = ADELINE_THEME_VERSION;
        // Main Style.css File
        wp_enqueue_style('dpr-adeline-style', $dir . 'style.min.css', false, $theme_version);
        if (ADELINE_EXT_ACTIVE != true) {
            wp_enqueue_style('dpr-adeline-start-style', $dir . 'start.css', false, $theme_version);
            wp_enqueue_style('dpr-google-fonts', '//fonts.googleapis.com/css?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', false);
        }
    }
    /**
     * Front-end JS
     *
     * @since 1.0
     */
    public static function adeline_theme_js()
    {
        // Get js directory uri
        $dir = ADELINE_JS_DIR_URI;
        // Get current theme version
        $theme_version = ADELINE_THEME_VERSION;
        // Get localized array
        $localize_array = self::adeline_localize_array();
        // Comment reply
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
        // Add images loaded
        wp_enqueue_script('imagesloaded');
        // Register nicescroll script to use it in some extensions
        wp_register_script('nicescroll', $dir . 'vendors/nicescroll.min.js', array('jquery'), $theme_version, true);
        // Enqueue nicescroll script if vertical header style
        if ('vertical' == adeline_header_style()) {
            wp_enqueue_script('nicescroll');
        }
        // WooCommerce scripts
        if (ADELINE_WOOCOMMERCE_ACTIVE) {
            wp_enqueue_script('dpr-adeline-woocommerce', $dir . 'vendors/woo/woo-scripts.min.js', array('jquery'), $theme_version, true);
        }
        // Load minified js
        wp_enqueue_script('dpr-adeline-main', $dir . 'main.min.js', array('jquery'), $theme_version, true);
        // Enqueue JS libraries and libraries deppend theme JS
        wp_enqueue_script('customselect', $dir . 'modules/customselect.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('dpr-customselect', $dir . 'core/dpr-customselect.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('fitvids', $dir . 'modules/fitvids.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('dpr-fitvids', $dir . 'core/dpr-fitvids.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('isotope', $dir . 'modules/isotope.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('dpr-isotope', $dir . 'core/dpr-isotope.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('lightcase', $dir . 'modules/lightcase.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('dpr-lightcase', $dir . 'core/dpr-lightcase.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('theia-sticky-sidebar', $dir . 'vendors/theia-sticky-sidebar.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('dpr-theiaSidebars', $dir . 'core/dpr-theiaSidebars.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('sidr', $dir . 'modules/sidr.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('dpr-sidr', $dir . 'core/dpr-sidr.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('slick', $dir . 'modules/slick.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('dpr-slick', $dir . 'core/dpr-slick.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('smoothscroll', $dir . 'modules/smoothscroll.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('superfish', $dir . 'modules/superfish.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('dpr-superfish', $dir . 'core/dpr-superfish.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('odometer', $dir . 'vendors/odometer.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('dpr-odometer', $dir . 'core/dpr-odometer.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('circle-progress', $dir . 'vendors/circle-progress.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('dpr-piechart', $dir . 'core/dpr-piechart.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('ggpopover', $dir . 'modules/ggpopover.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('dpr-ggpopover', $dir . 'core/dpr-ggpopover.js', array('jquery'), $theme_version, true);
        wp_enqueue_script('dpr-waypoint', $dir . 'core/dpr-waypoint.js', array('jquery'), $theme_version, true);
        // Localize array
        wp_localize_script('dpr-adeline-main', 'dpradelineLocalize', $localize_array);
        // Register Infinite Scroll script to use in some cases
        wp_register_script('infinitescroll', $dir . 'vendors/infinitescroll.min.js', array('jquery'), $theme_version, true);
        // Register Load More script to use in some cases
        wp_register_script('loadmore', $dir . 'vendors/loadmore.min.js', array('jquery'), $theme_version, true);
        // Register AOS script to use in some cases
        wp_register_script('aos', $dir . 'vendors/aos.min.js', '', $theme_version, true);
    }
    /**
     * Functions.js localize array
     *
     * @since 1.0
     */
    public static function adeline_localize_array()
    {
        // Create array
        $slide_direction         = adeline_get_option_value('mobile_menu_slide_direction', '', 'left');
        $slide_direction         = $slide_direction ? $slide_direction : 'left';
        $mobile_menu_switchpoint = intval(adeline_get_option_value('mobile_menu_switchpoint', '', '959'));
        if ($mobile_menu_switchpoint == 'custom' && !empty(adeline_get_option_value('mobile_menu_switchpoint_custom'))) {
            $mobile_menu_switchpoint = intval(adeline_get_option_value('mobile_menu_switchpoint_custom'));
        }
        $is_vertical_menu_expandable = false;
        if (('vertical' == adeline_header_style() || 'custom_vertical' == adeline_header_style()) && true == adeline_get_option_value('vertical_header_expandable', '', false)) {
            $is_vertical_menu_expandable = true;
        }
        $shrink_header_logo_height = intval(adeline_get_option_value('shrink_header_logo_height', 'height', '50px'));
        $sidrDisplace              = false;
        if ('shift' == adeline_get_option_value('mobile_menu_slide_effect', '', 'overlapp')) {
            $sidrDisplace = true;
        }

        $array = array('isRTL' => is_rtl(), 'menuSearchStyle' => adeline_menu_search_style(), 'mobileMenuSwitchPoint' => $mobile_menu_switchpoint, 'isVerticalMenuExpandable' => $is_vertical_menu_expandable, 'sidrSource' => adeline_sidr_menu_source(), 'sidrDisplace' => $sidrDisplace, 'sidrSide' => $slide_direction, 'useStickyHeader' => adeline_get_option_value('sticky_heder_enable', '', false), 'stickyStyle' => adeline_get_option_value('sticky_header_style', '', 'fixed'), 'shrinkLogoHeight' => $shrink_header_logo_height, 'useStickyTopBar' => adeline_get_option_value('use_sticky_topbar', '', false), 'useStickyMobile' => adeline_get_option_value('use_sticky_mobile', '', false), 'customSelects' => '.woocommerce-ordering .orderby, .cart-collaterals .cart_totals table select, #dropdown_product_cat, .widget_categories select, .widget_archive select, .single-product .variations_form .variations select, .mptt-navigation-select');
        // WooCart
        if (ADELINE_WOOCOMMERCE_ACTIVE) {
            $array['wooCartStyle'] = adeline_menu_cart_style();
        }
        return apply_filters('adeline_localize_array', $array);
    }
    /**
     * Add headers for IE
     *
     * @since 1.0
     */
    public static function adeline_x_ua_compatible_headers($headers)
    {
        $headers['X-UA-Compatible'] = 'IE=edge';
        return $headers;
    }
    /**
     * Load HTML5 dependencies for IE8
     *
     * @since 1.0
     */
    public static function adeline_html5_shiv()
    {
        wp_register_script('html5shiv', ADELINE_JS_DIR_URI . '/vendors/html5.min.js', array(), ADELINE_THEME_VERSION, false);
        wp_enqueue_script('html5shiv');
        wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
    }
    /**
     * Registers sidebars
     *
     * @since  1.0
     */
    public static function adeline_register_sidebars()
    {
        // Right Sidebar
        register_sidebar(array('name' => esc_html__('Right Sidebar', 'adeline'), 'id' => 'sidebar', 'description' => esc_html__('Widgets in this area are used in the right sidebar region.', 'adeline'), 'before_widget' => '<div class="sidebar-box %2$s clr">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
        // Left Sidebar
        register_sidebar(array('name' => esc_html__('Left Sidebar', 'adeline'), 'id' => 'sidebar-2', 'description' => esc_html__('Widgets in this area are used in the left sidebar region.', 'adeline'), 'before_widget' => '<div class="sidebar-box %2$s clr">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
        // Footer 1
        register_sidebar(array('name' => esc_html__('Footer 1', 'adeline'), 'id' => 'footer-one', 'description' => esc_html__('Widgets in this area are used in the first footer area.', 'adeline'), 'before_widget' => '<div class="footer-widget %2$s clr">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
        // Footer 2
        register_sidebar(array('name' => esc_html__('Footer 2', 'adeline'), 'id' => 'footer-two', 'description' => esc_html__('Widgets in this area are used in the second footer area.', 'adeline'), 'before_widget' => '<div class="footer-widget %2$s clr">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
        // Footer 3
        register_sidebar(array('name' => esc_html__('Footer 3', 'adeline'), 'id' => 'footer-three', 'description' => esc_html__('Widgets in this area are used in the third footer area.', 'adeline'), 'before_widget' => '<div class="footer-widget %2$s clr">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
        // Footer 4
        register_sidebar(array('name' => esc_html__('Footer 4', 'adeline'), 'id' => 'footer-four', 'description' => esc_html__('Widgets in this area are used in the fourth footer area.', 'adeline'), 'before_widget' => '<div class="footer-widget %2$s clr">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>'));
    }
    /**
     * Registers theme options strings into Polylang.
     *
     * @since 1.0
     */
    public static function adeline_polylang_register_string()
    {
        if (function_exists('pll_register_string') && $strings = adeline_register_theme_opt_strings()) {
            foreach ($strings as $string => $default) {
                pll_register_string($string, adeline_get_option_value($string, '', $default), 'Theme Options', true);
            }
        }
    }
    /**
     * Add Soundcloud to oembed providers
     *
     * @since 1.0
     */
    public static function adeline_add_oembed_soundcloud()
    {
        wp_oembed_add_provider('https://soundcloud.com/*', 'https://soundcloud.com/oembed');
    }
    /**
     * Add custom featured image size
     *
     * @since 1.0
     */
    public static function adeline_add_featured_image_size()
    {
        add_image_size( 'dpr_medium_featured', 600, 250, true );
    }
    /**
     * Adds inline CSS for the admin
     *
     * @since 1.0
     */
    public static function adeline_admin_inline_css()
    {
        echo '<style>div#setting-error-tgmpa{display:block;}.rotate90ccw{-webkit-transform: rotate(-90deg);-moz-transform: rotate(-90deg);-ms-transform: rotate(-90deg);-o-transform: rotate(-90deg);filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);}</style>';
    }
    /**
     * Alters some cor WP widgets
     *
     * @since 1.0
     */
    public static function adeline_widget_tag_cloud_args($args)
    {
        $args['largest']  = '0.923';
        $args['smallest'] = '0.923';
        $args['unit']     = 'em';
        return $args;
    }
    public static function adeline_wp_list_categories_args($links)
    {
        $links = str_replace('</a> (', '</a> <span class="cat-count-span">(', $links);
        $links = str_replace(' )', ' )</span>', $links);
        return $links;
    }
    public static function adeline_add_responsive_wrap_to_oembeds($cache, $url, $attr, $post_ID)
    {
        // Supported video embeds
        $hosts = apply_filters('adeline_oembed_responsive_hosts', array('vimeo.com', 'youtube.com', 'blip.tv', 'money.cnn.com', 'dailymotion.com', 'flickr.com', 'hulu.com', 'kickstarter.com', 'vine.co', 'soundcloud.com', '#http://((m|www)\.)?youtube\.com/watch.*#i', '#https://((m|www)\.)?youtube\.com/watch.*#i', '#http://((m|www)\.)?youtube\.com/playlist.*#i', '#https://((m|www)\.)?youtube\.com/playlist.*#i', '#http://youtu\.be/.*#i', '#https://youtu\.be/.*#i', '#https?://(.+\.)?vimeo\.com/.*#i', '#https?://(www\.)?dailymotion\.com/.*#i', '#https?://dai.ly/*#i', '#https?://(www\.)?hulu\.com/watch/.*#i', '#https?://wordpress.tv/.*#i', '#http?://wordpress.tv/.*#i', '#https?://(www\.)?funnyordie\.com/videos/.*#i', '#https?://vine.co/v/.*#i', '#https?://(www\.)?collegehumor\.com/video/.*#i', '#https?://(www\.|embed\.)?ted\.com/talks/.*#i'));
        // Supports responsive
        $supports_responsive = false;
        // Check if responsive wrap should be added
        foreach ($hosts as $host) {
            if (strpos($url, $host) !== false) {
                $supports_responsive = true;
                break;
                // no need to loop further

            }
        }
        // Output code
        if ($supports_responsive) {
            return '<p class="responsive-video-wrapper clr">' . $cache . '</p>';
        } else {
            return '<div class="dpr-adeline-oembed-wrapper clr">' . $cache . '</div>';
        }
    }
    /**
     * Adds extra classes to the post_class() output
     *
     * @since 1.0
     */
    public static function adeline_post_class($classes)
    {
        // Get post
        global $post;
        // Add item class
        $classes[] = 'entry';
        // Add has media class
        if (has_post_thumbnail() || adeline_get_meta_value(get_the_ID(), 'video_post_oembed_video_url', '') != '' || adeline_get_meta_value(get_the_ID(), 'video_post_self_hosted_video_url', '') != '' || adeline_get_meta_value(get_the_ID(), 'video_post_embed_code', '') != '' || adeline_get_meta_value(get_the_ID(), 'audio_post_oembed_audio_url', '') != '' || adeline_get_meta_value(get_the_ID(), 'audio_post_self_hosted_audio_url', '') != '' || adeline_get_meta_value(get_the_ID(), 'audio_post_embed_code', '') != '') {
            $classes[] = 'has-media';
        }
        // Return classes
        return $classes;
    }
    /**
     * Add schema markup to the authors post link
     *
     * @since 1.0
     */
    public static function adeline_the_author_posts_link($link)
    {
        // Add schema markup
        $schema = adeline_get_schema_markup('author_link');
        if ($schema) {
            $link = str_replace('rel="author"', 'rel="author" ' . $schema, $link);
        }
        // Return link
        return $link;
    }
    /**
     * Add HTML5 support
     *
     * @since 1.0
     */
    public static function adeline_register_html_support()
    {

        add_theme_support('html5', array('script', 'style'));

    }
    /**
     * Add custom htnl allowed tags to wp_kses() function
     *
     * @since 1.0
     */
    public static function adeline_kses_allowed_html($tags, $context)
    {
        switch ($context) {
            case 'styled_text':
                $tags = array(
                    'a'      => array('href' => array()),
                    'b'      => array(),
                    'strong' => array(),
                    'em'     => array(),
                    'b'      => array(),
                    'i'      => array(),
                    'br'     => array(),
                    'div'    => array('title' => array(), 'class' => array(), 'style' => array()),
                    'span'   => array('title' => array(), 'class' => array(), 'style' => array()),
                    'i'      => array('title' => array(), 'class' => array(), 'style' => array()),
                );
                return $tags;
            default:
                return $tags;
        }
    }
    /**
     * Remove BB Lightbox
     *
     * @since 1.0
     */
    public static function adeline_remove_bb_lightbox()
    {
        return true;
    }
}
$Adeline_Theme_Class = new Adeline_Theme_Class;
