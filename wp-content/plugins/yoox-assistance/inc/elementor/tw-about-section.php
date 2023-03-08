<?php

namespace Elementor;

if( !defined('ABSPATH') )
    exit;

class Tw_About_Widget extends Widget_Base{
    
    public function get_name() {
        return 'tw-about';
    }
    public function get_title() {
        return esc_html__( 'About Section', 'yoox' );
    }
    public function get_icon() {
        return 'eicon-section';
    }
    public function get_categories() {
        return ['yoox-elements'];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
                'section_tab', [
                    'label'     => esc_html__(' About Section ', 'yoox')
                ]
        );
        $this->add_control(
                'about_img',
                [
                        'label'         => esc_html__( 'About Image', 'yoox' ),
                        'type'          => Controls_Manager::MEDIA,
                        'description'   => esc_html__('Image size should be 1170x668px.', 'yoox'),
                ]
        );
        $this->add_control(
                'about_title', [
                    'label'             => esc_html__('About Title', 'yoox'),
                    'type'              => Controls_Manager::TEXT,
                    'default'           => '',
                    'label_block'       => true,
                    'placeholder'       => esc_html__('Add About Title', 'yoox'),
                ]
        );
        $this->add_control(
                'about_desc', [
                    'label'             => esc_html__('About Description', 'yoox'),
                    'type'              => Controls_Manager::TEXTAREA,
                    'default'           => esc_html__(' ', 'yoox'),
                    'placeholder'       => esc_html__('Add Desc', 'yoox'),
                ]
        );
        $this->add_control(
               'ab_btn_label', [
                    'label'             => esc_html__('About BTN Label', 'yoox'),
                    'type'              => Controls_Manager::TEXT,
                    'label_block'       => true,
                    'default'           => esc_html__('Discover More About Yoox', 'yoox'),
                    'placeholder'       => esc_html__('Inser About BTN Label', 'yoox'),
                ]
        );
        $this->add_control(
                'ab_btn_url', [
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
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_2',
            [
                'label'     => esc_html__('About Area Style', 'yoox'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'background',
                        'label' => esc_html__( 'About BG Color', 'yoox' ),
                        'types' => [ 'classic', 'gradient', 'video' ],
                        'selector' => '{{WRAPPER}} .abci_content',
                ]
        );
        $this->add_control(
                'paddings',
                [
                        'label' => esc_html__( 'Area Paddings', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .abci_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_3',
            [
                'label'     => esc_html__('About Title Style', 'yoox'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
                'about_title_color',
                [
                        'label' => esc_html__( 'Title Color', 'yoox' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .abci_content h2' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'title_typography',
                        'label' => esc_html__( 'Title Typography', 'yoox' ),
                        'selector' => '{{WRAPPER}} .abci_content h2',
                ]
        );
        $this->add_control(
                'title_margin',
                [
                        'label' => esc_html__( 'Margins', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .abci_content h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_4',
            [
                'label'     => esc_html__('About Description Style', 'yoox'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
                'about_desc_color',
                [
                        'label' => esc_html__( 'Desc Color', 'yoox' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .abci_content p' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'desc_typography',
                        'label' => esc_html__( 'Desc Typography', 'yoox' ),
                        'selector' => '{{WRAPPER}} .abci_content p',
                ]
        );
        $this->add_control(
                'desc_margin',
                [
                        'label' => esc_html__( 'Margins', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .abci_content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_5',
            [
                'label'     => esc_html__('About Button Style', 'yoox'),
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
                                        '{{WRAPPER}} .abc_discover_btn' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control(
                        'button_bg',
                        [
                                'label' => esc_html__( 'BG Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .abc_discover_btn' => 'background: {{VALUE}}',
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
                                        '{{WRAPPER}} .abc_discover_btn' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_control(
                        'button_bg_hover',
                        [
                                'label' => esc_html__( 'BG Hover Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .abc_discover_btn.fix_btn:after' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name' => 'button_typography',
                            'label' => esc_html__( 'Button Typography', 'yoox' ),
                            'selector' => '{{WRAPPER}} .abc_discover_btn',
                    ]
            );
            $this->add_control(
                    'btn_padding',
                    [
                            'label' => esc_html__( 'Padding', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .abc_discover_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
            $this->add_control(
                    'btn_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .abc_discover_btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings       = $this->get_settings();
        $about_img      = (isset($settings['about_img']['url']) && $settings['about_img']['url'] != '') ? $settings['about_img']['url'] : 'https://via.placeholder.com/1170x668.jpg';
        $ab_btn_label   = $settings['ab_btn_label'];
        $target         = $settings['ab_btn_url']['is_external'] ? ' target="_blank"' : '' ;
        $nofollow       = $settings['ab_btn_url']['nofollow'] ? ' rel="nofollow"' : '' ;
        $ab_btn_url     = (isset($settings['ab_btn_url']['url']) && $settings['ab_btn_url']['url'] != '') ? $settings['ab_btn_url']['url'] : '#';
        $about_title    = (isset($settings['about_title'])) ? $settings['about_title'] : '';
        $about_desc     = (isset($settings['about_desc'])) ? $settings['about_desc'] : '';
        
        ?>
        <div class="aboutus_content">
            <img src="<?php echo esc_url($about_img); ?>" alt="">
            <div class="abc_inner">
                <div class="row">
                    <div class="col-lg-4 col-sm-5 col-md-4 abc_btn_col">
                        <a href="<?php echo esc_url($ab_btn_url); ?>" class="abc_discover_btn fix_btn" <?php echo $target; ?> ><?php echo esc_html($ab_btn_label); ?></a>
                    </div>
                    <div class="col-lg-8 col-sm-7 col-md-8">
                        <div class="abci_content">
                            <?php if($about_title != ''): ?>
                            <h2><?php echo esc_html($about_title); ?></h2>
                            <?php endif;
                             if($about_desc != ''): ?>
                                <p><?php echo wp_kses_post($about_desc); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    
    
}