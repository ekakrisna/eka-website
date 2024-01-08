<?php
/**
 * Editor Settings.
 *
 * @package Authentic
 */

/**
 * Enqueue editor scripts
 */
function csco_block_editor_scripts() {
	wp_enqueue_script(
		'csco-editor-scripts',
		get_template_directory_uri() . '/jsx/editor-scripts.js',
		array(
			'wp-editor',
			'wp-element',
			'wp-compose',
			'wp-data',
			'wp-plugins',
		),
		csco_get_theme_data( 'Version' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'csco_block_editor_scripts' );

/**
 * Adds classes to <div class="editor-styles-wrapper"> tag
 */
function csco_block_editor_wrapper() {
	$post_id = get_the_ID();

	if ( ! $post_id ) {
		return;
	}

	// Set post type.
	$post_type = sprintf( 'post-type-%s', get_post_type( $post_id ) );

	// Set style align.
	$style_align = sprintf( 'style-align-%s', get_theme_mod( 'style_align', 'center' ) );

	// Set page layout.
	$default_layout = csco_get_page_layout( $post_id, 'default' );
	$page_layout    = csco_get_page_layout( $post_id );

	if ( 'layout-fullwidth' === $default_layout ) {
		$default_layout = 'layout-fullwidth';
	} else {
		$default_layout = 'layout-nofullwidth';
	}

	if ( 'layout-fullwidth' === $page_layout ) {
		$page_layout = 'layout-fullwidth';
	} else {
		$page_layout = 'layout-nofullwidth';
	}

	// Post Sidebar.
	if ( 'post' === get_post_type( $post_id ) && csco_powerkit_module_enabled( 'share_buttons' ) && powerkit_share_buttons_exists( 'post-sidebar' ) ) {
		$post_sidebar = 'post-sidebar-enabled';
	} else {
		$post_sidebar = 'post-sidebar-disabled';
	}

	// Disabled narrow fullwidth post.
	if ( 'post' === get_post_type( $post_id ) && 'layout-fullwidth' === $page_layout && ! get_theme_mod( 'post_fullwidth_narrow', true ) ) {
		$layoute_narrow = 'layout-narrow-disabled';
	} else {
		$layoute_narrow = 'layout-narrow-enabled';
	}

	if ( get_option( 'csco_enable_legacy_features', false ) ) {
		$legacy_features = 'legacy-features-enabled';
	} else {
		$legacy_features = 'legacy-features-disabled';
	}

	// Section Heading.
	$section_heading = 'section-heading-default-' . get_theme_mod( 'section_heading', 'style-1' );

	wp_enqueue_script(
		'csco-editor-wrapper',
		get_template_directory_uri() . '/jsx/gutenberg.js',
		array(
			'wp-editor',
			'wp-element',
			'wp-compose',
			'wp-data',
			'wp-plugins',
		),
		csco_get_theme_data( 'Version' ),
		true
	);

	wp_localize_script(
		'csco-editor-wrapper',
		'cscoGWrapper',
		array(
			'post_type'       => $post_type,
			'legacy_features' => $legacy_features,
			'style_align'     => $style_align,
			'default_layout'  => $default_layout,
			'page_layout'     => $page_layout,
			'layoute_narrow'  => $layoute_narrow,
			'post_sidebar'    => $post_sidebar,
			'section_heading' => $section_heading,
		)
	);
}
add_action( 'enqueue_block_editor_assets', 'csco_block_editor_wrapper' );

/**
 * Change editor color palette.
 */
function csco_change_editor_color_palette() {
	// Editor Color Palette.
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => esc_html__( 'Black', 'authentic' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
			array(
				'name'  => esc_html__( 'Cyan bluish gray', 'authentic' ),
				'slug'  => 'cyan-bluish-gray',
				'color' => '#abb8c3',
			),
			array(
				'name'  => esc_html__( 'White', 'authentic' ),
				'slug'  => 'white',
				'color' => '#FFFFFF',
			),
			array(
				'name'  => esc_html__( 'Secondary', 'authentic' ),
				'slug'  => 'secondary',
				'color' => '#f8f8f8',
			),
			array(
				'name'  => esc_html__( 'Pale pink', 'authentic' ),
				'slug'  => 'pale-pink',
				'color' => '#f78da7',
			),
			array(
				'name'  => esc_html__( 'Vivid red', 'authentic' ),
				'slug'  => 'vivid-red',
				'color' => '#ce2e2e',
			),
			array(
				'name'  => esc_html__( 'Luminous vivid orange', 'authentic' ),
				'slug'  => 'luminous-vivid-orange',
				'color' => '#ff6900',
			),
			array(
				'name'  => esc_html__( 'Luminous vivid amber', 'authentic' ),
				'slug'  => 'luminous-vivid-amber',
				'color' => '#fcb902',
			),
			array(
				'name'  => esc_html__( 'Light green cyan', 'authentic' ),
				'slug'  => 'light-green-cyan',
				'color' => '#7bdcb5',
			),
			array(
				'name'  => esc_html__( 'Vivid green cyan', 'authentic' ),
				'slug'  => 'vivid-green-cyan',
				'color' => '#01d083',
			),
			array(
				'name'  => esc_html__( 'Pale cyan blue', 'authentic' ),
				'slug'  => 'pale-cyan-blue',
				'color' => '#8ed1fc',
			),
			array(
				'name'  => esc_html__( 'Vivid cyan blue', 'authentic' ),
				'slug'  => 'vivid-cyan-blue',
				'color' => '#0693e3',
			),
			array(
				'name'  => esc_html__( 'Vivid purple', 'authentic' ),
				'slug'  => 'vivid-purple',
				'color' => '#9b51e0',
			),
		)
	);
}
add_action( 'after_setup_theme', 'csco_change_editor_color_palette' );
