<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
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
      <?php
// Check if posts exist
if (have_posts()):
?>
      <div id="blog-items" class="<?php adeline_blog_wrap_classes();?>">
        <?php
// Define counters for clearing floats and check odd/even
$dpr_adeline_count       = 0;
$dpr_adeline_total_count = 0;
// Loop through posts
while (have_posts()):
    the_post();
    ?>
          <?php
    // Add to counters
    $dpr_adeline_count++;
    $dpr_adeline_total_count++;
    ?>
          <?php
    // Get post item content
    get_template_part('template-parts/blog/layout', get_post_type());
    ?>
          <?php
    // Reset counter to clear floats
    if (adeline_blog_columns() == $dpr_adeline_count) {
        $dpr_adeline_count = 0;
    }
    ?>
          <?php
endwhile;?>
      </div>
      <!-- #blog-items -->

      <?php
// Display post pagination
adeline_blog_pagination();
?>
      <?php
// No posts found
else:
?>
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
