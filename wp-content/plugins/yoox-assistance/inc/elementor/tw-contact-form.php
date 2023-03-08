<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Contcat_Form_Widget extends Widget_Base {

    public function get_name() {
        return 'tw-contact-form';
    }

    public function get_title() {
        return esc_html__( 'Contact From', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-form-vertical';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }

    protected function _register_controls() {
        global $wpdb;
        $table = $wpdb->prefix.'posts';
        $result = $wpdb->get_results( 'SELECT * FROM '.$table.' WHERE post_type="wpcf7_contact_form" AND post_status="publish"', OBJECT );
        $shortcodes = array('0' => esc_html__('None', 'bespoke'));
        if(is_array($result) && count($result) > 0){
            foreach($result as $r){
                $shortcodes[$r->ID] = $r->post_title;
            }
        }
        $this->start_controls_section(
            'section_tab', [
                'label'     => esc_html__( 'Contact Form', 'yoox' ),
            ]
        );
        $this->add_control(
                'contact_form',
                [
                        'label' => esc_html__( 'Select Form', 'yoox' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => '',
                        'options' => $shortcodes,
                ]
        );
        $this->add_responsive_control(
                'form_align', [
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
                        'prefix_class'              => 'form_align elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_1', [
                'label'	 =>esc_html__( 'Contact Form Style', 'yoox' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
                'input_color',
                [
                        'label' => esc_html__( 'Input Label Color', 'yoox' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} input.input-form' => 'color: {{VALUE}}',
                                '{{WRAPPER}} textarea.input-form' => 'color: {{VALUE}}',
                                '{{WRAPPER}} input.input-form::-moz-placeholder' => 'color: {{VALUE}} !important',
                            '{{WRAPPER}} textarea.input-form::-moz-placeholder' => 'color: {{VALUE}} !important',
                                '{{WRAPPER}} input.input-form::-webkit-input-placeholder' => 'color: {{VALUE}} !important',
                            '{{WRAPPER}} textarea.input-form::-webkit-input-placeholder' => 'color: {{VALUE}} !important',
                                '{{WRAPPER}} input.input-form::-ms-input-placeholder' => 'color: {{VALUE}} !important',
                            '{{WRAPPER}} textarea.input-form::-ms-input-placeholder' => 'color: {{VALUE}} !important',
                        ],
                ]
        );
        $this->add_control(
                'input_bg',
                [
                        'label' => esc_html__( 'Input BG Color', 'yoox' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .input-form' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control(
                    'input_height',
                    [
                            'label' => __( 'Input Form Height', 'yoox' ),
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
                                    '{{WRAPPER}} .input-form' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
		);
        $this->add_control(
                    'textarea_height',
                    [
                            'label' => __( 'Textarea Height', 'yoox' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                    'px' => [
                                            'min' => 0,
                                            'max' => 400,
                                            'step' => 1,
                                    ],
                                    '%' => [
                                            'min' => 0,
                                            'max' => 500,
                                    ],
                            ],
                            'default' => [],
                            'selectors' => [
                                    '{{WRAPPER}} textarea.input-form' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
		);
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name' => 'input_typography',
                            'label' => esc_html__( 'From Typography', 'yoox' ),
                            'selector' => '{{WRAPPER}} .input-form',
                    ]
            );
            $this->add_control(
                'input_paddings',
                [
                        'label' => esc_html__( 'Paddings', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .input-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
            );
            $this->add_control(
                'input_margins',
                [
                        'label' => esc_html__( 'Margins', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .input-form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
            );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_2', [
                'label'     => esc_html__( 'Button Style', 'yoox' ),
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
                                        '{{WRAPPER}} .common_btn.fix_btn:hover' => 'background: {{VALUE}}',
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
            $this->add_control(
                'margins',
                [
                        'label' => esc_html__( 'Margins', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .common_btn.fix_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
            );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings       = $this->get_settings();
        $contact_form   = (isset($settings['contact_form']) && $settings['contact_form'] != '') ? $settings['contact_form'] : '';
        if($contact_form > 0):
            echo '<div class="contactForm">';
                echo do_shortcode('[contact-form-7 id="'.$contact_form.'"]');
            echo '</div>';
        endif;
    }

    protected function _content_template() {

    }    
}