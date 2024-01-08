<?php
/**
 * The template part for post content in post archives.
 *
 * @package Authentic
 */

set_query_var( 'meta_shares_location', 'post-loop' );

$archive     = get_theme_mod( csco_get_archive_option( 'archive_type' ), 'standard' );
$orientation = get_theme_mod( csco_get_archive_option( 'orientation' ), 'landscape' );
$highlight   = get_theme_mod( csco_get_archive_option( 'highlight' ), 'featured' );
$list_width  = get_theme_mod( csco_get_archive_option( 'list_width' ), '6' );
$columns     = get_theme_mod( csco_get_archive_option( 'columns' ), 2 );
$layout      = csco_get_page_layout();
$page_wide   = csco_is_wide_container();
$format      = get_post_format();
$post_meta   = array( 'date', 'author', 'comments' );

$post_class    = 'post-' . $archive;
$media_class   = 'post-inner';
$content_class = 'post-inner';
$outer_class   = 'post-outer';
$image_class   = 'overlay-media';
$more_class    = 'button button-primary button-effect';
$attr          = '';
$featured      = false;
$first         = false;
$size          = '560';

// Set the first post to standard.
if ( 'standard' !== $archive && get_theme_mod( csco_get_archive_option( 'first_post' ), true ) && 0 === $wp_query->current_post ) {
	$archive    = 'standard';
	$post_class = 'post-standard';
	$first      = true;
}

// Set Read More button class for standard posts.
if ( 'standard' === $archive ) {
	$more_class .= ' btn-lg';
	if ( $page_wide ) {
		$size = '1160';
	} else {
		$size = '800';
	}
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
	if ( 'layout-fullwidth' === $layout || '6' === $list_width ) {
		$size = '560';
	} else {
		$size = '320';
	}
}

// Add column classes and set image sizes for masonry and grid archives.
if ( ! $featured && ( 'grid' === $archive || 'masonry' === $archive ) ) {
	if ( 'layout-fullwidth' !== $layout && '4' === $columns ) {
		$size = '320';
	} else {
		$size = '560';
	}
}

// Set thumbnail size.
$thumbnail = 'csco-' . $size;

// Add image orientation.
if ( 'original' !== $orientation && ! $featured && 'standard' !== $archive ) {
	$thumbnail .= '-' . $orientation;
}

// Add classes and attributes to featured posts.
if ( $featured ) {

	$post_class     = 'post-featured';
	$outer_class   .= ' overlay ratio';
	$image_class   .= ' overlay-media parallax';
	$content_class .= ' overlay-outer';

	$post_meta = array( 'reading_time', 'views' );

	$video_bg = csco_get_video_background( 'archive' );

	if ( $video_bg ) {
		$image_class .= ' parallax-video';
		$attr        .= ' data-video="' . $video_bg['url'] . '"';
		$attr        .= ' data-start="' . $video_bg['start'] . '"';
		$attr        .= ' data-end="' . $video_bg['end'] . '"';
	}

	if ( 'list' === $archive || 'standard' === $archive ) {

		if ( $page_wide ) {
			if ( 'layout-fullwidth' === $layout ) {
				$thumbnail = 'csco-1920';
			} else {
				$thumbnail = 'csco-1160';
			}
		} else {
			if ( 'layout-fullwidth' === $layout ) {
				$thumbnail = 'csco-1160';
			} else {
				$thumbnail = 'csco-800';
			}
		}

		$outer_class .= ' ratio-landscape';

	} elseif ( 'masonry' === $archive || 'grid' === $archive ) {

		if ( 'layout-fullwidth' === $layout && '2' === $columns ) {
			$thumbnail = 'csco-800';
		} else {
			$thumbnail = 'csco-560-portrait';
		}

		$outer_class .= ' ratio-portrait';

	}
}

?>

<article <?php post_class( $post_class ); ?>>

	<div class="<?php echo esc_html( $outer_class ); ?>">

		<?php if ( $featured ) { ?>
			<div class="<?php echo esc_html( $image_class ); ?>" <?php echo (string) $attr; // XSS ok. ?>>
				<?php
				the_post_thumbnail(
					apply_filters( 'csco_post_featured_thumbnail_size', $thumbnail ), array(
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
					<?php the_post_thumbnail( $thumbnail ); ?>
					<?php csco_the_read_more( 'button-link', null ); ?>
					<?php csco_get_post_meta( array( 'reading_time', 'views' ), true ); ?>
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
				if ( get_theme_mod( csco_get_archive_option( 'meta_category' ), true ) ) {
					csco_get_post_meta( 'category' );
				}
				?>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php
				// Post Meta.
				if ( ! get_theme_mod( csco_get_archive_option( 'meta' ), true ) ) {
					csco_get_post_meta( array(), false );
				} else {
					csco_get_post_meta( $post_meta, false );
				}
				?>
			</header>

			<?php
			if ( 'standard' === $archive && ! $featured ) {
				// Get Post Media.
				csco_get_post_media_template();
			}
			?>

			<?php
			if ( ! $featured ) {
				// Get full post content for standard posts.
				$summary          = get_theme_mod( csco_get_archive_option( 'summary' ), true );
				$standard_summary = get_theme_mod( csco_get_archive_option( 'standard_summary' ), 'excerpt' );
				if ( 'standard' === $archive && true === $summary && 'content' === $standard_summary ) {
					?>

					<div class="entry-content">

						<?php

						// Check if more buttons should be displayed.
						if ( get_theme_mod( csco_get_archive_option( 'more_button' ), true ) ) {
							$more = csco_read_more( $more_class );
						} else {
							$more = '';
						}

						// Return the content.
						the_content( $more );

						?>

					</div>

					<?php
					// Get excerpt for all other posts.
				} else {
					csco_the_excerpt();
				}
			}

			// Display share buttons.
			if ( csco_powerkit_module_enabled( 'share_buttons' ) && powerkit_share_buttons_exists( 'post-loop' ) ) {
				?>
				<div class="post-share">
					<span class="title-share"><?php esc_html_e( 'Share', 'authentic' ); ?> <i class="cs-icon cs-icon-arrow-right"></i></span>
					<?php powerkit_share_buttons_location( 'post-loop' ); ?>
				</div>
			<?php } ?>

		</div>

		<?php if ( $featured ) { ?>
			</div>
		<?php } ?>

	</div>

</article>

<?php
set_query_var( 'meta_shares_location', null );
