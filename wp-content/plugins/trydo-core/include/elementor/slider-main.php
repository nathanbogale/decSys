<?php

namespace Elementor;
use TrydoCore\Elementor\Controls\Group_Control_RBTGradient;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_Main_Slider extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-main-slider';
    }

    public function get_title()
    {
        return esc_html__('Main Slider', 'trydo');
    }

    public function get_icon()
    {
        return 'rt-icon';
    }

    public function get_categories()
    {
        return ['trydo'];
    }

    public function get_keywords()
    {
        return ['main_slider', 'trydo'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'trydo_main_slider',
            [
                'label' => esc_html__('Main Slider', 'trydo'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'trydo' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();


        $repeater->start_controls_tabs( '_main_slider_content_style' );
        $repeater->start_controls_tab(
            '_main_slider_content',
            [
                'label' => esc_html__( 'Content', 'trydo' ),
            ]
        );
            $repeater->add_control(
                'rbt_main_slider_before_title',
                [
                    'label' => esc_html__('Before Title', 'trydo'),
                    'description' => rbt_get_allowed_html_desc( 'basic' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'placeholder' => esc_html__('Type Before Heading Text', 'trydo'),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'rbt_main_slider_title',
                [
                    'label' => esc_html__('Title', 'trydo'),
                    'description' => rbt_get_allowed_html_desc( 'intermediate' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Grow business.', 'trydo'),
                    'placeholder' => esc_html__('Type Heading Text', 'trydo'),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'rbt_main_slider_title_tag',
                [
                    'label' => esc_html__('Title HTML Tag', 'trydo'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'h1' => [
                            'title' => esc_html__('H1', 'trydo'),
                            'icon' => 'eicon-editor-h1'
                        ],
                        'h2' => [
                            'title' => esc_html__('H2', 'trydo'),
                            'icon' => 'eicon-editor-h2'
                        ],
                        'h3' => [
                            'title' => esc_html__('H3', 'trydo'),
                            'icon' => 'eicon-editor-h3'
                        ],
                        'h4' => [
                            'title' => esc_html__('H4', 'trydo'),
                            'icon' => 'eicon-editor-h4'
                        ],
                        'h5' => [
                            'title' => esc_html__('H5', 'trydo'),
                            'icon' => 'eicon-editor-h5'
                        ],
                        'h6' => [
                            'title' => esc_html__('H6', 'trydo'),
                            'icon' => 'eicon-editor-h6'
                        ]
                    ],
                    'default' => 'h2',
                    'toggle' => false,
                ]
            );

            $repeater->add_control(
                'rbt_main_slider_desctiption',
                [
                    'label' => esc_html__('Description', 'trydo'),
                    'description' => rbt_get_allowed_html_desc( 'intermediate' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration.', 'trydo'),
                    'placeholder' => esc_html__('Type section description here', 'trydo'),
                ]
            );

            // Start Button
            $repeater->add_control(
                'rbt_main_slider_button_button_show',
                [
                    'label' => esc_html__( 'Show Button', 'trydo' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'trydo' ),
                    'label_off' => esc_html__( 'Hide', 'trydo' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $repeater->add_control(
                'rbt_main_slider_button_text',
                [
                    'label' => esc_html__('Button Text', 'trydo'),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Contact Us',
                    'title' => esc_html__('Enter button text', 'trydo'),
                    'label_block' => true,
                    'condition' => [
                        'rbt_main_slider_button_button_show' => 'yes'
                    ],
                ]
            );
            $repeater->add_control(
                'rbt_main_slider_button_link_type',
                [
                    'label' => esc_html__('Button Link Type', 'trydo'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1' => 'Custom Link',
                        '2' => 'Internal Page',
                    ],
                    'default' => '1',
                    'label_block' => true,
                    'condition' => [
                        'rbt_main_slider_button_button_show' => 'yes'
                    ],
                ]
            );
            $repeater->add_control(
                'rbt_main_slider_button_link',
                [
                    'label' => esc_html__('Button link', 'trydo'),
                    'type' => Controls_Manager::URL,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'placeholder' => esc_html__('https://your-link.com', 'trydo'),
                    'show_external' => false,
                    'default' => [
                        'url' => '#',
                        'is_external' => false,
                        'nofollow' => false,
                    ],
                    'condition' => [
                        'rbt_main_slider_button_link_type' => '1',
                        'rbt_main_slider_button_button_show' => 'yes'
                    ],
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'rbt_main_slider_button_page_link',
                [
                    'label' => esc_html__('Select Button Page', 'trydo'),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'options' => rbt_get_all_pages(),
                    'condition' => [
                        'rbt_main_slider_button_link_type' => '2',
                        'rbt_main_slider_button_button_show' => 'yes'
                    ]
                ]
            );
            // End Button
            // Start Button Style
            $repeater->add_control(
                'rbt_main_slider_button_style_button_styling',
                [
                    'label' => esc_html__('Button Styling (Optional)', 'trydo'),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $repeater->add_control(
                'rbt_main_slider_button_style_button_style',
                [
                    'label' => esc_html__('Button Style', 'trydo'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'rn-button-style--2 btn_border' => esc_html__('Outline', 'trydo'),
                        'rn-button-style--2 btn_solid' => esc_html__('Solid', 'trydo'),
                        'btn-transparent' => esc_html__('Naked', 'trydo'),
                    ],
                    'default' => 'rn-button-style--2 btn_solid',
                    'condition' => [
                        'rbt_main_slider_button_button_show' => 'yes'
                    ]
                ]
            );

            $repeater->add_control(
                'rbt_main_slider_button_style_button_size',
                [
                    'label' => esc_html__('Button Size', 'trydo'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'btn-size-lg' => esc_html__('Large', 'trydo'),
                        'btn-size-md' => esc_html__('Medium', 'trydo'),
                        'btn-size-sm' => esc_html__('Small', 'trydo'),
                    ],
                    'default' => 'btn-size-lg',
                    'condition' => [
                        'rbt_main_slider_button_style_button_style!' => 'btn-transparent',
                        'rbt_main_slider_button_button_show' => 'yes'
                    ],
                ]
            );
            $repeater->add_control(
                'rbt_main_slider_button_style_button_color',
                [
                    'label' => esc_html__('Button Color', 'trydo'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'rbt-btn-theme' => esc_html__('Theme Color', 'trydo'),
                        'rbt-btn-dark' => esc_html__('Dark Color', 'trydo'),
                        'rbt-btn-gray' => esc_html__('Gray Color', 'trydo'),
                        'rbt-btn-white' => esc_html__('White Color', 'trydo'),
                    ],
                    'default' => 'btn-theme',
                    'condition' => [
                        'rbt_main_slider_button_button_show' => 'yes'
                    ]
                ]
            );

            $repeater->add_responsive_control(
                'rbt_main_slider_button_style_margin',
                [
                    'label' => esc_html__('Button Margin', 'trydo'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .slide-btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'rbt_main_slider_button_button_show' => 'yes'
                    ]
                ]
            );
            $repeater->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'rbt_main_slider_button_style_typography',
                    'selector' => '{{WRAPPER}} .slide-btn a',
                    'condition' => [
                        'rbt_main_slider_button_button_show' => 'yes'
                    ]
                ]
            );
            // End Button style

            $repeater->add_responsive_control(
                'rbt_main_slider_align',
                [
                    'label' => esc_html__('Slider Content Alignment', 'trydo'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'text-left' => [
                            'title' => esc_html__('Left', 'trydo'),
                            'icon' => 'fa fa-align-left',
                        ],
                        'text-center' => [
                            'title' => esc_html__('Center', 'trydo'),
                            'icon' => 'fa fa-align-center',
                        ],
                        'text-right' => [
                            'title' => esc_html__('Right', 'trydo'),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'text-left',
                    'toggle' => true,
                    'separator' => 'before',
                ]
            );

            $repeater->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'rbt_main_slider_area_background',
                    'label' => esc_html__('Background', 'trydo'),
                    'types' => ['classic', 'gradient'],
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}.slide.slide-style-2',
                    'separator' => 'before',
                    'fields_options' => [
                         'background' => [
                                 'default' => 'classic',
                         ],
                        'image' => [
                            'label' =>  esc_html__('Background Image', 'trydo'),
                            'default' => [
                                'url' => Utils::get_placeholder_image_src(),
                            ],
                        ],
                        'color' => [
                            'label' => esc_html__('Background color', 'trydo'),
                            'default' => '#1d1d24',
                        ],
                    ],

                ]
            );
            $repeater->add_control(
                'gradient_important_note',
                [
                    'label' => esc_html__( 'Note:', 'trydo' ),
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => esc_html__( 'If gradient options not working for edit mode. Please view the preview mode.', 'trydo' ),
                    'content_classes' => 'elementor-control-field-description',
                ]
            );

            $repeater->add_control(
                'rbt_main_slider_area_background_overlay',
                [
                    'label' => esc_html__('Background Overlay?', 'trydo'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Yes', 'trydo'),
                    'label_off' => esc_html__('No', 'trydo'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'separator' => 'before',
                ]
            );
            $repeater->add_control(
                'rbt_main_slider_area_background_overlay_color',
                [
                    'label' => esc_html__( 'Overlay Color', 'trydo' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}}[data-black-overlay]:before' => 'background-color: {{VALUE}}'
                    ],
                    'condition' => array(
                        'rbt_main_slider_area_background_overlay' => 'yes',
                    ),
                ]
            );
            $repeater->add_control(
                'rbt_main_slider_area_background_overlay_opacity',
                [
                    'label' => esc_html__('Overlay Opacity', 'trydo'),
                    'type' => Controls_Manager::SLIDER,
                    'title' => esc_html__('Enter overlay opacity value', 'trydo'),
                    'label_block' => true,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 10,
                            'step' => 1,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 8,
                    ],
                    'condition' => array(
                        'rbt_main_slider_area_background_overlay' => 'yes',
                    ),
                ]
            );
        $repeater->end_controls_tab();
        $repeater->start_controls_tab(
            '_main_slider_style',
            [
                'label' => esc_html__( 'Style', 'trydo' ),
            ]
        );
            // Start Before Title
            $repeater->add_control(
                'rbt_main_slider_before_title_styling',
                [
                    'label' => esc_html__('Before Title', 'trydo'),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $repeater->add_group_control(
                Group_Control_RBTGradient::get_type(),
                [
                    'name' => 'rbt_main_slider_before_title_advs',
                    'label' => esc_html__('Color', 'trydo'),
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}.slide.slide-style-2 .inner > span',
                    'separator' => 'before',
                ]
            );
            $repeater->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'rbt_main_slider_before_title_typography',
                    'label' => esc_html__('Typography', 'trydo'),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}.slide.slide-style-2 .inner > span',
                ]
            );
            // End Before Title
            // Start Title
            $repeater->add_control(
                'rbt_main_slider_title_styling',
                [
                    'label' => esc_html__('Title', 'trydo'),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $repeater->add_group_control(
                Group_Control_RBTGradient::get_type(),
                [
                    'name' => 'rbt_main_slider_title_advs',
                    'label' => esc_html__('Color', 'trydo'),
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}.slide.slide-style-2 .inner .title',
                ]
            );
            $repeater->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'rbt_main_slider_title_typography',
                    'label' => esc_html__('Typography', 'trydo'),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}.slide.slide-style-2 .inner .title',
                ]
            );
            // End Title
            // Start description
            $repeater->add_control(
                'rbt_main_slider_description_styling',
                [
                    'label' => esc_html__('Description', 'trydo'),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $repeater->add_group_control(
                Group_Control_RBTGradient::get_type(),
                [
                    'name' => 'rbt_main_slider_description_advs',
                    'label' => esc_html__('Color', 'trydo'),
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}.slide.slide-style-2 .inner .description',
                ]
            );
            $repeater->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'rbt_main_slider_description_typography',
                    'label' => esc_html__('Typography', 'trydo'),
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}.slide.slide-style-2 .inner .description',
                ]
            );
            // End description

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();


        $this->add_control(
            'main_slider_list',
            [
                'label' => esc_html__('Slider List', 'trydo'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'rbt_main_slider_title' => esc_html__('Grow business.', 'trydo')
                    ],
                    [
                        'rbt_main_slider_title' => esc_html__('Development.', 'trydo')
                    ],
                    [
                        'rbt_main_slider_title' => esc_html__('Marketing.', 'trydo')
                    ],
                ],
                'title_field' => '{{{ rbt_main_slider_title }}}',
            ]
        );


        $this->end_controls_section();

        // layout Panel
        $this->start_controls_section(
            'trydo_main_slider_options',
            [
                'label' => esc_html__('Slider Options', 'trydo'),
            ]
        );
        $this->add_control(
            'trydo_main_slider_dots',
            [
                'label' => esc_html__('Dots?', 'trydo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'trydo'),
                'label_off' => esc_html__('Hide', 'trydo'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'trydo_main_slider_arrow',
            [
                'label' => esc_html__('Arrow Icons?', 'trydo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'trydo'),
                'label_off' => esc_html__('Hide', 'trydo'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'trydo_main_slider_infinite',
            [
                'label' => esc_html__('Infinite?', 'trydo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'trydo'),
                'label_off' => esc_html__('No', 'trydo'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'trydo_main_slider_autoplay',
            [
                'label' => esc_html__('Autoplay?', 'trydo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'trydo'),
                'label_off' => esc_html__('No', 'trydo'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'trydo_main_slider_autoplay_speed',
            [
                'label' => esc_html__('Autoplay Speed', 'trydo'),
                'type' => Controls_Manager::TEXT,
                'default' => '2500',
                'title' => esc_html__('Enter autoplay speed', 'trydo'),
                'label_block' => true,
                'condition' => array(
                    'trydo_main_slider_autoplay' => 'yes',
                ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'trydo_main_slider_advanced_options',
            [
                'label' => esc_html__('Advanced Options', 'trydo'),
            ]
        );
        // Height Control
        $this->rbt_height_control('main_slider');

        $this->end_controls_section();

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        $carousel_args = [
            'arrows' => ('yes' === $settings['trydo_main_slider_arrow']),
            'dots' => ('yes' === $settings['trydo_main_slider_dots']),
            'autoplay' => ('yes' === $settings['trydo_main_slider_autoplay']),
            'autoplay_speed' => absint($settings['trydo_main_slider_autoplay_speed']),
            'infinite' => ('yes' === $settings['trydo_main_slider_infinite'])
        ];
        $this->add_render_attribute('trydo-carousel-main-slider-data', 'data-settings', wp_json_encode($carousel_args));
        $this->add_render_attribute('trydo-main-slider', 'class', 'rn-main-slider-area rn-section-gap bg_color--1');
        $this->add_render_attribute('trydo-main-slider', 'id', 'trydo-main-slider-' . esc_attr($this->get_id()));

        ?>

        <?php if($settings['main_slider_list']){ ?>
            <!-- Start Slider Area  -->
            <div id="trydo-main-slider-<?php echo esc_attr($this->get_id()) ?>" class="slider-activation rn-slick-dot rn-slick-activation dot-light mb--0 " <?php echo $this->get_render_attribute_string('trydo-carousel-main-slider-data'); ?>>
                <?php foreach ($settings['main_slider_list'] as $item){
                    $this->add_render_attribute('title_args', 'class', 'title theme-gradient');
                    ?>

                    <!-- Start Single Slider  -->
                    <div class="rbt-height-control slide slide-style-2 d-flex align-items-center justify-content-center bg_image elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>" <?php if ($item['rbt_main_slider_area_background_overlay'] == 'yes'){ ?> data-black-overlay="<?php echo esc_attr($item['rbt_main_slider_area_background_overlay_opacity']['size']); ?>" <?php } ?> >
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="inner <?php echo esc_attr($item['rbt_main_slider_align']) ?>">

                                        <?php if (!empty($item['rbt_main_slider_before_title'])) { ?>
                                            <span class="sub-title"><?php echo rbt_kses_basic( $item['rbt_main_slider_before_title'] ); ?></span>
                                        <?php } ?>
                                        <?php
                                        if ($item['rbt_main_slider_title_tag']) :
                                            printf('<%1$s %2$s>%3$s</%1$s>',
                                                tag_escape($item['rbt_main_slider_title_tag']),
                                                $this->get_render_attribute_string('title_args'),
                                                rbt_kses_intermediate($item['rbt_main_slider_title'])
                                            );
                                        endif;
                                        ?>
                                        <?php if (!empty($item['rbt_main_slider_desctiption'])) { ?>
                                            <p class="description"><?php echo rbt_kses_intermediate( $item['rbt_main_slider_desctiption'] ); ?></p>
                                        <?php } ?>

                                        <?php if($item['rbt_main_slider_button_button_show'] == 'yes'){ ?>
                                            <div class="slide-btn">
                                                <?php
                                                // Link
                                                $href = "#";
                                                $target = "_self";
                                                $rel = "nofollow";
                                                if ('2' == $item['rbt_main_slider_button_link_type']) {
                                                    $href = get_permalink($item['rbt_main_slider_button_page_link']);
                                                    $target = "_self";
                                                    $rel = "nofollow";
                                                } else {
                                                    if (!empty($item['rbt_main_slider_button_link']['url'])) {
                                                        $href = $item['rbt_main_slider_button_link']['url'];
                                                    }
                                                    if ($item['rbt_main_slider_button_link']['is_external']) {
                                                        $target = "_blank";
                                                    }
                                                    if (!empty($item['rbt_main_slider_button_link']['nofollow'])) {
                                                        $rel = "nofollow";
                                                    }
                                                }

                                                // Button
                                                if (!empty($item['rbt_main_slider_button_link']['url']) || isset($item['rbt_main_slider_button_link_type'])) {

                                                    $button_html = '<a class="rbt-button '. $item['rbt_main_slider_button_style_button_style'] .' '. $item['rbt_main_slider_button_style_button_size'] .' '. $item['rbt_main_slider_button_style_button_color'] .' " href="'. $href .'" target="'. $target .'" rel="'.$rel.'">' . '<span class="button-text">' . $item['rbt_main_slider_button_text'] . '</span></a>';
                                                }
                                                if (!empty($item['rbt_main_slider_button_text'])) {
                                                    echo $button_html;
                                                }
                                                ?>


                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Slider  -->

                <?php } ?>
            </div>
            <!-- End Slider Area  -->
        <?php
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_Main_Slider());


