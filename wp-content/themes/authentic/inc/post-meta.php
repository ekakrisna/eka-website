<?php
/**
 * Post Meta Helper Functions
 *
 * These helper functions return post meta, if its enabled in WordPress Customizer.
 *
 * @package Authentic
 */

if ( ! function_exists( 'csco_block_post_meta' ) ) {
	/**
	 * Block Post Meta
	 *
	 * A wrapper function that returns all post meta types either
	 * in an ordered list <ul> or as a single element <span>.
	 *
	 * @param array $settings Settings of block.
	 * @param mixed $meta     Contains post meta types.
	 * @param bool  $echo     Echo or return.
	 * @param bool  $compact  If meta compact.
	 */
	function csco_block_post_meta( $settings, $meta, $echo = true, $compact = false ) {

		$allowed = array();

		if ( isset( $settings['showMetaCategory'] ) && $settings['showMetaCategory'] ) {
			$allowed[] = 'category';
		}

		if ( isset( $settings['showMetaAuthor'] ) && $settings['showMetaAuthor'] ) {
			$allowed[] = 'author';
		}

		if ( isset( $settings['showMetaDate'] ) && $settings['showMetaDate'] ) {
			$allowed[] = 'date';
		}

		if ( isset( $settings['showMetaComments'] ) && $settings['showMetaComments'] ) {
			$allowed[] = 'comments';
		}

		if ( isset( $settings['showMetaViews'] ) && $settings['showMetaViews'] ) {
			$allowed[] = 'views';
		}

		if ( isset( $settings['showMetaReadingTime'] ) && $settings['showMetaReadingTime'] ) {
			$allowed[] = 'reading_time';
		}

		if ( isset( $settings['showMetaShares'] ) && $settings['showMetaShares'] ) {
			$allowed[] = 'shares';
		}

		if ( isset( $settings['metaCompact'] ) && $settings['metaCompact'] ) {
			$compact = true;
		}

		$allowed = apply_filters( 'csco_allowed_block_post_meta', $allowed, $settings, $meta, $echo, $compact );

		if ( ! $allowed ) {
			return;
		}

		csco_get_post_meta( $meta, $compact, $echo, $allowed );
	}
}

if ( ! function_exists( 'csco_get_post_meta' ) ) {
	/**
	 * Post Meta
	 *
	 * A wrapper function that returns all post meta types either
	 * in an ordered list <ul> or as a single element <span>.
	 *
	 * @param mixed $meta     Contains post meta types.
	 * @param bool  $compact  If compact version shall be displayed.
	 * @param bool  $echo     Echo or return.
	 * @param array $allowed  Allowed meta types.
	 */
	function csco_get_post_meta( $meta, $compact = false, $echo = true, $allowed = array() ) {

		// Return if no post meta types provided.
		if ( ! $meta ) {
			return;
		}

		if ( ! $allowed ) {
			// Set default allowed post meta types.
			$allowed = get_theme_mod( 'post_meta', array( 'date', 'author', 'category' ) );
		}

		if ( is_array( $meta ) ) {
			// Intersect provided and allowed meta types.
			$meta = array_intersect( $allowed, $meta );
		}

		$output = null;

		if ( $meta && is_array( $meta ) ) {

			$output .= '<ul class="post-meta">';

			// Add normal meta types to the list.
			foreach ( $meta as $type ) {
				$csco_function = "csco_get_meta_$type";

				if ( function_exists( $csco_function ) ) {
					$output .= $csco_function( 'li', $compact );
				}
			}

			$output .= '</ul>';

		} else {
			if ( in_array( $meta, $allowed, true ) ) {
				// Output single meta type.
				$csco_function = "csco_get_meta_$meta";

				if ( function_exists( $csco_function ) ) {
					$output .= $csco_function( 'div', $compact );
				}
			}
		}

		if ( $echo ) {
			echo (string) $output; // XSS ok.
		} else {
			return $output;
		}
	}
}

