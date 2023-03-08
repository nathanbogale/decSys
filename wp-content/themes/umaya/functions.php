<?php
define('UMAYA_THEME_PATH',		get_template_directory());
define('UMAYA_THEME_URL',		get_template_directory_uri());
require (UMAYA_THEME_PATH . '/includes/style.php');
// Enqueue JS
require (UMAYA_THEME_PATH . '/includes/js.php');
require (UMAYA_THEME_PATH . '/includes/color.php');
require (UMAYA_THEME_PATH . '/includes/AfterSetupTheme.php');
require (UMAYA_THEME_PATH . '/includes/functions.php');
require (UMAYA_THEME_PATH . '/pagination.php');
require (UMAYA_THEME_PATH . '/admin/umaya-base.php');
//Widget
require (UMAYA_THEME_PATH . '/umaya-widget/umaya-widget.php');

if ( ! isset( $content_width ) ) $content_width = 900;	

$umaya_options = get_option('umaya');

// register nav menu
function umaya_register_menus() {
register_nav_menus( array( 
'top-menu' => esc_html__( 'Primary menu','umaya' ),
'footer-menu' => esc_html__( 'Footer menu(Sub item not allowed.)','umaya' ),
)
);
}

add_action( 'after_setup_theme', 'umaya_setup' );

function umaya_setup() {
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
	// Enqueue editor styles.
	add_editor_style( 'style-editor.css' );
	
	// Add custom editor font sizes.
	add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Small', 'umaya' ),
					'shortName' => 'S',
					'size'      => 11,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'umaya' ),
					'shortName' => 'M',
					'size'      => 12,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'umaya' ),
					'shortName' => 'L',
					'size'      => 36,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'umaya' ),
					'shortName' => 'XL',
					'size'      => 49,
					'slug'      => 'huge',
				),
			)
		);
	
	add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'Lightning Yellow', 'umaya' ),
            'slug' => 'lightning-yellow',
            'color' => '#F9BF26',
        ),
        array(
            'name' => esc_html__( 'Black', 'umaya' ),
            'slug' => 'color-black',
            'color' => '#000',
        ),
        
    ) );
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
	
	add_action( 'after_setup_theme', 'umaya_lang_setup' );
	function umaya_lang_setup(){
    load_theme_textdomain('umaya', get_template_directory() . '/languages');
    }
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );
	add_theme_support( "title-tag" );
	add_post_type_support( 'portgallery', 'post-formats' );
}
// Word Limit 
	function umaya_string_limit_words($string, $word_limit)
	{
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
	}
// Add post thumbnail functionality
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 559, 220, true ); // Normal post thumbnails
	add_image_size( 'umaya_blog_image', 800, 800, true ); // Blog Thumbnail
	add_image_size( 'umaya_blog_grid_image', 403, 504, true ); // Blog Thumbnail
	add_image_size( 'umaya_portfolio_image', 758, 520, true ); // Portfolio Thumbnail
	add_image_size( 'umaya_portfolio_image_gallery_car', 604, 400, true ); // Portfolio Thumbnail
	add_image_size( 'umaya_port_gallery_header', 762, 441, true ); //galeery header
	add_image_size( 'umaya_blog', 695, 375, true ); //blog

if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}	
	
function umaya_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
 
add_filter( 'comment_form_fields', 'umaya_move_comment_field_to_bottom' );

// How comments are displayed
function umaya_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
?>
    <<?php echo esc_attr($tag); ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?>>
    <?php if ( 'div' != $args['style'] ) : ?>
	<?php endif; ?>
	
	<div class="comment-avatar">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, '70' ); ?>
	</div>
	<div class="comment-post">
	<h6 class="subhead-xs text-color-black"><?php printf(__('%s','umaya'), get_comment_author_link()) ?></h6>
	<div class="margin-top-5 subhead-xxs text-color-888888"><?php comment_date(get_option( 'date_format')); ?></div>
	<div class="body-text-s text-color-black margin-top-20"><?php comment_text() ?>
	
	<div class="clearfix"></div>
    <?php if ($comment->comment_approved == '0') : ?>
    <em class="p-style-small text-height-15 text-color-1"><?php esc_html_e('Your comment is awaiting moderation.','umaya') ?></em>
    <br />
	<?php endif; ?> 
	</div>
	<span class="d-inline-block margin-top-20 subhead-xxs text-color-black text-hover-to-red js-pointer-small "><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
	
	</div>
	
	   
<?php if ( 'div' != $args['style'] ) : ?>
    
    <?php endif; ?>
