<?php
/**
 * Featured Posts Block Sidebar.
 *
 * @package Authentic
 */

/**
 * Enqueue posts sidebar specific styles and scripts.
 */
function csco_canvas_enqueue_posts_sidebar_assets() {
	$suffix = is_admin() ? '-editor' : null;

	wp_register_style(
		'csco-block-posts-sidebar-style',
		csco_style( get_template_directory_uri() . "/css/blocks/posts-sidebar{$suffix}.css" ),
		array(),
		filemtime( csco_style( get_template_directory() . "/css/blocks/posts-sidebar{$suffix}.css" ) )
	);

	wp_style_add_data( 'csco-block-posts-sidebar-style', 'rtl', 'replace' );

	wp_enqueue_style( 'csco-block-posts-sidebar-style' );
}
add_action( 'enqueue_block_assets', 'csco_canvas_enqueue_posts_sidebar_assets' );

/**
 * Change posts for Sidebar.
 *
 * @param array $layouts List of layouts.
 */
function csco_canvas_change_posts_sidebar( $layouts = array() ) {

	// Add new layout.
	$layouts['sidebar-slider'] = array(
		'name'     => esc_html__( 'Widget 4', 'authentic' ),
		'icon'     => '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><rect stroke="#2D2D2D" stroke-width="1.5" width="50" height="42" rx="3"/><g transform="translate(16 8)" stroke="#2D2D2D"><rect stroke-width="1.5" width="18" height="22" rx="1"/><path d="M3.333 15.5h11.334M3.357 18h9.286" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(20 35)"><circle fill="#2D2D2D" cx="5" cy="1" r="1"/><circle stroke="#2D2D2D" cx="1" cy="1" r="1"/><circle fill="#2D2D2D" cx="9" cy="1" r="1"/></g></g></svg>',
		'location' => array( 'section-sidebar' ),
		'template' => get_theme_file_path( '/template-parts/blocks/posts-sidebar.php' ),
		'sections' => array(),
		'fields'   => array(),
	);

	// Loop types.
	$types = array(
		'sidebar-list',
		'sidebar-numbered',
		'sidebar-large',
		'sidebar-slider',
	);

	foreach ( $types as $type ) {

		// Set new template.
		$layouts[ $type ]['template'] = get_theme_file_path( '/template-parts/blocks/posts-sidebar.php' );

		// Hide fields.
		$layouts[ $type ]['hide_fields'] = array(
			'imageSize',
			'postsCount',
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

		$layouts[ $type ]['sections'] = array(
			$type . 'Meta'          => array(
				'title'    => esc_html__( 'Meta Settings', 'authentic' ),
				'priority' => 10,
			),
			$type . 'RoundedImages' => array(
				'title'    => esc_html__( 'Rounded Settings', 'authentic' ),
				'priority' => 15,
			),
			$type . 'Typography'    => array(
				'title'    => esc_html__( 'Typography Settings', 'authentic' ),
				'priority' => 45,
			),
		);

		$layouts[ $type ]['fields'] = array_merge(
			array(
				( 'sidebar-slider' === $type || 'sidebar-large' === $type ) ? array(
					'key'     => 'orientation',
					'label'   => esc_html__( 'Orientation', 'authentic' ),
					'section' => 'general',
					'type'    => 'select',
					'choices' => array(
						'landscape' => esc_html__( 'Landscape', 'authentic' ),
						'portrait'  => esc_html__( 'Portrait', 'authentic' ),
						'square'    => esc_html__( 'Square', 'authentic' ),
					),
					'default' => 'landscape',
				) : array(),
				array(
					'key'     => 'widgetPostsCount',
					'label'   => esc_html__( 'Posts Count', 'authentic' ),
					'section' => 'general',
					'type'    => 'number',
					'default' => 5,
					'min'     => 1,
					'max'     => 100,
				),
				// Color Settings.
				array(
					'key'             => 'colorBasicHeading',
					'label'           => esc_html__( 'Heading', 'authentic' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$.cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .entry-title a',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => 'layout',
							'operator' => '!=',
							'value'    => 'sidebar-slider',
						),
					),
				),
				array(
					'key'             => 'colorBasicHeadingHover',
					'label'           => esc_html__( 'Heading Hover', 'authentic' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$.cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .entry-title a:hover, $ .cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .entry-title a:focus',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => 'layout',
							'operator' => '!=',
							'value'    => 'sidebar-slider',
						),
					),
				),
				array(
					'key'             => 'colorBasicMeta',
					'label'           => esc_html__( 'Post Meta', 'authentic' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$.cnvs-block-posts-sidebar .post-meta, $.cnvs-block-posts-sidebar .post-meta span, $.cnvs-block-posts-sidebar .post-meta li + li:before, $.cnvs-block-posts-sidebar .post-categories span',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => 'layout',
							'operator' => '!=',
							'value'    => 'sidebar-slider',
						),
					),
				),
				array(
					'key'             => 'colorBasicMetaLinks',
					'label'           => esc_html__( 'Post Meta Links', 'authentic' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$.cnvs-block-posts-sidebar .post-meta a',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => 'layout',
							'operator' => '!=',
							'value'    => 'sidebar-slider',
						),
					),
				),
				array(
					'key'             => 'colorBasicMetaLinksHover',
					'label'           => esc_html__( 'Post Meta Links Hover', 'authentic' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$.cnvs-block-posts-sidebar .post-meta a:hover, $.cnvs-block-posts-sidebar .post-meta a:focus',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => 'layout',
							'operator' => '!=',
							'value'    => 'sidebar-slider',
						),
					),
				),
				array(
					'key'             => 'colorBasicCategoriesLinks',
					'label'           => esc_html__( 'Post Categories Links', 'authentic' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$.cnvs-block-posts-sidebar:not(.cnvs-block-posts-sidebar-slider) .post-categories a',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => 'layout',
							'operator' => '!=',
							'value'    => 'sidebar-slider',
						),
					),
				),
				array(
					'key'             => 'colorBasicCategoriesLinksHover',
					'label'           => esc_html__( 'Post Categories Links Hover', 'authentic' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$.cnvs-block-posts-sidebar .post-categories a:hover, $.cnvs-block-posts-sidebar .post-categories a:focus',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => 'layout',
							'operator' => '!=',
							'value'    => 'sidebar-slider',
						),
					),
				),
				array(
					'key'             => 'colorBasicBullet',
					'label'           => esc_html__( 'Color Bullet', 'authentic' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$ .owl-dot:not(.active) span',
							'property' => 'background-color',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => 'layout',
							'operator' => '==',
							'value'    => 'sidebar-slider',
						),
					),
				),
				array(
					'key'             => 'colorBasicBulletActive',
					'label'           => esc_html__( 'Color Bullet Active', 'authentic' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$ .owl-dot.active span',
							'property' => 'background-color',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => 'layout',
							'operator' => '==',
							'value'    => 'sidebar-slider',
						),
					),
				),
				array(
					'key'             => 'bgCounter',
					'label'           => esc_html__( 'Background Counter', 'authentic' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$ .pk-post-item .post-number',
							'property' => 'background-color',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => 'layout',
							'operator' => '==',
							'value'    => 'sidebar-numbered',
						),
					),
				),
				array(
					'key'             => 'colorCounter',
					'label'           => esc_html__( 'Color Counter', 'authentic' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$ .pk-post-item .post-number',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => 'layout',
							'operator' => '==',
							'value'    => 'sidebar-numbered',
						),
					),
				),
				// Typography.
				array(
					'key'     => 'typographyHeading',
					'label'   => esc_html__( 'Heading Font Size', 'authentic' ),
					'section' => $type . 'Typography',
					'type'    => 'dimension',
					'default' => '1rem',
					'output'  => array(
						array(
							'element'  => '$ .entry-title',
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
				// Rounded Images Settings.
				( 'sidebar-list' === $type || 'sidebar-numbered' === $type ) ? array(
					'key'     => 'rounded',
					'label'   => esc_html__( 'Display rounded images', 'authentic' ),
					'section' => $type . 'RoundedImages',
					'type'    => 'toggle',
					'default' => false,
				) : array(),
			),
			csco_get_gutenberg_meta_fields(
				array(
					'field_prefix'    => 'sidebar',
					'section_name'    => $type . 'Meta',
					'active_callback' => array(),
				)
			),
			csco_get_gutenberg_button_fields(
				array(
					'field_prefix'    => 'sidebar',
					'section_name'    => $type . 'Meta',
					'default'         => true,
					'active_callback' => array(
						array(
							array(
								'field'    => 'layout',
								'operator' => '==',
								'value'    => 'sidebar-slider',
							),
						),
					),
				)
			)
		);
	}

	return $layouts;
}
add_filter( 'canvas_block_layouts_canvas/posts', 'csco_canvas_change_posts_sidebar', 100 );
