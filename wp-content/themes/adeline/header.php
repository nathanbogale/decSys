<?php
/**
 * The Header for our theme.
 *
 * @package Adeline WordPress theme
 */
?>

<!DOCTYPE html>

<html <?php language_attributes();?><?php adeline_schema_markup('html');?>>
<head>
<meta charset="<?php bloginfo('charset');?>">
<link rel="profile" href="//gmpg.org/xfn/11">
<?php wp_head();?>
</head>

<body <?php body_class();?>>
<?php wp_body_open();?>
<?php
if (adeline_display_preloader()) {
    get_template_part('template-parts/preloader/layout');
}
?>
<?php do_action('adeline_before_outer_wrap');?>
<div id="dpr-outer-wrapper" class="site clr">
<?php do_action('adeline_before_wrap');?>
<div id="dpr-inner-wrapper" class="clr">
<?php do_action('adeline_top_bar');?>
<?php do_action('adeline_header');?>
<?php do_action('adeline_before_main');?>
<main id="main" class="site-main clr"<?php adeline_schema_markup('main');?>>
<?php do_action('adeline_subheader');?>
