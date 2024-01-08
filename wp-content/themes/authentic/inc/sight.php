<?php
/**
 * Sight.
 *
 * @package Authentic
 */

/**
 * Enqueue assets for portfolio
 */
function csco_portfolio_enqueue_block_editor_assets() {
	// Enqueue scripts.
	wp_enqueue_script(
		'csco-sight',
		get_template_directory_uri() . '/jsx/sight.js',
		array(
			'wp-i18n',
			'wp-blocks',
			'wp-element',
			'wp-editor',
			'wp-components',
			'wp-data',
			'wp-plugins',
			'wp-edit-post',
			'wp-hooks',
		),
		csco_get_theme_data( 'Version' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'csco_portfolio_enqueue_block_editor_assets' );

/**
 * Override enqueue assets for portfolio
 */
function csco_override_portfolio_enqueue_assets() {
	wp_dequeue_style( 'sight-layout-standard' );
}
add_action( 'enqueue_block_editor_assets', 'csco_override_portfolio_enqueue_assets' );
add_action( 'admin_enqueue_scripts', 'csco_override_portfolio_enqueue_assets' );
add_action( 'wp_enqueue_scripts', 'csco_override_portfolio_enqueue_assets' );

/**
 * Registers layouts of block portfolio.
 *
 * @param array $layouts The layouts.
 */
function csco_block_portfolio_layouts( $layouts ) {

	$layouts['standard']['attributes'] = array_merge(
		$layouts['standard']['attributes'],
		array(
			'columns_pc'       => array(
				'type'            => 'number',
				'default'         => 1,
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '==',
						'value'    => 'standard',
					),
				),
			),
			'columns_tablet'   => array(
				'type'            => 'number',
				'default'         => 1,
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '==',
						'value'    => 'standard',
					),
				),
			),
			'columns_mobile'   => array(
				'type'            => 'number',
				'default'         => 1,
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '==',
						'value'    => 'standard',
					),
				),
			),
			'gap_posts_pc'     => array(
				'type'            => 'number',
				'default'         => 40,
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '==',
						'value'    => 'standard',
					),
				),
			),
			'gap_posts_tablet' => array(
				'type'            => 'number',
				'default'         => 40,
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '==',
						'value'    => 'standard',
					),
				),
			),
			'gap_posts_mobile' => array(
				'type'            => 'number',
				'default'         => 40,
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '==',
						'value'    => 'standard',
					),
				),
			),
		)
	);

	$layouts['justified'] = array(
		'name'       => esc_html__( 'Justified', 'authentic' ),
		'icon'       => '<svg height="44" width="52" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.69 29.75"><path d="M1.55.75h9.59a.8.8 0 01.8.8v9.64a.8.8 0 01-.8.81H1.55a.8.8 0 01-.8-.81V1.55a.8.8 0 01.8-.8zM17.55.75h9.59a.8.8 0 01.8.8v9.64a.8.8 0 01-.8.81h-9.59a.8.8 0 01-.8-.81V1.55a.8.8 0 01.8-.8zM33.55.75h9.59a.8.8 0 01.8.8v9.64a.8.8 0 01-.8.81h-9.59a.8.8 0 01-.8-.81V1.55a.8.8 0 01.8-.8zM1.55 17.75h9.59a.8.8 0 01.8.8v9.64a.8.8 0 01-.8.81H1.55a.8.8 0 01-.8-.81v-9.64a.8.8 0 01.8-.8zM17.55 17.75h9.59a.8.8 0 01.8.8v9.64a.8.8 0 01-.8.81h-9.59a.8.8 0 01-.8-.81v-9.64a.8.8 0 01.8-.8zM33.55 17.75h9.59a.8.8 0 01.8.8v9.64a.8.8 0 01-.8.81h-9.59a.8.8 0 01-.8-.81v-9.64a.8.8 0 01.8-.8z" fill="none" stroke="#2d2d2d" stroke-width="1.5"/></svg>',
		'attributes' => array(
			'filter_items'        => array(
				'type'            => 'boolean',
				'default'         => true,
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
					array(
						'field'    => 'source',
						'operator' => '==',
						'value'    => 'projects',
					),
					array(
						'field'    => 'projects_filter_post_type',
						'operator' => '==',
						'value'    => 'sight-projects',
					),
				),
			),
			'pagination_type'     => array(
				'type'            => 'string',
				'default'         => 'ajax',
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
					array(
						'field'    => 'source',
						'operator' => '==',
						'value'    => 'projects',
					),
				),
			),
			'image_height_pc'     => array(
				'type'            => 'number',
				'default'         => 300,
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
				),
			),
			'image_height_tablet' => array(
				'type'            => 'number',
				'default'         => 200,
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
				),
			),
			'image_height_mobile' => array(
				'type'            => 'number',
				'default'         => 100,
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
				),
			),
			'gap_posts_pc'        => array(
				'type'            => 'number',
				'default'         => 40,
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
				),
			),
			'gap_posts_tablet'    => array(
				'type'            => 'number',
				'default'         => 40,
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
				),
			),
			'gap_posts_mobile'    => array(
				'type'            => 'number',
				'default'         => 40,
				'active_callback' => array(
					array(
						'field'    => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
				),
			),
		),
	);

	return $layouts;
}
add_filter( 'sight_block_portfolio_layouts', 'csco_block_portfolio_layouts' );

