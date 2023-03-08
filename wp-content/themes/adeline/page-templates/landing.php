<?php
/**
 * Template Name: Landing Page
 *
 * @package Adeline WordPress theme
 */
?>

<!DOCTYPE html>

<html <?php language_attributes();?><?php adeline_schema_markup('html');?>>
<head>
<meta charset="<?php bloginfo('charset');?>">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head();?>
</head>

<!-- Begin Body -->

<body <?php body_class();?><?php adeline_schema_markup('body');?>>
<?php wp_body_open();?>
<?php do_action('adeline_before_outer_wrap');?>
<div id="dpr-outer-wrapper" class="site clr">
  <?php do_action('adeline_before_wrap');?>
  <div id="dpr-inner-wrapper" class="clr">
    <?php do_action('adeline_before_main');?>
    <main id="main" class="site-main clr"<?php adeline_schema_markup('main');?>>
      <?php do_action('adeline_before_content_wrap');?>
      <div id="dpr-content-wrapper" class="container clr">
        <?php do_action('adeline_before_primary');?>
        <section id="primary" class="content-area clr">
          <?php do_action('adeline_before_content');?>
          <div id="content" class="site-content clr">
            <?php do_action('adeline_before_content_inner');?>
            <?php while (have_posts()):
    the_post();
    ?>
              <div class="entry-content entry clr">
                <?php the_content();?>
              </div>
              <!-- .entry-content -->

              <?php
endwhile;?>
            <?php do_action('adeline_after_content_inner');?>
          </div>
          <!-- #content -->

          <?php do_action('adeline_after_content');?>
        </section>
        <!-- #primary -->

        <?php do_action('adeline_after_primary');?>
      </div>
      <!-- #dpr-content-wrapper -->

      <?php do_action('adeline_after_content_wrap');?>
    </main>
    <!-- #main-content -->

    <?php do_action('adeline_after_main');?>
  </div>
  <!-- #dpr-inner-wrapper -->

  <?php do_action('adeline_after_wrap');?>
</div>
<!-- .dpr-outer-wrapper -->

<?php do_action('adeline_after_outer_wrap');?>
<?php wp_footer();?>
</body>
</html>