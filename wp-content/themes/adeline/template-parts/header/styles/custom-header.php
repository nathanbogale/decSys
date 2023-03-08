<?php
/**
 * Custom Header Style
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Get the template
$is_custom_header_template = false;
if ('custom' == adeline_get_option_value('header_style')) $is_custom_header_template = true;
$header_particle_id = adeline_get_option_value('header_particle_selected');
// Get classes
$classes = array('clr');
// Add container class if the header is not full width
if (true != adeline_get_option_value('header_full_width', '', false)) {
    $classes[] = 'container';
}
// Turn classes into space seperated string
$classes = implode(' ', $classes);
?>
<?php do_action('adeline_before_header_inner'); ?>

<div id="dpr-header-inner" class="<?php echo esc_attr($classes); ?>">
  <?php
if ($is_custom_header_template && !empty($header_particle_id)) {
    echo adeline_particle_content($header_particle_id);
}
?>
</div>
<?php do_action('adeline_after_header_inner'); ?>
