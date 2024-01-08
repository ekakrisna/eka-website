<?php
/**
 * Post Tiles
 *
 * @package Authentic
 */

$settings = csco_get_post_section_vars( 'tiles' );
$layout   = apply_filters( 'csco_post_tiles_layout', $settings['layout'] );
$args     = csco_get_post_source_query_vars( $settings );

// Add filter for the query.
$the_query = new WP_Query( apply_filters( 'csco_tiles_query_args', $args ) );

// Check if there're enough posts in the query.
if ( $the_query->have_posts() ) { ?>

	<?php do_action( 'csco_tiles_before' ); ?>

	<section class="section-tiles tiles-<?php echo esc_html( $layout ); ?>">
		<div class="cs-container">
			<div class="tiles-outer">

				<?php
				while ( $the_query->have_posts() ) :
					$the_query->the_post();

					$current = $the_query->current_post + 1;

					if ( in_array( $layout, array( '1', '2', '9' ), true ) || 1 === $current ) {
						$tile = 'primary';
					} else {
						$tile = 'secondary';
					}

					$outer_class = 'post-outer';
					$image_class = 'overlay-media';
					$post_class  = 'tile-' . $tile;
					$attr        = '';
					$thumbnail   = '';

					if ( has_post_thumbnail() ) {

						$outer_class .= ' overlay';

						$video_bg = csco_get_video_background( 'tiles' );

						// Add Video Background attributes.
						if ( $video_bg ) {
							$image_class .= ' parallax-video';
							$attr        .= ' data-video="' . $video_bg['url'] . '"';
							$attr        .= ' data-start="' . $video_bg['start'] . '"';
							$attr        .= ' data-end="' . $video_bg['end'] . '"';
						}

						$orientation = 'landscape';

						// Check orientation for layout.
						if ( '2' === $layout ) {
							$orientation = 'portrait';
						}

						if ( '3' === $layout && 2 === $current ) {
							$orientation = 'portrait';
						}

						// Check if Parallax is enabled.
						if ( $settings['parallax'] && get_theme_mod( 'effects_parallax', true ) ) {
							$image_class .= ' parallax';
							$orientation  = 'square';
						}

						if ( csco_is_wide_container() ) {
							if ( '1' === $layout ) {
								$thumbnail = 'csco-800';
							} elseif ( '2' === $layout ) {
								$thumbnail = 'csco-560-' . $orientation;
							} elseif ( '3' === $layout && 'primary' === $tile ) {
								$thumbnail = 'csco-1160';
							} elseif ( '3' === $layout && 'secondary' === $tile ) {
								$thumbnail = 'csco-560-' . $orientation;
							} elseif ( '4' === $layout && 'primary' === $tile ) {
								$thumbnail = 'csco-1160';
							} elseif ( '4' === $layout && 'secondary' === $tile ) {
								$thumbnail = 'csco-560-' . $orientation;
							} elseif ( '5' === $layout ) {
								$thumbnail = 'csco-800';
							} elseif ( '6' === $layout && 'primary' === $tile ) {
								$thumbnail = 'csco-1160';
							} elseif ( '6' === $layout && 'secondary' === $tile ) {
								$thumbnail = 'csco-560-' . $orientation;
							} elseif ( '7' === $layout && 'primary' === $tile ) {
								$thumbnail = 'csco-800';
							} elseif ( '7' === $layout && 'secondary' === $tile ) {
								$thumbnail = 'csco-560-' . $orientation;
							} elseif ( '8' === $layout && 'primary' === $tile ) {
								$thumbnail = 'csco-800';
							} elseif ( '8' === $layout && 'secondary' === $tile ) {
								$thumbnail = 'csco-560-' . $orientation;
							} elseif ( '9' === $layout ) {
								$thumbnail = 'csco-560-' . $orientation;
							}
						} else {
							if ( '1' === $layout ) {
								$thumbnail = 'csco-560-' . $orientation;
							} elseif ( '2' === $layout ) {
								$thumbnail = 'csco-560-' . $orientation;
							} elseif ( '3' === $layout && 'primary' === $tile ) {
								$thumbnail = 'csco-800';
							} elseif ( '3' === $layout && 'secondary' === $tile ) {
								$thumbnail = 'csco-560-' . $orientation;
							} elseif ( '4' === $layout && 'primary' === $tile ) {
								$thumbnail = 'csco-800';
							} elseif ( '4' === $layout && 'secondary' === $tile ) {
								$thumbnail = 'csco-560-' . $orientation;
							} elseif ( '4' === $layout && 'primary' === $tile ) {
								$thumbnail = 'csco-800';
							} elseif ( '4' === $layout && 'secondary' === $tile ) {
								$thumbnail = 'csco-560-' . $orientation;
							} elseif ( '5' === $layout ) {
								$thumbnail = 'csco-560-' . $orientation;
							} elseif ( '6' === $layout && 'primary' === $tile ) {
								$thumbnail = 'csco-800';
							} elseif ( '6' === $layout && 'secondary' === $tile ) {
								$thumbnail = 'csco-560-' . $orientation;
							} elseif ( '7' === $layout && 'primary' === $tile ) {
								$thumbnail = 'csco-560-' . $orientation;
							} elseif ( '7' === $layout && 'secondary' === $tile ) {
								$thumbnail = 'csco-320-' . $orientation;
							} elseif ( '8' === $layout && 'primary' === $tile ) {
								$thumbnail = 'csco-560-' . $orientation;
							} elseif ( '8' === $layout && 'secondary' === $tile ) {
								$thumbnail = 'csco-320-' . $orientation;
							} elseif ( '9' === $layout ) {
								$thumbnail = 'csco-320-' . $orientation;
							}
						}
					}
					?>

					<article <?php post_class( $post_class ); ?>>

						<div class="<?php echo esc_html( $outer_class ); ?>">
							<div class="<?php echo esc_html( $image_class ); ?>" <?php echo (string) $attr; // XSS ok. ?>>
								<?php
								the_post_thumbnail( apply_filters( 'csco_post_tiles_thumbnail_size', $thumbnail ), array(
									'class' => 'jarallax-img',
								) );
								?>
								<a href="<?php the_permalink(); ?>" class="overlay-link"></a>
							</div>
							<div class="overlay-outer post-inner">
								<div class="overlay-inner">

									<?php
									// Post Category.
									if ( 'post' === get_post_type() && $settings['meta_cat'] ) {
										csco_get_post_meta( 'category' );
									}
									?>
									<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

									<?php
									// Post Meta.
									if ( 'post' === get_post_type() ) {
										if ( ! $settings['meta'] ) {
											csco_get_post_meta( array(), false );
										} else {
											csco_get_post_meta( array( 'date', 'author' ), false );
										}
									}
									?>

									<?php
									// More Button.
									if ( $settings['button'] ) {
										csco_the_read_more( 'button button-primary button-effect ' );
									}
									?>

								</div>
							</div>
						</div>
					</article>

				<?php endwhile; ?>
			</div>

			<?php wp_reset_postdata(); ?>
		</div>
	</section>

	<?php do_action( 'csco_tiles_after' ); ?>

<?php
}
