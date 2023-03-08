<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Post_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-post';
    }
    
    public function get_title() {
        return esc_html__( 'Post', 'yoox' );
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
                'label' =>esc_html__( 'Post', 'yoox' ),
            ]
        );
        $this->add_control(
                'post_style',
                [
                        'label' => esc_html__( 'Post Style', 'yoox' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 1,
                        'options' => [
                                1       => esc_html__( 'Default', 'yoox' ),
                                2       => esc_html__( 'Slide', 'yoox' ),
                        ],
                ]
        );
        $this->add_control(
                'post_item',
                [
                        'label'     => esc_html__( 'Number Of Item', 'yoox' ),
                        'type'      => Controls_Manager::NUMBER,
                        'min'       => 3,
                        'max'       => 200,
                        'step'      => 1,
                        'default'   => 3,
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
                                'title'      => esc_html__( 'Title', 'yoox' ),
                                'rand'       => esc_html__( 'Random', 'yoox' ),
                                'comment_count'       => esc_html__( 'Comment', 'yoox' ),
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
        $settings   = $this->get_settings();
        $post_style = (isset($settings['post_style']) && $settings['post_style'] > 0) ? $settings['post_style'] : 1;
        $post_item  = (isset($settings['post_item']) && $settings['post_item'] > 0) ? $settings['post_item'] : 3;
        $order_by   = (isset($settings['order_by']) && $settings['order_by'] != '') ? $settings['order_by'] : 'date';
        $order      = (isset($settings['order']) && $settings['order'] != '') ? $settings['order'] : 'desc';
        
        switch ($post_style){
            case 1:
                require_once dirname(__FILE__).'/style/post/style1.php';
                break;
            case 2:
                require_once dirname(__FILE__).'/style/post/style2.php';
                break;
            default:
                require_once dirname(__FILE__).'/style/post/style1.php';
                break;
        }
    }
    
    protected function _content_template() {
        
    }
}