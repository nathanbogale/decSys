<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class TW_Section_Label_Widget extends Widget_Base{
    
    public function get_name() {
        return 'tw-section-label';
    }
    
    public function get_title() {
        return esc_html__( 'Section Label', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-divider-shape';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' =>esc_html__( 'Section Label', 'yoox' ),
            ]
        );
        
        $this->add_control(
                'label_text', [
                        'label'                     =>esc_html__( 'Section Label', 'yoox' ),
                        'type'                      => Controls_Manager::TEXT,
                        'label_block'               => true,
                        'placeholder'               =>esc_html__( 'Add Label', 'yoox' ),
                        'default'                   =>esc_html__( 'Section Label', 'yoox' ),
                ]
        );
        $this->add_responsive_control(
                'label_align', [
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
                        'default'                   => '',
                        'prefix_class'              => 'tw-section-label elementor%s-align-',
                ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_label_style', [
                'label'                             =>esc_html__( 'Label Style', 'yoox' ),
                'tab'                               => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
                'label_color', [
                        'label'		 =>esc_html__( 'Label Color', 'yoox' ),
                        'type'		 => Controls_Manager::COLOR,
                        'selectors'	 => [
                            '{{WRAPPER}} .section_subtitle' => 'color: {{VALUE}};'
                        ],
                ]
        );
        
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'sec_lebel_typography',
                        'label' => esc_html__( 'Label Typography', 'yoox' ),
                        'selector' => '{{WRAPPER}} .section_subtitle',
                ]
        );
        
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name'          => 'bar_bg',
                        'label'         => esc_html__( 'Bar BG', 'yoox' ),
                        'show_label'    => true,
                        'selector'      => '{{WRAPPER}} .section_subtitle:before, {{WRAPPER}} .section_subtitle:after',
                ]
        );
        
        $this->end_controls_section();
        
    }
    protected function render() {
        $settings = $this->get_settings();
        $label_text = $settings[ 'label_text' ];
        
        if($label_text != ''): ?>
        <h5 class="section_subtitle"><span><?php echo $label_text; ?></span></h5>
        <?php endif;
    }
}