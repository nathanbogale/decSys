<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>> 
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php $umaya_options = get_option('umaya'); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
	wp_head(); 
	?>
</head>
<body id="body" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php if (Umaya_AfterSetupTheme::return_thme_option('umaya_preloader')=='st2'){ ?>
<!-- preloader-loading start -->
		<div class="preloader__logoload-box">
			<img class="preloader__logo" src="<?php echo esc_url(Umaya_AfterSetupTheme::return_thme_option('pagelogopic','url'));?>" alt="<?php  bloginfo('name'); ?>">
			<div class="preloader__pulse"></div>
		</div><!-- preloader-loading end -->
<?php } ;?>
		<!-- pointer start -->
		<div class="pointer js-pointer" id="js-pointer">
			<i class="pointer__inner fas fa-long-arrow-alt-right"></i>
			<i class="pointer__inner fas fa-search"></i>
			<i class="pointer__inner fas fa-link"></i>
		</div><!-- pointer end -->

