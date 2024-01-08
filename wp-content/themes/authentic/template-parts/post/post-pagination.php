<?php
/**
 * The template part for displaying previous / next posts.
 *
 * @package Authentic
 */

$in_same_cat = get_theme_mod( 'post_pagination_current', false );

$previous_post = get_previous_post( $in_same_cat );
$next_post     = get_next_post( $in_same_cat );

// Return if there're no previous or next posts.
if ( ! ( $previous_post || $next_post ) ) {
	return;
}

$post_ids = array();

if ( $previous_post ) {
	$post_ids[] = $previous_post->ID;
}

if ( $next_post ) {
	$post_ids[] = $next_post->ID;
}

$args = array(
	'post__in'            => $post_ids,
	'order'               => 'ASC',
	'ignore_sticky_posts' => true,
);

// Add filter for the query.
$the_query = new WP_Query( apply_filters( 'csco_post_pagination_query_args', $args ) );

// Check if there're enough posts in the query.
if ( $the_query->have_posts() ) { ?>

	<?php do_action( 'csco_pagination_before' ); ?>

	<section class="posts-pagination">

		<?php
		while ( $the_query->have_posts() ) :
			$the_query->the_post();

			$class = '';
			$title = '';
			$icon  = '';

			if ( $previous_post && get_the_ID() === $previous_post->ID ) {
				$class = 'post-previous';
				$title = esc_html__( 'Previous Article', 'authentic' );
				$icon  = 'arrow-left';
			} elseif ( $next_post && get_the_ID() === $next_post->ID ) {
				$class = 'post-next';
				$title = esc_html__( 'Next Article', 'authentic' );
				$icon  = 'arrow-right';
			}
			?>

			<article class="post-pagination <?php echo esc_html( $class ); ?>">
				<a href="<?php the_permalink(); ?>" class="pagination-title"><?php echo esc_html( $title ); ?></a>
				<div class="pagination-content">
					<div class="overlay">
						<div class="overlay-media">
							<?php
							the_post_thumbnail( 'csco-560-landscape', array(
								'class' => 'jarallax-img',
							) );
							?>
						</div>
						<div class="overlay-outer">
							<div class="overlay-inner">
								<?php csco_get_post_meta( 'category' ); ?>
								<h4><?php the_title(); ?></h4>
								<?php csco_get_post_meta( array( 'date', 'author' ), false ); ?>
								<?php csco_the_read_more( 'button button-primary button-effect', $icon ); ?>
							</div>
						</div>
						<a href="<?php the_permalink(); ?>" class="overlay-link"></a>
					</div>
				</div>
			</article>

		<?php endwhile; ?>

	</section>

	<?php wp_reset_postdata(); ?>

	<?php do_action( 'csco_pagination_after' ); ?>

<?php
}