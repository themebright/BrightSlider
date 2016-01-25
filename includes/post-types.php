<?php
/**
 * Post Types
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Register slide post type.
 */
function brightslider_register_post_type_slide() {

  $args = array(
    'labels'    => array(
      'name'               => __( 'Slides',                    'brightslider' ),
      'singular_name'      => __( 'Slide',                     'brightslider' ),
      'menu_name'          => __( 'Slides',                    'brightslider' ),
      'name_admin_bar'     => __( 'Slide',                     'brightslider' ),
      'add_new'            => __( 'Add New',                   'brightslider' ),
      'add_new_item'       => __( 'Add New Slide',             'brightslider' ),
      'new_item'           => __( 'New Slide',                 'brightslider' ),
      'edit_item'          => __( 'Edit Slide',                'brightslider' ),
      'view_item'          => __( 'View Slide',                'brightslider' ),
      'all_items'          => __( 'All Slides',                'brightslider' ),
      'search_items'       => __( 'Search Slides',             'brightslider' ),
      'parent_item_colon'  => __( 'Parent Slides:',            'brightslider' ),
      'not_found'          => __( 'No slides found.',          'brightslider' ),
      'not_found_in_trash' => __( 'No slides found in Trash.', 'brightslider' )
    ),
    'public'    => false,
    'show_ui'   => true,
    'menu_icon' => 'dashicons-slides',
    'supports'  => array(
      'revisions',
      'thumbnail',
      'title'
    )
  );

  register_post_type( 'bs_slide', apply_filters( 'brightslider_register_post_type_slide', $args ) );

}
add_action( 'init', 'brightslider_register_post_type_slide' );
