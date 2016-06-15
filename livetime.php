<?php
/**
 * Plugin Name: Livetime
 * Plugin URI: http://sizzurp.pw
 * Description: This plugin is used to display certain information in a specific way
 * Version: 1.0.0
 * Author: Tim Nylén
 * Author URI: http://sizzurp.pw
 */

function livetime_admin(){
  include('livetime_admin.php');
}

function livetime_admin_actions(){
  add_options_page("Livetime information display", "Livetime information display", 1, "Livetime information display", "livetime_admin");
}
add_action('admin_menu', 'livetime_admin_actions');


function displayinfo( $atts ){
  extract(shortcode_atts(array(
     'id' => '0, 1, 2',
     'align' => 'horizontal',
  ), $atts));


    $buildhtml = ' ';

    $buildhtml .= '<div class="Information">';
    if (strpos($id, '0') !== false){
      $firstinfo = get_option('firstinfo');
      $buildhtml .= '<div class="'. $align . '">'. $firstinfo .'</div>';
    }
    if (strpos($id, '1') !== false){
      $secondinfo = get_option('secondinfo');
      $buildhtml .= '<div class="'. $align . '">'. $secondinfo .'</div>';
    }
    if (strpos($id, '2') !== false){
      $thirdinfo = get_option('thirdinfo');
      $buildhtml .= '<div class="'. $align . '">'. $thirdinfo .'</div>';
    }
    $buildhtml .= '</div>';

    if ($align == 'scroll'){
      $buildhtml .= '<script src="'. site_url() .'/wp-content/plugins/livetime/slideshow.js"></script>';
      $buildhtml .= '<a class="slideshowbtn" id="slidebtn1" onclick="plusDivs(-1)">❮</a>';
      $buildhtml .= '<a class="slideshowbtn" id="slidebtn2" onclick="plusDivs(1)">❯</a>';
    }
    return nl2br($buildhtml);

}
add_shortcode('textinfoplugin', 'displayinfo');
