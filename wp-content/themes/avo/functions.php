<?php 
/**
 * Avo theme functions and definitions
 */

add_action( 'after_setup_theme', 'avo_theme_setup' );
function avo_theme_setup() {

	/* 
	* Add filters, actions, and theme-supported features.
	*/
	//add thumbnail
	add_theme_support( 'post-thumbnails' );

	//custom background
	add_theme_support( 'custom-background' );

	//Support Html5
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	//Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	//automatic feed
	add_theme_support( 'automatic-feed-links' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Wide Alignment.
	add_theme_support( 'align-wide' );

	// Enqueue editor styles.
	add_editor_style( 'css/style-editor.css' ); 

	// Enqueue editor font sizes.
	add_theme_support('disable-custom-font-sizes');

	//add menu homepage,portfolio and blog
	add_action( 'init', 'avo_register_menu' );

	// Retrieve the directory for the localization files
	$lang_dir = ( get_template_directory() . '/lang');
  
	// Set the theme's text domain using the unique identifier from above
	load_theme_textdomain('avo', $lang_dir);
  
	//width content
	if ( ! isset( $content_width ) )$content_width = 1170;
  
	//theme default script.
	add_action('wp_enqueue_scripts', 'avo_theme_scripts');

	//theme default styles.
	add_action('wp_enqueue_scripts', 'avo_theme_styles');
  
	//register sidebar
	add_action( 'widgets_init', 'avo_sidebar' );
  
	/*
	* custom filters
	*/
	//custom search setting
	add_filter( 'get_search_form', 'avo_search_form' );

	//custom excerpt
	add_filter( 'excerpt_length', 'avo_excerpt_length', 10 );

	//remove [..] in excerpt
	add_filter('get_the_excerpt', 'avo_trim_excerpt');

	//custom comment styles
	add_filter('comment_form_default_fields','avo_modify_comment_form_fields');

	//tag cloud filter
	add_filter('wp_generate_tag_cloud', 'avo_tag_cloud',10,1);

	//preloader styles.
	add_action( 'wp_enqueue_scripts', 'avo_preloader_set' );

	//preloader script.
	add_action( 'wp_enqueue_scripts', 'avo_preloader' );

	//next post link.
	add_filter('next_post_link', function($link) {
		$next_post = get_next_post();
		$title = esc_attr( $next_post->post_title);
		$link = str_replace('href=', 'title="'.esc_attr($title).'" href=', $link);
		return $link;
	});
  
	//previous post link.
	add_filter('previous_post_link', function($link) {
		$previous_post = get_previous_post();
		$title = esc_attr($previous_post->post_title);
		$link = str_replace('href=', 'title="'.esc_attr($title).'" href=', $link);
		return $link;
	});
  
	//color_schecmes script
	add_action( 'wp_enqueue_scripts', 'avo_color_scheme',99 );

	//avo custom css
	add_action( 'wp_enqueue_scripts', 'avo_custom_css',99 );

	//custom header
	add_action('avo-custom-header','avo_header_start') ;

	//create custom header
	add_action('avo-header-page','avo_custom_header_page') ;

	//custom header option
	add_action('avo-header-global','avo_custom_header_global') ;
  
	//custom footer
	add_action('avo-custom-footer','avo_footer_start') ;

	//custom side panel
	add_action('avo-custom-sidepanel','avo_sidepanel_start') ;
  
	//add image size
	add_image_size( 'avo-related-post', 500, 300, array( 'center', 'center' ) );
	//add image gallery size
	add_image_size( 'avo-gallery', 63, 63, array( 'center', 'center' ) );
  
	//comment reply
	add_action(  'wp_enqueue_scripts', 'avo_enqueue_comments_reply' );
  
	//color_schecmes script
	add_action( 'wp_enqueue_scripts', 'avo_color_scheme' );

	//Woocommerce
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 300,
        'gallery_thumbnail_image_width' => 250,
        'single_image_width'    => 800,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ) );

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function avo_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'avo_pingback_header' );

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function avo_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents 3" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_attr__( 'View your shopping cart','avo' ); ?>"><?php

        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php            

        ?></a><?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'avo_add_to_cart_fragment' );


//tag cloud filter
function avo_tag_cloud($input){
 	return preg_replace('/ style=("|\')(.*?)("|\')/','',$input);
}

//add menu for all page 

function avo_register_menu() {
	register_nav_menus( [
				'primary_menu' => esc_html__('All-pages-menu', 'avo')
			] ); 
}

//add meta options
if ( ! function_exists( 'avo_option' ) ) :
	function avo_option( $avo_option ) {
		global $avo_theme_settings, $post;
		$avo_single = false;
		if(is_singular()){
			$avo_value = get_post_meta( $post->ID, $avo_option, true); 
			$avo_single = true;
		}

		if($avo_single == true){
			if (is_string($avo_value) && (strlen($avo_value) > 0 || is_array($avo_value)) && $avo_value != 'default') {
				return $avo_value;
			}
		}

		if(isset($avo_theme_settings[$avo_option]) && $avo_theme_settings[$avo_option] != ''){
			$avo_option_value = $avo_theme_settings[$avo_option];
			return $avo_option_value;
		}

		return false;
	}
endif;


// Add specific CSS class to body by filter.
 
add_filter( 'body_class', function( $classes ) {
	$avo_mode='';
	if (avo_option( 'avo_theme_mode')=='dark_mode'){$avo_mode='avo-dark-mode';
	}elseif(avo_option( 'avo_theme_mode')=='auto_mode'){$avo_mode='avo-auto-mode';}
    return array_merge( $classes, array( $avo_mode ) );
} );


