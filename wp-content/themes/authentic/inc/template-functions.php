<?php
/**
 * Theme Functions
 *
 * @package Authentic
 */

if ( ! function_exists( 'csco_doing_request' ) ) {
	/**
	 * Determines whether the current request is a WordPress REST or Ajax request.
	 */
	function csco_doing_request() {
		if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
			return true;
		}
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return true;
		}
	}
}

if ( ! function_exists( 'csco_get_theme_data' ) ) {
	/**
	 * Get data about the theme.
	 *
	 * @param mixed $name The name of param.
	 */
	function csco_get_theme_data( $name ) {
		$theme = wp_get_theme();

		return $theme->get( $name );
	}
}

if ( ! function_exists( 'csco_style' ) ) {
	/**
	 * Processing path of style.
	 *
	 * @param string $path URL to the stylesheet.
	 */
	function csco_style( $path ) {
		// Check RTL.
		if ( is_rtl() ) {
			return $path;
		}

		// Check Dev.
		$dev = get_theme_file_path( 'style-dev.css' );

		if ( file_exists( $dev ) ) {
			return str_replace( '.css', '-dev.css', $path );
		}

		return $path;
	}
}

if ( ! function_exists( 'csco_powerkit_module_enabled' ) ) {
	/**
	 * Helper function to check the status of powerkit modules
	 *
	 * @param array $name Name of module.
	 */
	function csco_powerkit_module_enabled( $name ) {
		if ( function_exists( 'powerkit_module_enabled' ) && powerkit_module_enabled( $name ) ) {
			return true;
		}
	}
}

if ( ! function_exists( 'csco_post_views_enabled' ) ) {
	/**
	 * Check post views module.
	 *
	 * @return string Type.
	 */
	function csco_post_views_enabled() {

		// Post Views Counter.
		if ( class_exists( 'Post_Views_Counter' ) ) {
			return 'post_views';
		}

		// Powerkit Post Views.
		if ( csco_powerkit_module_enabled( 'post_views' ) ) {
			return 'pk_post_views';
		}
	}
}

if ( ! function_exists( 'csco_get_locale' ) ) {
	/**
	 * Get locale in uniform format.
	 */
	function csco_get_locale() {

		$csco_locale = get_locale();

		if ( preg_match( '#^[a-z]{2}\-[A-Z]{2}$#', $csco_locale ) ) {
			$csco_locale = str_replace( '-', '_', $csco_locale );
		} elseif ( preg_match( '#^[a-z]{2}$#', $csco_locale ) ) {
			if ( function_exists( 'mb_strtoupper' ) ) {
				$csco_locale .= '_' . mb_strtoupper( $csco_locale, 'UTF-8' );
			} else {
				$csco_locale .= '_' . strtoupper( $csco_locale );
			}
		}

		if ( empty( $csco_locale ) ) {
			$csco_locale = 'en_US';
		}

		return apply_filters( 'csco_locale', $csco_locale );
	}
}

if ( ! function_exists( 'csco_live_get_theme_mod' ) ) {
	/**
	 * Retrieve theme modification value for the current theme.
	 *
	 * @param string $name    Theme modification name.
	 * @param mixed  $default Theme modification default value.
	 */
	function csco_live_get_theme_mod( $name, $default = false ) {
		$result = get_theme_mod( $name, $default );

		if ( is_customize_preview() ) {

			wp_verify_nonce( null );

			if ( isset( $_POST['nonce'] ) && isset( $_POST['customized'] ) ) { // Input var ok; sanitization ok.

				$data = wp_unslash( $_POST['customized'] ); // Input var ok; sanitization ok.

				$data = json_decode( $data, true );

				if ( is_array( $data ) && isset( $data[ $name ] ) ) {
					$result = $data[ $name ];
				}
			}
		}

		return $result;
	}
}

if ( ! function_exists( 'csco_implode' ) ) {
	/**
	 * Join array elements with a string
	 *
	 * @param array  $pieces The array of strings to implode.
	 * @param string $glue   Defaults to an empty string.
	 */
	function csco_implode( $pieces, $glue = ', ' ) {
		if ( is_array( $pieces ) ) {
			return implode( $glue, $pieces );
		}
		if ( is_string( $pieces ) ) {
			return $pieces;
		}
	}
}

if ( ! function_exists( 'csco_site_content_class' ) ) {
	/**
	 * Display the classes for the site-content element.
	 *
	 * @param array $class Classes to add to the class list.
	 */
	function csco_site_content_class( $class = array() ) {
		$class[] = 'site-content';

		$class = apply_filters( 'csco_site_content_class', $class );

		// Separates classes with a single space, collates classes.
		echo sprintf( 'class="%s"', esc_attr( join( ' ', $class ) ) );
	}
}

if ( ! function_exists( 'csco_site_submenu_class' ) ) {
	/**
	 * Display the classes for the site-submenu element.
	 *
	 * @param array $class Classes to add to the class list.
	 */
	function csco_site_submenu_class( $class = array() ) {
		$class[] = 'site-submenu';

		$class = apply_filters( 'csco_site_submenu_class', $class );

		// Separates classes with a single space, collates classes.
		echo sprintf( 'class="%s"', esc_attr( join( ' ', $class ) ) );
	}
}

