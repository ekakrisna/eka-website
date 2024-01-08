<?php
/**
 * Helpers Sizes Dependencies.
 *
 * @package Authentic
 */

/**
 * Get the sizes dependencies for block layout.
 *
 * @param string $type Type.
 */
function csco_block_get_sizes_dependencies( $type ) {

	$list = array(
		'slider'           => array(
			'full-slider-center'          => 'csco-1160',
			'full-slider-wide'            => 'csco-1920',
			'full-slider-multiple-2'      => 'csco-1160',
			'full-slider-multiple-3'      => 'csco-800',
			'full-slider-multiple-4'      => 'csco-560-portrait',
			'full-slider-large'           => 'csco-1920',
			'wide-slider-boxed'           => 'csco-1160',
			'sidebar-slider-boxed'        => 'csco-800',

			'full-slider-center-wide'     => 'csco-1920',
			'full-slider-wide-wide'       => 'csco-1920',
			'full-slider-multiple-2-wide' => 'csco-1160',
			'full-slider-multiple-3-wide' => 'csco-800',
			'full-slider-multiple-4-wide' => 'csco-560-portrait',
			'full-slider-large-wide'      => 'csco-1920',
			'wide-slider-boxed-wide'      => 'csco-1920',
			'sidebar-slider-boxed-wide'   => 'csco-1160',
		),
		'carousel'         => array(
			'wide-carousel-2'         => 'csco-560',
			'wide-carousel-3'         => 'csco-560',
			'wide-carousel-4'         => 'csco-320',
			'wide-carousel-5'         => 'csco-320',
			'wide-carousel-6'         => 'csco-320',
			'sidebar-carousel-2'      => 'csco-560',
			'sidebar-carousel-3'      => 'csco-320',
			'sidebar-carousel-4'      => 'csco-320',
			'sidebar-carousel-5'      => 'csco-320',
			'sidebar-carousel-6'      => 'csco-320',

			'wide-carousel-2-wide'    => 'csco-800',
			'wide-carousel-3-wide'    => 'csco-560',
			'wide-carousel-4-wide'    => 'csco-560',
			'wide-carousel-5-wide'    => 'csco-320',
			'wide-carousel-6-wide'    => 'csco-320',
			'sidebar-carousel-2-wide' => 'csco-560',
			'sidebar-carousel-3-wide' => 'csco-560',
			'sidebar-carousel-4-wide' => 'csco-320',
			'sidebar-carousel-5-wide' => 'csco-320',
			'sidebar-carousel-6-wide' => 'csco-320',
		),
		'tiles'            => array(
			'wide-tiles-1-primary'        => 'csco-560',
			'wide-tiles-1-secondary'      => 'csco-560',
			'wide-tiles-2-primary'        => 'csco-560',
			'wide-tiles-2-secondary'      => 'csco-560',
			'wide-tiles-3-primary'        => 'csco-800',
			'wide-tiles-3-secondary'      => 'csco-560',
			'wide-tiles-4-primary'        => 'csco-800',
			'wide-tiles-4-secondary'      => 'csco-560',
			'wide-tiles-5-primary'        => 'csco-560',
			'wide-tiles-5-secondary'      => 'csco-560',
			'wide-tiles-6-primary'        => 'csco-800',
			'wide-tiles-6-secondary'      => 'csco-560',
			'wide-tiles-7-primary'        => 'csco-560',
			'wide-tiles-7-secondary'      => 'csco-320',
			'wide-tiles-8-primary'        => 'csco-560',
			'wide-tiles-8-secondary'      => 'csco-320',
			'wide-tiles-9-primary'        => 'csco-320',
			'wide-tiles-9-secondary'      => 'csco-320',
			'full-tiles-1-primary'        => 'csco-800',
			'full-tiles-1-secondary'      => 'csco-800',
			'full-tiles-2-primary'        => 'csco-560',
			'full-tiles-2-secondary'      => 'csco-560',
			'full-tiles-3-primary'        => 'csco-1160',
			'full-tiles-3-secondary'      => 'csco-560',
			'full-tiles-4-primary'        => 'csco-560',
			'full-tiles-4-secondary'      => 'csco-560',
			'full-tiles-5-primary'        => 'csco-800',
			'full-tiles-5-secondary'      => 'csco-800',
			'full-tiles-6-primary'        => 'csco-1160',
			'full-tiles-6-secondary'      => 'csco-560',
			'full-tiles-7-primary'        => 'csco-800',
			'full-tiles-7-secondary'      => 'csco-560',
			'full-tiles-8-primary'        => 'csco-800',
			'full-tiles-8-secondary'      => 'csco-560',
			'full-tiles-9-primary'        => 'csco-560',
			'full-tiles-9-secondary'      => 'csco-560',

			'wide-tiles-1-primary-wide'   => 'csco-800',
			'wide-tiles-1-secondary-wide' => 'csco-800',
			'wide-tiles-2-primary-wide'   => 'csco-560',
			'wide-tiles-2-secondary-wide' => 'csco-560',
			'wide-tiles-3-primary-wide'   => 'csco-1160',
			'wide-tiles-3-secondary-wide' => 'csco-560',
			'wide-tiles-4-primary-wide'   => 'csco-560',
			'wide-tiles-4-secondary-wide' => 'csco-560',
			'wide-tiles-5-primary-wide'   => 'csco-800',
			'wide-tiles-5-secondary-wide' => 'csco-800',
			'wide-tiles-6-primary-wide'   => 'csco-1160',
			'wide-tiles-6-secondary-wide' => 'csco-560',
			'wide-tiles-7-primary-wide'   => 'csco-800',
			'wide-tiles-7-secondary-wide' => 'csco-560',
			'wide-tiles-8-primary-wide'   => 'csco-800',
			'wide-tiles-8-secondary-wide' => 'csco-560',
			'wide-tiles-9-primary-wide'   => 'csco-560',
			'wide-tiles-9-secondary-wide' => 'csco-560',
			'full-tiles-1-primary-wide'   => 'csco-800',
			'full-tiles-1-secondary-wide' => 'csco-800',
			'full-tiles-2-primary-wide'   => 'csco-560',
			'full-tiles-2-secondary-wide' => 'csco-560',
			'full-tiles-3-primary-wide'   => 'csco-1160',
			'full-tiles-3-secondary-wide' => 'csco-560',
			'full-tiles-4-primary-wide'   => 'csco-560',
			'full-tiles-4-secondary-wide' => 'csco-560',
			'full-tiles-5-primary-wide'   => 'csco-800',
			'full-tiles-5-secondary-wide' => 'csco-800',
			'full-tiles-6-primary-wide'   => 'csco-1160',
			'full-tiles-6-secondary-wide' => 'csco-560',
			'full-tiles-7-primary-wide'   => 'csco-800',
			'full-tiles-7-secondary-wide' => 'csco-560',
			'full-tiles-8-primary-wide'   => 'csco-800',
			'full-tiles-8-secondary-wide' => 'csco-560',
			'full-tiles-9-primary-wide'   => 'csco-560',
			'full-tiles-9-secondary-wide' => 'csco-560',
		),
		'archive'          => array(
			'wide-standard'          => 'csco-800',
			'wide-masonry-2'         => 'csco-560',
			'wide-masonry-3'         => 'csco-560',
			'wide-masonry-4'         => 'csco-320',
			'wide-grid-2'            => 'csco-560',
			'wide-grid-3'            => 'csco-560',
			'wide-grid-4'            => 'csco-320',
			'wide-list-5'            => 'csco-560',
			'wide-list-6'            => 'csco-560',
			'sidebar-standard'       => 'csco-800',
			'sidebar-masonry-2'      => 'csco-560',
			'sidebar-masonry-3'      => 'csco-320',
			'sidebar-masonry-4'      => 'csco-320',
			'sidebar-grid-2'         => 'csco-560',
			'sidebar-grid-3'         => 'csco-320',
			'sidebar-grid-4'         => 'csco-320',
			'sidebar-list-5'         => 'csco-560',
			'sidebar-list-6'         => 'csco-320',
			'full-standard'          => 'csco-1920',
			'full-masonry-2'         => 'csco-1160',
			'full-masonry-3'         => 'csco-800',
			'full-masonry-4'         => 'csco-560',
			'full-grid-2'            => 'csco-1160',
			'full-grid-3'            => 'csco-800',
			'full-grid-4'            => 'csco-560',
			'full-list-5'            => 'csco-800',
			'full-list-6'            => 'csco-1160',

			'wide-standard-wide'     => 'csco-1920',
			'wide-masonry-2-wide'    => 'csco-800',
			'wide-masonry-3-wide'    => 'csco-560',
			'wide-masonry-4-wide'    => 'csco-320',
			'wide-grid-2-wide'       => 'csco-800',
			'wide-grid-3-wide'       => 'csco-560',
			'wide-grid-4-wide'       => 'csco-320',
			'wide-list-5-wide'       => 'csco-800',
			'wide-list-6-wide'       => 'csco-800',
			'sidebar-standard-wide'  => 'csco-1920',
			'sidebar-masonry-2-wide' => 'csco-560',
			'sidebar-masonry-3-wide' => 'csco-560',
			'sidebar-masonry-4-wide' => 'csco-320',
			'sidebar-grid-2-wide'    => 'csco-560',
			'sidebar-grid-3-wide'    => 'csco-560',
			'sidebar-grid-4-wide'    => 'csco-320',
			'sidebar-list-5-wide'    => 'csco-560',
			'sidebar-list-6-wide'    => 'csco-560',
			'full-standard-wide'     => 'csco-1920',
			'full-masonry-2-wide'    => 'csco-1160',
			'full-masonry-3-wide'    => 'csco-800',
			'full-masonry-4-wide'    => 'csco-560',
			'full-grid-2-wide'       => 'csco-1160',
			'full-grid-3-wide'       => 'csco-800',
			'full-grid-4-wide'       => 'csco-560',
			'full-list-5-wide'       => 'csco-800',
			'full-list-6-wide'       => 'csco-1160',
		),
		'wide'             => array(
			'wide-wide-1-primary'         => 'csco-560',
			'wide-wide-1-secondary'       => 'csco-560',
			'wide-wide-1-additional'      => 'csco-320',
			'wide-wide-2-primary'         => 'csco-560',
			'wide-wide-2-secondary'       => 'csco-560',
			'wide-wide-2-additional'      => 'csco-120',
			'wide-wide-3-primary'         => 'csco-560',
			'wide-wide-3-secondary'       => 'csco-560',
			'wide-wide-3-additional'      => 'csco-120',
			'wide-wide-4-primary'         => 'csco-560',
			'wide-wide-4-secondary'       => 'csco-320',
			'wide-wide-5-primary'         => 'csco-560',
			'wide-wide-5-secondary'       => 'csco-320',
			'wide-wide-5-additional'      => 'csco-120',
			'wide-wide-6-primary'         => 'csco-120',
			'wide-wide-7-primary'         => 'csco-120',
			'wide-wide-8-primary'         => 'csco-120',
			'wide-wide-9-primary'         => 'csco-560',
			'wide-wide-9-additional'      => 'csco-120',
			'wide-wide-10-primary'        => 'csco-560',
			'wide-wide-10-secondary'      => 'csco-320',
			'wide-wide-11-primary'        => 'csco-120',

			'wide-wide-1-primary-wide'    => 'csco-800',
			'wide-wide-1-secondary-wide'  => 'csco-800',
			'wide-wide-1-additional-wide' => 'csco-560',
			'wide-wide-3-primary-wide'    => 'csco-800',
			'wide-wide-3-secondary-wide'  => 'csco-560',
			'wide-wide-3-additional-wide' => 'csco-120',
			'wide-wide-4-primary-wide'    => 'csco-800',
			'wide-wide-4-secondary-wide'  => 'csco-560',
			'wide-wide-5-primary-wide'    => 'csco-800',
			'wide-wide-5-secondary-wide'  => 'csco-560',
			'wide-wide-5-additional-wide' => 'csco-120',
			'wide-wide-6-primary-wide'    => 'csco-120',
			'wide-wide-7-primary-wide'    => 'csco-120',
			'wide-wide-8-primary-wide'    => 'csco-120',
			'wide-wide-9-primary-wide'    => 'csco-800',
			'wide-wide-9-additional-wide'  => 'csco-120',
			'wide-wide-10-primary-wide'   => 'csco-800',
			'wide-wide-10-secondary-wide' => 'csco-320',
			'wide-wide-11-primary-wide'   => 'csco-120',
		),
		'narrow'           => array(
			'sidebar-narrow-1-primary'         => 'csco-320',
			'sidebar-narrow-1-secondary'       => 'csco-320',
			'sidebar-narrow-2-primary'         => 'csco-320',
			'sidebar-narrow-2-secondary'       => 'csco-320',
			'sidebar-narrow-3-primary'         => 'csco-560',
			'sidebar-narrow-3-secondary'       => 'csco-320',
			'sidebar-narrow-3-additional'      => 'csco-120',
			'sidebar-narrow-4-primary'         => 'csco-560',
			'sidebar-narrow-4-secondary'       => 'csco-320',
			'sidebar-narrow-4-additional'      => 'csco-120',
			'sidebar-narrow-5-primary'         => 'csco-560',
			'sidebar-narrow-5-additional'      => 'csco-120',

			'sidebar-narrow-1-primary-wide'    => 'csco-560',
			'sidebar-narrow-1-secondary-wide'  => 'csco-320',
			'sidebar-narrow-2-primary-wide'    => 'csco-560',
			'sidebar-narrow-2-secondary-wide'  => 'csco-320',
			'sidebar-narrow-3-primary-wide'    => 'csco-560',
			'sidebar-narrow-3-secondary-wide'  => 'csco-560',
			'sidebar-narrow-3-additional-wide' => 'csco-120',
			'sidebar-narrow-4-primary-wide'    => 'csco-560',
			'sidebar-narrow-4-secondary-wide'  => 'csco-560',
			'sidebar-narrow-4-additional-wide' => 'csco-120',
			'sidebar-narrow-5-primary-wide'    => 'csco-560',
			'sidebar-narrow-5-additional-wide' => 'csco-120',
		),
		'horizontal-tiles' => array(
			'full-horizontal-tiles-1-primary'        => 'csco-1160',
			'full-horizontal-tiles-1-secondary'      => 'csco-560',
			'wide-horizontal-tiles-1-primary'        => 'csco-560',
			'wide-horizontal-tiles-1-secondary'      => 'csco-320',
			'full-horizontal-tiles-2-primary'        => 'csco-1160',
			'full-horizontal-tiles-2-secondary'      => 'csco-320',
			'full-horizontal-tiles-3-primary'        => 'csco-1160',
			'full-horizontal-tiles-3-secondary'      => 'csco-320',

			'full-horizontal-tiles-1-primary-wide'   => 'csco-1160',
			'full-horizontal-tiles-1-secondary-wide' => 'csco-560',
			'wide-horizontal-tiles-1-primary-wide'   => 'csco-800',
			'wide-horizontal-tiles-1-secondary-wide' => 'csco-320',
			'full-horizontal-tiles-2-primary-wide'   => 'csco-1160',
			'full-horizontal-tiles-2-secondary-wide' => 'csco-320',
			'full-horizontal-tiles-3-primary-wide'   => 'csco-1160',
			'full-horizontal-tiles-3-secondary-wide' => 'csco-320',
		),
		'full'             => array(
			'full-full-1-primary'        => 'csco-1920',
			'full-full-1-secondary'      => 'csco-120',
			'full-full-2-primary'        => 'csco-1920',
			'full-full-2-secondary'      => 'csco-120',

			'full-full-1-primary-wide'   => 'csco-1920',
			'full-full-1-secondary-wide' => 'csco-120',
			'full-full-2-primary-wide'   => 'csco-1920',
			'full-full-2-secondary-wide' => 'csco-120',
		),
	);

	if ( isset( $list[ $type ] ) ) {
		return $list[ $type ];
	}

	return array();
}

