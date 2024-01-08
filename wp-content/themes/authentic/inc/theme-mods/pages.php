<?php
/**
 * Pages
 *
 * @package Authentic
 */

CSCO_Customizer::add_section(
	'page',
	array(
		'title' => esc_html__( 'Pages Settings', 'authentic' ),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Pages > Page Layout ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'page_collapsible_page_layout',
		'section'  => 'page',
		'label'    => esc_html__( 'Page Layout', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'        => 'checkbox',
		'settings'    => 'page_layout_default',
		'label'       => esc_html__( 'Default Settings', 'authentic' ),
		'description' => esc_html__( 'You may change the default settings in Layout Settings &rarr; ', 'authentic' ) . esc_html__( 'Page Layout', 'authentic' ),
		'section'     => 'page',
		'default'     => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'radio',
		'settings'        => 'page_layout',
		'label'           => esc_html__( 'Sidebar', 'authentic' ),
		'section'         => 'page',
		'default'         => 'layout-sidebar-right',
		'choices'         => array(
			'layout-sidebar-left'  => esc_html__( 'Sidebar Left', 'authentic' ),
			'layout-sidebar-right' => esc_html__( 'Sidebar Right', 'authentic' ),
			'layout-fullwidth'     => esc_html__( 'Fullwidth', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'page_layout_default',
				'operator' => '==',
				'value'    => false,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Pages > Page Header ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'page_collapsible_page_header',
		'section'  => 'page',
		'label'    => esc_html__( 'Page Header', 'authentic' ),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'        => 'checkbox',
		'settings'    => 'page_page_header_default',
		'label'       => esc_html__( 'Default Settings', 'authentic' ),
		'description' => esc_html__( 'You may change the default settings in Layout Settings &rarr; ', 'authentic' ) . esc_html__( 'Page Header', 'authentic' ),
		'section'     => 'page',
		'default'     => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'page_page_header',
		'label'           => esc_html__( 'Type', 'authentic' ),
		'description'     => esc_html__( 'You may also change the page header type on per page basis, when editing a page.', 'authentic' ),
		'section'         => 'page',
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
				'setting'  => 'page_page_header_default',
				'operator' => '==',
				'value'    => false,
			),
		),
	)
);
