<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Pricing_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-pricing';
    }
    
    public function get_title() {
        return esc_html__( 'Pricing Table', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' =>esc_html__( 'Pricing Table', 'yoox' ),
            ]
        );
        $this->add_control(
                'period',
                [
                        'label' => esc_html__( 'Pricing Period', 'yoox' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('Monthly', 'yoox'),
                        'placeholder' => esc_html__('Pricing Period', 'yoox')
                ]
        );
        $this->add_control(
                'currency',
                [
                        'label'         => esc_html__( 'Currency', 'yoox' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'	=> esc_html__('$', 'yoox'),
                        'placeholder'   => esc_html__('Currency', 'yoox')
                ]
        );
        $this->add_control(
                'price',
                [
                        'label'         => esc_html__( 'Price', 'yoox' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'	=> esc_html__('25.00', 'yoox'),
                        'placeholder'   => esc_html__('Price', 'yoox')
                ]
        );
        $this->add_control(
                'show_bar',
                [
                        'label' => esc_html__( 'Show Bar', 'yoox' ),
                        'type' => Controls_Manager::SWITCHER,
                        'label_on' => __( 'Show', 'yoox' ),
                        'label_off' => __( 'Hide', 'yoox' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
                'list_item',
                [
                        'label'         => esc_html__( 'Pricing List Item', 'yoox' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'	=> esc_html__('0 pages', 'yoox'),
                        'placeholder'   => esc_html__('Insert Pricing List Item', 'yoox'),
                        'label_block'   => TRUE
                ]
        );
        $this->add_control(
                'list',
                [
                        'label'     => esc_html__( 'Pricing List Item', 'yoox' ),
                        'type'      => Controls_Manager::REPEATER,
                        'fields'    => $repeater->get_controls(),
                        'default'   => [
                                [
                                        'list_item' => esc_html__( '0 pages', 'yoox' )
                                ],
                        ],
                        'title_field' => '{{{ "List Item" }}}',
                ]
        );
        $this->add_control(
                'pricint_btn',
                [
                        'label'         => esc_html__( 'BTN Label', 'yoox' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => esc_html__('select', 'yoox'),
                        'label_block'   => true,
                        'placeholder'   => esc_html__('Btn Label', 'yoox')
                ]
        );
        $this->add_control(
                'btn_url',
                [
                        'label'             => esc_html__( 'BTN URL', 'yoox' ),
                        'type'              => Controls_Manager::URL,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                        'show_external'     => true,
                        'default'           => [
                                'url'           => '',
                                'is_external'   => true,
                                'nofollow'      => true,
                        ],
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
                        'prefix_class'              => 'yoox_pricing_box elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2', [
                'label' =>esc_html__( 'Pricing Table Style', 'yoox' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'background',
                        'label' => esc_html__( 'BG', 'yoox' ),
                        'types' => [ 'classic', 'gradient', 'video' ],
                        'selector' => '{{WRAPPER}} .singlePricingTable',
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
                            'selector' => '{{WRAPPER}} .singlePricingTable',
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
                            'selector' => '{{WRAPPER}} .singlePricingTable:hover',
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
                                '{{WRAPPER}} .singlePricingTable' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_control(
                'box_margins',
                [
                        'label' => esc_html__( 'Margins', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .singlePricingTable' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_3', [
                'label' =>esc_html__( 'Pricing Table Inner', 'yoox' ),
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
                            'selector' => '{{WRAPPER}} .spt_inner'
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
                            'selector' => '{{WRAPPER}} .singlePricingTable:hover .spt_inner',
                            'description' => esc_html__('Choose your Pricing Table inner area Hover BG color.', 'yoox')
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
                                '{{WRAPPER}} .spt_inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_4', [
                'label' =>esc_html__( 'Pricing Period Style', 'yoox' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
            $this->start_controls_tabs('period_style');
                $this->start_controls_tab(
                        'style_period_normal_tab',
                        [
                                'label' => esc_html__( 'Normal', 'yoox' ),
                        ]
                );
                $this->add_control(
                        'period_color',
                        [
                                'label' => esc_html__( 'Period Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .spti_head h5' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'style_period_hover_tab',
                        [
                                'label' => esc_html__( 'Hover', 'yoox' ),
                        ]
                );
                    $this->add_control(
                            'period_hover_color',
                            [
                                    'label' => esc_html__( 'Period Hover Color', 'yoox' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .singlePricingTable:hover .spti_head h5' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name' => 'period_typography',
                            'label' => __( 'Typography', 'yoox' ),
                            'selector' => '{{WRAPPER}} .spti_head h5',
                    ]
            );
            $this->add_control(
                    'period_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .spti_head h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_5', [
                'label' =>esc_html__( 'Price Style', 'yoox' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
            $this->start_controls_tabs('price_style');
                $this->start_controls_tab(
                        'style_price_normal_tab',
                        [
                                'label' => esc_html__( 'Normal', 'yoox' ),
                        ]
                );
                $this->add_control(
                        'price_color',
                        [
                                'label' => esc_html__( 'Price Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .spti_head h2' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'style_price_hover_tab',
                        [
                                'label' => esc_html__( 'Hover', 'yoox' ),
                        ]
                );
                    $this->add_control(
                            'price_hover_color',
                            [
                                    'label' => esc_html__( 'Price Hover Color', 'yoox' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .singlePricingTable:hover .spti_head h2' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name' => 'price_typography',
                            'label' => __( 'Typography', 'yoox' ),
                            'selector' => '{{WRAPPER}} .spti_head h2',
                    ]
            );
            $this->add_control(
                    'price_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .spti_head h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_6', [
                'label' =>esc_html__( 'Pricing Bar Style', 'yoox' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->start_controls_tabs( 'bar_tabs' );
            $this->start_controls_tab(
                    'bar_normal_tab',
                    [
                            'label' => __( 'Normal', 'yoox' ),
                    ]
            );
            $this->add_control(
                    'bar_background',
                    [
                            'label' => esc_html__( 'Bar BG Color', 'yoox' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .spti_bar' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    'bar_hover_tab',
                    [
                            'label' => __( 'Hover', 'yoox' ),
                    ]
            );
            $this->add_control(
                    'bar_hover_background',
                    [
                            'label' => esc_html__( 'Bar Hover BG Color', 'yoox' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .singlePricingTable:hover .spti_bar' => 'background: {{VALUE}}',
                            ],
                            'description' => esc_html__('Choose your Pricing Bar Hover BG color.', 'yoox')
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
                    'bar_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .spti_bar' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_7', [
                'label' =>esc_html__( 'Pricing List Style', 'yoox' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
            $this->start_controls_tabs('list_style');
                $this->start_controls_tab(
                        'style_list_normal_tab',
                        [
                                'label' => esc_html__( 'Normal', 'yoox' ),
                        ]
                );
                $this->add_control(
                        'list_color',
                        [
                                'label' => esc_html__( 'List Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .spti_boddy p' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'style_list_hover_tab',
                        [
                                'label' => esc_html__( 'Hover', 'yoox' ),
                        ]
                );
                    $this->add_control(
                            'list_hover_color',
                            [
                                    'label' => esc_html__( 'List Hover Color', 'yoox' ),
                                    'type' => Controls_Manager::COLOR,
                                    'selectors' => [
                                            '{{WRAPPER}} .singlePricingTable:hover .spti_boddy p' => 'color: {{VALUE}}',
                                    ],
                            ]
                    );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name' => 'list_typography',
                            'label' => __( 'Typography', 'yoox' ),
                            'selector' => '{{WRAPPER}} .spti_boddy p',
                    ]
            );
            $this->add_control(
                    'list_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .spti_boddy p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_8', [
                'label' =>esc_html__( 'Pricing Button Style', 'yoox' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );  
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'button_typography',
                        'label' => __( 'Typography', 'yoox' ),
                        'selector' => '{{WRAPPER}} .spti_foot a',
                ]
            );
            $this->start_controls_tabs('button_style');
                $this->start_controls_tab(
                        'style_button_normal_tab',
                        [
                                'label' => esc_html__( 'Normal', 'yoox' ),
                        ]
                );
                $this->add_control(
                        'button_color',
                        [
                            'label' => esc_html__( 'Button Color', 'yoox' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .spti_foot a' => 'color: {{VALUE}}',
                            ],
                        ]
                );
                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name' => 'button_background',
                            'label' => esc_html__( 'Background BG', 'yoox' ),
                            'types' => [ 'classic', 'gradient', 'video' ],
                            'selector' => '{{WRAPPER}} .spti_foot a',
                            'description' => esc_html__('Choose your Pricing Button BG color.', 'yoox')
                    ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'button_hover_1',
                        [
                                'label' => esc_html__( 'Hover 01', 'yoox' ),
                        ]
                );
                $this->add_control(
                        'btn_hover_color_1',
                        [
                                'label' => esc_html__( 'Button Hover Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .singlePricingTable:hover .spti_foot a' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name' => 'button_hover_1_background',
                            'label' => esc_html__( 'Hover BG', 'yoox' ),
                            'types' => [ 'classic', 'gradient', 'video' ],
                            'selector' => '{{WRAPPER}} .singlePricingTable:hover .spti_foot a',
                            'description' => esc_html__('Choose your Pricing Button Hover BG color.', 'yoox')
                    ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'button_hover_2',
                        [
                                'label' => esc_html__( 'Hover 02', 'yoox' ),
                        ]
                );
                $this->add_control(
                        'btn_hover_color_2',
                        [
                                'label' => esc_html__( 'Button Hover Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .spti_foot a.fix_btn:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name' => 'button_hover_2_background',
                            'label' => esc_html__( 'Hover BG', 'yoox' ),
                            'types' => [ 'classic', 'gradient', 'video' ],
                            'selector' => '{{WRAPPER}} .spti_foot .fix_btn::after',
                            'description' => esc_html__('Choose your Pricing Button Hover BG color.', 'yoox')
                    ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_control(
                    'button_padding',
                    [
                            'label' => esc_html__( 'Paddings', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .spti_foot' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        
    }
    
    protected function render() {
        $settings    = $this->get_settings();
        $p_item_list = (isset($settings['list']) && !empty($settings['list'])) ? $settings['list'] : array();
        $period      = (isset($settings['period']) && $settings['period'] != '') ? $settings['period'] : 'Monthly';
        $currency    = (isset($settings['currency']) && $settings['currency'] != '') ? $settings['currency'] : '$';
        $price       = (isset($settings['price']) && $settings['price'] != '') ? $settings['price'] : '25.00';
        $show_bar    = (isset($settings['show_bar'])) ? $settings['show_bar'] : '';
        $pricint_btn = (isset($settings['pricint_btn']) && $settings['pricint_btn'] != '') ? $settings['pricint_btn'] : 'select';
        $target      = (isset($settings['btn_url']['is_external'])) ? ' target="_blank"' : '';
        $nofollow    = (isset($settings['btn_url']['nofollow'])) ? ' rel="nofollow"' : '';
        $member_url  = (isset($settings['btn_url']['url']) && $settings['btn_url']['url'] != '') ? $settings['btn_url']['url'] : '#';
        ?>
        <div class="singlePricingTable">
            <div class="spt_inner">
                <div class="spti_head">
                    <?php if($period != ''): ?>
                        <h5><?php echo esc_html($period); ?></h5>
                    <?php endif; ?>
                    <?php if($currency != '' || $price != ''): ?>
                        <h2><?php echo esc_html($currency.$price); ?></h2>
                    <?php endif; ?>
                    <?php 
                        if($show_bar == 'yes'):   
                            echo '<div class="spti_bar"></div>';
                        endif; 
                      ?>   
                </div>
                <div class="spti_boddy">
                    <?php
                        if(count($p_item_list) > 0):
                            foreach($p_item_list as $item):
                                $list_item = (isset($item['list_item'])) ? $item['list_item'] : '';
                                if($list_item != ''):
                                    echo '<p>'.esc_html($list_item).'</p>';
                                endif;
                            endforeach;
                        endif;
                    ?>
                </div>
                <?php if($pricint_btn != ''): ?>
                <div class="spti_foot">
                    <a class="fix_btn" href="<?php echo esc_url($member_url);  ?>" <?php echo $target; ?> ><?php echo esc_html($pricint_btn); ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>    
        <?php   
    }
    
    protected function _content_template() {

    }
    
}