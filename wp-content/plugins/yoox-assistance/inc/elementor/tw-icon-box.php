<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class TW_Icon_box_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-icon-box';
    }
    
    public function get_title() {
        return esc_html__( 'Icon Box', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' =>esc_html__( 'Icon Box', 'yoox' ),
            ]
        );
        $this->add_control(
                'icons',
                [
                        'label' => esc_html__( 'Icon', 'yoox' ),
                        'type' => Controls_Manager::ICON
                ]
        );
        $this->add_control(
                'box_title',
                [
                        'label' => esc_html__( 'Box Title', 'yoox' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => '',
                        'placeholder' => esc_html__('Box Title', 'yoox')
                ]
        );
        $this->add_control(
                'box_desc',
                [
                        'label' => esc_html__( 'Box Description', 'yoox' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => '',
                        'placeholder' => esc_html__('Description', 'yoox')
                ]
        );
        $this->add_responsive_control(
                'box_align', [
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
                        'prefix_class'              => 'yoox_icon_box elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2', [
                'label' =>esc_html__( 'Box Style', 'yoox' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'background',
                        'label' => esc_html__( 'BG', 'yoox' ),
                        'types' => [ 'classic', 'gradient', 'video' ],
                        'selector' => '{{WRAPPER}} .icon_box_1',
                ]
        );
        $this->start_controls_tabs( 'style_tabs_1' );
            $this->start_controls_tab(
                    'style_1_normal_tab',
                    [
                            'label' => __( 'Normal', 'yoox' ),
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'yoox' ),
                            'selector' => '{{WRAPPER}} .icon_box_1',
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    'style_1_hover_tab',
                    [
                            'label' => __( 'Hover', 'yoox' ),
                    ]
            );
            $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                            'name' => 'hover_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'yoox' ),
                            'selector' => '{{WRAPPER}} .icon_box_1:hover',
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        
        
        $this->add_control(
                'paddings',
                [
                        'label' => esc_html__( 'Paddings', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .icon_box_1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_3', [
                'label' =>esc_html__( 'Box Inner', 'yoox' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        
        $this->start_controls_tabs( 'style_tabs' );
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
                            'selector' => '{{WRAPPER}} .box_inner'
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
                            'selector' => '{{WRAPPER}} .icon_box_1:hover .box_inner',
                            'description' => esc_html__('Choose your icon box inner area Hover BG color.', 'yoox')
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
                                '{{WRAPPER}} .box_inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_4', [
                'label' =>esc_html__( 'Icon Style', 'yoox' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
            $this->add_control(
                    'icon_size',
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
                                    '{{WRAPPER}} .icon_box_1 i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                    ]
            );
            $this->start_controls_tabs('icon_st');
                $this->start_controls_tab(
                        'style_icon_normal_tab',
                        [
                                'label' => __( 'Normal', 'yoox' ),
                        ]
                );
                    $this->add_control(
                            'icon_color',
                            [
                                    'label' => esc_html__( 'Icon Color', 'yoox' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .icon_box_1 i' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'style_icon_hover_tab',
                        [
                                'label' => __( 'Hover', 'yoox' ),
                        ]
                );
                    $this->add_control(
                            'icon_hover_color',
                            [
                                    'label' => esc_html__( 'Icon Hover Color', 'yoox' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .icon_box_1:hover i' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            
            $this->add_control(
                    'icon_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .icon_box_1 i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_5', [
                'label' =>esc_html__( 'Title Style', 'yoox' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
            
            $this->start_controls_tabs('title_st');
                $this->start_controls_tab(
                        'style_title_normal_tab',
                        [
                                'label' => __( 'Normal', 'yoox' ),
                        ]
                );
                    $this->add_control(
                            'title_color',
                            [
                                    'label' => esc_html__( 'Title Color', 'yoox' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .icon_box_1 h4' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'style_title_hover_tab',
                        [
                                'label' => __( 'Hover', 'yoox' ),
                        ]
                );
                    $this->add_control(
                            'title_hover_color',
                            [
                                    'label' => esc_html__( 'Title Hover Color', 'yoox' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .icon_box_1:hover h4' => 'color: {{VALUE}}',
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
                                    '{{WRAPPER}} .icon_box_1 h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name' => 'title_typography',
                            'label' => __( 'Typography', 'yoox' ),
                            'selector' => '{{WRAPPER}} .icon_box_1 h4',
                    ]
            );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_6', [
                'label' =>esc_html__( 'Content Style', 'yoox' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
            
            $this->start_controls_tabs('content_st');
                $this->start_controls_tab(
                        'style_cont_normal_tab',
                        [
                                'label' => __( 'Normal', 'yoox' ),
                        ]
                );
                    $this->add_control(
                            'content_color',
                            [
                                    'label' => esc_html__( 'Content Color', 'yoox' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .icon_box_1 p' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'style_cont_hover_tab',
                        [
                                'label' => __( 'Hover', 'yoox' ),
                        ]
                );
                    $this->add_control(
                            'content_hover_color',
                            [
                                    'label' => esc_html__( 'Hover Content Color', 'yoox' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .icon_box_1:hover p' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            
            $this->add_control(
                    'content_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .icon_box_1 p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name' => 'content_typography',
                            'label' => __( 'Typography', 'yoox' ),
                            'selector' => '{{WRAPPER}} .icon_box_1 p',
                    ]
            );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings = $this->get_settings();
        $icons = (isset($settings['icons']) && $settings['icons'] != '') ? $settings['icons'] : 'yoox-project-management';
        $box_title = (isset($settings['box_title']) && $settings['box_title'] != '') ? $settings['box_title'] : esc_html__('Icon Box', 'yoox');
        $box_desc = (isset($settings['box_desc']) && $settings['box_desc'] != '') ? $settings['box_desc'] : '';
        
        ?>
           <div class="icon_box_1">
                <div class="box_inner">
                    <?php if($icons != ''): ?>
                    <i class="<?php echo esc_attr($icons); ?>"></i>
                    <?php endif; ?>
                    <?php if($box_title != ''): ?>
                    <h4><?php echo esc_html($box_title); ?></h4>
                    <?php endif; ?>
                    <?php if($box_desc != ''): ?>
                    <p>
                        <?php echo wp_kses_post($box_desc); ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div> 
        <?php
    }
    
    protected function _content_template() {

    }
    
}