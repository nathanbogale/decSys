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
// Get classes
$classes = array('clr');
// Turn classes into space seperated string
$classes = implode(' ', $classes);
?>
<?php do_action('adeline_before_header_inner'); ?>

<div id="dpr-header-inner" class="<?php echo esc_attr($classes); ?>">
  <?php
if (true == adeline_get_option_value('vertical_custom_logo')) {
?>
  <div id="dpr-logo" class="clr">
    <div id="dpr-logo-inner" class="clr"> <?php echo adeline_header_vertical_logo(); ?> </div>
    <!-- #dpr-logo-inner --> 
    
  </div>
  <?php
} else {
    get_template_part('template-parts/header/logo');
} ?>
  <?php get_template_part('template-parts/header/nav'); ?>
  <?php
// Search form
if (true == adeline_get_option_value('vertical_header_search')) {
    get_template_part('template-parts/header/styles/vertical-header-search');
}
?>
  <?php
// Social menu
if (true == adeline_get_option_value('menu_social_display', '', false)) {
    get_template_part('template-parts/header/social');
}
?>
  <?php get_template_part('template-parts/mobile/mobile-icon'); ?>
</div>
<?php get_template_part('template-parts/header/styles/vertical-header-toggle'); ?>
<?php get_template_part('template-parts/mobile/mobile-dropdown'); ?>
<?php do_action('adeline_after_header_inner'); ?>
