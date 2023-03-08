<?php
/**
 * The template for displaying magic cursor.
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// If no scroll top button
if (true != adeline_display_magic_cursor()) {
    return;
}
?>

<div class="dpr-cursor is-inactive">
	<span class="dpr-cursor-circle"></span>
	<span class="dpr-cursor-dot"></span>
	<span class="dpr-cursor-slider"></span>
	<span class="dpr-cursor-close dpr-cursor-label"><?php echo esc_html_e('Close', 'adeline') ?></span>
	<span class="dpr-cursor-zoom dpr-cursor-label"><?php echo esc_html_e('Zoom', 'adeline') ?></span>
</div>
