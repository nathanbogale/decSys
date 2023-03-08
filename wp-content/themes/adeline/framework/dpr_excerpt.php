<?php
/**
 * DPR Excerpt class.
 *
 * @package Adeline WordPress theme
 */
// Start and run class
if (!class_exists('Adeline_Excerpt')) {
    class Adeline_Excerpt
    {
        // Default length (by WordPress)
        public static $length = 55;
        // Excerpts types
        public static $types = array('short' => 30, 'regular' => 55, 'long' => 100);
        /**
         * Sets the length for the excerpt,
         * then it adds the WP filter
         * And automatically calls the_excerpt();
         */
        public static function length($new_length = 55)
        {
            $this->$length = $new_length;
            add_action('excerpt_length', array('Adeline_Excerpt', 'new_length'));
            $this->output();
        }
        // Tells WP the new length
        public static function new_length()
        {
            if (isset($this->$types[$this->$length])) {
                return $this->$types[$this->$length];
            } else {
                return $this->$length;
            }
        }
        // Echoes out the excerpt
        public static function output()
        {
            the_excerpt();
        }
    }
}
// An alias to the class
if (!function_exists('adeline_excerpt')) {
    function adeline_excerpt($length = 30)
    {
        Adeline_Excerpt::length($length);
    }
}
