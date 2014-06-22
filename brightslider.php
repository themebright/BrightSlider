<?php
/*
Plugin Name: BrightSlider
Description: The slider built to accompany <a href="http://themebright.com/">ThemeBright</a> themes.
Plugin URI: http://themebright.com/plugins/brightslider/
Author: ThemeBright
Author URI: http://themebright.com/
Version: 1.0.0
*/

function brightslider_register_post_types() {

  register_post_type( 'tb_slide', array(
    'label' => 'Slides',
    'labels' => array(
      'name'               => __( 'Slides', 'brightslider' ),
      'singular_name'      => __( 'Slide', 'brightslider' ),
      'menu_name'          => __( 'Slides', 'brightslider' ),
      'name_admin_bar'     => __( 'Slide', 'brightslider' ),
      'add_new'            => __( 'Add New', 'brightslider' ),
      'add_new_item'       => __( 'Add New Slide', 'brightslider' ),
      'new_item'           => __( 'New Slide', 'brightslider' ),
      'edit_item'          => __( 'Edit Slide', 'brightslider' ),
      'view_item'          => __( 'View Slide', 'brightslider' ),
      'all_items'          => __( 'All Slides', 'brightslider' ),
      'search_items'       => __( 'Search Slides', 'brightslider' ),
      'parent_item_colon'  => __( 'Parent Slides:', 'brightslider' ),
      'not_found'          => __( 'No slides found.', 'brightslider' ),
      'not_found_in_trash' => __( 'No slides found in Trash.', 'brightslider' )
    ),
    'public' => false,
    'show_ui' => true,
    'menu_icon' => 'dashicons-slides',
    'supports' => array(
      'title',
      'editor',
      'revisions',
      'thumbnail'
     )
  ) );

}
add_action( 'init', 'brightslider_register_post_types' );