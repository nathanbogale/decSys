<?php
/**
 * Footer widgets
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Get the template
$is_custom_footer_template = false;
if ('custom' == adeline_get_option_value('footer_content')) {
    $is_custom_footer_template = true;
}

$particle_id     = adeline_get_option_value('footer_particle_selected');
$fullwidth_class = '';
// Get footer widgets columns
$columns    = apply_filters('adeline_footer_columns', adeline_get_option_value('footer_columns', '', '4'));
$grid_class = adeline_grid_class($columns);
// Responsive columns
$tablet_columns = adeline_get_option_value('footer_tablet_columns', '', '');
$mobile_columns = adeline_get_option_value('footer_mobile_columns', '', '');
// Visibility
$visibility = adeline_get_option_value('footer_visibility', '', 'all-devices');
// Classes
$wrap_classes = array('clr');
if (!empty($tablet_columns)) {
    $wrap_classes[] = 'tablet-' . $tablet_columns . '-col';
}
if (!empty($mobile_columns)) {
    $wrap_classes[] = 'mobile-' . $mobile_columns . '-col';
}
if ('all-devices' != $visibility) {
    $wrap_classes[] = $visibility;
}
if (adeline_get_option_value('force_full_width_footer') && adeline_get_option_value('footer_content') == 'widgets') {
    $wrap_classes[] = 'full-width-widgets';
}
$wrap_classes = implode(' ', $wrap_classes);
?>
<?php do_action('adeline_before_footer_widgets');?>

<div id="footer-widgets" class="dpr-adeline-row <?php echo esc_attr($wrap_classes); ?>">
  <?php do_action('adeline_before_footer_widgets_inner');?>
  <?php if (true != adeline_get_option_value('force_full_width_footer')) {?>
  <div class="container">
    <?php
}?>
    <?php
// Check if there is a template for the footer
if ($is_custom_footer_template && !empty($particle_id)) {
    echo adeline_particle_content($particle_id);
    // Display widgets

} else {
    // Footer box 1
    ?>
    <div class="footer-box <?php echo esc_attr($grid_class); ?> col col-1">
      <?php dynamic_sidebar('footer-one');?>
    </div>
    <!-- .footer-one-box -->

    <?php
// Footer box 2
    if ($columns > '1'): ?>
    <div class="footer-box <?php echo esc_attr($grid_class); ?> col col-2">
      <?php dynamic_sidebar('footer-two');?>
    </div>
    <!-- .footer-one-box -->

    <?php
endif;?>
    <?php
// Footer box 3
    if ($columns > '2'): ?>
    <div class="footer-box <?php echo esc_attr($grid_class); ?> col col-3 ">
      <?php dynamic_sidebar('footer-three');?>
    </div>
    <!-- .footer-one-box -->

    <?php
endif;?>
    <?php
// Footer box 4
    if ($columns > '3'): ?>
    <div class="footer-box <?php echo esc_attr($grid_class); ?> col col-4">
      <?php dynamic_sidebar('footer-four');?>
    </div>
    <!-- .footer-box -->

    <?php
endif;?>
    <?php
}
?>
    <?php if (true != adeline_get_option_value('force_full_width_footer')) {?>
  </div>
  <?php
}?>
  <!-- .container -->

  <?php do_action('adeline_after_footer_widgets_inner');?>
</div>
<!-- #footer-widgets -->

<?php do_action('adeline_after_footer_widgets');?>
