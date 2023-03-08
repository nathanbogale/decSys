<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_funfact_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-funfact';
    }
    
    public function get_title() {
        return esc_html__( 'Funfact', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-counter';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' =>esc_html__( 'Funfact', 'yoox' ),
            ]
        );
        $this->add_control(
                'funfact_style',
                [
                        'label' => esc_html__( 'Funfact Style', 'yoox' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 1,
                        'options' => [
                                1       => esc_html__( 'Background', 'yoox' ),
                                2       => esc_html__( 'Transparent', 'yoox' ),
                        ],
                ]
        );
        $this->add_control(
                'funfact_title',
                [
                        'label'         => esc_html__( 'Funfact Title', 'yoox' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => true,
                        'placeholder'   => esc_html__('Funfact Title', 'yoox')
                ]
        );
        $this->add_control(
                'funfact_count',
                [
                        'label'         => esc_html__( 'Count Number', 'yoox' ),
                        'type'          => Controls_Manager::NUMBER,
                        'default'       => '',
                        'placeholder'   => esc_html__('Count Text', 'yoox')
                ]
        );
        $this->add_responsive_control(
                'funfact_align', [
                        'label'                     =>esc_html__( 'Alignment', 'yoox' ),
                        'type'                      => Controls_Manager::CHOOSE,
                        'options'                   => [
                                'left'		 => [
                                        'title'	 =>esc_html__( 'Left', 'yoox' ),
                                        'icon'	 => 'fa fa-align-left',
                                ],
                                'center'	 => [
                                        'title'	 =>esc_html__( 'Center', 'yoox' ),
                                        'icon'	 => 'fa fa-align-center',
                                ],
                                'right'		 => [
                                        'title'	 =>esc_html__( 'Right', 'yoox' ),
                                        'icon'	 => 'fa fa-align-right',
                                ]
                        ],
                        'default'                   => 'center',
                        'prefix_class'              => 'yoox_funfact elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2', [
                    'label'     => esc_html__('Funfact Box Style ', 'yoox'),
                    'tab'       => Controls_Manager::TAB_STYLE
                ]
        );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name' => 'Background',
                            'label' => esc_html__( 'BG Color', 'yoox' ),
                            'types' => [ 'classic', 'gradient', 'video' ],
                            'selector' => '{{WRAPPER}} .singlefunfact',
                    ]
            );
            $this->start_controls_tabs( 'style_tabs_1' );
                $this->start_controls_tab(
                        'style_1_normal_tab',
                        [
                                'label' => esc_html__( 'Normal', 'yoox' ),
                        ]
                );
                $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                                'name'      => 'box_shadow',
                                'label'     => esc_html__( 'Box Shadow', 'yoox' ),
                                'selector'  => '{{WRAPPER}} .singlefunfact',
                        ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'style_1_hover_tab',
                        [
                                'label'     => esc_html__( 'Hover', 'yoox' ),
                        ]
                );
                $this->add_group_control(
                        Group_Control_Box_Shadow::get_type(),
                        [
                                'name'      => 'hover_box_shadow',
                                'label'     => esc_html__( 'Box Shadow', 'yoox' ),
                                'selector'  => '{{WRAPPER}} .singlefunfact:hover',
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_control(
                    'funfact_paddings',
                    [
                            'label' => esc_html__( 'Paddings', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .singlefunfact' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_control(
                'funfact_margins',
                [
                        'label' => esc_html__( 'Margins', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .singlefunfact' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_3', [
                'label' =>esc_html__( 'Funfact Inner', 'yoox' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
            $this->start_controls_tabs( 'style_tabs_2' );
                $this->start_controls_tab(
                        'style_normal_tab',
                        [
                                'label' => __( 'Normal', 'yoox' ),
                        ]
                );
                $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                                'name' => 'inner_background',
                                'label' => esc_html__( 'Inner BG', 'yoox' ),
                                'types' => [ 'classic', 'gradient', 'video' ],
                                'selector' => '{{WRAPPER}} .factInner'
                        ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'style_hover_tab',
                        [
                                'label' => __( 'Hover', 'yoox' ),
                        ]
                );
                $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                                'name' => 'inner_hover_background',
                                'label' => esc_html__( 'Inner Hover BG', 'yoox' ),
                                'types' => [ 'classic', 'gradient', 'video' ],
                                'selector' => '{{WRAPPER}} .singlefunfact:hover .factInner',
                                'description' => esc_html__('Choose your Funfact box inner area Hover BG color.', 'yoox')
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_control(
                    'inner_padding',
                    [
                            'label' => esc_html__( 'Paddings', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .factInner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_4',[
                    'label'     => esc_html__('Title Style', 'yoox'),
                    'tab'       => Controls_Manager::TAB_STYLE
                ]
        );
            $this->add_control(
                    'title_size',
                    [
                            'label' => esc_html__( 'Font Size', 'yoox' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => ['px'],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 500,
                                            'step' => 1,
                                    ],
                            ],
                            'default' => [
                                    'unit' => 'px',
                                    'size' => '',
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .singlefunfact h3' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->start_controls_tabs('style_tabs_3');
                $this->start_controls_tab(
                        'style_title_normal_tab',[
                            'label'     => esc_html__('Normal', 'yoox'),
                        ]
                );
                $this->add_control(
                        'title_color',[
                                'label' => esc_html__( 'Title Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .singlefunfact h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'style_title_hover_tab',[
                            'label'     => esc_html__('Hover', 'yoox'),
                        ]
                );
                $this->add_control(
                        'title_hover_color',[
                                'label' => esc_html__( 'Title Hover Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .singlefunfact:hover h3' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_control(
                    'title_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .singlefunfact h3' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_5',[
                    'label'     => esc_html__('Number Style', 'yoox'),
                    'tab'       => Controls_Manager::TAB_STYLE
                ]
        );
            $this->add_control(
                    'count_size',
                    [
                            'label' => esc_html__( 'Font Size', 'yoox' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px'],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 500,
                                            'step' => 1,
                                    ],
                            ],
                            'default' => [
                                    'unit' => 'px',
                                    'size' => '',
                            ],
                            'selectors' => [
                                    '{{WRAPPER}} .singlefunfact h1' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->start_controls_tabs('style_tabs_4');
                $this->start_controls_tab(
                        'style_count_normal_tab',[
                            'label'     => esc_html__('Normal', 'yoox'),
                        ]
                );
                $this->add_control(
                        'count_color',[
                                'label' => esc_html__( 'Count Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .singlefunfact h1' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'style_count_hover_tab',[
                            'label'     => esc_html__('Hover', 'yoox'),
                        ]
                );
                $this->add_control(
                        'count_hover_color',[
                                'label' => esc_html__( 'Count Hover Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .singlefunfact:hover h1' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_control(
                    'count_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .singlefunfact h1' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings = $this->get_settings();
        $funfact_style = (isset($settings['funfact_style']) && $settings['funfact_style'] > 0) ? $settings['funfact_style'] : 1;
        $funfact_title = (isset($settings['funfact_title']) && $settings['funfact_title'] != '') ? $settings['funfact_title'] : ' ';
        $funfact_count = (isset($settings['funfact_count']) && $settings['funfact_count'] != '') ? $settings['funfact_count'] : '8705';
        
        switch ($funfact_style){
            case 1:
                require dirname(__FILE__).'/style/funfact/style1.php';
                break;
            case 2:
                require dirname(__FILE__).'/style/funfact/style2.php';
                break;
            default:
                require dirname(__FILE__).'/style/funfact/style1.php';
                break;
        }
    }
    
    protected function _content_template() {

    }
    
}