/**
 * Change attributes of block.
 *
 * @param array $attributes The attributes.
 */
function csco_block_portfolio_attributes( $attributes ) {

	// Disable attachment orientation for justified.
	if ( isset( $attributes['attachment_orientation'] ) ) {
		$attributes['attachment_orientation']['active_callback'][] = array(
			'field'    => 'layout',
			'operator' => '!=',
			'value'    => 'justified',
		);
	}

	return $attributes;
}
add_filter( 'sight_block_portfolio_attributes', 'csco_block_portfolio_attributes', 10, 1 );

/**
 * Registers layouts of widget portfolio.
 *
 * @param array $layouts The layouts.
 */
function csco_widget_portfolio_layouts( $layouts ) {

	$layouts['justified'] = array(
		'name' => esc_html__( 'Justified', 'authentic' ),
	);

	return $layouts;
}
add_filter( 'sight_widget_portfolio_layouts', 'csco_widget_portfolio_layouts' );

/**
 * Change fields of widget portfolio.
 *
 * @param object $object The object.
 */
function csco_widget_portfolio_fields_media( $object ) {
	$object->update_control(
		'attachment_orientation',
		array(
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '!=',
						'value'    => 'justified',
					),
				),
			),
		)
	);
}
add_action( 'sight/widget/fields/media/after', 'csco_widget_portfolio_fields_media', 10, 1 );

/**
 * Add controls for standard layout.
 *
 * @param object $object The object.
 */
function csco_widget_portfolio_standard_fields( $object ) {

	$object->add_control(
		'standard_hr_columns',
		array(
			'type'       => \Elementor\Controls_Manager::DIVIDER,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'standard',
					),
				),
			),
		)
	);

	$object->add_control(
		'standard_columns_pc',
		array(
			'label'      => esc_html__( 'Number of Columns (PC)', 'authentic' ),
			'type'       => Elementor\Controls_Manager::NUMBER,
			'min'        => 1,
			'max'        => 6,
			'step'       => 1,
			'default'    => 1,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'standard',
					),
				),
			),
		)
	);

	$object->add_control(
		'standard_columns_tablet',
		array(
			'label'      => esc_html__( 'Number of Columns (Tablet)', 'authentic' ),
			'type'       => Elementor\Controls_Manager::NUMBER,
			'min'        => 1,
			'max'        => 6,
			'step'       => 1,
			'default'    => 1,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'standard',
					),
				),
			),
		)
	);

	$object->add_control(
		'standard_columns_mobile',
		array(
			'label'      => esc_html__( 'Number of Columns (Mobile)', 'authentic' ),
			'type'       => Elementor\Controls_Manager::NUMBER,
			'min'        => 1,
			'max'        => 6,
			'step'       => 1,
			'default'    => 1,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'standard',
					),
				),
			),
		)
	);

	$object->add_control(
		'standard_hr_gap',
		array(
			'type'       => \Elementor\Controls_Manager::DIVIDER,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'standard',
					),
				),
			),
		)
	);

	$object->add_control(
		'standard_gap_posts_pc',
		array(
			'label'      => esc_html__( 'Gap between Items (PC) [px]', 'authentic' ),
			'type'       => Elementor\Controls_Manager::NUMBER,
			'min'        => 0,
			'max'        => 250,
			'step'       => 1,
			'default'    => 40,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'standard',
					),
				),
			),
		)
	);

	$object->add_control(
		'standard_gap_posts_tablet',
		array(
			'label'      => esc_html__( 'Gap between Items (Tablet) [px]', 'authentic' ),
			'type'       => Elementor\Controls_Manager::NUMBER,
			'min'        => 0,
			'max'        => 250,
			'step'       => 1,
			'default'    => 40,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'standard',
					),
				),
			),
		)
	);

	$object->add_control(
		'standard_gap_posts_mobile',
		array(
			'label'      => esc_html__( 'Gap between Items (Mobile) [px]', 'authentic' ),
			'type'       => Elementor\Controls_Manager::NUMBER,
			'min'        => 0,
			'max'        => 250,
			'step'       => 1,
			'default'    => 40,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'standard',
					),
				),
			),
		)
	);
}
add_action( 'sight/widget/fields/general/after', 'csco_widget_portfolio_standard_fields', 10, 1 );

