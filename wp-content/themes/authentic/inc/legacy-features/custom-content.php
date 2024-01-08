<?php
/**
 * Additional Content.
 *
 * Includes customizer settings and actions to insert custom content.
 *
 * @package Authentic
 */

/**
 * Redefine array of Additional Content Locations.
 *
 * @param array $content The Locations.
 */
function csco_legacy_custom_content_locations( $content ) {

	$content = array_merge( array(
		array(
			'slug'     => 'slider',
			'name'     => esc_html__( 'Post Slider', 'authentic' ),
			'template' => array( 'home', 'front_page' ),
		),
		array(
			'slug'     => 'tiles',
			'name'     => esc_html__( 'Post Tiles', 'authentic' ),
			'template' => array( 'home', 'front_page' ),
		),
		array(
			'slug'     => 'carousel',
			'name'     => esc_html__( 'Post Carousel', 'authentic' ),
			'template' => array( 'home', 'front_page' ),
		),

	), $content );

	return $content;
}
add_filter( 'csco_custom_content_locations', 'csco_legacy_custom_content_locations' );
