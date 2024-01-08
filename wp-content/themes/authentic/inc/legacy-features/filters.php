<?php
/**
 * Filters
 *
 * All filters for native WordPress and plugins' functions.
 *
 * @package Authentic
 */

if ( ! function_exists( 'csco_pre_get_posts' ) ) {
	/**
	 * Exclude Featured Posts from the Main Query
	 *
	 * @param array $query Default query.
	 */
	function csco_pre_get_posts( $query ) {
		if ( ( $query->is_home() && $query->is_main_query() ) ) {
			$post_ids = csco_get_featured_post_ids();
			if ( ! $post_ids ) {
				return $query;
			}
			$query->set( 'post__not_in', $post_ids );
		}
		return $query;
	}
	add_action( 'pre_get_posts', 'csco_pre_get_posts' );
}

if ( ! function_exists( 'csco_home_slider_header_type' ) ) {
	/**
	 * Set header type for home slider
	 *
	 * @param string $type Type of header.
	 */
	function csco_home_slider_header_type( $type ) {
		// Homepage and front page.
		if ( is_home() || is_front_page() ) {

			$show_on_front   = get_option( 'show_on_front', 'posts' );
			$page            = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$slider          = get_theme_mod( 'home_slider', false );
			$slider_location = get_theme_mod( 'home_slider_location', 'front_page' );
			$slider_type     = get_theme_mod( 'home_slider_type', 'center' );

			// Static front page with large slider.
			if ( is_front_page() && 'page' === $show_on_front && 'front_page' === $slider_location && 'large' === $slider_type && $slider && 1 === $page ) {
				return 'large';
			}

			// Posts page with large slider.
			if ( is_home() && 'page' === $show_on_front && 'home' === $slider_location && 'large' === $slider_type && $slider && 1 === $page ) {
				return 'large';
			}

			// Homepage with large slider.
			if ( is_home() && 'posts' === $show_on_front && 'large' === $slider_type && true === $slider && 1 === $page ) {
				return 'large';
			}
		}

		return $type;
	}
	add_filter( 'csco_page_header_type', 'csco_home_slider_header_type' );
}

if ( ! function_exists( 'csco_post_slider' ) ) {
	/**
	 * Post Slider
	 */
	function csco_post_slider() {

		$page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		if ( 1 !== $page ) {
			return;
		}

		$settings = csco_get_post_section_vars( 'slider' );

		if ( ! $settings ) {
			return;
		}

		if ( ! apply_filters( 'csco_post_slider', $settings['display'] ) ) {
			return;
		}

		get_template_part( 'inc/legacy-features/sections/post-slider' );
	}
	add_action( 'csco_header_after', 'csco_post_slider', 20 );
}

if ( ! function_exists( 'csco_post_tiles' ) ) {
	/**
	 * Post Tiles
	 */
	function csco_post_tiles() {

		$page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		if ( 1 !== $page ) {
			return;
		}

		$settings = csco_get_post_section_vars( 'tiles' );

		if ( ! $settings ) {
			return;
		}

		if ( ! apply_filters( 'csco_post_tiles', $settings['display'] ) ) {
			return;
		}

		get_template_part( 'inc/legacy-features/sections/post-tiles' );
	}
	add_action( 'csco_header_after', 'csco_post_tiles', 25 );
}

if ( ! function_exists( 'csco_post_carousel' ) ) {
	/**
	 * Post Carousel
	 */
	function csco_post_carousel() {

		$page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		if ( 1 !== $page ) {
			return;
		}

		// Prevent from displaying in header on single posts.
		if ( is_single() ) {
			return;
		}

		$settings = csco_get_post_section_vars( 'carousel' );

		if ( ! $settings ) {
			return;
		}

		if ( ! apply_filters( 'csco_post_carousel', $settings['display'] ) ) {
			return;
		}

		get_template_part( 'inc/legacy-features/sections/post-carousel' );
	}
	add_action( 'csco_header_after', 'csco_post_carousel', 30 );
}

if ( ! function_exists( 'csco_single_post_carousel' ) ) {
	/**
	 * Post Carousel on Single Posts
	 */
	function csco_single_post_carousel() {
		$settings = csco_get_post_section_vars( 'carousel' );

		if ( ! $settings ) {
			return;
		}

		if ( true === $settings['display'] ) {
			get_template_part( 'inc/legacy-features/sections/post-carousel' );
		}
	}
	add_action( 'csco_post_end', 'csco_single_post_carousel', 40 );
}