/**
 * Add controls for justified layout.
 *
 * @param object $object The object.
 */
function csco_widget_portfolio_justified_fields( $object ) {
	$object->add_control(
		'justified_filter_items',
		array(
			'label'        => esc_html__( 'Display category filter', 'authentic' ),
			'type'         => Elementor\Controls_Manager::SWITCHER,
			'return_value' => 'true',
			'default'      => 'true',
			'conditions'   => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
					array(
						'name'     => 'source',
						'operator' => '==',
						'value'    => 'projects',
					),
					array(
						'name'     => 'projects_filter_post_type',
						'operator' => '==',
						'value'    => 'sight-projects',
					),
				),
			),
		)
	);

	$object->add_control(
		'justified_pagination_type',
		array(
			'label'      => esc_html__( 'Pagination type', 'authentic' ),
			'type'       => Elementor\Controls_Manager::SELECT,
			'default'    => 'ajax',
			'options'    => array(
				'none'     => esc_html__( 'None', 'authentic' ),
				'ajax'     => esc_html__( 'Load More', 'authentic' ),
				'infinite' => esc_html__( 'Infinite Load', 'authentic' ),
			),
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
					array(
						'name'     => 'source',
						'operator' => '==',
						'value'    => 'projects',
					),
				),
			),
		)
	);

	$object->add_control(
		'justified_hr_height',
		array(
			'type'       => \Elementor\Controls_Manager::DIVIDER,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
				),
			),
		)
	);

	$object->add_control(
		'justified_image_height_pc',
		array(
			'label'      => esc_html__( 'Image Height (PC) [px]', 'authentic' ),
			'type'       => Elementor\Controls_Manager::NUMBER,
			'min'        => 1,
			'max'        => 5000,
			'step'       => 1,
			'default'    => 300,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
				),
			),
		)
	);

	$object->add_control(
		'justified_image_height_tablet',
		array(
			'label'      => esc_html__( 'Image Height (Tablet) [px]', 'authentic' ),
			'type'       => Elementor\Controls_Manager::NUMBER,
			'min'        => 1,
			'max'        => 5000,
			'step'       => 1,
			'default'    => 200,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
				),
			),
		)
	);

	$object->add_control(
		'justified_image_height_mobile',
		array(
			'label'      => esc_html__( 'Image Height (Mobile) [px]', 'authentic' ),
			'type'       => Elementor\Controls_Manager::NUMBER,
			'min'        => 1,
			'max'        => 5000,
			'step'       => 1,
			'default'    => 100,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
				),
			),
		)
	);

	$object->add_control(
		'justified_hr_gap',
		array(
			'type'       => \Elementor\Controls_Manager::DIVIDER,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
				),
			),
		)
	);

	$object->add_control(
		'justified_gap_posts_pc',
		array(
			'label'      => esc_html__( 'Gap between Items (PC) [px]', 'authentic' ),
			'type'       => Elementor\Controls_Manager::NUMBER,
			'min'        => 0,
			'max'        => 250,
			'step'       => 1,
			'default'    => 40,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
				),
			),
		)
	);

	$object->add_control(
		'justified_gap_posts_tablet',
		array(
			'label'      => esc_html__( 'Gap between Items (Tablet) [px]', 'authentic' ),
			'type'       => Elementor\Controls_Manager::NUMBER,
			'min'        => 0,
			'max'        => 250,
			'step'       => 1,
			'default'    => 40,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
				),
			),
		)
	);

	$object->add_control(
		'justified_gap_posts_mobile',
		array(
			'label'      => esc_html__( 'Gap between Items (Mobile) [px]', 'authentic' ),
			'type'       => Elementor\Controls_Manager::NUMBER,
			'min'        => 0,
			'max'        => 250,
			'step'       => 1,
			'default'    => 40,
			'conditions' => array(
				'relation' => 'and',
				'terms'    => array(
					array(
						'name'     => 'layout',
						'operator' => '==',
						'value'    => 'justified',
					),
				),
			),
		)
	);
}
add_action( 'sight/widget/fields/general/after', 'csco_widget_portfolio_justified_fields', 10, 1 );

