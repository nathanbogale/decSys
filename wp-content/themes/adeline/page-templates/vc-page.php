<?php
/*

Template Name: For Page Bulilder (full width)

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
      <?php
// Start loop
while (have_posts()):
    the_post();
    get_template_part('template-parts/page/layout');
endwhile;
?>
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
