<?php
/**
 * The template for displaying all pages, single posts and attachments
 *
 * This is a new template file that WordPress introduced in
 * version 4.3.
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
    <div id="content" class="site-content clr">
      <?php do_action('adeline_before_content_inner'); ?>
      <?php
// Start loop
while (have_posts()):
    the_post();
    // Single Page
    if (is_singular('page')) {
        get_template_part('template-parts/page/layout');
    }
    // Particle post types
    elseif (is_singular('dpr_particle')) {
        get_template_part('template-parts/particle/layout');
    }
    // Library post types
    elseif (is_singular('elementor_library')) {
        get_template_part('template-parts/library/layout');
    }
    // Portfolio post types
    elseif (is_singular('dpr_portfolio')) {
        get_template_part('template-parts/portfolio/single-portfolio-layout');
    }
    // All other post types.
    else {
        get_template_part('template-parts/single/layout', get_post_type());
    }
endwhile;
?>
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
