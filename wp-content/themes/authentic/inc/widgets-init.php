<?php
/**
 * Widgets Init
 *
 * Register sitebar locations for widgets.
 *
 * @package Authentic
 */

if ( ! function_exists( 'csco_widgets_init' ) ) {
	/**
	 * Register sidebars
	 */
	function csco_widgets_init() {

		register_sidebar(
			array(
				'name'          => esc_html__( 'Default Sidebar', 'authentic' ),
				'id'            => 'sidebar-main',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => csco_section_heading( null, 'before', false, $class = 'title-widget' ),
				'after_title'   => csco_section_heading( null, 'after', false, $class = 'title-widget' ),
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Off-canvas', 'authentic' ),
				'id'            => 'sidebar-offcanvas',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => csco_section_heading( null, 'before', false, $class = 'title-widget' ),
				'after_title'   => csco_section_heading( null, 'after', false, $class = 'title-widget' ),
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Archives', 'authentic' ),
				'id'            => 'sidebar-archive',
				'before_widget' => '<section class="widget %1$s %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => csco_section_heading( null, 'before', false, $class = 'title-widget' ),
				'after_title'   => csco_section_heading( null, 'after', false, $class = 'title-widget' ),
			)
		);

		register_sidebars(
			3, array(
				// Translators: Footer Sidebar Number.
				'name'          => esc_html__( 'Footer Sidebar %d', 'authentic' ),
				'id'            => 'sidebar-footer',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => csco_section_heading( null, 'before', false, $class = 'title-widget', 'footer' ),
				'after_title'   => csco_section_heading( null, 'after', false, $class = 'title-widget', 'footer' ),
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Auto Loaded Sidebar', 'authentic' ),
				'id'            => 'sidebar-loaded',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => csco_section_heading( null, 'before', false, $class = 'title-widget' ),
				'after_title'   => csco_section_heading( null, 'after', false, $class = 'title-widget' ),
			)
		);

		register_sidebars(
			3, array(
				// Translators: Multi-Column Sidebar Number.
				'name'          => esc_html__( 'Multi-Column Sub-Menu %d', 'authentic' ),
				'id'            => 'sidebar-multicolumn',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => csco_section_heading( null, 'before', false, $class = 'title-widget', 'submenu' ),
				'after_title'   => csco_section_heading( null, 'after', false, $class = 'title-widget', 'submenu' ),
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Single-Column Sub-Menu', 'authentic' ),
				'id'            => 'sidebar-singlecolumn',
				'before_widget' => '<div class="widget %1$s %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => csco_section_heading( null, 'before', false, $class = 'title-widget', 'submenu' ),
				'after_title'   => csco_section_heading( null, 'after', false, $class = 'title-widget', 'submenu' ),
			)
		);

	}
	add_action( 'widgets_init', 'csco_widgets_init' );
}
