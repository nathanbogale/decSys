<?php

/**

 * Outputs correct portfolio layout

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}
?>
<?php if ('above' == adeline_get_option_value( 'portfolio_main_content_position', '', 'above') ) {
?>

<article class="single-page-article clr">
  <?php

	// Get page entry

	get_template_part('template-parts/page/article');
	?>
</article>
<?php } ?>
<?php

// Get page entry

get_template_part('template-parts/portfolio/portfolio-archive');
?>
<?php if ('bellow' == adeline_get_option_value( 'portfolio_main_content_position', '', 'above') ) {
?>
<article class="single-page-article clr">
  <?php

	// Get page entry

	get_template_part('template-parts/page/article');
	?>
</article>
<?php } ?>
