<?php

namespace HolmesCore\CPT\Shortcodes\Portfolio;

use HolmesCore\Lib;

class PortfolioList implements Lib\ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'mkdf_portfolio_list';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );

		//Portfolio category filter
		add_filter( 'vc_autocomplete_mkdf_portfolio_list_category_callback', array(
			&$this,
			'portfolioCategoryAutocompleteSuggester',
		), 10, 1 ); // Get suggestion(find). Must return an array

		//Portfolio category render
		add_filter( 'vc_autocomplete_mkdf_portfolio_list_category_render', array(
			&$this,
			'portfolioCategoryAutocompleteRender',
		), 10, 1 ); // Get suggestion(find). Must return an array

		//Portfolio selected projects filter
		add_filter( 'vc_autocomplete_mkdf_portfolio_list_selected_projects_callback', array(
			&$this,
			'portfolioIdAutocompleteSuggester',
		), 10, 1 ); // Get suggestion(find). Must return an array

		//Portfolio selected projects render
		add_filter( 'vc_autocomplete_mkdf_portfolio_list_selected_projects_render', array(
			&$this,
			'portfolioIdAutocompleteRender',
		), 10, 1 ); // Render exact portfolio. Must return an array (label,value)

		//Portfolio tag filter
		add_filter( 'vc_autocomplete_mkdf_portfolio_list_tag_callback', array(
			&$this,
			'portfolioTagAutocompleteSuggester',
		), 10, 1 ); // Get suggestion(find). Must return an array

		//Portfolio tag render
		add_filter( 'vc_autocomplete_mkdf_portfolio_list_tag_render', array(
			&$this,
			'portfolioTagAutocompleteRender',
		), 10, 1 ); // Get suggestion(find). Must return an array
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map( array(
					'name'     => esc_html__( 'Portfolio List', 'holmes-core' ),
					'base'     => $this->getBase(),
					'category' => esc_html__( 'by HOLMES', 'holmes-core' ),
					'icon'     => 'icon-wpb-portfolio extended-custom-icon',
					'params'   => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Portfolio List Template', 'holmes-core' ),
							'value'       => array(
								esc_html__( 'Gallery', 'holmes-core' )      => 'gallery',
								esc_html__( 'Masonry', 'holmes-core' )      => 'masonry',
								esc_html__( 'Small Images', 'holmes-core' ) => 'small-images',
							),
							'save_always' => true,
							'admin_label' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'item_type',
							'heading'    => esc_html__( 'Click Behavior', 'holmes-core' ),
							'value'      => array(
								esc_html__( 'Open portfolio single page on click', 'holmes-core' )   => '',
								esc_html__( 'Open gallery in Pretty Photo on click', 'holmes-core' ) => 'gallery'
							)
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Number of Columns', 'holmes-core' ),
							'value'       => array_flip( holmes_mkdf_get_number_of_columns_array( true ) ),
							'description' => esc_html__( 'Default value is Three', 'holmes-core' ),
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__( 'Space Between Items', 'holmes-core' ),
							'value'       => array_flip( holmes_mkdf_get_space_between_items_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'number_of_items',
							'heading'     => esc_html__( 'Number of Portfolios Per Page', 'holmes-core' ),
							'description' => esc_html__( 'Set number of items for your portfolio list. Enter -1 to show all.', 'holmes-core' ),
							'value'       => '-1'
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'image_proportions',
							'heading'     => esc_html__( 'Image Proportions', 'holmes-core' ),
							'value'       => array(
								esc_html__( 'Original', 'holmes-core' )  => 'full',
								esc_html__( 'Square', 'holmes-core' )    => 'square',
								esc_html__( 'Landscape', 'holmes-core' ) => 'landscape',
								esc_html__( 'Portrait', 'holmes-core' )  => 'portrait',
								esc_html__( 'Medium', 'holmes-core' )    => 'medium',
								esc_html__( 'Large', 'holmes-core' )     => 'large'
							),
							'description' => esc_html__( 'Set image proportions for your portfolio list.', 'holmes-core' ),
							'dependency'  => array( 'element' => 'type', 'value' => array( 'gallery' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_fixed_proportions',
							'heading'     => esc_html__( 'Enable Fixed Image Proportions', 'holmes-core' ),
							'value'       => array_flip( holmes_mkdf_get_yes_no_select_array( false ) ),
							'description' => esc_html__( 'Set predefined image proportions for your masonry portfolio list. This option will apply image proportions you set in Portfolio Single page - dimensions for masonry option.', 'holmes-core' ),
							'dependency'  => array( 'element' => 'type', 'value' => array( 'masonry' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_image_shadow',
							'heading'     => esc_html__( 'Enable Image Shadow', 'holmes-core' ),
							'value'       => array_flip( holmes_mkdf_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'category',
							'heading'     => esc_html__( 'One-Category Portfolio List', 'holmes-core' ),
							'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'holmes-core' )
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'selected_projects',
							'heading'     => esc_html__( 'Show Only Projects with Listed IDs', 'holmes-core' ),
							'settings'    => array(
								'multiple'      => true,
								'sortable'      => true,
								'unique_values' => true
							),
							'description' => esc_html__( 'Delimit ID numbers by comma (leave empty for all)', 'holmes-core' )
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'tag',
							'heading'     => esc_html__( 'One-Tag Portfolio List', 'holmes-core' ),
							'description' => esc_html__( 'Enter one tag slug (leave empty for showing all tags)', 'holmes-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'orderby',
							'heading'     => esc_html__( 'Order By', 'holmes-core' ),
							'value'       => array_flip( holmes_mkdf_get_query_order_by_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__( 'Order', 'holmes-core' ),
							'value'       => array_flip( holmes_mkdf_get_query_order_array() ),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'item_style',
							'heading'    => esc_html__( 'Item Style', 'holmes-core' ),
							'value'      => array(
								esc_html__( 'Standard - Shader', 'holmes-core' )                 => 'standard-shader',
								esc_html__( 'Standard - Switch Featured Images', 'holmes-core' ) => 'standard-switch-images',
								esc_html__( 'Gallery - Overlay', 'holmes-core' )                 => 'gallery-overlay',
								esc_html__( 'Gallery - Slide From Image Bottom', 'holmes-core' ) => 'gallery-slide-from-image-bottom'
							),
							'group'      => esc_html__( 'Content Layout', 'holmes-core' ),
							'dependency' => array( 'element' => 'type', 'value' => array( 'masonry', 'gallery' ) )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'text_position',
							'heading'    => esc_html__( 'Text Position', 'holmes-core' ),
							'value'      => array(
								esc_html__( 'Default', 'holmes-core' ) => '',
								esc_html__( 'Bottom', 'holmes-core' )  => 'mkdf-pli-hover-bottom'
							),
							'group'      => esc_html__( 'Content Layout', 'holmes-core' ),
							'dependency' => array( 'element' => 'item_style', 'value' => array( 'gallery-overlay' ) )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'content_top_margin',
							'heading'    => esc_html__( 'Content Top Margin (px or %)', 'holmes-core' ),
							'dependency' => array(
								'element' => 'item_style',
								'value'   => array( 'standard-shader', 'standard-switch-images', 'standard' )
							),
							'group'      => esc_html__( 'Content Layout', 'holmes-core' ),
							'dependency' => array( 'element' => 'type', 'value' => array( 'masonry', 'gallery' ) )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'content_bottom_margin',
							'heading'    => esc_html__( 'Content Bottom Margin (px or %)', 'holmes-core' ),
							'dependency' => array(
								'element' => 'item_style',
								'value'   => array( 'standard-shader', 'standard-switch-images', 'standard' )
							),
							'group'      => esc_html__( 'Content Layout', 'holmes-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'enable_title',
							'heading'    => esc_html__( 'Enable Title', 'holmes-core' ),
							'value'      => array_flip( holmes_mkdf_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Content Layout', 'holmes-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_tag',
							'heading'    => esc_html__( 'Title Tag', 'holmes-core' ),
							'value'      => array_flip( holmes_mkdf_get_title_tag( true ) ),
							'dependency' => array( 'element' => 'enable_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Content Layout', 'holmes-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_text_transform',
							'heading'    => esc_html__( 'Title Text Transform', 'holmes-core' ),
							'value'      => array_flip( holmes_mkdf_get_text_transform_array( true ) ),
							'dependency' => array( 'element' => 'enable_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Content Layout', 'holmes-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'enable_category',
							'heading'    => esc_html__( 'Enable Category', 'holmes-core' ),
							'value'      => array_flip( holmes_mkdf_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Content Layout', 'holmes-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'enable_count_images',
							'heading'    => esc_html__( 'Enable Number of Images', 'holmes-core' ),
							'value'      => array_flip( holmes_mkdf_get_yes_no_select_array( false, true ) ),
							'dependency' => array( 'element' => 'type', 'value' => array( 'gallery' ) ),
							'group'      => esc_html__( 'Content Layout', 'holmes-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'enable_excerpt',
							'heading'    => esc_html__( 'Enable Excerpt', 'holmes-core' ),
							'value'      => array_flip( holmes_mkdf_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Content Layout', 'holmes-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'excerpt_length',
							'heading'     => esc_html__( 'Excerpt Length', 'holmes-core' ),
							'description' => esc_html__( 'Number of characters', 'holmes-core' ),
							'dependency'  => array( 'element' => 'enable_excerpt', 'value' => array( 'yes' ) ),
							'group'       => esc_html__( 'Content Layout', 'holmes-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'pagination_type',
							'heading'    => esc_html__( 'Pagination Type', 'holmes-core' ),
							'value'      => array(
								esc_html__( 'None', 'holmes-core' )            => 'no-pagination',
								esc_html__( 'Standard', 'holmes-core' )        => 'standard',
								esc_html__( 'Load More', 'holmes-core' )       => 'load-more',
								esc_html__( 'Infinite Scroll', 'holmes-core' ) => 'infinite-scroll'
							),
							'group'      => esc_html__( 'Additional Features', 'holmes-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'load_more_top_margin',
							'heading'    => esc_html__( 'Load More Top Margin (px or %)', 'holmes-core' ),
							'dependency' => array( 'element' => 'pagination_type', 'value' => array( 'load-more' ) ),
							'group'      => esc_html__( 'Additional Features', 'holmes-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'filter',
							'heading'    => esc_html__( 'Enable Category Filter', 'holmes-core' ),
							'value'      => array_flip( holmes_mkdf_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Additional Features', 'holmes-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'filter_order_by',
							'heading'    => esc_html__( 'Filter Order By', 'holmes-core' ),
							'value'      => array(
								esc_html__( 'Name', 'holmes-core' )  => 'name',
								esc_html__( 'Count', 'holmes-core' ) => 'count',
								esc_html__( 'Id', 'holmes-core' )    => 'id',
								esc_html__( 'Slug', 'holmes-core' )  => 'slug'
							),
							'dependency' => array( 'element' => 'filter', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Additional Features', 'holmes-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'filter_text_transform',
							'heading'    => esc_html__( 'Filter Text Transform', 'holmes-core' ),
							'value'      => array_flip( holmes_mkdf_get_text_transform_array( true ) ),
							'dependency' => array( 'element' => 'filter', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Additional Features', 'holmes-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'filter_bottom_margin',
							'heading'    => esc_html__( 'Filter Bottom Margin (px or %)', 'holmes-core' ),
							'dependency' => array( 'element' => 'filter', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Additional Features', 'holmes-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_article_animation',
							'heading'     => esc_html__( 'Enable Article Animation', 'holmes-core' ),
							'value'       => array_flip( holmes_mkdf_get_yes_no_select_array( false ) ),
							'description' => esc_html__( 'Enabling this option you will enable appears animation for your portfolio list items', 'holmes-core' ),
							'group'       => esc_html__( 'Additional Features', 'holmes-core' )
						)
					)
				)
			);
		}
	}

	public function render( $atts, $content = null ) {
		$args   = array(
			'type'                        => 'gallery',
			'item_type'                   => '',
			'number_of_columns'           => 'three',
			'space_between_items'         => 'normal',
			'number_of_items'             => '-1',
			'image_proportions'           => 'full',
			'enable_fixed_proportions'    => 'no',
			'enable_image_shadow'         => 'no',
			'category'                    => '',
			'selected_projects'           => '',
			'tag'                         => '',
			'orderby'                     => 'date',
			'order'                       => 'ASC',
			'item_style'                  => 'standard',
			'text_position'               => '',
			'content_top_margin'          => '',
			'content_bottom_margin'       => '',
			'enable_title'                => 'yes',
			'title_tag'                   => 'h4',
			'title_text_transform'        => '',
			'enable_category'             => 'yes',
			'enable_count_images'         => 'yes',
			'enable_excerpt'              => 'no',
			'excerpt_length'              => '20',
			'pagination_type'             => 'no-pagination',
			'load_more_top_margin'        => '',
			'filter'                      => 'no',
			'filter_order_by'             => 'name',
			'filter_text_transform'       => '',
			'filter_bottom_margin'        => '',
			'enable_article_animation'    => 'no',
			'portfolio_slider_on'         => 'no',
			'enable_loop'                 => 'yes',
			'enable_autoplay'             => 'yes',
			'slider_speed'                => '5000',
			'slider_speed_animation'      => '600',
			'enable_navigation'           => 'yes',
			'navigation_skin'             => '',
			'enable_pagination'           => 'yes',
			'pagination_skin'             => '',
			'pagination_position'         => '',
			'portfolio_fullscreen_slider' => '',
			//'number_of_visible_items' => '',
			'enable_center'               => '',
			//'enable-auto-width'      => '',
			'slider_margin'               => '',
			'space_between'               => '',
			'subtract_from_height'        => '',
			'slider_padding'              => '', // DO NOT DELETE, PASSED FROM OTHER SHORTCODES
		);
		$params = shortcode_atts( $args, $atts );

		/***
		 * @params query_results
		 * @params holder_data
		 * @params holder_classes
		 * @params holder_inner_classes
		 */
		$additional_params = array();

		$query_array                        = $this->getQueryArray( $params );
		$query_results                      = new \WP_Query( $query_array );
		$additional_params['query_results'] = $query_results;

		$additional_params['holder_data']          = holmes_mkdf_get_holder_data_for_cpt( $params, $additional_params );
		$additional_params['holder_classes']       = $this->getHolderClasses( $params, $args );
		$additional_params['holder_inner_classes'] = $this->getHolderInnerClasses( $params );

		$params['this_object'] = $this;

		$html = holmes_core_get_cpt_shortcode_module_template_part( 'portfolio', 'portfolio-list', 'portfolio-holder', $params['type'], $params, $additional_params );

		return $html;
	}

	public function getQueryArray( $params ) {
		$query_array = array(
			'post_status'    => 'publish',
			'post_type'      => 'portfolio-item',
			'posts_per_page' => $params['number_of_items'],
			'orderby'        => $params['orderby'],
			'order'          => $params['order']
		);

		if ( ! empty( $params['category'] ) ) {
			$query_array['portfolio-category'] = $params['category'];
		}

		$project_ids = null;
		if ( ! empty( $params['selected_projects'] ) ) {
			$project_ids             = explode( ',', $params['selected_projects'] );
			$query_array['post__in'] = $project_ids;
		}

		if ( ! empty( $params['tag'] ) ) {
			$query_array['portfolio-tag'] = $params['tag'];
		}

		if ( ! empty( $params['next_page'] ) ) {
			$query_array['paged'] = $params['next_page'];
		} else {
			$query_array['paged'] = 1;
		}

		return $query_array;
	}

	public function getHolderClasses( $params, $args ) {
		$classes = array();

		if ( $params['portfolio_fullscreen_slider'] != 'yes' ) {
			$number_of_columns = $params['number_of_columns'];
			switch ( $number_of_columns ):
				case '1':
					$classes[] = 'mkdf-pl-one-column';
					break;
				case '2':
					$classes[] = 'mkdf-pl-two-columns';
					break;
				case '3':
					$classes[] = 'mkdf-pl-three-columns';
					break;
				case '4':
					$classes[] = 'mkdf-pl-four-columns';
					break;
				case '5':
					$classes[] = 'mkdf-pl-five-columns';
					break;
				default:
					$classes[] = 'mkdf-pl-three-columns';
					break;
			endswitch;
		}

		$classes[] = ! empty( $params['type'] ) ? 'mkdf-pl-' . $params['type'] : 'mkdf-pl-' . $args['type'];
		$classes[] = ! empty( $params['number_of_columns'] ) ? 'mkdf-' . $params['number_of_columns'] . '-columns' : 'mkdf-' . $args['number_of_columns'] . '-columns';
		$classes[] = ! empty( $params['space_between_items'] ) ? 'mkdf-' . $params['space_between_items'] . '-space' : 'mkdf-' . $args['space_between_items'] . '-space';
		$classes[] = ! empty( $params['item_style'] ) ? 'mkdf-pl-' . $params['item_style'] : '';
		$classes[] = $params['text_position'];
		$classes[] = $params['enable_fixed_proportions'] === 'yes' ? 'mkdf-fixed-masonry-items' : '';
		$classes[] = $params['enable_image_shadow'] === 'yes' ? 'mkdf-pl-has-shadow' : '';
		$classes[] = $params['enable_title'] === 'no' && $params['enable_category'] === 'no' && $params['enable_excerpt'] === 'no' ? 'mkdf-pl-no-content' : '';
		$classes[] = ! empty( $params['pagination_type'] ) ? 'mkdf-pl-pag-' . $params['pagination_type'] : '';
		$classes[] = $params['filter'] === 'yes' ? 'mkdf-pl-has-filter' : '';
		$classes[] = $params['enable_article_animation'] === 'yes' ? 'mkdf-pl-has-animation' : '';
		$classes[] = ! empty( $params['navigation_skin'] ) ? 'mkdf-nav-' . $params['navigation_skin'] . '-skin' : '';
		$classes[] = ! empty( $params['pagination_skin'] ) ? 'mkdf-pag-' . $params['pagination_skin'] . '-skin' : '';
		$classes[] = ! empty( $params['pagination_position'] ) ? 'mkdf-pag-' . $params['pagination_position'] : '';

		return implode( ' ', $classes );
	}

	public function getHolderInnerClasses( $params ) {
		$classes = array();

		$classes[] = $params['portfolio_slider_on'] === 'yes' ? 'mkdf-owl-slider mkdf-list-is-slider mkdf-portfolio-slider' : '';
		$classes[] = $params['portfolio_fullscreen_slider'] == 'yes' ? 'mkdf-portfolio-fs-slider' : '';

		return implode( ' ', $classes );
	}

	public function getArticleClasses( $params ) {
		$classes = array();

		$type       = $params['type'];
		$item_style = $params['item_style'];

		if ( get_post_meta( get_the_ID(), "mkdf_portfolio_featured_image_meta", true ) !== "" && $item_style === 'standard-switch-images' ) {
			$classes[] = 'mkdf-pl-has-switch-image';
		} elseif ( get_post_meta( get_the_ID(), "mkdf_portfolio_featured_image_meta", true ) === "" && $item_style === 'standard-switch-images' ) {
			$classes[] = 'mkdf-pl-no-switch-image';
		}

		$image_proportion = $params['enable_fixed_proportions'] === 'yes' ? 'fixed' : 'original';
		$masonry_size     = get_post_meta( get_the_ID(), 'mkdf_portfolio_masonry_' . $image_proportion . '_dimensions_meta', true );

		$classes[] = ! empty( $masonry_size ) && $type === 'masonry' ? 'mkdf-masonry-size-' . esc_attr( $masonry_size ) : '';

		$article_classes = get_post_class( $classes );

		return implode( ' ', $article_classes );
	}

	public function getImageSize( $params ) {
		$thumb_size = 'full';

		if ( ! empty( $params['image_proportions'] ) && $params['type'] == 'gallery' ) {
			$image_size = $params['image_proportions'];

			switch ( $image_size ) {
				case 'landscape':
					$thumb_size = 'holmes_mkdf_landscape';
					break;
				case 'portrait':
					$thumb_size = 'holmes_mkdf_portrait';
					break;
				case 'square':
					$thumb_size = 'holmes_mkdf_square';
					break;
				case 'medium':
					$thumb_size = 'medium';
					break;
				case 'large':
					$thumb_size = 'large';
					break;
				case 'full':
					$thumb_size = 'full';
					break;
			}
		}

		if ( $params['type'] == 'masonry' && $params['enable_fixed_proportions'] === 'yes' ) {
			$fixed_image_size = get_post_meta( get_the_ID(), 'mkdf_portfolio_masonry_fixed_dimensions_meta', true );

			switch ( $fixed_image_size ) {
				case 'small' :
					$thumb_size = 'holmes_mkdf_square';
					break;
				case 'large-width':
					$thumb_size = 'holmes_mkdf_landscape';
					break;
				case 'large-height':
					$thumb_size = 'holmes_mkdf_portrait';
					break;
				case 'large-width-height':
					$thumb_size = 'holmes_mkdf_huge';
					break;
				default :
					$thumb_size = 'full';
					break;
			}
		}

		return $thumb_size;
	}

	public function getStandardContentStyles( $params ) {
		$styles = array();

		$margin_top    = isset( $params['content_top_margin'] ) ? $params['content_top_margin'] : '';
		$margin_bottom = isset( $params['content_bottom_margin'] ) ? $params['content_bottom_margin'] : '';

		if ( ! empty( $margin_top ) ) {
			if ( holmes_mkdf_string_ends_with( $margin_top, '%' ) || holmes_mkdf_string_ends_with( $margin_top, 'px' ) ) {
				$styles[] = 'margin-top: ' . $margin_top;
			} else {
				$styles[] = 'margin-top: ' . holmes_mkdf_filter_px( $margin_top ) . 'px';
			}
		}

		if ( ! empty( $margin_bottom ) ) {
			if ( holmes_mkdf_string_ends_with( $margin_bottom, '%' ) || holmes_mkdf_string_ends_with( $margin_bottom, 'px' ) ) {
				$styles[] = 'margin-bottom: ' . $margin_bottom;
			} else {
				$styles[] = 'margin-bottom: ' . holmes_mkdf_filter_px( $margin_bottom ) . 'px';
			}
		}

		return implode( ';', $styles );
	}

	public function getTitleStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['title_text_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_text_transform'];
		}

		return implode( ';', $styles );
	}

	public function getSwitchFeaturedImage() {
		$featured_image_meta = get_post_meta( get_the_ID(), 'mkdf_portfolio_featured_image_meta', true );

		$featured_image = ! empty( $featured_image_meta ) ? esc_url( $featured_image_meta ) : '';

		return $featured_image;
	}

	public function getLoadMoreStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['load_more_top_margin'] ) ) {
			$margin = $params['load_more_top_margin'];

			if ( holmes_mkdf_string_ends_with( $margin, '%' ) || holmes_mkdf_string_ends_with( $margin, 'px' ) ) {
				$styles[] = 'margin-top: ' . $margin;
			} else {
				$styles[] = 'margin-top: ' . holmes_mkdf_filter_px( $margin ) . 'px';
			}
		}

		return implode( ';', $styles );
	}

	public function getFilterCategories( $params ) {
		$cat_id = 0;

		if ( ! empty( $params['category'] ) ) {
			$top_category = get_term_by( 'slug', $params['category'], 'portfolio-category' );

			if ( isset( $top_category->term_id ) ) {
				$cat_id = $top_category->term_id;
			}
		}

		$order = $params['filter_order_by'] === 'count' ? 'DESC' : 'ASC';

		$args = array(
			'taxonomy' => 'portfolio-category',
			'child_of' => $cat_id,
			'orderby'  => $params['filter_order_by'],
			'order'    => $order
		);

		$filter_categories = get_terms( $args );

		return $filter_categories;
	}

	public function getFilterHolderStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['filter_bottom_margin'] ) ) {
			$margin = $params['filter_bottom_margin'];

			if ( holmes_mkdf_string_ends_with( $margin, '%' ) || holmes_mkdf_string_ends_with( $margin, 'px' ) ) {
				$styles[] = 'margin-bottom: ' . $margin;
			} else {
				$styles[] = 'margin-bottom: ' . holmes_mkdf_filter_px( $margin ) . 'px';
			}
		}

		return implode( ';', $styles );
	}

	public function getFilterStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['filter_text_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['filter_text_transform'];
		}

		return implode( ';', $styles );
	}

	public function getItemLink() {
		$portfolio_link_meta = get_post_meta( get_the_ID(), 'portfolio_external_link', true );
		$portfolio_link      = ! empty( $portfolio_link_meta ) ? $portfolio_link_meta : get_permalink( get_the_ID() );

		return apply_filters( 'holmes_mkdf_portfolio_external_link', $portfolio_link );
	}

	public function getItemLinkTarget() {
		$portfolio_link_meta   = get_post_meta( get_the_ID(), 'portfolio_external_link', true );
		$portfolio_link_target = ! empty( $portfolio_link_meta ) ? '_blank' : '_self';

		return apply_filters( 'holmes_mkdf_portfolio_external_link_target', $portfolio_link_target );
	}

	/**
	 * Filter portfolio categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'portfolio-category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['portfolio_category_title'] ) > 0 ) ? esc_html__( 'Category', 'holmes-core' ) . ': ' . $value['portfolio_category_title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;
	}

	/**
	 * Find portfolio category by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$portfolio_category = get_term_by( 'slug', $query, 'portfolio-category' );
			if ( is_object( $portfolio_category ) ) {

				$portfolio_category_slug  = $portfolio_category->slug;
				$portfolio_category_title = $portfolio_category->name;

				$portfolio_category_title_display = '';
				if ( ! empty( $portfolio_category_title ) ) {
					$portfolio_category_title_display = esc_html__( 'Category', 'holmes-core' ) . ': ' . $portfolio_category_title;
				}

				$data          = array();
				$data['value'] = $portfolio_category_slug;
				$data['label'] = $portfolio_category_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}

	/**
	 * Filter portfolios by ID or Title
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioIdAutocompleteSuggester( $query ) {
		global $wpdb;
		$portfolio_id    = (int) $query;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT ID AS id, post_title AS title
					FROM {$wpdb->posts} 
					WHERE post_type = 'portfolio-item' AND ( ID = '%d' OR post_title LIKE '%%%s%%' )", $portfolio_id > 0 ? $portfolio_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['id'];
				$data['label'] = esc_html__( 'Id', 'holmes-core' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_html__( 'Title', 'holmes-core' ) . ': ' . $value['title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;
	}

	/**
	 * Find portfolio by id
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioIdAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio
			$portfolio = get_post( (int) $query );
			if ( ! is_wp_error( $portfolio ) ) {

				$portfolio_id    = $portfolio->ID;
				$portfolio_title = $portfolio->post_title;

				$portfolio_title_display = '';
				if ( ! empty( $portfolio_title ) ) {
					$portfolio_title_display = ' - ' . esc_html__( 'Title', 'holmes-core' ) . ': ' . $portfolio_title;
				}

				$portfolio_id_display = esc_html__( 'Id', 'holmes-core' ) . ': ' . $portfolio_id;

				$data          = array();
				$data['value'] = $portfolio_id;
				$data['label'] = $portfolio_id_display . $portfolio_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}

	/**
	 * Filter portfolio tags
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioTagAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_tag_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'portfolio-tag' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['portfolio_tag_title'] ) > 0 ) ? esc_html__( 'Tag', 'holmes-core' ) . ': ' . $value['portfolio_tag_title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;
	}

	/**
	 * Find portfolio tag by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioTagAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$portfolio_tag = get_term_by( 'slug', $query, 'portfolio-tag' );
			if ( is_object( $portfolio_tag ) ) {

				$portfolio_tag_slug  = $portfolio_tag->slug;
				$portfolio_tag_title = $portfolio_tag->name;

				$portfolio_tag_title_display = '';
				if ( ! empty( $portfolio_tag_title ) ) {
					$portfolio_tag_title_display = esc_html__( 'Tag', 'holmes-core' ) . ': ' . $portfolio_tag_title;
				}

				$data          = array();
				$data['value'] = $portfolio_tag_slug;
				$data['label'] = $portfolio_tag_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}
}