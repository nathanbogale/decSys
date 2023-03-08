<?php

$args = array(
    	'class'=>'',
		'title'=>'',
		'image'=>'',
		'image_hover'=>'',
		'companyname'=>'',
		'membername'=>'',
		'designation'=>'',
);

$html = "";

extract(shortcode_atts($args, $atts));
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
		
		$html .= '<div class="column-50-100 padding-top-20">';
		$html .= '<div class="hover-box hidden-box pos-rel">';
		$html .= '<div class="hover-box js-touch-hover-scroll">';
		$html .= '<!-- img start -->';
		if(is_numeric($image_hover)) {
		$html .= '<img src="'.$umaya_image_hover.'" alt="'.$umaya_title_hover.'" class="img-hover-scale in">';
		}
		else {
		$html .= '<img src="'.$umaya_image.'" alt="'.$umaya_title.'" class="img-hover-scale in">';
		}
		if(is_numeric($image)) {
		$html .= '<img src="'.$umaya_image.'" alt="'.$umaya_title.'" class="img-hover-overlay out">';
		}
		
		$html .= '<!-- img end -->';
		$html .= '	<!-- content start -->
			<div class="pos-abs pos-left-bottom list list_margin-1px">';
			if($membername != ""){
			$html .= '<h4 class="list__item">
					<span class="hidden-box d-inline-block">
					<span class="subhead-xxs text-bg-red padding-right-30 hover-reveal text-color-white ">'.esc_html($membername).'</span>
					</span>
				</h4>';
				}
			if($designation != ""){
			$html .= '<p class="list__item">
				<span class="hidden-box d-inline-block">
				<span class="headline-xxxxs text-bg-black padding-right-30 hover-reveal text-color-white  tr-delay-02">'.esc_html($designation).'</span>
				</span>
				</p>';
			}
		$html .= '	</div><!-- content end -->
		</div>';
		$html .= '<ul class="list list_right pos-abs pos-right-top">';
		$html .= do_shortcode($content);
		$html .= '</ul>';
		$html .= '</div>';
		
		$html .= '</div>';
		
	


echo $html;