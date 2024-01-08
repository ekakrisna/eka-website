<?php
/**
 * Register Narrow.
 *
 * @package Authentic
 */

/**
 * Enqueue narrow specific styles and scripts.
 */
function csco_canvas_enqueue_narrow_assets() {
	$suffix = is_admin() ? '-editor' : null;

	wp_register_style(
		'csco-block-narrow-style',
		csco_style( get_template_directory_uri() . "/css/blocks/narrow{$suffix}.css" ),
		array(),
		filemtime( csco_style( get_template_directory() . "/css/blocks/narrow{$suffix}.css" ) )
	);

	wp_style_add_data( 'csco-block-narrow-style', 'rtl', 'replace' );

	wp_enqueue_style( 'csco-block-narrow-style' );
}
add_action( 'enqueue_block_assets', 'csco_canvas_enqueue_narrow_assets' );

/**
 * Register Narrow layouts for the "Featured Posts" block
 *
 * @param array $layouts List of layouts.
 */
function csco_canvas_register_narrow_layout( $layouts = array() ) {

	$types = csco_get_types_of_narrow();

	foreach ( $types as $index => $type ) {

		$hide_fields = array(
			'postsCount',
			'showPagination',
			'imageSize',
			'showExcerpt',
			'showMetaCategory',
			'showMetaAuthor',
			'showMetaDate',
			'showMetaComments',
			'showMetaViews',
			'showMetaReadingTime',
			'showMetaShares',
			'showViewPostButton',
			'buttonLabel',
			'buttonStyle',
			'buttonSize',
			'buttonFullWidth',
			'buttonColorBg',
			'buttonColorText',
			'buttonColorBgHover',
			'buttonColorTextHover',
			'colorText',
			'colorHeading',
			'colorHeadingHover',
			'colorText',
			'colorMeta',
			'colorMetaHover',
			'colorMetaLinks',
			'colorMetaLinksHover',
		);

		$layouts[ $type ] = array(
			'location'    => array( 'section-content' ),
			'name'        => esc_html__( 'Narrow', 'authentic' ) . ' ' . $index,
			'template'    => get_theme_file_path( '/template-parts/blocks/narrow.php' ),
			'icon'        => csco_get_icon_of_narrow_by( $type ),
			'sections'    => array(
				$type . 'PrimaryMeta'    => array(
					'title'    => esc_html__( 'Large Post Meta Settings', 'authentic' ),
					'priority' => 10,
				),
				$type . 'SecondaryMeta'  => array(
					'title'    => esc_html__( 'Medium Post Meta Settings', 'authentic' ),
					'priority' => 10,
				),
				$type . 'AdditionalMeta' => array(
					'title'    => esc_html__( 'Small Post Meta Settings', 'authentic' ),
					'priority' => 10,
				),
				$type . 'Typography'     => array(
					'title'    => esc_html__( 'Typography Settings', 'authentic' ),
					'priority' => 45,
				),
			),
			'hide_fields' => $hide_fields,
			'fields'      => array_merge(
				array(
					array(
						'key'             => 'parallax',
						'label'           => esc_html__( 'Enable parallax effect', 'authentic' ),
						'section'         => 'general',
						'type'            => 'toggle',
						'default'         => true,
						'active_callback' => array(
							array(
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-1',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-5',
								),
							),
						),
					),
					array(
						'key'             => 'video',
						'label'           => esc_html__( 'Enable video backgrounds', 'authentic' ),
						'section'         => 'general',
						'type'            => 'toggle',
						'default'         => false,
						'active_callback' => array(
							array(
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-1',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-5',
								),
							),
						),
					),
					// Typography.
					array(
						'key'             => 'typographyLargeHeading',
						'label'           => esc_html__( 'Large Post Heading Font Size', 'authentic' ),
						'section'         => $type . 'Typography',
						'type'            => 'dimension',
						'default'         => '1.5rem',
						'output'          => array(
							array(
								'element'     => '$ .cs-block-narrow .layout-typography-large .post-inner .entry-title',
								'property'    => 'font-size',
								'media_query' => '@media ( min-width: 1020px )',
								'context'     => array( 'front' ),
								'suffix'      => '!important',
							),
							array(
								'element'  => '.cs-breakpoint-up-1020px $ .cs-block-narrow .layout-typography-large .post-inner .entry-title',
								'property' => 'font-size',
								'context'  => array( 'editor' ),
								'suffix'   => '!important',
							),
						),
						'active_callback' => array(
							array(
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-1',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-2',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-4',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-5',
								),
							),
						),
					),
					array(
						'key'             => 'largeHeadingTag',
						'label'           => esc_html__( 'Large Post Heading Tag', 'authentic' ),
						'section'         => $type . 'Typography',
						'type'            => 'select',
						'default'         => 'h2',
						'choices'         => array(
							'h1'  => esc_html__( 'H1', 'authentic' ),
							'h2'  => esc_html__( 'H2', 'authentic' ),
							'h3'  => esc_html__( 'H3', 'authentic' ),
							'h4'  => esc_html__( 'H4', 'authentic' ),
							'h5'  => esc_html__( 'H5', 'authentic' ),
							'h6'  => esc_html__( 'H6', 'authentic' ),
							'p'   => esc_html__( 'P', 'authentic' ),
							'div' => esc_html__( 'DIV', 'authentic' ),
						),
						'active_callback' => array(
							array(
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-1',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-2',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-4',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-5',
								),
							),
						),
					),
					array(
						'key'             => 'typographyMediumHeading',
						'label'           => esc_html__( 'Medium Post Heading Font Size', 'authentic' ),
						'section'         => $type . 'Typography',
						'type'            => 'dimension',
						'default'         => '1rem',
						'output'          => array(
							array(
								'element'  => '$ .cs-block-narrow .layout-typography-medium .post-inner .entry-title',
								'property' => 'font-size',
								'context'  => array( 'front' ),
								'suffix'   => '!important',
							),
							array(
								'element'  => '$ .cs-block-narrow .layout-typography-medium .post-inner .entry-title',
								'property' => 'font-size',
								'context'  => array( 'editor' ),
								'suffix'   => '!important',
							),
						),
						'active_callback' => array(
							array(
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-1',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-2',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-4',
								),
							),
						),
					),
					array(
						'key'             => 'mediumHeadingTag',
						'label'           => esc_html__( 'Medium Post Heading Tag', 'authentic' ),
						'section'         => $type . 'Typography',
						'type'            => 'select',
						'default'         => 'h2',
						'choices'         => array(
							'h1'  => esc_html__( 'H1', 'authentic' ),
							'h2'  => esc_html__( 'H2', 'authentic' ),
							'h3'  => esc_html__( 'H3', 'authentic' ),
							'h4'  => esc_html__( 'H4', 'authentic' ),
							'h5'  => esc_html__( 'H5', 'authentic' ),
							'h6'  => esc_html__( 'H6', 'authentic' ),
							'p'   => esc_html__( 'P', 'authentic' ),
							'div' => esc_html__( 'DIV', 'authentic' ),
						),
						'active_callback' => array(
							array(
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-1',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-2',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-4',
								),
							),
						),
					),
					array(
						'key'             => 'typographySmallHeading',
						'label'           => esc_html__( 'Small Post Heading Font Size', 'authentic' ),
						'section'         => $type . 'Typography',
						'type'            => 'dimension',
						'default'         => '1rem',
						'output'          => array(
							array(
								'element'  => '$ .cs-block-narrow .layout-typography-small .post-inner .entry-title',
								'property' => 'font-size',
								'context'  => array( 'front' ),
								'suffix'   => '!important',
							),
							array(
								'element'  => '$ .cs-block-narrow .layout-typography-small .post-inner .entry-title',
								'property' => 'font-size',
								'context'  => array( 'editor' ),
								'suffix'   => '!important',
							),
						),
						'active_callback' => array(
							array(
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-4',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-5',
								),
							),
						),
					),
					array(
						'key'             => 'smallHeadingTag',
						'label'           => esc_html__( 'Small Post Heading Tag', 'authentic' ),
						'section'         => $type . 'Typography',
						'type'            => 'select',
						'default'         => 'h2',
						'choices'         => array(
							'h1'  => esc_html__( 'H1', 'authentic' ),
							'h2'  => esc_html__( 'H2', 'authentic' ),
							'h3'  => esc_html__( 'H3', 'authentic' ),
							'h4'  => esc_html__( 'H4', 'authentic' ),
							'h5'  => esc_html__( 'H5', 'authentic' ),
							'h6'  => esc_html__( 'H6', 'authentic' ),
							'p'   => esc_html__( 'P', 'authentic' ),
							'div' => esc_html__( 'DIV', 'authentic' ),
						),
						'active_callback' => array(
							array(
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-4',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-5',
								),
							),
						),
					),
					// Color Settings.
					array(
						'key'     => 'colorBasicHeading',
						'label'   => esc_html__( 'Heading', 'authentic' ),
						'section' => 'color',
						'type'    => 'color',
						'output'  => array(
							array(
								'element'  => '$ .layout-variation-simple .entry-header .entry-title a',
								'property' => 'color',
								'suffix'   => '!important',
							),
						),
					),
					array(
						'key'     => 'colorBasicHeadingHover',
						'label'   => esc_html__( 'Heading Hover', 'authentic' ),
						'section' => 'color',
						'type'    => 'color',
						'output'  => array(
							array(
								'element'  => '$ .layout-variation-simple .entry-header .entry-title a:hover, $ .layout-variation-simple .entry-header .entry-title a:focus',
								'property' => 'color',
								'suffix'   => '!important',
							),
						),
					),
					array(
						'key'             => 'colorBasicExcerpt',
						'label'           => esc_html__( 'Excerpt', 'authentic' ),
						'section'         => 'color',
						'type'            => 'color',
						'output'          => array(
							array(
								'element'  => '$ .post-excerpt',
								'property' => 'color',
								'suffix'   => '!important',
							),
						),
						'active_callback' => array(
							array(
								'field'    => 'showExcerpt',
								'operator' => '===',
								'value'    => true,
							),
							array(
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-2',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-4',
								),
							),
						),
					),
					array(
						'key'     => 'colorBasicMeta',
						'label'   => esc_html__( 'Post Meta', 'authentic' ),
						'section' => 'color',
						'type'    => 'color',
						'output'  => array(
							array(
								'element'  => '$ .layout-variation-simple .entry-header .post-meta li, $ .layout-variation-simple .entry-header .post-categories li',
								'property' => 'color',
								'suffix'   => '!important',
							),
						),
					),
					array(
						'key'     => 'colorBasicMetaLinks',
						'label'   => esc_html__( 'Post Meta Links', 'authentic' ),
						'section' => 'color',
						'type'    => 'color',
						'output'  => array(
							array(
								'element'  => '$ .layout-variation-simple .entry-header .post-meta a',
								'property' => 'color',
								'suffix'   => '!important',
							),
						),
					),
					array(
						'key'     => 'colorBasicMetaLinksHover',
						'label'   => esc_html__( 'Post Meta Links Hover', 'authentic' ),
						'section' => 'color',
						'type'    => 'color',
						'output'  => array(
							array(
								'element'  => '$ .layout-variation-simple .entry-header .post-meta a:hover, $ .layout-variation-simple .entry-header .post-meta a:focus',
								'property' => 'color',
								'suffix'   => '!important',
							),
						),
					),
					array(
						'key'     => 'colorBasicMetaCategories',
						'label'   => esc_html__( 'Post Categories Links', 'authentic' ),
						'section' => 'color',
						'type'    => 'color',
						'output'  => array(
							array(
								'element'  => '$ .layout-variation-simple .entry-header .post-categories a',
								'property' => 'color',
								'suffix'   => '!important',
							),
						),
					),
					array(
						'key'     => 'colorMainMetaCategoriesHover',
						'label'   => esc_html__( 'Post Categories Links Hover', 'authentic' ),
						'section' => 'color',
						'type'    => 'color',
						'output'  => array(
							array(
								'element'  => '$ .layout-variation-simple .entry-header .post-categories a:hover, $ .layout-variation-simple .entry-header .post-categories a:focus',
								'property' => 'color',
								'suffix'   => '!important',
							),
						),
					),
				),
				// Primary Meta.
				csco_get_gutenberg_meta_fields(
					array(
						'field_prefix'    => 'primary',
						'section_name'    => $type . 'PrimaryMeta',
						'active_callback' => array(),
					)
				),
				csco_get_gutenberg_excerpt_fields(
					array(
						'field_prefix'    => 'primary',
						'section_name'    => $type . 'PrimaryMeta',
						'active_callback' => array(),
					)
				),
				csco_get_gutenberg_button_fields(
					array(
						'field_prefix'    => 'primary',
						'section_name'    => $type . 'PrimaryMeta',
						'default'         => true,
						'active_callback' => array(),
					)
				),
				// Secondary Meta.
				csco_get_gutenberg_meta_fields(
					array(
						'field_prefix'    => 'secondary',
						'section_name'    => $type . 'SecondaryMeta',
						'active_callback' => array(
							array(
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-1',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-2',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-4',
								),
							),
						),
					)
				),
				csco_get_gutenberg_view_link_fields(
					array(
						'field_prefix'    => 'secondary',
						'section_name'    => $type . 'SecondaryMeta',
						'default'         => true,
						'active_callback' => array(
							array(
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-4',
								),
							),
						),
					)
				),
				// Additional Meta.
				csco_get_gutenberg_meta_fields(
					array(
						'field_prefix'    => 'additional',
						'section_name'    => $type . 'AdditionalMeta',
						'active_callback' => array(
							array(
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-4',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'narrow-5',
								),
							),
						),
					)
				)
			),
		);
	}

	return $layouts;
}
add_filter( 'canvas_block_layouts_canvas/posts', 'csco_canvas_register_narrow_layout' );

/**
 * Change post query by narrow attributes
 *
 * @param array $args       Args for post query.
 * @param array $attributes Block attributes.
 * @param array $options    Block options.
 */
function csco_canvas_narrow_posts_query_args( $args, $attributes, $options ) {

	if ( 0 !== strpos( $attributes['layout'], 'narrow' ) ) {
		return $args;
	}

	switch ( $attributes['layout'] ) {
		case 'narrow-1':
		case 'narrow-2':
			$args['posts_per_page'] = 5;
			break;
		case 'narrow-3':
		case 'narrow-4':
			$args['posts_per_page'] = 4;
			break;
		case 'narrow-5':
			$args['posts_per_page'] = 6;
			break;
	}

	$args['min_limit'] = $args['posts_per_page'];

	return $args;
}
add_filter( 'canvas_block_posts_query_args', 'csco_canvas_narrow_posts_query_args', 10, 3 );
