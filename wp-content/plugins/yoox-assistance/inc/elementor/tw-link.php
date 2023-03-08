<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class TW_Link_Widget extends Widget_Base{
    
    public function get_name() {
        return 'tw-link';
    }
    
    public function get_title() {
        return esc_html__( 'Yoox Link', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-editor-link';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' =>esc_html__( 'Yoox Link', 'yoox' ),
            ]
        );
        
        $this->add_control(
                'link_label',
                [
                        'label'             => esc_html__( 'Link Label', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'default'           => esc_html__( 'Purchase Theme', 'yoox' ),
                        'placeholder'       => esc_html__( 'Purchase Theme', 'yoox' ),
                ]
        );
        $this->add_control(
                'link_url',
                [
                        'label'             => esc_html__( 'Link', 'yoox' ),
                        'type'              => Controls_Manager::URL,
                        'placeholder'       => esc_html__( 'https://your-link.com', 'yoox' ),
                        'show_external'     => true,
                        'default'           => [
                                'url' => '',
                                'is_external' => true,
                                'nofollow' => true,
                        ],
                ]
        );
        $this->add_responsive_control(
                'link_align', [
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
                        'prefix_class'              => 'tw-section-link elementor%s-align-',
                ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_link_style', [
                'label'                             =>esc_html__( 'Link Style', 'yoox' ),
                'tab'                               => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
                'link_color', [
                        'label'		 =>esc_html__( 'Link Color', 'yoox' ),
                        'type'		 => Controls_Manager::COLOR,
                        'selectors'	 => [
                            '{{WRAPPER}} .yoox_link' => 'color: {{VALUE}};'
                        ],
                ]
        );
        $this->add_control(
                'link_hover_color', [
                        'label'		 =>esc_html__( 'Link Hover Color', 'yoox' ),
                        'type'		 => Controls_Manager::COLOR,
                        'selectors'	 => [
                            '{{WRAPPER}} .yoox_link:hover' => 'color: {{VALUE}};'
                        ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                        'name' => 'link_typography',
                        'label' => esc_html__( 'Link Typography', 'yoox' ),
                        'selector' => '{{WRAPPER}} .yoox_link',
                ]
        );
        
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings = $this->get_settings();
        $link_label     = $settings[ 'link_label' ];
        $target         = $settings['link_url']['is_external'] ? ' target="_blank"' : '';
        $nofollow       = $settings['link_url']['nofollow'] ? ' rel="nofollow"' : '';
        $url            = (isset($settings['link_url']['url']) && $settings['link_url']['url'] != '') ? $settings['link_url']['url'] : '#';
        if($link_label != ''): ?>
            <a href="<?php echo esc_url($url); ?>" class="yoox_link" <?php echo $target; ?>><?php echo esc_html($link_label); ?></a>
        <?php endif; 
    }
    
    protected function _content_template() {

    }
}