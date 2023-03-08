<?php
/**
 * Vertical Header Style
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Get the template
$is_custom_header_template = false;
if ('custom_vertical' == adeline_get_option_value('header_style')) $is_custom_header_template = true;
$header_particle_id = adeline_get_option_value('header_particle_selected');
// Get classes
$classes = array('clr');
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
<?php get_template_part('template-parts/header/styles/vertical-header-toggle'); ?>
<?php get_template_part('template-parts/mobile/mobile-dropdown'); ?>
<?php do_action('adeline_after_header_inner'); ?>
