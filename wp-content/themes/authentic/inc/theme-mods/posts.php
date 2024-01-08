<?php
/**
 * Posts
 *
 * @package Authentic
 */

CSCO_Customizer::add_section(
	'post',
	array(
		'title' => esc_html__( 'Posts Settings', 'authentic' ),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Posts > Page Layout ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'post_collapsible_page_layout',
		'section'  => 'post',
		'label'    => esc_html__( 'Page Layout', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'        => 'checkbox',
		'settings'    => 'post_layout_default',
		'label'       => esc_html__( 'Default Settings', 'authentic' ),
		'description' => esc_html__( 'You may change the default settings in Layout Settings &rarr; ', 'authentic' ) . esc_html__( 'Page Layout', 'authentic' ),
		'section'     => 'post',
		'default'     => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'radio',
		'settings'        => 'post_layout',
		'label'           => esc_html__( 'Sidebar', 'authentic' ),
		'section'         => 'post',
		'default'         => 'layout-sidebar-right',
		'choices'         => array(
			'layout-sidebar-left'  => esc_html__( 'Sidebar Left', 'authentic' ),
			'layout-sidebar-right' => esc_html__( 'Sidebar Right', 'authentic' ),
			'layout-fullwidth'     => esc_html__( 'Fullwidth', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'post_layout_default',
				'operator' => '==',
				'value'    => false,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'        => 'checkbox',
		'settings'    => 'post_fullwidth_narrow',
		'label'       => esc_html__( 'Narrow fullwidth posts', 'authentic' ),
		'description' => esc_html__( 'If enabled, the content width of fullwidth posts will be narrow for better readability.', 'authentic' ),
		'section'     => 'post',
		'default'     => true,

	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Posts > Page Header ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'post_collapsible_page_header',
		'section'  => 'post',
		'label'    => esc_html__( 'Page Header', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'        => 'checkbox',
		'settings'    => 'post_page_header_default',
		'label'       => esc_html__( 'Default Settings', 'authentic' ),
		'description' => esc_html__( 'You may change the default settings in Layout Settings &rarr; ', 'authentic' ) . esc_html__( 'Page Header', 'authentic' ),
		'section'     => 'post',
		'default'     => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'post_page_header',
		'label'           => esc_html__( 'Type', 'authentic' ),
		'description'     => esc_html__( 'You may also change the page header type on per post basis, when editing a post.', 'authentic' ),
		'section'         => 'post',
		'default'         => 'simple',

		'choices'         => array(
			'none'   => esc_html__( 'None', 'authentic' ),
			'simple' => esc_html__( 'Simple', 'authentic' ),
			'small'  => esc_html__( 'Small', 'authentic' ),
			'wide'   => esc_html__( 'Wide', 'authentic' ),
			'large'  => esc_html__( 'Large', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'post_page_header_default',
				'operator' => '==',
				'value'    => false,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Posts > Featured Image ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'post_collapsible_featured_image',
		'section'  => 'post',
		'label'    => esc_html__( 'Featured Image', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'        => 'checkbox',
		'settings'    => 'post_featured_image',
		'label'       => esc_html__( 'Display featured image', 'authentic' ),
		'description' => esc_html__( 'If post format is not set the featured image will be displayed below the post title. Works only if page header is set to simple.', 'authentic' ),
		'section'     => 'post',
		'default'     => true,

	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Posts > Author ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'post_collapsible_author',
		'section'  => 'post',
		'label'    => esc_html__( 'Post Author', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'post_author',
		'label'    => esc_html__( 'Post Author', 'authentic' ),
		'section'  => 'post',
		'default'  => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'post_author_type',
		'label'           => esc_html__( 'Type', 'authentic' ),
		'section'         => 'post',
		'default'         => 'default',

		'choices'         => array(
			'default' => esc_html__( 'Default', 'authentic' ),
			'compact' => esc_html__( 'Compact', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'post_author',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Posts > Tags ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'post_collapsible_tags',
		'section'  => 'post',
		'label'    => esc_html__( 'Post Tags', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'post_tags',
		'label'    => esc_html__( 'Post Tags', 'authentic' ),
		'section'  => 'post',
		'default'  => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'              => 'text',
		'settings'          => 'post_tags_title',
		'label'             => esc_html__( 'Title', 'authentic' ),
		'section'           => 'post',
		'default'           => esc_html__( 'Related Topics', 'authentic' ),

		'sanitize_callback' => 'wp_kses_post',
		'active_callback'   => array(
			array(
				'setting'  => 'post_tags',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Posts > Subscribe ]
 * -------------------------------------------------------------------------
 */
if ( csco_powerkit_module_enabled( 'opt_in_forms' ) ) {

	CSCO_Customizer::add_field(
		array(
			'type'     => 'collapsible',
			'settings' => 'post_collapsible_subscribe',
			'section'  => 'post',
			'label'    => esc_html__( 'Subscribe', 'authentic' ),

		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'     => 'checkbox',
			'settings' => 'post_subscribe',
			'label'    => esc_html__( 'Subscribe', 'authentic' ),
			'section'  => 'post',
			'default'  => false,
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'checkbox',
			'settings'        => 'post_subscribe_name',
			'label'           => esc_html__( 'Display first name field', 'authentic' ),
			'section'         => 'post',
			'default'         => false,

			'active_callback' => array(
				array(
					'setting'  => 'post_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'              => 'text',
			'settings'          => 'post_subscribe_title',
			'label'             => esc_html__( 'Title', 'authentic' ),
			'section'           => 'post',
			'default'           => esc_html__( 'Subscribe', 'authentic' ),

			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => array(
				array(
					'setting'  => 'post_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'              => 'text',
			'settings'          => 'post_subscribe_message',
			'label'             => esc_html__( 'Message', 'authentic' ),
			'section'           => 'post',
			'default'           => esc_html__( 'Subscribe now to our newsletter', 'authentic' ),

			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => array(
				array(
					'setting'  => 'post_subscribe',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);
}

/**
 * -------------------------------------------------------------------------
 * |- [ Posts > Pagination ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'post_collapsible_pagination',
		'section'  => 'post',
		'label'    => esc_html__( 'Post Pagination', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'post_pagination',
		'label'    => esc_html__( 'Post Pagination', 'authentic' ),
		'section'  => 'post',
		'default'  => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'post_pagination_current',
		'label'           => esc_html__( 'Display posts from the current post\'s categories only', 'authentic' ),
		'section'         => 'post',
		'default'         => false,

		'active_callback' => array(
			array(
				'setting'  => 'post_pagination',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Posts > Post Carousel ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'post_collapsible_carousel',
		'section'  => 'post',
		'label'    => esc_html__( 'Post Carousel', 'authentic' ),
	)
);

if ( function_exists( 'cnvs' ) ) {

	CSCO_Customizer::add_field(
		array(
			'type'     => 'checkbox',
			'settings' => 'post_carousel',
			'label'    => esc_html__( 'Post Carousel', 'authentic' ),
			'section'  => 'post',
			'default'  => true,
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'              => 'text',
			'settings'          => 'post_carousel_title',
			'label'             => esc_html__( 'Title', 'authentic' ),
			'section'           => 'post',
			'default'           => esc_html__( 'You May Also Like', 'authentic' ),
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => array(
				array(
					'setting'  => 'post_carousel',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'text',
			'settings'        => 'post_carousel_slides',
			'label'           => esc_html__( 'Total Slides', 'authentic' ),
			'section'         => 'post',
			'default'         => 8,
			'active_callback' => array(
				array(
					'setting'  => 'post_carousel',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'checkbox',
			'settings'        => 'post_carousel_current',
			'label'           => esc_html__( 'Display posts from the current post\'s categories only', 'authentic' ),
			'section'         => 'post',
			'default'         => true,
			'active_callback' => array(
				array(
					'setting'  => 'post_carousel',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'select',
			'settings'        => 'post_carousel_source',
			'label'           => esc_html__( 'Source', 'authentic' ),
			'section'         => 'post',
			'default'         => 'all',
			'choices'         => csco_get_post_sources(),
			'active_callback' => array(
				array(
					'setting'  => 'post_carousel',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'text',
			'settings'        => 'post_carousel_source_category_slug',
			'label'           => esc_html__( 'Slug', 'authentic' ),
			'section'         => 'post',
			'default'         => '',
			'active_callback' => array(
				array(
					'setting'  => 'post_carousel',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'post_carousel_source',
					'operator' => '==',
					'value'    => 'category',
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'text',
			'settings'        => 'post_carousel_source_tag_slug',
			'label'           => esc_html__( 'Slug', 'authentic' ),
			'section'         => 'post',
			'default'         => '',
			'active_callback' => array(
				array(
					'setting'  => 'post_carousel',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'post_carousel_source',
					'operator' => '==',
					'value'    => 'tag',
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'text',
			'settings'        => 'post_carousel_source_posts_slug',
			'label'           => esc_html__( 'IDs', 'authentic' ),
			'section'         => 'post',
			'default'         => '',
			'active_callback' => array(
				array(
					'setting'  => 'post_carousel',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'post_carousel_source',
					'operator' => '==',
					'value'    => 'posts',
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'select',
			'settings'        => 'post_carousel_orderby',
			'label'           => esc_html__( 'Order By', 'authentic' ),
			'section'         => 'post',
			'default'         => 'date',
			'choices'         => array(
				'date'  => esc_html__( 'Date', 'authentic' ),
				'views' => esc_html__( 'Views', 'authentic' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'post_carousel',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'text',
			'settings'        => 'post_carousel_time_frame',
			'label'           => esc_html__( 'Time Frame', 'authentic' ),
			'description'     => esc_html__( 'Input period of posts in English, i.e. &laquo;2 months&raquo;, &laquo;14 days&raquo; or even &laquo;1 year&raquo;', 'authentic' ),
			'section'         => 'post',
			'default'         => '',
			'active_callback' => array(
				array(
					'setting'  => 'post_carousel',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'post_carousel_orderby',
					'operator' => '==',
					'value'    => 'views',
				),
			),
		)
	);
	CSCO_Customizer::add_field(
		array(
			'type'     => 'multicheck',
			'settings' => 'post_carousel_post_meta',
			'label'    => esc_attr__( 'Post Meta', 'authentic' ),
			'section'  => 'post',
			'default'  => array( 'date', 'author', 'category' ),
			'choices'  => apply_filters(
				'csco_post_meta_choices',
				array(
					'category'     => esc_html__( 'Category', 'authentic' ),
					'author'       => esc_html__( 'Author', 'authentic' ),
					'date'         => esc_html__( 'Date', 'authentic' ),
					'comments'     => esc_html__( 'Comments', 'authentic' ),
					'views'        => esc_html__( 'Views', 'authentic' ),
					'reading_time' => esc_html__( 'Reading Time', 'authentic' ),
				)
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'select',
			'settings'        => 'post_carousel_orientation',
			'label'           => esc_html__( 'Image Orientation', 'authentic' ),
			'section'         => 'post',
			'default'         => 'landscape',
			'choices'         => array(
				'original'  => esc_html__( 'Original', 'authentic' ),
				'landscape' => esc_html__( 'Landscape', 'authentic' ),
				'portrait'  => esc_html__( 'Portrait', 'authentic' ),
				'square'    => esc_html__( 'Square', 'authentic' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'post_carousel',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'typography',
			'settings'        => 'post_carousel_heading',
			'label'           => esc_html__( 'Heading', 'authentic' ),
			'section'         => 'post',
			'default'         => array(
				'font-size' => '1rem',
			),
			'active_callback' => array(
				array(
					'setting'  => 'post_carousel',
					'operator' => '==',
					'value'    => true,
				),
			),
			'output'          => array(
				array(
					'element'     => '.site-main > article > .section-carousel h2',
					'media_query' => '@media ( min-width: 970px )',
				),
			),
		)
	);

} else {
	CSCO_Customizer::add_field(
		array(
			'type'     => 'collapsible',
			'settings' => 'post_collapsible_carousel_msg',
			'section'  => 'post',
			'default'  => '<p>' . esc_html__( 'Please install the Canvas plugin to take full advantage of this theme\'s customizer capabilities', 'authentic' ) . '</p>',
		)
	);
}

/**
 * -------------------------------------------------------------------------
 * |- [ Posts > Auto Load Next Post ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'post_collapsible_load_nextpost',
		'section'  => 'post',
		'label'    => esc_html__( 'Auto Load Next Post', 'authentic' ),
	)
);
CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'post_load_nextpost',
		'label'    => esc_html__( 'Enable the Auto Load Next Post feature', 'authentic' ),
		'section'  => 'post',
		'default'  => false,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'post_load_nextpost_same_category',
		'label'           => esc_html__( 'Auto load posts from the same category only', 'authentic' ),
		'section'         => 'post',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'post_load_nextpost',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'post_load_nextpost_reverse',
		'label'           => esc_html__( 'Auto load previous posts instead of next ones', 'authentic' ),
		'section'         => 'post',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'post_load_nextpost',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);
