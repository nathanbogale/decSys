<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Mailchimp_Form_Widget extends Widget_Base {

    public function get_name() {
        return 'tw-mailchimp-form';
    }

    public function get_title() {
        return esc_html__( 'Subscribe From', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-mailchimp';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }

    protected function _register_controls() {
        global $wpdb;
        $table = $wpdb->prefix.'posts';
        $result = $wpdb->get_results( 'SELECT * FROM '.$table.' WHERE post_type="mc4wp-form" AND post_status="publish"', OBJECT );
        $shortcodes = array('0' => esc_html__('None', 'bespoke'));
        if(is_array($result) && count($result) > 0){
            foreach($result as $r){
                $shortcodes[$r->ID] = $r->post_title;
            }
        }
        $this->start_controls_section(
            'section_tab', [
                'label'     => esc_html__( 'Subscribe Form', 'yoox' ),
            ]
        );
        $this->add_control(
                'form_title',
                [
                        'label'         => esc_html__( 'From Title', 'yoox' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => true,
                        'placeholder'   => esc_html__('Insert Title', 'yoox')
                ]
        );
        $this->add_control(
                'mail_form',
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
                        'prefix_class'              => 'mailchimp_align elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_1', [
                'label'	 =>esc_html__( 'Form Area Style', 'yoox' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
                'area_border_color',
                [
                        'label' => esc_html__( 'Border Color', 'yoox' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .subscripform' => 'border-color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control(
                'area_bg_color',
                [
                        'label' => esc_html__( 'BG Color', 'yoox' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .subscripform' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control(
                'area_paddings',
                [
                        'label' => esc_html__( 'Area Paddings', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .subscripform' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
            );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_2', [
                'label'	 =>esc_html__( 'From Title Style', 'yoox' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
                'title_color',
                [
                        'label' => esc_html__( 'Title Color', 'yoox' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .subscripform h4' => 'color: {{VALUE}}'
                        ],
                ]
        );
        $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name' => 'title_typography',
                            'label' => esc_html__( 'Title Typography', 'yoox' ),
                            'selector' => '{{WRAPPER}} .subscripform h4',
                    ]
            );
        $this->add_control(
                'title_margin',
                [
                        'label' => esc_html__( 'Title Margin', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .subscripform h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
            );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_3', [
                'label'	 =>esc_html__( 'Input From Style', 'yoox' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
                'input_color',
                [
                        'label' => esc_html__( 'Label Color', 'yoox' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .subscripform input[type="email"]' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .subscripform input[type="email"]::-moz-placeholder' => 'color: {{VALUE}} !important',
                                '{{WRAPPER}} .subscripform input[type="email"]::-webkit-input-placeholder' => 'color: {{VALUE}} !important',
                                '{{WRAPPER}} .subscripform input[type="email"]::-ms-input-placeholder' => 'color: {{VALUE}} !important',
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
                                    '{{WRAPPER}} .subscripform input[type="email"]' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                    ]
		);
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name' => 'input_typography',
                            'label' => esc_html__( 'Input From Typography', 'yoox' ),
                            'selector' => '{{WRAPPER}} .subscripform input[type="email"]',
                    ]
            );
            $this->add_control(
                'input_paddings',
                [
                        'label' => esc_html__( 'Paddings', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .subscripform input[type="email"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
            );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_4', [
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
                                        '{{WRAPPER}} .subscripform input[type="submit"]' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control(
                        'button_bg',
                        [
                                'label' => esc_html__( 'BG Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .subscripform input[type="submit"]' => 'background: {{VALUE}}',
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
                                        '{{WRAPPER}} .subscripform input[type="submit"]:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control(
                        'button_bg_hover',
                        [
                                'label' => esc_html__( 'BG Hover Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .subscripform input[type="submit"]:hover' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
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
					'{{WRAPPER}} .subscripform input[type="submit"]' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name' => 'button_typography',
                            'label' => esc_html__( 'Button Typography', 'yoox' ),
                            'selector' => '{{WRAPPER}} .subscripform input[type="submit"]',
                    ]
            );
            $this->add_control(
                'paddings',
                [
                        'label' => esc_html__( 'Paddings', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .subscripform input[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .subscripform input[type="submit"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
            );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings       = $this->get_settings();
        $form_title     = (isset($settings['form_title']) && $settings['form_title'] != '') ? $settings['form_title'] : '';
        $mail_form      = (isset($settings['mail_form']) && $settings['mail_form'] != '') ? $settings['mail_form'] : '';
        echo '<div class="subscripform">';
            ?>
            <?php if($form_title != ''): ?>
                <h4><?php echo esc_html($form_title); ?></h4>
            <?php endif; ?>
            <?php
            if($mail_form > 0):
                echo do_shortcode('[mc4wp_form id="'.$mail_form.'"]');
            endif;
        echo '</div>';
    }

    protected function _content_template() {

    }    
}