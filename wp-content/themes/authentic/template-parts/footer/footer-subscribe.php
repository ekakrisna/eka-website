<?php
/**
 * Subscribe Footer Component.
 *
 * @package Authentic
 */

if ( csco_powerkit_module_enabled( 'opt_in_forms' ) ) {
	$title   = get_theme_mod( 'footer_subscribe_title', esc_html__( 'Subscribe', 'authentic' ) );
	$message = get_theme_mod( 'footer_subscribe_message', esc_html__( 'Subscribe now to our newsletter', 'authentic' ) );
	$name    = get_theme_mod( 'footer_subscribe_name', false );
	?>

	<div class="footer-section">
		<div class="cs-container">
			<div class="footer-subscribe">
				<div class="subscribe-container">
					<?php
					if ( csco_powerkit_module_enabled( 'opt_in_forms' ) ) {
						echo do_shortcode( sprintf( '[powerkit_subscription_form title="%s" text="%s" display_name="%s"]', $title, $message, $name ) );
					}
					?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
