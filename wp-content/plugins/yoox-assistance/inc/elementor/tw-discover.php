<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class TW_Discover_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-discover';
    }
    
    public function get_title() {
        return esc_html__( 'Discover', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-eye';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' =>esc_html__( 'Discover', 'yoox' ),
            ]
        );
        
        $this->add_control(
                'image_01',
                [
                        'label' => esc_html__( 'Image 01', 'yoox' ),
                        'type' => Controls_Manager::MEDIA,
                        'description' => esc_html__('Image size should be 660x425px.', 'yoox'),
                ]
        );
        
        $this->add_control(
                'image_02',
                [
                        'label' => esc_html__( 'Image 02', 'yoox' ),
                        'type' => Controls_Manager::MEDIA,
                        'description' => esc_html__('Image size should be 510x365px.', 'yoox'),
                ]
        );
        
        $this->add_control(
                'descs',
                [
                        'label' => esc_html__( 'Short Desc', 'yoox' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'description' => esc_html__('Please insert a short description here', 'yoox'),
                        'default' => esc_html__('The best one page template you will ever need.', 'yoox')
                ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2', [
                'label' =>esc_html__( 'Discover Styling', 'yoox' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );
        
        
        $this->add_control(
                'descs_color',
                [
                        'label' => esc_html__( 'Description Color', 'yoox' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                                '{{WRAPPER}} .discover_content' => 'color: {{VALUE}}',
                        ],
                ]
        );
        
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'discover_typography',
                        'label' => esc_html__( 'Typography', 'yoox' ),
                        'selector' => '{{WRAPPER}} .discover_content',
                ]
        );
        
        $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                        'name' => 'discover_background',
                        'label' => esc_html__( 'BG Color', 'yoox' ),
                        'types' => [ 'classic', 'gradient', 'video' ],
                        'selector' => '{{WRAPPER}} .discover_content',
                ]
        );
        
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings = $this->get_settings();
        $image_01 = (isset($settings['image_01']['url']) && $settings['image_01']['url'] != '') ? $settings['image_01']['url'] : 'https://via.placeholder.com/660.x425.jpg';
        $image_02 = (isset($settings['image_02']['url']) && $settings['image_02']['url'] != '') ? $settings['image_02']['url'] : 'https://via.placeholder.com/510.x365.jpg';
        $descs = (isset($settings['descs'])) ? $settings['descs'] : '';
        ?>
        <div class="discover_yoox">
            <div class="dy_img1">
                <img src="<?php echo esc_url($image_02); ?>" alt="">
            </div>
            <div class="dy_img2">
                <img src="<?php echo esc_url($image_01); ?>" alt="">
            </div>
            <?php if($descs != ''): ?>
            <div class="discover_content">
                <?php echo wp_kses_post($descs); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php
    }
    
    protected function _content_template() {

    }
}