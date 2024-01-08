<?php
/**
 * Enable legacy features.
 *
 * @package Authentic
 */

if ( get_option( 'csco_enable_legacy_features', false ) ) {
	/**
	 * Assets.
	 */
	require get_template_directory() . '/inc/legacy-features/assets.php';

	/**
	 * Helpers.
	 */
	require get_template_directory() . '/inc/legacy-features/helpers.php';

	/**
	 * Filters.
	 */
	require get_template_directory() . '/inc/legacy-features/filters.php';

	/**
	 * Theme Mods.
	 */
	require get_template_directory() . '/inc/legacy-features/theme-mods.php';

	/**
	 * Custom Content.
	 */
	require get_template_directory() . '/inc/legacy-features/custom-content.php';
}
