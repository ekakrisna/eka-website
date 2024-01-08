<?php
/**
 * Post Carousel
 *
 * @package Authentic
 */

$settings = csco_get_post_section_vars( 'carousel' );

if ( is_single() ) {
	$post_meta = array( 'date' );
} else {
	$post_meta = array( 'date', 'author' );
}

$title = $settings['title'];

$orientation = $settings['orientation'];
$page_wide   = csco_is_wide_container();

if ( is_single() ) {
	$columns = 3;
} else {
	$columns = 4;
}

$columns = apply_filters( 'csco_carousel_columns', $columns );

$args = csco_get_post_source_query_vars( $settings );

if ( $page_wide ) {
	$thumbnail = 'csco-560-' . $orientation;
} else {
	$thumbnail = 'csco-320-' . $orientation;
}

// Add filter for the query.
$the_query = new WP_Query( apply_filters( 'csco_carousel_query_args', $args ) );

// Check if there're posts in the query.
if ( $the_query->have_posts() ) { ?>

	<?php do_action( 'csco_carousel_before' ); ?>

	<section class="section-carousel">
		<?php
		if ( 'csco_header_after' === current_filter() ) {
			?>
		<div class="cs-container">

		<?php } ?>

			<?php csco_section_heading( $title ); ?>

			<div class="slider-container slider-loop" data-columns="<?php echo intval( $columns ); ?>">
				<div class="owl-carousel">
					<?php
					while ( $the_query->have_posts() ) :
						$the_query->the_post();
						?>
						<article <?php post_class(); ?>>
							<div class="post-thumbnail">
								<?php
								the_post_thumbnail(
									$thumbnail, array(
										'class' => 'size-carousel',
									)
								);
								csco_the_read_more( 'button-link', null );
								if ( 'post' === get_post_type() && ! is_single() ) {
									csco_get_post_meta( array( 'reading_time', 'views' ), true );
								}
								?>
								<a href="<?php the_permalink(); ?>"></a>
							</div>
							<?php
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
						</article>
					<?php endwhile; ?>
				</div>
				<div class="owl-dots"></div>
			</div>

			<?php wp_reset_postdata(); ?>
		<?php
		if ( 'csco_header_after' === current_filter() ) {
			?>
		</div>
		<?php } ?>
	</section>

	<?php do_action( 'csco_carousel_after' ); ?>

	<?php
}
