<?php
/**
 *  Menu Social Custom Content
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
$is_custom_template = false;
if ('custom' == adeline_get_option_value('menu_social_content_type')) {
    $is_custom_template = true;
}

$particle_id = adeline_get_option_value('menu_social_particle_selected');
?>

<div id="magazine-content" class="clr">
  <?php
// Check if there is a custom template
if ($is_custom_template && !empty($particle_id)) {
    echo adeline_particle_content($particle_id);
}
// Else
else {
    if (!empty(adeline_get_option_value('menu_social_html'))) {
        echo wp_kses_post(adeline_get_option_value('menu_social_html'));
    }
}
?>
</div>
<!-- #magazine-content -->