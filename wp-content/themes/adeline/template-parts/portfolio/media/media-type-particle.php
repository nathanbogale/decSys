<?php

/**

 * Single portfolio item particle in media block

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}

// Get particle

$particle_id = adeline_get_option_value('single_portfolio_media_particle');

// Display particle if exists

if ($particle_id != '') :

	echo adeline_particle_content($particle_id);

endif;
?>