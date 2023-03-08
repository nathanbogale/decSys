<?php

/**

 * The template for displaying the subheader.

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}

// Return if page header is disabled

if (!adeline_has_subheader()) {

	return;

}

// Classes

$classes = array('subheader');

// If featured image used as subheader background

$bgstyle = '';

if ('1' == adeline_get_meta_value(get_the_ID(), 'use_featured_image_as_bg', '') && has_post_thumbnail()) {

	$classes[] = 'featured-img-bg';

	$bg_img_id = get_post_thumbnail_id(get_the_ID(), 'full');

	$bg_img_url = dpr_get_attachment_image_src($bg_img_id, 'full');

	$bgstyle = 'background-image:url(' . $bg_img_url[0] . ');';

}

// Get header style

$style = adeline_get_option_value('subheader_alignment', '', 'centered');

if (ADELINE_WOOCOMMERCE_ACTIVE) {

	if (is_woocommerce()) {

		$style = adeline_get_option_value('woo_subheader_alignment', '', 'centered');

	}

}
if (is_singular('proof_gallery')) {

	$style = adeline_get_option_value('proof_gallery_subheader_alignment', '', 'centered');

}
// Add classes for title style

if ($style != '') {

	$classes[$style . '-subheader'] = $style . '-subheader';

}

// Visibility

$visibility = adeline_get_option_value('subheader_visibility', '', 'all-devices');

if (ADELINE_WOOCOMMERCE_ACTIVE) {

	if (is_woocommerce()) {

		$visibility = adeline_get_option_value('woo_subheader_visibility', '', 'all-devices');

	}

}


if (is_singular('proof_gallery')) {

	$visibility = adeline_get_option_value('proof_gallery_subheader_visibility', '', 'all-devices');

}


if ('all-devices' != $visibility) {

	$classes[] = $visibility;

}

// Turn into space seperated list

$classes = implode(' ', $classes);

// Heading tag

$heading = adeline_get_option_value('subheader_title_tag', '', 'h1');

$heading = $heading ? $heading : 'h1';

$heading = apply_filters('adeline_subheader_title', $heading);

$subheader_anim_class = '';

if (adeline_get_option_value('subheader_title_animation', '', false) == true) {

	$subheader_anim_class = 'vanishing';

}
?>
<?php do_action('adeline_before_subheader'); ?>

<header class="<?php echo esc_attr($classes); ?>"  style=" <?php echo esc_attr($bgstyle)?> ">
  <?php do_action('adeline_before_subheader_inner'); ?>
  <div class="container clr subheader-inner <?php echo esc_attr($subheader_anim_class) ?>">
    <?php
// Return if page header is disabled

if ( adeline_has_subheader_subtitle() ) {
		?>
    <<?php echo esc_attr($heading); ?> class="subheader-title clr"
    <?php adeline_schema_markup('headline'); ?>
    ><?php echo wp_kses_post(adeline_title()); ?></<?php echo esc_attr($heading); ?>>
    <?php get_template_part('template-parts/subheader/subtitle'); ?>
    <?php } ?>
    <?php
		if (function_exists('adeline_breadcrumb_trail')) {

			adeline_breadcrumb_trail();

		}
		?>
  </div>
  <!-- .subheader-inner -->
  
  <?php adeline_subheader_overlay(); ?>
  <?php do_action('adeline_after_subheader_inner'); ?>
</header>
<!-- .subheader -->

<?php do_action('adeline_after_subheader'); ?>
