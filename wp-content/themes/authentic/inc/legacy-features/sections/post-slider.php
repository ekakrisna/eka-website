<?php
/**
 * Post Slider
 *
 * @package Authentic
 */

$settings    = csco_get_post_section_vars( 'slider' );
$slider_type = apply_filters( 'csco_post_slider_type', $settings['slider_type'] );

// Get required image size, depending on the slider type.
if ( 'center' === $slider_type || 'boxed' === $slider_type ) {
	if ( csco_is_wide_container() ) {
		$thumbnail = 'csco-1920';
	} else {
		$thumbnail = 'csco-1160';
	}
} elseif ( 'large' === $slider_type ) {
	$thumbnail = 'csco-1920';
} elseif ( 'multiple' === $slider_type ) {
	if ( '2' === $settings['visible'] ) {
		$thumbnail = 'csco-1160';
	} elseif ( '3' === $settings['visible'] ) {
		$thumbnail = 'csco-800';
	} elseif ( '4' ) {
		$thumbnail = 'csco-560-portrait';
	}
} elseif ( 'wide' === $slider_type ) {
	$thumbnail = 'csco-1920';
} else {
	$thumbnail = 'csco-1160';
}

$slider_class = 'slider-container slider-featured slider-' . $slider_type;
$slider_attr  = 'data-autoplay="' . intval( $settings['autoplay'] ) . '"';
$slider_attr .= ' data-timeout="' . intval( $settings['timeout'] ) . '"';

$more_class = 'button button-primary button-effect';

if ( 'multiple' === $slider_type ) {
	$slider_attr .= ' data-slides-visible="' . intval( $settings['visible'] ) . '"';
}

if ( 'large' === $slider_type ) {
	$more_class .= ' btn-lg';
}

if ( 'center' === $slider_type || 'multiple' === $slider_type ) {
	$slider_attr .= ' data-padding="' . intval( $settings['padding'] ) . '"';
}

if ( 'wide' === $slider_type ) {
	$slider_class .= ' slider-boxed';
}

$args = csco_get_post_source_query_vars( $settings );

// Add filter for the post slider query.
$the_query = new WP_Query( apply_filters( 'csco_slider_query_args', $args ) );

// Check if there're enough posts in the query.
if ( $the_query->have_posts() ) { ?>

	<?php do_action( 'csco_slider_before' ); ?>

	<section class="section-slider slider-section-<?php echo esc_html( $slider_type ); ?>">
		<div class="<?php echo esc_html( $slider_class ); ?>" <?php echo (string) $slider_attr; ?>>

			<div class="owl-carousel">
				<?php
				while ( $the_query->have_posts() ) :
					$the_query->the_post();

					$class = 'post-outer overlay';
					$attr  = '';

					if ( has_post_thumbnail() ) {

						// Enable Parallax.
						if ( $settings['parallax'] ) {
							$class .= ' slide-parallax';
						}

						$video_bg = csco_get_video_background( 'slider' );

						// Enable Video Background.
						if ( $video_bg ) {
							$class .= ' slide-video';
							$attr  .= ' data-video="' . $video_bg['url'] . '"';
							$attr  .= ' data-start="' . $video_bg['start'] . '"';
							$attr  .= ' data-end="' . $video_bg['end'] . '"';
						}
					}
					?>

					<article <?php post_class(); ?>>

						<div class="<?php echo esc_html( $class ); ?>"<?php echo (string) $attr; // XSS ok. ?>>
							<div class="overlay-media">
								<?php
								the_post_thumbnail( apply_filters( 'csco_post_slider_thumbnail_size', $thumbnail ), array(
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
										csco_the_read_more( $more_class );
									}
									?>

								</div>
							</div>
						</div>

					</article>

				<?php endwhile; ?>
			</div>

			<div class="owl-arrows"></div>
			<div class="owl-dots"></div>

		</div>
	</section>

	<?php wp_reset_postdata(); ?>

	<?php do_action( 'csco_slider_after' ); ?>

<?php
}
