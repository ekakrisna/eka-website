<?php
/**
 * The template part for post content in post archives.
 *
 * @package Authentic
 */

$attributes = get_query_var( 'attributes' );
$options    = get_query_var( 'options' );

// Attributes.
$archive = isset( $attributes['layout'] ) ? $attributes['layout'] : 'list';

// Layout settings.
$params = csco_get_layout_settings( $options, 'archive' );

// Options.
$first_post  = isset( $options['firstPost'] ) ? $options['firstPost'] : true;
$highlight   = isset( $options['postsHighlight'] ) ? $options['postsHighlight'] : 'featured';
$list_width  = isset( $options['listWidth'] ) ? $options['listWidth'] : '6';
$columns     = isset( $options['columns'] ) ? $options['columns'] : '2';
$orientation = isset( $options['thumbnailOrientation'] ) ? $options['thumbnailOrientation'] : 'original';
$video       = isset( $options['video'] ) ? $options['video'] : false;

// Vars.
$format = get_post_format();

$post_class    = 'post-' . $archive;
$media_class   = 'post-inner';
$content_class = 'post-inner';
$outer_class   = 'post-outer';
$image_class   = 'overlay-media';
$attr          = '';
$featured      = false;
$first         = false;

// Set the first post to standard.
if ( 'standard' !== $archive && $first_post && 0 === $options['current_post'] ) {
	$archive    = 'standard';
	$post_class = 'post-standard';
	$first      = true;
}

// Check if the post is featured.
if ( 'all' === $highlight || ( 'featured' === $highlight && has_term( 'archive', 'powerkit_post_featured' ) ) ) {
	$featured = true;
}

// Add column classes and set image sizes for list archives.
if ( ! $featured && 'list' === $archive ) {
	$media_class   .= ' post-list-media';
	$content_class .= ' post-list-content';
	if ( '5' === $list_width ) {
		$outer_class .= ' post-list-one-third';
	} else {
		$outer_class .= ' post-list-half';
	}
}

// Add classes and attributes to featured posts.
if ( $featured ) {

	$post_class     = ' post-featured';
	$outer_class   .= ' overlay ratio';
	$image_class   .= ' overlay-media parallax';
	$content_class .= ' overlay-outer';

	if ( $video ) {
		$video_bg = csco_get_video_background( 'any' );

		if ( $video_bg ) {
			$image_class .= ' parallax-video';
			$attr        .= ' data-video="' . $video_bg['url'] . '"';
			$attr        .= ' data-start="' . $video_bg['start'] . '"';
			$attr        .= ' data-end="' . $video_bg['end'] . '"';
		}
	}

	if ( 'list' === $archive || 'standard' === $archive ) {

		$outer_class .= ' ratio-landscape';

	} elseif ( 'masonry' === $archive || 'grid' === $archive ) {

		$outer_class .= ' ratio-portrait';

		$orientation = 'portrait';
	}
}

// Get required image size, depending on the archive type.
$dependencies = csco_block_get_sizes_dependencies( 'archive' );

// Set subtype.
switch ( $archive ) {
	case 'list':
		$subtype = $list_width;
		break;
	case 'grid':
	case 'masonry':
		$subtype = $columns;
		break;
	default:
		$subtype = null;
		break;
}

// Set params.
if ( is_page_template( 'template-canvas-fullwidth.php' ) ) {
	$location = $attributes['canvasLocation'];
} else {
	$location = csco_get_page_layout();
}

// Get thumbnail size.
$thumbnail = csco_block_get_thumbnail_size( $dependencies, $location, $archive, $subtype, $attributes['is_wide'], $orientation );
?>

