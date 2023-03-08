<?php
/**
 * Top Logo Header Style
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Bottom header class
$classes = array('bottom-header-wrapper', 'clr');
// Turn classes into space seperated string
$classes = implode(' ', $classes);
?>
<?php do_action('adeline_before_header_inner'); ?>

<div id="dpr-header-inner" class="clr">
  <div class="top-header-wrapper clr">
    <div class="container clr">
      <div class="top-header-inner clr">
        <div class="top-col col-1 clr"> </div>
        <div class="top-col logo-col col-2 clr">
          <?php get_template_part('template-parts/header/logo'); ?>
        </div>
        <div class="top-col col-3 clr">
          <?php
if (true == adeline_get_option_value('menu_social_display', '', false)) {
    get_template_part('template-parts/header/social');
}
?>
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
