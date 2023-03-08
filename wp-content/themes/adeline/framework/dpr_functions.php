<?php
/**
 * This file includes core functions used throughout the theme.
 *
 * @package Adeline WordPress theme
 */
/*-------------------------------------------------------------------------------*/
/* Table of contents

/*-------------------------------------------------------------------------------*

1.General

2.Top Bar

3.Header && Navigation

4.Subheader

5.Blog

6.Footer

7.WooCommerce

8.Other

#

/*-------------------------------------------------------------------------------*/
/* 1.General

/*-------------------------------------------------------------------------------*/
/**
 * Initialize Redux framework global variable across theme
 *
 * @since 1.0
 */
if (!function_exists('adeline_get_option_value')) {
    function adeline_get_option_value($var = '', $sub = '', $default = '')
    {
        global $dpr_adeline;
        if ($sub) {
            if (isset($dpr_adeline[$var][$sub]) && !empty($dpr_adeline[$var][$sub])) {
                return $dpr_adeline[$var][$sub];
            } else {
                if ($default) {
                    return $default;
                } else {
                    return '';
                }
            }
        } else {
            if (isset($dpr_adeline[$var]) && !empty($dpr_adeline[$var])) {
                return $dpr_adeline[$var];
            } else {
                if ($default) {
                    return $default;
                } else {
                    return '';
                }
            }
        }
    }
}
if (!function_exists('adeline_get_meta_value')) {
    function adeline_get_meta_value($id = '', $name = '', $default = '')
    {
        if (!ADELINE_EXT_ACTIVE) {
            return '';
        }
        global $dpr_adeline;
        if (null !== redux_post_meta('dpr_adeline', $id, $name) && '' != redux_post_meta('dpr_adeline', $id, $name)) {
            return redux_post_meta('dpr_adeline', $id, $name);
        } else {
            if ($default) {
                return $default;
            } else {
                return '';
            }
        }
    }
}
/**
 * Convert gradient string to background CSS
 *
 * @since 1.0
 */
if (!function_exists('adeline_gradientToBgCSS')) {
    function adeline_gradientToBgCSS($string)
    {
        $gcArray       = explode(';', $string);
        $gcOrientation = ($gcArray[0]) . 'deg';
        unset($gcArray[0]);
        $gcColors = '';
        foreach ($gcArray as $point) {
            $pointarray = explode('/', $point);
            $gcColors .= ' ,' . $pointarray[1] . ' ' . $pointarray[0] . ' ';
        }
        $css = 'background: -moz-linear-gradient(' . $gcOrientation . $gcColors . ');';
        $css .= 'background: -webkit-linear-gradient(' . $gcOrientation . $gcColors . ');';
        $css .= 'background: -o-linear-gradient(' . $gcOrientation . $gcColors . ');';
        $css .= 'background: -ms-linear-gradient(' . $gcOrientation . $gcColors . ');';
        $css .= 'background: linear-gradient(' . $gcOrientation . $gcColors . ');';
        return $css;
    }
}

/**
 * Convert rgb colors to hex
 *
 * @since 1.0
 */
if (!function_exists('adeline_rgb_to_hex')):
    function adeline_rgb_to_hex(string $rgba): string
{
        if (strpos($rgba, '#') === 0) {
            return $rgba;
        }

        preg_match('/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i', $rgba, $by_color);

        return sprintf('#%02x%02x%02x', $by_color[1], $by_color[2], $by_color[3]);
    }
endif;
/**
 * Convert hex color to rgb
 *
 * @since 1.0
 */
if (!function_exists('adeline_hex_to_rgb')) {
    function adeline_hex_to_rgb($hex)
    {
        $hex = str_replace('#', '', $hex);
        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        return 'rgba(' . implode(',', $rgb) . ')'; // returns the rgb value

    }
}

/**
 * Convert hex color to rgba
 */
if (!function_exists('adeline_hex_to_rgba')) {
    function adeline_hex_to_rgba($hex, $opacity)
    {
        return 'rgba(' . adeline_hex_to_rgb($hex) . ',' . $opacity . ')'; // returns the rgba value

    }
}
/**
 * Returns particle content
 *
 */
if (!function_exists('adeline_particle_content')) {
    function adeline_particle_content($id)
    {
        // Get particle content
        $content               = '';
        $template              = get_post($id);
        $shortcodes_custom_css = get_post_meta($id, '_wpb_shortcodes_custom_css', true);
        adeline_print_head_style($shortcodes_custom_css);
        if ($template && !is_wp_error($template)) {
            $content = $template->post_content;
        }
        if (!empty($id)) {
            // Check if page is Elementor page
            $elementor = get_post_meta($id, '_elementor_edit_mode', true);
            // If Elementor
            if (ADELINE_ELEMENTOR_ACTIVE && $elementor) {
                $content = Elementor\Plugin::instance()->frontend->get_builder_content_for_display($id);
            }
            // If Beaver Builder
            else if (ADELINE_BEAVER_ACTIVE && !empty($id)) {
                $content = do_shortcode('[fl_builder_insert_layout id="' . $id . '"]');
            }
            // Else
            else {
                    // Display template content
                    $content = do_shortcode($content);
                }
            }
            // Apply filters and return particle content
            return apply_filters('adeline_particle_content', $content);
        }
    }
/**
 * Print HEAD style tag
 *
 */
    if (!function_exists('adeline_print_head_style')) {
        function adeline_print_head_style($css)
    {
            if (!empty($css)) {
                echo '<script>' . '(function($) {' . '$("head").append("<style>' . $css . '</style>");' . '})(jQuery);' . '</script>';
            }
        }
    }
