<?php

$args = array(
		'class'=>'',
		'data_title'=>'',
		'data_title_icon'=>'check',
		
);

extract(shortcode_atts($args, $atts));
		$data_icon ='';
		if($data_title_icon == "x"){
		$data_icon .='x opacity-05';
		}
		else {
		$data_icon .='check red';
		}
		
$html = '';

	$html .= '<li class="list__item um-li-hight '.$data_icon.'">'.$data_title.'</li>';		

echo $html;