<?php
/**
 * Assets
 *
 * Legacy enqueues of scripts and styles.
 *
 * @package Authentic
 */

/**
 * Enqueues legacy theme assets.
 */
function csco_legacy_enqueue_assets() {
	$version = csco_get_theme_data( 'Version' );

	// Register theme scripts.
	wp_register_script( 'csco-legacy-features', get_template_directory_uri() . '/js/legacy-features.js', array(
		'jquery',
		'imagesloaded',
		'owl-carousel',
		'colcade',
		'object-fit-images',
		'jarallax',
		'jarallax-video',
	), $version, true );

	// Enqueue theme scripts.
	wp_enqueue_script( 'csco-legacy-features' );

	// Register theme styles.
	wp_register_style( 'csco-legacy-features', csco_style( get_template_directory_uri() . '/css/legacy-features.css' ), array( 'csco-styles' ), $version );

	// Enqueue theme styles.
	wp_enqueue_style( 'csco-legacy-features' );
}
add_action( 'wp_enqueue_scripts', 'csco_legacy_enqueue_assets', 99 );
