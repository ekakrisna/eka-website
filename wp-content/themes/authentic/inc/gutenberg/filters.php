<?php
/**
 * Filters.
 *
 * @package Authentic
 */

/**
 * Change canvas breakpoints
 */
function csco_canvas_register_breakpoints() {
	return array(
		'mobile'  => 759,  // <= 759
		'tablet'  => 1119, // <= 1119
		'desktop' => 1120, // >= 1120
	);
}
add_filter( 'canvas_register_breakpoints', 'csco_canvas_register_breakpoints' );

/**
 * PinIt exclude selectors from archive
 *
 * @param string $selectors List selectors.
 */
function csco_archive_pinit_exclude_selectors( $selectors ) {
	$selectors[] = '.post-archive';

	return $selectors;
}
add_filter( 'powerkit_pinit_exclude_selectors', 'csco_archive_pinit_exclude_selectors' );

/**
 * Change settings of canvas sections
 *
 * @param array $blocks All registered blocks.
 */
function csco_change_settings_canvas_sections( $blocks ) {

	foreach ( $blocks as $key => $block ) {

		if ( 'canvas/section' === $block['name'] ) {
			$blocks[ $key ] = array_merge(
				$blocks[ $key ],
				array(
					'style'        => null,
					'editor_style' => null,
				)
			);
		}
	}

	return $blocks;
}
add_filter( 'canvas_register_block_type', 'csco_change_settings_canvas_sections', 999 );
