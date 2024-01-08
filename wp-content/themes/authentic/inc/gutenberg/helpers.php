<?php
/**
 * Helpers Gutenberg.
 *
 * @package Authentic
 */

/**
 * Adapt the settings for the layout
 *
 * @param array $settings Settings of block.
 * @param bool  $prefix   If prefix exists.
 */
function csco_get_layout_settings( $settings, $prefix ) {
	$allowed = array();

	// Adaptive meta names.
	$keys = array_map( function( $val ) use ( $prefix ) {
		$pattern = sprintf( '/(^%s)([A-Z].*)/', $prefix );

		// Remove prefix.
		$val = preg_replace( $pattern, '$2', $val );

		// Make a string's first character lowercase.
		return lcfirst( $val );
	}, array_keys( $settings ) );

	// Use array_combine to map formatted keys to array values.
	$settings = array_combine( $keys, $settings );

	return $settings;
}

/**
 * Get fields array for Meta
 *
 * @param array $settings The settings.
 */
function csco_get_gutenberg_meta_fields( $settings ) {

	$settings = array_merge( array(
		'field_prefix'    => '',
		'section_name'    => '',
		'active_callback' => array(),
	), $settings );

	// Set fields.
	$fields = array(
		array(
			'key'             => $settings['field_prefix'] . 'ShowMetaCategory',
			'label'           => esc_html__( 'Category', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => true,
			'active_callback' => $settings['active_callback'],
		),
		array(
			'key'             => $settings['field_prefix'] . 'ShowMetaAuthor',
			'label'           => esc_html__( 'Author', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => true,
			'active_callback' => $settings['active_callback'],
		),
		array(
			'key'             => $settings['field_prefix'] . 'ShowMetaDate',
			'label'           => esc_html__( 'Date', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => true,
			'active_callback' => $settings['active_callback'],
		),
		array(
			'key'             => $settings['field_prefix'] . 'ShowMetaComments',
			'label'           => esc_html__( 'Comments', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => false,
			'active_callback' => $settings['active_callback'],
		),
		csco_post_views_enabled() ? array(
			'key'             => $settings['field_prefix'] . 'ShowMetaViews',
			'label'           => esc_html__( 'Views', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => false,
			'active_callback' => $settings['active_callback'],
		) : array(),
		csco_powerkit_module_enabled( 'reading_time' ) ? array(
			'key'             => $settings['field_prefix'] . 'ShowMetaReadingTime',
			'label'           => esc_html__( 'Reading Time', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => false,
			'active_callback' => $settings['active_callback'],
		) : array(),
		function_exists( 'powerkit_share_buttons_exists' ) && powerkit_share_buttons_exists( 'block-posts' ) ? array(
			'key'             => $settings['field_prefix'] . 'ShowMetaShares',
			'label'           => esc_html__( 'Shares', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => false,
			'active_callback' => $settings['active_callback'],
		) : array(),
		array(
			'key'             => uniqid(),
			'section'         => $settings['section_name'],
			'type'            => 'separator',
			'active_callback' => $settings['active_callback'],
		),
		array(
			'key'             => $settings['field_prefix'] . 'MetaCompact',
			'label'           => esc_html__( 'Display compact post meta', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => false,
			'active_callback' => $settings['active_callback'],
		),
	);

	return $fields;
}

/**
 * Get fields array for Excerpt
 *
 * @param array $settings The settings.
 */
function csco_get_gutenberg_excerpt_fields( $settings ) {

	$settings = array_merge( array(
		'field_prefix'    => '',
		'section_name'    => '',
		'active_callback' => array(),
		'sep'             => true,
		'default'         => false,
	), $settings );

	// Set fields.
	$fields = array(
		$settings['sep'] ? array(
			'key'             => uniqid(),
			'section'         => $settings['section_name'],
			'type'            => 'separator',
			'active_callback' => $settings['active_callback'],
		) : array(),
		array(
			'key'             => $settings['field_prefix'] . 'ShowExcerpt',
			'label'           => esc_html__( 'Display post excerpt', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => $settings['default'],
			'active_callback' => $settings['active_callback'],
		),
		array(
			'key'             => $settings['field_prefix'] . 'MetaExcerptLength',
			'label'           => esc_html__( 'Excerpt length', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'type'            => 'number',
			'step'            => 1,
			'min'             => 1,
			'max'             => 1000,
			'default'         => 200,
			'active_callback' => array_merge(
				array(
					array(
						'field'    => '$#' . $settings['field_prefix'] .'ShowExcerpt',
						'operator' => '==',
						'value'    => true,
					),
				),
				$settings['active_callback']
			),
		),
	);

	return $fields;
}

/**
 * Get fields array for Button
 *
 * @param array $settings The settings.
 */
function csco_get_gutenberg_button_fields( $settings ) {

	$settings = array_merge( array(
		'field_prefix'    => 'button',
		'section_name'    => '',
		'active_callback' => array(),
		'sep'             => true,
		'default'         => false,
	), $settings );

	// Set fields.
	$fields = array(
		$settings['sep'] ? array(
			'key'             => uniqid(),
			'section'         => $settings['section_name'],
			'type'            => 'separator',
			'active_callback' => $settings['active_callback'],
		) : array(),
		array(
			'key'             => $settings['field_prefix'] . 'ShowViewPostButton',
			'label'           => esc_html__( 'Display view post button', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => $settings['default'],
			'active_callback' => $settings['active_callback'],
		),
		array(
			'key'             => $settings['field_prefix'] . 'ButtonLabel',
			'label'           => esc_html__( 'Button Label', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'text',
			'default'         => '',
			'active_callback' => array_merge(
				array(
					array(
						'field'    => '$#' . $settings['field_prefix'] . 'ShowViewPostButton',
						'operator' => '==',
						'value'    => true,
					),
				),
				$settings['active_callback']
			),
		),
		array(
			'key'             => $settings['field_prefix'] . 'ButtonStyle',
			'label'           => esc_html__( 'Button Style', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'select',
			'default'         => '',
			'choices'         => array(
				''        => esc_html__( 'Default', 'authentic' ),
				'outline' => esc_html__( 'Outline', 'authentic' ),
				'squared' => esc_html__( 'Squared', 'authentic' ),
			),
			'active_callback' => array_merge(
				array(
					array(
						'field'    => '$#' . $settings['field_prefix'] . 'ShowViewPostButton',
						'operator' => '==',
						'value'    => true,
					),
				),
				$settings['active_callback']
			),
		),
		array(
			'key'             => $settings['field_prefix'] . 'ButtonSize',
			'label'           => esc_html__( 'Button Size', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'select',
			'default'         => '',
			'choices'         => array(
				''   => esc_html__( 'Default', 'authentic' ),
				'sm' => esc_html__( 'Small', 'authentic' ),
				'lg' => esc_html__( 'Large', 'authentic' ),
			),
			'active_callback' => array_merge(
				array(
					array(
						'field'    => '$#' . $settings['field_prefix'] . 'ShowViewPostButton',
						'operator' => '==',
						'value'    => true,
					),
				),
				$settings['active_callback']
			),
		),
		array(
			'key'             => $settings['field_prefix'] . 'ButtonFullWidth',
			'label'           => esc_html__( 'Button Full Width', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => false,
			'active_callback' => array_merge(
				array(
					array(
						'field'    => '$#' . $settings['field_prefix'] . 'ShowViewPostButton',
						'operator' => '==',
						'value'    => true,
					),
				),
				$settings['active_callback']
			),
		),
		array(
			'key'             => $settings['field_prefix'] . 'ButtonColorBg',
			'label'           => esc_html__( 'Button Background Color', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'color',
			'default'         => '',
			'output'          => array(
				array(
					'element'  => '$ .wp-block-button a.wp-block-button__link',
					'property' => 'background-color',
					'suffix'   => '!important',
				),
			),
			'active_callback' => array_merge(
				array(
					array(
						'field'    => '$#' . $settings['field_prefix'] . 'ShowViewPostButton',
						'operator' => '==',
						'value'    => true,
					),
				),
				$settings['active_callback']
			),
		),
		array(
			'key'             => $settings['field_prefix'] . 'ButtonColorBgHover',
			'label'           => esc_html__( 'Button Background Color Hover', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'color',
			'default'         => '',
			'output'          => array(
				array(
					'element'  => '$ .wp-block-button a.wp-block-button__link:hover, $ .wp-block-button a.wp-block-button__link:focus',
					'property' => 'background-color',
					'suffix'   => '!important',
				),
			),
			'active_callback' => array_merge(
				array(
					array(
						'field'    => '$#' . $settings['field_prefix'] . 'ShowViewPostButton',
						'operator' => '==',
						'value'    => true,
					),
				),
				$settings['active_callback']
			),
		),
		array(
			'key'             => $settings['field_prefix'] . 'ButtonColorText',
			'label'           => esc_html__( 'Button Text Color', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'color',
			'default'         => '',
			'output'          => array(
				array(
					'element'  => '$ .wp-block-button__link',
					'property' => 'color',
					'suffix'   => '!important',
				),
			),
			'active_callback' => array_merge(
				array(
					array(
						'field'    => '$#' . $settings['field_prefix'] . 'ShowViewPostButton',
						'operator' => '==',
						'value'    => true,
					),
				),
				$settings['active_callback']
			),
		),
		array(
			'key'             => $settings['field_prefix'] . 'ButtonColorTextHover',
			'label'           => esc_html__( 'Button Text Color Hover', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'color',
			'default'         => '',
			'output'          => array(
				array(
					'element'  => '$ .wp-block-button a.wp-block-button__link:hover, $ .wp-block-button a.wp-block-button__link:focus',
					'property' => 'color',
					'suffix'   => '!important',
				),
			),
			'active_callback' => array_merge(
				array(
					array(
						'field'    => '$#' . $settings['field_prefix'] . 'ShowViewPostButton',
						'operator' => '==',
						'value'    => true,
					),
				),
				$settings['active_callback']
			),
		),
	);

	return $fields;
}

/**
 * Get fields array for View Link
 *
 * @param array $settings The settings.
 */
function csco_get_gutenberg_view_link_fields( $settings ) {

	$settings = array_merge( array(
		'field_prefix'    => 'button',
		'section_name'    => '',
		'active_callback' => array(),
		'sep'             => true,
		'default'         => false,
	), $settings );

	// Set fields.
	$fields = array(
		$settings['sep'] ? array(
			'key'             => uniqid(),
			'section'         => $settings['section_name'],
			'type'            => 'separator',
			'active_callback' => $settings['active_callback'],
		) : array(),
		array(
			'key'             => $settings['field_prefix'] . 'ShowViewPostLink',
			'label'           => esc_html__( 'Display view post link', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'toggle',
			'default'         => $settings['default'],
			'active_callback' => $settings['active_callback'],
		),
		array(
			'key'             => $settings['field_prefix'] . 'ViewLabel',
			'label'           => esc_html__( 'View Post Link Label', 'authentic' ),
			'section'         => $settings['section_name'],
			'type'            => 'text',
			'default'         => '',
			'active_callback' => array_merge(
				array(
					array(
						'field'    => '$#' . $settings['field_prefix'] . 'ShowViewPostLink',
						'operator' => '==',
						'value'    => true,
					),
				),
				$settings['active_callback']
			),
		),
	);

	return $fields;
}

/**
 * Print core/button
 *
 * @param string $text         Text of button.
 * @param string $url          Url of button.
 * @param string $target       Target.
 * @param string $field_prefix Field prefix.
 * @param array  $attributes   Attributes.
 * @param array  $class        Class.
 */
function csco_print_gutenberg_blocks_button( $text, $url, $target = '', $field_prefix = 'button', $attributes = array(), $class = null ) {
	$class_name      = 'wp-block-button';
	$link_class_name = 'wp-block-button__link';

	// Style.
	if ( isset( $attributes[ $field_prefix . 'Style' ] ) && $attributes[ $field_prefix . 'Style' ] ) {
		$class_name .= ' is-style-' . $attributes[ $field_prefix . 'Style' ];
	}

	// Size.
	if ( isset( $attributes[ $field_prefix . 'Size' ] ) && $attributes[ $field_prefix . 'Size' ] ) {
		$class_name .= ' is-cnvs-button-size-' . $attributes[ $field_prefix . 'Size' ];
	}

	// FullWidth.
	if ( isset( $attributes[ $field_prefix . 'FullWidth' ] ) && $attributes[ $field_prefix . 'FullWidth' ] ) {
		$class_name .= ' is-cnvs-button-full-width';
	}

	// Color.
	if ( isset( $attributes[ $field_prefix . 'ColorText' ] ) && $attributes[ $field_prefix . 'ColorText' ] ) {
		$link_class_name .= ' has-text-color';
	}

	// Background.
	if ( isset( $attributes[ $field_prefix . 'ColorBg' ] ) && $attributes[ $field_prefix . 'ColorBg' ] ) {
		$link_class_name .= ' has-background';
	}
	?>
	<div class="<?php echo esc_attr( $class_name ); ?>">
		<a class="<?php echo esc_attr( $link_class_name ); ?> <?php echo esc_attr( $class ); ?>" href="<?php echo esc_url( $url ); ?>" target="<?php echo esc_attr( $target ); ?>">
			<span><?php echo wp_kses_post( $text ); ?></span>
			<span><i class="cs-icon cs-icon-arrow-right"></i></span>
		</a>
	</div>
	<?php
}

/**
 * Get icon of carousel by key.
 *
 * @param mixed $key The key.
 */
function csco_get_icon_of_carousel_by( $key ) {

	switch ( $key ) {
		case 'carousel':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><rect stroke="#2D2D2D" stroke-width="1.5" width="50" height="42" rx="3"/><g stroke="#2D2D2D"><rect width="12" height="9" rx="1" transform="translate(19 13)" stroke-width="1.5"/><rect width="12" height="9" rx="1" stroke-width="1.5" transform="translate(4 13)"/><rect width="12" height="9" rx="1" transform="translate(34 13)" stroke-width="1.5"/><path d="M5.278 25.5h9.444M5.238 28h7.19M20.278 25.5h9.444M20.238 28h7.19M35.278 25.5h9.444M35.238 28h7.19" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(20 32)"><circle fill="#2D2D2D" cx="5" cy="1" r="1"/><circle stroke="#2D2D2D" cx="1" cy="1" r="1"/><circle fill="#2D2D2D" cx="9" cy="1" r="1"/></g></g></svg>';
	}
}

/**
 * Get types of tiles.
 */
function csco_get_types_of_tiles() {
	$types = array(
		1 => 'tiles-1',
		2 => 'tiles-2',
		3 => 'tiles-3',
		4 => 'tiles-4',
		5 => 'tiles-5',
		6 => 'tiles-6',
		7 => 'tiles-7',
		8 => 'tiles-8',
		9 => 'tiles-9',
	);

	return $types;
}

/**
 * Get icon of tiles by key.
 *
 * @param mixed $key The key.
 */
function csco_get_icon_of_tiles_by( $key ) {

	switch ( $key ) {
		case 'tiles-1':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M25.5.5v41" stroke-width="1.5"/><path d="M5.444 34.5h15.112M5.429 37H16.57M30.444 34.5h15.112M30.429 37H41.57" stroke-linecap="round" stroke-linejoin="round"/></g></svg>';
		case 'tiles-2':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M17 .389V41.61M33 .389V41.61" stroke-width="1.5"/><path d="M5.194 34.5h6.612M5.179 37H9.82M22.194 34.5h6.612M22.179 37h4.642M39.194 34.5h6.612M39.179 37h4.642" stroke-linecap="round" stroke-linejoin="round"/></g></svg>';
		case 'tiles-3':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M32.5.5v41" stroke-width="1.5"/><path d="M5.611 33.5H26.39M5.589 36h15.322M37.222 33.5h7.556M37.214 36h5.572" stroke-linecap="round" stroke-linejoin="round"/></g></svg>';
		case 'tiles-4':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M32 .5v41M32.5 21h17" stroke-width="1.5"/><path d="M5.611 33.5H26.39M5.589 36h15.322M37.222 33.5h7.556M37.214 36h5.572M37.222 12.5h7.556M37.214 15h5.572" stroke-linecap="round" stroke-linejoin="round"/></g></svg>';
		case 'tiles-5':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M25 .5v41M25.5 21h24" stroke-width="1.5"/><path d="M5.417 33.5h14.166M5.393 36h10.214M30.417 33.5h14.166M30.393 36h10.214M30.417 12.5h14.166M30.393 15h10.214" stroke-linecap="round" stroke-linejoin="round"/></g></svg>';
		case 'tiles-6':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M16.5 21v20.5M.5 21h49M33.5.5v41" stroke-width="1.5"/><path d="M5.194 33.5h6.612M5.179 36H9.82M5.667 12.5h22.666M5.607 15h15.786M21.194 33.5h6.612M21.179 36h4.642M38.194 33.5h6.612M38.179 36h4.642M38.194 12.5h6.612M38.179 15h4.642" stroke-linecap="round" stroke-linejoin="round"/></g></svg>';
		case 'tiles-7':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M25 .5v41M37 .5v41" stroke-width="1.5"/><path d="M28.167 14.5h5.666m-5.69 2.5h3.714M28.167 35.5h5.666m-5.69 2.5h3.714M3.528 35.5h17.944M3.464 38h12.072M40.167 14.5h5.666m-5.69 2.5h3.714M40.167 35.5h5.666m-5.69 2.5h3.714" stroke-linecap="round" stroke-linejoin="round"/><path d="M25.5 21h24" stroke-width="1.5"/></g></svg>';
		case 'tiles-8':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M37 .5v41M13 .5v41" stroke-width="1.5"/><path d="M16.5 35.5h17M16.429 38H27.57M40.194 14.5h6.612M40.179 17h4.642M3.194 14.5h6.612M3.179 17H7.82M40.194 35.5h6.612M40.179 38h4.642M3.194 35.5h6.612M3.179 38H7.82" stroke-linecap="round" stroke-linejoin="round"/><path d="M37.5 21h12M0 21h13" stroke-width="1.5"/></g></svg>';
		case 'tiles-9':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M37 .5v41M13 .5v41M25 .5v41" stroke-width="1.5"/><path d="M41.167 14.5h5.666m-5.69 2.5h3.714M4.167 14.5h5.666M4.143 17h3.714M16.167 14.5h5.666m-5.69 2.5h3.714M16.167 35.5h5.666m-5.69 2.5h3.714M28.167 14.5h5.666m-5.69 2.5h3.714M28.167 35.5h5.666m-5.69 2.5h3.714M41.167 35.5h5.666m-5.69 2.5h3.714M4.167 35.5h5.666M4.143 38h3.714" stroke-linecap="round" stroke-linejoin="round"/><path d="M.5 21h49" stroke-width="1.5"/></g></svg>';
	}
}

/**
 * Check analogy between posts of tiles.
 *
 * @param mixed $key The key.
 */
function csco_check_analogy_of_tiles_by( $key ) {

	$list = array(
		'tiles-1' => true,
		'tiles-2' => true,
		'tiles-3' => false,
		'tiles-4' => false,
		'tiles-5' => false,
		'tiles-6' => false,
		'tiles-7' => false,
		'tiles-8' => false,
		'tiles-9' => true,
	);

	return $list[ $key ];
}

/**
 * Check excerpt of tiles by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_check_excerpt_of_tiles_by( $key, $index ) {

	$list = array(
		'tiles-1' => array( true, true ),
		'tiles-2' => array( true, true, true ),
		'tiles-3' => array( true, false ),
		'tiles-4' => array( true, false, false ),
		'tiles-5' => array( true, false, false ),
		'tiles-6' => array( true, false, false, false, false ),
		'tiles-7' => array( true, false, false, false, false ),
		'tiles-8' => array( true, false, false, false, false ),
		'tiles-9' => array( false, false, false, false, false, false, false, false ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Check button of tiles by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_check_button_of_tiles_by( $key, $index ) {

	$list = array(
		'tiles-1' => array( true, true ),
		'tiles-2' => array( true, true, true ),
		'tiles-3' => array( true, true ),
		'tiles-4' => array( true, false, false ),
		'tiles-5' => array( true, false, false ),
		'tiles-6' => array( true, false, false, false, false ),
		'tiles-7' => array( true, false, false, false, false ),
		'tiles-8' => array( true, false, false, false, false ),
		'tiles-9' => array( false, false, false, false, false, false, false, false ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Check type of tiles by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_type_of_tiles_by( $key, $index ) {

	$list = array(
		'tiles-1' => array( 'primary', 'primary' ),
		'tiles-2' => array( 'primary', 'primary', 'primary' ),
		'tiles-3' => array( 'primary', 'secondary' ),
		'tiles-4' => array( 'primary', 'secondary', 'secondary' ),
		'tiles-5' => array( 'primary', 'secondary', 'secondary' ),
		'tiles-6' => array( 'primary', 'secondary', 'secondary', 'secondary', 'secondary' ),
		'tiles-7' => array( 'primary', 'secondary', 'secondary', 'secondary', 'secondary' ),
		'tiles-8' => array( 'primary', 'secondary', 'secondary', 'secondary', 'secondary' ),
		'tiles-9' => array( 'primary', 'primary', 'primary', 'primary', 'primary', 'primary', 'primary', 'primary' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Check size of tiles by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_size_of_tiles_by( $key, $index ) {

	$list = array(
		'tiles-1' => array( 'large', 'large' ),
		'tiles-2' => array( 'large', 'large', 'large' ),
		'tiles-3' => array( 'large', 'large' ),
		'tiles-4' => array( 'large', 'medium', 'medium' ),
		'tiles-5' => array( 'large', 'medium', 'medium' ),
		'tiles-6' => array( 'large', 'medium', 'medium', 'medium', 'medium' ),
		'tiles-7' => array( 'large', 'medium', 'medium', 'medium', 'medium' ),
		'tiles-8' => array( 'large', 'medium', 'medium', 'medium', 'medium' ),
		'tiles-9' => array( 'small', 'small', 'small', 'small', 'small', 'small', 'small', 'small' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Check type of tiles by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_typography_of_tiles_by( $key, $index ) {

	$list = array(
		'tiles-1' => array( 'large', 'large' ),
		'tiles-2' => array( 'small', 'small', 'small' ),
		'tiles-3' => array( 'large', 'small' ),
		'tiles-4' => array( 'large', 'small', 'small' ),
		'tiles-5' => array( 'large', 'small', 'small' ),
		'tiles-6' => array( 'large', 'small', 'small', 'small', 'small' ),
		'tiles-7' => array( 'large', 'small', 'small', 'small', 'small' ),
		'tiles-8' => array( 'large', 'small', 'small', 'small', 'small' ),
		'tiles-9' => array( 'small', 'small', 'small', 'small', 'small', 'small', 'small', 'small' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get types of slider.
 */
function csco_get_types_of_slider() {
	$types = array(
		'slider-center'   => 'slider-center',
		'slider-multiple' => 'slider-multiple',
		'slider-wide'     => 'slider-wide',
		'slider-large'    => 'slider-large',
		'slider-boxed'    => 'slider-boxed',
	);

	return $types;
}

/**
 * Get name of slider by key.
 *
 * @param mixed $key The key.
 */
function csco_get_name_of_slider_by( $key ) {

	switch ( $key ) {
		case 'slider-center':
			return esc_html__( 'Slider 1', 'authentic' );
		case 'slider-multiple':
			return esc_html__( 'Slider 2', 'authentic' );
		case 'slider-wide':
			return esc_html__( 'Slider 3', 'authentic' );
		case 'slider-large':
			return esc_html__( 'Slider 4', 'authentic' );
		case 'slider-boxed':
			return esc_html__( 'Slider 5', 'authentic' );
	}
}

/**
 * Get icon of slider by key.
 *
 * @param mixed $key The key.
 */
function csco_get_icon_of_slider_by( $key ) {

	switch ( $key ) {
		case 'slider-center':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><rect id="a" x="0" y="0" width="50" height="42" rx="3"/></defs><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><mask id="b" fill="#fff"><use xlink:href="#a"/></mask><use stroke="#2D2D2D" stroke-width="1.5" xlink:href="#a"/><rect stroke="#2D2D2D" stroke-width="1.5" mask="url(#b)" x="11" y="10" width="28" height="20" rx="1"/><g mask="url(#b)"><g transform="translate(20 34)"><circle fill="#2D2D2D" cx="5" cy="1" r="1"/><circle stroke="#2D2D2D" cx="1" cy="1" r="1"/><circle fill="#2D2D2D" cx="9" cy="1" r="1"/></g></g><rect stroke="#2D2D2D" stroke-width="1.5" mask="url(#b)" x="43" y="10" width="28" height="20" rx="1"/><rect stroke="#2D2D2D" stroke-width="1.5" mask="url(#b)" x="-21" y="10" width="28" height="20" rx="1"/></g></svg>';
		case 'slider-multiple':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><rect stroke="#2D2D2D" stroke-width="1.5" width="50" height="42" rx="3"/><path d="M.5 32.5h49M17 .5v32M34 .5v32" stroke="#2D2D2D" stroke-width="1.5"/><g transform="translate(20 36)"><circle fill="#2D2D2D" cx="5" cy="1" r="1"/><circle stroke="#2D2D2D" cx="1" cy="1" r="1"/><circle fill="#2D2D2D" cx="9" cy="1" r="1"/></g></g></svg>';
		case 'slider-boxed':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><rect id="a" x="0" y="0" width="50" height="42" rx="3"/></defs><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><mask id="b" fill="#fff"><use xlink:href="#a"/></mask><use stroke="#2D2D2D" stroke-width="1.5" xlink:href="#a"/><rect stroke="#2D2D2D" stroke-width="1.5" mask="url(#b)" x="7" y="10" width="36" height="20" rx="1"/><g mask="url(#b)"><g transform="translate(20 34)"><circle fill="#2D2D2D" cx="5" cy="1" r="1"/><circle stroke="#2D2D2D" cx="1" cy="1" r="1"/><circle fill="#2D2D2D" cx="9" cy="1" r="1"/></g></g></g></svg>';
		case 'slider-wide':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><rect id="a" x="0" y="0" width="50" height="42" rx="3"/></defs><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><mask id="b" fill="#fff"><use xlink:href="#a"/></mask><use stroke="#2D2D2D" stroke-width="1.5" xlink:href="#a"/><rect stroke="#2D2D2D" stroke-width="1.5" mask="url(#b)" x="-2" y="10" width="54" height="22" rx="1"/><g mask="url(#b)"><g transform="translate(20 27)"><circle fill="#2D2D2D" cx="5" cy="1" r="1"/><circle stroke="#2D2D2D" cx="1" cy="1" r="1"/><circle fill="#2D2D2D" cx="9" cy="1" r="1"/></g></g></g></svg>';
		case 'slider-large':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><rect id="a" x="0" y="0" width="50" height="42" rx="3"/></defs><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><mask id="b" fill="#fff"><use xlink:href="#a"/></mask><use stroke="#2D2D2D" stroke-width="1.5" xlink:href="#a"/><rect stroke="#2D2D2D" stroke-width="1.5" mask="url(#b)" x="-2" y="4" width="54" height="34" rx="1"/><g mask="url(#b)"><g transform="translate(20 33)"><circle fill="#2D2D2D" cx="5" cy="1" r="1"/><circle stroke="#2D2D2D" cx="1" cy="1" r="1"/><circle fill="#2D2D2D" cx="9" cy="1" r="1"/></g></g></g></svg>';
	}
}

/**
 * Get types of wide.
 */
function csco_get_types_of_wide() {
	$types = array(
		1  => 'wide-1',
		2  => 'wide-2',
		3  => 'wide-3',
		4  => 'wide-4',
		5  => 'wide-5',
		6  => 'wide-6',
		7  => 'wide-7',
		8  => 'wide-8',
		9  => 'wide-9',
		10 => 'wide-10',
		11 => 'wide-11',
	);

	return $types;
}

/**
 * Get icon of wide by key.
 *
 * @param mixed $key The key.
 */
function csco_get_icon_of_wide_by( $key ) {

	switch ( $key ) {
		case 'wide-1':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M25 .389V41.61" stroke-width="1.5" stroke-linecap="square"/><path d="M24.5 20.5h25" stroke-width="1.5"/><path d="M4.472 34.5h16.056M4.428 37h11.143M29.472 14.5h16.056m-16.1 2.5h11.143" stroke-linecap="round" stroke-linejoin="round"/><g transform="translate(29 25)"><path d="M.194 10.5h6.612M.214 13h5.572" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="7" height="8" rx="1"/></g><g transform="translate(39 25)"><path d="M.194 10.5h6.612M.214 13h5.572" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="7" height="8" rx="1"/></g></g></svg>';
		case 'wide-2':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M25 .389V41.61" stroke-width="1.5" stroke-linecap="square"/><g transform="translate(29 4)"><path d="M.472 19.5h16.056M.536 22h13.928" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="17" height="16.5" rx="1"/></g><g transform="translate(29 30)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.167 2.5h5.666M11.143 5h3.714" stroke-linecap="round" stroke-linejoin="round"/></g><path d="M4.472 34.5h16.056M4.428 37h11.143" stroke-linecap="round" stroke-linejoin="round"/></g></svg>';
		case 'wide-3':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" y="1" width="50" height="42" rx="3"/><path d="M25 1v41.222" stroke-width="1.5" stroke-linecap="square"/><path d="M29.472 35.5h16.056m-16.1 2.5h11.143" stroke-linecap="round" stroke-linejoin="round"/><g transform="translate(4 5)"><path d="M.472 19.5h16.056M.536 22h13.928" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="17" height="16.5" rx="1"/></g><g transform="translate(4 31)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.167 2.5h5.666M11.143 5h3.714" stroke-linecap="round" stroke-linejoin="round"/></g></g></svg>';
		case 'wide-4':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M17 .389V41.61" stroke-width="1.5" stroke-linecap="square"/><path d="M3.278 35.5h9.444M3.25 38h6.5" stroke-linecap="round" stroke-linejoin="round"/><g transform="translate(21 4)"><path d="M1.25 12.5h8.5M1.214 15h5.572" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="11" height="9" rx="1"/></g><g transform="translate(21 23)"><path d="M1.25 12.5h8.5M1.214 15h5.572" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="11" height="9" rx="1"/></g><g transform="translate(35 4)"><path d="M1.25 12.5h8.5M1.214 15h5.572" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="11" height="9" rx="1"/></g><g transform="translate(35 23)"><path d="M1.25 12.5h8.5M1.214 15h5.572" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="11" height="9" rx="1"/></g></g></svg>';
		case 'wide-5':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M33 .389V41.61M17 .389V41.61" stroke-width="1.5" stroke-linecap="square"/><path d="M20.278 34.5h9.444M20.25 37h6.5M4.25 16.5h8.5M4.214 19h5.572M37.25 16.5h8.5M37.214 19h5.572" stroke-linecap="round" stroke-linejoin="round"/><g transform="translate(3 23)"><path d="M6.139 1.5h4.722M6.143 4h3.714" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="4" height="6" rx="1"/></g><g transform="translate(36 23)"><path d="M6.139 1.5h4.722M6.143 4h3.714" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="4" height="6" rx="1"/></g><g transform="translate(3 33)"><path d="M6.139 1.5h4.722M6.143 4h3.714" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="4" height="6" rx="1"/></g><g transform="translate(36 33)"><path d="M6.139 1.5h4.722M6.143 4h3.714" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="4" height="6" rx="1"/></g><rect stroke-width="1.5" x="3" y="3" width="11" height="10" rx="1"/><rect stroke-width="1.5" x="36" y="3" width="11" height="10" rx="1"/></g></svg>';
		case 'wide-6':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><rect stroke="#2D2D2D" stroke-width="1.5" width="50" height="42" rx="3"/><g transform="translate(4 5)" stroke="#2D2D2D"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(4 17)" stroke="#2D2D2D"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(27 5)" stroke="#2D2D2D"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(27 17)" stroke="#2D2D2D"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(4 29)" stroke="#2D2D2D"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(27 29)" stroke="#2D2D2D"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><text font-family="FuturaPT-Bold, Futura PT" font-size="6" font-weight="bold" fill="#2D2D2D"><tspan x="6.2" y="11">1</tspan></text><text font-family="FuturaPT-Bold, Futura PT" font-size="6" font-weight="bold" fill="#2D2D2D"><tspan x="29.2" y="11">4</tspan></text><text font-family="FuturaPT-Bold, Futura PT" font-size="6" font-weight="bold" fill="#2D2D2D"><tspan x="6.2" y="23">2</tspan></text><text font-family="FuturaPT-Bold, Futura PT" font-size="6" font-weight="bold" fill="#2D2D2D"><tspan x="29.2" y="23">5</tspan></text><text font-family="FuturaPT-Bold, Futura PT" font-size="6" font-weight="bold" fill="#2D2D2D"><tspan x="6.2" y="35">3</tspan></text><text font-family="FuturaPT-Bold, Futura PT" font-size="6" font-weight="bold" fill="#2D2D2D"><tspan x="29.2" y="35">6</tspan></text></g></svg>';
		case 'wide-7':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><rect stroke="#2D2D2D" stroke-width="1.5" width="50" height="42" rx="3"/><g transform="translate(5 5)"><rect stroke="#2D2D2D" stroke-width="1.5" width="11" height="8" rx="1"/><text font-family="FuturaPT-Bold, Futura PT" font-size="6" font-weight="bold" fill="#2D2D2D"><tspan x="14.2" y="6">1</tspan></text></g><g transform="translate(5 17)"><rect stroke="#2D2D2D" stroke-width="1.5" width="11" height="8" rx="1"/><text font-family="FuturaPT-Bold, Futura PT" font-size="6" font-weight="bold" fill="#2D2D2D"><tspan x="14.2" y="6">2</tspan></text></g><g transform="translate(27 5)"><rect stroke="#2D2D2D" stroke-width="1.5" width="11" height="8" rx="1"/><text font-family="FuturaPT-Bold, Futura PT" font-size="6" font-weight="bold" fill="#2D2D2D"><tspan x="14.2" y="6">4</tspan></text></g><g transform="translate(27 17)"><rect stroke="#2D2D2D" stroke-width="1.5" width="11" height="8" rx="1"/><text font-family="FuturaPT-Bold, Futura PT" font-size="6" font-weight="bold" fill="#2D2D2D"><tspan x="14.2" y="6">5</tspan></text></g><g transform="translate(5 29)"><rect stroke="#2D2D2D" stroke-width="1.5" width="11" height="8" rx="1"/><text font-family="FuturaPT-Bold, Futura PT" font-size="6" font-weight="bold" fill="#2D2D2D"><tspan x="14.2" y="6">3</tspan></text></g><g transform="translate(27 29)"><rect stroke="#2D2D2D" stroke-width="1.5" width="11" height="8" rx="1"/><text font-family="FuturaPT-Bold, Futura PT" font-size="6" font-weight="bold" fill="#2D2D2D"><tspan x="14.2" y="6">6</tspan></text></g></g></svg>';
		case 'wide-8':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><g transform="translate(4 5)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(4 17)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(27 5)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(27 17)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(4 29)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(27 29)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g></g></svg>';
		case 'wide-9':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><g transform="translate(27 5)"><path d="M.5 16.5h17M.464 19h12.072" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" x="1" width="17" height="13.5" rx="1"/></g><g transform="translate(5 5)"><path d="M.5 16.5h17M.464 19h12.072" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="18" height="13.5" rx="1"/></g><g transform="translate(5 29)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.194 2.5h6.612M11.143 5h3.714" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(27 29)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.194 2.5h6.612M11.143 5h3.714" stroke-linecap="round" stroke-linejoin="round"/></g></g></svg>';
		case 'wide-10':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><g transform="translate(27 5)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(4 5)"><path d="M1.964 29h17M1.93 32h12m-12-6h16" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" x="1" width="18" height="22" rx="1"/></g><g transform="translate(27 17)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(27 29)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g></g></svg>';
		case 'wide-11':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><g transform="translate(3 17.5)"><rect stroke-width="1.5" width="5" height="8" rx="1"/><path d="M8.139 2.5h4.722M8.111 5h2.902" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(19 17.5)"><rect stroke-width="1.5" width="5" height="8" rx="1"/><path d="M8.139 2.5h4.722M8.111 5h2.902" stroke-linecap="round" stroke-linejoin="round"/></g><path d="M.5 12.5h49M.5 30.5h49" stroke-width="1.5"/><g transform="translate(35 17.5)"><rect stroke-width="1.5" width="5" height="8" rx="1"/><path d="M8.139 2.5h4.722M8.111 5h2.902" stroke-linecap="round" stroke-linejoin="round"/></g></g></svg>';
	}
}

/**
 * Check analogy between posts of wide.
 *
 * @param mixed $key The key.
 */
function csco_check_analogy_of_wide_by( $key ) {

	$list = array(
		'wide-1'  => false,
		'wide-2'  => false,
		'wide-3'  => false,
		'wide-4'  => false,
		'wide-5'  => false,
		'wide-6'  => true,
		'wide-7'  => true,
		'wide-8'  => true,
		'wide-9'  => false,
		'wide-10' => false,
		'wide-11' => true,
	);

	return $list[ $key ];
}

/**
 * Get type of wide by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_type_of_wide_by( $key, $index ) {

	$list = array(
		'wide-1'  => array( 'primary', 'secondary', 'additional', 'additional' ),
		'wide-2'  => array( 'primary', 'secondary', 'additional', 'additional' ),
		'wide-3'  => array( 'primary', 'secondary', 'additional', 'additional' ),
		'wide-4'  => array( 'primary', 'secondary', 'secondary', 'secondary', 'secondary' ),
		'wide-5'  => array( 'primary', 'secondary', 'additional', 'additional', 'additional', 'secondary', 'additional', 'additional', 'additional' ),
		'wide-6'  => array( 'primary', 'primary', 'primary', 'primary', 'primary', 'primary', 'primary' ),
		'wide-7'  => array( 'primary', 'primary', 'primary', 'primary', 'primary', 'primary', 'primary' ),
		'wide-8'  => array( 'primary', 'primary', 'primary', 'primary', 'primary', 'primary', 'primary' ),
		'wide-9'  => array( 'primary', 'primary', 'additional', 'additional', 'additional', 'additional' ),
		'wide-10' => array( 'primary', 'secondary', 'secondary', 'secondary', 'secondary' ),
		'wide-11' => array( 'primary', 'primary', 'primary' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get size of wide by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_size_of_wide_by( $key, $index ) {

	$list = array(
		'wide-1'  => array( 'large', 'medium', 'medium', 'medium' ),
		'wide-2'  => array( 'large', 'medium', 'small', 'small' ),
		'wide-3'  => array( 'large', 'medium', 'small', 'small' ),
		'wide-4'  => array( 'large', 'medium', 'medium', 'medium', 'medium' ),
		'wide-5'  => array( 'large', 'medium', 'small', 'small', 'small', 'medium', 'small', 'small', 'small' ),
		'wide-6'  => array( 'medium', 'medium', 'medium', 'medium', 'medium', 'medium', 'medium' ),
		'wide-7'  => array( 'medium', 'medium', 'medium', 'medium', 'medium', 'medium', 'medium' ),
		'wide-8'  => array( 'medium', 'medium', 'medium', 'medium', 'medium', 'medium', 'medium' ),
		'wide-9'  => array( 'large', 'large', 'small', 'small', 'small', 'small' ),
		'wide-10' => array( 'large', 'medium', 'medium', 'medium', 'medium' ),
		'wide-11' => array( 'small', 'small', 'small' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get variation of wide by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_variation_of_wide_by( $key, $index ) {

	$list = array(
		'wide-1'  => array( 'tile', 'tile', 'simple', 'simple' ),
		'wide-2'  => array( 'tile', 'simple', 'simple', 'simple' ),
		'wide-3'  => array( 'tile', 'simple', 'simple', 'simple' ),
		'wide-4'  => array( 'tile', 'simple', 'simple', 'simple', 'simple' ),
		'wide-5'  => array( 'tile', 'simple', 'simple', 'simple', 'simple', 'simple', 'simple', 'simple', 'simple' ),
		'wide-6'  => array( 'simple', 'simple', 'simple', 'simple', 'simple', 'simple', 'simple' ),
		'wide-7'  => array( 'simple', 'simple', 'simple', 'simple', 'simple', 'simple', 'simple' ),
		'wide-8'  => array( 'simple', 'simple', 'simple', 'simple', 'simple', 'simple', 'simple' ),
		'wide-9'  => array( 'simple', 'simple', 'simple', 'simple', 'simple', 'simple' ),
		'wide-10' => array( 'simple', 'simple', 'simple', 'simple', 'simple' ),
		'wide-11' => array( 'simple', 'simple', 'simple' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Check excerpt of wide by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_check_excerpt_of_wide_by( $key, $index ) {

	$list = array(
		'wide-1'  => array( true, false, false, false ),
		'wide-2'  => array( true, false, false, false ),
		'wide-3'  => array( true, false, false, false ),
		'wide-4'  => array( true, false, false, false, false ),
		'wide-5'  => array( true, false, false, false, false, false, false, false, false ),
		'wide-6'  => array( false, false, false, false, false, false, false ),
		'wide-7'  => array( false, false, false, false, false, false, false ),
		'wide-8'  => array( false, false, false, false, false, false, false ),
		'wide-9'  => array( true, true, false, false, false, false ),
		'wide-10' => array( true, true, true, true, true ),
		'wide-11' => array( false, false, false ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Check button of wide by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_check_button_of_wide_by( $key, $index ) {

	$list = array(
		'wide-1'  => array( true, false, false, false ),
		'wide-2'  => array( true, false, false, false ),
		'wide-3'  => array( true, false, false, false ),
		'wide-4'  => array( true, false, false, false, false ),
		'wide-5'  => array( true, false, false, false, false, false, false, false, false ),
		'wide-6'  => array( false, false, false, false, false, false, false ),
		'wide-7'  => array( false, false, false, false, false, false, false ),
		'wide-8'  => array( false, false, false, false, false, false, false ),
		'wide-9'  => array( true, true, false, false, false, false ),
		'wide-10' => array( true, false, false, false, false ),
		'wide-11' => array( false, false, false ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get orientation of wide by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_orientation_of_wide_by( $key, $index ) {

	$list = array(
		'wide-1'  => array( 'portrait', 'landscape', 'landscape', 'landscape' ),
		'wide-2'  => array( 'portrait', 'landscape', 'square', 'square' ),
		'wide-3'  => array( 'portrait', 'landscape', 'square', 'square' ),
		'wide-4'  => array( 'portrait', 'landscape', 'landscape', 'landscape', 'landscape' ),
		'wide-5'  => array( 'portrait', 'landscape', 'square', 'square', 'square', 'landscape', 'square', 'square', 'square' ),
		'wide-6'  => array( 'square', 'square', 'square', 'square', 'square', 'square', 'square' ),
		'wide-7'  => array( 'square', 'square', 'square', 'square', 'square', 'square', 'square' ),
		'wide-8'  => array( 'square', 'square', 'square', 'square', 'square', 'square', 'square' ),
		'wide-9'  => array( 'landscape', 'landscape', 'square', 'square', 'square', 'square' ),
		'wide-10' => array( 'landscape', 'landscape', 'landscape', 'landscape', 'landscape' ),
		'wide-11' => array( 'square', 'square', 'square' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get typography of wide by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_typography_of_wide_by( $key, $index ) {

	$list = array(
		'wide-1'  => array( 'large', 'medium', 'small', 'small' ),
		'wide-2'  => array( 'large', 'medium', 'small', 'small' ),
		'wide-3'  => array( 'large', 'medium', 'small', 'small' ),
		'wide-4'  => array( 'large', 'medium', 'medium', 'medium', 'medium' ),
		'wide-5'  => array( 'large', 'medium', 'small', 'small', 'small', 'medium', 'small', 'small', 'small' ),
		'wide-6'  => array( 'medium', 'medium', 'medium', 'medium', 'medium', 'medium', 'medium' ),
		'wide-7'  => array( 'medium', 'medium', 'medium', 'medium', 'medium', 'medium', 'medium' ),
		'wide-8'  => array( 'medium', 'medium', 'medium', 'medium', 'medium', 'medium', 'medium' ),
		'wide-9'  => array( 'large', 'large', 'small', 'small', 'small', 'small' ),
		'wide-10' => array( 'large', 'medium', 'medium', 'medium', 'medium' ),
		'wide-11' => array( 'small', 'small', 'small' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get meta of wide by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_check_meta_of_wide_by( $key, $index ) {

	$meta = array();

	$list = array(
		'wide-1'  => array( false, false, true, true ),
		'wide-2'  => array( false, true, false, false ),
		'wide-3'  => array( false, true, false, false ),
		'wide-4'  => array( false, true, true, true, true ),
		'wide-5'  => array( false, true, false, false, false, true, false, false, false ),
		'wide-6'  => array( false, false, false, false, false, false, false ),
		'wide-7'  => array( false, false, false, false, false, false, false ),
		'wide-8'  => array( false, false, false, false, false, false, false ),
		'wide-9'  => array( false, false, false, false, false, false ),
		'wide-10' => array( false, false, false, false, false ),
		'wide-11' => array( false, false, false ),
	);

	$in_image = $list[ $key ][ $index - 1 ];

	if ( $in_image ) {
		$meta['top']    = 'category';
		$meta['image']  = array( 'reading_time', 'views' );
		$meta['bottom'] = array( 'date', 'author', 'comments', 'shares' );
	} else {
		$meta['top']    = 'category';
		$meta['image']  = array();
		$meta['bottom'] = array( 'date', 'author', 'comments', 'reading_time', 'views', 'shares' );
	}

	return $meta;
}

/**
 * Hook before of wide by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_before_hook_wide_by( $key, $index ) {
	if ( 'wide-5' === $key && 2 === $index ) {
		echo '<div class="cs-wide-area cs-wide-area1">';
	}
	if ( 'wide-5' === $key && 6 === $index ) {
		echo '<div class="cs-wide-area cs-wide-area2">';
	}
	if ( 'wide-10' === $key && 1 === $index ) {
		echo '<div class="cs-wide-area cs-wide-area1">';
	}
	if ( 'wide-10' === $key && 2 === $index ) {
		echo '<div class="cs-wide-area cs-wide-area2">';
	}
}

/**
 * Hook before of wide by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_after_hook_wide_by( $key, $index ) {
	if ( 'wide-5' === $key && 5 === $index ) {
		echo '</div>';
	}
	if ( 'wide-5' === $key && 9 === $index ) {
		echo '</div>';
	}
	if ( 'wide-10' === $key && 1 === $index ) {
		echo '</div>';
	}
	if ( 'wide-10' === $key && 4 === $index ) {
		echo '</div>';
	}
}

/**
 * Get types of narrow.
 */
function csco_get_types_of_narrow() {
	$types = array(
		1 => 'narrow-1',
		2 => 'narrow-2',
		3 => 'narrow-3',
		4 => 'narrow-4',
		5 => 'narrow-5',
	);

	return $types;
}

/**
 * Get icon of narrow by key.
 *
 * @param mixed $key The key.
 */
function csco_get_icon_of_narrow_by( $key ) {

	switch ( $key ) {
		case 'narrow-1':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M18 .389V41.61" stroke-width="1.5" stroke-linecap="square"/><path d="M4.278 34.5h9.444M4.25 37h6.5" stroke-linecap="round" stroke-linejoin="round"/><g transform="translate(21 4)"><path d="M1.25 12.5h8.5M1.214 15h5.572" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="11" height="9" rx="1"/></g><g transform="translate(21 23)"><path d="M1.25 12.5h8.5M1.214 15h5.572" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="11" height="9" rx="1"/></g><g transform="translate(36 4)"><path d="M1.25 12.5h8.5M1.214 15h5.572" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="11" height="9" rx="1"/></g><g transform="translate(36 23)"><path d="M1.25 12.5h8.5M1.214 15h5.572" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="11" height="9" rx="1"/></g></g></svg>';
		case 'narrow-2':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><g transform="translate(3.639 4)"><rect stroke-width="1.5" x=".361" width="13" height="25.5" rx="1"/><path d="M.861 31.5H12.64M.86 34h10m-10-5h11" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(21 4)"><path d="M1.25 12.5h8.5M1.214 15h5.572" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="11" height="9" rx="1"/></g><g transform="translate(21 23)"><path d="M1.25 12.5h8.5M1.214 15h5.572" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="11" height="9" rx="1"/></g><g transform="translate(36 4)"><path d="M1.25 12.5h8.5M1.214 15h5.572" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="11" height="9" rx="1"/></g><g transform="translate(36 23)"><path d="M1.25 12.5h8.5M1.214 15h5.572" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="11" height="9" rx="1"/></g></g></svg>';
		case 'narrow-3':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M25 .389V41.61" stroke-width="1.5" stroke-linecap="square"/><g transform="translate(29 4)"><path d="M.472 19.5h16.056M.536 22h13.928" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="17" height="16.5" rx="1"/></g><g transform="translate(29 30)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.167 2.5h5.666M11.107 5h3.786" stroke-linecap="round" stroke-linejoin="round"/></g><path d="M4.472 34.5h16.056M4.428 37h11.143" stroke-linecap="round" stroke-linejoin="round"/></g></svg>';
		case 'narrow-4':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><g transform="translate(4 4)"><rect stroke-width="1.5" x=".361" width="20" height="28.5" rx="1"/><path d="M.583 31.5h19.834M.536 34h13.928" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(29 4)"><path d="M.472 19.5h16.056M.536 22h13.928" stroke-linecap="round" stroke-linejoin="round"/><rect stroke-width="1.5" width="17" height="16.5" rx="1"/></g><g transform="translate(29 30)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.167 2.5h5.666M11.107 5h3.786" stroke-linecap="round" stroke-linejoin="round"/></g></g></svg>';
		case 'narrow-5':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><g transform="translate(27 5)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><path d="M23 .5v41" stroke-width="1.5"/><path d="M4.417 33.5h14.166M4.393 36h10.214" stroke-linecap="round" stroke-linejoin="round"/><g transform="translate(27 17)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(27 29)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g></g></svg>';
	}
}

/**
 * Get type of narrow by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_type_of_narrow_by( $key, $index ) {

	$list = array(
		'narrow-1' => array( 'primary', 'secondary', 'secondary', 'secondary', 'secondary' ),
		'narrow-2' => array( 'primary', 'secondary', 'secondary', 'secondary', 'secondary' ),
		'narrow-3' => array( 'primary', 'secondary', 'additional', 'additional' ),
		'narrow-4' => array( 'primary', 'secondary', 'additional', 'additional' ),
		'narrow-5' => array( 'primary', 'additional', 'additional', 'additional', 'additional', 'additional' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get size of narrow by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_size_of_narrow_by( $key, $index ) {

	$list = array(
		'narrow-1' => array( 'large', 'medium', 'medium', 'medium', 'medium' ),
		'narrow-2' => array( 'large', 'medium', 'medium', 'medium', 'medium' ),
		'narrow-3' => array( 'large', 'medium', 'small', 'small' ),
		'narrow-4' => array( 'large', 'medium', 'small', 'small' ),
		'narrow-5' => array( 'large', 'small', 'small', 'small', 'small', 'small' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get variation of wide by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_variation_of_narrow_by( $key, $index ) {

	$list = array(
		'narrow-1' => array( 'tile', 'simple', 'simple', 'simple', 'simple' ),
		'narrow-2' => array( 'simple', 'simple', 'simple', 'simple', 'simple' ),
		'narrow-3' => array( 'tile', 'simple', 'simple', 'simple' ),
		'narrow-4' => array( 'simple', 'simple', 'simple', 'simple' ),
		'narrow-5' => array( 'tile', 'simple', 'simple', 'simple', 'simple', 'simple' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get orientation of narrow by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_orientation_of_narrow_by( $key, $index ) {

	$list = array(
		'narrow-1' => array( 'portrait', 'landscape', 'landscape', 'landscape', 'landscape' ),
		'narrow-2' => array( 'landscape', 'landscape', 'landscape', 'landscape', 'landscape' ),
		'narrow-3' => array( 'portrait', 'landscape', 'square', 'square' ),
		'narrow-4' => array( 'landscape', 'landscape', 'square', 'square' ),
		'narrow-5' => array( 'portrait', 'square', 'square', 'square', 'square', 'square' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get typography of narrow by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_typography_of_narrow_by( $key, $index ) {

	$list = array(
		'narrow-1' => array( 'large', 'medium', 'medium', 'medium', 'medium' ),
		'narrow-2' => array( 'large', 'medium', 'medium', 'medium', 'medium' ),
		'narrow-3' => array( 'large', 'medium', 'small', 'small' ),
		'narrow-4' => array( 'large', 'medium', 'small', 'small' ),
		'narrow-5' => array( 'large', 'small', 'small', 'small', 'small', 'small' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Check excerpt of narrow by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_check_excerpt_of_narrow_by( $key, $index ) {

	$list = array(
		'narrow-1' => array( true, false, false, false, false ),
		'narrow-2' => array( true, false, false, false, false ),
		'narrow-3' => array( true, false, false, false ),
		'narrow-4' => array( true, false, false, false ),
		'narrow-5' => array( true, false, false, false, false, false ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Check button of narrow by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_check_button_of_narrow_by( $key, $index ) {

	$list = array(
		'narrow-1' => array( true, false, false, false, false ),
		'narrow-2' => array( true, false, false, false, false ),
		'narrow-3' => array( true, false, false, false ),
		'narrow-4' => array( true, false, false, false ),
		'narrow-5' => array( true, false, false, false, false, false ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Check meta of narrow by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_check_meta_of_narrow_by( $key, $index ) {

	$meta = array();

	$list = array(
		'narrow-1' => array( false, false, false, false, false ),
		'narrow-2' => array( false, false, false, false, false ),
		'narrow-3' => array( false, true, false, false ),
		'narrow-4' => array( true, true, false, false ),
		'narrow-5' => array( false, false, false, false, false, false ),
	);

	$in_image = $list[ $key ][ $index - 1 ];

	if ( $in_image ) {
		$meta['top']    = 'category';
		$meta['image']  = array( 'reading_time', 'views' );
		$meta['bottom'] = array( 'date', 'author', 'comments', 'shares' );
	} else {
		$meta['top']    = 'category';
		$meta['image']  = array();
		$meta['bottom'] = array( 'date', 'author', 'comments', 'reading_time', 'views', 'shares' );
	}

	return $meta;
}

/**
 * Hook before of narrow by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_before_hook_narrow_by( $key, $index ) {
	if ( 'narrow-1' === $key && 1 === $index ) {
		echo '<div class="cs-narrow-area cs-narrow-area1">';
	}
	if ( 'narrow-1' === $key && 2 === $index ) {
		echo '<div class="cs-narrow-area cs-narrow-area2">';
	}
	if ( 'narrow-2' === $key && 1 === $index ) {
		echo '<div class="cs-narrow-area cs-narrow-area1">';
	}
	if ( 'narrow-2' === $key && 2 === $index ) {
		echo '<div class="cs-narrow-area cs-narrow-area2">';
	}
	if ( 'narrow-3' === $key && 1 === $index ) {
		echo '<div class="cs-narrow-area cs-narrow-area1">';
	}
	if ( 'narrow-3' === $key && 2 === $index ) {
		echo '<div class="cs-narrow-area cs-narrow-area2">';
	}
	if ( 'narrow-4' === $key && 1 === $index ) {
		echo '<div class="cs-narrow-area cs-narrow-area1">';
	}
	if ( 'narrow-4' === $key && 2 === $index ) {
		echo '<div class="cs-narrow-area cs-narrow-area2">';
	}
}

/**
 * Hook before of narrow by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_after_hook_narrow_by( $key, $index ) {
	if ( 'narrow-1' === $key && 1 === $index ) {
		echo '</div>';
	}
	if ( 'narrow-1' === $key && 5 === $index ) {
		echo '</div>';
	}
	if ( 'narrow-2' === $key && 1 === $index ) {
		echo '</div>';
	}
	if ( 'narrow-2' === $key && 5 === $index ) {
		echo '</div>';
	}
	if ( 'narrow-3' === $key && 1 === $index ) {
		echo '</div>';
	}
	if ( 'narrow-3' === $key && 4 === $index ) {
		echo '</div>';
	}
	if ( 'narrow-4' === $key && 1 === $index ) {
		echo '</div>';
	}
	if ( 'narrow-4' === $key && 4 === $index ) {
		echo '</div>';
	}
}

/**
 * Get types of horizontal tiles.
 */
function csco_get_types_of_horizontal_tiles() {
	$types = array(
		10 => 'horizontal-tiles-1',
		11 => 'horizontal-tiles-2',
		12 => 'horizontal-tiles-3',
	);

	return $types;
}

/**
 * Get icon of horizontal tiles by key.
 *
 * @param mixed $key The key.
 */
function csco_get_icon_of_horizontal_tiles_by( $key ) {

	switch ( $key ) {
		case 'horizontal-tiles-1':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M26 .389V41.61M38 .389V41.61" stroke-width="1.5"/><path d="M3.556 34.5h18.888M3.464 37h12.072M29.167 34.5h5.666m-5.69 2.5h3.714M41.167 34.5h5.666m-5.69 2.5h3.714" stroke-linecap="round" stroke-linejoin="round"/></g></svg>';
		case 'horizontal-tiles-2':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M29 .389V41.61M18 .389V41.61M40 .389V41.61" stroke-width="1.5"/><path d="M3.333 34.5h11.334M3.32 37h8.358M21.139 34.5h4.722M21.143 37h3.714M32.139 34.5h4.722M32.143 37h3.714M43.111 34.5h3.778M43.114 37h2.972" stroke-linecap="round" stroke-linejoin="round"/></g></svg>';
		case 'horizontal-tiles-3':
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" stroke="#2D2D2D" fill="none" fill-rule="evenodd"><rect stroke-width="1.5" width="50" height="42" rx="3"/><path d="M32.5.389V41.61M23.5.389V41.61M14.5.389V41.61M41.5.389V41.61" stroke-width="1.5"/><path d="M3.222 34.5h7.556M3.214 37h5.572M17.111 34.5h3.778M17.107 37h2.786M26.111 34.5h3.778M26.107 37h2.786M35.111 34.5h3.778M35.107 37h2.786M44.111 34.5h3.778M44.107 37h2.786" stroke-linecap="round" stroke-linejoin="round"/></g></svg>';
	}
}

/**
 * Get type of horizontal tiles by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_type_of_horizontal_tiles_by( $key, $index ) {

	$list = array(
		'horizontal-tiles-1' => array( 'primary', 'secondary', 'secondary' ),
		'horizontal-tiles-2' => array( 'primary', 'secondary', 'secondary', 'secondary' ),
		'horizontal-tiles-3' => array( 'primary', 'secondary', 'secondary', 'secondary', 'secondary' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get size of horizontal tiles by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_size_of_horizontal_tiles_by( $key, $index ) {

	$list = array(
		'horizontal-tiles-1' => array( 'large', 'large', 'large' ),
		'horizontal-tiles-2' => array( 'large', 'large', 'large', 'large' ),
		'horizontal-tiles-3' => array( 'large', 'large', 'large', 'large', 'large' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get orientation of horizontal tiles by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_orientation_of_horizontal_tiles_by( $key, $index ) {

	$list = array(
		'horizontal-tiles-1' => array( 'landscape', 'portrait', 'portrait' ),
		'horizontal-tiles-2' => array( 'landscape', 'portrait', 'portrait', 'portrait' ),
		'horizontal-tiles-3' => array( 'portrait', 'portrait', 'portrait', 'portrait', 'portrait' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get typography of horizontal tiles by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_typography_of_horizontal_tiles_by( $key, $index ) {

	$list = array(
		'horizontal-tiles-1' => array( 'large', 'small', 'small' ),
		'horizontal-tiles-2' => array( 'large', 'small', 'small', 'small' ),
		'horizontal-tiles-3' => array( 'large', 'small', 'small', 'small', 'small' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get types of horizontal full.
 */
function csco_get_types_of_full() {
	$types = array(
		1 => 'full-1',
		2 => 'full-2',
	);

	return $types;
}

/**
 * Get icon of horizontal full by key.
 *
 * @param mixed $key The key.
 */
function csco_get_icon_of_full_by( $key ) {

	switch ( $key ) {
		case 1:
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><rect id="a" x="0" y="0" width="50" height="42" rx="3"/></defs><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><mask id="b" fill="#fff"><use xlink:href="#a"/></mask><use stroke="#2D2D2D" stroke-width="1.5" xlink:href="#a"/><rect stroke="#2D2D2D" stroke-width="1.5" mask="url(#b)" x="-2" y="6" width="54" height="30" rx="1"/><path d="M5.472 27.5h16.056M5.428 30h11.143" stroke="#2D2D2D" stroke-linecap="round" stroke-linejoin="round" mask="url(#b)"/><g mask="url(#b)" stroke="#2D2D2D"><g transform="translate(27 11)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g></g><g mask="url(#b)" stroke="#2D2D2D"><g transform="translate(27 23)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g></g></g></svg>';
		case 2:
			return '<svg width="52" height="44" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><rect id="a" x="0" y="0" width="50" height="42" rx="3"/></defs><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><mask id="b" fill="#fff"><use xlink:href="#a"/></mask><use stroke="#2D2D2D" stroke-width="1.5" xlink:href="#a"/><rect stroke="#2D2D2D" stroke-width="1.5" mask="url(#b)" x="-2" y="6" width="54" height="30" rx="1"/><path d="M29.472 25.5h16.056m-16.1 2.5h11.143" stroke="#2D2D2D" stroke-linecap="round" stroke-linejoin="round" mask="url(#b)"/><g stroke="#2D2D2D" mask="url(#b)"><g transform="translate(5 11)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g><g transform="translate(5 23)"><rect stroke-width="1.5" width="8" height="8" rx="1"/><path d="M11.222 2.5h7.556m-7.6 2.5h4.643" stroke-linecap="round" stroke-linejoin="round"/></g></g></g></svg>';
	}
}

/**
 * Get type of full by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_type_of_full_by( $key, $index ) {

	$list = array(
		'full-1' => array( 'primary', 'secondary', 'secondary', 'secondary', 'secondary' ),
		'full-2' => array( 'primary', 'secondary', 'secondary', 'secondary', 'secondary' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get orientation of full by key.
 *
 * @param string $key   The key.
 * @param string $index The index.
 */
function csco_get_orientation_of_full_by( $key, $index ) {

	$list = array(
		'full-1' => array( 'landscape', 'square', 'square', 'square', 'square' ),
		'full-2' => array( 'landscape', 'square', 'square', 'square', 'square' ),
	);

	return $list[ $key ][ $index - 1 ];
}

/**
 * Get block Post Media Template
 */
function csco_block_get_post_media_template() {

	// Get formats of current post.
	$format = get_post_format();

	// Reset format to image for standard posts with thumbnails.
	if ( ! $format && has_post_thumbnail() ) {
		$format = 'image';
	}

	get_template_part( 'template-parts/media/' . $format );
}

/**
 * Get block content template
 *
 * @param int $current Number of current post.
 */
function csco_get_block_content_template( $current ) {

	get_template_part( 'template-parts/blocks/content' );

	// Make sure we display widgets on first page only, if repeat option is not true.
	global $paged;

	$current_page = $paged;

	$options = get_query_var( 'options' );

	$widgets         = isset( $options['widgets'] ) ? $options['widgets'] : false;
	$widgets_sidebar = isset( $options['widgetsSidebar'] ) ? $options['widgetsSidebar'] : 'sidebar-archive';
	$widgets_after   = isset( $options['widgetsAfter'] ) ? $options['widgetsAfter'] : 3;
	$widgets_repeat  = isset( $options['widgetsRepeat'] ) ? $options['widgetsRepeat'] : false;

	if ( $widgets_repeat ) {
		$current_page = 0;
	}

	// Insert content after n-th post.
	if ( $widgets && $widgets_after && 0 === $current % $widgets_after && has_action( 'csco_archive_between_posts' ) && 0 === $current_page ) {
		do_action( 'csco_archive_between_posts', $widgets_sidebar, $current, $widgets_after, $widgets_repeat );
	}
}
