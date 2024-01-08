<?php
/**
 * Block Narrow
 *
 * @var        $attributes - block attributes
 * @var        $options - layout options
 * @var        $posts - all available posts
 *
 * @package Authentic
 */

$page_wide = csco_is_wide_container();

// Check if there're enough posts in the query.
if ( $posts->have_posts() ) {

	$page_wide = csco_is_wide_container();
	?>

	<div class="<?php echo esc_attr( $attributes['className'] ); ?>">

		<div class="cs-block-narrow <?php echo esc_html( $attributes['layout'] ); ?>">

			<div class="narrow-outer">

				<?php
				$current = 0;

				while ( $posts->have_posts() ) {
					$posts->the_post();

					$current++;

					// Set default image size.
					$thumbnail = 'large';

					// Check meta.
					$meta = csco_check_meta_of_narrow_by( $attributes['layout'], $current );

					// Check excerpt.
					$excerpt = csco_check_excerpt_of_narrow_by( $attributes['layout'], $current );

					// Check button.
					$button = csco_check_button_of_narrow_by( $attributes['layout'], $current );

					// Get type.
					$type = csco_get_type_of_narrow_by( $attributes['layout'], $current );

					// Get size.
					$size = csco_get_size_of_narrow_by( $attributes['layout'], $current );

					// Get variation.
					$variation = csco_get_variation_of_narrow_by( $attributes['layout'], $current );

					// Get orientation.
					$orientation = csco_get_orientation_of_narrow_by( $attributes['layout'], $current );

					// Get typography.
					$typography = csco_get_typography_of_narrow_by( $attributes['layout'], $current );

					// Layout settings.
					$params = csco_get_layout_settings( $options, $type );

					// Class name.
					$post_class  = ' layout-type-' . $type;
					$post_class .= ' layout-size-' . $size;
					$post_class .= ' layout-variation-' . $variation;
					$post_class .= ' layout-typography-' . $typography;

					$heading_tag = 'h2';

					if ( isset( $params[ $typography . 'HeadingTag' ] ) ) {
						$heading_tag = $params[ $typography . 'HeadingTag' ];
					}

					if ( has_post_thumbnail() ) {

						// Get required image size, depending on the narrow type.
						$dependencies = csco_block_get_sizes_dependencies( 'narrow' );

						// Get thumbnail size.
						$thumbnail = csco_block_get_thumbnail_size( $dependencies, $attributes['canvasLocation'], $attributes['layout'], $type, $page_wide );

						// Thumbnail by orientation.
						$range = csco_range_image_orientation();

						foreach ( $range as $item ) {
							if ( "csco-$item" === $thumbnail ) {
								$thumbnail .= '-' . $orientation;
								break;
							}
						}
					}

					csco_before_hook_narrow_by( $attributes['layout'], $current );

					if ( 'tile' === $variation ) {
						$attr = null;

						// Set class.
						$image_class = 'overlay-media';
						$outer_class = 'post-outer';

						if ( has_post_thumbnail() ) {
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
						<article <?php post_class( $post_class ); ?>>

							<div class="<?php echo esc_html( $outer_class ); ?>">
								<div class="<?php echo esc_html( $image_class ); ?>" <?php echo (string) $attr; // XSS ok. ?>>
									<?php
									the_post_thumbnail(
										apply_filters( 'csco_block_thumbnail_size', $thumbnail, $attributes, $posts->current_post ), array(
											'class' => 'jarallax-img',
										)
									);
									?>
								</div>

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
										if ( $excerpt && isset( $params['showExcerpt'] ) && $params['showExcerpt'] ) {

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
										if ( $button && isset( $params['showViewPostButton'] ) && $params['showViewPostButton'] ) {
											?>
											<div class="view-post-button">
												<?php csco_print_gutenberg_blocks_button( apply_filters( 'csco_label_readmore', $params['buttonLabel'] ), get_permalink(), '', 'button', $params, ' button-effect' ); ?>
											</div>
											<?php
										}
										?>
									</div>
								</div>

								<a href="<?php the_permalink(); ?>" class="overlay-link"></a>
							</div>
						</article>
						<?php
					} else {
						?>
						<article <?php post_class( $post_class ); ?>>

							<div class="post-outer">
								<?php if ( has_post_thumbnail() ) { ?>
									<div class="post-inner">
										<div class="post-thumbnail">
											<?php the_post_thumbnail( apply_filters( 'csco_block_thumbnail_size', $thumbnail, $attributes, $posts->current_post ) ); ?>

											<?php
											if ( $meta['image'] && isset( $params['showViewPostLink'] ) && $params['showViewPostLink'] ) {
												?>
												<div class="post-more">
													<a href="<?php the_permalink(); ?>" class="button-link">
														<span><?php echo esc_html( apply_filters( 'csco_label_readmore', $params['viewLabel'] ) ); ?></span>
													</a>
												</div>
												<?php
											}
											?>

											<?php cnvs_block_post_meta( $params, $meta['image'], true, true ); ?>

											<a href="<?php the_permalink(); ?>"></a>
										</div>
									</div>
								<?php } ?>

								<div class="post-inner">

									<header class="entry-header">
										<?php
										// Post Category.
										cnvs_block_post_meta( $params, $meta['top'] );
										?>

										<<?php echo esc_html( $heading_tag ); ?> class="entry-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</<?php echo esc_html( $heading_tag ); ?>>

										<?php
										// Post Meta.
										cnvs_block_post_meta( $params, $meta['bottom'] );
										?>
									</header>

									<?php
									if ( $excerpt && isset( $params['showExcerpt'] ) && $params['showExcerpt'] ) {

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
									if ( $button && isset( $params['showViewPostButton'] ) && $params['showViewPostButton'] ) {
										?>
										<div class="view-post-button">
											<?php csco_print_gutenberg_blocks_button( apply_filters( 'csco_label_readmore', $params['buttonLabel'] ), get_permalink(), '', 'button', $params, ' button-effect' ); ?>
										</div>
										<?php
									}
									?>
								</div>
							</div>
						</article>
						<?php
					}

					csco_after_hook_narrow_by( $attributes['layout'], $current );
				}
				?>
			</div>

			<?php wp_reset_postdata(); ?>

		</div>

	</div>

	<?php
} else {
	cnvs_alert_warning( esc_html__( 'There aren\'t enough posts that match the filter criteria.', 'authentic' ) );
}
