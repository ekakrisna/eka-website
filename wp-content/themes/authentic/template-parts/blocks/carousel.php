<?php
/**
 * Block Carousel
 *
 * @var        $attributes - block attributes
 * @var        $options - layout options
 * @var        $posts - all available posts
 *
 * @package Authentic
 */

// Check if there're posts in the query.
if ( $posts->have_posts() ) {

	$page_wide = csco_is_wide_container();

	// Layout settings.
	$params = csco_get_layout_settings( $options, 'carousel' );

	// Set subtype.
	$subtype = $params['columns'];

	// Set location.
	$location = $attributes['canvasLocation'];

	// Orientation.
	$orientation = isset( $params['thumbnailOrientation'] ) ? $params['thumbnailOrientation'] : 'original';

	// Get required image size, depending on the tiles type.
	$dependencies = csco_block_get_sizes_dependencies( 'carousel' );

	// Get thumbnail size.
	$thumbnail = csco_block_get_thumbnail_size( $dependencies, $location, 'carousel', $params['columns'], $page_wide, $orientation );

	$heading_tag = 'h2';

	if ( isset( $params['typographyHeadingTag'] ) ) {
		$heading_tag = $params['typographyHeadingTag'];
	}
	?>
	<div class="<?php echo esc_attr( $attributes['className'] ); ?>">

		<div class="cs-block-carousel">

			<div class="slider-container slider-loop" data-columns="<?php echo esc_attr( $params['columns'] ); ?>">
				<div class="owl-carousel">
					<?php
					while ( $posts->have_posts() ) :
						$posts->the_post();
						?>
						<article <?php post_class( 'layout-size-large' ); ?>>
							<div class="post-thumbnail">
								<?php
								the_post_thumbnail(
									apply_filters( 'csco_block_thumbnail_size', $thumbnail, $attributes, $posts->current_post ),
									array(
										'class' => 'size-carousel',
									)
								);
								?>

								<?php
								if ( isset( $params['showViewPostLink'] ) && $params['showViewPostLink'] ) {
									?>
									<div class="post-more">
										<a href="<?php the_permalink(); ?>" class="button-link">
											<span><?php echo esc_html( apply_filters( 'csco_label_readmore', $params['viewLabel'] ) ); ?></span>
										</a>
									</div>
									<?php
								}
								?>

								<?php
								if ( 'post' === get_post_type() ) {
									cnvs_block_post_meta( $params, array( 'reading_time', 'views' ), true, true );
								}
								?>
								<a href="<?php the_permalink(); ?>"></a>
							</div>

							<?php
							// Post Category.
							if ( 'post' === get_post_type() ) {
								cnvs_block_post_meta( $params, 'category' );
							}
							?>

							<<?php echo esc_html( $heading_tag ); ?> class="entry-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</<?php echo esc_html( $heading_tag ); ?>>

							<?php
							// Post Meta.
							if ( 'post' === get_post_type() ) {
								cnvs_block_post_meta( $params, array( 'date', 'author', 'comments', 'shares' ) );
							}
							?>

							<?php
							if ( isset( $params['showExcerpt'] ) && $params['showExcerpt'] ) {

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
							if ( isset( $params['showViewPostButton'] ) && $params['showViewPostButton'] ) {
								?>
								<div class="view-post-button">
									<?php csco_print_gutenberg_blocks_button( apply_filters( 'csco_label_readmore', $params['buttonLabel'] ), get_permalink(), '', 'button', $params, ' button-effect' ); ?>
								</div>
								<?php
							}
							?>
						</article>
					<?php endwhile; ?>
				</div>
				<div class="owl-dots"></div>
			</div>

			<?php wp_reset_postdata(); ?>

		</div>

	</div>

	<?php
} else {
	cnvs_alert_warning( esc_html__( 'There aren\'t enough posts that match the filter criteria.', 'authentic' ) );
}
