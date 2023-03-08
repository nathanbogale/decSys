<?php

$args = array(
		'iconname'=>'',
		'title'=>'',
		'image'=>'',
		'companyname'=>'',
		'clientname'=>'',
		'designation'=>'',
		
		
);

extract(shortcode_atts($args, $atts));
		if(is_numeric($image)) {
            $umaya_image = wp_get_attachment_url( $image );
            $umaya_title = get_the_title( $image );
        }else {
            $umaya_image = $image;
            $umaya_title = $image;
        }
$html = '';


  
    $html .= '<div class="swiper-slide">
									<div class="margin-left-right-10">
										<h3 class="headline-xxxs">'.$title.'</h3>
										<div class="body-text-s margin-top-20">'.$content.'</div>
									</div>
								</div>';
	
    


echo $html;