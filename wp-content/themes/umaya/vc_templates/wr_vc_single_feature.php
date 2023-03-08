<?php

$args = array(
		'title'=>'',
		'image'=>'',
		'image_hover'=>'',
		'companyname'=>'',
		'clientname'=>'',
		'button_text'=>'View',
		'button_url'=>'#',
		'button_target'=>'',
		
);

extract(shortcode_atts($args, $atts));

$html = '';
$solonick_image = '';
$solonick_alt = '';
	$link_target_opt ='';
		if($button_target == "_blank"){
		$link_target_opt .='_blank';
		}
		else if($button_target == "_parent"){
		$link_target_opt .='_parent';
		}
		else if($button_target == "_top"){
		$link_target_opt .='_top';
		}
		else {
		$link_target_opt .='_self';
		}

		if(is_numeric($image)) {
            $umaya_image = wp_get_attachment_url( $image );
            $umaya_title = get_the_title( $image );
        }else {
            $umaya_image = $image;
            $umaya_title = $image;
        }
		
		if(is_numeric($image_hover)) {
            $umaya_image_hover = wp_get_attachment_url( $image_hover );
            $umaya_title_hover = get_the_title( $image_hover );
        }else {
            $umaya_image_hover = $image_hover;
            $umaya_title_hover = $image_hover;
        }

					if(is_numeric($image)) {

					$html .= '<div class="column-100-100 padding-top-60">
								<div class="column-l-r-margin-10-999 text-center">
									<div class="awards-logo">
										<img class="awards-logo__inner" src="'.$umaya_image.'" alt="'.$umaya_title.'">
									</div>
									<h3 class="headline-xxxs margin-top-30">'.$title.'</h3>
									'.do_shortcode($content).'
								</div>
							</div>';
						}

 
echo $html;