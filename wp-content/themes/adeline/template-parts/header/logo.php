<?php
/**
 * Header Logo
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
?>
<?php do_action('adeline_before_logo');?>

<div id="dpr-logo" class="<?php echo esc_attr(adeline_header_logo_classes()); ?>"<?php adeline_schema_markup('logo');?>>
  <?php do_action('adeline_before_logo_inner');?>
  <div id="dpr-logo-inner" class="clr">
    <?php
do_action('adeline_before_logo_img');
echo adeline_header_logo();
adeline_print_mobile_logo();
adeline_print_sticky_logo();
do_action('adeline_after_logo_img');
?>
  </div>
  <!-- #dpr-logo-inner -->

  <?php do_action('adeline_after_logo_inner');?>
</div>
<!-- #dpr-logo -->

<?php do_action('adeline_after_logo');?>
