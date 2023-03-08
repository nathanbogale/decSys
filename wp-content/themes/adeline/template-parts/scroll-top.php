<?php
/**
 * The template for displaying the scroll top button.
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// If no scroll top button
if (true != adeline_get_option_value('scroll_top', '', false)) {
    return;
}
// Get arrow
$arrow = adeline_get_option_value('scroll_top_arrow');
$arrow = $arrow ? $arrow : 'dpr-icon-angle-up';
?>

<a id="scroll-top" href="#"><span class="<?php echo esc_attr($arrow); ?>"></span></a>