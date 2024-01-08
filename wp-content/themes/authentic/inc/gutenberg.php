<?php
/**
 * Gutenberg.
 *
 * @package Authentic
 */

/**
 * Helpers.
 */
require get_template_directory() . '/inc/gutenberg/helpers.php';

/**
 * Sizes Dependencies.
 */
require get_template_directory() . '/inc/gutenberg/sizes-dependencies.php';

/**
 * Assets.
 */
require get_template_directory() . '/inc/gutenberg/assets.php';

/**
 * Filters.
 */
require get_template_directory() . '/inc/gutenberg/filters.php';

/**
 * Blocks.
 */
require get_template_directory() . '/inc/gutenberg/blocks/archive.php';
require get_template_directory() . '/inc/gutenberg/blocks/posts-sidebar.php';
require get_template_directory() . '/inc/gutenberg/blocks/twitter-slider.php';
require get_template_directory() . '/inc/gutenberg/blocks/tiles.php';
require get_template_directory() . '/inc/gutenberg/blocks/horizontal-tiles.php';
require get_template_directory() . '/inc/gutenberg/blocks/full.php';
require get_template_directory() . '/inc/gutenberg/blocks/slider.php';
require get_template_directory() . '/inc/gutenberg/blocks/carousel.php';
require get_template_directory() . '/inc/gutenberg/blocks/wide.php';
require get_template_directory() . '/inc/gutenberg/blocks/narrow.php';

/**
 * Editor Settings.
 */
require get_template_directory() . '/inc/gutenberg/editor.php';

/**
 * Theme Mods.
 */
require get_template_directory() . '/inc/gutenberg/theme-mods.php';