/**
 * Change attrs to portfolio area.
 *
 * @param string $css        The css.
 * @param array  $attributes The attributes.
 * @param array  $options    The options.
 * @param string $id         The id.
 */
function csco_portfolio_render_css( $css, $attributes, $options, $id ) {

	ob_start();

	// Image Height.
	if ( isset( $options['image_height_pc'] ) && $options['image_height_pc'] ) {
		?>
		.sight-block-portfolio-id-{id} {
			--sight-portfolio-area-grid-image-height: <?php echo esc_attr( $options['image_height_pc'] ); ?>px;
		}
		<?php
	}
	if ( isset( $options['image_height_tablet'] ) && $options['image_height_tablet'] ) {
		?>
		@media (max-width: 1019px) {
			.sight-block-portfolio-id-{id} {
				--sight-portfolio-area-grid-image-height: <?php echo esc_attr( $options['image_height_tablet'] ); ?>px;
			}
		}
		<?php
	}
	if ( isset( $options['image_height_mobile'] ) && $options['image_height_mobile'] ) {
		?>
		@media (max-width: 599px) {
			.sight-block-portfolio-id-{id} {
				--sight-portfolio-area-grid-image-height: <?php echo esc_attr( $options['image_height_mobile'] ); ?>px;
			}
		}
		<?php
	}

	// Columns.
	if ( isset( $options['columns_pc'] ) && $options['columns_pc'] ) {
		?>
		.sight-block-portfolio-id-{id} {
			--sight-portfolio-area-grid-columns: <?php echo esc_attr( $options['columns_pc'] ); ?>;
		}
		<?php
	}
	if ( isset( $options['columns_tablet'] ) && $options['columns_tablet'] ) {
		?>
		@media (max-width: 1019px) {
			.sight-block-portfolio-id-{id} {
				--sight-portfolio-area-grid-columns: <?php echo esc_attr( $options['columns_tablet'] ); ?>;
			}
		}
		<?php
	}
	if ( isset( $options['columns_mobile'] ) && $options['columns_mobile'] ) {
		?>
		@media (max-width: 599px) {
			.sight-block-portfolio-id-{id} {
				--sight-portfolio-area-grid-columns: <?php echo esc_attr( $options['columns_mobile'] ); ?>;
			}
		}
		<?php
	}

	// Gap between Items.
	if ( isset( $options['gap_posts_pc'] ) && $options['gap_posts_pc'] ) {
		?>
		.sight-block-portfolio-id-{id} {
			--sight-portfolio-area-grid-gap: <?php echo esc_attr( $options['gap_posts_pc'] ); ?>px;
		}
		<?php
	}
	if ( isset( $options['gap_posts_tablet'] ) && $options['gap_posts_tablet'] ) {
		?>
		@media (max-width: 1019px) {
			.sight-block-portfolio-id-{id} {
				--sight-portfolio-area-grid-gap: <?php echo esc_attr( $options['gap_posts_tablet'] ); ?>px;
			}
		}
		<?php
	}
	if ( isset( $options['gap_posts_mobile'] ) && $options['gap_posts_mobile'] ) {
		?>
		@media (max-width: 599px) {
			.sight-block-portfolio-id-{id} {
				--sight-portfolio-area-grid-gap: <?php echo esc_attr( $options['gap_posts_mobile'] ); ?>px;
			}
		}
		<?php
	}

	$css .= ob_get_clean();

	return $css;
}
add_filter( 'sight_portfolio_render_css', 'csco_portfolio_render_css', 10, 4 );
