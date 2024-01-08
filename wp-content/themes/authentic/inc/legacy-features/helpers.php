<?php
/**
 * Helpers.
 *
 * @package Authentic
 */

if ( ! function_exists( 'csco_get_post_section_vars' ) ) {
	/**
	 * Returns Post Section Vars Array
	 *
	 * @param string $type Type of the post section: slider, tiles or carousel.
	 */
	function csco_get_post_section_vars( $type ) {

		if ( ! in_array( $type, array( 'slider', 'tiles', 'carousel' ), true ) ) {
			return;
		}

		if ( is_home() || is_front_page() ) {

			$show_on_front = get_option( 'show_on_front', 'posts' );
			$location      = get_theme_mod( 'home_' . $type . '_location', 'front_page' );

			if ( is_front_page() && 'home' === $location && 'page' === $show_on_front ) {
				return;
			}

			if ( is_home() && 'front_page' === $location && 'page' === $show_on_front ) {
				return;
			}

			// Homepage.
			$prefix = 'home_' . $type;

		} elseif ( is_single() && in_array( $type, array( 'carousel' ), true ) ) {

			// Specific post.
			$prefix = 'post_' . $type;

		} else {

			// If post section is disabled.
			return;

		}

		$args = array(
			'type'       => $type,
			'display'    => get_theme_mod( $prefix, false ),
			'source'     => get_theme_mod( $prefix . '_source', 'all' ),
			'category'   => get_theme_mod( $prefix . '_source_category_slug', '' ),
			'tag'        => get_theme_mod( $prefix . '_source_tag_slug', '' ),
			'posts'      => get_theme_mod( $prefix . '_source_posts_slug', '' ),
			'orderby'    => get_theme_mod( $prefix . '_orderby', '' ),
			'time_frame' => get_theme_mod( $prefix . '_time_frame', '' ),
			'meta_cat'   => get_theme_mod( $prefix . '_meta_category', true ),
			'meta'       => get_theme_mod( $prefix . '_meta', true ),
		);

		// Additional args for slider.
		if ( 'slider' === $type ) {
			$args['slider_type'] = get_theme_mod( $prefix . '_type', 'center' );
			$args['visible']     = get_theme_mod( $prefix . '_visible', '3' );
			$args['padding']     = get_theme_mod( $prefix . '_padding', '30' );
			$args['autoplay']    = get_theme_mod( $prefix . '_autoplay', true );
			$args['timeout']     = get_theme_mod( $prefix . '_timeout', '7000' );
			$args['total']       = get_theme_mod( $prefix . '_total', '5' );
			$args['parallax']    = get_theme_mod( $prefix . '_parallax', true );
			$args['button']      = get_theme_mod( $prefix . '_button', true );
		}

		// Additional args for tiles.
		if ( 'tiles' === $type ) {
			$args['layout']   = get_theme_mod( $prefix . '_layout', '1' );
			$args['parallax'] = get_theme_mod( $prefix . '_parallax', true );
			$args['button']   = get_theme_mod( $prefix . '_button', true );
		}

		// Additional args for carousel.
		if ( 'carousel' === $type ) {
			$args['title']       = get_theme_mod( $prefix . '_title', esc_html__( 'Trending Posts', 'authentic' ) );
			$args['orientation'] = get_theme_mod( $prefix . '_orientation', 'landscape' );
		}

		// Additional args and overrides for carousel on single posts.
		if ( 'carousel' === $type && is_single() ) {
			$args['display'] = get_theme_mod( $prefix, true );
			$args['title']   = get_theme_mod( $prefix . '_title', esc_html__( 'You May Also Like', 'authentic' ) );
			$args['current'] = get_theme_mod( $prefix . '_current', true );
			$args['slides']  = get_theme_mod( $prefix . '_slides', 8 );
		}

		return apply_filters( 'csco_post_section_vars', $args );
	}
}

