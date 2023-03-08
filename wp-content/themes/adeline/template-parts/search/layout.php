<?php

/**

 * Search result page item layout

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="search-entry-inner clr">
    <?php

		// Featured Image

		get_template_part('template-parts/search/thumbnail');
		?>
    <div class="search-entry-content clr">
      <?php

			// Title

			get_template_part('template-parts/search/header');

			// Content

			get_template_part('template-parts/search/content');

			// Read more button

			get_template_part('template-parts/search/readmore');
			?>
    </div>
    <!-- .search-entry-content --> 
    
  </div>
  <!-- .search-entry-inner --> 
  
</article>
<!-- #post-## -->