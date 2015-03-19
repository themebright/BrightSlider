<?php
/**
 * Admin Support
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Show a message if current theme does not support the plugin.
 * Pulled almost entirely (and gratefully) from the Church Themes Content plugin.
 */
function brightslider_get_theme_support_notice() {

  // Theme does not support plugin
  if ( ! current_theme_supports( 'brightslider' ) ) {

    // Show only if user has some control over plugins and themes
    if ( ! current_user_can( 'activate_plugins' ) && ! current_user_can( 'switch_themes' ) ) {
      return;
    }

    // Show only on relavent pages as not to overwhelm admin
    $screen = get_current_screen();
    if ( ! in_array( $screen->base, array( 'themes', 'plugins' ) ) && ! preg_match( '/^bs_.+/', $screen->post_type ) ) {
      return;
    }

    // Option ID
    $theme_data = wp_get_theme();
    $option_id = 'brightslider_hide_theme_support_notice-' . $theme_data['Template']; // Unique to theme so if changed, message shows again

    // Message has not been dismissed for this theme
    if ( ! get_option( $option_id ) ) {

      ?>

      <div class="error">
         <p><?php printf( __( 'The <b>%1$s</b> theme does not support the <b>BrightSlider</b> plugin. <a href="%2$s">Dismiss</a>', 'brightslider' ), wp_get_theme(), add_query_arg( 'brightslider_hide_theme_support_notice', '1' ) ); ?></p>
      </div>

      <?php

    }

  }

}
add_action( 'admin_notices', 'brightslider_get_theme_support_notice' );

/**
 * Save data to keep message from showing on this theme.
 */
function brightslider_hide_theme_support_notice() {

  // User requested dismissal
  if ( ! empty( $_GET['brightslider_hide_theme_support_notice'] ) ) {

    // Option ID
    $theme_data = wp_get_theme();
    $option_id = 'brightslider_hide_theme_support_notice-' . $theme_data['Template']; // Unique to theme so if changed, message shows again

    // Mark notice for this theme as dismissed
    update_option( $option_id, '1' );

  }

}

add_action( 'admin_init', 'brightslider_hide_theme_support_notice' ); // Before admin_notices
