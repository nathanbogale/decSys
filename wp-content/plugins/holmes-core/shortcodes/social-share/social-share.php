<?php

namespace HolmesCore\CPT\Shortcodes\SocialShare;

use HolmesCore\Lib;

class SocialShare implements Lib\ShortcodeInterface {
	private $base;
	private $socialNetworks;

	function __construct() {
		$this->base           = 'mkdf_social_share';
		$this->socialNetworks = array(
			'facebook',
			'twitter',
			'google_plus',
			'linkedin',
			'tumblr',
			'pinterest',
			'vk'
		);
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function getSocialNetworks() {
		return $this->socialNetworks;
	}

	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Social Share', 'holmes-core' ),
					'base'                      => $this->getBase(),
					'icon'                      => 'icon-wpb-social-share extended-custom-icon',
					'category'                  => esc_html__( 'by HOLMES', 'holmes-core' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'       => 'dropdown',
							'param_name' => 'type',
							'heading'    => esc_html__( 'Type', 'holmes-core' ),
							'value'      => array(
								esc_html__( 'List', 'holmes-core' )     => 'list',
								esc_html__( 'Dropdown', 'holmes-core' ) => 'dropdown',
								esc_html__( 'Text', 'holmes-core' )     => 'text'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'icon_type',
							'heading'    => esc_html__( 'Icons Type', 'holmes-core' ),
							'value'      => array(
								esc_html__( 'Font Awesome', 'holmes-core' ) => 'font-awesome',
								esc_html__( 'Font Elegant', 'holmes-core' ) => 'font-elegant'
							),
							'dependency' => array( 'element' => 'type', 'value' => array( 'list', 'dropdown' ) )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Social Share Title', 'holmes-core' )
						)
					)
				)
			);
		}
	}

	public function render( $atts, $content = null ) {
		$args   = array(
			'type'      => 'list',
			'icon_type' => 'font-elegant',
			'title'     => '',
			'widget'    => false,
		);
		$params = shortcode_atts( $args, $atts );

		//Is social share enabled
		$params['enable_social_share'] = ( holmes_mkdf_options()->getOptionValue( 'enable_social_share' ) == 'yes' ) ? true : false;

		//Is social share enabled for post type
		$post_type = str_replace( '-', '_', get_post_type() );

		if ( $params['widget'] === false ) {
			$params['enabled'] = ( holmes_mkdf_options()->getOptionValue( 'enable_social_share_on_' . $post_type ) == 'yes' ) ? true : false;
		}

		if ( $params['widget'] === true ) {
			$params['enabled'] = true;
		}

		//Social Networks Data
		$params['networks'] = $this->getSocialNetworksParams( $params );

		$html = '';

		if ( $params['enable_social_share'] ) {
			if ( $params['enabled'] ) {
				$html .= holmes_core_get_shortcode_module_template_part( 'templates/' . $params['type'], 'social-share', '', $params );
			}
		}

		return $html;
	}

	/**
	 * Get Social Networks data to display
	 * @return array
	 */
	private function getSocialNetworksParams( $params ) {
		$networks   = array();
		$icons_type = $params['icon_type'];
		$type       = $params['type'];

		foreach ( $this->socialNetworks as $net ) {
			$html = '';

			if ( holmes_mkdf_options()->getOptionValue( 'enable_' . $net . '_share' ) == 'yes' ) {
				$image  = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				$params = array(
					'name' => $net,
					'type' => $type
				);

				$params['link'] = $this->getSocialNetworkShareLink( $net, $image );

				if ( $type == 'text' ) {
					$params['text'] = $this->getSocialNetworkText( $net );
				} else {
					$params['icon'] = $this->getSocialNetworkIcon( $net, $icons_type );
				}

				$params['custom_icon'] = ( holmes_mkdf_options()->getOptionValue( $net . '_icon' ) ) ? holmes_mkdf_options()->getOptionValue( $net . '_icon' ) : '';

				$html = holmes_core_get_shortcode_module_template_part( 'templates/parts/network', 'social-share', '', $params );
			}

			$networks[ $net ] = $html;
		}

		return $networks;
	}

	/**
	 * Get share link for networks
	 *
	 * @param $net
	 * @param $image
	 *
	 * @return string
	 */
	private function getSocialNetworkShareLink( $net, $image ) {
		switch ( $net ) {
			case 'facebook':
				if ( wp_is_mobile() ) {
					$link = 'window.open(\'http://m.facebook.com/sharer.php?u=' . urlencode( get_permalink() ) . '\');';
				} else {
					$link = 'window.open(\'http://www.facebook.com/sharer.php?u=' . urlencode( get_permalink() ) . '\', \'sharer\', \'toolbar=0,status=0,width=620,height=280\');';
				}
				break;
			case 'twitter':
				$count_char  = ( isset( $_SERVER['https'] ) ) ? 23 : 22;
				$twitter_via = ( holmes_mkdf_options()->getOptionValue( 'twitter_via' ) !== '' ) ? ' via ' . holmes_mkdf_options()->getOptionValue( 'twitter_via' ) . ' ' : '';
				$link =  'window.open(\'https://twitter.com/intent/tweet?text=' . urlencode( holmes_mkdf_the_excerpt_max_charlength( $count_char ) . $twitter_via ) . ' ' . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');';
				
				break;
			case 'google_plus':
				$link = 'popUp=window.open(\'https://plus.google.com/share?url=' . urlencode( get_permalink() ) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'linkedin':
				$link = 'popUp=window.open(\'http://linkedin.com/shareArticle?mini=true&amp;url=' . urlencode( get_permalink() ) . '&amp;title=' . urlencode( get_the_title() ) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'tumblr':
				$link = 'popUp=window.open(\'http://www.tumblr.com/share/link?url=' . urlencode( get_permalink() ) . '&amp;name=' . urlencode( get_the_title() ) . '&amp;description=' . urlencode( get_the_excerpt() ) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'pinterest':
				$link = 'popUp=window.open(\'http://pinterest.com/pin/create/button/?url=' . urlencode( get_permalink() ) . '&amp;description=' . holmes_mkdf_addslashes( get_the_title() ) . '&amp;media=' . urlencode( $image[0] ) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'vk':
				$link = 'popUp=window.open(\'http://vkontakte.ru/share.php?url=' . urlencode( get_permalink() ) . '&amp;title=' . urlencode( get_the_title() ) . '&amp;description=' . urlencode( get_the_excerpt() ) . '&amp;image=' . urlencode( $image[0] ) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			default:
				$link = '';
		}

		return $link;
	}

	private function getSocialNetworkIcon( $net, $type ) {
		switch ( $net ) {
			case 'facebook':
				$icon = ( $type == 'font-elegant' ) ? 'social_facebook' : 'fab fa-facebook';
				break;
			case 'twitter':
				$icon = ( $type == 'font-elegant' ) ? 'social_twitter' : 'fab fa-twitter';
				break;
			case 'google_plus':
				$icon = ( $type == 'font-elegant' ) ? 'social_googleplus' : 'fab fa-google-plus';
				break;
			case 'linkedin':
				$icon = ( $type == 'font-elegant' ) ? 'social_linkedin' : 'fab fa-linkedin';
				break;
			case 'tumblr':
				$icon = ( $type == 'font-elegant' ) ? 'social_tumblr' : 'fab fa-tumblr';
				break;
			case 'pinterest':
				$icon = ( $type == 'font-elegant' ) ? 'social_pinterest' : 'fab fa-pinterest';
				break;
			case 'vk':
				$icon = 'fab fa-vk';
				break;
			default:
				$icon = '';
		}

		return $icon;
	}

	private function getSocialNetworkText( $net ) {
		switch ( $net ) {
			case 'facebook':
				$text = esc_html__( 'fb.', 'holmes-core' );
				break;
			case 'twitter':
				$text = esc_html__( 'tw.', 'holmes-core' );
				break;
			case 'google_plus':
				$text = esc_html__( 'g+', 'holmes-core' );
				break;
			case 'linkedin':
				$text = esc_html__( 'ln.', 'holmes-core' );
				break;
			case 'tumblr':
				$text = esc_html__( 'tmb.', 'holmes-core' );
				break;
			case 'pinterest':
				$text = esc_html__( 'pi.', 'holmes-core' );
				break;
			case 'vk':
				$text = esc_html__( 'vk.', 'holmes-core' );
				break;
			default:
				$text = '';
		}

		return $text;
	}
}