<?php
/**
 * Homepage
 *
 * @package Authentic
 */

/**
 * Removes default WordPress Static Front Page section
 * and re-adds it in our own panel with the same parameters.
 *
 * @param object $wp_customize Instance of the WP_Customize_Manager class.
 */
function csco_reorder_customizer_settings( $wp_customize ) {

	// Get current front page section parameters.
	$static_front_page = $wp_customize->get_section( 'static_front_page' );

	// Remove existing section, so that we can later re-add it to our panel.
	$wp_customize->remove_section( 'static_front_page' );

	// Re-add static front page section with a new name, but same description.
	$wp_customize->add_section(
		'static_front_page',
		array(
			'title'           => esc_html__( 'Static Front Page', 'authentic' ),
			'description'     => $static_front_page->description,
			'panel'           => 'home_panel',
			'active_callback' => $static_front_page->active_callback,
		)
	);
}
add_action( 'customize_register', 'csco_reorder_customizer_settings' );

CSCO_Customizer::add_panel(
	'home_panel',
	array(
		'title' => esc_html__( 'Homepage Settings', 'authentic' ),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Homepage > Page Layout ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'home_page_layout',
	array(
		'title' => esc_html__( 'Page Layout', 'authentic' ),
		'panel' => 'home_panel',
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'home_layout_default',
		'label'           => esc_html__( 'Default Settings', 'authentic' ),
		'description'     => esc_html__( 'You may change the default settings in Layout Settings &rarr; ', 'authentic' ) . esc_html__( 'Page Layout', 'authentic' ),
		'section'         => 'home_page_layout',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'radio',
		'settings'        => 'home_layout',
		'label'           => esc_html__( 'Sidebar', 'authentic' ),
		'section'         => 'home_page_layout',
		'default'         => 'layout-sidebar-right',
		'choices'         => array(
			'layout-sidebar-left'  => esc_html__( 'Sidebar Left', 'authentic' ),
			'layout-sidebar-right' => esc_html__( 'Sidebar Right', 'authentic' ),
			'layout-fullwidth'     => esc_html__( 'Fullwidth', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
			array(
				'setting'  => 'home_layout_default',
				'operator' => '==',
				'value'    => false,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Homepage > Archive ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'home_post_archive',
	array(
		'title' => esc_html__( 'Post Archive', 'authentic' ),
		'panel' => 'home_panel',
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'home_archive_default',
		'label'           => esc_html__( 'Default Settings', 'authentic' ),
		'description'     => esc_html__( 'You may change the default settings in Layout Settings &rarr; ', 'authentic' ) . esc_html__( 'Post Archive', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
		),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'radio',
		'settings'        => 'home_archive_type',
		'label'           => esc_html__( 'Type', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => 'standard',
		'choices'         => array(
			'standard' => esc_html__( 'Full', 'authentic' ),
			'list'     => esc_html__( 'List', 'authentic' ),
			'grid'     => esc_html__( 'Grid', 'authentic' ),
			'masonry'  => esc_html__( 'Masonry', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
			array(
				'setting'  => 'home_archive_default',
				'operator' => '==',
				'value'    => false,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'home_columns',
		'label'           => esc_html__( 'Columns', 'authentic' ),
		'description'     => esc_html__( 'Three- and four-column layouts are visible on larger screens only.', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => '2',
		'choices'         => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'show_on_front',
					'operator' => '!=',
					'value'    => 'page',
				),
			),
			array(
				array(
					'setting'  => 'home_archive_default',
					'operator' => '==',
					'value'    => false,
				),
			),
			array(
				array(
					'setting'  => 'home_archive_type',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'home_archive_type',
					'operator' => '==',
					'value'    => 'masonry',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'home_first_post',
		'label'           => esc_html__( 'Display first post as standard', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => true,
		'active_callback' => array(
			array(
				array(
					'setting'  => 'show_on_front',
					'operator' => '!=',
					'value'    => 'page',
				),
			),
			array(
				array(
					'setting'  => 'home_archive_default',
					'operator' => '==',
					'value'    => false,
				),
			),
			array(
				array(
					'setting'  => 'home_archive_type',
					'operator' => '!=',
					'value'    => 'standard',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'home_meta_category',
		'label'           => esc_html__( 'Display post category', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
			array(
				'setting'  => 'home_archive_default',
				'operator' => '==',
				'value'    => false,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'home_meta',
		'label'           => esc_html__( 'Display post meta', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
			array(
				'setting'  => 'home_archive_default',
				'operator' => '==',
				'value'    => false,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'home_summary',
		'label'           => esc_html__( 'Display post summary', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
			array(
				'setting'  => 'home_archive_default',
				'operator' => '==',
				'value'    => false,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'home_standard_summary',
		'label'           => esc_html__( 'Standard Post Summary', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => 'excerpt',
		'choices'         => array(
			'excerpt' => esc_html__( 'Post Excerpt', 'authentic' ),
			'content' => esc_html__( 'Post Content', 'authentic' ),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'show_on_front',
					'operator' => '!=',
					'value'    => 'page',
				),
			),
			array(
				array(
					'setting'  => 'home_archive_default',
					'operator' => '==',
					'value'    => false,
				),
			),
			array(
				array(
					'setting'  => 'home_summary',
					'operator' => '==',
					'value'    => true,
				),
			),
			array(
				array(
					'setting'  => 'home_archive_type',
					'operator' => '==',
					'value'    => 'standard',
				),
				array(
					'setting'  => 'home_first_post',
					'operator' => '==',
					'value'    => true,
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'home_more_button',
		'label'           => esc_html__( 'Display View Post button', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
			array(
				'setting'  => 'home_archive_default',
				'operator' => '==',
				'value'    => false,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'home_reduce_margin',
		'label'           => esc_html__( 'Reduce white-space between posts', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
			array(
				'setting'  => 'home_archive_default',
				'operator' => '==',
				'value'    => false,
			),
			array(
				'setting'  => 'home_archive_type',
				'operator' => '!=',
				'value'    => 'standard',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'home_orientation',
		'label'           => esc_html__( 'Image Orientation', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => 'landscape',
		'choices'         => array(
			'original'  => esc_html__( 'Original', 'authentic' ),
			'landscape' => esc_html__( 'Landscape', 'authentic' ),
			'portrait'  => esc_html__( 'Portrait', 'authentic' ),
			'square'    => esc_html__( 'Square', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
			array(
				'setting'  => 'home_archive_default',
				'operator' => '==',
				'value'    => false,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'home_list_width',
		'label'           => esc_html__( 'Image Width', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => '4',
		'choices'         => array(
			'5' => esc_html__( 'One Third', 'authentic' ),
			'6' => esc_html__( 'Half', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
			array(
				'setting'  => 'home_archive_default',
				'operator' => '==',
				'value'    => false,
			),
			array(
				'setting'  => 'home_archive_type',
				'operator' => '==',
				'value'    => 'list',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'home_highlight',
		'label'           => esc_html__( 'Highlight Posts', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => 'featured',
		'choices'         => array(
			'featured' => esc_html__( 'Featured', 'authentic' ),
			'all'      => esc_html__( 'All', 'authentic' ),
			'none'     => esc_html__( 'None', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
			array(
				'setting'  => 'home_archive_default',
				'operator' => '==',
				'value'    => false,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'home_pagination_type',
		'label'           => esc_html__( 'Pagination', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => 'standard',
		'choices'         => array(
			'standard' => esc_html__( 'Standard', 'authentic' ),
			'ajax'     => esc_html__( 'Load More', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
			array(
				'setting'  => 'home_archive_default',
				'operator' => '==',
				'value'    => false,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'home_infinite_load',
		'label'           => esc_html__( 'Infinite Load', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
			array(
				'setting'  => 'home_archive_default',
				'operator' => '==',
				'value'    => false,
			),
			array(
				'setting'  => 'home_pagination_type',
				'operator' => '==',
				'value'    => 'ajax',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'home_widgets',
		'label'           => esc_html__( 'Display widgets in archive', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
			array(
				'setting'  => 'home_archive_default',
				'operator' => '==',
				'value'    => false,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'number',
		'settings'        => 'home_widgets_after',
		'label'           => esc_html__( 'Display widgets after N-th post', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => 3,
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
			array(
				'setting'  => 'home_archive_default',
				'operator' => '==',
				'value'    => false,
			),
			array(
				'setting'  => 'home_widgets',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'home_widgets_repeat',
		'label'           => esc_html__( 'Repeat widgets', 'authentic' ),
		'section'         => 'home_post_archive',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'show_on_front',
				'operator' => '!=',
				'value'    => 'page',
			),
			array(
				'setting'  => 'home_archive_default',
				'operator' => '==',
				'value'    => false,
			),
			array(
				'setting'  => 'home_widgets',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);
