<?php
/**
 * Minimal Header Style
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
// Turn classes into space seperated string
$classes = implode(' ', $classes);
do_action('adeline_before_header_inner');
?>

<div id="dpr-header-inner" class="<?php echo esc_attr($classes); ?>">
  <?php get_template_part('template-parts/header/logo'); ?>
  <div class="menu-bar-wrapper clr">
    <div class="menu-bar-inner clr"> <a href="#" class="menu-bar"><span class="opener"></span></a> </div>
  </div>
  <?php
// Social
if (true == adeline_get_option_value('menu_social_display', '', false)) {
    get_template_part('template-parts/header/social');
}
?>
  <?php get_template_part('template-parts/header/nav'); ?>
  <?php get_template_part('template-parts/mobile/mobile-icon'); ?>
</div>
<!-- #dpr-header-inner -->

<?php get_template_part('template-parts/mobile/mobile-dropdown'); ?>
<?php do_action('adeline_after_header_inner'); ?>
