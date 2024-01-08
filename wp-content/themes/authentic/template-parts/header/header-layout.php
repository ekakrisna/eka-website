<?php
/**
 * Main Header Layout
 * Have a look at framework/hooks/actions to see what is hooked into the header
 * See all header parts at template-parts/header/
 *
 * @package Authentic
 */

$layout            = get_theme_mod( 'header_layout', 'center' );
$container         = get_theme_mod( 'header_container', 'cs-container' );
$logo              = get_theme_mod( 'header_logo_select', 'text' );
$text              = get_theme_mod( 'header_logo_text', get_bloginfo( 'name' ) );
$description       = get_theme_mod( 'header_description_text' );
$background        = get_theme_mod( 'header_background', false );
$background_object = get_theme_mod( 'header_background_object', array() );
$page_header       = csco_get_page_header_type();
$header_dark       = false;
$class             = '';
$attr              = '';
$video             = '';

if ( $background ) {
	// Check background color.
	if ( isset( $background_object['background-color'] ) && $background_object['background-color'] ) {
		$is_dark = csco_light_or_dark( $background_object['background-color'], false, true );

		if ( $is_dark ) {
			$header_dark = true;
		}
	}

	// Check background image.
	if ( isset( $background_object['background-image'] ) && $background_object['background-image'] ) {
		$header_dark = true;
	}
}

if ( 'large' !== $page_header && $background ) {
	$class .= ' header-background';

	if ( get_theme_mod( 'header_parallax', false ) ) {
		$class .= ' parallax';
	}

	$video = get_theme_mod( 'header_video_url', '' );

	if ( $video ) {
		$class .= ' parallax-video';

		$header_dark = true;
	}
}

$dark_logo_url    = get_theme_mod( 'header_dark_logo_default_url' );
$dark_logo_url_2x = get_theme_mod( 'header_dark_logo_default_retina_url' );

if ( 'large' === $page_header || $header_dark ) {
	$logo_url    = get_theme_mod( 'header_logo_overlay_url', get_template_directory_uri() . '/images/logo-light.png' );
	$logo_url_2x = get_theme_mod( 'header_logo_overlay_retina_url', get_template_directory_uri() . '/images/logo-light-2x.png' );
	$color       = 'light';
} else {
	$logo_url    = get_theme_mod( 'header_logo_default_url', get_template_directory_uri() . '/images/logo-dark.png' );
	$logo_url_2x = get_theme_mod( 'header_logo_default_retina_url', get_template_directory_uri() . '/images/logo-dark-2x.png' );
	$color       = 'dark';
}
?>

<div class="header header-<?php echo esc_html( $layout ); ?> header-<?php echo esc_html( $color ); ?> cs-d-none cs-d-lg-block<?php echo esc_html( $class ); ?>"<?php echo (string) $video ? ' data-video="' . esc_url( $video ) . '" data-start="' . intval( get_theme_mod( 'header_video_start', 0 ) ) . '" data-end="' . intval( get_theme_mod( 'header_video_end', 0 ) ) . '"' : ''; ?> >
	<div class="<?php echo esc_html( $container ); ?>">

		<?php if ( 'center' === $layout ) { ?>
			<div class="header-col header-col-left">
				<div>
					<?php csco_get_header_content( 'header_content_left', 'button' ); ?>
				</div>
			</div>
		<?php } ?>

		<div class="header-col header-col-center">
			<div>

				<?php
				if ( 'image' === $logo && $logo_url ) {
					// Sets the scheme for a URL.
					$logo_url    = set_url_scheme( $logo_url );
					$logo_url_2x = set_url_scheme( $logo_url_2x );
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
						<?php if ( $dark_logo_url && $dark_logo_url_2x ) { ?>
							<img class="logo-image logo-image-dark" src="<?php echo esc_html( $dark_logo_url ); ?>" srcset="<?php echo esc_html( $dark_logo_url ); ?> 1x, <?php echo esc_html( $dark_logo_url_2x ); ?> 2x" alt="<?php bloginfo( 'name' ); ?>">
						<?php } ?>

						<img class="logo-image" src="<?php echo esc_html( $logo_url ); ?>" srcset="<?php echo esc_html( $logo_url ); ?> 1x, <?php echo esc_html( $logo_url_2x ); ?> 2x" alt="<?php bloginfo( 'name' ); ?>">
					</a>
				<?php } ?>

				<?php if ( 'text' === $logo && $text ) { ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title"><?php echo wp_kses_post( $text ); ?></a>
				<?php	} ?>

				<?php if ( $description ) { ?>
				<p class="site-description"><?php echo wp_kses_post( $description ); ?></p>
				<?php	} ?>

			</div>
		</div>

		<?php if ( 'center' === $layout || 'left' === $layout ) { ?>
			<div class="header-col header-col-right">
				<div>
					<?php csco_get_header_content( 'header_content_right', 'search' ); ?>
				</div>
			</div>
		<?php } ?>

	</div>
</div>
