<?php
/*
Plugin Name: BrightSlider
Plugin URI:  http://themebright.com/go/brightslider/
Description: The ThemeBright slider.
Author:      ThemeBright
Author URI:  http://themebright.com/
Version:     1.1.0
*/

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if ( ! defined( 'BRIGHTSLIDER_VERSION' ) ) {
  define( 'BRIGHTSLIDER_VERSION', '1.1.0' );
}

require_once plugin_dir_path( __FILE__ ) . 'includes/post-types.php';

if ( is_admin() ) {

  if ( ! class_exists( 'CT_Meta_Box' ) ) {
    require_once plugin_dir_path( __FILE__ ) . 'includes/library/ct-meta-box/ct-meta-box.php';
  }

  if ( ! defined( 'CTMB_URL' ) ) {
    define( 'CTMB_URL', plugin_dir_url( __FILE__ ) . 'includes/library/ct-meta-box' );
  }

  require_once plugin_dir_path( __FILE__ ) . 'includes/admin/admin-support.php';
  require_once plugin_dir_path( __FILE__ ) . 'includes/admin/slide-fields.php';

}