if ( ! function_exists( 'csco_site_footer_class' ) ) {
	/**
	 * Display the classes for the site-footer element.
	 *
	 * @param array $class Classes to add to the class list.
	 */
	function csco_site_footer_class( $class = array() ) {
		$class[] = 'site-footer';

		$class = apply_filters( 'csco_site_footer_class', $class );

		// Separates classes with a single space, collates classes.
		echo sprintf( 'class="%s"', esc_attr( join( ' ', $class ) ) );
	}
}

if ( ! function_exists( 'csco_has_post_meta' ) ) {
	/**
	 * Check if the meta has display.
	 *
	 * @param string $meta    The name of meta.
	 * @param string $default The default value.
	 */
	function csco_has_post_meta( $meta, $default = null ) {
		if ( null === $default ) {
			$default = $meta;
		}
		return in_array( $meta, (array) get_theme_mod( 'post_meta', array( $default ) ), true );
	}
}

if ( ! function_exists( 'csco_site_scheme' ) ) {
	/**
	 * Site Scheme
	 */
	function csco_site_scheme() {
		if ( ! function_exists( 'csco_site_scheme_data' ) ) {
			return;
		}

		if ( ! csco_live_get_theme_mod( 'color_enable_dark_mode', true ) ) {
			return;
		}

		$data = csco_site_scheme_data();

		call_user_func( 'printf', '%s', "data-scheme='{$data['site_scheme']}'" );
	}
}

if ( ! function_exists( 'csco_section_heading' ) ) {
	/**
	 * Display section heading
	 *
	 * @param string $title    Title.
	 * @param string $type     Type output.
	 * @param bool   $echo     Type echo.
	 * @param string $class    Additional class.
	 * @param string $location Location.
	 */
	function csco_section_heading( $title, $type = 'full', $echo = true, $class = '', $location = 'default' ) {

		if ( 'full' === $type && is_string( $title ) && ! $title ) {
			return;
		}

		$tag   = csco_live_get_theme_mod( 'section_heading_tag', 'h5' );
		$align = csco_live_get_theme_mod( 'section_heading_align', 'halignleft' );

		// For submenu location.
		$default = csco_live_get_theme_mod( 'section_heading_submenu_default', true );

		if ( ! $default && ( 'submenu' === get_query_var( 'headinglocation' ) || 'submenu' === $location ) ) {
			$tag   = csco_live_get_theme_mod( 'section_heading_submenu_tag', 'h5' );
			$align = csco_live_get_theme_mod( 'section_heading_submenu_align', 'halignleft' );
		}

		// For footer location.
		$default = csco_live_get_theme_mod( 'section_heading_footer_default', true );

		if ( ! $default && ( 'footer' === get_query_var( 'headinglocation' ) || 'footer' === $location ) ) {
			$tag   = csco_live_get_theme_mod( 'section_heading_footer_tag', 'h5' );
			$align = csco_live_get_theme_mod( 'section_heading_footer_align', 'halignleft' );
		}

		$class = sprintf( 'is-style-cnvs-block-section-heading-default %s %s ', $align, $class );

		ob_start();

		if ( csco_powerkit_module_enabled( 'basic_elements' ) ) {

			if ( 'full' === $type || 'before' === $type ) {
				echo '<' . esc_html( $tag ) . ' class="cnvs-block-section-heading ' . esc_html( $class ) . '">';

				echo '<span class="cnvs-section-title"><span>';
			}

			if ( 'full' === $type ) {
				echo wp_kses_post( $title );
			}

			if ( 'full' === $type || 'after' === $type ) {
				echo '</span></span>';

				echo '</' . esc_html( $tag ) . '>';
			}
		} else {
			if ( 'full' === $type || 'before' === $type ) {
				echo '<' . esc_html( $tag ) . ' class="section-heading ' . esc_html( $class ) . '">';
			}

			if ( 'full' === $type ) {
				echo wp_kses_post( $title );
			}

			if ( 'full' === $type || 'after' === $type ) {
				echo '</' . esc_html( $tag ) . '>';
			}
		}

		if ( ! $echo ) {
			return ob_get_clean();
		} else {
			ob_end_flush();
		}
	}
}

if ( ! function_exists( 'csco_coauthors_enabled' ) ) {
	/**
	 * Is it possible to check whether it is possible to output CoAuthors.
	 */
	function csco_coauthors_enabled() {
		if ( class_exists( 'Powerkit' ) && class_exists( 'CoAuthors_Plus' ) ) {
			return true;
		}
	}
}

if ( ! function_exists( 'csco_get_coauthors' ) ) {
	/**
	 * Return CoAuthors.
	 */
	function csco_get_coauthors() {
		$authors = array();

		if ( csco_coauthors_enabled() ) {
			$authors = get_coauthors();

			if ( apply_filters( 'csco_coauthors_sort_abc', true ) && $authors ) {
				usort(
					$authors, function( $a, $b ) {
						$a_name = function_exists( 'mb_strtolower' ) ? mb_strtolower( $a->display_name ) : strtolower( $a->display_name );
						$b_name = function_exists( 'mb_strtolower' ) ? mb_strtolower( $b->display_name ) : strtolower( $b->display_name );
						return strcmp( $a_name, $b_name );
					}
				);
			}
		}

		return $authors;
	}
}