if ( ! function_exists( 'csco_get_meta_category' ) ) {
	/**
	 * Post Сategory
	 *
	 * @param string $tag     Element tag, i.e. div or span.
	 * @param bool   $compact If compact version shall be displayed.
	 * @param int    $post_id Post ID.
	 */
	function csco_get_meta_category( $tag = 'span', $compact = false, $post_id = null ) {

		$output = '';

		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}

		$output .= '<' . esc_html( $tag ) . ' class="meta-category">';

		$output .= get_the_category_list( '', '', $post_id );

		$output .= '</' . esc_html( $tag ) . '>';

		return $output;
	}
}

if ( ! function_exists( 'csco_get_meta_date' ) ) {
	/**
	 * Post Date
	 *
	 * @param string $tag     Element tag, i.e. div or span.
	 * @param bool   $compact If compact version shall be displayed.
	 */
	function csco_get_meta_date( $tag = 'span', $compact = false ) {

		$output = '<' . esc_html( $tag ) . ' class="meta-date">';

		if ( false === $compact ) {
			$time_string = get_the_date();
		} else {
			$time_string = get_the_date( 'd.m.y' );
		}

		if ( get_the_time( 'd.m.Y H:i' ) !== get_the_modified_time( 'd.m.Y H:i' ) ) {
			if ( ! get_theme_mod( 'display_published_date', true ) ) {
				$time_string = get_the_modified_date();
			}
		}

		$output .= apply_filters( 'csco_post_meta_date_output', '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' );

		$output .= '</' . esc_html( $tag ) . '>';

		return $output;
	}
}

if ( ! function_exists( 'csco_get_meta_author' ) ) {
	/**
	 * Post Author
	 *
	 * @param string $tag     Element tag, i.e. div or span.
	 * @param bool   $compact If compact version shall be displayed.
	 */
	function csco_get_meta_author( $tag = 'span', $compact = false ) {

		$authors = array( get_the_author_meta( 'ID' ) );

		$output = '<' . esc_attr( $tag ) . ' class="meta-author">';

		if ( csco_coauthors_enabled() ) {
			$authors = csco_get_coauthors();
		}

		if ( $authors ) {

			$counter = 0;

			foreach ( $authors as & $author ) {

				$output .= $counter > 0 ? sprintf( '<span class="sep"> %s </span>', esc_html__( 'and', 'authentic' ) ) : '';

				$author_id    = isset( $author->ID ) ? $author->ID : $author;
				$display_name = isset( $author->display_name ) ? $author->display_name : get_the_author_meta( 'display_name', $author_id );
				$posts_url    = get_author_posts_url( $author_id, isset( $author->user_nicename ) ? $author->user_nicename : '' );

				$output .= sprintf(
					'<span class="author"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
					esc_url( $posts_url ),
					/* translators: %s: author name */
					esc_attr( sprintf( __( 'View all posts by %s', 'authentic' ), $display_name ) ),
					// Add author's avatar if compact mode is false.
					$display_name
				);

				$counter++;
			}
		}

		$output .= '</' . esc_html( $tag ) . '>';

		return $output;

	}
}

if ( ! function_exists( 'csco_get_meta_comments' ) ) {
	/**
	 * Post Comments
	 *
	 * @param string $tag     Element tag, i.e. div or span.
	 * @param bool   $compact If compact version shall be displayed.
	 */
	function csco_get_meta_comments( $tag = 'span', $compact = false ) {

		$output = '';

		$output .= '<' . esc_html( $tag ) . ' class="meta-comments">';

		if ( true === $compact ) {
			$output .= '<i class="cs-icon cs-icon-speech-bubble"></i>';
			ob_start();
			comments_popup_link( '0', '1', '%', 'comments-link', '' );
			$output .= ob_get_clean();
		} else {
			ob_start();
			comments_popup_link( esc_html__( 'No comments', 'authentic' ), esc_html__( 'One comment', 'authentic' ), '% ' . esc_html__( 'comments', 'authentic' ), 'comments-link', '' );
			$output .= ob_get_clean();
		}

		$output .= '</' . esc_html( $tag ) . '>';

		return $output;
	}
}

