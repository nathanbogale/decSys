<?php
if (!defined('ABSPATH')) {
    die('Direct access forbidden.');
}

class Tw_Assistance_Helpers{
    /* * ---------------------------------------------------------------
    * Formate Product Title
    * -------------------------------------------------------------* */

    public static function kta_formate_product_title($main_title){
        $titles = explode(' ', wp_kses($main_title, array()));
        $title = '';
        if(count($titles) > 1):
            $i = 1;
            foreach($titles as $t):
                if($i == 2):
                    $title .= '<span>'.$t.' ';
                elseif($i == count($titles)):
                    $title .= $t.' </span>';
                else:
                    $title .= $t.' ';
                endif;
                $i++;
            endforeach;
        else:
            $title = get_the_title();
        endif;

        return $title;
    }


    public static function keta_generate_gf_urls($fonts = ''){
        if($fonts == ''){
            return;
        }
        return '@import url(http://fonts.googleapis.com/css?family='.$fonts.':400,100,100italic,300,300italic,400italic,700,700italic,900,900italic); '."\n";
    }
}