if ( ! function_exists( 'csco_get_page_layout' ) ) {
	/**
	 * Returns Page Layout: layout-sidebar-left, layout-sidebar-right or layout-fullwidth.
	 *
	 * @param int    $post_id The ID of post.
	 * @param string $layout  The layout of post.
	 */
	function csco_get_page_layout( $post_id = false, $layout = false ) {

		// Canvas Full Width.
		if ( is_singular() ) {
			$page_template = get_page_template_slug( $post_id ? $post_id : get_queried_object_id() );

			if ( 'template-canvas-fullwidth.php' === $page_template && ! $layout ) {
				return 'layout-fullwidth';
			}
		}

		// If without sidebar.
		$location = apply_filters( 'csco_sidebar', 'sidebar-main' );

		if ( ! is_active_sidebar( $location ) ) {
			return 'layout-fullwidth';
		}

		$home_id = false;

		if ( 'page' === get_option( 'show_on_front', 'posts' ) ) {

			$page_on_front = get_option( 'page_on_front' );

			if ( $post_id && intval( $post_id ) === intval( $page_on_front ) ) {
				$home_id = $post_id;
			}
		}

		if ( is_home() || $home_id ) {

			$show_on_front = get_option( 'show_on_front', 'posts' );

			if ( 'posts' === $show_on_front ) {
				// Check if default theme mods shall be used.
				if ( get_theme_mod( 'home_layout_default', true ) ) {

					// Get Layout, specified in Layout > General.
					return apply_filters( 'csco_page_layout', get_theme_mod( 'layout', 'layout-sidebar-right' ) );

				} else {

					// Get Layout, specified in Homepage > Layout.
					return apply_filters( 'csco_page_layout', get_theme_mod( 'home_layout', 'layout-sidebar-right' ) );

				}
			}

			if ( 'page' === $show_on_front ) {
				$home_id = $home_id ? $home_id : get_queried_object_id();

				// Get Layout for the blog posts page.
				if ( ! $layout ) {
					$layout = get_post_meta( $home_id, 'csco_singular_layout', true );
				}

				if ( ! $layout || 'default' === $layout ) {

					if ( get_theme_mod( 'page_layout_default', true ) ) {

						// Get Layout, specified in Layout > General.
						return apply_filters( 'csco_page_layout', get_theme_mod( 'layout', 'layout-sidebar-right' ) );

					} else {

						// Get Layout, specified in Pages > Page Layout.
						return apply_filters( 'csco_page_layout', get_theme_mod( 'page_layout', 'layout-sidebar-right' ) );

					}
				}
				return apply_filters( 'csco_page_layout', $layout );
			}
		}

		if ( is_singular( array( 'post', 'page' ) ) || $post_id ) {

			$post_id = $post_id ? $post_id : get_queried_object_id();

			// Get Layout for current post.
			if ( ! $layout ) {
				$layout = get_post_meta( $post_id, 'csco_singular_layout', true );
			}

			if ( ! $layout || 'default' === $layout ) {

				$post_type = get_post_type( $post_id );

				if ( get_theme_mod( $post_type . '_layout_default', true ) ) {

					// Get Layout, specified in Layout > General.
					return apply_filters( 'csco_page_layout', get_theme_mod( 'layout', 'layout-sidebar-right' ) );

				} else {

					// Get Layout, specified in Posts / Pages > Page Layout.
					return apply_filters( 'csco_page_layout', get_theme_mod( $post_type . '_layout', 'layout-sidebar-right' ) );

				}
			}

			return apply_filters( 'csco_page_layout', $layout );

		}

		if ( is_singular( 'sight-projects' ) ) {
			return apply_filters( 'csco_page_layout', 'layout-fullwidth' );
		}

		if ( is_404() ) {

			return apply_filters( 'csco_page_layout', 'layout-fullwidth' );
		}

		return apply_filters( 'csco_page_layout', get_theme_mod( 'layout', 'layout-sidebar-right' ) );

	}
}

