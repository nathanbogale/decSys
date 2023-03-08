<?php

/**

 * Single tags

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}
?>

<div class="portfolio-tags clr">
  <?php
	echo get_the_term_list($post -> ID, 'dpr_portfolio_tag', '<ul class="meta"><li><span class="dpr-icon-tags"></span> ', ',</li><li>', '</li></ul>');
	?>
</div>