if ( ! function_exists( 'csco_get_meta_reading_time' ) ) {
	/**
	 * Post Reading Time
	 *
	 * @param string $tag     Element tag, i.e. div or span.
	 * @param bool   $compact If compact version shall be displayed.
	 */
	function csco_get_meta_reading_time( $tag = 'span', $compact = false ) {

		if ( ! csco_powerkit_module_enabled( 'reading_time' ) ) {
			return;
		}

		$reading_time = powerkit_get_post_reading_time();

		$output = '<' . esc_html( $tag ) . ' class="meta-reading-time">';

		if ( true === $compact ) {
			$output .= '<i class="cs-icon cs-icon-clock"></i>' . intval( $reading_time ) . ' ' . esc_html( 'min', 'authentic' );
		} else {
			/* translators: %s number of minutes */
			$output .= esc_html( sprintf( _n( '%s minute read', '%s minute read', $reading_time, 'authentic' ), $reading_time ) );
		}

		$output .= '</' . esc_html( $tag ) . '>';

		return $output;
	}
}

if ( ! function_exists( 'csco_get_meta_views' ) ) {
	/**
	 * Post Views
	 *
	 * @param string $tag     Element tag, i.e. div or span.
	 * @param bool   $compact If compact version shall be displayed.
	 */
	function csco_get_meta_views( $tag = 'span', $compact = false ) {

		switch ( csco_post_views_enabled() ) {
			case 'post_views':
				$views = pvc_get_post_views();
				break;
			case 'pk_post_views':
				$views = powerkit_get_post_views( null, false );
				break;
			default:
				return;
		}

		// Don't display if minimum threshold is not met.
		if ( $views < apply_filters( 'csco_post_minimum_views', 1 ) ) {
			return;
		}

		$output = '<' . esc_html( $tag ) . ' class="meta-views">';

		$views_rounded = csco_get_round_number( $views );

		if ( true === $compact ) {
			$output .= '<i class="cs-icon cs-icon-eye"></i>' . esc_html( $views_rounded );
		} else {
			/* translators: %s number of post views */
			$output .= esc_html( sprintf( _n( '%s view', '%s views', $views, 'authentic' ), $views_rounded ) );
		}

		$output .= '</' . esc_html( $tag ) . '>';

		return $output;

	}
}

if ( ! function_exists( 'csco_get_meta_shares' ) ) {
	/**
	 * Post Shares
	 *
	 * @param string $tag     Element tag, i.e. div or span.
	 * @param bool   $compact If compact version shall be displayed.
	 */
	function csco_get_meta_shares( $tag = 'span', $compact = false ) {

		$location = 'block-posts';

		if ( get_query_var( 'meta_shares_location' ) ) {
			$location = get_query_var( 'meta_shares_location' );
		}

		if ( ! csco_powerkit_module_enabled( 'share_buttons' ) ) {
			return;
		}

		if ( ! get_option( "powerkit_share_buttons_{$location}_display" ) ) {
			return;
		}

		$output = '<' . esc_html( $tag ) . ' class="meta-shares">';

		$accounts = get_option( "powerkit_share_buttons_{$location}_multiple_list", array( 'facebook', 'twitter', 'pinterest' ) );

		// Share Count.
		$shares = powerkit_share_buttons_get_total_count( $accounts, get_the_ID(), null, true );

		$shares_rounded = powerkit_share_buttons_count_format( $shares );

		// Don't display if minimum threshold is not met.
		if ( $shares < apply_filters( 'csco_minimum_shares', 1 ) ) {
			return;
		}

		ob_start();
		?>
			<span class="total">
				<i class="cs-icon cs-icon-share"></i>
				<span class="total-number">
					<?php
					if ( true === $compact ) {
						echo esc_html( $shares_rounded );
					} else {
						if ( $shares > 1000 ) {
							echo esc_html( $shares_rounded ) . ' ' . esc_html__( 'shares', 'authentic' );
						} else {
							/* translators: %s number of post views */
							echo esc_html( sprintf( _n( '%s share', '%s shares', $shares, 'authentic' ), $shares ) );
						}
					}
					?>
				</span>
			</span>
		<?php

		$output .= ob_get_clean();

		$output .= '</' . esc_html( $tag ) . '>';

		return $output;

	}
}