if ( ! function_exists( 'csco_block_is_wide_container' ) ) {
	/**
	 * Check if Wide Container of block
	 */
	function csco_block_is_wide_container() {

		if ( ! is_singular() || ! get_the_ID() ) {
			return;
		}

		$object = get_post( get_the_ID() );

		$blocks = parse_blocks( $object->post_content );

		$page_layout = csco_get_page_layout();

		if ( 'layout-sidebar-right' === $page_layout || 'layout-sidebar-left' === $page_layout ) {
			$layout = 'layout-with-sidebar';
		}

		foreach ( $blocks as $block ) {

			$layout = 'full';

			if ( 'canvas/section' === $block['blockName'] ) {

				if ( isset( $block['attrs']['layout'] ) ) {
					$layout = $block['attrs']['layout'];
				}
			}

			foreach ( array( 'grid', 'masonry' ) as $type ) {

				// If there are 3 columns in the block.
				if ( 'layout-sidebar-right' === $page_layout || 'layout-sidebar-left' === $page_layout ) {
					if ( 'canvas/posts' === $block['blockName'] ) {
						$check_columns = true;

						if ( ! isset( $block['attrs']['layout'] ) ) {
							$check_columns = false;
						} else {
							if ( $type !== $block['attrs']['layout'] ) {
								$check_columns = false;
							}
						}

						if ( ! isset( $block['attrs'][ 'layout_' . $type . '_columns' ] ) ) {
							$check_columns = false;
						} else {
							if ( 3 !== (int) $block['attrs'][ 'layout_' . $type . '_columns' ] ) {
								$check_columns = false;
							}
						}

						if ( $check_columns ) {
							return true;
						}
					}
				}

				// If there are 4 columns in the block.
				if ( 'layout-sidebar-right' === $page_layout || 'layout-sidebar-left' === $page_layout ) {
					if ( 'canvas/posts' === $block['blockName'] ) {
						$check_columns = true;

						if ( ! isset( $block['attrs']['layout'] ) ) {
							$check_columns = false;
						} else {
							if ( $type !== $block['attrs']['layout'] ) {
								$check_columns = false;
							}
						}

						if ( ! isset( $block['attrs'][ 'layout_' . $type . '_columns' ] ) ) {
							$check_columns = false;
						} else {
							if ( 4 !== (int) $block['attrs'][ 'layout_' . $type . '_columns' ] ) {
								$check_columns = false;
							}
						}

						if ( $check_columns ) {
							return true;
						}
					}
				}

				if ( isset( $block['innerBlocks'] ) && $block['innerBlocks'] ) {

					foreach ( $block['innerBlocks'] as $a_block ) {

						if ( isset( $a_block['innerBlocks'] ) && $a_block['innerBlocks'] ) {

							foreach ( $a_block['innerBlocks'] as $b_block ) {

								// If there are 3 columns in the block.
								if ( 'canvas/posts' === $b_block['blockName'] && 'with-sidebar' === $layout ) {

									$check_columns = true;

									if ( ! isset( $b_block['attrs']['layout'] ) ) {
										$check_columns = false;
									} else {
										if ( $type !== $b_block['attrs']['layout'] ) {
											$check_columns = false;
										}
									}

									if ( ! isset( $b_block['attrs'][ 'layout_' . $type . '_columns' ] ) ) {
										$check_columns = false;
									} else {
										if ( 3 !== (int) $b_block['attrs'][ 'layout_' . $type . '_columns' ] ) {
											$check_columns = false;
										}
									}

									if ( $check_columns ) {
										return true;
									}
								}

								// If there are 4 columns in the block.
								if ( 'canvas/posts' === $b_block['blockName'] ) {

									$check_columns = true;

									if ( ! isset( $b_block['attrs']['layout'] ) ) {
										$check_columns = false;
									} else {
										if ( $type !== $b_block['attrs']['layout'] ) {
											$check_columns = false;
										}
									}

									if ( ! isset( $b_block['attrs'][ 'layout_' . $type . '_columns' ] ) ) {
										$check_columns = false;
									} else {
										if ( 4 !== (int) $b_block['attrs'][ 'layout_' . $type . '_columns' ] ) {
											$check_columns = false;
										}
									}

									if ( $check_columns ) {
										return true;
									}
								}
							}
						}
					}
				}
			}
		}
	}
}

if ( ! function_exists( 'csco_is_wide_container' ) ) {
	/**
	 * Check if Wide Container
	 */
	function csco_is_wide_container() {

		if ( csco_block_is_wide_container() ) {
			return apply_filters( 'csco_is_wide_container', true );
		}

		// Skip if not home or achive.
		if ( ! ( is_home() || is_archive() ) ) {
			return apply_filters( 'csco_is_wide_container', false );
		}

		$archive_type = get_theme_mod( csco_get_archive_option( 'archive_type' ), 'standard' );
		$columns      = get_theme_mod( csco_get_archive_option( 'columns' ), 2 );

		// Skip if not grid or masonry archive.
		if ( ! ( 'grid' === $archive_type || 'masonry' === $archive_type ) ) {
			return apply_filters( 'csco_is_wide_container', false );
		}

		// Skip if not 3 or 4 columns.
		if ( ! ( '3' === $columns || '4' === $columns ) ) {
			return apply_filters( 'csco_is_wide_container', false );
		}

		$layout = csco_get_page_layout();

		// Skip if layout is set to fullwidth and columns aren't set to 4.
		if ( '4' !== $columns && 'layout-fullwidth' === $layout ) {
			return apply_filters( 'csco_is_wide_container', false );
		}

		// Return true for all other layouts.
		return apply_filters( 'csco_is_wide_container', true );
	}
}

if ( ! function_exists( 'csco_has_header' ) ) {
	/**
	 * Checks if there's a header
	 */
	function csco_has_header() {

		if ( ! get_theme_mod( 'header', true ) ) {
			return;
		}

		if ( get_theme_mod( 'header_home_only', false ) && ! ( is_home() || is_front_page() ) ) {
			return;
		}

		return apply_filters( 'csco_has_header', true );
	}
}

if ( ! function_exists( 'csco_block_has_slider_large' ) ) {
	/**
	 * Checks if slider large is in the first position
	 */
	function csco_block_has_slider_large() {

		if ( get_option( 'csco_enable_legacy_features', false ) && 'page' === get_option( 'show_on_front' ) ) {
			if ( is_singular( get_option( 'page_for_posts' ) ) ) {
				return;
			}
		}

		$object = get_post( get_the_ID() );

		$blocks = parse_blocks( $object->post_content );

		if ( isset( $blocks[0]['innerBlocks'][0]['innerBlocks'][0] ) ) {
			$block = $blocks[0]['innerBlocks'][0]['innerBlocks'][0];

			if ( ( isset( $block['blockName'] ) && 'canvas/posts' === $block['blockName'] )
				&& ( isset( $block['attrs']['layout'] ) && 'slider-large' === $block['attrs']['layout'] ) ) {
				return true;
			}
		}
	}
}

