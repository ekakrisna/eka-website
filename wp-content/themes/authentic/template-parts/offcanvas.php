<?php
/**
 * The template part for displaying off-canvas area.
 *
 * @package Authentic
 */

?>

<div class="site-overlay"></div>

<div class="offcanvas">

	<div class="offcanvas-header">

		<?php do_action( 'csco_offcanvas_header_start' ); ?>

		<?php

		$logo             = get_theme_mod( 'offcanvas_logo_select', 'text' );
		$logo_url         = get_theme_mod( 'offcanvas_logo_url', get_template_directory_uri() . '/images/logo-small-dark.png' );
		$logo_url_2x      = get_theme_mod( 'offcanvas_logo_retina_url', get_template_directory_uri() . '/images/logo-small-dark-2x.png' );
		$dark_logo_url    = get_theme_mod( 'offcanvas_dark_logo_url' );
		$dark_logo_url_2x = get_theme_mod( 'offcanvas_dark_logo_retina_url' );
		$logo_text        = get_theme_mod( 'offcanvas_logo_text', get_bloginfo( 'name' ) );
		$border           = get_theme_mod( 'offcanvas_navbar_border', true );

		?>

		<nav class="navbar navbar-offcanvas <?php echo (string) $border ? ' navbar-border' : ''; ?>">

			<?php if ( 'none' !== $logo ) { ?>

				<?php
				if ( 'image' === $logo && $logo_url ) {
					// Sets the scheme for a URL.
					$logo_url    = set_url_scheme( $logo_url );
					$logo_url_2x = set_url_scheme( $logo_url_2x );
					?>
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if ( $dark_logo_url && $dark_logo_url_2x ) { ?>
							<img class="logo-image logo-image-dark" src="<?php echo esc_html( $dark_logo_url ); ?>" srcset="<?php echo esc_html( $dark_logo_url ); ?> 1x, <?php echo esc_html( $dark_logo_url_2x ); ?> 2x" alt="<?php bloginfo( 'name' ); ?>">
						<?php } ?>

						<img class="logo-image" src="<?php echo esc_html( $logo_url ); ?>" srcset="<?php echo esc_html( $logo_url ); ?> 1x, <?php echo esc_html( $logo_url_2x ); ?> 2x" alt="<?php bloginfo( 'name' ); ?>">
					</a>
				<?php } ?>

				<?php if ( 'text' === $logo && $logo_text ) { ?>
				<a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php echo wp_kses_post( $logo_text ); ?>
				</a>
				<?php } ?>

			<?php } ?>

			<button type="button" class="offcanvas-toggle navbar-toggle">
				<i class="cs-icon cs-icon-cross"></i>
			</button>

		</nav>

		<?php do_action( 'csco_offcanvas_header_end' ); ?>

	</div>

	<div class="offcanvas-sidebar">
		<div class="offcanvas-inner widget-area">
			<?php
			$locations = get_nav_menu_locations();

			// Get menu by location.
			if ( isset( $locations['mobile-menu'] ) ) {
				the_widget( 'WP_Nav_Menu_Widget', array( 'nav_menu' => $locations['mobile-menu'] ), array(
					'before_widget' => '<div class="widget %s cs-d-lg-none">',
					'after_widget' => '</div>',
				) );
			}
			?>

			<?php dynamic_sidebar( 'sidebar-offcanvas' ); ?>
		</div>
	</div>

</div>
