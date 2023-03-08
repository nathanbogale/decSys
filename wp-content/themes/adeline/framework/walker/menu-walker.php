<?php
/**
 * Custom wp_nav_menu walker.
 *
 * @package Adeline WordPress theme
 */
if (!class_exists('Adeline_Custom_Nav_Walker')) {
    class Adeline_Custom_Nav_Walker extends Walker_Nav_Menu {
        /**
         * Middle logo menu breaking point
         *
         * @access  private
         * @var init
         */
        private $break_point = null;
        /**
         * Middle logo menu number of top level items displayed
         *
         * @access  private
         * @var init
         */
        private $displayed = 0;
        /**
         * Starts the list before the elements are added.
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         */
        public function start_lvl(&$output, $depth = 0, $args = array()) {
            $indent = str_repeat("\t", $depth);
            // Megamenu columns
            $col = !empty($this->megamenu_col) ? ('col-' . $this->megamenu_col . '') : 'col-2';
            if ($depth === 0 && $this->megamenu != '' && 'full_screen' != adeline_header_style() && 'vertical' != adeline_header_style()) {
                $output.= "\n$indent<ul class=\"megamenu " . $col . " sub-menu\">\n";
            } else {
                $output.= "\n$indent<ul class=\"sub-menu level-" . $depth . "\">\n";
            }
        }
        /**
         * Modified the menu output.
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item   Menu item data object.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         * @param int    $id     Current item ID.
         */
        public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
            global $wp_query;
            $indent = ($depth) ? str_repeat("\t", $depth) : '';
            // Set some vars
            $this->icon = get_post_meta($item->ID, '_menu_item_icon', true);
            $this->badge_text = get_post_meta($item->ID, '_menu_item_badge_text', true);
            $this->badge_color = get_post_meta($item->ID, '_menu_item_badge_color', true);
            if ($depth === 0) {
                $this->megamenu = get_post_meta($item->ID, '_menu_item_megamenu', true);
                $this->megamenu_auto_width = get_post_meta($item->ID, '_menu_item_megamenu_auto_width', true);
                $this->megamenu_col = get_post_meta($item->ID, '_menu_item_megamenu_col', true);
                $this->megamenu_heading = get_post_meta($item->ID, '_menu_item_megamenu_heading', true);
            }
            // Set up empty variable.
            $class_names = '';
            $classes = empty($item->classes) ? array() : (array)$item->classes;
            $classes[] = 'menu-item-' . $item->ID;
            // Mega menu and Hide headings
            if ($depth === 0 && $args->has_children && 'vertical' != adeline_header_style()) {
                if ($this->megamenu != '' && $this->megamenu_auto_width == '') {
                    $classes[] = 'megamenu-li full-mega';
                } else if ($this->megamenu != '' && $this->megamenu_auto_width != '') {
                    $classes[] = 'megamenu-li auto-mega';
                }
                if ($this->megamenu != '' && $this->megamenu_heading != '') {
                    $classes[] = 'hide-headings';
                }
            }
            // Latest post for menu item categories
            if ($item->category_post != '' && $item->object == 'category' && 'vertical' != adeline_header_style()) {
                $classes[] = 'menu-item-has-children megamenu-li full-mega mega-cat';
            }
            // Nav no click
            if ($item->nolink != '') {
                $classes[] = 'nav-no-click';
            }
            /**
             * Filter the CSS class(es) applied to a menu item's <li>.
             *
             * @param array  $classes The CSS classes that are applied to the menu item's <li>.
             * @param object $item    The current menu item.
             * @param array  $args    An array of wp_nav_menu() arguments.
             */
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
            /**
             * Filter the ID applied to a menu item's <li>.
             *
             * @param string $menu_id The ID that is applied to the menu item's <li>.
             * @param object $item    The current menu item.
             * @param array  $args    An array of wp_nav_menu() arguments.
             */
            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';
            // <li> output.
            $output.= $indent . '<li ' . $id . $class_names . '>';
            // link attributes
            $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes.= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes.= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes.= !empty($item->url) ? ' href="' . esc_url($item->url) . '"' : '';
            // Description
            $description = '';
            if ($item->description != '') {
                $description = '<span class="nav-content">' . $item->description . '</span>';
            }
            // Output
            $item_output = $args->before;
            $item_output.= '<a' . $attributes . ' class="menu-link">';
            $item_output.= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            if ($depth !== 0) {
                $item_output.= $description;
            }
            $item_output.= '</a>';
            if (($item->template || $item->mega_template) && $this->megamenu != '' && 'vertical' != adeline_header_style()) {
                ob_start();
                include (ADELINE_FRAMEWORK_DIR . 'walker/template.php');
                $template_content = ob_get_contents();
                ob_end_clean();
                $item_output.= $template_content;
            }
            if ($item->megamenu_widgetarea && $this->megamenu != '' && 'vertical' != adeline_header_style()) {
                ob_start();
                dynamic_sidebar($item->megamenu_widgetarea);
                $sidebar_content = ob_get_contents();
                ob_end_clean();
                $item_output.= $sidebar_content;
            }
            $item_output.= $args->after;
            // Build html
            $output.= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }
        /**
         * Modified the menu end.
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item   Menu item data object.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         */
        public function end_el(&$output, $item, $depth = 0, $args = array()) {
            // Header style
            $header_style = adeline_header_style();
            if ($depth === 0 && $item->category_post != '' && 'full_screen' != $header_style && 'vertical' != $header_style) {
                global $post;
                $output.= "\n<ul class=\"megamenu col-4 sub-menu\">\n";
                // Sub Categories ===============================================================
                if ($item->category_post != '' && $item->object == 'category') {
                    $no_sub_categories = $sub_categories_exists = $sub_categories = '';
                    $query_args = array('child_of' => $item->object_id,);
                    $sub_categories = get_categories($query_args);
                    //Check if the category doesn't contain any sub categories.
                    if (count($sub_categories) == 0) {
                        $sub_categories = array($item->object_id);
                        $no_sub_categories = true;
                    }
                    foreach ($sub_categories as $category) {
                        if (!$no_sub_categories) {
                            $cat_id = $category->term_id;
                        } else {
                            $cat_id = $category;
                        }
                        $original_post = $post;
                        $count = 0;
                        $args = array('posts_per_page' => 4, 'cat' => $cat_id, 'no_found_rows' => true, 'ignore_sticky_posts' => true);
                        $cat_query = new WP_Query($args);
                        // Title
                        $output.= '<h3 class="mega-cat-title">Latest in ' . get_cat_name($cat_id) . '</h3>';
                        while ($cat_query->have_posts()) {
                            // first post
                            $count++;
                            if ($count == 1) {
                                $classes = 'mega-cat-post first';
                            } else {
                                $classes = 'mega-cat-post';
                            }
                            $cat_query->the_post();
                            $output.= '<li class="' . $classes . '">';
                            if (has_post_thumbnail()) {
                                // Image args
                                $img_args = array('alt' => get_the_title(),);
                                if (adeline_get_schema_markup('image')) {
                                    $img_args['itemprop'] = 'image';
                                }
                                $output.= '<a href="' . get_permalink() . '" title="' . get_the_title() . '" class="mega-post-link">';
                                $output.= get_the_post_thumbnail(get_the_ID(), 'medium', $img_args);
                                $output.= '<span class="overlay"></span>';
                                $output.= '</a>';
                                $output.= '<h3 class="mega-post-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3><div class="mega-post-date"><i class="dpr-icon-clock"></i>' . get_the_date() . '</div>';
                            }
                            $output.= '</li>';
                        }
                        wp_reset_postdata();
                    }
                    $output.= '</ul>';
                }
            }
            // </li> output.
            $output.= '</li>';
        }
        /**
         * Ends the list of after the elements are added.
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         */
        public function end_lvl(&$output, $depth = 0, $args = array()) {
            $indent = str_repeat("\t", $depth);
            $output.= "$indent</ul>\n";
        }
        /**
         * Icon if sub menu.
         */
        public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
            // Define vars
            $id_field = $this->db_fields['id'];
            $header_style = adeline_header_style();
            if (is_object($args[0])) $args[0]->has_children = !empty($children_elements[$element->$id_field]);
            // Menu Icons
            if (!empty($element->icon) && $element->icon != 'none') $element->title = '<i class="' . esc_attr($element->icon) . ' icon before"></i>' . $element->title;
            // Down Arrows
            if (!empty($children_elements[$element->$id_field]) && ($depth == 0) || ($element->category_post != '' && $element->object == 'category' && 'full_screen' != $header_style)) {
                $element->classes[] = 'dropdown';
                if (true == adeline_get_option_value('first_level_arrows') || 'full_screen' == $header_style) {
                    $element->title.= ' <span class="nav-arrow dpr-icon-plus-sign"></span>';
                }
            }
            // Right/Left Arrows
            if (!empty($children_elements[$element->$id_field]) && ($depth > 0)) {
                $element->classes[] = 'dropdown';
                if (true == adeline_get_option_value('second_level_arrows', '', true)) {
                    if (is_rtl()) {
                        $element->title.= '<span class="nav-arrow dpr-icon-angle-double-left"></span>';
                    } else {
                        $element->title.= '<span class="nav-arrow dpr-icon-angle-double-right"></span>';
                    }
                }
            }
            // Menu Badge
            if (!empty($element->badge_text)) {
                $style1 = $style2 = '';
                if (!empty($element->badge_color)) {
                    $style1 = 'style="background-color:' . $element->badge_color . '"';
                    $style2 = 'style="color:' . $element->badge_color . ';border-top-color:' . $element->badge_color . '"';
                }
                $element->title.= '<span class="menu-item-badge"><span class="menu-item-badge-text" ' . $style1 . '>' . $element->badge_text . '</span><span class="menu-item-badge-arrow" ' . $style2 . '></span></span>';
            }
            // Define walker
            Walker_Nav_Menu::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
        }
    }
}
