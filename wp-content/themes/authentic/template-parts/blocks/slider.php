<?php
/**
 * Block Slider
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
	$params = csco_get_layout_settings( $options, 'slider' );

	// Get required image size, depending on the slider type.
	$dependencies = csco_block_get_sizes_dependencies( 'slider' );

	// Set subtype.
	$subtype = 'slider-multiple' === $attributes['layout'] ? $params['visible'] : null;

	// Set location.
	$location = $attributes['canvasLocation'];

	// Get thumbnail size.
	$thumbnail = csco_block_get_thumbnail_size( $dependencies, $location, $attributes['layout'], $subtype, $page_wide );

	$heading_tag = 'h2';

	if ( isset( $params['typographyHeadingTag'] ) ) {
		$heading_tag = $params['typographyHeadingTag'];
	}

	// Class.
	$slider_class = 'cs-block-slider-container cs-block-slider-featured cs-block-' . $attributes['layout'];

	// Attrs.
	$slider_attr  = ' data-autoplay="' . intval( $params['autoplay'] ) . '"';
	$slider_attr .= ' data-timeout="' . intval( $params['timeout'] ) . '"';

	// Slider multiple.
	if ( 'slider-multiple' === $attributes['layout'] ) {
		$slider_attr .= ' data-slides-visible="' . intval( $params['visible'] ) . '"';
	}

	// Slider center.
	if ( 'slider-center' === $attributes['layout'] || 'slider-multiple' === $attributes['layout'] ) {
		$slider_attr .= ' data-padding="' . intval( $params['padding'] ) . '"';
	}
	?>
	<div class="<?php echo esc_attr( $attributes['className'] ); ?>">

		<section class="cs-block-section-slider cs-block-section-<?php echo esc_html( $attributes['layout'] ); ?>">

			<div class="<?php echo esc_html( $slider_class ); ?>" <?php echo (string) $slider_attr; // XSS. ?>>
				<div class="owl-carousel">
					<?php
					while ( $posts->have_posts() ) {
						$posts->the_post();

						$class = 'post-outer overlay';
						$attr  = '';

						if ( has_post_thumbnail() ) {
							// Enable Parallax.
							if ( $params['parallax'] ) {
								$class .= ' slide-parallax';
							}

							if ( $params['video'] ) {
								$video_bg = csco_get_video_background( 'any' );

								// Enable Video Background.
								if ( $video_bg ) {
									$class .= ' slide-video';
									$attr  .= ' data-video="' . $video_bg['url'] . '"';
									$attr  .= ' data-start="' . $video_bg['start'] . '"';
									$attr  .= ' data-end="' . $video_bg['end'] . '"';
								}
							}
						}
						?>
						<article <?php post_class( 'layout-size-large' ); ?>>

							<div class="<?php echo esc_html( $class ); ?>"<?php echo (string) $attr; // XSS ok. ?>>
									<div class="overlay-media">
										<?php
										the_post_thumbnail(
											apply_filters( 'csco_post_slider_thumbnail_size', apply_filters( 'csco_block_thumbnail_size', $thumbnail, $attributes, $posts->current_post ) ),
											array(
												'class' => 'jarallax-img',
											)
										);
										?>
										<a href="<?php the_permalink(); ?>" class="overlay-link"></a>
									</div>
									<div class="overlay-outer post-inner">
										<div class="overlay-inner">

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
												cnvs_block_post_meta( $params, array( 'date', 'author', 'comments', 'reading_time', 'views', 'shares' ) );
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
										</div>
									</div>
							</div>

						</article>
						<?php
					}
					?>
				</div>

				<div class="owl-arrows"></div>
				<div class="owl-dots"></div>
			</div>
		</section>
	</div>
	<?php
} else {
	cnvs_alert_warning( esc_html__( 'There aren\'t enough posts that match the filter criteria.', 'authentic' ) );
}
