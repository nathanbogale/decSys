<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Skill_Bar_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-skill-bar';
    }
    
    public function get_title() {
        return esc_html__( 'Skill Bar', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-skill-bar';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' =>esc_html__( 'Skill Bar', 'yoox' ),
            ]
        );
            $this->add_control(
                    'skill_title',
                    [
                            'label'         => esc_html__( 'Skill Title', 'yoox' ),
                            'type'          => Controls_Manager::TEXT,
                            'default'       => '',
                            'label_block'   => true,
                            'placeholder'   => esc_html__('Skill Title', 'yoox')
                    ]
            );
            $this->add_control(
                    'percent',
                    [
                            'label'         => esc_html__( 'Precent', 'yoox' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '',
                            'placeholder'   => esc_html__('Precent', 'yoox')
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_5',[
                    'label'     => esc_html__('Skill Style', 'yoox'),
                    'tab'       => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_control(
                    'skill_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .singleSkill' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
                'section_tab_1',[
                    'label'     => esc_html__('Skill Title Style', 'yoox'),
                    'tab'       => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_control(
                    'title_color',[
                            'label' => esc_html__( 'Title Color', 'yoox' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .singleSkill h5' => 'color: {{VALUE}}',
                            ],
                    ]
          );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'title_typography',
                        'label' => esc_html__( 'Title Typography', 'yoox' ),
                        'selector' => '{{WRAPPER}} .singleSkill h5',
                ]
        );
        $this->add_control(
                    'title_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .singleSkill h5' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_2',[
                    'label'     => esc_html__('Skill Percent Style', 'yoox'),
                    'tab'       => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_control(
                    'percent_color',[
                            'label' => esc_html__( 'Percent Color', 'yoox' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .singleSkill .skillbar .parcent' => 'color: {{VALUE}}',
                            ],
                    ]
          );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'percent_typography',
                        'label' => esc_html__( 'Percent Typography', 'yoox' ),
                        'selector' => '{{WRAPPER}} .singleSkill .skillbar .parcent',
                ]
        );
        $this->add_control(
                    'percent_margin',
                    [
                            'label' => esc_html__( 'Margins', 'yoox' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                    '{{WRAPPER}} .singleSkill .skillbar .parcent' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
                'section_tab_3',[
                    'label'     => esc_html__('Skill Bar Style', 'yoox'),
                    'tab'       => Controls_Manager::TAB_STYLE
                ]
        );
        $this->add_control(
                'skill_bar_bg',
                [
                        'label'         => esc_html__( 'Background Color', 'yoox' ),
                        'type'          => Controls_Manager::COLOR,
                        'label_block'   => true,
                        'selectors'     => [
                                '{{WRAPPER}} .singleSkill .skillbar' => 'background: {{VALUE}}',
                        ],
                ]
        );
        $this->add_control(
                'skill_foreground_bg',
                [
                        'label'         => esc_html__( 'Foreground Color', 'yoox' ),
                        'type'          => Controls_Manager::COLOR,
                        'label_block'   => true,
                        'selectors'     => [
                                '{{WRAPPER}} .singleSkill .skillbar span.rounds' => 'background: {{VALUE}}',
                                '{{WRAPPER}} .singleSkill .skillbar .skill' => 'background: {{VALUE}}',
                        ],
                ]
        );
        
        $this->end_controls_section();
        
    }
    
    protected function render() {
    $settings = $this->get_settings_for_display();
    $skill_title = (isset($settings['skill_title']) && $settings['skill_title'] != '') ? $settings['skill_title'] : ' ';
    $percent = (isset($settings['percent']) && $settings['percent'] != '') ? $settings['percent'] : '95';
            ?>
            <div class="singleSkill" data-limit="<?php echo esc_attr($percent); ?>">
                <?php if($skill_title != ''): ?>
                    <h5><?php echo esc_html($skill_title); ?></h5>
                <?php endif; ?>
                <div class="skillbar">
                    <?php if($percent != ''): ?>
                        <span class="parcent" data-count="<?php echo esc_attr($percent); ?>"><?php echo esc_html__($percent. '%', 'yoox'); ?></span>
                    <?php endif; ?>
                    <span class="rounds"></span>
                    <div class="skill"><span></span></div>
                </div>
            </div>
            <?php
    }
    
    protected function _content_template() {

    }
}