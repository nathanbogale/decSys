<?php $umaya_options = get_option('umaya'); ?>
<?php get_header();?>
<?php if (is_page()||is_single()) { ?>
<!-- 1st condition -->
<?php if(get_post_meta($post->ID,'rnr_umaya_page_header_logo_style_selector_opt',true)=='st2'){ ?> 
	<!-- 2nd condition -->
	<?php if(get_post_meta($post->ID,'rnr_umaya_page_header_logo_style_selector_opt',true)=='st2'){ ?> 
	<?php get_template_part('template-parts/main-header-v');?>
	<?php } else { ?>
	<?php get_template_part('template-parts/main-header-h');?>
	<?php  } ;?>
<?php } else { ?>
<?php if (Umaya_AfterSetupTheme::return_thme_option('textlogo_st')=='st2'){ ?>
<?php get_template_part('template-parts/main-header-v');?>
<?php } else { ?>
<?php get_template_part('template-parts/main-header-h');?>
<?php  } ;?>
<?php } ;?>
<?php } else { ?>
<!-- logo for theme options -->
<?php if (Umaya_AfterSetupTheme::return_thme_option('textlogo_st')=='st2'){ ?>
<?php get_template_part('template-parts/main-header-v');?>
<?php } else { ?>
<?php get_template_part('template-parts/main-header-h');?>
<?php  } ;?>
<?php  } ;?>
<!-- main start -->
<main class="js-animsition-overlay" data-animsition-overlay="true">
<?php if(get_post_meta($post->ID,'rnr_umaya_page_header_selector_opt',true)=='st2'){ ?> 
<?php get_template_part('template-parts/header/slider');?>
<?php }
else if(get_post_meta($post->ID,'rnr_umaya_page_header_selector_opt',true)=='st3'){ ?> 
<?php get_template_part('template-parts/header/mp4_video');?>
<?php }

else if(get_post_meta($post->ID,'rnr_umaya_page_header_selector_opt',true)=='st5'){ ?> 
<?php get_template_part('template-parts/header/fullscreen_image');?>
<?php }

else if(get_post_meta($post->ID,'rnr_umaya_page_header_selector_opt',true)=='st4'){ ?> 
<?php get_template_part('template-parts/header/rev_slider');?>
<?php }
else if(get_post_meta($post->ID,'rnr_umaya_page_header_selector_opt',true)=='st6'){ ?> 

<?php }
else  { ?>
<?php get_template_part('template-parts/header/default');?>
<?php }?>

 
		 <?php if(get_post_meta($post->ID,'rnr_wr_pagetype',true)=='st1'){ ?> 
         <?php get_template_part('template-parts/page/default');?>
		 <?php }
		 else if(get_post_meta($post->ID,'rnr_wr_pagetype',true)=='st2'){ ?> 
         <?php get_template_part('template-parts/page/right');?>
		 <?php }
		 else if(get_post_meta($post->ID,'rnr_wr_pagetype',true)=='st3'){ ?> 
         <?php get_template_part('template-parts/page/left');?>
		 <?php }
		 else  { ?>
		 <?php get_template_part('template-parts/page/default');?>
		 <?php }?>
  
 <?php get_footer(); ?>	 

