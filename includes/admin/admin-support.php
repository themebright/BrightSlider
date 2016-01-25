<?php
/**
 * Admin Support
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Show a message if current theme does not support the plugin.
 */
function brightslider_theme_support_notice() {

  if ( current_theme_supports( 'brightslider' ) || ! current_user_can( 'activate_plugins' ) ) {
    return false;
  }

  ?>

  <div class="notice error">
    <p><?php printf( __( 'The <b>%s</b> theme does not support the <b>BrightSlider</b> plugin.', 'brightslider' ), wp_get_theme() ); ?></p>
  </div>

  <?php

}
add_action( 'admin_notices', 'brightslider_theme_support_notice' );
