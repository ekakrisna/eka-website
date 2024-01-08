<?php
/**
 * Register Full.
 *
 * @package Authentic
 */

/**
 * Enqueue full specific styles and scripts.
 */
function csco_canvas_enqueue_full_assets() {
	$suffix = is_admin() ? '-editor' : null;

	wp_register_style(
		'csco-block-full-style',
		csco_style( get_template_directory_uri() . "/css/blocks/full{$suffix}.css" ),
		array(),
		filemtime( csco_style( get_template_directory() . "/css/blocks/full{$suffix}.css" ) )
	);

	wp_style_add_data( 'csco-block-full-style', 'rtl', 'replace' );

	wp_enqueue_style( 'csco-block-full-style' );
}
add_action( 'enqueue_block_assets', 'csco_canvas_enqueue_full_assets' );

/**
 * Register Full layouts for the "Featured Posts" block
 *
 * @param array $layouts List of layouts.
 */
function csco_canvas_register_full_layout( $layouts = array() ) {

	$types = csco_get_types_of_full();

	foreach ( $types as $index => $type ) {

		$layouts[ $type ] = array(
			'location'    => array( 'section-full' ),
			'name'        => esc_html__( 'Full', 'authentic' ) . ' ' . $index,
			'template'    => get_theme_file_path( '/template-parts/blocks/full.php' ),
			'icon'        => csco_get_icon_of_full_by( $index ),
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
			'hide_fields' => array(
				'postsCount',
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
						'key'     => 'typographyLargeHeading',
						'label'   => esc_html__( 'Large Heading Font Size', 'authentic' ),
						'section' => $type . 'Typography',
						'type'    => 'dimension',
						'default' => '3rem',
						'output'  => array(
							array(
								'element'     => '
									$ .full-1 .full-inner:nth-child(1) article:nth-child(1) .overlay-inner .entry-title,
									$ .full-2 .full-inner:nth-child(1) article:nth-child(1) .overlay-inner .entry-title
								',
								'property'    => 'font-size',
								'media_query' => '@media ( min-width: 1020px )',
								'context'     => array( 'front' ),
								'suffix'      => '!important',
							),
							array(
								'element'  => '
									.cs-breakpoint-up-1020px $ .full-1 .full-inner:nth-child(1) article:nth-child(1) .overlay-inner .entry-title,
									.cs-breakpoint-up-1020px $ .full-2 .full-inner:nth-child(1) article:nth-child(1) .overlay-inner .entry-title
								',
								'property' => 'font-size',
								'context'  => array( 'editor' ),
								'suffix'   => '!important',
							),
						),
					),
					array(
						'key'     => 'largeHeadingTag',
						'label'   => esc_html__( 'Large Heading Tag', 'authentic' ),
						'section' => $type . 'Typography',
						'type'    => 'select',
						'default' => 'h2',
						'choices' => array(
							'h1'  => esc_html__( 'H1', 'authentic' ),
							'h2'  => esc_html__( 'H2', 'authentic' ),
							'h3'  => esc_html__( 'H3', 'authentic' ),
							'h4'  => esc_html__( 'H4', 'authentic' ),
							'h5'  => esc_html__( 'H5', 'authentic' ),
							'h6'  => esc_html__( 'H6', 'authentic' ),
							'p'   => esc_html__( 'P', 'authentic' ),
							'div' => esc_html__( 'DIV', 'authentic' ),
						),
					),
					array(
						'key'     => 'typographySmallHeading',
						'label'   => esc_html__( 'Small Heading Font Size', 'authentic' ),
						'section' => $type . 'Typography',
						'type'    => 'dimension',
						'default' => '1rem',
						'output'  => array(
							array(
								'element'  => '$ .full-inner:nth-child(2) .overlay-inner .entry-title',
								'property' => 'font-size',
								'suffix'   => '!important',
							),
						),
					),
					array(
						'key'     => 'smallHeadingTag',
						'label'   => esc_html__( 'Small Heading Tag', 'authentic' ),
						'section' => $type . 'Typography',
						'type'    => 'select',
						'default' => 'h2',
						'choices' => array(
							'h1'  => esc_html__( 'H1', 'authentic' ),
							'h2'  => esc_html__( 'H2', 'authentic' ),
							'h3'  => esc_html__( 'H3', 'authentic' ),
							'h4'  => esc_html__( 'H4', 'authentic' ),
							'h5'  => esc_html__( 'H5', 'authentic' ),
							'h6'  => esc_html__( 'H6', 'authentic' ),
							'p'   => esc_html__( 'P', 'authentic' ),
							'div' => esc_html__( 'DIV', 'authentic' ),
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
						'default'         => true,
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
				)
			),
		);
	}

	return $layouts;
}
add_filter( 'canvas_block_layouts_canvas/posts', 'csco_canvas_register_full_layout' );

/**
 * Change post query by full attributes
 *
 * @param array $args       Args for post query.
 * @param array $attributes Block attributes.
 * @param array $options    Block options.
 */
function csco_canvas_full_posts_query_args( $args, $attributes, $options ) {

	if ( 0 !== strpos( $attributes['layout'], 'full' ) ) {
		return $args;
	}

	switch ( $attributes['layout'] ) {
		case 'full-1':
		case 'full-2':
			$args['posts_per_page'] = 5;
			break;
	}

	$args['min_limit'] = $args['posts_per_page'];

	return $args;
}
add_filter( 'canvas_block_posts_query_args', 'csco_canvas_full_posts_query_args', 10, 3 );
