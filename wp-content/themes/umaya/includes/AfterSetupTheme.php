<?php

class Umaya_AfterSetupTheme{
	
	
	static function return_thme_option($string,$str=null){
		global $umaya;
		if($str!=null)
		return isset($umaya[''.$string.''][''.$str.'']) ? $umaya[''.$string.''][''.$str.''] : null;
		else
		return isset($umaya[''.$string.'']) ? $umaya[''.$string.''] : null;
	}
	
	
}
?>