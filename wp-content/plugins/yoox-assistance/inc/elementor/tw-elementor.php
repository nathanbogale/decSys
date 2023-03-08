<?php

if (!defined('ABSPATH')) exit;

final class Tw_Elementor
{

    /**
     * Instance
     * @since 1.0.0
     */

    public static $_instance;


    public $file = __FILE__;

    /**
     * Load Construct
     * @since 1.0.0
     */

    public function __construct()
    {
        
        add_action('elementor/controls/controls_registered', array( $this, 'tw_icon_pack' ), 11 );
        
        add_action('elementor/elements/categories_registered', array($this, 'add_widget_categories'));
        add_action('elementor/widgets/widgets_registered', array($this, 'tw_elements'));

        add_action('elementor/editor/after_enqueue_styles', array($this, 'editor_enqueue_styles'));
        add_action('elementor/editor/before_enqueue_scripts', array($this, 'editor_enqueue_scripts'));

        add_action('elementor/frontend/before_enqueue_scripts', array($this, 'frontend_enqueue_scripts'));
        add_action('elementor/frontend/after_enqueue_styles', array($this, 'frontend_enqueue_scripts'));

    }
    
    /**
     * Extend Icon pack core controls.
     *
     * @param  object $controls_manager Controls manager instance.
     * @return void
    */

    public function tw_icon_pack( $controls_manager ) {

        require_once (dirname($this->file). '/controls/tw-icon.php');
        
        $controls = array(
            $controls_manager::ICON => 'TW_Icon_Controler',
        );

        foreach ( $controls as $control_id => $class_name ) {
            $controls_manager->unregister_control( $control_id );
            $controls_manager->register_control( $control_id, new $class_name() );
        }

    }

    /**
     * Category Register
     * @since  1.0.0
     */

    public function add_widget_categories($elements_manager)
    {
        $elements_manager->add_category(
            'yoox-elements',
            [
                'title' => esc_html__('Yoox', 'yoox'),
                'icon' => 'fa fa-plug',
            ],
            1
        );
    }

    /**
     * Elements register
     * @since  1.0.0
     */

    public function tw_elements($widgets_manager)
    {
        require_once dirname($this->file) . '/tw-heading.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Heading_Widget());
        
        require_once dirname($this->file) . '/tw-section-label.php';
        $widgets_manager->register_widget_type(new Elementor\TW_Section_Label_Widget());
        
        require_once dirname($this->file) . '/tw-link.php';
        $widgets_manager->register_widget_type(new Elementor\TW_Link_Widget());
        
        require_once dirname($this->file) . '/tw-section-title.php';
        $widgets_manager->register_widget_type(new Elementor\TW_Section_Title_Widgets());
        
        require_once dirname($this->file) . '/tw-discover.php';
        $widgets_manager->register_widget_type(new Elementor\TW_Discover_Widgets());
        
        require_once dirname($this->file) . '/tw-icon-box.php';
        $widgets_manager->register_widget_type(new Elementor\TW_Icon_box_Widgets());
        
        require_once dirname($this->file) . '/tw-testimonial.php';
        $widgets_manager->register_widget_type(new Elementor\TW_Testimonial_Widgets());
        
        require_once dirname($this->file) . '/tw-about-section.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_About_Widget());
        
        require_once dirname($this->file) . '/tw-portfolio.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Portfolio_Widgets());
        
        require_once dirname($this->file) . '/tw-funfact.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_funfact_Widgets());
        
        require_once dirname($this->file) . '/tw-skill-bar.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Skill_Bar_Widgets());
        
        require_once dirname($this->file) . '/tw-team.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Team_Widgets());
        
        require_once dirname($this->file) . '/tw-clients.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Clients_Widgets());
        
        require_once dirname($this->file) . '/tw-post.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Post_Widgets());
        
        require_once dirname($this->file) . '/tw-pricing.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Pricing_Widgets());
        
        require_once dirname($this->file) . '/tw-rev-slider.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Rev_Slider_Widgets());
        
        require_once dirname($this->file) . '/tw-yoox-button.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Button_Widget());
        
        require_once dirname($this->file) . '/tw-contact-form.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Contcat_Form_Widget());
        
        require_once dirname($this->file) . '/tw-mailchimp-form.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Mailchimp_Form_Widget());
        
        require_once dirname($this->file) . '/tw-google-map.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Google_Map_Widget());
        
        require_once dirname($this->file) . '/tw-call-to-action.php';
        $widgets_manager->register_widget_type(new Elementor\Tw_Call_To_Action_Widget());
    }

    /**
     * Frontend enqueue scripts
     * @since  1.0.0
     */

    public function frontend_enqueue_scripts()
    {
        //wp_enqueue_script('tw-admin-js', plugins_url('yoox-assistance/assets/js/tw_admin.js'), array( 'jquery', 'elementor-frontend' ), '', true);
    }

    /**
     * Editor enqueue scripts
     * @since  1.0.0
     */

    public function editor_enqueue_scripts()
    {

    }

    /**
     * Editor enqueue styles
     * @since  1.0.0
     */

    public function editor_enqueue_styles()
    {
        wp_enqueue_style( 'tw-icon-elementor', plugins_url('yoox-assistance/assets/css/icons.css'), null, '' );
    }

    /**
     * Preview enqueue scripts
     * @since  1.0.0
     */

    public function preview_enqueue_scripts()
    {

    }

    public static function tw_get_instance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new Tw_Elementor();
        }
        return self::$_instance;
    }

}