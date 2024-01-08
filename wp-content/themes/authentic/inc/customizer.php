<?php
/**
 * Customizer Functions
 *
 * @package Authentic
 */

/**
 * Remove AMP link.
 */
function csco_admin_remove_amp_link() {
	remove_action( 'admin_menu', 'amp_add_customizer_link' );
}
add_action( 'after_setup_theme', 'csco_admin_remove_amp_link', 20 );

/**
 * Remove AMP panel.
 *
 * @param object $wp_customize Instance of the WP_Customize_Manager class.
 */
function csco_customizer_remove_amp_panel( $wp_customize ) {
	$wp_customize->remove_panel( 'amp_panel' );
}
add_action( 'customize_register', 'csco_customizer_remove_amp_panel', 1000 );

/**
 * Register Theme Mods
 */
function csco_register_theme_mods() {
	/**
	 * Color Palettes.
	 */
	require get_template_directory() . '/inc/theme-mods/color-palettes.php';

	/**
	 * Colors.
	 */
	require get_template_directory() . '/inc/theme-mods/colors.php';

	/**
	 * Typography.
	 */
	require get_template_directory() . '/inc/theme-mods/typography.php';

	/**
	 * Layout.
	 */
	require get_template_directory() . '/inc/theme-mods/layout.php';

	/**
	 * Homepage.
	 */
	require get_template_directory() . '/inc/theme-mods/homepage.php';

	/**
	 * Posts.
	 */
	require get_template_directory() . '/inc/theme-mods/posts.php';

	/**
	 * Pages.
	 */
	require get_template_directory() . '/inc/theme-mods/pages.php';

	/**
	 * Advanced.
	 */
	require get_template_directory() . '/inc/theme-mods/advanced.php';
}
add_action( 'after_setup_theme', 'csco_register_theme_mods', 20 );