if ( ! function_exists( 'csco_get_post_source_query_vars' ) ) {
	/**
	 * Returns additional WP Query args for post source
	 *
	 * @param array $vars Variables for post sections.
	 */
	function csco_get_post_source_query_vars( $vars ) {

		if ( ! $vars ) {
			return;
		}

		$args = array();

		// Set general arguments.
		$args['post_type']           = 'post';
		$args['order']               = 'DESC';
		$args['ignore_sticky_posts'] = true;

		// Source.
		if ( 'featured' === $vars['source'] ) {
			// Check if custom taxonomy was registered.
			if ( taxonomy_exists( 'powerkit_post_featured' ) ) {
				// Featured posts.
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'powerkit_post_featured',
						'field'    => 'slug',
						'terms'    => $vars['type'],
					),
				);
			}
		} elseif ( 'category' === $vars['source'] ) {
			// Category.
			$args['category_name'] = sanitize_text_field( $vars['category'] );
		} elseif ( 'tag' === $vars['source'] ) {
			// Tag.
			$args['tag'] = sanitize_text_field( $vars['tag'] );

		} elseif ( 'posts' === $vars['source'] && $vars['posts'] ) {
			// Posts.
			$posts = sanitize_text_field( $vars['posts'] );

			$args['post_type'] = array( 'post', 'page' );

			$args['post__in'] = explode( ',', str_replace( ' ', '', $posts ) );
		}

		// Post order.
		if ( 'views' === $vars['orderby'] ) {
			// Post Views.
			$args['orderby'] = 'post_views';
			// Don't hide posts without views.
			$args['views_query']['hide_empty'] = false;
			// Time Frame for Post Views.
			if ( $vars['time_frame'] ) {
				$args['date_query'] = array(
					array(
						'column' => 'post_date_gmt',
						'after'  => $vars['time_frame'] . ' ago',
					),
				);
			}
		} elseif ( 'date' === $vars['orderby'] ) {
			// Date.
			$args['orderby'] = 'date';
		}

		// Limit to current category.
		if ( isset( $vars['current'] ) && $vars['current'] ) {
			if ( is_single() ) {

				// Get current post categories.
				$categories = get_the_category( get_the_ID() );

				$category__in = array();

				// Add category IDs to the array.
				foreach ( $categories as $category ) {
					$category__in[] = $category->term_id;
				}

				// Add current post category IDs to the 'category__in'.
				$args['category__in'] = $category__in;
			}
		}

		// Remove current post from related posts.
		if ( is_single() ) {
			$args['post__not_in'] = array( get_the_ID() );
		}

		// Set post_per_type depending on the featured location type.
		if ( 'slider' === $vars['type'] ) {

			$args['posts_per_page'] = $vars['total'];

			$args = apply_filters( 'csco_post_slider_query_args', $args );

		} elseif ( 'carousel' === $vars['type'] ) {

			$args['posts_per_page'] = 8;

			if ( is_single() ) {
				$args['posts_per_page'] = $args['slides'];
			}

			$args = apply_filters( 'csco_post_carousel_query_args', $args );

		} elseif ( 'tiles' === $vars['type'] ) {

			$layout = apply_filters( 'csco_post_tiles_layout', $vars['layout'] );

			if ( in_array( $layout, array( '1', '3' ), true ) ) {
				$posts_per_page = 2;
			} elseif ( in_array( $layout, array( '2', '4', '5' ), true ) ) {
				$posts_per_page = 3;
			} elseif ( in_array( $layout, array( '6', '7', '8' ), true ) ) {
				$posts_per_page = 5;
			} elseif ( '9' === $layout ) {
				$posts_per_page = 8;
			}

			$args['posts_per_page'] = $posts_per_page;

			$args = apply_filters( 'csco_post_tiles_query_args', $args );

		}

		return apply_filters( 'csco_post_source_query_args', $args );
	}
}

if ( ! function_exists( 'csco_get_featured_post_ids' ) ) {
	/**
	 * Get Featured Post IDs
	 */
	function csco_get_featured_post_ids() {

		$featured_in = array();

		if ( get_theme_mod( 'home_slider_exclude', false ) && get_theme_mod( 'home_slider', false ) ) {
			$featured_in[] = 'slider';
		}

		if ( get_theme_mod( 'home_tiles_exclude', false ) && get_theme_mod( 'home_tiles', false ) ) {
			$featured_in[] = 'tiles';
		}

		if ( get_theme_mod( 'home_carousel_exclude', false ) && get_theme_mod( 'home_carousel', false ) ) {
			$featured_in[] = 'carousel';
		}

		if ( ! $featured_in ) {
			return;
		}

		$post_ids = array();

		foreach ( $featured_in as $key => $value ) {

			$settings = csco_get_post_section_vars( $value );
			$args     = csco_get_post_source_query_vars( $settings );

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$post_ids[] = get_the_ID();
				}
				wp_reset_postdata();
			}
		}

		$post_ids = array_unique( $post_ids );

		return apply_filters( 'csco_featured_post_ids', $post_ids );
	}
}
