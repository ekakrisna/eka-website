<?php
/**
 * Dark Mode
 *
 * @package Authentic
 */

/**
 * Add customizer fields for dar mode.
 */
function csco_dark_mode_customizer() {

	CSCO_Customizer::add_section(
		'colors_dark_mode',
		array(
			'title'    => esc_html__( 'Dark Mode', 'authentic' ),
			'panel'    => 'colors',
			'priority' => 5,
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'     => 'checkbox',
			'settings' => 'color_enable_dark_mode',
			'label'    => esc_html__( 'Enable Dark Mode', 'authentic' ),
			'section'  => 'colors_dark_mode',
			'default'  => false,
			'priority' => 10,
		)
	);

	CSCO_Customizer::add_field(
		array(
			'type'            => 'radio',
			'settings'        => 'color_scheme',
			'label'           => esc_html__( 'Site Color Scheme', 'authentic' ),
			'section'         => 'colors_dark_mode',
			'default'         => 'system',
			'choices'         => array(
				'system' => esc_html__( 'User’s system preference', 'authentic' ),
				'light'  => esc_html__( 'Light', 'authentic' ),
				'dark'   => esc_html__( 'Dark', 'authentic' ),
			),
			'priority'        => 10,
			'active_callback' => array(
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
			'type'            => 'checkbox',
			'settings'        => 'color_scheme_toggle',
			'label'           => esc_html__( 'Enable dark/light mode toggle', 'authentic' ),
			'section'         => 'colors_dark_mode',
			'default'         => true,
			'priority'        => 10,
			'active_callback' => array(
				array(
					'setting'  => 'color_enable_dark_mode',
					'operator' => '==',
					'value'    => true,
				),
			),
		)
	);
}
add_action( 'init', 'csco_dark_mode_customizer', 11 );

/**
 * Canvas: Enable data scheme.
 */
function csco_dark_mode_setup() {
	if ( ! csco_live_get_theme_mod( 'color_enable_dark_mode', false ) ) {
		return;
	}

	add_theme_support( 'canvas-enable-data-scheme' );
}
add_action( 'after_setup_theme', 'csco_dark_mode_setup' );

/**
 * Front localization scheme.
 */
function csco_front_scheme_localize() {
	if ( ! csco_live_get_theme_mod( 'color_enable_dark_mode', false ) ) {
		return;
	}

	// Localization scheme.
	$localize = array(
		'siteSchemeMode'   => get_theme_mod( 'color_scheme', 'system' ),
		'siteSchemeToogle' => get_theme_mod( 'color_scheme_toggle', true ),
	);

	// Localize the main theme scripts.
	wp_localize_script( 'csco-scripts', 'csSchemeLocalize', $localize );
}
add_action( 'wp_enqueue_scripts', 'csco_front_scheme_localize', 99 );

/**
 * Editor localization scheme.
 */
function csco_editor_scheme_localize() {
	if ( ! csco_live_get_theme_mod( 'color_enable_dark_mode', false ) ) {
		return;
	}

	// Localization scheme.
	$localize = array(
		'siteSchemeMode'   => 'light',
		'siteSchemeToogle' => false,
	);

	// Localize the main theme scripts.
	wp_localize_script( 'csco-scripts', 'csSchemeLocalize', $localize );
}
add_action( 'enqueue_block_editor_assets', 'csco_editor_scheme_localize', 99 );

/**
 * Get site scheme data
 */
function csco_site_scheme_data() {

	// Get options.
	$color_scheme = get_theme_mod( 'color_scheme', 'system' );
	$color_toggle = get_theme_mod( 'color_scheme_toggle', true );

	// Set site scheme.
	$site_scheme = 'default';

	switch ( $color_scheme ) {
		case 'dark':
			$site_scheme = 'dark';
			break;
		case 'light':
			$site_scheme = 'default';
			break;
		case 'system':
			if ( isset( $_COOKIE['_color_system_schema'] ) && 'default' === $_COOKIE['_color_system_schema'] ) {
				$site_scheme = 'default';
			}
			if ( isset( $_COOKIE['_color_system_schema'] ) && 'dark' === $_COOKIE['_color_system_schema'] ) {
				$site_scheme = 'dark';
			}
			break;
	}

	if ( $color_toggle ) {
		if ( isset( $_COOKIE['_color_schema'] ) && 'default' === $_COOKIE['_color_schema'] ) {
			$site_scheme = 'default';
		}
		if ( isset( $_COOKIE['_color_schema'] ) && 'dark' === $_COOKIE['_color_schema'] ) {
			$site_scheme = 'dark';
		}
	}

	return array(
		'site_scheme' => $site_scheme,
	);
}

/**
 * Scheme Toggle
 */
function csco_scheme_toggle() {
	if ( ! csco_live_get_theme_mod( 'color_enable_dark_mode', false ) ) {
		return;
	}

	if ( ! get_theme_mod( 'color_scheme_toggle', true ) ) {
		return;
	}
	?>
		<span role="button" class="navbar-scheme-toggle cs-site-scheme-toggle">
			<i class="navbar-scheme-toggle-icon cs-icon cs-icon-sun"></i>
			<i class="navbar-scheme-toggle-icon cs-icon cs-icon-moon"></i>
		</span>
	<?php
}