if ( ! function_exists( 'csco_legacy_custom_meta_boxes' ) ) {
	/**
	 * Add custom meta boxes
	 */
	function csco_legacy_custom_meta_boxes() {
		$function = sprintf( 'remove_meta_%s', 'box' );

		$function( 'csco_mb_video_background', array( 'post' ), 'side' );

		$function = sprintf( 'add_meta_%s', 'box' );

		$function( 'csco_mb_video_background', esc_html__( 'Video Background', 'authentic' ), 'csco_legacy_video_background_markup', array( 'post' ), 'side' );
	}
	add_action( sprintf( 'add_meta_%s', 'boxes' ), 'csco_legacy_custom_meta_boxes' );

	/**
	 * Video background markup
	 *
	 * @param object $post The post object.
	 */
	function csco_legacy_video_background_markup( $post ) {
		wp_nonce_field( 'video_background', 'csco_mb_video_background' );

		$post_video_bg_location   = get_post_meta( $post->ID, 'csco_post_video_bg_location', true );
		$post_video_bg_start_time = get_post_meta( $post->ID, 'csco_post_video_bg_start_time', true );
		$post_video_bg_end_time   = get_post_meta( $post->ID, 'csco_post_video_bg_end_time', true );

		// Set Default.
		$post_video_bg_location   = $post_video_bg_location ? (array) $post_video_bg_location : array( 'slider', 'archive' );
		$post_video_bg_start_time = $post_video_bg_start_time ? (int) $post_video_bg_start_time : 0;
		$post_video_bg_end_time   = $post_video_bg_end_time ? (int) $post_video_bg_end_time : 0;
		?>
			<h4><?php esc_html_e( 'Location', 'authentic' ); ?></h4>
			<label><input type="checkbox" name="csco_post_video_bg_location[]" value="page-header" <?php checked( in_array( 'page-header', $post_video_bg_location, true ) ); ?>> <?php esc_html_e( 'Page Header', 'authentic' ); ?></label><br>
			<label><input type="checkbox" name="csco_post_video_bg_location[]" value="slider" <?php checked( in_array( 'slider', $post_video_bg_location, true ) ); ?>> <?php esc_html_e( 'Post Slider', 'authentic' ); ?></label><br>
			<label><input type="checkbox" name="csco_post_video_bg_location[]" value="tiles" <?php checked( in_array( 'tiles', $post_video_bg_location, true ) ); ?>> <?php esc_html_e( 'Post Tiles', 'authentic' ); ?></label><br>
			<label><input type="checkbox" name="csco_post_video_bg_location[]" value="archive" <?php checked( in_array( 'archive', $post_video_bg_location, true ) ); ?>> <?php esc_html_e( 'Post Archives', 'authentic' ); ?></label><br>

			<p><strong><label for="csco_post_video_bg_start_time"><?php esc_html_e( 'Start Time (sec)', 'authentic' ); ?>:</label></strong>
			<input class="small-text" type="number" id="csco_post_video_bg_start_time" name="csco_post_video_bg_start_time" value="<?php echo esc_attr( $post_video_bg_start_time ); ?>"></p>

			<p><strong><label for="csco_post_video_bg_end_time"><?php esc_html_e( 'End Time (sec)', 'authentic' ); ?>:</label></strong>
			<input class="small-text" type="number" id="csco_post_video_bg_end_time" name="csco_post_video_bg_end_time" value="<?php echo esc_attr( $post_video_bg_end_time ); ?>"></p>
		<?php
	}

	/**
	 * Save meta box
	 *
	 * @param int $post_id The post id.
	 */
	function csco_legacy_save_meta_boxes( $post_id ) {

		// Bail if we're doing an auto save.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// if our nonce isn't there, or we can't verify it, bail.
		if ( isset( $_POST['csco_mb_video_background'] ) && wp_verify_nonce( $_POST['csco_mb_video_background'], 'video_background' ) ) { // Input var ok; sanitization ok.
			if ( isset( $_POST['csco_post_video_bg_location'] ) ) { // Input var ok; sanitization ok.
				$post_video_bg_location = array_map( 'sanitize_text_field', $_POST['csco_post_video_bg_location'] ); // Input var ok; sanitization ok.

				update_post_meta( $post_id, 'csco_post_video_bg_location', $post_video_bg_location );
			}
		}
	}
	add_action( 'save_post', 'csco_legacy_save_meta_boxes' );
}

/*
 * --------------------------
 * CUSTOM THEME MODS
 * --------------------------
 */

add_filter(
	'csco_colors_borders', function( $rules ) {
		array_push(
			$rules, array(
				'element'  => csco_implode(
					array(
						'.section-tiles + .site-content .main-content',
						'.section-tiles + .site-content > .cs-container:before',
						'.section-carousel + .site-content > .cs-container:before',
					)
				),
				'property' => 'border-top-color',
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_btn_primary_text', function( $rules ) {
		array_push(
			$rules, array(
				'element'  => csco_implode(
					array(
						'.section-tiles .post-more .button',
						'.section-slider .post-more .button',
					)
				),
				'property' => 'color',
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_color_btn_primary_text_hover', function( $rules ) {
		array_push(
			$rules, array(
				'element'  => csco_implode(
					array(
						'.section-tiles .post-more .button:hover',
						'.section-slider .post-more .button:hover',
					)
				),
				'property' => 'color',
			)
		);
		return $rules;
	}
);

add_filter(
	'csco_typography_h3', function( $rules ) {
		array_push(
			$rules, array(
				'element' => csco_implode(
					array(
						'.section-tiles h2',
					)
				),
			)
		);
		return $rules;
	}
);
