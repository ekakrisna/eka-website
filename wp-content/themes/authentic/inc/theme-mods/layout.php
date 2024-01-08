<?php
/**
 * Layout
 *
 * @package Authentic
 */

CSCO_Customizer::add_panel(
	'layout', array(
		'title'    => esc_html__( 'Layout Settings', 'authentic' ),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Layout > Page Layout ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'layout', array(
		'title'    => esc_html__( 'Page Layout', 'authentic' ),
		'panel'    => 'layout',

	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'radio',
		'settings' => 'layout',
		'label'    => esc_html__( 'Sidebar', 'authentic' ),
		'section'  => 'layout',
		'default'  => 'layout-sidebar-right',
		'choices'  => array(
			'layout-sidebar-left'  => esc_html__( 'Sidebar Left', 'authentic' ),
			'layout-sidebar-right' => esc_html__( 'Sidebar Right', 'authentic' ),
			'layout-fullwidth'     => esc_html__( 'Fullwidth', 'authentic' ),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Layout > Top Bar ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'topbar', array(
		'title'    => esc_html__( 'Top Bar', 'authentic' ),
		'panel'    => 'layout',
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'topbar_collapsible_layout_common',
		'section'  => 'topbar',
		'label'    => esc_html__( 'Top Bar', 'authentic' ),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'topbar',
		'label'    => esc_html__( 'Top Bar', 'authentic' ),
		'section'  => 'topbar',
		'default'  => true,
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Top Bar > Layout ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'            => 'collapsible',
		'settings'        => 'topbar_collapsible_layout',
		'section'         => 'topbar',
		'label'         => esc_html__( 'Layout', 'authentic' ),
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'topbar_container',
		'label'           => esc_html__( 'Container', 'authentic' ),
		'section'         => 'topbar',
		'default'         => 'cs-container',
		'choices'         => array(
			'cs-container' => esc_html__( 'Boxed', 'authentic' ),
			'navbar-fluid' => esc_html__( 'Fullwidth', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'dimension',
		'settings' => 'topbar_height',
		'label'    => esc_html__( 'Height', 'authentic' ),
		'section'  => 'topbar',
		'default'  => '40px',
		'output'   => array(
			array(
				'element'  => '.topbar .navbar',
				'property' => 'height',
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Top Bar > Left Column ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'            => 'collapsible',
		'settings'        => 'topbar_collapsible_content_left',
		'section'         => 'topbar',
		'label'           => esc_html__( 'Left Column', 'authentic' ),
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'topbar_content_left_select',
		'label'           => esc_html__( 'Type', 'authentic' ),
		'section'         => 'topbar',
		'default'         => 'menu',
		'choices'         => csco_get_header_content_select( array( 'menu', 'search', 'social', 'cart', 'html', 'none' ) ),
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'topbar_content_left_menu',
		'label'           => esc_html__( 'Menu', 'authentic' ),
		'section'         => 'topbar',
		'default'         => csco_get_default_menu(),
		'choices'         => csco_get_menus(),
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'topbar_content_left_select',
				'operator' => '==',
				'value'    => 'menu',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'textarea',
		'settings'        => 'topbar_content_left_html',
		'label'           => esc_html__( 'HTML', 'authentic' ),
		'section'         => 'topbar',
		'default'         => '',
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'topbar_content_left_select',
				'operator' => '==',
				'value'    => 'html',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'topbar_content_left_social_accounts_labels',
		'label'           => esc_html__( 'Labels', 'authentic' ),
		'section'         => 'topbar',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'topbar_content_left_select',
				'operator' => '==',
				'value'    => 'social',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'topbar_content_left_social_accounts_titles',
		'label'           => esc_html__( 'Titles', 'authentic' ),
		'section'         => 'topbar',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'topbar_content_left_select',
				'operator' => '==',
				'value'    => 'social',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'topbar_content_left_social_accounts_counts',
		'label'           => esc_html__( 'Counts', 'authentic' ),
		'section'         => 'topbar',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'topbar_content_left_select',
				'operator' => '==',
				'value'    => 'social',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'number',
		'settings'        => 'topbar_content_left_social_accounts_limit',
		'label'           => esc_html__( 'Limit', 'authentic' ),
		'description'     => esc_html__( 'Number of social accounts.', 'authentic' ),
		'section'         => 'topbar',
		'default'         => 3,
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'topbar_content_left_select',
				'operator' => '==',
				'value'    => 'social',
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Top Bar > Right Column ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'            => 'collapsible',
		'settings'        => 'topbar_collapsible_content_right',
		'section'         => 'topbar',
		'label'           => esc_html__( 'Right Column', 'authentic' ),
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'topbar_content_right_select',
		'label'           => esc_html__( 'Type', 'authentic' ),
		'section'         => 'topbar',
		'default'         => 'social',
		'choices'         => csco_get_header_content_select( array( 'menu', 'search', 'social', 'cart', 'html', 'none' ) ),
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'topbar_content_right_menu',
		'label'           => esc_html__( 'Menu', 'authentic' ),
		'section'         => 'topbar',
		'default'         => csco_get_default_menu(),
		'choices'         => csco_get_menus(),
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'topbar_content_right_select',
				'operator' => '==',
				'value'    => 'menu',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'textarea',
		'settings'        => 'topbar_content_right_html',
		'label'           => esc_html__( 'HTML', 'authentic' ),
		'section'         => 'topbar',
		'default'         => '',
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'topbar_content_right_select',
				'operator' => '==',
				'value'    => 'html',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'topbar_content_right_social_accounts_labels',
		'label'           => esc_html__( 'Labels', 'authentic' ),
		'section'         => 'topbar',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'topbar_content_right_select',
				'operator' => '==',
				'value'    => 'social',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'topbar_content_right_social_accounts_titles',
		'label'           => esc_html__( 'Titles', 'authentic' ),
		'section'         => 'topbar',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'topbar_content_right_select',
				'operator' => '==',
				'value'    => 'social',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'topbar_content_right_social_accounts_counts',
		'label'           => esc_html__( 'Counts', 'authentic' ),
		'section'         => 'topbar',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'topbar_content_right_select',
				'operator' => '==',
				'value'    => 'social',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'number',
		'settings'        => 'topbar_content_right_social_accounts_limit',
		'label'           => esc_html__( 'Limit', 'authentic' ),
		'description'     => esc_html__( 'Number of social accounts.', 'authentic' ),
		'section'         => 'topbar',
		'default'         => 3,
		'active_callback' => array(
			array(
				'setting'  => 'topbar',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'topbar_content_right_select',
				'operator' => '==',
				'value'    => 'social',
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Layout > Header ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'header', array(
		'title' => esc_html__( 'Header', 'authentic' ),
		'panel' => 'layout',

	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'header',
		'label'    => esc_html__( 'Header', 'authentic' ),
		'section'  => 'header',
		'default'  => true,
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Header > General ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'            => 'collapsible',
		'settings'        => 'header_collapsible_general',
		'section'         => 'header',
		'label'           => esc_html__( 'General', 'authentic' ),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'radio',
		'settings'        => 'header_layout',
		'label'           => esc_html__( 'Layout', 'authentic' ),
		'section'         => 'header',
		'default'         => 'center',
		'choices'         => array(
			'center' => esc_html__( 'Center', 'authentic' ),
			'left'   => esc_html__( 'Left', 'authentic' ),
			'logo'   => esc_html__( 'Logo', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'header_container',
		'label'           => esc_html__( 'Container', 'authentic' ),
		'section'         => 'header',
		'default'         => 'cs-container',
		'choices'         => array(
			'cs-container'       => esc_html__( 'Boxed', 'authentic' ),
			'cs-container-fluid' => esc_html__( 'Fullwidth', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'dimension',
		'settings'        => 'header_height',
		'label'           => esc_html__( 'Height', 'authentic' ),
		'section'         => 'header',
		'default'         => '100px',
		'output'          => array(
			array(
				'element'     => '.header-col',
				'property'    => 'height',
				'media_query' => '@media ( min-width: 970px )',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'header_home_only',
		'label'           => esc_html__( 'Display on homepage only', 'authentic' ),
		'section'         => 'header',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Header > Logo ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'            => 'collapsible',
		'settings'        => 'header_collapsible_logo',
		'section'         => 'header',
		'label'           => esc_html__( 'Logo', 'authentic' ),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'header_logo_select',
		'label'           => esc_html__( 'Type', 'authentic' ),
		'section'         => 'header',
		'default'         => 'text',
		'choices'         => array(
			'image' => esc_html__( 'Image', 'authentic' ),
			'text'  => esc_html__( 'Text', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'header_logo_default_url',
		'label'           => esc_html__( 'Default Logo', 'authentic' ),
		'section'         => 'header',
		'default'         => get_template_directory_uri() . '/images/logo-dark.png',
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'header_logo_default_retina_url',
		'label'           => esc_html__( 'Default Retina Logo', 'authentic' ),
		'section'         => 'header',
		'default'         => get_template_directory_uri() . '/images/logo-dark-2x.png',
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'header_dark_logo_default_url',
		'label'           => esc_html__( 'Default Dark Logo', 'authentic' ),
		'section'         => 'header',
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
			array(
				'setting'  => 'color_enable_dark_mode',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'header_dark_logo_default_retina_url',
		'label'           => esc_html__( 'Default Retina Dark Logo', 'authentic' ),
		'section'         => 'header',
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
			array(
				'setting'  => 'color_enable_dark_mode',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'header_logo_overlay_url',
		'label'           => esc_html__( 'Overlay Logo', 'authentic' ),
		'section'         => 'header',
		'default'         => get_template_directory_uri() . '/images/logo-light.png',
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'header_logo_overlay_retina_url',
		'label'           => esc_html__( 'Overlay Retina Logo', 'authentic' ),
		'section'         => 'header',
		'default'         => get_template_directory_uri() . '/images/logo-light-2x.png',
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'              => 'text',
		'settings'          => 'header_logo_text',
		'label'             => esc_html__( 'Text', 'authentic' ),
		'section'           => 'header',
		'default'           => get_bloginfo( 'name' ),
		'sanitize_callback' => 'wp_kses_post',
		'active_callback'   => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_logo_select',
				'operator' => '==',
				'value'    => 'text',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'typography',
		'settings'        => 'header_logo_font',
		'label'           => esc_html__( 'Font', 'authentic' ),
		'section'         => 'header',
		'default'         => array(
			'font-family'    => 'Montserrat',
			'variant'        => '600',
			'subsets'        => array( 'latin' ),
			'font-size'      => '2.5rem',
			'letter-spacing' => '-0.125rem',
			'text-transform' => 'none',
			'line-height'    => '1',
		),
		'output'          => array(
			array(
				'element' => '.header .site-title',
			),
		),
		'choices'         => array(),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_logo_select',
				'operator' => '==',
				'value'    => 'text',
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Header > Background ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'            => 'collapsible',
		'settings'        => 'header_collapsible_background',
		'section'         => 'header',
		'label'           => esc_html__( 'Background', 'authentic' ),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'header_background',
		'label'           => esc_html__( 'Background', 'authentic' ),
		'section'         => 'header',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'group-background',
		'settings'        => 'header_background_object',
		'label'           => esc_html__( 'Background', 'authentic' ),
		'section'         => 'header',
		'choices'         => array(
			'background-color'      => '#FFFFFF',
			'background-image'      => '',
			'background-position'   => 'center center',
			'background-repeat'     => 'no-repeat',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		),
		'output'          => array(
			array(
				'element' => '.header-enabled:not(.header-type-large) .site-header .header-background',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_background',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'text',
		'settings'        => 'header_video_url',
		'label'           => esc_html__( 'Video URL', 'authentic' ),
		'section'         => 'header',
		'default'         => '',
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_background',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'number',
		'settings'        => 'header_video_start',
		'label'           => esc_html__( 'Start Time', 'authentic' ),
		'section'         => 'header',
		'default'         => 0,
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_background',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'number',
		'settings'        => 'header_video_end',
		'label'           => esc_html__( 'End Time', 'authentic' ),
		'section'         => 'header',
		'default'         => 0,
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_background',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'header_parallax',
		'label'           => esc_html__( 'Parallax', 'authentic' ),
		'description'     => esc_html__( 'If enabled, background position, size, repeat and attachment options will be ignored.', 'authentic' ),
		'section'         => 'header',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_background',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Header > Description ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'            => 'collapsible',
		'settings'        => 'header_collapsible_description',
		'section'         => 'header',
		'label'           => esc_html__( 'Site Description', 'authentic' ),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'              => 'text',
		'settings'          => 'header_description_text',
		'label'             => esc_html__( 'Text', 'authentic' ),
		'section'           => 'header',
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
		'active_callback'   => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'typography',
		'settings'        => 'header_description_font',
		'label'           => esc_html__( 'Font', 'authentic' ),
		'section'         => 'header',
		'default'         => array(
			'font-family'    => 'Montserrat',
			'variant'        => '300',
			'subsets'        => array( 'latin' ),
			'font-size'      => '0.875rem',
			'letter-spacing' => '-0.0125em',
			'text-transform' => 'none',
		),
		'output'          => array(
			array(
				'element' => '.header .site-description',
			),
		),
		'choices'         => array(),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Header > Left Column ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'            => 'collapsible',
		'settings'        => 'header_collapsible_content_left',
		'section'         => 'header',
		'label'           => esc_html__( 'Left Column', 'authentic' ),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'center',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'header_content_left_select',
		'label'           => esc_html__( 'Type', 'authentic' ),
		'section'         => 'header',
		'default'         => 'button',
		'choices'         => csco_get_header_content_select( array( 'menu', 'toggle', 'search', 'social', 'button', 'cart', 'html', 'none' ) ),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'center',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'text',
		'settings'        => 'header_content_left_button_text',
		'label'           => esc_html__( 'Text', 'authentic' ),
		'section'         => 'header',
		'default'         => esc_html__( 'Subscribe', 'authentic' ),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_left_select',
				'operator' => '==',
				'value'    => 'button',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'center',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'text',
		'settings'        => 'header_content_left_button_link',
		'label'           => esc_html__( 'Link', 'authentic' ),
		'section'         => 'header',
		'default'         => get_site_url(),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_left_select',
				'operator' => '==',
				'value'    => 'button',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'center',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'header_content_left_button_icon',
		'label'           => esc_html__( 'Icon', 'authentic' ),
		'section'         => 'header',
		'default'         => 'mail',
		'choices'         => csco_get_icons(),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_left_select',
				'operator' => '==',
				'value'    => 'button',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'center',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'header_content_left_menu',
		'label'           => esc_html__( 'Menu', 'authentic' ),
		'section'         => 'header',
		'default'         => csco_get_default_menu(),
		'choices'         => csco_get_menus(),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_left_select',
				'operator' => '==',
				'value'    => 'menu',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'center',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'textarea',
		'settings'        => 'header_content_left_html',
		'label'           => esc_html__( 'HTML', 'authentic' ),
		'section'         => 'header',
		'default'         => '',
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_left_select',
				'operator' => '==',
				'value'    => 'html',
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 'center',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'header_content_left_social_accounts_labels',
		'label'           => esc_html__( 'Labels', 'authentic' ),
		'section'         => 'header',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_left_select',
				'operator' => '==',
				'value'    => 'social',
			),
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'center',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'header_content_left_social_accounts_titles',
		'label'           => esc_html__( 'Titles', 'authentic' ),
		'section'         => 'header',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_left_select',
				'operator' => '==',
				'value'    => 'social',
			),
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'center',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'header_content_left_social_accounts_counts',
		'label'           => esc_html__( 'Counts', 'authentic' ),
		'section'         => 'header',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_left_select',
				'operator' => '==',
				'value'    => 'social',
			),
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'center',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'number',
		'settings'        => 'header_content_left_social_accounts_limit',
		'label'           => esc_html__( 'Limit', 'authentic' ),
		'description'     => esc_html__( 'Number of social accounts.', 'authentic' ),
		'section'         => 'header',
		'default'         => 3,
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_left_select',
				'operator' => '==',
				'value'    => 'social',
			),
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'center',
				),
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Header > Right Column ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'            => 'collapsible',
		'settings'        => 'header_collapsible_content_right',
		'section'         => 'header',
		'label'           => esc_html__( 'Right Column', 'authentic' ),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'center',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'left',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'header_content_right_select',
		'label'           => esc_html__( 'Type', 'authentic' ),
		'section'         => 'header',
		'default'         => 'search',
		'choices'         => csco_get_header_content_select( array( 'menu', 'search', 'social', 'button', 'cart', 'html', 'none' ) ),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'center',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'left',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'text',
		'settings'        => 'header_content_right_button_text',
		'label'           => esc_html__( 'Text', 'authentic' ),
		'section'         => 'header',
		'default'         => esc_html__( 'Subscribe', 'authentic' ),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_right_select',
				'operator' => '==',
				'value'    => 'button',
			),
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'center',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'left',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'text',
		'settings'        => 'header_content_right_button_link',
		'label'           => esc_html__( 'Link', 'authentic' ),
		'section'         => 'header',
		'default'         => get_site_url(),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_right_select',
				'operator' => '==',
				'value'    => 'button',
			),
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'center',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'left',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'header_content_right_button_icon',
		'label'           => esc_html__( 'Icon', 'authentic' ),
		'section'         => 'header',
		'default'         => 'mail',
		'choices'         => csco_get_icons(),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_right_select',
				'operator' => '==',
				'value'    => 'button',
			),
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'center',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'left',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'header_content_right_menu',
		'label'           => esc_html__( 'Menu', 'authentic' ),
		'section'         => 'header',
		'default'         => csco_get_default_menu(),
		'choices'         => csco_get_menus(),
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_right_select',
				'operator' => '==',
				'value'    => 'menu',
			),
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'center',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'left',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'textarea',
		'settings'        => 'header_content_right_html',
		'label'           => esc_html__( 'HTML', 'authentic' ),
		'section'         => 'header',
		'default'         => '',
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_right_select',
				'operator' => '==',
				'value'    => 'html',
			),
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'center',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'left',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'header_content_right_social_accounts_labels',
		'label'           => esc_html__( 'Labels', 'authentic' ),
		'section'         => 'header',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_right_select',
				'operator' => '==',
				'value'    => 'social',
			),
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'center',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'left',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'header_content_right_social_accounts_titles',
		'label'           => esc_html__( 'Titles', 'authentic' ),
		'section'         => 'header',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_right_select',
				'operator' => '==',
				'value'    => 'social',
			),
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'center',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'left',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'header_content_right_social_accounts_counts',
		'label'           => esc_html__( 'Counts', 'authentic' ),
		'section'         => 'header',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_right_select',
				'operator' => '==',
				'value'    => 'social',
			),
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'center',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'left',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'number',
		'settings'        => 'header_content_right_social_accounts_limit',
		'label'           => esc_html__( 'Limit', 'authentic' ),
		'description'     => esc_html__( 'Number of social accounts.', 'authentic' ),
		'section'         => 'header',
		'default'         => 3,
		'active_callback' => array(
			array(
				'setting'  => 'header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'header_content_right_select',
				'operator' => '==',
				'value'    => 'social',
			),
			array(
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'center',
				),
				array(
					'setting'  => 'header_layout',
					'operator' => '==',
					'value'    => 'left',
				),
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Layout > Navigation Bar ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'navbar', array(
		'title' => esc_html__( 'Navigation Bar', 'authentic' ),
		'panel' => 'layout',

	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Navigation Bar > Layout ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'navbar_collapsible_layout',
		'section'  => 'navbar',
		'label'    => esc_html__( 'Layout', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'select',
		'settings' => 'navbar_container',
		'label'    => esc_html__( 'Container', 'authentic' ),
		'section'  => 'navbar',
		'default'  => 'cs-container',
		'choices'  => array(
			'cs-container'       => esc_html__( 'Boxed', 'authentic' ),
			'cs-container-fluid' => esc_html__( 'Fullwidth', 'authentic' ),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'dimension',
		'settings' => 'navbar_height',
		'label'    => esc_html__( 'Height', 'authentic' ),
		'section'  => 'navbar',
		'default'  => '50px',
		'output'   => array(
			array(
				'element'  => '.navbar-primary .navbar',
				'property' => 'height',
			),
			array(
				'element'       => '.navbar-primary .logo-mobile-image',
				'property'      => 'max-height',
				'value_pattern' => 'calc($ - 10px)',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'select',
		'settings' => 'navbar_alignment',
		'label'    => esc_html__( 'Alignment', 'authentic' ),
		'section'  => 'navbar',
		'default'  => 'center',
		'choices'  => array(
			'center' => esc_html__( 'Center', 'authentic' ),
			'left'   => esc_html__( 'Left', 'authentic' ),
			'right'  => esc_html__( 'Right', 'authentic' ),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'navbar_toggle',
		'label'    => esc_html__( 'Display off-canvas toggle', 'authentic' ),
		'section'  => 'navbar',
		'default'  => true,

	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'navbar_search',
		'label'    => esc_html__( 'Display search icon', 'authentic' ),
		'section'  => 'navbar',
		'default'  => false,

	)
);

CSCO_Customizer::add_field(
	array(
		'type'        => 'checkbox',
		'settings'    => 'effects_navbar_scroll',
		'label'       => esc_html__( 'Enable sticky navigation bar', 'authentic' ),
		'description' => esc_html__( 'If enabled the navigation bar will be revealed when scrolling up and hidden when scrolling down.', 'authentic' ),
		'section'     => 'navbar',
		'default'     => true,

	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'navbar_sticky',
		'label'           => esc_html__( 'Make navigation bar always sticky', 'authentic' ),
		'description'     => esc_html__( 'Enabling this option will force the navigation bar to be always visible when scrolling.', 'authentic' ),
		'section'         => 'navbar',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'effects_navbar_scroll',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Navigation Bar > Logo ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'navbar_collapsible_logo',
		'section'  => 'navbar',
		'label'  => esc_html__( 'Logo', 'authentic' ),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'select',
		'settings' => 'navbar_logo_select',
		'label'    => esc_html__( 'Type', 'authentic' ),
		'section'  => 'navbar',
		'default'  => 'text',
		'choices'  => array(
			'image' => esc_html__( 'Image', 'authentic' ),
			'text'  => esc_html__( 'Text', 'authentic' ),
			'none'  => esc_html__( 'None', 'authentic' ),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'navbar_logo_default_url',
		'label'           => esc_html__( 'Default Logo', 'authentic' ),
		'section'         => 'navbar',
		'default'         => get_template_directory_uri() . '/images/logo-small-dark.png',
		'active_callback' => array(
			array(
				'setting'  => 'navbar_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'navbar_logo_default_retina_url',
		'label'           => esc_html__( 'Default Retina Logo', 'authentic' ),
		'section'         => 'navbar',
		'default'         => get_template_directory_uri() . '/images/logo-small-dark-2x.png',
		'active_callback' => array(
			array(
				'setting'  => 'navbar_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'navbar_dark_logo_default_url',
		'label'           => esc_html__( 'Default Dark Logo', 'authentic' ),
		'section'         => 'navbar',
		'active_callback' => array(
			array(
				'setting'  => 'navbar_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
			array(
				'setting'  => 'color_enable_dark_mode',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'navbar_dark_logo_default_retina_url',
		'label'           => esc_html__( 'Default Retina Dark Logo', 'authentic' ),
		'section'         => 'navbar',
		'active_callback' => array(
			array(
				'setting'  => 'navbar_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
			array(
				'setting'  => 'color_enable_dark_mode',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'navbar_logo_overlay_url',
		'label'           => esc_html__( 'Overlay Logo', 'authentic' ),
		'section'         => 'navbar',
		'default'         => get_template_directory_uri() . '/images/logo-small-light.png',
		'active_callback' => array(
			array(
				'setting'  => 'navbar_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'navbar_logo_overlay_retina_url',
		'label'           => esc_html__( 'Overlay Retina Logo', 'authentic' ),
		'section'         => 'navbar',
		'default'         => get_template_directory_uri() . '/images/logo-small-light-2x.png',
		'active_callback' => array(
			array(
				'setting'  => 'navbar_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'navbar_mobile_logo',
		'label'    => esc_html__( 'Use custom logo for mobile', 'authentic' ),
		'section'  => 'navbar',
		'default'  => false,

	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'navbar_mobile_logo_default_url',
		'label'           => esc_html__( 'Mobile Logo', 'authentic' ),
		'section'         => 'navbar',
		'active_callback' => array(
			array(
				'setting'  => 'navbar_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
			array(
				'setting'  => 'navbar_mobile_logo',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'navbar_mobile_logo_default_retina_url',
		'label'           => esc_html__( 'Mobile Retina Logo', 'authentic' ),
		'section'         => 'navbar',
		'active_callback' => array(
			array(
				'setting'  => 'navbar_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
			array(
				'setting'  => 'navbar_mobile_logo',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'navbar_mobile_dark_logo_default_url',
		'label'           => esc_html__( 'Mobile Dark Logo', 'authentic' ),
		'section'         => 'navbar',
		'active_callback' => array(
			array(
				'setting'  => 'navbar_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
			array(
				'setting'  => 'color_enable_dark_mode',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'navbar_mobile_logo',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'navbar_mobile_dark_logo_default_retina_url',
		'label'           => esc_html__( 'Mobile Retina Dark Logo', 'authentic' ),
		'section'         => 'navbar',
		'active_callback' => array(
			array(
				'setting'  => 'navbar_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
			array(
				'setting'  => 'color_enable_dark_mode',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'navbar_mobile_logo',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'              => 'text',
		'settings'          => 'navbar_logo_text',
		'label'             => esc_html__( 'Text', 'authentic' ),
		'section'           => 'navbar',
		'default'           => get_bloginfo( 'name' ),
		'sanitize_callback' => 'wp_kses_post',
		'active_callback'   => array(
			array(
				'setting'  => 'navbar_logo_select',
				'operator' => '==',
				'value'    => 'text',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'typography',
		'settings'        => 'navbar_logo_font',
		'label'           => esc_html__( 'Font', 'authentic' ),
		'section'         => 'navbar',
		'default'         => array(
			'font-family'    => 'Montserrat',
			'variant'        => '600',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1.375rem',
			'letter-spacing' => '-0.05em',
			'text-transform' => 'none',
			'line-height'    => '1',
		),
		'output'          => array(
			array(
				'element' => '.navbar-primary .navbar-brand',
			),
		),
		'choices'         => array(),
		'active_callback' => array(
			array(
				'setting'  => 'navbar_logo_select',
				'operator' => '==',
				'value'    => 'text',
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Navigation Bar > Social Accounts ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'navbar_collapsible_social_icons',
		'section'  => 'navbar',
		'label'    => esc_html__( 'Social Icons', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'navbar_social',
		'label'    => esc_html__( 'Social Icons', 'authentic' ),
		'section'  => 'navbar',
		'default'  => false,

	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'navbar_social_accounts_labels',
		'label'           => esc_html__( 'Labels', 'authentic' ),
		'section'         => 'navbar',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'navbar_social',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'navbar_social_accounts_titles',
		'label'           => esc_html__( 'Titles', 'authentic' ),
		'section'         => 'navbar',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'navbar_social',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'navbar_social_accounts_counts',
		'label'           => esc_html__( 'Counts', 'authentic' ),
		'section'         => 'navbar',
		'default'         => true,
		'active_callback' => array(
			array(
				'setting'  => 'navbar_social',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'number',
		'settings'        => 'navbar_social_accounts_limit',
		'label'           => esc_html__( 'Limit', 'authentic' ),
		'description'     => esc_html__( 'Number of social accounts.', 'authentic' ),
		'section'         => 'navbar',
		'default'         => 3,
		'active_callback' => array(
			array(
				'setting'  => 'navbar_social',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Navigation Bar > Multi-Column Sub-Menu ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'navbar_collapsible_multi_column',
		'section'  => 'navbar',
		'label'    => esc_html__( 'Multi-Column Sub-Menu', 'authentic' ),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'navbar_multi_column_display',
		'label'    => esc_html__( 'Display multi-column sub-menu', 'authentic' ),
		'section'  => 'navbar',
		'default'  => false,
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Navigation Bar > Single-Column Sub-Menu ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'navbar_collapsible_single_column',
		'section'  => 'navbar',
		'label'    => esc_html__( 'Single-Column Sub-Menu', 'authentic' ),

	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'navbar_single_column_display',
		'label'    => esc_html__( 'Display single-column sub-menu', 'authentic' ),
		'section'  => 'navbar',
		'default'  => false,

	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'text',
		'settings'        => 'navbar_single_column_title',
		'label'           => esc_html__( 'Dropdown Title', 'authentic' ),
		'section'         => 'navbar',
		'default'         => esc_html__( 'Follow', 'authentic' ),
		'active_callback' => array(
			array(
				'setting'  => 'navbar_single_column_display',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'navbar_single_column_image',
		'label'           => esc_html__( 'Background Image', 'authentic' ),
		'section'         => 'navbar',
		'choices'         => array(
			'save_as' => 'id',
		),
		'active_callback' => array(
			array(
				'setting'  => 'navbar_single_column_display',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Layout > Off-Canvas ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'offcanvas', array(
		'title' => esc_html__( 'Off-Canvas Area', 'authentic' ),
		'panel' => 'layout',

	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Off-Canvas Area > Logo ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'offcanvas_collapsible_topbar',
		'section'  => 'offcanvas',
		'label'    => esc_html__( 'Top Bar', 'authentic' ),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'dimension',
		'settings' => 'offcanvas_topbar_height',
		'label'    => esc_html__( 'Height', 'authentic' ),
		'section'  => 'offcanvas',
		'default'  => '50px',
		'output'   => array(
			array(
				'element'       => '.offcanvas .offcanvas-header',
				'property'      => 'flex',
				'value_pattern' => '0 0 $',
			),
			array(
				'element'  => '.offcanvas .navbar-offcanvas',
				'property' => 'height',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'offcanvas_collapsible_logo',
		'section'  => 'offcanvas',
		'label'    => esc_html__( 'Logo', 'authentic' ),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'select',
		'settings' => 'offcanvas_logo_select',
		'label'    => esc_html__( 'Type', 'authentic' ),
		'section'  => 'offcanvas',
		'default'  => 'text',
		'choices'  => array(
			'image' => esc_html__( 'Image', 'authentic' ),
			'text'  => esc_html__( 'Text', 'authentic' ),
			'none'  => esc_html__( 'None', 'authentic' ),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'offcanvas_logo_url',
		'label'           => esc_html__( 'Logo', 'authentic' ),
		'section'         => 'offcanvas',
		'default'         => get_template_directory_uri() . '/images/logo-small-dark.png',
		'active_callback' => array(
			array(
				'setting'  => 'offcanvas_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'offcanvas_logo_retina_url',
		'label'           => esc_html__( 'Retina Logo', 'authentic' ),
		'section'         => 'offcanvas',
		'default'         => get_template_directory_uri() . '/images/logo-small-dark-2x.png',
		'active_callback' => array(
			array(
				'setting'  => 'offcanvas_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'offcanvas_dark_logo_url',
		'label'           => esc_html__( 'Dark Logo', 'authentic' ),
		'section'         => 'offcanvas',
		'active_callback' => array(
			array(
				'setting'  => 'offcanvas_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
			array(
				'setting'  => 'color_enable_dark_mode',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'offcanvas_dark_logo_retina_url',
		'label'           => esc_html__( 'Retina Dark Logo', 'authentic' ),
		'section'         => 'offcanvas',
		'active_callback' => array(
			array(
				'setting'  => 'offcanvas_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
			array(
				'setting'  => 'color_enable_dark_mode',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'              => 'text',
		'settings'          => 'offcanvas_logo_text',
		'label'             => esc_html__( 'Text', 'authentic' ),
		'section'           => 'offcanvas',
		'default'           => get_bloginfo( 'name' ),
		'sanitize_callback' => 'wp_kses_post',
		'active_callback'   => array(
			array(
				'setting'  => 'offcanvas_logo_select',
				'operator' => '==',
				'value'    => 'text',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'typography',
		'settings'        => 'offcanvas_logo_font',
		'label'           => esc_html__( 'Font', 'authentic' ),
		'section'         => 'offcanvas',
		'default'         => array(
			'font-family'    => 'Montserrat',
			'variant'        => '600',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1.375rem',
			'letter-spacing' => '-0.05em',
			'text-transform' => 'none',
			'line-height'    => '1',
		),
		'output'          => array(
			array(
				'element' => '.offcanvas-header .navbar .navbar-brand',
			),
		),
		'choices'         => array(),
		'active_callback' => array(
			array(
				'setting'  => 'offcanvas_logo_select',
				'operator' => '==',
				'value'    => 'text',
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Layout > Page Header ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'page_header', array(
		'title' => esc_html__( 'Page Header', 'authentic' ),
		'panel' => 'layout',

	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'select',
		'settings' => 'page_header',
		'label'    => esc_html__( 'Type', 'authentic' ),
		'section'  => 'page_header',
		'default'  => 'simple',
		'choices'  => array(
			'none'   => esc_html__( 'None', 'authentic' ),
			'simple' => esc_html__( 'Simple', 'authentic' ),
			'small'  => esc_html__( 'Small', 'authentic' ),
			'wide'   => esc_html__( 'Wide', 'authentic' ),
			'large'  => esc_html__( 'Large', 'authentic' ),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Layout > Post Archive ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'archive', array(
		'title' => esc_html__( 'Post Archive', 'authentic' ),
		'panel' => 'layout',

	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'radio',
		'settings' => 'layout_archive_type',
		'label'    => esc_html__( 'Type', 'authentic' ),
		'section'  => 'archive',
		'default'  => 'standard',
		'choices'  => array(
			'standard' => esc_html__( 'Full', 'authentic' ),
			'list'     => esc_html__( 'List', 'authentic' ),
			'grid'     => esc_html__( 'Grid', 'authentic' ),
			'masonry'  => esc_html__( 'Masonry', 'authentic' ),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'layout_columns',
		'label'           => esc_html__( 'Columns', 'authentic' ),
		'description'     => esc_html__( 'Three- and four-column layouts are visible on larger screens only.', 'authentic' ),
		'section'         => 'archive',
		'default'         => 2,
		'choices'         => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'layout_archive_type',
					'operator' => '==',
					'value'    => 'grid',
				),
				array(
					'setting'  => 'layout_archive_type',
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
		'settings'        => 'layout_first_post',
		'label'           => esc_html__( 'Display first post as standard', 'authentic' ),
		'section'         => 'archive',
		'default'         => true,
		'active_callback' => array(
			array(
				array(
					'setting'  => 'layout_archive_type',
					'operator' => '!=',
					'value'    => 'standard',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'layout_meta_category',
		'label'    => esc_html__( 'Display post category', 'authentic' ),
		'section'  => 'archive',
		'default'  => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'layout_meta',
		'label'    => esc_html__( 'Display post meta', 'authentic' ),
		'section'  => 'archive',
		'default'  => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'layout_summary',
		'label'    => esc_html__( 'Display post summary', 'authentic' ),
		'section'  => 'archive',
		'default'  => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'layout_standard_summary',
		'label'           => esc_html__( 'Standard Post Summary', 'authentic' ),
		'section'         => 'archive',
		'default'         => 'excerpt',
		'choices'         => array(
			'excerpt' => esc_html__( 'Post Excerpt', 'authentic' ),
			'content' => esc_html__( 'Post Content', 'authentic' ),
		),
		'active_callback' => array(
			array(
				array(
					'setting'  => 'layout_summary',
					'operator' => '==',
					'value'    => true,
				),
			),
			array(
				array(
					'setting'  => 'layout_archive_type',
					'operator' => '==',
					'value'    => 'standard',
				),
				array(
					'setting'  => 'layout_first_post',
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
		'settings'        => 'layout_first_post',
		'label'           => esc_html__( 'Display first post as standard', 'authentic' ),
		'section'         => 'archive',
		'default'         => true,
		'active_callback' => array(
			array(
				array(
					'setting'  => 'layout_archive_type',
					'operator' => '!=',
					'value'    => 'standard',
				),
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'layout_more_button',
		'label'    => esc_html__( 'Display View Post button', 'authentic' ),
		'section'  => 'archive',
		'default'  => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'layout_reduce_margin',
		'label'           => esc_html__( 'Reduce white-space between posts', 'authentic' ),
		'section'         => 'archive',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'layout_archive_type',
				'operator' => '!=',
				'value'    => 'standard',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'select',
		'settings' => 'layout_orientation',
		'label'    => esc_html__( 'Image Orientation', 'authentic' ),
		'section'  => 'archive',
		'default'  => 'landscape',
		'choices'  => array(
			'original'  => esc_html__( 'Original', 'authentic' ),
			'landscape' => esc_html__( 'Landscape', 'authentic' ),
			'portrait'  => esc_html__( 'Portrait', 'authentic' ),
			'square'    => esc_html__( 'Square', 'authentic' ),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'select',
		'settings'        => 'layout_list_width',
		'label'           => esc_html__( 'Image Width', 'authentic' ),
		'section'         => 'archive',
		'default'         => '6',
		'choices'         => array(
			'5' => esc_html__( 'One Third', 'authentic' ),
			'6' => esc_html__( 'Half', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'layout_archive_type',
				'operator' => '==',
				'value'    => 'list',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'select',
		'settings' => 'layout_highlight',
		'label'    => esc_html__( 'Highlight Posts', 'authentic' ),
		'section'  => 'archive',
		'default'  => 'featured',
		'choices'  => array(
			'featured' => esc_html__( 'Featured', 'authentic' ),
			'all'      => esc_html__( 'All', 'authentic' ),
			'none'     => esc_html__( 'None', 'authentic' ),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'select',
		'settings' => 'layout_pagination_type',
		'label'    => esc_html__( 'Pagination', 'authentic' ),
		'section'  => 'archive',
		'default'  => 'standard',
		'choices'  => array(
			'standard' => esc_html__( 'Standard', 'authentic' ),
			'ajax'     => esc_html__( 'Load More', 'authentic' ),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'layout_infinite_load',
		'label'           => esc_html__( 'Infinite Load', 'authentic' ),
		'section'         => 'archive',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'layout_pagination_type',
				'operator' => '==',
				'value'    => 'ajax',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'layout_widgets',
		'label'    => esc_html__( 'Display widgets in archive', 'authentic' ),
		'section'  => 'archive',
		'default'  => false,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'number',
		'settings'        => 'layout_widgets_after',
		'label'           => esc_html__( 'Display widgets after N-th post', 'authentic' ),
		'section'         => 'archive',
		'default'         => 3,
		'active_callback' => array(
			array(
				'setting'  => 'layout_widgets',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'checkbox',
		'settings'        => 'layout_widgets_repeat',
		'label'           => esc_html__( 'Repeat widgets', 'authentic' ),
		'section'         => 'archive',
		'default'         => false,
		'active_callback' => array(
			array(
				'setting'  => 'layout_widgets',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Layout > Footer ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'footer', array(
		'title' => esc_html__( 'Footer', 'authentic' ),
		'panel' => 'layout',

	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Footer > Logo  ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'footer_collapsible_logo',
		'section'  => 'footer',
		'label'    => esc_html__( 'Logo', 'authentic' ),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'select',
		'settings' => 'footer_logo_select',
		'label'    => esc_html__( 'Type', 'authentic' ),
		'section'  => 'footer',
		'default'  => 'text',
		'choices'  => array(
			'image' => esc_html__( 'Image', 'authentic' ),
			'text'  => esc_html__( 'Text', 'authentic' ),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'footer_logo_url',
		'label'           => esc_html__( 'Logo', 'authentic' ),
		'section'         => 'footer',
		'default'         => get_template_directory_uri() . '/images/logo-light.png',
		'active_callback' => array(
			array(
				'setting'  => 'footer_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'footer_logo_retina_url',
		'label'           => esc_html__( 'Retina Logo', 'authentic' ),
		'section'         => 'footer',
		'default'         => get_template_directory_uri() . '/images/logo-light-2x.png',
		'active_callback' => array(
			array(
				'setting'  => 'footer_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'footer_dark_logo_url',
		'label'           => esc_html__( 'Dark Logo', 'authentic' ),
		'section'         => 'footer',
		'active_callback' => array(
			array(
				'setting'  => 'footer_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
			array(
				'setting'  => 'color_enable_dark_mode',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'image',
		'settings'        => 'footer_dark_logo_retina_url',
		'label'           => esc_html__( 'Retina Dark Logo', 'authentic' ),
		'section'         => 'footer',
		'active_callback' => array(
			array(
				'setting'  => 'footer_logo_select',
				'operator' => '==',
				'value'    => 'image',
			),
			array(
				'setting'  => 'color_enable_dark_mode',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'              => 'text',
		'settings'          => 'footer_logo_text',
		'label'             => esc_html__( 'Text', 'authentic' ),
		'section'           => 'footer',
		'default'           => get_bloginfo( 'name' ),
		'sanitize_callback' => 'wp_kses_post',
		'active_callback'   => array(
			array(
				'setting'  => 'footer_logo_select',
				'operator' => '==',
				'value'    => 'text',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'typography',
		'settings'        => 'footer_logo_font',
		'label'           => esc_html__( 'Font', 'authentic' ),
		'section'         => 'footer',
		'default'         => array(
			'font-family'    => 'Montserrat',
			'variant'        => '600',
			'subsets'        => array( 'latin' ),
			'font-size'      => '1.75rem',
			'letter-spacing' => '-0.05rem',
			'text-transform' => 'none',
			'line-height'    => '1',
		),
		'output'          => array(
			array(
				'element' => '.site-footer .site-title',
			),
		),
		'choices'         => array(),
		'active_callback' => array(
			array(
				'setting'  => 'footer_logo_select',
				'operator' => '==',
				'value'    => 'text',
			),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'              => 'text',
		'settings'          => 'footer_text',
		'label'             => esc_html__( 'Footer Text', 'authentic' ),
		'section'           => 'footer',
		'default'           => get_bloginfo( 'description' ),
		'sanitize_callback' => 'wp_kses_post',
	)
);

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Footer > Subscribe  ]
 * -------------------------------------------------------------------------
 */

if ( csco_powerkit_module_enabled( 'opt_in_forms' ) ) {

	CSCO_Customizer::add_field(
		array(
			'type'     => 'collapsible',
			'settings' => 'footer_collapsible_subscribe',
			'section'  => 'footer',
			'label'    => esc_html__( 'Subscribe', 'authentic' ),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'     => 'checkbox',
			'settings' => 'footer_subscribe_name',
			'label'    => esc_html__( 'Display first name field', 'authentic' ),
			'section'  => 'footer',
			'default'  => false,
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'              => 'text',
			'settings'          => 'footer_subscribe_title',
			'label'             => esc_html__( 'Title', 'authentic' ),
			'section'           => 'footer',
			'default'           => esc_html__( 'Subscribe', 'authentic' ),
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'              => 'text',
			'settings'          => 'footer_subscribe_message',
			'label'             => esc_html__( 'Message', 'authentic' ),
			'section'           => 'footer',
			'default'           => esc_html__( 'Subscribe now to our newsletter', 'authentic' ),
			'sanitize_callback' => 'wp_kses_post',
		)
	);
}

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Footer > Instagram  ]
 * -------------------------------------------------------------------------
 */
if ( csco_powerkit_module_enabled( 'instagram_integration' ) ) {

	CSCO_Customizer::add_field(
		array(
			'type'     => 'collapsible',
			'settings' => 'footer_collapsible_instagram',
			'section'  => 'footer',
			'label'    => esc_html__( 'Instagram', 'authentic' ),
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'     => 'text',
			'settings' => 'footer_instagram_username',
			'label'    => esc_html__( 'Instagram Username', 'authentic' ),
			'section'  => 'footer',
			'default'  => '',
		)
	);
}

/**
 * -------------------------------------------------------------------------
 * |-- [ Layout > Footer > Arrangement  ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_field(
	array(
		'type'     => 'collapsible',
		'settings' => 'footer_collapsible_components',
		'section'  => 'footer',
		'label'    => esc_html__( 'Arrangement', 'authentic' ),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'sortable',
		'settings' => 'footer_components',
		'label'    => esc_html__( 'Components', 'authentic' ),
		'section'  => 'footer',
		'default'  => csco_footer_components_default(),
		'choices'  => csco_footer_components_choices(),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Layout > Post Meta ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'post_meta', array(
		'title' => esc_html__( 'Post Meta', 'authentic' ),
		'panel' => 'layout',
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'multicheck',
		'settings' => 'post_meta',
		'label'    => esc_attr__( 'Post Meta', 'authentic' ),
		'section'  => 'post_meta',
		'default'  => array( 'date', 'author', 'category' ),
		'choices'  => apply_filters(
			'csco_post_meta_choices', array(
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

/**
 * -------------------------------------------------------------------------
 * |- [ Layout > Effects ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'effects', array(
		'title' => esc_html__( 'Effects', 'authentic' ),
		'panel' => 'layout',
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'effects_parallax',
		'label'    => esc_html__( 'Parallax', 'authentic' ),
		'section'  => 'effects',
		'default'  => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'effects_sticky_sidebar',
		'label'    => esc_html__( 'Sticky Sidebar', 'authentic' ),
		'section'  => 'effects',
		'default'  => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'            => 'radio',
		'settings'        => 'effects_sticky_sidebar_method',
		'label'           => esc_html__( 'Sticky Method', 'authentic' ),
		'section'         => 'effects',
		'default'         => 'stick-to-bottom',
		'choices'         => array(
			'stick-to-top'    => esc_html__( 'Sidebar top edge', 'authentic' ),
			'stick-to-bottom' => esc_html__( 'Sidebar bottom edge', 'authentic' ),
			'stick-last'      => esc_html__( 'Last widget top edge', 'authentic' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'effects_sticky_sidebar',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * -------------------------------------------------------------------------
 * |- [ Layout > Miscellaneous ]
 * -------------------------------------------------------------------------
 */

CSCO_Customizer::add_section(
	'layout_misc', array(
		'title' => esc_html__( 'Miscellaneous', 'authentic' ),
		'panel' => 'layout',
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'checkbox',
		'settings' => 'display_published_date',
		'label'    => esc_html__( 'Display published date instead of modified date', 'authentic' ),
		'section'  => 'layout_misc',
		'default'  => true,
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'text',
		'settings' => 'label_readmore',
		'label'    => esc_html__( '"View Post" Button Label', 'authentic' ),
		'section'  => 'layout_misc',
		'default'  => esc_html__( 'View Post', 'authentic' ),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'      => 'dimension',
		'settings'  => 'border_radius',
		'label'     => esc_html__( 'Border Radius', 'authentic' ),
		'section'   => 'layout_misc',
		'default'   => '0',
		'output'    => apply_filters(
			'csco_border_radius', array(
				array(
					'element'  => '.button-primary, .wp-block-button:not(.is-style-squared) .wp-block-button__link, .wp-block-search .wp-block-search__button, .pk-button, .pk-about-button, .pk-zoom-icon-popup:after, .pk-pin-it, .entry-content .pk-dropcap:first-letter, .pk-social-links-template-vertical .pk-social-links-link, .pk-share-buttons-before-post .pk-share-buttons-link, .pk-share-buttons-after-post .pk-share-buttons-link, .pk-instagram-follow, .pk-twitter-follow, .pk-scroll-to-top, .widget-area .pk-subscribe-with-name input[type="text"], .widget-area .pk-subscribe-with-name button, .widget-area .pk-subscribe-with-bg input[type="text"], .widget-area .pk-subscribe-with-bg button, .entry-content .pk-share-buttons-wrap .pk-share-buttons-link, .adp-button, .abr-badge-primary',
					'property' => 'border-radius',
				),
				array(
					'element'     => '.pk-subscribe-with-name input[type="text"], .pk-subscribe-with-name button, .pk-subscribe-with-bg input[type="text"], .pk-subscribe-with-bg button',
					'property'    => 'border-radius',
					'media_query' => '@media (max-width: 719px)',
				),
				array(
					'element'  => '.cs-input-group-btn button, .pk-subscribe-form-wrap button',
					'property' => 'border-top-right-radius',
				),
				array(
					'element'  => '.cs-input-group-btn button, .pk-subscribe-form-wrap button',
					'property' => 'border-bottom-right-radius',
				),
			)
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'select',
		'settings' => 'style_align',
		'label'    => esc_html__( 'Text Align', 'authentic' ),
		'section'  => 'layout_misc',
		'default'  => 'center',
		'choices'  => array(
			'center' => esc_html( 'Center', 'authentic' ),
			'left'   => esc_html( 'Left', 'authentic' ),
		),
	)
);

CSCO_Customizer::add_field(
	array(
		'type'     => 'radio',
		'settings' => 'classic_gallery_alignment',
		'label'    => esc_html__( 'Alignment of Galleries in Classic Block', 'authentic' ),
		'section'  => 'layout_misc',
		'default'  => 'default',
		'choices'  => array(
			'default' => esc_html__( 'Default', 'authentic' ),
			'wide'    => esc_html__( 'Wide', 'authentic' ),
			'large'   => esc_html__( 'Large', 'authentic' ),
		),
	)
);
