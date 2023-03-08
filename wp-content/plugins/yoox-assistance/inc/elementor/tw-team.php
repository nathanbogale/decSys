<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Team_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-team';
    }
    
    public function get_title() {
        return esc_html__( 'Team', 'yoox' );
    }

    public function get_icon() {
        return ' eicon-person';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' =>esc_html__( 'Team Member', 'yoox' ),
            ]
        );
        $this->add_control(
                'team_img',
                [
                        'label'         => esc_html__( 'Team Member Image', 'yoox' ),
                        'type'          => Controls_Manager::MEDIA,
                        'description'   => esc_html__('Image size should be 270x295px.', 'yoox'),
                ]
        );
        $this->add_control(
                'member_title',
                [
                        'label'         => esc_html__( 'Member Title', 'yoox' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => true,
                        'placeholder'   => esc_html__('Team Member Name', 'yoox')
                ]
        );
        $this->add_control(
                'designation',
                [
                        'label'         => esc_html__( 'Member Designation', 'yoox' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => true,
                        'placeholder'   => esc_html__('Team Member Designation', 'yoox')
                ]
        );
        $this->add_control(
                'twitter_url',
                [
                        'label'             => esc_html__( 'Twitter URL', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                        'default'           => '',
                ]
        );
        $this->add_control(
                'facebook_url',
                [
                        'label'             => esc_html__( 'Facebook URL', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                        'default'           => '',
                ]
        );
        $this->add_control(
                'linkedin_url',
                [
                        'label'             => esc_html__( 'Linkedin URL', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                        'default'           => '',
                ]
        );
        $this->add_control(
                'pinterest_url',
                [
                        'label'             => esc_html__( 'Pinterest URL', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                        'default'           => '',
                ]
        );
        $this->add_control(
                'dribbble_url',
                [
                        'label'             => esc_html__( 'Dribbble URL', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                        'default'           => '',
                ]
        );
        $this->add_control(
                'behance_url',
                [
                        'label'             => esc_html__( 'Behance URL', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                        'default'           => '',
                ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
                'section_tab_1',[
                    'label'     => esc_html__('Team Style', 'yoox'),
                    'tab'       => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_control(
                    'team_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .singleTeamMember' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_2',
            [
                'label'     => esc_html__('Team Overlay Style', 'yoox'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'background',
                        'label' => esc_html__( 'Team BG Overlay', 'yoox' ),
                        'types' => [ 'classic', 'gradient', 'video' ],
                        'selector' => '{{WRAPPER}} .singleTeamMember::after',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_3',
            [
                'label'     => esc_html__('Team Title Style', 'yoox'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs( 'style_tabs_1' );
                $this->start_controls_tab(
                        'title_normal',
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
                                        '{{WRAPPER}} .teamDesc h3 a' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'title_hover',
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
                                        '{{WRAPPER}} .teamDesc h3 a:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name' => 'title_typography',
                            'label' => esc_html__( 'Title Typography', 'yoox' ),
                            'selector' => '{{WRAPPER}} .teamDesc h3',
                    ]
            );
            $this->add_control(
                    'title_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .teamDesc h3' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_4',
            [
                'label'     => esc_html__('Team Designation Style', 'yoox'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                    'desig_color',
                    [
                            'label' => esc_html__( 'Designation Color', 'yoox' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .teamDesc h4' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name' => 'desig_typography',
                            'label' => esc_html__( 'Designation Typography', 'yoox' ),
                            'selector' => '{{WRAPPER}} .teamDesc h4',
                    ]
            );
            $this->add_control(
                    'desig_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .teamDesc h4' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_5',
            [
                'label'     => esc_html__('Team Social Style', 'yoox'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs( 'style_tabs_3' );
                $this->start_controls_tab(
                        'style_normal_tab',
                        [
                                'label' => __( 'Normal', 'yoox' ),
                        ]
                );
                $this->add_control(
                        'social_color',
                        [
                                'label' => esc_html__( 'Soial Icon Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .teamDesc a.teamSocial' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Background::get_type(),
                    [
                            'name' => 'social_background',
                            'label' => esc_html__( 'Social BG', 'yoox' ),
                            'types' => [ 'classic', 'gradient', 'video' ],
                            'selector' => '{{WRAPPER}} .teamDesc a.teamSocial',
                    ]
                );
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'style_hover_tab',
                        [
                                'label' => __( 'Hover', 'yoox' ),
                        ]
                );
                $this->add_control(
                        'social_hover_color',
                        [
                                'label' => esc_html__( 'Soial Icon Hover Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .teamDesc a.teamSocial:hover' => 'color: {{VALUE}}',
                                ],
                        ]
                );
                $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                                'name' => 'social_hover_background',
                                'label' => esc_html__( 'Social Hover BG', 'yoox' ),
                                'types' => [ 'classic', 'gradient', 'video' ],
                                'selector' => '{{WRAPPER}} .teamDesc a.teamSocial:hover',
                                'description' => esc_html__('Choose your Team Soial Hover BG color.', 'yoox')
                        ]
                );
                $this->end_controls_tab();
            $this->end_controls_tabs();  
            $this->add_control(
                    'social_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .teamDesc a.teamSocial' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings       = $this->get_settings_for_display();
        $team_img       = (isset($settings['team_img']['url']) && $settings['team_img']['url'] != '') ? $settings['team_img']['url'] : 'https://via.placeholder.com/270x295.jpg';
        $title          = (isset($settings['member_title']) && $settings['member_title'] != '') ? $settings['member_title'] : '';
        $designation    = (isset($settings['designation']) && $settings['designation'] != '') ? $settings['designation'] : '';
        
        $twitter_url    = (isset($settings['twitter_url']) && $settings['twitter_url'] != '') ? $settings['twitter_url'] : '';
        $facebook_url   = (isset($settings['facebook_url']) && $settings['facebook_url'] != '') ? $settings['facebook_url'] : '';
        $linkedin_url   = (isset($settings['linkedin_url']) && $settings['linkedin_url'] != '') ? $settings['linkedin_url'] : '';
        $pinterest_url  = (isset($settings['pinterest_url']) && $settings['pinterest_url'] != '') ? $settings['pinterest_url'] : '';
        $dribbble_url   = (isset($settings['dribbble_url']) && $settings['dribbble_url'] != '') ? $settings['dribbble_url'] : '';
        $behance_url    = (isset($settings['behance_url']) && $settings['behance_url'] != '') ? $settings['behance_url'] : '';

        ?>
        <div class="singleTeamMember">
            <img src="<?php echo esc_url($team_img); ?>" alt="">
            <div class="teamDesc">
                <?php if($title != ''): ?>
                    <h3><?php echo esc_html($title); ?></h3>
                <?php endif; ?>
                <?php if($designation != ''): ?>
                    <h4><?php echo esc_html($designation); ?></h4>
                <?php endif; ?>
                <?php if($twitter_url != ''): ?>
                    <a class="teamSocial" href="<?php echo esc_url($twitter_url); ?>"><i class="fa fa-twitter"></i></a>
                <?php endif; ?>
                <?php if($facebook_url != ''): ?>
                    <a class="teamSocial" href="<?php echo esc_url($facebook_url); ?>"><i class="fa fa-facebook"></i></a>
                <?php endif; ?>
                <?php if($linkedin_url != ''): ?>
                    <a class="teamSocial" href="<?php echo esc_url($linkedin_url); ?>"><i class="fa fa-linkedin"></i></a>
                <?php endif; ?>
                <?php if($pinterest_url != ''): ?>
                    <a class="teamSocial" href="<?php echo esc_url($pinterest_url); ?>"><i class="fa fa-pinterest"></i></a>
                <?php endif; ?>
                <?php if($dribbble_url != ''): ?>
                    <a class="teamSocial" href="<?php echo esc_url($dribbble_url); ?>"><i class="fa fa-dribbble"></i></a>
                <?php endif; ?>
                <?php if($behance_url != ''): ?>
                    <a class="teamSocial" href="<?php echo esc_url($behance_url); ?>"><i class="fa fa-behance"></i></a>
                <?php endif; ?>
            </div>
        </div>
        <?php
    
    }
    
    protected function _content_template() {

    }
}