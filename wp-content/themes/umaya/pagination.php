<?php
function umaya_pagination($pages = '', $range = 2)
{ 
 $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='padding-top-90'><div class='list list_row list_center list_margin-20px flex-align-center'>";
          echo "<div class='list__item'>
										<a href='".get_pagenum_link(1)."' class='skew-btn skew-btn_reverse js-pointer-large js-animsition-link'>
											<span class='skew-btn__box'>
												<span class='skew-btn__arrow black'></span>
											</span>
										</a>
									</div>";
         

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo esc_attr(($paged == $i))? "<div class='list__item'>
										<a href='#0' class='blog-pagination active js-pointer-large js-animsition-link' data-text='0".$i."'>
											0".$i."
										</a>
									</div>":"<div class='list__item'>
										<a href='".get_pagenum_link($i)."' class='blog-pagination js-pointer-large js-animsition-link' data-text='0".$i."'>
											0".$i."
										</a>
									</div>";
             }
         }

         
          echo "<div class='list__item'>
										<a href='".get_pagenum_link($pages)."' class='skew-btn js-pointer-large js-animsition-link'>
											<span class='skew-btn__box'>
												<span class='skew-btn__arrow black'></span>
											</span>
										</a>
									</div>";
         echo "</div></div>\n";
     }
}
?>