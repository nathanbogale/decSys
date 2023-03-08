<?php
/**
 * Magazine Header Style
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Top row classess
$t_classes = 'clr';
if (true != adeline_get_option_value('header_full_width', '', false)) {
    $t_classes.= ' container';
}
// Bottom header class
$classes = array('bottom-header-wrapper', 'clr');
// Turn classes into space seperated string
$classes = implode(' ', $classes);
?>
<?php do_action('adeline_before_header_inner'); ?>

<div id="dpr-header-inner" class="clr">
  <div class="top-header-wrapper clr">
    <div class="<?php echo esc_attr($t_classes); ?>">
      <div class="top-header-inner clr">
        <div class="top-col logo-col clr">
          <?php get_template_part('template-parts/header/logo'); ?>
        </div>
        <div class="top-col clr">
          <?php get_template_part('template-parts/header/styles/magazine-header-content'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="<?php echo esc_attr($classes); ?>">
    <?php get_template_part('template-parts/header/nav'); ?>
    <?php get_template_part('template-parts/mobile/mobile-icon'); ?>
    <?php get_template_part('template-parts/mobile/mobile-dropdown'); ?>
  </div>
</div>
<!-- #dpr-header-inner -->

<?php do_action('adeline_after_header_inner'); ?>
