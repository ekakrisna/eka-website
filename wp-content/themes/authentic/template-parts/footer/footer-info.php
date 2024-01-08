<?php
/**
 * Info Footer Component.
 *
 * @package Authentic
 */

$logo             = get_theme_mod( 'footer_logo_select', 'text' );
$text             = get_theme_mod( 'footer_logo_text', get_bloginfo( 'name' ) );
$logo_url         = get_theme_mod( 'footer_logo_url', get_template_directory_uri() . '/images/logo-light.png' );
$logo_url_2x      = get_theme_mod( 'footer_logo_retina_url', get_template_directory_uri() . '/images/logo-light-2x.png' );
$dark_logo_url    = get_theme_mod( 'footer_dark_logo_url' );
$dark_logo_url_2x = get_theme_mod( 'footer_dark_logo_retina_url' );

$footer_text = get_theme_mod( 'footer_text', get_bloginfo( 'description' ) );

?>

<div class="footer-section">
	<div class="cs-container">
		<div class="footer-info">

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

			<?php
			if ( has_nav_menu( 'footer-menu' ) ) {
				wp_nav_menu(
					array(
						'theme_location'  => 'footer-menu',
						'menu_class'      => 'nav navbar-nav',
						'container'       => 'nav',
						'container_class' => 'nav navbar-footer navbar-lonely',
						'depth'           => 1,
					)
				);
			}
			?>

			<?php if ( $footer_text ) { ?>
				<div class="footer-copyright"><?php echo do_shortcode( $footer_text ); ?></div>
			<?php } ?>

		</div><!-- .footer-info -->
	</div><!-- .container -->
</div><!-- .footer-section -->
