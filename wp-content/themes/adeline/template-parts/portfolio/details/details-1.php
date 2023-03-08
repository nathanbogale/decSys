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

	$details_1_title = adeline_get_option_value('porfolio_single_description_1_title');

	$details_1_content = adeline_get_option_value('porfolio_single_description_1_content');

	if ('' == $details_1_content) {

		return;

	}
?>
<?php if ( '' != $details_1_title )  { ?>

<h4 class = "desc-title"><?php echo wp_kses($details_1_title,'styled_text') ?></h4>
<?php } ?>
<p><?php echo wp_kses_post($details_1_content) ?></p>
