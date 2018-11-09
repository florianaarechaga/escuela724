<?php
/**
 * Education Booster back compat functionality
 *
 * Prevents Education Booster from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @since Education Booster 1.0.0
 */

/**
 * Prevent switching to Education Booster on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Education Booster 1.0.0
 */
function educationbooster_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'educationbooster_upgrade_notice' );
}
add_action( 'after_switch_theme', 'educationbooster_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Education Booster on WordPress versions prior to 4.7.
 *
 * @since Education Booster 1.0.0
 * @global string $wp_version WordPress version.
 */
function educationbooster_upgrade_notice() {
	$message = sprintf( esc_html__( 'Education Booster requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'education-booster' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Education Booster 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function educationbooster_customize() {
	wp_die( sprintf( esc_html__( 'Education Booster requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'education-booster' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'educationbooster_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Education Booster 1.0.0
 * @global string $wp_version WordPress version.
 */
function educationbooster_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'Education Booster requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'education-booster' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'educationbooster_preview' );
