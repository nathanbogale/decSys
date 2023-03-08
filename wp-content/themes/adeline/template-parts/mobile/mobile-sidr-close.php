<?php

/**

 * Mobile Menu sidr close

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

    exit;

}

// Text

$text = adeline_get_option_value('dpr_mobile_menu_close_btn_text', '', 'Close Menu');

$text = adeline_theme_opt_translation('dpr_mobile_menu_close_btn_text', $text);

$text = $text ? $text : esc_html__('Close Menu', 'adeline');
?>

<div id="sidr-close"> <a href="#" class="toggle-sidr-close"> <span class="close-text"><?php echo do_shortcode($text); ?></span><i class="icon dpr-icon-cross-out"></i> </a> </div>
