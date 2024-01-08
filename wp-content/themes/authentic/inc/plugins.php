<?php
/**
 * Recommended and Required Theme Plugins functions.
 *
 * @package Authentic
 */

// Include TGM Class.
require_once get_template_directory() . '/inc/classes/class-tgm-plugin-activation.php';

// Include WPBakery Builder Class.
require_once get_template_directory() . '/inc/classes/class-csco-wpbakery-builder.php';

/**
 * Register Required Plugins
 */
function csco_theme_register_required_plugins() {

	$plugins = array(

		array(
			'name'     => 'Powerkit',
			'slug'     => 'powerkit',
			'required' => false,
		),

		array(
			'name'     => 'Canvas',
			'slug'     => 'canvas',
			'required' => false,
		),

		array(
			'name'     => 'Absolute Reviews',
			'slug'     => 'absolute-reviews',
			'required' => false,
		),

		array(
			'name'     => 'Advanced Popups',
			'slug'     => 'advanced-popups',
			'required' => false,
		),

		array(
			'name'     => 'Sight',
			'slug'     => 'sight',
			'required' => false,
		),

		array(
			'name'     => 'One Click Demo Import',
			'slug'     => 'one-click-demo-import',
			'required' => false,
		),

		array(
			'name'     => 'SearchWP Live Ajax Search',
			'slug'     => 'searchwp-live-ajax-search',
			'required' => false,
		),

		array(
			'name'     => 'Regenerate Thumbnails',
			'slug'     => 'regenerate-thumbnails',
			'required' => false,
		),

		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false,
		),

	);

	$config = array(
		'id'           => 'csco',
		'default_path' => '',
		'menu'         => 'csco-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'csco_theme_register_required_plugins' );

/**
 * The function sets the default options to plugins.
 *
 * Set Post Views Counter location to manual.
 * Set Yoast SEO separator between breadcrumbs.
 *
 * @param string $plugin Plugin name.
 */
function csco_plugin_set_options( $plugin ) {
	if ( 'wp-seo' === $plugin ) {
		// Get display options.
		$display_options = get_option( 'wpseo_titles' );
		// Set position value.
		$display_options['breadcrumbs-sep'] = '<span class="cs-separator"></span>';
		// Update options.
		update_option( 'wpseo_titles', $display_options );
	}
}

/**
 * Hook into activated_plugin action.
 *
 * @param string $plugin Plugin path to main plugin file with plugin data.
 */
function csco_activated_plugin( $plugin ) {
	// Check if PVC constant is defined, use it to get PVC path anc compare to activated plugin.
	if ( 'post-views-counter/post-views-counter.php' === $plugin ) {
		csco_plugin_set_options( 'post-views-counter' );
	}

	// Check if WPSEO constant is defined, use it to get WPSEO path anc compare to activated plugin.
	if ( 'wordpress-seo/wp-seo.php' === $plugin ) {
		csco_plugin_set_options( 'wp-seo' );
	}
}
add_action( 'activated_plugin', 'csco_activated_plugin' );

/**
 * Hook into after_switch_theme action.
 */
function csco_activated_theme() {
	csco_plugin_set_options( 'post-views-counter' );
	csco_plugin_set_options( 'wp-seo' );
}
add_action( 'after_switch_theme', 'csco_activated_theme' );

/**
 * Add post format support to AMP plugin.
 *
 * @param array  $data Template data.
 * @param object $post Post.
 */
function csco_amp_post_template_data( $data, $post ) {

	if ( 'video' === get_post_format( $post->ID ) || 'audio' === get_post_format( $post->ID ) ) {
		$data['amp_component_scripts']['amp-iframe'] = true;
	}
	if ( 'gallery' === get_post_format( $post->ID ) ) {
		$data['amp_component_scripts']['amp-carousel'] = true;
	}

	return $data;
}
add_filter( 'amp_post_template_data', 'csco_amp_post_template_data', 10, 2 );
