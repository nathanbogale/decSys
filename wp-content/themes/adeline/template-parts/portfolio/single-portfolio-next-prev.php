<?php

/**

 * The next/previous links to go to another portfolio item.

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}
?>

<div class="dpr-portfolio-next-prev clr">
  <?php $all_portfolios_link = adeline_get_option_value( 'portfolio_default_page_link', '', '');

if ( '' != $all_portfolios_link) {

	?>
  <div class="dpr-all-portfolio-link"> <a href="<?php echo wp_kses_post($all_portfolios_link) ?>"><span class="dpr-icon-th"></span></a> </div>
  <?php } ?>
  <?php

	the_post_navigation(array('prev_text' => '<span class="title"><i class="dpr-icon-angle-double-left"></i>' . esc_html__('Prev', 'adeline') . '</span><span class="post-title">%title</span>', 'next_text' => '<span class="post-title">%title</span><span class="title"><i class="dpr-icon-angle-double-right"></i>' . esc_html__('Next', 'adeline') . '</span>', 'in_same_term' => true, 'taxonomy' => 'dpr_portfolio_tag', 'screen_reader_text' => esc_html__('Continue Reading', 'adeline'), ));
	?>
</div>
