<?php
/**
 * Post Archive
 *
 * The main archive template.
 * See all archive parts at template-parts/loop/
 *
 * @package Authentic
 */

// Check if there're posts in the query.
if ( $posts->have_posts() ) {

	$archive_id = uniqid();

	$attributes['page_layout'] = csco_get_page_layout();
	$attributes['is_wide']     = csco_is_wide_container();

	$class_name = $attributes['canvasClassName'];

	$first_post    = isset( $options['firstPost'] ) ? $options['firstPost'] : true;
	$reduce_margin = isset( $options['reduceMargin'] ) ? $options['reduceMargin'] : false;
	$columns       = isset( $options['columns'] ) ? $options['columns'] : '2';

	// Pagination type.
	$pagination_type = 'none';

	if ( isset( $options['paginationTypeAlt'] ) && $options['paginationTypeAlt'] ) {
		$pagination_type = $options['paginationTypeAlt'];
	}

	if ( isset( $options['paginationType'] ) && $options['paginationType'] ) {
		$pagination_type = $options['paginationType'];
	}

	// Load more data.
	$load_more_data = null;

	if ( 'ajax' === $pagination_type || 'infinite' === $pagination_type ) {

		if ( $posts->max_num_pages > 1 ) {

			if ( 'infinite' === $pagination_type ) {
				$posts->infinite = true;
			} else {
				$posts->infinite = false;
			}

			// Theme data.
			$data = array(
				'infinite_load' => $posts->infinite,
				'query_vars'    => $posts->query,
			);

			$args = csco_get_load_more_args( $data, $attributes, $options );

			// Set archive count.
			$args['posts_per_page'] = $options['archivePostsCount'];

			$load_more_data = cnvs_encode_data( $args );
		}
	}
	?>

<div class="cs-block-archive-posts <?php echo esc_attr( $class_name ); ?>" data-layout="<?php echo esc_attr( $attributes['layout'] ); ?>">

	<div class="post-archive" data-archive-data="<?php echo esc_attr( $load_more_data ); ?>">
		<?php
		$class = 'archive-main archive-' . $attributes['layout'];

		if ( $reduce_margin && 'standard' !== $attributes['layout'] ) {
			$class .= ' archive-compact';
		}

		// Get archive class, containing number of columns for masonry and grid archives.
		if ( 'grid' === $attributes['layout'] || 'masonry' === $attributes['layout'] ) {
			$class .= ' columns-' . $columns;
		}

		// Get total number of posts.
		$total = $posts->post_count;

		while ( $posts->have_posts() ) :
			$posts->the_post();

			// Start counting posts.
			$current = $posts->current_post + 1;

			// First standard post.
			if ( 1 === $current && $first_post && 'standard' !== $attributes['layout'] ) {

				$first_attributes = $attributes;

				$first_attributes['layout'] = 'standard';

				$first_options = $options;

				$first_options['current_post'] = $posts->current_post;

				set_query_var( 'attributes', $first_attributes );
				set_query_var( 'options', $first_options );

				// Get standard post content template part for the first post.
				echo '<div class="archive-first archive-standard">';

				get_template_part( 'template-parts/blocks/content' );

				echo '</div>';
			}

			// Starting wrapper div.
			if ( 1 === $current && $total >= 1 ) {
				// Wrap post archive in a div.
				echo '<div class="' . esc_html( $class ) . '">';
				// Add columns for masonry layout.
				if ( 'masonry' === $attributes['layout'] ) {

					echo '<div class="archive-col archive-col-1"></div>';
					echo '<div class="archive-col archive-col-2"></div>';

					if ( 3 <= (int) $columns ) {
						echo '<div class="archive-col archive-col-3"></div>';
					}
					if ( 4 === (int) $columns ) {
						echo '<div class="archive-col archive-col-4"></div>';
					}
				}
			}

			// All other posts.
			if ( ! ( 1 === $current && $first_post && 'standard' !== $attributes['layout'] ) ) {

				$options['current_post'] = $posts->current_post;

				set_query_var( 'attributes', $attributes );
				set_query_var( 'options', $options );

				csco_get_block_content_template( $current );
			}

			// Close wrapper div.
			if ( $current === $total && $total >= 1 ) {
				echo '</div>';
			}
		endwhile;

		if ( 'none' !== $pagination_type ) {

			if ( $posts->max_num_pages > 1 ) {

				echo '<div class="archive-pagination">';

				if ( 'standard' === $pagination_type ) {
					$total_pages = $posts->max_num_pages;

					$current_page = max( 1, get_query_var( 'paged' ) );

					$base_url = cnvs_get_block_posts_page_url( $attributes );

					if ( $base_url ) {
						echo '<nav class="navigation pagination" role="navigation">';
							echo '<h2 class="screen-reader-text">' . esc_html__( 'Posts navigation', 'authentic' ) . '</h2>';
							echo '<div class="nav-links">';
								echo cnvs_paginate_links(
									array(
										'base'             => $base_url,
										'format'           => '%#%',
										'current'          => $current_page,
										'total'            => $total_pages,
										'prev_text'        => esc_html__( 'Previous', 'authentic' ),
										'next_text'        => esc_html__( 'Next', 'authentic' ),
										'merge_query_vars' => false,
									)
								); // XSS.
							echo '</div>';
						echo '</nav>';
					} else {
						cnvs_alert_warning( esc_html__( 'Please select a page for your blog posts in Settings &rarr; Reading to display pagination.', 'authentic' ) );
					}
				}

				echo '</div>';
			}
		}
		?>
	</div>

</div>
	<?php
} else {
	cnvs_alert_warning( esc_html__( 'There aren\'t enough posts that match the filter criteria.', 'authentic' ) );
}
