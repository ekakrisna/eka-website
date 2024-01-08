<?php
/**
 * Media: Image
 *
 * @package Authentic
 */

$filter      = current_filter();
$page_wide   = csco_is_wide_container();
$layout      = csco_get_page_layout();
$page_header = csco_get_page_header_type();

if ( 'csco_main_content_before' === $filter ) {
	if ( $page_wide ) {
		$size = '1920';
	} else {
		$size = '1160';
	}
} else {
	if ( $page_wide && 'layout-fullwidth' === $layout ) {
		$size = '1920';
	} elseif ( $page_wide && 'layout-fullwidth' !== $layout ) {
		$size = '1160';
	} elseif ( ! $page_wide && 'layout-fullwidth' === $layout ) {
		$size = '1160';
	} else {
		$size = '800';
	}
}

$thumbnail = 'csco-' . $size;

if ( is_single() && 'simple' === $page_header ) {
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
	?>
	<section class="post-media">
		<figure>
			<a href="<?php echo esc_url( $thumb[0] ); ?>">
				<?php the_post_thumbnail( $thumbnail ); ?>
			</a>
			<?php if ( get_the_post_thumbnail_caption() ) { ?>
			<figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
			<?php } ?>
		</figure>
	</section>
<?php } else { ?>
	<section class="post-media">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( $thumbnail ); ?>
		</a>
	</section>
<?php
}
