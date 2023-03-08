<?php

/**

 * Single post layout

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}
?>

<article id="post-<?php the_ID(); ?>">
  <?php

	// Get posts format

	$format = get_post_format();

	// Get elements

	$elements = adeline_single_post_elements();

	// Loop through elements

	foreach ($elements as $element) {

		// Featured Image

		if ('featured_image' == $element && !post_password_required()) {

			$format = $format ? $format : 'thumbnail';

			get_template_part('template-parts/single/media/blog-single', $format);

		}

		// Title

		if ('title' == $element) {

			get_template_part('template-parts/single/header');

		}

		// Meta

		if ('meta' == $element) {

			get_template_part('template-parts/single/meta');

		}

		// Content

		if ('content' == $element) {

			get_template_part('template-parts/single/content');

		}

		// Tags

		if ('tags' == $element) {

			get_template_part('template-parts/single/tags');

		}

		// Social Share

		if ('social_share' == $element && ADELINE_EXT_ACTIVE) {

					dpr_add_social_share();

		}

		// Next/Prev

		if ('next_prev' == $element) {

			get_template_part('template-parts/single/next-prev');

		}

		// Author Box

		if ('author_info' == $element) {

			get_template_part('template-parts/single/author-bio');

		}

		// Related Posts

		if ('related' == $element) {

			get_template_part('template-parts/single/related-posts');

		}

		// Comments

		if ('comments' == $element) {

			comments_template();

		}

	}
	?>
</article>
