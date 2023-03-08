<?php
/**
 * The default template for displaying the footer copyright
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Get copyright text
$copy_text = adeline_get_option_value('copyright_text', '', '&copy; 2020, Adeline Theme by DynamicPress Team');
$copy_text = adeline_theme_opt_translation('adeline_footer_copyright_text', $copy_text);
// Get footer menu location and apply filters for child theming
$menu_location = 'footer_menu';
$menu_location = apply_filters('adeline_footer_menu_location', $menu_location);
// Visibility
$visibility = adeline_get_option_value('copyright_visibility', '', 'all-devices');
// Inner classes
$wrap_classes = array('clr');
if (!has_nav_menu($menu_location)) {
    $wrap_classes[] = 'no-footer-nav';
}
if ('all-devices' != $visibility) {
    $wrap_classes[] = $visibility;
}
$wrap_classes       = implode(' ', $wrap_classes);
$inner_wrap_classes = array('clr');
if (adeline_get_option_value('force_full_width_copyright')) {
    $inner_wrap_classes[] = 'full-width-copyright';
} else {
    $inner_wrap_classes[] = 'container';
}
$inner_wrap_classes = implode(' ', $inner_wrap_classes);
?>
<?php do_action('adeline_before_copyright_area');?>

<div id="copyright-area" class="<?php echo esc_attr($wrap_classes); ?>">
  <?php do_action('adeline_before_copyright_area_inner');?>
  <div id="copyright-area-inner" class="<?php echo esc_attr($inner_wrap_classes); ?>">
    <?php
// Display footer bottom menu if location is defined
if (has_nav_menu($menu_location)):
?>
    <div id="copyright-area-menu" class="navigation clr">
      <?php
// Display footer menu
wp_nav_menu(array('theme_location' => $menu_location, 'sort_column' => 'menu_order', 'fallback_cb' => false, 'depth' => 1));
?>
    </div>
    <!-- #copyright-area-menu -->

    <?php
endif;?>
    <?php
// Display copyright info
if ($copy_text):
?>
    <div id="copyright" class="clr" role="contentinfo"> <?php echo wp_kses_post(do_shortcode($copy_text)); ?> </div>
    <!-- #copyright -->

    <?php
endif;?>
  </div>
  <!-- #copyright-area-inner -->

  <?php do_action('adeline_after_copyright_area_inner');?>
</div>
<!-- #copyright-area -->

<?php do_action('adeline_after_copyright_area');?>
