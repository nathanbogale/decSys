<?php
/**
 * Full Screen Header Style
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Get classes
$classes = array('clr');
// Add container class
if (true != adeline_get_option_value('header_full_width', '', false)) {
    $classes[] = 'container';
}
$effect = adeline_get_option_value('fullscreen_appear_effect', '', 'overlay-hugeinc');
// Turn classes into space seperated string
$classes = implode(' ', $classes);
?>
<?php do_action('adeline_before_header_inner'); ?>

<div id="dpr-header-inner" class="<?php echo esc_attr($classes); ?>">
  <?php get_template_part('template-parts/header/logo'); ?>
  <div id="dpr-navigation-wrapper" class="clr">
    <div class="menu-bar-wrapper clr">
      <div class="menu-bar-inner clr"> <a href="#" class="menu-bar"><span class="opener"></span></a> </div>
    </div>
    <div id="full-screen-menu" class="clr <?php echo esc_attr($effect) ?>">
      <div id="full-screen-menu-inner" class="clr">
        <?php get_template_part('template-parts/header/nav'); ?>
      </div>
    </div>
  </div>
  <!-- #dpr-header-wrapper -->
  
  <?php get_template_part('template-parts/mobile/mobile-icon'); ?>
</div>
<!-- #dpr-header-inner -->

<?php get_template_part('template-parts/mobile/mobile-dropdown'); ?>
<?php do_action('adeline_after_header_inner'); ?>
