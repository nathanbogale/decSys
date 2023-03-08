<?php
/**
 * Initial functions.
 *
 * @package Adeline WordPress theme
 */
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Class to manipulate menus.
 *
 * @since 1.0
 */
class Adeline_Nav_Walker {
    /**
     * Constructor.
     *
     * @access public
     */
    public function __construct() {
        // Add custom fields to menu
        add_filter('wp_setup_nav_menu_item', array($this, 'adeline_add_custom_fields_meta'));
        add_action('wp_nav_menu_item_custom_fields', array($this, 'adeline_add_custom_fields'), 10, 4);
        // Save menu custom fields
        add_action('wp_update_nav_menu_item', array($this, 'adeline_update_custom_nav_fields'), 10, 3);
        // Edit menu walker
        add_filter('wp_edit_nav_menu_walker', array($this, 'adeline_edit_walker'), 10, 2);
    }
    /**
     * Add custom menu style fields data to the menu.
     *
     * @access public
     * @param object $menu_item A single menu item.
     * @return object The menu item.
     */
    public function adeline_add_custom_fields_meta($menu_item) {
        $menu_item->template = get_post_meta($menu_item->ID, '_menu_item_template', true);
        $menu_item->mega_template = get_post_meta($menu_item->ID, '_menu_item_mega_template', true);
        $menu_item->nolink = get_post_meta($menu_item->ID, '_menu_item_nolink', true);
        $menu_item->category_post = get_post_meta($menu_item->ID, '_menu_item_category_post', true);
        $menu_item->megamenu = get_post_meta($menu_item->ID, '_menu_item_megamenu', true);
        $menu_item->megamenu_auto_width = get_post_meta($menu_item->ID, '_menu_item_megamenu_auto_width', true);
        $menu_item->megamenu_col = get_post_meta($menu_item->ID, '_menu_item_megamenu_col', true);
        $menu_item->megamenu_heading = get_post_meta($menu_item->ID, '_menu_item_megamenu_heading', true);
        $menu_item->megamenu_widgetarea = get_post_meta($menu_item->ID, '_menu_item_megamenu_widgetarea', true);
        $menu_item->icon = get_post_meta($menu_item->ID, '_menu_item_icon', true);
        $menu_item->badge_text = get_post_meta($menu_item->ID, '_menu_item_badge_text', true);
        $menu_item->badge_color = get_post_meta($menu_item->ID, '_menu_item_badge_color', true);
        return $menu_item;
    }
    /**
     * Add custom megamenu fields data to the menu.
     *
     * @access public
     * @param object $menu_item A single menu item.
     * @return object The menu item.
     */
    public function adeline_add_custom_fields($id, $item, $depth, $args) { ?>

<p class="field-mega_template description description-wide">
  <label for="edit-menu-item-mega_template-<?php echo esc_attr($item->ID); ?>">
    <?php esc_html_e('Template', 'adeline'); ?>
    | <small>
    <?php esc_html_e('Menu > Particles', 'adeline'); ?>
    </small>
    <select id="edit-menu-item-mega_template-<?php echo esc_attr($item->ID); ?>" class="widefat code edit-menu-item-custom" name="menu-item-mega_template[<?php echo esc_attr($item->ID); ?>]">
      <option value="0">
      <?php esc_html_e('Select A Template', 'adeline'); ?>
      </option>
      <?php $templates_list = get_posts(array('post_type' => 'dpr_particle', 'numberposts' => - 1, 'post_status' => 'publish'));
        if (!empty($templates_list)) {
            foreach ($templates_list as $template) {
                $templates[$template->ID] = $template->post_title; ?>
      <option value="<?php echo esc_attr($template->ID); ?>" <?php selected($item->mega_template, $template->ID); ?>><?php echo esc_html($template->post_title); ?> </option>
      <?php
            }
        }
?>
    </select>
  </label>
</p>
<p class="field-nolink description description-wide">
  <label for="edit-menu-item-nolink-<?php echo esc_attr($item->ID); ?>">
    <input type="checkbox" id="edit-menu-item-nolink-<?php echo esc_attr($item->ID); ?>" class="code edit-menu-item-nolink" value="nolink" name="menu-item-nolink[<?php echo esc_attr($item->ID); ?>]"<?php checked($item->nolink, 'nolink'); ?> />
    <?php esc_html_e('Disable link', 'adeline'); ?>
  </label>
</p>
<?php if ($item->object == 'category') { ?>
<p class="field-category_post description description-wide">
  <label for="edit-menu-item-category_post-<?php echo esc_attr($item->ID); ?>">
    <input type="checkbox" id="edit-menu-item-category_post-<?php echo esc_attr($item->ID); ?>" class="code edit-menu-item-category_post" value="category_post" name="menu-item-category_post[<?php echo esc_attr($item->ID); ?>]"<?php checked($item->category_post, 'category_post'); ?> />
    <?php esc_html_e('Display Latest Posts', 'adeline'); ?>
  </label>
</p>
<?php
        } ?>
<p class="field-megamenu description description-wide">
  <label for="edit-menu-item-megamenu-<?php echo esc_attr($item->ID); ?>">
    <input type="checkbox" id="edit-menu-item-megamenu-<?php echo esc_attr($item->ID); ?>" class="code edit-menu-item-megamenu" value="megamenu" name="menu-item-megamenu[<?php echo esc_attr($item->ID); ?>]"<?php checked($item->megamenu, 'megamenu'); ?> />
    <?php esc_html_e('Enable megamenu', 'adeline'); ?>
  </label>
</p>
<p class="field-megamenu-auto-width description description-wide">
  <label for="edit-menu-item-megamenu_auto_width-<?php echo esc_attr($item->ID); ?>">
    <input type="checkbox" id="edit-menu-item-megamenu_auto_width-<?php echo esc_attr($item->ID); ?>" class="code edit-menu-item-megamenu_auto_width" value="megamenu_auto_width" name="menu-item-megamenu_auto_width[<?php echo esc_attr($item->ID); ?>]"<?php checked($item->megamenu_auto_width, 'megamenu_auto_width'); ?> />
    <?php esc_html_e('Megamenu auto width?', 'adeline'); ?>
  </label>
</p>
<p class="field-megamenu-columns description description-wide">
  <label for="edit-menu-item-megamenu_col-<?php echo esc_attr($item->ID); ?>">
    <?php esc_html_e('Megamenu columns (from 1 to 6)', 'adeline'); ?>
    <br />
    <input type="number" id="edit-menu-item-megamenu_col-<?php echo esc_attr($item->ID); ?>" class="widefat code edit-menu-item-custom" name="menu-item-megamenu_col[<?php echo esc_attr($item->ID); ?>]" min="1" max="6" value="<?php echo esc_attr($item->megamenu_col); ?>" />
  </label>
</p>
<p class="field-megamenu-heading description description-wide">
  <label for="edit-menu-item-megamenu_heading-<?php echo esc_attr($item->ID); ?>">
    <input type="checkbox" id="edit-menu-item-megamenu_heading-<?php echo esc_attr($item->ID); ?>" value="megamenu_heading" name="menu-item-megamenu_heading[<?php echo esc_attr($item->ID); ?>]"<?php checked($item->megamenu_heading, 'megamenu_heading'); ?> />
    <?php esc_html_e('Hide Mega menu heading?', 'adeline'); ?>
  </label>
</p>
<p class="field-megamenu-widgetarea description description-wide">
  <label for="edit-menu-item-megamenu_widgetarea-<?php echo esc_attr($item->ID); ?>">
    <?php esc_html_e('Mega Menu Widget Area', 'adeline'); ?>
    <select id="edit-menu-item-megamenu_widgetarea-<?php echo esc_attr($item->ID); ?>" class="widefat code edit-menu-item-custom" name="menu-item-megamenu_widgetarea[<?php echo esc_attr($item->ID); ?>]">
      <option value="0">
      <?php esc_html_e('Select Widget Area', 'adeline'); ?>
      </option>
      <?php global $wp_registered_sidebars;
        if (!empty($wp_registered_sidebars) && is_array($wp_registered_sidebars)):
            foreach ($wp_registered_sidebars as $sidebar): ?>
      <option value="<?php echo esc_attr($sidebar['id']); ?>" <?php selected($item->megamenu_widgetarea, $sidebar['id']); ?>><?php echo esc_html($sidebar['name']); ?> </option>
      <?php
            endforeach;
        endif; ?>
    </select>
  </label>
</p>
<?php if (ADELINE_EXT_ACTIVE) { ?>
<p class="field-megamenu-icon description description-wide">
  <label for="edit-menu-item-icon-<?php echo esc_attr($item->ID); ?>">
    <?php esc_html_e('Icon', 'adeline'); ?>
  </label>
  <br/>
  <span class="dpr-icon-preview" id="preview-<?php echo esc_attr($item->ID); ?>"><i class="<?php echo esc_attr($item->icon); ?>"></i></span>
  <input type="text" class="edit-menu-item-custom" id="edit-menu-item-icon-<?php echo esc_attr($item->ID); ?>"

                   name="menu-item-icon[<?php echo esc_attr($item->ID); ?>]"

                   value="<?php echo esc_attr($item->icon); ?>"/>
  <a href="<?php echo esc_url(plugins_url()); ?>/dpr-adeline-extensions/inc/font_icon_manager/icons.php?widgetid=&currenticon=<?php echo esc_attr($item->icon); ?>&parentid=edit-menu-item-icon-<?php echo esc_attr($item->ID); ?>&parentpreviewid=preview-<?php echo esc_attr($item->ID); ?>&TB_iframe=true&width=800&height=580" title = 'Select Icon' class="thickbox button">Select icon</a> <span class="remove-icon button" data-preview="preview-<?php echo esc_attr($item->ID); ?>" data-field="edit-menu-item-icon-<?php echo esc_attr($item->ID); ?>">Remove icon</span> </p>
<?php } ?>
<p class="field-megamenu-badge-text description description-thin">
  <label for="edit-menu-item-badge_text-<?php echo esc_attr($item->ID); ?>">
    <?php esc_html_e('Badge Text', 'adeline'); ?>
    <br />
    <input type="text" id="edit-menu-item-badge_text-<?php echo esc_attr($item->ID); ?>" class="widefat code edit-menu-item-custom" name="menu-item-badge_text[<?php echo esc_attr($item->ID); ?>]" value="<?php echo esc_attr($item->badge_text); ?>" />
  </label>
</p>
<p class="field-megamenu-badge-color description description-thin">
  <label for="edit-menu-item-badge_color-<?php echo esc_attr($item->ID); ?>">
    <?php esc_html_e('Badge Background Color', 'adeline'); ?></label>
    <input type="text" id="edit-menu-item-badge_color-<?php echo esc_attr($item->ID); ?>" class="edit-menu-item-custom badge-color-picker" name="menu-item-badge_color[<?php echo esc_attr($item->ID); ?>]" value="<?php echo esc_attr($item->badge_color); ?>" />
  
</p>
<?php
  }
    /**
     * Add the custom menu style fields menu item data to fields in database.
     *
     * @access public
     * @param string|int $menu_id         The menu ID.
     * @param string|int $menu_item_db_id The menu ID from the db.
     * @param array      $args            The arguments array.
     * @return void
     */
    public function adeline_update_custom_nav_fields($menu_id, $menu_item_db_id, $args) {
        $check = array('template', 'mega_template', 'nolink', 'category_post', 'megamenu', 'megamenu_auto_width', 'megamenu_col', 'megamenu_heading', 'megamenu_widgetarea', 'icon', 'badge_text', 'badge_color');
        foreach ($check as $key) {
            if (!isset($_POST['menu-item-' . $key][$menu_item_db_id])) {
                $_POST['menu-item-' . $key][$menu_item_db_id] = '';
            }
            $value = sanitize_text_field(wp_unslash($_POST['menu-item-' . $key][$menu_item_db_id]));
            update_post_meta($menu_item_db_id, '_menu_item_' . $key, $value);
        }
    }
    /**
     * Function to replace normal edit nav walker.
     *
     * @return string Class name of new navwalker
     */
    public function adeline_edit_walker() {
        require_once ADELINE_FRAMEWORK_DIR . 'walker/class-walker-edit-custom.php';
        return 'Adeline_Walker_Nav_Menu_Edit_Custom';
    }
}
new Adeline_Nav_Walker();
