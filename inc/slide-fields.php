<?php

function bs_add_meta_box_slide() {

  $meta_box = array(
    'id'        => 'bs_slide_meta',
    'title'     => __( 'Slide Meta', 'brightslider' ),
    'post_type' => 'bs_slide',
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
      '_bs_slide_text' => array(
        'name' => __( 'Slide Text', 'brightslider' ),
        'type' => 'textarea'
      ),
      '_bs_slide_url' => array(
        'name' => __( 'Slide URL', 'brightslider' ),
        'type' => 'text'
      )
    )
  );

  new CT_Meta_Box( $meta_box );

}

add_action( 'admin_init', 'bs_add_meta_box_slide' );