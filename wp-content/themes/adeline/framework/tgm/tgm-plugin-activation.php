<?php

/**

 * Recommends plugins for use with the theme via the TGMA Script

 *

 * @package Adeline WordPress theme

 */

function adeline_tgmpa_register()
{

    // Get array of recommended plugins

    $plugins = array(
        array('name' => esc_html__('DPR Adeline Extensions', 'adeline'), 'slug' => 'dpr-adeline-extensions', 'source' => get_template_directory() . '/framework/tgm/plugins/dpr-adeline-extensions.zip', 'required' => true, 'force_activation' => false, 'force_deactivation' => false),
        array('name' => esc_html__('Visual Composer', 'adeline'), 'slug' => 'js_composer', 'source' => get_template_directory() . '/framework/tgm/plugins/js_composer.zip', 'required' => true, 'version' => '', 'force_activation' => false, 'force_deactivation' => false, 'external_url' => esc_url('//codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431')),
        array('name' => esc_html__('Revolution Slider', 'adeline'), 'slug' => 'revslider', 'source' => get_template_directory() . '/framework/tgm/plugins/revslider.zip', 'required' => true, 'version' => '', 'force_activation' => false, 'force_deactivation' => false, 'external_url' => esc_url('//codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380')),
        array('name' => esc_html__('Essential Grid', 'adeline'), 'slug' => 'essential-grid', 'source' => get_template_directory() . '/framework/tgm/plugins/essential-grid.zip', 'required' => true, 'version' => '', 'force_activation' => false, 'force_deactivation' => false, 'external_url' => esc_url('//codecanyon.net/item/essential-grid-wordpress-plugin/7563340')),
        array('name' => esc_html__('Booked', 'adeline'), 'slug' => 'booked', 'source' => get_template_directory() . '/framework/tgm/plugins/booked.zip', 'required' => false, 'version' => '', 'force_activation' => false, 'force_deactivation' => false, 'external_url' => esc_url('//getbooked.io/')),
        array('name' => esc_html__('DPR Proof Callery', 'adeline'), 'slug' => 'dpr-proofgallery', 'source' => get_template_directory() . '/framework/tgm/plugins/dpr-proofgallery.zip', 'required' => false, 'force_activation' => false, 'force_deactivation' => false), array('name' => esc_html__('Safe SVG', 'adeline'), 'slug' => 'safe-svg', 'required' => false),
        array('name' => esc_html__('Contact Form 7', 'adeline'), 'slug' => 'contact-form-7', 'required' => false),
        array('name' => esc_html__('WooCommerce', 'adeline'), 'slug' => 'woocommerce', 'required' => false)
    );

    // If WooCommerce

    if (class_exists('WooCommerce')) {

        // WooCommerce Wishlist plugin, because of free and premium version have different slugs we need to switch dynamically to avoid both version recommendation.

        $wishlist_name = (defined('TINVWL_LOAD_PREMIUM')) ? 'ti-woocommerce-wishlist-premium' : 'ti-woocommerce-wishlist';

        $plugins[] = array('name' => 'WooCommerce Wishlist', 'slug' => $wishlist_name, 'required' => false);

    }

    // Register notice

    tgmpa($plugins, array('id' => 'adeline_theme', 'domain' => 'adeline', 'menu' => 'install-required-plugins', 'has_notices' => true, 'is_automatic' => true, 'dismissable' => true));

}

add_action('tgmpa_register', 'adeline_tgmpa_register');
