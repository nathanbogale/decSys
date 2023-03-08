<?php
/**
 * WooCommerce Default template
 *
 * @package Adeline WordPress theme
 */
get_header();
?>
<?php do_action('adeline_before_content_wrap'); ?>

<div id="dpr-content-wrapper" class="container clr">
  <?php do_action('adeline_before_primary'); ?>
  <div id="primary" class="content-area clr">
    <?php do_action('adeline_before_content'); ?>
    <div id="content" class="clr site-content">
      <?php do_action('adeline_before_content_inner'); ?>
      <article class="entry-content entry clr">
        <?php woocommerce_content();
// WooCommerce content is added here

?>
      </article>
      <!-- #post -->
      
      <?php do_action('adeline_after_content_inner'); ?>
    </div>
    <!-- #content -->
    
    <?php do_action('adeline_after_content'); ?>
  </div>
  <!-- #primary -->
  
  <?php do_action('adeline_after_primary'); ?>
  <?php do_action('adeline_display_sidebar'); ?>
</div>
<!-- #dpr-content-wrapper -->

<?php do_action('adeline_after_content_wrap'); ?>
<?php get_footer(); ?>