<article <?php post_class( $post_class ); ?>>

	<div class="<?php echo esc_html( $outer_class ); ?>">

		<?php if ( $featured ) { ?>
			<div class="<?php echo esc_html( $image_class ); ?>" <?php echo (string) $attr; // XSS ok. ?>>
				<?php
				the_post_thumbnail(
					apply_filters( 'csco_post_featured_thumbnail_size', apply_filters( 'csco_block_thumbnail_size', $thumbnail, $attributes, -1 ) ), array(
						'class' => 'jarallax-img',
					)
				);
				?>
				<a href="<?php the_permalink(); ?>" class="overlay-link"></a>
			</div>
		<?php } ?>

		<?php if ( has_post_thumbnail() && 'standard' !== $archive && ! $featured ) { ?>
			<div class="<?php echo esc_html( $media_class ); ?>">
				<div class="post-thumbnail">
					<?php if ( $format ) { ?>
						<span class="post-format button button-primary">
						<?php
						if ( 'gallery' === $format ) {
							$gallery = get_post_meta( get_the_ID(), 'powerkit_post_format_gallery', true );

							if ( is_array( $gallery ) && $gallery ) {
								?>
								<span><?php echo intval( count( $gallery ) ); ?></span>
								<?php
							}
						}
						?>
						</span>
					<?php } ?>

					<?php the_post_thumbnail( apply_filters( 'csco_block_thumbnail_size', $thumbnail, $attributes, -1 ) ); ?>

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
					// Post Meta.
					cnvs_block_post_meta( $params, array( 'reading_time', 'views' ), true );
					?>

					<a href="<?php the_permalink(); ?>"></a>
				</div>
			</div>
		<?php } ?>

		<div class="<?php echo esc_html( $content_class ); ?>">

			<?php if ( $featured ) { ?>
				<div class="overlay-inner">
			<?php } ?>

			<header class="entry-header">
				<?php
				// Post Category.
				cnvs_block_post_meta( $params, 'category' );
				?>

				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

				<?php
				// Post Meta.
				cnvs_block_post_meta( $params, array( 'date', 'author', 'comments', 'shares' ) );
				?>
			</header>

			<?php
			if ( 'standard' === $archive && ! $featured ) {
				// Get Post Media.
				csco_block_get_post_media_template();
			}
			?>

			<?php
			if ( ! $featured ) {
				$enable_summary   = isset( $options['summary'] ) ? $options['summary'] : true;
				$standard_summary = isset( $options['standardSummary'] ) ? $options['standardSummary'] : 'excerpt';

				// Get full post content for standard posts.
				if ( 'standard' === $archive && true === $enable_summary && 'content' === $standard_summary ) {
					?>

					<div class="entry-content">
						<?php
						ob_start();
						// Check if more buttons should be displayed.
						if ( isset( $params['showViewPostButton'] ) && $params['showViewPostButton'] ) {
							?>
							<div class="post-more">
								<?php csco_print_gutenberg_blocks_button( apply_filters( 'csco_label_readmore', $params['buttonLabel'] ), get_permalink(), '', 'button', $params, ' button-effect' ); ?>
							</div>
							<?php
						}

						$more = ob_get_clean();

						// Return the content.
						the_content( $more );
						?>

					</div>

					<?php
					// Get excerpt for all other posts.
				} else {
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

					if ( isset( $params['showViewPostButton'] ) && $params['showViewPostButton'] ) {
						?>
						<div class="post-more">
							<?php csco_print_gutenberg_blocks_button( apply_filters( 'csco_label_readmore', $params['buttonLabel'] ), get_permalink(), '', 'button', $params, ' button-effect' ); ?>
						</div>
						<?php
					}
				}
			}

			// Display share buttons.
			if ( function_exists( 'powerkit_share_buttons_exists' ) && powerkit_share_buttons_exists( 'block-posts' ) ) {
				?>
				<div class="post-share">
					<span class="title-share"><?php esc_html_e( 'Share', 'authentic' ); ?> <i class="cs-icon cs-icon-arrow-right"></i></span>

					<?php powerkit_share_buttons_location( 'block-posts' ); ?>
				</div>
			<?php } ?>

		</div>

		<?php if ( $featured ) { ?>
			</div>
		<?php } ?>

	</div>

</article>
