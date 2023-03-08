<?php
/**
 * Beaver Compatibility class
 *
 * @package Adeline WordPress theme
 */
// If Beaver Builder or Beaver Themer plugins doesn't exist then return.
if (!ADELINE_BEAVER_ACTIVE || !class_exists('FLThemeBuilderLoader')) {
    return;
}
if (!class_exists('Adeline_Beaver')):
    class Adeline_Beaver
{
        /**
         * Setup class.
         *
         * @since 1.0
         */
        public function __construct()
    {
            add_action('after_setup_theme', array($this, 'header_footer_support'));
            add_action('wp', array($this, 'header_footer_render'));
            add_action('wp', array($this, 'page_content_render'));
            add_filter('fl_theme_builder_part_hooks', array($this, 'register_part_hooks'));
        }
        /**
         * Add theme support
         *
         * @since 1.0
         */
        public function header_footer_support()
    {
            add_theme_support('fl-theme-builder-headers');
            add_theme_support('fl-theme-builder-footers');
            add_theme_support('fl-theme-builder-parts');
        }
        /**
         * Update header/footer with Beaver template
         *
         * @since 1.0
         */
        public function header_footer_render()
    {
            // Get the header ID.
            $header_ids = FLThemeBuilderLayoutData::get_current_page_header_ids();
            // If we have a header, remove the theme header and hook in Theme Builder's.
            if (!empty($header_ids)) {
                remove_action('adeline_header', 'adeline_header_template');
                add_action('adeline_header', 'FLThemeBuilderLayoutRenderer::render_header');
            }
            // Get the footer ID.
            $footer_ids = FLThemeBuilderLayoutData::get_current_page_footer_ids();
            // If we have a footer, remove the theme footer and hook in Theme Builder's.
            if (!empty($footer_ids)) {
                remove_action('adeline_footer', 'adeline_footer_template');
                add_action('adeline_footer', 'FLThemeBuilderLayoutRenderer::render_footer');
            }
        }
        /**
         * Remove page header if page's content layouts with Beaver template
         *
         * @since 1.0
         */
        public function page_content_render()
    {
            // Get the page ID.
            $page_ids = FLThemeBuilderLayoutData::get_current_page_content_ids();
            // If we have a content layout, remove the theme page header.
            if (!empty($page_ids)) {
                remove_action('adeline_subheader', 'adeline_subheader_template');
            }
        }
        /**
         * Register hooks
         *
         * @since 1.0
         */
        public function register_part_hooks()
    {
            return array(array('label' => esc_html__('Page', 'adeline'), 'hooks' => array('adeline_before_outer_wrap' => esc_html__('Before Page', 'adeline'), 'adeline_after_outer_wrap' => esc_html__('After Page', 'adeline'))), array('label' => esc_html__('Top Bar', 'adeline'), 'hooks' => array('adeline_before_top_bar' => esc_html__('Before Top Bar', 'adeline'), 'adeline_before_top_bar_inner' => esc_html__('Before Top Bar Inner', 'adeline'), 'adeline_after_top_bar_inner' => esc_html__('After Top Bar Inner', 'adeline'), 'adeline_after_header' => esc_html__('After Top Bar', 'adeline'))), array('label' => esc_html__('Header', 'adeline'), 'hooks' => array('adeline_before_header' => esc_html__('Before Header', 'adeline'), 'adeline_before_header_inner' => esc_html__('Before Header Inner', 'adeline'), 'adeline_after_header_inner' => esc_html__('After Header Inner', 'adeline'), 'adeline_after_header' => esc_html__('After Header', 'adeline'))), array('label' => esc_html__('Page Header', 'adeline'), 'hooks' => array('adeline_before_subheader' => esc_html__('Before Page Header', 'adeline'), 'adeline_before_subheader_inner' => esc_html__('Before Page Header Inner', 'adeline'), 'adeline_after_subheader_inner' => esc_html__('After Page Header Inner', 'adeline'), 'adeline_after_subheader' => esc_html__('After Page Header', 'adeline'))), array('label' => esc_html__('Content', 'adeline'), 'hooks' => array('adeline_before_content' => esc_html__('Before Content', 'adeline'), 'adeline_before_content_inner' => esc_html__('Before Content Inner', 'adeline'), 'adeline_after_content_inner' => esc_html__('After Content Inner', 'adeline'), 'adeline_after_content' => esc_html__('After Content', 'adeline'))), array('label' => esc_html__('Sidebar', 'adeline'), 'hooks' => array('adeline_before_sidebar' => esc_html__('Before Sidebar', 'adeline'), 'adeline_before_sidebar_inner' => esc_html__('Before Sidebar Inner', 'adeline'), 'adeline_after_sidebar_inner' => esc_html__('After Sidebar Inner', 'adeline'), 'adeline_after_sidebar' => esc_html__('After Sidebar', 'adeline'))), array('label' => esc_html__('Footer', 'adeline'), 'hooks' => array('adeline_before_footer' => esc_html__('Before Footer', 'adeline'), 'adeline_before_footer_inner' => esc_html__('Before Footer Inner', 'adeline'), 'adeline_after_footer_inner' => esc_html__('After Footer Inner', 'adeline'), 'adeline_after_footer' => esc_html__('After Footer', 'adeline'))));
        }
    }
endif;
return new Adeline_Beaver();