/**
 * Get thumbnail size given a list of dependencies.
 *
 * @param string $dependencies Sises dependencies.
 * @param string $location     Block location.
 * @param string $type         Type.
 * @param string $subtype      Subtype.
 * @param string $end          End.
 * @param bool   $orientation  Thumbnail orientation.
 */
function csco_block_get_thumbnail_size( $dependencies, $location, $type = null, $subtype = null, $end = null, $orientation = false ) {
	$size = 'large';

	if ( ! $dependencies ) {
		return $size;
	}

	$index = array();

	// Powerkit Location.
	if ( $location ) {

		switch ( $location ) {
			case 'section-wide':
			case 'layout-fullwidth':
				$index[] = 'wide';
				break;
			case 'section-content':
			case 'layout-sidebar-left':
			case 'layout-sidebar-right':
				$index[] = 'sidebar';
				break;
			case 'section-full':
				$index[] = 'full';
				break;
			case 'root':
				$index[] = 'full';
				break;
			default:
				$index[] = $location;
				break;
		}
	}

	// Type.
	if ( $type ) {
		$index[] = $type;
	}

	// Subtype.
	if ( $subtype ) {
		$index[] = $subtype;
	}

	// End.
	if ( $end ) {
		$index[] = 'wide';
	}

	// Compile.
	$index = implode( '-', $index );

	if ( isset( $dependencies[ $index ] ) ) {
		$size = $dependencies[ $index ];
	}

	// Set size orientation.
	if ( $orientation && 'original' !== $orientation ) {
		$range = csco_range_image_orientation();

		foreach ( $range as $item ) {
			if ( "csco-$item" === $size ) {
				$size .= '-' . $orientation;

				break;
			}
		}
	}

	return $size;
}
