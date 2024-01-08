<?php
/**
 * Deprecated features and migration functions
 *
 * @package Authentic
 */

/**
 * Check Theme Version
 */
function csco_check_theme_version() {

	// Get Theme info.
	$theme_name = get_template();
	$theme      = wp_get_theme( $theme_name );
	$theme_ver  = $theme->get( 'Version' );

	// Get Theme option.
	$current = get_option( 'csco_theme_version_' . $theme_name );

	// If versions don't match.
	if ( ! empty( $theme_ver ) && ! empty( $current ) && $current !== $theme_ver ) {

		/**
		 * If different versions call a special hook.
		 *
		 * @param string $current   Old theme version.
		 * @param string $theme_ver New theme version.
		 */
		do_action( 'csco_theme_deprecated', $current, $theme_ver );

		update_option( 'csco_theme_version_' . $theme_name, $theme_ver );

	} elseif ( ! empty( $theme_ver ) && $current !== $theme_ver ) {

		update_option( 'csco_theme_version_' . $theme_name, $theme_ver );
	}
}
add_action( 'init', 'csco_check_theme_version', 30 );

/**
 * Migration 6.0.0
 *
 * @param string $current Current version.
 * @param string $new     New version.
 */
add_action( 'csco_theme_deprecated', function ( $current, $new ) {
	/* Migration to 6.0.0 */
	if ( version_compare( $current, '6.0.0', '<' ) ) {
		/** Enable Legacy Features */
		update_option( 'csco_enable_legacy_features', true );

		/** Migration share buttons */
		$locations = apply_filters( 'powerkit_share_buttons_locations', array() );

		if ( $locations ) {
			foreach ( $locations as $key => $item ) {
				$location = $item['location'];

				$scheme = get_option( "powerkit_share_buttons_{$location}_scheme" );

				if ( 'monochrome' === $scheme ) {
					update_option( "powerkit_share_buttons_{$location}_scheme", 'simple-dark-back' );
				}
			}
		}
	}
}, 10, 2 );
