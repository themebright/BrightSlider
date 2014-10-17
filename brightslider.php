<?php
/*
Plugin Name: BrightSlider
Plugin URI:  http://themebright.com/plugins/brightslider/
Description: The slider built to accompany <a href="http://themebright.com/">ThemeBright</a> themes.
Version:     1.0.0
Author:      ThemeBright
Author URI:  http://themebright.com/
License:     GPL3
Text Domain: brightslider
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Load text domain.
 */
function brightslider_load_plugin_textdomain() {

  $lang_dir = basename( dirname( __FILE__ ) ) . '/languages/';

  load_plugin_textdomain( 'brightslider', FALSE, $lang_dir );

}
add_action( 'plugins_loaded', 'brightslider_load_plugin_textdomain' );

/**
 * Load includes.
 */
require_once 'includes/post-types.php';

if ( is_admin() ) {
  require_once 'includes/admin/admin-support.php';
  require_once 'includes/admin/slide-fields.php';
  require_once 'includes/library/ct-meta-box/ct-meta-box.php';
}