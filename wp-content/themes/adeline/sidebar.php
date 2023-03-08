<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Adeline WordPress theme
 */
?>
<?php do_action('adeline_before_sidebar'); ?>

<aside id="right-sidebar" class="sidebar-container widget-area sidebar-primary <?php echo esc_attr(adeline_get_right_sidebar_sticky_class()) ?>"<?php adeline_schema_markup('sidebar'); ?>>
  <?php do_action('adeline_before_sidebar_inner'); ?>
  <div id="right-sidebar-inner" class="clr">
    <?php
if ($sidebar = adeline_get_sidebar()) {
    dynamic_sidebar($sidebar);
}
?>
  </div>
  <!-- #sidebar-inner -->
  
  <?php do_action('adeline_after_sidebar_inner'); ?>
</aside>
<!-- #right-sidebar -->

<?php do_action('adeline_after_sidebar'); ?>
