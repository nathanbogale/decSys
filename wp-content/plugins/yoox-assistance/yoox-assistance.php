<?php
/*
    Plugin Name: Yoox Assistance
    Plugin URI: http://themewar.com/wp/yoox/
    Description: Assistance plugin for all Themewar themes.
    Version: 1.0.1
    Author: themewar
    Author URI: http://themewar.com/
    License: 
    Text Domain: yoox
*/

if (!defined('ABSPATH')) {
    exit;
}

/* * ---------------------------------------------------------------
* Including Files
* -------------------------------------------------------------* */

require_once dirname(__FILE__) . '/autoload.php';

class TW_Assistance{
    public static $_instance;

    public $plugin_name = 'Yoox Assistance';
    public $plugin_version = '1.0.1';
    public $file = __FILE__;


    public function __construct(){
        $this->tw_init();
    }

    /* * ---------------------------------------------------------------
    * Init all hooks and others
    * -------------------------------------------------------------* */

    public function tw_init(){
        add_action('plugins_loaded', array($this, 'tw_load_textdomain'));
        
        add_action('wp_enqueue_scripts', array($this, 'tw_enqueue_fontend_js_and_css'), 10);
        add_action('admin_enqueue_scripts', array($this, 'tw_admin_enqueue_scripts'));
        add_action('login_enqueue_scripts', array($this, 'tw_wp_login_css'), 10);
        
        add_action('widgets_init', array($this, 'tw_widgets_init'));
        
        add_action('wp_ajax_nopriv_post_like', array($this, 'yoox_ajax_post_like'));
        add_action('wp_ajax_post_like', array($this, 'yoox_ajax_post_like'));
        
        add_shortcode('post_like', array($this, 'yoox_post_like'));
        add_shortcode('post_share', array($this, 'yoox_post_share'));
        
        $this->kta_taxonomy_and_post_type_caller();
        $this->kta_post_type_caller();
        new Tw_Users_Meta_Hooks();
        //check elementor load
        if ( did_action( 'elementor/loaded' ) ) {
            Tw_Elementor::tw_get_instance();
        }
    }

    /* * ---------------------------------------------------------------
    * Load textdomain
    * -------------------------------------------------------------* */

    public function kta_taxonomy_and_post_type_caller(){
        $tmgc_tax = new Tw_Taxonomies('yoox');
        $tmgc_tax->tw_inits('folio_cat', 'Category', 'Categories', 'folios');
    }

    /* * ---------------------------------------------------------------
    * Widgets
    * -------------------------------------------------------------* */

    public function kta_post_type_caller(){
        $tmgc_tax = new Tw_Custom_Post('yoox');
        $tmgc_tax->tw_inits('folios', 'Portfolio', 'Portfolios', array('menu_icon' => 'dashicons-portfolio'));
    }

    /* * ---------------------------------------------------------------
    * JS and CSS for Frontend
    * -------------------------------------------------------------* */

    public static function tw_instance(){

        if (!isset(self::$_instance)) {
            self::$_instance = new TW_Assistance();
        }
        return self::$_instance;

    }

    /* * ---------------------------------------------------------------
    * Load Css For WP Login
    * -------------------------------------------------------------* */

    public function tw_load_textdomain(){
        load_plugin_textdomain('yoox', false, dirname(__FILE__) . '/languages');
    }

    /* * ---------------------------------------------------------------
    * Taxonomy Caller
    * -------------------------------------------------------------* */

    public function tw_widgets_init(){
        register_widget('Tw_Contact_Widgets');
        register_widget('Tw_Flickr_Widgets');
        register_widget('Tw_Recentpost_Widgets');
        register_widget('Tw_Gallery_Widgets');
        register_widget('Tw_About_Widgets');
    }

    /* * ---------------------------------------------------------------
    * Posttype Caller
    * -------------------------------------------------------------* */

    public function tw_admin_enqueue_scripts(){
        if (function_exists('wp_enqueue_media')) {
            wp_enqueue_media();
        } else {
            wp_enqueue_style('thickbox');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
        }

        wp_enqueue_style('yoox-assistance-style', plugin_dir_url($this->file) . 'assets/css/admin_style.css', false);
        wp_enqueue_script('tw-theme-core', plugin_dir_url($this->file) . 'assets/js/tw_admin.js', false);
    }

