<?php

/**

 * Outputs page article

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}
?>

<div class="entry clr"<?php adeline_schema_markup('entry_content'); ?>>
  <?php the_content(); ?>
  <div class="clr"></div>
  <?php

	$addclass = '';

	if (adeline_get_option_value('pagination_shape') == 'round')
		$addclass .= ' round';

	wp_link_pages(array('before' => '<div class="page-links' . esc_attr($addclass) . '">' . esc_html__('Pages:', 'adeline'), 'after' => '</div>', ));
	?>
</div>
