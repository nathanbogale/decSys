<?php
/*
* Menu for search page
*/
global $avo_theme_settings;
if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
	$logo_height= avo_option('avo_logo_dim');
	$logo_height = $logo_height['height'];
	$logo_height_css = 'height:'.$logo_height;
	$logo_height_style = !empty($logo_height_css) ? ' style='.$logo_height_css : ''; 

}else{$logo_height_style ="";}

?>
<nav class="header apply-header white-header clearfix 
">  
	<div class="nav-box">
		<div class="stuck-nav">
			 <div class="container-fluid">
				<div class="top-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img alt="<?php esc_attr_e ('Logo','avo'); ?>" class="logo1 avo-logo-dark" <?php echo esc_html($logo_height_style); ?> src="<?php 
							if ( avo_option('avo_header_logo_white') ){ 
								$avo_header_logo_white = avo_option('avo_header_logo_white');
								if(is_array($avo_header_logo_white))
        								$avo_header_logo_white =  $avo_header_logo_white['url']; 
									echo esc_url ( $avo_header_logo_white);  
							} else { 
								echo get_template_directory_uri(); ?>/images/logo-white.png <?php } ?>">
						<img alt="<?php esc_attr_e ('Logo','avo'); ?>" class="logo1 avo-logo-light" <?php echo esc_html($logo_height_style); ?> src="<?php 
							if ( avo_option('avo_header_logo_dark') ){ 
								$avo_header_logo_dark = avo_option('avo_header_logo_dark');
								if(is_array($avo_header_logo_dark))
        								$avo_header_logo_dark =  $avo_header_logo_dark['url']; 
									echo esc_url ( $avo_header_logo_dark);  
							} else { 
								echo get_template_directory_uri(); ?>/images/logo-dark.png <?php } ?>">
					</a>
				</div><!--End Logo-->
				
				<div class="header-wrapper <?php  if ( class_exists('ReduxFrameworkPlugin') && (avo_option( 'avo_menu_position' ) =='center')) { echo 'dflex';}?> hidden-xs hidden-sm">
					<div class="main-menu menu-wrapper">
						<?php avo_custom_menu_page ('avo_header_menu');  ?>
					</div><!-- End menu-wrapper -->
				
					<ul class="header-icon hidden-sm hidden-xs"> 

						<?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) :
							if ( avo_option( 'avo_header_enable_social' ) == 'on' && avo_option( 'avo_header_facebook') ) :  ?>
								<li>
									<a href="<?php  echo esc_url( avo_option( 'avo_header_facebook' ) ); ?>">
										<i class="fa fa-facebook"></i>
									</a>
								</li>
							<?php endif; 
						endif; ?>

						<?php if (class_exists('ReduxFrameworkPlugin')) :
							if (avo_option('avo_header_enable_social') == 'on' && avo_option('avo_header_googleplus')) :  ?>
								<li>
									<a href="<?php  echo esc_url(avo_option( 'avo_header_googleplus' )); ?>">
										<i class="fa fa-google-plus"></i>
									</a>
								</li>
							<?php endif; 
						endif; ?>

						<?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) :
							if ( avo_option( 'avo_header_enable_social' ) == 'on' && avo_option( 'avo_header_twitter' ) ) :  ?>
								<li>
									<a href="<?php  echo esc_url( avo_option( 'avo_header_twitter' ) ); ?>">
										<i class="fa fa-twitter"></i>
									</a>
								</li>
							<?php endif; 
						endif; ?>

						<?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) :
							if ( (avo_option( 'avo_header_enable_social' ) == 'on') && avo_option( 'avo_header_instagram' ) ) :  ?>
								<li>
									<a href="<?php  echo esc_url( avo_option( 'avo_header_instagram' ) ); ?>">
										<i class="fa fa-instagram"></i>
									</a>
								</li>
							<?php endif; 
						endif; ?>

						<?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) :
							if ( avo_option( 'avo_header_enable_social' ) == 'on' && avo_option( 'avo_header_pinterest') ) :  ?>
								<li>
									<a href="<?php  echo esc_url(avo_option( 'avo_header_pinterest') ); ?>">
										<i class="fa fa-pinterest"></i>
									</a>
								</li>
							<?php endif; 
						endif; ?>

						<?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) :
							if ( avo_option('avo_header_enable_social') == 'on' && avo_option( 'avo_header_xing')) :  ?>
								<li>
									<a href="<?php  echo esc_url( avo_option( 'avo_header_xing') ); ?>">
										<i class="fa fa-xing"></i>
									</a>
								</li>
							<?php endif; 
						endif; ?>
						<?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) :
							if ( avo_option('avo_header_enable_social') == 'on' && avo_option( 'avo_header_linkedin')) :  ?>
								<li>
									<a href="<?php  echo esc_url( avo_option( 'avo_header_linkedin') ); ?>">
										<i class="fa fa-linkedin"></i>
									</a>
								</li>
							<?php endif; 
						endif; ?>

					</ul><!-- top Socials -->


					<div class="search-icon-header hidden-xs hidden-sm">
						<?php  if ( class_exists('ReduxFrameworkPlugin') && (avo_option( 'avo_header_search' ) =='on')) { ?>
						<a class="search"  href="#">
							<i class="fa fa-search"></i>
						</a>
						<div class="black-search-block">
							<div class="black-search-table">
								<div class="black-search-table-cell">
									<div>
										<?php $avo_unique_id = avo_unique_id( 'search-form-' ); ?>
										<form role="search" method="get" id="<?php echo esc_attr( $avo_unique_id ); ?>" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
											<input type="search" class="focus-input" placeholder="<?php echo esc_attr__('Type search keyword...','avo'); ?>" value="<?php get_search_query()?>" name="s">
											<input type="submit" class="searchsubmit" value="">
										</form>
									</div>
								</div>
							</div>
							<div class="close-black-block"><a href="#"><i class="fa fa-times"></i></a></div>
						</div>
						<?php } ?>

						<?php  if ( class_exists('ReduxFrameworkPlugin') && (avo_option( 'avo_header_cart' ) =='on')) { ?>

						<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						 
						    $count = WC()->cart->cart_contents_count;
						    ?>
						    <a class="cart-contents 1" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_attr__( 'View your shopping cart','avo' ); ?>">
						    	<?php 
						        ?>
						        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
						        <?php
						        ?></a>
						 
						<?php } ?>
						<?php } ?>

						<?php  if ( class_exists('ReduxFrameworkPlugin') && (avo_option( 'avo_header_btn' ) =='on')) { ?>

						<?php if ( class_exists('ReduxFrameworkPlugin') && avo_option( 'avo_menu_btn') && avo_option( 'avo_menu_btn_url') ) { ?>

							<div class="btn-nav-top">
				                <a  href="<?php  echo esc_url( avo_option( 'avo_menu_btn_url') ); ?>">
			                    <?php echo esc_attr( avo_option( 'avo_menu_btn')); ?>
			               		 </a>
							</div>
						<?php } ?>

						<?php }?>
					</div>
					
				</div><!-- header-wrapper -->  

				<div class="mobile-wrapper hidden-lg">
					<a href="#" class="hamburger"><div class="hamburger__icon"></div></a>
					<div class="fat-nav">
						<div class="fat-nav__wrapper">
							<div class="fat-list"> <?php avo_custom_flat_menu_page ('avo_header_menu'); ?></div>
						</div>
					</div>
				</div><!--End mobile-wrapper-->
				
			</div><!--End container-fluid-->
		</div><!--End stuck-nav-->
	</div><!--End nav-box-->
</nav><!--End header-->