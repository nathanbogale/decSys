<?php

namespace Elementor;

if (!defined('ABSPATH'))
    exit;

class Tw_Rev_Slider_Widgets extends Widget_Base {

    public function get_name() {
        return 'tw-rev-slider';
    }

    public function get_title() {
        return esc_html__('Rev Slider', 'yoox');
    }

    public function get_icon() {
        return 'eicon-slideshow';
    }

    public function get_categories() {
        return [ 'yoox-elements'];
    }

    protected function _register_controls() {
        global $wpdb;
        $query = sprintf('select r.title, r.id, r.alias from %srevslider_sliders r',$wpdb->prefix);
        $sliders = $wpdb->get_results($query, ARRAY_A);
        $slides = array();
        if(count($sliders) > 0):
            foreach($sliders as $sl):
                $slides[$sl['alias']] = $sl['title'];
            endforeach;
        endif;
        $this->start_controls_section(
                'section_tab', [
                    'label' => esc_html__('Rev Slider', 'yoox'),
                ]
        );
        $this->add_control(
                'rev_alise',
                [
                        'label' => esc_html__( 'Select Slider', 'yoox' ),
                        'type' => Controls_Manager::SELECT,
                        'options' => $slides,
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_1', [
                    'label'     => esc_html__('Slider Sidebar', 'yoox'),
                ]
        );
        $this->add_control(
                'show_bar',
                [
                        'label' => esc_html__( 'Show Sidebar', 'yoox' ),
                        'type' => Controls_Manager::SWITCHER,
                        'label_on' => __( 'Show', 'yoox' ),
                        'label_off' => __( 'Hide', 'yoox' ),
                        'return_value' => 'yes',
                        'default' => 'no',
                ]
        );
        $this->add_control(
                'twitter_url',
                [
                        'label'             => esc_html__( 'Twitter URL', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                        'default'           => '',
                        'condition'     => ['show_bar' => 'yes']
                ]
        );
        $this->add_control(
                'facebook_url',
                [
                        'label'             => esc_html__( 'Facebook URL', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                        'default'           => '',
                        'condition'     => ['show_bar' => 'yes']
                ]
        );
        $this->add_control(
                'linkedin_url',
                [
                        'label'             => esc_html__( 'Linkedin URL', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                        'default'           => '',
                        'condition'     => ['show_bar' => 'yes']
                ]
        );
        $this->add_control(
                'pinterest_url',
                [
                        'label'             => esc_html__( 'Pinterest URL', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                        'default'           => '',
                        'condition'     => ['show_bar' => 'yes']
                ]
        );
        $this->add_control(
                'dribbble_url',
                [
                        'label'             => esc_html__( 'Dribbble URL', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                        'default'           => '',
                        'condition'     => ['show_bar' => 'yes']
                ]
        );
        $this->add_control(
                'behance_url',
                [
                        'label'             => esc_html__( 'Behance URL', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                        'default'           => '',
                        'condition'     => ['show_bar' => 'yes']
                ]
        );
        $this->add_control(
                'title',
                [
                        'label'         => esc_html__( 'Sidebar Title', 'yoox' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => '',
                        'label_block'   => true,
                        'placeholder'   => esc_html__('Insert Title', 'yoox'),
                        'condition'     => ['show_bar' => 'yes']
                ]
        );
        $this->add_control(
                'btn',
                [
                        'label'         => esc_html__( 'BTN Label', 'yoox' ),
                        'type'          => Controls_Manager::TEXT,
                        'default'       => esc_html__('', 'yoox'),
                        'label_block'   => true,
                        'placeholder'   => esc_html__('Btn Label', 'yoox'),
                        'condition'     => ['show_bar' => 'yes']
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
                        'condition'     => ['show_bar' => 'yes']
                ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_video',
            [
                'label'         => esc_html__('Slider Video Popup', 'yoox'),
            ]
        );
        $this->add_control(
                'show_video',
                [
                        'label' => esc_html__( 'Show Video Popup', 'yoox' ),
                        'type' => Controls_Manager::SWITCHER,
                        'label_on' => __( 'Show', 'yoox' ),
                        'label_off' => __( 'Hide', 'yoox' ),
                        'return_value' => 'yes',
                        'default' => 'no',
                ]
        );
        $this->add_control(
                'video_url',
                [
                        'label'             => esc_html__( 'Video URL', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                        'default'           => '',
                        'label_block'       => true,
                        'condition'         => ['show_video' => 'yes']
                ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_2',
            [
                'label'         => esc_html__('Bullet Style', 'yoox'),
                'tab'           => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_control(
                'bullet_color',
                [
                        'label' => esc_html__( 'Bullet Color', 'yoox' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .tp-bullets.custom .tp-bullet' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control(
                'bullet_bar_color',
                [
                        'label' => esc_html__( 'Bullet Bar Color', 'yoox' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .tp-bullets.custom .tp-bullet:before' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_3',
            [
                'label'         => esc_html__('Sidebar Style', 'yoox'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => ['show_bar' => 'yes']
            ]
        );
        $this->add_group_control(
                Group_Control_Background::get_type(),
            [
                    'name' => 'sidbar_background',
                    'label' => esc_html__( 'Sidebar Area BG', 'yoox' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .sidebarSlider',
            ]
        );
        $this->add_responsive_control(
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
                                '{{WRAPPER}} .sidebarSlider' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->start_controls_tabs( 'style_tabs_1' );
        $this->start_controls_tab(
                    'style_normal',
                    [
                            'label'     => esc_html__( ' Socila Normal', 'yoox' ),
                    ]
            );
            $this->add_control(
                    'social_color',
                    [
                            'label' => esc_html__( 'Social Color', 'yoox' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .socialLink a' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    'style_hover',
                    [
                            'label' => __( 'Socila Hover', 'yoox' ),
                    ]
            );
            $this->add_control(
                    'social_hover_color',
                    [
                            'label' => esc_html__( 'Social Hover', 'yoox' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .socialLink a:hover' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
                'title_color',
                [
                        'label' => esc_html__( 'Title Color', 'yoox' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .readycontact h2' => 'color: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control(
                'title_margin',
                [
                        'label' => esc_html__( 'Title Margin', 'yoox' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                                '{{WRAPPER}} .readycontact h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                ]
        );
        $this->start_controls_tabs( 'style_tabs_2' );
        $this->start_controls_tab(
                    'btn_normal',
                    [
                            'label'     => esc_html__( 'BTN Normal', 'yoox' ),
                    ]
            );
            $this->add_control(
                    'btn_color',
                    [
                            'label' => esc_html__( 'BTN Color', 'yoox' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .readycontact .common_btn' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'btn_bg',
                    [
                            'label' => esc_html__( 'BG Color', 'yoox' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .readycontact .common_btn.fix_btn' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    'btn_hover',
                    [
                            'label' => __( 'BTN Hover', 'yoox' ),
                    ]
            );
            $this->add_control(
                    'btn_color_hover',
                    [
                            'label' => esc_html__( 'BTN Hover Color', 'yoox' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .readycontact .common_btn:hover' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'btn_bg_hover',
                    [
                            'label' => esc_html__( 'BG Hover Color', 'yoox' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .readycontact .common_btn.fix_btn:after' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
       $this->end_controls_section(); 
       
       $this->start_controls_section(
            'section_tab_5',
            [
                'label'         => esc_html__('Video Btn Style', 'yoox'),
                'tab'           => Controls_Manager::TAB_STYLE,
                'condition'     => ['show_video' => 'yes']
            ]
        );
        $this->add_responsive_control(
                'v_width',
                [
                        'label' => __( 'Width', 'yoox' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px'],
                        'range' => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                        'step' => 1,
                                ]
                        ],
                        'default' => [],
                        'selectors' => [
                                '{{WRAPPER}} .popUpvideo a.video_link' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->add_responsive_control(
                'v_height',
                [
                        'label' => __( 'Height', 'yoox' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px'],
                        'range' => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 1000,
                                        'step' => 1,
                                ]
                        ],
                        'default' => [],
                        'selectors' => [
                                '{{WRAPPER}} .popUpvideo a.video_link' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                ]
        );
        $this->start_controls_tabs( 'style_tabs_5' );
        $this->start_controls_tab(
                    'video_normal',
                    [
                            'label'     => esc_html__( 'Normal', 'yoox' ),
                    ]
            );
            $this->add_control(
                    'video_bg',
                    [
                            'label'     => esc_html__( 'Video BTN BG', 'yoox' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .popUpvideo a.video_link' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'video_color',
                    [
                            'label'     => esc_html__( 'Video BTN Color', 'yoox' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .popUpvideo a.video_link' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                    'video_hover',
                    [
                            'label' => __( 'Hover', 'yoox' ),
                    ]
            );
            $this->add_control(
                    'video_hover_bg',
                    [
                            'label'     => esc_html__( 'Video BTN BG Hover', 'yoox' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .popUpvideo a.video_link:hover' => 'background: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_control(
                    'video_hover_color',
                    [
                            'label'     => esc_html__( 'Video BTN Hover Color', 'yoox' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .popUpvideo a.video_link:hover' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->end_controls_tab();
        $this->end_controls_tabs();
       $this->end_controls_section(); 
    }

    protected function render() {
        $settings       = $this->get_settings_for_display();
        $rev_alise      = (isset($settings['rev_alise']) && $settings['rev_alise'] != '') ? $settings['rev_alise'] : '';
        
        $show_bar       = (isset($settings['show_bar'])) ? $settings['show_bar'] : '';
        $show_video     = (isset($settings['show_video'])) ? $settings['show_video'] : '';
        $video_url      = (isset($settings['video_url']) && $settings['video_url'] != '') ? $settings['video_url'] : '';
        
        $twitter_url    = (isset($settings['twitter_url']) && $settings['twitter_url'] != '') ? $settings['twitter_url'] : '';
        $facebook_url   = (isset($settings['facebook_url']) && $settings['facebook_url'] != '') ? $settings['facebook_url'] : '';
        $linkedin_url   = (isset($settings['linkedin_url']) && $settings['linkedin_url'] != '') ? $settings['linkedin_url'] : '';
        $pinterest_url  = (isset($settings['pinterest_url']) && $settings['pinterest_url'] != '') ? $settings['pinterest_url'] : '';
        $dribbble_url   = (isset($settings['dribbble_url']) && $settings['dribbble_url'] != '') ? $settings['dribbble_url'] : '';
        $behance_url    = (isset($settings['behance_url']) && $settings['behance_url'] != '') ? $settings['behance_url'] : '';
        $title          = (isset($settings['title']) && $settings['title'] != '') ? $settings['title'] : '';
        $btn            = (isset($settings['btn']) && $settings['btn'] != '') ? $settings['btn'] : 'contact us';
        $target         = (isset($settings['btn_url']['is_external'])) ? ' target="_blank"' : '';
        $nofollow       = (isset($settings['btn_url']['nofollow'])) ? ' rel="nofollow"' : '';
        $btn_url        = (isset($settings['btn_url']['url']) && $settings['btn_url']['url'] != '') ? $settings['btn_url']['url'] : '#';
        
        
        if($rev_alise != ''){
            echo do_shortcode('[rev_slider alias="'.$rev_alise.'"]');
        }else{
            echo '<div class="alert alert-warning" role="alert"> <strong>Warning!</strong> Please select a slider from dropdown. </div>';
        }
        
        if($show_bar == 'yes'):
            ?>
                <div class="sidebarSlider text-center">
                    <div class="socialLink">
                        <?php if($twitter_url != ''): ?>
                            <a href="<?php echo esc_url($twitter_url); ?>">Twitter</a>
                        <?php endif; ?>
                        <?php if($facebook_url != ''): ?>
                            <a href="<?php echo esc_url($facebook_url); ?>">Facebook</a>
                        <?php endif; ?>
                        <?php if($linkedin_url != ''): ?>
                            <a href="<?php echo esc_url($linkedin_url); ?>">Linkedin</a>
                        <?php endif; ?>
                        <?php if($pinterest_url != ''): ?>
                            <a href="<?php echo esc_url($pinterest_url); ?>">Pinterest</a>
                        <?php endif; ?>
                        <?php if($dribbble_url != ''): ?>
                            <a href="<?php echo esc_url($dribbble_url); ?>">Dribbble</a>
                        <?php endif; ?>     
                        <?php if($behance_url != ''): ?>
                            <a href="<?php echo esc_url($behance_url); ?>">Behance</a>
                        <?php endif; ?>     
                    </div>
                    <div class="readycontact text-center">
                        <?php if($title != ''): ?>
                            <h2><?php echo esc_html($title); ?></h2>
                        <?php endif; ?>
                        <?php if($btn != ''): ?>
                            <a class="common_btn fix_btn" href="<?php echo esc_url($btn_url); ?>" <?php echo $target ?> ><?php echo esc_html($btn); ?></a>
                        <?php endif; ?>
                    </div>
                </div>  
            <?php
        endif;
        
        if($show_video == 'yes'):
            ?>
            <div class="popUpvideo">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <a class="video_link" href="<?php echo esc_url($video_url); ?>"><i class="fa fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endif;
    }

    protected function _content_template() {
        
    }

}