    /*======================================================================
    / Set Capabilities
    /=====================================================================*/
    public function tw_wp_login_css()
    {
        wp_enqueue_style('tw-theme-core', plugin_dir_url($this->file) . 'assets/css/login_style.css', false);
    }
    
    /* * ---------------------------------------------------------------
    * JS and CSS for Frontend
    * -------------------------------------------------------------* */
    function tw_enqueue_fontend_js_and_css(){
        wp_enqueue_script('yoox-assistance', plugin_dir_url($this->file).'assets/js/yoox-assistance.js', array('jquery'), '', true);
        wp_localize_script( 'yoox-assistance', 'yoox_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
    }

    /**---------------------------------------------------------------
    * Create Instance
    * -------------------------------------------------------------**/

    public function kta_assign_custom_post_capabilities()
    {
        $roles = array('editor', 'administrator');
        $types = array('footers', 'cheff', 'galleries', 'blocks');

        foreach ($types as $type):
            foreach ($roles as $the_role):
                $role = get_role($the_role);
                $role->add_cap("read");
                $role->add_cap("read_{$type}");
                $role->add_cap("read_private_{$type}s");
                $role->add_cap("edit_{$type}");
                $role->add_cap("edit_{$type}s");
                $role->add_cap("edit_others_{$type}s");
                $role->add_cap("edit_published_{$type}s");
                $role->add_cap("publish_{$type}s");
                $role->add_cap("delete_others_{$type}s");
                $role->add_cap("delete_private_{$type}s");
                $role->add_cap("delete_published_{$type}s");
            endforeach;
        endforeach;
    }
    
    /**---------------------------------------------------------------
    * Post Like Ajax
    * -------------------------------------------------------------**/
    public function yoox_ajax_post_like(){
        $pid = $_POST['pid'];
            
        $like = get_post_meta($pid, '_yoox_post_like', true);
        $like = ( empty($like) ) ? 0 : $like;
        $like++;
        
        update_post_meta($pid, '_yoox_post_like', $like);
        if($like < 2):
            echo wp_kses_post($like.' Like');
        else:
            echo wp_kses_post($like.' Likes');
        endif;
        wp_die();
    }
    
    /**---------------------------------------------------------------
    * Post Like Shortcodes
    * -------------------------------------------------------------**/
    public function yoox_post_like($atts){
        extract(
            shortcode_atts(
                array(
                    'pid'   => 0
                ), 
                $atts
            )
        );
        
        if($pid < 1){
            return '';
        }
        
        $post_like = get_post_meta($pid, '_yoox_post_like', TRUE);
        $post_like = ($post_like > 0) ? $post_like : 0;
        
        if($post_like < 2):
            $html = '-<a class="post_like" href="'.$pid.'">'.$post_like.' Like</a>';
        else:
            $html = '-<a class="post_like" href="'.$pid.'">'.$post_like.' Likes</a>';
        endif;
        return $html;
    }
    /**---------------------------------------------------------------
    * Yoox Single Post Share
    * -------------------------------------------------------------**/
    public function yoox_post_share($atts){
        extract(
            shortcode_atts(
                array(
                    'pid'   => 0
                ), 
                $atts
            )
        );
        
        $html = '';
        $html .= '<div class="postSocial text-right">';
            $html .= '<a target="_blank" href="http://twitter.com/intent/tweet?status='.get_the_title($pid).'+'.get_the_permalink($pid).'"><i class="fa fa-twitter"></i></a>';
            $html .= '<a target="_blank" href="http://pinterest.com/pin/create/bookmarklet/?media='.get_the_post_thumbnail_url($pid, 'yoox-blog-d').'&url='.get_the_permalink($pid).'&is_video=false&description='.get_the_title($pid).'"><i class="fa fa-pinterest"></i></a>';
            $html .= '<a target="_blank" href="http://www.facebook.com/share.php?u='.get_the_permalink($pid).'&title='.get_the_title($pid).'"><i class="fa fa-facebook"></i></a>';
            $html .= '<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url='.get_the_permalink($pid).'&title='.get_the_title($pid).'&source='.get_bloginfo('url').'"><i class="fa fa-linkedin"></i></a>';
        $html .= '</div>';
        
        return $html;
    }
}

$kta_instance = TW_Assistance::tw_instance();