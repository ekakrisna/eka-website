<?php
/**
 * Filters
 *
 * All filters for native WordPress and plugins' functions.
 *
 * @package Authentic
 */

if ( ! function_exists( 'csco_body_class' ) ) {
	/**
	 * Adds classes to <body> tag
	 *
	 * @param array $classes is an array of all body classes.
	 */
	function csco_body_class( $classes ) {

		// Header.
		if ( csco_has_header() ) {
			$classes[] = 'header-enabled';
		} else {
			$classes[] = 'header-disabled';
		}

		// Wide Container.
		if ( csco_is_wide_container() ) {
			$classes[] = 'container-wide';
		}

		// Page Layout.
		$page_layout = csco_get_page_layout();
		if ( 'layout-sidebar-right' === $page_layout || 'layout-sidebar-left' === $page_layout ) {
			$classes[] = 'cs-page-layout-sidebar';
		}

		$classes[] = 'cs-page-' . $page_layout;

		// Parallax.
		if ( get_theme_mod( 'effects_parallax', true ) ) {
			$classes[] = 'parallax-enabled';
		} else {
			$classes[] = 'parallax-disabled';
		}

		// Sticky Sidebar.
		if ( get_theme_mod( 'effects_sticky_sidebar', true ) ) {
			$classes[] = 'sticky-sidebar-enabled';
			$classes[] = get_theme_mod( 'effects_sticky_sidebar_method', 'stick-to-bottom' );
		}

		// Sticky Navbar.
		if ( get_theme_mod( 'effects_navbar_scroll', true ) ) {
			if ( ! get_theme_mod( 'navbar_sticky', false ) ) {
				$classes[] = 'navbar-sticky-enabled navbar-smart-enabled';
			} else {
				$classes[] = 'navbar-sticky-enabled';
			}
		}

		// Post with large slider.
		if ( is_singular() && csco_block_has_slider_large() ) {
			$classes[] = 'has-slider-large';
		}

		// Post with full block.
		$block_first_position = csco_block_is_first_position();

		if ( is_singular() && $block_first_position ) {
			$classes[] = sprintf( 'has-%s-block', $block_first_position );
		}

		// Block Alignment.
		if ( is_home() || is_archive() || is_single() ) {
			$classes[] = 'block-align-enabled';
		}

		if ( is_page() ) {
			$classes[] = 'block-page-align-enabled';
		}

		// Featured Alignment.
		$classes[] = 'style-align-' . get_theme_mod( 'style_align', 'center' );

		return $classes;
	}
}
add_filter( 'body_class', 'csco_body_class' );

if ( ! function_exists( 'csco_sitecontent_class' ) ) {
	/**
	 * Adds the classes for the site-content element.
	 *
	 * @param array $classes Classes to add to the class list.
	 */
	function csco_sitecontent_class( $classes ) {

		set_query_var( 'headinglocation', 'content' );

		// Page Layout.
		$page_layout = csco_get_page_layout();
		if ( 'layout-sidebar-right' === $page_layout || 'layout-sidebar-left' === $page_layout ) {
			$classes[] = 'layout-sidebar';
		}
		$classes[] = $page_layout;

		// Post Sidebar.
		if ( is_single() && csco_powerkit_module_enabled( 'share_buttons' ) && powerkit_share_buttons_exists( 'post-sidebar' ) ) {
			$classes[] = 'post-sidebar-enabled';
		} else {
			$classes[] = 'post-sidebar-disabled';
		}

		// Disabled narrow fullwidth post.
		if ( is_single() && 'layout-fullwidth' === $page_layout && ! get_theme_mod( 'post_fullwidth_narrow', true ) ) {
			$classes[] = 'layout-narrow-disabled';
		} else {
			$classes[] = 'layout-narrow-enabled';
		}

		// Section Heading.
		$classes[] = 'section-heading-default-' . get_theme_mod( 'section_heading', 'style-1' );

		return $classes;
	}
}
add_filter( 'csco_site_content_class', 'csco_sitecontent_class' );

