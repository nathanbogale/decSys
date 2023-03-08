<?php
/**
 * Custom walker nav edit.
 *
 * @package Adeline WordPress theme
 */
/**
 * Create HTML list of nav menu input items.
 *
 * @since     1.0.0
 */
class Adeline_Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu_Edit {
    /**
     * Start the element output.
     *
     * @since  1.0.0
     */
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $item_output = '';
        parent::start_el($item_output, $item, $depth, $args, $id);
        $position = '<fieldset class="field-move';
        $extra = $this->get_fields($item, $depth, $args, $id);
        $output.= str_replace($position, $extra . $position, $item_output);
    }
    /**
     * Add custom hook to add new field.
     *
     * @since  1.0.0
     */
    protected function get_fields($item, $depth, $args = array(), $id = 0) {
        global $wp_version;
        ob_start();
        add_thickbox();
        if (version_compare(preg_replace("/[^0-9\.]/","",$wp_version), '5.4', '<') ) {
        do_action('wp_nav_menu_item_custom_fields', $id, $item, $depth, $args);
        }
        return ob_get_clean();
    }
} // Adeline_Walker_Nav_Menu_Edit_Custom
