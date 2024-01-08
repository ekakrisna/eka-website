<?php
/**
 * Register Archive.
 *
 * @package Authentic
 */

/**
 * Change featured posts for Archive.
 *
 * @param array $blocks List of blocks.
 */
function csco_canvas_change_posts( $blocks = array() ) {

	foreach ( $blocks as $key => $block ) {

		if ( 'canvas/posts' === $block['name'] ) {

			// Add new layout.
			$blocks[ $key ]['layouts']['standard'] = array(
				'name'     => esc_html__( 'Full', 'authentic' ),
				'icon'     => '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><g transform="translate(5 5)"><rect stroke-width="1.5" width="40" height="25" rx="1"/><path d="M4.889 28.5H35.11M9.885 31h21.23" stroke-linecap="round" stroke-linejoin="round"/></g></g></svg>',
				'location' => array( 'root', 'section-wide', 'section-content' ),
				'template' => get_theme_file_path( '/template-parts/blocks/archive.php' ),
				'sections' => array(),
				'fields'   => array(
					array(
						'key'     => 'summary',
						'label'   => esc_html__( 'Display post summary', 'authentic' ),
						'section' => 'general',
						'type'    => 'toggle',
						'default' => true,
					),
					array(
						'key'             => 'standardSummary',
						'label'           => esc_html__( 'Standard Post Summary', 'authentic' ),
						'section'         => 'general',
						'type'            => 'select',
						'multiple'        => false,
						'choices'         => array(
							'excerpt' => esc_html__( 'Post Excerpt', 'authentic' ),
							'content' => esc_html__( 'Post Content', 'authentic' ),
						),
						'default'         => 'excerpt',
						'active_callback' => array(
							array(
								'field'    => '$#summary',
								'operator' => '==',
								'value'    => true,
							),
						),
					),
				),
			);

			// Fallback template.
			$blocks[ $key ]['template'] = get_theme_file_path( '/template-parts/blocks/archive.php' );

			// Loop layouts.
			$layouts = array(
				'grid',
				'masonry',
				'list',
				'standard',
			);

			foreach ( $layouts as $layout ) {

				// Set new template.
				$blocks[ $key ]['layouts'][ $layout ]['template'] = get_theme_file_path( '/template-parts/blocks/archive.php' );

				// Hide fields.
				$blocks[ $key ]['layouts'][ $layout ]['hide_fields'] = array(
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

				$blocks[ $key ]['layouts'][ $layout ]['sections'] = array(
					$layout . 'Meta'       => array(
						'title'    => esc_html__( 'Meta Settings', 'authentic' ),
						'priority' => 10,
					),
					$layout . 'Typography' => array(
						'title'    => esc_html__( 'Typography Settings', 'authentic' ),
						'priority' => 45,
					),
				);

				// Add new options.
				if ( 'list' === $layout ) {
					$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
						'key'      => 'listWidth',
						'label'    => esc_html__( 'Image Width', 'authentic' ),
						'section'  => 'general',
						'type'     => 'select',
						'multiple' => false,
						'choices'  => array(
							'5' => esc_html__( 'One Third', 'authentic' ),
							'6' => esc_html__( 'Half', 'authentic' ),
						),
						'default'  => '6',
					);
				}

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'      => 'postsHighlight',
					'label'    => esc_html__( 'Highlight Posts', 'authentic' ),
					'section'  => 'general',
					'type'     => 'select',
					'multiple' => false,
					'choices'  => array(
						'featured' => esc_html__( 'Featured', 'authentic' ),
						'all'      => esc_html__( 'All', 'authentic' ),
						'none'     => esc_html__( 'None', 'authentic' ),
					),
					'default'  => 'featured',
				);

				if ( 'standard' !== $layout ) {
					$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
						'key'     => 'firstPost',
						'label'   => esc_html__( 'Display first post as standard', 'authentic' ),
						'section' => 'general',
						'type'    => 'toggle',
						'default' => false,
					);

					$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
						'key'     => 'reduceMargin',
						'label'   => esc_html__( 'Reduce white-space between posts', 'authentic' ),
						'section' => 'general',
						'type'    => 'toggle',
						'default' => false,
					);
				}

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'     => 'video',
					'label'   => esc_html__( 'Enable video backgrounds', 'authentic' ),
					'section' => 'general',
					'type'    => 'toggle',
					'default' => false,
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'             => 'paginationType',
					'label'           => esc_html__( 'Pagination type', 'authentic' ),
					'section'         => 'pagination',
					'type'            => 'select',
					'multiple'        => false,
					'choices'         => array(
						'none'     => esc_html__( 'None', 'authentic' ),
						'standard' => esc_html__( 'Standard', 'authentic' ),
						'ajax'     => esc_html__( 'Load More', 'authentic' ),
						'infinite' => esc_html__( 'Infinite Load', 'authentic' ),
					),
					'default'         => 'none',
					'active_callback' => array(
						array(
							'field'    => 'relatedPosts',
							'operator' => '==',
							'value'    => false,
						),
						array(
							array(
								array(
									'field'    => 'query.categories',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.tags',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.orderby',
									'operator' => '===',
									'value'    => 'date',
								),
								array(
									'field'    => 'query.order',
									'operator' => '===',
									'value'    => 'DESC',
								),
								array(
									'field'    => 'query.posts_type',
									'operator' => '===',
									'value'    => 'post',
								),
								array(
									'field'    => 'query.formats',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.posts',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.offset',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'avoidDuplicatePosts',
									'operator' => '===',
									'value'    => false,
								),
							),
							array(
								array(
									'field'    => 'query.categories',
									'operator' => '!==',
									'value'    => '',
								),
								array(
									'field'    => 'query.categories',
									'count'    => ',',
									'operator' => '==',
									'value'    => 0,
								),
								array(
									'field'    => 'query.tags',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.orderby',
									'operator' => '===',
									'value'    => 'date',
								),
								array(
									'field'    => 'query.order',
									'operator' => '===',
									'value'    => 'DESC',
								),
								array(
									'field'    => 'query.posts_type',
									'operator' => '===',
									'value'    => 'post',
								),
								array(
									'field'    => 'query.formats',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.posts',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.offset',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'avoidDuplicatePosts',
									'operator' => '===',
									'value'    => false,
								),
							),
							array(
								array(
									'field'    => 'query.tags',
									'count'    => ',',
									'operator' => '==',
									'value'    => 0,
								),
								array(
									'field'    => 'query.categories',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.orderby',
									'operator' => '===',
									'value'    => 'date',
								),
								array(
									'field'    => 'query.order',
									'operator' => '===',
									'value'    => 'DESC',
								),
								array(
									'field'    => 'query.posts_type',
									'operator' => '===',
									'value'    => 'post',
								),
								array(
									'field'    => 'query.formats',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.posts',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.offset',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'avoidDuplicatePosts',
									'operator' => '===',
									'value'    => false,
								),
							),
						),
					),
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'             => 'paginationTypeAlt',
					'label'           => esc_html__( 'Pagination type', 'authentic' ),
					'section'         => 'pagination',
					'type'            => 'select',
					'multiple'        => false,
					'choices'         => array(
						'none'     => esc_html__( 'None', 'authentic' ),
						'ajax'     => esc_html__( 'Load More', 'authentic' ),
						'infinite' => esc_html__( 'Infinite Load', 'authentic' ),
					),
					'default'         => 'none',
					'active_callback' => array(
						array(
							'field'    => 'relatedPosts',
							'operator' => '==',
							'value'    => false,
						),
						array(
							array(
								'field'    => 'query.orderby',
								'operator' => '!==',
								'value'    => 'date',
							),
							array(
								'field'    => 'query.order',
								'operator' => '!==',
								'value'    => 'DESC',
							),
							array(
								'field'    => 'query.posts_type',
								'operator' => '!==',
								'value'    => 'post',
							),
							array(
								'field'    => 'query.formats',
								'operator' => '!==',
								'value'    => '',
							),
							array(
								'field'    => 'query.posts',
								'operator' => '!==',
								'value'    => '',
							),
							array(
								'field'    => 'query.offset',
								'operator' => '!==',
								'value'    => '',
							),
							array(
								'field'    => 'avoidDuplicatePosts',
								'operator' => '!==',
								'value'    => false,
							),
							array(
								array(
									'field'    => 'query.categories',
									'operator' => '!==',
									'value'    => '',
								),
								array(
									'field'    => 'query.tags',
									'operator' => '!==',
									'value'    => '',
								),
							),
							array(
								array(
									'field'    => 'query.categories',
									'operator' => '!==',
									'value'    => '',
								),
								array(
									'field'    => 'query.categories',
									'count'    => ',',
									'operator' => '>=',
									'value'    => 1,
								),
							),
							array(
								array(
									'field'    => 'query.tags',
									'operator' => '!==',
									'value'    => '',
								),
								array(
									'field'    => 'query.tags',
									'count'    => ',',
									'operator' => '>=',
									'value'    => 1,
								),
							),
						),
					),
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'             => 'archivePostsCount',
					'label'           => esc_html__( 'Posts Count', 'authentic' ),
					'section'         => 'pagination',
					'type'            => 'number',
					'default'         => 10,
					'min'             => 1,
					'max'             => 100,
					'active_callback' => array(
						array(
							array(
								array(
									'field'    => '$#paginationType',
									'operator' => '!=',
									'value'    => 'standard',
								),
								array(
									'field'    => 'query.categories',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.tags',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.orderby',
									'operator' => '===',
									'value'    => 'date',
								),
								array(
									'field'    => 'query.order',
									'operator' => '===',
									'value'    => 'DESC',
								),
								array(
									'field'    => 'query.posts_type',
									'operator' => '===',
									'value'    => 'post',
								),
								array(
									'field'    => 'query.formats',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.posts',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.offset',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'avoidDuplicatePosts',
									'operator' => '===',
									'value'    => false,
								),
							),
							array(
								array(
									'field'    => '$#paginationType',
									'operator' => '!=',
									'value'    => 'standard',
								),
								array(
									'field'    => 'query.categories',
									'operator' => '!==',
									'value'    => '',
								),
								array(
									'field'    => 'query.categories',
									'count'    => ',',
									'operator' => '==',
									'value'    => 0,
								),
								array(
									'field'    => 'query.tags',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.orderby',
									'operator' => '===',
									'value'    => 'date',
								),
								array(
									'field'    => 'query.order',
									'operator' => '===',
									'value'    => 'DESC',
								),
								array(
									'field'    => 'query.posts_type',
									'operator' => '===',
									'value'    => 'post',
								),
								array(
									'field'    => 'query.formats',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.posts',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.offset',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'avoidDuplicatePosts',
									'operator' => '===',
									'value'    => false,
								),
							),
							array(
								array(
									'field'    => '$#paginationType',
									'operator' => '!=',
									'value'    => 'standard',
								),
								array(
									'field'    => 'query.tags',
									'count'    => ',',
									'operator' => '==',
									'value'    => 0,
								),
								array(
									'field'    => 'query.categories',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.orderby',
									'operator' => '===',
									'value'    => 'date',
								),
								array(
									'field'    => 'query.order',
									'operator' => '===',
									'value'    => 'DESC',
								),
								array(
									'field'    => 'query.posts_type',
									'operator' => '===',
									'value'    => 'post',
								),
								array(
									'field'    => 'query.formats',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.posts',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'query.offset',
									'operator' => '===',
									'value'    => '',
								),
								array(
									'field'    => 'avoidDuplicatePosts',
									'operator' => '===',
									'value'    => false,
								),
							),
							array(
								'field'    => 'query.orderby',
								'operator' => '!==',
								'value'    => 'date',
							),
							array(
								'field'    => 'query.order',
								'operator' => '!==',
								'value'    => 'DESC',
							),
							array(
								'field'    => 'query.posts_type',
								'operator' => '!==',
								'value'    => 'post',
							),
							array(
								'field'    => 'query.formats',
								'operator' => '!==',
								'value'    => '',
							),
							array(
								'field'    => 'query.posts',
								'operator' => '!==',
								'value'    => '',
							),
							array(
								'field'    => 'query.offset',
								'operator' => '!==',
								'value'    => '',
							),
							array(
								'field'    => 'avoidDuplicatePosts',
								'operator' => '!==',
								'value'    => false,
							),
							array(
								array(
									'field'    => 'query.categories',
									'operator' => '!==',
									'value'    => '',
								),
								array(
									'field'    => 'query.tags',
									'operator' => '!==',
									'value'    => '',
								),
							),
							array(
								array(
									'field'    => 'query.categories',
									'operator' => '!==',
									'value'    => '',
								),
								array(
									'field'    => 'query.categories',
									'count'    => ',',
									'operator' => '>=',
									'value'    => 1,
								),
							),
							array(
								array(
									'field'    => 'query.tags',
									'operator' => '!==',
									'value'    => '',
								),
								array(
									'field'    => 'query.tags',
									'count'    => ',',
									'operator' => '>=',
									'value'    => 1,
								),
							),
						),
					),
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'     => 'widgets',
					'label'   => esc_html__( 'Display widgets in archive', 'authentic' ),
					'section' => 'general',
					'type'    => 'toggle',
					'default' => false,
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'             => 'widgetsSidebar',
					'label'           => esc_html__( 'Widget Area', 'authentic' ),
					'section'         => 'general',
					'type'            => 'select',
					'multiple'        => false,
					'choices'         => csco_get_registered_sidebars(),
					'default'         => 'sidebar-archive',
					'active_callback' => array(
						array(
							'field'    => '$#widgets',
							'operator' => '==',
							'value'    => true,
						),
					),
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'             => 'widgetsAfter',
					'label'           => esc_html__( 'Display widgets after N-th post', 'authentic' ),
					'section'         => 'general',
					'type'            => 'number',
					'default'         => 3,
					'min'             => 1,
					'max'             => 1000,
					'active_callback' => array(
						array(
							'field'    => '$#widgets',
							'operator' => '==',
							'value'    => true,
						),
					),
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'             => 'widgetsRepeat',
					'label'           => esc_html__( 'Repeat widgets', 'authentic' ),
					'section'         => 'general',
					'type'            => 'toggle',
					'default'         => true,
					'active_callback' => array(
						array(
							'field'    => '$#widgets',
							'operator' => '==',
							'value'    => true,
						),
					),
				);

				if ( 'list' === $layout || 'grid' === $layout || 'masonry' === $layout ) {
					$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
						'key'     => 'thumbnailOrientation',
						'label'   => esc_html__( 'Image Orientation', 'authentic' ),
						'section' => 'thumbnail',
						'type'    => 'select',
						'default' => 'original',
						'choices' => array(
							'original'  => esc_html__( 'Original', 'authentic' ),
							'landscape' => esc_html__( 'Landscape', 'authentic' ),
							'portrait'  => esc_html__( 'Portrait', 'authentic' ),
							'square'    => esc_html__( 'Square', 'authentic' ),
						),
					);
				}

				// Typography.
				if ( 'list' === $layout || 'grid' === $layout || 'masonry' === $layout ) {
					$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
						'key'             => 'typographyFirstPostHeading',
						'label'           => esc_html__( 'First Post Heading Font Size', 'authentic' ),
						'section'         => $layout . 'Typography',
						'type'            => 'dimension',
						'default'         => '3rem',
						'output'          => array(
							array(
								'element'     => '$ .archive-first .entry-header .entry-title',
								'property'    => 'font-size',
								'media_query' => '@media ( min-width: 1020px )',
								'context'     => array( 'front' ),
								'suffix'      => '!important',
							),
							array(
								'element'  => '.cs-breakpoint-up-1020px $ .archive-first .entry-header .entry-title',
								'property' => 'font-size',
								'context'  => array( 'editor' ),
								'suffix'   => '!important',
							),
						),
						'active_callback' => array(
							array(
								'field'    => '$#firstPost',
								'operator' => '==',
								'value'    => true,
							),
						),
					);
				}

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'             => 'typographyFeaturedHeading',
					'label'           => esc_html__( 'Featured Post Heading Font Size', 'authentic' ),
					'section'         => $layout . 'Typography',
					'type'            => 'dimension',
					'default'         => '2.5rem',
					'output'          => array(
						array(
							'element'  => '$ .archive-main .post-featured .entry-header .entry-title',
							'property' => 'font-size',
							'suffix'   => '!important',
						),
					),
					'active_callback' => array(
						array(
							'field'    => '$#postsHighlight',
							'operator' => '!=',
							'value'    => 'none',
						),
					),
				);

				if ( 'list' === $layout || 'grid' === $layout || 'masonry' === $layout ) {
					$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
						'key'     => 'typographyHeading',
						'label'   => esc_html__( 'Post Heading Font Size', 'authentic' ),
						'section' => $layout . 'Typography',
						'type'    => 'dimension',
						'default' => '1.5rem',
						'output'  => array(
							array(
								'element'  => '$ .archive-main .entry-header .entry-title',
								'property' => 'font-size',
								'suffix'   => '!important',
							),
						),
					);
				}

				if ( 'standard' === $layout ) {
					$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
						'key'     => 'typographyHeading',
						'label'   => esc_html__( 'Post Heading Font Size', 'authentic' ),
						'section' => $layout . 'Typography',
						'type'    => 'dimension',
						'default' => '3rem',
						'output'  => array(
							array(
								'element'  => '$ .archive-main .entry-header .entry-title',
								'property' => 'font-size',
								'suffix'   => '!important',
							),
						),
					);
				}

				// Color Settings.
				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'     => 'colorBasicHeading',
					'label'   => esc_html__( 'Heading', 'authentic' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ article:not(.post-featured) .entry-header .entry-title a',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'     => 'colorBasicHeadingHover',
					'label'   => esc_html__( 'Heading Hover', 'authentic' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ article:not(.post-featured) .entry-header .entry-title a:hover, $ article:not(.post-featured) .entry-header .entry-title a:focus',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'             => 'colorBasicExcerpt',
					'label'           => esc_html__( 'Excerpt', 'authentic' ),
					'section'         => 'color',
					'type'            => 'color',
					'output'          => array(
						array(
							'element'  => '$ article:not(.post-featured) .post-excerpt',
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
					),
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'     => 'colorBasicMeta',
					'label'   => esc_html__( 'Post Meta', 'authentic' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ article:not(.post-featured) .entry-header .post-meta li, $ article:not(.post-featured) .entry-header .post-categories li',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'     => 'colorBasicMetaLinks',
					'label'   => esc_html__( 'Post Meta Links', 'authentic' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ article:not(.post-featured) .entry-header .post-meta a',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'     => 'colorBasicMetaLinksHover',
					'label'   => esc_html__( 'Post Meta Links Hover', 'authentic' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ article:not(.post-featured) .entry-header .post-meta a:hover, $ article:not(.post-featured) .entry-header .post-meta a:focus',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'     => 'colorBasicCategoriesLinks',
					'label'   => esc_html__( 'Post Categories Links', 'authentic' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ article:not(.post-featured) .entry-header .post-categories a',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'][] = array(
					'key'     => 'colorBasicCategoriesLinksHover',
					'label'   => esc_html__( 'Post Categories Links Hover', 'authentic' ),
					'section' => 'color',
					'type'    => 'color',
					'output'  => array(
						array(
							'element'  => '$ article:not(.post-featured) .entry-header .post-categories a:hover, $ .entry-header .post-categories a:focus',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'] = array_merge(
					csco_get_gutenberg_view_link_fields(
						array(
							'field_prefix'    => 'archive',
							'section_name'    => $layout . 'Meta',
							'default'         => true,
							'active_callback' => array(),
						)
					),
					$blocks[ $key ]['layouts'][ $layout ]['fields']
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'] = array_merge(
					csco_get_gutenberg_button_fields(
						array(
							'field_prefix'    => 'archive',
							'section_name'    => $layout . 'Meta',
							'default'         => true,
							'active_callback' => array(),
						)
					),
					$blocks[ $key ]['layouts'][ $layout ]['fields']
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'] = array_merge(
					csco_get_gutenberg_excerpt_fields(
						array(
							'field_prefix'    => 'archive',
							'section_name'    => $layout . 'Meta',
							'default'         => true,
							'active_callback' => array(
								array(
									array(
										'field'    => 'layout',
										'operator' => '!=',
										'value'    => 'standard',
									),
									array(
										array(
											'field'    => 'layout',
											'operator' => '==',
											'value'    => 'standard',
										),
										array(
											'field'    => '$#standardSummary',
											'operator' => '!=',
											'value'    => 'content',
										),
									),
								),
							),
						)
					),
					$blocks[ $key ]['layouts'][ $layout ]['fields']
				);

				$blocks[ $key ]['layouts'][ $layout ]['fields'] = array_merge(
					csco_get_gutenberg_meta_fields(
						array(
							'field_prefix'    => 'archive',
							'section_name'    => $layout . 'Meta',
							'active_callback' => array(),
						)
					),
					$blocks[ $key ]['layouts'][ $layout ]['fields']
				);
			}
		}
	}

	return $blocks;
}
add_filter( 'canvas_register_block_type', 'csco_canvas_change_posts' );

/**
 * Change post query by posts attributes
 *
 * @param array $args       Args for post query.
 * @param array $attributes Block attributes.
 * @param array $options    Block options.
 */
function csco_canvas_posts_query_args( $args, $attributes, $options ) {

	// Posts count.
	if ( isset( $options['archivePostsCount'] ) && $options['archivePostsCount'] ) {
		$args['posts_per_page'] = $options['archivePostsCount'];
	}

	return $args;
}
add_filter( 'canvas_block_posts_query_args', 'csco_canvas_posts_query_args', 10, 3 );