if ( ! function_exists( 'csco_sitesubmenu_class' ) ) {
	/**
	 * Adds the classes for the site-submenu element.
	 *
	 * @param array $classes Classes to add to the class list.
	 */
	function csco_sitesubmenu_class( $classes ) {

		$default = get_theme_mod( 'section_heading_submenu_default', true );

		// Section Heading.
		if ( $default ) {
			set_query_var( 'headinglocation', 'content' );

			$classes[] = 'section-heading-default-' . get_theme_mod( 'section_heading', 'style-1' );
		} else {
			set_query_var( 'headinglocation', 'submenu' );

			$classes[] = 'section-heading-default-' . get_theme_mod( 'section_heading_submenu', 'style-1' );
		}

		return $classes;
	}
}
add_filter( 'csco_site_submenu_class', 'csco_sitesubmenu_class' );

if ( ! function_exists( 'csco_sitefooter_class' ) ) {
	/**
	 * Adds the classes for the site-footer element.
	 *
	 * @param array $classes Classes to add to the class list.
	 */
	function csco_sitefooter_class( $classes ) {

		$default = get_theme_mod( 'section_heading_footer_default', true );

		// Section Heading.
		if ( $default ) {
			set_query_var( 'headinglocation', 'content' );

			$classes[] = 'section-heading-default-' . get_theme_mod( 'section_heading', 'style-1' );
		} else {
			set_query_var( 'headinglocation', 'footer' );

			$classes[] = 'section-heading-default-' . get_theme_mod( 'section_heading_footer', 'style-1' );
		}

		return $classes;
	}
}
add_filter( 'csco_site_footer_class', 'csco_sitefooter_class' );

if ( ! function_exists( 'csco_set_allowed_post_meta' ) ) {
	/**
	 * Set allowed post meta.
	 *
	 * @param array $allowed The list meta.
	 */
	function csco_set_allowed_post_meta( $allowed ) {
		$allowed['shares'] = esc_html__( 'Shares', 'authentic' );

		return $allowed;
	}
}
add_filter( 'powerkit_allowed_post_meta', 'csco_set_allowed_post_meta' );
add_filter( 'canvas_allowed_post_meta', 'csco_set_allowed_post_meta' );
add_filter( 'abr_allowed_post_meta', 'csco_set_allowed_post_meta' );

if ( ! function_exists( 'csco_set_convert_post_meta' ) ) {
	/**
	 * Convert allowed post meta.
	 *
	 * @param array $list The list meta.
	 */
	function csco_set_convert_post_meta( $list ) {
		$allowed['shares'] = 'showMetaShares';

		return $list;
	}
}
add_filter( 'abr_convert_post_meta', 'csco_set_convert_post_meta' );


if ( ! function_exists( 'csco_set_post_meta_handler' ) ) {
	/**
	 * Set post meta handler.
	 */
	function csco_set_post_meta_handler() {
		return 'csco_get_post_meta';
	}
}
add_filter( 'powerkit_get_post_meta_handler', 'csco_set_post_meta_handler' );
add_filter( 'canvas_get_post_meta_handler', 'csco_set_post_meta_handler' );
add_filter( 'abr_get_post_meta_handler', 'csco_set_post_meta_handler' );

if ( ! function_exists( 'csco_set_block_post_meta_handler' ) ) {
	/**
	 * Set post meta handler.
	 */
	function csco_set_block_post_meta_handler() {
		return 'csco_block_post_meta';
	}
}
add_filter( 'powerkit_get_block_post_meta_handler', 'csco_set_block_post_meta_handler' );
add_filter( 'canvas_get_block_post_meta_handler', 'csco_set_block_post_meta_handler' );
add_filter( 'abr_get_block_post_meta_handler', 'csco_set_block_post_meta_handler' );


if ( ! function_exists( 'csco_label_readmore' ) ) {
	/**
	 * Output label for readmore button.
	 *
	 * @param string $label The label of button.
	 */
	function csco_label_readmore( $label ) {

		if ( ! $label ) {
			$label = get_theme_mod( 'label_readmore', esc_html__( 'View Post', 'authentic' ) );
		}

		return $label;
	}
}
add_filter( 'csco_label_readmore', 'csco_label_readmore' );

