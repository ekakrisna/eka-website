<?php
/**
 * Register Carousel.
 *
 * @package Authentic
 */

/**
 * Enqueue carousel specific styles and scripts.
 */
function csco_canvas_enqueue_carousel_assets() {
	$suffix = is_admin() ? '-editor' : null;

	wp_register_style(
		'csco-block-carousel-style',
		csco_style( get_template_directory_uri() . "/css/blocks/carousel{$suffix}.css" ),
		array(),
		filemtime( csco_style( get_template_directory() . "/css/blocks/carousel{$suffix}.css" ) )
	);

	wp_style_add_data( 'csco-block-carousel-style', 'rtl', 'replace' );

	wp_enqueue_style( 'csco-block-carousel-style' );
}
add_action( 'enqueue_block_assets', 'csco_canvas_enqueue_carousel_assets' );

/**
 * Register Carousel layouts for the "Featured Posts" block
 *
 * @param array $layouts List of layouts.
 */
function csco_canvas_register_carousel_layout( $layouts = array() ) {

	$layouts['carousel'] = array(
		'location'    => array( 'section-wide', 'section-content' ),
		'name'        => esc_html__( 'Carousel', 'authentic' ),
		'template'    => get_theme_file_path( '/template-parts/blocks/carousel.php' ),
		'icon'        => csco_get_icon_of_carousel_by( 'carousel' ),
		'sections'    => array(
			'carouselThumbnail'  => array(
				'title'    => esc_html__( 'Thumbnail Settings', 'authentic' ),
				'priority' => 10,
			),
			'carouselMeta'       => array(
				'title'    => esc_html__( 'Meta Settings', 'authentic' ),
				'priority' => 10,
			),
			'carouselTypography' => array(
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
					'label'   => esc_html__( 'Total Slides', 'authentic' ),
					'section' => 'general',
					'type'    => 'number',
					'default' => 10,
					'min'     => 1,
					'max'     => 100,
				),
				array(
					'key'     => 'columns',
					'label'   => esc_html__( 'Visible Slides', 'authentic' ),
					'section' => 'general',
					'type'    => 'number',
					'default' => 4,
					'min'     => 2,
					'max'     => 6,
				),
				// Thumbnail.
				array(
					'key'     => 'thumbnailOrientation',
					'label'   => esc_html__( 'Image Orientation', 'authentic' ),
					'section' => 'carouselThumbnail',
					'type'    => 'select',
					'default' => 'original',
					'choices' => array(
						'original'  => esc_html__( 'Original', 'authentic' ),
						'landscape' => esc_html__( 'Landscape', 'authentic' ),
						'portrait'  => esc_html__( 'Portrait', 'authentic' ),
						'square'    => esc_html__( 'Square', 'authentic' ),
					),
				),
				// Typography.
				array(
					'key'     => 'typographyHeading',
					'label'   => esc_html__( 'Heading Font Size', 'authentic' ),
					'section' => 'carouselTypography',
					'type'    => 'dimension',
					'default' => '1.5rem',
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
					'section' => 'carouselTypography',
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
				// Color Settings.
				array(
					'key'     => 'colorBasicHeading',
					'label'   => esc_html__( 'Heading', 'authentic' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .entry-title a',
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
							'element'  => '$ .entry-title a:hover, $ .entry-title a:focus',
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
							'field'    => '$#carouselShowExcerpt',
							'operator' => '===',
							'value'    => true,
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
							'element'  => '$ .post-meta li, $ .post-categories li',
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
							'element'  => '$ .post-meta a',
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
							'element'  => '$ .post-meta a:hover, $ .post-meta a:focus',
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
							'element'  => '$ .post-categories a',
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
							'element'  => '$ .post-categories a:hover, $ .post-categories a:focus',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'colorBullet',
					'label'   => esc_html__( 'Color Bullet', 'authentic' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .owl-dot:not(.active) span',
							'property' => 'background-color',
							'suffix'   => '!important',
						),
					),
				),
				array(
					'key'     => 'colorBulletActive',
					'label'   => esc_html__( 'Color Bullet Active', 'authentic' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ .owl-dot.active span',
							'property' => 'background-color',
							'suffix'   => '!important',
						),
					),
				),
			),
			csco_get_gutenberg_meta_fields(
				array(
					'field_prefix'    => 'carousel',
					'section_name'    => 'carouselMeta',
					'active_callback' => array(),
				)
			),
			csco_get_gutenberg_button_fields(
				array(
					'field_prefix'    => 'carousel',
					'section_name'    => 'carouselMeta',
					'active_callback' => array(),
				)
			),
			csco_get_gutenberg_excerpt_fields(
				array(
					'field_prefix'    => 'carousel',
					'section_name'    => 'carouselMeta',
					'active_callback' => array(),
				)
			),
			csco_get_gutenberg_view_link_fields(
				array(
					'field_prefix'    => 'carousel',
					'section_name'    => 'carouselMeta',
					'default'         => true,
					'active_callback' => array(),
				)
			)
		),
	);

	return $layouts;
}
add_filter( 'canvas_block_layouts_canvas/posts', 'csco_canvas_register_carousel_layout' );

/**
 * Change post query by carousel posts attributes
 *
 * @param array $args       Args for post query.
 * @param array $attributes Block attributes.
 * @param array $options    Block options.
 */
function csco_canvas_carousel_posts_query_args( $args, $attributes, $options ) {

	// Posts count.
	if ( isset( $options['slides'] ) && $options['slides'] ) {
		$args['posts_per_page'] = $options['slides'];
	}

	return $args;
}
add_filter( 'canvas_block_posts_query_args', 'csco_canvas_carousel_posts_query_args', 10, 3 );
