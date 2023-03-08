<?php

/**

 * Post single content

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}
?>
<?php do_action('adeline_before_single_post_content'); ?>

<div class="entry-content clr"<?php adeline_schema_markup('entry_content'); ?>>
  <?php the_content(); ?>
  <div class="clr"></div>
  <?php

	$addclass = '';

	if (adeline_get_option_value('pagination_shape') == 'round')
		$addclass .= ' round';

	wp_link_pages(array('before' => '<div class="page-links' . esc_attr($addclass) . '">' . esc_html__('Pages:', 'adeline'), 'after' => '</div>', 'link_before' => '<span class="page-number">', 'link_after' => '</span>', ));
	?>
</div>
<!-- .entry -->

<?php do_action('adeline_after_single_post_content'); ?>