if ( ! function_exists( 'csco_block_is_first_position' ) ) {
	/**
	 * Checks if wide is in the first position
	 */
	function csco_block_is_first_position() {

		if ( ! is_singular() || ! get_the_ID() ) {
			return;
		}

		$object = get_post( get_the_ID() );

		$blocks = parse_blocks( $object->post_content );

		if ( ! is_array( $blocks ) || ! isset( $blocks[0]['attrs']['layoutAlign'] ) || 'full' !== $blocks[0]['attrs']['layoutAlign'] ) {
			return;
		}

		if ( isset( $blocks[0]['innerBlocks'][0]['innerBlocks'][0] ) ) {
			$block = $blocks[0]['innerBlocks'][0]['innerBlocks'][0];

			// Slider wide.
			if ( ( isset( $block['blockName'] ) && 'canvas/posts' === $block['blockName'] )
				&& ( isset( $block['attrs']['layout'] ) && 'slider-wide' === $block['attrs']['layout'] ) ) {
				return 'full';
			}

			// Full.
			if ( ( isset( $block['blockName'] ) && 'canvas/posts' === $block['blockName'] )
				&& ( isset( $block['attrs']['layout'] ) && 'full-1' === $block['attrs']['layout'] ) ) {
				return 'full';
			}
			if ( ( isset( $block['blockName'] ) && 'canvas/posts' === $block['blockName'] )
				&& ( isset( $block['attrs']['layout'] ) && 'full-2' === $block['attrs']['layout'] ) ) {
				return 'full';
			}

			// Slider multiple/center or Tiles or Horizontal tiles.
			$types = csco_get_types_of_tiles();

			$types[] = 'slider-multiple';
			$types[] = 'slider-center';
			$types[] = 'horizontal-tiles-1';
			$types[] = 'horizontal-tiles-2';
			$types[] = 'horizontal-tiles-3';

			foreach ( $types as $index => $type ) {
				if ( ( isset( $block['blockName'] ) && 'canvas/posts' === $block['blockName'] )
					&& ( isset( $block['attrs']['layout'] ) && $type === $block['attrs']['layout'] ) ) {

					$padding_field = sprintf( 'layout_%s_padding', $type );

					if ( isset( $block['attrs'][ $padding_field ] ) && $block['attrs'][ $padding_field ] ) {
						$padding_val = (int) trim( str_replace( array( '%', 'px', 'em', 'rem' ), '' , $block['attrs'][ $padding_field ] ) );

						if ( $padding_val > 0 ) {
							return 'full-padding';
						}
					} else {
						return 'full-padding';
					}

					return 'full';
				}
			}
		}
	}
}

if ( ! function_exists( 'csco_get_page_header_type' ) ) {
	/**
	 * Returns Page Header Type: simple, small, wide or large.
	 */
	function csco_get_page_header_type() {

		// Homepage and front page.
		if ( is_home() || is_front_page() ) {

			$show_on_front = get_option( 'show_on_front', 'posts' );
			$page          = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

			// Posts page.
			if ( is_home() && 'page' === $show_on_front ) {

				// Get Page Header Type for current post or page.
				$page_header_type = get_post_meta( get_queried_object_id(), 'csco_page_header_type', true );

				if ( ! $page_header_type || 'default' === $page_header_type ) {

					if ( ! get_theme_mod( 'page_page_header_default', true ) ) {

						// Get Page Header Type, specified in Page > Layout.
						return apply_filters( 'csco_page_header_type', get_theme_mod( 'page_page_header', 'simple' ) );

					} else {

						// Get Page Header Type, specified in Layout > General.
						return apply_filters( 'csco_page_header_type', get_theme_mod( 'page_header', 'simple' ) );

					}
				} else {
					return apply_filters( 'csco_page_header_type', $page_header_type );
				}
			}
		}

		// Post with large slider.
		if ( is_singular() && csco_block_has_slider_large() ) {
			return apply_filters( 'csco_page_header_type', 'large' );
		}

		// Single posts and pages.
		if ( is_singular( array( 'post', 'page' ) ) ) {

			// Get Page Header Type for current post or page.
			$page_header_type = get_post_meta( get_queried_object_id(), 'csco_page_header_type', true );

			if ( ! $page_header_type || 'default' === $page_header_type ) {

				$post_type = get_post_type( get_queried_object_id() );

				if ( get_theme_mod( $post_type . '_page_header_default', true ) ) {

					// Get Page Header Type, specified in Layout > General.
					return apply_filters( 'csco_page_header_type', get_theme_mod( 'page_header', 'simple' ) );

				} else {

					// Get Page Header Type, specified in Posts / Pages > Page Header.
					return apply_filters( 'csco_page_header_type', get_theme_mod( $post_type . '_page_header', 'simple' ) );

				}
			}

			return apply_filters( 'csco_page_header_type', $page_header_type );

		}

		// Categories.
		if ( is_category() ) {

			global $cat;

			// Get Page Header Type for current category.
			$page_header_type = get_term_meta( $cat, 'csco_page_header_type', true );

			if ( ! $page_header_type || 'default' === $page_header_type ) {
				// Get default page header.
				return apply_filters( 'csco_page_header_type', get_theme_mod( 'page_header', 'simple' ) );
			} else {
				return apply_filters( 'csco_page_header_type', $page_header_type );
			}
		}

		// Other pages.
		return apply_filters( 'csco_page_header_type', 'simple' );
	}
}

