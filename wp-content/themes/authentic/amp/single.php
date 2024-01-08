<?php
/**
 * Single view template.
 *
 * @package AMP
 */

/**
 * Context.
 *
 * @var AMP_Post_Template $this
 */

global $post;

ob_start();

$this->load_parts( array( 'html-start' ) );

$html_start = ob_get_clean();

// Remove 'important' suffix.
$html_start = str_replace( array( ' !important', '!important' ), '', $html_start );

echo (string) $html_start; // XSS.
?>

<?php $this->load_parts( array( 'header' ) ); ?>

<article class="amp-wp-article">
	<header class="amp-wp-article-header">
		<h1 class="amp-wp-title"><?php echo esc_html( $this->get( 'post_title' ) ); ?></h1>
		<?php $this->load_parts( apply_filters( 'amp_post_article_header_meta', array( 'meta-author', 'meta-time' ) ) ); ?>
	</header>

	<div class="amp-wp-article-featured">
		<?php
		if ( 'video' === get_post_format() || 'audio' === get_post_format() ) {
			?>
			<div class="amp-embed-responsive">
				<?php
				if ( 'video' === get_post_format() ) {
					$link = get_post_meta( get_the_ID(), 'powerkit_post_format_video', true );
				}
				if ( 'audio' === get_post_format() ) {
					$link = get_post_meta( get_the_ID(), 'powerkit_post_format_audio', true );
				}

				$amp_content = new AMP_Content(
					wp_oembed_get( $link ),
					amp_get_content_embed_handlers( $post ),
					amp_get_content_sanitizers( $post )
				);

				echo (string) $amp_content->get_amp_content(); // XSS ok.
				?>
			</div>
			<?php
		} elseif ( 'gallery' === get_post_format() ) {
			$images = get_post_meta( get_the_ID(), 'powerkit_post_format_gallery', true );

			if ( is_array( $images ) && $images ) {
				$amp_content = new AMP_Content(
					sprintf( '[gallery ids="%s"]', implode( ',', $images ) ),
					amp_get_content_embed_handlers( $post ),
					amp_get_content_sanitizers( $post )
				);

				echo (string) $amp_content->get_amp_content(); // XSS ok.
			}
		} else {
			// Featured image.
			$this->load_parts( array( 'featured-image' ) );
		}
		?>
	</div>

	<div class="amp-wp-article-content">
		<?php echo (string) $this->get( 'post_amp_content' ); // WPCS: XSS ok. Handled in AMP_Content::transform(). ?>
	</div>

	<footer class="amp-wp-article-footer">
		<?php $this->load_parts( apply_filters( 'amp_post_article_footer_meta', array( 'meta-taxonomy', 'meta-comments-link' ) ) ); ?>
	</footer>
</article>

<?php $this->load_parts( array( 'footer' ) ); ?>

<?php
$this->load_parts( array( 'html-end' ) );
