<?php
/**
 * Slide Fields
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Adds slide settings meta box.
 */
function brightslider_add_meta_box_slide_settings() {

  $args = array(
    'id'        => 'bs_slide_settings',
    'title'     => __( 'Slide Settings', 'brightslider' ),
    'post_type' => 'bs_slide',
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
      '_bs_slide_text' => array(
        'name' => __( 'Slide text', 'brightslider' ),
        'type' => 'textarea'
      ),
      '_bs_slide_url'  => array(
        'name' => __( 'Slide URL', 'brightslider' ),
        'type' => 'url'
      )
    )
  );

  new CT_Meta_Box( apply_filters( 'brightslider_add_meta_box_slide_settings', $args ) );

}
add_action( 'admin_init', 'brightslider_add_meta_box_slide_settings' );
