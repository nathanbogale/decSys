<?php 
//color schemes 
function avo_color_scheme() {
	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {  
		global $post ;

		//general color 
		$general = avo_option( 'avo_color_general' ); 
		$color_general = "
		.cursor-inner,.cursor-inner.cursor-hover,.avo-slider.style-1 .slider-line, .avo-slider.style-1 .dsc-btn-style1, .avo-slider.style-1 .left-box-slider .slider-line, .avo-slider.style-1 .center-box-slider .slider-line, .avo-portfolio-single .slider-line, .avo-portfolio-single .dsc-btn-style1, .avo-portfolio-single .left-box-slider .slider-line, .avo-portfolio-single .center-box-slider .slider-line, .team-3 .team-info .team-sicon li a:hover, .skills-box .skill-progress .progres, .avo-progress-bar.style-1 .skills-box .skill-progress .progres,.share-box a:hover,.title-related-post:after,  .widget_categories ul li.cat-item a:hover + span, .widget_archive ul li a:hover + span,.comment-reply-link:hover, h2.comments-title:after, .dsc-btn-style3,.cart-contents-count, .woocommerce span.onsale, .info-box.style-7 .mas-item .bg-color, .img-comp-slider, .content-btn:hover, .tags-bottom a:hover, .widget-border , .form-submit #submit , .navigation > li.sfHover > a:before
		{background-color:$general;}

		::selection 
		{background:$general;}

		::-moz-selection 
		{background:$general;}

		.woocommerce .button:hover, .woocommerce-checkout .checkout_coupon button.button:hover,  .woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-payment .place-order button.button:hover
		{background-color:$general !important;}

		.progress-wrap svg.progress-circle path, .port-inner .port-dbox a span svg:hover, .avo-product.style-2 .port-inner .port-dbox a span svg:hover 
		{stroke:$general;}

		.dsc-heading-style1 h5,.avo-mc4wp-1 .mc4wp-form-fields input[type=submit],a:hover,blockquote::before,.content-title span,.table-content h3 > span,.btn-curve.btn-lit:hover span, .btn-curve.btn-color:hover span, .progress-wrap::after,th a,td a,#preloader .loading-text,.button.style-1.btn-lit:hover span,.button.style-1.btn-color:hover span,.button.style-2 .vid-icon .vid span,.avo-header.style-3 .works-header .capt h2 span,.avo-header.style-4 .pages-header .cont .path .active, .avo-header.style-4 .pages-header .cont .path span, .avo-header.style-5 .sec-head h6, .header-top h6 i,.white-header .header-icon li.current-menu-parent > a, .white-header .header-icon li.current_page_item > a,.white-header .navigation li a:hover,.white-header .navigation li.current-menu-parent > a,.white-header .navigation li.current_page_item > a,.white-header .menu-wrapper .menu ul li ul li a:hover,.white-header .menu-wrapper .menu ul li ul li.current_page_item > a, .white-header .menu-wrapper .menu ul li.current-menu-parent > a, .white-header .menu-wrapper .menu ul li.current_page_item > a, .white-header .menu-wrapper .navigation li ul li a:hover,.white-header .menu-wrapper .navigation li ul li.current_page_item > a,.menu-wrapper .menu ul li ul li a:hover, .menu-wrapper .menu ul li ul li.current_page_item > a, .menu-wrapper .navigation li ul li a:hover, .menu-wrapper .navigation li ul li.current_page_item > a, .custom-absolute-menu .is-sticky .navigation li a:hover, .custom-absolute-menu .is-sticky .navigation li.current-menu-item a, .custom-absolute-menu .is-sticky .menu-wrapper .menu ul li a:hover, .custom-absolute-menu .is-sticky .menu-wrapper .menu ul li.current-menu-item a, .custom-absolute-menu .navigation .sub-menu li a:hover, .custom-absolute-menu .navigation .sub-menu li.current-menu-item a, .custom-absolute-menu .menu-wrapper .menu ul.sub-menu li a:hover, .custom-absolute-menu .menu-wrapper .menu ul.sub-menu li.current-menu-item a, .header-icon li a:hover,.btn-nav-top a:hover, .avo-slider.style-1 .home-slider .slick-arrow:hover,  .avo-slider.style-1 .slider-btn:hover,  .avo-slider.style-1 .dsc-btn-style2,.slider.style-6 .parallax-slider .caption .thin, .slider.style-6 .parallax-slider .caption .thin span, .cta__slider-item .caption .thin, .freelancer .cont h6, .pages-header .cont .path .active, .works-header .capt h2 span, .avo-slider.style-7 .slider .parallax-slider .caption .thin, .avo-slider.style-7 .slider .parallax-slider .caption .thin span, .avo-portfolio-single .home-slider .slick-arrow:hover, .avo-portfolio-single .slider-btn:hover,.avo-portfolio-single .dsc-btn-style2 , .showcase.style-2 [data-overlay-dark] h1, .showcase.style-2 [data-overlay-dark] h2, .showcase.style-2 [data-overlay-dark] h3, .showcase.style-2 [data-overlay-dark] h4, .showcase.style-2 [data-overlay-dark] h5, .showcase.style-2 [data-overlay-dark] h6, .showcase.style-2 [data-overlay-dark] span, .showcase.style-2 .showcase-carus .copy-cap .cap h1 .stroke,  .showcase.style-3 .showcase-carus.circle-slide .copy-cap .cap h1 .stroke, .showcase.style-3 .showcase-carus.circle-slide .copy-cap .cap h1 span, .feature-1:hover .avo-icon , .feature-1 .avo-icon, .feature-2 .avo-icon, .feature-3 .avo-icon, .feature-3:hover .avo-icon, .avo-featured.style-3 .min-area .content ul.feat li h6 span, .port-filter a.active, .port-filter a:hover, .portfolio-2 .port-inner:hover .dbox-relative h3 a:hover, .portfolio-2 .port-inner .port-dbox a span:hover, .portfolio-type-three .dbox-relative p,.portfolio-type-three .port-inner .dbox-relative a span:hover, .portfolio.style-4 .content .cont h6, .portfolio.style-4 .noraidus .cont h6 , .portfolio.style-5 .filtering span.active, .portfolio.style-5 .filtering.smplx span.active, .portfolio.style-6 .work-carousel .content .cont h6 , .portfolio.style-6 .work-carousel .noraidus .cont h6, .team-soc-list a:hover, .team-sicon li a, .team-sicon li a:hover, .team-1 p, .team-list-two .team-sicon li a, .team-3 .team-info p, .team-3 .team-info .team-sicon li a, .avo-team.style-4 .team h6, .avo-team.style-4 .team .item .info .social a,.testimonial.style-1 .rating-icon,  .testimonial.style-3 .item .info .author-name, .wpcf7-submit , .dark-page .wpcf7-submit, .content-btn, .color-bg .wpcf7-submit, span.your-name:before, span.your-email:before, span.cell-phone:before,  span.subject:before, .footer a,span.your-message:before, .footer a, .blog-post-list a:hover h3, .post-meta a, .post-meta li, .blog-2 .content-btn, .blog-content .blog-post p a, a .entry-title:hover, .post-detail > li a:hover, .post-detail > li i, .related-cat i, h3.related-title:hover,.imgpagi-box p, .img-pagination a:hover .img-pagi .lnr, .blog-post-list.blog-style-1 .blog-col-inner .excerpt-box a:hover h3, .blog-post-list.blog-style-1 .blog-col-inner .excerpt-box .content-btn:hover , .blog-post-list.blog-style-1 .blog-col-inner .excerpt-box .post-meta a , .blog-post-list.blog-style-1 .blog-col-inner .excerpt-box .post-meta li,  .widget ul li a:before, .widget.widget_recent_comments > ul > li:before, .widget.widget_recent_entries ul li a:before, .widget.widget_archive ul li a:before, .widget.widget_meta ul li a:before,.tagcloud a:hover, .abtw-soc a:hover, .form-submit #submit:hover, .screen-reader-text:focus, .dsc-btn-style3:hover .elementor-button, .dsc-btn-style-4, .woocommerce-info a, .woocommerce div.product p.price, .woocommerce div.product span.price,  .woocommerce .woocommerce-tabs .woocommerce-Tabs-panel .woocommerce-Reviews #comments .woocommerce-Reviews-title span, .woocommerce .woocommerce-tabs .woocommerce-Tabs-panel .woocommerce-Reviews #comments .commentlist .comment .comment_container .comment-text .star-rating, .woocommerce-account .woocommerce .woocommerce-MyAccount-content a, .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a:hover, .woocommerce-Reviews .commentlist .review .comment_container .comment-text .meta .woocommerce-review__dash, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce div.product form.cart .group_table td.woocommerce-grouped-product-list-item__label label a, .img-box-slider .slick-slide:hover .box-cont h3, .img-box-slider h3 a:hover, .img-box-slider .fa-angle-left.slick-arrow, .img-box-slider .fa-angle-right.slick-arrow, .img-box-slider .slick-dots li.slick-active button:before, .img-box-slider.imgbox-slider-2 .item .box-cont .feature-btn:hover, .info-box.style-5 .item-box .icon, .info-box.style-5 .mas-item .icon,  .info-box.style-5 .step-item .icon, .info-box.style-5 .item .icon, .info-box.style-6 .icon, .info-box.style-7 .mas-item .icon , .post-list.style-1 .item .cont .info a.author, .post-list.style-2 .item .cont .info .tag, .post-list.style-3 .item .cont .info .tagm, #wp-calendar tbody tr td, #wp-calendar thead, .post-pager p, code, .img-box-slider.imgbox-slider-2 .item .box-cont .feature-btn,.text-color    
		{color:$general;}

	    .woocommerce table td.product-remove a:hover, .woocommerce .woocommerce-tabs ul.tabs li.active a, .woocommerce .woocommerce-tabs ul.tabs li a:hover, .searchform::after
      	{color: $general !important;}

		.content-title:after,.to-top, .btn-curve.btn-color,.pace .pace-progress,.button.style-1.btn-color,.avo-title.style-1 .sub-title span,.menu-wrapper > .menu > ul > li > a:before , .custom-absolute-menu .is-sticky .navigation > li > a:before,.btn-nav-top a, .search-icon-header .searchform::after, .avo-slider.style-1 .slider-style-2 .slider-subtitle,  .cta__slider-item .caption .bottom-corn:before, .avo-portfolio-single .slider-style-2 .slider-subtitle, .feature-4 .avo-icon, .avo-featured.style-2 .items .item-img .tlinks a:last-of-type, .avo-featured.style-2 .items .item-img .new , .other-portfolio .port-box , .portfolio-1 .port-inner .dbox-relative, .portfolio-type-three .port-inner:hover .dbox-relative a span, .portfolio.style-5 .filtering span:after, .portfolio.style-5 .filtering.smplx span:after,.team-soc-list a, .team-2 .port-box, .avo-team.style-4 .team .slick-dots li.slick-active button, .avo-team.style-4 .team .slick-dots li button:before, .skills-box .skill-progress .progres:after, .avo-progress-bar.style-1 .skills-box .skill-progress .progres:after, .wpcf7-submit:hover, .dsc-footer-style-2 .mc4wp-form-fields input[type=submit]:hover, .dsc-footer-style-3 h3:after, .dsc-footer-style-3 .mc4wp-form-fields input[type=submit] , .blog-link-img , .blog-link-img .bl-icon, .blog-post-list.blog-style-1 .blog-col-inner .blog-link-img, .blog-post-list.blog-style-1 .blog-col-inner .blog-link-img .bl-icon, .post-style-3 .entry-header .post-date, .ab-bordering, .abtw-soc a, .dsc-btn-style3  , .dsc-btn-style-4:hover, .woocommerce div.product form.cart .button, .img-box-slider .slick-dots li button:before,  .img-box-slider.imgbox-slider-2 .item .box-cont .feature-btn, .info-box.style-5 .mas-item .bg-color, .info-box.style-5 .step-item.xcolor, .post-list.style-2 .item.list .cont .date, .post-list.style-3 .item.list .cont .date, .avo-mc4wp-1 .mc4wp-form-fields input[type=submit]:hover
		{background:$general;}

		.cell-left-border, blockquote, .cell-right-border,.cursor-outer,.btn-curve.btn-color, .load-circle, .button.style-1.btn-color,.menu-wrapper ul li ul,.custom-absolute-menu, .btn-nav-top a,.btn-nav-top a:hover, .avo-slider.style-1 .dsc-btn-style1, .avo-portfolio-single .dsc-btn-style1, .feature-1:hover .avo-icon, .feature-1 .avo-icon, .feature-4 .avo-icon, .avo-featured.style-3 .min-area .content ul.feat li h6 span, .work-process.style-1 .item .box-img .bg-img, .portfolio-2 .port-inner .port-dbox a span:hover, .portfolio-type-three .port-inner:hover .dbox-relative a span , .portfolio-type-three .port-inner:hover .dbox-relative h3,.team-1 .team-info, .team-3 .team-info, .team-3 .team-info .team-sicon li a, .testimonial.style-2 .arrows .next:hover, .testimonial.style-2 .arrows .prev:hover, .testimonial.style-3 .arrows .next:hover, .testimonial.style-3 .arrows .prev:hover , .skills-box .skill-progress .progres:before , form input:focus, form textarea:focus, .comment-respond form input:focus, .comment-respond form textarea:focus, .wpcf7-submit,.wpcf7-submit:hover, .dark-page .wpcf7-submit, .content-btn,  .error-title,.blog-2 .content-btn i,  #related_posts .related-inner:hover, .related-inner, .blog-post-list.blog-style-1 .blog-col-inner .excerpt-box .content-btn:hover, .tagcloud a:hover,  .form-submit #submit,.form-submit #submit:hover,  .dsc-btn-style3:hover, .dsc-btn-style-4, .dsc-btn-style-4:hover, .woocommerce .woocommerce-tabs ul.tabs li a:hover,  .woocommerce .woocommerce-tabs ul.tabs li.active a, .img-box-slider.imgbox-slider-2 .item .box-cont .feature-btn 
		{border-color:$general;}

		.woocommerce .button:hover
		{border-color:$general !important;}

		.avo-progress-bar.style-1 .skills-box .skill-progress .progres:before
		{border-top-color:$general;}

		.to-top::before,.to-top::after,.blog-gallery a i
		{background: $general none repeat scroll 0 0;}

		.showcase.style-2 .showcase-carus .caption h1 .stroke, .showcase.style-2 .showcase.style-2 .showcase-carus .copy-cap h1 .stroke, .showcase.style-3 .showcase-carus.circle-slide .caption h1 .stroke, .showcase.style-3 .copy-cap h1 .stroke, .showcase.style-3 .caption h1 span, .showcase.style-3 .copy-cap h1 span, .showcase.style-3 .copy-cap .cap h1 .stroke, .showcase.style-3 .copy-cap .cap h1 span, .showcase.style-3 .showcase-carus.circle-slide .caption h1 span, .showcase.style-3 .showcase.style-3 .showcase-carus.circle-slide .copy-cap h1 span
		{-webkit-text-stroke: 1px $general;}
		
		.p-table a ,.blog-slider .slide-nav:hover,.work-content .slide-nav:hover,.tagcloud a:hover
			{color:#fff;}

		.dsc-btn-style3
			{background-color:#fff;}
		
		";   

		if ( class_exists( 'ReduxFrameworkPlugin' ) && avo_option( 'avo_color_general' ) ) {           
			wp_add_inline_style( 'avo-style', $color_general );
		}

		//hovers color
		$hovers = avo_option( 'avo_custom_hovers' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && avo_option( 'avo_custom_hovers' ) ) {  
			$custom_hovers = "a:hover{color:$hovers;}";         
			wp_add_inline_style( 'avo-style', $custom_hovers );
		}

		//scheme color
		$color = avo_option( 'avo_color_scheme' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && avo_option( 'avo_color_scheme' ) ) {  
			$custom_css = "a{color:$color;}";   
			wp_add_inline_style( 'avo-style', $custom_css );
		}
		
		//heading color 
		$heading = avo_option( 'avo_heading_color' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && avo_option( 'avo_heading_color' ) ) { 
			$heading_color = "h1, h2, h3, h4, h5, h6{color:$heading;} ";   
			wp_add_inline_style( 'avo-style', $heading_color );
		}

		//body color
		$general = avo_option( 'avo_general_color' );   
		if ( class_exists( 'ReduxFrameworkPlugin' ) && avo_option( 'avo_general_color' ) ) { 
			$general_color = "body{color:$general;}";          
			wp_add_inline_style( 'avo-style', $general_color );
		}
		
		//footer color
		$footer = avo_option( 'avo_footer_color' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && avo_option( 'avo_footer_color' ) ) {   
			$footer_color = ".footer{background-color:$footer;}";   
			wp_add_inline_style( 'avo-style', $footer_color );
		}

		//Main menu background
		$main_menu = avo_option( 'avo_main_menu' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && avo_option( 'avo_main_menu' ) ) {  
			$color_menu = ".white-header{background: $main_menu;}";   
			wp_add_inline_style( 'avo-style', $color_menu );
		}
		//Main menu color
		$main_menu = avo_option( 'avo_main_menu_hover' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && avo_option( 'avo_main_menu_hover' ) ) {  
			$color_menu = ".white-header .navigation li a{color: $main_menu;}";   
			wp_add_inline_style( 'avo-style', $color_menu );
		}
		
		//Sticky menu background
		$menu = avo_option( 'avo_stick_menu_bg' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && avo_option( 'avo_stick_menu_bg' ) ) {  
			$color_menu = ".white-header .is-sticky .stuck-nav{background: $menu;}";   
			wp_add_inline_style( 'avo-style', $color_menu );
		}

		//menu2 color
		$menu2 = avo_option( 'avo_stick_menu_color' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && avo_option( 'avo_stick_menu_color' ) ) { 
			$color_menu2 = ".white-header .is-sticky .navigation li a{color: $menu2;}";   
			wp_add_inline_style( 'avo-style', $color_menu2 );
		}

		//menu border color
		$menu_border = avo_option( 'avo_menu_border' );
		if ( class_exists( 'ReduxFrameworkPlugin' ) && avo_option( 'avo_menu_border' ) ) { 
			$color_border = ".custom-absolute-menu{border-color: $menu_border;}";   
			wp_add_inline_style( 'avo-style', $color_border );
		}
		
	}         
}

		