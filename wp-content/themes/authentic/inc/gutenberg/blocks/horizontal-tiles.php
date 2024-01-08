<?php
/**
 * Register Horizontal Tiles.
 *
 * @package Authentic
 */

/**
 * Enqueue horizontal tiles specific styles and scripts.
 */
function csco_canvas_enqueue_horizontal_tiles_assets() {
	$suffix = is_admin() ? '-editor' : null;

	wp_register_style(
		'csco-block-horizontal-tiles-style',
		csco_style( get_template_directory_uri() . "/css/blocks/horizontal-tiles{$suffix}.css" ),
		array(),
		filemtime( csco_style( get_template_directory() . "/css/blocks/horizontal-tiles{$suffix}.css" ) )
	);

	wp_style_add_data( 'csco-block-horizontal-tiles-style', 'rtl', 'replace' );

	wp_enqueue_style( 'csco-block-horizontal-tiles-style' );
}
add_action( 'enqueue_block_assets', 'csco_canvas_enqueue_horizontal_tiles_assets' );

/**
 * Register Horizontal Tiles layouts for the "Featured Posts" block
 *
 * @param array $layouts List of layouts.
 */
function csco_canvas_register_horizontal_tiles_layout( $layouts = array() ) {

	$types = csco_get_types_of_horizontal_tiles();

	foreach ( $types as $index => $type ) {

		$hide_fields = array(
			'postsCount',
			'imageSize',
			'showPagination',
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

		if ( 'horizontal-tiles-1' === $type ) {
			$location = array( 'section-wide', 'section-full' );
		} else {
			$location = array( 'section-full' );
		}

		$layouts[ $type ] = array(
			'location'    => $location,
			'name'        => esc_html__( 'Tiles', 'authentic' ) . ' ' . $index,
			'template'    => get_theme_file_path( '/template-parts/blocks/horizontal-tiles.php' ),
			'icon'        => csco_get_icon_of_horizontal_tiles_by( $type ),
			'sections'    => array(
				$type . 'PrimaryMeta'   => array(
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
			'hide_fields' => $hide_fields,
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
								'element'     => '$ .cs-block-horizontal-tiles .horizontal-tiles-outer',
								'property'    => 'min-height',
								'media_query' => '@media ( min-width: 1120px )',
								'context'     => array( 'front' ),
							),
							array(
								'element'  => '.cs-breakpoint-up-1120px $ .cs-block-horizontal-tiles .horizontal-tiles-outer',
								'property' => 'min-height',
								'context'  => array( 'editor' ),
							),
						),
					),
					array(
						'key'     => 'padding',
						'label'   => esc_html__( 'Gap Padding', 'authentic' ),
						'type'    => 'dimension',
						'default' => '0px',
						'output'  => array(
							array(
								'element'     => '$ .cs-block-horizontal-tiles .horizontal-tiles-outer',
								'property'    => 'grid-gap',
								'media_query' => '@media ( min-width: 1120px )',
								'context'     => array( 'front' ),
							),
							array(
								'element'  => '.cs-breakpoint-up-1120px $ .cs-block-horizontal-tiles .horizontal-tiles-outer',
								'property' => 'grid-gap',
								'context'  => array( 'editor' ),
							),
							array(
								'element'     => '.entry-content > .cnvs-block-section-layout-align-full:first-child $:first-child',
								'property'    => 'padding-top',
								'suffix'      => '!important',
								'media_query' => '@media ( min-width: 1120px )',
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
						'label'           => esc_html__( 'Large Post Heading Font Size', 'authentic' ),
						'section'         => $type . 'Typography',
						'type'            => 'dimension',
						'default'         => '2.5rem',
						'output'          => array(
							array(
								'element'     => '$ .cs-block-horizontal-tiles .layout-typography-large .overlay-inner .entry-title',
								'property'    => 'font-size',
								'media_query' => '@media ( min-width: 1240px )',
								'context'     => array( 'front' ),
								'suffix'      => '!important',
							),
							array(
								'element'  => '.cs-breakpoint-up-1240px $ .cs-block-horizontal-tiles .layout-typography-large .overlay-inner .entry-title',
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
									'value'    => 'horizontal-tiles-1',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'horizontal-tiles-2',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'horizontal-tiles-3',
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
									'value'    => 'horizontal-tiles-1',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'horizontal-tiles-2',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'horizontal-tiles-3',
								),
							),
						),
					),
					array(
						'key'             => 'typographySmallHeading',
						'label'           => esc_html__( 'Small Post Heading Font Size', 'authentic' ),
						'section'         => $type . 'Typography',
						'type'            => 'dimension',
						'default'         => '1.5rem',
						'output'          => array(
							array(
								'element'     => '$ .cs-block-horizontal-tiles .layout-typography-small .overlay-inner .entry-title',
								'property'    => 'font-size',
								'media_query' => '@media ( min-width: 760px )',
								'context'     => array( 'front' ),
								'suffix'      => '!important',
							),
							array(
								'element'  => '.cs-breakpoint-up-760px $ .cs-block-horizontal-tiles .layout-typography-small .overlay-inner .entry-title',
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
									'value'    => 'horizontal-tiles-1',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'horizontal-tiles-2',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'horizontal-tiles-3',
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
									'value'    => 'horizontal-tiles-1',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'horizontal-tiles-2',
								),
								array(
									'field'    => 'layout',
									'operator' => '==',
									'value'    => 'horizontal-tiles-3',
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
						'active_callback' => array(),
					)
				),
				csco_get_gutenberg_excerpt_fields(
					array(
						'field_prefix'    => 'secondary',
						'section_name'    => $type . 'SecondaryMeta',
						'active_callback' => array(),
					)
				),
				csco_get_gutenberg_button_fields(
					array(
						'field_prefix'    => 'secondary',
						'section_name'    => $type . 'SecondaryMeta',
						'default'         => true,
						'active_callback' => array(),
					)
				)
			),
		);
	}

	return $layouts;
}
add_filter( 'canvas_block_layouts_canvas/posts', 'csco_canvas_register_horizontal_tiles_layout' );

/**
 * Change post query by horizontal tiles attributes
 *
 * @param array $args       Args for post query.
 * @param array $attributes Block attributes.
 * @param array $options    Block options.
 */
function csco_canvas_horizontal_tiles_posts_query_args( $args, $attributes, $options ) {

	if ( 0 !== strpos( $attributes['layout'], 'horizontal-tiles' ) ) {
		return $args;
	}

	switch ( $attributes['layout'] ) {
		case 'horizontal-tiles-1':
			$args['posts_per_page'] = 3;
			break;
		case 'horizontal-tiles-2':
			$args['posts_per_page'] = 4;
			break;
		case 'horizontal-tiles-3':
			$args['posts_per_page'] = 5;
			break;
	}

	$args['min_limit'] = $args['posts_per_page'];

	return $args;
}
add_filter( 'canvas_block_posts_query_args', 'csco_canvas_horizontal_tiles_posts_query_args', 10, 3 );
