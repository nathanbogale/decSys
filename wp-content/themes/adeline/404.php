<?php

/**

 * The template for displaying 404 pages.

 *

 * @package Adeline WordPress theme

 */

// Get the template

$is_custom_template = false;

if ('custom' == adeline_get_option_value('error_page_template')) {
    $is_custom_template = true;
}

$particle_id = adeline_get_option_value('error_page_particle_selected');

// If blank page

if (true == adeline_get_option_value('error_page_blank')) {
    ?>

<!DOCTYPE html>

<html <?php language_attributes();?><?php adeline_schema_markup('html');?>>
<head>
<meta charset="<?php bloginfo('charset');?>">
<link rel="profile" href="//gmpg.org/xfn/11">
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
    <main id="main" class="site-main vh100 clr"<?php adeline_schema_markup('main');?>>
      <?php

} else {

    get_header();

}?>
      <?php do_action('adeline_before_content_wrap');?>
      <div id="dpr-content-wrapper" class="container clr">
        <?php do_action('adeline_before_primary');?>
        <div id="primary" class="content-area clr">
          <?php do_action('adeline_before_content');?>
          <div id="content" class="clr site-content">
            <?php do_action('adeline_before_content_inner');?>
            <article class="entry clr">
              <?php

// Check if there is a custom template

if ($is_custom_template && !empty($particle_id)) {

    echo adeline_particle_content($particle_id);

}

// Else

else {
    ?>
              <div class="error404-content clr">
                <?php

    if (!empty(adeline_get_option_value('error_page_title'))) {

        $error_page_title = adeline_get_option_value('error_page_title');

    } else {

        $error_page_title = esc_html__('404', 'adeline');

    }

    if (!empty(adeline_get_option_value('error_page_text'))) {

        $error_page_text = adeline_get_option_value('error_page_text');

    } else {

        $error_page_text = wp_kses(__('We are sorry. But the page you are looking for is not available.<br />Perhaps you can try a new searching.', 'adeline'),'styled_text');

    }

    ?>
                <h2 class="error-title"><?php echo wp_kses($error_page_title,'styled_text'); ?></h2>
                <p class="error-text"><?php echo wp_kses($error_page_text,'styled_text'); ?></p>
                <?php get_search_form();?>
                <a class="error-btn button" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html_e('Back To Homepage', 'adeline') ?></a> </div>
              <!-- .error404-content -->

              <?php }?>
            </article>
            <!-- .entry -->

            <?php do_action('adeline_after_content_inner');?>
          </div>
          <!-- #content -->

          <?php do_action('adeline_after_content');?>
        </div>
        <!-- #primary -->

        <?php do_action('adeline_after_primary');?>
      </div>
      <!--#content-wrap -->

      <?php do_action('adeline_after_content_wrap');?>
      <?php

// If blank page

if (true == adeline_get_option_value('error_page_blank')) {
    ?>
    </main>
    <!-- #main-content -->

    <?php do_action('adeline_after_main');?>
  </div>
  <!-- #wrap -->

  <?php do_action('adeline_after_wrap');?>
</div>
<!-- .outer-wrap -->

<?php do_action('adeline_after_outer_wrap');?>
<?php wp_footer();?>
</body>
</html>
<?php

} else {

    get_footer();

}?>