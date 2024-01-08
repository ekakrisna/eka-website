<?php
/**
 * Authentic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Authentic
 */

update_option( 'authentic_license_data', [
	'status'          => 'active',
	'count'           => '1',
	'sold_at'         => 'now',
	'supported_until' => 'now',
	'demos'           => 'csco_theme_demos',
	'ocdi'            => [
		'parent_slug' => 'themes.php',
		'page_title' => 'Demo Content',
		'menu_title' => 'Demo Content',
		'capability' => 'import',
		'menu_slug' => 'csco-demo-content',
	],
] );

if ( ! function_exists( 'csco_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function csco_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'authentic', get_template_directory() . '/languages' );

		// Add post thumbnails.
		add_theme_support( 'post-thumbnails' );

		// Gutenberg Image Alignments.
		add_theme_support( 'align-wide' );

		// Add excerpts on pages.
		add_post_type_support( 'page', 'excerpt' );

		// Enable plugins to manage the document title.
		add_theme_support( 'title-tag' );

		/*
		 * Switch default core markup for search form, comment form, comments, etc.
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		// Automatic Feed Links.
		add_theme_support( 'automatic-feed-links' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add post formats.
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'image' ) );

		// Disable section responsive.
		add_theme_support( 'canvas-disable-section-responsive' );

		// Supported Powerkit Formats UI.
		add_theme_support( 'powerkit-post-format-ui' );

		// Supported Powerkit Featured UI.
		add_theme_support( 'powerkit-post-featured-ui' );

		// Jetpack Responsive Videos.
		add_theme_support( 'jetpack-responsive-videos' );

		// Get custom image sizes.
		$image_sizes = csco_get_custom_image_sizes();

		// Register image size for each default image size.
		foreach ( $image_sizes as $image_size_sub ) {
			foreach ( $image_size_sub as $image_size ) {
				add_image_size( $image_size['slug'], $image_size['width'], $image_size['height'], $image_size['crop'] );
			}
		}

		// Sets $content_width.
		$GLOBALS['content_width'] = apply_filters( 'csco_content_width', 1160 );

		// Restoring the classic Widgets Editor.
		remove_theme_support( 'widgets-block-editor' );
	}
}
add_action( 'after_setup_theme', 'csco_setup' );

/**
 * Register header menus
 */
function csco_register_header_menus() {

	// Register wp_nav_menu() menus.
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary Menu', 'authentic' ),
			'mobile-menu'  => esc_html__( 'Mobile Menu', 'authentic' ),
			'footer-menu'  => esc_html__( 'Footer Menu', 'authentic' ),
		)
	);

}
add_action( 'init', 'csco_register_header_menus' );

/**
 * Adobe fonts.
 */
require_once get_theme_file_path( '/core/adobe-fonts/class-adobe-fonts.php' );

/**
 * Customizer.
 */
require_once get_theme_file_path( '/core/customizer/class-customizer.php' );

/**
 * Theme Activation.
 */
require get_template_directory() . '/inc/classes/class-csco-theme-activation.php';

/**
 * Arrays.
 */
require get_template_directory() . '/inc/arrays.php';

/**
 * Widgets Init.
 */
require get_template_directory() . '/inc/widgets-init.php';

/**
 * Template Functions.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Gutenberg.
 */
require get_template_directory() . '/inc/gutenberg.php';

/**
 * Woocommerce.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Customizer Functions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Dark Mode.
 */
require get_template_directory() . '/inc/dark-mode.php';

/**
 * Template Tags.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Filters.
 */
require get_template_directory() . '/inc/filters.php';

/**
 * Mega Menu.
 */
require get_template_directory() . '/inc/mega-menu.php';

/**
 * Post Meta.
 */
require get_template_directory() . '/inc/post-meta.php';

/**
 * Assets.
 */
require get_template_directory() . '/inc/assets.php';

/**
 * Actions.
 */
require get_template_directory() . '/inc/actions.php';

/**
 * Partials.
 */
require get_template_directory() . '/inc/partials.php';

/**
 * Meta Boxes.
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Load More.
 */
require get_template_directory() . '/inc/load-more.php';

/**
 * Load Nextpost.
 */
require get_template_directory() . '/inc/load-nextpost.php';

/**
 * Custom Content.
 */
require get_template_directory() . '/inc/custom-content.php';

/**
* Sight.
*/
require get_template_directory() . '/inc/sight.php';

/**
 * Powerkit fuctions.
 */
require get_template_directory() . '/inc/powerkit.php';

/**
 * Plugins.
 */
require get_template_directory() . '/inc/plugins.php';

/**
 * Deprecated.
 */
require get_template_directory() . '/inc/deprecated.php';

/**
 * One Click Demo Import.
 */
require get_template_directory() . '/inc/demo-import/ocdi-filters.php';

/**
 * Customizer demos.
 */
require get_template_directory() . '/inc/demo-import/customizer-demos.php';

/**
 * Theme demos.
 */
require get_template_directory() . '/inc/demo-import/demo-styles.php';
require get_template_directory() . '/inc/demo-import/demo-homepages.php';

/**
 * Legacy features.
 */
require get_template_directory() . '/inc/legacy-features/legacy-features.php';
