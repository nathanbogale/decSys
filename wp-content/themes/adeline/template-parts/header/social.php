<?php
/**
 * Header social menu template part.
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Get social options array
$social_share_options = adeline_social_share();
// Return if $social_share_options array is empty
if (empty($social_share_options) && $is_custom_template == false) {
    return;
}
// Style
$style = adeline_get_option_value('menu_social_style', '', 'minimal');
$style = $style ? $style : 'minimal';
// Classes
$classes = array('dpr-adeline-social-menu', 'clr');
// Add class if social menu has class
if ('minimal' != $style) {
    $classes[] = 'social-styled';
} else {
    $classes[] = 'minimal-social';
}
// Turn classes into space seperated string
$classes = implode(' ', $classes);
// Inner classes
$inner_classes = array('social-menu-inner', 'clr');
if ('minimal' != $style) {
    $inner_classes[] = $style;
}
// Turn classes into space seperated string
$inner_classes = implode(' ', $inner_classes);
// Get theme options
$link_target = adeline_get_option_value('menu_social_target', '', 'blank');
$link_target = $link_target ? $link_target : 'blank';
?>

<div class="<?php echo esc_attr($classes); ?>">
  <div class="<?php echo esc_attr($inner_classes); ?>">
    <?php if ('default' != adeline_get_option_value('menu_social_content_type', '', 'default')) {
    get_template_part('template-parts/header/styles/social-custom-content');
} else {
    ?>
    <ul>
      <?php
// Loop through social options
    foreach ($social_share_options as $key => $social) {
        // Get URL from the theme options
        $url = $social['link'];
        // Display if there is a value defined
        if ($url) {
            // Display link
            echo '<li class="dpr-adeline-' . esc_attr($key) . '">';
            if (in_array($key, array('skype'))) {
                echo '<a href="skype:' . esc_attr($url) . '?call" title="' . esc_attr($social['label']) . '" target="_self">';
            } else if (in_array($key, array('email'))) {
                echo '<a href="mailto:' . esc_attr($url) . '" title="' . esc_attr($social['label']) . '" target="_self">';
            } else {
                echo '<a href="' . esc_url($url) . '" title="' . esc_attr($social['label']) . '" target="_' . esc_attr($link_target) . '">';
            }
            echo '<span class="' . esc_attr($social['icon_class']) . '"></span>';
            echo '</a>';
            echo '</li>';
        } // End url check

    } // End loop
    if ('social' == adeline_get_option_value('opening_button_position', '', 'beside')) {
    ?>
    <li class="side-panel-li"><a href="#" class="side-panel-btn"><i class="side-panel-icon Default-exchange"></i></a></li>
    <?php } ?>
    </ul>
    <?php
}?>
  </div>
</div>
