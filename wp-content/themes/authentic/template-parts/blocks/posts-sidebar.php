<?php
/**
 * Featured Posts Sidebar
 *
 * @package Authentic
 */

// Check if there're posts in the query.
if ( $posts->have_posts() ) {

	// Layout settings.
	$params = csco_get_layout_settings( $options, 'sidebar' );

	$heading_tag = 'h2';

	if ( isset( $params['typographyHeadingTag'] ) ) {
		$heading_tag = $params['typographyHeadingTag'];
	}

	$class_name = $attributes['canvasClassName'];

	$class_name .= sprintf( ' cnvs-block-posts-%s', $attributes['layout'] );

	if ( isset( $params['rounded'] ) && $params['rounded'] ) {
		$class_name .= ' is-cnvs-block-rounded';
	}
	?>
	<div class="cnvs-block-posts-sidebar <?php echo esc_attr( $class_name ); ?>">
		<div class="cnvs-block-posts-sidebar-inner">
			<ul class="cnvs-posts-list">
				<?php
				while ( $posts->have_posts() ) {
					$posts->the_post();
					?>
					<li class="cnvs-post-item">
						<?php
						if ( isset( $attributes['layout'] ) && 'sidebar-slider' === $attributes['layout'] ) {

							$thumbnail = 'csco-320-' . $params['orientation'];

							// Set orientation.
							$class = 'layout-size-large overlay ratio ratio-' . $params['orientation'];
							?>
							<article <?php post_class( $class ); ?>>
								<div class="overlay-media">
									<?php the_post_thumbnail( apply_filters( 'csco_block_thumbnail_size', $thumbnail, $attributes, -1 ) ); ?>
									<a href="<?php the_permalink(); ?>" class="overlay-link"></a>
								</div>
								<div class="overlay-outer">
									<div class="overlay-inner">
										<?php
										cnvs_block_post_meta( $params, 'category' );
										?>

										<<?php echo esc_html( $heading_tag ); ?> class="entry-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</<?php echo esc_html( $heading_tag ); ?>>

										<?php cnvs_block_post_meta( $params, array( 'date', 'author', 'comments', 'reading_time', 'views', 'shares' ) ); ?>

										<?php
										if ( isset( $params['showViewPostButton'] ) && $params['showViewPostButton'] ) {
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
						} else {
							switch ( $attributes['layout'] ) {
								case 'sidebar-large':
									$class = 'layout-size-medium';
									break;
								default:
									$class = 'layout-size-small';
									break;
							}
							?>
							<article <?php post_class( $class ); ?>>
								<div class="post-outer">
									<?php if ( has_post_thumbnail() ) { ?>
										<div class="post-inner">
											<a href="<?php the_permalink(); ?>" class="post-thumbnail">
												<?php
												$thumbnail = 'csco-320';

												if ( 'sidebar-list' === $attributes['layout'] ) {
													$thumbnail = 'csco-90-square';
												}

												if ( 'sidebar-numbered' === $attributes['layout'] ) {
													$thumbnail = 'csco-90-square';
												}

												if ( 'sidebar-large' === $attributes['layout'] ) {
													$thumbnail .= '-' . $params['orientation'];
												}

												the_post_thumbnail( apply_filters( 'csco_block_thumbnail_size', $thumbnail, $attributes, $posts->current_post ) );
												?>

												<?php if ( 'sidebar-numbered' === $attributes['layout'] ) : ?>
													<span class="post-number-wrap">
														<span class="post-number">
															<span><?php echo esc_html( $posts->current_post + 1 ); ?></span>
															<span><i class="cs-icon cs-icon-arrow-right"></i></span>
														</span>
													</span>
												<?php endif; ?>
											</a>
										</div>
									<?php } ?>

									<div class="post-inner">
										<?php
										cnvs_block_post_meta( $params, 'category' );
										?>

										<<?php echo esc_html( $heading_tag ); ?> class="entry-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</<?php echo esc_html( $heading_tag ); ?>>

										<?php cnvs_block_post_meta( $params, array( 'date', 'author', 'comments', 'reading_time', 'views', 'shares' ) ); ?>
									</div>
								</div>
							</article>
							<?php
						}
						?>
					</li>
					<?php
				}
				?>
			</ul>
		</div>
	</div>
	<?php
} else {
	cnvs_alert_warning( esc_html__( 'There aren\'t enough posts that match the filter criteria.', 'authentic' ) );
}
