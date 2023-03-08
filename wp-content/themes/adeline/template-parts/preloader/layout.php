<?php

/**

 * The template for displaying the scroll top button.

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}
?>

<div id="dpr-loading">
  <div id="dpr-loading-center">
    <div id="dpr-loading-center-absolute"> 
      
      <!-- #custom image START -->
      
      <?php if( true == adeline_get_option_value('preloader_image')) { ?>
      <div class="dpr-loading-image-holder"><img src="<?php echo adeline_get_option_value('preloader_image_source', 'url'); ?>" /></div>
      <?php } ?>
      
      <!-- #custom image END --> 
      
      <!-- #spinner START -->
      
      <?php

				if (true == adeline_get_option_value('preloader_spinner')) {

					$spinner_template = 'double-bounce';

					if (adeline_get_option_value('preloader_spinner_type') != '')
						$spinner_template = adeline_get_option_value('preloader_spinner_type');

					get_template_part('template-parts/preloader/loaders/' . $spinner_template);

				}
 ?>
      
      <!-- #spinner END --> 
      
      <!-- #preloader text START -->
      
      <?php

				if( true == adeline_get_option_value('preloader_text','',false)) { ?>
      <p class="dpr-loading-text-holder"><?php echo esc_html(adeline_get_option_value('preloader_text_content')) ?></p>
      <?php } ?>
      
      <!-- #preloader text END --> 
      
    </div>
  </div>
</div>
