<?php
namespace HolmesCore\CPT\Shortcodes\PricingTable;

use HolmesCore\Lib;

class PricingTableItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_pricing_table_item';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Pricing Table Item', 'holmes-core' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-pricing-table-item extended-custom-icon',
					'category'                  => esc_html__( 'by HOLMES', 'holmes-core' ),
					'allowed_container_element' => 'vc_row',
					'as_child'                  => array( 'only' => 'mkdf_pricing_table' ),
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'holmes-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'holmes-core' )
						),
                        array(
                            'type'        => 'attach_image',
                            'param_name'  => 'image',
                            'heading'     => esc_html__('Image', 'holmes-core'),
                        ),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'content_background_color',
							'heading'    => esc_html__( 'Content Background Color', 'holmes-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Title', 'holmes-core' ),
							'value'       => esc_html__( 'Basic Plan', 'holmes-core' ),
							'save_always' => true
						),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'subtitle',
                            'heading'     => esc_html__( 'Subtitle', 'holmes-core' ),
                            'value'       => esc_html__( 'Basic plan description', 'holmes-core' ),
                            'save_always' => true
                        ),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'holmes-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'price',
							'heading'    => esc_html__( 'Price', 'holmes-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'price_color',
							'heading'    => esc_html__( 'Price Color', 'holmes-core' ),
							'dependency' => array( 'element' => 'price', 'not_empty' => true )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'currency',
							'heading'     => esc_html__( 'Currency', 'holmes-core' ),
							'description' => esc_html__( 'Default mark is $', 'holmes-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'currency_color',
							'heading'    => esc_html__( 'Currency Color', 'holmes-core' ),
							'dependency' => array( 'element' => 'currency', 'not_empty' => true )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'price_period',
							'heading'     => esc_html__( 'Price Period', 'holmes-core' ),
							'description' => esc_html__( 'Default label is monthly', 'holmes-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'price_period_color',
							'heading'    => esc_html__( 'Price Period Color', 'holmes-core' ),
							'dependency' => array( 'element' => 'price_period', 'not_empty' => true )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'button_text',
							'heading'     => esc_html__( 'Button Text', 'holmes-core' ),
							'value'       => esc_html__( 'BUY NOW', 'holmes-core' ),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link',
							'heading'    => esc_html__( 'Button Link', 'holmes-core' ),
							'dependency' => array( 'element' => 'button_text', 'not_empty' => true )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'button_type',
							'heading'     => esc_html__( 'Button Type', 'holmes-core' ),
							'value'       => array(
								esc_html__( 'Solid', 'holmes-core' )   => 'solid',
								esc_html__( 'Outline', 'holmes-core' ) => 'outline'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'button_text', 'not_empty' => true )
						),
						array(
							'type'       => 'textarea_html',
							'param_name' => 'content',
							'heading'    => esc_html__( 'Content', 'holmes-core' ),
							'value'      => '<li>content content content</li><li>content content content</li><li>content content content</li>'
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'             => '',
			'image'                    => '',
			'content_background_color' => '',
			'title'                    => '',
			'subtitle'                 => '',
			'title_color'              => '',
			'price'                    => '100',
			'price_color'              => '',
			'currency'                 => '$',
			'currency_color'           => '',
			'price_period'             => 'monthly',
			'price_period_color'       => '',
			'button_text'              => '',
			'link'                     => '',
			'button_type'              => 'outline'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['content']             = preg_replace( '#^<\/p>|<p>$#', '', $content ); // delete p tag before and after content
		$params['holder_classes']      = $this->getHolderClasses( $params );
		$params['holder_styles']       = $this->getHolderStyles( $params );
		$params['title_styles']        = $this->getTitleStyles( $params );
		$params['price_styles']        = $this->getPriceStyles( $params );
		$params['currency_styles']     = $this->getCurrencyStyles( $params );
		$params['price_period_styles'] = $this->getPricePeriodStyles( $params );
		$params['button_type']         = ! empty( $params['button_type'] ) ? $params['button_type'] : $args['button_type'];
		
		$html = holmes_core_get_shortcode_module_template_part( 'templates/pricing-table-template', 'pricing-table', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';

		return implode( ' ', $holderClasses );
	}
	
	private function getHolderStyles( $params ) {
		$itemStyle = array();
		
		if ( ! empty( $params['content_background_color'] ) ) {
			$itemStyle[] = 'background-color: ' . $params['content_background_color'];
		}
		
		return implode( ';', $itemStyle );
	}
	
	private function getTitleStyles( $params ) {
		$itemStyle = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['title_color'];
		}
		
		return implode( ';', $itemStyle );
	}
	
	private function getPriceStyles( $params ) {
		$itemStyle = array();
		
		if ( ! empty( $params['price_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['price_color'];
		}
		
		return implode( ';', $itemStyle );
	}
	
	private function getCurrencyStyles( $params ) {
		$itemStyle = array();
		
		if ( ! empty( $params['currency_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['currency_color'];
		}
		
		return implode( ';', $itemStyle );
	}
	
	private function getPricePeriodStyles( $params ) {
		$itemStyle = array();
		
		if ( ! empty( $params['price_period_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['price_period_color'];
		}
		
		return implode( ';', $itemStyle );
	}
}