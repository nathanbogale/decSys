<?php
/**
 * The left sidebar containing the widget area.
 *
 * @package Adeline WordPress theme
 */
?>
<?php do_action('adeline_before_sidebar');?>

<aside id="left-sidebar" class="sidebar-container widget-area sidebar-secondary <?php echo esc_attr(adeline_get_left_sidebar_sticky_class()) ?>"<?php adeline_schema_markup('sidebar');?>>
  <?php do_action('adeline_before_sidebar_inner');?>
  <div id="left-sidebar-inner" class="clr">
    <?php
if ($sidebar = adeline_get_second_sidebar()) {
    dynamic_sidebar($sidebar);
}
?>
  </div>
  <!-- #sidebar-inner -->

  <?php do_action('adeline_after_sidebar_inner');?>
</aside>
<!-- #sidebar -->

<?php do_action('adeline_after_sidebar');?>
