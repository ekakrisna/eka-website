<?php
/**
 * Primary Navigation Bar
 * Have a look at framework/hooks/actions to see what is hooked into the header
 * See all header parts at template-parts/header/
 *
 * @package Authentic
 */

// Get navbar settings.
$container           = get_theme_mod( 'navbar_container', 'cs-container' );
$alignment           = get_theme_mod( 'navbar_alignment', 'center' );
$toggle              = get_theme_mod( 'navbar_toggle', true );
$search              = get_theme_mod( 'navbar_search', false );
$social              = get_theme_mod( 'navbar_social', false );
$cart                = get_theme_mod( 'navbar_cart', false );
$logo                = get_theme_mod( 'navbar_logo_select', 'text' );
$logo_text           = get_theme_mod( 'navbar_logo_text', get_bloginfo( 'name' ) );
$logo_default_url    = get_theme_mod( 'navbar_logo_default_url', get_template_directory_uri() . '/images/logo-small-dark.png' );
$logo_default_url_2x = get_theme_mod( 'navbar_logo_default_retina_url', get_template_directory_uri() . '/images/logo-small-dark-2x.png' );
$logo_overlay_url    = get_theme_mod( 'navbar_logo_overlay_url', get_template_directory_uri() . '/images/logo-small-light.png' );
$logo_overlay_url_2x = get_theme_mod( 'navbar_logo_overlay_retina_url', get_template_directory_uri() . '/images/logo-small-light-2x.png' );
$dark_logo_url       = get_theme_mod( 'navbar_dark_logo_default_url' );
$dark_logo_url_2x    = get_theme_mod( 'navbar_dark_logo_default_retina_url' );
$inverse_badges      = get_theme_mod( 'colors_navbar_submenu_inverse_badges', false );


// Add alignment class.
$class = 'navbar-' . $alignment;

// Add search class.
if ( ! $search ) {
	$class .= ' search-disabled';
}

// Add social class.
if ( ! $social ) {
	$class .= ' social-disabled';
}

// Add toggle class.
if ( ! $toggle ) {
	$class .= ' toggle-disabled';
}

// Add inverse badges class.
if ( $inverse_badges ) {
	$class .= ' inverse-badges-enabled';
}
?>

