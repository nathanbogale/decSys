<?php
/**
 * Main Header Layout
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Header style
$header_style = adeline_header_style();
// Header height, used for local scrolling
$header_height = intval(adeline_get_option_value('header_height', 'height', '100px'));
if ('shrink' == adeline_get_option_value('sticky_header_style', '', 'fixed') && true == adeline_get_option_value('sticky_heder_enable', '', false)) {
    $header_height = intval(adeline_get_option_value('shrink_header_height', 'height', '70px'));
}
// If vertical header style
if ('vertical' == $header_style) {
    $header_height = 0;
}
// Add container class if the header is not full width
$class = '';
if (true != adeline_get_option_value('header_full_width', '', false)) {
    $class = ' container';
}
do_action('adeline_before_header');
// If overlapping header style
if (('default' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('center' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('top' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('minimal' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('magazine' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('full_screen' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('custom' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false))) {
    ?>

<div id="overlaping-header-wrapper" class="clr">
  <?php
}
?>
  <header id="dpr-header" class="<?php echo esc_attr(adeline_header_classes()); ?>" data-height="<?php echo esc_attr($header_height); ?>"<?php adeline_schema_markup('header');?>>
    <?php
// If top header style
if ('center' == $header_style) {
    get_template_part('template-parts/header/styles/center-header');
}
// If center header style
else if ('top' == $header_style) {
    get_template_part('template-parts/header/styles/top-header');
}
// If minimal header style
else if ('minimal' == $header_style) {
    get_template_part('template-parts/header/styles/minimal-header');
}
// If magazine header style
else if ('magazine' == $header_style) {
    get_template_part('template-parts/header/styles/magazine-header');
}
// If full screen header style
else if ('full_screen' == $header_style) {
    get_template_part('template-parts/header/styles/full-screen-header');
}
// If vertical header style
else if ('vertical' == $header_style) {
    get_template_part('template-parts/header/styles/vertical-header');
}
// If custom horizontal header style
else if ('custom' == $header_style) {
    get_template_part('template-parts/header/styles/custom-header');
}
// If custom horizontal header style
else if ('custom_vertical' == $header_style) {
    get_template_part('template-parts/header/styles/custom-vertical-header');
}
// Default header style
else {
    get_template_part('template-parts/header/styles/default-header');
}
?>
  </header>
  <!-- #dpr-header -->

  <?php
// If overlapping header style
if (('default' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('center' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('top' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('minimal' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('magazine' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('full_screen' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false)) || ('custom' == adeline_header_style() && true == adeline_get_option_value('use_header_overlapping', '', false))) {
    ?>
</div>
<?php
}
do_action('adeline_after_header');
?>
