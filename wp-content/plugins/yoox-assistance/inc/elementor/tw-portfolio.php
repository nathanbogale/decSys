<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Portfolio_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-portfolio';
    }
    
    public function get_title() {
        return esc_html__( 'Portfolio', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' =>esc_html__( 'Portfolio', 'yoox' ),
            ]
        );
        $this->add_control(
                'folio_style',
                [
                        'label' => esc_html__( 'Portfolio Style', 'yoox' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 1,
                        'options' => [
                                1       => esc_html__( 'Default', 'yoox' ),
                                2       => esc_html__( 'Masonry', 'yoox' ),
                                3       => esc_html__( 'Slide', 'yoox' ),
                        ],
                ]
        );
        $this->add_control(
                'is_filter',
                [
                        'label' => esc_html__( 'Is Filter?', 'yoox' ),
                        'type' => Controls_Manager::SWITCHER,
                        'label_on' => __( 'Show', 'yoox' ),
                        'label_off' => __( 'Hide', 'yoox' ),
                        'return_value' => 'yes',
                        'default' => '',
                ]
        );
        $this->add_control(
                'portfolio_item',
                [
                        'label'     => esc_html__( 'Number Of Item', 'yoox' ),
                        'type'      => Controls_Manager::NUMBER,
                        'min'       => 3,
                        'max'       => 100,
                        'step'      => 1,
                        'default'   => 6,
                ]
        );
        $this->add_control(
                'order_by',
                [
                        'label' => esc_html__( 'Order By', 'yoox' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'date',
                        'options' => [
                                'date'       => esc_html__( 'Date', 'yoox' ),
                                'title'       => esc_html__( 'Title', 'yoox' ),
                                'rand'       => esc_html__( 'Random', 'yoox' ),
                        ],
                ]
        );
        $this->add_control(
                'order',
                [
                        'label' => esc_html__( 'Order', 'yoox' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'desc',
                        'options' => [
                                'asc'       => esc_html__( 'Ascending', 'yoox' ),
                                'desc'       => esc_html__( 'Descending', 'yoox' ),
                        ],
                ]
        );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings = $this->get_settings();
        $folio_style = (isset($settings['folio_style']) && $settings['folio_style'] > 0) ? $settings['folio_style'] : 1;
        $is_filter = (isset($settings['is_filter'])) ? $settings['is_filter'] : '';
        $portfolio_item = (isset($settings['portfolio_item']) && $settings['portfolio_item'] > 0) ? $settings['portfolio_item'] : 6;
        $order_by = (isset($settings['order_by']) && $settings['order_by'] != '') ? $settings['order_by'] : 'date';
        $order = (isset($settings['order']) && $settings['order'] != '') ? $settings['order'] : 'desc';
        
        switch ($folio_style){
            case 1:
                require_once dirname(__FILE__).'/style/portfolio/style1.php';
                break;
            case 2:
                require_once dirname(__FILE__).'/style/portfolio/style2.php';
                break;
            case 3:
                require_once dirname(__FILE__).'/style/portfolio/style3.php';
                break;
            default:
                require_once dirname(__FILE__).'/style/portfolio/style1.php';
                break;
        }
    }
    
    protected function _content_template() {
        
    }
}