<?php
add_action('wp_head', 'umaya_custom_colors', 160);
function umaya_custom_colors() { 
$umaya_options = get_option('umaya');
?>
 
 <style type="text/css" class="umaya-custom-dynamic-css">
<?php if(!empty($umaya_options['opt-theme-style'])):?>
.nav-reveal-anim:before, .dropdown-close__arrow:after, .dropdown-close__inner:before, .nav-reveal-anim:before, .mfp-arrow-left:after,
.mfp-arrow-right:after,
.swiper-button-prev:after,
.swiper-button-next:after, .skew-btn__arrow:after, .border-btn__lines-1:before,
.border-btn__lines-1:after,
.border-btn__lines-2:before,
.border-btn__lines-2:after, body .content-bg-red .fill-btn:after,
html body .text-bg-red.fill-btn:after, .ellipse-btn:hover,
.ellipse-btn.black-border:hover,
body .ellipse-btn.ellipse-btn_red, body .content-bg-red .anim-img-reveal:before,
body .content-bg-red .anim-img-reveal:after,
body .content-bg-red .anim-img-reveal__hidden:before,
body .content-bg-red .anim-img-reveal__hidden:after, body .content-bg-red .anim-text-reveal:before,
html body .text-bg-red.anim-text-reveal:before, body .content-bg-red .anim-overlay:before,
html body .text-bg-red.anim-overlay:before, .anim-overlay.red:before, .anim-reveal.red:before, body .content-bg-red .anim-text-double-fill:before,
html body .text-bg-red.anim-text-double-fill:before, .progress-bar__line.red, .border-left-anim.red:before, .border-right-anim.red:before, .border-top-anim.red:before, .border-bottom-anim.red:before, .hover-reveal.red:before, .accordion__btn:before, .Typewriter__cursor, .content-bg-red,
.text-bg-red   {background-color:<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>;}

body .text-color-red, .nav-btn__inner:before, .js-nav-slider .nav-btn:hover .nav-btn__inner:before, .mPS2id-highlight.landing-nav__inner, .counter-pagination .swiper-pagination-bullet:after, .counter-pagination .swiper-pagination-bullet:hover:before,
.counter-pagination.black .swiper-pagination-bullet:hover:before, .skew-btn:hover .skew-btn__content, .bg-btn:hover,
.bg-btn.black:hover, .border-btn:hover .border-btn__inner,
.border-btn.black:hover .border-btn__inner, .icon-shadow-btn:hover .icon-shadow-btn__inner, .fill-btn:after, .flip-btn:after, .quote:after, .anim-text-double-fill:before, .anim-text-double-fill.invert:after, .anim-text-double-fill.black:before, .anim-text-double-fill.black.invert:after, .list__item.red:before, .text-color-red:before, .text-hover-to-red:hover, .blog-pagination:after, .pointer__inner    {color:<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>!important;}


.dropdown-close__arrow:before, .mfp-arrow-left:hover:before, .swiper-button-prev:hover:before, .swiper-button-prev.black:hover:before, .mfp-arrow-right:hover:before,
.swiper-button-next:hover:before,
.swiper-button-next.black:hover:before, .skew-btn:hover .skew-btn__arrow:before, .ellipse-btn:hover,
.ellipse-btn.black-border:hover,
body .ellipse-btn.ellipse-btn_red, body .content-bg-red .anim-img-reveal__hidden, .accordion, .pointer  {
	border-color:<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>!important;
}

.icon-shadow-btn:hover,
.icon-shadow-btn.black-shadow:hover, .js-pointer.js-large, .js-pointer.js-small, .js-pointer.js-right,
.js-pointer.js-zoom,
.js-pointer.js-open  {
	-webkit-box-shadow: 0 0 15px <?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>!important;
	        box-shadow: 0 0 15px <?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>!important;
}
::-moz-selection {
	
	color: <?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>;
}

::selection {
	
	color: <?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('opt-theme-style',''));?>;
}
<?php endif;?>

 </style>
 
 
 <?php 
	}
?>
