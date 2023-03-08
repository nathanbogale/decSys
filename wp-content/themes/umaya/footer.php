<?php $umaya_options = get_option('umaya'); ?>
</main><!-- animsition-overlay end -->
<?php if (is_page()) { ?>
<?php if(get_post_meta($post->ID,'rnr_umaya_page_footer_selector_opt',true)=='st2'){ ?>

<?php } else { ?>
<!-- footer start -->
		<footer class="fixed-footer pos-rel bg-img-cover js-fixed-footer" style="background-image:url(<?php echo esc_url(Umaya_AfterSetupTheme::return_thme_option('backfooter','url'));?>)">
			<!-- bg-overlay -->
			<div class="bg-overlay-black"></div>
			<!-- pos-rel start -->
			<div class="pos-rel <?php if (Umaya_AfterSetupTheme::return_thme_option('en_footer_content_opt')=='st2'){ ?>flex-min-height-100vh<?php } ;?>">
				<!-- container start -->
				<div class="container <?php if (Umaya_AfterSetupTheme::return_thme_option('en_footer_content_opt')=='st2'){ ?>padding-top-bottom-120 <?php } else { ?>padding-top-bottom-60<?php } ;?>">
				<?php if (Umaya_AfterSetupTheme::return_thme_option('en_footer_content_opt')=='st2'){ ?>
					<?php if (Umaya_AfterSetupTheme::return_thme_option('en_footer_logo_opt')=='st2'){ ?>
					<!-- footer-logo start -->
					<div class="footer-logo footer-logo-desktop-hidden padding-bottom-90">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="footer-logo__img footer-logo" src="<?php echo esc_url(Umaya_AfterSetupTheme::return_thme_option('logopicfooter','url'));?>" alt="<?php  bloginfo('name'); ?>"></a>
					</div><!-- footer-logo end -->
					<?php } ;?>
					<!-- flex-container start -->
					<div class="flex-container flex-align-center">
						
						<!-- column start -->
						<div class="eight-columns">
						<?php if(!empty($umaya_options['notice_footer_tag'])):?>
							<h4 class="column-l-r-margin-10 headline-l footer-title">
								<?php echo do_shortcode($umaya_options['notice_footer_tag']);?>
							</h4>
						<?php endif?>
						</div><!-- column end -->
						<?php if(has_nav_menu('footer-menu')) { ?>
						<!-- column start -->
						<div class="four-columns footer-nav-mobile-padding">
							<ul class="column-l-r-margin-10 footer-nav-list js-footer-hover-box">
								<?php
								$defaults = array(
								'theme_location'  => 'footer-menu',
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
								'walker'          => new Umaya_Footer_Walker
								);
								if(has_nav_menu('footer-menu')) {
								wp_nav_menu( $defaults );
								}
								else {
								};
								?>
							</ul>
						</div><!-- column end -->
						<?php } ;?>
					</div><!-- flex-container end -->
					<?php if (Umaya_AfterSetupTheme::return_thme_option('en_footer_contact_opt')=='st2'){ ?>
					<!-- flex-container start -->
					<div class="flex-container flex-justify-center padding-top-30">
						<?php if(!empty($umaya_options['header_con_title2'])):?>
						<!-- column start -->
						<div class="four-columns column-50-100 padding-top-60 footer-email">
							<div class="column-l-r-margin-10">
								<div class="headline-xxxxs"><?php if(!empty($umaya_options['header_con_title2'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('header_con_title2',''));?><?php else : ?><?php esc_html_e('Email','umaya');?><?php endif;?></div>
								<div class="margin-top-10">
									<?php if(!empty($umaya_options['hd_email_address1'])):?>
									<a href="mailto:<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('hd_email_address1',''));?>" class="subhead-xxs text-color-b0b0b0 text-hover-to-white js-pointer-small"><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_email_address1',''));?></a><br>
									<?php endif; ?>
									<?php if(!empty($umaya_options['hd_email_address2'])):?>
									<a href="mailto:<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('hd_email_address2',''));?>" class="subhead-xxs text-color-b0b0b0 text-hover-to-white js-pointer-small"><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_email_address2',''));?></a><br>
									<?php endif; ?>
								</div>
							</div>
						</div><!-- column end -->
						<?php endif;?>
						<?php if(!empty($umaya_options['header_address_title1'])):?>
						<!-- column start -->
						<div class="four-columns column-50-100 padding-top-60 footer-address">
							<div class="column-l-r-margin-10">
								<div class="headline-xxxxs"><?php if(!empty($umaya_options['header_address_title1'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('header_address_title1',''));?><?php else : ?><?php esc_html_e('Address','umaya');?><?php endif;?></div>
								<div class="margin-top-10">
									<a href="#" class="subhead-xxs text-color-b0b0b0 text-hover-to-white js-pointer-small">
										<?php if(!empty($umaya_options['hd_address1'])):?>
										<?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_address1',''));?><br>
										<?php endif;?>
										<?php if(!empty($umaya_options['hd_address2'])):?>
										<?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_address2',''));?>
										<?php endif;?>
									</a>
								</div>
							</div>
						</div><!-- column end -->
						<?php endif;?>
						<?php if(!empty($umaya_options['header_con_title1'])):?>
						<!-- column start -->
						<div class="four-columns column-50-100 padding-top-60 footer-phone">
							<div class="column-l-r-margin-10">
								<div class="headline-xxxxs"><?php if(!empty($umaya_options['header_con_title1'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('header_con_title1',''));?><?php else : ?><?php esc_html_e('Phone','umaya');?><?php endif;?></div>
								<div class="margin-top-10">
								<?php if(!empty($umaya_options['hd_phn_number1'])):?>
								<a href="tel:<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('hd_phn_number1',''));?>" class="subhead-xxs text-color-b0b0b0 text-hover-to-white js-pointer-small"><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_phn_number1',''));?></a><br>
								<?php endif;?>
								<?php if(!empty($umaya_options['hd_phn_number2'])):?>
								<a href="tel:<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('hd_phn_number2',''));?>" class="subhead-xxs text-color-b0b0b0 text-hover-to-white js-pointer-small"><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_phn_number2',''));?></a><br>
								<?php endif;?>
								</div>
							</div>
						</div><!-- column end -->
						<?php endif;?>
					</div><!-- flex-container end -->

					<?php } ;?>
					<?php } ;?>

					<!-- footer-copyright start -->
					<div class="footer-copyright text-center pos-abs <?php if (Umaya_AfterSetupTheme::return_thme_option('en_footer_content_opt')=='st2'){ ?>pos-bottom-center<?php } ;?>">
						<div class="copyright-style">
						<?php $umaya_copy = Umaya_AfterSetupTheme::return_thme_option('copyright');
						echo apply_filters('the_content',$umaya_copy);
						?>
						</div>
					</div><!-- footer-copyright end -->
				</div><!-- container end -->
			</div><!-- pos-rel end -->
		</footer><!-- footer end -->
		<?php
		wp_enqueue_script('footer-reveal');
		wp_enqueue_script('footer-reveal-init');
		?>
<?php } ;?>
<?php } else { ?>
<!-- footer start -->
		<footer class="fixed-footer pos-rel bg-img-cover js-fixed-footer" style="background-image:url(<?php echo esc_url(Umaya_AfterSetupTheme::return_thme_option('backfooter','url'));?>)">
			<!-- bg-overlay -->
			<div class="bg-overlay-black"></div>
			<!-- pos-rel start -->
			<div class="pos-rel <?php if (Umaya_AfterSetupTheme::return_thme_option('en_footer_content_opt')=='st2'){ ?>flex-min-height-100vh<?php } ;?>">
				<!-- container start -->
				<div class="container <?php if (Umaya_AfterSetupTheme::return_thme_option('en_footer_content_opt')=='st2'){ ?>padding-top-bottom-120 <?php } else { ?>padding-top-bottom-60<?php } ;?>">
				<?php if (Umaya_AfterSetupTheme::return_thme_option('en_footer_content_opt')=='st2'){ ?>
					<?php if (Umaya_AfterSetupTheme::return_thme_option('en_footer_logo_opt')=='st2'){ ?>
					<!-- footer-logo start -->
					<div class="footer-logo footer-logo-desktop-hidden padding-bottom-90">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="footer-logo__img footer-logo" src="<?php echo esc_url(Umaya_AfterSetupTheme::return_thme_option('logopicfooter','url'));?>" alt="<?php  bloginfo('name'); ?>"></a>
					</div><!-- footer-logo end -->
					<?php } ;?>
					<!-- flex-container start -->
					<div class="flex-container flex-align-center">
						
						<!-- column start -->
						<div class="eight-columns">
						<?php if(!empty($umaya_options['notice_footer_tag'])):?>
							<h4 class="column-l-r-margin-10 headline-l footer-title">
								<?php echo do_shortcode($umaya_options['notice_footer_tag']);?>
							</h4>
						<?php endif?>
						</div><!-- column end -->
						<?php if(has_nav_menu('footer-menu')) { ?>
						<!-- column start -->
						<div class="four-columns footer-nav-mobile-padding">
							<ul class="column-l-r-margin-10 footer-nav-list js-footer-hover-box">
								<?php
								$defaults = array(
								'theme_location'  => 'footer-menu',
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
								'walker'          => new Umaya_Footer_Walker
								);
								if(has_nav_menu('footer-menu')) {
								wp_nav_menu( $defaults );
								}
								else {
								};
								?>
							</ul>
						</div><!-- column end -->
						<?php } ;?>
					</div><!-- flex-container end -->
					<?php if (Umaya_AfterSetupTheme::return_thme_option('en_footer_contact_opt')=='st2'){ ?>
					<!-- flex-container start -->
					<div class="flex-container flex-justify-center padding-top-30">
						<?php if(!empty($umaya_options['header_con_title2'])):?>
						<!-- column start -->
						<div class="four-columns column-50-100 padding-top-60 footer-email">
							<div class="column-l-r-margin-10">
								<div class="headline-xxxxs"><?php if(!empty($umaya_options['header_con_title2'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('header_con_title2',''));?><?php else : ?><?php esc_html_e('Email','umaya');?><?php endif;?></div>
								<div class="margin-top-10">
									<?php if(!empty($umaya_options['hd_email_address1'])):?>
									<a href="mailto:<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('hd_email_address1',''));?>" class="subhead-xxs text-color-b0b0b0 text-hover-to-white js-pointer-small"><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_email_address1',''));?></a><br>
									<?php endif; ?>
									<?php if(!empty($umaya_options['hd_email_address2'])):?>
									<a href="mailto:<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('hd_email_address2',''));?>" class="subhead-xxs text-color-b0b0b0 text-hover-to-white js-pointer-small"><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_email_address2',''));?></a><br>
									<?php endif; ?>
								</div>
							</div>
						</div><!-- column end -->
						<?php endif;?>
						<?php if(!empty($umaya_options['header_address_title1'])):?>
						<!-- column start -->
						<div class="four-columns column-50-100 padding-top-60 footer-address">
							<div class="column-l-r-margin-10">
								<div class="headline-xxxxs"><?php if(!empty($umaya_options['header_address_title1'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('header_address_title1',''));?><?php else : ?><?php esc_html_e('Address','umaya');?><?php endif;?></div>
								<div class="margin-top-10">
									<a href="#" class="subhead-xxs text-color-b0b0b0 text-hover-to-white js-pointer-small">
										<?php if(!empty($umaya_options['hd_address1'])):?>
										<?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_address1',''));?><br>
										<?php endif;?>
										<?php if(!empty($umaya_options['hd_address2'])):?>
										<?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_address2',''));?>
										<?php endif;?>
									</a>
								</div>
							</div>
						</div><!-- column end -->
						<?php endif;?>
						<?php if(!empty($umaya_options['header_con_title1'])):?>
						<!-- column start -->
						<div class="four-columns column-50-100 padding-top-60 footer-phone">
							<div class="column-l-r-margin-10">
								<div class="headline-xxxxs"><?php if(!empty($umaya_options['header_con_title1'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('header_con_title1',''));?><?php else : ?><?php esc_html_e('Phone','umaya');?><?php endif;?></div>
								<div class="margin-top-10">
								<?php if(!empty($umaya_options['hd_phn_number1'])):?>
								<a href="tel:<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('hd_phn_number1',''));?>" class="subhead-xxs text-color-b0b0b0 text-hover-to-white js-pointer-small"><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_phn_number1',''));?></a><br>
								<?php endif;?>
								<?php if(!empty($umaya_options['hd_phn_number2'])):?>
								<a href="tel:<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('hd_phn_number2',''));?>" class="subhead-xxs text-color-b0b0b0 text-hover-to-white js-pointer-small"><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('hd_phn_number2',''));?></a><br>
								<?php endif;?>
								</div>
							</div>
						</div><!-- column end -->
						<?php endif;?>
					</div><!-- flex-container end -->

					<?php } ;?>
					<?php } ;?>

					<!-- footer-copyright start -->
					<div class="footer-copyright text-center pos-abs <?php if (Umaya_AfterSetupTheme::return_thme_option('en_footer_content_opt')=='st2'){ ?>pos-bottom-center<?php } ;?>">
						<div class="copyright-style">
						<?php $umaya_copy = Umaya_AfterSetupTheme::return_thme_option('copyright');
						echo apply_filters('the_content',$umaya_copy);
						?>
						</div>
					</div><!-- footer-copyright end -->
				</div><!-- container end -->
			</div><!-- pos-rel end -->
		</footer><!-- footer end -->
		<?php
		wp_enqueue_script('footer-reveal');
		wp_enqueue_script('footer-reveal-init');
		?>
<?php } ;?>
<?php if (Umaya_AfterSetupTheme::return_thme_option('enablecursor')=='st2'){ 
	wp_enqueue_script('umaya-custom-cursor');
	wp_enqueue_style('umaya-custom-cursor-css');
} ;?>
<?php wp_footer(); ?>
</body>
</html>