<?php
/**
 * Perform all main Events Calendar configurations for this theme
 *
 * @package Adeline WordPress theme
 */
// Start and run class
if (!class_exists('Adeline_Tribe_Config')) {
    class Adeline_Tribe_Config {
        /**
         * Main Class Constructor
         *
         * @since 1.0
         */
        public function __construct() {
            add_action('wp_enqueue_scripts', array($this, 'adeline_add_custom_scripts'));
            add_image_size('dpr-full-width-event-image', 1240, 600, true);
            add_image_size('dpr-half-width-event-image', 620, 400, true);
        } // End __construct
        
        /**
         * Add Custom WooCommerce CSS.
         *
         * @since 1.0
         */
        public static function adeline_add_custom_scripts() {
            // Register WooCommerce styles
            wp_enqueue_style('dpr-adeline-tribe-css', ADELINE_CSS_DIR_URI . 'tribe/tribe.min.css');
            // If rtl
            if (is_RTL()) {
                wp_enqueue_style('dpr-adeline-tribe-css-rtl', ADELINE_CSS_DIR_URI . 'tribe/tribe-rtl.css');
            }
        }
    }
}
new Adeline_Tribe_Config();
