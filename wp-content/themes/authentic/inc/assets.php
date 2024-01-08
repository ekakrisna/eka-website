<?php
/**
 * Assets
 *
 * All enqueues of scripts and styles.
 *
 * @package Authentic
 */

if ( ! function_exists( 'csco_enqueue_scripts' ) ) {
	/**
	 * Enqueues all theme assets.
	 */
	function csco_enqueue_scripts() {

		$version = csco_get_theme_data( 'Version' );

		// Enqueue Comment Reply script.
		if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Register vendor scripts.
		wp_register_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );
		wp_register_script( 'colcade', get_template_directory_uri() . '/js/colcade.js', array( 'jquery' ), '0.2.0', true );
		wp_register_script( 'object-fit-images', get_template_directory_uri() . '/js/ofi.min.js', array( 'jquery' ), '3.2.4', true );
		wp_register_script( 'jarallax', get_template_directory_uri() . '/js/jarallax.min.js', array( 'jquery' ), '1.10.5', true );
		wp_register_script( 'jarallax-video', get_template_directory_uri() . '/js/jarallax-video.min.js', array( 'jquery', 'jarallax' ), '1.10.5', true );

		// Register theme scripts.
		wp_register_script( 'csco-scripts', get_template_directory_uri() . '/js/scripts.js', array(
			'jquery',
			'imagesloaded',
			'owl-carousel',
			'colcade',
			'object-fit-images',
			'jarallax',
			'jarallax-video',
		), $version, true );

		// Localization array.
		$translation_strings = array(
			'next'     => esc_html__( 'Next', 'authentic' ),
			'previous' => esc_html__( 'Previous', 'authentic' ),
			'close'    => esc_html__( 'Close', 'authentic' ),
			'loading'  => esc_html__( 'Loading', 'authentic' ),
		);

		// Localize the main theme scripts.
		wp_localize_script( 'csco-scripts', 'translation', $translation_strings );

		// Enqueue jQuery.
		wp_enqueue_script( 'jquery' );

		// Enqueue theme scripts.
		wp_enqueue_script( 'csco-scripts' );

		// Register theme styles.
		wp_register_style( 'csco-styles', csco_style( get_template_directory_uri() . '/style.css' ), false, $version );

		// Enqueue theme styles.
		wp_enqueue_style( 'csco-vendors' );
		wp_enqueue_style( 'csco-styles' );

		// Add RTL support.
		wp_style_add_data( 'csco-styles', 'rtl', 'replace' );

		// Always enqueue Tiled Gallery scripts when both Jetpack and Tiled Galleries are enabled.
		if ( class_exists( 'Jetpack' ) && class_exists( 'Jetpack_Tiled_Gallery' ) ) {
			if ( Jetpack::is_module_active( 'tiled-gallery' ) ) {
				Jetpack_Tiled_Gallery::default_scripts_and_styles();
			}
		}

		// Fix jumping large page headers.
		if ( 'large' === csco_get_page_header_type() ) {

			$topbar_height = '0px';
			$header_height = '0px';
			$margin        = '1px';
			$padding       = '1px';

			$navbar_height = get_theme_mod( 'navbar_height', '50px' );

			if ( get_theme_mod( 'topbar', true ) ) {
				$topbar_height = get_theme_mod( 'topbar_height', '40px' );
			}

			if ( get_theme_mod( 'header', true ) ) {
				if ( get_theme_mod( 'header_home_only', false ) && ! ( is_home() || is_front_page() ) ) {
					$header_height = '0px';
				} else {
					$header_height = get_theme_mod( 'header_height', '100px' );
				}
			}

			if ( $topbar_height ) {
				$margin  .= ' - ' . $topbar_height;
				$padding .= ' + ' . $topbar_height;
			}

			if ( $header_height ) {
				$margin  .= ' - ' . $header_height;
				$padding .= ' + ' . $header_height;
			}

			$margin  .= ' - ' . $navbar_height;
			$padding .= ' + ' . $navbar_height;

			// Set inline vars.
			$inline_css  = sprintf( ':root {--large-sm-margin-top: -%s}', $navbar_height );
			$inline_css .= sprintf( ':root {--large-lg-margin-top: -%s}', $margin );
			$inline_css .= sprintf( ':root {--large-sm-padding-top: %s}', $navbar_height );
			$inline_css .= sprintf( ':root {--large-lg-padding-top: %s}', $padding );

			wp_add_inline_style( 'csco-styles', $inline_css );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'csco_enqueue_scripts' );

if ( ! function_exists( 'csco_default_scripts' ) ) {
	/**
	 * Enqueues jQuery in footer.
	 *
	 * @param array $wp_scripts Default Scripts.
	 */
	function csco_default_scripts( $wp_scripts ) {

		if ( is_admin() ) {
			return;
		}

		if ( ! get_option( 'csco_jquery_in_footer', false ) ) {
			return;
		}

		$wp_scripts->add_data( 'jquery', 'group', 1 );
		$wp_scripts->add_data( 'jquery-core', 'group', 1 );
		$wp_scripts->add_data( 'jquery-migrate', 'group', 1 );
	}
}
add_action( 'wp_default_scripts', 'csco_default_scripts' );


if ( ! function_exists( 'csco_jetpack_enqueue_scripts' ) ) {
	/**
	 * Enqueues Jetpack's Tiled Gallery scripts in footer.
	 */
	function csco_jetpack_enqueue_scripts() {

		if ( ! get_option( 'csco_jquery_in_footer', false ) ) {
			return;
		}

		// Return if Jetpack's not installed.
		if ( ! class_exists( 'Jetpack' ) ) {
			return;
		}
		// Return if Jetpack's Tiled Gallery is not active.
		if ( ! class_exists( 'Jetpack_Tiled_Gallery' ) || ! Jetpack::is_module_active( 'tiled-gallery' ) ) {
			return;
		}

		wp_dequeue_script( 'tiled-gallery' );
		wp_enqueue_script( 'tiled-gallery', JETPACK__PLUGIN_DIR . 'tiled-gallery/tiled-gallery.js', array( 'jquery' ), null, true );
	}
}
add_action( 'wp_enqueue_scripts', 'csco_jetpack_enqueue_scripts' );
