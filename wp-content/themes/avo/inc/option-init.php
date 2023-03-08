<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * To remove development demo mode
*/
function avo_remove_demo_mode() {

	if ( class_exists('ReduxFrameworkPlugin') ) {
		remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
	}
}
add_action('init', 'avo_remove_demo_mode');


if (!class_exists('Avo_Framework_Config')) {

	class Avo_Framework_Config {

		public $args        = array();
		public $sections    = array();
		public $theme;
		public $ReduxFramework;

		public function __construct() {

			if (!class_exists('ReduxFramework')) {
				return;
			}

			// This is needed. Bah WordPress bugs.  ;)
			if (  true == Redux_Helpers::isTheme(__FILE__) ) {
				$this->avo_init_settings();
			} else {
				add_action('plugins_loaded', array($this, 'avo_init_settings'), 10);
			}
		}

		public function avo_init_settings() {

			// Just for demo purposes. Not needed per say. 
			$this->theme = wp_get_theme();

			// Set the default arguments
			$this->avo_set_arguments();

			// Set a few help tabs so you can see how it's done
			// Create the sections and fields
			$this->avo_set_sections();

			if (!isset($this->args['opt_name'])) { // No errors please
				return;
			}

			$this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
		}

		/**
		 *This is a test function that will let you see when the compiler hook occurs.
		 *It only runs if a field   set with compiler=>true is changed.
		 * */
		function avo_compiler_action($options, $css, $changed_values) {
			echo '<h1>The compiler hook has run!</h1>';
			echo "<pre>";
			print_r($changed_values); // Values that have changed since the last save
			echo "</pre>";
		}

		/**
		 *Custom function for filtering the sections array. Good for child themes to override or add to the sections.
		 *Simply include this function in the child themes functions.php file.
		 *NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
		 *so you must use get_template_directory_uri() if you want to use any of the built in icons
		 * */
		function avo_dynamic_section($sections) {
			$sections[] = array(
				'title' => esc_html__('Section via hook', 'avo'),
				'desc' => sprintf(__('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'avo')),
				'icon' => 'el-icon-paper-clip',
				// Leave this as a blank section, no options just some intro text set above.
				'fields' => array()
			);

			return $sections;
		}

		/**
		 *Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
		 * */
		function avo_change_arguments($args) {
			return $args;
		}

		/**
		 *Filter hook for filtering the default value of any given field. Very useful in development mode.
		 * */
		function avo_change_defaults($defaults) {
			$defaults['str_replace'] = 'Testing filter hook!';

			return $defaults;
		}

		// Remove the demo link and the notice of integrated demo from the redux-framework plugin
		function avo_remove_demo() {

			// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
			if (class_exists('ReduxFrameworkPlugin')) {

				// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
				remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
			}
		}

		public function avo_set_sections() {

			/**
			 *Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
			 * */


			ob_start();

			$ct             = wp_get_theme();
			$this->theme    = $ct;
			$item_name      = $this->theme->get('Name');
			$tags           = $this->theme->Tags;
			$screenshot     = $this->theme->get_screenshot();
			$class          = $screenshot ? 'has-screenshot' : '';

			$customize_title = sprintf(esc_attr__('Customize &#8220;%s&#8221;', 'avo'), $this->theme->display('Name'));

			?>
			<div id="current-theme" class="<?php echo esc_attr($class); ?>">
			<?php if ($screenshot) : ?>
				<?php if (current_user_can('edit_theme_options')) : ?>
						<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
							<img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview','avo'); ?>" />
						</a>
				<?php endif; ?>
					<img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview','avo'); ?>" />
				<?php endif; ?>

				<h4><?php echo esc_html ($this->theme->display('Name')); ?></h4>

				<div>
					<ul class="theme-info">
						<li><?php printf(__('By %s', 'avo'), $this->theme->display('Author')); ?></li>
						<li><?php printf(__('Version %s', 'avo'), $this->theme->display('Version')); ?></li>
						<li><?php echo '<strong>' . esc_html__('Tags', 'avo') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
					</ul>
					<p class="theme-description"><?php echo esc_attr ($this->theme->display('Description')); ?></p>
					<?php
					if ($this->theme->parent()) {
						printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.','avo') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'avo'), $this->theme->parent()->display('Name'));
					}
					?>

				</div>
			</div>

			<?php
			$item_info = ob_get_contents();

			ob_end_clean();

			$sampleHTML = '';

			if (file_exists(get_template_directory().'/inc/info-html.html')) {
				Redux_Functions::initWpFilesystem();

				global $wp_filesystem;

				$sampleHTML = $wp_filesystem->get_contents(get_template_directory().'/inc/info-html.html');
			}

			/*
			*  avo Options Tabs
			*/

			 require_once get_template_directory() .'/inc/options/options.php';
			 require_once get_template_directory() .'/inc/options/font-setting.php';

		}

		public function avo_set_help_tabs() {

			// Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
			$this->args['help_tabs'][] = array(
				'id'        => 'redux-help-tab-1',
				'title'     => esc_html__('Theme Information 1', 'avo'),
				'content'   => sprintf(html__('<p>This is the tab content, HTML is allowed.</p>', 'avo'))
			);

			$this->args['help_tabs'][] = array(
				'id'        => 'redux-help-tab-2',
				'title'     => esc_html__('Theme Information 2', 'avo'),
				'content'   => sprintf(html__('<p>This is the tab content, HTML is allowed.</p>', 'avo'))
			);

			// Set the help sidebar
			$this->args['help_sidebar'] = sprintf(esc_html__('<p>This is the sidebar content, HTML is allowed.</p>', 'avo'));
		}

		/**
		 * All the possible arguments for Redux.
		 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
		 * */
		public function avo_set_arguments() {

			$theme = wp_get_theme(); // For use with some settings. Not necessary.

			$this->args = array(
				// TYPICAL -> Change these values as you need/desire
				'opt_name' => 'avo_theme_setting', // This is where your data is stored in the database and also becomes your global variable name.
				'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
				'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
				'menu_type' => 'submenu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
				'allow_sub_menu' => true, // Show the sections below the admin menu item or not
				'menu_title' => esc_html__('Avo Theme Options', 'avo'),
				'page_title' => esc_html__('Avo Theme Options', 'avo'),
				// You will need to generate a Google API key to use this feature.
				// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
				'google_api_key' => 'AIzaSyBnxzHttO52IQDpDkbZNbT48HL3o8YNb-k', // Must be defined to add google fonts to the typography module
				//'async_typography' => true, // Use a asynchronous font on the front end or font string
				//'admin_bar' => false, // Show the panel pages on the admin bar
				'global_variable' => 'avo_theme_settings', // Set a different name for your global variable other than the opt_name
				'dev_mode' => false, // Show the time the page took to load, etc
				'customizer' => true, // Enable basic customizer support
				// OPTIONAL -> Give you extra features
				'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
				'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
				'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
				'menu_icon' => '', // Specify a custom URL to an icon
				'last_tab' => '', // Force your panel to always open to a specific tab (by id)
				'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
				'page_slug' => 'avo_theme_settings', // Page slug used to denote the panel
				'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
				'default_show' => false, // If true, shows the default value next to each field that is not the default value.
				'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
				// CAREFUL -> These options are for advanced use only
				'transient_time' => 60 * MINUTE_IN_SECONDS,
				'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
				'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
				//'domain'              => 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
				//'footer_credit'       => '', // Disable the footer credit of Redux. Please leave if you can help it.
				// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
				'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
				'show_import_export' => true, // REMOVE
				'hide_reset' => false,
				'system_info' => false, // REMOVE
				'help_tabs' => array(),
				'help_sidebar' => '', // __( '', $this->args['domain'] );
				'hints' => array(
					'icon'              => 'icon-question-sign',
					'icon_position'     => 'right',
					'icon_color'        => 'lightgray',
					'icon_size'         => 'normal',

					'tip_style'         => array(
						'color'     => 'light',
						'shadow'    => true,
						'rounded'   => false,
						'style'     => '',
					),
					'tip_position'      => array(
						'my' => 'top left',
						'at' => 'bottom right',
					),
					'tip_effect' => array(
						'show' => array(
							'effect'    => 'slide',
							'duration'  => '500',
							'event'     => 'mouseover',
						),
						'hide' => array(
							'effect'    => 'slide',
							'duration'  => '500',
							'event'     => 'click mouseleave',
						),
					),
				)
			);
			// Panel Intro text -> before the form
			if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
				if (!empty($this->args['global_variable'])) {
					$v = $this->args['global_variable'];
				} else {
					$v = str_replace("-", "_", $this->args['opt_name']);
				}
			}
		}

	}

	global $reduxConfig;
	$reduxConfig = new Avo_Framework_Config();
}

/**
 *Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')):
	function redux_my_custom_field($field, $value) {
		print_r($field);
		echo '<br/>';
		print_r($value);
	}
endif;

/**
 *Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')):
	function redux_validate_callback_function($field, $value, $existing_value) {
		$error = false;
		$value = 'just testing';

		$return['value'] = $value;
		if ($error == true) {
			$return['error'] = $field;
		}
		return $return;
	}
endif;