if ( ! function_exists( 'csco_remove_hentry_class' ) ) {
	/**
	 * Remove hentry from post_class
	 *
	 * @param array $classes One or more classes to add to the class list.
	 */
	function csco_remove_hentry_class( $classes ) {
		return array_diff( $classes, array( 'hentry' ) );
	}
}
add_filter( 'post_class', 'csco_remove_hentry_class' );

if ( ! function_exists( 'csco_overwrite_sidebar' ) ) {
	/**
	 * Overwrite Default Sidebar
	 *
	 * @param string $sidebar Sidebar slug.
	 */
	function csco_overwrite_sidebar( $sidebar ) {
		// Check Nonce.
		wp_verify_nonce( null );

		if ( isset( $_REQUEST['action'] ) && 'csco_ajax_load_nextpost' === $_REQUEST['action'] ) { // Input var ok.
			if ( is_active_sidebar( 'sidebar-loaded' ) ) {
				$sidebar = 'sidebar-loaded';
			}
		}
		return $sidebar;
	}
}
add_filter( 'csco_sidebar', 'csco_overwrite_sidebar' );

if ( ! function_exists( 'csco_max_srcset_image_width' ) ) {
	/**
	 * Change max image width in srcset attribute
	 *
	 * @param int   $max_width  The maximum image width to be included in the 'srcset'. Default '1600'.
	 * @param array $size_array Array of width and height values in pixels (in that order).
	 */
	function csco_max_srcset_image_width( $max_width, $size_array ) {
		return 3840;
	}
}
add_filter( 'max_srcset_image_width', 'csco_max_srcset_image_width', 10, 2 );

if ( ! function_exists( 'csco_attachment_image_attributes' ) ) {
	/**
	 * Force browser to base their calculations on viewport height, if the screen ratio is vertical.
	 * Valid for Large Page Headers.
	 *
	 * @param array        $attr        Attributes for the image markup.
	 * @param WP_Post      $attachment  Image attachment post.
	 * @param string|array $size        Requested size. Image size or array of width and height values (in that order). Default 'thumbnail'.
	 */
	function csco_attachment_image_attributes( $attr, $attachment, $size ) {
		if ( 'csco-1920' === $size ) {
			$attr['sizes'] = '(min-aspect-ratio: 1/1) 100vw, 100vh';
		}
		return $attr;
	}
}
add_filter( 'wp_get_attachment_image_attributes', 'csco_attachment_image_attributes', 10, 3 );

if ( ! function_exists( 'csco_after_switch_theme' ) ) {
	/**
	 * Define default image sizes
	 */
	function csco_after_switch_theme() {

		if ( get_option( 'csco_authentic_default_image_sizes_set' ) ) {
			return;
		}

		update_option( 'thumbnail_size_w', 320 );
		update_option( 'thumbnail_size_h', 240 );
		update_option( 'thumbnail_crop', true );

		update_option( 'medium_size_w', 800 );
		update_option( 'medium_size_h', 0 );

		update_option( 'medium_large_size_w', 800 );
		update_option( 'medium_large_size_h', 0 );

		update_option( 'large_size_w', 1160 );
		update_option( 'large_size_h', 0 );

		update_option( 'csco_authentic_default_image_sizes_set', true );
	}
}
add_action( 'after_switch_theme', 'csco_after_switch_theme' );

if ( ! function_exists( 'csco_excerpt_length' ) ) {
	/**
	 * Excerpt Length
	 *
	 * @param string $length of the excerpt.
	 */
	function csco_excerpt_length( $length ) {
		return 30;
	}
}
add_filter( 'excerpt_length', 'csco_excerpt_length' );

if ( ! function_exists( 'csco_excerpt_more' ) ) {
	/**
	 * Excerpt Suffix
	 *
	 * @param string $more suffix for the excerpt.
	 */
	function csco_excerpt_more( $more ) {
		return '&hellip;';
	}
}
add_filter( 'excerpt_more', 'csco_excerpt_more' );

