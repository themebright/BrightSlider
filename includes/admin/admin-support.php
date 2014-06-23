<?php
/**
 * Admin Support
 *
 * @link       https://bitbucket.org/themebright/themebright-framework
 * @since      1.0.0
 *
 * @package    BrightSlider
 * @subpackage Admin
 */

if ( ! defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * Show admin notice.
 *
 * Show a message if current theme does not support the plugin.
 * Pulled almost entirely (and gratefully) from the Church Themes Content plugin.
 *
 * @since 0.9
 */
function brightslider_get_theme_support_notice() {

  // theme does not support plugin
  if ( ! current_theme_supports( 'brightslider' ) ) {

    // show only if user has some control over plugins and themes
    if ( ! current_user_can( 'activate_plugins' ) && ! current_user_can( 'switch_themes' ) ) {
      return;
    }

    // show only on relavent pages as not to overwhelm admin
    $screen = get_current_screen();
    if ( ! in_array( $screen->base, array( 'themes', 'plugins' ) ) && ! preg_match( '/^bs_.+/', $screen->post_type ) ) {
      return;
    }

    // option ID
    $theme_data = wp_get_theme();
    $option_id = 'brightslider_hide_theme_support_notice-' . $theme_data['Template']; // unique to theme so if change, message shows again

    // message has not been dismissed for this theme
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
 * Dismiss admin notice.
 *
 * Save data to keep message from showing on this theme.
 *
 * @since 0.9
 */
function brightslider_hide_theme_support_notice() {

  // user requested dismissal
  if ( ! empty( $_GET['brightslider_hide_theme_support_notice'] ) ) {

    // option ID
    $theme_data = wp_get_theme();
    $option_id = 'brightslider_hide_theme_support_notice-' . $theme_data['Template']; // unique to theme so if change, message shows again

    // mark notice for this theme as dismissed
    update_option( $option_id, '1' );

  }

}

add_action( 'admin_init', 'brightslider_hide_theme_support_notice' ); // before admin_notices