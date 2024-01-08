<?php
/**
 * Assets
 *
 * All enqueues of scripts and styles.
 *
 * @package Authentic
 */

/**
 * Enqueue block editor specific scripts.
 */
function csco_enqueue_block_editor_assets() {
	$version = csco_get_theme_data( 'Version' );

	// Register vendor scripts.
	wp_register_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );
	wp_register_script( 'colcade', get_template_directory_uri() . '/js/colcade.js', array( 'jquery' ), '0.2.0', true );
	wp_register_script( 'object-fit-images', get_template_directory_uri() . '/js/ofi.min.js', array( 'jquery' ), '3.2.4', true );
	wp_register_script( 'jarallax', get_template_directory_uri() . '/js/jarallax.min.js', array( 'jquery' ), '1.10.5', true );
	wp_register_script( 'jarallax-video', get_template_directory_uri() . '/js/jarallax-video.min.js', array( 'jquery', 'jarallax' ), '1.10.5', true );

	// Register theme scripts.
	wp_register_script( 'csco-scripts', get_template_directory_uri() . '/js/scripts.js', array(
		'jquery',
		'imagesloaded',
		'owl-carousel',
		'colcade',
		'object-fit-images',
		'jarallax',
		'jarallax-video',
	), $version, true );

	// Localization array.
	$translation_strings = array(
		'next'     => esc_html__( 'Next', 'authentic' ),
		'previous' => esc_html__( 'Previous', 'authentic' ),
		'close'    => esc_html__( 'Close', 'authentic' ),
		'loading'  => esc_html__( 'Loading', 'authentic' ),
	);

	// Localize the main theme scripts.
	wp_localize_script( 'csco-scripts', 'translation', $translation_strings );

	// Enqueue theme scripts.
	wp_enqueue_script( 'csco-scripts' );

	// Register theme styles.
	wp_register_style( 'csco-editor', csco_style( get_template_directory_uri() . '/css/editor-style.css' ), false, $version );

	// Enqueue theme styles.
	wp_enqueue_style( 'csco-editor' );
}
add_action( 'enqueue_block_editor_assets', 'csco_enqueue_block_editor_assets' );
