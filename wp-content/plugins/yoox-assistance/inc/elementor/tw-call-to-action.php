<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Call_To_Action_Widget extends Widget_Base{
    
    public function get_name() {
        return 'tw-call-to-action';
    }
    
    public function get_title() {
        return esc_html__( 'Call To Action', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' =>esc_html__( 'Call To Action', 'yoox' ),
            ]
        );
        $this->add_control(
                'action_img',
                [
                        'label'         => esc_html__( 'Action Image', 'yoox' ),
                        'type'          => Controls_Manager::MEDIA,
                        'description'   => esc_html__('Image size should be 432x453px.', 'yoox'),
                ]
        );
        $this->add_control(
                'action_title',
                [
                        'label'         => esc_html__( 'Action Title', 'yoox' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => true,
                        'placeholder'   => esc_html__('Insert Title', 'yoox')
                ]
        );
        $this->add_control(
               'action_btn_label', [
                    'label'             => esc_html__('Actin Button Label', 'yoox'),
                    'type'              => Controls_Manager::TEXT,
                    'label_block'       => true,
                    'default'           => esc_html__('Join Us now', 'yoox'),
                    'placeholder'       => esc_html__('Inser Button Label', 'yoox'),
                ]
        );
        $this->add_control(
                'action_btn_url', [
                    'label'             => esc_html__( 'URL', 'yoox' ),
                    'type'              => Controls_Manager::URL,
                    'input_type'        => 'url',
                    'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                    'show_external'     => true,
                    'default'           => [
                            'url'            => '',
                            'is_external'    => true,
                            'nofollow'       => true,
                    ],
                ]
        );
        $this->add_responsive_control(
                'action_align', [
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
                        'default'                   => 'right',
                        'prefix_class'              => 'callToaction elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_1', [
                'label' =>esc_html__( 'Action Area Style', 'yoox' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'background',
                        'label' => esc_html__( 'Background', 'yoox' ),
                        'types' => [ 'classic', 'gradient', 'video' ],
                        'selector' => '{{WRAPPER}} .leftjoin',
                ]
        );
        $this->add_control(
                'paddings',
                [
                        'label' => esc_html__( 'Paddings', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .leftjoin' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2', [
                'label' =>esc_html__( 'Action Title Style', 'yoox' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_control(
            'title_color', [
                'label'		 =>esc_html__( 'Title color', 'yoox' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .leftjoin h2' => 'color: {{VALUE}};'
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'yoox' ),
                'selector' => '{{WRAPPER}} .leftjoin h2',
            ]
        );
        $this->add_control(
            'margins',
            [
                    'label'         => esc_html__( 'Margins', 'yoox' ),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => [ 'px', '%', 'em' ],
                    'selectors'     => [
                            '{{WRAPPER}} .leftjoin h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_3', [
                'label'     => esc_html__( 'Action Button Style', 'yoox' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs( 'style_tabs_1' );
                $this->start_controls_tab(
                        'button_style_normal',
                        [
                                'label' => __( 'Normal', 'yoox' ),
                        ]
                );
                $this->add_control(
                        'btn_label_color',
                        [
                                'label' => esc_html__( 'Label Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .common_btn.fix_btn' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control(
                        'button_bg',
                        [
                                'label' => esc_html__( 'BG Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .common_btn.fix_btn' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'button_style_hover',
                        [
                                'label' => __( 'Hover', 'yoox' ),
                        ]
                );
                $this->add_control(
                        'btn_label_hover_color',
                        [
                                'label' => esc_html__( 'Label Hover Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .common_btn.fix_btn:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control(
                        'button_bg_hover',
                        [
                                'label' => esc_html__( 'BG Hover Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .common_btn.fix_btn:after' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_control(
			'width',
			[
				'label' => __( 'Width', 'yoox' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [],
				'selectors' => [
					'{{WRAPPER}} .common_btn.fix_btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
            $this->add_control(
			'height',
			[
				'label' => __( 'Height', 'yoox' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [],
				'selectors' => [
					'{{WRAPPER}} .common_btn.fix_btn' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name' => 'button_typography',
                            'label' => esc_html__( 'Button Typography', 'yoox' ),
                            'selector' => '{{WRAPPER}} .common_btn.fix_btn',
                    ]
            );
            $this->add_control(
                'btn_paddings',
                [
                        'label' => esc_html__( 'Paddings', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .common_btn.fix_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
            );
            $this->add_control(
                'btn_margins',
                [
                        'label' => esc_html__( 'Margins', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .leftjoin .common_btn.fix_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
            );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings           = $this->get_settings();
        $action_img         = (isset($settings['action_img']['url']) && $settings['action_img']['url']) ? $settings['action_img']['url'] : '';
        $action_title       = (isset($settings['action_title']) && $settings['action_title']) ? $settings['action_title'] : '';
        $action_btn_label   = (isset($settings['action_btn_label']) && $settings['action_btn_label']) ? $settings['action_btn_label'] : '';
        $target             = $settings['action_btn_url']['is_external'] ? ' target="_blank"' : '' ;
        $nofollow           = $settings['action_btn_url']['nofollow'] ? ' rel="nofollow"' : '' ;
        $action_btn_url     = (isset($settings['action_btn_url']['url']) && $settings['action_btn_url']['url'] != '') ? $settings['action_btn_url']['url'] : '';
        
        ?>
        <div class="leftjoin">
            <div class="row">
                <div class="col-lg-6 col-sm-12 noPadding">
                    <?php if($action_img != ''): ?>
                        <img src="<?php echo esc_url($action_img); ?>" alt=""/>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 col-sm-12 pdLeft_50">
                    <?php if($action_title != ''): ?>
                        <h2><?php echo esc_html($action_title); ?></h2>
                    <?php endif; ?>
                    <?php if($action_btn_label != ''): ?>
                        <a class="common_btn fix_btn" <?php echo esc_attr($target); ?> href="<?php echo esc_url($action_btn_url); ?>"><?php echo esc_html($action_btn_label); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }
    
    protected function _content_template() {
        
    }
}