if ( ! function_exists( 'csco_get_state_load_nextpost' ) ) {
	/**
	 * State Auto Load Next Post.
	 */
	function csco_get_state_load_nextpost() {

		if ( is_singular( 'post' ) ) {

			$page_load_nextpost = get_post_meta( get_queried_object_id(), 'csco_page_load_nextpost', true );

			if ( ! $page_load_nextpost || 'default' === $page_load_nextpost ) {

				return apply_filters( 'csco_page_load_nextpost', get_theme_mod( 'post_load_nextpost', false ) );
			}

			$page_load_nextpost = 'enabled' === $page_load_nextpost ? true : false;

			return apply_filters( 'csco_page_load_nextpost', $page_load_nextpost );
		}

		return apply_filters( 'csco_page_load_nextpost', false );
	}
}

if ( ! function_exists( 'csco_get_page_header_wrapper_attr' ) ) {
	/**
	 * Get Page Header Wrapper Attributes: class.
	 *
	 * @param string $type      Page Header type.
	 * @param string $class     Page Header class names.
	 * @param bool   $echo      Echo or return.
	 */
	function csco_get_page_header_wrapper_attr( $type, $class = 'page-header', $echo = true ) {

		// Append overlay class for all page headers with background.
		$class .= ' page-header-' . csco_get_page_header_type();

		// Start building output.
		$output = '';

		if ( 'simple' !== $type ) {
			// Append overlay class for all page headers with background.
			$class .= ' overlay';

			// Append ratio class for small page headers.
			if ( 'small' === $type ) {
				$class .= ' ratio ratio-landscape';
			}
		}

		// Output classes.
		$output .= ' class="' . esc_html( $class ) . '"';

		if ( $echo ) {
			echo (string) $output; // XSS ok.
		} else {
			return $output;
		}
	}
}

if ( ! function_exists( 'csco_get_page_header_image_attr' ) ) {
	/**
	 * Get Page Header Attributes: class and data-video.
	 *
	 * @param string $type      Page Header type.
	 * @param string $class     Page Header class names.
	 * @param string $video_url Page Header video URL.
	 * @param bool   $echo      Echo or return.
	 */
	function csco_get_page_header_image_attr( $type, $class = 'overlay-media', $video_url = null, $echo = true ) {

		// Return for simple page headers.
		if ( 'simple' === $type ) {
			return;
		}

		// Append parallax class for all page headers with background.
		$class .= ' parallax';

		// Start building output.
		$output = '';

		if ( is_singular() ) {

			$video_bg = csco_get_video_background( 'page-header' );

			if ( $video_bg ) {
				$class    .= ' parallax-video';
				$video_url = $video_bg['url'];
			}
		}

		// Return classes.
		$output .= ' class="' . esc_html( $class ) . '"';

		// Return Video URL attribute.
		if ( isset( $video_bg ) && $video_url ) {
			$output .= ' data-video="' . esc_url( $video_url ) . '"';
		}

		// Return Video Start Time.
		if ( isset( $video_bg ) && $video_bg['start'] ) {
			$output .= ' data-start="' . esc_html( $video_bg['start'] ) . '"';
		}

		// Return Video End Time.
		if ( isset( $video_bg ) && $video_bg['end'] ) {
			$output .= ' data-end="' . esc_html( $video_bg['end'] ) . '"';
		}

		if ( $echo ) {
			echo (string) $output; // XSS ok.
		} else {
			return $output;
		}
	}
}

if ( ! function_exists( 'csco_get_archive_location' ) ) {
	/**
	 * Returns Archive Location.
	 */
	function csco_get_archive_location() {

		global $wp_query;

		if ( isset( $wp_query->query_vars['csco_query']['location'] ) ) {
			return $wp_query->query_vars['csco_query']['location'];
		}

		if ( is_home() || is_front_page() ) {
			if ( 'page' !== get_option( 'show_on_front' ) && ! get_theme_mod( 'home_archive_default', true ) ) {
				return 'home';
			} else {
				return 'layout';
			}
		} else {
			return 'layout';
		}
	}
}

if ( ! function_exists( 'csco_get_archive_option' ) ) {
	/**
	 * Returns Archive Option Name.
	 *
	 * @param string $option_name The customize option name.
	 */
	function csco_get_archive_option( $option_name ) {

		return csco_get_archive_location() . '_' . $option_name;
	}
}

if ( ! function_exists( 'csco_get_content_template' ) ) {
	/**
	 * Get content template
	 *
	 * Since we want to have a DRY approach both for loading posts via
	 * get_template_part() in template-parts/loop/archive.php and
	 * Ajax in framework/load-more.php, we have this additional function.
	 *
	 * @param int $current Number of current post.
	 */
	function csco_get_content_template( $current ) {

		get_template_part( 'template-parts/loop/content' );

		// Make sure we display widgets on first page only, if repeat option is not true.
		global $paged;
		$current_page = $paged;

		$widgets         = get_theme_mod( csco_get_archive_option( 'widgets' ), false );
		$widgets_sidebar = get_theme_mod( csco_get_archive_option( 'widgets_sidebar' ), 'sidebar-archive' );
		$widgets_after   = get_theme_mod( csco_get_archive_option( 'widgets_after' ), 3 );
		$widgets_repeat  = get_theme_mod( csco_get_archive_option( 'widgets_repeat' ), false );

		if ( $widgets_repeat ) {
			$current_page = 0;
		}

		$widgets_after = $widgets_after ? $widgets_after : 1;

		// Insert content after n-th post.
		if ( $widgets && 0 === $current % $widgets_after && has_action( 'csco_archive_between_posts' ) && 0 === $current_page ) {
			do_action( 'csco_archive_between_posts', $widgets_sidebar, $current, $widgets_after, $widgets_repeat );
		}
	}
}

