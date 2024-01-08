<?php
/**
 * Register Slider.
 *
 * @package Authentic
 */

/**
 * Enqueue slider specific styles and scripts.
 */
function csco_canvas_enqueue_slider_assets() {
	$suffix = is_admin() ? '-editor' : null;

	wp_register_style(
		'csco-block-slider-style',
		csco_style( get_template_directory_uri() . "/css/blocks/slider{$suffix}.css" ),
		array(),
		filemtime( csco_style( get_template_directory() . "/css/blocks/slider{$suffix}.css" ) )
	);

	wp_style_add_data( 'csco-block-slider-style', 'rtl', 'replace' );

	wp_enqueue_style( 'csco-block-slider-style' );
}
add_action( 'enqueue_block_assets', 'csco_canvas_enqueue_slider_assets' );

/**
 * Register Slider layouts for the "Featured Posts" block
 *
 * @param array $layouts List of layouts.
 */
function csco_canvas_register_slider_layout( $layouts = array() ) {

	$types = csco_get_types_of_slider();

	foreach ( $types as $type ) {

		switch ( $type ) {
			case 'slider-center':
			case 'slider-multiple':
			case 'slider-wide':
			case 'slider-large':
				$location = array( 'section-full' );
				break;
			case 'slider-boxed':
				$location = array( 'section-wide', 'section-content' );
				break;
		}

		$layouts[ $type ] = array(
			'location'    => $location,
			'name'        => csco_get_name_of_slider_by( $type ),
			'template'    => get_theme_file_path( '/template-parts/blocks/slider.php' ),
			'icon'        => csco_get_icon_of_slider_by( $type ),
			'sections'    => array(
				$type . 'Meta'       => array(
					'title'    => esc_html__( 'Meta Settings', 'authentic' ),
					'priority' => 10,
				),
				$type . 'Typography' => array(
					'title'    => esc_html__( 'Typography Settings', 'authentic' ),
					'priority' => 45,
				),
			),
			'hide_fields' => array(
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
				'buttonColorBgHover',
				'buttonColorText',
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
						'key'     => 'slides',
						'label'   => esc_html__( 'Slides', 'authentic' ),
						'section' => 'general',
						'type'    => 'number',
						'default' => 10,
						'min'     => 1,
						'max'     => 100,
					),
					( 'slider-multiple' === $type ) ? array(
						'key'     => 'visible',
						'label'   => esc_html__( 'Visible Slides', 'authentic' ),
						'section' => 'general',
						'type'    => 'select',
						'default' => '3',
						'choices' => array(
							'2' => '2',
							'3' => '3',
							'4' => '4',
						),
					) : array(),
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
					( 'slider-large' !== $type ) ? array(
						'key'     => 'height',
						'label'   => esc_html__( 'Height', 'authentic' ),
						'section' => 'general',
						'type'    => 'dimension',
						'default' => '600px',
						'output'  => array(
							array(
								'element'     => '$ .cs-block-slider-featured .overlay-outer',
								'property'    => 'height',
								'media_query' => '@media ( min-width: 760px )',
							),
							array(
								'element'  => '$ .cs-block-slider-featured .owl-carousel:not(.owl-loaded)',
								'property' => 'height',
							),
						),
					) : array(),
					( 'slider-center' === $type || 'slider-multiple' === $type ) ? array(
						'key'     => 'padding',
						'label'   => esc_html__( 'Padding', 'authentic' ),
						'section' => 'general',
						'type'    => 'dimension',
						'default' => '40px',
						'output'  => array(
							array(
								'element'  => '.entry-content .cnvs-block-section-layout-align-full:first-child $:first-child',
								'property' => 'padding-top',
							),
						),
					) : array(),
					array(
						'key'     => 'autoplay',
						'label'   => esc_html__( 'Auto Play', 'authentic' ),
						'section' => 'general',
						'type'    => 'toggle',
						'default' => true,
					),
					array(
						'key'             => 'timeout',
						'label'           => esc_html__( 'Time-Out', 'authentic' ),
						'section'         => 'general',
						'type'            => 'number',
						'default'         => 7000,
						'min'             => 1,
						'max'             => 100000,
						'active_callback' => array(
							array(
								'field'    => '$#autoplay',
								'operator' => '==',
								'value'    => true,
							),
						),
					),
					// Typography.
					array(
						'key'     => 'typographyHeading',
						'label'   => esc_html__( 'Heading Font Size', 'authentic' ),
						'section' => $type . 'Typography',
						'type'    => 'dimension',
						'default' => '2rem',
						'output'  => array(
							array(
								'element'  => '$ article .entry-title',
								'property' => 'font-size',
								'suffix'   => '!important',
							),
						),
					),
					array(
						'key'     => 'typographyHeadingTag',
						'label'   => esc_html__( 'Heading Tag', 'authentic' ),
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
				csco_get_gutenberg_meta_fields(
					array(
						'field_prefix'    => 'slider',
						'section_name'    => $type . 'Meta',
						'active_callback' => array(),
					)
				),
				csco_get_gutenberg_button_fields(
					array(
						'field_prefix'    => 'slider',
						'section_name'    => $type . 'Meta',
						'active_callback' => array(),
						'default'         => true,
					)
				)
			),
		);
	}

	return $layouts;
}
add_filter( 'canvas_block_layouts_canvas/posts', 'csco_canvas_register_slider_layout' );

/**
 * Change post query by slider posts attributes
 *
 * @param array $args       Args for post query.
 * @param array $attributes Block attributes.
 * @param array $options    Block options.
 */
function csco_canvas_slider_posts_query_args( $args, $attributes, $options ) {

	// Posts count.
	if ( isset( $options['slides'] ) && $options['slides'] ) {
		$args['posts_per_page'] = $options['slides'];
	}

	return $args;
}
add_filter( 'canvas_block_posts_query_args', 'csco_canvas_slider_posts_query_args', 10, 3 );
