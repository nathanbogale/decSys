<?php

/**

 * Mobile Menu icon

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

    exit;

}

// Menu Location

$menu_location = apply_filters('adeline_main_menu_location', 'main_menu');

// Multisite global menu

$ms_global_menu = apply_filters('adeline_ms_global_menu', false);

// Display if menu is defined

if (has_nav_menu($menu_location) || $ms_global_menu):

    // Custom hamburger button

    $hamb = adeline_get_option_value('mobile_menu_icon', '', 'default');

    // Get menu text

    $text = adeline_get_option_value('mobile_menu_text');

    $text = adeline_theme_opt_translation('mobile_menu_text', $text);

    $text = $text ? $text : esc_html__('Menu', 'adeline');

    // Get close menu text

    $close_text = adeline_get_option_value('menu_close_text');

    $close_text = adeline_theme_opt_translation('menu_close_text', $close_text);

    $close_text = $close_text ? $close_text : esc_html__('Close', 'adeline');

    if (ADELINE_WOOCOMMERCE_ACTIVE) {

        // Get cart icon

        $woo_icon = adeline_get_option_value('menu_cart_icon', '', 'dpr-icon-handbag');

        // If has custom cart icon

        if (adeline_get_option_value('menu_cart_icon', '', 'dpr-icon-handbag') == 'custom') {

            $custom_icon = adeline_get_option_value('menu_cart_custom_icon', '', '');

            if ('' != $custom_icon && 'none' != $custom_icon) {

                $woo_icon = $custom_icon;

            }

        }

        // Cart Icon

        $cart_icon = '<i class="' . esc_attr($woo_icon) . '"></i>';

        $cart_icon = apply_filters('adeline_menu_cart_icon_html', $cart_icon);

    }?>

        <div id="dpr-adeline-mobile-menu-icon" class="clr">
          <?php do_action('adeline_before_mobile_icon');?>
          <?php

    // If big header style

    if ('big' == adeline_header_style()) {?>
          <div class="container clr">
            <?php }?>
            <?php

    // Cart icon

    if (ADELINE_WOOCOMMERCE_ACTIVE

    && 'disabled' != adeline_get_option_value('menu_cart_display_mode', '', 'icon_count')) {?>
            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('cart'))); ?>" class="mobile-wcmenucart"><?php echo wp_kses($cart_icon,'styled_text'); ?></a>
            <?php }?>
            <a href="#" class="mobile-menu" aria-label="<?php echo esc_html__('Menu', 'adeline') ?>">
            <?php

    if ('default' != $hamb) {
        ?>
            <div class="hamburger hamburger--<?php echo esc_attr($hamb); ?>">
              <div class="hamburger-box">
                <div class="hamburger-inner"></div>
              </div>
            </div>
            <?php

    } else {
        ?>
            <i class="dpr-icon-menu"></i>
            <?php

    }

    // Mobile menu text

    if (adeline_get_option_value('mobile_menu_text_display')) {
        ?>
            <span class="dpr-adeline-text"><?php echo do_shortcode($text); ?></span>
            <?php

        // Display close text if drop down mobile style

        if ('dropdown' == adeline_get_option_value('mobile_menu_style', '', 'sidebar')) {
            ?>
            <span class="dpr-adeline-close-text"><?php echo do_shortcode($close_text); ?></span>
            <?php

        }

    }
    ?>
            </a>
            <?php

    // If big header style

    if ('big' == adeline_header_style()) {?>
          </div>
          <?php }?>
          <?php do_action('adeline_after_mobile_icon');?>
        </div>
        <!-- #dpr-adeline-mobile-menu-navbar -->

        <?php endif;?>