if ( ! function_exists( 'csco_get_sidebar_archive_widget' ) ) {
	/**
	 * Returns Widgets in Post Archives
	 *
	 * @param string $sidebar   the id of the sidebar.
	 * @param int    $current   current post number in the loop, equals to $wp_query->current_post.
	 * @param int    $iteration repeat after x posts.
	 * @param bool   $repeat    if it's allowed to repeat widgets.
	 */
	function csco_get_sidebar_archive_widget( $sidebar, $current = 1, $iteration = 3, $repeat = false ) {

		global $wp_registered_widgets;

		$widgets = wp_get_sidebars_widgets();

		// Check if the accepted sidebar has any widgets.
		if ( array_key_exists( $sidebar, $widgets ) && ! empty( $widgets[ $sidebar ] ) ) {

			// Get array of widget ids for the specific sidebar, i.e. array('text-4', 'text-5).
			$widgets = $widgets[ $sidebar ];

			// Get total number widgets in the sidebar.
			$total_widgets = count( $widgets );

			// Return if repeating of widgets is not allowed.
			if ( ! $repeat && $current / $iteration > $total_widgets ) {
				return;
			}

			// Get current widget number.
			$current_widget = ( $current / $iteration - 1 ) % $total_widgets;

			// Get current widget slug, like 'text-4'.
			$widget_slug = $widgets[ $current_widget ];

			// Prevent from errors, if the widget class isn't available anymore.
			if ( isset( $wp_registered_widgets[ $widgets[ $current_widget ] ] ) ) {

				// Support Lazy Widget Loader.
				if ( isset( $wp_registered_widgets[ $widgets[ $current_widget ] ]['LWL_original_callback'][0] ) ) {
					$widget = $wp_registered_widgets[ $widgets[ $current_widget ] ]['LWL_original_callback'][0];
				} else {
					$widget = $wp_registered_widgets[ $widgets[ $current_widget ] ]['callback'][0];
				}

				// Get ID of the widget.
				$widget_id = $wp_registered_widgets[ $widgets[ $current_widget ] ]['params'][0]['number'];

				// Get all settings for all specific widgets, i.e. text.
				$settings = $widget->get_settings();

				// Get class name of the widget.
				$classname = get_class( $widget );

				// Get widget settings.
				$instance = $settings[ $widget_id ];

				$args = array(
					'before_widget' => '<section class="widget %s"><div class="widget-wrap">',
					'after_widget'  => '</div></section>',
					'before_title'  => csco_section_heading( null, 'before', false, $class = 'title-widget' ),
					'after_title'   => csco_section_heading( null, 'after', false, $class = 'title-widget' ),
				);

				// Output widget.
				the_widget( $classname, $instance, $args );

			}
		}
	}
}

if ( ! function_exists( 'csco_archive_widgets' ) ) {
	/**
	 * Returns Sidebar Widgets in Post Archives
	 *
	 * @param string $sidebar   Sidebar slug.
	 * @param int    $current   Current post number in the loop, equals to $wp_query->current_post.
	 * @param int    $iteration Repeat after x posts.
	 * @param bool   $repeat    If it's allowed to repeat widgets.
	 */
	function csco_archive_widgets( $sidebar, $current, $iteration, $repeat ) {

		csco_get_sidebar_archive_widget( $sidebar, $current, $iteration, $repeat );
	}
}

if ( ! function_exists( 'csco_get_round_number' ) ) {
	/**
	 * Get rounded number.
	 *
	 * @param int $number    Input number.
	 * @param int $min_value Minimum value to round number.
	 * @param int $decimal   How may decimals shall be in the rounded number.
	 */
	function csco_get_round_number( $number, $min_value = 1000, $decimal = 1 ) {
		if ( $number < $min_value ) {
			return number_format_i18n( $number );
		}
		$alphabets = array(
			1000000000 => 'B',
			1000000    => 'M',
			1000       => 'K',
		);
		foreach ( $alphabets as $key => $value ) {
			if ( $number >= $key ) {
				return round( $number / $key, $decimal ) . $value;
			}
		}
	}
}

if ( ! function_exists( 'csco_the_round_number' ) ) {
	/**
	 * Echo rounded number.
	 *
	 * @param int $number    Input number.
	 * @param int $min_value Minimum value to round number.
	 * @param int $decimal   How may decimals shall be in the rounded number.
	 */
	function csco_the_round_number( $number, $min_value = 1000, $decimal = 1 ) {
		echo esc_html( csco_get_round_number( $number, $min_value, $decimal ) );
	}
}

