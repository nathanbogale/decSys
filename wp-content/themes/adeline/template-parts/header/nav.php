<?php
/**
 * Header menu template part.
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Header style
$header_style = adeline_header_style();
// Menu Location
if ('full_screen' == $header_style && has_nav_menu('fullscreen_menu')) { 
$menu_location = apply_filters('adeline_main_menu_location', 'fullscreen_menu');
} else {
$menu_location = apply_filters('adeline_main_menu_location', 'main_menu');
}
// Multisite global menu
$ms_global_menu = apply_filters('adeline_ms_global_menu', false);
// Display menu if defined
if (has_nav_menu($menu_location) || $ms_global_menu):
    // Get classes for the header menu
    $wrap_classes  = adeline_header_menu_classes('wrapper');
    $inner_classes = adeline_header_menu_classes('inner');
    // Get menu classes
    $menu_classes = array('main-menu');
    // If full screen header style
    if ('full_screen' == $header_style) {
        $menu_classes[] = 'fs-dropdown-menu';
    } else {
        $menu_classes[] = 'dropdown-menu';
    }
    // If is not full screen or vertical header style
    if ('full_screen' != $header_style && 'vertical' != $header_style) {
        $menu_classes[] = 'sf-menu';
    }
    // Turn menu classes into space seperated string
    $menu_classes = implode(' ', $menu_classes);
    // Menu arguments
    $menu_args = array('theme_location' => $menu_location, 'menu_class' => $menu_classes, 'container' => false, 'fallback_cb' => false, 'link_before' => '<span class="text-wrapper">', 'link_after' => '</span>', 'walker' => new Adeline_Custom_Nav_Walker());
    do_action('adeline_before_nav');
    // If is not full screen header style
    if ('full_screen' != $header_style) {
        ?>

    <div id="dpr-navigation-wrapper" class="<?php echo esc_attr($wrap_classes); ?>">
    <?php
    }?>
    <?php do_action('adeline_before_nav_inner');?>
    <?php
    // Add container if is magazine header style
    if ('magazine' == $header_style) {
        if (true != adeline_get_option_value('header_full_width', '', false)) {
            ?>
    <div class="container clr">
      <?php
    } else {
            ?>
      <div class="clr">
        <?php
    }
    }?>
        <nav id="dpr-navigation" class="<?php echo esc_attr($inner_classes); ?>"<?php adeline_schema_markup('site_navigation');?>>
          <?php
    // Display global multisite menu
    if (is_multisite() && $ms_global_menu):
        switch_to_blog(1);
        wp_nav_menu($menu_args);
        restore_current_blog();
        // Display this site's menu
    else:
        wp_nav_menu($menu_args);
    endif;
    // If is  top menu header style
    if ('full_screen' != $header_style && 'vertical' != $header_style) {
        // Header search
        if ('drop_down' == adeline_menu_search_style()) {
            get_template_part('template-parts/header/search-dropdown');
        } else if ('expandable_search' == adeline_menu_search_style()) {
        get_template_part('template-parts/header/search-expandable');
    }
}
// WooCommerce cart
if ('drop_down' == adeline_menu_cart_style() && 'full_screen' != $header_style && 'vertical' != $header_style) {
    get_template_part('template-parts/cart/cart-dropdown');
}
// Social links if full screen header style
if ('full_screen' == $header_style && true == adeline_get_option_value('menu_social_display', '', false)) {
    get_template_part('template-parts/header/social');
}
?>
    </nav>
    <!-- #dpr-navigation -->

    <?php
// Add container if is magazine header style
if ('magazine' == $header_style) {?>
  </div>
  <?php
}?>
  <?php do_action('adeline_after_nav_inner');?>
  <?php
// If is not full screen header style
if ('full_screen' != $header_style) {?>
</div>
<!-- #dpr-navigation-wrapper -->

<?php
}?>
<?php do_action('adeline_after_nav');?>
<?php
endif;?>
