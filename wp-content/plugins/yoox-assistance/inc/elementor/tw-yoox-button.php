<?php

namespace Elementor;

if( !defined('ABSPATH') )
    exit;

class Tw_Button_Widget extends Widget_Base{
    
    public function get_name() {
        return 'tw-yoox-button';
    }
    public function get_title() {
        return esc_html__( 'Yoox Button', 'yoox' );
    }
    public function get_icon() {
        return 'eicon-button';
    }
    public function get_categories() {
        return ['yoox-elements'];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
                'section_tab', [
                    'label'     => esc_html__(' Button ', 'yoox')
                ]
        );
        $this->add_control(
               'btn_label', [
                    'label'             => esc_html__('Yoox Button Label', 'yoox'),
                    'type'              => Controls_Manager::TEXT,
                    'label_block'       => true,
                    'default'           => esc_html__('', 'yoox'),
                    'placeholder'       => esc_html__('Inser Button Label', 'yoox'),
                ]
        );
        $this->add_control(
                'btn_url', [
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
                'btn_align', [
                        'label'                     =>esc_html__( 'Button Alignment', 'yoox' ),
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
                        'prefix_class'              => 'btn_align elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2',
            [
                'label'     => esc_html__('Button Style', 'yoox'),
                'tab'     => Controls_Manager::TAB_STYLE,
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
                'paddings',
                [
                        'label' => esc_html__( 'Paddings', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .common_btn.fix_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
            );
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings();
        $btn_label      = (isset($settings['btn_label']) && $settings['btn_label'] != '') ? $settings['btn_label'] : '';
        $target         = $settings['btn_url']['is_external'] ? ' target="_blank"' : '' ;
        $nofollow       = $settings['btn_url']['nofollow'] ? ' rel="nofollow"' : '' ;
        $ab_btn_url     = (isset($settings['btn_url']['url']) && $settings['btn_url']['url'] != '') ? $settings['btn_url']['url'] : '#';
        
        ?>
            <?php if($btn_label != ''): ?>
                <a class="common_btn fix_btn" <?php echo $target; ?> href="<?php echo esc_url($ab_btn_url) ?>"><?php echo esc_html($btn_label) ?></a>
            <?php endif; ?>
        <?php
    }
    
    protected function _content_template() {
        
    }
            
}