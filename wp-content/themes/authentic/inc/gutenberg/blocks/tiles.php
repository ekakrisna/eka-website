<?php
/**
 * Register Tiles.
 *
 * @package Authentic
 */

/**
 * Enqueue tiles specific styles and scripts.
 */
function csco_canvas_enqueue_tiles_assets() {
	$suffix = is_admin() ? '-editor' : null;

	wp_register_style(
		'csco-block-tiles-style',
		csco_style( get_template_directory_uri() . "/css/blocks/tiles{$suffix}.css" ),
		array(),
		filemtime( csco_style( get_template_directory() . "/css/blocks/tiles{$suffix}.css" ) )
	);

	wp_style_add_data( 'csco-block-tiles-style', 'rtl', 'replace' );

	wp_enqueue_style( 'csco-block-tiles-style' );
}
add_action( 'enqueue_block_assets', 'csco_canvas_enqueue_tiles_assets' );

/**
 * Register Tiles layouts for the "Featured Posts" block
 *
 * @param array $layouts List of layouts.
 */
function csco_canvas_register_tiles_layout( $layouts = array() ) {

	$types = csco_get_types_of_tiles();

	foreach ( $types as $index => $type ) {

		$analogy = csco_check_analogy_of_tiles_by( $type );

		$layouts[ $type ] = array(
			'location'    => array( 'section-wide', 'section-full' ),
			'name'        => esc_html__( 'Tiles', 'authentic' ) . ' ' . $index,
			'template'    => get_theme_file_path( '/template-parts/blocks/tiles.php' ),
			'icon'        => csco_get_icon_of_tiles_by( $type ),
			'sections'    => array(
				$type . 'PrimaryMeta'   => $analogy ? array(
					'title'    => esc_html__( 'Meta Settings', 'authentic' ),
					'priority' => 10,
				) : array(
					'title'    => esc_html__( 'Large Post Meta Settings', 'authentic' ),
					'priority' => 10,
				),
				$type . 'SecondaryMeta' => array(
					'title'    => esc_html__( 'Small Post Meta Settings', 'authentic' ),
					'priority' => 10,
				),
				$type . 'Typography'    => array(
					'title'    => esc_html__( 'Typography Settings', 'authentic' ),
					'priority' => 45,
				),
			),
			'hide_fields' => array(
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
			),
			'fields'      => array_merge(
				array(
					array(
						'key'     => 'height',
						'label'   => esc_html__( 'Min Height', 'authentic' ),
						'type'    => 'dimension',
						'default' => 'initial',
						'hide'    => true,
						'output'  => array(
							array(
								'element'     => '$ .cs-block-tiles .tiles-outer',
								'property'    => 'min-height',
								'media_query' => '@media ( min-width: 1020px )',
								'context'     => array( 'front' ),
							),
							array(
								'element'  => '.cs-breakpoint-up-1020px $ .cs-block-tiles .tiles-outer',
								'property' => 'min-height',
								'context'  => array( 'editor' ),
							),
						),
					),
					array(
						'key'     => 'padding',
						'label'   => esc_html__( 'Gap Padding', 'authentic' ),
						'type'    => 'dimension',
						'default' => '40px',
						'output'  => array(
							array(
								'element'     => '$ .cs-block-tiles .tiles-outer',
								'property'    => 'grid-gap',
								'media_query' => '@media ( min-width: 760px )',
								'context'     => array( 'front' ),
							),
							array(
								'element'  => '.cs-breakpoint-up-760px $ .cs-block-tiles .tiles-outer',
								'property' => 'grid-gap',
								'context'  => array( 'editor' ),
							),
							array(
								'element'     => '.entry-content > .cnvs-block-section-layout-align-full:first-child $:first-child',
								'property'    => 'padding-top',
								'suffix'      => '!important',
								'media_query' => '@media ( min-width: 760px )',
							),
						),
					),
					array(
						'key'     => 'parallax',
						'label'   => esc_html__( 'Enable parallax effect', 'authentic' ),
						'section' => 'general',
						'type'    => 'toggle',
						'default' => true,
					),
					array(
						'key'     => 'video',
						'label'   => esc_html__( 'Enable video backgrounds', 'authentic' ),
						'section' => 'general',
						'type'    => 'toggle',
						'default' => false,
					),
					// Typography.
					array(
						'key'             => 'typographyLargeHeading',
						'label'           => $analogy ? esc_html__( 'Heading Font Size', 'authentic' ) : esc_html__( 'Large Post Heading Font Size', 'authentic' ),
						'section'         => $type . 'Typography',
						'type'            => 'dimension',
						'default'         => '3rem',
						'output'          => array(
							array(
								'element'     => '$ .cs-block-tiles .layout-typography-large .overlay-inner .entry-title',
								'property'    => 'font-size',
								'media_query' => '@media ( min-width: 760px )',
								'context'     => array( 'front' ),
								'suffix'      => '!important',
							),
							array(
								'element'  => '.cs-breakpoint-up-760px $ .cs-block-tiles .layout-typography-large .overlay-inner .entry-title',
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
									'value'    => 'tiles-1',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-4',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-5',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-6',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-7',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-8',
								),
							),
						),
					),
					array(
						'key'             => 'largeHeadingTag',
						'label'           => $analogy ? esc_html__( 'Heading Tag', 'authentic' ) : esc_html__( 'Large Post Heading Tag', 'authentic' ),
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
									'value'    => 'tiles-1',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-4',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-5',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-6',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-7',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-8',
								),
							),
						),
					),
					array(
						'key'             => 'typographySmallHeading',
						'label'           => $analogy ? esc_html__( 'Heading Font Size', 'authentic' ) : esc_html__( 'Small Post Heading Font Size', 'authentic' ),
						'section'         => $type . 'Typography',
						'type'            => 'dimension',
						'default'         => '1.5rem',
						'output'          => array(
							array(
								'element'     => '$ .cs-block-tiles .layout-typography-small .overlay-inner .entry-title',
								'property'    => 'font-size',
								'media_query' => '@media ( min-width: 760px )',
								'context'     => array( 'front' ),
								'suffix'      => '!important',
							),
							array(
								'element'  => '.cs-breakpoint-up-760px $ .cs-block-tiles .layout-typography-small .overlay-inner .entry-title',
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
									'value'    => 'tiles-2',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-4',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-5',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-6',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-7',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-8',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-9',
								),
							),
						),
					),
					array(
						'key'             => 'smallHeadingTag',
						'label'           => $analogy ? esc_html__( 'Heading Tag', 'authentic' ) : esc_html__( 'Small Post Heading Tag', 'authentic' ),
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
									'value'    => 'tiles-2',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-4',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-5',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-6',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-7',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-8',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-9',
								),
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
						'active_callback' => array(
							array(
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-1',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-2',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-4',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-5',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-7',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-8',
								),
							),
						),
					)
				),
				csco_get_gutenberg_button_fields(
					array(
						'field_prefix'    => 'primary',
						'section_name'    => $type . 'PrimaryMeta',
						'default'         => true,
						'active_callback' => array(
							array(
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-1',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-2',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-4',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-5',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-7',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-8',
								),
							),
						),
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
									'value'    => 'tiles-3',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-4',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-5',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-6',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-7',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-8',
								),
							),
						),
					)
				),
				csco_get_gutenberg_button_fields(
					array(
						'field_prefix'    => 'secondary',
						'section_name'    => $type . 'SecondaryMeta',
						'default'         => true,
						'active_callback' => array(
							array(
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'tiles-3',
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
add_filter( 'canvas_block_layouts_canvas/posts', 'csco_canvas_register_tiles_layout' );

/**
 * Change post query by tiles attributes
 *
 * @param array $args       Args for post query.
 * @param array $attributes Block attributes.
 * @param array $options    Block options.
 */
function csco_canvas_tiles_posts_query_args( $args, $attributes, $options ) {

	if ( 0 !== strpos( $attributes['layout'], 'tiles' ) ) {
		return $args;
	}

	switch ( $attributes['layout'] ) {
		case 'tiles-1':
		case 'tiles-3':
			$args['posts_per_page'] = 2;
			break;
		case 'tiles-2':
		case 'tiles-4':
		case 'tiles-5':
			$args['posts_per_page'] = 3;
			break;
		case 'tiles-6':
		case 'tiles-7':
		case 'tiles-8':
			$args['posts_per_page'] = 5;
			break;
		case 'tiles-9':
			$args['posts_per_page'] = 8;
			break;
	}

	$args['min_limit'] = $args['posts_per_page'];

	return $args;
}
add_filter( 'canvas_block_posts_query_args', 'csco_canvas_tiles_posts_query_args', 10, 3 );
