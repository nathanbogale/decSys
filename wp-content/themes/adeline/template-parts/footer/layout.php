<?php
/**
 * Footer layout
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
?>

<footer id="footer" class="<?php echo esc_attr(adeline_footer_classes()); ?>"<?php adeline_schema_markup('footer');?>>
  <?php do_action('adeline_before_footer_inner');?>
  <div id="footer-inner" class="clr">
    <?php
// Display the footer widgets if enabled
if (adeline_display_footer_widgets()) {
    get_template_part('template-parts/footer/widgets');
}
// Display the footer bottom if enabled
if (adeline_display_copyright_area()) {
    get_template_part('template-parts/footer/copyright');
}
?>
  </div>
  <!-- #footer-inner -->

  <?php do_action('adeline_after_footer_inner');?>
</footer>
<!-- #footer -->