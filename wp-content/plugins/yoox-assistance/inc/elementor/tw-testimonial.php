<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class TW_Testimonial_Widgets extends Widget_Base{
    
    public function get_name() {
        return 'tw-testimonial';
    }
    
    public function get_title() {
        return esc_html__( 'Testimonial Slider', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-blockquote';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab_1',
            [
                'label'     => esc_html__('Testimonial', 'yoox')
            ]
        );
        $this->add_control(
                'show_quote',
                [
                        'label' => esc_html__( 'Show Quote IMG', 'yoox' ),
                        'type' => Controls_Manager::SWITCHER,
                        'label_on' => __( 'Show', 'your-plugin' ),
                        'label_off' => __( 'Hide', 'your-plugin' ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                ]
        );
        $this->add_control(
                'quote_image',
                [
                        'label' => __( 'Quote Image', 'yoox' ),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [],
                        'description' => esc_html__('Upload your custom quote image. Image size should be 110x110px.')
                ]
        );
        
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
                'testimonials',
                [
                        'label' => esc_html__( 'Testimonial', 'yoox' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => ''
                ]
        );
        $repeater->add_control(
                'author',
                [
                        'label' => esc_html__( 'Author', 'yoox' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => '',
                        'label_block' => TRUE
                ]
        );
        $repeater->add_control(
                'designation',
                [
                        'label' => esc_html__( 'Designation', 'yoox' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => '',
                        'label_block' => TRUE
                ]
        );
        
        $this->add_control(
                'list',
                [
                        'label' => esc_html__( 'Testimonial List', 'yoox' ),
                        'type' => Controls_Manager::REPEATER,
                        'fields' => $repeater->get_controls(),
                        'default' => [
                                [
                                        'testimonials' => esc_html__( "This is due to their excellent service, competitive pricing and customer support. It's throughly refresing to get such a personal touch.", 'yoox' ),
                                        'author' => esc_html__( 'ThemeWar', 'yoox' ),
                                        'designation' => esc_html__( 'Developer', 'yoox' ),
                                ],
                        ],
                        'title_field' => '{{{ author }}}',
                ]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_2',
            [
                'label'     => esc_html__('Content Style', 'yoox'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                    'content_color',
                    [
                            'label' => esc_html__( 'Content Color', 'yoox' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .testimonial_item p' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name' => 'content_typography',
                            'label' => esc_html__( 'Content Typography', 'yoox' ),
                            'selector' => '{{WRAPPER}} .testimonial_item p',
                    ]
            );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'section_tab_3',
            [
                'label'     => esc_html__('Meta Style', 'yoox'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                    'meta_color',
                    [
                            'label' => esc_html__( 'Meta Color', 'yoox' ),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                    '{{WRAPPER}} .testimonial_item h5' => 'color: {{VALUE}}',
                            ],
                    ]
            );
            $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                            'name' => 'meta_typography',
                            'label' => esc_html__( 'Meta Typography', 'yoox' ),
                            'selector' => '{{WRAPPER}} .testimonial_item h5',
                    ]
            );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_tab_4',
            [
                'label'     => esc_html__('Bulet Style', 'yoox'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs( 'style_tabs_1' );
                $this->start_controls_tab(
                        'style_testi_normal',
                        [
                                'label' => __( 'Normal', 'yoox' ),
                        ]
                );
                
                $this->add_control(
                        'bulet_color',
                        [
                                'label' => esc_html__( 'BG Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .testimonial_carousel.owl-theme .owl-dots .owl-dot span' => 'background: {{VALUE}}',
                                ],
                        ]
                );
                
                $this->end_controls_tab();
                $this->start_controls_tab(
                        'style_testi_hover',
                        [
                                'label' => __( 'Hover', 'yoox' ),
                        ]
                );
                
                $this->add_control(
                        'bulet_hover_color',
                        [
                                'label' => esc_html__( 'Hover BG Color', 'yoox' ),
                                'type' => Controls_Manager::COLOR,
                                'selectors' => [
                                        '{{WRAPPER}} .testimonial_carousel.owl-theme .owl-dots .owl-dot span:hover' => 'background: {{VALUE}}',
                                        '{{WRAPPER}} .testimonial_carousel.owl-theme .owl-dots .owl-dot.active span' => 'background: {{VALUE}}'
                                ],
                        ]
                );
                
                $this->end_controls_tab();
            $this->end_controls_tabs();
            
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings = $this->get_settings_for_display();
        $testimonial = (isset($settings['list']) && !empty($settings['list'])) ? $settings['list'] : array();
        $show_quote = (isset($settings['show_quote'])) ? $settings['show_quote'] : '';
        $quote_image = (isset($settings['quote_image']['url']) && $settings['quote_image']['url'] != '') ? $settings['quote_image']['url'] : '';
        $quote_style = '';
        if($quote_image != ''){
            $quote_style = 'background-image: url('.$quote_image.'); background-repeat: no-repeat; background-position: center center; background-color: #ff5ee1;';
        }
        if($show_quote == 'yes'):
            echo '<div class="testimonial_icon" style="'.  esc_attr($quote_style).'"></div>';
        endif;
        if(count($testimonial) > 0):
            echo '<div class="testimonial_carousel">';
            foreach($testimonial as $item):
                    $testimonials = (isset($item['testimonials'])) ? $item['testimonials'] : '';
                    $author = (isset($item['author'])) ? $item['author'] : '';
                    $designation = (isset($item['designation'])) ? $item['designation'] : '';
                    if($testimonials != ''):
                    ?>
                    
                        <div class="testimonial_item text-center">
                            <p>
                                <?php echo wp_kses_post($testimonials); ?>
                            </p>
                            <?php if($author != '' || $designation != ''): ?>
                                <h5><?php if($author != ''){ echo esc_html($author);} if($designation != ''){ ?><span>-</span><span><?php echo esc_html($designation); ?></span><?php } ?></h5>
                            <?php endif; ?>
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