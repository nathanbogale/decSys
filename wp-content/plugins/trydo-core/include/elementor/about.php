<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_About extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-about';
    }

    public function get_title()
    {
        return esc_html__('About', 'trydo');
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
        return ['about', 'trydo'];
    }

    protected function _register_controls()
    {

        // Section Title
        $this->rbt_section_title('about_section_title', 'Title and Content', '', 'About', 'h2', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum,', 'text-left');
        $this->rbt_section_title('who_we_are_section_title', 'Who we are', '', 'Who we are', 'h4', 'There are many vtions of passages of Lorem Ipsum available, but the majority have suffered.', 'text-left');
        $this->rbt_section_title('what_we_do_section_title', 'What we do', '', 'What we do', 'h4', 'There are many vtions of passages of Lorem Ipsum available, but the majority have suffered.', 'text-left');


        $this->start_controls_section(
            '_about_thumbnail',
            [
                'label' => esc_html__('Thumbnail', 'trydo'),
            ]
        );
        $this->add_control(
            'about_thumbnail',
            [
                'label' => esc_html__( 'Choose Image', 'trydo' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'about_thumbnail_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );
        $this->add_control(
            'about_thumbnail_overlap',
            [
                'label' => esc_html__('Image overlap to top?', 'trydo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'trydo'),
                'label_off' => esc_html__('No', 'trydo'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_responsive_control(
            'about_thumbnail_height',
            [
                'label' => esc_html__( 'Image Height', 'trydo' ),
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
                'selectors' => [
                    '{{WRAPPER}} .about-area .thumbnail img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'about_thumbnail_overlap_x',
            [
                'label' => esc_html__( 'Image overlap position', 'trydo' ),
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
                'selectors' => [
                    '{{WRAPPER}} .about-position-top .thumbnail' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => array(
                    'about_thumbnail_overlap' => 'yes',
                ),
            ]
        );



        $this->end_controls_section();



        // Style Component
        $this->rbt_basic_style_controls('about_section_title_before_title', 'Section - Before Title', '.section-title .sub-title');
        $this->rbt_basic_style_controls('about_section_title_title', 'Section - Title', '.section-title .title');
        $this->rbt_basic_style_controls('about_section_title_description', 'Section - Description', '.section-title p');

        // Style Component
        $this->rbt_basic_style_controls('who_we_are_section_title_before_title', 'Sub Section - Before Title', '.about-us-list .sub-title');
        $this->rbt_basic_style_controls('who_we_are_section_title_title', 'Sub Section - Title', '.about-us-list .title');
        $this->rbt_basic_style_controls('who_we_are_section_title_description', 'Sub Section - Description', '.about-us-list p');


        // Area Style
        $this->rbt_section_style_controls('about_area', 'Section Style', '.about-area');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        $image_overlap = ( $settings['about_thumbnail_overlap'] == 'yes') ? "about-position-top" : "pt--120";

        ?>
        <!-- Start About Area  -->
        <div class="about-area pb--120 <?php echo esc_attr($image_overlap); ?>">
            <div class="about-wrapper">
                <div class="container">
                    <div class="row row--35 align-items-center">
                        <?php if ($settings['about_thumbnail']['url'] || $settings['about_thumbnail']['id']) : ?>
                        <div class="col-lg-5 col-md-12">
                            <div class="thumbnail">
                                <?php
                                $this->add_render_attribute('about_thumbnail', 'src', $settings['about_thumbnail']['url']);
                                $this->add_render_attribute('about_thumbnail', 'alt', Control_Media::get_image_alt($settings['about_thumbnail']));
                                $this->add_render_attribute('about_thumbnail', 'title', Control_Media::get_image_title($settings['about_thumbnail']));
                                $this->add_render_attribute('about_thumbnail', 'class', 'w-100');
                                ?>
                                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'about_thumbnail_size', 'about_thumbnail'); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-lg-7 col-md-12">
                            <div class="about-inner inner">
                                <div class="section-title <?php echo esc_attr($settings['rbt_about_section_title_align']) ?>">
                                    <?php $this->rbt_section_title_render('about_section_title', $this->get_settings()); ?>
                                </div>
                                <div class="row mt--30 mt_sm--10">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="about-us-list <?php echo esc_attr($settings['rbt_who_we_are_section_title_align']) ?>">
                                            <?php $this->rbt_section_title_render('who_we_are_section_title', $this->get_settings()); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="about-us-list <?php echo esc_attr($settings['rbt_what_we_do_section_title_align']) ?>">
                                            <?php $this->rbt_section_title_render('what_we_do_section_title', $this->get_settings()); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start About Area  -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_About());