if ( ! function_exists( 'csco_hex_is_light' ) ) {
	/**
	 * Determine whether a hex color is light.
	 *
	 * @param mixed $color Color.
	 * @return bool  True if a light color.
	 */
	function csco_hex_is_light( $color ) {
		$hex        = str_replace( '#', '', $color );
		$c_r        = hexdec( substr( $hex, 0, 2 ) );
		$c_g        = hexdec( substr( $hex, 2, 2 ) );
		$c_b        = hexdec( substr( $hex, 4, 2 ) );
		$brightness = ( ( $c_r * 299 ) + ( $c_g * 587 ) + ( $c_b * 114 ) ) / 1000;
		return $brightness > 155;
	}
}

if ( ! function_exists( 'csco_light_or_dark' ) ) {
	/**
	 * Detect if we should use a light or dark color on a background color.
	 *
	 * @param mixed  $color Color.
	 * @param string $dark  Darkest reference.
	 *                      Defaults to '#000000'.
	 * @param string $light Lightest reference.
	 *                      Defaults to '#FFFFFF'.
	 * @return string
	 */
	function csco_light_or_dark( $color, $dark = '#000000', $light = '#FFFFFF' ) {
		return csco_hex_is_light( $color ) ? $dark : $light;
	}
}

if ( ! function_exists( 'csco_str_truncate' ) ) {
	/**
	 * Truncates string with specified length
	 *
	 * @param  string $string      Text string.
	 * @param  int    $length      Letters length.
	 * @param  string $etc         End truncate.
	 * @param  bool   $break_words Break words or not.
	 * @return string
	 */
	function csco_str_truncate( $string, $length = 80, $etc = '&hellip;', $break_words = false ) {
		if ( 0 === $length ) {
			return '';
		}

		if ( function_exists( 'mb_strlen' ) ) {

			// MultiBite string functions.
			if ( mb_strlen( $string ) > $length ) {
				$length -= min( $length, mb_strlen( $etc ) );
				if ( ! $break_words ) {
					$string = preg_replace( '/\s+?(\S+)?$/', '', mb_substr( $string, 0, $length + 1 ) );
				}

				return mb_substr( $string, 0, $length ) . $etc;
			}
		} else {

			// Default string functions.
			if ( strlen( $string ) > $length ) {
				$length -= min( $length, strlen( $etc ) );
				if ( ! $break_words ) {
					$string = preg_replace( '/\s+?(\S+)?$/', '', substr( $string, 0, $length + 1 ) );
				}

				return substr( $string, 0, $length ) . $etc;
			}
		}

		return $string;
	}
}

if ( ! function_exists( 'csco_get_the_excerpt' ) ) {
	/**
	 * Filters the number of words in an excerpt.
	 */
	function csco_get_the_excerpt_length() {
		return 5000;
	}

	/**
	 * Get excerpt of post.
	 *
	 * @param int    $length      Letters length.
	 * @param string $etc         End truncate.
	 * @param bool   $break_words Break words or not.
	 */
	function csco_get_the_excerpt( $length = 80, $etc = '&hellip;', $break_words = false ) {
		add_filter( 'excerpt_length', 'csco_get_the_excerpt_length' );

		$excerpt = get_the_excerpt();

		$func_remove = sprintf( 'remove_%s', 'filter' );

		$func_remove( 'excerpt_length', 'csco_get_the_excerpt_length' );

		return csco_str_truncate( $excerpt, $length, $etc, $break_words );
	}
}

if ( ! function_exists( 'csco_get_video_background' ) ) {
	/**
	 * Get Video Background
	 *
	 * @param string $slug Slug of the background location: slider, tiles, carousel, archive.
	 * @param mixed  $id   Post ID.
	 */
	function csco_get_video_background( $slug, $id = false ) {

		// Get Post Format.
		if ( in_array( get_post_format(), array( 'video' ), true ) ) {

			if ( ! $id ) {
				$id = get_the_ID();
			}

			// Get video URL of the post.
			$url = get_post_meta( $id, 'powerkit_post_format_video', true );

			// Get video background locations of the post.
			$location = get_post_meta( $id, 'csco_post_video_bg_location', true );

			// Set default location.
			if ( ! $location ) {
				$location = array( 'slider', 'archive' );
			}

			// Check if there's a video URL and if video background is valid for this featured location.
			if ( $url && ( ( $location && in_array( $slug, $location, true ) ) || 'any' === $slug ) ) {

				// Get start time.
				$start = get_post_meta( $id, 'csco_post_video_bg_start_time', true );

				// Set default start time.
				if ( ! $start ) {
					$start = 0;
				}

				// Get end time.
				$end = get_post_meta( $id, 'csco_post_video_bg_end_time', true );

				// Set default end time.
				if ( ! $end ) {
					$end = 0;
				}

				// Save all data as an array.
				$video = array(
					'url'   => $url,
					'start' => $start,
					'end'   => $end,
				);

				return $video;
			}
		}
	}
}

/**
 * Insert a value or key/value pair after a specific key in an array.  If key doesn't exist, value is appended
 * to the end of the array.
 *
 * @param array  $array The array.
 * @param string $key   The key.
 * @param array  $new   The new.
 */
function array_insert_after( array $array, $key, array $new ) {
	$keys  = array_keys( $array );
	$index = array_search( $key, $keys );
	$pos   = false === $index ? count( $array ) : $index + 1;

	return array_merge( array_slice( $array, 0, $pos ), $new, array_slice( $array, $pos ) );
}
