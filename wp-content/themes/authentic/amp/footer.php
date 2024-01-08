<?php
/**
 * Footer template part.
 *
 * @package AMP
 */

/**
 * Context.
 *
 * @var AMP_Post_Template $this
 */

$logo        = get_theme_mod( 'footer_logo_select', 'text' );
$text        = get_theme_mod( 'footer_logo_text', get_bloginfo( 'name' ) );
$logo_url    = get_theme_mod( 'footer_logo_url', get_template_directory_uri() . '/images/logo-light.png' );
$logo_url_2x = get_theme_mod( 'footer_logo_retina_url', get_template_directory_uri() . '/images/logo-light-2x.png' );

$footer_text = get_theme_mod( 'footer_text', get_bloginfo( 'description' ) );
?>

<footer class="amp-wp-footer">
	<div class="site-info">
		<?php
		if ( 'image' === $logo && $logo_url ) {
			// Sets the scheme for a URL.
			$logo_url    = set_url_scheme( $logo_url );
			$logo_url_2x = set_url_scheme( $logo_url_2x );

			list( $width, $height, $type, $attr ) = getimagesize( $logo_url );

			if ( ! $width || ! $height ) {
				$attachment_id = attachment_url_to_postid( $logo_url );

				$data = wp_get_attachment_image_src( $attachment_id, 'full' );

				if ( isset( $data[1] ) ) {
					$width = $data[1];
				}
				if ( isset( $data[2] ) ) {
					$height = $data[2];
				}
			}
		?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
			<amp-img class="logo-image" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" src="<?php echo esc_html( $logo_url ); ?>" srcset="<?php echo esc_html( $logo_url ); ?> 1x, <?php echo esc_html( $logo_url_2x ); ?> 2x" alt="<?php bloginfo( 'name' ); ?>">
		</a>
		<?php } ?>

		<?php if ( 'text' === $logo && $text ) { ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title"><?php echo wp_kses_post( $text ); ?></a>
		<?php	} ?>

		<?php if ( $footer_text ) { ?>
			<div class="footer-copyright"><?php echo wp_kses_post( $footer_text ); ?></div>
		<?php } ?>
	</div><!-- .site-info -->
</footer>
