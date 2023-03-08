<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Clients_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-clients';
    }
    
    public function get_title() {
        return esc_html__( 'Client Slider', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab_1',
            [
                'label'     => esc_html__('Client', 'yoox')
            ]
        );
        $repeater = new \Elementor\Repeater();
            $repeater->start_controls_tabs( 'style_tabs_1' );
                $repeater->start_controls_tab(
                        'logo_normal',
                        [
                                'label' => esc_html__( 'Normal Logo', 'yoox' ),
                        ]
                );
                $repeater->add_control(
                    'client_logo_1',
                    [
                            'label'         => esc_html__( 'Client Logo', 'yoox' ),
                            'type'          => Controls_Manager::MEDIA,
                            'description'   => esc_html__('Logo size should be 119x83px.', 'yoox'),
                    ]
                );
                $repeater->end_controls_tab();
                $repeater->start_controls_tab(
                        'logo_hover',
                        [
                                'label' => esc_html__( 'Hover Logo', 'yoox' ),
                        ]
                );
                $repeater->add_control(
                    'client_logo_2',
                    [
                            'label'         => esc_html__( 'Hover Client Logo', 'yoox' ),
                            'type'          => Controls_Manager::MEDIA,
                            'description'   => esc_html__('Logo size should be 119x83px.', 'yoox'),
                    ]
                );
                $repeater->end_controls_tab();
            $repeater->end_controls_tabs();
            $repeater->add_control(
                    'clinet_url', [
                        'label'             => esc_html__( 'Client URL', 'yoox' ),
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
            $this->add_control(
                'list',
                [
                        'label' => esc_html__( 'Client Logo', 'yoox' ),
                        'type' => Controls_Manager::REPEATER,
                        'fields' => $repeater->get_controls(),
                        'default' => [
                                [
                                        'client_logo_1'      => esc_html__( ' ', 'yoox' ),
                                        'client_logo_2'      => esc_html__( ' ', 'yoox' ),
                                        'url'                => esc_html__( '', 'yoox' ),
                                        'is_external'        => esc_html__( '', 'yoox' ),
                                        'nofollow'           => esc_html__( '', 'yoox' ),
                                        
                                ],
                        ],
                        'title_field' => '{{{ "Single Client" }}}',
                ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2', [
                    'label'     => esc_html__('Clinet Box Style ', 'yoox'),
                    'tab'       => Controls_Manager::TAB_STYLE
                ]
        );
            $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                            'name' => 'Background',
                            'label' => esc_html__( 'BG Color', 'yoox' ),
                            'types' => [ 'classic', 'gradient', 'video' ],
                            'selector' => '{{WRAPPER}} .singleClient',
                    ]
            );
            $this->start_controls_tabs( 'style_tabs_2' );
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
                                'selector'  => '{{WRAPPER}} .singleClient',
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
                                'selector'  => '{{WRAPPER}} .singleClient:hover',
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_control(
                    'clinet_paddings',
                    [
                            'label' => esc_html__( 'Paddings', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .singleClient' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_3', [
                'label' =>esc_html__( 'Clinet Inner', 'yoox' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
            $this->start_controls_tabs( 'style_tabs_3' );
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
                                'selector' => '{{WRAPPER}} .singleClient a'
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
                                'selector' => '{{WRAPPER}} .singleClient:hover a',
                                'description' => esc_html__('Choose your Client box inner area Hover BG color.', 'yoox')
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
                                    '{{WRAPPER}} .singleClient a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_4',
            [
                'label'     => esc_html__('Bullet Style', 'yoox'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs( 'style_tabs_4' );
                $this->start_controls_tab(
                        'style_bullet_normal',
                        [
                                'label' => __( 'Normal', 'yoox' ),
                        ]
                );
                
                $this->add_control(
                        'bullet_normal_color',
                        [
                                'label' => esc_html__( 'BG Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .client_slider.owl-theme .owl-dots .owl-dot span' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'style_bullet_hover',
                        [
                                'label' => __( 'Hover', 'yoox' ),
                        ]
                );
                
                $this->add_control(
                        'bullet_hover_color',
                        [
                                'label' => esc_html__( 'Hover BG Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .client_slider.owl-theme .owl-dots .owl-dot.active span' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .client_slider.owl-theme .owl-dots .owl-dot span:hover' => 'background: {{VALUE}}'
                                ],
                        ]
                );
                
                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();
        
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $client         = (isset($settings['list']) && !empty($settings['list'])) ? $settings['list'] : array();
        $client_logo_1  = (isset($settings['client_logo_1']['url']) && $settings['client_logo_1']['url'] != '') ? $settings['client_logo_1']['url'] : '';
        $client_logo_2  = (isset($settings['client_logo_2']['url']) && $settings['client_logo_2']['url'] != '') ? $settings['client_logo_2']['url'] : '';
        
        $target         = (isset($settings['clinet_url']['is_external'])) ? ' target="_blank"' : '' ;
        $nofollow       = (isset($settings['clinet_url']['nofollow'])) ? ' rel="nofollow"' : '' ;
        $clinet_url     = (isset($settings['clinet_url']['url']) && $settings['clinet_url']['url'] != '') ? $settings['clinet_url']['url'] : '';
        
        if(count($client) > 0):
            echo '<div class="client_slider">';
                foreach($client as $item):
                    $logo_1     = (isset($item['client_logo_1']['url'])) ? $item['client_logo_1']['url'] : '';
                    $logo_2     = (isset($item['client_logo_2']['url'])) ? $item['client_logo_2']['url'] : '';
                    $url        = (isset($item['clinet_url']['url'])) ? $item['clinet_url']['url'] : '';
                    $target     = (isset($item['clinet_url']['is_external'])) ? ' target="_blank"' : '' ;
                    $nofollow   = (isset($item['clinet_url']['nofollow'])) ? ' rel="nofollow"' : '' ;
                    
                    if($logo_1 != ''):
                    ?>
                        <div class="singleClient">
                            <a href="<?php echo esc_url($url); ?>" <?php echo $target; ?>>
                                <img src="<?php echo esc_url($logo_1); ?>" alt="">
                                <img src="<?php echo esc_url($logo_2); ?>" alt="">
                            </a>
                        </div>
                    <?php
                    endif;
                endforeach;
            echo '</div>';
        endif;
    }
        
    protected function _content_template() {

    }
}