if ( ! function_exists( 'csco_post_meta_process' ) ) {
	/**
	 * Pre processing post meta choices
	 *
	 * @param array $data Post meta list.
	 */
	function csco_post_meta_process( $data ) {

		if ( isset( $data['comments'] ) && ! class_exists( 'Powerkit' ) ) {
			unset( $data['comments'] );
		}

		if ( isset( $data['reading_time'] ) && ! csco_powerkit_module_enabled( 'reading_time' ) ) {
			unset( $data['reading_time'] );
		}

		if ( isset( $data['views'] ) && ! csco_post_views_enabled() ) {
			unset( $data['views'] );
		}

		return $data;
	}
}
add_filter( 'csco_post_meta_choices', 'csco_post_meta_process' );

if ( ! function_exists( 'csco_wrap_post_gallery' ) ) {
	/**
	 * Alignment of Galleries in Classic Block
	 *
	 * @param string $html     The current output.
	 * @param array  $attr     Attributes from the gallery shortcode.
	 * @param int    $instance Numeric ID of the gallery shortcode instance.
	 */
	function csco_wrap_post_gallery( $html, $attr, $instance ) {
		switch ( get_theme_mod( 'classic_gallery_alignment', 'default' ) ) {
			case 'wide':
				$wrap = 'alignwide';
				break;
			case 'large':
				$wrap = 'alignfull';
				break;
		}

		if ( ! isset( $attr['wrap'] ) && isset( $wrap ) ) {
			$attr['wrap'] = $wrap;

			// Our custom HTML wrapper.
			$html = sprintf( '<div class="%s">%s</div>', esc_attr( $wrap ), gallery_shortcode( $attr ) );
		}

		return $html;
	}
	add_filter( 'post_gallery', 'csco_wrap_post_gallery', 99, 3 );
}

if ( ! function_exists( 'csco_wp_link_pages_args' ) ) {
	/**
	 * Paginated Post Pagination
	 *
	 * @param string $args Paginated posts pagination args.
	 */
	function csco_wp_link_pages_args( $args ) {
		if ( 'next_and_number' === $args['next_or_number'] ) {
			global $page, $numpages, $multipage, $more, $pagenow;
			$args['next_or_number'] = 'number';

			$prev = '';
			$next = '';

			if ( $multipage ) {
				if ( $more ) {
					$i = $page - 1;
					if ( $i && $more ) {
						$prev .= _wp_link_page( $i );
						$prev .= $args['link_before'] . $args['previouspagelink'] . $args['link_after'] . '</a>';
					}
					$i = $page + 1;
					if ( $i <= $numpages && $more ) {
						$next .= _wp_link_page( $i );
						$next .= $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>';
					}
				}
			}
			$args['before'] = $args['before'] . $prev;
			$args['after']  = $next . $args['after'];
		}
		return $args;
	}
}
add_filter( 'wp_link_pages_args', 'csco_wp_link_pages_args' );

if ( ! function_exists( 'csco_first_post_in_request' ) ) {
	/**
	 * Change setting archive first post for ajax or rest request.
	 *
	 * @param mixed $default The default value.
	 */
	function csco_first_post_in_request( $default ) {
		if ( csco_doing_request() ) {
			$default = false;
		}
		return $default;
	}
}
add_filter( 'theme_mod_layout_first_post', 'csco_first_post_in_request' );
add_filter( 'theme_mod_home_first_post', 'csco_first_post_in_request' );

/**
 * -------------------------------------------------------------------------
 * [ Autoptimize ]
 * -------------------------------------------------------------------------
 */

if ( ! function_exists( 'csco_autoptimize_css_after_minify' ) ) {
	/**
	 * Fixes multiple feature queries issue.
	 *
	 * @param string $code Minified code.
	 */
	function csco_autoptimize_css_after_minify( $code ) {
		return str_replace( ') or(', ') or (', $code );
	}
}
add_filter( 'autoptimize_css_after_minify', 'csco_autoptimize_css_after_minify' );
