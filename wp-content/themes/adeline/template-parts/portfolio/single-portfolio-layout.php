<?php

/**

 * Single portfolio layout

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}

$content_style = adeline_get_option_value('portfolio_single_content_layout', '', 'details-right');
?>

<article id="portfolio-<?php the_ID(); ?>">
  <?php

	// If single portfolio style set to as post

	if ('post' == $content_style) {

		// Get elements

		$elements = adeline_single_portfolio_post_style_elements();

		// Loop through elements

		foreach ($elements as $element) {

			// Featured Image

			if ('media' == $element) {

				get_template_part('template-parts/portfolio/single-portfolio-media');

			}

			// Title

			if ('title' == $element) {

				get_template_part('template-parts/portfolio/single-portfolio-title');

			}

			// Meta

			if ('meta' == $element) {

				get_template_part('template-parts/portfolio/single-portfolio-meta');

			}

			// Content

			if ('content' == $element) {

				get_template_part('template-parts/portfolio/single-portfolio-content');

			}

			// Tags

			if ('tags' == $element) {

				get_template_part('template-parts/portfolio/single-portfolio-tags');

			}

			// Social Share

			if ('share' == $element && ADELINE_EXT_ACTIVE) {

				dpr_add_social_share();

			}

			// Next Prev

			if ('next_prev' == $element) {

				get_template_part('template-parts/portfolio/single-portfolio-next-prev');

			}

			// Related portfolio

			if ('related_portfolio' == $element) {

				get_template_part('template-parts/portfolio/single-portfolio-related');

			}

			// Comments

			if ('comments' == $element) {

				comments_template();

			}

		}

	} else {

		// Get elements

		$elements = adeline_single_portfolio_elements();

		// Loop through elements

		foreach ($elements as $element) {

			// Media && Details block

			if ('content' == $element) {

				get_template_part('template-parts/portfolio/single-portfolio-content');

			}

			// Media && Details block

			if ('media_details' == $element) {

				get_template_part('template-parts/portfolio/content-layouts/content-layout-' . $content_style);

			}

			// Next Prev

			if ('next_prev' == $element) {

				get_template_part('template-parts/portfolio/single-portfolio-next-prev');

			}

			// Related portfolio

			if ('related_portfolio' == $element) {

				get_template_part('template-parts/portfolio/single-portfolio-related');

			}

			// Comments

			if ('comments' == $element) {

				comments_template();

			}

		}

	}
	?>
</article>
