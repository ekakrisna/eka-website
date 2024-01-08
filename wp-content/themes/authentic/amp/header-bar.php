<?php
/**
 * Header bar template part.
 *
 * @package AMP
 */

$logo              = get_theme_mod( 'header_logo_select', 'text' );
$text              = get_theme_mod( 'header_logo_text', get_bloginfo( 'name' ) );
$description       = get_theme_mod( 'header_description_text' );
$background        = get_theme_mod( 'header_background', false );
$background_object = get_theme_mod( 'header_background_object' );

if ( $background && isset( $background_object['background-image'] ) && $background_object['background-image'] ) {
	$logo_url    = get_theme_mod( 'header_logo_overlay_url', get_template_directory_uri() . '/images/logo-light.png' );
	$logo_url_2x = get_theme_mod( 'header_logo_overlay_retina_url', get_template_directory_uri() . '/images/logo-light-2x.png' );
	$color       = 'light';
} else {
	$logo_url    = get_theme_mod( 'header_logo_default_url', get_template_directory_uri() . '/images/logo-dark.png' );
	$logo_url_2x = get_theme_mod( 'header_logo_default_retina_url', get_template_directory_uri() . '/images/logo-dark-2x.png' );
	$color       = 'dark';
}
?>

<header id="top" class="amp-wp-header header-<?php echo esc_html( $color ); ?>">
	<div class="navbar-content">
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

		<?php if ( $description ) { ?>
		<p class="site-description"><?php echo wp_kses_post( $description ); ?></p>
		<?php	} ?>
	</div>
</header>
