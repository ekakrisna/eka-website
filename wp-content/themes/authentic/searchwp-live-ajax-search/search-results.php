<?php
/**
 * Search results template for SearchWP Live Ajax Search
 *
 * @package Authentic
 */

?>

<?php if ( have_posts() ) : ?>
	<?php
	while ( have_posts() ) :
		the_post();
		$post_type        = get_post_type();
		$post_type_object = get_post_type_object( $post_type );
		?>
		<div class="searchwp-live-search-result" role="option" id="" aria-selected="false">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php the_post_thumbnail( 'thumbnail' ); ?>
				<span>
					<span class="h6"><?php the_title(); ?></span>
				</span>
				<small><?php echo esc_html( $post_type_object->labels->singular_name ); ?></small>
			</a>
		</div>
	<?php endwhile; ?>
<?php else : ?>
	<p class="searchwp-live-search-no-results" role="option">
		<em><?php echo esc_html__( 'No results found.', 'authentic' ); ?></em>
	</p>
<?php endif; ?>
