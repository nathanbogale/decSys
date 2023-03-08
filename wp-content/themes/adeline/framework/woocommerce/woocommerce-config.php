<?php
/**
 * Perform all main WooCommerce configurations for this theme
 *
 * @package Adeline WordPress theme
 */
// Start and run class
if (!class_exists('Adeline_WooCommerce_Config')) {
    class Adeline_WooCommerce_Config {
        /**
         * Main Class Constructor
         *
         * @since 1.0
         */
        public function __construct() {
            // Include helper functions
            require_once (ADELINE_FRAMEWORK_DIR . 'woocommerce/woocommerce-helpers.php');
            // These filters/actions must run on init
            add_action('init', array($this, 'init'));
            // Pagination.
            add_action('wp', array($this, 'adeline_shop_pagination'), 999);
            // Body classes
            add_filter('body_class', array($this, 'adeline_body_class'));
            // Register Woo sidebar
            add_filter('widgets_init', array($this, 'adeline_register_woocommerce_sidebar'));
            /*-------------------------------------------------------------------------------*/
            /* -  Front-End only actions/filters
            /*-------------------------------------------------------------------------------*/
            if (!is_admin()) {
                // Remove default wrappers and add new ones
                remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
                remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
                add_action('woocommerce_before_main_content', array($this, 'adeline_content_wrapper'), 10);
                add_action('woocommerce_after_main_content', array($this, 'adeline_content_wrapper_end'), 10);
                // Display correct sidebar for products
                remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
                add_filter('adeline_get_sidebar', array($this, 'adeline_display_woocommerce_sidebar'));
                // Set correct post layouts
                add_filter('adeline_content_layout_class', array($this, 'adeline_layouts'));
                // Set correct woo page width
                add_filter('body_class', array($this, 'adeline_woo_page_width'));
                // Set correct both sidebars layout style
                add_filter('adeline_both_sidebars_column_order', array($this, 'adeline_bs_class'));
                // Disable WooCommerce main page title
                add_filter('woocommerce_show_page_title', '__return_false');
                // Disable WooCommerce css
                add_filter('woocommerce_enqueue_styles', '__return_false');
                // Remove the category description under the page title on taxonomy
                add_filter('adeline_post_subheading', array($this, 'adeline_post_subheading'));
                // Show/hide next/prev on products
                add_filter('adeline_has_next_prev', array($this, 'adeline_next_prev'));
            }
            // Main Woo Actions
            add_action('wp_enqueue_scripts', array($this, 'adeline_add_custom_scripts'));
            add_filter('adeline_localize_array', array($this, 'adeline_localize_array'));
            if (adeline_get_option_value('woo_products_toolbar_results_count') == true || adeline_get_option_value('woo_products_toolbar_sort') == true || adeline_get_option_value('woo_products_toolbar_grid') == true) {
                add_action('woocommerce_before_shop_loop', array($this, 'adeline_add_shop_loop_div'));
            }
            if (true == adeline_get_option_value('woo_products_toolbar_grid', '', true)) {
                add_action('woocommerce_before_shop_loop', array($this, 'adeline_grid_list_buttons'), 10);
            }
            if (adeline_get_option_value('woo_products_toolbar_results_count') == true || adeline_get_option_value('woo_products_toolbar_sort') == true || adeline_get_option_value('woo_products_toolbar_grid') == true) {
                add_action('woocommerce_before_shop_loop', array($this, 'adeline_close_shop_loop_div'), 40);
            }
            add_action('woocommerce_before_shop_loop_item', array($this, 'adeline_add_shop_loop_item_inner_div'));
            add_action('woocommerce_after_shop_loop_item', array($this, 'adeline_archive_product_content'), 10);
            add_action('woocommerce_after_shop_loop_item', array($this, 'adeline_close_shop_loop_item_inner_div'));
            add_action('woocommerce_before_subcategory_title', array($this, 'adeline_add_container_wrap_category'), 8);
            add_action('woocommerce_before_subcategory_title', array($this, 'adeline_add_div_before_category_thumbnail'), 9);
            add_action('woocommerce_before_subcategory_title', array($this, 'adeline_close_div_after_category_thumbnail'), 11);
            add_action('woocommerce_shop_loop_subcategory_title', array($this, 'adeline_add_div_before_category_title'), 9);
            add_action('woocommerce_shop_loop_subcategory_title', array($this, 'adeline_add_category_description'), 11);
            add_action('woocommerce_shop_loop_subcategory_title', array($this, 'adeline_close_div_after_category_title'), 12);
            add_action('woocommerce_shop_loop_subcategory_title', array($this, 'adeline_close_container_wrap_category'), 13);
            add_action('woocommerce_after_single_product_summary', array($this, 'adeline_clear_summary_floats'), 1);
            add_action('woocommerce_before_account_navigation', array($this, 'adeline_before_account_navigation'));
            add_action('woocommerce_after_account_navigation', array($this, 'adeline_after_account_navigation'));
            if (get_option('woocommerce_enable_myaccount_registration') !== 'yes') {
                add_action('woocommerce_before_customer_login_form', array($this, 'adeline_login_wrap_before'));
                add_action('woocommerce_after_customer_login_form', array($this, 'adeline_login_wrap_after'));
            }
            add_action('woocommerce_archive_description', array($this, 'adeline_woocommerce_category_image'), 2);
            // Add product navigation
            add_action('woocommerce_before_single_product_summary', array($this, 'adeline_product_next_prev_nav'), 10);
            // Quick view
            add_action('adeline_after_product_entry_image', array($this, 'adeline_quick_view_button'));
            add_action('wp_ajax_dpradeline_product_quick_view', array($this, 'adeline_product_quick_view_ajax'));
            add_action('wp_ajax_nopriv_dpradeline_product_quick_view', array($this, 'adeline_product_quick_view_ajax'));
            add_action('wp_footer', array($this, 'adeline_quick_view_template'));
            add_action('adeline_woo_quick_view_product_image', 'woocommerce_show_product_sale_flash', 10);
            add_action('adeline_woo_quick_view_product_image', array($this, 'adeline_quick_view_image'), 20);
            add_action('adeline_woo_quick_view_product_content', array($this, 'adeline_single_product_content'), 10);

            // Ajax single product add to cart
            add_action('wp_ajax_dpradeline_add_cart_single_product', array($this, 'adeline_add_cart_single_product_ajax'));
            add_action('wp_ajax_nopriv_dpradeline_add_cart_single_product', array($this, 'adeline_add_cart_single_product_ajax'));
            // Add cart overlay
            if (adeline_get_option_value('add_mobile_mini_cart') == true) {
                add_action('adeline_after_footer', array($this, 'adeline_cart_overlay'), 99);
            }
            // Add mobile menu mini cart
            if (adeline_get_option_value('open_menu_cart_when_product_added') == true) {
                add_action('wp_footer', array($this, 'adeline_get_mini_cart_sidebar'));
            }
            // Remove the single product summary content to add the sortable control
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
            add_action('woocommerce_single_product_summary', array($this, 'adeline_single_product_content'), 10);
            // Main Woo Filters
            add_filter('wp_nav_menu_items', array($this, 'adeline_menu_wishlist_icon'), 10, 2);
            add_filter('wp_nav_menu_items', array($this, 'adeline_menu_cart_icon'), 10, 2);
            add_filter('wp_nav_menu_items', array($this, 'adeline_menu_wishlist_icon_topbar'), 10, 2);
            add_filter('woocommerce_add_to_cart_fragments', array($this, 'adeline_menu_cart_icon_fragments'));
            add_filter('woocommerce_general_settings', array($this, 'adeline_remove_general_settings'));
            add_filter('woocommerce_product_settings', array($this, 'adeline_remove_product_settings'));
            add_filter('loop_shop_per_page', array($this, 'adeline_loop_shop_per_page'), 20);
            add_filter('loop_shop_columns', array($this, 'adeline_loop_shop_columns'));
            add_filter('woocommerce_output_related_products_args', array($this, 'adeline_related_product_args'));
            add_filter('woocommerce_pagination_args', array($this, 'adeline_pagination_args'));
            add_filter('woocommerce_continue_shopping_redirect', array($this, 'adeline_continue_shopping_redirect'));
            add_filter('post_class', array($this, 'adeline_add_product_entry_classes'), 40, 3);
            add_filter('product_cat_class', array($this, 'adeline_product_cat_class'));
            // Sale badge content
            add_filter('woocommerce_sale_flash', array($this, 'adeline_sale_flash'), 10, 3);
            // Add links Login/Register on the my account page
            add_action('woocommerce_before_customer_login_form', array($this, 'adeline_login_register_links'));
            // Distraction free cart/checkout
            add_filter('adeline_display_top_bar', array($this, 'adeline_distraction_free'), 11);
            add_filter('adeline_display_navigation', array($this, 'adeline_distraction_free'), 11);
            add_filter('osh_enable_sticky_header', array($this, 'adeline_distraction_free'), 11);
            add_filter('osp_display_side_panel', array($this, 'adeline_distraction_free'), 11);
            add_filter('adeline_display_page_header', array($this, 'adeline_distraction_free'), 11);
            add_filter('adeline_display_footer_widgets', array($this, 'adeline_distraction_free'), 11);
            add_filter('adeline_display_scroll_up_button', array($this, 'adeline_distraction_free'), 11);
            add_filter('osh_header_sticky_logo', array($this, 'adeline_distraction_free'), 11);
            add_filter('ofc_display_footer_callout', array($this, 'adeline_distraction_free'), 11);
            // Add checkout timeline template
            add_action('woocommerce_before_checkout_form', array($this, 'adeline_checkout_timeline'), 10);
            // Change checkout template
            add_filter('woocommerce_locate_template', array($this, 'adeline_multistep_checkout'), 10, 3);
            // Checkout hack
            remove_action('woocommerce_checkout_order_review', 'woocommerce_order_review', 10);
            remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);
            remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10);
            remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
            add_action('adeline_woocommerce_checkout_order_review', 'woocommerce_order_review', 20);
            add_action('adeline_woocommerce_checkout_payment', 'woocommerce_checkout_payment', 10);
            add_action('adeline_checkout_login_form', array($this, 'adeline_checkout_login_form'), 10);
            add_action('adeline_woocommerce_checkout_coupon', 'woocommerce_checkout_coupon_form', 10);
            // Prevent empty shipping tab
            add_filter('woocommerce_enable_order_notes_field', '__return_true');
            // Support to WooCommerce secure submit gateway
            if (class_exists('WC_Gateway_SecureSubmit')) {
                $secure_submit_options = get_option('woocommerce_securesubmit_settings');
                if (!empty($secure_submit_options['use_iframes']) && 'yes' == $secure_submit_options['use_iframes']) {
                    add_filter('option_woocommerce_securesubmit_settings', array($this, 'adeline_woocommerce_securesubmit_support'), 10, 2);
                }
            }
            // Add new typography settings
            add_filter('adeline_typography_settings', array($this, 'adeline_typography_settings'));
            // WooCommerce Match Box extension single product layout support.
            add_action('woocommerce_match_box_single_product_layout', array($this, 'adeline_remove_wc_match_box_single_product_summary'), 10);
        } // End __construct
        /*-------------------------------------------------------------------------------*/
        /* -  Start Class Functions
        /*-------------------------------------------------------------------------------*/
        /**
         * Runs on Init.
         * You can't remove certain actions in the constructor because it's too early.
         *
         * @since 1.0
         */
        public function init() {
            // Remove WooCommerce breadcrumbs
            remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
            // Alter upsells display
            remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
            if ('0' != adeline_get_option_value('woo_product_upsels_count', '', '3')) {
                add_action('woocommerce_after_single_product_summary', array($this, 'adeline_upsell_display'), 15);
            }
            // Alter cross-sells display
            remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
            if ('0' != adeline_get_option_value('woocommerce_cross_sells_count', '', '2')) {
                add_action('woocommerce_cart_collaterals', array($this, 'adeline_cross_sell_display'));
            }
            // Remove loop product sale badge
            remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
            // Remove loop product thumbnail function and add our own that pulls from template parts
            remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
            add_action('woocommerce_before_shop_loop_item_title', array($this, 'adeline_loop_product_thumbnail'), 10);
            // Remove related products if is set to no
            if (!adeline_get_option_value('woo_product_related_display')) {
                remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
            }
            // Remove orderby if disabled
            if (!adeline_get_option_value('woo_products_toolbar_sort')) {
                remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
            }
            // Add result count if not disabled
            if (adeline_get_option_value('woo_products_toolbar_results_count') == true) {
                add_action('woocommerce_before_shop_loop', array($this, 'adeline_result_count'), 31);
            }
            // Remove default product result/link/title/rating/price
            remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
            remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
            remove_action('woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10);
            remove_action('woocommerce_after_subcategory', 'woocommerce_template_loop_category_link_close', 10);
            remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
            remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
            remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
            if (defined('ELEMENTOR_WOOSTORE__FILE__')) {
                remove_action('woocommerce_after_shop_loop_item_title', 'woostore_output_product_excerpt', 35);
                add_action('woocommerce_after_shop_loop_item', 'woostore_output_product_excerpt', 21);
            }
            if (class_exists('WooCommerce_Germanized')) {
                remove_action('woocommerce_after_shop_loop_item', 'woocommerce_gzd_template_single_shipping_costs_info', 7);
                remove_action('woocommerce_after_shop_loop_item', 'woocommerce_gzd_template_single_tax_info', 6);
                remove_action('woocommerce_single_product_summary', 'woocommerce_gzd_template_single_legal_info', 12);
                add_action('adeline_after_archive_product_inner', array($this, 'adeline_woocommerce_germanized'));
                add_action('adeline_after_single_product_price', 'woocommerce_gzd_template_single_legal_info');
            }
        }
        /**
         * Pagination.
         *
         * @since 1.0
         */
        public function adeline_shop_pagination() {
            if ('infinite_scroll' == adeline_get_option_value('woo_products_pagination_style')) {
                remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
                add_action('woocommerce_after_shop_loop', array($this, 'adeline_infinite_pagination'), 10);
            }
            if ('load_more' == adeline_get_option_value('woo_products_pagination_style')) {
                remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
                add_action('woocommerce_after_shop_loop', array($this, 'adeline_loadmore_pagination'), 10);
            }
        }
        /**
         * Infinite scroll pagination.
         *
         * @since 1.0
         */
        public static function adeline_infinite_pagination() {
            global $wp_query;
            if ($wp_query->max_num_pages <= 1) {
                return;
            }
            // Load infinite scroll script
            wp_enqueue_script('infinitescroll');
            // Last text
            $last = adeline_get_option_value('woo_products_infinite_scroll_last_text');
            $last = $last ? $last : esc_html__('End of content', 'adeline');
            // Error text
            $error = adeline_get_option_value('woo_products_infinite_scroll_error_text');
            $error = $error ? $error : esc_html__('No more pages to load', 'adeline');
            // Output pagination HTML
             ?>

<div class="portfolio-pagination-wrapper">
  <div class="scroller-status">
    <div class="loader-ellips infinite-scroll-request"> <span class="loader-ellips__dot"></span> <span class="loader-ellips__dot"></span> <span class="loader-ellips__dot"></span> <span class="loader-ellips__dot"></span> </div>
    <p class="scroller-status__message infinite-scroll-last"><?php echo esc_attr($last); ?></p>
    <p class="scroller-status__message infinite-scroll-error"><?php echo esc_attr($error); ?></p>
  </div>
  <div class="woo-infinite-scroll-nav clr">
    <div class="alignleft newer-posts"><?php echo get_previous_posts_link('<i class="dpr-icon-angle-double-left"></i> ' . esc_html__('Newer Posts', 'adeline')); ?></div>
    <div class="alignright older-posts"><?php echo get_next_posts_link(esc_html__('Older Posts', 'adeline') . ' <i class="dpr-icon-angle-double-right"></i>', $wp_query->max_num_pages); ?></div>
  </div>
</div>
<?php
        }
        /**
         * Infinite scroll pagination.
         *
         * @since 1.0
         */
        public static function adeline_loadmore_pagination() {
            global $wp_query;
            if ($wp_query->max_num_pages <= 1) {
                return;
            }
            // Load infinite scroll script
            wp_enqueue_script('infinitescroll');
            $button_text = adeline_get_option_value('woo_pagination_loadmore_button_text', '', esc_html__('Load More Products', 'adeline'));
            // Last text
            $last = adeline_get_option_value('woo_pagination_loadmore_nomore_text', '', esc_html__('No More Products', 'adeline'));
            $last = $last ? $last : esc_html__('No More Products', 'adeline');
            // Error text
            $error = adeline_get_option_value('woo_pagination_loadmore_nomore_text');
            $error = $error ? $error : esc_html__('No more products to load', 'adeline');
            // Output pagination HTML
            
?>
<div class="portfolio-pagination-wrapper">
  <div class="scroller-status">
    <div class="loader-ellips infinite-scroll-request"> <span class="loader-ellips__dot"></span> <span class="loader-ellips__dot"></span> <span class="loader-ellips__dot"></span> <span class="loader-ellips__dot"></span> </div>
    <p class="scroller-status__message infinite-scroll-last"><?php echo esc_attr($last); ?></p>
    <p class="scroller-status__message infinite-scroll-error"><?php echo esc_attr($error); ?></p>
  </div>
  <div class="dp-adeline-loadmore-wrapper">
    <button class="dp-adeline-loadmore-button"><span class="dp-adeline-loadmore-button-text"><?php echo esc_html($button_text) ?></span></button>
  </div>
  <div class="woo-load-more-scroll-nav clr">
    <div class="alignleft newer-posts"><?php echo get_previous_posts_link('<i class="dpr-icon-angle-double-left"></i> ' . esc_html__('Newer Posts', 'adeline')); ?></div>
    <div class="alignright older-posts"><?php echo get_next_posts_link(esc_html__('Older Posts', 'adeline') . ' <i class="dpr-icon-angle-double-right"></i>', $wp_query->max_num_pages); ?></div>
  </div>
</div>
<?php
        }
        /**
         * Helper method to get the version of the currently installed WooCommerce.
         *
         * @since 1.0
         * @return string woocommerce version number or null.
         */
        public static function adeline_get_wc_version() {
            return defined('WC_VERSION') && WC_VERSION ? WC_VERSION : null;
        }
        /**
         * Remove general settings from Woo Admin panel.
         *
         * @since 1.0
         */
        public static function adeline_remove_general_settings($settings) {
            $remove = array('woocommerce_enable_lightbox');
            foreach ($settings as $key => $val) {
                if (isset($val['id']) && in_array($val['id'], $remove)) {
                    unset($settings[$key]);
                }
            }
            return $settings;
        }
        /**
         * Remove product settings from Woo Admin panel.
         *
         * @since 1.0
         */
        public static function adeline_remove_product_settings($settings) {
            $remove = array('woocommerce_enable_lightbox');
            foreach ($settings as $key => $val) {
                if (isset($val['id']) && in_array($val['id'], $remove)) {
                    unset($settings[$key]);
                }
            }
            return $settings;
        }
        /**
         * Content wrapper.
         *
         * @since 1.0
         */
        public static function adeline_content_wrapper() {
            get_template_part('woocommerce/wc-content-wrapper');
        }
        /**
         * Content wrapper end.
         *
         * @since 1.0
         */
        public static function adeline_content_wrapper_end() {
            get_template_part('woocommerce/wc-content-wrapper-end');
        }
        /**
         * Body classes
         *
         * @since 1.0
         */
        public static function adeline_body_class($classes) {
            // If dropdown categories widget style
            if ('dropdown' == adeline_get_option_value('woo_cat_widget_style')) {
                $classes[] = 'woo-dropdown-cat';
            }
            // Distraction free class
            if ((is_cart() && true == adeline_get_option_value('woo_distraction_free_cart')) || (is_checkout() && true == adeline_get_option_value('woo_distraction_free_checkout'))) {
                $classes[] = 'distraction-free';
            }
            // If thumb slider active
            if ('slider' == adeline_get_option_value('woo_products_image_style', '', 'slider')) {
                $classes[] = 'woo-thumb-slider-active';
            }
            // Return
            return $classes;
        }
        /**
         * Register new WooCommerce sidebar.
         *
         * @since 1.0
         */
        public static function adeline_register_woocommerce_sidebar() {
            // Return if custom sidebar disabled
            if (adeline_get_option_value('woocommerce_custom_sidebar') != true) {
                return;
            }
            // Register new woocommerce_sidebar widget area
            register_sidebar(array('name' => esc_html__('WooCommerce Sidebar', 'adeline'), 'id' => 'woocommerce_sidebar', 'description' => esc_html__('Widgets in this area are used in custom woocommerce sidebar.', 'adeline'), 'before_widget' => '<div class="sidebar-box %2$s clr">', 'after_widget' => '</div>', 'before_title' => '<h4 class="widget-title">', 'after_title' => '</h4>',));
        }
        /**
         * Display WooCommerce sidebar.
         *
         * @since 1.0
         */
        public static function adeline_display_woocommerce_sidebar($sidebar) {
            // Alter sidebar display to show woocommerce_sidebar where needed
            if (adeline_get_option_value('woocommerce_custom_sidebar') == true && is_woocommerce() && is_active_sidebar('woocommerce_sidebar')) {
                $sidebar = 'woocommerce_sidebar';
            }
            // Return correct sidebar
            return $sidebar;
        }
        /**
         * Tweaks the post layouts for WooCommerce archives and single product posts.
         *
         * @since 1.0
         */
        public static function adeline_layouts($class) {
            if (adeline_is_woo_shop() || adeline_is_woo_tax()) {
                $class = adeline_get_option_value('woo_page_content_layout', '', 'right-sidebar');
            } elseif (adeline_is_woo_single()) {
                $class = adeline_get_option_value('woo_single_page_content_layout', '', 'right-sidebar');
            }
            if (adeline_get_option_value('woo_page_content_layout', '', 'right-sidebar') == 'right-sidebar' && !is_active_sidebar('sidebar')) $class = 'full-width';
            return $class;
        }
        /**
         * Set correct both sidebars layout style.
         *
         * @since 1.0
         */
        public static function adeline_bs_class($class) {
            if (adeline_is_woo_shop() || adeline_is_woo_tax()) {
                $class = adeline_get_option_value('woo_page_both_sidebars_column_order', '', 'order-scs');
            } elseif (adeline_is_woo_single()) {
                $class = adeline_get_option_value('woo_single_page_both_sidebars_column_order', '', 'order-scs');
            }
            return $class;
        }
        /**
         * Set woo pages width.
         *
         * @since 1.0
         */
        public static function adeline_woo_page_width($classes) {
            if (adeline_is_woo_shop() || adeline_is_woo_tax()) {
                $classes[] = 'content-width-' . adeline_get_option_value('woo_page_content_width', '', 'boxed');
            } elseif (adeline_is_woo_single()) {
                $classes[] = 'content-width-' . adeline_get_option_value('woo_single_page_content_width', '', 'boxed');
            }
            return $classes;
        }
        /**
         * Add Custom WooCommerce CSS.
         *
         * @since 1.0
         */
        public static function adeline_add_custom_scripts() {
            // Register WooCommerce styles
            wp_enqueue_style('dpr-adeline-woocommerce', ADELINE_CSS_DIR_URI . 'woo/woocommerce.min.css');
            wp_enqueue_style('dpr-adeline-woo-star-font', ADELINE_CSS_DIR_URI . 'woo/woo-star-font.min.css');
            // If rtl
            if (is_RTL()) {
                wp_enqueue_style('dpr-adeline-woocommerce-rtl', ADELINE_CSS_DIR_URI . 'woo/woocommerce-rtl.css');
            }
            // If dropdown category widget style
            if ('dropdown' == adeline_get_option_value('woo_cat_widget_style')) {
                wp_enqueue_script('dpr-adeline-woo-cat-widget', ADELINE_JS_DIR_URI . 'vendors/woo/woo-cat-widget.min.js', array('jquery'), ADELINE_THEME_VERSION, true);
            }
            // If vertical thumbnails style
            if ('vertical' == adeline_get_option_value('woo_product_thumbs_layout')) {
                wp_enqueue_script('dpr-adeline-woo-thumbnails', ADELINE_JS_DIR_URI . 'vendors/woo/woo-thumbnails.min.js', array('jquery'), ADELINE_THEME_VERSION, true);
            }
            // If quick view
            wp_enqueue_script('dpr-adeline-woo-quick-view', ADELINE_JS_DIR_URI . 'vendors/woo/woo-quick-view.min.js', array('jquery'), ADELINE_THEME_VERSION, true);
            wp_enqueue_style('dpr-adeline-woo-quick-view', ADELINE_CSS_DIR_URI . 'woo/woo-quick-view.min.css');
            wp_enqueue_script('wc-add-to-cart-variation');
            wp_enqueue_script('flexslider');
            // If whislist
            if (class_exists('TInvWL_Wishlist')) {
                wp_enqueue_style('dpr-adeline-wishlist', ADELINE_CSS_DIR_URI . 'woo/wishlist.min.css');
            }
            // If single product ajax add to cart
            if (adeline_get_option_value('woo_product_ajax_add_to_cart') == true && adeline_is_woo_single()) {
                wp_enqueue_script('dpr-adeline-woo-ajax-addtocart', ADELINE_JS_DIR_URI . 'vendors/woo/woo-ajax-add-to-cart.min.js', array('jquery'), ADELINE_THEME_VERSION, true);
            }
            // If display cart when product added
            if (adeline_get_option_value('open_menu_cart_when_product_added') == true) {
                wp_enqueue_script('dpr-adeline-woo-display-cart', ADELINE_JS_DIR_URI . 'vendors/woo/woo-display-cart.min.js', array('jquery'), ADELINE_THEME_VERSION, true);
            }
            // If mobile menu mini cart
            if (adeline_get_option_value('add_mobile_mini_cart') == true) {
                wp_enqueue_script('dpr-adeline-woo-mini-cart', ADELINE_JS_DIR_URI . 'vendors/woo/woo-mini-cart.min.js', array('jquery'), ADELINE_THEME_VERSION, true);
            }
            // If multi step checkout
            if (is_checkout()) {
                wp_enqueue_style('dpr-adeline-woo-multistep-checkout', ADELINE_CSS_DIR_URI . 'woo/woo-multistep-checkout.min.css');
                $woo_deps = array('jquery', 'wc-checkout', 'wc-country-select');
                if (class_exists('WC_Ship_Multiple')) {
                    $woo_deps[] = 'wcms-country-select';
                }
                wp_enqueue_script('dpr-adeline-woo-multistep-checkout', ADELINE_JS_DIR_URI . 'vendors/woo/woo-multistep-checkout.min.js', $woo_deps, ADELINE_THEME_VERSION, true);
            }
        }
        /**
         * Localize array.
         *
         * @since 1.0
         */
        public static function adeline_localize_array($array) {
            // If quick view
            $array['ajax_url'] = admin_url('admin-ajax.php');
            // If single product ajax add to cart
            if (true == adeline_get_option_value('woo_product_ajax_add_to_cart')) {
                $array['ajax_url'] = admin_url('admin-ajax.php');
                $array['is_cart'] = is_cart();
                $array['cart_url'] = apply_filters('adeline_woocommerce_add_to_cart_redirect', wc_get_cart_url());
                $array['view_cart'] = esc_attr__('View cart', 'adeline');
            }
            $array['login_reminder_enabled'] = 'yes' == get_option('woocommerce_enable_checkout_login_reminder', 'yes') ? true : false;
            $array['is_logged_in'] = is_user_logged_in();
            $array['no_account_btn'] = esc_html__('I don&rsquo;t have an account', 'adeline');
            $array['next'] = esc_html__('Next', 'adeline');
            return $array;
        }
        /**
         * Get current user ID.
         *
         * @since 1.0
         */
        public static function isAuthorizedUser() {
            return get_current_user_id();
        }
        /**
         * Single Product add to cart ajax request.
         *
         * @since 1.0
         */
        public static function adeline_add_cart_single_product_ajax() {
            $product_id = sanitize_text_field($_POST['product_id']);
            $variation_id = sanitize_text_field($_POST['variation_id']);
            $variation = $_POST['variation'];
            $quantity = sanitize_text_field($_POST['quantity']);
            if ($variation_id) {
                WC()->cart->add_to_cart($product_id, $quantity, $variation_id, $variation);
            } else {
                WC()->cart->add_to_cart($product_id, $quantity);
            }
            die();
        }
        /**
         * Add cart overlay.
         *
         * @since 1.0
         */
        public static function adeline_cart_overlay() {
?>
<div class="dpr-cart-overlay"></div>
<?php
        }
        /**
         * Get mini cart sidebar.
         *
         * @since 1.0
         */
        public static function adeline_get_mini_cart_sidebar() {
            // Define classes
            $classes = array('dpr-adeline-cart-sidebar');
            // Turn classes into string
            $classes = implode(' ', $classes);
            echo '<div id="dpr-adeline-cart-sidebar-wrap">';
            echo '<div class="' . $classes . '">';
            echo '<a href="#" class="dpr-adeline-cart-close">&#215;</a>';
            echo '<h4>' . esc_html__('Cart', 'adeline') . '</h4><div class="divider"></div>';
            echo '<div class="dpr-mini-cart">';
            the_widget('WC_Widget_Cart', 'title=');
            echo '</div>';
            echo '</div>';
            echo '<div class="dpr-adeline-cart-sidebar-overlay"></div>';
            echo '</div>';
        }
        /**
         * Adds an opening div "dpr-adeline-toolbar" around top elements.
         *
         * @since 1.0
         */
        public static function adeline_add_shop_loop_div() {
            echo '<div class="dpr-adeline-toolbar clr">';
        }
        /**
         * Add grid/list buttons.
         *
         * @since 1.0
         */
        public static function adeline_grid_list_buttons() {
            // Return if is not in shop page
            if ((!adeline_is_woo_shop() && !adeline_is_woo_tax()) || true != adeline_get_option_value('woo_products_toolbar_grid')) {
                return;
            }
            // Titles
            $grid_view = esc_html__('Grid view', 'adeline');
            $list_view = esc_html__('List view', 'adeline');
            // Active class
            if ('list' == adeline_get_option_value('woo_products_default_view', '', 'grid')) {
                $list = 'active ';
                $grid = '';
            } else {
                $grid = 'active ';
                $list = '';
            }
            $output = sprintf('<nav class="dpr-adeline-grid-list"><a href="#" id="dpr-adeline-grid" title="%1$s" class="%2$sgrid-btn"><span class="dpr-icon-th"></span></a><a href="#" id="dpr-adeline-list" title="%3$s" class="%4$slist-btn"><span class="dpr-icon-th-list"></span></a></nav>', esc_html($grid_view), esc_attr($grid), esc_html($list_view), esc_attr($list));
            echo wp_kses_post(apply_filters('adeline_grid_list_buttons_output', $output));
        }
        /**
         * Closes the opening div "dpr-adeline-toolbar" around top elements.
         *
         * @since 1.0
         */
        public static function adeline_close_shop_loop_div() {
            echo '</div>';
        }
        /**
         * Add result count.
         *
         * @since 1.0
         */
        public static function adeline_result_count() {
            // Return if is not in shop page
            if (!adeline_is_woo_shop() && !is_product_category() && !is_product_tag()) {
                return;
            }
            get_template_part('woocommerce/result-count');
        }
        /**
         * Returns correct posts per page for the shop
         *
         * @since 1.0
         */
        public static function adeline_loop_shop_per_page() {
            if (adeline_get_option_value('woo_products_toolbar_results_count') == true) {
                $posts_per_page = (isset($_GET['products-per-page'])) ? sanitize_text_field(wp_unslash($_GET['products-per-page'])) : adeline_get_option_value('woo_products_per_page', '', '12');
                if ($posts_per_page == 'all') {
                    $posts_per_page = wp_count_posts('product')->publish;
                }
            } else {
                $posts_per_page = adeline_get_option_value('woo_products_per_page');
                $posts_per_page = $posts_per_page ? $posts_per_page : '12';
            }
            return $posts_per_page;
        }
        /**
         * Change products per row for the main shop.
         *
         * @since 1.0
         */
        public static function adeline_loop_shop_columns() {
            $columns = adeline_get_option_value('woo_products_columns', '', '3');
            $columns = $columns ? $columns : '3';
            return $columns;
        }
        /**
         * Change products per row for upsells.
         *
         * @since 1.0
         */
        public static function adeline_upsell_display() {
            // Get count
            $count = adeline_get_option_value('woo_product_upsels_count', '', '3');
            $count = $count ? $count : '3';
            // Get columns
            $columns = adeline_get_option_value('woo_product_upsels_columns', '', '3');
            $columns = $columns ? $columns : '3';
            // Alter upsell display
            woocommerce_upsell_display($count, $columns);
        }
        /**
         * Change products per row for crossells.
         *
         * @since 1.0
         */
        public static function adeline_cross_sell_display() {
            // Get count
            $count = adeline_get_option_value('woocommerce_cross_sells_count', '', '2');
            $count = $count ? $count : '2';
            // Get columns
            $columns = adeline_get_option_value('woocommerce_cross_sells_columns', '', '2');
            $columns = $columns ? $columns : '2';
            // Alter cross-sell display
            woocommerce_cross_sell_display($count, $columns);
        }
        /**
         * Alter the related product arguments.
         *
         * @since 1.0
         */
        public static function adeline_related_product_args() {
            // Get global vars
            global $product, $orderby, $related;
            // Get posts per page
            $posts_per_page = adeline_get_option_value('woo_product_related_count', '', '3');
            $posts_per_page = $posts_per_page ? $posts_per_page : '3';
            // Get columns
            $columns = adeline_get_option_value('woo_product_related_columns', '', '3');
            $columns = $columns ? $columns : '3';
            // Return array
            return array('posts_per_page' => $posts_per_page, 'columns' => $columns,);
        }
        /**
         * Adds an opening div "product-inner" around product entries.
         *
         * @since 1.0
         */
        public static function adeline_add_shop_loop_item_inner_div() {
            echo '<div class="product-inner clr">';
        }
        /**
         * Adds an out of stock tag to the products.
         *
         * @since 1.0
         */
        public static function adeline_add_out_of_stock_badge() {
            if (function_exists('adeline_woo_product_instock') && !adeline_woo_product_instock()) {
                $label = esc_html__('Out of Stock', 'adeline');
?>
<div class="outofstock-badge"> <?php echo esc_html(apply_filters('adeline_woo_outofstock_text', $label)); ?> </div>
<!-- .product-entry-out-of-stock-badge -->
<?php
            }
        }
        /**
         * Returns our product thumbnail from our template parts based on selected style in theme options.
         *
         * @since 1.0
         */
        public static function adeline_loop_product_thumbnail() {
            if (function_exists('wc_get_template')) {
                // Get product item media style
                $style = adeline_get_option_value('woo_products_image_style', '', 'single-image');
                $style = $style ? $style : 'single-image';
                // Get product item media template part
                wc_get_template('loop/thumbnail/' . $style . '.php');
            }
        }
        /**
         * Archive product content.
         *
         * @since 1.0
         */
        public static function adeline_archive_product_content() {
            if (function_exists('wc_get_template')) {
                wc_get_template('dpr-archive-product.php');
            }
        }
        /**
         * Closes the "product-inner" div around product entries.
         *
         * @since 1.0
         */
        public static function adeline_close_shop_loop_item_inner_div() {
            echo '</div><!-- .product-inner .clr -->';
        }
        /**
         * Quick view button.
         *
         * @since 1.0
         */
        public static function adeline_quick_view_button() {
            global $product;
            $button = '';
            if (adeline_get_option_value('woo_quick_view') == true) {
            $button = '<a href="#" class="dpr-quick-view" data-product_id="' . $product->get_id() . '"><i class="dpr-icon-eye"></i>' . esc_html__('Quick View', 'adeline') . '</a>';
            }
            if (ADELINE_EXT_ACTIVE) {
                echo apply_filters('adeline_woo_quick_view_button_html', $button);
            }
        }
        /**
         * Quick view ajax.
         *
         * @since 1.0
         */
        public static function adeline_product_quick_view_ajax() {
            if (!isset($_REQUEST['product_id'])) {
                die();
            }
            $product_id = intval($_REQUEST['product_id']);
            // wp_query for the product.
            wp('p=' . $product_id . '&post_type=product');
            ob_start();
            get_template_part('woocommerce/quick-view-content');
            echo ob_get_clean();
            die();
        }
        /**
         * Quick view template.
         *
         * @since 1.0
         */
        public static function adeline_quick_view_template() {
            get_template_part('woocommerce/quick-view');
        }
        /**
         * Quick view image.
         *
         * @since 1.0
         */
        public static function adeline_quick_view_image() {
            get_template_part('woocommerce/quick-view-image');
        }
        /**
         * Clear floats after single product summary.
         *
         * @since 1.0
         */
        public static function adeline_clear_summary_floats() {
            echo '<div class="clear-after-summary clr"></div>';
        }
        /**
         * Single product content.
         *
         * @since 1.0
         */
        public static function adeline_single_product_content() {
            if (function_exists('wc_get_template')) {
                wc_get_template('dpr-single-product.php');
            }
        }
        /**
         * Add product navigation.
         *
         * @since 1.0
         */
        public static function adeline_product_next_prev_nav() {
            global $post;
            if (adeline_get_option_value('woo_product_display_navigation') != true) {
                return;
            }
            $next_post = get_next_post(true, '', 'product_cat');
            $prev_post = get_previous_post(true, '', 'product_cat');
?>
<div class="dpr-product-nav-wrap">
  <ul class="dpr-product-nav">
    <?php
            if (is_a($next_post, 'WP_Post')) { ?>
    <li> <a href="<?php echo get_the_permalink($next_post->ID); ?>" class="dpr-nav-link next" rel="next"><i class="dpr-icon-angle-left"></i></a>
      <div class="dpr-nav-thumb"> <a title="<?php echo get_the_title($next_post->ID); ?>" href="<?php echo get_the_permalink($next_post->ID); ?>"><?php echo get_the_post_thumbnail($next_post->ID, apply_filters('single_product_small_thumbnail_size', 'shop_thumbnail')); ?></a> </div>
    </li>
    <?php
            }
            if (is_a($prev_post, 'WP_Post')) {
?>
    <li> <a href="<?php echo get_the_permalink($prev_post->ID); ?>" class="dpr-nav-link prev" rel="next"><i class="dpr-icon-angle-right"></i></a>
      <div class="dpr-nav-thumb"> <a title="<?php echo get_the_title($prev_post->ID); ?>" href="<?php echo get_the_permalink($prev_post->ID); ?>"><?php echo get_the_post_thumbnail($prev_post->ID, apply_filters('single_product_small_thumbnail_size', 'shop_thumbnail')); ?></a> </div>
    </li>
    <?php
            }
?>
  </ul>
</div>
<?php
        }
        /**
         * Add wrap and user info to the account navigation.
         *
         * @since 1.0
         */
        public static function adeline_before_account_navigation() {
            // Name to display
            $current_user = wp_get_current_user();
            if ($current_user->display_name) {
                $name = $current_user->display_name;
            } else {
                $name = esc_html__('Welcome!', 'adeline');
            }
            $name = apply_filters('adeline_user_profile_name_text', $name);
            echo '<div class="woocommerce-MyAccount-tabs clr">';
            echo '<div class="dpr-adeline-user-profile clr">';
            echo '<div class="image">' . get_avatar($current_user->user_email, 128) . '</div>';
            echo '<div class="user-info">';
            echo '<p class="name">' . esc_attr($name) . '</p>';
            echo '<a class="logout" href="' . esc_url(wp_logout_url(get_permalink())) . '">' . esc_html__('Logout', 'adeline') . '</a>';
            echo '</div>';
            echo '</div>';
        }
        /**
         * Add wrap to the account navigation.
         *
         * @since 1.0
         */
        public static function adeline_after_account_navigation() {
            echo '</div>';
        }
        /**
         * Adds container wrap for the thumbnail and title of the categories products.
         *
         * @since 1.0
         */
        public static function adeline_add_container_wrap_category() {
            echo '<div class="product-inner clr">';
        }
        /**
         * Adds a container div before the thumbnail for the categories products.
         *
         * @since 1.0
         */
        public static function adeline_add_div_before_category_thumbnail($category) {
            echo '<div class="woo-entry-image clr">';
            echo '<a href="' . esc_url(get_term_link($category, 'product_cat')) . '">';
        }
        /**
         * Close a container div before the thumbnail for the categories products.
         *
         * @since 1.0
         */
        public static function adeline_close_div_after_category_thumbnail() {
            echo '</a>';
            echo '</div>';
        }
        /**
         * Adds a container div before the thumbnail for the categories products.
         *
         * @since 1.0
         */
        public static function adeline_add_div_before_category_title($category) {
            echo '<div class="woo-entry-inner clr">';
            echo '<a href="' . esc_url(get_term_link($category, 'product_cat')) . '">';
        }
        /**
         * Add description if list view for the categories products.
         *
         * @since 1.0
         */
        public static function adeline_add_category_description($category) {
            // Close category link openend in add_div_before_category_title()
            echo '</a>';
            // Var
            $term = get_term($category->term_id, 'product_cat');
            $description = $term->description;
            // Description
            if (adeline_get_option_value('woo_products_toolbar_grid') == true && $description) {
                echo '<div class="woo-desc">';
                echo '<div class="description">' . wp_kses_post($description) . '</div>';
                echo '</div>';
            }
        }
        /**
         * Close a container div before the thumbnail for the categories products.
         *
         * @since 1.0
         */
        public static function adeline_close_div_after_category_title() {
            echo '</div>';
        }
        /**
         * Close container wrap for the thumbnail and title of the categories products.
         *
         * @since 1.0
         */
        public static function adeline_close_container_wrap_category() {
            echo '</div>';
        }
        /**
         * Before my account login.
         *
         * @since 1.0
         */
        public static function adeline_login_wrap_before() {
            echo '<div class="dpr-adeline-loginform-wrapper">';
        }
        /**
         * After my account login.
         *
         * @since 1.0
         */
        public static function adeline_login_wrap_after() {
            echo '</div>';
        }
        /**
         * Display the categories featured images.
         *
         * @since 1.0
         */
        public static function adeline_woocommerce_category_image() {
            if (is_product_category()) {
                global $wp_query;
                $cat = $wp_query->get_queried_object();
                $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
                $image = wp_get_attachment_url($thumbnail_id);
                if ($image) {
                    echo adeline_get_option_value('woo_category_image') . '<div class="category-image"><img src="' . $image . '" alt="' . $cat->name . '" /></div>';
                }
            }
        }
        /**
         * Tweaks pagination arguments.
         *
         * @since 1.0
         */
        public static function adeline_pagination_args($args) {
            $args['prev_text'] = '<i class="dpr-icon-angle-left"></i>';
            $args['next_text'] = '<i class="dpr-icon-angle-right"></i>';
            return $args;
        }
        /**
         * Alter continue shoping URL.
         *
         * @since 1.0
         */
        public static function adeline_continue_shopping_redirect($return_to) {
            $shop_id = wc_get_page_id('shop');
            if (function_exists('icl_object_id')) {
                $shop_id = icl_object_id($shop_id, 'page');
            }
            if ($shop_id) {
                $return_to = get_permalink($shop_id);
            }
            return $return_to;
        }
        /**
         * Add classes to WooCommerce product entries.
         *
         * @since 1.0
         */
        public static function adeline_add_product_entry_classes($classes, $class = '', $post_id = '') {
            global $product, $woocommerce_loop;
            // Vars
            $content_alignment = adeline_get_option_value('woo_products_content_alignment');
            $content_alignment = $content_alignment ? $content_alignment : 'center';
            $thumbs_layout = adeline_get_option_value('woo_product_thumbs_layout');
            $thumbs_layout = $thumbs_layout ? $thumbs_layout : 'horizontal';
            $tabs_layout = adeline_get_option_value('woo_product_tabs_style');
            $tabs_layout = $tabs_layout ? $tabs_layout : 'horizontal';
            // Product entries
            if ($product && !empty($woocommerce_loop['columns'])) {
                // If has rating
                if ($product->get_rating_count()) {
                    $classes[] = 'has-rating';
                }
                $classes[] = 'col';
                $classes[] = adeline_grid_class($woocommerce_loop['columns']);
                $classes[] = 'dpr-content-' . $content_alignment;
                // If infinite scroll
                if ('infinite_scroll' == adeline_get_option_value('woo_products_pagination_style')) {
                    $classes[] = 'item-entry';
                }
            }
            // Single product
            if (post_type_exists('product')) {
                // Thumbnails layout
                $classes[] = 'dpr-thumbs-layout-' . $thumbs_layout;
                // Tabs layout
                $classes[] = 'dpr-tabs-layout-' . $tabs_layout;
                // If no thumbnails
                $thumbnails = get_post_meta(get_the_ID(), '_product_image_gallery', true);
                if (empty($thumbnails)) {
                    $classes[] = 'has-no-thumbnails';
                }
            }
            // Sale badge style
            $sale_style = adeline_get_option_value('woo_onsale_style');
            if ('circle' == $sale_style) {
                $classes[] = $sale_style . '-sale';
            }
            return $classes;
        }
        /**
         * Remove the category description under the page title on taxonomy.
         *
         * @since 1.0
         */
        public static function adeline_post_subheading($return) {
            if (is_woocommerce() && is_product_taxonomy()) {
                $return = false;
            }
            return $return;
        }
        /**
         * Disables the next/previous links.
         *
         * @since 1.0
         */
        public static function adeline_next_prev($return) {
            if (is_woocommerce() && is_singular('product')) {
                $return = false;
            }
            return $return;
        }
        /**
         * Alter WooCommerce category classes
         *
         * @since 1.0
         */
        public static function adeline_product_cat_class($classes) {
            global $woocommerce_loop;
            $classes[] = 'col';
            $classes[] = adeline_grid_class($woocommerce_loop['columns']);
            return $classes;
        }
        /**
         * Adds wishlist icon to main menu
         *
         * @since 1.0
         */
        public static function adeline_menu_wishlist_icon($items, $args) {
            // Return items if is in the Elementor edit mode, to avoid error
            if (ADELINE_ELEMENTOR_ACTIVE && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
                return $items;
            }
            // Return
            if (!class_exists('TInvWL_Wishlist') || true != adeline_get_option_value('woo_main_menu_wishlist_button') || 'main_menu' != $args->theme_location) {
                return $items;
            }
            // Add wishlist link to menu items
            $items.= '<li class="woo-wishlist-link">' . do_shortcode('[ti_wishlist_products_counter]') . '</li>';
            // Return menu items
            return $items;
        }
        /**
         * Adds wishlist icon to top bar menu
         *
         * @since 1.0
         */
        public static function adeline_menu_wishlist_icon_topbar($items, $args) {
            // Return items if is in the Elementor edit mode, to avoid error
            if (ADELINE_ELEMENTOR_ACTIVE && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
                return $items;
            }
            // Return
            if (!class_exists('TInvWL_Wishlist') || true != adeline_get_option_value('woo_topbar_menu_wishlist_button') || 'topbar_menu' != $args->theme_location) {
                return $items;
            }
            // Add wishlist link to menu items
            $items.= '<li class="woo-wishlist-link">' . do_shortcode('[ti_wishlist_products_counter]') . '</li>';
            // Return menu items
            return $items;
        }
        /**
         * Adds cart icon to menu
         *
         * @since 1.0
         */
        public static function adeline_menu_cart_icon($items, $args) {
            // Return items if is in the Elementor edit mode, to avoid error
            if (ADELINE_ELEMENTOR_ACTIVE && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
                return $items;
            }
            // Only used for the main menu, centered menu right and custom horizontal header menu
            $possible_add_icon = false;
            if ((($args->theme_location == 'main_menu' || $args->theme_location == 'centered_menu_right' || $args->container_id == 'custom-header-menu') && adeline_get_option_value('menu_cart_menu_to display') == 'main') || (($args->theme_location == 'topbar_menu') && adeline_get_option_value('menu_cart_menu_to display') == 'topbar')) {
                $possible_add_icon = true;
            }
            if (!$possible_add_icon) {
                return $items;
            }
            // Get style
            $style = adeline_menu_cart_style();
            $header_style = adeline_header_style();
            // Return items if no style
            if (!$style) {
                return $items;
            }
            // Return items if "hide if empty cart" is checked or is in the Elementor edit mode (to avoid error)
            if (true == adeline_get_option_value('hide_empty_menu_cart') && !WC()->cart->cart_contents_count > 0) {
                return $items;
            }
            // Add cart link to menu items
            if ('full_screen' == $header_style || 'vertical' == $header_style || 'custom_vertical' == $header_style) {
                $items.= '<li class="woo-cart-link"><a href="' . esc_url(wc_get_cart_url()) . '">' . esc_html__('Your cart', 'adeline') . '</a></li>';
            } else {
                $items.= self::get_cart_icon();
            }
            // Return menu items
            return $items;
        }
        /**
         * Add cart icon
         *
         * @since 1.0
         */
        public static function get_cart_icon() {
            // Style
            $style = adeline_menu_cart_style();
            $header_style = adeline_header_style();
            $display = adeline_get_option_value('menu_cart_display_mode');
            // Toggle class
            $toggle_class = 'toggle-cart-widget';
            // Define classes to add to li element
            $classes = array('woo-menu-icon');
            // Add style class
            $classes[] = 'wcmenucart-toggle-' . $style;
            // Add display mode class
            $classes[] = 'wcmenucart-display-' . $display;
            // Prevent clicking on cart and checkout
            if ('custom_link' != $style && (is_cart() || is_checkout())) {
                $classes[] = 'nav-no-click';
            }
            // Add toggle class
            else {
                $classes[] = $toggle_class;
            }
            // Turn classes into string
            $classes = implode(' ', $classes);
            ob_start();
?>
<li class="<?php echo esc_attr($classes); ?>">
  <?php adeline_wcmenucart_menu_item(); ?>
  <?php
            if ('drop_down' == $style && 'full_screen' != $header_style && 'vertical' != $header_style) { ?>
  <div class="current-shop-items-dropdown dpr-mini-cart clr">
    <div class="current-shop-items-inner clr">
      <?php the_widget('WC_Widget_Cart', 'title='); ?>
    </div>
  </div>
  <?php
            } ?>
</li>
<?php
            return ob_get_clean();
        }
        /**
         * Add menu cart item to the Woo fragments so it updates with AJAX
         *
         * @since 1.0
         */
        public static function adeline_menu_cart_icon_fragments($fragments) {
            ob_start();
            adeline_wcmenucart_menu_item();
            $fragments['li.woo-menu-icon a.wcmenucart, .dpr-adeline-mobile-menu-icon a.wcmenucart'] = ob_get_clean();
            return $fragments;
        }
        /**
         * Sale badge content
         *
         * @since 1.0
         */
        public static function adeline_sale_flash() {
            global $product;
            // Value
            if ('grouped' == $product->get_type() || 'percent' != adeline_get_option_value('woo_onsale_content')) {
                $value = esc_html__('Sale', 'adeline');
            } else {
                $s_price = $product->get_sale_price();
                $r_price = $product->get_regular_price();
                $percent = round(((($r_price - $s_price) / $r_price) * 100), 0);
                $value = '-' . esc_html($percent) . '%';
            }
            // Sale flash
            return '<span class="onsale">' . esc_html($value) . '</span>';
        }
        /**
         * Add links Login/Register on the my account page
         *
         * @since 1.0
         */
        public static function adeline_login_register_links() {
            // Var
            $registration = get_option('woocommerce_enable_myaccount_registration');
            // Define classes
            $classes = array('dpr-account-links');
            // If registration disabled
            if ('yes' != $registration) {
                $classes[] = 'registration-disabled';
            }
            // Turn classes into string
            $classes = implode(' ', $classes);
            // Login text
            $text = esc_html__('Login', 'adeline');
            $html = '<ul class="' . $classes . '">';
            $html.= '<li class="login">';
            if ('yes' == $registration) {
                $html.= '<a href="#" class="dpr-account-link current">' . $text . '</a>';
            } else {
                $html.= '<span class="dpr-account-link current">' . $text . '</span>';
            }
            $html.= '</li>';
            // If registration
            if ('yes' == $registration) {
                $html.= '<li class="or">' . esc_html__('Or', 'adeline') . '</li>';
                $html.= '<li class="register">';
                $html.= '<a href="#" class="dpr-account-link">' . esc_html__('Register', 'adeline') . '</a>';
                $html.= '</li>';
            }
            $html.= '</ul>';
            echo wp_kses_post($html);
        }
        /**
         * Distraction free on cart/checkout
         *
         * @since 1.0
         */
        public static function adeline_distraction_free($return) {
            if ((is_cart() && true == adeline_get_option_value('woo_distraction_free_cart')) || (is_checkout() && true == adeline_get_option_value('woo_distraction_free_checkout'))) {
                $return = false;
            }
            // Return
            return $return;
        }
        /**
         * Checkout timeline template.
         *
         * @since 1.0
         */
        public static function adeline_checkout_timeline() {
            get_template_part('woocommerce/checkout/checkout-timeline');
        }
        /**
         * Change checkout template
         *
         * @since 1.0
         */
        public static function adeline_multistep_checkout($template, $template_name, $template_path) {
            if ('checkout/form-checkout.php' == $template_name) {
                $template = ADELINE_THEME_DIR . '/woocommerce/checkout/form-multistep-checkout.php';
            }
            // Return
            return $template;
        }
        /**
         * Checkout login form.
         *
         * @since 1.0
         */
        public static function adeline_checkout_login_form($login_message) {
            woocommerce_login_form(array('message' => $login_message, 'redirect' => wc_get_page_permalink('checkout'), 'hidden' => false));
            // If WooCommerce social login
            if (class_exists('WC_Social_Login')) {
                do_shortcode('[woocommerce_social_login_buttons]');
            }
        }
        /**
         * Support to WooCommerce secure submit gateway
         *
         * @since 1.0
         */
        public static function adeline_woocommerce_securesubmit_support($value, $options) {
            $value['use_iframes'] = 'no';
            return $value;
        }
        /**
         * Add typography options for the WooCommerce product title
         *
         * @since 1.0
         */
        public static function adeline_typography_settings($settings) {
            $settings['woo_product_title'] = array('label' => esc_html__('WooCommerce Product Title', 'adeline'), 'target' => '.woocommerce div.product .product_title', 'defaults' => array('font-size' => '24', 'color' => '#292933', 'line-height' => '1.4', 'letter-spacing' => '0.6',),);
            $settings['woo_product_price'] = array('label' => esc_html__('WooCommerce Product Price', 'adeline'), 'target' => '.woocommerce div.product p.price', 'defaults' => array('font-size' => '36', 'line-height' => '1', 'letter-spacing' => '0',),);
            $settings['woo_product_add_to_cart'] = array('label' => esc_html__('WooCommerce Product Add To Cart', 'adeline'), 'target' => '.woocommerce ul.products li.product .button, .woocommerce ul.products li.product .product-inner .added_to_cart', 'exclude' => array('font-color'), 'defaults' => array('font-size' => '12', 'line-height' => '1.5', 'letter-spacing' => '1',),);
            return $settings;
        }
        /**
         * Supports WooCommerce Match Box extension by removing
         * duplicate single product summary features on the
         * product page.
         *
         * @since 1.0
         * @static
         * @author Sébastien Dumont
         * @global object WC_Product $product
         */
        public static function adeline_remove_wc_match_box_single_product_summary() {
            global $product;
            if ($product->is_type('mix-and-match')) {
                remove_action('woocommerce_single_product_summary', array($this, 'adeline_single_product_content'), 10);
                add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
            }
        }
        /**
         * Compatibility with WooCommerce Germanized.
         *
         * @since 1.0
         */
        public function adeline_woocommerce_germanized() {
            echo '<li class="wc-gzd">';
            wc_get_template('single-product/tax-info.php');
            wc_get_template('single-product/shipping-costs-info.php');
            echo '</li>';
        }
    }
}
new Adeline_WooCommerce_Config();