<?php
        }
// create sidebar & widget area
if(function_exists('register_sidebar')) {
function umaya_theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Blog Sidebar', 'umaya' ),
        'id' => 'sidebar-1',
        'description' => esc_html__( 'This area is Blog widget.', 'umaya' ),
        'before_widget' => '<div id="%1$s" class="widget padding-bottom-40 padding-20 text-color-black  content-bg-light-2 single-side-bar %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h4 class="headline-xxxs text-center text-color-black padding-bottom-30">', 
		'after_title'   => '</h4>'
    ) );
}
add_action( 'widgets_init', 'umaya_theme_slug_widgets_init' );

function umaya_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Page Sidebar', 'umaya' ),
        'id' => 'sidebar-2',
        'description' => esc_html__( 'This area is Page widget.', 'umaya' ),
        'before_widget' => '<div id="%1$s" class="widget bottom-padding-90 single-side-bar %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h4 class="p-style-bold-up red-color">', 
		'after_title'   => '</h4>'
    ) );
}
add_action( 'widgets_init', 'umaya_widgets_init' );


}

if(function_exists('vc_set_as_theme')) vc_set_as_theme();
// Initialising Shortcodes
if (class_exists('WPBakeryVisualComposerAbstract')) {
  function requireVcExtend(){
    require_once (UMAYA_THEME_PATH . '/extendvc/extend-vc.php');
  }

}

function umaya_my_search_form( $form ) {
$umaya_options = get_option('umaya');
if(!empty($umaya_options['translet_opt_3'])) {
$umaya_search_text = esc_html(Umaya_AfterSetupTheme::return_thme_option('translet_opt_3',''));
}
else {
$umaya_search_text ='Type & Hit Enter...';
}
    $umaya_form = '<form role="search" method="get" id="blog-search-form" class="form-search" action="' . esc_url(home_url( '/' )) . '" >
    <label class="screen-reader-text" for="s">' . esc_html__( 'Search for:','umaya' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-input black js-pointer-small" placeholder="'. esc_attr($umaya_search_text).'" />
   <button class="search-btn black js-pointer-large" type="button"><i class="fas fa-search"></i></button>
   </form>';
 
    return $umaya_form;
}
add_filter( 'get_search_form', 'umaya_my_search_form' );

if (is_admin() && isset($_GET['activated'])){
	wp_redirect(admin_url("themes.php?page=umaya"));
}

function umaya_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'umaya_excerpt_more');
function umaya_excerpt_length( $length ) {
    return 22;
}
add_filter( 'excerpt_length', 'umaya_excerpt_length', 999 );

function umaya_submenu_classes() {
    return array('menu-box dropdown js-dropdown', 'sub-menu');
}
add_action('nav_menu_submenu_css_class', 'umaya_submenu_classes');

/*removing default submit tag*/
remove_action('wpcf7_init', 'wpcf7_add_form_tag_submit');
/*adding action with function which handles our button markup*/
add_action('wpcf7_init', 'umaya_child_cf7_button');
/*adding out submit button tag*/
if (!function_exists('umaya_child_cf7_button')) {
function umaya_child_cf7_button() {
wpcf7_add_form_tag('submit', 'umaya_child_cf7_button_handler');
}
}

/*out button markup inside handler*/
if (!function_exists('umaya_child_cf7_button_handler')) {
function umaya_child_cf7_button_handler($tag) {
$tag = new WPCF7_FormTag($tag);
$class = wpcf7_form_controls_class($tag->type);
$atts = array();
$atts['class'] = $tag->get_class_option($class);
$atts['class'] .= ' umaya-child-custom-btn';
$atts['id'] = $tag->get_id_option();
$atts['tabindex'] = $tag->get_option('tabindex', 'int', true);
$value = isset($tag->values[0]) ? $tag->values[0] : '';
if (empty($value)) {
$value = esc_html__('Send', 'umaya');
}
$atts['type'] = 'submit';
$atts = wpcf7_format_atts($atts);
$html = sprintf('<div class="twelve-columns text-center padding-top-90"><button id="send" class="border-btn js-pointer-large"><span class="border-btn__inner">%2$s</span><span class="btn-wait"></span><span class="border-btn__lines-1"></span><span class="border-btn__lines-2"></span></button></div>', $atts, $value);
return $html;
}
}
function umaya_body_classes( $classes ) {
    $classes[] = 'preloader cursor-anim-enable dark-nav';
    return $classes;
}
add_filter( 'body_class','umaya_body_classes' );
