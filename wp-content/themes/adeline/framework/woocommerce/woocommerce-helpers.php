<?php
/**
 * WooCommerce helper functions
 * This functions only load if WooCommerce is enabled because
 * they should be used within Woo loops only.
 *
 * @package Adeline WordPress theme
 */
/**
 * Creates the WooCommerce link for the navbar
 *
 * @since 1.0
 */
if (!function_exists('adeline_wcmenucart_menu_item')) {
    function adeline_wcmenucart_menu_item() {
        // Return items if "hide if empty cart" is checked (for mobile)
        if (adeline_get_option_value('hide_empty_menu_cart') && !WC()->cart->cart_contents_count > 0) {
            return;
        }
        // Return if is in the Elementor edit mode, to avoid error
        if (ADELINE_ELEMENTOR_ACTIVE && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
            return;
        }
        // Vars
        $icon_style = adeline_get_option_value('menu_cart_style');
        $custom_link = adeline_get_option_value('menu_cart_custom_link');
        // URL
        if ('custom_link' == $icon_style && $custom_link) {
            $url = esc_url($custom_link);
        } else {
            $cart_id = wc_get_page_id('cart');
            if (function_exists('icl_object_id')) {
                $cart_id = icl_object_id($cart_id, 'page');
            }
            $url = get_permalink($cart_id);
        }
        // Cart total
        $display = adeline_get_option_value('menu_cart_display_mode');
        if ('icon_total' == $display) {
            $cart_extra = WC()->cart->get_cart_total();
            $cart_extra = str_replace('amount', 'wcmenucart-details', $cart_extra);
        } elseif ('icon_count' == $display) {
            $cart_extra = '<span class="wcmenucart-details count">' . WC()->cart->get_cart_contents_count() . '</span>';
        } elseif ('icon_count_total' == $display) {
            $cart_extra = '<span class="wcmenucart-details count">' . WC()->cart->get_cart_contents_count() . '</span>';
            $cart_total = WC()->cart->get_cart_total();
            $cart_extra.= str_replace('amount', 'wcmenucart-details', $cart_total);
        } else {
            $cart_extra = '';
        }
        // Get cart icon
        $icon = adeline_get_option_value('menu_cart_icon', '', 'dpr-icon-handbag');
        // If has custom cart icon
        if (adeline_get_option_value('menu_cart_icon', '', 'dpr-icon-handbag') == 'custom') {
            $custom_icon = adeline_get_option_value('menu_cart_custom_icon', '', '');
            if ('' != $custom_icon && 'none' != $custom_icon) {
                $icon = $custom_icon;
            }
        }
        // Cart Icon
        $cart_icon = '<i class="' . esc_attr($icon) . '"></i>';
        $cart_icon = apply_filters('adeline_menu_cart_icon_html', $cart_icon);
?>

<a href="<?php echo esc_url($url); ?>" class="wcmenucart"> <span class="wcmenucart-count"><?php echo wp_kses_post($cart_icon); ?><?php echo wp_kses_post($cart_extra); ?></span> </a>
<?php
    }
}
/**
 * Outputs placeholder image
 *
 * @since 1.0
 */
if (!function_exists('adeline_woo_placeholder_img')) {
    function adeline_woo_placeholder_img() {
        if (function_exists('wc_placeholder_img_src') && wc_placeholder_img_src()) {
            $placeholder = '<div class="woo-entry-image clr"><img src="' . wc_placeholder_img_src() . '" alt="' . esc_attr__('Placeholder Image', 'adeline') . '" class="woo-entry-image-main" /></div>';
            $placeholder = apply_filters('adeline_woo_placeholder_img_html', $placeholder);
            if ($placeholder) {
                echo wp_kses_post($placeholder);
            }
        }
    }
}
/**
 * Check if product is in stock
 *
 * @since 1.0
 */
if (!function_exists('adeline_woo_product_instock')) {
    function adeline_woo_product_instock($post_id = '') {
        global $post;
        $post_id = $post_id ? $post_id : $post->ID;
        $stock_status = get_post_meta($post_id, '_stock_status', true);
        if ('instock' == $stock_status) {
            return true;
        } else {
            return false;
        }
    }
}
/**
 * Returns catalog product elements positioning
 *
 * @since 1.0
 */
if (!function_exists('adeline_archive_product_elements')) {
    function adeline_archive_product_elements() {
        // Get elements from template options
        $elements = adeline_get_option_value('woo_products_elements', 'enabled');
        if (is_array($elements)) {
            $elements = array_keys($elements);
        }
        // Default elements if no theme options elements settings
        if (empty($elements)) {
            $elements = array('image', 'category', 'title', 'price-rating', 'description', 'button');
        }
        $elements = apply_filters('adeline_archive_product_elements', $elements);
        // Return sections
        return $elements;
    }
}
/**
 * Returns single product summary elements positioning
 *
 * @since 1.0
 */
if (!function_exists('adeline_single_product_elements')) {
    function adeline_single_product_elements() {
        // Get elements from template options
        $elements = adeline_get_option_value('woo_product_elements', 'enabled');
        if (is_array($elements)) {
            $elements = array_keys($elements);
        }
        // Default elements if no theme options elements settings
        if (empty($elements)) {
            $elements = array('title', 'rating', 'price', 'excerpt', 'quantity-button', 'meta', 'sharing');
        }
        $elements = apply_filters('adeline_single_product_elements', $elements);
        // Return sections
        return $elements;
    }
}

if (!function_exists('adeline_update_woocommerce_version')) {
	
	function adeline_update_woocommerce_version() {
			if(class_exists('WooCommerce')) {
				global $woocommerce;

				if(version_compare(get_option('woocommerce_db_version', null), $woocommerce->version, '!=')) {
					update_option('woocommerce_db_version', $woocommerce->version);

					if(! wc_update_product_lookup_tables_is_running()) {
						wc_update_product_lookup_tables();
					}
				}			
			}		
		}

}