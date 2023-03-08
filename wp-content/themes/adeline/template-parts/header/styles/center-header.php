<?php
/**
 * Center Header Style
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Get classes
$classes = array('clr');
// Add container class if the header is not full width
if (true != adeline_get_option_value('header_full_width', '', false)) {
    $classes[] = 'container';
}
// Add menus position class
$position = adeline_get_option_value('center_header_menu_alignment', '', 'centered');
$position = $position ? $position : 'centered';
$classes[] = $position;
// Turn classes into space seperated string
$classes = implode(' ', $classes);
// Left menu
$left_menu = apply_filters('adeline_center_header_left_menu', 'centered_menu_left');
// Right menu
$right_menu = apply_filters('adeline_center_header_right_menu', 'centered_menu_right');
?>
<?php do_action('adeline_before_header_inner'); ?>

<div id="dpr-header-inner" class="<?php echo esc_attr($classes); ?>">
  <?php
// If social
if (true == adeline_get_option_value('menu_social_display', '', false)) {
    get_template_part('template-parts/header/social');
}
?>
  <?php
// Get classes for the header menu
$wrap_classes = adeline_header_menu_classes('wrapper');
$inner_classes = adeline_header_menu_classes('inner');
// Get menu classes
$menu_classes = array('main-menu', 'dropdown-menu', 'sf-menu', 'clr');
// Turn menu classes into space seperated string
$menu_classes = implode(' ', $menu_classes);
// Left menu arguments
$left_menu_args = array('theme_location' => $left_menu, 'container' => false, 'fallback_cb' => false, 'items_wrap' => '%3$s', 'link_before' => '<span class="text-wrapper">', 'link_after' => '</span>', 'walker' => new Adeline_Custom_Nav_Walker(),);
// Menu arguments
$right_menu_args = array('theme_location' => $right_menu, 'container' => false, 'fallback_cb' => false, 'items_wrap' => '%3$s', 'link_before' => '<span class="text-wrapper">', 'link_after' => '</span>', 'walker' => new Adeline_Custom_Nav_Walker(),);
get_template_part('template-parts/header/logo');
do_action('adeline_before_nav');
?>
  <div id="dpr-navigation-wrapper" class="<?php echo esc_attr($wrap_classes); ?>">
    <?php do_action('adeline_before_nav_inner'); ?>
    <nav id="dpr-navigation" class="<?php echo esc_attr($inner_classes); ?>"<?php adeline_schema_markup('site_navigation'); ?>>
      <ul class="left-menu <?php echo esc_attr($menu_classes); ?>">
        <?php
// Display menu if defined
if (has_nav_menu($left_menu)) {
    wp_nav_menu($left_menu_args);
}
?>
      </ul>
      <?php do_action('adeline_before_middle__logo'); ?>
      <div class="middle-dpr-logo <?php echo esc_attr(adeline_header_logo_classes()); ?>">
        <?php do_action('adeline_before_middle__logo_inner'); ?>
        <?php echo adeline_header_logo(); ?>
        <?php adeline_print_sticky_logo(); ?>
        <?php do_action('adeline_after_middle_logo_inner'); ?>
      </div>
      <?php do_action('adeline_after_middle_logo'); ?>
      <ul class="right-menu <?php echo esc_attr($menu_classes); ?>">
        <?php
// Display menu if defined
if (has_nav_menu($right_menu)) {
    wp_nav_menu($right_menu_args);
}
?>
      </ul>
      <?php
if (has_nav_menu($right_menu)) {
    // Drop down search
    if ('drop_down' == adeline_menu_search_style()) {
        get_template_part('template-parts/header/search-dropdown');
    }
    // WooCommerce cart
    if ('drop_down' == adeline_menu_cart_style()) {
        get_template_part('template-parts/cart/cart-dropdown');
    }
}
// Search expandable search
if ('expandable_search' == adeline_menu_search_style()) {
    get_template_part('template-parts/header/search-expandable');
}
?>
    </nav>
    <!-- #dpr-navigation -->
    
    <?php do_action('adeline_after_nav_inner'); ?>
  </div>
  <!-- #dpr-navigation-wrapper -->
  
  <?php get_template_part('template-parts/mobile/mobile-icon'); ?>
</div>
<!-- #dpr-header-inner -->

<?php get_template_part('template-parts/mobile/mobile-dropdown'); ?>
<?php do_action('adeline_after_header_inner'); ?>
