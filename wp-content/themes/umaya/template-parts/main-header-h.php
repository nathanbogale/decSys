<?php $umaya_options = get_option('umaya'); ?>
		<?php if (is_page()) { ?>
		<?php if(get_post_meta($post->ID,'rnr_wr_pagetype_container',true)!='st3'){ ?>
		<?php if ( ! is_404() ) { ?>
		<!-- to top btn start -->
		<a href="#up" class="scroll-to-btn js-headroom js-midnight-color js-smooth-scroll js-pointer-large">
			<span class="scroll-to-btn__box">
				<span class="scroll-to-btn__arrow"></span>
			</span>
		</a><!-- to top btn end -->

		<!-- scroll down btn start -->
		<a href="#down" class="scroll-to-btn to-down js-headroom js-midnight-color js-smooth-scroll js-pointer-large js-scroll-btn">
			<span class="scroll-to-btn__box">
				<span class="scroll-to-btn__arrow"></span>
			</span>
		</a><!-- scroll down btn end -->
		<?php } ;?>
		<?php } ;?>
		<?php } else { ?>
		<?php if ( ! is_404() ) { ?>
		<!-- to top btn start -->
		<a href="#up" class="scroll-to-btn js-headroom js-midnight-color js-smooth-scroll js-pointer-large">
			<span class="scroll-to-btn__box">
				<span class="scroll-to-btn__arrow"></span>
			</span>
		</a><!-- to top btn end -->

		<!-- scroll down btn start -->
		<a href="#down" class="scroll-to-btn to-down js-headroom js-midnight-color js-smooth-scroll js-pointer-large js-scroll-btn">
			<span class="scroll-to-btn__box">
				<span class="scroll-to-btn__arrow"></span>
			</span>
		</a><!-- scroll down btn end -->
		<?php } ;?>
		<?php } ;?>
		<!-- header start -->
		<header class="fixed-header">
			<!-- logo start -->
			<div class="header-logo js-midnight-color js-headroom">
				<div class="hidden-box">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo__box js-pointer-large js-animsition-link">
					<?php if (Umaya_AfterSetupTheme::return_thme_option('textlogo')=='st2'){ ?>
				    <img class="header-logo__img white" src="<?php echo esc_url(Umaya_AfterSetupTheme::return_thme_option('logopiclight','url'));?>" alt="<?php  bloginfo('name'); ?>">
				    <img class="header-logo__img black" src="<?php echo esc_url(Umaya_AfterSetupTheme::return_thme_option('logopic','url'));?>" alt="<?php  bloginfo('name'); ?>">
					<?php }
					else{ ?>
					<h2 class="header-logo__img white text-logo headline-xs"><?php if(!empty($umaya_options['logotext'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('logotext',''));?><?php else : ?><?php  bloginfo('name'); ?><?php endif;?></h1>
					<h2 class="header-logo__img black text-logo headline-xs"><?php if(!empty($umaya_options['logotext'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('logotext',''));?><?php else : ?><?php  bloginfo('name'); ?><?php endif;?></h1>
					<?php } ;?>
					
					</a>
				</div>
			</div><!-- logo end -->
			<?php if(has_nav_menu('top-menu')) { ?>
			<!-- menu-icon start -->
			<div class="menu-icon js-menu-open-close js-pointer-large js-midnight-color js-headroom">
				<div class="menu-icon__box">
					<span class="menu-icon__inner"></span>
					<span class="menu-icon__close"></span>
				</div>
			</div><!-- menu-icon end -->
			<?php } ;?>
			<?php if (Umaya_AfterSetupTheme::return_thme_option('headercontact_opt')=='st2'){ ?>
			<?php global $umaya_button_target; ?>
			<?php if (Umaya_AfterSetupTheme::return_thme_option('headercontact_url_type')=='st2'){
			$umaya_button_target ='_blank';
			} else {
			$umaya_button_target ='_self';
			}
			;?>
			<!-- header-contact start -->
			<div class="header-contact js-midnight-color js-headroom">
				<div class="header-contact__flex">
					<div class="header-contact__anim">
						<a href="<?php echo esc_url(Umaya_AfterSetupTheme::return_thme_option('con_p_url',''));?>" class="header-contact__btn vertical-text center js-pointer-large" target="<?php echo esc_attr($umaya_button_target);?>">
							<span class="vertical-text__inner"><i class="far fa-comment-dots"></i> <?php if(!empty($umaya_options['contact_bt_title'])):?><?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('contact_bt_title',''));?><?php else: ?><?php esc_html_e('Get in touch','umaya');?>
					<?php endif;?></span>
						</a>
					</div>
				</div>
			</div><!-- header-contact end -->
			<?php } ;?>

			<!-- header-social start -->
			<div class="header-social after-preloader-anim js-midnight-color js-headroom">
				<?php if (is_page()) { ?>
				<?php if(get_post_meta($post->ID,'rnr_wr_pagetype_container',true)!='st3'){ ?>
				<ul class="list list_center list_margin-20px hidden-box">
					
						<?php if(!empty($umaya_options['facebook'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['facebook']);?>"><i class="fab fa-facebook-f"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['twitter'])):?>
                         <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-02 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['twitter']);?>"><i class="fab fa-twitter"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['pinterest'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-03 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['pinterest']);?>"><i class="fab fa-pinterest"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['dribbble'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-04 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['dribbble']);?>"><i class="fab fa-dribbble"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['behance'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-05 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['behance']);?>"><i class="fab fa-behance"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['gplus'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-06 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['gplus']);?>"><i class="fab fa-google-plus"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['linkedin'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-07 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['linkedin']);?>"><i class="fab fa-linkedin"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['youtube'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-08 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['youtube']);?>"><i class="fab fa-youtube"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['vimeo'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-09 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['vimeo']);?>"><i class="fab fa-vimeo"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['slack'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-10 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['slack']);?>"><i class="fab fa-slack"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['instagram'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-11 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['instagram']);?>"><i class="fab fa-instagram"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['tumblr'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-12 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['tumblr']);?>"><i class="fab fa-tumblr"></i></a></div></li>
						<?php endif;?>
						 
				</ul>
				<?php } ;?>
				<?php } else { ?>
				<ul class="list list_center list_margin-20px hidden-box">
						<?php if(!empty($umaya_options['facebook'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['facebook']);?>"><i class="fab fa-facebook-f"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['twitter'])):?>
                         <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-02 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['twitter']);?>"><i class="fab fa-twitter"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['pinterest'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-03 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['pinterest']);?>"><i class="fab fa-pinterest"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['dribbble'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-04 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['dribbble']);?>"><i class="fab fa-dribbble"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['behance'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-05 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['behance']);?>"><i class="fab fa-behance"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['gplus'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-06 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['gplus']);?>"><i class="fab fa-google-plus"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['linkedin'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-07 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['linkedin']);?>"><i class="fab fa-linkedin"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['youtube'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-08 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['youtube']);?>"><i class="fab fa-youtube"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['vimeo'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-09 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['vimeo']);?>"><i class="fab fa-vimeo"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['slack'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-10 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['slack']);?>"><i class="fab fa-slack"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['instagram'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-11 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['instagram']);?>"><i class="fab fa-instagram"></i></a></div></li>
						<?php endif;?>
						
						<?php if(!empty($umaya_options['tumblr'])):?>
                        <li class="list__item"><div class="hidden-box d-inline-block"><a class="anim-slide tr-delay-12 js-pointer-small" target="_blank" href="<?php echo esc_url($umaya_options['tumblr']);?>"><i class="fab fa-tumblr"></i></a></div></li>
						<?php endif;?>
				</ul>
				<?php } ;?>
			</div><!-- header-social end -->
		</header><!-- header end -->

		<!-- navigation start -->
		<nav class="nav-container pos-rel js-dropdown-active-box">
			<!-- pos-rel start -->
			<div class="pos-rel height-100perc">
				<!-- dropdown close btn start -->
				<div class="dropdown-close">
					<div class="dropdown-close__inner">
						<span class="dropdown-close__arrow"></span>
					</div>
					<div class="js-dropdown-close js-pointer-large"></div>
					<div class="js-dropdown-close-2lvl js-pointer-large"></div>
				</div><!-- dropdown close btn end -->

				

				<!-- menu-box start -->
				<ul class="menu-box">
					<?php
					$defaults = array(
					'theme_location'  => 'top-menu',
					'menu'            => 'nav',
					'container'       => '',
					'container_class' => '',
					'menu_class'      => 'navbar-main-menu',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '%3$s',
					'depth'           => 0,
					'walker'          => new Umaya_Walker
					);
					if(has_nav_menu('top-menu')) {
					wp_nav_menu( $defaults );
					}
					else {
					};
					?>

				</ul><!-- menu-box end -->
				<?php if(has_nav_menu('top-menu')) { ?>
				<!-- nav-information start -->
				<div class="nav-information">
					<?php if(!empty($umaya_options['header_con_title2'])):?>
					<!-- nav-email start -->
					<div>
						
						<div class="hidden-box d-inline-block">
							<div class="headline-xxxxs nav-title-color nav-reveal-anim js-nav-anim"><?php if(!empty($umaya_options['header_con_title2'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('header_con_title2',''));?><?php else : ?><?php esc_html_e('Email','umaya');?><?php endif;?></div>
						</div>
						
						<div class="nav-fade-anim js-nav-anim margin-top-10">
							<?php if(!empty($umaya_options['hd_email_address1'])):?>
							<a href="mailto:<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('hd_email_address1',''));?>" class="subhead-xxs nav-text-color text-hover-to-red js-pointer-small"><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_email_address1',''));?></a><br>
							<?php endif; ?>
							<?php if(!empty($umaya_options['hd_email_address2'])):?>
							<a href="mailto:<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('hd_email_address2',''));?>" class="subhead-xxs nav-text-color text-hover-to-red js-pointer-small"><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_email_address2',''));?></a>
							<?php endif; ?>
						</div>
					</div><!-- nav-email end -->
					<?php endif; ?>
					<?php if(!empty($umaya_options['header_address_title1'])):?>
					<!-- nav-address start -->
					<div>
						<div class="hidden-box d-inline-block">
							<div class="headline-xxxxs nav-title-color nav-reveal-anim js-nav-anim"><?php if(!empty($umaya_options['header_address_title1'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('header_address_title1',''));?><?php else : ?><?php esc_html_e('Address','umaya');?><?php endif;?></div>
						</div>
						<div class="nav-fade-anim js-nav-anim margin-top-10">
							<a href="#" class="subhead-xxs nav-text-color text-hover-to-red js-pointer-small">
								<?php if(!empty($umaya_options['hd_address1'])):?>
								<?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_address1',''));?><br>
								<?php endif;?>
								<?php if(!empty($umaya_options['hd_address2'])):?>
								<?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_address2',''));?>
								<?php endif;?>
							</a>
						</div>
					</div><!-- nav-address end -->
					<?php endif; ?>
					<?php if(!empty($umaya_options['header_con_title1'])):?>
					<!-- nav-phone start -->
					<div>
						<div class="hidden-box d-inline-block">
							<div class="headline-xxxxs nav-title-color nav-reveal-anim js-nav-anim"><?php if(!empty($umaya_options['header_con_title1'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('header_con_title1',''));?><?php else : ?><?php esc_html_e('Phone','umaya');?><?php endif;?></div>
						</div>
						<div class="nav-fade-anim js-nav-anim margin-top-10">
							<?php if(!empty($umaya_options['hd_phn_number1'])):?>
							<a href="tel:<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('hd_phn_number1',''));?>" class="subhead-xxs nav-text-color text-hover-to-red js-pointer-small"><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_phn_number1',''));?></a><br>
							<?php endif;?>
							<?php if(!empty($umaya_options['hd_phn_number2'])):?>
							<a href="tel:<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('hd_phn_number2',''));?>" class="subhead-xxs nav-text-color text-hover-to-red js-pointer-small"><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_phn_number2',''));?></a>
							<?php endif;?>
						</div>
					</div><!-- nav-phone end -->
					<?php endif;?>
				</div><!-- nav-information end -->

				<!-- nav-copyright start -->
				<div class="nav-copyright text-right">
					<div class="copyright-style nav-fade-anim js-nav-anim">
						<?php $umaya_copy = Umaya_AfterSetupTheme::return_thme_option('copyright');
						echo apply_filters('the_content',$umaya_copy);
						?>
					</div>
				</div><!-- nav-copyright end -->
				<?php } ?>
			</div><!-- pos-rel end -->
		</nav><!-- navigation end -->