<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Heading_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-heading';
    }

    public function get_title() {
        return esc_html__( 'Yoox Heading', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-editor-h1';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label'     => esc_html__( 'Yoox Heading', 'yoox' ),
            ]
        );
        $this->add_control(
                'heading_tag',
                [
                        'label' => esc_html__( 'Heading Tag', 'yoox' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'h2',
                        'options' => [
                                'h1'  => esc_html__( 'Heading 1', 'yoox' ),
                                'h2'  => esc_html__( 'Heading 2', 'yoox' ),
                                'h3'  => esc_html__( 'Heading 3', 'yoox' ),
                                'h4'  => esc_html__( 'Heading 4', 'yoox' ),
                                'h5'  => esc_html__( 'Heading 5', 'yoox' ),
                                'h6'  => esc_html__( 'Heading 6', 'yoox' ),
                        ],
                ]
        );
        $this->add_control(
            'heading_text', [
                'label'         =>esc_html__( 'Heading Title', 'yoox' ),
                'type'		=> Controls_Manager::TEXT,
                'label_block'	=> true,
                'placeholder'	=>esc_html__( 'Add Heading', 'yoox' ),
                'default'	=>esc_html__( '', 'yoox' ),
            ]
        );
        $this->add_responsive_control(
            'heading_align', [
                'label'			=>esc_html__( 'Alignment', 'yoox' ),
                'type'			=> Controls_Manager::CHOOSE,
                'options'		=> [

                    'left'		=> [
                        'title'         =>esc_html__( 'Left', 'yoox' ),
                        'icon'          => 'fa fa-align-left',
                    ],
                    'center'            => [
                        'title'         =>esc_html__( 'Center', 'yoox' ),
                        'icon'          => 'fa fa-align-center',
                    ],
                    'right'		=> [
                        'title'         =>esc_html__( 'Right', 'yoox' ),
                        'icon'          => 'fa fa-align-right',
                    ],
                ],
                'default'		 => '',
                'prefix_class' => 'heading_align elementor%s-align-',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'heading_style', [
                'label'	 =>esc_html__( 'Heading Style', 'yoox' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_color', [
                'label'		 =>esc_html__( 'Heading color', 'yoox' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .custom_heading' => 'color: {{VALUE}};'
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'		 => 'heading_typography',
                'selector'	 => '{{WRAPPER}} .custom_heading',
            ]
        );
        $this->add_control(
                'paddings',
                [
                        'label' => esc_html__( 'Paddings', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .custom_heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_control(
                'margins',
                [
                        'label' => esc_html__( 'Margins', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .custom_heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );


        $this->end_controls_section();
        
    }

    protected function render() {
        $settings       = $this->get_settings();
        $heading_tag    = (isset($settings['heading_tag']) && $settings['heading_tag'] != '') ? $settings['heading_tag'] : 'h2';
        $tag_open       = '<'.$heading_tag.' class="custom_heading">';
        $tag_close       = '</'.$heading_tag.'>';
        $heading_text  = (isset($settings['heading_text']) && $settings['heading_text'] != '') ? $settings['heading_text'] : '';
        
        if($heading_text != ''):
            echo wp_kses_post($tag_open.$heading_text.$tag_close);
        endif;
    }

    protected function _content_template() {

    }
}
