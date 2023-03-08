<?php

/**

 * Portfolio single content block details bellow

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}
 ?>
<?php

	$details_3_block_title = adeline_get_option_value('porfolio_single_description_3_title');

	$short_info_1_title = adeline_get_option_value('porfolio_single_description_short_1_title');

	$short_info_1_content = adeline_get_option_value('porfolio_single_description_short_1_content');

	$short_info_2_title = adeline_get_option_value('porfolio_single_description_short_2_title');

	$short_info_2_content = adeline_get_option_value('porfolio_single_description_short_2_content');

	$short_info_3_title = adeline_get_option_value('porfolio_single_description_short_3_title');

	$short_info_3_content = adeline_get_option_value('porfolio_single_description_short_3_content');

	$action_button_title = adeline_get_option_value('porfolio_single_action_button_title');

	$action_button_link = adeline_get_option_value('porfolio_single_action_button_link');

	$action_button_target = adeline_get_option_value('porfolio_single_action_button_link_target');

	$display_tags = adeline_get_option_value('portfolio_single_tags');

	$display_share = adeline_get_option_value('portfolio_single_share');

	if ('' == $short_info_1_content && '' == $short_info_2_content && '' == $short_info_3_content && '' == $action_button_link) {

		return;

	}
?>
<?php if ( '' != $details_3_block_title )  { ?>

<h4 class = "desc-title"><?php echo wp_kses($details_3_block_title,'styled_text') ?></h4>
<?php } ?>
<?php if ( '' != $short_info_1_content )  { ?>
<div class="short-info"> <span class="short-info-title small-heading"><?php echo esc_html($short_info_1_title) ?></span>: <?php echo wp_kses_post($short_info_1_content) ?> </div>
<?php } ?>
<?php if ( '' != $short_info_2_content )  { ?>
<div class="short-info"> <span class="short-info-title small-heading"><?php echo esc_html($short_info_2_title) ?></span>: <?php echo wp_kses_post($short_info_2_content) ?> </div>
<?php } ?>
<?php if ( '' != $short_info_3_content )  { ?>
<div class="short-info"> <span class="short-info-title small-heading"><?php echo esc_html($short_info_3_title) ?></span>: <?php echo wp_kses_post($short_info_3_content) ?> </div>
<?php } ?>
<p></p>
<?php if ( '' != $action_button_link )  { ?>
<p> <a class="button" href="<?php echo esc_url($action_button_link)?>" target="<?php echo esc_attr($action_button_target)?>"><?php echo esc_html($action_button_title) ?></a> </p>
<?php } ?>
<?php
	if ($display_tags) {

		get_template_part('template-parts/portfolio/single-portfolio-tags');

	}
 ?>
<?php
	if ($display_share && ADELINE_EXT_ACTIVE) {

		dpr_add_social_share();

	}
 ?>