<div class="navbar-primary <?php echo esc_html( $class ); ?>">
	<div class="<?php echo esc_html( $container ); ?>">
		<nav class="navbar">

			<div class="navbar-col">
				<div>

					<button class="navbar-toggle offcanvas-toggle" type="button">
						<i class="cs-icon cs-icon-menu"></i>
					</button>

					<?php
					// Logo.
					if ( 'image' === $logo && $logo_default_url ) {
						// Sets the scheme for a URL.
						$logo_default_url    = set_url_scheme( $logo_default_url );
						$logo_overlay_url_2x = set_url_scheme( $logo_overlay_url_2x );
						?>
						<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php
							if ( get_theme_mod( 'navbar_mobile_logo', false ) ) {
								$mobile_logo_default_url    = get_theme_mod( 'navbar_mobile_logo_default_url' );
								$mobile_logo_default_url_2x = get_theme_mod( 'navbar_mobile_logo_default_retina_url' );
								$mobile_dark_logo_url       = get_theme_mod( 'navbar_mobile_dark_logo_default_url' );
								$mobile_dark_logo_url_2x    = get_theme_mod( 'navbar_mobile_dark_logo_default_retina_url' );
								?>

								<?php if ( $mobile_dark_logo_url && $mobile_dark_logo_url_2x ) { ?>
									<img class="logo-image logo-image-dark logo-mobile-image" src="<?php echo esc_html( $mobile_dark_logo_url ); ?>" srcset="<?php echo esc_html( $mobile_dark_logo_url ); ?> 1x, <?php echo esc_html( $mobile_dark_logo_url_2x ); ?> 2x" alt="<?php bloginfo( 'name' ); ?>">
								<?php } ?>

								<?php if ( $mobile_logo_default_url && $mobile_logo_default_url_2x ) { ?>
									<img class="logo-image logo-mobile-image" src="<?php echo esc_html( $mobile_logo_default_url ); ?>" srcset="<?php echo esc_html( $mobile_logo_default_url ); ?> 1x, <?php echo esc_html( $mobile_logo_default_url_2x ); ?> 2x" alt="<?php bloginfo( 'name' ); ?>">
								<?php } ?>
							<?php } ?>

							<?php if ( $dark_logo_url && $dark_logo_url_2x ) { ?>
								<img class="logo-image logo-image-dark" src="<?php echo esc_html( $dark_logo_url ); ?>" srcset="<?php echo esc_html( $dark_logo_url ); ?> 1x, <?php echo esc_html( $dark_logo_url_2x ); ?> 2x" alt="<?php bloginfo( 'name' ); ?>">
							<?php } ?>

							<img class="logo-image" src="<?php echo esc_html( $logo_default_url ); ?>" srcset="<?php echo esc_html( $logo_default_url ); ?> 1x, <?php echo esc_html( $logo_default_url_2x ); ?> 2x" alt="<?php bloginfo( 'name' ); ?>">

							<?php if ( 'large' === csco_get_page_header_type() && $logo_overlay_url ) { ?>
								<img class="logo-image logo-overlay" src="<?php echo esc_html( $logo_overlay_url ); ?>" srcset="<?php echo esc_html( $logo_overlay_url ); ?> 1x, <?php echo esc_html( $logo_overlay_url_2x ); ?> 2x" alt="<?php bloginfo( 'name' ); ?>">
							<?php } ?>
						</a>
					<?php } ?>

					<?php
					// Text Logo.
					if ( 'text' === $logo && $logo_text ) {
						?>
						<a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php echo wp_kses_post( $logo_text ); ?>
						</a>
					<?php } ?>

				</div>
			</div>

			<div class="navbar-col">
				<div>
					<?php
					// Primary Menu.
					if ( has_nav_menu( 'primary-menu' ) ) {
						wp_nav_menu(
							array(
								'theme_location'  => 'primary-menu',
								'menu_class'      => 'nav navbar-nav',
								'container'       => '',
								'container_class' => '',
							)
						);
					}

					// Multi-Column Widgetized.
					csco_navbar_multi_column_widgets();
					?>
				</div>
			</div>

			<div class="navbar-col">
				<div>
					<?php
					// Social Accounts.
					if ( $social && csco_powerkit_module_enabled( 'social_links' ) ) {

						$labels = get_theme_mod( 'navbar_social_accounts_labels', false );
						$titles = get_theme_mod( 'navbar_social_accounts_titles', false );
						$counts = get_theme_mod( 'navbar_social_accounts_counts', true );
						$limit  = get_theme_mod( 'navbar_social_accounts_limit', 3 );

						?>
						<div class="nav-social-links cs-d-none cs-d-lg-block">
							<?php powerkit_social_links( $labels, $titles, $counts, 'nav', 'light', 'mixed', $limit ); ?>
						</div>
						<?php
					}

					// Single-Column Widgetized.
					csco_navbar_single_column_widgets();
					?>

					<?php
					// Cart.
					if ( $cart && class_exists( 'woocommerce' ) ) {
						?>

						<a class="header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'authentic' ); ?>">
							<i class="cs-icon cs-icon-cart"></i>
							<span class="cart-quantity"><?php echo intval( WC()->cart->get_cart_contents_count() ); ?></span>
						</a>

						<?php
					}
					?>

					<a href="#search" class="navbar-search"><i class="cs-icon cs-icon-search"></i></a>

					<?php
					// Scheme Toggle.
					if ( function_exists( 'csco_scheme_toggle' ) ) {
						csco_scheme_toggle();
					}
					?>
				</div>
			</div>

		</nav>
	</div>
</div><!-- .navbar-primary -->
