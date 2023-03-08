<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Adeline WordPress theme
 */
get_header();
?>
<?php do_action('adeline_before_content_wrap');?>

<div id="dpr-content-wrapper" class="container clr">
  <?php do_action('adeline_before_primary');?>
  <div id="primary" class="content-area clr">
    <?php do_action('adeline_before_content');?>
    <div id="content" class="site-content clr">
      <?php do_action('adeline_before_content_inner');?>
      <?php if (have_posts()):
?>
      <?php while (have_posts()):
    the_post();
    ?>
        <?php get_template_part('template-parts/search/layout');?>
        <?php
endwhile;?>
      <?php adeline_pagination();?>
      <?php
else: ?>
      <?php
// Display no post found notice
get_template_part('template-parts/none');
?>
      <?php
endif;?>
      <?php do_action('adeline_after_content_inner');?>
    </div>
    <!-- #content -->

    <?php do_action('adeline_after_content');?>
  </div>
  <!-- #primary -->

  <?php do_action('adeline_after_primary');?>
  <?php do_action('adeline_display_sidebar');?>
</div>
<!-- #dpr-content-wrapper -->

<?php do_action('adeline_after_content_wrap');?>
<?php get_footer();?>
