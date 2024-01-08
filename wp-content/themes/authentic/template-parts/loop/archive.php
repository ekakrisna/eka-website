<?php
/**
 * Post Archive
 *
 * The main archive template.
 * See all archive parts at template-parts/loop/
 *
 * @package Authentic
 */

echo '<div class="post-archive">';

do_action( 'csco_archive_start' );

if ( have_posts() ) {

	$type   = get_theme_mod( csco_get_archive_option( 'archive_type' ), 'standard' );
	$margin = get_theme_mod( csco_get_archive_option( 'reduce_margin' ), false );
	$class  = 'archive-main archive-' . $type;

	if ( $margin && 'standard' !== $type ) {
		$class .= ' archive-compact';
	}

	// Get archive class, containing number of columns for masonry and grid archives.
	if ( 'grid' === $type || 'masonry' === $type ) {
		$class .= ' columns-' . get_theme_mod( csco_get_archive_option( 'columns' ), 2 );
	}

	// Get total number of posts.
	$total = $wp_query->post_count;

	while ( have_posts() ) :
		the_post();

		// Start counting posts.
		$current = $wp_query->current_post + 1;


		// First standard post.
		if ( 1 === $current && get_theme_mod( csco_get_archive_option( 'first_post' ), true ) && 'standard' !== $type ) {
			// Get standard post content template part for the first post.
			echo '<div class="archive-first archive-standard">';
			get_template_part( 'template-parts/loop/content' );
			echo '</div>';
		}

		// Starting wrapper div.
		if ( 1 === $current && $total >= 1 ) {
			// Wrap post archive in a div.
			echo '<div class="' . esc_html( $class ) . '">';
			// Add columns for masonry layout.
			if ( 'masonry' === $type ) {
				echo '<div class="archive-col archive-col-1"></div>';
				echo '<div class="archive-col archive-col-2"></div>';
				if ( '3' <= get_theme_mod( csco_get_archive_option( 'columns' ), 2 ) ) {
					echo '<div class="archive-col archive-col-3"></div>';
				}
				if ( '4' === get_theme_mod( csco_get_archive_option( 'columns' ), 2 ) ) {
					echo '<div class="archive-col archive-col-4"></div>';
				}
			}
		}

		// All other posts.
		if ( ! ( 1 === $current && get_theme_mod( csco_get_archive_option( 'first_post' ), true ) && 'standard' !== $type ) ) {
			// Get content template part. See /inc/template-functions.php.
			csco_get_content_template( $current );
		}

		// Close wrapper div.
		if ( $current === $total && $total >= 1 ) {
			echo '</div>'; // .archive-main
		}
	endwhile;

	if ( $wp_query->max_num_pages > 1 ) {

		$paged = get_query_var( 'paged' );

		echo '<div class="archive-pagination">';

		if ( 'standard' === get_theme_mod( csco_get_archive_option( 'pagination_type' ), 'standard' ) || $paged > 1 ) {
			the_posts_pagination(
				array(
					'mid_size'  => 2,
					'prev_text' => esc_html__( 'Previous', 'authentic' ),
					'next_text' => esc_html__( 'Next', 'authentic' ),
				)
			);
		}

		echo '</div>'; // .archive-pagination

	}
} else {
	get_template_part( 'template-parts/loop/content', 'none' );
}

do_action( 'csco_archive_end' );

echo '</div>'; // .post-archive
