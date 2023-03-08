<?php

define( 'HOLMES_CORE_VERSION', '1.2' );
define( 'HOLMES_CORE_ABS_PATH', dirname( __FILE__ ) );
define( 'HOLMES_CORE_REL_PATH', dirname( plugin_basename( __FILE__ ) ) );
define( 'HOLMES_CORE_URL_PATH', plugin_dir_url( __FILE__ ) );
define( 'HOLMES_CORE_ASSETS_PATH', HOLMES_CORE_ABS_PATH . '/assets' );
define( 'HOLMES_CORE_ASSETS_URL_PATH', HOLMES_CORE_URL_PATH . 'assets' );
define( 'HOLMES_CORE_CPT_PATH', HOLMES_CORE_ABS_PATH . '/post-types' );
define( 'HOLMES_CORE_CPT_URL_PATH', HOLMES_CORE_URL_PATH . 'post-types' );
define( 'HOLMES_CORE_SHORTCODES_PATH', HOLMES_CORE_ABS_PATH . '/shortcodes' );
define( 'HOLMES_CORE_SHORTCODES_URL_PATH', HOLMES_CORE_URL_PATH . 'shortcodes' );
define( 'HOLMES_CORE_OPTIONS_NAME', 'mkdf_options_holmes' );