<?php
function umaya_removeDemoModeLink() { 
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}


class Umaya_Walker extends Walker_Nav_Menu {
  /**
   * @see Walker::start_el()
   * @since 3.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param object $item Menu item data object.
   * @param int $depth Depth of menu item. Used for padding.
   * @param int $current_page Menu item ID.
   * @param object $args
   */
 function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
	if ( $args->has_children ) {
    $class_names = ' class="nav-btn-box js-dropdown-open ' . esc_attr( $class_names ) . '"';
	}
	else {
    $class_names = ' class="nav-btn-box ' . esc_attr( $class_names ) . '"';
	}

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names .'>';
	$attributes = '';
	
    //$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	if ( $args->has_children ) {
    $attributes .= ! empty( $item->url )        ? ' ' : '';
	}
	else {
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	}

    // Check our custom has_children property.
    if ( $args->has_children ) {
      $attributes .= ' class="nav-btn large dropdown-hidden-btn js-pointer-large"';
    }
	else{
	$attributes .= ' class="nav-btn large large dropdown-hidden-btn js-animsition-link js-pointer-large"';
	}
	$item_output = $args->before;
    $item_output .= '<a'. $attributes .'><span class="nav-btn__inner" data-text="';
	$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
	$item_output .= '">';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</span></a>';
	$item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
 

  function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
    $id_field = $this->db_fields['id'];
    if ( is_object( $args[0] ) ) {
      $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
    }
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }

}


class Umaya_Footer_Walker extends Walker_Nav_Menu {
  /**
   * @see Walker::start_el()
   * @since 3.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param object $item Menu item data object.
   * @param int $depth Depth of menu item. Used for padding.
   * @param int $current_page Menu item ID.
   * @param object $args
   */
 function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
	$class_names = ' class="nav-btn-box-no ' . esc_attr( $class_names ) . '"';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names .'>';
	$attributes = '';
	
    //$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    // Check our custom has_children property.
    $attributes .= ' class="footer-nav__btn js-pointer-small js-footer-hover-link"';
	$item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
	$item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
 

  function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
    $id_field = $this->db_fields['id'];
    if ( is_object( $args[0] ) ) {
      $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
    }
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }

}


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once (UMAYA_THEME_PATH .'/framework/class-tgm-plugin-activation.php');

/**
 * Register the required plugins for this theme.
 */
function umaya_register_required_plugins() {
if (class_exists('WooCommerce')) {
$umaya_plugins = array(
// This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => esc_html__( 'Redux Framework', 'umaya' ),
            'slug'      => 'redux-framework',
            'required'  => true,
			'force_activation'   => false,
            'force_deactivation' => false,
        ),
		
		array(
            'name'      => esc_html__( 'WPBakery Page Builder', 'umaya' ),
            'slug'      => 'js_composer',
			'source'    => 'http://webredox.net/plugins/js_composer.zip',
            'required'  => true,
        ),	
		
			
		array(
            'name'      => esc_html__( 'Umaya Plugin', 'umaya' ),
            'slug'      => 'umaya-plugin',
			'source'    => 'http://webredox.net/plugins/umaya-plugin.zip',
			'required'  => true,
        ),
		array(
            'name'      => esc_html__( 'Contact Form 7', 'umaya' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
		
		array(
            'name'      => esc_html__( 'Meta Box', 'umaya' ),
            'slug'      => 'meta-box',
            'required'  => true,
        ),
		
    );
}
else {
$umaya_plugins = array(
// This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => esc_html__( 'Redux Framework', 'umaya' ),
            'slug'      => 'redux-framework',
            'required'  => true,
			'force_activation'   => false,
            'force_deactivation' => false,
        ),
		
		array(
            'name'      => esc_html__( 'WPBakery Page Builder', 'umaya' ),
            'slug'      => 'js_composer',
			'source'    => 'http://webredox.net/plugins/js_composer.zip',
            'required'  => true,
        ),	
		
		array(
            'name'               => esc_attr__( 'Revolution Slider', 'umaya' ),
            'slug'               => 'revslider',
            'source'             => esc_url('http://webredox.net/plugins/revslider.zip','umaya' ),
            'required'           => true,  
        ),
				
		array(
            'name'      => esc_html__( 'Umaya Plugin', 'umaya' ),
            'slug'      => 'umaya-plugin',
			'source'    => 'http://webredox.net/plugins/umaya-plugin.zip',
			'required'  => true,
        ),
		array(
            'name'      => esc_html__( 'Contact Form 7', 'umaya' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
		
		array(
            'name'      => esc_html__( 'Meta Box', 'umaya' ),
            'slug'      => 'meta-box',
            'required'  => true,
        ),
		
		
    );
}

    /**
     * Array of configuration settings. Amend each line as needed.
     */
    $umaya_config = array(
        'default_path' => '',                      
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',                      
        'is_automatic' => false,                   
        'message'      => '',                      
        
    );
tgmpa( $umaya_plugins, $umaya_config );



}
//portfolio search
function umaya_template_chooser($template)   
{    
  global $wp_query;   
  $umaya_post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $umaya_post_type == 'portfolio' )   
  {
    return locate_template('search-portfolio.php');  
  }   
  return $template;   
}
add_filter('template_include', 'umaya_template_chooser'); 

if ( is_admin() ) {

	function umaya_remove_revolution_slider_meta_boxes() {
		remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'gallery', 'normal' );
		remove_meta_box( 'slugdiv', 'gallery', 'normal' );
	}

	add_action( 'do_meta_boxes', 'umaya_remove_revolution_slider_meta_boxes' );
	
}

