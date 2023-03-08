<?php

/**

 * Full screen mobile style template part.

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

    exit;

}

if ('fullscreen' != adeline_mobile_menu_style()) {

    return;

}

// Navigation classes

$classes = array('clr');

// If social

if (true == adeline_get_option_value('menu_social_display', '', false)) {

    $classes[] = 'has-social';

}

// Turn classes into space seperated string

$classes = implode(' ', $classes);

// Menu Location

$menu_location = apply_filters('adeline_main_menu_location', 'main_menu');

// Menu arguments

$menu_args = array('theme_location' => $menu_location, 'menu_class' => 'dpr-mobile', 'container' => false, 'fallback_cb' => false);

// Left menu

$left_menu = apply_filters('adeline_center_header_left_menu', 'centered_menu_left');

// Left Menu arguments

$left_menu_args = array('menu' => $left_menu, 'menu_class' => 'dpr-mobile', 'container' => false, 'fallback_cb' => false);

// Right menu

$right_menu = apply_filters('adeline_center_header_right_menu', 'centered_menu_right');

// Right Menu arguments

$right_menu_args = array('menu' => $right_menu, 'menu_class' => 'dpr-mobile', 'container' => false, 'fallback_cb' => false);

// Top bar menu Location

$top_menu_location = 'topbar_menu';

// Menu arguments

$top_menu_args = array('theme_location' => $top_menu_location, 'menu_class' => 'dpr-mobile', 'container' => false, 'fallback_cb' => false);
?>

<div id="mobile-fullscreen" class="clr">
  <div id="mobile-fullscreen-inner" class="clr"> <a href="#" class="close">
    <div class="close-icon-wrapper">
      <div class="close-icon-inner"></div>
    </div>
    </a>
    <nav class="<?php echo esc_attr($classes); ?>"<?php adeline_schema_markup('site_navigation');?>>
      <?php

// If has mobile menu

if (has_nav_menu('mobile_menu')) {

    get_template_part('template-parts/mobile/mobile-nav');

} else {

    // If has center header style

    if ('center' == adeline_header_style()) {

        if ($left_menu) {
            wp_nav_menu($left_menu_args);
        }

        if ($right_menu) {
            wp_nav_menu($right_menu_args);
        }

    } else {

        wp_nav_menu($menu_args);

    }

    // If has top bar menu

    if (has_nav_menu($top_menu_location)) {

        wp_nav_menu($top_menu_args);

    }

}

// Mobile search form

if (adeline_get_option_value('adeline_mobile_menu_search', '', true)) {

    get_template_part('template-parts/mobile/mobile-fullscreen-search');

}

// Social

if (true == adeline_get_option_value('menu_social_display', '', false)) {

    get_template_part('template-parts/header/social');

}
?>
    </nav>
  </div>
</div>