//custom excerpt function
function avo_excerpt_length( $length ) {
	return 60;
}

// Remove [...]
function avo_trim_excerpt($text) {
	$text = str_replace('[', '', $text);
	$text = str_replace(']', '', $text);
	return $text;
}

//adding sidebar widget
function avo_sidebar() {
	register_sidebar(
		array(
			'name' => esc_html__('Default Sidebar', 'avo' ),
			'id' => 'default-sidebar',
			'description' => esc_html__('Appears as the sidebar on blog and pages', 'avo' ),
			'before_widget' => '<div  id="%1$s" class="widget %2$s clearfix">','after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3> <div class="widget-border"></div>',
		)
	);
}

//add span to category
add_filter('wp_list_categories', 'avo_cat_count');
function avo_cat_count($links) {
	$links = str_replace('</a> (', '</a> <span>', $links);
	$links = str_replace(')', '</span>', $links);
	return $links;
}

add_filter('get_archives_link', 'avo_arch_count');
function avo_arch_count($links) {
	$links = str_replace('</a>&nbsp;(', '</a> <span>', $links);
	$links = str_replace(')', '</span>', $links);
	return $links;
}

/* Replacing the default WordPress search form with an HTML5 version */   

function avo_search_form( $form ) {
	$avo_unique_id = avo_unique_id( 'search-form-' );
	$form = '<form role="search" method="get" id="'.esc_attr( $avo_unique_id ).'" class="searchform" action="' . esc_url( home_url( '/' ) ) . '" > 
	<input type="search" placeholder="'.esc_attr__('Type keyword here','avo').'" value="' . get_search_query() . '" name="s" />
	<input type="submit" class="searchsubmit" />
	</form>';
	return $form;
}

//related post
function avo_related_post( $post_id, $related_count, $args = array() ) {
	$args = wp_parse_args( (array) $args, array(
		'orderby' => 'rand',
		'return'  => 'query', // Valid values are: 'query' (WP_Query object), 'array' (the arguments array)
	) );

	$related_args = array(
	'post_type'      => get_post_type( $post_id ),
	'posts_per_page' => $related_count,
	'post_status'    => 'publish',
	'post__not_in'   => array( $post_id ),
	'orderby'        => $args['orderby'],
	'tax_query'      => array()
	);

	$post = get_post( $post_id );
	$taxonomies = get_object_taxonomies( $post, 'names' );

	foreach( $taxonomies as $taxonomy ) {
		$terms = get_the_terms( $post_id, $taxonomy );
		if ( empty( $terms ) ) continue;
		$term_list = wp_list_pluck( $terms, 'slug' );
		$related_args['tax_query'][] = array(
			'taxonomy' => $taxonomy,
			'field'    => 'slug',
			'terms'    => $term_list
		);
	}

	if( count( $related_args['tax_query'] ) > 1 ) {
		$related_args['tax_query']['relation'] = 'OR';
	}

	if( $args['return'] == 'query' ) {
		return new WP_Query( $related_args );
	} else {
		return $related_args;
	}
}

//custom comment form
function avo_modify_comment_form_fields($fields){
	$req = get_option('require_name_email');
	$commenter = wp_get_current_commenter();
	$aria_req = ( $req ? " aria-required='true'" : '' ); 
	$fields['author'] = '<p class="comment-form-author">' . ( $req ? '' : '' ) . '<input id="author" name="author" type="text" placeholder="'. esc_attr__('Your Name ...','avo').'" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
	$fields['email'] = '<p class="comment-form-email">' . ( $req ? '' : '' ) . '<input id="email" name="email" type="text" placeholder="'. esc_attr__('Your Email ...','avo') .'"  value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
	$fields['url'] = '<p class="comment-form-url">'. '<input id="url" name="url" type="text" placeholder="'. esc_attr__('Your Website ...','avo').'" value="' . esc_url( $commenter['comment_author_url'] ) . '" size="30" /></p>';
	return $fields;
}

//comment reply script
function avo_enqueue_comments_reply() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

//Get unique ID. 
function avo_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}

// Remove the calculated image sizes
add_filter( 'wp_calculate_image_sizes', '__return_false' );


// Remove iframe obsolete attribute
function avo_remove_iframe_attributes($content){
    return str_replace(array('<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"', '</iframe>'), array('<iframe ', '</iframe>'), $content);
}
add_filter('the_content', 'avo_remove_iframe_attributes');

// Remove noscript obsolete attribute
function avo_remove_noscript_attributes($content){
    return str_replace(array('<noscript><img'), array('<img'), $content);
}
add_filter('the_content', 'avo_remove_noscript_attributes');


/*
* Theme scripts & Styles
*/
//include theme style
include( get_template_directory().'/inc/theme-style.php' );

//include theme script
include( get_template_directory().'/inc/theme-script.php');

//include color schemes 
include( get_template_directory().'/inc/class/theme-helper.php');

//include menu walker
include_once( get_template_directory().'/inc/class/menu-walker.php');

//included preloader setting
include( get_template_directory().'/inc/preloader.php');

//include color schemes 
include( get_template_directory().'/inc/color-schemes.php');

//include custom style 
include( get_template_directory().'/inc/custom-style.php');

//include comment template
include( get_template_directory().'/inc/comment-template.php');

//include custom header
include( get_template_directory().'/inc/custom-header.php');

//include custom footer
include( get_template_directory().'/inc/custom-footer.php');

//include custom side panel
include( get_template_directory().'/inc/custom-sidepanel.php');

//pagination
include( get_template_directory().'/inc/pagination.php');

//include TGM activation
include( get_template_directory().'/inc/plugin-install.php');

//include options admin
include_once( get_template_directory().'/inc/option-init.php');
