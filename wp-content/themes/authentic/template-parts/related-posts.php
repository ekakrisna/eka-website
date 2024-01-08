<?php
/**
 * The template part for displaying related posts.
 *
 * @package Authentic
 */

$attrs = array();
$query = array();

$title           = get_theme_mod( 'post_carousel_title', esc_html__( 'You May Also Like', 'authentic' ) );
$slides          = get_theme_mod( 'post_carousel_slides', 8 );
$source          = get_theme_mod( 'post_carousel_source', 'all' );
$category_slug   = get_theme_mod( 'post_carousel_source_category_slug' );
$tag_slug        = get_theme_mod( 'post_carousel_source_tag_slug' );
$posts_slug      = get_theme_mod( 'post_carousel_source_posts_slug' );
$categories_only = get_theme_mod( 'post_carousel_current', true );
$orderby         = get_theme_mod( 'post_carousel_orderby', 'date' );
$time_frame      = get_theme_mod( 'post_carousel_time_frame', '' );
$post_meta       = get_theme_mod( 'post_carousel_post_meta', array( 'date', 'author', 'category' ) );
$orientation     = get_theme_mod( 'post_carousel_orientation', 'landscape' );
$heading         = get_theme_mod( 'post_carousel_heading', array( 'font-size' => '1rem' ) );

// Slides.
if ( $slides ) {
	$attrs['slides'] = sprintf( '"layout_carousel_slides":"%s"', $slides );
}

// Orientation.
if ( $orientation ) {
	$attrs['orientation'] = sprintf( '"layout_carousel_thumbnailOrientation":"%s"', $orientation );
}

// Categories only.
if ( $categories_only ) {
	// Get current post categories.
	$categories = get_the_terms( get_the_ID(), 'category' );

	$category__in = array();

	// Add category IDs to the array.
	if ( is_array( $categories ) && $categories ) {
		foreach ( $categories as $category ) {
			$category__in[] = $category->slug;
		}
	}

	// Add current post category IDs.
	if ( 'category' === $source && $category_slug ) {
		$category_slug = sprintf( '%s,%s', $category_slug, implode( ',', $category__in ) );
	} else {
		$category_slug = sprintf( '%s', implode( ',', $category__in ) );
	}

	$query['categories'] = sprintf( '"categories":"%s"', $category_slug );
}

// Source.
if ( 'category' === $source ) {

	$query['categories'] = sprintf( '"categories":"%s"', $category_slug );
} elseif ( 'tag' === $source ) {

	$query['tags'] = sprintf( '"tags":"%s"', $tag_slug );
} elseif ( 'posts' === $source ) {

	$query['posts'] = sprintf( '"posts":"%s"', $posts_slug );
}

// Order By.
if ( $orderby ) {
	$query['orderby'] = sprintf( '"orderby":"%s"', $orderby );
}

// Time Frame.
if ( $time_frame ) {
	$query['time_frame'] = sprintf( '"time_frame":"%s"', $time_frame );
}

// Post Meta.
$stack_meta = apply_filters(
	'csco_post_meta_choices',
	array(
		'category'     => 'Category',
		'author'       => 'Author',
		'date'         => 'Date',
		'comments'     => 'Comments',
		'views'        => 'Views',
		'shares'       => 'Shares',
		'reading_time' => 'ReadingTime',
	)
);

foreach ( $stack_meta as $slug => $name ) {
	$value = in_array( $slug, $post_meta, true ) ? 'true' : 'false';

	$attrs[ $slug ] = sprintf( '"layout_carousel_carouselShowMeta%s":%s', $name, $value );
}

// Carousel Content.
ob_start();
?>
<!-- wp:canvas/posts {
	<?php echo (string) implode( ',', $attrs ); // XSS. ?>,
	"canvasClassName":"pk-block-posts-single",
	"canvasLocation":"section-wide",
	"layout":"carousel",
	"layout_carousel_columns":3,
	"layout_carousel_typographyHeading":"1.125rem",
	"avoidDuplicatePosts":true,
	"query":{"posts_type":"post","formats":"","offset":"","order":"DESC",<?php echo (string) implode( ',', $query ); // XSS. ?>}} /-->
<?php
$related_posts = do_blocks( ob_get_clean() );

if ( $related_posts ) {
	?>
		<section class="section-related-posts">
			<?php csco_section_heading( $title ); ?>

			<?php echo (string) ( $related_posts ); // XSS. ?>

			<style>
				.section-related-posts article .entry-title {
					font-size: <?php echo esc_attr( $heading['font-size'] ); ?>
				}
			</style>
		</section>
	<?php
}
