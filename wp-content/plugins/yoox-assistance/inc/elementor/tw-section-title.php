<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class TW_Section_Title_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-section-title';
    }
    
    public function get_title() {
        return esc_html__( 'Section Title', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-type-tool';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' =>esc_html__( 'Section Title', 'yoox' ),
            ]
        );
        $this->add_control(
                'sec_title',
                [
                        'label'             => esc_html__( 'Section Title', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'label_block'       => true,
                        'default'           => esc_html__( 'Section Title', 'yoox' ),
                        'placeholder'       => esc_html__( 'Section Title', 'yoox' ),
                ]
        );
        $this->add_control(
                'sec_desc',
                [
                        'label'             => esc_html__( 'Section Desc', 'yoox' ),
                        'type'              => Controls_Manager::TEXTAREA,
                        'placeholder'       => esc_html__( 'Section Description', 'yoox' ),
                ]
        );
        $this->add_responsive_control(
                'sec_title_align', [
                        'label'                     =>esc_html__( 'Title Alignment', 'yoox' ),
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
                        'prefix_class'              => 'section_titles elementor%s-align-',
                ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_title_style', [
                'label' =>esc_html__( 'Section Title', 'yoox' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'title_color', [
                'label'		 =>esc_html__( 'Title color', 'yoox' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .section_title' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_control(
            'title_margin_bottom', [
                'label'			 =>esc_html__( 'Margin Bottom', 'yoox' ),
                'type'			 => Controls_Manager::SLIDER,
                'default'		 => [
                    'size' => '',
                ],
                'range'			 => [
                    'px' => [
                        'min'	 => 0,
                        'step'	 => 1,
                    ],
                ],
                'size_units'	 => ['px'],
                'selectors'		 => [
                    '{{WRAPPER}} .section_title'	=> 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'		 => 'title_typography',
                'selector'	 => '{{WRAPPER}} .section_title',
            ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_desc_style', [
                'label' =>esc_html__( 'Section Description', 'yoox' ),
                'tab'	 => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'desc_color', [
                'label'		 =>esc_html__( 'Title color', 'yoox' ),
                'type'		 => Controls_Manager::COLOR,
                'selectors'	 => [
                    '{{WRAPPER}} .section_desc' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_control(
            'desc_margin_bottom', [
                'label'			 =>esc_html__( 'Margin Bottom', 'yoox' ),
                'type'			 => Controls_Manager::SLIDER,
                'default'		 => [
                    'size' => '',
                ],
                'range'			 => [
                    'px' => [
                        'min'	 => 0,
                        'step'	 => 1,
                    ],
                ],
                'size_units'	 => ['px'],
                'selectors'		 => [
                    '{{WRAPPER}} .section_desc'	=> 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'		 => 'desc_typography',
                'selector'	 => '{{WRAPPER}} .section_desc',
            ]
        );
        
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings = $this->get_settings();
        $sec_title = (isset($settings['sec_title'])) ? $settings['sec_title'] : '';
        $sec_desc = (isset($settings['sec_desc'])) ? $settings['sec_desc'] : '';
        ?>
        <?php if($sec_title != ''): ?>
            <h2 class="section_title"><?php echo esc_html($sec_title); ?></h2>
        <?php endif; ?>
        <?php if($sec_desc != ''): ?>
            <p class="section_desc"><?php echo wp_kses_post($sec_desc); ?></p>
        <?php endif; ?>
        <?php
    }
    
    protected function _content_template() {

    }
}