<?php
/**
 * Block Full
 *
 * @var        $attributes - block attributes
 * @var        $options - layout options
 * @var        $posts - all available posts
 *
 * @package Authentic
 */

// Check if there're enough posts in the query.
if ( $posts->have_posts() ) {

	$page_wide = csco_is_wide_container();

	$current = 1;

	$posts->the_post();

	// Set default image size.
	$thumbnail = 'large';

	// Get type.
	$type = csco_get_type_of_full_by( $attributes['layout'], 1 );

	// Get orientation.
	$orientation = csco_get_orientation_of_full_by( $attributes['layout'], 1 );

	// Layout settings.
	$params = csco_get_layout_settings( $options, $type );

	$attr = null;

	// Set class.
	$image_class = 'overlay-media';
	$outer_class = 'post-outer';

	if ( has_post_thumbnail() ) {

		// Get required image size, depending on the horizontal tiles type.
		$dependencies = csco_block_get_sizes_dependencies( 'full' );

		// Get thumbnail size.
		$thumbnail = csco_block_get_thumbnail_size( $dependencies, 'layout-fullwidth', $attributes['canvasLocation'], $attributes['layout'], $type, $page_wide );

		// Thumbnail by orientation.
		$range = csco_range_image_orientation();

		$heading_tag = 'h2';

		if ( isset( $params['largeHeadingTag'] ) ) {
			$heading_tag = $params['largeHeadingTag'];
		}

		foreach ( $range as $item ) {
			if ( "csco-$item" === $thumbnail ) {
				$thumbnail .= '-' . $orientation;
				break;
			}
		}

		$outer_class .= ' overlay';

			// Check if Parallax is enabled.
		if ( get_theme_mod( 'effects_parallax', true ) ) {
			if ( isset( $params['parallax'] ) && $params['parallax'] ) {
				$image_class .= ' parallax';
			}
		}

			// Video.
		if ( isset( $params['video'] ) && $params['video'] ) {

			$video_bg = csco_get_video_background( 'any' );

			// Add Video Background attributes.
			if ( $video_bg ) {
				$image_class .= ' parallax-video';
				$attr        .= ' data-video="' . $video_bg['url'] . '"';
				$attr        .= ' data-start="' . $video_bg['start'] . '"';
				$attr        .= ' data-end="' . $video_bg['end'] . '"';
			}
		}
	}
	?>

	<div class="<?php echo esc_attr( $attributes['className'] ); ?>">

		<div class="cs-block-full <?php echo esc_html( $attributes['layout'] ); ?>">
			<div class="<?php echo esc_html( $image_class ); ?>" <?php echo (string) $attr; // XSS ok. ?>>
				<?php
				the_post_thumbnail(
					apply_filters( 'csco_block_thumbnail_size', $thumbnail, $attributes, $posts->current_post ), array(
						'class' => 'jarallax-img',
					)
				);
				?>
			</div>

			<div class="cs-container">

				<div class="full-outer">

					<div class="full-inner">

						<article <?php post_class( 'layout-size-large' ); ?>>

							<div class="<?php echo esc_html( $outer_class ); ?>">
								<div class="overlay-outer post-inner">
									<div class="overlay-inner">
										<?php
										// Post Category.
										if ( 'post' === get_post_type() ) {
											cnvs_block_post_meta( $params, array( 'category' ) );
										}
										?>

										<<?php echo esc_html( $heading_tag ); ?> class="entry-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</<?php echo esc_html( $heading_tag ); ?>>

										<?php
										// Post Meta.
										if ( 'post' === get_post_type() ) {
											cnvs_block_post_meta( $params, array( 'date', 'author', 'comments', 'reading_time', 'views', 'shares' ) );
										}
										?>

										<?php
										if ( 1 === $current && isset( $params['showExcerpt'] ) && $params['showExcerpt'] ) {

											$content = csco_get_the_excerpt( (int) $params['metaExcerptLength'] );

											if ( $content ) {
												?>
												<div class="post-excerpt">
													<?php echo esc_html( $content ); ?>
												</div>
												<?php
											}
										}
										?>

										<?php
										if ( 1 === $current && isset( $params['showViewPostButton'] ) && $params['showViewPostButton'] ) {
											?>
											<div class="view-post-button">
												<?php csco_print_gutenberg_blocks_button( apply_filters( 'csco_label_readmore', $params['buttonLabel'] ), get_permalink(), '', 'button', $params, ' button-effect' ); ?>
											</div>
											<?php
										}
										?>
									</div>
								</div>
							</div>
						</article>
					</div>

					<div class="full-inner">
						<?php
						while ( $posts->have_posts() ) {

							$posts->the_post();

							$current++;

							// Set default image size.
							$thumbnail = 'large';

							// Get type.
							$type = csco_get_type_of_full_by( $attributes['layout'], $current );

							// Get orientation.
							$orientation = csco_get_orientation_of_full_by( $attributes['layout'], $current );

							// Get required image size, depending on the horizontal tiles type.
							$dependencies = csco_block_get_sizes_dependencies( 'full' );

							// Get thumbnail size.
							$thumbnail = csco_block_get_thumbnail_size( $dependencies, $attributes['canvasLocation'], $attributes['layout'], $type, $page_wide );

							// Layout settings.
							$params = csco_get_layout_settings( $options, $type );

							// Thumbnail by orientation.
							$range = csco_range_image_orientation();

							$heading_tag = 'h2';

							if ( isset( $params['smallHeadingTag'] ) ) {
								$heading_tag = $params['smallHeadingTag'];
							}

							foreach ( $range as $item ) {
								if ( "csco-$item" === $thumbnail ) {
									$thumbnail .= '-' . $orientation;
									break;
								}
							}
							?>
							<article <?php post_class( 'layout-size-small' ); ?>>

								<div class="<?php echo esc_html( $outer_class ); ?>">

									<?php if ( has_post_thumbnail() ) { ?>
										<div class="overlay-inner">
											<div class="post-thumbnail">
												<?php the_post_thumbnail( apply_filters( 'csco_block_thumbnail_size', $thumbnail, $attributes, $posts->current_post ) ); ?>

												<a href="<?php the_permalink(); ?>"></a>
											</div>
										</div>
									<?php } ?>

									<div class="overlay-inner">

										<header class="entry-header">
											<?php
											// Post Category.
											cnvs_block_post_meta( $params, 'category' );
											?>

											<<?php echo esc_html( $heading_tag ); ?> class="entry-title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</<?php echo esc_html( $heading_tag ); ?>>

											<?php
											// Post Meta.
											cnvs_block_post_meta( $params, array( 'date', 'author', 'comments', 'reading_time', 'views', 'shares' ) );
											?>
										</header>
									</div>
								</div>
							</article>
							<?php
						}
						?>
					</div>
				</div>

			</div>

			<?php wp_reset_postdata(); ?>

		</div>

	</div>

	<?php
} else {
	cnvs_alert_warning( esc_html__( 'There aren\'t enough posts that match the filter criteria.', 'authentic' ) );
}
