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

	$details_2_title = adeline_get_option_value('porfolio_single_description_2_title');

	$details_2_content = adeline_get_option_value('porfolio_single_description_2_content');

	if ('' == $details_2_content) {

		return;

	}
?>
<?php if ( '' != $details_2_title )  { ?>

<h4 class = "desc-title"><?php echo wp_kses($details_2_title,'styled_text') ?></h4>
<?php } ?>
<p><?php echo wp_kses_post($details_2_content) ?></p>