/**
 * Adds classes to the body tag
 *
 * @since 1.0
 */
    if (!function_exists('adeline_body_classes')) {
        function adeline_body_classes($classes)
    {
            // Vars
            $post_layout  = adeline_content_layout();
            $layout_style = adeline_get_option_value('layout_width', '', 'stretched');
            $post_id      = adeline_post_id();
            $mobile_style = adeline_mobile_menu_style();
            // RTL
            if (is_rtl()) {
                $classes[] = 'rtl';
            }
            // Main class
            $classes[] = 'dpr-adeline-theme';
            // Mobile menu style
            $classes[] = $mobile_style . '-mobile';
            // Boxed layout
            if ('boxed' == $layout_style) {
                $classes[] = 'boxed-layout';
                if (adeline_get_option_value('boxed_shadow', '', true)) {
                    $classes[] = 'wrap-boxshadow';
                }
            }
            // Framed layout
            if ('framed' == $layout_style) {
                $classes[] = 'framed-layout';
            }
            // Fullwidth top bar style
            if (true == adeline_get_option_value('top_bar_full_width', '', false)) {
                $classes[] = 'full-width-topbar';
            }
            // Top menu header style to control the responsive
            if ('top' == adeline_header_style()) {
                $classes[] = 'top-header-style';
            }
            // Magazine header style to control the responsive
            if ('magazine' == adeline_header_style()) {
                $classes[] = 'magazine-header-style';
            }
            // Vertical header style to control the wrap margin left
            if ('vertical' == adeline_header_style() || 'custom_vertical' == adeline_header_style()) {
                $classes[] = 'vertical-header-style';
            }
            // Vertical header style
            if ('vertical' == adeline_header_style() || 'custom_vertical' == adeline_header_style()) {
                // Header position
                $position  = adeline_get_option_value('vertical_header_position', '', 'left-header');
                $classes[] = $position;
            }
            // Fullwidth header style
            if (true == adeline_get_option_value('header_full_width', '', false)) {
                $classes[] = 'full-width-header';
            }
            // Sidebar enabled
            if ('left-sidebar' == $post_layout || 'right-sidebar' == $post_layout || 'both-sidebars' == $post_layout) {
                $classes[] = 'has-sidebar';
            }
            // Content layout
            if ($post_layout) {
                $classes[] = 'content-' . $post_layout;
            }
            // Both sidebars layout style
            if ('both-sidebars' == $post_layout) {
                $classes[] = adeline_both_sidebars_column_order();
            }
            // Single Post cagegories
            if (is_singular('post')) {
                $cats = get_the_category($post_id);
                foreach ($cats as $cat) {
                    $classes[] = 'post-in-category-' . $cat->category_nicename;
                }
                if ('post-title' == adeline_get_option_value('blog_single_subheader_title', '', 'blog')) {
                    $classes[] = 'title-in-subheader';
                }
            }
            // If landing page template
            if (is_page_template('page-templates/landing.php')) {
                $classes[] = 'landing-page';
            }
            // Topbar
            if (adeline_display_topbar()) {
                $classes[] = 'has-topbar';
            }
            // Sticky header
            if (adeline_sticky_header_enabled()) {
                $classes[] = 'sticky-header-enabled';
            }
            // Add overlaping classes for header styles
            if (is_singular('proof_gallery')) {

                if (true == adeline_get_option_value('proofgallery_use_header_overlapping', '', false)) {
                    $classes[] = 'header-overlapping-used';
                    $classes[] = 'overlapping-style-' . adeline_get_option_value('proofgallery_overlapping_header_style', '', 'light');
                }

            } else {
                if (('default' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('center' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('top' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('minimal' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('magazine' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('full_screen' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('custom' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false))) {
                    $classes[] = 'header-overlapping-used';
                    $classes[] = 'overlapping-style-' . adeline_get_option_value('overlapping_header_style', '', 'light');
                }
            }

            // If vertical header closed
            if (('vertical' == adeline_header_style() || 'custom_vertical' == adeline_header_style()) && true == adeline_get_option_value('vertical_header_expandable', '', false)) {
                $classes[] = 'vh-expandable';
            }
            // If no header border bottom
            if (true != adeline_get_option_value('use_header_border')) {
                $classes[] = 'no-header-border';
            }
            // If no custom mobile breakpoint
            if ('959' == adeline_get_option_value('mobile_menu_switchpoint', '', '959')) {
                $classes[] = 'default-switchpoint';
            }
            // Disabled subheader
            if (!adeline_has_subheader()) {
                $classes[] = 'subheader-disabled';
            }
            // If featured image in subheader used
            if ('1' == adeline_get_option_value('use_featured_image_as_bg', '', '')) {
                $classes[] = 'has-featured-img-bg';
            }
            // Breadcrumbs
            if (adeline_has_breadcrumbs()) {
                $classes[] = 'has-breadcrumbs';
            }
            // If blog grid style
            if ('posts-grid' == adeline_get_option_value('blog_style', '', 'large-image')) {
                $classes[] = 'has-blog-grid';
            }
            // Fixed footer
            if (true == adeline_get_option_value('footer_fix_at_bottom') || is_404()) {
                $classes[] = 'has-fixed-footer';
            }
            // Parallax footer
            if (true == adeline_get_option_value('footer_paralax')) {
                $classes[] = 'has-parallax-footer';
            }
            if (ADELINE_TRIBE_ACTIVE) {
                if (tribe_is_event_query()) {
                    $classes[] = 'is-tribe-event-page';
                }
            }
            // If WooCommerce is active
            if (ADELINE_WOOCOMMERCE_ACTIVE) {
                // If grid/list buttons
                if (adeline_get_option_value('dpr_woo_grid_list', '', true)) {
                    $classes[] = 'has-grid-list';
                }
                // Tabs alignment
                $woo_tabs = adeline_get_option_value('woo_product_tabs_alignment', '', 'left');
                if (adeline_is_woo_single()) {
                    $classes[] = 'woo-' . $woo_tabs . '-tabs';
                    if (adeline_get_option_value('woo_product_display_title_in_subheader', '', false)) {
                        $classes[] = 'woo-product-title-in-subheader';
                    }
                }
            }
            // Widget titles class
            if ('none' != adeline_get_option_value('widgets_title_decoration_style', '', 'none')) {
                $classes[] = 'widget-title-decoration-' . adeline_get_option_value('widgets_title_decoration_style', '', 'none');
            }
            //Right Click Blocker class

            if (true == adeline_get_option_value('right_click_blocker', '', false)) {
                $classes[] = 'blocked-right-click';
            }
            //Password protected class

            if (post_password_required()) {
                $classes[] = 'password-required';
            }
            // Return classes
            return $classes;
        }
        add_filter('body_class', 'adeline_body_classes');
    }
/**
 * Store current post ID
 *
 * @since 1.0
 */
    if (!function_exists('adeline_post_id')) {
        function adeline_post_id()
    {
            // Default value
            $id = '';
            // If singular get_the_ID
            if (is_singular()) {
                $id = get_the_ID();
            }
            // Get ID of WooCommerce product archive
        elseif (ADELINE_WOOCOMMERCE_ACTIVE && is_shop()) {
            $shop_id = wc_get_page_id('shop');
            if (isset($shop_id)) {
                $id = $shop_id;
            }
        }
        // Posts page
        elseif (is_home() && $page_for_posts = get_option('page_for_posts')) {
            $id = $page_for_posts;
        }
        $id = apply_filters('adeline_post_id', $id);
        // Sanitize
        $id = $id ? $id : '';
        // Return ID
        return $id;
    }
}
/**
 * Returns post layout
 *
 * @since 1.0
 */
if (!function_exists('adeline_content_layout')) {
    function adeline_content_layout()
    {
        // Check URL
        if (!empty($_GET['post_layout']) && isset($_GET['post_layout'])) {
            return sanitize_text_field(wp_unslash($_GET['post_layout']));
        }
        // Define variables
        $class = 'right-sidebar';
        // Singular Page
        if (is_page()) {
            // Landing template
            if (is_page_template('page-templates/landing.php')) {
                $class = 'full-width';
            }
            // Page Builder template
            if (is_page_template('page-templates/vc-page.php')) {
                $class = 'full-screen';
            }
            // Attachment
            elseif (is_attachment()) {
                $class = 'full-width';
            }
            // All other pages
            else {
                    $class = adeline_get_option_value('page_content_layout', '', 'right-sidebar');
                    if (adeline_get_option_value('page_content_layout', '', 'right-sidebar') == 'right-sidebar' && !is_active_sidebar('sidebar')) {
                        $class = 'full-width';
                    }

                }
            }
            //Event Calendar page
        elseif (is_post_type_archive('tribe_events')) {
            $class = adeline_get_option_value('tribe_calendar_page_layout', '', 'full-width');
        }
        // Home
        elseif (is_home() || is_category() || is_tag() || is_date() || is_author()) {
            $class = adeline_get_option_value('blog_archives_layout', '', 'right-sidebar');
            if (adeline_get_option_value('page_content_layout', '', 'right-sidebar') == 'right-sidebar' && !is_active_sidebar('sidebar')) {
                $class = 'full-width';
            }

        }
        // Singular Post
        elseif (is_singular('post')) {
            $class = adeline_get_option_value('blog_single_layout', '', 'right-sidebar');
            if (adeline_get_option_value('page_content_layout', '', 'right-sidebar') == 'right-sidebar' && !is_active_sidebar('sidebar')) {
                $class = 'full-width';
            }

        }
        // Singular Portfolio
        elseif (is_singular('dpr_portfolio')) {
            $class = adeline_get_option_value('portfolio_single_layout', '', 'full-width');
        }
        // Singular MP Event
        elseif (is_singular('mp-event') || is_singular('mp-columnn')) {
            $class = adeline_get_option_value('mp_event_single_layout', '', 'right-sidebar');
        }
        // Proof Gallery
        elseif (is_singular('proof_gallery')) {
            $class = adeline_get_option_value('proof_gallery_page_layout', '', 'full-width');
        }
        // Singular Tribe Event
        elseif (is_singular('tribe_events') || is_singular('tribe_venue') || is_singular('tribe_organizer')) {
            $class = adeline_get_option_value('tribe_event_single_layout', '', 'right-sidebar');
        }
        // Library and Elementor template
        elseif (is_singular('dpr_particle') || is_singular('elementor_library')) {
            $class = 'full-width';
        }
        // Search
        elseif (is_search()) {
            $class = adeline_get_option_value('blog_single_layout', '', 'right-sidebar');
        }
        // 404 page
        elseif (is_404()) {
            $class = 'full-width';
        }
        // All else
        else {
                $class = 'right-sidebar';
            }
            // Class should never be empty
            if (empty($class)) {
                $class = 'right-sidebar';
            }
            return apply_filters('adeline_content_layout_class', $class);
        }
    }
/**
 * Returns both sidebars style layout
 *
 * @since 1.0
 */
    if (!function_exists('adeline_both_sidebars_column_order')) {
        function adeline_both_sidebars_column_order()
    {
            // Meta
            $meta = get_post_meta(adeline_post_id(), 'dpr_both_sidebars_column_order', true);
            // Check meta first to override and return (prevents filters from overriding meta)
            if ($meta) {
                return $meta;
            }
            // Singular Page
            if (is_page()) {
                $class = adeline_get_option_value('page_both_sidebars_column_order', '', 'order-scs');
            }
            //Event Calendar page
        elseif (is_post_type_archive('tribe_events')) {
            $class = adeline_get_option_value('tribe_calendar_both_sidebars_column_order', '', 'order-scs');
        }
        // Home
        elseif (is_home() || is_category() || is_tag() || is_date() || is_author()) {
            $class = adeline_get_option_value('blog_archives_both_sidebars_column_order', '', 'order-scs');
        }
        // Singular Post
        elseif (is_singular('post')) {
            $class = adeline_get_option_value('blog_single_both_sidebars_column_order', '', 'order-scs');
        }
        // Singular Portfolio
        elseif (is_singular('dpr_portfolio')) {
            $class = adeline_get_option_value('portfolio_single_both_sidebars_column_order', '', 'order-scs');
        }
        // Singular MP Event
        elseif (is_singular('mp-event') || is_singular('mp-columnn')) {
            $class = adeline_get_option_value('mp_event_single_both_sidebars_column_order', '', 'order-scs');
        }
        // Singular Tribe Event
        elseif (is_singular('tribe_events')) {
            $class = adeline_get_option_value('tribe_event_single_both_sidebars_column_order', '', 'order-scs');
        }
        // Singular Proof Gallery
        elseif (is_singular('proof_gallery')) {
            $class = adeline_get_option_value('proof_gallery_both_sidebars_column_order', '', 'order-scs');
        }
        // Search
        elseif (is_search()) {
            $class = adeline_get_option_value('search_both_sidebars_column_order', '', 'order-scs');
        }
        // All else
        else {
                $class = 'order-scs';
            }
            // Class should never be empty
            if (empty($class)) {
                $class = 'order-scs';
            }
            return apply_filters('adeline_both_sidebars_column_order', $class);
        }
    }
/**
 * Returns the sidebar
 *
 * @since  1.0
 */
    if (!function_exists('adeline_display_sidebar')) {
        function adeline_display_sidebar()
    {
            // Retunr if full width or full screen
            if (in_array(adeline_content_layout(), array('full-screen', 'full-width'))) {
                return;
            }
            // Add the second sidebar
            if ('both-sidebars' == adeline_content_layout()) {
                get_sidebar('left');
            }
            // Add the default sidebar
            get_sidebar();
        }
        add_action('adeline_display_sidebar', 'adeline_display_sidebar');
    }
/**
 * Returns the sidebar ID
 *
 * @since  1.0
 */
    if (!function_exists('adeline_get_sidebar')) {
        function adeline_get_sidebar($sidebar = 'sidebar')
    {
            // Search
            if (is_search()) {
                $sidebar = 'search_sidebar';
            }
            $custom_sidebar = adeline_get_option_value('custom_right_sidebar', '', '');
            if ($custom_sidebar && is_active_sidebar($custom_sidebar)) {
                $sidebar = $custom_sidebar;
            }
            // Add filter for tweaking the sidebar display via child theme's
            $sidebar = apply_filters('adeline_get_sidebar', $sidebar);
            // Never show empty sidebar
            if (!is_active_sidebar($sidebar)) {
                $sidebar = 'sidebar';
            }
            // Return the sidebar
            return $sidebar;
        }
    }
/**
 * Returns the second sidebar ID
 *
 * @since  1.0
 */
    if (!function_exists('adeline_get_second_sidebar')) {
        function adeline_get_second_sidebar($sidebar = 'sidebar-2')
    {
            $custom_sidebar = adeline_get_option_value('custom_left_sidebar', '', '');
            if ($custom_sidebar && is_active_sidebar($custom_sidebar)) {
                $sidebar = $custom_sidebar;
            }
            // Add filter for tweaking the left sidebar display via child theme's
            $sidebar = apply_filters('adeline_get_second_sidebar', $sidebar);
            // Never show empty sidebar
            if (!is_active_sidebar($sidebar)) {
                $sidebar = 'sidebar-2';
            }
            // Return the sidebar
            return $sidebar;
        }
    }

/**
 * Returns left sidebar sticky class
 *
 * @since  1.0
 */
    if (!function_exists('adeline_get_left_sidebar_sticky_class')) {
        function adeline_get_left_sidebar_sticky_class($sticky_class = '')
    {
            $sticky_active = false;
            if (adeline_is_woo_shop() || adeline_is_woo_tax()) {
                if (adeline_get_option_value('woo_page_sidebar_left_sticky', '', '')) {
                    $sticky_active = true;
                }

            } elseif (adeline_is_woo_single()) {
            if (adeline_get_option_value('woo_single_page_sidebar_left_sticky', '', '')) {
                $sticky_active = true;
            }

        } else {
            if (adeline_get_option_value('sidebar_left_sticky', '', '')) {
                $sticky_active = true;
            }

        }
        if ($sticky_active) {
            $sticky_class = ' theia-sidebar';
        }

        // Return the sticky class
        return $sticky_class;
    }
}

/**
 * Returns main sidebar sticky class
 *
 * @since  1.0
 */
if (!function_exists('adeline_get_right_sidebar_sticky_class')) {
    function adeline_get_right_sidebar_sticky_class($sticky_class = '')
    {
        $sticky_active = false;
        if (adeline_is_woo_shop() || adeline_is_woo_tax()) {
            if (adeline_get_option_value('woo_page_sidebar_right_sticky', '', '')) {
                $sticky_active = true;
            }

        } elseif (adeline_is_woo_single()) {
            if (adeline_get_option_value('woo_single_page_sidebar_right_sticky', '', '')) {
                $sticky_active = true;
            }

        } else {
            if (adeline_get_option_value('sidebar_right_sticky', '', '')) {
                $sticky_active = true;
            }

        }
        if ($sticky_active) {
            $sticky_class = ' theia-sidebar';
        }

        // Return the sticky class
        return $sticky_class;
    }
}

/**
 * Returns the classname for any specific column grid
 *
 * @since 1.0
 */
if (!function_exists('adeline_grid_class')) {
    function adeline_grid_class($col = '4')
    {
        return esc_attr(apply_filters('adeline_grid_class', 'span_1_of_' . $col));
    }
}
/**
 * Removes the scheme of the passed URL to fit the current page.
 *
 * @since 1.0
 */
if (!function_exists('adeline_correct_url_scheme')) {
    function adeline_correct_url_scheme($url)
    {
        $url = str_replace('http://', '//', str_replace('https://', '//', $url));
        return $url;
    }
}
/**
 * Gets the attachment ID from the url
 *
 * @since 1.0
 */
if (!function_exists('adeline_get_attachment_id_from_url')) {
    function adeline_get_attachment_id_from_url($attachment_url = '')
    {
        global $wpdb;
        $attachment_id = false;
        if ('' == $attachment_url || !is_string($attachment_url)) {
            return '';
        }
        $upload_dir_paths         = wp_upload_dir();
        $upload_dir_paths_baseurl = $upload_dir_paths['baseurl'];
        if (substr($attachment_url, 0, 2) == '//') {
            $upload_dir_paths_baseurl = adeline_correct_url_scheme($upload_dir_paths_baseurl);
        }
        // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image.
        if (false !== strpos($attachment_url, $upload_dir_paths_baseurl)) {
            // If this is the URL of an auto-generated thumbnail, get the URL of the original image.
            $attachment_url = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif|tiff|svg)$)/i', '', $attachment_url);
            // Remove the upload path base directory from the attachment URL.
            $attachment_url = str_replace($upload_dir_paths_baseurl . '/', '', $attachment_url);
            // Run a custom database query to get the attachment ID from the modified attachment URL.
            $attachment_id = $wpdb->get_var($wpdb->prepare("SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url));
            $attachment_id = apply_filters('wpml_object_id', $attachment_id, 'attachment');
        }
        return $attachment_id;
    }
}
/**
 * Gets the most important attachment data from the url
 *
 * @since 1.0
 */
if (!function_exists('adeline_get_attachment_data_from_url')) {
    function adeline_get_attachment_data_from_url($attachment_url = '')
    {
        if ('' == $attachment_url) {
            return false;
        }
        $attachment_data['url'] = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url);
        $attachment_data['id']  = adeline_get_attachment_id_from_url($attachment_data['url']);
        if (!$attachment_data['id']) {
            return false;
        }
        preg_match('/\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', $attachment_url, $matches);
        if (count($matches) > 0) {
            $dimensions                = explode('x', $matches[0]);
            $attachment_data['width']  = $dimensions[0];
            $attachment_data['height'] = $dimensions[1];
        } else {
            $attachment_src            = dpr_get_attachment_image_src($attachment_data['id'], 'full');
            $attachment_data['width']  = $attachment_src[1];
            $attachment_data['height'] = $attachment_src[2];
        }
        $attachment_data['alt']     = get_post_field('_wp_attachment_image_alt', $attachment_data['id']);
        $attachment_data['caption'] = get_post_field('post_excerpt', $attachment_data['id']);
        $attachment_data['title']   = get_post_field('post_title', $attachment_data['id']);
        return $attachment_data;
    }
}
/**
 * Generate image allt attribute from metadata by attachment ID.
 *
 * @param string $id
 *
 * @return string
 *
 * @since 1.0
 */
if (!function_exists('adeline_get_attachment_data_from_url')) {
    function adeline_get_img_alt($id = '', $default_alt = '')
    {
        if (empty($default_alt)) {
            $default_alt = esc_attr__('Image', 'adeline');
        }
        $image_meta = wp_get_attachment_metadata($id);
        $attr       = array();
        $atts_str   = '';
        $alt        = trim(strip_tags(get_post_meta($id, '_wp_attachment_image_alt', true)));
        if (empty($alt)) {
            $alt = $default_alt;
        }
        $atts_str = 'alt="' . esc_attr($alt) . '" ';
        return $atts_str;
    }
}
/**
 * Page preloader display
 *
 * @since 1.0
 */
if (!function_exists('adeline_display_preloader')) {
    function adeline_display_preloader()
    {
        // Return false by default
        $return = false;
        // Return true if enabled via Template Options
        if (true == adeline_get_option_value('page_preloader')) {
            $return = true;
        }
        // Apply filters and return
        return apply_filters('adeline_display_preloader', $return);
    }
}
/**
 * Magic cursor display
 *
 * @since 1.0
 */
if (!function_exists('adeline_display_magic_cursor')) {
    function adeline_display_magic_cursor()
    {
        // Return false by default
        $return = false;
        // Return true if enabled via Template Options
        if (true == adeline_get_option_value('magic_cursor')) {
            $return = true;
        }
        // Apply filters and return
        return apply_filters('adeline_display_magic_cursor', $return);
    }
}
/**
 * Right-click blocker display
 *
 * @since 1.0
 */
if (!function_exists('adeline_display_right_click_blocker')) {
    function adeline_display_right_click_blocker()
    {
        // Return false by default
        $return = false;
        // Return true if enabled via Template Options
        if (true == adeline_get_option_value('right_click_blocker')) {
            $return = true;
        }
        // Apply filters and return
        return apply_filters('adeline_display_right_click_blocker', $return);
    }
}
/**
 * Return predfined no-image
 *
 * @since 1.0
 */
if (!function_exists('adeline_no_image_url')) {
    function adeline_no_image_url($size = "")
    {
        switch ($size) {
            case "small":
                return get_template_directory_uri() . '/assets/img/placeholder_rect_small.png';
                break;
            case "medium":
                return get_template_directory_uri() . '/assets/img/placeholder_rect_medium.png';
                break;
            default:
                return get_template_directory_uri() . '/assets/img/placeholder_big.png';
                break;
        }
    }
}
/*-------------------------------------------------------------------------------*/
/* 2.Top Bar

/*-------------------------------------------------------------------------------*/
/**
 * Display top bar
 *
 * @since 1.0
 */
if (!function_exists('adeline_display_topbar')) {
    function adeline_display_topbar()
    {
        // Return true by default
        $return = true;
        // Return false if disabled via Template Options
        if (true != adeline_get_option_value('top_bar')) {
            $return = false;
        }
        return apply_filters('adeline_display_top_bar', $return);
    }
}
/**
 * Top car template
 *
 * @since 1.0
 */
if (!function_exists('adeline_topbar_template')) {
    function adeline_topbar_template()
    {
        // Return if no header
        if (!adeline_display_topbar()) {
            return;
        }
        get_template_part('template-parts/topbar/layout');
    }
    add_action('adeline_top_bar', 'adeline_topbar_template');
}
/**
 * Returns top bar elements positioning
 *
 * @since 1.0
 */
if (!function_exists('adeline_top_bar_elements')) {
    function adeline_top_bar_elements()
    {
        // Get elements from template options
        $elements = adeline_get_option_value('top_bar_elements', 'enabled');
        if (is_array($elements)) {
            $elements = array_keys($elements);
        }
        // Default elements if no theme options elements settings
        if (empty($elements)) {
            $elements = array('content');
        }
        $elements = apply_filters('adeline_top_bar_elements', $elements);
        // Return sections
        return $elements;
    }
}
/**
 * Add classes to the top bar wrap
 *
 * @since 1.0
 */
if (!function_exists('adeline_topbar_classes')) {
    function adeline_topbar_classes()
    {
        // Setup classes array
        $classes = array();
        // Clearfix class
        $classes[] = 'clr';
        // Visibility
        $visibility = adeline_get_option_value('top_bar_visibility', '', 'all-devices');
        if ('all-devices' != $visibility) {
            $classes[] = $visibility;
        }
        // Sticky header stuff
        if (true == adeline_get_option_value('sticky_heder_enable', '', false)) {
            // Sticky Top Bar
            $useStickyTopBar = adeline_get_option_value('use_sticky_topbar', '', false);
            if (true == $useStickyTopBar) {
                $classes[] = 'top-bar-sticky';
            }
            // Full width header
            $useFullWidthHeader = adeline_get_option_value('use_fullwidth_sticky_header', '', false);
            if (true == $useFullWidthHeader) {
                $classes[] = 'use-full-width-top';
            }
        }
        // Set keys equal to vals
        $classes = array_combine($classes, $classes);
        $classes = apply_filters('adeline_topbar_classes', $classes);
        // Turn classes into space seperated string
        $classes = implode(' ', $classes);
        // return classes
        return $classes;
    }
}
/*-------------------------------------------------------------------------------*/
/* 3.Header && Navigation

/*-------------------------------------------------------------------------------*/
/**
 * Display header
 *
 * @since 1.0
 */
if (!function_exists('adeline_display_header')) {
    function adeline_display_header()
    {
        // Return true by default
        $return = true;
        return apply_filters('adeline_display_header', $return);
    }
}
/**
 * Header template
 *
 * @since 1.0
 */
if (!function_exists('adeline_header_template')) {
    function adeline_header_template()
    {
        // Return if no header
        if (!adeline_display_header()) {
            return;
        }
        get_template_part('template-parts/header/layout');
    }
    add_action('adeline_header', 'adeline_header_template');
}
/**
 * Header style
 *
 * @since 1.0
 */
if (!function_exists('adeline_header_style')) {
    function adeline_header_style()
    {
        // Get style from theme options settings
        $style = adeline_get_option_value('header_style', '', 'default');
        // Sanitize style to make sure it isn't empty
        $style = $style ? $style : 'default';
        return apply_filters('adeline_header_style', $style);
    }
}
/**
 * Sticky header detect
 *
 * @since 1.0
 */
if (!function_exists('adeline_sticky_header_enabled')) {
    function adeline_sticky_header_enabled()
    {
        // Return false by default
        $return = false;
        // Return true if enabled via Template Options
        if (true == adeline_get_option_value('sticky_heder_enable', '', false)) {
            $return = true;
        }
        return apply_filters('adeline_sticky_header_enabled', $return);
    }
}
/**
 * Add classes to the header wrap
 *
 * @since 1.0
 */
if (!function_exists('adeline_header_classes')) {
    function adeline_header_classes()
    {
        // Header style
        $header_style = adeline_header_style();
        // Setup classes array
        $classes = array();
        // Add header style class
        if ($header_style == 'custom_vertical') {
            $classes[] = 'vertical-header';
        } else {
            $classes[] = $header_style . '-header';
        }
        // Search fullscreen
        if ('full_screen' == adeline_menu_search_style()) {
            $classes[] = 'search-fullscreen';
        }
        // Add class if social menu is enabled to remove the negative right on the navigation
        if (true == adeline_get_option_value('menu_social_display', '', false)) {
            $classes[] = 'has-social';
        }
        // Menu alignment
        if ('default' == $header_style) {
            if ('left-menu' == adeline_get_option_value('menu_alignment', '', 'right-menu')) {
                $classes[] = 'left-menu';
            } elseif ('center-menu' == adeline_get_option_value('menu_alignment', '', 'right-menu')) {
                $classes[] = 'center-menu';
            } elseif ('right-menu' == adeline_get_option_value('menu_alignment', '', 'right-menu')) {
                $classes[] = 'right-menu';
            }
        }
        // Vertical header style
        if ('vertical' == $header_style || 'custom_vertical' == $header_style) {
            // Header shadow
            if (true == adeline_get_option_value('vertical_header_shadow', '', false)) {
                $classes[] = 'has-shadow';
            }
            // Logo position
            $logo_position = adeline_get_option_value('vertical_header_logo_position', '', 'center-logo');
            $classes[]     = $logo_position;
            // Menu alignment
            $v_menu_alignment = adeline_get_option_value('vertical_header_menu_align', '', 'left-menu');
            $classes[]        = $v_menu_alignment;
        }
        // If the search expandable
        if ('expandable_search' == adeline_menu_search_style()) {
            $classes[] = 'expandable-search';
        }
        // If menu links effect
        $link_effect = adeline_get_option_value('menu_effect', '', 'no');
        if ('no' != $link_effect) {
            $classes[] = 'effect-' . $link_effect;
        }
        //Sticky header stuff
        if (true == adeline_get_option_value('sticky_heder_enable', '', false)) {
            $sticky_style = adeline_get_option_value('sticky_header_style', '', 'fixed');
            if ('vertical' == $header_style || 'custom_vertical' == $header_style) {
                $classes[] = 'fixed-scroll';
            }
            // Sticky style
            $shrink_class = '';
            if ('vertical' != $header_style && 'custom_vertical' != $header_style) {
                if ('shrink' == $sticky_style) {
                    $shrink_class = 'shrink-header';
                } else if ('fixed' == $sticky_style) {
                    $shrink_class = 'fixed-header';
                }
            }
            if ('top' != $header_style && true == adeline_get_option_value('top_header_only_menu_sticky', '', false)) {
                $shrink_class = 'fixed-header';
            }
            if ('magazine' != $header_style && true == adeline_get_option_value('magazine_header_only_menu_sticky', '', false)) {
                $shrink_class = 'fixed-header';
            }
            $classes[] = $shrink_class;
            // Sticky only bottom wrapper (for magazine or top header style)
            if ($header_style == 'magazine' && true == adeline_get_option_value('magazine_header_only_menu_sticky', '', false)) {
                $classes[] = 'only-bottom-sticky';
            }
            if ($header_style == 'top' && true == adeline_get_option_value('top_header_only_menu_sticky', '', false)) {
                $classes[] = 'only-bottom-sticky';
            }
            // Full width header
            if (true == adeline_get_option_value('use_fullwidth_sticky_header', '', false)) {
                $classes[] = 'use-full-width-header';
            }
            // Shadow disabled
            if (true == adeline_get_option_value('disable_sticky_header_shadow', '', false)) {
                $classes[] = 'shadow-disabled';
            }
            // Sticky mobile
            if (true == adeline_get_option_value('use_sticky_mobile', '', false)) {
                $classes[] = 'use-sticky-mobile';
            }
        }
        // Clearfix class
        $classes[] = 'clr';
        // Set keys equal to vals
        $classes = array_combine($classes, $classes);
        $classes = apply_filters('adeline_header_classes', $classes);
        // Turn classes into space seperated string
        $classes = implode(' ', $classes);
        // return classes
        return $classes;
    }
}
/**
 * Add classes to the top header style wrap
 *
 * @since 1.0
 */
if (!function_exists('adeline_top_header_classes')) {
    function adeline_top_header_classes()
    {
        // Header style
        $header_style = adeline_header_style();
        // Return if is not the top header style
        if ('top' != $header_style) {
            return;
        }
        // Setup classes array
        $classes = array();
        // Add classes
        $classes[] = 'header-top';
        // Clearfix class
        $classes[] = 'clr';
        // Set keys equal to vals
        $classes = array_combine($classes, $classes);
        $classes = apply_filters('adeline_top_header_classes', $classes);
        // Turn classes into space seperated string
        $classes = implode(' ', $classes);
        // return classes
        return $classes;
    }
}
/**
 * Logo stuff
 *
 * @since 1.0
 */
/**
 * Returns header overlapping style
 *
 * @since 1.0
 */
if (!function_exists('adeline_get_header_overlapping_style')) {
    function adeline_get_header_overlapping_style()
    {
        $style = 'none';
        if (adeline_get_option_value('use_header_overlapping', '', false) == true) {
            if (adeline_get_option_value('overlapping_header_style', '', 'light') != '') {
                $style = adeline_get_option_value('overlapping_header_style', '', 'light');
            }

        }
        // Return overlapping style
        return $style;
    }
}
/**
 * Return correct logo link code with sourceset from logo images URL's
 *
 * @since 1.0
 */
if (!function_exists('adeline_logo_link_code')) {
    function adeline_logo_link_code($logo_url, $retina_logo_url, $class)
    {
        $html = '';
        // Logo data
        $logo_data = array('url' => '', 'width' => '', 'height' => '', 'alt' => '');
        if ($logo_url != '') {
            // Logo url
            $logo_data['url'] = $logo_url;
            // Logo data
            $logo_attachment_data = adeline_get_attachment_data_from_url($logo_url);
            // Get logo data
            if ($logo_attachment_data) {
                $logo_data['width']  = $logo_attachment_data['width'] ?: '181';
                $logo_data['height'] = $logo_attachment_data['height'] ?: '45';
                $logo_data['alt']    = $logo_attachment_data['alt'];
            }
            // Add srcset attr
            if ($retina_logo_url) {
                $srcset = $logo_url . ' 1x, ' . $retina_logo_url . ' 2x';
                $srcset = 'srcset="' . $srcset . '"';
            }
            // Output image
            $html = sprintf('<a href="%1$s" class="custom-logo-link ' . esc_attr($class) . '" rel="home"' . adeline_get_schema_markup('url') . '><img src="%2$s" class="custom-logo" width="%3$s" height="%4$s" alt="%5$s" %6$s /></a>', esc_url(home_url('/')), esc_url($logo_data['url']), esc_attr($logo_data['width'] ?: '181'), esc_attr($logo_data['height'] ?: '45'), esc_attr($logo_data['alt']), $srcset);
        }
        return $html;
    }
}
/**
 * Returns header logo
 *
 * @since 1.0
 */
if (!function_exists('adeline_header_logo')) {
    function adeline_header_logo()
    {
        $html = '';
        // Get logos URL's
        $logo_url                          = adeline_get_option_value('logo_default', 'url', '');
        $retina_logo_url                   = adeline_get_option_value('logo_default_retina', 'url', '');
        $light_overlapping_logo_url        = adeline_get_option_value('logo_overlapping_light', 'url', '');
        $light_overlapping_retina_logo_url = adeline_get_option_value('logo_overlapping_light_retina', 'url', '');
        $dark_overlapping_logo_url         = adeline_get_option_value('logo_overlapping_dark', 'url', '');
        $dark_overlapping_retina_logo_url  = adeline_get_option_value('logo_overlapping_dark_retina', 'url', '');
        $default                           = get_template_directory_uri() . '/assets/img/logo/logo.png';
        $default_retina                    = get_template_directory_uri() . '/assets/img/logo/logox2.png';
        //Light style overlaping
        if ($light_overlapping_logo_url != '') {
            $html .= adeline_logo_link_code($light_overlapping_logo_url, $light_overlapping_retina_logo_url, 'light');
        } elseif ($logo_url != '') {
            $html .= adeline_logo_link_code($logo_url, $retina_logo_url, 'light');
        } else {
            $html .= adeline_logo_link_code($default, $default_retina, 'light');
        }
        //Dark style overlaping
        if ($dark_overlapping_logo_url != '') {
            $html .= adeline_logo_link_code($dark_overlapping_logo_url, $dark_overlapping_retina_logo_url, 'dark');
        } elseif ($logo_url != '') {
            $html .= adeline_logo_link_code($logo_url, $retina_logo_url, 'dark');
        } else {
            $html .= adeline_logo_link_code($default, $default_retina, 'dark');
        }
        //No overlaping logo
        if ($logo_url != '') {
            $html .= adeline_logo_link_code($logo_url, $retina_logo_url, 'default');
        } else {
            $html .= adeline_logo_link_code($default, $default_retina, 'default');
        }
        // Return logo
        return $html;
    }
}
/**
 * Returns mobile header logo
 *
 * @since 1.0
 */
if (!function_exists('adeline_header_mobile_logo')) {
    function adeline_header_mobile_logo()
    {
        $html = '';
        // Get logo
        $logo_url = adeline_get_option_value('logo_mobile', 'url', '');
        // Logo data
        $logo_data = array('url' => '', 'width' => '', 'height' => '', 'alt' => '');
        if ($logo_url) {
            // Logo url
            $logo_data['url'] = $logo_url;
            // Logo data
            $logo_attachment_data = adeline_get_attachment_data_from_url($logo_url);
            // Get logo data
            if ($logo_attachment_data) {
                $logo_data['width']  = $logo_attachment_data['width'];
                $logo_data['height'] = $logo_attachment_data['height'];
                $logo_data['alt']    = $logo_attachment_data['alt'];
            }
            // Output image
            $html = sprintf('<a href="%1$s" class="mobile-logo-link" rel="home"' . adeline_get_schema_markup('url') . '><img src="%2$s" class="mobile-logo" width="%3$s" height="%4$s" alt="%5$s" /></a>', esc_url(home_url('/')), esc_url($logo_data['url']), esc_attr($logo_data['width']), esc_attr($logo_data['height']), esc_attr($logo_data['alt']));
        }
        // Return logo
        return apply_filters('adeline_mobile_logo', $html);
    }
}
/**
 * Echo mobile header logo
 *
 * @since 1.0
 */
if (!function_exists('adeline_print_mobile_logo')) {
    function adeline_print_mobile_logo()
    {
        echo wp_kses_post(adeline_header_mobile_logo());
    }
}
/**
 * Returns sticky header logo
 *
 * @since 1.0
 */
if (!function_exists('adeline_header_sticky_logo')) {
    function adeline_header_sticky_logo()
    {
        // Return false if no logo
        if ('' == adeline_get_option_value('logo_sticky', 'url', '')) {
            return false;
        }
        $html   = '';
        $srcset = '';
        // Get logo
        $logo_url        = adeline_get_option_value('logo_sticky', 'url', '');
        $logo_retina_url = adeline_get_option_value('logo_sticky_retina', 'url', '');
        // Logo data
        $logo_data = array('url' => '', 'width' => '', 'height' => '', 'alt' => '');
        if ('' != $logo_url) {
            // Logo url
            $logo_data['url'] = $logo_url;
            // Logo data
            $logo_attachment_data = adeline_get_attachment_data_from_url($logo_url);
            // Get logo data
            if ($logo_attachment_data) {
                $logo_data['width']  = $logo_attachment_data['width'];
                $logo_data['height'] = $logo_attachment_data['height'];
                // If the logo alt attribute is empty, get the site title and explicitly
                if (!empty($logo_attachment_data['alt'])) {
                    $logo_data['alt'] = $logo_attachment_data['alt'];
                } else {
                    $logo_data['alt'] = get_bloginfo('name', 'display');
                }
            }

            $html = '<a href="' . esc_url(home_url('/')) . '" class="sticky-logo-link" rel="home"' . adeline_get_schema_markup('url') . '><img src="' . esc_url($logo_data['url']) . '" class="custom-logo" width="' . esc_attr($logo_data['width'] ?: '181') . '" height="' . esc_attr($logo_data['height'] ?: '45') . '" srcset="' . $logo_url . ' 1x, ' . $logo_retina_url . ' 2x" alt="' . esc_attr($logo_data['alt']) . '" /></a>';

        }
        // Return logo
        return apply_filters('header_sticky_logo', $html);
    }
}
/**
 * Echo mobile header logo
 *
 * @since 1.0
 */
if (!function_exists('adeline_print_sticky_logo')) {
    function adeline_print_sticky_logo()
    {
        echo wp_kses_post(adeline_header_sticky_logo());
    }
}
/**
 * Returns full screen header logo
 *
 * @since 1.0
 */
if (!function_exists('adeline_header_full_screen_logo')) {
    function adeline_header_full_screen_logo()
    {
        // Return false if disabled
        if ('full_screen' != adeline_header_style()) {
            return false;
        }
        $html = '';
        // Get logo
        $logo_url   = adeline_get_option_value('fullscreen_logo', 'url', '');
        $retina_url = adeline_get_option_value('fullscreen_logo_retina', 'url', '');
        // Logo data
        $logo_data = array('url' => '', 'width' => '', 'height' => '', 'alt' => '');
        if ($logo_url != '') {
            // Logo url
            $logo_data['url'] = $logo_url;
            // Logo data
            $logo_attachment_data = adeline_get_attachment_data_from_url($logo_url);
            // Get logo data
            if ($logo_attachment_data) {
                $logo_data['width']  = $logo_attachment_data['width'];
                $logo_data['height'] = $logo_attachment_data['height'];
                $logo_data['alt']    = $logo_attachment_data['alt'];
            }
            // Add srcset attr
            if ($retina_url) {
                $srcset = $logo_url . ' 1x, ' . $retina_url . ' 2x';
                $srcset = 'srcset="' . $srcset . '"';
            }
            // Output image
            $html = sprintf('<a href="%1$s" class="full-screen-logo-link" rel="home"' . adeline_get_schema_markup('url') . '><img src="%2$s" class="full-screen-logo" width="%3$s" height="%4$s" alt="%5$s" %6$s /></a>', esc_url(home_url('/')), esc_url($logo_data['url']), esc_attr($logo_data['width']), esc_attr($logo_data['height']), esc_attr($logo_data['alt']), $srcset);
        }
        // Return logo
        return apply_filters('adeline_full_screen_header_logo', $html);
    }
}
/**
 * Returns vertical header logo
 *
 * @since 1.0
 */
if (!function_exists('adeline_header_vertical_logo')) {
    function adeline_header_vertical_logo()
    {
        // Return false if disabled
        if ('vertical' != adeline_header_style()) {
            return false;
        }
        $html = '';
        // Get logo
        $logo_url   = adeline_get_option_value('vertical_logo', 'url', '');
        $retina_url = adeline_get_option_value('vertical_logo_retina', 'url', '');
        // Logo data
        $logo_data = array('url' => '', 'width' => '', 'height' => '', 'alt' => '');
        if ($logo_url != '') {
            // Logo url
            $logo_data['url'] = $logo_url;
            // Logo data
            $logo_attachment_data = adeline_get_attachment_data_from_url($logo_url);
            // Get logo data
            if ($logo_attachment_data) {
                $logo_data['width']  = $logo_attachment_data['width'];
                $logo_data['height'] = $logo_attachment_data['height'];
                $logo_data['alt']    = $logo_attachment_data['alt'];
            }
            // Add srcset attr
            if ($retina_url) {
                $srcset = $logo_url . ' 1x, ' . $retina_url . ' 2x';
                $srcset = 'srcset="' . $srcset . '"';
            }
            // Output image
            $html = sprintf('<a href="%1$s" class="full-screen-logo-link" rel="home"' . adeline_get_schema_markup('url') . '><img src="%2$s" class="custom-logo" width="%3$s" height="%4$s" alt="%5$s" %6$s /></a>', esc_url(home_url('/')), esc_url($logo_data['url']), esc_attr($logo_data['width']), esc_attr($logo_data['height']), esc_attr($logo_data['alt']), $srcset);
        }
        // Return logo
        return apply_filters('adeline_vertical_header_logo', $html);
    }
}
/**
 * Returns menu classes
 *
 * @since 1.0
 */
if (!function_exists('adeline_header_menu_classes')) {
    function adeline_header_menu_classes($return)
    {
        // Header style
        $header_style = adeline_header_style();
        // Define classes array
        $classes = array();
        // Return wrapper classes
        if ('wrapper' == $return) {
            // Add special class if the dropdown top border option in the admin is disabled
            if (true != adeline_get_option_value('dropdown_top_border')) {
                $classes[] = 'no-top-border';
            }
            if (true == adeline_get_option_value('dropdown_top_arrow')) {
                $classes[] = 'add-top-arrow';
            }
            // Add clearfix
            $classes[] = 'clr';
            // Set keys equal to vals
            $classes = array_combine($classes, $classes);
            $classes = apply_filters('adeline_header_menu_wrap_classes', $classes);
        }
        // Inner Classes
        elseif ('inner' == $return) {
            // Core
            $classes[] = 'navigation';
            $classes[] = 'main-navigation';
            $classes[] = 'clr';
            // Set keys equal to vals
            $classes = array_combine($classes, $classes);
            $classes = apply_filters('adeline_header_menu_classes', $classes);
        }
        // Return
        if (is_array($classes)) {
            return implode(' ', $classes);
        } else {
            return $return;
        }
    }
}
/**
 * Header logo classes
 *
 * @since 1.0
 */
if (!function_exists('adeline_header_logo_classes')) {
    function adeline_header_logo_classes()
    {
        $header_style = adeline_header_style();
        // Define classes array
        $classes = array('clr');
        // If center header style
        if ('center' == $header_style) {
            $classes[] = 'in-center-header';
        }
        // If mobile logo
        if ('' != adeline_get_option_value('logo_mobile', 'url', '')) {
            $classes[] = 'has-mobile-logo';
        }
        // If has sticky logo
        if ('' != adeline_get_option_value('logo_sticky', 'url', '')) {
            $classes[] = 'has-sticky-logo';
        }
        $classes = apply_filters('adeline_header_logo_classes', $classes);
        // Turn classes into space seperated string
        $classes = implode(' ', $classes);
        // Return classes
        return $classes;
    }
}
/**
 * Returns menu search style
 *
 * @since 1.0
 */
if (!function_exists('adeline_menu_search_style')) {
    function adeline_menu_search_style()
    {
        $style = adeline_get_option_value('menu_search_style', '', 'disabled');
        $style = apply_filters('adeline_menu_search_style', $style);
        // Sanitize output so it's not empty and return
        $style = $style ? $style : 'drop_down';
        // Return style
        return $style;
    }
}
/**
 * Adds the search and eventually logo to the menu items
 *
 * @since 1.0
 */
if (!function_exists('adeline_add_elements_to_menu')) {
    function adeline_add_elements_to_menu($items, $args)
    {
        // Only used on main menu ,centered right menu and custom horizontal menu
        $possible_add_element = false;
        if ($args->theme_location == 'main_menu' || $args->theme_location == 'centered_menu_right' || $args->container_id == 'custom-header-menu') {
            $possible_add_element = true;
        }
        if (!$possible_add_element) {
            return $items;
        }
        // Get search style
        $search_style = adeline_menu_search_style();
        $header_style = adeline_header_style();
        // Return if disabled
        if (!$search_style || 'disabled' == $search_style || 'vertical' == $header_style || 'custom_vertical' == $header_style) {
            return $items;
        }
        // Get search icon class
        if ('drop_down' == $search_style) {
            $class = ' search-dropdown-toggle';
        } elseif ('expandable_search' == $search_style) {
            $class = ' search-expandable-search-toggle';
        } elseif ('full_screen' == $search_style) {
            $class = ' search-fullscreen-toggle';
        } else {
            $class = '';
        }
        //Add logo to full screen menu if enabled
        if ('full_screen' == $header_style) {
            if (true == adeline_get_option_value('fullscreen_custom_logo', '', false)) {
                $items = adeline_header_full_screen_logo() . $items;
            }
        }
        // Add search item to menu
        $items .= '<li class="search-toggle-li">';
        if ('full_screen' == $header_style) {
            if (true == adeline_get_option_value('fullscreen_search_form', '', false)) {
                $items .= '<form method="get" action="' . esc_url(home_url('/')) . '" class="header-searchform">';
                $items .= '<input type="search" name="s" value="" autocomplete="off" />';
                $items .= '<label>' . esc_html__('Type your search', 'adeline') . '<span><i></i><i></i><i></i></span></label>';
                $items .= '</form>';
            }
        } else {
            $items .= '<a href="#" class="site-search-toggle' . $class . '">';
            $items .= '<span class="dpr-icon-magnifier"></span>';
            $items .= '</a>';
        }
        $items .= '</li>';
        // Return nav $items
        return $items;
    }
    add_filter('wp_nav_menu_items', 'adeline_add_elements_to_menu', 11, 2);
}
/**
 * Outputs the search for the top header style
 *
 * @since 1.0
 */
if (!function_exists('adeline_top_header_search')) {
    function adeline_top_header_search()
    {
        // Get header & search style
        $search_style = adeline_menu_search_style();
        // Return if disabled
        if ('top' != adeline_header_style() || !$search_style || 'disabled' == $search_style) {
            return;
        }
        // Get search icon class
        if ('drop_down' == $search_style) {
            $class = ' search-dropdown-toggle';
        } elseif ('expandable_search' == $search_style) {
            $class = ' search-expandable-search-toggle';
        } elseif ('full_screen' == $search_style) {
            $class = ' search-fullscreen-toggle';
        } else {
            $class = '';
        }
        // Add search item to menu
        echo '<div id="search-toggle">';
        echo '<a href="#" class="site-search-toggle' . esc_attr($class) . '">';
        echo '<span class="dpr-icon-magnifier"></span>';
        echo '</a>';
        echo '</div>';
    }
}
/**
 * Returns header search style
 *
 * @since 1.0
 */
if (!function_exists('adeline_menu_cart_style')) {
    function adeline_menu_cart_style()
    {
        // Return if WooCommerce isn't enabled or icon is disabled
        if (!ADELINE_WOOCOMMERCE_ACTIVE || 'disabled' == adeline_get_option_value('menu_cart_display_mode', '', 'icon_count')) {
            return;
        }
        // Get Menu Icon Style
        $style = adeline_get_option_value('menu_cart_style', '', 'drop_down');
        // Return click style for these pages
        if (is_cart() || is_checkout()) {
            $style = 'custom_link';
        }
        $style = apply_filters('adeline_menu_cart_style', $style);
        // Sanitize output so it's not empty
        if ('drop_down' == $style || !$style) {
            $style = 'drop_down';
        }
        // Return style
        return $style;
    }
}
/**
 * Mobile menu style
 *
 * @since 1.0
 */
if (!function_exists('adeline_mobile_menu_style')) {
    function adeline_mobile_menu_style()
    {
        // Get style from theme options settings
        $style = adeline_get_option_value('mobile_menu_style', '', 'sidebar');
        return apply_filters('adeline_mobile_menu_style', $style);
    }
}
/*-------------------------------------------------------------------------------*/
/* 4.Subheader

/*-------------------------------------------------------------------------------*/
/**
 * Subheader template
 *
 * @since 1.0
 */
if (!function_exists('adeline_subheader_template')) {
    function adeline_subheader_template()
    {
        get_template_part('template-parts/subheader/layout');
    }
    add_action('adeline_subheader', 'adeline_subheader_template');
}
/**
 * Checks if the subheader is enabled
 *
 * @since 1.0
 */
if (!function_exists('adeline_has_subheader')) {
    function adeline_has_subheader()
    {
        // Define vars
        $return = true;

        $woocommerce_page = $tribe_page = false;
        if (function_exists('is_woocommerce')) {
            if (is_woocommerce()) {
                $woocommerce_page = true;
            }

        }
        if (ADELINE_TRIBE_ACTIVE) {
            if (tribe_is_event_query()) {
                $tribe_page = true;
            }
        }
        // Check if subheader style is set to hidden
        if (!$woocommerce_page && !$tribe_page) {
            if (!true == adeline_get_option_value('subheader_display') || adeline_get_meta_value(get_the_ID(), 'subheader_display', true) != true || is_page_template('page-templates/landing.php')) {
                $return = false;
            }
        }
        if ($woocommerce_page) {
            if (!true == adeline_get_option_value('woo_subheader_display')) {
                $return = false;
            }
        }
        if ($tribe_page) {
            if (!true == adeline_get_option_value('tribe_subheader_display')) {
                $return = false;
            }
        }
        if (!ADELINE_EXT_ACTIVE) {
            $return = true;
        }
        if (is_singular('proof_gallery')) {

            if (!true == adeline_get_option_value('proof_gallery_subheader_display')) {
                $return = false;
            } else {
                $return = true;
            }
        }
        return apply_filters('adeline_display_subheader', $return);
    }
}
/**
 * Checks if the subheader subtitle is enabled
 *
 * @since 1.0
 */
if (!function_exists('adeline_has_subheader_subtitle')) {
    function adeline_has_subheader_subtitle()
    {
        // Define vars
        $return = true;
        return apply_filters('adeline_display_subheader_subtitle', $return);
    }
}
/**
 * Return the title
 *
 * @since 1.0
 */
if (!function_exists('adeline_title')) {
    function adeline_title()
    {
        // Default title is null
        $title = null;
        // Get post ID
        $post_id = adeline_post_id();
        // Homepage - display blog description if not a static page
        if (is_front_page() && !is_singular('page')) {
            if (get_bloginfo('description')) {
                $title = get_bloginfo('description');
            } else {
                return esc_html__('Recent Posts', 'adeline');
            }
            // Homepage posts page

        } elseif (is_home() && !is_singular('page')) {
            $title = get_the_title(get_option('page_for_posts', true));
        }
        // Search needs to go before archives
        elseif (is_search()) {
            global $wp_query;
            $title = '<span id="search-results-count">' . $wp_query->found_posts . '</span> ' . esc_html__('Search Results Found', 'adeline');
        }
        // Archives
        elseif (is_archive()) {
            // Author
            if (is_author()) {
                $title = get_the_archive_title();
            }
            // Post Type archive title
            elseif (is_post_type_archive()) {
                if (is_post_type_archive('product')) {
                    $title = adeline_get_option_value('woo_shop_page_title', '', 'Shop');
                } elseif (is_post_type_archive('tribe_events')) {
                    $title = adeline_get_option_value('tribe_calendar_page_title', '', 'Events');
                } else {
                    $title = post_type_archive_title('', false);
                }
            }
            // Daily archive title
            elseif (is_day()) {
                $title = sprintf(esc_html__('Daily Archives: %s', 'adeline'), get_the_date());
            }
            // Monthly archive title
            elseif (is_month()) {
                $title = sprintf(esc_html__('Monthly Archives: %s', 'adeline'), get_the_date(esc_html_x('F Y', 'Page title monthly archives date format', 'adeline')));
            }
            // Yearly archive title
            elseif (is_year()) {
                $title = sprintf(esc_html__('Yearly Archives: %s', 'adeline'), get_the_date(esc_html_x('Y', 'Page title yearly archives date format', 'adeline')));
            }
            // Categories/Tags/Other
            else {
                    // Get term title
                    $title = single_term_title('', false);
                    // Fix for plugins that are archives but use pages
                    if (!$title) {
                        global $post;
                        $title = get_the_title($post_id);
                    }
                }
            } // End is archive check
            // 404 Page
        elseif (is_404()) {
            $title = esc_html__('404: Page Not Found', 'adeline');
        } elseif (is_singular('tribe_events') || is_singular('tribe_venue') || is_singular('tribe_organizer')) {
            if (adeline_get_option_value('subheader_alternative_title', '', '') != '') {
                $title = adeline_get_option_value('subheader_alternative_title', '', '');
            } else {
                global $wp_query;
                $postID = $wp_query->post->ID;
                $title  = get_the_title($postID);
            }
        }
        // Proof Gallery
        elseif (is_singular('proof_gallery')) {
            $proof_title = get_post_meta(get_the_ID(), '_dprproof_subheader_title', true);
            if ($proof_title != '') {
                $title = wp_kses($proof_title, 'styled_text');
            }

        } // Anything else with a post_id defined
        elseif ($post_id) {
            // Single Pages
            if (is_singular('page') || is_singular('attachment') || is_singular('post')) {
                if (adeline_get_option_value('subheader_alternative_title', '', '') != '') {
                    $title = adeline_get_option_value('subheader_alternative_title', '', '');
                } else {
                    $title = get_the_title($post_id);
                }
            }
            // Single product
            elseif (is_singular('product')) {
                if (!adeline_get_option_value('woo_product_display_title_in_subheader', '', false)) {
                    $title = adeline_get_option_value('woo_shop_page_title', '', 'Shop');
                } else {
                    $title = get_the_title();
                }
            }
            // Single blog posts
            elseif (is_singular('post')) {
                if ('post-title' == adeline_get_option_value('blog_single_subheader_title', '', 'blog')) {
                    $title = get_the_title();
                } else {
                    $title = esc_html__('Blog', 'adeline');
                }
            }
            // Other posts
            else {
                    $title = get_the_title($post_id);
                }
            }
            // Last check if title is empty
            $title = $title ? $title : get_the_title();
            return apply_filters('adeline_title', $title);
        }
    }
/**
 * Returns subheader subtitle
 *
 * @since 1.0
 */
    if (!function_exists('adeline_get_subheader_subtitle')) {
        function adeline_get_subheader_subtitle()
    {
            // Subtitle is NULL by default
            $subtitle = null;
            // If set subtitle in theme options
            if (adeline_get_option_value('subheader_subtitle') != '') {
                $subtitle = wp_kses(adeline_get_option_value('subheader_subtitle'), 'styled_text');
            }

            // Search
            if (is_search()) {
                $subtitle = esc_html__('You searched for:', 'adeline') . ' &quot;' . esc_html(get_search_query(false)) . '&quot;';
            }
            // Author
        elseif (is_author()) {
            $subtitle = esc_html__('This author has written', 'adeline') . ' ' . get_the_author_posts() . ' ' . esc_html__('articles', 'adeline');
        } elseif (is_singular('tribe_events') || is_singular('tribe_venue') || is_singular('tribe_organizer')) {
            if (adeline_get_option_value('subheader_subtitle') != '') {
                $subtitle = wp_kses(adeline_get_option_value('subheader_subtitle'), 'styled_text');
            } else {
                $subtitle = adeline_get_option_value('tribe_calendar_page_subtitle', '', '');
            }
        }
        // Proof Gallery
        elseif (is_singular('proof_gallery')) {
            $proof_subtitle = get_post_meta(get_the_ID(), '_dprproof_subheader_subtitle', true);
            if ($proof_subtitle != '') {
                $subtitle = wp_kses($proof_subtitle, 'styled_text');
            }

        }
        // Archives
        elseif (is_post_type_archive()) {
            if (is_post_type_archive('product')) {
                $subtitle = adeline_get_option_value('woo_shop_page_subtitle', '', '');
            } elseif (is_post_type_archive('tribe_events')) {
                $subtitle = adeline_get_option_value('tribe_calendar_page_subtitle', '', '');
            } else {
                $subtitle = get_the_archive_description();
            }
        }
        // All other Taxonomies
        elseif (is_tax()) {
            //$subtitle = term_description();
        }
        return apply_filters('adeline_post_subtitle', $subtitle);
    }
}
/**
 * Display breadcrumbs
 *
 * @since 1.0
 */
if (!function_exists('adeline_has_breadcrumbs')) {
    function adeline_has_breadcrumbs()
    {
        // Return true by default
        $return = true;
        // Return false if disabled via Customizer
        if (true != adeline_get_option_value('breadcrumb_display')) {
            $return = false;
        }
        if (function_exists('is_woocommerce')) {
            if (is_woocommerce() && true != adeline_get_option_value('woo_breadcrumb_display')) {
                $return = false;
            }
        }
        return apply_filters('adeline_display_breadcrumbs', $return);
    }
}
/**
 * Display subheader overlay
 *
 * @since 1.0
 */
if (!function_exists('adeline_subheader_overlay')) {
    function adeline_subheader_overlay()
    {
        // Define return
        $return  = '';
        $display = adeline_get_option_value('subheader_overlay', '', false);
        if (true == adeline_get_option_value('subheader_overlay')) {
            $display = true;
        }
        if (function_exists('is_woocommerce')) {
            if (is_woocommerce()) {
                $display = adeline_get_option_value('woo_subheader_overlay', '', false);
            }
        }
        if (is_singular('mp-column') || is_singular('mp-event')) {
            $display = adeline_get_option_value('mp_event_subheader_overlay', '', false);
        }
        if (ADELINE_TRIBE_ACTIVE) {
            if (tribe_is_event_query()) {
                $display = adeline_get_option_value('tribe_subheader_overlay', '', false);
            }
        }
        if (is_singular('proof_gallery')) {
            $display = adeline_get_option_value('proof_gallery_subheader_overlay', '', false);
        }
        if ($display == true) {
            // Return overlay element
            $return = '<span class="subheader-overlay"></span>';
            $return = apply_filters('adeline_subheader_overlay', $return);
            // Return
            echo wp_kses($return, 'styled_text');
        }
    }
}
/*-------------------------------------------------------------------------------*/
/* 5.Blog

/*-------------------------------------------------------------------------------*/
/**
 * Adds post classes
 *
 * @since 1.0
 */
if (!function_exists('adeline_blog_wrap_classes')) {
    function adeline_blog_wrap_classes($classes = null)
    {
        // Return custom class if set
        if ($classes) {
            return $classes;
        }
        // Admin defaults
        $style   = adeline_blog_style();
        $classes = array('entries', 'clr');
        // Isotope classes
        if ($style == 'posts-grid') {
            $classes[] = 'dpr-adeline-row';
            if ('masonry' == adeline_blog_grid_style()) {
                $classes[] = 'blog-masonry-grid';
            } else {
                if ('infinite_scroll' == adeline_blog_pagination_type()) {
                    $classes[] = 'blog-masonry-grid';
                } else {
                    $classes[] = 'blog-grid';
                }
            }
        }
        // Equal heights
        if (adeline_blog_items_equal_heights()) {
            $classes[] = 'blog-equal-heights';
        }
        // Infinite scroll class
        if ('infinite_scroll' == adeline_blog_pagination_type() || 'load_more' == adeline_blog_pagination_type()) {
            $classes[] = 'infinite-scroll-wrapper';
        }
        // Add filter for child theming
        $classes = apply_filters('adeline_blog_wrap_classes', $classes);
        // Turn classes into space seperated string
        if (is_array($classes)) {
            $classes = implode(' ', $classes);
        }
        // Echo classes
        echo esc_attr($classes);
    }
}
/**
 * Adds item classes
 *
 * @since 1.0
 */
if (!function_exists('adeline_post_item_classes')) {
    function adeline_post_item_classes()
    {
        // Define classes array
        $classes = array();
        // Blog Style
        $entry_style = adeline_blog_style();
        // Core classes
        $classes[] = 'blog-item';
        $classes[] = 'clr';
        // Masonry classes
        if ('masonry' == adeline_blog_grid_style()) {
            $classes[] = 'isotope-entry';
        }
        // Add columns for grid style entries
        if ($entry_style == 'posts-grid') {
            $classes[] = 'col';
            $classes[] = adeline_grid_class(adeline_blog_columns());
        }
        // No Featured Image Class, don't add if oembed or self hosted meta are defined
        if (!has_post_thumbnail() && '' == get_post_meta(get_the_ID(), 'dpr_post_self_hosted_shortcode', true) && '' == get_post_meta(get_the_ID(), 'dpr_post_oembed', true)) {
            $classes[] = 'no-featured-image';
        }
        // Infinite  && load more class
        if ('infinite_scroll' == adeline_blog_pagination_type() || 'load_more' == adeline_blog_pagination_type()) {
            $classes[] = 'item-entry';
        }
        // Blog item style
        $classes[] = $entry_style;
        $classes[] = 'entry-style-' . adeline_get_option_value('blog_entry_style', '', 'simple');
        // Counter
        global $dpr_adeline_count;
        if ($dpr_adeline_count) {
            $classes[] = 'col-' . $dpr_adeline_count;
        }
        $classes = apply_filters('adeline_blog_item_classes', $classes);
        // Rturn classes array
        return $classes;
    }
}
/**
 * Check item odd
 *
 * @since 1.0
 */
if (!function_exists('adeline_check_item_odd')) {
    function adeline_check_item_odd()
    {
        global $dpr_adeline_total_count;
        if ($dpr_adeline_total_count % 2 == 0) {
            $odd = true;
        } else {
            $odd = false;
        }
        // Rturn classes array
        return $odd;
    }
}
/**
 * Returns style for the blog based on the theme options
 *
 * @since 1.0
 */
if (!function_exists('adeline_blog_style')) {
    function adeline_blog_style()
    {
        // Get default style from Customizer
        $style = adeline_get_option_value('blog_style', '', 'large-image');
        // Sanitize
        $style = $style ? $style : 'large-image';
        $style = apply_filters('adeline_blog_style', $style);
        // Return style
        return $style;
    }
}
/**
 * Returns images size
 *
 * @since 1.0
 */
if (!function_exists('adeline_blog_images_size')) {
    function adeline_blog_images_size()
    {
        // Get default size from Customizer
        $size = adeline_get_option_value('blog_grid_images_size', '', 'medium');
        // Sanitize
        $size = $size ? $size : 'medium';
        $size = apply_filters('adeline_blog_images_size', $size);
        // Return size
        return $size;
    }
}
/**
 * Returns the grid style
 *
 * @since 1.0
 */
if (!function_exists('adeline_blog_grid_style')) {
    function adeline_blog_grid_style()
    {
        // Get default style from Customizer
        $style = adeline_get_option_value('blog_grid_style', '', 'fit-rows');
        // Sanitize
        $style = $style ? $style : 'fit-rows';
        $style = apply_filters('adeline_blog_grid_style', $style);
        // Return style
        return $style;
    }
}
/**
 * Checks if it's a fit-rows style grid
 *
 * @since 1.0
 */
if (!function_exists('adeline_blog_fit_rows')) {
    function adeline_blog_fit_rows()
    {
        // Return false by default
        $return = false;
        // Get current blog style
        if ('posts-grid' == adeline_blog_style()) {
            $return = true;
        } else {
            $return = false;
        }
        $return = apply_filters('adeline_blog_fit_rows', $return);
        // Return bool
        return $return;
    }
}
/**
 * Checks if the blog entries should have equal heights
 *
 * @since 1.0
 */
if (!function_exists('adeline_blog_items_equal_heights')) {
    function adeline_blog_items_equal_heights()
    {
        if (!adeline_get_option_value('blog_grid_equal_heights')) {
            return false;
        }
        $blog_style = adeline_blog_style();
        if ('posts-grid' == $blog_style && 'masonry' != adeline_blog_grid_style()) {
            return true;
        }
    }
}
/**
 * Returns columns for the blog entries
 *
 * @since 1.0
 */
if (!function_exists('adeline_blog_columns')) {
    function adeline_blog_columns()
    {
        // Get columns from theme options settings
        $columns = adeline_get_option_value('blog_grid_columns', '', '3');
        // Sanitize
        $columns = $columns ? $columns : '32';
        $columns = apply_filters('adeline_blog_columns', $columns);
        // Return columns
        return $columns;
    }
}
/**
 * Retrieve attachment IDs
 *
 * @since 1.0
 */
if (!function_exists('adeline_get_gallery_ids')) {
    function adeline_get_gallery_ids($post_id = '')
    {
        $post_id        = $post_id ? $post_id : get_the_ID();
        $attachment_ids = adeline_get_meta_value($post_id, 'galery_post_images', '');
        if (is_array($attachment_ids)) {
            $attachment_ids = array_keys($attachment_ids);
        }

        if ($attachment_ids) {
            return $attachment_ids;
        }
    }
}
/**
 * Retrieve attachment data
 *
 * @since 1.0
 */
if (!function_exists('adeline_get_attachment')) {
    function adeline_get_attachment($id)
    {
        $attachment = get_post($id);
        return array('alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true), 'caption' => $attachment->post_excerpt, 'description' => $attachment->post_content, 'href' => get_permalink($attachment->ID), 'src' => $attachment->guid, 'title' => $attachment->post_title);
    }
}
/**
 * Custom excerpts based on wp_trim_words
 *
 * @since    1.0
 * @link    http://codex.wordpress.org/Function_Reference/wp_trim_words
 */
if (!function_exists('adeline_excerpt')) {
    function adeline_excerpt($length = 30)
    {
        // Get global post
        global $post;
        // Get post data
        $id      = $post->ID;
        $excerpt = $post->post_excerpt;
        $content = $post->post_content;
        // Display custom excerpt
        if ($excerpt) {
            $output = $excerpt;
        }
        // Check for more tag
        elseif (strpos($content, '<!--more-->')) {
            $output = get_the_content($excerpt);
        }
        // Generate auto excerpt
        else {
                $output = wp_trim_words(strip_shortcodes(get_the_content($id)), $length);
            }
            // Echo output
            echo wp_kses_post($output);
        }
    }
/**
 * Returns post video
 *
 * @since 1.0
 */
    if (!function_exists('adeline_get_post_video')) {
        function adeline_get_post_video($post_id = '')
    {
            // Define video variable
            $video = '';
            // Get ID
            $post_id = $post_id ? $post_id : get_the_ID();
            // Embed video URL
            if (adeline_get_meta_value(get_the_ID(), 'video_post_oembed_video_url', '') != '') {
                $video = adeline_get_meta_value(get_the_ID(), 'video_post_oembed_video_url', '');
                return apply_filters('adeline_get_post_video', $video);
            }
            // Check for oembed code
            if (adeline_get_meta_value(get_the_ID(), 'video_post_embeded_code', '') != '') {
                $video = adeline_get_meta_value(get_the_ID(), 'video_post_embeded_code');
                return apply_filters('adeline_get_post_video', $video);
            }
            // Check for self-hosted
            if (adeline_get_meta_value(get_the_ID(), 'video_post_self_hosted_video_url', '') != '') {
                $video = adeline_get_meta_value(get_the_ID(), 'video_post_self_hosted_video_url', '');
                $video = $video['url'];
                return apply_filters('adeline_get_post_video', $video);
            }
        }
    }
/**
 * Returns post video HTML
 *
 * @since 1.0
 */
    if (!function_exists('adeline_get_post_video_html')) {
        function adeline_get_post_video_html($video = '')
    {
            // Check post format and return if not video
            if ('post' == get_post_type() && 'video' != get_post_format()) {
                return;
            }
            // Get video from metabox
            $video = $video ? $video : adeline_get_post_video();
            if (!empty($video)) {
                // Get oembed code and return
                if (!is_wp_error($oembed = wp_oembed_get($video)) && $oembed) {
                    return '<div class="responsive-video-wrapper">' . $oembed . '</div>';
                }
                // Display using apply_filters if it's self-hosted
            else {
                    $video = apply_filters('the_content', $video);
                    // Add responsive video wrap for youtube/vimeo embeds
                    if (strpos($video, 'youtube') || strpos($video, 'vimeo')) {
                        return '<div class="responsive-video-wrapper">' . $video . '</div>';
                    }
                    // Else return without responsive wrap
                else {
                        return $video;
                    }
                }
            }
            // If video from meta box is empty and not single post view try find video in post content
        else {
                if (!is_single()) {
                    $embedes_video = false;
                    $content       = apply_filters('the_content', get_the_content(get_the_ID()));
                    // Only get video from the content if a playlist isn't present.
                    if (false === strpos($content, 'wp-playlist-script')) {
                        $embedes_video = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe'));
                    }
                    // If are embedes video return first embed video.
                    if (!empty($embedes_video)) {
                        return '<div class="responsive-video-wrapper">' . $embedes_video[0] . '</div>';
                    }
                }
            }
        }
    }
/**
 * Returns post audio
 *
 * @since 1.0
 */
    if (!function_exists('adeline_get_post_audio_html')) {
        function adeline_get_post_audio_html($audio = '')
    {
            // Get audio from metabox
            $audio = '';
            // Embed audio URL
            if (adeline_get_meta_value(get_the_ID(), 'audio_post_oembed_audio_url', '') != '') {
                $audio = adeline_get_meta_value(get_the_ID(), 'audio_post_oembed_audio_url', '');
            }
            // Check for oembed code
            if (!empty(adeline_get_meta_value(get_the_ID(), 'audio_post_embed_code'))) {
                $audio = adeline_get_meta_value(get_the_ID(), 'audio_post_embed_code');
            }
            // Check for self-hosted
            $self_hosted = adeline_get_meta_value(get_the_ID(), 'audio_post_self_hosted_audio_url');
            $self_hosted = $self_hosted['url'];
            if (!empty($self_hosted)) {
                $audio = $self_hosted;
            }
            if (!empty($audio)) {
                // Get oembed code and return
                if (!is_wp_error($oembed = wp_oembed_get($audio)) && $oembed) {
                    return '<div class="responsive-video-wrapper">' . $oembed . '</div>';
                }
                // Display using apply_filters if it's self-hosted
            else {
                    $audio = apply_filters('the_content', $audio);
                    // Add responsive audio wrap for youtube/vimeo embeds
                    if (strpos($audio, 'youtube') || strpos($audio, 'vimeo')) {
                        return '<div class="responsive-video-wrapper">' . $audio . '</div>';
                    }
                    // Else return without responsive wrap
                else {
                        return $audio;
                    }
                }
            }
        }
    }
/**
 * Returns blog item elements positioning
 *
 * @since 1.0
 */
    if (!function_exists('adeline_blog_item_elements')) {
        function adeline_blog_item_elements()
    {
            // Get elements from template options
            $elements = adeline_get_option_value('blog_item_elements', 'enabled');
            if (is_array($elements)) {
                $elements = array_keys($elements);
            }
            // Default elements if no theme options elements settings
            if (empty($elements)) {
                $elements = array('featured_image', 'meta', 'title', 'content', 'read_more');
            }
            $elements = apply_filters('adeline_blog_item_elements', $elements);
            // Return sections
            return $elements;
        }
    }
/**
 * Returns blog item meta
 *
 * @since 1.0
 */
    if (!function_exists('adeline_blog_item_meta')) {
        function adeline_blog_item_meta()
    {
            // Get elements from template options
            $elements = adeline_get_option_value('blog_item_meta', 'enabled');
            if (is_array($elements)) {
                $elements = array_keys($elements);
            }
            // Default elements if no theme options elements settings
            if (empty($elements)) {
                $elements = array('author', 'date', 'category', 'comments');
            }
            $elements = apply_filters('adeline_blog_item_meta', $elements);
            // Return sections
            return $elements;
        }
    }
/**
 * Returns single post elements positioning
 *
 * @since 1.0
 */
    if (!function_exists('adeline_single_post_elements')) {
        function adeline_single_post_elements()
    {
            // Get elements from template options
            $elements = adeline_get_option_value('blog_single_elements', 'enabled');
            if (is_array($elements)) {
                $elements = array_keys($elements);
            }
            // Default elements if no theme options elements settings
            if (empty($elements)) {
                $elements = array('featured_image', 'title', 'meta', 'content', 'tags', 'social_share', 'author_info', 'related', 'comments');
            }
            $elements = apply_filters('adeline_blog_single_elements', $elements);
            // Return sections
            return $elements;
        }
    }
/**
 * Returns blog single meta
 *
 * @since 1.0
 */
    if (!function_exists('adeline_blog_single_meta')) {
        function adeline_blog_single_meta()
    {
            // Get elements from template options
            $elements = adeline_get_option_value('blog_single_meta', 'enabled');
            if (is_array($elements)) {
                $elements = array_keys($elements);
            }
            // Default elements if no theme options elements settings
            if (empty($elements)) {
                $elements = array('author', 'date', 'category', 'comments');
            }
            $elements = apply_filters('adeline_blog_single_meta', $elements);
            // Return sections
            return $elements;
        }
    }
/**
 * Returns products sharing buttons
 *
 * @since 1.0
 */
    if (!function_exists('adeline_woo_social_networks')) {
        function adeline_woo_social_networks()
    {
            // Get elements from template options
            $networks = adeline_get_option_value('woo_sharing_buttons', 'enabled');
            if (is_array($networks)) {
                $networks = array_keys($networks);
            }
            // Default elements if no theme options elements settings
            if (empty($networks)) {

                $networks = array('twitter', 'facebook', 'google_plus', 'pinterest', 'linkedin', 'blogger', 'buffer', 'viber', 'vk', 'reddit', 'stumbleupon', 'newsvine', 'delicious', 'evernote', 'digg', 'livejournal', 'tumblr', 'viadeo', 'odnoklassniki');

            }
            $networks = apply_filters('adeline_woo_sharing_buttons', $networks);
            // Return sections
            return $networks;
        }
    }
/**
 * Returns single post sharing buttons
 *
 * @since 1.0
 */
    if (!function_exists('adeline_social_networks')) {
        function adeline_social_networks()
    {
            // Get elements from template options
            $networks = adeline_get_option_value('sharing_buttons', 'enabled');
            if (is_array($networks)) {
                $networks = array_keys($networks);
            }
            // Default elements if no theme options elements settings
            if (empty($networks)) {
                $networks = array('twitter', 'facebook', 'google_plus', 'pinterest', 'linkedin', 'blogger', 'buffer', 'viber', 'vk', 'reddit', 'stumbleupon', 'newsvine', 'delicious', 'evernote', 'digg', 'livejournal', 'tumblr', 'viadeo', 'odnoklassniki');

            }
            $networks = apply_filters('adeline_sharing_buttons', $networks);
            // Return sections
            return $networks;
        }
    }
/**
 * Comments and pingbacks
 *
 * @since 1.0
 */
    if (!function_exists('adeline_comment')) {
        function adeline_comment($comment, $args, $depth)
    {
            switch ($comment->comment_type):
        case 'pingback':
        case 'trackback':
            // Display trackbacks differently than normal comments.

            ?>

                                    <li <?php comment_class();?> id="comment-<?php comment_ID();?>">
                                      <article id="comment-<?php comment_ID();?>" class="comment-container">
                                        <p>
                                          <?php esc_html_e('Pingback:', 'adeline');?>
                                          <span><span<?php adeline_schema_markup('author_name');?>>
                                          <?php comment_author_link();?>
                                          </span></span>
                                          <?php edit_comment_link(esc_html__('(Edit)', 'adeline'), '<span class="edit-link">', '</span>');?>
                                        </p>
                                      </article>
                                      <?php
    break;
        default:
            // Proceed with normal comments.
            global $post;
            ?>
                                    <li id="comment-<?php comment_ID();?>" class="comment-container">
                                      <article <?php comment_class('comment-body');?>> <?php echo get_avatar($comment, apply_filters('adeline_comment_avatar_size', 150)); ?>
                                        <div class="comment-content">
                                          <div class="comment-author">
                                            <h3 class="comment-link"><?php printf(esc_html__('%s ', 'adeline'), sprintf('%s', get_comment_author_link()));?></h3>
                                            <span class="comment-meta commentmetadata">
                                            <?php if (!is_rtl()) {?>
                                            <span class="comment-date">
                                            <?php comment_date('j M Y');?>
                                            </span>
                                            <?php
    }?>
                                            <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));?>
                                            <?php edit_comment_link(__('edit', 'adeline'));?>
                                            <?php if (is_rtl()) {?>
                                            <span class="comment-date">
                                            <?php comment_date('j M Y');?>
                                            </span>
                                            <?php
    }?>
                                            </span> </div>
                                          <div class="clr"></div>
                                          <div class="comment-entry">
                                            <?php if ('0' == $comment->comment_approved): ?>
                                            <p class="comment-awaiting-moderation">
                                              <?php esc_html_e('Your comment is awaiting moderation.', 'adeline');?>
                                            </p>
                                            <?php
endif;?>
        <div class="comment-content">
          <?php comment_text();?>
        </div>
      </div>
    </div>
  </article>
  <!-- #comment-## -->

  <?php
break;
        endswitch; // end comment_type check

    }
}
/**
 * Get get current page url
 *
 * @since   1.0.0
 * @return  string
 */
if (!function_exists('adeline_get_current_url')) {
    function adeline_get_current_url()
    {
        global $wp;
        $current_url = home_url(add_query_arg(array(), $wp->request));
        return $current_url;
    }
}
/**
 * Numbered Pagination
 *
 * @since    1.0
 * @link    https://codex.wordpress.org/Function_Reference/paginate_links
 */
if (!function_exists('adeline_pagination')) {
    function adeline_pagination($query = '', $echo = true)
    {
        // Arrows
        $prev_arrow = is_rtl() ? 'dpr-icon-angle-right' : 'dpr-icon-angle-left';
        $next_arrow = is_rtl() ? 'dpr-icon-angle-left' : 'dpr-icon-angle-right';
        // Get global $query
        if (!$query) {
            global $wp_query;
            $query = $wp_query;
        }
        // Set vars
        $total = $query->max_num_pages;
        $big   = 999999999;
        // Display pagination if total var is greater then 1 ( current query is paginated )
        if ($total > 1) {
            // Get current page
            if ($current_page = get_query_var('paged')) {
                $current_page = $current_page;
            } elseif ($current_page = get_query_var('page')) {
                $current_page = $current_page;
            } else {
                $current_page = 1;
            }
            // Get permalink structure
            if (get_option('permalink_structure')) {
                if (is_page()) {
                    $format = 'page/%#%/';
                } else {
                    $format = '/%#%/';
                }
            } else {
                $format = '&paged=%#%';
            }
            $args     = apply_filters('adeline_pagination_args', array('base' => str_replace($big, '%#%', html_entity_decode(get_pagenum_link($big))), 'format' => $format, 'current' => max(1, $current_page), 'total' => $total, 'mid_size' => 3, 'type' => 'list', 'prev_text' => '<i class="' . $prev_arrow . '"></i>', 'next_text' => '<i class="' . $next_arrow . '"></i>'));
            $align    = adeline_get_option_value('pagination_align');
            $align    = $align ? $align : 'left';
            $addclass = '';
            if (adeline_get_option_value('pagination_shape') == 'round') {
                $addclass .= ' round';
            }

            if (adeline_get_option_value('pagination_shadowed')) {
                $addclass .= ' shadowed';
            }

            // Output pagination
            if ($echo) {
                echo '<div class="dpr-adeline-pagination clr dpr-adeline-' . esc_attr($align) . esc_attr($addclass) . '">' . wp_kses_post(paginate_links($args)) . '</div>';
            } else {
                return '<div class="dpr-adeline-pagination clr dpr-adeline-' . esc_attr($align) . esc_attr($addclass) . '">' . wp_kses_post(paginate_links($args)) . '</div>';
            }
        }
    }
}
/**
 * Next and previous pagination
 *
 * @since    1.0
 */
if (!function_exists('adeline_next_prev')) {
    function adeline_next_prev($pages = '', $range = 4, $echo = true)
    {
        // Vars
        global $wp_query;
        $output = '';
        // Display next/previous pagination
        if ($wp_query->max_num_pages > 1) {
            $output .= '<div class="page-jump clr">';
            $output .= '<div class="alignleft newer-posts">';
            $output .= get_previous_posts_link('<i class="dpr-icon-angle-double-left"></i> ' . esc_html__('Newer Posts', 'adeline'));
            $output .= '</div>';
            $output .= '<div class="alignright older-posts">';
            $output .= get_next_posts_link(esc_html__('Older Posts', 'adeline') . ' <i class="dpr-icon-angle-double-right"></i>');
            $output .= '</div>';
            $output .= '</div>';
            if ($echo) {
                echo wp_kses_post($output);
            } else {
                return $output;
            }
        }
    }
}
/**
 * Infinite Scroll Pagination
 *
 * @since 1.0
 */
if (!function_exists('adeline_infinite_scroll')) {
    function adeline_infinite_scroll($type = 'standard')
    {
        // Load infinite scroll script
        wp_enqueue_script('infinitescroll');
        // Last text
        $last = adeline_get_option_value('blog_pagination_infinite_scroll_last_text', '', esc_html__('End of content', 'adeline'));
        //$last = adeline_theme_opt_translation( 'dpr_blog_infinite_scroll_last_text', $last );
        $last = $last ? $last : esc_html__('End of content', 'adeline');
        // Error text
        $error = adeline_get_option_value('blog_pagination_infinite_scroll_error_text', '', esc_html__('No more pages to load', 'adeline'));
        //$error = adeline_theme_opt_translation( 'dpr_blog_infinite_scroll_error_text', $error );
        $error = $error ? $error : esc_html__('No more pages to load', 'adeline');
        // Output pagination HTML
        $output = '';
        $output .= '<div class="scroller-status">';
        $output .= '<div class="loader-ellips infinite-scroll-request">';
        $output .= '<span class="loader-ellips__dot"></span>';
        $output .= '<span class="loader-ellips__dot"></span>';
        $output .= '<span class="loader-ellips__dot"></span>';
        $output .= '<span class="loader-ellips__dot"></span>';
        $output .= '</div>';
        $output .= '<p class="scroller-status__message infinite-scroll-last">' . $last . '</p>';
        $output .= '<p class="scroller-status__message infinite-scroll-error">' . $error . '</p>';
        $output .= '</div>';
        $output .= '<div class="infinite-scroll-nav clr">';
        $output .= '<div class="alignleft newer-posts">' . get_previous_posts_link('<i class="dpr-icon-angle-double-left"></i> ' . esc_html__('Newer Posts', 'adeline')) . '</div>';
        $output .= '<div class="alignright older-posts">' . get_next_posts_link(esc_html__('Older Posts', 'adeline') . ' <i class="dpr-icon-angle-double-right"></i>') . '</div>';
        $output .= '</div>';
        echo wp_kses_post($output);
    }
}
/**
 * Load More Pagination
 *
 * @since 1.0
 */
if (!function_exists('adeline_load_more')) {
    function adeline_load_more()
    {
        global $wp_query;
        // Load load more script
        wp_enqueue_script('infinitescroll');
        $button_text = adeline_get_option_value('blog_pagination_loadmore_button_text', '', esc_html__('Load More Posts', 'adeline'));
        $nomore_text = adeline_get_option_value('blog_pagination_loadmore_nomore_text', '', esc_html__('No more posts to load', 'adeline'));
        $last        = adeline_get_option_value('blog_pagination_loadmore_nomore_text', '', esc_html__('End of content', 'adeline'));
        $last        = $last ? $last : esc_html__('End of content', 'adeline');
        // Error text
        $error  = adeline_get_option_value('blog_pagination_loadmore_nomore_text', '', esc_html__('No more pages to load', 'adeline'));
        $error  = $error ? $error : esc_html__('No more pages to load', 'adeline');
        $output = '';
        $output .= '<div class="scroller-status">';
        $output .= '<div class="loader-ellips infinite-scroll-request">';
        $output .= '<span class="loader-ellips__dot"></span>';
        $output .= '<span class="loader-ellips__dot"></span>';
        $output .= '<span class="loader-ellips__dot"></span>';
        $output .= '<span class="loader-ellips__dot"></span>';
        $output .= '</div>';
        $output .= '<p class="scroller-status__message infinite-scroll-last">' . $last . '</p>';
        $output .= '<p class="scroller-status__message infinite-scroll-error">' . $error . '</p>';
        $output .= '</div>';
        $output .= '<div class="dp-adeline-loadmore-wrapper"><button class="dp-adeline-loadmore-button"><span class="dp-adeline-loadmore-button-text">' . esc_html($button_text) . '</span></button></div>';
        $output .= '<div class="load-more-scroll-nav clr">';
        $output .= '<div class="alignleft newer-posts">' . get_previous_posts_link('<i class="dpr-icon-angle-double-left"></i> ' . esc_html__('Newer Posts', 'adeline')) . '</div>';
        $output .= '<div class="alignright older-posts">' . get_next_posts_link(esc_html__('Older Posts', 'adeline') . ' <i class="dpr-icon-angle-double-right"></i>') . '</div>';
        $output .= '</div>';
        echo wp_kses_post($output);
    }
}
/**
 * Blog Pagination
 * Used to load the pagination function for blog archives
 * Execute the pagination function based on the theme settings
 *
 * @since 1.0
 */
if (!function_exists('adeline_blog_pagination')) {
    function adeline_blog_pagination()
    {
        // Admin Options
        $blog_style       = adeline_get_option_value('blog_style', '', 'large-image');
        $pagination_style = adeline_get_option_value('blog_pagination_type', '', 'default');
        // Category based settings
        if (is_category()) {
            // Get taxonomy meta
            $term       = get_query_var('cat');
            $term_data  = get_option('category_' . $term);
            $term_style = $term_pagination = '';
            if (isset($term_data['dpr_adeline_term_style'])) {
                $term_style = '' != $term_data['dpr_adeline_term_style'] ? $term_data['dpr_adeline_term_style'] . '' : $term_style;
            }
            if (isset($term_data['dpr_adeline_term_pagination'])) {
                $term_pagination = '' != $term_data['dpr_adeline_term_pagination'] ? $term_data['dpr_adeline_term_pagination'] . '' : '';
            }
            if ($term_pagination) {
                $pagination_style = $term_pagination;
            }
        }
        // Set default $type for infnite scroll
        if ('posts-grid' == $blog_style) {
            $infinite_type = 'standard-grid';
        } else {
            $infinite_type = 'standard';
        }
        // Execute the pagination function
        if ('infinite_scroll' == $pagination_style) {
            adeline_infinite_scroll($infinite_type);
        } else if ($pagination_style == 'load_more') {
            adeline_load_more();
        } else if ($pagination_style == 'next_prev') {
            adeline_next_prev();
        } else {
            adeline_pagination();
        }
    }
}
/**
 * Returns the pagination style
 *
 * @since 1.0
 */
if (!function_exists('adeline_blog_pagination_type')) {
    function adeline_blog_pagination_type()
    {
        // Get default style from Customizer
        $style = adeline_get_option_value('blog_pagination_type', '', 'default');
        $style = apply_filters('adeline_blog_pagination_type', $style);
        // Return style
        return $style;
    }
}
/*-------------------------------------------------------------------------------*/
/* 6.Footer

/*-------------------------------------------------------------------------------*/
/**
 * Display footer widgets
 *
 * @since 1.0
 */
if (!function_exists('adeline_display_footer_widgets')) {
    function adeline_display_footer_widgets()
    {
        // Return true by default
        $return = true;
        // Return false if disabled via Customizer
        if (adeline_get_option_value('footer_content', '', 'widgets') === 'disabled') {
            $return = false;
        }
        if (adeline_get_option_value('footer_content', '', 'widgets') === 'widgets' && !is_active_sidebar('footer-one') & !is_active_sidebar('footer-two') && !is_active_sidebar('footer-three') && !is_active_sidebar('footer-four')) {
            $return = false;
        }
        if (adeline_get_option_value('footer_content', '', 'widgets') === 'custom' && adeline_get_option_value('footer_particle_selected') === '') {
            $return = false;
        }
        return apply_filters('adeline_display_footer_widgets', $return);
    }
}
/**
 * Display footer bottom
 *
 * @since 1.0
 */
if (!function_exists('adeline_display_copyright_area')) {
    function adeline_display_copyright_area()
    {
        // Return true by default
        $return = true;
        // Return false if disabled via Customizer
        if (!true == adeline_get_option_value('copyright_enable') || adeline_get_meta_value(get_the_ID(), 'copyright_enable', true) != true) {
            $return = false;
        }
        return apply_filters('adeline_display_copyright_area', $return);
    }
}
/**
 * Footer template
 *
 * @since 1.0
 */
if (!function_exists('adeline_footer_template')) {
    function adeline_footer_template()
    {
        if (adeline_display_footer_widgets() || adeline_display_copyright_area()) {
            get_template_part('template-parts/footer/layout');
        }
    }
    add_action('adeline_footer', 'adeline_footer_template');
}
/**
 * Add classes to the footer wrap
 *
 * @since 1.0
 */
if (!function_exists('adeline_footer_classes')) {
    function adeline_footer_classes()
    {
        // Setup classes array
        $classes = array();
        // Default class
        $classes[] = 'dpr-footer';
        // Parallax footer
        if (true == adeline_get_option_value('footer_paralax')) {
            $classes[] = 'parallax-footer';
        }
        // Set keys equal to vals
        $classes = array_combine($classes, $classes);
        $classes = apply_filters('adeline_footer_classes', $classes);
        // Turn classes into space seperated string
        $classes = implode(' ', $classes);
        // return classes
        return $classes;
    }
}
/*-------------------------------------------------------------------------------*/
/* 7.WooCommerce

/*-------------------------------------------------------------------------------*/
/**
 * Checks if on the WooCommerce shop page.
 *
 * @since 1.0
 */
if (!function_exists('adeline_is_woo_shop')) {
    function adeline_is_woo_shop()
    {
        if (!ADELINE_WOOCOMMERCE_ACTIVE) {
            return false;
        } elseif (function_exists('is_shop') && is_shop()) {
            return true;
        }
    }
}
/**
 * Checks if on a WooCommerce tax.
 *
 * @since 1.0
 */
if (!function_exists('adeline_is_woo_tax')) {
    function adeline_is_woo_tax()
    {
        if (!ADELINE_WOOCOMMERCE_ACTIVE) {
            return false;
        } elseif (!is_tax()) {
            return false;
        } elseif (function_exists('is_product_category') && function_exists('is_product_tag')) {
            if (is_product_category() || is_product_tag()) {
                return true;
            }
        }
    }
}
/**
 * Checks if on singular WooCommerce product post.
 *
 * @since 1.0
 */
if (!function_exists('adeline_is_woo_single')) {
    function adeline_is_woo_single()
    {
        if (!ADELINE_WOOCOMMERCE_ACTIVE) {
            return false;
        } elseif (is_woocommerce() && is_singular('product')) {
            return true;
        }
    }
}
/*-------------------------------------------------------------------------------*/
/* 8.Other

/*-------------------------------------------------------------------------------*/
/**
 * Theme Branding
 *
 * @since 1.0
 */
if (!function_exists('adeline_theme_branding')) {
    function adeline_theme_branding()
    {
        $return = esc_html__('Adeline', 'adeline');
        return apply_filters('adeline_theme_branding', $return);
    }
}
/**
 * Translation support
 *
 * @since 1.0
 */
if (!function_exists('adeline_theme_opt_translation')) {
    function adeline_theme_opt_translation($id, $val = '')
    {
        // Translate theme options values
        if ($val) {
            // Polylang Translation
            if (function_exists('pll__') && $id) {
                $val = pll__($val);
            }
            // Return the value
            return $val;
        }
    }
}
/**
 * Register translation strings
 *
 * @since 1.0
 */
if (!function_exists('adeline_register_theme_opt_strings')) {
    function adeline_register_theme_opt_strings()
    {
        return apply_filters('adeline_register_theme_opt_strings', array('top_bar_content' => '', 'mobile_menu_text' => esc_html__('Menu', 'adeline'), 'mobile_menu_close_text' => esc_html__('Close', 'adeline'), 'mobile_menu_close_btn_text' => esc_html__('Close Menu', 'adeline'), 'footer_copyright_text' => esc_html__('&copy; 2017, Adeline Theme by DynamicPress Team', 'adeline'), 'menu_cart_custom_link' => '', 'blog_infinite_scroll_last_text' => '', 'blog_infinite_scroll_error_text' => ''));
    }
}
/**
 * Returns array of Social Options
 *
 * @since 1.0
 */
if (!function_exists('adeline_social_share')) {
    function adeline_social_share()
    {
        return apply_filters('adeline_social_options', array('facebook' => array('label' => esc_html__('Facebook', 'adeline'), 'icon_class' => 'dpr-icon-facebook', 'link' => adeline_get_option_value('social_link_facebook')), 'twitter' => array('label' => esc_html__('Twitter', 'adeline'), 'icon_class' => 'dpr-icon-twitter', 'link' => adeline_get_option_value('social_link_twitter')), 'google-plus' => array('label' => esc_html__('Google Plus', 'adeline'), 'icon_class' => 'dpr-icon-google-plus', 'link' => adeline_get_option_value('social_link_googleplus')), 'pinterest-p' => array('label' => esc_html__('Pinterest', 'adeline'), 'icon_class' => 'dpr-icon-pinterest-p', 'link' => adeline_get_option_value('social_link_pinterest')), 'dribbble' => array('label' => esc_html__('Dribbble', 'adeline'), 'icon_class' => 'dpr-icon-dribbble', 'link' => adeline_get_option_value('social_link_dribbble')), 'instagram' => array('label' => esc_html__('Instagram', 'adeline'), 'icon_class' => 'dpr-icon-instagram', 'link' => adeline_get_option_value('social_link_instagram')), 'linkedin' => array('label' => esc_html__('LinkedIn', 'adeline'), 'icon_class' => 'dpr-icon-linkedin', 'link' => adeline_get_option_value('social_link_linkedin')), 'flickr' => array('label' => esc_html__('Flickr', 'adeline'), 'icon_class' => 'dpr-icon-flickr', 'link' => adeline_get_option_value('social_link_flickr')), 'skype' => array('label' => esc_html__('Skype', 'adeline'), 'icon_class' => 'dpr-icon-skype', 'link' => adeline_get_option_value('social_link_skype')), 'vk' => array('label' => esc_html__('VK', 'adeline'), 'icon_class' => 'dpr-icon-vk', 'link' => adeline_get_option_value('social_link_vk')), 'viadeo' => array('label' => esc_html__('Viadeo', 'adeline'), 'icon_class' => 'dpr-icon-viadeo', 'link' => adeline_get_option_value('social_link_viadeo')), 'tumblr' => array('label' => esc_html__('Tumblr', 'adeline'), 'icon_class' => 'dpr-icon-tumblr', 'link' => adeline_get_option_value('social_link_tumblr')), 'github-alt' => array('label' => esc_html__('Github', 'adeline'), 'icon_class' => 'dpr-icon-github-alt', 'link' => adeline_get_option_value('social_link_github')), 'youtube' => array('label' => esc_html__('Youtube', 'adeline'), 'icon_class' => 'dpr-icon-youtube', 'link' => adeline_get_option_value('social_link_youtube')), 'vimeo' => array('label' => esc_html__('Vimeo', 'adeline'), 'icon_class' => 'dpr-icon-vimeo-square', 'link' => adeline_get_option_value('social_link_vimeo')), 'vine' => array('label' => esc_html__('Vine', 'adeline'), 'icon_class' => 'dpr-icon-vine', 'link' => adeline_get_option_value('social_link_vine')), 'stumbleupon' => array('label' => esc_html__('Stumbleupon', 'adeline'), 'icon_class' => 'dpr-icon-stumbleupon', 'link' => adeline_get_option_value('social_link_stumbleupon')), 'xing' => array('label' => esc_html__('Xing', 'adeline'), 'icon_class' => 'dpr-icon-xing', 'link' => adeline_get_option_value('social_link_xing')), 'digg' => array('label' => esc_html__('Digg', 'adeline'), 'icon_class' => 'dpr-icon-digg', 'link' => adeline_get_option_value('social_link_digg')), 'lastfm' => array('label' => esc_html__('Lastfm', 'adeline'), 'icon_class' => 'dpr-icon-lastfm', 'link' => adeline_get_option_value('social_link_lastfm')), 'soundcloud' => array('label' => esc_html__('Soundcloud', 'adeline'), 'icon_class' => 'dpr-icon-soundcloud', 'link' => adeline_get_option_value('social_link_soundcloud')), 'delicious' => array('label' => esc_html__('Delicious', 'adeline'), 'icon_class' => 'dpr-icon-delicious', 'link' => adeline_get_option_value('social_link_delicious')), 'yelp' => array('label' => esc_html__('Yelp', 'adeline'), 'icon_class' => 'dpr-icon-yelp', 'link' => adeline_get_option_value('social_link_yelp')), 'tripadvisor' => array('label' => esc_html__('Tripadvisor', 'adeline'), 'icon_class' => 'dpr-icon-tripadvisor', 'link' => adeline_get_option_value('social_link_tripadvisor')), 'odnoklassniki' => array('label' => esc_html__('Odnoklassniki', 'adeline'), 'icon_class' => 'dpr-icon-odnoklassniki', 'link' => adeline_get_option_value('social_link_odnoklassniki')), 'rss' => array('label' => esc_html__('RSS', 'adeline'), 'icon_class' => 'dpr-icon-rss', 'link' => adeline_get_option_value('social_link_rss')), 'envelope-o' => array('label' => esc_html__('Email', 'adeline'), 'icon_class' => 'dpr-icon-envelope-o', 'link' => adeline_get_option_value('social_link_email'))));
    }
}
/**
 * Grid Columns
 *
 * @since 1.0
 */
if (!function_exists('adeline_grid_columns')) {
    function adeline_grid_columns()
    {
        return apply_filters('adeline_grid_columns', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7'));
    }
}
/**
 * Minify CSS
 *
 * @since 1.0
 */
if (!function_exists('adeline_minify_css')) {
    function adeline_minify_css($css = '')
    {
        // Return if no CSS
        if (!$css) {
            return;
        }

        // Normalize whitespace
        $css = preg_replace('/\s+/', ' ', $css);
        // Remove ; before }
        $css = preg_replace('/;(?=\s*})/', '', $css);
        // Remove space after , : ; { } */ >
        $css = preg_replace('/(,|:|;|\{|}|\*\/|>) /', '$1', $css);
        // Remove space before , ; { }
        $css = preg_replace('/ (,|;|\{|})/', '$1', $css);
        // Strips leading 0 on decimal values (converts 0.5px into .5px)
        $css = preg_replace('/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css);
        // Strips units if value is 0 (converts 0px to 0)
        $css = preg_replace('/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css);
        // Trim
        $css = trim($css);
        // Return minified CSS
        return $css;
    }
}
/**
 * Returns sidr menu source
 *
 * @since 1.0
 */
if (!function_exists('adeline_sidr_menu_source')) {
    function adeline_sidr_menu_source()
    {
        // Return if is not sidebar mobile style
        if ('sidebar' != adeline_mobile_menu_style()) {
            return;
        }
        // Define array of items
        $items = array();
        // Add close button
        if (true == adeline_get_option_value('mobile_menu_sidebar_close_button')) {
            $items['sidrclose'] = '#sidr-close';
        }
        // If has mobile menu
        if (has_nav_menu('mobile_menu')) {
            $items['mobile-nav'] = '#mobile-nav';
        }
        // Add main navigation
        else {
                // Navigation
                $items['nav'] = '#dpr-navigation';
                // Add top bar menu
                if (has_nav_menu('topbar_menu')) {
                    $items['top-nav'] = '#dpr-top-bar-nav';
                }
            }
            if ('full_screen' != adeline_header_style()) {
                // Add social menu
                if (true == adeline_get_option_value('menu_social_display')) {
                    $items['social'] = '#dpr-header .dpr-adeline-social-menu';
                }
            }
            // Add search form
            if (adeline_get_option_value('mobile_menu_search') == true) {
                $items['search'] = '#mobile-menu-search';
            }
            $items = apply_filters('adeline_mobile_menu_source', $items);
            // Turn items into comma seperated list
            $items = implode(', ', $items);
            // Return
            return $items;
        }
    }
/**
 * Query Autoptimize activation - check required if using a page builder
 *
 * @since 1.0
 */
    if (!function_exists('adeline_is_autoptimize_activated')) {
        function adeline_is_autoptimize_activated()
    {
            return class_exists('autoptimizeBase') ? true : false;
        }
    }
/**
 * Return schema markup
 *
 * @since 1.0
 */
    if (!function_exists('adeline_get_schema_markup')) {
        function adeline_get_schema_markup($location)
    {
            // Return if disable
            if (!adeline_get_option_value('enable_schema_markup')) {
                return null;
            }
            // Default
            $schema = $itemprop = $itemtype = '';
            // HTML
            if ('html' == $location) {
                if (is_singular()) {
                    $schema = 'itemscope itemtype="http://schema.org/WebPage"';
                } else {
                    $schema = 'itemscope itemtype="http://schema.org/Article"';
                }
            }
            // Header
        elseif ('header' == $location) {
            $schema = 'itemscope="itemscope" itemtype="http://schema.org/WPHeader"';
        }
        // Logo
        elseif ('logo' == $location) {
            $schema = 'itemscope itemtype="http://schema.org/Brand"';
        }
        // Navigation
        elseif ('site_navigation' == $location) {
            $schema = 'itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement"';
        }
        // Main
        elseif ('main' == $location) {
            $itemtype = 'http://schema.org/WebPageElement';
            $itemprop = 'mainContentOfPage';
            if (is_singular('post')) {
                $itemprop = '';
                $itemtype = 'http://schema.org/Blog';
            }
        }
        // Breadcrumb
        elseif ('breadcrumb' == $location) {
            $schema = 'itemscope itemtype="http://schema.org/BreadcrumbList"';
        }
        // Breadcrumb list
        elseif ('breadcrumb_list' == $location) {
            $schema = 'itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"';
        }
        // Breadcrumb itemprop
        elseif ('breadcrumb_itemprop' == $location) {
            $schema = 'itemprop="breadcrumb"';
        }
        // Sidebar
        elseif ('sidebar' == $location) {
            $schema = 'itemscope="itemscope" itemtype="http://schema.org/WPSideBar"';
        }
        // Footer widgets
        elseif ('footer' == $location) {
            $schema = 'itemscope="itemscope" itemtype="http://schema.org/WPFooter"';
        }
        // Headings
        elseif ('headline' == $location) {
            $schema = 'itemprop="headline"';
        }
        // Posts
        elseif ('entry_content' == $location) {
            $schema = 'itemprop="text"';
        }
        // Publish date
        elseif ('publish_date' == $location) {
            $schema = 'itemprop="datePublished"';
        }
        // Author name
        elseif ('author_name' == $location) {
            $schema = 'itemprop="name"';
        }
        // Author link
        elseif ('author_link' == $location) {
            $schema = 'itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"';
        }
        // Url
        elseif ('url' == $location) {
            $schema = 'itemprop="url"';
        }
        // Position
        elseif ('position' == $location) {
            $schema = 'itemprop="position"';
        }
        // Image
        elseif ('image' == $location) {
            $schema = 'itemprop="image"';
        }
        return ' ' . apply_filters('adeline_schema_markup', $schema);
    }
}
/**
 * Outputs schema markup
 *
 * @since 1.0
 */
if (!function_exists('adeline_schema_markup')) {
    function adeline_schema_markup($location)
    {
        echo wp_kses_post(adeline_get_schema_markup($location));
    }
}
/**
 * PORTFOLIO STUFF
 *
 */
/**
 * List terms for specific taxonomy
 *
 * @since  1.0.0
 */
if (!function_exists('adeline_portfolio_category_meta')) {
    function adeline_portfolio_category_meta()
    {
        // Category taxonomy
        $taxonomy = 'dpr_portfolio_category';
        // Make sure taxonomy exists
        if (!taxonomy_exists($taxonomy)) {
            return;
        }
        // Vars
        $links = array();
        $terms = wp_get_post_terms(get_the_ID(), $taxonomy);
        // Return if no terms
        if (!$terms) {
            return;
        }
        // Loop through terms
        foreach ($terms as $term) {
            $links[] = '<a href="' . esc_url(get_term_link($term->term_id, $taxonomy)) . '" title="' . esc_attr($term->name) . '">' . esc_html($term->name) . '</a>';
        }
        // Turn into comma seperated string
        if ($links && is_array($links)) {
            $links = implode(',', $links);
        } else {
            return;
        }
        // Apply filter
        $links = apply_filters('dp_portfolio_category_meta', $links, $taxonomy);
        // Return
        return $links;
    }
}
/**
 * Portfolio Numbered Pagination
 *
 * @since    1.0.0
 * @link    https://codex.wordpress.org/Function_Reference/paginate_links
 */
if (!function_exists('adeline_portfolio_numbered_pagination')) {
    function adeline_portfolio_numbered_pagination($max_num_pages, $align = 'center')
    {
        // Don't run if there's only one page
        if ($max_num_pages < 2) {
            return;
        }
        // Arrows with RTL support
        $prev_arrow = is_rtl() ? 'dpr-icon-angle-right' : 'dpr-icon-angle-left';
        $next_arrow = is_rtl() ? 'dpr-icon-angle-left' : 'dpr-icon-angle-right';
        // Set vars
        $big = 999999999;
        // Get current page
        $paged_query = is_front_page() ? 'page' : 'paged';
        $paged       = get_query_var($paged_query) ? intval(get_query_var($paged_query)) : 1;
        // Get permalink structure
        if (get_option('permalink_structure')) {
            if (is_page()) {
                $format = 'page/%#%/';
            } else {
                $format = '/%#%/';
            }
        } else {
            $format = '&paged=%#%';
        }
        $args     = apply_filters('adeline_pagination_args', array('base' => str_replace($big, '%#%', html_entity_decode(get_pagenum_link($big))), 'format' => $format, 'current' => $paged, 'total' => $max_num_pages, 'mid_size' => 3, 'type' => 'list', 'prev_text' => '<i class="' . $prev_arrow . '"></i>', 'next_text' => '<i class="' . $next_arrow . '"></i>'));
        $addclass = '';
        if (adeline_get_option_value('pagination_shape') == 'round') {
            $addclass .= ' round';
        }

        if (adeline_get_option_value('pagination_shadowed')) {
            $addclass .= ' shadowed';
        }

        // Output pagination
        echo '<div class="dpr-adeline-pagination clr ' . esc_attr($addclass) . ' dpr-adeline-' . esc_attr($align) . '">' . wp_kses_post(paginate_links($args)) . '</div>';
    }
}
/**
 * Returns single portfolio item elements positioning when content layout set to as post
 *
 * @since 1.0
 */
if (!function_exists('adeline_single_portfolio_post_style_elements')) {
    function adeline_single_portfolio_post_style_elements()
    {
        // Get elements from template options
        $elements = adeline_get_option_value('portfolio_single_post_style_elements', 'enabled');
        if (is_array($elements)) {
            $elements = array_keys($elements);
        }
        // Default elements if no theme options elements settings
        if (empty($elements)) {
            $elements = array('media', 'title', 'meta', 'content', 'tags', 'share', 'next_prev', 'related_portfolio', 'comments');
        }
        $elements = apply_filters('adeline_single_portfolio_post_style_elements', $elements);
        // Return sections
        return $elements;
    }
}
/**
 * Returns blog single meta
 *
 * @since 1.0
 */
if (!function_exists('adeline_single_portfolio_meta')) {
    function adeline_single_portfolio_meta()
    {
        // Get elements from template options
        $elements = adeline_get_option_value('portfolio_single_meta', 'enabled');
        if (is_array($elements)) {
            $elements = array_keys($elements);
        }
        // Default elements if no theme options elements settings
        if (empty($elements)) {
            $elements = array('author', 'date', 'categories', 'comments');
        }
        $elements = apply_filters('adeline_blog_single_meta', $elements);
        // Return sections
        return $elements;
    }
}
/**
 * Returns single portfolio item elements positioning when not as post style set
 *
 * @since 1.0
 */
if (!function_exists('adeline_single_portfolio_elements')) {
    function adeline_single_portfolio_elements()
    {
        // Get elements from template options
        $elements = adeline_get_option_value('portfolio_single_elements', 'enabled');
        if (is_array($elements)) {
            $elements = array_keys($elements);
        }
        // Default elements if no theme options elements settings
        if (empty($elements)) {
            $elements = array('media_details', 'next_prev', 'related_portfolio', 'comments');
        }
        $elements = apply_filters('adeline_single_portfolio_elements', $elements);
        // Return sections
        return $elements;
    }
}
/**
 * Retrieve attachment IDs for portfolio addidional images
 *
 * @since 1.0
 */
if (!function_exists('adeline_get_porftolio_images_ids')) {
    function adeline_get_porftolio_images_ids($post_id = '')
    {
        $post_id        = $post_id ? $post_id : get_the_ID();
        $attachment_ids = adeline_get_meta_value($post_id, 'portfolio_single_multiple_images', '');
        if (is_array($attachment_ids)) {
            $attachment_ids = array_keys($attachment_ids);
        }

        if ($attachment_ids) {
            return $attachment_ids;
        }
    }
}
/**
 * Returns single portfolio video HTML
 *
 * @since 1.0
 */
if (!function_exists('adeline_get_portfolio_video_html')) {
    function adeline_get_portfolio_video_html($video = '')
    {
        // Get video from metabox
        $video = '';
        // Embed video URL
        if (adeline_get_meta_value(get_the_ID(), 'single_portfolio_oembed_video_url', '') != '') {
            $video = adeline_get_meta_value(get_the_ID(), 'single_portfolio_oembed_video_url', '');
        }
        // Check for post oembed code
        if (!empty(adeline_get_meta_value(get_the_ID(), 'single_portfolio_video_embeded_code'))) {
            $video = adeline_get_meta_value(get_the_ID(), 'single_portfolio_video_embeded_code');
        }
        // Check for self-hosted
        $self_hosted = adeline_get_meta_value(get_the_ID(), 'single_portfolio_self_hosted_video_url');
        $self_hosted = $self_hosted['url'];
        if (!empty($self_hosted)) {
            $video = $self_hosted;
        }
        if (!empty($video)) {
            // Get oembed code and return
            if (!is_wp_error($oembed = wp_oembed_get($video)) && $oembed) {
                return '<div class="responsive-video-wrapper">' . $oembed . '</div>';
            }
            // Display using apply_filters if it's self-hosted
            else {
                    $video = apply_filters('the_content', $video);
                    // Add responsive video wrap for youtube/vimeo embeds
                    if (strpos($video, 'youtube') || strpos($video, 'vimeo')) {
                        return '<div class="responsive-video-wrapper">' . $video . '</div>';
                    }
                    // Else return without responsive wrap
                else {
                        return $video;
                    }
                }
            }
        }
    }
/**
 * Returns single portfolio audio
 *
 * @since 1.0
 */
    if (!function_exists('adeline_get_portfolio_audio_html')) {
        function adeline_get_portfolio_audio_html($audio = '')
    {
            // Get audio from metabox
            $audio = '';
            // Embed audio URL
            if (adeline_get_meta_value(get_the_ID(), 'single_portfolio_oembed_audio_url', '') != '') {
                $audio = adeline_get_meta_value(get_the_ID(), 'single_portfolio_oembed_audio_url', '');
            }
            // Check for self-hosted
            $self_hosted = adeline_get_meta_value(get_the_ID(), 'single_portfolio_self_hosted_audio_url');
            $self_hosted = $self_hosted['url'];
            if (!empty($self_hosted)) {
                $audio = $self_hosted;
            }
            // Check for oembed code
            if (!empty(adeline_get_meta_value(get_the_ID(), 'single_portfolio_audio_embed_code'))) {
                $audio = adeline_get_meta_value(get_the_ID(), 'single_portfolio_audio_embed_code');
            }
            if (!empty($audio)) {
                // Get oembed code and return
                if (!is_wp_error($oembed = wp_oembed_get($audio)) && $oembed) {
                    return '<div class="responsive-video-wrapper">' . $oembed . '</div>';
                }
                // Display using apply_filters if it's self-hosted
            else {
                    $audio = apply_filters('the_content', $audio);
                    // Add responsive audio wrap for youtube/vimeo embeds
                    if (strpos($audio, 'youtube') || strpos($audio, 'vimeo')) {
                        return '<div class="responsive-video-wrapper">' . $audio . '</div>';
                    }
                    // Else return without responsive wrap
                else {
                        return $audio;
                    }
                }
            }
        }
    }
/**
 * Hides unsupported nested shortcodes on frontend editor
 *
 */
    if (!class_exists("dpr_hide_frontend")) {
        class dpr_hide_frontend
    {
            private $name;
            public function __construct($name)
        {
                if (vc_is_inline()) {
                    $this->name = $name;
                    add_action("admin_enqueue_scripts", array($this, "addScript"));
                }
            }
            public function addScript()
        {
                echo '<style>

                                                .' . $this->name . '_o{

                                                display:none !important;

                                                }

                                                </style>';
            }
        }
    }
    if (!function_exists('adeline_unsuported_frontend_markup')) {
        function adeline_unsuported_frontend_markup($name = "")
    {
            if (vc_is_inline()) {
                $text = sprintf(esc_html__("Module %s is not supported by frontend editor", 'adeline'), $name);
                echo "<div class='dpr_unsuported_frontend'><span class='dpr-icon-info-circle icon-wrap'></span><div class='inner'>" . esc_attr($text) . "</div></div>";
                return true;
            } else {
                return false;
            }
        }
    }

/**
 * Custom get_attachment_image_src function.
 * Return empty array instead boolan false (fix for PHP 7.4)
 *
 */

    if (!function_exists('dpr_get_attachment_image_src')) {
        function dpr_get_attachment_image_src($attachment_id, $size)
    {
            $return = wp_get_attachment_image_src($attachment_id, $size);
            if ($return === false) {
                $return = array('', '', '');
            }
            return $return;
        }
    }

/**
 * Custom password form
 */

    add_filter('the_password_form', 'dpr_custom_password_form');
    function dpr_custom_password_form()
{
        global $post;
        $style       = "light";
        $title       = __("Password protected content", 'adeline');
        $subtitle    = __("To view it please enter your password below", 'adeline');
        $placeholder = __("Password", 'adeline');
        $submit_text = __('Submit', 'adeline');
        if (is_singular('proof_gallery')) {
            $style       = adeline_get_option_value('proof_gallery_ppc_style', '', 'light');
            $title       = adeline_get_option_value('proof_gallery_ppc_title', '', '');
            $subtitle    = adeline_get_option_value('proof_gallery_ppc_subtitle', '', '');
            $placeholder = adeline_get_option_value('proof_gallery_ppc_placehoder', '', __("Password", 'adeline'));
            $submit_text = adeline_get_option_value('proof_gallery_ppc_submit_text', '', __('Submit', 'adeline'));

        }
        $form = '<form class="dpr-ppc-form style-' . esc_attr($style) . '" action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
                        <h5 class ="dpr-ppc-title">' . esc_html($title) . ' </h5>
                        <p class ="dpr-ppc-subtitle">' . wp_kses_post($subtitle) . ' </p>
                        <div class="dpr-ppc-inputs">

                        <div class="dpr-ppc-pass-wrap">
                        <input class="dpr-ppc-pass" name="post_password" id="password" type="password" size= "40" placeholder="' . esc_attr($placeholder) . '" required/>
                        </div>

                        <div class="dpr-ppc-submit-wrap">
                        <button class="btn flat dpr-ppc-submit" type="submit" value="Submit">' . wp_kses_post($submit_text) . '</button>
                        </div>

                        </div>
                        </form>
                        ';
        return $form;
    }

/**
 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
 */
    if (!function_exists('wp_body_open')) {
        function wp_body_open()
    {
            do_action('wp_body_open');
        }
    }
