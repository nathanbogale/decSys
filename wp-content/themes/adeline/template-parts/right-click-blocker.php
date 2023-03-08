<?php
/**
 * The template for displaying right click blocker.
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// If no scroll top button
if (true != adeline_display_right_click_blocker()) {
    //return;
}
$rightclickblockertext  = esc_html__('You can enable/disable right clicking from Theme Options and customize this message too.', 'adeline');
if ( adeline_get_option_value('rightclick_blocker_text') != '') {
	$rightclickblockertext = adeline_get_option_value('rightclick_blocker_text');
}

?>

<div id="rc-blocker" style="display: none;">
	<div class="rc-blocker-outer">
		<div class="rc-blocker-inner">
			<div class="rc-blocker-text"><?php echo wp_kses_post(do_shortcode($rightclickblockertext));?></div>
		</div>
	</div>
</div>
